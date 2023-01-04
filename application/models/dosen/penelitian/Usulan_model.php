<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usulan_model extends CI_Model 
{
    public function index()
    {
        $nis = $this->session->userdata('nis');
        $nidn = $this->session->userdata('nidn');
        $kode = $this->session->userdata('kode');

        // simlitabmas
        $sql = $this->db->query("SELECT a.usulan_id, a.nidn, a.nama, b.skim_name, a.status_usulan, a.status_id, c.pusat_studi_nama, a.usulan_judul, a.usulan_verif_studi, 
        a.status_usulan, a.usulan_confirm, d.status_desc, a.status_usulan, e.tahun_ajaran, e.tahun_semester, a.tgl_usulan, a.usulan_tglmulai, a.usulan_tglakhir FROM `lit_usulan` a LEFT JOIN lit_skim b ON a.skim_id=b.skim_id 
        LEFT JOIN lit_pusat_studi c ON a.pusat_studi=c.pusat_studi_id LEFT JOIN lit_status_proposal d ON a.status_id=d.status_id LEFT JOIN mst_tahun_akademik e ON 
        a.id_tahun_akademik=e.id_tahun WHERE (a.`nidn` = '$nidn' OR a.`nidn`= '$nis' OR a.kode_user='$kode') ORDER BY a.usulan_id DESC")->result();
        return $sql;
    }

    public function detail($id)
    {
        $ids = $this->variasi->decode($id);
        $nis = $this->session->userdata('nis');
        $nidn = $this->session->userdata('nidn');
        $sql = $this->db->query("SELECT status_kelengkapan, catatan, sifat_kegiatan, bidang_keahlian,
			    p_usulan.username, p_usulan.nama_lengkap, p_usulan.status_usulan, p_usulan.nama_prodi,
			    nama_jabatan, tahun_usulan, nama_skim, nama_fakultas, tahun_pelaksanaan, judul,
				abstrak, keyword, email_dosen, nomor_hp, alamat_dosen, lama_penelitian, apb_umk, biaya_lain,
                p_usulan.biaya_pagu_min, p_usulan.biaya_pagu_max, kota_usulan, lpm_nama, lpm_nip, rektor_nama,
                rektor_nip, dekan_nama, nilai_rata, hasil_nilai, dekan_nip FROM p_usulan
                JOIN p_skim ON p_usulan.skim_id = p_skim.skim_id
                JOIN p_anggota ON p_anggota.usulan_id = p_usulan.usulan_id
                LEFT JOIN p_review_proposal ON p_review_proposal.usulan_id = p_usulan.usulan_id
                WHERE p_usulan.usulan_id = '$ids' AND (p_usulan.`username` = '$nis' OR `p_usulan`.`username`='$nidn')")->row();
        return $sql;
    }

    public function getpusatstudi()
    {
        return $this->db->get('lit_pusat_studi');
    }

    public function getskim()
    {
        return $this->db->query("SELECT * FROM `lit_skim` WHERE `skim_active`='Active' ");
    }

    public function status_dos($nidn)
    {
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://ws.umk.ac.id/services/simpel/getdosen',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => array(
                    'nip'             => $nidn
                ),
                CURLOPT_HTTPHEADER => array(
                    'umk_api_key: c3e8e2070a6ca052a781c8546b7973578de8f62f'
                ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);
            return json_decode($response, true);
    }

    public function periode()
    {
        $date = date('Y-m-d');
        return $this->db->query("SELECT * FROM `lit_periode` WHERE '$date' BETWEEN periode_dari AND periode_sampai AND periode_status='Aktif'")->num_rows();
    }

    public function hibah($id)
    {
        $ids = $this->variasi->decode($id);
        return $this->db->query("SELECT * FROM `p_tahap_hibah` WHERE usulan_id = '$ids'")->row();
    }

    public function anggota($id)
    {
        $ids = $this->variasi->decode($id);
        return $this->db->query("SELECT * FROM `p_anggota` WHERE usulan_id = '$ids'")->result();
    }

    public function save()
    {
        $post = $this->input->post();
        $date = date("Y-m-d H:i:s");

        $nidn = $this->session->userdata('nidn');
        $kode = $this->session->userdata('kode');
        $namagelar = $this->session->userdata('nama_gelar');
        $judul = $post['judul'];

        $data = _wsgetdosen($nidn);
        $res = $data['result']['data'][0];

        $tahun = $this->tahunakademik();

        $this->nidn               = $nidn;
        $this->nama               = $namagelar;
        $this->skim_id            = $post['skim'];
        $this->pusat_studi        = $post['skim'];
        $this->usulan_judul       = $post['judul'];
        $this->usulan_seo         = seo_title($post['judul']);
        $this->usulan_lokasi      = $post['tempat'];
        $this->usulan_metode      = $post['metode'];
        $this->usulan_masalah     = $post['masalah'];
        $this->usulan_tujuan      = $post['tujuan'];
        $this->usulan_biaya       = $post['budget'];
        $this->usulan_biaya_apb   = $post['dana'];
        $this->tgl_usulan         = date("Y-m-d");
        $this->usulan_tglmulai    = $post['date1'];
        $this->usulan_tglakhir    = $post['date2'];
        $this->usulan_luaran      = $post['luaran'];
        $this->usulan_file        = $this->_uploadFile($nidn, $judul);
        $this->id_tahun_akademik  = $tahun;
        $this->usulan_tgl_input   = $date; 
        $this->kode_user   = $kode; 
        
        $this->db->insert('lit_usulan', $this);

        $lembaga = $post['lembaga'];

        $idusulan = $this->db->query("SELECT max(usulan_id) as id FROM `lit_usulan` ")->row();
        $usulanid = $idusulan->id;

        $this->db->query("INSERT INTO `lit_lembaga` (`usulan_id`, `lembaga_nama`, `lembaga_jabatan`, `lembaga_pimpinan`, `lembaga_pimpinan_id`, `lembaga_file`, `lembaga_lokasi`, `lembaga_updated`) values
        ('" . $usulanid . "',
        '" . $post['lembaga'] . "',
        '" . $post['jns_lembaga'] . "',
        '" . $post['pimpinan'] . "',
        '" . $post['nopim'] . "',
        '" . $this->_uploadLembaga($lembaga, $usulanid) . "',
        '" . $post['titiklokasi'] . "',
        '" . date('Y-m-d H:i:s') . "')
        ");

        $this->db->query("INSERT INTO `lit_anggota` (`usulan_id`, `anggota_nidn`, `anggota_nama`, `anggota_pangkat`, `anggota_jabatan`, `email`, `anggota_experience`, `anggota_posisi`, `anggota_isconfirm`, `anggota_jobdesk`, `kode_user`, `updated`) VALUES
        ('" . $usulanid . "',
        '" . $nidn . "',
        '" . $res['nama'] . "',
        '" . $res['golongan'] . "',
        '" . $res['pangkat'] . "',
        '" . $res['email'] . "',
        '" . $res['prodi'] . "',
        'ketua',
        '1',
        'Ketua',
        '" . $res['kode'] . "',
        '" . date('Y-m-d H:i:s') . "')
        ");

    }

    private function _uploadFile($a, $b)
    {
        $aj = str_replace(' ', '_', $a);
        $judul = str_replace(' ', '_', $b);
        $date = date('d-m-Y');
        $c = $date . '_Penelitian_' . $aj . '_' . $judul;

        $config['upload_path']          = './upload_file/penelitian/file/';
        $config['allowed_types']        = 'pdf|jpg|png';
        $config['file_name']            = $c;
        $config['overwrite']            = true;
        $config['max_size']             = 2048;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ($this->upload->do_upload('fileproposal')) {
            return $this->upload->data("file_name");
        }
    }

    private function _uploadLembaga($a, $b)
    {
        $nidn = $this->session->userdata('nidn');
        
        $nama = str_replace(' ', '_', $a);
        $date = date('d-m-Y');
        $c = $date . '_Lembaga_' . $nama . '_' . $nidn . '_' . $b;

        $config['upload_path']          = './upload_file/penelitian/lembaga/';
        $config['allowed_types']        = 'pdf|jpg|png';
        $config['file_name']            = $c;
        $config['overwrite']            = true;
        $config['max_size']             = 1024;


        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ($this->upload->do_upload('filemitra')) {
            return $this->upload->data("file_name");
        }
    }

    function tahunakademik()
    {
        $sql = $this->db->query("SELECT `id_tahun` FROM `mst_tahun_akademik` WHERE `tahun_status` = 'active' ")->row();
        return $sql->id_tahun;
    }

    
}
