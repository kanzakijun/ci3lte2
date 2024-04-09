<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
                        
class Barang_model extends CI_Model 
{
    public function get_barang()
    {
        // $query = "SELECT `master_barang`.*, `master_barang_foto`.`barang_foto_file` FROM `master_barang` JOIN `master_barang_foto` ON `master_barang`.`barang_id` = `master_barang_foto`.`barang_id`";

        $this->db->select('master_barang.*, master_barang_foto.barang_foto_file');
        $this->db->from('master_barang');
        $this->db->join('master_barang_foto', 'master_barang.barang_id = master_barang_foto.barang_id');
        $this->db->order_by('master_barang.barang_id', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_produk()
    {
        $query = $this->db->get('master_barang');
        return $query->result_array();
    }

    public function count_produk()
    {
        return $this->db->get('master_barang')->num_rows();
    }
    public function produk($limit, $start, $keyword = null)
    {
        if ($keyword) {
			$this->db->like('barang_nama', $keyword);
		}
		return $this->db->get('master_barang', $limit, $start)->result_array();
    }
    
    public function detail($id)
    {
        $query = $this->db->get_where('master_barang', ['barang_id' => $id]);
        return $query->row_array();
    }

    public function get_foto()
    {
        $query = $this->db->get('master_barang_foto');
        return $query->result_array();
    }
    
    public function upload_foto($uploadData)
    {
                // Insert Ke Database dengan Banyak Data Sekaligus
        return $this->db->insert('master_barang_foto',$uploadData);
    }
}


/* End of file Barang_model.php and path /application/models/Barang_model.php */
