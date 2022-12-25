<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_model extends CI_Model
{
    public function index()
    {
        $sql = $this->db->query("SELECT b.`usulan_id`, b.`usulan_judul`, b.`status_usulan`,  c.`skema_nama`, b.`nidn_pengusul`, b.`nama` FROM `ab_usulan` b LEFT JOIN `ab_skema` c ON b.`skema_id`=c.`skema_id` ORDER BY b.`usulan_id` DESC")->result();
        return $sql;
    }

    public function judul($id)
    {
        $ids = $this->variasi->decode($id);
        $sql = $this->db->query("SELECT `usulan_id`, `usulan_judul` FROM `ab_usulan` WHERE `usulan_id` = '$ids' ")->row();
        return $sql;
    }

    public function subindexkemajuan($id)
    {
        $ids = $this->variasi->decode($id);
        $sql = $this->db->query("SELECT a.*, b.`usulan_judul`, c.`skema_nama` FROM `ab_laporan_kemajuan` a JOIN `ab_usulan` b ON a.`usulan_id` = b.`usulan_id` LEFT JOIN `ab_skema` c ON b.`skema_id`=c.`skema_id` WHERE a.`usulan_id` = '$ids' ORDER BY a.`kemajuan_id` DESC")->result();
        return $sql;
    }

    public function subindexakhir($id)
    {
        $ids = $this->variasi->decode($id);
        $sql = $this->db->query("SELECT a.* FROM `ab_laporan_pengabdian` a LEFT JOIN `ab_usulan` b  ON a.`usulan_id`=b.`usulan_id` WHERE a.`usulan_id` = '$ids'")->result();
        return $sql;
    }
    public function subindexmonev($id)
    {
        $ids = $this->variasi->decode($id);
        $sql = $this->db->query("SELECT a.*, c.nama_lengkap AS nama_reviewer_1, d.nama_lengkap AS nama_reviewer_2 FROM `ab_laporan_monev` a LEFT JOIN `ab_usulan` b ON a.usulan_id=b.usulan_id LEFT JOIN `ab_reviewer` c ON a.reviewer_id_satu=c.reviewer_id LEFT JOIN `ab_reviewer` d ON a.reviewer_id_dua=d.reviewer_id WHERE a.usulan_id = '$ids'")->result();
        return $sql;
    }
}
