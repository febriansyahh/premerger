<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Catatan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("admin/pengabdian/Catatan_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['index'] = $this->Catatan_model->index();
        $this->load->view('admin/pengabdian/catatan/index', $data);
    }

    public function detail($id)
    {
        $data['detail'] = $this->Catatan_model->subindex($id);
        $data['judul'] = $this->Catatan_model->judul($id);
        $this->load->view('admin/pengabdian/catatan/detail', $data);
    }

}
