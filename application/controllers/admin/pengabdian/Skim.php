<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Skim extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("admin/pengabdian/Skim_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
       $data['skim'] = $this->Skim_model->index();
       $data['jabatan'] = $this->Skim_model->jabatan();
       $this->load->view('admin/pengabdian/skim/index', $data);
    }

    public function save()
    {
        $model = $this->Skim_model;
        $validation = $this->form_validation;

        if ($validation) {
            $model->save();
            $this->session->set_flashdata('simpan', 'berhasil simpan');
        }else{
            $this->session->set_flashdata('gglsimpan', 'gagal simpan');
        }

        redirect('admin/pengabdian/Skim');
    }

    public function edit($id)
    {
        $data['skim'] = $this->Skim_model->getbyid($id);
        $data['jabatan'] = $this->Skim_model->jabatan();
        $this->load->view('admin/pengabdian/Skim/edit', $data);
    }

    public function update()
    {
        $model = $this->Skim_model;
        $validation = $this->form_validation;
        $id = $this->input->post('id');

        if ($validation) {
            $model->update();
            $this->session->set_flashdata('ubah', 'berhasil ubah');
        }else{
            $this->session->set_flashdata('gglubah', 'gagal ubah');
        }
        
        redirect('admin/pengabdian/Skim/edit/' . $id);
    }

    public function delete($id)
    {
        if (!isset($id)) show_404();
        if ($this->Skim_model->delete($id)) {
            $this->session->set_flashdata('terhapus', 'success');
            redirect('admin/pengabdian/Skim');
        }
    }
}