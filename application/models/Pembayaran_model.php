<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
                        
class Pembayaran_model extends CI_Model 
{
    public function get_id()
    {
        $this->db->select_max('pembayaran_id');
        $query = $this->db->get('proses_pembayaran');
        return $query->row_array();
    }

    public function proses_bayar($data)
	{
		$this->db->insert('proses_pembayaran', $data);
	}

    public function bayar($keranjang_id)
    {
        $this->db->select('*');
        $this->db->from('proses_pembayaran');
        $this->db->where('pembayaran_id', $keranjang_id);
        $query = $this->db->get();
        return $query->result_array($query);
    }                        
                        
}


/* End of file Pembayaran_model.php and path /application/models/Pembayaran_model.php */
