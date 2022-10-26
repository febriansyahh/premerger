<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendidikan_model extends CI_Model{
    public function getPendidikan()
    {
        return $this->db->get('lemlit_education')->result();
    }

    public function savependidikan()
    {
        $this->education_name = $this->input->post('nama');

        return $this->db->insert('lemlit_education', $this);
    }

    public function updatependidikan()
    {
        $id = $this->input->post('id_edc');
        $nama = $this->input->post('nama');
        $ids = $this->variasi->decode($id);
        $date = date('Y-m-d H:i:s');

        $this->db->query("UPDATE `lemlit_education` SET `education_name` ='$nama', `education_update` = '$date' WHERE `education_id` = '$ids' ");
    }

    public function deletependidikan($id)
    {
        $ids = $this->variasi->decode($id);
        return $this->db->delete('lemlit_education', array("education_id" => $ids));
    }
}