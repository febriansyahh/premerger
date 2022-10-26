<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
		$this->load->model("admin/pengabdian/Jabatan_model");
		$this->load->library('form_validation');
    }

    public function index()
    {
        $data['result'] = $this->Jabatan_model->index();
        $this->load->view("admin/pengabdian/jabatan/jabatan", $data);
    }

    public function add()
    {
        $model = $this->Jabatan_model;
        $validation = $this->form_validation;

        if ($validation) {
            $model->add();
            $this->session->set_flashdata('simpan', 'success');
        }else{
            $this->session->set_flashdata('gglsimpan', 'gagal');
        }
        redirect('admin/pengabdian/jabatan');
    }

    public function edit()
    {
        $model = $this->Jabatan_model;
        $validation = $this->form_validation;
        
        if ($validation) {
            $model->edit();
            $this->session->set_flashdata('ubah', 'Berhasil ubah');
        } else {
            $this->session->set_flashdata('gglubah', 'gagal ubah');
        }
        redirect('admin/pengabdian/jabatan');
    }

    public function delete($id)
    {
      
        if (!isset($id)) show_404();

        if ($this->Jabatan_model->delete($id)) {
            $this->session->set_flashdata('terhapus', 'success');
            redirect('admin/pengabdian/jabatan');
        }
    }

    public function lpm()
    {
        $data['jabatan'] = $this->Jabatan_model->getJabatanLPM();
        $this->load->view('admin/pengabdian/jabatan/jabatanlpm', $data);
    }

    public function addlpm()
    {
        $model = $this->Jabatan_model;
        $validation = $this->form_validation;

        if ($validation) {
            $model->addlpm();
            $this->session->set_flashdata('simpan', 'success');
        } else {
            $this->session->set_flashdata('gglsimpan', 'gagal');
        }
        redirect('admin/pengabdian/jabatan/lpm');
    }

    public function editjabatan($id)
    {
        $data['lpm'] = $this->Jabatan_model->getLpm($id);
        $this->load->view('admin/pengabdian/jabatan/editjabatanlpm', $data);

    }

    public function ubahlpm()
    {
        $post = $this->input->post();
        $id = $post['id'];
        $model = $this->Jabatan_model;
        $validation = $this->form_validation;
        if ($validation) {
            $model->updatelpm();
            $this->session->set_flashdata('ubah', 'Berhasil ubah');
        }else{
            $this->session->set_flashdata('gglubah', 'gagal ubah');
        }
        redirect('admin/pengabdian/Jabatan/editjabatan/' . $id);
    }

    public function dosen()
    {
        $this->Jabatan_model->listdosen();
    }

    public function nonactive($id)
    {
        $model = $this->Jabatan_model;
        $ids = $this->variasi->decode($id);
        $validation = $this->form_validation;
        if ($validation) {
            $model->status($ids, 0);
            $this->session->set_flashdata('active', 'Berhasil ubah');
        }else{
            $this->session->set_flashdata('gglactive', 'gagal ubah');
        }
        redirect('admin/pengabdian/jabatan/lpm');
        
    }

    public function active($id)
    {
        $model = $this->Jabatan_model;
        $ids = $this->variasi->decode($id);
        $validation = $this->form_validation;
        if ($validation) {
            $model->status($ids, 1);
            $this->session->set_flashdata('active', 'Berhasil ubah');
        } else {
            $this->session->set_flashdata('gglactive', 'gagal ubah');
        }
        redirect('admin/pengabdian/jabatan/lpm');
    }
}

?>