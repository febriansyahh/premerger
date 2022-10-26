<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fakultas extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('level') == 'Admin' && (!$this->session->userdata('sistem') == '0' || !$this->session->userdata('sistem') == '2')) {
            redirect(base_url());
        }
        $this->load->model("admin/penelitian/Fakultas_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['fakultas'] =  $this->Fakultas_model->getFakultas();
        $this->load->view('admin/penelitian/fakultas/view', $data);
    }

    public function savefakultas()
    {
        $model = $this->Fakultas_model;
        $validation = $this->form_validation;

        if ($validation) {
            $model->savefakultas();
            $this->session->set_flashdata('simpan', 'simpan berhasil');
        } else {
            $this->session->set_flashdata('gglsimpan', 'simpan gagal');
        }
        redirect('admin/penelitian/fakultas');
    }

    public function updatefakultas()
    {
        $model = $this->Fakultas_model;
        $validation = $this->form_validation;

        if ($validation) {
            $model->updatefakultas();
            $this->session->set_flashdata('ubah', 'ubah berhasil');
        } else {
            $this->session->set_flashdata('gglubah', 'ubah gagal');
        }

        redirect('admin/penelitian/fakultas');
    }

    public function deletefakultas($id)
    {
        if (!isset($id)) show_error('404');

        if ($this->Fakultas_model->deletefakultas($id)) {
            $this->session->set_flashdata('terhapus', 'hapus berhasil');
        } else {
            $this->session->set_flashdata('gglhapus', 'hapus gagal');
        }

        redirect('admin/penelitian/fakultas');
    }
}