<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("dosen/pengabdian/Anggota_model");
        $this->load->library('form_validation');
    }
    
    public function index()
    {
        if ($this->session->userdata('level') != 'dosen') {
            redirect('Home');
        }
        
        $data['anggota'] = $this->Anggota_model->index();
        $this->load->view('dosen/pengabdian/anggota/index', $data);
    }

    public function detail($id)
    {
        $data['data'] = $this->Anggota_model->detail($id);
        $data['hibah'] = $this->Anggota_model->hibah($id);
        $data['anggota'] = $this->Anggota_model->anggota($id);
        $this->load->view('dosen/pengabdian/anggota/detail', $data);
    }
}
?>