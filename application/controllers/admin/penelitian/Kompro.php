<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kompro extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('level') == 'Admin' && (!$this->session->userdata('sistem') == '0' || !$this->session->userdata('sistem') == '2')) {
            redirect(base_url());
        }
        $this->load->model("admin/penelitian/Kompro_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['komponen'] = $this->Kompro_model->kompro();
        $this->load->view('admin/penelitian/kompro/view', $data);
    }

    public function addkompro()
    {
        $this->load->view('admin/penelitian/kompro/addkompro');
    }

    public function savekompro()
    {
        $model = $this->Kompro_model;
        $validation = $this->form_validation;

        if ($validation) {
            $model->savekompro();
            $this->session->set_flashdata('simpan', 'success');
        } else {
            $this->session->set_flashdata('gglsimpan', 'failed');
        }
        redirect('admin/penelitian/kompro');
    }

    public function editkompro($id)
    {
        $data['kompro'] = $this->Kompro_model->editkompro($id);
        $this->load->view('admin/penelitian/kompro/editkompro', $data);
    }

    public function updatekompro()
    {
        $model = $this->Kompro_model;
        $validation = $this->form_validation;

        if ($validation) {
            $model->updatekompro();
            $this->session->set_flashdata('ubah', 'success');
        } else {
            $this->session->set_flashdata('gglubah', 'failed');
        }
        redirect('admin/penelitian/kompro');
    }

    public function deletekompro($id)
    {
        if (!isset($id)) show_error('404');

        if ($this->Kompro_model->deletekompro($id)) {
            $this->session->set_flashdata('terhapus', 'hapus berhasil');
        } else {
            $this->session->set_flashdata('gglhapus', 'hapus gagal');
        }

        redirect('admin/penelitian/kompro');
    }
}
?>