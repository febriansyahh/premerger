<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Skim extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('level') == 'Admin' && (!$this->session->userdata('sistem') == '0' || !$this->session->userdata('sistem') == '2')) {
            redirect(base_url());
        }
        $this->load->model("admin/penelitian/Skim_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['skim'] = $this->Skim_model->skim();
        $this->load->view('admin/penelitian/skim/view', $data);
    }

    public function saveskim()
    {
        $model = $this->Skim_model;
        $validation = $this->form_validation;

        if ($validation) {
            $model->saveskim();
            $this->session->set_flashdata('simpan', 'success');
        } else {
            $this->session->set_flashdata('gglsimpan', 'failed');
        }

        redirect('admin/penelitian/skim');
    }

    public function updateskim()
    {
        $model = $this->Skim_model;
        $validation = $this->form_validation;

        if ($validation) {
            $model->updateskim();
            $this->session->set_flashdata('ubah', 'success');
        } else {
            $this->session->set_flashdata('gglubah', 'failed');
        }

        redirect('admin/penelitian/skim');
    }

    public function deleteskim($id)
    {
        if (!isset($id)) show_error('404');

        if ($this->Skim_model->deleteskim($id)) {
            $this->session->set_flashdata('terhapus', 'hapus berhasil');
        } else {
            $this->session->set_flashdata('gglhapus', 'hapus gagal');
        }

        redirect('admin/penelitian/skim');
    }
}
?>