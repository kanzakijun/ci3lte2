<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Shop extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('cart');
        $this->load->helper('string');
    }

    public function index()
    {
        if(empty($this->cart->contents())) {
            redirect('product');
        }

        $data['title'] = 'Shop Cart';
        $this->load->model('Barang_model', 'barang');
        $data['master'] = $this->barang->get_produk();
        $data['foto'] = $this->barang->get_foto();
        $this->load->view('templates/product_header', $data);
        $this->load->view('shop/index', $data);

    }

    public function checkout()
    {
        $data['title'] = 'Checkout';
        $data['user'] = $this->db->get_where('master_user', ['user_username' => $this->session->userdata('user_username')])->row_array();
        $this->load->model('Barang_model', 'barang');
        $this->load->model('Pembayaran_model', 'pembayaran');
        $this->load->model('Keranjang_model', 'keranjang');
        $data['barang'] = $this->barang->get_produk();
        $data['fotos'] = $this->barang->get_foto();
        $data['username'] = $this->session->userdata('user_username');

        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('kode_pos', 'Kode Pos', 'required|trim');
        $this->form_validation->set_rules('nama_penerima', 'Nama Penerima', 'required|trim');
        $this->form_validation->set_rules('no_wa', 'No. WhatsApp', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/product_header', $data);
            $this->load->view('shop/checkout');
        } else {
            // data ke proses_pembayaran
            $data = [
                'no_order' => $this->input->post('no_order'),
                'pembayaran_waktu' => date('Y-m-d H:i:s'),
                'pembayaran_nama_pemesan' => $this->input->post('nama_penerima'),
                'pembayaran_no_wa' => $this->input->post('no_wa'),
                'pembayaran_alamat' => $this->input->post('alamat').', Kode Pos: '.$this->input->post('kode_pos'),
                'pembayaran_total' => $this->cart->total(),
                'pembayaran_status' => '0',
                ];

            $this->pembayaran->proses_bayar($data);

            // cek data id dari tabel proses_pembayaran
            $pembayaran = $this->pembayaran->get_id();
            $idPembayaran = $pembayaran['pembayaran_id'];

            // data ke proses_keranjang
            $a = 1;
            $i = 1;
			foreach ($this->cart->contents() as $item) {
				$data_keranjang = array(
                    'pembayaran_id' => $idPembayaran,
                    'barang_id' => $this->input->post('barang_id' . $a++),
					'keranjang_jumlah' => $this->input->post('qty' . $i++),
                    'keranjang_harga' => $item['subtotal'],
                    'keranjang_total' => $this->cart->total(),
				);
                $this->keranjang->simpan_keranjang($data_keranjang);
            }
            

            //=========================================
			$this->session->set_flashdata('pesan', 'Pesanan Berhasil Di Proses !!!');
			$this->cart->destroy();
			redirect('pesanan/bayar/' . $idPembayaran );
    }
}

    public function add()
    {
        $redirect_page = $this->input->post('redirect_page');
        $data = array(
            'id'      => $this->input->post('id'),
            'qty'     => $this->input->post('qty'),
            'price'   => $this->input->post('price'),
            'name'    => $this->input->post('name'),
        );
        $this->cart->insert($data);
        redirect($redirect_page, 'refresh');
    }

    public function update()
    {
        $i = 1;
        foreach ($this->cart->contents() as $items) {
            $data = array(
                'rowid' => $items['rowid'],
                'qty'   => $this->input->post($i . '[qty]')
            );
            $this->cart->update($data);
            $i++;
        }
        $this->session->set_flashdata('pesan', 'Cart Updated!');
        redirect('shop');
    }


    public function remove($rowid)
    {
        $this->cart->remove($rowid);
        redirect('shop');
    }

    public function clear()
    {
        $this->cart->destroy();
        redirect('shop');
    }

}

/* End of file Shop.php and path /application/controllers/Shop.php */
