<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Report_m extends CI_Model
{
    function __construct()
	{
		parent::__construct();
        $this->load->model('admin/Report_m');
	}

    public function index()
    {
        return $this->db->query("SELECT a.*, b.`skema_nama`, c.`anggota_nama`, c.`anggota_nidn` FROM `ab_usulan` a LEFT JOIN `ab_skema` b ON a.`skema_id`=b.`skema_id` LEFT JOIN `ab_anggota` c ON c.`usulan_id`=a.`usulan_id` WHERE c.`anggota_posisi` ='ketua' ORDER BY a.`usulan_id` DESC")->result();
    }

    public function select_laporan($tanggal1, $tanggal2,$status)
    {
       
        if( empty($status)){
            // var_dump('aa');
            // exit;
            return $this->db->query("SELECT a.*, b.`skema_nama`, c.`anggota_nama`, c.`anggota_nidn`, s.tanggal 
            FROM `ab_usulan` a LEFT JOIN `ab_skema` b ON a.`skema_id`=b.`skema_id` 
            LEFT JOIN `ab_anggota` c ON c.`usulan_id`=a.`usulan_id`
            JOIN `ab_tahap_hibah` s ON s.usulan_id= a.usulan_id
            WHERE c.`anggota_posisi` ='ketua'  AND s.status_tahap='proposal'")->result();
        }
        else{
            // var_dump('baba');
            // exit;
            return $this->db->query("SELECT a.*, b.`skema_nama`, c.`anggota_nama`, c.`anggota_nidn`, s.tanggal FROM `ab_usulan` a LEFT JOIN `ab_skema` b ON a.`skema_id`=b.`skema_id` LEFT JOIN `ab_anggota` c ON c.`usulan_id`=a.`usulan_id`
            JOIN `ab_tahap_hibah` s ON s.usulan_id= a.usulan_id
            WHERE c.`anggota_posisi` ='ketua'  AND s.status_tahap='Proposal' AND s.tanggal BETWEEN '$tanggal1' AND '$tanggal2'AND a.status_usulan = '$status'")->result();
            // $sql = ("SELECT a.*, b.`skema_nama`, c.`anggota_nama`, c.`anggota_nidn`, s.tanggal FROM `ab_usulan` a LEFT JOIN `ab_skema` b ON a.`skema_id`=b.`skema_id` LEFT JOIN `ab_anggota` c ON c.`usulan_id`=a.`usulan_id`
            // JOIN `ab_tahap_hibah` s ON s.usulan_id= a.usulan_id
            // WHERE c.`anggota_posisi` ='ketua'  AND s.status_tahap='proposal' AND s.tanggal BETWEEN '$tanggal1' AND '$tanggal2'AND a.status_usulan = '$status'");
            // var_dump($sql);
            // exit;
        }
        
    }

    public function indexdana()
    {
        return $this->db->query("SELECT a.*, b.`skema_nama`, c.`anggota_nama`, c.`anggota_nidn` FROM `ab_usulan` a LEFT JOIN `ab_skema` b ON a.`skema_id`=b.`skema_id` LEFT JOIN `ab_anggota` c ON c.`usulan_id`=a.`usulan_id` WHERE c.`anggota_posisi` ='ketua' ORDER BY a.`usulan_id` DESC")->result();
    }

    public function laporan($tanggal1, $tanggal2, $status)
    {
        if (empty($status)) {
            return $this->db->query("SELECT a.*, b.`skema_nama`, c.`anggota_nama`, c.`anggota_nidn`, s.tanggal, e.dana_ajuan FROM `ab_usulan` a LEFT JOIN `ab_skema` b ON a.`skema_id`=b.`skema_id` LEFT JOIN `ab_anggota` c ON c.`usulan_id`=a.`usulan_id` JOIN `ab_tahap_hibah` s ON s.usulan_id= a.usulan_id JOIN `ab_review_proposal` e ON e.usulan_id = a.usulan_id WHERE c.`anggota_posisi` ='ketua' AND s.status_tahap='proposal'")->result();
        } else {
            return $this->db->query("SELECT a.*, b.`skema_nama`, c.`anggota_nama`, c.`anggota_nidn`, s.tanggal, e.dana_ajuan FROM `ab_usulan` a LEFT JOIN `ab_skema` b ON a.`skema_id`=b.`skema_id` LEFT JOIN `ab_anggota` c ON c.`usulan_id`=a.`usulan_id` JOIN `ab_tahap_hibah` s ON s.usulan_id= a.usulan_id JOIN `ab_review_proposal` e ON e.usulan_id = a.usulan_id WHERE c.`anggota_posisi` ='ketua' AND s.status_tahap='proposal' AND s.tanggal BETWEEN '$tanggal1' AND '$tanggal2'AND a.status_usulan = '$status'")->result();
        }
    }

}