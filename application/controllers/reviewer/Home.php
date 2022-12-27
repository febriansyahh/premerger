<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('level')) redirect(base_url());
        $this->load->model('reviewer/pengabdian/Usulan_model');
    }

    public function index()
    {
        if ($this->session->userdata('level')) {
            $array_item = array('level' => 'abreviewer');
            $this->session->set_userdata($array_item);
            $data['jmlh'] = $this->Usulan_model->jmlhindex();

            $this->load->view("reviewer/homepage", $data);
        } else {
            $this->session->sess_destroy();
            redirect(base_url());
        }
    }
}
