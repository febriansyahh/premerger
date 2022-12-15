<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usulan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("admin/pengabdian/Usulan_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['usulan'] = $this->Usulan_model->index();
        $this->load->view('admin/pengabdian/usulan/index', $data);
    }

    public function detail($id)
    {
        $data['data'] = $this->Usulan_model->getbyid($id);
        $data['anggota'] = $this->Usulan_model->getanggotabyid($id);
        $data['anggotaeks'] = $this->Usulan_model->getanggotaeksbyid($id);
        $data['pemeriksaan'] = $this->Usulan_model->pemeriksaan($id);
        $data['cekis'] = $this->Usulan_model->is_pemeriksaan($id);
        $this->load->view('admin/pengabdian/usulan/detail', $data);
    }

    public function isconfirm($id)
    {
        $validation = $this->form_validation;
        if ($validation) {
            $this->Usulan_model->confirm($id);
            $this->session->set_flashdata('ubah', 'success');
        }else{
            $this->session->set_flashdata('ubah', 'failed');
        }
        redirect('admin/pengabdian/usulan');
    }

    public function isdone($id)
    {
        $validation = $this->form_validation;
        if ($validation) {
            $this->Usulan_model->done($id);
            $this->session->set_flashdata('ubah', 'success');
        }else{
            $this->session->set_flashdata('ubah', 'failed');
        }
        redirect('admin/pengabdian/usulan');
    }

    public function verifikasi()
    {
        $id = $_POST['id'];
        $model = $this->Usulan_model;
        $validation = $this->form_validation;
        
        if ($validation) {
            $model->verifikasi();
            $this->session->set_flashdata('verifikasi', 'success');
        }else{
            $this->session->set_flashdata('gglverifikasi', 'failed');
        }

        redirect('admin/pengabdian/usulan/detail/' .$id);
    }

    public function donepemeriksaan()
    {
        $id = $_POST['id'];
        $model = $this->Usulan_model;
        $validation = $this->form_validation;

        if ($validation) {
            $model->donepemeriksaan();
            $this->session->set_flashdata('verified', 'success');
        }else{
            $this->session->set_flashdata('gglverified', 'failed');
        }
        
        redirect('admin/pengabdian/usulan/detail/' . $id);
    }

    public function reviewer()
    {
        $data['reviewer'] = $this->Usulan_model->reviewer();
        $this->load->view('admin/pengabdian/usulan/reviewer', $data);
    }

    public function addreviewer()
    {
        $id = $_POST['id'];
        $model = $this->Usulan_model;
        $validation = $this->form_validation;

        if ($validation) {
            $model->savereviewer();
            $this->session->set_flashdata('simpan', 'success');
        } else {
            $this->session->set_flashdata('gglsimpan', 'failed');
        }

        redirect('admin/pengabdian/usulan/reviewer/' .$id);
    }

    public function hslreview($id)
    {
        $data['reviewer'] = $this->Usulan_model->reviewernya($id);
        $data['isdone'] = $this->Usulan_model->isreviewdone($id);
        $data['aspek'] = $this->Usulan_model->aspek();
        $this->load->view('admin/pengabdian/usulan/hasilreview', $data);
    }

}
