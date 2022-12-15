<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reviewer_model extends CI_Model 
{
    private $_table = "ab_reviewer";

    public function index()
    {
        return $this->db->get($this->_table)->result();
    }


    public function dosen()
    {
        $post = $this->input->post();
        $id = $post['id'];
        $a = _wsgetdosen($id);
        $data = $a['result']['data'];

        foreach ($data as $key => $value) {
            $nis = $value['nis'];
            $nama = $value['nama'];
            echo '<option value="' . $nis . "-" . $nama . '" >' . $nis . " - " . $nama . '</option>';
        }
    }

    public function save()
    {
        $post = $this->input->post();
        $iddos = $post['kode_dos'];
        $dosen = explode('-', $iddos);
        $data = _wsgetdosen($dosen[0]);
        $res = $data['result']['data'][0];
        $identity = $res['nidn'] != '-' ? $res['nidn'] : $res['nis'];
      
        $this->nidn = $identity;
        $this->nama_lengkap = $res['nama'];
        $this->jabatan = $res['pangkat'];
        $this->status = 'Active';

        return $this->db->insert($this->_table, $this);
    }

    public function actived($id)
    {
        $ids = $this->variasi->decode($id);
        $this->db->query("UPDATE `ab_reviewer` SET `status` = 'Active' WHERE `reviewer_id` = '$ids' ");
    }

    public function nonactived($id)
    {
        $ids = $this->variasi->decode($id);
        $this->db->query("UPDATE `ab_reviewer` SET `status` = 'Nonactive' WHERE `reviewer_id` = '$ids' ");
    }

    public function delete($id)
    {
        $ids = $this->variasi->decode($id);

        return $this->db->delete($this->_table, array("reviewer_id" => $ids));
    }
}

?>