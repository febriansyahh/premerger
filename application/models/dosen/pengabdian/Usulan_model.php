<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usulan_model extends CI_Model 
{
    public function index()
    {
        $nis = $this->session->userdata('nis');
        $nidn = $this->session->userdata('nidn');
        $kode = $this->session->userdata('kode');

        // Pre merger
        // $sql = $this->db->query("SELECT u.*, IF(s.`semester` = '1', 'Ganjil', IF(s.`semester` = '2', 'Genap', '-')) AS semester , s.`tahun_ajaran`, sk.`nama_skim` 
        //         FROM `p_usulan` u LEFT JOIN `p_semester` s ON u.`id_tahun`= s.`id_semester` JOIN `p_skim` sk ON u.`skim_id`=sk.`skim_id`
        //         WHERE (u.`username` = '$nis' OR u.`username` = '$nidn') ")->result();

        // simlitabmas
        $sql = $this->db->query("SELECT a.*, b.`skema_nama`, c.`tahun_ajaran`, c.tahun_semester, IF(c.tahun_semester = '1', 'Gasal', IF(c.tahun_semester = '2', 'Genap', 'Data Lama')) AS semester FROM `ab_usulan` a LEFT JOIN `ab_skema` b ON a.`skema_id`=b.`skema_id` LEFT JOIN `mst_tahun_akademik` c ON a.`id_tahun`=c.`id_tahun`
        WHERE (a.`nidn_pengusul` = '$nidn' OR a.`nidn_pengusul` = '$nis' OR a.kode_user='$kode') ORDER BY a.`usulan_id` DESC ")->result();
        return $sql;
    }

    public function periode()
    {
        $sql = $this->db->query("SELECT * FROM `ab_periode` WHERE `setting_jenis` = 'periode_usulan' AND `keterangan` = 'active' ")->num_rows();
        return $sql;
    }

    public function detail($id)
    {
        $ids = $this->variasi->decode($id);
        $nis = $this->session->userdata('nis');
        $nidn = $this->session->userdata('nidn');
        $kode = $this->session->userdata('kode');

        $sql = $this->db->query("SELECT * FROM `ab_usulan` a LEFT JOIN `ab_lembaga` b ON b.`usulan_id`=a.`usulan_id` 
        LEFT JOIN `ab_skema` c ON a.`skema_id`=c.`skema_id` LEFT JOIN `ab_tahap_hibah` d ON a.usulan_id=d.`usulan_id`  WHERE a.`usulan_id` = '$ids' 
        AND (a.`nidn_pengusul` = '$nis' OR a.`nidn_pengusul`='$nidn' OR a.kode_user='$kode') AND d.status_tahap = 'Proposal'")->row();
        return $sql;
    }

    public function tahaphibah($id)
    {
        $ids = $this->variasi->decode($id);
        $sql = $this->db->query("SELECT * FROM `ab_tahap_hibah` WHERE `usulan_id` = '$ids'")->result();
        return $sql;
    }

    public function skema()
    {
        $sql = $this->db->query("SELECT * FROM `ab_skema` WHERE `skema_parent` != '0' ORDER BY `skema_id` DESC")->result();
        return $sql;
    }
    
    public function anggota($id)
    {
        $ids = $this->variasi->decode($id);
        return $this->db->query("SELECT * FROM `ab_anggota` WHERE usulan_id = '$ids' ")->result();
    }

    public function anggotaeks($id)
    {
        $ids = $this->variasi->decode($id);
        return $this->db->query("SELECT * FROM `ab_anggota_eks` WHERE usulan_id = '$ids' ")->result();
    }

    // Untuk cek status dosen tsb tugas belajar atau tidak
    function status_dos($nip)
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
                'nip'             => $nip
            ),
            CURLOPT_HTTPHEADER => array(
                'umk_api_key: c3e8e2070a6ca052a781c8546b7973578de8f62f',
                'Cookie: PHPSESSID=mjujvaepnlpp5d0lpaecle7kmrdh5buj'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return json_decode($response, true);
    }

    private function getAI()
    {
        $sql = $this->db->query("SELECT `AUTO_INCREMENT` as id_AI FROM INFORMATION_SCHEMA.TABLES
        WHERE TABLE_SCHEMA = 'simlitabmas' AND TABLE_NAME = 'ab_usulan'")->row();
        return $sql->id_AI;
    }

    function tahunakademik()
    {
        $sql = $this->db->query("SELECT `id_tahun` FROM `mst_tahun_akademik` WHERE `tahun_status` = 'active' ")->row();
        return $sql->id_tahun;
    }

    function getkalpm()
    {
        $sql = $this->db->query("SELECT * FROM ab_jabatan_lpm WHERE status_jab_lpm = '1' AND jenis_jab_lpm ='Ketua'")->row();
        return $sql;
    }

    public function save()
    {
        $post = $this->input->post();
        $date = date("Y-m-d H:i:s");

        $nidn = $this->session->userdata('nidn');
        $namagelar = $this->session->userdata('nama_gelar');
        $judul = $post['judul'];

        $lpm = $this->getkalpm();

        $usulan = ws_getdetailusulan($nidn);
        // $usulan = $this->ws_getdetailusulan($nidn);
        $jabatan = $usulan['result']['data'];

        // $data = $this->ws_getdosen($nidn);
        $data = _wsgetdosen($nidn);
        $res = $data['result']['data'][0];

        $tahun = $this->tahunakademik();

        $this->nidn_pengusul          = $this->session->userdata('nidn');
        $this->nama                   = $namagelar;
        $this->program_studi          = $jabatan['prodi'];
        $this->fakultas               = $jabatan['fakultas'];
        $this->usulan_judul           = $post['judul'];
        $this->usulan_abstrak         = $post['abstrak'];
        $this->usulan_keyword         = $post['keyword'];
        $this->skema_id               = $post['skim'];
        $this->usulan_tahun           = $post['tahun_usulan'];
        $this->usulan_tahun_pelaksanaan   = $post['tahun_pelaksanaan'];
        $this->usulan_lama_pengabdian = $post['lama'];
        $this->usulan_biaya           = $post['budget'];
        $this->usulan_total_biaya     = $post['total'];
        $this->target_luaran          = $post['luaran'];
        $this->jmlh_mahasiswa         = $post['jmlmhs'];
        $this->usulan_kota            = $post['kota'];
        $this->lpm_nama               = $lpm->nama_jab_lpm;
        $this->lpm_nidn               = $lpm->nidn_jab_lpm;
        $this->dekan_nama             = $jabatan['nama_dekan'];
        $this->dekan_nidn             = $jabatan['nip_dekan'];
        $this->rektor_nama            = $jabatan['nama_rektor'];
        $this->rektor_nidn            = $jabatan['nip_rektor'];
        // $this->file_usulan            = $this->_uploadFile($nidn, $judul);
        $this->status_usulan          = 'Menunggu';
        $this->status_kelengkapan     = 'Menunggu';
        $this->status_tahap           = 'Proposal';
        $this->id_tahun               = $tahun;
        $this->kode_user              = $this->session->userdata('kode');
        $this->created_at             = $date;
     
        $this->db->insert('ab_usulan', $this);

        $lembaga = $post['lembaga'];

        $idusulan = $this->db->query("SELECT max(usulan_id) as id FROM `ab_usulan` ")->row();
        $usulanid = $idusulan->id;

        $this->db->query("INSERT INTO `ab_tahap_hibah`(`usulan_id`, `status_tahap`, `tanggal`, `file_usulan`, `inserted`) VALUES
        ('" . $usulanid . "',
        'Proposal',
        '". date('Y-m-d') ."',
        '". $this->_uploadFile($nidn, $judul) ."',
        '" . date('Y-m-d H:i:s') . "')
        ");

        $this->db->query("INSERT INTO `ab_lembaga` (`usulan_id`, `lembaga_nama`, `lembaga_jabatan`, `lembaga_pimpinan`, `lembaga_pimpinan_id`, `lembaga_file`, `lembaga_lokasi`, `lembaga_updated`) values
        ('" . $usulanid . "',
        '" . $post['lembaga'] . "',
        '" . $post['jns_lembaga'] . "',
        '" . $post['pimpinan'] . "',
        '" . $post['nopim'] . "',
        '" . $this->_uploadLembaga($lembaga, $usulanid) . "',
        '" . $post['titiklokasi'] . "',
        '" . date('Y-m-d H:i:s') . "')
        ");

        $this->db->query("INSERT INTO `ab_anggota` (`usulan_id`, `anggota_nidn`, `anggota_nama`, `anggota_pangkat`, `anggota_jabatan`, `email`, `anggota_experience`, `anggota_posisi`, `anggota_isconfirm`, `anggota_jobdesk`, `kode_user`, `updated`) VALUES
        ('" . $usulanid . "',
        '" . $nidn ."',
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
        $c = $date. '_Pengabdian_' . $aj . '_' . $judul;
  
        $config['upload_path']          = './upload_file/pengabdian/file/';
        $config['allowed_types']        = 'pdf|jpg|png';
        $config['file_name']            = $c;
        $config['overwrite']            = true;
        $config['max_size']             = 2048;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        // return $c;
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

        $config['upload_path']          = './upload_file/pengabdian/lembaga/';
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

    public function update()
    {
        $id = $_POST['id'];
        $ids = $this->variasi->decode($id);
        $post = $this->input->post();
        $date = date("Y-m-d H:i:s");

        // Untuk cek name file proposal
        $fprop = $this->db->query("SELECT `status_tahap`, `file_usulan` FROM `ab_tahap_hibah` WHERE usulan_id = '$ids'")->row();
        // Untuk cek name file lembaga
        $flem = $this->db->query("SELECT `lembaga_file` FROM `ab_lembaga` WHERE usulan_id = '$ids'")->row();

        $fileprop  = $fprop->file_usulan;
        $filelem = $flem->lembaga_file;

        $cekstatus = $this->db->query("SELECT `status_usulan`, `status_kelengkapan`, 
        `status_tahap` FROM ab_usulan WHERE `usulan_id` = $ids")->row();

        $cek = $cekstatus->status_usulan;
        $tahap = $cekstatus->status_tahap;
        $kelengkapan = $cekstatus->status_kelengkapan;
        $cekpem = $this->is_pemeriksaan($id);
        $filepropsal = $_FILES['fileproposal']['name'];
        $filemitra = $_FILES['filemitra']['name'];

        // if ($cek == 'Menunggu' && $tahap == 'Proposal' ) {
        if ($tahap == 'Proposal' ) {
           
            if (empty($filepropsal) && empty($filemitra)) {
                $data = array(
                        'usulan_judul'              => $post['judul'],
                        'usulan_abstrak'            => $post['abstrak'],
                        'usulan_keyword'            => $post['keyword'],
                        'skema_id'                  => $post['skim'],
                        'usulan_tahun'              => $post['tahun_usulan'],
                        'usulan_tahun_pelaksanaan'  => $post['tahun_pelaksanaan'],
                        'usulan_lama_pengabdian'    => $post['lama'],
                        'usulan_biaya'              => $post['budget'],
                        'usulan_total_biaya'        => $post['total'],
                        'target_luaran'             => $post['luaran'],
                        'usulan_kota'               => $post['kota'],
                        'jmlh_mahasiswa'            => $post['jmlmhs'],
                        'updated_at'                => $date
                    );
                $this->db->where('usulan_id', $ids);
                $this->db->update('ab_usulan', $data);

                if ($kelengkapan == 'Tidak Lengkap') {
                    $this->db->query("UPDATE ab_usulan SET `status_kelengkapan` = 'Menunggu' WHERE usulan_id = '$ids' ");
                }
                
                $datalem = array(
                    'lembaga_nama' => $post['lembaga'],
                    'lembaga_jabatan' => $post['jns_lembaga'],
                    'lembaga_pimpinan' => $post['pimpinan'],
                    'lembaga_pimpinan_id' => $post['nopim'],
                    'lembaga_lokasi' => $post['titiklokasi']
                );
                $this->db->where('usulan_id', $ids);
                $this->db->update('ab_lembaga', $datalem);


            }elseif (!empty($filepropsal)&& !empty($filemitra)) {
                
                unlink('./upload_file/pengabdian/file/' . $fileprop);
                unlink('./upload_file/pengabdian/lembaga/' . $filelem);

                $data = array(
                    'usulan_judul'              => $post['judul'],
                    'usulan_abstrak'            => $post['abstrak'],
                    'usulan_keyword'            => $post['keyword'],
                    'skema_id'                  => $post['skim'],
                    'usulan_tahun'              => $post['tahun_usulan'],
                    'usulan_tahun_pelaksanaan'  => $post['tahun_pelaksanaan'],
                    'usulan_lama_pengabdian'    => $post['lama'],
                    'usulan_biaya'              => $post['budget'],
                    'usulan_total_biaya'        => $post['total'],
                    'target_luaran'             => $post['luaran'],
                    'usulan_kota'               => $post['kota'],
                    'jmlh_mahasiswa'            => $post['jmlmhs'],
                    'updated_at'                => $date
                );
                $this->db->where('usulan_id', $ids);
                $this->db->update('ab_usulan', $data);

                if ($kelengkapan == 'Tidak Lengkap') {
                    $this->db->query("UPDATE ab_usulan SET `status_kelengkapan` = 'Menunggu' WHERE usulan_id = '$ids' ");
                }

                $nidn = $this->session->userdata('nidn');
                $judul = $post['judul'];

                $datahibah = array(
                    'tanggal'       => date('Y-m-d'),
                    'file_usulan'   => $this->_uploadFile($nidn, $judul),
                    'inserted'      => date('Y-m-d H:i:s')
                );

                $this->db->where('usulan_id', $ids);
                $this->db->update('ab_tahap_hibah', $datahibah);


                $datalem = array(
                    'lembaga_nama' => $post['lembaga'],
                    'lembaga_jabatan' => $post['jns_lembaga'],
                    'lembaga_pimpinan' => $post['pimpinan'],
                    'lembaga_pimpinan_id' => $post['nopim'],
                    'lembaga_file' => $this->_uploadLembaga($post['lembaga'], $ids),
                    'lembaga_lokasi' => $post['titiklokasi']    
                );
                $this->db->where('usulan_id', $ids);
                $this->db->update('ab_lembaga', $datalem);

            }elseif (!empty($filepropsal) && empty($filemitra)) {
                
                unlink('./upload_file/pengabdian/file/' . $fileprop);
                $data = array(
                    'usulan_judul'              => $post['judul'],
                    'usulan_abstrak'            => $post['abstrak'],
                    'usulan_keyword'            => $post['keyword'],
                    'skema_id'                  => $post['skim'],
                    'usulan_tahun'              => $post['tahun_usulan'],
                    'usulan_tahun_pelaksanaan'  => $post['tahun_pelaksanaan'],
                    'usulan_lama_pengabdian'    => $post['lama'],
                    'usulan_biaya'              => $post['budget'],
                    'usulan_total_biaya'        => $post['total'],
                    'target_luaran'             => $post['luaran'],
                    'usulan_kota'               => $post['kota'],
                    'jmlh_mahasiswa'            => $post['jmlmhs'],
                    'updated_at'                => $date
                );
                $this->db->where('usulan_id', $ids);
                $this->db->update('ab_usulan', $data);

                if ($kelengkapan == 'Tidak Lengkap') {
                    $this->db->query("UPDATE ab_usulan SET `status_kelengkapan` = 'Menunggu' WHERE usulan_id = '$ids' ");
                }

                $nidn = $this->session->userdata('nidn');
                $judul = $post['judul'];

                $datahibah = array(
                    'tanggal'       => date('Y-m-d'),
                    'file_usulan'   => $this->_uploadFile($nidn, $judul),
                    'inserted'      => date('Y-m-d H:i:s')
                );

                $this->db->where('usulan_id', $ids);
                $this->db->update('ab_tahap_hibah', $datahibah);

                $datalem = array(
                    'lembaga_nama' => $post['lembaga'],
                    'lembaga_jabatan' => $post['jns_lembaga'],
                    'lembaga_pimpinan' => $post['pimpinan'],
                    'lembaga_pimpinan_id' => $post['nopim'],
                    'lembaga_lokasi' => $post['titiklokasi']
                );
                $this->db->where('usulan_id', $ids);
                $this->db->update('ab_lembaga', $datalem);

            }elseif (!empty($filemitra) && empty($filepropsal)) {
                
                unlink('./upload_file/pengabdian/lembaga/' . $filelem);
                $data = array(
                    'usulan_judul'              => $post['judul'],
                    'usulan_abstrak'            => $post['abstrak'],
                    'usulan_keyword'            => $post['keyword'],
                    'skema_id'                  => $post['skim'],
                    'usulan_tahun'              => $post['tahun_usulan'],
                    'usulan_tahun_pelaksanaan'  => $post['tahun_pelaksanaan'],
                    'usulan_lama_pengabdian'    => $post['lama'],
                    'usulan_biaya'              => $post['budget'],
                    'usulan_total_biaya'        => $post['total'],
                    'target_luaran'             => $post['luaran'],
                    'usulan_kota'               => $post['kota'],
                    'jmlh_mahasiswa'            => $post['jmlmhs'],
                    'updated_at'                => $date
                );
                $this->db->where('usulan_id', $ids);
                $this->db->update('ab_usulan', $data);

                if ($kelengkapan == 'Tidak Lengkap') {
                    $this->db->query("UPDATE ab_usulan SET `status_kelengkapan` = 'Menunggu' WHERE usulan_id = '$ids' ");
                }


                $datalem = array(
                    'lembaga_nama' => $post['lembaga'],
                    'lembaga_jabatan' => $post['jns_lembaga'],
                    'lembaga_pimpinan' => $post['pimpinan'],
                    'lembaga_pimpinan_id' => $post['nopim'],
                    'lembaga_file' => $this->_uploadLembaga($post['lembaga'], $ids),
                    'lembaga_lokasi' => $post['titiklokasi']
                );
                $this->db->where('usulan_id', $ids);
                $this->db->update('ab_lembaga', $datalem);
            }            
        }elseif ($cekpem > 0 ) {
            if (empty($filepropsal) && empty($filemitra)) {
                
                $data = array(
                    'usulan_judul'              => $post['judul'],
                    'usulan_abstrak'            => $post['abstrak'],
                    'usulan_keyword'            => $post['keyword'],
                    'skema_id'                  => $post['skim'],
                    'usulan_tahun'              => $post['tahun_usulan'],
                    'usulan_tahun_pelaksanaan'  => $post['tahun_pelaksanaan'],
                    'usulan_lama_pengabdian'    => $post['lama'],
                    'usulan_biaya'              => $post['budget'],
                    'usulan_total_biaya'        => $post['total'],
                    'target_luaran'             => $post['luaran'],
                    'usulan_kota'               => $post['kota'],
                    'jmlh_mahasiswa'            => $post['jmlmhs'],
                    'status_tahap'              => 'Revisi Proposal',
                    'updated_at'                => $date
                );
                $this->db->where('usulan_id', $ids);
                $this->db->update('ab_usulan', $data);

                $this->db->query("INSERT INTO `ab_tahap_hibah`(`usulan_id`, `status_tahap`, `tanggal`, `file_usulan`, `inserted`) VALUES
                ('" . $ids . "',
                'Proposal Revisi',
                '" . date('Y-m-d') . "',
                '" . $fileprop . "',
                '" . date('Y-m-d H:i:s') . "')
                ");

                $datalem = array(
                    'lembaga_nama' => $post['lembaga'],
                    'lembaga_jabatan' => $post['jns_lembaga'],
                    'lembaga_pimpinan' => $post['pimpinan'],
                    'lembaga_pimpinan_id' => $post['nopim'],
                    'lembaga_lokasi' => $post['titiklokasi']
                );
                $this->db->where('usulan_id', $ids);
                $this->db->update('ab_lembaga', $datalem);
            } elseif (!empty($filepropsal) && !empty($filemitra)) {
                
                unlink('./upload_file/pengabdian/lembaga/' . $filelem);

                $data = array(
                    'usulan_judul'              => $post['judul'],
                    'usulan_abstrak'            => $post['abstrak'],
                    'usulan_keyword'            => $post['keyword'],
                    'skema_id'                  => $post['skim'],
                    'usulan_tahun'              => $post['tahun_usulan'],
                    'usulan_tahun_pelaksanaan'  => $post['tahun_pelaksanaan'],
                    'usulan_lama_pengabdian'    => $post['lama'],
                    'usulan_biaya'              => $post['budget'],
                    'usulan_total_biaya'        => $post['total'],
                    'target_luaran'             => $post['luaran'],
                    'usulan_kota'               => $post['kota'],
                    'jmlh_mahasiswa'            => $post['jmlmhs'],
                    'status_tahap'              => 'Revisi Proposal',
                    'updated_at'                => $date
                );
                $this->db->where('usulan_id', $ids);
                $this->db->update('ab_usulan', $data);

                $nidn = $this->session->userdata('nidn');
                $judul = $post['judul'];
                
                $this->db->query("INSERT INTO `ab_tahap_hibah`(`usulan_id`, `status_tahap`, `tanggal`, `file_usulan`, `inserted`) VALUES
                ('" . $ids . "',
                'Proposal Revisi',
                '" . date('Y-m-d') . "',
                '" . $this->_uploadFile($nidn, $judul) . "',
                '" . date('Y-m-d H:i:s') . "')
                ");

                $datalem = array(
                    'lembaga_nama' => $post['lembaga'],
                    'lembaga_jabatan' => $post['jns_lembaga'],
                    'lembaga_pimpinan' => $post['pimpinan'],
                    'lembaga_pimpinan_id' => $post['nopim'],
                    'lembaga_file' => $this->_uploadLembaga($post['lembaga'], $ids),
                    'lembaga_lokasi' => $post['titiklokasi']
                );

                $this->db->where('usulan_id', $ids);
                $this->db->update('ab_lembaga', $datalem);
            } elseif (!empty($filepropsal) && empty($filemitra)) {
                
                $data = array(
                    'usulan_judul'              => $post['judul'],
                    'usulan_abstrak'            => $post['abstrak'],
                    'usulan_keyword'            => $post['keyword'],
                    'skema_id'                  => $post['skim'],
                    'usulan_tahun'              => $post['tahun_usulan'],
                    'usulan_tahun_pelaksanaan'  => $post['tahun_pelaksanaan'],
                    'usulan_lama_pengabdian'    => $post['lama'],
                    'usulan_biaya'              => $post['budget'],
                    'usulan_total_biaya'        => $post['total'],
                    'target_luaran'             => $post['luaran'],
                    'usulan_kota'               => $post['kota'],
                    'jmlh_mahasiswa'            => $post['jmlmhs'],
                    'status_tahap'              => 'Revisi Proposal',
                    'updated_at'                => $date
                );
                $this->db->where('usulan_id', $ids);
                $this->db->update('ab_usulan', $data);

                $nidn = $this->session->userdata('nidn');
                $judul = $post['judul'];
                
                $this->db->query("INSERT INTO `ab_tahap_hibah`(`usulan_id`, `status_tahap`, `tanggal`, `file_usulan`, `inserted`) VALUES
                ('" . $ids . "',
                'Proposal Revisi',
                '" . date('Y-m-d') . "',
                '" . $this->_uploadFile($nidn, $judul) . "',
                '" . date('Y-m-d H:i:s') . "')
                ");

                $datalem = array(
                    'lembaga_nama' => $post['lembaga'],
                    'lembaga_jabatan' => $post['jns_lembaga'],
                    'lembaga_pimpinan' => $post['pimpinan'],
                    'lembaga_pimpinan_id' => $post['nopim'],
                    'lembaga_lokasi' => $post['titiklokasi']
                );
                $this->db->where('usulan_id', $ids);
                $this->db->update('ab_lembaga', $datalem);
            } elseif (!empty($filemitra) && empty($filepropsal)) {
                
                unlink('./upload_file/pengabdian/lembaga/' . $filelem);
                $data = array(
                    'usulan_judul'              => $post['judul'],
                    'usulan_abstrak'            => $post['abstrak'],
                    'usulan_keyword'            => $post['keyword'],
                    'skema_id'                  => $post['skim'],
                    'usulan_tahun'              => $post['tahun_usulan'],
                    'usulan_tahun_pelaksanaan'  => $post['tahun_pelaksanaan'],
                    'usulan_lama_pengabdian'    => $post['lama'],
                    'usulan_biaya'              => $post['budget'],
                    'usulan_total_biaya'        => $post['total'],
                    'target_luaran'             => $post['luaran'],
                    'usulan_kota'               => $post['kota'],
                    'jmlh_mahasiswa'            => $post['jmlmhs'],
                    'status_tahap'              => 'Revisi Proposal',
                    'updated_at'                => $date
                );
                $this->db->where('usulan_id', $ids);
                $this->db->update('ab_usulan', $data);

                $this->db->query("INSERT INTO `ab_tahap_hibah`(`usulan_id`, `status_tahap`, `tanggal`, `file_usulan`, `inserted`) VALUES
                ('" . $ids . "',
                'Proposal Revisi',
                '" . date('Y-m-d') . "',
                '" . $fileprop . "',
                '" . date('Y-m-d H:i:s') . "')
                ");

                $datalem = array(
                    'lembaga_nama' => $post['lembaga'],
                    'lembaga_jabatan' => $post['jns_lembaga'],
                    'lembaga_pimpinan' => $post['pimpinan'],
                    'lembaga_pimpinan_id' => $post['nopim'],
                    'lembaga_file' => $this->_uploadLembaga($post['lembaga'], $ids),
                    'lembaga_lokasi' => $post['titiklokasi']
                );
                $this->db->where('usulan_id', $ids);
                $this->db->update('ab_lembaga', $datalem);
            }     
        }
    }

    public function anggotainternal($id)
    {
        $ids = $this->variasi->decode($id);
        return $this->db->query("SELECT * FROM `ab_anggota` WHERE `usulan_id` = '$ids'  AND `anggota_posisi` = 'anggota' ")->result();
    }

    public function anggotamahasiswa($id)
    {
        $ids = $this->variasi->decode($id);
        return $this->db->query("SELECT * FROM `ab_anggota_eks` WHERE usulan_id = '$ids' AND `anggota_eks_instansi` = 'Mahasiswa' ")->result();
    }

    public function anggotaeksternal($id)
    {
        $ids = $this->variasi->decode($id);
        return $this->db->query("SELECT * FROM `ab_anggota_eks` WHERE usulan_id = '$ids' AND `anggota_eks_instansi` != 'Mahasiswa' ")->result();
    }

    public function ringkasan($id)
    {
        $ids = $this->variasi->decode($id);
        return $this->db->query("SELECT a.`usulan_id`, a.`usulan_judul`, b.`skema_nama`, a.`jmlh_mahasiswa`, a.`status_usulan`, a.`hasil_nilai`  FROM ab_usulan a LEFT JOIN ab_skema b ON a.`skema_id`=b.`skema_id` WHERE a.`usulan_id`= '$ids'")->row();
    }

    public function saveanggota()
    {
        $post = $this->input->post();
        $date = date("Y-m-d H:i:s");

        $id = $post['id_usulan'];
        $ids = $this->variasi->decode($id);
        $jenis = $post['jenis'];

        switch ($jenis) {
            case 'internal':

                $iddos = $post['kode_dos'];
                $dosen = explode('-', $iddos);
                $jobdesk = $post['jobdesk'];
                $data = _wsgetdosen($dosen[0]);
                // $data = $this->ws_getdosen($dosen[0]);
                $res = $data['result']['data'][0];
                $identity = $res['nidn'] != '-' ? $res['nidn'] : $res['nis'];

                $status = $res['status'];

                if ($status == 'Tugas Belajar') {
                    $this->session->set_flashdata('tugas', 'success');
                }else{
                    $this->db->query("INSERT INTO `ab_anggota` (`usulan_id`, `anggota_nidn`, `anggota_nama`, `anggota_pangkat`, `anggota_jabatan`, `email`, `anggota_experience`, `anggota_posisi`, `anggota_isconfirm`, `anggota_jobdesk`, `kode_user`, `updated`) VALUES
                    ('" . $ids . "',
                    '" . $identity . "',
                    '" . $res['nama'] . "',
                    '" . $res['golongan'] . "',
                    '" . $res['pangkat'] . "',
                    '" . $res['email'] . "',
                    '" . $res['prodi'] . "',
                    'anggota',
                    '0',
                    '" . $jobdesk . "',
                    '" . $res['kode'] . "',
                    '" . $date . "'
                    )");
                    $this->session->set_flashdata('simpan', 'success');
                }
                break;
                
            case 'mahasiswa':

                $nim = $post['eks_kodemhs'];
                $mhs = explode('-', $nim);
                $jobdesk = $post['jobdesk'];
                $data = ws_getmahasiswa($mhs[0]);
                // $data = $this->ws_getmahasiswa($mhs[0]);
                $res = $data['result']['data'][0];
                
                $this->db->query("INSERT INTO `ab_anggota_eks` (`usulan_id`, `anggota_eks_kode`, `anggota_eks_nama`, `anggota_eks_instansi`, `anggota_eks_posisi`, `anggota_eks_jobdesk`, `anggota_eks_email`, `anggota_eks_update`) VALUES
                ('" . $ids . "',
                 '" . $res['nim'] . "',
                 '" . $res['nama'] . "',
                 'Mahasiswa',
                 'anggota',
                 '" . $jobdesk . "',
                 '" . $res['email'] . "',
                 '" . $date . "'
                )");
                $this->session->set_flashdata('simpan', 'success');
                break;

            case 'eksternal':

                $kode = $post['kodeeks'];
                $nama = $post['nama'];
                $instansi = $post['instansi'];
                $email = $post['email'];
                $jobdesk = $post['jobdesk'];

                $this->db->query("INSERT INTO `ab_anggota_eks` (`usulan_id`, `anggota_eks_kode`, `anggota_eks_nama`, `anggota_eks_instansi`, `anggota_eks_posisi`, `anggota_eks_jobdesk`, `anggota_eks_email`, `anggota_eks_update`) VALUES
                ('". $ids ."',
                 '". $kode ."',
                 '". $nama ."',
                 '". $instansi ."',
                 'anggota',
                 '". $jobdesk ."',
                 '". $email ."',
                 '". $date ."'
                )");
                $this->session->set_flashdata('simpan', 'success');
                break;
        }
    }

    public function deleteusulan($id)
    {
        $ids = $this->variasi->decode($id);

        $this->db->query("DELETE FROM `ab_usulan` WHERE `usulan_id` = '$ids' ");
        $this->db->query("DELETE FROM `ab_anggota` WHERE `usulan_id` = '$ids' ");
        $this->db->query("DELETE FROM `ab_anggota_eks` WHERE `usulan_id` = '$ids' ");
        $this->db->query("DELETE FROM `ab_tahap_hibah` WHERE `usulan_id` = '$ids' ");
        $this->db->query("DELETE FROM `ab_lembaga` WHERE `usulan_id` = '$ids' ");
    }

    public function deleteanggota($id)
    {
        $ids = $this->variasi->decode($id);
        return $this->db->delete('ab_anggota', array("anggota_id" => $ids));
    }

    public function deleteeks($id)
    {
        $ids = $this->variasi->decode($id);
        
        return $this->db->delete('ab_anggota_eks', array("anggota_eks_id" => $ids));
    }


    public function is_pemeriksaan($id)
    {
        $ids = $this->variasi->decode($id);
        $sql = $this->db->query("SELECT a.*, b.`cekpem_id`, b.`cek_pilihan` FROM `ab_pemeriksaan` a LEFT JOIN `ab_cek_pemeriksaan` b ON a.`pemeriksaan_id`=b.`pemeriksaan_id` WHERE b.`usulan_id` = '$ids'")->num_rows();
        return $sql;
    }

    public function pemeriksaan($id)
    {
        $ids = $this->variasi->decode($id);
        $sql = $this->db->query("SELECT a.*, b.`cekpem_id`, b.`cek_pilihan` FROM `ab_pemeriksaan` a LEFT JOIN `ab_cek_pemeriksaan` b ON a.`pemeriksaan_id`=b.`pemeriksaan_id` WHERE b.`usulan_id` = '$ids'")->result();
        return $sql;
        
    }

    public function mahasiswa()
    {
        $post = $this->input->post();
        $id = $post['id'];
        $a = ws_getmahasiswa($id);
        $data = $a['result']['data'];

        foreach ($data as $key => $value) {
            $nim = $value['nim'];
            $nama = $value['nama'];
            echo '<option value="' . $nim . "-" . $nama . '" >' . $nim . " - " . $nama . '</option>';
        }
    }

    public function dosen()
    {
        $post = $this->input->post();
        $id = $post['id'];
        $a = _wsgetdosen($id);
        $data = $a['result']['data'];

        foreach ($data as $key => $value) {
            // $nidn = $value['nidn'];
            $nis = $value['nis'];
            $nama = $value['nama'];
            echo '<option value="' . $nis . "-" . $nama . '" >' . $nis . " - " . $nama . '</option>';
        }
    }

    public function reviewernya($id)
    {
        $ids = $this->variasi->decode($id);
        $sql = $this->db->query("SELECT catatan,review_id, ab_review_proposal.user_id, tanggal_review, ab_reviewer.nama_lengkap
						FROM ab_review_proposal, ab_usulan, ab_reviewer
						WHERE ab_reviewer.reviewer_id = ab_review_proposal.user_id
						AND ab_review_proposal.usulan_id = '$ids'
						AND ab_usulan.usulan_id='$ids'")->result();
        return $sql;
    }

    public function isreviewdone($id)
    {
        $ids = $this->variasi->decode($id);
        $sql = $this->db->query("SELECT catatan,review_id, ab_review_proposal.user_id, tanggal_review, ab_reviewer.nama_lengkap
						FROM ab_review_proposal, ab_usulan, ab_reviewer
						WHERE ab_reviewer.reviewer_id = ab_review_proposal.user_id
						AND ab_review_proposal.usulan_id = '$ids'
						AND ab_usulan.usulan_id='$ids'")->num_rows();
        return $sql;
    }

    public function aspek()
    {
        return $this->db->get("ab_aspek_penilaian")->result();
    }

    public function sbganggota()
    {
        $kode = $this->session->userdata('kode');
        $sql = $this->db->query("SELECT b.*, c.skema_nama, d.tahun_ajaran, d.tahun_semester, IF(d.tahun_semester = '1', 'Gasal', IF(d.tahun_semester = '2', 'Genap', 'Data Lama')) AS semester FROM ab_anggota a LEFT JOIN ab_usulan b ON a.usulan_id=b.usulan_id LEFT JOIN ab_skema c ON b.skema_id=c.skema_id LEFT JOIN mst_tahun_akademik d ON b.id_tahun=d.id_tahun WHERE a.kode_user='$kode' AND a.anggota_posisi ='anggota'")->result();
        return $sql;
    }

    public function detailanggota($id)
    {
        # code...
    }

    public function getanggotabyid($id)
    {
        $ids = $this->variasi->decode($id);
        $sql = $this->db->query("SELECT * FROM ab_anggota WHERE `usulan_id` ='$ids' AND `anggota_posisi` ='anggota' ")->result();
        return $sql;
    }

    public function getanggotaeksbyid($id)
    {
        $ids = $this->variasi->decode($id);
        $a = $this->getbyid($id);
        if ($a->status_kelengkapan = 'Menunggu') {
            $sql = $this->db->query("SELECT * FROM ab_anggota_eks WHERE `usulan_id` ='$ids' ")->result();
        } else {
            $sql = $this->db->query("");
        }
        return $sql;
    }

    public function getbyid($id)
    {
        $ids = $this->variasi->decode($id);
        $sql = $this->db->query("SELECT a.*, b.*, c.`skema_nama`, d.`tahun_ajaran`, e.`anggota_pangkat`, e.`anggota_jabatan`, e.`email` FROM `ab_usulan` a LEFT JOIN `ab_lembaga` b ON b.`usulan_id`=a.`usulan_id` 
        LEFT JOIN `ab_skema` c ON a.`skema_id`=c.`skema_id` LEFT JOIN `mst_tahun_akademik` d ON a.`id_tahun`=d.`id_tahun` LEFT JOIN `ab_anggota` e ON a.`usulan_id`=e.`usulan_id` WHERE a.`usulan_id` = '$ids' AND e.`anggota_posisi`='ketua' 
        ")->row();
        return $sql;
    }

    // Untuk ambil data mahasiswa 
    // public function ws_getmahasiswa($nim)
    // {
    //     $curl = curl_init();

    //     curl_setopt_array($curl, array(
    //         CURLOPT_URL => 'https://ws.umk.ac.id/services/simpel/getmahasiswa',
    //         CURLOPT_RETURNTRANSFER => true,
    //         CURLOPT_ENCODING => '',
    //         CURLOPT_MAXREDIRS => 10,
    //         CURLOPT_TIMEOUT => 0,
    //         CURLOPT_FOLLOWLOCATION => true,
    //         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //         CURLOPT_CUSTOMREQUEST => 'POST',
    //         CURLOPT_POSTFIELDS => array(
    //             'nim'             => $nim
    //         ),
    //         CURLOPT_HTTPHEADER => array(
    //             'umk_api_key: c3e8e2070a6ca052a781c8546b7973578de8f62f',
    //             'Cookie: PHPSESSID=n7t8bqjtib3npepv0p4tpe57tqduqcrl'
    //         ),
    //     ));

    //     $response = curl_exec($curl);

    //     curl_close($curl);
    //     $result = json_decode($response, true);
    //     return $result;
    // }

    // Untuk ambil data dosen 
    // public function ws_getdosen($nidn)
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

    // Untuk ambil data dosen 
    // public function ws_getdetailusulan($nidn)
    // {
    //     $curl = curl_init();

    //     curl_setopt_array($curl, array(
    //         CURLOPT_URL => 'https://ws.umk.ac.id/services/simpel/getdetaildosenusulan',
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
    //             'Cookie: PHPSESSID=g72t0el28rd8psst6ebft4dmus7a0f9n'
    //         ),
    //     ));

    //     $response = curl_exec($curl);

    //     curl_close($curl);
    //     $result = json_decode($response, true);
    //     return $result;
    // }

       
}
?>