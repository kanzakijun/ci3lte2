<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesanan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pembayaran_model', 'pembayaran');
    }

    public function index()
    {
        redirect('shop');
    }

    public function bayar($keranjang_id)
    {
        $data['title'] = 'Konfirmasi Pembayaran';
        $data['bayar'] = $this->pembayaran->bayar($keranjang_id);
        $data['rekening'] = $this->db->get('master_bank')->result_array();

        if(empty($data['bayar'])) {
            redirect('shop');
        }

        $this->load->view('templates/product_header', $data);
        $this->load->view('pesanan/index', $data);
    }

    public function konfirmasi($pembayaran_id)
    {
        $wa = 'https://wa.me/';
        $nama = $this->input->post('atas_nama');
        $bank = $this->input->post('nama_bank');
        $rek = $this->input->post('no_rek');

        $pesan = 'Konfirmasi pembayaran dengan No. Transaksi : '.$pembayaran_id.', atas nama : '.$nama.', melalui : '.$bank.', dengan nomor rekening : '.$rek;

        redirect($wa . '6285647172825' . '?text=' . $pesan);
    }
}

/* End of file Pesanan.php and path /application/controllers/Pesanan.php */
