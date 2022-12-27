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
        $data['tahap'] = $this->Usulan_model->tahaphibah($id);
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
        $data['biaya'] = $this->Usulan_model->biayaacc($id);
        $this->load->view('admin/pengabdian/usulan/hasilreview', $data);
    }


    public function accbiaya()
    {
        $id = $_POST['id'];
        $model = $this->Usulan_model;
        $validation = $this->form_validation;

        if ($validation) {
            $model->updatebiaya();
            $this->session->set_flashdata('simpan', 'success');
        } else {
            $this->session->set_flashdata('gglsimpan', 'failed');
        }

        redirect('admin/pengabdian/usulan/hslreview/' . $id);
    }

    public function delrev($id)
    {
        $exp = explode('~', $id);
        $ids = $exp[0];
        $idredirect = $exp[1];

        $model = $this->Usulan_model;
        $validation = $this->form_validation;

        if ($validation) {
            $model->deletereview($ids);
            $this->session->set_flashdata('terhapus', 'success');
        } else {
            $this->session->set_flashdata('terhapus', 'failed');
        }

        redirect('admin/pengabdian/usulan/hslreview/' .$idredirect);
    }

    // public function migrasi()
    // {
    //     $data = $this->Usulan_model->migrasi();

    

    //     foreach ($data as $key => $value){


    //         $ws = _wsgetdosen($value->anggota_nidn);
    //         $res = $ws['result'];
    //         if ($ws['result']['data'] != NULL) {
    //             $kode = $res['data'][0]['kode'];
    //             $jabatan = $res['data'][0]['pangkat'];
    //             $pangkat = $res['data'][0]['golongan'];
    //             $email = $res['data'][0]['email'];
    //             $prodi = $res['data'][0]['prodi'];

    //         }

    //         // if ($ws['result']['data'] != NULL) {
    //         //     $kode = $res['data'][0]['kode'];

    //         //     $execute = $this->db->query("UPDATE `ab_reviewer` SET `kode` = '$kode' WHERE nidn = '$value->nidn' ");
    //         //     if ($execute) {
    //         //         echo 'Ubah Berhasil';
    //         //     }else{
    //         //         echo 'Ubah Gagal';
    //         //     }

    //         // }
    //     }
    //     exit;
    // }

    function _wsgetdosen($nidn)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://ws.umk.ac.id/services/simpel/getdosen',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'nip'             => $nidn
            ),
            CURLOPT_HTTPHEADER => array(
                'umk_api_key: c3e8e2070a6ca052a781c8546b7973578de8f62f',
                'Cookie: PHPSESSID=8bbgupsnq6hl6u7kktgsg2k3b9q6amek'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $result = json_decode($response, true);
        return $result;
    }

}
