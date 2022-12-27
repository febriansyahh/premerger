<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model("admin/pengabdian/Report_m");
    }

    public function index()
    {
        // exit;
        $data['report'] = $this->Report_m->index();
        $this->load->view('admin/pengabdian/report/index', $data);
    }

   
}