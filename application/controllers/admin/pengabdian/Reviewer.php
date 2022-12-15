<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Reviewer extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("admin/pengabdian/Reviewer_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['reviewer'] = $this->Reviewer_model->index();
        $this->load->view('admin/pengabdian/reviewer/index', $data);
    }

    public function dosen()
    {
        $this->Reviewer_model->dosen();
    }

    public function add()
    {
        $model = $this->Reviewer_model;
        $validation = $this->form_validation;

        if ($validation) {
            $model->save();
            $this->session->set_flashdata('simpan', 'success');
        }else{
            $this->session->set_flashdata('gglsimpan', 'success');
        }

        redirect('admin/pengabdian/reviewer');
    }

    public function actived($id)
    {
        $validation = $this->form_validation;
        if ($validation) {
            $this->Reviewer_model->actived($id);
            $this->session->set_flashdata('active', 'success');
        } else {
            $this->session->set_flashdata('gglactive', 'failed');
        }
        redirect('admin/pengabdian/reviewer');
    }

    public function nonactived($id)
    {
        $validation = $this->form_validation;
        if ($validation) {
            $this->Reviewer_model->nonactived($id);
            $this->session->set_flashdata('nonactive', 'success');
        } else {
            $this->session->set_flashdata('gglnonactive', 'failed');
        }
        redirect('admin/pengabdian/reviewer');
    }

    public function delete($id)
    {
        if (!isset($id)) show_404();
        if ($this->Reviewer_model->delete($id)) {
            $this->session->set_flashdata('terhapus', 'success');
            redirect('admin/pengabdian/reviewer');
        }
    }
}