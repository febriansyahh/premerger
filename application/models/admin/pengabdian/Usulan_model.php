<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usulan_model extends CI_Model
{
    private $_table = "ab_usulan";

    public function index()
    {
        return $this->db->query("SELECT a.*, b.`skema_nama`, c.`anggota_nama`, c.`anggota_nidn` FROM `ab_usulan` a LEFT JOIN `ab_skema` b ON a.`skema_id`=b.`skema_id` LEFT JOIN `ab_anggota` c ON c.`usulan_id`=a.`usulan_id` WHERE c.`anggota_posisi` ='ketua' ORDER BY a.`usulan_id` DESC")->result();
    }

    // // public function jabatan()
    // // {
    // //     return $this->db->get("p_jabatan")->result();
    // // }

    // public function save()
    // {
    //     $post = $this->input->post();

    //     $nama = $post['nama'];
    //     $jabatan = $post['jabatan'];
    //     $pagumin = $post['pagumin'];
    //     $pagumax = $post['pagumax'];
    //     $kuota = $post['kuota'];
    //     $status = $post['status'];

    //     $this->nama_skim = $nama;
    //     $this->jabatan_minimal = $jabatan;
    //     $this->biaya_pagu_min = $pagumin;
    //     $this->biaya_pagu_max = $pagumax;
    //     $this->kuota_skim = $kuota;
    //     $this->status_skim = $status;

    //     return $this->db->insert($this->_table, $this);
    // }

    // public function delete($id)
    // {
    //     $ids = $this->variasi->decode($id);
    //     return $this->db->delete($this->_table, array("skim_id" => $ids));
    // }

    public function getbyid($id)
    {
        $ids = $this->variasi->decode($id);
        $sql = $this->db->query("SELECT a.*, b.*, c.`skema_nama`, d.`tahun_ajaran`, e.`anggota_pangkat`, e.`anggota_jabatan`, e.`email` FROM `ab_usulan` a LEFT JOIN `ab_lembaga` b ON b.`usulan_id`=a.`usulan_id` 
        LEFT JOIN `ab_skema` c ON a.`skema_id`=c.`skema_id` LEFT JOIN `mst_tahun_akademik` d ON a.`id_tahun`=d.`id_tahun` LEFT JOIN `ab_anggota` e ON a.`usulan_id`=e.`usulan_id` WHERE a.`usulan_id` = '$ids' AND e.`anggota_posisi`='ketua' 
        ")->row();
        return $sql;
    }

    public function tahaphibah($id)
    {
        $ids = $this->variasi->decode($id);
        $sql = $this->db->query("SELECT tanggal, status_tahap, file_usulan as filetahap FROM `ab_tahap_hibah` WHERE `usulan_id` = '$ids'")->result();
        return $sql;
    }

    public function getanggotabyid($id)
    {
        $ids = $this->variasi->decode($id);
        $sql = $this->db->query("SELECT * FROM ab_anggota WHERE `usulan_id` ='$ids' AND `anggota_posisi` ='anggota' ")->result();
        return $sql;
    }

    public function getanggotaeksbyid($id)
    {
        $ids = $this->variasi->decode($id);
        $a = $this->getbyid($id);
        if ($a->status_kelengkapan = 'Menunggu') {
            $sql = $this->db->query("SELECT * FROM ab_anggota_eks WHERE `usulan_id` ='$ids' ")->result();
        }else{
            $sql = $this->db->query("");
        }
        return $sql;
    }

    public function pemeriksaan($id)
    {
        $ids = $this->variasi->decode($id);
        $cek = $this->db->query("SELECT `status_usulan`, `status_kelengkapan` FROM `ab_usulan` WHERE `usulan_id` = '$ids' ")->row();
        $stu = $cek->status_usulan;
        $stk = $cek->status_kelengkapan;
        $cekpem = $this->is_pemeriksaan($id);

        if (($stu == 'Diterima' && $stk == 'Tidak Lengkap' ) || $cekpem > 0)  {
            
            $sql = $this->db->query("SELECT a.*, b.`cekpem_id`, b.`cek_pilihan` FROM `ab_pemeriksaan` a LEFT JOIN `ab_cek_pemeriksaan` b ON a.`pemeriksaan_id`=b.`pemeriksaan_id` WHERE b.`usulan_id` = '$ids'")->result();
        }else{
            
            $sql = $this->db->query("SELECT * FROM ab_pemeriksaan")->result();
        }
        return $sql;
    }

    public function is_pemeriksaan($id)
    {
        $ids = $this->variasi->decode($id);
        $sql = $this->db->query("SELECT a.*, b.`cekpem_id`, b.`cek_pilihan` FROM `ab_pemeriksaan` a LEFT JOIN `ab_cek_pemeriksaan` b ON a.`pemeriksaan_id`=b.`pemeriksaan_id` WHERE b.`usulan_id` = '$ids'")->num_rows();
        return $sql;
    }

    public function donepemeriksaan()
    {
        $ids = $this->variasi->decode($_POST['id']);
        $this->db->delete("ab_cek_pemeriksaan", array("usulan_id" => $ids));
        $nilai = 1;
        for ($i = 1; $i < $_POST['jumlah']; $i++) {
            $this->db->insert("ab_cek_pemeriksaan", array(
                'pemeriksaan_id'  => $_POST['pemeriksaan_id' . $i],
                'cek_pilihan'    => $_POST['cek_pilihan' . $i],
                'usulan_id'      => $ids
            ));

            if ($_POST['cek_pilihan' . $i] == 'Ya') {
                $nilai = $nilai + 1;
            };
        };

        if ($_POST['jumlah'] == $nilai) {
            
             $this->db->query("UPDATE `ab_usulan` SET `status_kelengkapan` = 'Lengkap' WHERE `usulan_id` = '$ids' ");
             
        } else {
            $this->db->query("UPDATE `ab_usulan` SET `status_kelengkapan` = 'Tidak Lengkap' WHERE `usulan_id` = '$ids' ");
        };
    }

    public function confirm($id)
    {
        $ids = $this->variasi->decode($id);
        $this->db->query("UPDATE `ab_usulan` SET `status_usulan` = 'Diterima' WHERE `usulan_id` = '$ids' ");
    }

    public function done($id)
    {
        $ids = $this->variasi->decode($id);
        $this->db->query("UPDATE `ab_usulan` SET `status_usulan` = 'Selesai' WHERE `usulan_id` = '$ids' ");
    }

    public function verifikasi()
    {
        $post = $this->input->post();
        $id = $post['id'];
        $ids = $this->variasi->decode($id);
        $usulan = $post['usulan'];
        $alasan = $post['alasan'];
        $this->db->query("UPDATE `ab_usulan` SET `status_usulan` = '$usulan', `alasan_tolak` = '$alasan' WHERE `usulan_id` = '$ids' ");
    }

    public function reviewer()
    {
        $sql = $this->db->query("SELECT * FROM `ab_reviewer` ORDER BY reviewer_id ASC")->result();
        return $sql;
    }

    public function savereviewer()
    {
        $post = $this->input->post();
        $id = $post['id'];
        $ids = $this->variasi->decode($id);
        $reviewer = $_POST['reviewer'];

        foreach ($reviewer as $rev => $value) {
           $this->db->insert("ab_review_proposal", array(
                'usulan_id'      => $ids,
                'user_id'        => $value
            ));
        }
    }

    public function reviewernya($id)
    {
        $ids = $this->variasi->decode($id);
        $sql = $this->db->query("SELECT catatan,review_id, ab_review_proposal.user_id, tanggal_review, ab_reviewer.nama_lengkap
						FROM ab_review_proposal, ab_usulan, ab_reviewer
						WHERE ab_reviewer.reviewer_id = ab_review_proposal.user_id
						AND ab_review_proposal.usulan_id = '$ids'
						AND ab_usulan.usulan_id='$ids'")->result();
        return $sql;
    }

    public function isreviewdone($id)
    {
        $ids = $this->variasi->decode($id);
        $sql = $this->db->query("SELECT catatan,review_id, ab_review_proposal.user_id, tanggal_review, ab_reviewer.nama_lengkap
						FROM ab_review_proposal, ab_usulan, ab_reviewer
						WHERE ab_reviewer.reviewer_id = ab_review_proposal.user_id
						AND ab_review_proposal.usulan_id = '$ids'
						AND ab_usulan.usulan_id='$ids'")->num_rows();
        return $sql;
    }

    public function aspek()
    {
        return $this->db->get("ab_aspek_penilaian")->result();
    }

    public function migrasi()
    {
        // return $this->db->query("SELECT usulan_id, nidn_pengusul, nama, kode_user FROM `ab_usulans` WHERE kode_user = '0' AND nidn_pengusul != '0610713020001009' ")->result();
        // return $this->db->query("SELECT nidn, nama_lengkap, kode FROM `ab_reviewer` WHERE kode ='' ")->result();
        return $this->db->query("SELECT * FROM `ab_anggota` WHERE kode_user !='0' ")->result();
    }
    
}
