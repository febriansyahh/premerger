<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Periode_model extends CI_Model
{
    public function periode()
    {
        return $this->db->get('lit_periode')->result_array();
    }

    public function updateperiode()
    {
        $id = $this->input->post('id');
        $dari = $this->input->post('dari');
        $sampai = $this->input->post('sampai');
        $maks_ketua = $this->input->post('maks_ketua');
        $maks_anggota = $this->input->post('maks_anggota');
        $maks_usulan = $this->input->post('maks_usulan');
        $status = $this->input->post('status');
        $update = date("Y-m-d H:i:s");
        $ids = $this->variasi->decode($id);

        $this->db->query("UPDATE `lit_periode` SET `periode_dari` = '$dari', `periode_sampai` = '$sampai', 
        `periode_status` = '$status', `periode_update` = '$update', `periode_max_ketua` = '$maks_ketua', `periode_max_anggota` = '$maks_anggota'
        , `periode_max_usulan` = '$maks_usulan' WHERE `periode_id` = '$ids' ");
    }
}
