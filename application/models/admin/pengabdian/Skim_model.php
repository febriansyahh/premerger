<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Skim_model extends CI_Model {
    private $_table = "p_skim";

    public function index()
    {
        return $this->db->get($this->_table)->result();
    }

    public function jabatan()
    {
        return $this->db->get("p_jabatan")->result();
    }

    public function save()
    {
        $post = $this->input->post();

        $nama = $post['nama'];
        $jabatan = $post['jabatan'];
        $pagumin = $post['pagumin'];
        $pagumax = $post['pagumax'];
        $kuota = $post['kuota'];
        $status = $post['status'];

        $this->nama_skim = $nama;
        $this->jabatan_minimal = $jabatan;
        $this->biaya_pagu_min = $pagumin;
        $this->biaya_pagu_max = $pagumax;
        $this->kuota_skim = $kuota;
        $this->status_skim = $status;

        return $this->db->insert($this->_table, $this);
    }

    public function delete($id)
    {
        $ids = $this->variasi->decode($id);
        return $this->db->delete($this->_table, array("skim_id" => $ids));
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
        $jabatan = $post['jabatan'];
        $pagumin = $post['pagumin'];
        $pagumax = $post['pagumax'];
        $kuota = $post['kuota'];
        $status = $post['status'];
        $ids = $this->variasi->decode($post['id']);

        $this->db->query("UPDATE `p_skim` SET `nama_skim` = '$nama', `jabatan_minimal` = '$jabatan', 
        `biaya_pagu_min` = '$pagumin', `biaya_pagu_max` = '$pagumax', `kuota_skim` = '$kuota', `status_skim` = '$status' WHERE `skim_id` = '$ids'");

    }
}