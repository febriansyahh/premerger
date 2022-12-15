<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Periode extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("admin/pengabdian/Periode_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['usulan'] = $this->Periode_model->usulan();
        $data['reviewer'] = $this->Periode_model->review();
        $this->load->view('admin/pengabdian/periode/index', $data);
    }

    public function setting()
    {
        $model = $this->Periode_model;
        $validation = $this->form_validation;

        if ($validation) {
            $model->setting();
            $this->session->set_flashdata('simpan', 'succes');
        }else{
            $this->session->set_flashdata('gglsimpan', 'failed');
        }

        redirect('admin/pengabdian/periode');
    }

    
}
