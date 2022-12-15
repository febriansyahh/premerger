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

    public function child($id)
    {
        $data['parent'] = $this->Skema_model->parent($id);
        $data['child'] = $this->Skema_model->child($id);
        $this->load->view('admin/pengabdian/skema/child', $data);
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

    public function savechild()
    {
        $id = $_POST['parent'];
        $ids = $this->variasi->encode($id);
        $model = $this->Skema_model;
        $validation = $this->form_validation;

        if ($validation) {
            $model->savechild();
            $this->session->set_flashdata('simpan', 'berhasil simpan');
        }else{
            $this->session->set_flashdata('gglsimpan', 'gagal simpan');
        }

        redirect('admin/pengabdian/Skema/child/' .$ids);
    }

    public function update()
    {
        $parent = $_POST['parent'];
        $model = $this->Skema_model;
        $validation = $this->form_validation;

        if ($validation) {
            $model->update();
            $this->session->set_flashdata('ubah', 'berhasil ubah');
        } else {
            $this->session->set_flashdata('gglubah', 'gagal ubah');
        }

        if ($parent == '0') {
            redirect('admin/pengabdian/Skema');
        }else{
            redirect('admin/pengabdian/Skema/child/' . $this->variasi->encode($parent));
        }
    }

    public function delete($id)
    {
        if (!isset($id)) show_404();
        if ($this->Skema_model->delete($id)) {
            $this->session->set_flashdata('terhapus', 'success');
            redirect('admin/pengabdian/Skema');
        }
    }

    public function deletechild($id)
    {
        $exp = explode('~', $id);
        $parent = $this->variasi->encode($exp[1]);
        if (!isset($id)) show_404();
        if ($this->Skema_model->delete($id)) {
            $this->session->set_flashdata('terhapus', 'success');
            redirect('admin/pengabdian/Skema/child/' .$parent);
        }
    }
}
