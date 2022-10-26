<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Fakultas_model extends CI_Model
{
    public function getFakultas()
    {
        return $this->db->get('lemlit_faculty')->result();
    }

    public function savefakultas()
    {
        $this->faculty_name         = $this->input->post('nama');
        $this->faculty_dean_name    = $this->input->post('dekan');
        $this->faculty_nip          = $this->input->post('nip');
        $this->faculty_external    = $this->input->post('eksternal');

        return $this->db->insert('lemlit_faculty', $this);
    }

    public function updatefakultas()
    {
        $id = $this->input->post('id_fac');
        $nama = $this->input->post('nama');
        $dekan = $this->input->post('dekan');
        $nip = $this->input->post('nip');
        $eksternal = $this->input->post('eksternal');
        $ids = $this->variasi->decode($id);
        $date = date('Y-m-d H:i:s');

        $this->db->query("UPDATE `lemlit_faculty` SET `faculty_name` = '$nama', `faculty_dean_name` = '$dekan', `faculty_nip` = '$nip',
                        `faculty_update` = '$date', `faculty_external` = '$eksternal' WHERE `faculty_id` = '$ids' ");
    }

    public function deletefakultas($id)
    {
        $ids = $this->variasi->decode($id);
        return $this->db->delete('lemlit_faculty', array("faculty_id" => $ids));
    }
}
