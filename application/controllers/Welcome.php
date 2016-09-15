<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		//$this->load->view('blog/index');
	redirect("login");
	}
	public function join()
	{
		$this->load->view('blog/join');
	}
	public function signup()
	{
		$this->load->view('blog/signup');
	}
	function price()
	{
	$this->load->view('blog/price');
	}function guide()
	{
	$this->load->view('blog/blog-post');
	}
	public function contact()
	{
		$this->load->view('blog/contact');
	}
	public function client()
	{
		$this->load->view('blog/client');
	}
	public function agent()
	{
		$this->load->view('blog/agent');
	}
	private function _cekIp($ip)
	{
	$this->db->where("ip",$ip);
	return $this->db->get("admin")->num_rows();
	}
	private function _cekHp($hp)
	{
	$hp=str_replace("+62","0",$hp);
	$this->db->where("telp",$hp);
	return $this->db->get("admin")->num_rows();
	}
	private function _cekEmail($email)
	{
	$this->db->where("email",$email);
	return $this->db->get("admin")->num_rows();
	}
	private function _save()
	{
	$this->load->model("M_profile","profile");
	$this->profile->add_dataUserReg();
	}
	function register()
	{
	$cekIp=$this->_cekIp($_SERVER['REMOTE_ADDR']);
	$cekHp=$this->_cekHp($this->input->post("telp"));
	$cekEmail=$this->_cekEmail($this->input->post("email"));
		if($cekIp>0){ echo json_encode("ip"); }else{
			if($cekHp>0){	echo json_encode("hp"); }else{
				if($cekEmail>0){	echo json_encode("email"); }else{
					$save=$this->_save();
					echo "true";
				}
			}
		}
	}
}
