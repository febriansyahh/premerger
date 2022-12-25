<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lembaga_model extends CI_Model {
    private $_table = "ab_master_lembaga";

    public function index()
    {
        return $this->db->query("SELECT * FROM `ab_master_lembaga`")->result();
    }

    public function save()
    {
        $post = $this->input->post();

        $nama = $post['nama'];
        $jabatan = $post['jabatan'];
        $pimpinan = $post['pimpinan'];
        $idpimpinan = $post['idpimpinan'];
        $lokasi = $post['lokasi'];
        $status = $post['status'];

        $this->lembaga_nama          = $nama;
        $this->lembaga_jabatan       = $jabatan;
        $this->lembaga_pimpinan      = $pimpinan;
        $this->lembaga_idpimpinan    = $idpimpinan;
        $this->lokasi                = $lokasi;
        $this->status                = $status;

        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $nama = $post['nama'];
        $jabatan = $post['jabatan'];
        $pimpinan = $post['pimpinan'];
        $idpimpinan = $post['idpimpinan'];
        $lokasi = $post['lokasi'];
        $status = $post['status'];
        $ids = $this->variasi->decode($post['id']);

        $this->db->query("UPDATE `ab_master_lembaga` SET `lembaga_nama` = '$nama', `lembaga_jabatan` = '$jabatan', 
        `lembaga_pimpinan` = '$pimpinan', `lembaga_idpimpinan` = '$idpimpinan', `lokasi` = '$lokasi', `status` = '$status' WHERE `id_lembaga` = '$ids'");
    }

    public function delete($id)
    {
        $ids = $this->variasi->decode($id);
        return $this->db->delete($this->_table, array("id_lembaga" => $ids));
    }
}