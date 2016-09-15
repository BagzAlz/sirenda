<?php

class M_umum extends CI_Model  {
    
		
	function __construct()
    {
        parent::__construct();
		
    }
	///////////////////Golongan validasi
	function noInvoice($id)
	{
	$this->db->where("id_invoice",$id);
	$data=$this->db->get("data_invoice")->row();
	return $data->nomor_invoice;
	}
	
	
	function ketPeserta($id)
	{
	$this->db->where("kode_registrasi",$id);
	$dt=$this->db->get("data_peserta")->row();
	return  $dt->ket;
	}
	function totalUser()
	{
	$this->db->where("level","3");
	return $this->db->get("admin")->num_rows();
	}function totalEvent()
	{
	$this->db->where("validasi","1");
	return $this->db->get("data_event")->num_rows();
	}
	function totalTransfer()
	{
	$this->db->where("status","yes");
	$this->db->select("SUM(nominal) as nominal");
	$data=$this->db->get("data_payment")->row();
	return isset($data->nominal)?($data->nominal):"0";
	}function totalPeserta()
	{
	return $this->db->get("data_peserta")->num_rows();
	}function totalInvoice()
	{
	return $this->db->get("data_invoice")->num_rows();
	}
	function totalSaldo()
	{
	$this->db->select("SUM(saldo) as nominal");
	$data=$this->db->get("admin")->row();
	return isset($data->nominal)?($data->nominal):"0";
	}
	function jmlEvent()
	{
	$id=$this->session->userdata("id");
	return $this->db->get_where("data_event",array("id_admin",$id))->num_rows();
	}
	function jmlInvoice()
	{
	$ids=$this->session->userdata("id");
	$this->db->where("id_admin",$ids);
	$this->db->where("status","belum");
	return $this->db->get("data_invoice")->num_rows();
	}
	function enc($id)
	{
	return $this->encryption->encrypt($id);
	}
	function desc($id)
	{
	return $this->encryption->decrypt($id);
	}
	function dataEvent($link,$id)
	{
	$this->db->where("link",$link);
	$this->db->where("id_admin",$id);
	return $this->db->get("data_event")->row();
	}
	
	function namaEvent($id)
	{
	$ids=$this->session->userdata("id");
	$this->db->where("id_event",$id);
	$this->db->where("id_admin",$ids);
	$data=$this->db->get("data_event")->row();
	return $data->title;
	}
}