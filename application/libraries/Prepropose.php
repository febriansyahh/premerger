<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Prepropose {

	protected $_ci;
	public function __construct() {
		$this->_ci = &get_instance();
		$this->datenow = gmdate("Y-m-d", time()+60*60*7);
	}

	public function _ischeck_periode() {
		$result = $this->_ci->db->get('lemlit_periode');
		$row = $result->row_array();
		$error = array(false, 'Periode usulan tidak berlaku.');
		if($row['periode_status']=='Aktif') {
			if($this->datenow >= $row['periode_dari'] && $this->datenow <= $row['periode_sampai']) {
				return true;
			} else {
				return $error;
			}
		} else {
			return $error;
		}
	}

	public function _check_periode() {
		$result = $this->_ci->db->get('lemlit_periode');
		$row = $result->row_array();
		return array(
				'status'=>$row['periode_status'],
				'awal'=>$row['periode_dari'],
				'akhir'=>$row['periode_sampai'],
				'max_ketua'=>$row['periode_max_ketua'],
				'max_anggota'=>$row['periode_max_anggota'],
				'max_usulan'=>$row['periode_max_usulan']
			);
	}

	public function _get_lecture_id($username) {
		$result = $this->_ci->db->get_where('lemlit_lecture', array('user_username'=>$username));
		$row = $result->row_array();
		return $row['lecture_id'];
	}

	public function _get_skim_propose($idpropose) {
		$result = $this->_ci->db->get_where('lemlit_propose', array('propose_id'=>$idpropose));
		$row = $result->row_array();
		return $row['skim_id'];
	}

	public function _check_syarat_anggota($id) {
		$this->_ci->db->select('IF(count(a.lecture_id) BETWEEN skim_anggota_min AND skim_anggota_max, 1,0) as syarat_anggota, count(a.lecture_id) as jumlah_anggota, p.propose_id as proposalid');
		$this->_ci->db->from('lemlit_propose p');
		$this->_ci->db->join('lemlit_team_position a', 'p.propose_id=a.propose_id','left');
		$this->_ci->db->join('lemlit_skim s', 'p.skim_id = s.skim_id');
		$this->_ci->db->where('p.propose_status >=', 1);
		$this->_ci->db->where('p.propose_status <=', 2);
		$this->_ci->db->where('p.propose_id', $id);
		$this->_ci->db->where('a.team_position_level', 'Anggota');
		$this->_ci->db->where('a.team_position_status', 'Confirm');
		$this->_ci->db->group_by('p.propose_id');
		$result = $this->_ci->db->get()->result_array();
		if($result[0]['syarat_anggota']==1) {
			return true;
		} else {
			return array(false, 'Syarat jumlah keanggotaan belum terpenuhi!');
		}
	}

	public function _check_max_usulan($param=array()) {
		$rfperiod = $this->_check_periode();
		$this->_ci->db->select('SUM(IF(team_position_level="Ketua",1,0)) as jumlah_ketua, SUM(IF(team_position_level="Anggota",1,0)) as jumlah_anggota, GROUP_CONCAT(DISTINCT s.skim_id) as skim_exist');
		$this->_ci->db->from('lemlit_propose p');
		$this->_ci->db->join('lemlit_team_position a', 'p.propose_id=a.propose_id');
		$this->_ci->db->join('lemlit_skim s', 'p.skim_id = s.skim_id');
		//$this->_ci->db->where('p.propose_status >=', 1);
		//$this->_ci->db->where('p.propose_status <=', 2);
		$this->_ci->db->where("p.propose_date BETWEEN '".$rfperiod['awal']."' AND '".$rfperiod['akhir']."'");
		$this->_ci->db->where('a.lecture_id', $param['id']);
		$this->_ci->db->group_by('a.lecture_id');
		//$this->_ci->db->group_by('p.propose_id, s.skim_id');
		//$result = $this->_ci->db->get_compiled_select();
		$result = $this->_ci->db->get()->result_array();

		if(count($result) > 0) {
			$_skimexist = explode(',', $result[0]['skim_exist']);
			if(in_array($param['skim'],$_skimexist)) {
				return array(false, 'Skim tidak boleh sama dengan yang sudah ada.');die();
			}
			$total_usulan = ($result[0]['jumlah_ketua']+$result[0]['jumlah_anggota'])+1;
			if($total_usulan > $rfperiod['max_usulan']) {
				return array(false, 'Melebihi syarat maksimal jumlah usulan sebagai ketua/anggota.');die();
			} else {
				if($param['sebagai']=='ketua' && ($result[0]['jumlah_ketua']+1) > $rfperiod['max_ketua']) {
					return array(false, 'Melebihi syarat maksimal jumlah usulan sebagai ketua.');die();
				}
				if($param['sebagai']=='anggota' && ($result[0]['jumlah_anggota']+1) > $rfperiod['max_anggota']) {
					return array(false, 'Melebihi syarat maksimal jumlah usulan sebagai anggota.');die();
				}
				return true;
			}
		} else {
			return true;
		}
	}

}