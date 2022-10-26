<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Progdi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('level') == 'Admin' && (!$this->session->userdata('sistem') == '0' || !$this->session->userdata('sistem') == '2')) {
            redirect(base_url());
        }
        $this->load->model("admin/penelitian/Progdi_model");
        $this->load->model("admin/penelitian/Fakultas_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['fakultas'] =  $this->Fakultas_model->getFakultas();
        $data['progdi'] =  $this->Progdi_model->getProgdi();
        $this->load->view('admin/penelitian/progdi/view', $data);
    }

    public function saveprogdi()
    {
        $model = $this->Progdi_model;
        $validation = $this->form_validation;

        if ($validation) {
            $model->saveprogdi();
            $this->session->set_flashdata('simpan', 'success');
        } else {
            $this->session->set_flashdata('gglsimpan', 'failed');
        }

        redirect('admin/penelitian/progdi');
    }

    public function updateprogdi()
    {
        $model = $this->Progdi_model;
        $validation = $this->form_validation;

        if ($validation) {
            $model->updateprogdi();
            $this->session->set_flashdata('ubah', 'ubah berhasil');
        } else {
            $this->session->set_flashdata('gglubah', 'ubah gagal');
        }

        redirect('admin/penelitian/progdi');
    }

    public function deleteprogdi($id)
    {
        if (!isset($id)) show_error('404');

        if ($this->Progdi_model->deleteprogdi($id)) {
            $this->session->set_flashdata('terhapus', 'hapus berhasil');
        } else {
            $this->session->set_flashdata('gglhapus', 'hapus gagal');
        }

        redirect('admin/penelitian/progdi');
    }
}
?>