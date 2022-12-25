<?Php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("admin/pengabdian/Laporan_model");
        $this->load->library('form_validation');
    }

    public function kemajuan()
    {
        $data['index'] = $this->Laporan_model->index();
        $this->load->view('admin/pengabdian/laporan/kemajuan', $data);
    }

    public function detailkemajuan($id)
    {
        $data['detail'] = $this->Laporan_model->subindexkemajuan($id);
        $data['judul'] = $this->Laporan_model->judul($id);
        $this->load->view('admin/pengabdian/laporan/detkemajuan', $data);
    }

    public function akhir()
    {
        $data['index'] = $this->Laporan_model->index();
        $this->load->view('admin/pengabdian/laporan/akhir', $data);
    }

    public function detailakhir($id)
    {
        $data['detail'] = $this->Laporan_model->subindexakhir($id);
        $data['judul'] = $this->Laporan_model->judul($id);
        $this->load->view('admin/pengabdian/laporan/detakhir', $data);
    }

    public function monev()
    {
        $data['index'] = $this->Laporan_model->index();
        $this->load->view('admin/pengabdian/laporan/monev', $data);
    }

    public function detailmonev($id)
    {
        $data['detail'] = $this->Laporan_model->subindexmonev($id);
        $data['judul'] = $this->Laporan_model->judul($id);
        $this->load->view('admin/pengabdian/laporan/detmonev', $data);
    }
}
