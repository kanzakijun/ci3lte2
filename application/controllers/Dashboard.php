<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('master_user', ['user_username' => $this->session->userdata('user_username')])->row_array();
        $data['username'] = $this->session->userdata('user_username');
        $data['users'] = $this->db->get('master_user')->num_rows();
        $data['barang'] = $this->db->get('master_barang')->num_rows();
        $data['pesanan'] = $this->db->get('proses_pembayaran')->num_rows();
        $data['ekspedisi'] = $this->db->get('master_ekspedisi')->num_rows();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar', $data);
        $this->load->view('dashboard/index', $data);
    }
}

/* End of file Dashboard.php and path /application/controllers/Dashboard.php */
