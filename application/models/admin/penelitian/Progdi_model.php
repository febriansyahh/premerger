<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Progdi_model extends CI_Model
{
    public function getProgdi()
    {
        return $this->db->query("SELECT a.*, b.`faculty_name` FROM `lemlit_study_program` a JOIN `lemlit_faculty` b ON a.`faculty_id` = b.`faculty_id`")->result();
    }

    public function saveprogdi()
    {
        $this->faculty_id         = $this->input->post('fakultas');
        $this->study_program_name    = $this->input->post('nama');
        $this->study_program_external    = $this->input->post('eksternal');

        return $this->db->insert('lemlit_study_program', $this);
    }

    public function updateprogdi()
    {
        $id = $this->input->post('id_prog');
        $fac = $this->input->post('fakultas');
        $nama = $this->input->post('nama');
        $eksternal = $this->input->post('eksternal');
        $ids = $this->variasi->decode($id);
        $date = date('Y-m-d H:i:s');


        $this->db->query("UPDATE `lemlit_study_program` SET `faculty_id` = '$fac',`study_program_name` = '$nama',
                        `study_program_update` = '$date', `study_program_external` = '$eksternal' WHERE `study_program_id` = '$ids' ");
    }

    public function deleteprogdi($id)
    {
        $ids = $this->variasi->decode($id);
        return $this->db->delete('lemlit_study_program', array("study_program_id" => $ids));
    }
}
