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
        $data['data'] =  $this->Report_m->select_laporan($ta, $tk, $sts);
        $this->load->view('admin/penelitian/report/expore', $data);
    }

    
}
