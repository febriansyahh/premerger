<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usulan_model extends CI_Model {
    public function index()
    {
        return $this->db->query("SELECT a.*, b.skim_name, c.pusat_studi_nama, d.status_desc, f.tahun_ajaran, f.tahun_semester FROM `lit_usulan` a LEFT JOIN lit_skim b ON a.skim_id=b.skim_id LEFT JOIN lit_pusat_studi c ON a.pusat_studi=c.pusat_studi_id LEFT JOIN lit_status_proposal d ON a.status_id=d.status_id LEFT JOIN mst_tahun_akademik f ON a.id_tahun_akademik=f.id_tahun ORDER BY a.usulan_id DESC")->result();
    }

    public function getbyid($id)
    {
        $ids = $this->variasi->decode($id);
        return $this->db->query("SELECT a.*, b.skim_name, c.pusat_studi_nama, d.status_desc, f.tahun_ajaran, f.tahun_semester, g.lembaga_nama, g.lembaga_jabatan, g.lembaga_pimpinan, g.lembaga_pimpinan_id, g.lembaga_lokasi, g.lembaga_file FROM `lit_usulan` a LEFT JOIN lit_skim b ON a.skim_id=b.skim_id LEFT JOIN lit_pusat_studi c ON a.pusat_studi=c.pusat_studi_id LEFT JOIN lit_status_proposal d ON a.status_id=d.status_id LEFT JOIN mst_tahun_akademik f ON a.id_tahun_akademik=f.id_tahun LEFT JOIN lit_lembaga g ON g.usulan_id=a.usulan_id  WHERE a.usulan_id = '$ids' ")->row();
    }

    public function getanggotabyid($id)
    {
        $ids = $this->variasi->decode($id);
        return $this->db->query("SELECT * FROM `lit_anggota` WHERE `usulan_id` = '$ids' ")->result();
    }

    public function getanggotaeksbyid($id)
    {
        $ids = $this->variasi->decode($id);
        return $this->db->query("SELECT * FROM `lit_anggota_eks` WHERE `usulan_id` = '$ids' ")->result();
    }

    public function syaratanggota($id)
    {
        return $this->db->query("SELECT a.usulan_id, a.skim_id, b.skim_anggota_min AS in_min, b.skim_anggota_max in_max, b.skim_anggotamhs_min AS mhs_min, b.skim_anggotaeks_min AS eks_min FROM `lit_usulan` a LEFT JOIN lit_skim b ON a.skim_id=b.skim_id WHERE a.usulan_id = '$id'")->row();
    }

    public function anggotain($id)
    {
        return $this->db->query("SELECT COUNT(usulan_id) AS angg_in FROM `lit_anggota` WHERE usulan_id='$id' AND anggota_posisi='anggota'")->row();
    }

    public function anggotaeks($id,$jns)
    {
        return $this->db->query("SELECT count(anggota_eks_id) as jmlheks FROM `lit_anggota_eks` WHERE usulan_id='$id' AND anggota_eks_posisi='$jns'")->row();
    }

    // public function migrasi()
    // {
    //     return $this->db->query("SELECT nidn, nama, usulan_judul, kode_user FROM `lit_usulan` WHERE kode_user ='0' ")->result();
    //     return $this->db->query("SELECT anggota_nidn, anggota_nama, kode_user FROM `lit_anggota` WHERE kode_user ='' ")->result();
    // }

}