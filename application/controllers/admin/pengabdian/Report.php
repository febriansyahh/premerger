<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
		$this->load->library('PHPExcel');
		$this->load->library('PHPExcel/IOFactory');
        $this->load->model("admin/pengabdian/Report_m");
    }

    public function index()
    {
        // exit;
        $data['show'] 			= false;
        // $data['report'] = $this->Report_m->index();
        $this->load->view('admin/pengabdian/report/index', $data);
    }

    public function cari()
    {
        
        $tanggal1    = date("Y-m-d", strtotime($this->input->post('tanggal1')));
        $tanggal2     = date("Y-m-d", strtotime($this->input->post('tanggal2')));
        $status     = $this->input->post('status');
        $data = array(
            'Tanggal1'     => $tanggal1,
            'Tanggal2'     => $tanggal2,
            'Status'     => $status
        );
        $data['Report']         = $data;
        $data['show']             = 'true';
        $data['listLaporan']     = $this->Report_m->select_laporan($tanggal1, $tanggal2, $status);
        // echo '<pre>';
		// var_dump($data['listLaporan']);
		// echo '</pre>';
		// exit;
		$this->load->view('admin/pengabdian/report/index', $data);
    }
	 
	public function excel(){
		$tanggal1	= $this->uri->segment(5);
		$tanggal2 	= $this->uri->segment(6);
		$status 	= $this->uri->segment(7);
        $list       = $this->Report_m->select_laporan($tanggal1, $tanggal2, $status);
		$this->load->view('admin/pengabdian/expore', $list);
		
	}
    public function exportexcel(){
        $tanggal1	= $this->uri->segment(5);
		$tanggal2 	= $this->uri->segment(6);
		$status 	= $this->uri->segment(7);
        $list       = $this->Report_m->select_laporan($tanggal1, $tanggal2, $status);
		
		// echo'<pre>';
		// var_dump(count($list));
		// echo'</pre>';
		// exit;

        
        if(count($list)>0){
            $objPHPExcel = new PHPExcel();
			$objPHPExcel->getProperties()->setCreator("Jama' Rochmad Muttaqin")
				->setLastModifiedBy("Jama' Rochmad M.")
				->setTitle("Data Usulan Proposal Dosen")
				->setSubject("Daftar Usulan Proposal Dosen");
			$objPHPExcel->setActiveSheetIndex(0);
			$objPHPExcel->getActiveSheet()->setCellValue('A6', "NO")->setCellValue('B6', "NIDN")
            ->setCellValue('B6', "NAMA")
            ->setCellValue('C6', "NIDN")
            ->setCellValue('D6', "JUDUL")
            ->setCellValue('E6', "SKIM")
            ->setCellValue('F6', "TAHUN USULAN")
            ->setCellValue('G6', "TAHUN PELAKSANAAN")
            ->setCellValue('H6', "TAHUN AJARAN")
            ->setCellValue('I6', "STATUS");
            $dataArray = array();
			$no = 0;
            foreach ($list as $r) {
				$no++;
				$row_array['no'] 		= $no;
				$row_array['nama']		= $r->nama;
				$row_array['nidn_pengusul'] = $r->nidn_pengusul;
				$row_array['usulan_judul'] 	= $r->usulan_judul;
				$row_array['skema_id'] 		= $r->skema_id;
				$row_array['usulan_tahun'] 	= $r->usulan_tahun;
				$row_array['usulan_tahun_pelaksanaan'] 	= $r->usulan_tahun_pelaksanaan;
				$row_array['tahun_ajaran'] 		= '';
				$row_array['status_usulan'] 	= $r->status_usulan;
                array_push($dataArray, $row_array);
            }  
            $nox = $no + 6;

			$objPHPExcel->getActiveSheet()->fromArray($dataArray, NULL, 'A7');

			// Set page orientation and size
			$objPHPExcel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
			$objPHPExcel->getActiveSheet()->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
			$objPHPExcel->getActiveSheet()->getPageMargins()->setTop(0.50);
			$objPHPExcel->getActiveSheet()->getPageMargins()->setRight(0.50);
			$objPHPExcel->getActiveSheet()->getPageMargins()->setLeft(0.50);
			$objPHPExcel->getActiveSheet()->getPageMargins()->setBottom(0.50);
			//$objPHPExcel->getActiveSheet()->getHeaderFooter()->setOddFooter('&L&B' . $objPHPExcel->getProperties()->getTitle() . '&RPage &P of &N');		 
			$objPHPExcel->getActiveSheet()
				->getHeaderFooter()->setOddFooter('&R&F Page &P / &N');
			$objPHPExcel->getActiveSheet()
				->getHeaderFooter()->setEvenFooter('&R&F Page &P / &N');

			$objPHPExcel->getActiveSheet()->setAutoFilter('A6:I6');
			// Set title row bold;
			$objPHPExcel->getActiveSheet()->getStyle('A6:I6')->getFont()->setBold(true);
			// Set fills
			$objPHPExcel->getActiveSheet()->getStyle('A6:I6')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);

			$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
			$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(12);
			$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
			$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(100);
			$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
			$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
			$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(15);
			$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(15);
			$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(10);

            $objPHPExcel->setActiveSheetIndex(0);
			$sharedStyle1 = new PHPExcel_Style();
			$sharedStyle2 = new PHPExcel_Style();

            $sharedStyle1->applyFromArray(
				array(
					'borders' 	=> array(
						'bottom' 	=> array('style' => PHPExcel_Style_Border::BORDER_THIN),
						'top' 		=> array('style' => PHPExcel_Style_Border::BORDER_THIN),
						'right' 	=> array('style' => PHPExcel_Style_Border::BORDER_THIN),
						'left' 		=> array('style' => PHPExcel_Style_Border::BORDER_THIN)
					),
				)
			);
            $objPHPExcel->getActiveSheet()->setSharedStyle($sharedStyle1, "A6:L$nox");
			$objPHPExcel->getActiveSheet()->getRowDimension('6')->setRowHeight(20); // Row Height Header
			$objPHPExcel->getActiveSheet()->getStyle()->getAlignment()->setWrapText(true);
			$objPHPExcel->getActiveSheet()->getStyle('A6:I6')->applyFromArray(
				array(
					'font' => array(
						'bold' 		=> true
					),
					'alignment' 	=> array(
						'horizontal' 	=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
						'vertical' 		=> PHPExcel_Style_Alignment::VERTICAL_CENTER
					),
					'borders' 		=> array(
						'top' 		=> array(
							'style' => PHPExcel_Style_Border::BORDER_THIN
						)
					)
				)
			);
            $Tanggal1	= date("d-m-Y", strtotime($this->uri->segment(4)));
			$Tanggal2	= date("d-m-Y", strtotime($this->uri->segment(5)));

			$objPHPExcel->getActiveSheet()->getStyle('A4:L1000')->getFont()->setName('Times New Roman');
			$objPHPExcel->getActiveSheet()->getStyle('A4:L1000')->getFont()->setSize(12);
			// Merge cells
			$objPHPExcel->getActiveSheet()->mergeCells('A2:L2');
			$objPHPExcel->getActiveSheet()->setCellValue('A2', "LAPORAN PENGAJUAN PROPOSAL DOSEN");
			$objPHPExcel->getActiveSheet()->mergeCells('A3:L3');
			$objPHPExcel->getActiveSheet()->setCellValue('A3', "UNIVERSITAS MURIA KUDUS");
			$objPHPExcel->getActiveSheet()->mergeCells('A4:L4');
			$objPHPExcel->getActiveSheet()->setCellValue('A4', "PERIODE : " . $Tanggal1 . " s/d " . $Tanggal2);
			$objPHPExcel->getActiveSheet()->getStyle('A2:L4')->getFont()->setName('Times New Roman');
			$objPHPExcel->getActiveSheet()->getStyle('A2:L4')->getFont()->setSize(12);
			$objPHPExcel->getActiveSheet()->getStyle('A3')->getFont()->setSize(12);
			$objPHPExcel->getActiveSheet()->getStyle('A4')->getFont()->setSize(12);
			$objPHPExcel->getActiveSheet()->getStyle('A2:L6')->getFont()->setBold(true);
			$objPHPExcel->getActiveSheet()->getStyle('A2:L6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$objPHPExcel->getActiveSheet()->getStyle('A7:A1000')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$objPHPExcel->getActiveSheet()->getStyle('B7:B1000')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
			$objPHPExcel->getActiveSheet()->getStyle('C7:C1000')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
			$objPHPExcel->getActiveSheet()->getStyle('D7:D1000')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
			$objPHPExcel->getActiveSheet()->getStyle('E7:E1000')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
			$objPHPExcel->getActiveSheet()->getStyle('F7:F1000')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
			$objPHPExcel->getActiveSheet()->getStyle('G7:G1000')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
			$objPHPExcel->getActiveSheet()->getStyle('H7:H1000')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
			$objPHPExcel->getActiveSheet()->getStyle('I7:I1000')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
			
            $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
			ob_end_clean();	
			// $objWriter->save('php://output');		
			 $objWriter->save("Data_Usulan_Proposal.xlsx");

			echo '<pre>';
			print_r($objWriter);
			echo '</pre>';
			exit;
			// redirect(base_url('download/Data_Usulan_Proposal_' . $date . '_' . $time . '.xlsx'));
			// var_dump('aa');
        }else{
			// var_dump('ss');
			// exit;
            $this->session->set_flashdata('notification', 'Data Tidak Ada.');
			redirect(site_url('admin/pengabdian/report/index'));  
        }
    }
}
