<?php 
defined('BASEPATH') || exit('No direct script access allowed');

class Bank extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Bank_model', 'bank');
    }

    public function index()
    {
        $data['title'] = 'Master Bank';
        $data['user'] = $this->db->get_where('master_user', ['user_username' => $this->session->userdata('user_username')])->row_array();
        $data['master'] = $this->bank->get_bank();
        $data['username'] = $this->session->userdata('user_username');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/bank', $data);
    }

    public function add()
    {
        $data['title'] = 'Add Bank';
        $data['user'] = $this->db->get_where('master_user', ['user_username' => $this->session->userdata('user_username')])->row_array();
        $data['username'] = $this->session->userdata('user_username');

        $this->form_validation->set_rules('bank_nama', 'Bank', 'required|trim');
        $this->form_validation->set_rules('norek', 'Rekening', 'required|trim');
        $this->form_validation->set_rules('an', 'Atas Nama', 'required|trim');

        $bank = $this->input->post('bank_nama');
        $rekening = $this->input->post('norek');
        $atasnama = $this->input->post('an');

        if(!$this->form_validation->run()) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar', $data);
            $this->load->view('master/bank-add', $data);
        } else {
            $data = [
                'bank_nama' => $bank,
                'bank_rekening' => $rekening,
                'bank_atas_nama' => $atasnama
            ];
            $this->bank->add_bank($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Bank added!</div>');
            redirect('bank');
        }
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Bank';
        $data['user'] = $this->db->get_where('master_user', ['user_username' => $this->session->userdata('user_username')])->row_array();
        $data['username'] = $this->session->userdata('user_username');
        $data['master'] = $this->db->get_where('master_bank', ['bank_id' => $id])->result_array();

        $this->form_validation->set_rules('bank_nama', 'Bank', 'required|trim');
        $this->form_validation->set_rules('norek', 'Rekening', 'required|trim');
        $this->form_validation->set_rules('an', 'Atas Nama', 'required|trim');

        $bank = $this->input->post('bank_nama');
        $rekening = $this->input->post('norek');
        $atasnama = $this->input->post('an');

        if(!$this->form_validation->run()) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar', $data);
            $this->load->view('master/bank-edit', $data);
        } else {
            $data = [
                'bank_nama' => $bank,
                'bank_rekening' => $rekening,
                'bank_atas_nama' => $atasnama
            ];
            $this->bank->edit_bank($data, $id);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Bank edited!</div>');
            redirect('bank');
        }
    }

    public function delete($id)
    {
        $this->bank->delete_bank($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Bank deleted!</div>');
        redirect('bank');
    }
}

/* End of file Bank.php and path /application/controllers/Bank.php */
