<?php
defined ('BASEPATH') OR exit('No direct script access allowed');

class Laporan_model extends CI_Model
{
    public function index()
    {
        $nis = $this->session->userdata('nis');
        $nidn = $this->session->userdata('nidn');
        $kode = $this->session->userdata('kode');

        $sql = $this->db->query("SELECT b.`usulan_id`, b.`usulan_judul`, b.`status_usulan`,  c.`skema_nama` FROM `ab_usulan` b LEFT JOIN `ab_skema` c ON b.`skema_id`=c.`skema_id` WHERE (b.`nidn_pengusul` = '$nidn' OR b.`nidn_pengusul` = '$nis' OR b.kode_user='$kode') ORDER BY b.`usulan_id` DESC")->result();
        return $sql;
    }

    public function cekkemajuan($id)
    {
        $ids = $this->variasi->decode($id);
        $sql = $this->db->query("SELECT COUNT(catatan_id) AS jmlh, SUM(catatan_persentase) AS persentase FROM `ab_catatan_harian` WHERE `usulan_id` = '$ids' ")->row();
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

    // Versi luaran ditambahkaan
    // public function savekemajuan()
    // {
    //     $post = $this->input->post();
    //     $date = date("Y-m-d H:i:s");
    //     $usulan_id = $this->variasi->decode($post['idusulan']);

    //     $this->usulan_id                = $usulan_id;
    //     $this->tanggal                  = $post['tanggal'];
    //     $this->kemajuan_ringkasan       = $post['uraian'];
    //     $this->kemajuan_keyword         = $post['keyword'];
    //     $this->kemajuan_file            = $this->_uploadFile($usulan_id, $post['tanggal'], 'Kemajuan', 'filekemajuan');
    //     $this->luaran_satu              = $this->_uploadFile($usulan_id, $post['tanggal'], 'Luaran_Kem_1', 'luaran1');
    //     $this->luaran_dua               = $this->_uploadFile($usulan_id, $post['tanggal'], 'Luaran_Kem_2', 'luaran2');
    //     $this->luaran_tiga              = $this->_uploadFile($usulan_id, $post['tanggal'], 'Luaran_Kem_3', 'luaran3');
    //     $this->kemajuan_insert          = $date;

    //     $this->db->insert('ab_laporan_kemajuan', $this);
    // }

    // public function deletekem($id)
    // {
    //     $ids = $this->variasi->decode($id);
    //     $sql = $this->db->query("SELECT `kemajuan_file`, `luaran_satu`, `luaran_dua`, `luaran_tiga` FROM `ab_laporan_kemajuan` WHERE `kemajuan_id`= '$ids'")->row();

    //     $a = $sql->kemajuan_file;
    //     $b = $sql->luaran_satu;
    //     $c = $sql->luaran_dua;
    //     $d = $sql->luaran_tiga;

    //     unlink('./upload_file/pengabdian/pelaksanaan/' . $a);
    //     unlink('./upload_file/pengabdian/pelaksanaan/' . $b);
    //     unlink('./upload_file/pengabdian/pelaksanaan/' . $c);
    //     unlink('./upload_file/pengabdian/pelaksanaan/' . $d);

    //     return $this->db->delete('ab_laporan_kemajuan', array("kemajuan_id" => $ids));
    // }
    
    public function savekemajuan()
    {
        $post = $this->input->post();
        $date = date("Y-m-d H:i:s");
        $tgl = date("Y-m-d");
        $usulan_id = $this->variasi->decode($post['idusulan']);

        $this->usulan_id                = $usulan_id;
        $this->tanggal                  = $tgl;
        $this->kemajuan_ringkasan       = $post['uraian'];
        $this->kemajuan_keyword         = $post['keyword'];
        $this->kemajuan_file            = $this->_uploadFile($usulan_id, $tgl, 'Kemajuan', 'filekemajuan');
        $this->kemajuan_insert          = $date;

        $this->db->insert('ab_laporan_kemajuan', $this);

        // $this->db->query("UPDATE `ab_usulan` SET `status_tahap` = 'Laporan Kemajuan' WHERE `usulan_id` = '$usulan_id'");
    }


    public function deletekem($id)
    {
        $ids = $this->variasi->decode($id);
        $sql = $this->db->query("SELECT `kemajuan_file` FROM `ab_laporan_kemajuan` WHERE `kemajuan_id`= '$ids'")->row();
        
        $a = $sql->kemajuan_file;
        
        unlink('./upload_file/pengabdian/pelaksanaan/' . $a);

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
        $tgl = date("Y-m-d");
        $usulan_id = $this->variasi->decode($post['idusulan']);
        $link = $post['linkartikel'];

        $this->usulan_id                = $usulan_id;
        $this->tanggal                  = $tgl;
        $this->laporan_ringkasan       = $post['uraian'];
        $this->laporan_keyword         = $post['keyword'];
        $this->laporan_file            = $this->_uploadFile($usulan_id, $tgl, 'Laporan_Akhir', 'fileakhir');
        if (empty($link)) {
            $this->luaran_satu              = $this->_uploadFile($usulan_id, $tgl, 'Luaran_Akhir_1', 'fileartikel');
        } else {
            $this->luaran_satu              = $post['linkartikel'];
        }
        // $this->luaran_dua               = $this->_uploadFile($usulan_id, $tgl, 'Luaran_Akhir_2', 'luaran2');
        // $this->luaran_tiga              = $this->_uploadFile($usulan_id, $tgl, 'Luaran_Akhir_3', 'luaran3');
        $this->laporan_insert          = $date;
        
        $this->db->insert('ab_laporan_pengabdian', $this);

        $this->db->query("UPDATE `ab_usulan` SET `status_tahap` = 'Laporan Akhir' WHERE `usulan_id` = '$usulan_id'");
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

    public function iskemajuan($id)
    {
        $ids = $this->variasi->decode($id);
        $sql = $this->db->query("SELECT `kemajuan_id` FROM `ab_laporan_kemajuan` WHERE `usulan_id` = '$ids' ")->num_rows();
        return $sql;
    }

    public function ismonev($id)
    {
        $ids = $this->variasi->decode($id);
        $sql = $this->db->query("SELECT `id_monev` FROM `ab_laporan_monev` WHERE `usulan_id` = '$ids' ")->num_rows();
        return $sql;
    }

    public function monev($id)
    {
        $ids = $this->variasi->decode($id);
        $sql = $this->db->query("SELECT a.*, c.nama_lengkap AS nama_reviewer_1, d.nama_lengkap AS nama_reviewer_2 FROM `ab_laporan_monev` a LEFT JOIN `ab_usulan` b ON a.usulan_id=b.usulan_id LEFT JOIN `ab_reviewer` c ON a.reviewer_id_satu=c.reviewer_id LEFT JOIN `ab_reviewer` d ON a.reviewer_id_dua=d.reviewer_id WHERE a.usulan_id = '$ids'")->result();
        return $sql;
    }

    public function reviewer()
    {
        return $this->db->query("SELECT * FROM ab_reviewer WHERE `status` = 'active'")->result();
    }

    public function savemonev()
    {
        $post = $this->input->post();
        $date = date("Y-m-d H:i:s");
        $usulan_id = $this->variasi->decode($post['idusulan']);

        $this->usulan_id              = $usulan_id;
        $this->berita_acara           = $post['uraian'];
        $this->reviewer_id_satu       = $post['pemonev1'];
        $this->reviewer_id_dua        = $post['pemonev2'];
        $this->tanggal                = $post['tanggal'];
        $this->file_monev             = $this->_uploadFile($usulan_id, $post['tanggal'], 'Laporan_Monev', 'filemonev');
        $this->inserted               = $date;
        $this->db->insert('ab_laporan_monev', $this);
    }

    public function deletemonev($id)
    {
        $ids = $this->variasi->decode($id);
        $sql = $this->db->query("SELECT `file_monev` FROM `ab_laporan_monev` WHERE `id_monev`= '$ids'")->row();

        $a = $sql->file_monev;

        unlink('./upload_file/pengabdian/pelaksanaan/' . $a);

        return $this->db->delete('ab_laporan_monev', array("id_monev" => $ids));
    }
}
