<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Header_model extends CI_Model {
	function __construct() {
		parent::__construct();	
	}

    function select_reviewer($id)
    {
        $this->db->select('*');
        $this->db->from('lemlit_lecture');
        $this->db->where('user_username', $id); // Jika 1 maka bisa ganti peran
        $this->db->where('lecture_review', 1); // Jika 1 maka bisa ganti peran

        return $this->db->get();
    }

    function select_pusat_studi($id)
    {
        $this->db->select('*');
        $this->db->from('lemlit_pusat_studi');
        $this->db->where('pusat_studi_nis', $id); // Jika 1 maka bisa ganti peran

        return $this->db->get();
    }

    public function reviewer($id)
    {
        $query = $this->db->query("SELECT * FROM `lemlit_lecture` WHERE user_username = '$id' AND `lecture_review` = '1' ");
        if ($query->num_rows() == 1) {
            return 1;
        } else {
            return 0;
        }
    }

    function pusat_studi($id)
    {
        $query = $this->db->query("SELECT * FROM `lemlit_pusat_studi` WHERE pusat_studi_nis = '$id' ");
        if ($query->num_rows() == 1) {
            return 1;
        } else {
            return 0;
        }
    }

    public function reviewerpengabdian($id)
    {
        $query = $this->db->query("SELECT * FROM `ab_reviewer` WHERE nidn = '$id' AND `status` = 'Active' ");
        if ($query->num_rows() == 1) {
            return 1;
        } else {
            return 0;
        }
    }


    public function c_penelitian()
    {
        if ($this->session->userdata('level') == 'dosen') {
            return $this->db->query("SELECT COUNT(`id_usulan`) AS jumlah FROM `lit_usulan` WHERE `nidn_pengusul` = '" . $this->session->userdata('nidn') . "' OR `nidn_pengusul` ='" . $this->session->userdata('nis') . "' ")->row();
        } else {
            return $this->db->query("SELECT COUNT(`id_usulan`) AS jumlah FROM `lit_usulan` ")->row();
        }
    }

    public function c_pengabdian()
    {
        if ($this->session->userdata('level') == 'dosen') {
            return $this->db->query("SELECT COUNT(`usulan_id`) AS jumlah FROM `ab_usulan` WHERE `nidn_pengusul` = '" . $this->session->userdata('nidn') . "' OR `nidn_pengusul` ='" . $this->session->userdata('nis') . "' OR `kode_user` = '". $this->session->userdata('kode') . "' ")->row();
        } else {
            return $this->db->query("SELECT COUNT(`usulan_id`) AS jumlah FROM `ab_usulan` ")->row();
        }
    }

    public function statustahap($id)
    {
        $ids = $this->variasi->decode($id);
        $sql = $this->db->query("SELECT `status_tahap` FROM `ab_usulan` WHERE usulan_id = '$ids'")->row();

        return $sql->status_tahap;
    }
}
?>