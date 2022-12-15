<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Catatan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("dosen/pengabdian/Catatan_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['index'] = $this->Catatan_model->index();
        $this->load->view('dosen/pengabdian/pelaksanaan/catatan', $data);
    }

    public function detail($id)
    {
        $data['detail'] = $this->Catatan_model->subindex($id);
        $data['judul'] = $this->Catatan_model->judul($id);
        $this->load->view('dosen/pengabdian/pelaksanaan/subcatatan', $data);
    }

    public function add()
    {
        $id = $_POST['id'];

        $model = $this->Catatan_model;
        $validation = $this->form_validation;

        if ($validation) {
            $model->save();
            $this->session->set_flashdata('simpan', 'success');
        } else {
            $this->session->set_flashdata('gglsimpan', 'failed');
        }

        redirect('dosen/pengabdian/catatan/detail/' . $id);
    }
    
    public function delete($id)
    {
        $ids = explode('~', $id);
        $idusulan = $ids[0];
        $idcatatan = $ids[1];

        if (!isset($idcatatan)) show_404();
        if ($this->Catatan_model->delete($idcatatan)) {
            $this->session->set_flashdata('terhapus', 'success');

            redirect('dosen/pengabdian/catatan/detail/' . $idusulan);
        }
    }
}