<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Status extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('level') == 'Admin' && (!$this->session->userdata('sistem') == '0' || !$this->session->userdata('sistem') == '2')) {
            redirect(base_url());
        }
        $this->load->model("admin/penelitian/Status_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['status'] = $this->Status_model->status();
        $this->load->view('admin/penelitian/status/view', $data);
    }

    public function savestatus()
    {
        $model = $this->Status_model;
        $validation = $this->form_validation;

        if ($validation) {
            $model->savestatus();
            $this->session->set_flashdata('simpan', 'success');
        } else {
            $this->session->set_flashdata('gglsimpan', 'failed');
        }
        redirect('admin/penelitian/status');
    }

    public function updatestatus()
    {
        $model = $this->Status_model;
        $validation = $this->form_validation;

        if ($validation) {
            $model->updatestatus();
            $this->session->set_flashdata('ubah', 'success');
        } else {
            $this->session->set_flashdata('gglubah', 'failed');
        }
        redirect('admin/penelitian/status');
    }

    public function deletestatus($id)
    {
        if (!isset($id)) show_error('404');

        if ($this->Status_model->deletestatus($id)) {
            $this->session->set_flashdata('terhapus', 'hapus berhasil');
        } else {
            $this->session->set_flashdata('gglhapus', 'hapus gagal');
        }
        redirect('admin/penelitian/status');
    }
}

?>