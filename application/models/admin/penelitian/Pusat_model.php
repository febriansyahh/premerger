<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pusat_model extends CI_Model
{
    public function pusatstudi()
    {
        return $this->db->get('lit_pusat_studi')->result();
    }

    public function savepusat()
    {
        $this->pusat_studi_nama = $this->input->post('nama');
        $this->pusat_studi_ketua = $this->input->post('ketua');
        $this->pusat_studi_nis = $this->input->post('nis');

        return $this->db->insert('lit_pusat_studi', $this);
    }

    public function updatepusat()
    {
        $id = $this->input->post('id_skim');
        $nama = $this->input->post('nama');
        $ketua = $this->input->post('ketua');
        $nis = $this->input->post('nis');

        $ids = $this->variasi->decode($id);

        $this->db->query("UPDATE `lit_pusat_studi` SET `pusat_studi_nama` = '$nama', `pusat_studi_ketua` = '$ketua', `pusat_studi_nis` = '$nis' WHERE `pusat_studi_id` = '$ids' ");
    }

    public function deletepusat($id)
    {
        $ids = $this->variasi->decode($id);
        return $this->db->delete('lit_pusat_studi', array("pusat_studi_id" => $ids));
    }
}
