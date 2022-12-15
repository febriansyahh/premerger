<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Periode_model extends CI_Model
{
    private $_table = "ab_periode";

    public function usulan()
    {
        return $this->db->query("SELECT * FROM `ab_periode` WHERE `setting_jenis` = 'periode_usulan' ")->row();
    }

    public function review()
    {
        return $this->db->query("SELECT * FROM `ab_periode` WHERE `setting_jenis` = 'periode_review' ")->row();
    }

    public function setting()
    {
        $post = $this->input->post();

        $this->db->query("UPDATE `ab_periode` SET `keterangan` ='".$post['usulan_ket']."' WHERE `setting_jenis` = 'periode_usulan' AND `setting_id` = '".$post['usulanid']."' ");
        $this->db->query("UPDATE `ab_periode` SET `keterangan` ='". $post['reviewket']."' WHERE `setting_jenis` = 'periode_review' AND `setting_id` = '".$post['reviewid']."' ");
    }
}