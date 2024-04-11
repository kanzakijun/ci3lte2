<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
                        
class Keranjang_model extends CI_Model 
{
    public function get_keranjang()
    {
        //$query = "SELECT `proses_keranjang`.*, `proses_pembayaran`.`pembayaran_waktu`, `proses_pembayaran`.`pembayaran_nama_pemesan`, `proses_pembayaran`.`pembayaran_no_wa`, `proses_pembayaran`.`pembayaran_alamat`, `proses_pembayaran`.`pembayaran_total`, `proses_pembayaran`.`pembayaran_status`, `master_barang`.*, `master_barang_foto`.`barang_foto_file` FROM `proses_keranjang` JOIN `proses_pembayaran` ON `proses_keranjang`.`pembayaran_id` = `proses_pembayaran`.`pembayaran_id` JOIN `master_barang` ON `proses_keranjang`.`barang_id` = `master_barang`.`barang_id` JOIN `master_barang_foto` ON `master_barang`.`barang_id` = `master_barang_foto`.`barang_id`";

        $this->db->select('proses_keranjang.*, proses_pembayaran.pembayaran_waktu, proses_pembayaran.pembayaran_nama_pemesan, proses_pembayaran.pembayaran_no_wa, proses_pembayaran.pembayaran_alamat, proses_pembayaran.pembayaran_total, proses_pembayaran.pembayaran_status, master_barang.*, master_barang_foto.barang_foto_file');
        $this->db->from('proses_keranjang');
        $this->db->join('proses_pembayaran', 'proses_keranjang.pembayaran_id = proses_pembayaran.pembayaran_id');
        $this->db->join('master_barang', 'proses_keranjang.barang_id = master_barang.barang_id');
        $this->db->join('master_barang_foto', 'master_barang.barang_id = master_barang_foto.barang_id');
        $this->db->order_by('proses_keranjang.keranjang_id', 'ASC');
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function simpan_keranjang($data_keranjang)
    {
        $this->db->insert('proses_keranjang', $data_keranjang);
    }
                        
}


/* End of file Keranjang_model.php and path /application/models/Keranjang_model.php */
