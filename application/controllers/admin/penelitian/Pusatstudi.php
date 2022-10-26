<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pusatstudi extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('level') == 'Admin' && (!$this->session->userdata('sistem') == '0' || !$this->session->userdata('sistem') == '2')) {
            redirect(base_url());
        }
        $this->load->model("admin/penelitian/Pusat_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['studi'] = $this->Pusat_model->pusatstudi();
        $this->load->view('admin/penelitian/pusatstudi/view', $data);
    }

    public function savepusat()
    {
        $model = $this->Pusat_model;
        $validation = $this->form_validation;

        if ($validation) {
            $model->savepusat();
            $this->session->set_flashdata('simpan', 'success');
        } else {
            $this->session->set_flashdata('gglsimpan', 'failed');
        }

        redirect('admin/penelitian/pusatstudi');
    }

    public function updatepusat()
    {
        $model = $this->Pusat_model;
        $validation = $this->form_validation;

        if ($validation) {
            $model->updatepusat();
            $this->session->set_flashdata('ubah', 'success');
        } else {
            $this->session->set_flashdata('gglubah', 'failed');
        }

        redirect('admin/penelitian/pusatstudi');
    }

    public function deletepusat($id)
    {
        if (!isset($id)) show_error('404');

        if ($this->Pusat_model->deletepusat($id)) {
            $this->session->set_flashdata('terhapus', 'hapus berhasil');
        } else {
            $this->session->set_flashdata('gglhapus', 'hapus gagal');
        }

        redirect('admin/penelitian/pusatstudi');
    }
}
?>