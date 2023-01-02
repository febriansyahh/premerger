<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usulan extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('level') == 'Admin' && (!$this->session->userdata('sistem') == '0' || !$this->session->userdata('sistem') == '2')) {
            redirect(base_url());
        }
        $this->load->model("admin/penelitian/Usulan_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['usulan'] = $this->Usulan_model->index();
        $this->load->view('admin/penelitian/usulan/index', $data);
    }

    public function detail($id)
    {
        $data['data'] = $this->Usulan_model->getbyid($id);
        $data['anggota'] = $this->Usulan_model->getanggotabyid($id);
        $data['anggotaeks'] = $this->Usulan_model->getanggotaeksbyid($id);
        $this->load->view('admin/penelitian/usulan/detail', $data);
    }

    // public function migrasi()
    // {
    //     $data = $this->Usulan_model->migrasi();
    //     foreach ($data as  $value) {
            
    //         $ws = _wsgetdosen($value->anggota_nidn);
    //         $res = $ws['result'];
    //         if ($ws['result']['data'] != NULL) {
    //             $kode = $res['data'][0]['kode'];

    //             // $execute = $this->db->query("UPDATE `lit_usulan` SET `kode_user` = '$kode' WHERE nidn = '$value->nidn' ");
    //             $execute = $this->db->query("UPDATE `lit_anggota` SET `kode_user` = '$kode' WHERE anggota_nidn = '$value->anggota_nidn' ");
    //             if ($execute) {
    //                 echo 'Ubah Berhasil';
    //             }else{
    //                 echo 'Ubah Gagal';
    //             }
    //         }
    //     }
    //     exit;
    // }

    // function _wsgetdosen($nidn)
    // {
    //     $curl = curl_init();

    //     curl_setopt_array($curl, array(
    //         CURLOPT_URL => 'https://ws.umk.ac.id/services/simpel/getdosen',
    //         CURLOPT_RETURNTRANSFER => true,
    //         CURLOPT_ENCODING => '',
    //         CURLOPT_MAXREDIRS => 10,
    //         CURLOPT_TIMEOUT => 0,
    //         CURLOPT_FOLLOWLOCATION => true,
    //         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //         CURLOPT_CUSTOMREQUEST => 'POST',
    //         CURLOPT_POSTFIELDS => array(
    //             'nip'             => $nidn
    //         ),
    //         CURLOPT_HTTPHEADER => array(
    //             'umk_api_key: c3e8e2070a6ca052a781c8546b7973578de8f62f',
    //             'Cookie: PHPSESSID=8bbgupsnq6hl6u7kktgsg2k3b9q6amek'
    //         ),
    //     ));

    //     $response = curl_exec($curl);

    //     curl_close($curl);
    //     $result = json_decode($response, true);
    //     return $result;
    // }
}