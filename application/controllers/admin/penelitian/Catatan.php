<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Catatan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("admin/penelitian/Catatan_m");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['index'] = $this->Catatan_m->index();
        $this->load->view('admin/penelitian/catatan/index', $data);
    }

    public function detail($id)
    {
        $data['detail'] = $this->Catatan_m->subindex($id);
        $data['judul'] = $this->Catatan_m->judul($id);
        $this->load->view('admin/penelitian/catatan/detail', $data);
    }

}
