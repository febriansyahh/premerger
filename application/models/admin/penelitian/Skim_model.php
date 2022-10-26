<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Skim_model extends CI_Model
{
    public function skim()
    {
        return $this->db->get('lemlit_skim')->result();
    }

    public function saveskim()
    {
        $this->skim_name            = $this->input->post('skim');
        $this->skim_name_seo        = seo_title($this->input->post('skim'));
        $this->skim_budget          = $this->input->post('budget');
        $this->skim_active          = $this->input->post('status');
        $this->skim_external        = $this->input->post('eksternal');
        $this->skim_anggota_min     = $this->input->post('min_anggota');
        $this->skim_anggota_max     = $this->input->post('max_anggota');
        $this->skim_anggotamhs_min  = $this->input->post('anggota_mhs');
        $this->skim_anggotaeks_min  = $this->input->post('anggota_eks');

        return $this->db->insert('lemlit_skim', $this);
    }

    public function updateskim()
    {
        $id = $this->input->post('id_skim');
        $skim = $this->input->post('skim');
        $seo = seo_title($this->input->post('skim'));
        $min_anggota = $this->input->post('min_anggota');
        $max_anggota = $this->input->post('max_anggota');
        $anggota_mhs = $this->input->post('anggota_mhs');
        $anggota_eks = $this->input->post('anggota_eks');
        $budget = $this->input->post('budget');
        $status = $this->input->post('status');
        $eksternal = $this->input->post('eksternal');
        $date = date('Y-m-d H:i:s');

        $ids = $this->variasi->decode($id);

        $this->db->query("UPDATE `lemlit_skim` SET `skim_name` = '$skim', `skim_name_seo` = '$seo',
        `skim_budget` = '$budget', `skim_active` = '$status', `skim_update` = '$date', `skim_external` = '$eksternal',
        `skim_anggota_min` = '$min_anggota', `skim_anggota_max` ='$max_anggota', `skim_anggotamhs_min` = '$anggota_mhs',
        `skim_anggotaeks_min` = '$anggota_eks'  WHERE `skim_id` = '$ids' ");
    }

    public function deleteskim($id)
    {
        $ids = $this->variasi->decode($id);
        return $this->db->delete('lemlit_skim', array("skim_id" => $ids));
    }
}
