<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class dashboard extends CI_Controller {

	function __construct()
	{
		parent::__construct();	
		$this->load->model('m_dashboard','dashboard');
		$this->m_konfig->validasi_session(array("admin","kecamatan"));
	}
	
	function _template($data)
	{
		$this->load->view('template/main',$data);	
	}
	
	public function index()
	{
		$data['konten']="dashboard";
		$this->_template($data);
	}

}

