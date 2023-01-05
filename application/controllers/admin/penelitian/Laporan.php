<?Php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("admin/penelitian/Laporan_m");
        $this->load->library('form_validation');
    }

    public function kemajuan()
    {
        $data['index'] = $this->Laporan_m->index();
        $this->load->view('admin/penelitian/laporan/kemajuan', $data);
    }

    public function detailkemajuan($id)
    {
        $data['detail'] = $this->Laporan_m->subindexkemajuan($id);
        $data['judul'] = $this->Laporan_m->judul($id);
        $this->load->view('admin/penelitian/laporan/detkemajuan', $data);
    }

    public function akhir()
    {
        $data['index'] = $this->Laporan_m->index();
        $this->load->view('admin/penelitian/laporan/akhir', $data);
    }

    public function detailakhir($id)
    {
        $data['detail'] = $this->Laporan_m->subindexakhir($id);
        $data['judul'] = $this->Laporan_m->judul($id);
        $this->load->view('admin/penelitian/laporan/detakhir', $data);
    }

    // public function monev()
    // {
    //     $data['index'] = $this->Laporan_m->index();
    //     $this->load->view('admin/penelitian/laporan/monev', $data);
    // }

    // public function detailmonev($id)
    // {
    //     $data['detail'] = $this->Laporan_m->subindexmonev($id);
    //     $data['judul'] = $this->Laporan_m->judul($id);
    //     $this->load->view('admin/penelitian/laporan/detmonev', $data);
    // }
}
