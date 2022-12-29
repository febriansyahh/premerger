<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Komlap_model extends CI_Model
{
    public function komlap()
    {
        return $this->db->get('lit_component_report')->result();
    }

    public function savekomlap()
    {
        $this->component_name       = $this->input->post('komponen');
        $this->component_indicator  = $this->input->post('indikator');
        $this->component_bobot      = $this->input->post('bobot');
        $this->component_update      = date("Y-m-d H:i:s");

        return $this->db->insert('lit_component_report', $this);
    }

    public function editkomlap($id)
    {
        return $this->db->query("SELECT * FROM `lit_component_report` WHERE `component_id` = '" . $this->variasi->decode($id) . "' ")->row();
    }

    public function updatekomlap()
    {
        $id        = $this->input->post('id');
        $komponen  = $this->input->post('komponen');
        $indikator = $this->input->post('indikator');
        $bobot     = $this->input->post('bobot');
        $date      = date('Y-m-d H:i:s');

        $ids = $this->variasi->decode($id);

        $this->db->query("UPDATE `lit_component_report` SET `component_name` = '$komponen', `component_indicator` = '$indikator', `component_bobot` = '$bobot', `component_update` = '$date' WHERE `component_id` = '$ids'");
    }

    public function deletekomlap($id)
    {
        $ids = $this->variasi->decode($id);
        return $this->db->delete('lit_component_report', array("component_id" => $ids));
    }
}
