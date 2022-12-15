<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Atribut_model extends CI_Model
{
    public function jmlhreview($id)
    {
        return $this->db->query("SELECT COUNT(review_id) AS jmlh FROM `ab_review_proposal` WHERE usulan_id='$id'")->row();
    }

    public function mengisi($id)
    {
        return $this->db->query("SELECT count(review_id) as jum FROM ab_review_proposal WHERE usulan_id = '$id' AND tanggal_review != '0000-00-00'")->row();
    }

    public function skor($id, $asp)
    {
        return $this->db->query("SELECT skor FROM `ab_skor_aspek` WHERE review_id = '$id' AND aspek_id = '$asp'")->row();
    }
}