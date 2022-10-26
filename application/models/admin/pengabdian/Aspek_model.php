<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aspek_model extends CI_Model {
    private $_table = "p_aspek_penilaian";

    public function index()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getbyid($id)
    {
        $ids = $this->variasi->decode($id);
        return $this->db->get_where($this->_table, array("aspek_id" => $ids))->row();
    }

    public function save()
    {
        $post = $this->input->post();

        $this->keterangan = $post['keterangan'];
        $this->nilai = $post['nilai'];

        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();

        $id = $post['idaspek'];
        $keterangan = $post['keterangan'];
        $nilai = $post['nilai'];
        $ids = $this->variasi->decode($id);

        $this->db->query("UPDATE `p_aspek_penilaian` SET `keterangan` = '$keterangan', `nilai` = '$nilai' WHERE `aspek_id` = '$ids' ");
    }

    public function delete($id)
    {
        $ids = $this->variasi->decode($id);

        return $this->db->delete($this->_table, array("aspek_id" => $ids));
    }
}
?>