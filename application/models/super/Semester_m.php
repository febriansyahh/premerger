<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Semester_m extends CI_Model {

    private $_table = "mst_tahun_akademik";

    public function index()
    {
        // return $this->db->get($this->_table)->result();
        return $this->db->query("SELECT * FROM `mst_tahun_akademik` WHERE `id_tahun`")->result();
    }
    public function add()
    {
        $post = $this->input->post();
        $kode = explode('/', $post['tahun_ajaran']);
        $kode_tahun = $kode[0].$post['tahun_semester'];

        $this->tahun_ajaran     = $post['tahun_ajaran'];
        $this->tahun_semester     = $post['tahun_semester'];
        $this->tahun_kode     = $kode_tahun;
        $this->tahun_status     = $post['tahun_status'];

        return $this->db->insert($this->_table, $this);
    }

    public function delete($id)
    {
        $ids = $this->variasi->decode($id);
        return $this->db->delete($this->_table, array("id_tahun" => $ids));
    }

    public function edit($id){
        $ids = $this->variasi->decode($id);
        return $this->db->query("SELECT * FROM `mst_tahun_akademik` WHERE `id_tahun` = '$ids' ")->row();
    }
    public function updatesmt()
    {
        $post = $this->input->post();
        $post = $this->input->post();
        $kode = explode('/', $post['tahun_ajaran']);
        $kode_tahun = $kode[0].$post['tahun_semester'];
        
        $id = $post['id'];
        $tahun_ajaran = $post['tahun_ajaran'];
        $tahun_semester = $post['tahun_semester'];
        $tahun_kode = $kode_tahun;
        
        // var_dump($tahun_kode);
        // exit;
        
        $ids = $this->variasi->decode($id);
        
        $this->db->query("UPDATE `mst_tahun_akademik` SET `tahun_ajaran` = '$tahun_ajaran', `tahun_semester` = '$tahun_semester', `tahun_kode` = '$tahun_kode' WHERE `id_tahun` = '$ids' ");
    }

    public function status($id, $st)
    {
        $this->db->query("UPDATE `mst_tahun_akademik` SET `tahun_status` = '$st' WHERE `id_tahun` = '$id' ");
    }
}
