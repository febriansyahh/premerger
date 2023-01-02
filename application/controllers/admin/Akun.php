<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akun extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("super/Akun_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['result'] = $this->Akun_model->index();
        $this->load->view("super/akun/index", $data);
    }

    public function add()
    {
        $this->load->view("super/akun/akun_tambah");
    }

    public function save()
    {
        $model = $this->Akun_model;
        $validation = $this->form_validation;

        if ($validation) {
            $model->save();
            $this->session->set_flashdata('simpan', 'Berhasil simpan');
        }else{
            $this->session->set_flashdata('gglsimpan', 'gagal simpan');
        }
        redirect('admin/Akun');
    }

    public function reset()
    {
        $model = $this->Akun_model;
        $validation = $this->form_validation;
        if ($validation) {
            $model->reset();
            $this->session->set_flashdata('reset', 'Berhasil simpan');
        }else{
            $this->session->set_flashdata('gglreset', 'Berhasil simpan');
        }
        redirect('admin/Akun');
    }

    public function delete($id)
    {
        $model = $this->Akun_model;
        $ids = $this->variasi->decode($id);
        $validation = $this->form_validation;
        if ($validation) {
            $model->delete($ids);
            $this->session->set_flashdata('delete', 'Berhasil hapus');
        } else {
            $this->session->set_flashdata('ggldelete', 'gagal hapus');
        }
        redirect('admin/Akun');
    }

    public function getkode()
    {
        $this->Akun_model->getkode();
    }
}
?>