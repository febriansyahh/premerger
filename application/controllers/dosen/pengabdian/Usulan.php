<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usulan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("dosen/pengabdian/Usulan_model");
        $this->load->model("dosen/pengabdian/Anggota_model");

        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['usulan'] = $this->Usulan_model->index();
        $this->load->view('dosen/pengabdian/usulan/index', $data);
    }

    public function add()
    {
        $nidn = $this->session->userdata('nidn');
        $result = $this->Usulan_model->status_dos($nidn);
        $res = $result['result']['data'][0];
        $data['skema'] = $this->Usulan_model->skema();
        $data['status'] = $res['status'];
        $data['periode'] = $this->Usulan_model->periode();
        $this->load->view('dosen/pengabdian/usulan/add', $data);
    }

    public function detail($id)
    {
        $data['data'] = $this->Usulan_model->detail($id);
        $data['skema'] = $this->Usulan_model->skema();
        $data['cekpem'] = $this->Usulan_model->is_pemeriksaan($id);
        $data['pemeriksaan'] = $this->Usulan_model->pemeriksaan($id);
        $data['tahap'] = $this->Usulan_model->tahaphibah($id);
        $this->load->view('dosen/pengabdian/usulan/detail', $data);
    }

    public function save()
    {
        $model = $this->Usulan_model;
        $validation = $this->form_validation;

        if ($validation) {
            $model->save();
            $this->session->set_flashdata('simpan', 'success');
        } else {
            $this->session->set_flashdata('gglsimpan', 'failed');
        }

        redirect('dosen/pengabdian/usulan');
    }

    public function update()
    {
        $id = $_POST['id'];
        $model = $this->Usulan_model;
        $validation = $this->form_validation;

        if ($validation) {
            $model->update();
            $this->session->set_flashdata('ubah', 'success');
        } else {
            $this->session->set_flashdata('gglubah', 'failed');
        }

        redirect('dosen/pengabdian/usulan');
    }

    public function deleteusulan($id)
    {
        if (!isset($id)) show_error('404');


        if ($this->Usulan_model->deleteusulan($id)) {
            $this->session->set_flashdata('terhapus', 'hapus berhasil');
        } else {
            $this->session->set_flashdata('gglhapus', 'hapus gagal');
        }

        redirect('dosen/pengabdian/usulan');
    }

    public function anggota($id)
    {
        $data['internal'] = $this->Usulan_model->anggotainternal($id);
        $data['mahasiswa'] = $this->Usulan_model->anggotamahasiswa($id);
        $data['eksternal'] = $this->Usulan_model->anggotaeksternal($id);
        $data['usulan'] = $this->Usulan_model->ringkasan($id);
        $this->load->view('dosen/pengabdian/usulan/anggota', $data);
    }

    public function saveanggota()
    {
        $post = $this->input->post();
        $id = $post['id_usulan'];
        $jenis = $post['jenis'];

        $model = $this->Usulan_model;
        $validation = $this->form_validation;

        if ($validation) {
            $model->saveanggota();
        } else {
            $this->session->set_flashdata('gglsimpan', 'failed');
        }

        redirect('dosen/pengabdian/usulan/anggota/' . $id);
    }

    public function deleteanggota($id)
    {
        $is = explode('-', $id);
        $ids = $is[0];
        if (!isset($id)) show_error('404');

        if ($this->Usulan_model->deleteanggota($ids)) {
            $this->session->set_flashdata('terhapus', 'hapus berhasil');
        } else {
            $this->session->set_flashdata('gglhapus', 'hapus gagal');
        }

        redirect('dosen/pengabdian/usulan/anggota/' .$is[1]);
    }

    public function deleteeks($id)
    {
        $is = explode('-', $id);
        $ids = $is[0];
        
        if (!isset($id)) show_error('404');
       

        if ($this->Usulan_model->deleteeks($ids)) {
            $this->session->set_flashdata('terhapus', 'hapus berhasil');
        } else {
            $this->session->set_flashdata('gglhapus', 'hapus gagal');
        }

        redirect('dosen/pengabdian/usulan/anggota/' .$is[1]);
    }

    public function mahasiswa()
    {
        $this->Usulan_model->mahasiswa();
    }

    public function dosen()
    {
        $this->Usulan_model->dosen();
    }

    public function hslreview($id)
    {
        $data['reviewer'] = $this->Usulan_model->reviewernya($id);
        $data['isdone'] = $this->Usulan_model->isreviewdone($id);
        $data['aspek'] = $this->Usulan_model->aspek();
        $this->load->view('dosen/pengabdian/usulan/hasilreview', $data);
    }

      public function sbganggota()
    {
        $data['index'] = $this->Usulan_model->sbganggota();
        $this->load->view('dosen/pengabdian/usulan/sbganggota', $data);
    }

    public function detailsbg($id)
    {
        $data['data'] = $this->Usulan_model->getbyid($id);
        $data['anggota'] = $this->Usulan_model->getanggotabyid($id);
        $data['anggotaeks'] = $this->Usulan_model->getanggotaeksbyid($id);
        $data['pemeriksaan'] = $this->Usulan_model->pemeriksaan($id);
        $data['cekis'] = $this->Usulan_model->is_pemeriksaan($id);
        $data['tahap'] = $this->Usulan_model->tahaphibah($id);
        $this->load->view('dosen/pengabdian/usulan/detailsbg', $data);
    }

}
?>