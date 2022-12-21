<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemeriksaan_model extends CI_Model
{
    private $_table = "ab_pemeriksaan";
    
    public function index()
    {
        return $this->db->get($this->_table)->result();
    }

    public function save()
    {
        $post = $this->input->post();

        $nama = $post['materi'];

        $this->materi_pemeriksaan  = $nama;

        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();

        $id = $post['id_pem'];
        $materi = $post['materi'];
        $ids = $this->variasi->decode($id);

        $this->db->query("UPDATE `ab_pemeriksaan` SET `materi_pemeriksaan` = '$materi' WHERE `pemeriksaan_id` = '$ids' ");
    }

    public function delete($id)
    {
        $ids = $this->variasi->decode($id);

        return $this->db->delete($this->_table, array("pemeriksaan_id" => $ids));
    }
}
?>