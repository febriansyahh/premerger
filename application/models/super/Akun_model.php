<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akun_model extends CI_Model {

    private $_table = "mst_users";

    public function index()
    {
        return $this->db->query("SELECT * FROM `mst_users` WHERE `user_delete` = 0 ")->result();
    }

    public function save()
    {
        $post = $this->input->post();
        $issistem = $post['sistem'];
        $date = date("Y-m-d H:i:s");

        if ($issistem == '0') {
            $username = $post['username'];
            $nama = $post['nama'];
            $password = $post['password'];
            $level = $post['level'];

            $this->username        = $username;
            $this->nama_user       = $nama;
            $this->password        = hash('sha256', $password);
            $this->user_level      = $level;
            $this->user_sistem     = $issistem;
            $this->user_active     = 'Active';
            $this->user_join       = $date;
            $this->user_delete     = 0;
           
            return $this->db->insert($this->_table, $this);
        }else{
            $kode = $post['kode'];
            $exp = explode('~', $kode);
            $kduser = $exp[0]; 
            $nmgelar = $exp[1];
            $level = $post['level'];

            $this->username        = $kduser;
            $this->nama_user       = $nmgelar;
            $this->password        = hash('sha256', $kduser);
            $this->user_level      = $level;
            $this->user_sistem     = $issistem;
            $this->user_active     = 'Active';
            $this->user_join       = $date;
            $this->user_delete     = 0;
            
            return $this->db->insert($this->_table, $this);
        }
    }

    public function reset()
    {
        $post = $this->input->post();
        $id = $post['iduser'];
        $username = $post['username'];
        $nama = $post['nama'];
        $pass = $post['password'];
        $password = hash('sha256', $pass);

        $this->db->query("UPDATE `mst_users` SET `password` = '".$password."', `username` = '$username', `nama_user` = '$nama' WHERE `id_user` = '". $this->variasi->decode($id)."' ");
    }

    public function delete($id)
    {
        $this->db->query("UPDATE `mst_users` SET `user_delete` = '1', `user_active` = 'Nonactive' WHERE `id_user` = '$id' ");
    }

    public function getkode()
    {
        $post = $this->input->post();
        $id = $post['id'];
        $a = $this->ws_getkode($id);
        $data = $a['result']['data'];
       
        foreach ($data as $key => $value) {
           
            $kode = $value['kode'];
            $nama = $value['nama'];
            if ($value['gelar_depan'] != '') {
                $gdepan = $value['gelar_depan'] . '. ';
            } else {
                $gdepan = '';
            }

            if ($value['gelar_belakang'] != '') {
                $gblk = ', ' .$value['gelar_belakang'];
            }else{
                $gblk ='';
            }

            echo '<option value="' . $kode . "~".$gdepan . "" . $nama . "" . $gblk . '" > '. $kode . " - " . $gdepan ." " . $nama . "" . $gblk . '</option>';
        }
    }

    public function ws_getkode($kode)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://ws.umk.ac.id/services/simpel/getpegawai',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'kode'             => $kode
            ),
            CURLOPT_HTTPHEADER => array(
                'umk_api_key: c3e8e2070a6ca052a781c8546b7973578de8f62f',
                'Cookie: PHPSESSID=fkdc1h938r7bqahdmpio59u9maphi4t5'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $result = json_decode($response, true);
        return $result;
    }
    
}