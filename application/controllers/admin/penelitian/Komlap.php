<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Komlap extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('level') == 'Admin' && (!$this->session->userdata('sistem') == '0' || !$this->session->userdata('sistem') == '2')) {
            redirect(base_url());
        }
        $this->load->model("admin/penelitian/Komlap_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['komponen'] = $this->Komlap_model->komlap();
        $this->load->view('admin/penelitian/komlap/view', $data);
    }

    public function addkomlap()
    {
        $this->load->view('admin/penelitian/komlap/addkomlap');
    }

    public function savekomlap()
    {
        $model = $this->Komlap_model;
        $validation = $this->form_validation;

        if ($validation) {
            $model->savekomlap();
            $this->session->set_flashdata('simpan', 'success');
        } else {
            $this->session->set_flashdata('gglsimpan', 'failed');
        }
        redirect('admin/penelitian/komlap');
    }

    public function editkomlap($id)
    {
        $data['kompro'] = $this->Komlap_model->editkomlap($id);
        $this->load->view('admin/penelitian/komlap/editkomlap', $data);
    }

    public function updatekomlap()
    {
        $model = $this->Komlap_model;
        $validation = $this->form_validation;

        if ($validation) {
            $model->updatekomlap();
            $this->session->set_flashdata('ubah', 'success');
        } else {
            $this->session->set_flashdata('gglubah', 'failed');
        }
        redirect('admin/penelitian/komlap');
    }

    public function deletekomlap($id)
    {
        if (!isset($id)) show_error('404');

        if ($this->Komlap_model->deletekomlap($id)) {
            $this->session->set_flashdata('terhapus', 'hapus berhasil');
        } else {
            $this->session->set_flashdata('gglhapus', 'hapus gagal');
        }

        redirect('admin/penelitian/komlap');
    }
}
?>