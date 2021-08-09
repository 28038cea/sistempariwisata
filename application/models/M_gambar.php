<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_gambar extends CI_Model
{

    function get_data_gambar()
    {
        $data = $this->db->get('tb_lokasi')->result_array();
        return $data;
    }
    
    function get_gambar_lokasi($id)
    {
        $this->db->where('id_lokasi',$id);
        $data = $this->db->get('tb_gambar')->result_array();
        return $data;
    }

    function delete_gambar($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

}