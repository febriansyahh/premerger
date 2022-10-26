<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Luaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('level') == 'Admin' && (!$this->session->userdata('sistem') == '0' || !$this->session->userdata('sistem') == '2')) {
            redirect(base_url());
        }
        $this->load->model("admin/penelitian/Luaran_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['luaran'] = $this->Luaran_model->getLuaran();
        $this->load->view('admin/penelitian/luaran/view', $data);
    }

    public function saveluaran()
    {
        $model = $this->Luaran_model;
        $validation = $this->form_validation;

        if ($validation) {
            $model->saveluaran();
            $this->session->set_flashdata('simpan', 'success');
        } else {
            $this->session->set_flashdata('gglsimpan', 'failed');
        }

        redirect('admin/penelitian/luaran');
    }

    public function updateluaran()
    {
        $model = $this->Luaran_model;
        $validation = $this->form_validation;

        if ($validation) {
            $model->updateluaran();
            $this->session->set_flashdata('ubah', 'success');
        } else {
            $this->session->set_flashdata('gglubah', 'failed');
        }

        redirect('admin/penelitian/luaran');
    }

    public function deleteluaran($id)
    {
        if (!isset($id)) show_error('404');

        if ($this->Luaran_model->deleteluaran($id)) {
            $this->session->set_flashdata('terhapus', 'hapus berhasil');
        } else {
            $this->session->set_flashdata('gglhapus', 'hapus gagal');
        }

        redirect('admin/penelitian/luaran');
    }
}
?>