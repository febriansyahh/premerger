<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendidikan extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('level') == 'Admin' && (!$this->session->userdata('sistem') == '0' || !$this->session->userdata('sistem') == '2')) {
            redirect(base_url());
        }
        $this->load->model("admin/penelitian/Pendidikan_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['education'] =  $this->Pendidikan_model->getPendidikan();
        $this->load->view('admin/penelitian/pendidikan/view', $data);
    }

    public function savependidikan()
    {
        $model = $this->Pendidikan_model;
        $validation = $this->form_validation;

        if ($validation) {
            $model->savependidikan();
            $this->session->set_flashdata('simpan', 'simpan berhasil');
        } else {
            $this->session->set_flashdata('gglsimpan', 'simpan gagal');
        }
        redirect('admin/penelitian/pendidikan');
    }

    public function updatependidikan()
    {
        $model = $this->Pendidikan_model;
        $validation = $this->form_validation;

        if ($validation) {
            $model->updatependidikan();
            $this->session->set_flashdata('ubah', 'ubah berhasil');
        } else {
            $this->session->set_flashdata('gglubah', 'ubah gagal');
        }

        redirect('admin/penelitian/pendidikan');
    }

    public function deletependidikan($id)
    {
        if (!isset($id)) show_error('404');

        if ($this->Pendidikan_model->deletependidikan($id)) {
            $this->session->set_flashdata('terhapus', 'hapus berhasil');
        } else {
            $this->session->set_flashdata('gglhapus', 'hapus gagal');
        }

        redirect('admin/penelitian/pendidikan');
    }
}
?>