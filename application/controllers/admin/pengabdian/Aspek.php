<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aspek extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("admin/pengabdian/Aspek_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['index'] = $this->Aspek_model->index();
        $this->load->view('admin/pengabdian/aspek/index', $data);
    }

    public function tambah()
    {
        $this->load->view('admin/pengabdian/aspek/tambah');
    }

    public function save()
    {
        $model = $this->Aspek_model;
        $validation = $this->form_validation;

        if ($validation) {
            $model->save();
            $this->session->set_flashdata('simpan', 'berhasil simpan');
        }else{
            $this->session->set_flashdata('gglsimpan', 'gagal simpan');
        }

        redirect('admin/pengabdian/Aspek');
    }

    public function edit($id)
    {
        $data['edit'] = $this->Aspek_model->getbyid($id);
        $this->load->view('admin/pengabdian/aspek/edit', $data);
    }

    public function update()
    {
        $model = $this->Aspek_model;
        $validation = $this->form_validation;

        if ($validation) {
            $model->update();
            $this->session->set_flashdata('ubah', 'berhasil ubah');
        } else {
            $this->session->set_flashdata('gglubah', 'gagal ubah');
        }

        redirect('admin/pengabdian/Aspek');
    }

    public function delete($id)
    {
        if (!isset($id)) show_404();
        if ($this->Aspek_model->delete($id)) {
            $this->session->set_flashdata('terhapus', 'success');
            redirect('admin/pengabdian/Aspek');
        }
    }
}
?>