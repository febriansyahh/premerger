<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Report_m extends CI_Model
{
    public function index()
    {
        return $this->db->query("SELECT a.*, b.`skema_nama`, c.`anggota_nama`, c.`anggota_nidn` FROM `ab_usulan` a LEFT JOIN `ab_skema` b ON a.`skema_id`=b.`skema_id` LEFT JOIN `ab_anggota` c ON c.`usulan_id`=a.`usulan_id` WHERE c.`anggota_posisi` ='ketua' ORDER BY a.`usulan_id` DESC")->result();
    }

}