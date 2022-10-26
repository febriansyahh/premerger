<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pengajuan_model extends CI_Model {

    private $_table = "lemlit_propose";

    public function getall()
    {
        $nidn = $this->session->userdata('nidn');
        $nis = $this->session->userdata('nis');

        return $this->db->query("SELECT p.*, s.`skim_name` FROM `lemlit_propose` p LEFT JOIN `lemlit_skim` s ON p.`skim_id`=s.`skim_id` WHERE (`user_username` = '$nidn' OR `user_username` = '$nis')")->result();
    }

    public function getalllist()
    {
        return $this->db->query("SELECT p.*, s.`skim_name` FROM `lemlit_propose` p LEFT JOIN `lemlit_skim` s ON p.`skim_id`=s.`skim_id` ORDER BY p.`propose_date` DESC")->result();
    }

    public function getpusatstudi()
    {
        return $this->db->get('lemlit_pusat_studi')->result();
    }

    public function getskim()
    {
        return $this->db->query("SELECT skim_id, skim_name, skim_budget FROM `lemlit_skim` WHERE skim_active ='Active' ")->result();
    }

    public function lecture($id)
    {
        return $this->db->query("SELECT lecture_id FROM lemlit_lecture WHERE user_username='$id' ")->row();
    }

    public function save()
    {
      
        $username     = $this->session->userdata('nidn');
        $lecture_id    = $this->lecture($username)->lecture_id;

        $idprop = $this->db->query("SELECT `AUTO_INCREMENT` as propose_id FROM INFORMATION_SCHEMA.TABLES
                        WHERE TABLE_SCHEMA = 'pre_merger' AND TABLE_NAME = 'lemlit_propose'")->row();

        $tanggal1     = date("Y-m-d", strtotime($this->input->post('date1', 'true')));
        $tanggal2     = date("Y-m-d", strtotime($this->input->post('date2', 'true')));

        $data = array(
                'user_username'        => $username,
                'skim_id'              => $this->input->post('skim', 'true'),
                'pusat_studi_id'       => $this->input->post('pusat', 'true'),
                'propose_title'        => strtoupper($this->input->post('judul', 'true')),
                'propose_title_seo'    => seo_title($this->input->post('judul', 'true')),
                'propose_place'        => strtoupper($this->input->post('tempat', 'true')),
                'propose_method'       => trim($this->input->post('metode', 'true')),
                'propose_masalah'      => trim($this->input->post('masalah', 'true')),
                'propose_fund'         => $this->input->post('dana', 'true'),
                'propose_budget'       => $this->input->post('budget', 'true'),
                'propose_purpose'      => trim($this->input->post('tujuan', 'true')),
                'propose_luaran'       => trim($this->input->post('luaran', 'true')),
                'propose_date1'        => $tanggal1,
                'propose_date2'        => $tanggal2,
                'propose_proposal'     => $this->_uploadPengajuan($username),
                'propose_date'         => date('Y-m-d'),
                'propose_update'       => date('Y-m-d H:i:s')
            );

        $this->db->insert('lemlit_propose', $data);

        // $propose_id = $this->db->insert_id();
        $propose_id = $idprop->propose_id;
        $data = array(
                'propose_id'                 => $propose_id,
                'lecture_id'                 => $lecture_id,
                'team_position_level'        => 'Ketua',
                'team_position_status'       => 'Confirm',
                'team_position_update'       => date('Y-m-d H:i:s')
            );

        $this->db->insert('lemlit_team_position', $data);

        // Update Data Tanggungan menjadi Ada
        $data = array(
                'lecture_tanggungan'     => 'Ada',
                'lecture_update'        => date('Y-m-d H:i:s')
            );

        $this->db->where('user_username', $username);
        $this->db->update('lemlit_lecture', $data);
    }

    public function detail($id, $usr)
    {
        $ids = $this->variasi->decode($id);
        $usrs = $this->variasi->decode($usr);
        $sql = $this->db->query("SELECT * FROM `lemlit_propose` WHERE `propose_id` = '$ids' AND `user_username` = '$usrs' ")->row();
        return $sql;
    }

    public function update()
    {
        $post = $this->input->post();
        $is_file = $_FILES['file']['name'];
        $file_old = $this->variasi->decode($this->input->post('file_sebelum'));
        $dana = $post['dana'];
    
        $user = $this->input->post('nidn');
        $username = $this->variasi->decode($user);
        $id     = $this->input->post('id');

        $ids = $this->variasi->decode($id);

        $tanggal1     = date("Y-m-d", strtotime($this->input->post('date1', 'true')));
        $tanggal2     = date("Y-m-d", strtotime($this->input->post('date2', 'true')));

        if ($is_file != '') {
            unlink('./upload_file/proposal/' . $file_old);
            $data = array(
                'user_username'        => $username,
                'skim_id'              => $this->input->post('skim', 'true'),
                'pusat_studi_id'       => $this->input->post('pusat', 'true'),
                'propose_title'        => strtoupper($this->input->post('judul', 'true')),
                'propose_title_seo'    => seo_title($this->input->post('judul', 'true')),
                'propose_place'        => strtoupper($this->input->post('tempat', 'true')),
                'propose_method'       => trim($this->input->post('metode', 'true')),
                'propose_masalah'      => trim($this->input->post('masalah', 'true')),
                'propose_fund'         => $this->input->post('dana', 'true'),
                'propose_budget'       => $this->input->post('budget', 'true'),
                'propose_purpose'      => trim($this->input->post('tujuan', 'true')),
                'propose_luaran'       => trim($this->input->post('luaran', 'true')),
                'propose_date1'        => $tanggal1,
                'propose_date2'        => $tanggal2,
                'propose_proposal'     => $this->_uploadPengajuan($username),
                'propose_date'         => date('Y-m-d'),
                'propose_update'       => date('Y-m-d H:i:s')
            );
        }else{
            $data = array(
                'user_username'        => $username,
                'skim_id'              => $this->input->post('skim', 'true'),
                'pusat_studi_id'       => $this->input->post('pusat', 'true'),
                'propose_title'        => strtoupper($this->input->post('judul', 'true')),
                'propose_title_seo'    => seo_title($this->input->post('judul', 'true')),
                'propose_place'        => strtoupper($this->input->post('tempat', 'true')),
                'propose_method'       => trim($this->input->post('metode', 'true')),
                'propose_masalah'      => trim($this->input->post('masalah', 'true')),
                'propose_fund'         => $this->input->post('dana', 'true'),
                'propose_budget'       => $this->input->post('budget', 'true'),
                'propose_purpose'      => trim($this->input->post('tujuan', 'true')),
                'propose_luaran'       => trim($this->input->post('luaran', 'true')),
                'propose_date1'        => $tanggal1,
                'propose_date2'        => $tanggal2,
                'propose_date'         => date('Y-m-d'),
                'propose_update'       => date('Y-m-d H:i:s')
            );
        }
        
        $this->db->set($data);
        $this->db->where('propose_id', $ids);
        $this->db->update('lemlit_propose');

    }

    private function _uploadPengajuan($nidn)
    {
        $jam = time();

        $c = 'Proposal_' . $nidn . '_' . $jam;

        $config['upload_path']          = './upload_file/proposal/';
        $config['allowed_types']        = 'pdf';
        $config['file_name']            = $c;
        $config['overwrite']            = true;
        $config['max_size']             = 2048;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ($this->upload->do_upload('file')) {
            return $this->upload->data("file_name");
        }
    }

    public function detanggota($id, $usr)
    {
        $ids = $this->variasi->decode($id);
        $usrs = $this->variasi->decode($usr);

        $sql = $this->db->query("SELECT p.`propose_title`, p.`propose_date`, p.`propose_date1`, p.`propose_date2`, s.`skim_anggota_min`, s.`skim_anggota_max`, s.`skim_anggotamhs_min`, s.`skim_anggotaeks_min` FROM `lemlit_propose` p LEFT JOIN `lemlit_skim` s ON p.`skim_id`=s.`skim_id`
                WHERE p.`propose_id`='$ids' AND p.`user_username`='$usrs'")->row();
        return $sql;
    }

    public function internal($id)
    {
        $ids = $this->variasi->decode($id);
        $sql = $this->db->query("SELECT tp.`team_position_id`, u.`user_username`, u.`user_name`, f.`faculty_name`, ps.`study_program_name` ,tp.`team_position_level`, tp.`team_position_status` FROM 
                `lemlit_team_position` tp LEFT JOIN `lemlit_lecture` l ON tp.`lecture_id`=l.`lecture_id`
                LEFT JOIN `lemlit_users` u ON l.`user_username`=u.`user_username` 
                LEFT JOIN `lemlit_faculty` f ON l.`faculty_id`=f.`faculty_id`
                LEFT JOIN `lemlit_study_program` ps ON l.`study_program_id`=ps.`study_program_id`
                WHERE tp.`propose_id`= '$ids' AND tp.`team_position_level`='Anggota'")->result();
        return $sql;
    }

    public function mahasiswa($id)
    {
        $ids = $this->variasi->decode($id);
        return $this->db->query("SELECT * FROM `lemlit_team_eksternal` WHERE `team_eks_proposeid` = '$ids' AND `team_eks_jenis` = 'Mahasiswa' ")->result();
    }

    public function eksternal($id)
    {
        $ids = $this->variasi->decode($id);
        return $this->db->query("SELECT * FROM `lemlit_team_eksternal` WHERE `team_eks_proposeid` = '$ids' AND `team_eks_jenis` = 'Eksternal' ")->result();
    }

    public function delete($id)
    {
        $ids = $this->variasi->decode($id);
        $file = $this->db->query("SELECT `propose_proposal` AS `file` FROM `lemlit_propose` WHERE `propose_id` = '$ids' ")->row();
        unlink('./upload_file/proposal/' . $file->file);
        return $this->db->delete('lemlit_propose', array("propose_id" => $ids));
    }

    public function revisi()
    {
        $nidn = $this->session->userdata('nidn');
        $nis = $this->session->userdata('nis');

        return $this->db->query("SELECT  p.*, s.`skim_name` FROM `lemlit_propose` p JOIN `lemlit_skim` s ON p.`skim_id`=s.`skim_id` WHERE p.`propose_status` >= '2' AND p.user_username='$nidn'")->result();
    }
    
}
?>