<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_data_master extends ci_Model
{
	
	public function __construct() {
        parent::__construct();
		//$this->m_konfig->validasi_session("super");
     	}

    //Dropdown
	function dataurusan($id)
	{
		return $this->db->get_where("m_urusan",array("kode_urusan"=>$id))->row();
	}

	function databidangurusan($id)
	{
		return $this->db->get_where("m_bid_urusan",array("kode_bidang_urusan"=>$id))->row();
	}

	public function urusan()
	{
	    $dw_a = $this->db->get("m_urusan")->result_array();
	    return $dw_a;
	}
  
  	public function bidangurusan()
  	{
      	$dw_b = $this->db->get("m_bid_urusan ")->result_array();
      	return $dw_b;
  	}

  	public function program()
  	{
      	$dw_c = $this->db->get("m_program")->result_array();
      	return $dw_c;
  	}

  	public function list_urusan()
	{
		return $this->db->query("SELECT * FROM m_urusan")->result();
	}
	//Master SKPD
	function get_skpd()
	{
		
		$query=$this->_get_datatables_skpd();
		if($_POST['length'] != -1)
		//$this->db->limit($_POST['length'], $_POST['start']);
		$query.=" limit ".$_POST['start'].",".$_POST['length'];
		//if($keyword=$this->uri->segment(3)){ $this->db->like('TextDecoded',$keyword);};
		
		//$query = $this->db->get();
		return $this->db->query($query)->result();
	}

	private function _get_datatables_skpd()
	{
	$query="SELECT * FROM m_satker where 1=1";
	
	if($this->uri->segment(3))
		{
		$id=$this->uri->segment(3);
		$query.="AND id_satker='".$id."' ";
		}
	
		if($_POST['search']['value']){
		$searchkey=$_POST['search']['value'];
			$query.=" AND (
			kode_satker LIKE '%".$searchkey."%' or
			nama_satker LIKE '%".$searchkey."%' or 
			type_satker LIKE '%".$searchkey."%' or
			kategori LIKE '%".$searchkey."%' or
			id_satker LIKE '%".$searchkey."%'

			) ";
		}

		$column = array('','kode_satker','nama_satker','type_satker','kategori','id_satker');
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

	public function count_skpd($tabel)
	{		
		
		$this->db->from($tabel);
		return $this->db->count_all_results();
	}

	function count_filtered_skpd($tabel)
	{
		$this->db->from($tabel);
		$query=$this->_get_datatables_skpd();
		return $this->db->query($query)->num_rows();
	}

	function add_skpd()
	{
		$data=array(
		"kode_satker"=>$this->input->post("kode_satker"),
		"nama_satker"=>$this->input->post("nama_satker"),
		"type_satker"=>$this->input->post("type_satker"),
		"kategori"=>$this->input->post("kategori"),
	);
		return $this->db->insert("m_satker",$data);
	}

	function get_data_skpd($id) //id_file
	{
		$this->db->where("id_satker",$id);
		return $this->db->get("m_satker")->row();
	}
	public function update_skpd($id)
	{
		$data=array(
		"kode_satker"=>$this->input->post("kode_satker"),
		"nama_satker"=>$this->input->post("nama_satker"),
		"type_satker"=>$this->input->post("type_satker"),
		"kategori"=>$this->input->post("kategori"),
	);
		$this->db->where("id_satker",$id);
		return $this->db->update("m_satker",$data);
	}

	public function delete_skpd($id)
	{
		$this->db->where("id_satker",$id);
		$data=$this->db->delete("m_satker");
	}
	//Master SKPD

	//Master Urusan
	function get_urusan()
	{
		
		$query=$this->_get_datatables_urusan();
		if($_POST['length'] != -1)
		//$this->db->limit($_POST['length'], $_POST['start']);
		$query.=" limit ".$_POST['start'].",".$_POST['length'];
		//if($keyword=$this->uri->segment(3)){ $this->db->like('TextDecoded',$keyword);};
		
		//$query = $this->db->get();
		return $this->db->query($query)->result();
	}

	private function _get_datatables_urusan()
	{
	$query="SELECT * FROM m_urusan WHERE 1=1 ";
	
	if($this->uri->segment(3))
		{
		$id=$this->uri->segment(3);
		$query.="AND id='".$id."' ";
		}
	
		if($_POST['search']['value']){
		$searchkey=$_POST['search']['value'];
			$query.=" AND (
			kode_urusan LIKE '%".$searchkey."%' or
			nama_urusan LIKE '%".$searchkey."%' or 
			id LIKE '%".$searchkey."%' 
			) ";
		}

		$column = array('','kode_urusan','nama_urusan','id');
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
	
	public function count_urusan($tabel)
	{		
		$this->db->from($tabel);
		return $this->db->count_all_results();
	}

	function count_filtered_urusan($tabel)
	{
		$this->db->from($tabel);
		$query=$this->_get_datatables_urusan();
		return $this->db->query($query)->num_rows();
	}

	function add_urusan()
	{
		$data=array(
		"kode_urusan"=>$this->input->post("kode_urusan"),
		"nama_urusan"=>$this->input->post("nama_urusan"),
	);
	return $this->db->insert("m_urusan",$data);
	}

	function get_data_urusan($id) //id_file
	{
		$this->db->where("id",$id);
		return $this->db->get("m_urusan")->row();
	}

	public function update_urusan($id)
	{
		$data=array(
		"kode_urusan"=>$this->input->post("kode_urusan"),
		"nama_urusan"=>$this->input->post("nama_urusan"),
	);
		$this->db->where("id",$id);
		return $this->db->update("m_urusan",$data);
	}

	public function delete_urusan($id)
	{
		$this->db->where("id",$id);
		$data=$this->db->delete("m_urusan");
	}
	//Master Urusan

	//Master Bidang
	function get_bidang()
	{
		$query=$this->_get_datatables_bidang();
		if($_POST['length'] != -1)
		//$this->db->limit($_POST['length'], $_POST['start']);
		$query.=" limit ".$_POST['start'].",".$_POST['length'];
		//if($keyword=$this->uri->segment(3)){ $this->db->like('TextDecoded',$keyword);};
		
		//$query = $this->db->get();
		return $this->db->query($query)->result();
	}

	private function _get_datatables_bidang()

	{
		$query="SELECT * FROM m_bid_urusan AS mbu 
				LEFT JOIN m_urusan AS mu ON mbu.`kode_urusan` = mu.`kode_urusan` WHERE 1=1";
	
	if($this->uri->segment(3))
		{
		$id=$this->uri->segment(3);
		$query.="AND id_bid_urusan='".$id."' ";
		}
	
		if($_POST['search']['value']){
		$searchkey=$_POST['search']['value'];
			$query.=" AND (
			nama_urusan LIKE '%".$searchkey."%' or 
			kode_bid_urusan LIKE '%".$searchkey."%' or 
			nama_bidang_urusan LIKE '%".$searchkey."%' or
			id_bid_urusan LIKE '%".$searchkey."%' 
			) ";
		}

		$column = array('','nama_urusan','kode_bid_urusan','nama_bidang_urusan','id_bid_urusan');
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

	public function count_bidang($tabel)
	{		
		$this->db->from($tabel);
		return $this->db->count_all_results();
	}

	function count_filtered_bidang($tabel)
	{
		$this->db->from($tabel);
		$query=$this->_get_datatables_bidang();
		return $this->db->query($query)->num_rows();
	}

	function add_bidang()
	{
		$data=array(
		"kode_urusan"=>$this->input->post("kode_urusan"),
		"kode_bid_urusan"=>$this->input->post("kode_bid_urusan"),
		"nama_bidang_urusan"=>$this->input->post("nama_bidang_urusan"),
	);
	return $this->db->insert("m_bid_urusan",$data);
	}

	function get_data_bidang($id) //id_file
	{
		$this->db->from('m_bid_urusan');
		$this->db->where('id_bid_urusan',$id);
		$query = $this->db->get();
		return $query->row();
	}

	public function update_bidang($id)
	{
		$data=array(
		"kode_urusan"=>$this->input->post("kode_urusan"),
		"kode_bid_urusan"=>$this->input->post("kode_bid_urusan"),
		"nama_bidang_urusan"=>$this->input->post("nama_bidang_urusan"),
	);
		$this->db->where("id_bid_urusan",$id);
		return $this->db->update("m_bid_urusan",$data);
	}

	public function delete_bidang($id)
	{
		$this->db->where("id_bid_urusan",$id);
		$data=$this->db->delete("m_bid_urusan");
	}
	//Master Bidang

	//Master Program
	function get_program()
	{
		$query=$this->_get_datatables_program();
		if($_POST['length'] != -1)
		//$this->db->limit($_POST['length'], $_POST['start']);
		$query.=" limit ".$_POST['start'].",".$_POST['length'];
		//if($keyword=$this->uri->segment(3)){ $this->db->like('TextDecoded',$keyword);};
		
		//$query = $this->db->get();
		return $this->db->query($query)->result();
	}

	private function _get_datatables_program()

	{
		$query="SELECT m_program.`kode_program`,`id_prog`,`nama_program`,m_urusan.`kode_urusan`,`nama_urusan`,m_bid_urusan.`kode_bid_urusan`,`nama_bidang_urusan`,`nama_urusan`
				FROM m_program
				JOIN m_urusan on m_urusan.`kode_urusan`=m_program.`kode_urusan`
				JOIN m_bid_urusan ON m_program.`kode_bidang_urusan`=m_bid_urusan.`kode_bid_urusan` 
				GROUP BY m_program.`id_prog`";
	
	if($this->uri->segment(3))
		{
		$id=$this->uri->segment(3);
		$query.="AND id_prog='".$id."' ";
		}
	
		if($_POST['search']['value']){
		$searchkey=$_POST['search']['value'];
			$query.=" AND (
			nama_urusan LIKE '%".$searchkey."%' or 
			nama_bidang_urusan LIKE '%".$searchkey."%' or 
			kode_program LIKE '%".$searchkey."%' or
			nama_program LIKE '%".$searchkey."%' or
			id_prog LIKE '%".$searchkey."%' or
			) ";
		}

		$column = array('','nama_urusan','nama_bidang_urusan','kode_program','nama_program','id_prog');
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

	public function count_program($tabel)
	{		
		$this->db->from($tabel);
		return $this->db->count_all_results();
	}

	function count_filtered_program($tabel)
	{
		$this->db->from($tabel);
		$query=$this->_get_datatables_program();
		return $this->db->query($query)->num_rows();
	}

	function add_program()
	{
		$data=array(
		"kode_urusan"=>$this->input->post("kode_urusan"),
		"kode_bidang_urusan"=>$this->input->post("kode_bidang_urusan"),
		"kode_program"=>$this->input->post("kode_program"),
		"nama_program"=>$this->input->post("nama_program"),
	);
	return $this->db->insert("m_program",$data);
	}

	function get_data_program($id) //id_file
	{
		$this->db->from('m_program');
		$this->db->where('id_prog',$id);
		$query = $this->db->get();
		return $query->row();
	}

	public function update_program($id)
	{
		$data=array(
		"kode_urusan"=>$this->input->post("kode_urusan"),
		"kode_bidang_urusan"=>$this->input->post("kode_bidang_urusan"),
		"kode_program"=>$this->input->post("kode_program"),
		"nama_program"=>$this->input->post("nama_program"),
	);
		$this->db->where("id_prog",$id);
		return $this->db->update("m_program",$data);
	}

	public function delete_program($id)
	{
		$this->db->where("id_prog",$id);
		$data=$this->db->delete("m_program");
	}
	//Master Program
	
	//Master Kegiatan
	function get_kegiatan()
	{
		$query=$this->_get_datatables_kegiatan();
		if($_POST['length'] != -1)
		//$this->db->limit($_POST['length'], $_POST['start']);
		$query.=" limit ".$_POST['start'].",".$_POST['length'];
		//if($keyword=$this->uri->segment(3)){ $this->db->like('TextDecoded',$keyword);};
		
		//$query = $this->db->get();
		return $this->db->query($query)->result();
	}

	private function _get_datatables_kegiatan()

	{
		$query="SELECT m_kegiatan.`kode_kegiatan`,`nama_kegiatan`,`id_keg`,m_bid_urusan.`kode_bid_urusan`,
		`nama_bidang_urusan`, m_urusan.`kode_urusan`,`nama_urusan`, m_program.`kode_program`,`nama_program`
				FROM m_kegiatan
				JOIN m_urusan ON m_urusan.`kode_urusan`=m_kegiatan.`kode_urusan`
				JOIN m_bid_urusan ON m_kegiatan.`kode_bid_urusan`=m_bid_urusan.`kode_bid_urusan`
				JOIN m_program ON m_kegiatan.`kode_bid_urusan`=m_program.`kode_bidang_urusan`
				GROUP BY m_kegiatan.`id_keg`";
	
	if($this->uri->segment(3))
		{
		$id=$this->uri->segment(3);
		$query.="AND id_keg='".$id."' ";
		}
	
		if($_POST['search']['value']){
		$searchkey=$_POST['search']['value'];
			$query.=" AND (
			nama_urusan LIKE '%".$searchkey."%' or 
			nama_bidang_urusan LIKE '%".$searchkey."%' or 
			nama_program LIKE '%".$searchkey."%' or
			kode_kegiatan LIKE '%".$searchkey."%' or
			nama_kegiatan LIKE '%".$searchkey."%' or
			id_keg LIKE '%".$searchkey."%' 
			) ";
		}

		$column = array('','nama_urusan','nama_bidang_urusan','nama_program','kode_kegiatan','nama_kegiatan','id_keg');
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

	public function count_kegiatan($tabel)
	{		
		$this->db->from($tabel);
		return $this->db->count_all_results();
	}

	function count_filtered_kegiatan($tabel)
	{
		$this->db->from($tabel);
		$query=$this->_get_datatables_kegiatan();
		return $this->db->query($query)->num_rows();
	}

	function add_kegiatan()
	{
		$data=array(
		"kode_urusan"=>$this->input->post("kode_urusan"),
		"kode_bid_urusan"=>$this->input->post("kode_bid_urusan"),
		"kode_program"=>$this->input->post("kode_program"),
		"kode_kegiatan"=>$this->input->post("kode_kegiatan"),
		"nama_kegiatan"=>$this->input->post("nama_kegiatan"),
	);
	return $this->db->insert("m_kegiatan",$data);
	}

	function get_data_kegiatan($id) //id_file
	{
		$this->db->from('m_kegiatan');
		$this->db->where('id_keg',$id);
		$query = $this->db->get();
		return $query->row();
	}

	public function update_kegiatan($id)
	{
		$data=array(
		"kode_urusan"=>$this->input->post("kode_urusan"),
		"kode_bid_urusan"=>$this->input->post("kode_bid_urusan"),
		"kode_program"=>$this->input->post("kode_program"),
		"kode_kegiatan"=>$this->input->post("kode_kegiatan"),
		"nama_kegiatan"=>$this->input->post("nama_kegiatan"),
	);
		$this->db->where("id_keg",$id);
		return $this->db->update("m_kegiatan",$data);
	}

	public function delete_kegiatan($id)
	{
		$this->db->where("id_keg",$id);
		$data=$this->db->delete("m_kegiatan");
	}
	//Master Kegiatan


}

?>