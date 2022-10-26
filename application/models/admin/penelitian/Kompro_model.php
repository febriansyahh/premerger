<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kompro_model extends CI_Model
{
    public function kompro()
    {
        return $this->db->get('lemlit_component_propose')->result();
    }

    public function savekompro()
    {
        $this->component_name       = $this->input->post('komponen');
        $this->component_indicator  = $this->input->post('indikator');
        $this->component_bobot      = $this->input->post('bobot');
        $this->component_update      = date("Y-m-d H:i:s");

        return $this->db->insert('lemlit_component_propose', $this);
    }

    public function editkompro($id)
    {
        return $this->db->query("SELECT * FROM `lemlit_component_propose` WHERE `component_id` = '" . $this->variasi->decode($id) . "' ")->row();
    }

    public function updatekompro()
    {
        $id        = $this->input->post('id');
        $komponen  = $this->input->post('komponen');
        $indikator = $this->input->post('indikator');
        $bobot     = $this->input->post('bobot');

        $ids = $this->variasi->decode($id);

        $this->db->query("UPDATE `lemlit_component_propose` SET `component_name` = '$komponen', `component_indicator` = '$indikator', `component_bobot` = '$bobot' WHERE `component_id` = '$ids'");
    }

    public function deletekompro($id)
    {
        $ids = $this->variasi->decode($id);
        return $this->db->delete('lemlit_component_propose', array("component_id" => $ids));
    }
}
