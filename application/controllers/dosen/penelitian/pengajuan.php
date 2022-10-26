<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajuan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('penelitian/pengajuan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['pengajuan'] = $this->pengajuan_model->getall();
        $this->load->view('dosen/penelitian/pengajuan/index', $data);
    }

    // Untuk admin
    // public function list()
    // {
    //     $data['list'] = $this->pengajuan_model->getalllist();
    //     $this->load->view('penelitian/pengajuan/list', $data);
    // }

    public function add()
    {
        $data['pusat'] = $this->pengajuan_model->getpusatstudi();
        $data['skim']  = $this->pengajuan_model->getskim();
        $this->load->view('dosen/penelitian/pengajuan/add', $data);
    }

    public function save()
    {
        $model      = $this->pengajuan_model;
        $validation = $this->form_validation;

        if ($validation) {
            $model->save();
            $this->session->set_flashdata('simpan', 'success');
        }else{
            $this->session->set_flashdata('gglsimpan', 'failed');
        }

        redirect('dosen/penelitian/pengajuan');
    }

    public function update()
    {
        $model      = $this->pengajuan_model;
        $id = $this->input->post('id');
        $usr = $this->input->post('nidn');

        $validation = $this->form_validation;

        if ($validation) {
            $model->update();
            $this->session->set_flashdata('ubah', 'success');
        }else{
            $this->session->set_flashdata('gglubah', 'failed');
        }

        redirect('dosen/penelitian/pengajuan/detail/' . $id .'/'. $usr);
    }

    public function detail($id, $usr)
    {
        $data['detail'] = $this->pengajuan_model->detail($id, $usr);
        $data['pusat']  = $this->pengajuan_model->getpusatstudi();
        $data['skim']   = $this->pengajuan_model->getskim();
        $this->load->view('dosen/penelitian/pengajuan/detail', $data);
    }

    public function anggota($id, $usr)
    {
        $data['detanggota'] = $this->pengajuan_model->detanggota($id, $usr);
        $data['internal']   = $this->pengajuan_model->internal($id);
        $data['mahasiswa']  = $this->pengajuan_model->mahasiswa($id);
        $data['eksternal']  = $this->pengajuan_model->eksternal($id);
        $this->load->view('dosen/penelitian/pengajuan/anggota', $data);
    }

    public function delete($id)
    {
        if (!isset($id)) show_error('404');

        if ($this->pengajuan_model->delete($id)) {
            $this->session->set_flashdata('terhapus', 'hapus berhasil');
        } else {
            $this->session->set_flashdata('gglhapus', 'hapus gagal');
        }
        redirect('dosen/penelitian/pengajuan');
    }

    public function revisi()
    {
        $data['revisi'] = $this->pengajuan_model->revisi();
        $this->load->view('dosen/penelitian/revisi/index', $data);
    }
}
?>