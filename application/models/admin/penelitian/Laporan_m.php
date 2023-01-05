<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_m extends CI_Model
{
    public function index()
    {
        $sql = $this->db->query("SELECT b.`usulan_id`, b.`usulan_judul`, b.`status_id`, b.`nidn`, b.`nama`, c.`skim_name`,e.status_desc FROM `lit_usulan` b LEFT JOIN `lit_skim` c ON b.`skim_id`=c.`skim_id` JOIN `lit_status_proposal` e ON b.status_id = e.status_id ORDER BY b.`usulan_id` DESC")->result();
        return $sql;
    }

    public function judul($id)
    {
        $ids = $this->variasi->decode($id);
        $sql = $this->db->query("SELECT `usulan_id`, `usulan_judul` FROM `lit_usulan` WHERE `usulan_id` = '$ids' ")->row();
        return $sql;
    }

    public function subindexkemajuan($id)
    {
        $ids = $this->variasi->decode($id);
        $sql = $this->db->query("SELECT a.*, b.`usulan_judul`, c.`skim_name` FROM `lit_laporan_kemajuan` a JOIN `lit_usulan` b ON a.`usulan_id` = b.`usulan_id` LEFT JOIN `lit_skim` c ON b.`skim_id`=c.`skim_id` WHERE a.`usulan_id` = '$ids' ORDER BY a.`kemajuan_id` DESC")->result();
        return $sql;
    }

    public function subindexakhir($id)
    {
        $ids = $this->variasi->decode($id);
        $sql = $this->db->query("SELECT a.* FROM `lit_laporan_penelitian` a LEFT JOIN `lit_usulan` b ON a.`usulan_id`=b.`usulan_id` WHERE a.`usulan_id`= '$ids'")->result();
        return $sql;
    }
    // public function subindexmonev($id)
    // {
    //     $ids = $this->variasi->decode($id);
    //     $sql = $this->db->query("SELECT a.*, c.nama_lengkap AS nama_reviewer_1, d.nama_lengkap AS nama_reviewer_2 FROM `lit_laporan_monev` a LEFT JOIN `ab_usulan` b ON a.usulan_id=b.usulan_id LEFT JOIN `lit_reviewer` c ON a.reviewer_id_satu=c.reviewer_id LEFT JOIN `lit_reviewer` d ON a.reviewer_id_dua=d.reviewer_id WHERE a.usulan_id = '$ids'")->result();
    //     return $sql;
    // }
}
