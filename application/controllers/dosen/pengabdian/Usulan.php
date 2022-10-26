<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usulan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("dosen/pengabdian/Usulan_model");
        $this->load->model("dosen/pengabdian/Anggota_model");

        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['usulan'] = $this->Usulan_model->index();
        $this->load->view('dosen/pengabdian/usulan/index', $data);
    }

    public function detail($id)
    {
        $data['data'] = $this->Usulan_model->detail($id);
        $data['hibah'] = $this->Usulan_model->hibah($id);
        $data['anggota'] = $this->Usulan_model->anggota($id);
        $this->load->view('dosen/pengabdian/usulan/detail', $data);
    }
}
?>