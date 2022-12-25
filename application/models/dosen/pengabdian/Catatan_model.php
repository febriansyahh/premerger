<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Catatan_model extends CI_Model{
    private $_table = "ab_catatan_harian";

    public function index()
    {
        $nis = $this->session->userdata('nis');
        $nidn = $this->session->userdata('nidn');
        $kode = $this->session->userdata('kode');

        $sql = $this->db->query("SELECT b.`usulan_id`, b.`usulan_judul`, b.`status_usulan`,  c.`skema_nama` FROM `ab_usulan` b LEFT JOIN `ab_skema` c ON b.`skema_id`=c.`skema_id` WHERE (b.`nidn_pengusul` = '$nidn' OR b.`nidn_pengusul` = '$nis' OR b.kode_user='$kode') ORDER BY b.`usulan_id` DESC")->result();
        return $sql;
    }

    public function judul($id)
    {
        $ids = $this->variasi->decode($id);
        $sql = $this->db->query("SELECT `usulan_id`, `usulan_judul` FROM `ab_usulan` WHERE `usulan_id` = '$ids' ")->row();
        return $sql;
    }
    
    public function subindex($id)
    {
        $ids = $this->variasi->decode($id);
        $sql = $this->db->query("SELECT a.*, b.`usulan_judul`, c.`skema_nama` FROM `ab_catatan_harian` a JOIN `ab_usulan` b ON a.`usulan_id` = b.`usulan_id` LEFT JOIN `ab_skema` c ON b.`skema_id`=c.`skema_id` WHERE a.`usulan_id` = '$ids' ORDER BY a.`catatan_id` DESC")->result();
        return $sql;
    }

    public function save()
    {
        $post = $this->input->post();
        $date = date("Y-m-d H:i:s");
        $tgl = date("Y-m-d");
        $usulan_id = $this->variasi->decode($post['id']);

        $this->usulan_id                = $usulan_id;
        $this->catatan_tanggal          = $tgl;
        $this->catatan_uraian           = $post['uraian'];
        $this->catatan_persentase       = $post['persentase'];
        $this->catatan_file             = $this->_uploadFile($usulan_id, $tgl);
        $this->catatan_updated          = $date;

        $this->db->insert('ab_catatan_harian', $this);
    }


    private function _uploadFile($a, $b)
    {
        $c = 'Catatan_' . $a . '_' . $b;

        $config['upload_path']          = './upload_file/pengabdian/pelaksanaan/';
        $config['allowed_types']        = 'pdf|jpg|png';
        $config['file_name']            = $c;
        $config['overwrite']            = true;
        $config['max_size']             = 2048;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ($this->upload->do_upload('filecatatan')) {
            return $this->upload->data("file_name");
        }
    }

    public function delete($id)
    {
        $ids = $this->variasi->decode($id);

        $sql = $this->db->query("SELECT `catatan_file` FROM `ab_catatan_harian` WHERE `catatan_id` = '$ids'")->row();

        unlink('./upload_file/pengabdian/pelaksanaan/' . $sql->catatan_file);
        
        return $this->db->delete('ab_catatan_harian', array("catatan_id" => $ids));
    }
}