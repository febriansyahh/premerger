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
        return $this->db->query("SELECT a.usulan_id, a.nidn, a.nama, b.skim_name, c.pusat_studi_nama, a.usulan_judul, d.status_desc FROM lit_usulan a LEFT JOIN lit_skim b ON a.skim_id=b.skim_id LEFT JOIN lit_pusat_studi c ON a.pusat_studi=c.pusat_studi_id LEFT JOIN lit_status_proposal d ON a.status_id=d.status_id LEFT JOIN lit_anggota e ON a.usulan_id=e.usulan_id WHERE e.anggota_posisi='ketua' GROUP BY a.usulan_id ORDER BY a.usulan_id DESC")->result();
    }

    public function select_laporan($tanggal1, $tanggal2,$status)
    {
       
        if( empty($status)){
            // var_dump('aa');
            // exit;
            return $this->db->query("SELECT a.usulan_id, a.nidn, a.nama, b.skim_name, c.pusat_studi_nama, a.usulan_judul, d.status_desc,a.tgl_usulan FROM lit_usulan a LEFT JOIN lit_skim b ON a.skim_id=b.skim_id LEFT JOIN lit_pusat_studi c ON a.pusat_studi=c.pusat_studi_id LEFT JOIN lit_status_proposal d ON a.status_id=d.status_id LEFT JOIN lit_anggota e ON a.usulan_id=e.usulan_id WHERE e.anggota_posisi='ketua' GROUP BY a.usulan_id ORDER BY a.usulan_id DESC")->result();
        }
        else{
            // var_dump('baba');
            // exit;
            return $this->db->query("SELECT a.usulan_id, a.nidn, a.nama, b.skim_name, c.pusat_studi_nama, a.usulan_judul, d.status_desc,a.tgl_usulan FROM lit_usulan a LEFT JOIN lit_skim b ON a.skim_id=b.skim_id LEFT JOIN lit_pusat_studi c ON a.pusat_studi=c.pusat_studi_id LEFT JOIN lit_status_proposal d ON a.status_id=d.status_id LEFT JOIN lit_anggota e ON a.usulan_id=e.usulan_id WHERE e.anggota_posisi='ketua'AND a.tgl_usulan BETWEEN '$tanggal1' AND '$tanggal2'AND a.status_id = '$status' GROUP BY a.usulan_id ORDER BY a.usulan_id DESC")->result();
            
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