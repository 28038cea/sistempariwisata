<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_akun');
        $this->load->model('M_lokasi');
        $this->load->model('M_gambar');
    }

    public function index()
    {
        $data['title'] = "Beranda";
        $data['akun'] = $this->M_akun->get_total_akun();
        $this->load->view('admin/module', $data);
    }
    function profile()
    {
        $data['title'] = "Profile";

        $this->db->where('id_akun', $this->session->userdata('id_akun'));
        $data['akun'] = $this->db->get('data_akun')->row_array();
        $data['profile'] = $this->M_akun->get_profile();
        $this->load->view('admin/page_profile', $data);
    }

    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function akun()
    {
        $data['title'] = "Akun";
        $data['bab'] = "Akun";
        $data['sub'] = "Tabel Data Akun";
        $data['akun'] = $this->M_akun->get_data_akun();

        $this->form_validation->set_rules('email', 'Email', 'required');
        //$this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('role_id', 'Role', 'required');
        $this->form_validation->set_rules('aktif', 'Aktif', 'required');
        //$this->form_validation->set_rules('profile', 'Profile', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('admin/akun', $data);
        } else {
            if ($_POST['id_akun'] != '') {
                $this->M_akun->save_update_akun($_POST);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Akun berhasil diubah.</div>');
            } else {
                // print_r($_FILES);die;
                $this->M_akun->save_akun($_POST);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Akun berhasil ditambahakan.</div>');
            }
            redirect('admin/akun');
        }
    }
    public function delete_akun($id_akun)
    {
        $where = array('md5(id_akun)' => $id_akun);
        $this->M_akun->delete_akun($where, 'data_akun');
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Akun berhasil dihapus.</div>');
        redirect('admin/akun');
    }
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function role()
    {
        $data['title'] = "Akun";
        $data['bab'] = "Role";
        $data['sub'] = "Tabel Role";
        $data['role'] = $this->M_akun->get_md_role();

        $this->form_validation->set_rules('role', 'Role', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('admin/role', $data);
        } else {
            if ($_POST['id_role'] != '') {
                $this->M_akun->save_update_role($_POST);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Role berhasil diubah.</div>');
            } else {
                $this->M_akun->save_role($_POST);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Role berhasil ditambahakan.</div>');
            }
            redirect('admin/role');
        }
    }
    public function delete_role($id_role)
    {
        $where = array('md5(id_role)' => $id_role);
        $this->M_akun->delete_role($where, 'md_role');
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Role berhasil dihapus.</div>');
        redirect('admin/role');
    }
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function lokasi()
    {
        $data['title'] = "Lokasi";
        $data['bab'] = "Lokasi";
        $data['sub'] = "Tabel Data Lokasi";
        $data['lokasi'] = $this->M_lokasi->get_data_lokasi();
        $this->load->view('admin/lokasi', $data);
    }

    public function detail_lokasi($id = 0)
    {
        $data['title'] = 'Detail Lokasi';
        $data['bab'] = "Lokasi";
        $data['sub'] = "Detail Lokasi";
        $data['lokasi'] = $this->M_lokasi->get_data_lokasibyid($id);
        $data['gambar'] = $this->M_gambar->get_gambar_lokasi($id);
        $this->load->view('admin/detail_lokasi', $data);
    }

    public function edit_lokasi($id = 0)
    {
        $data['title'] = 'Edit Lokasi';
        $data['bab'] = "Edit Lokasi";
        $data['lokasi'] = $this->M_lokasi->get_data_lokasibyid($id);
        $this->load->view('admin/edit_lokasi', $data);
    }

    public function update_lokasi($id = 0)
    {
        $this->db->set('title', $this->input->post('title'));
        $this->db->set('body', $this->input->post('body'));
        $this->db->set('deskripsi', $this->input->post('deskripsi'));
        $this->db->where('id_lokasi', $id);
        $this->db->update('tb_lokasi');

        $this->session->set_flashdata('alert', 'success cuk');
        redirect('admin/edit_lokasi/' . $id);
    }

    public function tinymce_upload()
    {
        $path = './uploads/';
        if (!is_dir('uploads')) {
            mkdir('./uploads', 0777, true);
        }
        $config['upload_path']        = $path;
        $config['allowed_types']    = 'jpg|png|jpeg';
        $config['overwrite']        = TRUE;
        $config['max_size']            = 0;
        $config['max_width']        = 0;
        $config['max_height']        = 0;
        $config['file_ext_tolower']    = TRUE;
        $config['remove_spaces']    = TRUE;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('file')) {
            $this->output->set_header('HTTP/1.0 500 Server Error');
            exit;
        } else {
            $file = $this->upload->data();
            $this->output
                ->set_content_type('application/json', 'utf-8')
                ->set_output(json_encode(['location' => base_url('uploads/' . $file['file_name'])]))
                ->_display();
            exit;
        }
    }

    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function tambah_gambar_lokasi()
    {
        // print_r($_FILES['filemedia']);die;
        $count = count($_FILES['filemedia']['name']);

        for ($i = 0; $i < $count; $i++) {
            $input = [
                'id_lokasi' => $_POST['id_lokasi'],
                'gambar' => $_FILES['filemedia']['name'][$i]
            ];
            $this->db->insert('tb_gambar', $input);

            $_FILES['file']['name'] = $_FILES['filemedia']['name'][$i];
            $_FILES['file']['type'] = $_FILES['filemedia']['type'][$i];
            $_FILES['file']['tmp_name'] = $_FILES['filemedia']['tmp_name'][$i];
            $_FILES['file']['error'] = $_FILES['filemedia']['error'][$i];
            $_FILES['file']['size'] = $_FILES['filemedia']['size'][$i];

            $config['upload_path'] = 'media/images/gambar_lokasi';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['file_name'] = $_FILES['filemedia']['name'][$i];

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('file')) {
                $uploadData = $this->upload->data();
                $filename = $uploadData['file_name'];
            } else {
                echo $this->upload->display_errors();
            }
        }
        redirect('admin/detail_lokasi/' . $_POST['id_lokasi']);
    }


    public function delete_gambar($id_gambar)
    {
        $file = $this->db->get_where('tb_gambar', ['md5(id_gambar)' => $id_gambar])->row_array();
        // print_r($file);die;

        $where = array('md5(id_gambar)' => $id_gambar);
        $this->M_gambar->delete_gambar($where, 'tb_gambar');
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">gambar berhasil dihapus.</div>');
        redirect('admin/detail_lokasi/' . $file['id_lokasi']);
    }
}
