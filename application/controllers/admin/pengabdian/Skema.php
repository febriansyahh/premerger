<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Skema extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("admin/pengabdian/Skema_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['skema'] = $this->Skema_model->index();
        $this->load->view('admin/pengabdian/skema/index', $data);
    }

    public function save()
    {
        $model = $this->Skema_model;
        $validation = $this->form_validation;

        if ($validation) {
            $model->save();
            $this->session->set_flashdata('simpan', 'berhasil simpan');
        }else{
            $this->session->set_flashdata('gglsimpan', 'gagal simpan');
        }

        redirect('admin/pengabdian/Skema');
    }

    public function update()
    {
        $model = $this->Skema_model;
        $validation = $this->form_validation;

        if ($validation) {
            $model->update();
            $this->session->set_flashdata('ubah', 'berhasil ubah');
        } else {
            $this->session->set_flashdata('gglubah', 'gagal ubah');
        }

        redirect('admin/pengabdian/Skema');
    }

    public function delete($id)
    {
        if (!isset($id)) show_404();
        if ($this->Skema_model->delete($id)) {
            $this->session->set_flashdata('terhapus', 'success');
            redirect('admin/pengabdian/skema');
        }
    }
}
