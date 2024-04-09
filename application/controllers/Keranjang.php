<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Keranjang extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Master Keranjang';
        $data['user'] = $this->db->get_where('master_user', ['user_username' => $this->session->userdata('user_username')])->row_array();
        $this->load->model('Keranjang_model');
        $data['master'] = $this->Keranjang_model->get_keranjang();
        $data['username'] = $this->session->userdata('user_username');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/keranjang', $data);
    }
}

/* End of file Keranjang.php and path /application/controllers/Keranjang.php */
