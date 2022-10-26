<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pangkat_model extends CI_Model
{
    public function pangkat()
    {
        return $this->db->get('lemlit_pangkat')->result();
    }

    public function savepangkat()
    {
        $this->pangkat_ket = $this->input->post('nama');

        return $this->db->insert('lemlit_pangkat', $this);
    }

    public function updatepangkat()
    {
        $id = $this->input->post('id_pangkat');
        $nama = $this->input->post('nama');
        $date = date('Y-m-d H:i:s');

        $ids = $this->variasi->decode($id);

        $this->db->query("UPDATE `lemlit_pangkat` SET `pangkat_ket` = '$nama', `pangkat_update` = '$date' WHERE `pangkat_id` = '$ids' ");
    }

    public function deletepangkat($id)
    {
        $ids = $this->variasi->decode($id);
        return $this->db->delete('lemlit_pangkat', array("pangkat_id" => $ids));
    }
}
