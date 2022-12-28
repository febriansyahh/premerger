<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template {	
	protected $_ci;
	function __construct(){
		$this->_ci = &get_instance();
		date_default_timezone_set("Asia/Jakarta");
	}
	
	function display($template, $data = null) {
		$data['_header'] 			= $this->_ci->load->view('template/header', $data,true);
		$data['_header_propose']	= $this->_ci->load->view('template/header_propose', $data,true);
		$data['_header_reviewer']	= $this->_ci->load->view('template/header_reviewer', $data,true);
		$data['_sidebar'] 			= $this->_ci->load->view('template/sidebar', $data,true);
		$data['_sidebar_propose'] 	= $this->_ci->load->view('template/sidebar_propose', $data,true);
		$data['_sidebar_reviewer'] 	= $this->_ci->load->view('template/sidebar_reviewer', $data,true);
		$data['content'] 			= $this->_ci->load->view($template, $data,true);
				
		$this->_ci->load->view('/template.php', $data);
	}
}
/* Location: ./application/libraries/Template.php */