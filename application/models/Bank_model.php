<?php 
defined('BASEPATH') || exit('No direct script access allowed');
                        
class Bank_model extends CI_Model 
{
    public function get_bank()
    {
        return $this->db->get('master_bank')->result_array();
    }
    
    public function add_bank($data)
    {
        $this->db->insert('master_bank', $data);
    }

    public function edit_bank($data, $id)
    {
        $this->db->where('bank_id', $id);
        $this->db->update('master_bank', $data);
    }

    public function delete_bank($id)
    {
        $this->db->where('bank_id', $id);
        $this->db->delete('master_bank');
    }
                        
}


/* End of file Bank_model.php and path /application/models/Bank_model.php */
