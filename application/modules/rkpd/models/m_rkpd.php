<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_rkpd extends ci_Model
{
	
	public function __construct() {
        parent::__construct();
		//$this->m_konfig->validasi_session("super");
     	}

    //Dropdown
  	public function list_tahun()
	{
		return $this->db->query("SELECT * FROM m_tahun")->result();
	}

	public function list_skpd()
	{
		return $this->db->query("SELECT * FROM m_satker")->result();
	}

	public function list_skpd_type()
	{
		return $this->db->query("SELECT * FROM m_satker WHERE type_satker = '2'")->result();
	}

	public function list_skpd_type2()
	{
		return $this->db->query("SELECT * FROM m_satker WHERE type_satker = '2'")->result();
	}

	public function list_urusan()
	{
		return $this->db->query("SELECT * FROM m_urusan")->result();
	}

	public function list_bid_urusan()
	{
		return $this->db->query("SELECT * FROM m_bid_urusan")->result();
	}

	public function list_program()
	{
		return $this->db->query("SELECT * FROM m_program")->result();
	}

	public function list_kegiatan()
	{
		return $this->db->query("SELECT * FROM m_kegiatan")->result();
	}

	//Plaform Anggaran SKPD
	function get_anggaranskpd()
	{
		
		$query=$this->_get_datatables_anggaranskpd();
		if($_POST['length'] != -1)
		//$this->db->limit($_POST['length'], $_POST['start']);
		$query.=" limit ".$_POST['start'].",".$_POST['length'];
		//if($keyword=$this->uri->segment(3)){ $this->db->like('TextDecoded',$keyword);};
		
		//$query = $this->db->get();
		return $this->db->query($query)->result();
	}

	private function _get_datatables_anggaranskpd()
	{
	$query="SELECT * FROM t_plaform_skpd AS tps
			LEFT JOIN m_tahun AS mt ON tps.`tahun` = mt.`id`
			LEFT JOIN m_satker AS ms ON tps.`kode_satker` = ms.`kode_satker` where 1=1";
				
	if($this->uri->segment(3))
		{
		$id=$this->uri->segment(3);
		$query.="AND id_anggaranskpd='".$id."' ";
		}
	
		if($_POST['search']['value']){
		$searchkey=$_POST['search']['value'];
			$query.=" AND (
			n_tahun LIKE '%".$searchkey."%' or 
			nama_satker LIKE '%".$searchkey."%' or
			pagu_anggaran LIKE '%".$searchkey."%' or
			id_anggaranskpd LIKE '%".$searchkey."%'
			) ";
		}

		$column = array('','n_tahun','nama_satker','pagu_anggaran','id_anggaranskpd');
		$i=0;
		foreach ($column as $item) 
		{
		$column[$i] = $item;
		}
		
		if(isset($_POST['order']))
		{
		//	$this->db->order_by($column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
			$query.=" order by ".$column[$_POST['order']['0']['column']]." ".$_POST['order']['0']['dir'] ;
		} 
		else if(isset($order))
		{
			$order = $order;
		//	$this->db->order_by(key($order), $order[key($order)]);
			$query.=" order by ".key($order)." ".$order[key($order)] ;
		}
		return $query;
	
	}

	public function count_anggaranskpd($tabel)
	{		
		
		$this->db->from($tabel);
		return $this->db->count_all_results();
	}

	function count_filtered_anggaranskpd($tabel)
	{
		$this->db->from($tabel);
		$query=$this->_get_datatables_anggaranskpd();
		return $this->db->query($query)->num_rows();
	}

	function add_anggaranskpd()
	{
		$data=array(
		"tahun"=>$this->input->post("tahun"),
		"kode_satker"=>$this->input->post("kode_satker"),
		"pagu_anggaran"=>$this->input->post("pagu_anggaran"),
	);
		return $this->db->insert("t_plaform_skpd",$data);
	}

	function get_data_anggaranskpd($id) //id_file
	{
		$this->db->from('t_plaform_skpd');
		$this->db->where('id_anggaranskpd',$id);
		$query = $this->db->get();
		return $query->row();
	}

	public function update_anggaranskpd($id)
	{
		$data=array(
		"tahun"=>$this->input->post("tahun"),
		"kode_satker"=>$this->input->post("kode_satker"),
		"pagu_anggaran"=>$this->input->post("pagu_anggaran"),
	);
		$this->db->where("id_anggaranskpd",$id);
		return $this->db->update("t_plaform_skpd",$data);
	}

	public function delete_anggaranskpd($id)
	{
		$this->db->where("id_anggaranskpd",$id);
		$data=$this->db->delete("t_plaform_skpd");
	}
	//Plaform Anggaran SKPD

	//Plaform Anggaran Musrenbang
	function get_anggaranmusrenbang()
	{
		
		$query=$this->_get_datatables_anggaranmusrenbang();
		if($_POST['length'] != -1)
		//$this->db->limit($_POST['length'], $_POST['start']);
		$query.=" limit ".$_POST['start'].",".$_POST['length'];
		//if($keyword=$this->uri->segment(3)){ $this->db->like('TextDecoded',$keyword);};
		
		//$query = $this->db->get();
		return $this->db->query($query)->result();
	}

	private function _get_datatables_anggaranmusrenbang()
	{
	$query="SELECT * FROM t_plaform_musrenbang AS tpm
			LEFT JOIN m_tahun AS mt ON tpm.`tahun` = mt.`id`
			LEFT JOIN m_satker AS ms ON tpm.`kode_satker` = ms.`kode_satker` where 1=1";
				
	if($this->uri->segment(3))
		{
		$id=$this->uri->segment(3);
		$query.="AND id_anggaranmusrenbang='".$id."' ";
		}
	
		if($_POST['search']['value']){
		$searchkey=$_POST['search']['value'];
			$query.=" AND (
			n_tahun LIKE '%".$searchkey."%' or 
			nama_satker LIKE '%".$searchkey."%' or
			pagu_anggaran LIKE '%".$searchkey."%' or
			id_anggaranmusrenbang LIKE '%".$searchkey."%'
			) ";
		}

		$column = array('','n_tahun','nama_satker','pagu_anggaran','id_anggaranmusrenbang');
		$i=0;
		foreach ($column as $item) 
		{
		$column[$i] = $item;
		}
		
		if(isset($_POST['order']))
		{
		//	$this->db->order_by($column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
			$query.=" order by ".$column[$_POST['order']['0']['column']]." ".$_POST['order']['0']['dir'] ;
		} 
		else if(isset($order))
		{
			$order = $order;
		//	$this->db->order_by(key($order), $order[key($order)]);
			$query.=" order by ".key($order)." ".$order[key($order)] ;
		}
		return $query;
	
	}

	public function count_anggaranmusrenbang($tabel)
	{		
		
		$this->db->from($tabel);
		return $this->db->count_all_results();
	}

	function count_filtered_anggaranmusrenbang($tabel)
	{
		$this->db->from($tabel);
		$query=$this->_get_datatables_anggaranmusrenbang();
		return $this->db->query($query)->num_rows();
	}

	function add_anggaranmusrenbang()
	{
		$data=array(
		"tahun"=>$this->input->post("tahun"),
		"kode_satker"=>$this->input->post("kode_satker"),
		"pagu_anggaran"=>$this->input->post("pagu_anggaran"),
	);
		return $this->db->insert("t_plaform_musrenbang",$data);
	}

	function get_data_anggaranmusrenbang($id) //id_file
	{
		$this->db->from('t_plaform_musrenbang');
		$this->db->where('id_anggaranmusrenbang',$id);
		$query = $this->db->get();
		return $query->row();
	}

	public function update_anggaranmusrenbang($id)
	{
		$data=array(
		"tahun"=>$this->input->post("tahun"),
		"kode_satker"=>$this->input->post("kode_satker"),
		"pagu_anggaran"=>$this->input->post("pagu_anggaran"),
	);
		$this->db->where("id_anggaranmusrenbang",$id);
		return $this->db->update("t_plaform_musrenbang",$data);
	}

	public function delete_anggaranmusrenbang($id)
	{
		$this->db->where("id_anggaranmusrenbang",$id);
		$data=$this->db->delete("t_plaform_musrenbang");
	}
	//Plaform Anggaran Musrenbang

	//Musrenbang Kecamatan
	function get_musrenbang_kecamatan()
	{
		
		$query=$this->_get_datatables_musrenbang_kecamatan();
		if($_POST['length'] != -1)
		//$this->db->limit($_POST['length'], $_POST['start']);
		$query.=" limit ".$_POST['start'].",".$_POST['length'];
		//if($keyword=$this->uri->segment(3)){ $this->db->like('TextDecoded',$keyword);};
		
		//$query = $this->db->get();
		return $this->db->query($query)->result();
	}

	private function _get_datatables_musrenbang_kecamatan()
	{
	$query="SELECT * FROM t_musrenbang AS tm 
			LEFT JOIN m_satker AS ms ON tm.`kecamatan` = ms.`id`
			LEFT JOIN m_program AS mp ON tm.`k_program` = mp.`id_prog`
			LEFT JOIN m_kegiatan AS mk ON tm.`k_kegiatan` = mk.`id_keg` where 1=1";
							
	if($this->uri->segment(3))
		{
		$id=$this->uri->segment(3);
		$query.="AND id_musrenbang='".$id."' ";
		}
	
		if($_POST['search']['value']){
		$searchkey=$_POST['search']['value'];
			$query.=" AND (
			n_tahun LIKE '%".$searchkey."%' or 
			nama_satker LIKE '%".$searchkey."%' or
			pagu_anggaran LIKE '%".$searchkey."%' or
			id_musrenbang LIKE '%".$searchkey."%'
			) ";
		}

		$column = array('','n_tahun','nama_satker','pagu_anggaran','id_musrenbang');
		$i=0;
		foreach ($column as $item) 
		{
		$column[$i] = $item;
		}
		
		if(isset($_POST['order']))
		{
		//	$this->db->order_by($column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
			$query.=" order by ".$column[$_POST['order']['0']['column']]." ".$_POST['order']['0']['dir'] ;
		} 
		else if(isset($order))
		{
			$order = $order;
		//	$this->db->order_by(key($order), $order[key($order)]);
			$query.=" order by ".key($order)." ".$order[key($order)] ;
		}
		return $query;
	
	}

	public function count_musrenbang_kecamatan($tabel)
	{		
		
		$this->db->from($tabel);
		return $this->db->count_all_results();
	}

	function count_filtered_musrenbang_kecamatan($tabel)
	{
		$this->db->from($tabel);
		$query=$this->_get_datatables_musrenbang_kecamatan();
		return $this->db->query($query)->num_rows();
	}

	function add_musrenbang_kecamatan()
	{
		$data=array(
		"tahun"=>$this->input->post("tahun"),
		"kecamatan"=>$this->input->post("kecamatan"),
		"k_urusan"=>$this->input->post("k_urusan"),
		"k_bid_urusan"=>$this->input->post("k_bid_urusan"),
		"k_program"=>$this->input->post("k_program"),
		"indikator_program"=>$this->input->post("indikator_program"),
		"k_kegiatan"=>$this->input->post("k_kegiatan"),
		"indikator_kegiatan"=>$this->input->post("indikator_kegiatan"),
		"volume"=>$this->input->post("volume"),
		"lok_kecamatan"=>$this->input->post("lok_kecamatan"),
		"lok_desa"=>$this->input->post("lok_desa"),
		"lok_cpcl"=>$this->input->post("lok_cpcl"),
		"apbd_kab"=>$this->input->post("apbd_kab"),
		"apbd_kec"=>$this->input->post("apbd_kec"),
		"apbn"=>$this->input->post("apbn"),
	);
		return $this->db->insert("t_musrenbang",$data);
	}

	function get_data_musrenbang_kecamatan($id) //id_file
	{
		$this->db->from('t_musrenbang');
		$this->db->where('id_musrenbang',$id);
		$query = $this->db->get();
		return $query->row();
	}

	public function update_musrenbang_kecamatan($id)
	{
		$data=array(
		"tahun"=>$this->input->post("tahun"),
		"kode_satker"=>$this->input->post("kode_satker"),
		"pagu_anggaran"=>$this->input->post("pagu_anggaran"),
	);
		$this->db->where("id_musrenbang",$id);
		return $this->db->update("t_musrenbang",$data);
	}

	public function delete_musrenbang_kecamatan($id)
	{
		$this->db->where("id_musrenbang",$id);
		$data=$this->db->delete("t_musrenbang");
	}
	//Musrenbang Kecamatan
}

?>