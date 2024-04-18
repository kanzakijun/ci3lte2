<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesanan_masuk extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Ekspedisi_model', 'ekspedisi');
        $this->load->model('Pesanan_masuk_model', 'pesanan');
        $this->load->model('Keranjang_model', 'keranjang');
        $this->load->model('Pembayaran_model', 'pembayaran');
    }

    public function index()
    {
        $data['title'] = 'Pesanan Masuk';
        $data['user'] = $this->db->get_where('master_user', ['user_username' => $this->session->userdata('user_username')])->row_array();
        $data['keranjang'] = $this->pesanan->pesanan();
        $data['ekspedisi'] = $this->ekspedisi->ekspedisi();
        $data['diproses'] = $this->pesanan->pesanan_diproses();
        $data['dikirim'] = $this->pesanan->pesanan_dikirim();
        $data['selesai'] = $this->pesanan->pesanan_selesai();
        $data['username'] = $this->session->userdata('user_username');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/pesanan_masuk', $data);

    }

    public function konfirmasi($pembayaran_id)
    {
        $this->pembayaran->konfirmasi($pembayaran_id);
        $this->session->set_flashdata('konfirmasi', '<div class="alert alert-success " role="alert"> Pembayaran telah dikonfirmasi!</div>');
        redirect('pesanan_masuk');
    }

    public function kirim($pembayaran_id)
    {
        $data = [
            'pembayaran_status' => '2',
            'ekspedisi_nama' => $this->input->post('ekspedisi'),
            'no_resi' => $this->input->post('resi')
        ];
        $this->pembayaran->kirim($pembayaran_id, $data);
        $this->session->set_flashdata('kirim', '<div class="alert alert-success " role="alert"> Pesanan telah dikirim!</div>');
        redirect('pesanan_masuk');
    }

    public function selesai($pembayaran_id)
    {
        $this->pembayaran->selesai($pembayaran_id);
        $this->session->set_flashdata('selesai', '<div class="alert alert-success " role="alert"> Pesanan telah selesai!</div>');
        redirect('pesanan_masuk');
    }
}

/* End of file Pesanan_masuk.php and path /application/controllers/Pesanan_masuk.php */
