<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usulan_model extends CI_Model 
{
    public function index()
    {
        $nis = $this->session->userdata('nis');
        $nidn = $this->session->userdata('nidn');

        // Pre merger
        // $sql = $this->db->query("SELECT u.*, IF(s.`semester` = '1', 'Ganjil', IF(s.`semester` = '2', 'Genap', '-')) AS semester , s.`tahun_ajaran`, sk.`nama_skim` 
        //         FROM `p_usulan` u LEFT JOIN `p_semester` s ON u.`id_tahun`= s.`id_semester` JOIN `p_skim` sk ON u.`skim_id`=sk.`skim_id`
        //         WHERE (u.`username` = '$nis' OR u.`username` = '$nidn') ")->result();

        // simlitabmas
        $sql = $this->db->query("SELECT a.`id_usulan`, a.`nidn_pengusul`, b.bidang, c.`kelompok_nama`, d.bidang_fokus, a.`usulan_tema`, a.`usulan_topik`, a.`usulan_judul`, a.`status_tkt`, a.`tkt_target`, a.`usulan_tahun`, f.`tahun_ajaran`, a.`usulan_biaya`, e.`sbk_nama`, e.`sbk_budget`, a.`usulan_total_biaya`, a.`usulan_unit_ajar`, a.`file_usulan`, a.`usulan_jumlah_mahasiswa`, a.`usulan_tgl_mulai`, a.`usulan_tgl_selesai`, a.`usulan_status` FROM `lit_usulan` a LEFT JOIN `lit_bidang_ilmu` b ON a.`bidang_ilmu`=b.id_bidang LEFT JOIN `lit_kelompok_makro` c ON a.`kelompok_makro`=c.`kelompok_id` LEFT JOIN `lit_riset_fokus` d ON a.`riset_fokus`=d.`riset_id`
        LEFT JOIN `lit_sbk` e ON a.`usulan_sbk`=e.`sbk_id` LEFT JOIN `mst_tahun_akademik` f ON a.`id_tahun`=f.`id_tahun` WHERE (a.`nidn_pengusul` = '$nidn' OR a.`nidn_pengusul`= '$nis') ORDER BY a.`id_usulan` DESC ")->result();
        return $sql;
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
                WHERE p_usulan.usulan_id = '$ids' AND (p_usulan.`username` = '$nis' OR `p_usulan`.`username`='$nidn')")->row();
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
