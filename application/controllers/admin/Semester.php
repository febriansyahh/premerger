<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Semester extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("super/Semester_m");
        $this->load->library('form_validation');
    }
    public function index()
    {
        
       
        $data['semester'] = $this->Semester_m->index();
        // var_dump($data['semester']);
        // exit;
        $this->load->view("super/semester", $data);
    }
    public function add()
    {
        $model = $this->Semester_m;
        $validation = $this->form_validation;

        if ($validation) {
            $model->add();
            $this->session->set_flashdata('simpan', 'success');
        }else{
            $this->session->set_flashdata('gglsimpan', 'gagal');
        }
        redirect('admin/semester');
    }
    public function delete($id)
    {
      
        if (!isset($id)) show_404();

        if ($this->Semester_m->delete($id)) {
            $this->session->set_flashdata('terhapus', 'success');
            redirect('admin/semester');
        }
    }

    public function edit($id){
        $data['smt'] = $this->Semester_m->edit($id);
        
        $this->load->view('super/editsemester', $data);
    }

    public function ubahsmt()
    {
        $post = $this->input->post();
        $id = $post['id'];
        // var_dump($id);
        // exit;
        $model = $this->Semester_m;
        $validation = $this->form_validation;
        if ($validation) {
            $model->updatesmt();
            $this->session->set_flashdata('ubah', 'Berhasil ubah');
        } else {
            $this->session->set_flashdata('gglubah', 'gagal ubah');
        }
        redirect('admin/semester/edit/' . $id);
    }

    public function nonactive($id)
    {
        
        $model = $this->Semester_m;
        $ids = $this->variasi->decode($id);
        // var_dump($ids);
        // exit;
        $validation = $this->form_validation;
        if ($validation) {
            $model->status($ids, 'nonactive');
            $this->session->set_flashdata('active', 'Berhasil ubah');
        }else{
            $this->session->set_flashdata('gglactive', 'gagal ubah');
        }
        redirect('admin/semester');
        
    }
    public function active($id)
    {
        // var_dump('aaa');
        // exit;
        $model = $this->Semester_m;
        $ids = $this->variasi->decode($id);
        $validation = $this->form_validation;
        if ($validation) {
            $model->status($ids, 'active');
            $this->session->set_flashdata('active', 'Berhasil ubah');
        } else {
            $this->session->set_flashdata('gglactive', 'gagal ubah');
        }
        redirect('admin/semester');
    }

}