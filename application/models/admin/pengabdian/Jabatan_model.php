<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatan_model extends CI_Model
{
    private $_table = "p_jabatan";

    public function index()
    {
        return $this->db->get($this->_table)->result();
    }

    public function add()
    {
        $post = $this->input->post();

        $urutan = $post['urutan'];
        $nama = $post['nama'];

        $this->urutan_jabatan     = $urutan;
        $this->nama_jabatan       = $nama;

        return $this->db->insert($this->_table, $this);
    }

    public function edit()
    {
        $post = $this->input->post();

        $kd = $this->variasi->decode($post['kd_jbtn']);
        $urutan = $post['urutan_jbtn'];
        $nama = $post['nm_jbtn'];

        $this->db->query("UPDATE `p_jabatan` SET `urutan_jabatan` = '$urutan', `nama_jabatan` = '$nama' WHERE `kode_jabatan` = '$kd'");
    }

    public function delete($id)
    {
        $ids = $this->variasi->decode($id);
        return $this->db->delete($this->_table, array("kode_jabatan" => $ids));
    }

    public function getJabatanLPM()
    {
        return $this->db->query("SELECT * FROM `p_jabatan_lpm`")->result();
    }

    public function getLpm($id)
    {
        $ids = $this->variasi->decode($id);
        return $this->db->query("SELECT * FROM `p_jabatan_lpm` WHERE `id_jab_lpm` = '$ids' ")->row();
    }

    public function addlpm()
    {
        $post = $this->input->post();
        $res = explode("-", $post['kode_dos']); 
        $nis = $res[0];
        $param = array('nip' => $nis);
        $service = _wsumkdosen('services/simpel/getdosen', $param);
        $data = $service['result']['data']['0'];
        
        if ($service['status']== true) {
            $nis = $data['nis'];
            $nidn = $data['nidn'];
            $nama = $data['nama'];
            
            $this->nama_jab_lpm       = $nama;
            $this->nis_jab_lpm        = $nis;
            $this->nidn_jab_lpm       = $nidn;
            $this->jenis_jab_lpm      = 'Ketua';
            $this->status_jab_lpm      = '1';
    
            return $this->db->insert('p_jabatan_lpm', $this);
        }
    }

    public function updatelpm()
    {
        $post = $this->input->post();

        $id = $post['id'];
        $nama = $post['nama'];
        $nis = $post['nis'];
        $nidn = $post['nidn'];

        
        $ids = $this->variasi->decode($id);
        
        $this->db->query("UPDATE `p_jabatan_lpm` SET `nama_jab_lpm` = '$nama', `nis_jab_lpm` = '$nis', `nidn_jab_lpm` = '$nidn' WHERE `id_jab_lpm` = '$ids' ");
    }

    public function status($id, $st)
    {
        $this->db->query("UPDATE `p_jabatan_lpm` SET `status_jab_lpm` = '$st' WHERE `id_jab_lpm` = '$id' ");
    }

    public function listdosen()
    {
        // Pakai ws get dari helper
        $post = $this->input->post();
        $id = $post['id'];
        $param = array('nip' => $id);
        $service = _wsumkdosen('services/simpel/getdosen', $param);
        if ($service['status']== true) {
            $data = $service['result']['data'];
                    foreach ($data as $key => $value) {
                        $nis = $value['nis'];
                        $nama = $value['nama'];
                        echo '<option value="' . $nis . "-" . $nama . '" >' . $nis . " - " . $nama . '</option>';
                    }
        }

        // Pakai ws get dari local model sendiri
        // $a = $this->ws_getdosen($id);
        // $data = $a['result']['data'];

        // foreach ($data as $key => $value) {
        //     // $nidn = $value['nidn'];
        //     $nis = $value['nis'];
        //     $nama = $value['nama'];
        //     echo '<option value="' . $nis . "-" . $nama . '" >' . $nis . " - " . $nama . '</option>';
        // }
    }

    public function ws_getdosen($nidn)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://ws.umk.ac.id/services/simpel/getdosen',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'nip'             => $nidn
            ),
            CURLOPT_HTTPHEADER => array(
                'umk_api_key: 98d04264dde002562a8620a16598cbcb40acc31f',
                'Cookie: PHPSESSID=8bbgupsnq6hl6u7kktgsg2k3b9q6amek'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $result = json_decode($response, true);
        return $result;
    }
}
?>