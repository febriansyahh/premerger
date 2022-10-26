<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jabatan_model extends CI_Model
{
    public function jabatan()
    {
        return $this->db->get('lemlit_position')->result();
    }

    public function savejabatan()
    {
        $this->position_name = $this->input->post('nama');

        return $this->db->insert('lemlit_position', $this);
    }

    public function updatejabatan()
    {
        $id = $this->input->post('id_jabatan');
        $nama = $this->input->post('nama');

        $ids = $this->variasi->decode($id);

        $this->db->query("UPDATE `lemlit_position` SET `position_name` = '$nama' WHERE `position_id` = '$ids' ");
    }

    public function deletejabatan($id)
    {
        $ids = $this->variasi->decode($id);
        return $this->db->delete('lemlit_position', array("position_id" => $ids));
    }
}
