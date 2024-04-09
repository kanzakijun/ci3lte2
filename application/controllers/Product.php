<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['title'] = 'Products';
        $data['user'] = $this->db->get_where('master_user', ['user_username' => $this->session->userdata('user_username')])->row_array();
        $this->load->model('Barang_model', 'barang');
        $data['master'] = $this->barang->get_produk();
        $data['foto'] = $this->barang->get_foto();
        $data['username'] = $this->session->userdata('user_username');
        
        $this->load->library('pagination');
        
        // Ambil data keyword
		if($this->input->post('submit')) {
			$data['keyword'] = $this->input->post('keyword');
			// $this->session->set_userdata('keyword', $data['keyword']);
		} else {
			//$data['keyword'] = $this->session->userdata('keyword');
            $data['keyword'] = null;
		}
        
        // config
		$this->db->like('barang_nama', $data['keyword']);
		$this->db->from('master_barang');
		$config['total_rows'] = $this->db->count_all_results();
		$data['total_rows'] = $config['total_rows'];
		$config['per_page'] = 2;

        $this->pagination->initialize($config);
        
        $data['start'] = $this->uri->segment(3);
		$data['produk'] = $this->barang->produk($config['per_page'], $data['start'], $data['keyword']);
        

        $this->load->view('product/index', $data);
    }

    public function detail($id)
    {
        $data['title'] = 'Product Detail';
        $data['user'] = $this->db->get_where('master_user', ['user_username' => $this->session->userdata('user_username')])->row_array();
        $this->load->model('Barang_model', 'barang');
        $data['master'] = $this->barang->get_produk($id);
        $data['detail'] = $this->barang->detail($id);
        $data['username'] = $this->session->userdata('user_username');
        
        //$this->load->view('templates/header', $data);
        //$this->load->view('templates/navbar');
        $this->load->view('product/detail', $data);
    }
}

/* End of file Product.php and path /application/controllers/Product.php */
