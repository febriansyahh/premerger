<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usulan extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('level') == 'Admin' && (!$this->session->userdata('sistem') == '0' || !$this->session->userdata('sistem') == '2')) {
            redirect(base_url());
        }
        $this->load->model("admin/penelitian/Usulan_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $list = $this->Usulan_model->index();
        $data = array();
        $link = '';
        $no = 0;

        foreach ($list as $value) {
            $no++;
            $row = array();
            $usulan_id = $value->usulan_id;
            $linkdetail = site_url('admin/penelitian/usulan/detail/' . $this->variasi->encode($usulan_id));
            $linkreviewer = site_url('admin/penelitian/usulan/reviewer/' . $this->variasi->encode($usulan_id));
            $linkdownload = site_url('upload_file/penelitian/file/' . $value->usulan_file);
            $linkhapus = site_url('admin/penelitian/usulan/delete' . $this->variasi->encode($usulan_id));
            

            $syaratangg = $this->Usulan_model->syaratanggota($usulan_id);
            $anggota_int = $this->Usulan_model->anggotain($usulan_id);
            $anggota_eks = $this->Usulan_model->anggotaeks($usulan_id, 'eksternal');
            $anggota_mhs = $this->Usulan_model->anggotaeks($usulan_id, 'mahasiswa');
            
            if ($syaratangg->in_min >= $anggota_int && $syaratangg->in_max <= $anggota_int 
                && $syaratangg->mhs_min >= $anggota_mhs && $syaratangg->eks_min >= $anggota_eks) {
                $syarat = 'Terpenuhi<br>(
                    Internal  = '. $anggota_int->angg_in .'<br>
                    Mahasiswa  = '. $anggota_mhs->jmlheks .'<br>
                    Eksternal  = '. $anggota_eks->jmlheks .')';
                $is_syarat = '1';
            }else{
                $syarat = 'Belum Terpenuhi<br>(
                    Internal  = ' . $anggota_int->angg_in . '<br>
                    Mahasiswa  = ' . $anggota_mhs->jmlheks . '<br>
                    Eksternal  = ' . $anggota_eks->jmlheks . ')';
                $is_syarat = '0';

            }

            // default button action
            if ($value->status_usulan == 1) {
                if ($is_syarat == '1') {
                    $link = '<a onclick="confirmProposal(' . "'" . $usulan_id . "'" . ')"class="btn btn-outline-primary btn-sm" style="margin-bottom: 5px;"><i class="bx bxs-check"></i> Acc
                        </a>';
                }
            } elseif ($value->status_usulan == 2) {
                // Jika Sudah di ACC Lemlit
                $link = '<a href="' . $linkreviewer . '"class="btn btn-outline-primary btn-sm" style="margin-bottom: 5px;"><i class="bx bxs-user"></i> Reviewer
            			</a>';
            }
            if ($value->status_usulan == 1) {
                $btnHapus = '<a href="' . $linkhapus . '" onclick="return confirm("Apakah yakin untuk menghapus data ini ?")" class="btn btn-outline-danger btn-sm" style="margin-bottom: 5px;">
	            				<i class="bx bxs-trash"></i> Hapus
	            			</a>';
            } else {
                $btnHapus = '';
            }

            $row['link'] = '<a href="' . $linkdetail . '" class="btn btn-outline-primary btn-sm" style="margin-bottom: 5px;"><i class="bx bxs-detail"></i> Detail
            		</a>' .
                    $link
                . '
            		<a href="' . $linkdownload . '" class="btn btn-outline-primary btn-sm" style="margin-bottom: 5px;"><i class="bx bxs-download" ></i> Download
            		</a>' . $btnHapus;

            $row['nidn'] = $value->nidn;
            $row['nama'] = $value->nama;
            $row['judul'] = $value->usulan_judul;
            $row['skim'] = $value->skim_name;
            $row['tgl_usulan'] = $value->tgl_usulan;
            $row['mulai'] = $value->usulan_tglmulai;
            $row['akhir'] = $value->usulan_tglakhir;
            $row['status'] = $value->status_id;
            $row['desc'] = $value->status_desc;
            $row['syarat'] = $syarat;

            array_push($data, $row);

        }
        $datas['usulan'] = $data;
        // echo '<pre>';
        // var_dump($datas);
        // echo '</pre>';
        // exit;
        // $data['usulan'] = $this->Usulan_model->index();
        $this->load->view('admin/penelitian/usulan/index', $datas);
    }

    public function detail($id)
    {
        $data['data'] = $this->Usulan_model->getbyid($id);
        $data['anggota'] = $this->Usulan_model->getanggotabyid($id);
        $this->load->view('admin/penelitian/usulan/detail', $data);
    }

    // public function migrasi()
    // {
    //     $data = $this->Usulan_model->migrasi();
    //     foreach ($data as  $value) {
            
    //         $ws = _wsgetdosen($value->anggota_nidn);
    //         $res = $ws['result'];
    //         if ($ws['result']['data'] != NULL) {
    //             $kode = $res['data'][0]['kode'];

    //             // $execute = $this->db->query("UPDATE `lit_usulan` SET `kode_user` = '$kode' WHERE nidn = '$value->nidn' ");
    //             $execute = $this->db->query("UPDATE `lit_anggota` SET `kode_user` = '$kode' WHERE anggota_nidn = '$value->anggota_nidn' ");
    //             if ($execute) {
    //                 echo 'Ubah Berhasil';
    //             }else{
    //                 echo 'Ubah Gagal';
    //             }
    //         }
    //     }
    //     exit;
    // }

    // function _wsgetdosen($nidn)
    // {
    //     $curl = curl_init();

    //     curl_setopt_array($curl, array(
    //         CURLOPT_URL => 'https://ws.umk.ac.id/services/simpel/getdosen',
    //         CURLOPT_RETURNTRANSFER => true,
    //         CURLOPT_ENCODING => '',
    //         CURLOPT_MAXREDIRS => 10,
    //         CURLOPT_TIMEOUT => 0,
    //         CURLOPT_FOLLOWLOCATION => true,
    //         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //         CURLOPT_CUSTOMREQUEST => 'POST',
    //         CURLOPT_POSTFIELDS => array(
    //             'nip'             => $nidn
    //         ),
    //         CURLOPT_HTTPHEADER => array(
    //             'umk_api_key: c3e8e2070a6ca052a781c8546b7973578de8f62f',
    //             'Cookie: PHPSESSID=8bbgupsnq6hl6u7kktgsg2k3b9q6amek'
    //         ),
    //     ));

    //     $response = curl_exec($curl);

    //     curl_close($curl);
    //     $result = json_decode($response, true);
    //     return $result;
    // }
}