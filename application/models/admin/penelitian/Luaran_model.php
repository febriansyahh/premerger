<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Luaran_model extends CI_Model
{
    public function getLuaran()
    {
        return $this->db->query("SELECT * FROM `lit_output_type` ")->result();
    }

    public function saveluaran()
    {
        $this->output_type_title    = $this->input->post('nama');

        return $this->db->insert('lit_output_type', $this);
    }

    public function updateluaran()
    {
        $id = $this->input->post('id_luaran');
        $nama = $this->input->post('nama');

        $ids = $this->variasi->decode($id);

        $this->db->query("UPDATE `lit_output_type` SET `output_type_title` = '$nama' WHERE `output_type_id` = '$ids' ");
    }

    public function deleteluaran($id)
    {
        $ids = $this->variasi->decode($id);
        return $this->db->delete('lit_output_type', array("output_type_id" => $ids));
    }
}
