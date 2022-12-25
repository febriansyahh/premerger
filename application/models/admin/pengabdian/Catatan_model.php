<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Catatan_model extends CI_Model
{
    private $_table = "ab_catatan_harian";

    public function index()
    {
        $sql = $this->db->query("SELECT b.`usulan_id`, b.`usulan_judul`, b.`status_usulan`, b.`nidn_pengusul`, b.`nama`, c.`skema_nama` FROM `ab_usulan` b LEFT JOIN `ab_skema` c ON b.`skema_id`=c.`skema_id` ORDER BY b.`usulan_id` DESC")->result();
        return $sql;
    }

    public function judul($id)
    {
        $ids = $this->variasi->decode($id);
        $sql = $this->db->query("SELECT `usulan_judul` FROM `ab_usulan` WHERE `usulan_id` = '$ids' ")->row();
        return $sql;
    }

    public function subindex($id)
    {
        $ids = $this->variasi->decode($id);
        $sql = $this->db->query("SELECT a.*, b.`usulan_judul`, c.`skema_nama` FROM `ab_catatan_harian` a JOIN `ab_usulan` b ON a.`usulan_id` = b.`usulan_id` LEFT JOIN `ab_skema` c ON b.`skema_id`=c.`skema_id` WHERE a.`usulan_id` = '$ids' ORDER BY a.`catatan_id` DESC")->result();
        return $sql;
    }
}
