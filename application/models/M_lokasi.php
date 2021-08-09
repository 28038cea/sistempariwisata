<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_lokasi extends CI_Model
{

function get_total_lokasi()
    {

        $sql = $this->db->query('SELECT COUNT(*) AS Lokasi FROM tb_lokasi');

        return $sql->result();
    }
  
    function get_data_lokasi()
    {
        $data = $this->db->get('tb_lokasi')->result_array();
        return $data;
    }

    function get_data_lokasibyid($id)
    {
        $this->db->where('id_lokasi',$id);
        $data = $this->db->get('tb_lokasi')->row_array();
        return $data; 
    }
    
}