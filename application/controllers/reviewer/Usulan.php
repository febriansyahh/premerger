<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usulan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("reviewer/pengabdian/Usulan_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['usulan'] = $this->Usulan_model->index();
        $this->load->view('reviewer/pengabdian/index', $data);
    }

    public function detail($id)
    {
        $data['data'] = $this->Usulan_model->getbyid($id);
        $data['anggota'] = $this->Usulan_model->getanggotabyid($id);
        $data['anggotaeks'] = $this->Usulan_model->getanggotaeksbyid($id);
        $this->load->view('reviewer/pengabdian/detail', $data);
    }

    public function review($id)
    {
        $data['data'] = $this->Usulan_model->review($id);
        $data['aspek'] = $this->Usulan_model->aspek();
        $data['periode'] = $this->Usulan_model->periode();
        $this->load->view('reviewer/pengabdian/review', $data);
    }

    public function addreview()
    {
        $model = $this->Usulan_model;
        $validation = $this->form_validation;

        if ($validation) {
            $model->add();
            $this->session->set_flashdata('review', 'success');
        }else{
            $this->session->set_flashdata('gglreview', 'failed');
        }

        redirect('reviewer/usulan/');
    }
}