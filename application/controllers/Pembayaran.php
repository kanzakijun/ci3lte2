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
        
    }

}

/* End of file Pembayaran.php and path /application/controllers/Pembayaran.php */
