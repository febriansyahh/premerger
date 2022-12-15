<?php
defined ('BASEPATH') OR exit('No direct script access allowed');

class Laporan_model extends CI_Model
{
    public function index()
    {
        $nis = $this->session->userdata('nis');
        $nidn = $this->session->userdata('nidn');

        $sql = $this->db->query("SELECT b.`usulan_id`, b.`usulan_judul`, b.`status_usulan`,  c.`skema_nama` FROM `ab_usulan` b LEFT JOIN `ab_skema` c ON b.`skema_id`=c.`skema_id` WHERE (b.`nidn_pengusul` = '$nidn' OR b.`nidn_pengusul` = '$nis') ORDER BY b.`usulan_id` DESC")->result();
        return $sql;
    }

    public function judul($id)
    {
        $ids = $this->variasi->decode($id);
        $sql = $this->db->query("SELECT `usulan_id`, `usulan_judul` FROM `ab_usulan` WHERE `usulan_id` = '$ids' ")->row();
        return $sql;
    }

    public function subindexkemajuan($id)
    {
        $ids = $this->variasi->decode($id);
        $sql = $this->db->query("SELECT a.*, b.`usulan_judul`, c.`skema_nama` FROM `ab_laporan_kemajuan` a JOIN `ab_usulan` b ON a.`usulan_id` = b.`usulan_id` LEFT JOIN `ab_skema` c ON b.`skema_id`=c.`skema_id` WHERE a.`usulan_id` = '$ids' ORDER BY a.`kemajuan_id` DESC")->result();
        return $sql;
    }

    public function savekemajuan()
    {
        $post = $this->input->post();
        $date = date("Y-m-d H:i:s");
        $usulan_id = $this->variasi->decode($post['idusulan']);

        $this->usulan_id                = $usulan_id;
        $this->tanggal                  = $post['tanggal'];
        $this->kemajuan_ringkasan       = $post['uraian'];
        $this->kemajuan_keyword         = $post['keyword'];
        $this->kemajuan_file            = $this->_uploadFile($usulan_id, $post['tanggal'], 'Kemajuan', 'filekemajuan');
        $this->luaran_satu              = $this->_uploadFile($usulan_id, $post['tanggal'], 'Luaran_Kem_1', 'luaran1');
        $this->luaran_dua               = $this->_uploadFile($usulan_id, $post['tanggal'], 'Luaran_Kem_2', 'luaran2');
        $this->luaran_tiga              = $this->_uploadFile($usulan_id, $post['tanggal'], 'Luaran_Kem_3', 'luaran3');
        $this->kemajuan_insert          = $date;

        $this->db->insert('ab_laporan_kemajuan', $this);
    }


    public function deletekem($id)
    {
        $ids = $this->variasi->decode($id);
        $sql = $this->db->query("SELECT `kemajuan_file`, `luaran_satu`, `luaran_dua`, `luaran_tiga` FROM `ab_laporan_kemajuan` WHERE `kemajuan_id`= '$ids'")->row();
        
        $a = $sql->kemajuan_file;
        $b = $sql->luaran_satu;
        $c = $sql->luaran_dua;
        $d = $sql->luaran_tiga;

        unlink('./upload_file/pengabdian/pelaksanaan/' . $a);
        unlink('./upload_file/pengabdian/pelaksanaan/' . $b);
        unlink('./upload_file/pengabdian/pelaksanaan/' . $c);
        unlink('./upload_file/pengabdian/pelaksanaan/' . $d);

        return $this->db->delete('ab_laporan_kemajuan', array("kemajuan_id" => $ids));
    }
   

    public function subindexakhir($id)
    {
        $ids = $this->variasi->decode($id);
        $sql = $this->db->query("SELECT a.* FROM `ab_laporan_pengabdian` a LEFT JOIN `ab_usulan` b  ON a.`usulan_id`=b.`usulan_id` WHERE a.`usulan_id` = '$ids'")->result(); 
        return $sql;
    }

    public function saveakhir()
    {
        $post = $this->input->post();
        $date = date("Y-m-d H:i:s");
        $usulan_id = $this->variasi->decode($post['idusulan']);

        $this->usulan_id                = $usulan_id;
        $this->tanggal                  = $post['tanggal'];
        $this->laporan_ringkasan       = $post['uraian'];
        $this->laporan_keyword         = $post['keyword'];
        $this->laporan_file            = $this->_uploadFile($usulan_id, $post['tanggal'], 'Laporan_Akhir', 'fileakhir');
        $this->luaran_satu              = $this->_uploadFile($usulan_id, $post['tanggal'], 'Luaran_Akhir_1', 'luaran1');
        $this->luaran_dua               = $this->_uploadFile($usulan_id, $post['tanggal'], 'Luaran_Akhir_2', 'luaran2');
        $this->luaran_tiga              = $this->_uploadFile($usulan_id, $post['tanggal'], 'Luaran_Akhir_3', 'luaran3');
        $this->laporan_insert          = $date;
        $this->db->insert('ab_laporan_pengabdian', $this);
    }

    public function deleteakhir($id)
    {
        $ids = $this->variasi->decode($id);
        $sql = $this->db->query("SELECT `laporan_file`, `luaran_satu`, `luaran_dua`, `luaran_tiga` FROM `ab_laporan_pengabdian` WHERE `laporan_id`= '$ids'")->row();

        $a = $sql->kemajuan_file;
        $b = $sql->luaran_satu;
        $c = $sql->luaran_dua;
        $d = $sql->luaran_tiga;

        unlink('./upload_file/pengabdian/pelaksanaan/' . $a);
        unlink('./upload_file/pengabdian/pelaksanaan/' . $b);
        unlink('./upload_file/pengabdian/pelaksanaan/' . $c);
        unlink('./upload_file/pengabdian/pelaksanaan/' . $d);

        return $this->db->delete('ab_laporan_pengabdian', array("laporan_id" => $ids));
    }


    private function _uploadFile($a, $b, $c, $d)
    {
        $file = $c . '_' . $a . '_' . $b;

        $config['upload_path']          = './upload_file/pengabdian/pelaksanaan/';
        $config['allowed_types']        = 'pdf|jpg|png';
        $config['file_name']            = $file;
        $config['overwrite']            = true;
        $config['max_size']             = 2048;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ($this->upload->do_upload($d)) {
            return $this->upload->data("file_name");
        }
    }
}
