<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Report_m extends CI_Model
{
    function __construct()
	{
		parent::__construct();
        $this->load->model('admin/Report_m');
	}

    // Report
    public function index()
    {
        return $this->db->query("SELECT a.usulan_id, a.nidn, a.nama, b.skim_name, c.pusat_studi_nama, a.usulan_judul, d.status_desc FROM lit_usulan a LEFT JOIN lit_skim b ON a.skim_id=b.skim_id LEFT JOIN lit_pusat_studi c ON a.pusat_studi=c.pusat_studi_id LEFT JOIN lit_status_proposal d ON a.status_id=d.status_id LEFT JOIN lit_anggota e ON a.usulan_id=e.usulan_id WHERE e.anggota_posisi='ketua' GROUP BY a.usulan_id ORDER BY a.usulan_id DESC")->result();
    }

    public function select_laporan($tanggal1, $tanggal2,$status)
    {
        // if (empty($tanggal1)) {
        //     $tgl1 = '';
        //     $tgl2 = '';
        //     $sts = '';
        // }elseif(!empty($tanggal1) && !empty($tanggal2) && !empty($status)){
        //     $tgl1 = "AND a.tgl_usulan BETWEEN '$tanggal1' ";
        //     $tgl2 = "AND a.tgl_usulan BETWEEN '$tanggal2' ";
        //     $sts = "AND a.status_id= '$status'";
        // }
       
        if( empty($status)){
            // var_dump('aa');
            // exit;
            return $this->db->query("SELECT a.usulan_id, a.nidn, a.nama, b.skim_name, c.pusat_studi_nama, a.usulan_judul, d.status_desc,a.tgl_usulan,e.anggota_posisi,a.usulan_biaya_confirm FROM lit_usulan a LEFT JOIN lit_skim b ON a.skim_id=b.skim_id LEFT JOIN lit_pusat_studi c ON a.pusat_studi=c.pusat_studi_id LEFT JOIN lit_status_proposal d ON a.status_id=d.status_id LEFT JOIN lit_anggota e ON a.usulan_id=e.usulan_id WHERE e.anggota_posisi='ketua' GROUP BY a.usulan_id ORDER BY a.usulan_id DESC")->result();
        }
        else{
            // var_dump('baba');
            // exit;
            return $this->db->query("SELECT a.usulan_id, a.nidn, a.nama, b.skim_name, c.pusat_studi_nama, a.usulan_judul, d.status_desc,a.tgl_usulan, e.anggota_posisi,a.usulan_biaya_confirm FROM lit_usulan a LEFT JOIN lit_skim b ON a.skim_id=b.skim_id LEFT JOIN lit_pusat_studi c ON a.pusat_studi=c.pusat_studi_id LEFT JOIN lit_status_proposal d ON a.status_id=d.status_id LEFT JOIN lit_anggota e ON a.usulan_id=e.usulan_id WHERE e.anggota_posisi='ketua'AND a.tgl_usulan BETWEEN '$tanggal1' AND '$tanggal2'AND a.status_id = '$status' GROUP BY a.usulan_id ORDER BY a.usulan_id DESC")->result();
            
        }
        
    }

    // COUNT
    public function countanggota($id){
       
            return $this->db->query("SELECT a.usulan_id,  COUNT(a.usulan_id) AS jumlah, b.usulan_tglmulai, b.usulan_tglakhir 
            FROM lit_anggota a LEFT JOIN lit_usulan b ON a.usulan_id=b.usulan_id
            WHERE a.anggota_posisi='Anggota' AND a.usulan_id = '$id' GROUP BY a.usulan_id ")->row();
        // if($id != '95'){
        // }
    }
    public function countmhs($id){
       
            return $this->db->query("SELECT COUNT(a.usulan_id) AS jumlah FROM lit_anggota_eks a LEFT JOIN lit_usulan b ON a.usulan_id=b.usulan_id WHERE a.anggota_eks_posisi='mahasiswa' AND a.usulan_id ='$id'")->row();
        // if($id != '95'){
        // }
    }

    // APBN
    public function indexdana()
    {
        return $this->db->query("SELECT a.usulan_id, a.usulan_judul, a.nidn, a.nama, a.usulan_biaya, a.usulan_biaya_apb, a.usulan_biaya_confirm, d.status_desc FROM lit_usulan a LEFT JOIN lit_skim b ON a.skim_id=b.skim_id LEFT JOIN lit_pusat_studi c ON a.pusat_studi=c.pusat_studi_id LEFT JOIN lit_status_proposal d ON a.status_id=d.status_id LEFT JOIN lit_anggota e ON a.usulan_id=e.usulan_id WHERE e.anggota_posisi='ketua' GROUP BY a.usulan_id ORDER BY a.usulan_id DESC")->result();
    }

    public function laporan($tanggal1, $tanggal2, $status)
    {
        if (empty($status)) {
            return $this->db->query("SELECT a.usulan_id, a.usulan_judul, a.nidn, a.nama, a.usulan_biaya, a.usulan_biaya_apb, a.usulan_biaya_confirm, d.status_desc FROM lit_usulan a LEFT JOIN lit_skim b ON a.skim_id=b.skim_id LEFT JOIN lit_pusat_studi c ON a.pusat_studi=c.pusat_studi_id LEFT JOIN lit_status_proposal d ON a.status_id=d.status_id LEFT JOIN lit_anggota e ON a.usulan_id=e.usulan_id WHERE e.anggota_posisi='ketua' GROUP BY a.usulan_id ORDER BY a.usulan_id DESC")->result();
        } else {
            return $this->db->query("SELECT a.usulan_id, a.usulan_judul, a.nidn, a.nama, a.usulan_biaya, a.usulan_biaya_apb, a.usulan_biaya_confirm, d.status_desc FROM lit_usulan a LEFT JOIN lit_skim b ON a.skim_id=b.skim_id LEFT JOIN lit_pusat_studi c ON a.pusat_studi=c.pusat_studi_id LEFT JOIN lit_status_proposal d ON a.status_id=d.status_id LEFT JOIN lit_anggota e ON a.usulan_id=e.usulan_id WHERE e.anggota_posisi='ketua' AND a.tgl_usulan BETWEEN '$tanggal1' AND '$tanggal2'AND a.status_id = '$status' GROUP BY a.usulan_id ORDER BY a.usulan_id DESC")->result();
        }
    }


}