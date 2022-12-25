<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Skema_model extends CI_Model
{
    private $_table = "ab_skema";

    public function index()
    {
        return $this->db->query("SELECT * FROM `ab_skema`  ")->result();
    }

    public function save()
    {
        $post = $this->input->post();

        $nama = $post['nama'];
        $biayamin = $post['biayamin'];
        $biayamax = $post['biayamax'];
        $kuota = $post['kuota'];
        $status = $post['status'];

        $this->skema_nama       = $nama;
        $this->skema_biaya_min  = $biayamin;
        $this->skema_biaya_max  = $biayamax;
        $this->skema_kuota      = $kuota;
        $this->skema_status     = $status;

        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $nama = $post['nama'];
        $pagumin = $post['biayamin'];
        $pagumax = $post['biayamax'];
        $kuota = $post['kuota'];
        $status = $post['status'];
        $ids = $this->variasi->decode($post['id']);

        $this->db->query("UPDATE `ab_skema` SET `skema_nama` = '$nama', `skema_biaya_min` = '$pagumin', `skema_biaya_max` = '$pagumax', `skema_kuota` = '$kuota', `skema_status` = '$status' WHERE `skema_id` = '$ids'");
    }

    public function delete($id)
    {
        $ids = $this->variasi->decode($id);
        return $this->db->delete($this->_table, array("skema_id" => $ids));
    }

}
