<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Catatan_m extends CI_Model
{
    private $_table = "lit_catatan_harian";

    public function index()
    {
        $sql = $this->db->query("SELECT b.`usulan_id`, b.`usulan_judul`, b.`status_id`, b.`nidn`, b.`nama`, c.`skim_name`,e.status_desc FROM `lit_usulan` b LEFT JOIN `lit_skim` c ON b.`skim_id`=c.`skim_id` JOIN `lit_status_proposal` e ON b.status_id = e.status_id ORDER BY b.`usulan_id` DESC")->result();
        return $sql;
    }

    public function judul($id)
    {
        $ids = $this->variasi->decode($id);
        $sql = $this->db->query("SELECT `usulan_judul` FROM `lit_usulan` WHERE `usulan_id` = '$ids' ")->row();
        return $sql;
    }

    public function subindex($id)
    {
        $ids = $this->variasi->decode($id);
        $sql = $this->db->query("SELECT a.*, b.`usulan_judul`, c.`skim_name` FROM `lit_catatan_harian` a JOIN `lit_usulan` b ON a.`usulan_id` = b.`usulan_id` LEFT JOIN `lit_skim` c ON b.`skim_id`=c.`skim_id` WHERE a.`usulan_id` = '$ids' ORDER BY a.`catatan_id` DESC")->result();
        return $sql;
    }
}
