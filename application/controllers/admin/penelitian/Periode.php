<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Periode extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('level') == 'Admin' && (!$this->session->userdata('sistem') == '0' || !$this->session->userdata('sistem') == '2')) {
            redirect(base_url());
        }
        $this->load->model("admin/penelitian/Periode_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['periode'] = $this->Periode_model->periode();
        $this->load->view('admin/penelitian/periode/view', $data);
    }

    public function updateperiode()
    {
        $model = $this->Periode_model;
        $validation = $this->form_validation;

        if ($validation) {
            $model->updateperiode();
            $this->session->set_flashdata('ubah', 'success');
        } else {
            $this->session->set_flashdata('gglubah', 'failed');
        }
        redirect('admin/penelitian/periode');
    }
}
?>