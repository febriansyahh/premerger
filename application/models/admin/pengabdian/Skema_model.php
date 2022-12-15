<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Skema_model extends CI_Model
{
    private $_table = "ab_skema";

    public function index()
    {
        return $this->db->query("SELECT * FROM `ab_skema` WHERE `skema_parent` = '0' ")->result();
    }

    public function parent($id)
    {
        $ids = $this->variasi->decode($id);
        return $this->db->query("SELECT `skema_id`,`skema_nama` FROM `ab_skema` WHERE `skema_id` = '$ids' ")->row();
    }

    public function child($id)
    {
        $ids = $this->variasi->decode($id);
        return $this->db->query("SELECT * FROM `ab_skema` WHERE `skema_parent` = '$ids' ")->result();
    }

    public function save()
    {
        $post = $this->input->post();

        $nama = $post['nama'];
        $kuota = $post['kuota'];
        $status = 'active';

        $this->skema_nama = $nama;
        $this->skema_kuota = $kuota;
        $this->skema_status = $status;

        return $this->db->insert($this->_table, $this);
    }

    public function savechild()
    {
        $post = $this->input->post();

        $nama = $post['nama'];
        $biaya = $post['biaya'];
        $kuota = $post['kuota'];
        $parent = $post['parent'];
        $status = $post['status'];

        $this->skema_nama       = $nama;
        $this->skema_biaya_max  = $biaya;
        $this->skema_kuota      = $kuota;
        $this->skema_parent     = $parent;
        $this->skema_status     = $status;

        return $this->db->insert($this->_table, $this);
    }

    public function delete($id)
    {
        $ids = $this->variasi->decode($id);
        return $this->db->delete($this->_table, array("skema_id" => $ids));
    }

    public function getbyid($id)
    {
        $ids = $this->variasi->decode($id);
        $sql = $this->db->query("SELECT s.*, j.`nama_jabatan`, j.`urutan_jabatan` FROM p_skim s LEFT JOIN p_jabatan j ON s.`jabatan_minimal`=j.`kode_jabatan` WHERE s.`skim_id`= '$ids' ")->row();
        return $sql;
    }

    public function update()
    {
        $post = $this->input->post();
        $nama = $post['nama'];
        $pagumax = $post['biaya'];
        $parent = $post['parent'];
        $kuota = $post['kuota'];
        $status = $post['status'];
        $ids = $this->variasi->decode($post['id']);

        $this->db->query("UPDATE `ab_skema` SET `skema_nama` = '$nama', `skema_biaya_max` = '$pagumax', `skema_kuota` = '$kuota', `skema_parent` = '$parent', `skema_status` = '$status' WHERE `skema_id` = '$ids'");
    }
}
