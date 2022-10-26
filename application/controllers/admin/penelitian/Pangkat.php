<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pangkat extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('level') == 'Admin' && (!$this->session->userdata('sistem') == '0' || !$this->session->userdata('sistem') == '2')) {
            redirect(base_url());
        }
        $this->load->model("admin/penelitian/Pangkat_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['pangkat'] = $this->Pangkat_model->pangkat();
        $this->load->view('admin/penelitian/pangkat/view', $data);
    }

    public function savepangkat()
    {
        $model = $this->Pangkat_model;
        $validation = $this->form_validation;

        if ($validation) {
            $model->savepangkat();
            $this->session->set_flashdata('simpan', 'success');
        } else {
            $this->session->set_flashdata('gglsimpan', 'failed');
        }

        redirect('admin/penelitian/pangkat');
    }

    public function updatepangkat()
    {
        $model = $this->Pangkat_model;
        $validation = $this->form_validation;

        if ($validation) {
            $model->updatepangkat();
            $this->session->set_flashdata('ubah', 'success');
        } else {
            $this->session->set_flashdata('gglubah', 'failed');
        }

        redirect('admin/penelitian/pangkat');
    }

    public function deletepangkat($id)
    {
        if (!isset($id)) show_error('404');

        if ($this->Pangkat_model->deletepangkat($id)) {
            $this->session->set_flashdata('terhapus', 'hapus berhasil');
        } else {
            $this->session->set_flashdata('gglhapus', 'hapus gagal');
        }

        redirect('admin/penelitian/pangkat');
    }
}
?>