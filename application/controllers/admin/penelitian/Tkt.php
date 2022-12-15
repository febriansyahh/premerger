<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tkt extends CI_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model("admin/penelitian/Tkt_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        
        $data['index'] = $this->Tkt_model->index();
        $data['sbk'] = $this->Tkt_model->sbk();
        $this->load->view('admin/penelitian/tkt/view', $data);
    }

    public function save()
    {
        $model = $this->Tkt_model;
        $validation = $this->form_validation;

        if ($validation) {
            $model->save();
            $this->session->set_flashdata('simpan', 'berhasil simpan');
        } else {
            $this->session->set_flashdata('gglsimpan', 'gagal simpan');
        }

        redirect('admin/penelitian/tkt');
    }

    public function update()
    {
        $model = $this->Tkt_model;
        $validation = $this->form_validation;

        if ($validation) {
            $model->update();
            $this->session->set_flashdata('ubah', 'berhasil ubah');
        } else {
            $this->session->set_flashdata('gglubah', 'gagal ubah');
        }

        redirect('admin/penelitian/tkt');
    }

    public function delete($id)
    {
        if (!isset($id)) show_404();
        if ($this->Tkt_model->delete($id)) {
            $this->session->set_flashdata('terhapus', 'success');
            redirect('admin/penelitian/tkt');
        }
    }
}
?>