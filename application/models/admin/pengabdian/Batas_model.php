<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Batas_model extends CI_Model
{
    private $_table = "ab_batas_minimal";

    public function index()
    {
        return $this->db->get($this->_table)->result();
    }

    public function save()
    {
        $post = $this->input->post();

        $this->batas_nilai = $post['nilai'];
        $this->tanggal_berlaku = $post['tanggal'];

        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();

        $id = $post['id_batas'];
        $nilai = $post['nilai'];
        $tanggal = $post['tanggal'];
        $ids = $this->variasi->decode($id);

        $this->db->set('batas_nilai', $nilai);
        $this->db->set('tanggal_berlaku', $tanggal);
        $this->db->where('batas_id', $ids);
        $this->db->update('ab_batas_minimal');
    }

    public function delete($id)
    {
        $ids = $this->variasi->decode($id);

        return $this->db->delete($this->_table, array("batas_id" => $ids));
    }
}
?>