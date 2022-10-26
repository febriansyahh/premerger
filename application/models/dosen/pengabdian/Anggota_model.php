<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota_model extends CI_Model 
{
    private $_table = "p_anggota";

    public function index()
    {
        $nis = $this->session->userdata('nis');
        return $this->db->query("SELECT u.*, s.`nama_skim` FROM `p_usulan` u LEFT JOIN p_anggota a ON a.`usulan_id`=u.`usulan_id` LEFT JOIN `p_skim` s ON u.`skim_id`=s.`skim_id` WHERE a.`username` = '$nis' ORDER BY u.tahun_usulan DESC ")->result();
    }

    public function detail($id)
    {
        $ids = $this->variasi->decode($id);
        $nis = $this->session->userdata('nis');
        $nidn = $this->session->userdata('nidn');
        $sql = $this->db->query("SELECT status_kelengkapan, catatan, sifat_kegiatan, bidang_keahlian,
			    p_usulan.username, p_usulan.nama_lengkap, p_usulan.status_usulan, p_usulan.nama_prodi,
			    nama_jabatan, tahun_usulan, nama_skim, nama_fakultas, tahun_pelaksanaan, judul,
				abstrak, keyword, email_dosen, nomor_hp, alamat_dosen, lama_penelitian, apb_umk, biaya_lain,
                p_usulan.biaya_pagu_min, p_usulan.biaya_pagu_max, kota_usulan, lpm_nama, lpm_nip, rektor_nama,
                rektor_nip, dekan_nama, nilai_rata, hasil_nilai, dekan_nip FROM p_usulan
                JOIN p_skim ON p_usulan.skim_id = p_skim.skim_id
                JOIN p_anggota ON p_anggota.usulan_id = p_usulan.usulan_id
                LEFT JOIN p_review_proposal ON p_review_proposal.usulan_id = p_usulan.usulan_id
                WHERE p_usulan.usulan_id = '$ids' AND (p_anggota.username = '$nis' OR p_anggota.username = '$nidn')")->row();
      
        return $sql;
    }

    public function hibah($id)
    {
        $ids = $this->variasi->decode($id);
        return $this->db->query("SELECT * FROM `p_tahap_hibah` WHERE usulan_id = '$ids'")->row();
    }

    public function anggota($id)
    {
        $ids = $this->variasi->decode($id);
        return $this->db->query("SELECT * FROM `p_anggota` WHERE usulan_id = '$ids'")->result();
    }

}
?>