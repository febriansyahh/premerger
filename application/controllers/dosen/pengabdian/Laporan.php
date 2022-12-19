<?Php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("dosen/pengabdian/Laporan_model");
        $this->load->library('form_validation');
    }

    public function kemajuan()
    {
        $data['index'] = $this->Laporan_model->index();
        $this->load->view('dosen/pengabdian/pelaksanaan/lapkemajuan', $data);
    }

    public function detailkemajuan($id)
    {
        $data['detail'] = $this->Laporan_model->subindexkemajuan($id);
        $data['judul'] = $this->Laporan_model->judul($id);
        $this->load->view('dosen/pengabdian/pelaksanaan/detkemajuan', $data);
    }

    public function addkemajuan($id)
    {
        $data['index'] = $this->Laporan_model->judul($id);
        $this->load->view('dosen/pengabdian/pelaksanaan/addkemajuan', $data);
    }

    public function savekemajuan()
    {
        $id = $_POST['idusulan'];
        $model = $this->Laporan_model;
        $validation = $this->form_validation;

        if ($validation) {
            $model->savekemajuan();
            $this->session->set_flashdata('simpan', 'success');
        }else{
            $this->session->set_flashdata('gglsimpan', 'failed');
        }

        redirect('dosen/pengabdian/laporan/detailkemajuan/'. $id);
    }

    public function deletekem($id)
    {
        $params = explode('~', $id);
        $id = $params[0];
        $idrec = $params[1];

        if (!isset($id)) show_404();
        if ($this->Laporan_model->deletekem($id)) {
            $this->session->set_flashdata('terhapus', 'success');

            redirect('dosen/pengabdian/laporan/detailkemajuan/' . $idrec);
        }
    }

    public function akhir()
    {
        $data['index'] = $this->Laporan_model->index();
        $this->load->view('dosen/pengabdian/pelaksanaan/lapakhir', $data);
    }

    public function detailakhir($id)
    {
        $data['detail'] = $this->Laporan_model->subindexakhir($id);
        $data['judul'] = $this->Laporan_model->judul($id);
        $data['cek'] = $this->Laporan_model->cekkemajuan($id);
        $this->load->view('dosen/pengabdian/pelaksanaan/detakhir', $data);
    }

    public function addlaporan($id)
    {
        $data['index'] = $this->Laporan_model->judul($id);
        $this->load->view('dosen/pengabdian/pelaksanaan/addakhir', $data);
    }

    public function saveakhir()
    {
        $id = $_POST['idusulan'];
        $model = $this->Laporan_model;
        $validation = $this->form_validation;

        if ($validation) {
            $model->saveakhir();
            $this->session->set_flashdata('simpan', 'success');
        } else {
            $this->session->set_flashdata('gglsimpan', 'failed');
        }

        redirect('dosen/pengabdian/laporan/detailakhir/' . $id);
    }

    public function deleteakhir($id)
    {
        $params = explode('~', $id);
        $id = $params[0];
        $idrec = $params[1];

        if (!isset($id)) show_404();
        if ($this->Laporan_model->deleteakhir($id)) {
            $this->session->set_flashdata('terhapus', 'success');

            redirect('dosen/pengabdian/laporan/detailakhir/' . $idrec);
        }
    }
}