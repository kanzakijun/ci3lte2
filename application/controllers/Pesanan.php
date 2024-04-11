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

    }

    public function bayar($keranjang_id)
    {
        $data['title'] = 'Pesanan';
        $data['bayar'] = $this->pembayaran->bayar($keranjang_id);

        if(empty($data['bayar'])) {
            redirect('shop');
        }

        $this->load->view('templates/product_header', $data);
        $this->load->view('pesanan/index', $data);
    }
}

/* End of file Pesanan.php and path /application/controllers/Pesanan.php */
