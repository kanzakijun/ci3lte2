<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
                        
class Ekspedisi_model extends CI_Model 
{
    public function ekspedisi()
    {
        $this->db->select('*');
        $this->db->from('master_ekspedisi');
        $query = $this->db->get();
        return $query->result_array($query);
    }                        
                        
}


/* End of file Ekspedisi_model.php and path /application/models/Ekspedisi_model.php */
