<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Pembayaran_model', 'pembayaran');
    }

    public function index()
    {
        $data['title'] = 'Pembayaran';
        $data['user'] = $this->db->get_where('master_user', ['user_username' => $this->session->userdata('user_username')])->row_array();
        $data['master'] = $this->pembayaran->getPembayaran();
        $data['username'] = $this->session->userdata('user_username');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/pembayaran', $data);
    }

    public function konfirmasi($pembayaran_id)
    {
        $this->pembayaran->konfirmasi($pembayaran_id);
        redirect('pembayaran');
    }
}

/* End of file Pembayaran.php and path /application/controllers/Pembayaran.php */
