<?php 
defined('BASEPATH') || exit('No direct script access allowed');

class Barang extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Barang_model', 'barang');
    }

    public function index()
    {
        $data['title'] = 'Master Barang';
        $data['user'] = $this->db->get_where('master_user', ['user_username' => $this->session->userdata('user_username')])->row_array();
        $data['username'] = $this->session->userdata('user_username');
        $data['master'] = $this->barang->get_produk();
        $data['fotos'] = $this->barang->get_foto();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar', $data);
        $this->load->view('master/barang', $data);
    }

    public function add()
    {
        $data['title'] = 'Tambah Barang';
        $data['user'] = $this->db->get_where('master_user', ['user_username' => $this->session->userdata('user_username')])->row_array();
        $data['username'] = $this->session->userdata('user_username');

        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required|trim');
        $this->form_validation->set_rules('harga', 'Harga', 'required|trim');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim');

        if (!$this->form_validation->run()) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar', $data);
            $this->load->view('master/barang-add', $data);
        } else {
            $nama = $this->input->post('nama_barang');
            $harga = $this->input->post('harga');
            $ket = $this->input->post('keterangan');
            
            $this->db->insert('master_barang', [
                'barang_nama' => $nama,
                'barang_harga' => $harga,
                'barang_keterangan' => $ket,
                ]);
                
                $idFoto = $this->db->insert_id();
                $fotos = $_FILES['foto'];

        // Perulangan dengan foreach
        foreach ($fotos['name'] as $key => $foto_name) {
            $_FILES['file']['name']     = $fotos['name'][$key];
            $_FILES['file']['type']     = $fotos['type'][$key];
            $_FILES['file']['tmp_name'] = $fotos['tmp_name'][$key];
            $_FILES['file']['error']    = $fotos['error'][$key];
            $_FILES['file']['size']     = $fotos['size'][$key];

            // Konfigurasi Upload
            $config['upload_path']          = './assets/img/barang';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';

            // Library Upload dan Setting Konfigurasi
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            
            if ($this->upload->do_upload('file')) { // Jika Berhasil Upload
                $fileData = $this->upload->data(); // Upload Data
                
                // Variable untuk dimasukkan ke Database
                $uploadData = [
                    'barang_id' => $idFoto,
                    'barang_foto_file' => $fileData['file_name']
                ];

                $this->barang->upload_foto($uploadData);
                
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                redirect('barang/add');
            }
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New product added!</div>');
        redirect('barang');
        }
    }


    public function edit($id)
    {
        $data['title'] = 'Edit Product';
        $data['user'] = $this->db->get_where('master_user', ['user_username' => $this->session->userdata('user_username')])->row_array();
        $data['username'] = $this->session->userdata('user_username');
        $this->load->model('Barang_model', 'barang');
        $data['master'] = $this->db->get_where('master_barang', ['barang_id' => $id])->result_array();
        $data['gambar'] = $this->db->get_where('master_barang_foto', ['barang_id' => $id])->result_array();

        $namaBarang = $this->input->post('barang_nama');
        $harga = $this->input->post('harga');
        $ket = $this->input->post('ket');
        $checkboxStatus = $this->input->post('checkboxStatus');

        $this->form_validation->set_rules('barang_nama', 'Nama Barang', 'required|trim');
        $this->form_validation->set_rules('harga', 'Harga', 'required|trim');
        $this->form_validation->set_rules('ket', 'Keterangan', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar', $data);
            $this->load->view('master/barang-edit', $data);
        } else {
            $data = [
                        'barang_nama' => $namaBarang,
                        'barang_harga' => $harga,
                        'barang_keterangan' => $ket,
                    ];
                    if($checkboxStatus == '1') {
                        $this->db->where('barang_id', $id);
                        $this->db->update('master_barang', $data);
                        
                        $idFoto = $id;
                        $fotos = $_FILES['fotos'];

                        // Perulangan dengan foreach
                        foreach ($fotos['name'] as $key => $foto_name) {
                            $_FILES['file']['name']     = $fotos['name'][$key];
                            $_FILES['file']['type']     = $fotos['type'][$key];
                            $_FILES['file']['tmp_name'] = $fotos['tmp_name'][$key];
                            $_FILES['file']['error']    = $fotos['error'][$key];
                            $_FILES['file']['size']     = $fotos['size'][$key];

                        // Konfigurasi Upload
                            $config['upload_path']          = './assets/img/barang/';
                            $config['allowed_types']        = 'gif|jpg|png|pdf';

                        // Library Upload dan Setting Konfigurasi
                            $this->load->library('upload', $config);
                            $this->upload->initialize($config);
                            
                            if ($this->upload->do_upload('file')) { // Jika Berhasil Upload
                                $fileData = $this->upload->data(); // Upload Data
                        
                                // Variable untuk dimasukkan ke Database
                                $uploadData = [
                                    'barang_id' => $idFoto,
                                    'barang_foto_file' => $fileData['file_name']
                                    ];

                                    $this->db->insert('master_barang_foto', $uploadData);
                                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Product has been updated!</div>');
                                    redirect('barang');
                                } else {
                                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                                    redirect('barang/edit/' . $id);
                                }
                            } 
                        } else {
                            if($checkboxStatus == '0') {
                                $this->db->where('barang_id', $id);
                        $this->db->update('master_barang', $data);
                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Product has ADASDbeen updated!</div>');
                        redirect('barang');
                        }
                    }
                }
            }
    public function delete($id)
    {
        
        $fotos = $this->db->get_where('master_barang_foto', ['barang_id' => $id])->result_array();
        $this->db->where('barang_id', $id);
        $this->db->delete('master_barang');
        $this->db->where('barang_id', $id);
        $this->db->delete('master_barang_foto');

        foreach ($fotos as $foto) {
            unlink('assets/img/barang/' . $foto['barang_foto_file']);
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Product has been deleted!</div>');
        redirect('barang');
    }

    public function deleteGambar($gm, $id)
    {
        $this->db->where('barang_foto_file', $gm);
        $this->db->delete('master_barang_foto');
        unlink('assets/img/barang/' . $gm);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Photo Product has been deleted!</div>');
        redirect('barang/edit/' . $id);
    }
}
/* End of file Barang.php and path /application/controllers/Barang.php */
