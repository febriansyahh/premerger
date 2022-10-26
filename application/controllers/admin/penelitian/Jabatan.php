<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('level') == 'Admin' && (!$this->session->userdata('sistem') == '0' || !$this->session->userdata('sistem') == '2')) {
            redirect(base_url());
        }
        $this->load->model("admin/penelitian/Jabatan_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['jabatan'] = $this->Jabatan_model->jabatan();
        $this->load->view('admin/penelitian/jabatan/view', $data);
    }

    public function savejabatan()
    {
        $model = $this->Jabatan_model;
        $validation = $this->form_validation;

        if ($validation) {
            $model->savejabatan();
            $this->session->set_flashdata('simpan', 'success');
        } else {
            $this->session->set_flashdata('gglsimpan', 'failed');
        }

        redirect('admin/penelitian/jabatan');
    }

    public function updatejabatan()
    {
        $model = $this->Jabatan_model;
        $validation = $this->form_validation;

        if ($validation) {
            $model->updatejabatan();
            $this->session->set_flashdata('ubah', 'success');
        } else {
            $this->session->set_flashdata('gglubah', 'failed');
        }

        redirect('admin/penelitian/jabatan');
    }

    public function deletejabatan($id)
    {
        if (!isset($id)) show_error('404');

        if ($this->Jabatan_model->deletejabatan($id)) {
            $this->session->set_flashdata('terhapus', 'hapus berhasil');
        } else {
            $this->session->set_flashdata('gglhapus', 'hapus gagal');
        }

        redirect('admin/penelitian/jabatan');
    }
}
?>