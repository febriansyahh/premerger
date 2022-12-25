<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lembaga extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("admin/pengabdian/Lembaga_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['lembaga'] = $this->Lembaga_model->index();
        $this->load->view('admin/pengabdian/lembaga/index', $data);
    }

    public function save()
    {
        $model = $this->Lembaga_model;
        $validation = $this->form_validation;

        if ($validation) {
            $model->save();
            $this->session->set_flashdata('simpan', 'berhasil simpan');
        } else {
            $this->session->set_flashdata('gglsimpan', 'gagal simpan');
        }

        redirect('admin/pengabdian/lembaga');
    }

    public function update()
    {
        $model = $this->Lembaga_model;
        $validation = $this->form_validation;

        if ($validation) {
            $model->update();
            $this->session->set_flashdata('ubah', 'berhasil ubah');
        } else {
            $this->session->set_flashdata('gglubah', 'gagal ubah');
        }

        redirect('admin/pengabdian/lembaga');
    }

    public function delete($id)
    {
        if (!isset($id)) show_404();
        if ($this->Lembaga_model->delete($id)) {
            $this->session->set_flashdata('terhapus', 'success');
            redirect('admin/pengabdian/lembaga');
        }
    }

}