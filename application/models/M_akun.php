<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_akun extends CI_Model
{
    function get_data_akun()
    {
        $data = $this->db->get('data_akun')->result_array();
        return $data;
    }
    function get_data_akun_admin()
    {
        $this->db->where('role_id', 1);
        $data = $this->db->get('data_akun')->result_array();
        return $data;
    }
    function get_data_akun_user()
    {
        $this->db->where('role_id', 2);
        $data = $this->db->get('data_akun')->result_array();
        return $data;
    }
    function save_akun($post)
    {
        $config = array(
            'allowed_types' => 'jpg|jpeg|png',
            'upload_path' => 'media/images/profile',
            'encrypt_name' => true
        );
        $this->load->library('upload', $config);
        $this->upload->do_upload('fileprofile');

        if ($_FILES['fileprofile']['error'] == 4) {
            $namaprofile = "default.png";
        } else {
            // $namaprofile = str_replace(" ","_", $_FILES['fileprofile']['name']);
            $namaprofile = $this->upload->data("file_name");
        }

        $data = array(
            'email' => $post['email'],
            'password' => password_hash($post['password'], PASSWORD_DEFAULT),
            'role_id' => $post['role_id'],
            'aktif' => $post['aktif'],
            'profile' => $namaprofile,
        );
        $this->db->insert('data_akun', $data);
    }
    function save_update_akun($post)
    {
        $config = array(
            'allowed_types' => 'jpg|jpeg|gif|png|bmp',
            'upload_path' => realpath('./media/images/profile'),

        );
        $this->load->library('upload', $config);
        $this->upload->do_upload();
        $data = array(
            'email' => $post['email'],
            //'password' => $post['password'],
            'role_id' => $post['role_id'],
            'aktif' => $post['aktif'],
            'profile' => $_FILES['fileprofile']['name'],
        );
        $this->db->where('md5(id_akun)', $post['id_akun']);
        $this->db->update('data_akun', $data);
    }
    function delete_akun($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    function get_total_akun()
    {
        $sql = $this->db->query('SELECT COUNT(*) AS akun FROM data_akun');
        return $sql->result();
    }
    function get_profile()
    {
        $this->db->join('data_pegawai', 'data_pegawai.akun_id=data_akun.id_akun');
        $this->db->join('data_tamu', 'data_tamu.akun_id=data_akun.id_akun');
        $this->db->where('id_akun', $this->session->userdata('id_akun'));
        $data = $this->db->get('data_akun')->row_array();
        return $data;
    }
    function get_md_role()
    {
        $data = $this->db->get('md_role')->result_array();
        return $data;
    }
    function save_role($post)
    {
        $data = array(
            'role' => $post['role'],
        );
        $this->db->insert('md_role', $data);
    }
    function save_update_role($post)
    {
        $data = array(
            'role' => $post['role'],
        );
        $this->db->where('md5(id_role)', $post['id_role']);
        $this->db->update('md_role', $data);
    }
    function delete_role($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

}
