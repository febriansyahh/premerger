<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model 
{
    public function loginws($username, $password)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://ws.umk.ac.id/services/auth/devlogin',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => 'username=' . $username . '&password=' . $password . '',
            CURLOPT_HTTPHEADER => array(
                'umk_api_key: c873bebe1247fa823e1fd02779844484644579d9',
                'Content-Type: application/x-www-form-urlencoded',
                'Cookie: PHPSESSID=orsgaqfsj6r0dei4ggjs1gn512cnioou'
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
            return "Error #:" . $err;
        } else {
            return json_decode($response);
        }
    }

    public function loginnon($usr, $pw)
    {
        $query = $this->db->query("SELECT * FROM `mst_users` WHERE `username` ='$usr' AND `password` = '$pw' AND `user_active` ='Active' ");
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function reviewer($id)
    {
        $query = $this->db->query("SELECT * FROM `lemlit_lecture` WHERE user_username = '$id' AND `lecture_review` = '1' ");
        if ($query->num_rows() == 1) {
            return 1;
        } else {
            return 0;
        }
    }

    function pusat_studi($id)
    {
        $query = $this->db->query("SELECT * FROM `lemlit_pusat_studi` WHERE pusat_studi_nis = '$id' ");
        if ($query->num_rows() == 1) {
            return 1;
        } else {
            return 0;
        }
    }

}