<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usulan_model extends CI_Model
{
    private function getId()
    {
        $nidn = $this->session->userdata('nidn');
        return $this->db->query("SELECT `reviewer_id` FROM `ab_reviewer` WHERE nidn = '$nidn' ")->row();
    }

    public function index()
    {
        $id = $this->getId();
        return $this->db->query("SELECT a.*, b.`skema_nama`, c.* FROM `ab_usulan` a LEFT JOIN `ab_skema` b ON a.`skema_id`=b.`skema_id` LEFT JOIN ab_review_proposal c ON a.usulan_id=c.usulan_id  WHERE c.user_id='$id->reviewer_id' ORDER BY a.`usulan_id` DESC")->result();
    }

    public function getbyid($id)
    {
        $ids = $this->variasi->decode($id);
        $sql = $this->db->query("SELECT a.*, b.*, c.`skema_nama`, d.`tahun_ajaran`, e.`anggota_pangkat`, e.`anggota_jabatan`, e.`email` FROM `ab_usulan` a LEFT JOIN `ab_lembaga` b ON b.`usulan_id`=a.`usulan_id` 
        LEFT JOIN `ab_skema` c ON a.`skema_id`=c.`skema_id` LEFT JOIN `mst_tahun_akademik` d ON a.`id_tahun`=d.`id_tahun` LEFT JOIN `ab_anggota` e ON a.`usulan_id`=e.`usulan_id` WHERE a.`usulan_id` = '$ids' AND e.`anggota_posisi`='ketua' 
        ")->row();
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
        } else {
            $sql = $this->db->query("");
        }
        return $sql;
    }

    public function periode()
    {
        $sql = $this->db->query("SELECT * FROM `ab_periode` WHERE `setting_jenis` = 'periode_review' AND `keterangan` = 'active' ")->num_rows();
        return $sql;
    }

    public function review($id)
    {
        $ids = $this->variasi->decode($id);
        $id = $this->getId();
        // return $this->db->query("SELECT a.`usulan_id`, a.`nidn_pengusul`, a.`nama`, a.`usulan_judul`, a.`target_luaran`, a.`file_usulan`, b.`skema_nama` FROM `ab_usulan` a LEFT JOIN `ab_skema` b ON a.`skema_id`=b.`skema_id` WHERE a.`usulan_id`='$ids'")->row();
        return $this->db->query("SELECT a.`usulan_id`, a.`nidn_pengusul`, a.`nama`, a.`usulan_judul`, a.usulan_biaya, a.usulan_biaya_apb, a.usulan_biaya_lain, a.usulan_total_biaya, a.`target_luaran`, d.file_usulan, b.`skema_nama`, c.`review_id` FROM `ab_usulan` a LEFT JOIN `ab_skema` b ON a.`skema_id`=b.`skema_id` LEFT JOIN `ab_review_proposal` c ON a.`usulan_id`=c.`usulan_id` LEFT JOIN `ab_tahap_hibah` d ON a.usulan_id=d.usulan_id WHERE a.`usulan_id`='$ids' AND c.`user_id`='$id->reviewer_id'")->row();
    }

    public function aspek()
    {
        return $this->db->query("SELECT * FROM `ab_aspek_penilaian` ")->result();
    }

    public function add()
    {
        $reviewid = $this->variasi->decode($_POST['review_id']);
        $date = date("Y-m-d");
        $this->db->query("UPDATE `ab_review_proposal` SET tanggal_review = '$date', `catatan` = '". $_POST['catatan'] ."', `dana_ajuan` = '". $_POST['dana']."' WHERE `review_id` = '$reviewid' ");

        for ($i = 1; $i < $_POST['jumlah']; $i++) {
            $this->db->insert("ab_skor_aspek", array(
                'aspek_id'        => $_POST['aspek_id' . $i],
                'review_id'        => $reviewid,
                'skor'            => $_POST['nilai'. $i],
            ));
        };
        $ids = $this->variasi->decode($_POST['usulan_id']);
        $jumlah = $this->db->query("SELECT COUNT(review_id) as jmlrev FROM `ab_review_proposal` WHERE `usulan_id` = '$ids'")->row();
        $mengisi = $this->db->query("SELECT count(review_id) as jum FROM ab_review_proposal WHERE usulan_id = '$ids' AND tanggal_review != '0000-00-00'")->row();

        $jumlah_rev = $jumlah->jmlrev;
        $mengisi_rev = $mengisi->jum;
        if ($mengisi_rev >= $jumlah_rev) {
            $hasil = $this->db->query("SELECT SUM( nilai * skor ) AS jumlah
								FROM ab_review_proposal, ab_aspek_penilaian, ab_skor_aspek
								WHERE ab_skor_aspek.aspek_id = ab_aspek_penilaian.aspek_id
								AND ab_review_proposal.review_id = ab_skor_aspek.review_id
								AND usulan_id = '$ids' GROUP BY usulan_id")->row();

            //TAMBAHAN
            $hslnil = $hasil->jumlah / $mengisi_rev;
            $bn = $this->db->query("SELECT batas_nilai FROM `ab_batas_minimal` ORDER BY tanggal_berlaku DESC LIMIT 1")->row();
            if ($hslnil >= $bn->batas_nilai) {
                $nilai = 'Lolos';
            } else {
                $nilai = 'Tidak Lolos';
            };

            $this->db->query("UPDATE `ab_usulan` SET `nilai_rata` = '$hslnil', `hasil_nilai` = '$nilai' WHERE `usulan_id` = '$ids' ");
        };
    }
}
?>