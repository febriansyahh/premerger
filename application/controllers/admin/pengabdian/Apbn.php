<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Apbn extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model("admin/pengabdian/Apbn_m");
    }

    public function index()
    {
        // exit;
        $data['show'] 			= false;
        // $data['report'] = $this->Apbn_m->index();
        $this->load->view('admin/pengabdian/report/apbn', $data);
    }

    public function caridata(){
        $tanggal1    = date("Y-m-d", strtotime($this->input->post('tanggal1')));
        $tanggal2     = date("Y-m-d", strtotime($this->input->post('tanggal2')));
        $status     = $this->input->post('status');
        $datas = array(
            'Tanggal1'     => $tanggal1,
            'Tanggal2'     => $tanggal2,
            'Status'     => $status
        );
        $data['Report']         = $datas;
        $data['show']             = 'true';
        $data['listLaporan']     = $this->Apbn_m->laporan($tanggal1, $tanggal2, $status);
        // echo '<pre>';
		// var_dump('aaa');
		// echo '</pre>';
		// exit;
		$this->load->view('admin/pengabdian/report/apbn', $data);
    }
}