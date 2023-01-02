<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        if ($this->session->userdata('level') == 'Admin' AND $this->session->userdata('sistem') != '') {
            $data['penelitian'] = $this->Header_model->c_penelitian();
            $data['pengabdian'] = $this->Header_model->c_pengabdian();

            $this->load->view("homeadmin", $data);
        }else{
            $kode = $this->session->userdata('kode');
            $cekadm = $this->Header_model->cekadm($kode);

            $array_item = array(
                'iduser'    => $cekadm->id_user,
                'username'  => $cekadm->username,
                'level'     => 'Admin',
                'sistem'    => $cekadm->user_sistem);
            $this->session->set_userdata($array_item);

            $data['penelitian'] = $this->Header_model->c_penelitian();
            $data['pengabdian'] = $this->Header_model->c_pengabdian();
    
            $this->load->view("homeadmin", $data);
        }
    }

    public function profile()
    {
        $nidn = $this->session->userdata('nidn');
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
            CURLOPT_POSTFIELDS => array("nip" => $nidn),
            CURLOPT_HTTPHEADER => array(
                'umk_api_key: c3e8e2070a6ca052a781c8546b7973578de8f62f',
                'Cookie: PHPSESSID=qiuhlouds55jml95s22393fr5a4a3q1u'
            ),
        ));

        $response = curl_exec($curl);
        $result = json_decode($response, true);
        $res = $result['result']['data'][0];

        $data['profile'] = $res;
        $this->load->view("dosen/profile", $data);
    }
}
