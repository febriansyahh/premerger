<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usulan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('penelitian/Usulan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['pengajuan'] = $this->Usulan_model->getall();
        $this->load->view('dosen/penelitian/usulan/index', $data);
    }

    public function add()
    {
        $data['pusat'] = $this->Usulan_model->getpusatstudi();
        $data['skim']  = $this->Usulan_model->getskim();
        $this->load->view('dosen/penelitian/usulan/add', $data);
    }

    public function save()
    {
        $model      = $this->Usulan_model;
        $validation = $this->form_validation;

        if ($validation) {
            $model->save();
            $this->session->set_flashdata('simpan', 'success');
        }else{
            $this->session->set_flashdata('gglsimpan', 'failed');
        }

        redirect('dosen/penelitian/usulan');
    }

    public function update()
    {
        $model      = $this->Usulan_model;
        $id = $this->input->post('id');
        $usr = $this->input->post('nidn');

        $validation = $this->form_validation;

        if ($validation) {
            $model->update();
            $this->session->set_flashdata('ubah', 'success');
        }else{
            $this->session->set_flashdata('gglubah', 'failed');
        }

        redirect('dosen/penelitian/usulan/detail/' . $id .'/'. $usr);
    }

    public function detail($id, $usr)
    {
        $data['detail'] = $this->Usulan_model->detail($id, $usr);
        $data['pusat']  = $this->Usulan_model->getpusatstudi();
        $data['skim']   = $this->Usulan_model->getskim();
        $this->load->view('dosen/penelitian/usulan/detail', $data);
    }

    public function anggota($id, $usr)
    {
        $data['detanggota'] = $this->Usulan_model->detanggota($id, $usr);
        $data['internal']   = $this->Usulan_model->internal($id);
        $data['mahasiswa']  = $this->Usulan_model->mahasiswa($id);
        $data['eksternal']  = $this->Usulan_model->eksternal($id);
        $this->load->view('dosen/penelitian/usulan/anggota', $data);
    }

    public function delete($id)
    {
        if (!isset($id)) show_error('404');

        if ($this->Usulan_model->delete($id)) {
            $this->session->set_flashdata('terhapus', 'hapus berhasil');
        } else {
            $this->session->set_flashdata('gglhapus', 'hapus gagal');
        }
        redirect('dosen/penelitian/usulan');
    }

    public function revisi()
    {
        $data['revisi'] = $this->Usulan_model->revisi();
        $this->load->view('dosen/penelitian/revisi/index', $data);
    }
}
?>