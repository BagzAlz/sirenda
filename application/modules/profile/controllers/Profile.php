<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {

	

	function __construct()
	{
		parent::__construct();	
		$this->load->model('m_profile','profile');
		$this->m_konfig->validasi_global();
	}
	
	function _template($data)
	{
	$this->load->view('template/main',$data);	
	}
	
	public function index()
	{

	$data['konten']="index";
	$data['dataProfil']=$this->profile->dataProfile($this->session->userdata("id"));
	$this->_template($data);
	}
	function update()
	{
	$data=$this->profile->update($this->session->userdata("id"));
	echo json_encode($data);
	}
	public function upload_img()
	{
	$this->profile->upload_img($this->session->userdata("id"));
	redirect("profile");
	}
	
}

