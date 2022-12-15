<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatan_model extends CI_Model
{
    private $_table = "ab_jabatan_lpm";

    public function index()
    {
        return $this->db->get($this->_table)->result();
    }

    public function add()
    {
        $post = $this->input->post();

        $this->nama_jab_lpm     = $post['nama'];
        $this->nidn_jab_lpm     = $post['nidn'];
        $this->nis_jab_lpm     = $post['nis'];
        $this->jenis_jab_lpm     = 'Ketua';
        $this->status_jab_lpm     = '1';

        return $this->db->insert($this->_table, $this);
    }

    public function delete($id)
    {
        $ids = $this->variasi->decode($id);
        return $this->db->delete($this->_table, array("kode_jabatan" => $ids));
    }

    public function getJabatanLPM()
    {
        return $this->db->query("SELECT * FROM `ab_jabatan_lpm`")->result();
    }

    public function getLpm($id)
    {
        $ids = $this->variasi->decode($id);
        return $this->db->query("SELECT * FROM `ab_jabatan_lpm` WHERE `id_jab_lpm` = '$ids' ")->row();
    }

    public function updatelpm()
    {
        $post = $this->input->post();

        $id = $post['id'];
        $nama = $post['nama'];
        $nis = $post['nis'];
        $nidn = $post['nidn'];

        
        $ids = $this->variasi->decode($id);
        
        $this->db->query("UPDATE `ab_jabatan_lpm` SET `nama_jab_lpm` = '$nama', `nis_jab_lpm` = '$nis', `nidn_jab_lpm` = '$nidn' WHERE `id_jab_lpm` = '$ids' ");
    }

    public function status($id, $st)
    {
        $this->db->query("UPDATE `ab_jabatan_lpm` SET `status_jab_lpm` = '$st' WHERE `id_jab_lpm` = '$id' ");
    }

    // public function listdosen()
    // {
    //     // Pakai ws get dari helper
    //     $post = $this->input->post();
    //     $id = $post['id'];
    //     $param = array('nip' => $id);
    //     $service = _wsumkdosen('services/simpel/getdosen', $param);
    //     if ($service['status']== true) {
    //         $data = $service['result']['data'];
    //                 foreach ($data as $key => $value) {
    //                     $nis = $value['nis'];
    //                     $nama = $value['nama'];
    //                     echo '<option value="' . $nis . "-" . $nama . '" >' . $nis . " - " . $nama . '</option>';
    //                 }
    //     }

    //     // Pakai ws get dari local model sendiri
    //     // $a = $this->ws_getdosen($id);
    //     // $data = $a['result']['data'];

    //     // foreach ($data as $key => $value) {
    //     //     // $nidn = $value['nidn'];
    //     //     $nis = $value['nis'];
    //     //     $nama = $value['nama'];
    //     //     echo '<option value="' . $nis . "-" . $nama . '" >' . $nis . " - " . $nama . '</option>';
    //     // }
    // }

    // public function ws_getdosen($nidn)
    // {
    //     $curl = curl_init();

    //     curl_setopt_array($curl, array(
    //         CURLOPT_URL => 'https://ws.umk.ac.id/services/simpel/getdosen',
    //         CURLOPT_RETURNTRANSFER => true,
    //         CURLOPT_ENCODING => '',
    //         CURLOPT_MAXREDIRS => 10,
    //         CURLOPT_TIMEOUT => 0,
    //         CURLOPT_FOLLOWLOCATION => true,
    //         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //         CURLOPT_CUSTOMREQUEST => 'POST',
    //         CURLOPT_POSTFIELDS => array(
    //             'nip'             => $nidn
    //         ),
    //         CURLOPT_HTTPHEADER => array(
    //             'umk_api_key: 98d04264dde002562a8620a16598cbcb40acc31f',
    //             'Cookie: PHPSESSID=8bbgupsnq6hl6u7kktgsg2k3b9q6amek'
    //         ),
    //     ));

    //     $response = curl_exec($curl);

    //     curl_close($curl);
    //     $result = json_decode($response, true);
    //     return $result;
    // }
}
?>