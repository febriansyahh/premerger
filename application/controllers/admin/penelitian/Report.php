<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Report extends CI_Controller

{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model("admin/penelitian/Report_m");
    }

    public function usulan()
    {
        // exit;
        $data['show'] 			= false;
        // $data['report'] = $this->Report_m->index();
        $this->load->view('admin/penelitian/report/index', $data);
    }

    public function cari()
    {
        
        $tanggal1    = date("Y-m-d", strtotime($this->input->post('tanggal1')));
        $tanggal2     = date("Y-m-d", strtotime($this->input->post('tanggal2')));
        $status     = $this->input->post('status');
        $data = array(
            'tanggal1'     => $tanggal1,
            'tanggal2'     => $tanggal2,
            'status'     => $status
        );
        $data['report']         = $data;
        $data['show']             = 'true';
        $data['listLaporan']     = $this->Report_m->select_laporan($tanggal1, $tanggal2, $status);
		
		$this->load->view('admin/penelitian/report/index', $data);
    }
	 
    // Export excel library spreadsheet
    // public function export()
    // {
    //     $spreadsheet = new Spreadsheet();
    //     $sheet = $spreadsheet->getActiveSheet();
    //     $sheet->setCellValue('A1', 'No');
    //     $sheet->setCellValue('B1', 'NIDN Pengusul');
    //     $sheet->setCellValue('C1', 'Nama Pengusul');
    //     $sheet->setCellValue('D1', 'Judul Usulan');
    //     $sheet->setCellValue('E1', 'Fakultas');

    //     $ta = $_POST['ta'];
    //     $tk = $_POST['tk'];
    //     $sts = $_POST['status'];

    //     $data = $this->Report_m->select_laporan($ta, $tk, $sts);
    //     $no = 1;
    //     $x = 2;
    //     foreach ($data as $row) {
    //         $sheet->setCellValue('A' . $x, $no++)->getColumnDimension('A')->setAutoSize(true);
    //         $sheet->setCellValue('B' . $x, $row->nidn_pengusul)->getColumnDimension('B')->setAutoSize(true);
    //         $sheet->setCellValue('C' . $x, $row->nama)->getColumnDimension('C')->setAutoSize(true);
    //         $sheet->setCellValue('D' . $x, $row->usulan_judul)->getColumnDimension('D')->setAutoSize(true);
    //         $sheet->setCellValue('E' . $x, $row->fakultas)->getColumnDimension('E')->setAutoSize(true);
    //         $x++;
    //     }
    //     $writer = new Xlsx($spreadsheet);
    //     $filename = 'laporan-usulan';

    //     header('Content-Type: application/vnd.ms-excel');
    //     header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
    //     header('Cache-Control: max-age=0');

    //     $writer->save('php://output');
    // }

    public function exportexcel()
    {
        $ta = $_POST['ta'];
        $tk = $_POST['tk'];
        $sts = $_POST['status'];

        $filename = 'Laporan_usulan_' . date('Y-m-d') . '.xls';
        // Fetch records from database 
        $data = $this->Report_m->select_laporan($ta, $tk, $sts);
        header("Content-type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename=\"$filename\"");
        $dataArray = array();
		$no = 0;
        foreach($data as $value){
            $no++;
            $id = $value->usulan_id;
            $row_array['no']=$no;
            $row_array['nidn']=$value->nidn;
            $row_array['nama']=$value->nama;
            $row_array['usulan_judul']=$value->usulan_judul;
            $row_array['skim_name']=$value->skim_name;
            $row_array['pusat_studi_nama']=$value->pusat_studi_nama;
            $row_array['anggota_posisi']=$value->anggota_posisi;
            $row_array['usulan_biaya_confirm']=$value->usulan_biaya_confirm;
            $row_array['tgl_usulan']=$value->tgl_usulan;
            $anggota = $this->Report_m->countanggota($id);
            $row_array['anggota']=$anggota->jumlah;
            $mhs = $this->Report_m->countmhs($id);
            $row_array['mhs']=$mhs->jumlah;
            $row_array['status_desc']=$value->status_desc;
            
            array_push($dataArray, $row_array);
        }
        $datas['data'] = $dataArray;
        // echo '<pre>';
        // var_dump($datas);
        // echo '</pre>';
        // exit;
        $this->load->view('admin/penelitian/report/expore', $datas);
    }

    
}
