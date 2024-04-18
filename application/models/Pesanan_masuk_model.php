<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
                        
class Pesanan_masuk_model extends CI_Model 
{
    public function pesanan()
    {
        $this->db->select('*');
		$this->db->from('proses_pembayaran');
		$this->db->where('pembayaran_status=0');
		$this->db->order_by('pembayaran_id', 'desc');
		return $this->db->get()->result_array();
    }
    
    public function pesanan_diproses()
	{
		$this->db->select('*');
		$this->db->from('proses_pembayaran');
		$this->db->where('pembayaran_status=1');
		$this->db->order_by('pembayaran_id', 'desc');
		return $this->db->get()->result_array();
	}

	public function pesanan_dikirim()
	{
		$this->db->select('*');
		$this->db->from('proses_pembayaran');
		$this->db->where('pembayaran_status=2');
		$this->db->order_by('pembayaran_id', 'desc');
		return $this->db->get()->result_array();
	}

	public function pesanan_selesai()
	{
		$this->db->select('*');
		$this->db->from('proses_pembayaran');
		$this->db->where('pembayaran_status=3');
		$this->db->order_by('pembayaran_id', 'desc');
		return $this->db->get()->result_array();
	}
                        
}


/* End of file Pesanan_masuk_model.php and path /application/models/Pesanan_masuk_model.php */
