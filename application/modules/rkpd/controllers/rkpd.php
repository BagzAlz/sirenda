<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class rkpd extends CI_Controller {

	function __construct()
	{
		parent::__construct();	
		$this->load->model('m_rkpd','rkpd');
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

	function dashboard()
	{
		$this->index();
	}

	//Plaform Anggaran SKPD
	function plaform_anggaran_skpd()
	{
		$data['tahun']=$this->rkpd->list_tahun();
		$data['skpd']=$this->rkpd->list_skpd();
		$data['konten']="plaform_anggaran_skpd";
		$this->_template($data);
	}

	function open_anggaranskpd()
	{
			
		$list = $this->rkpd->get_anggaranskpd();
		$data = array();
		$no = $_POST['start'];
		$no =$no+1;
		foreach ($list as $dataDB) {
		////
			$row = array();
			$row[] = "<span class='size'>".$no++."</span>";
			$row[] = "<span class='size'>".$dataDB->n_tahun."</a></span>";
			$row[] = "<span class='size'>".$dataDB->nama_satker."</span>";
			$row[] = "<span class='size'>".$dataDB->pagu_anggaran."</span>";
					
			//add html for action
			$row[] = '
			
			<a class="table-link" href="javascript:void()" title="Edit" onclick="edit('.$dataDB->id_anggaranskpd.')">
			<span class="fa-stack"><i class="fa fa-square fa-stack-2x"></i><i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
			</span> </a>
			
			
			<a class="table-link danger" href="javascript:void()" title="Hapus" onclick="deleted('.$dataDB->id_anggaranskpd.')">
			<span class="fa-stack"><i class="fa fa-square fa-stack-2x"></i><i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
			</span> </a>';		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->rkpd->count_anggaranskpd("t_plaform_skpd"),
						"recordsFiltered" =>$this->rkpd->count_filtered_anggaranskpd('t_plaform_skpd'),
						"data" => $data,
						);
		//output to json format
		echo json_encode($output);

	}

	function add_anggaranskpd()
	{
		$data=$this->rkpd->add_anggaranskpd();
		echo json_encode($data);
	}

	function edit_anggaranskpd($id)
	{
		$data=$this->rkpd->get_data_anggaranskpd($id);
		echo json_encode($data);
	}		

	function update_anggaranskpd()
	{
		$id=$this->input->post("id_anggaranskpd");
		$data=$this->rkpd->update_anggaranskpd($id);
		echo json_encode($data);
	}

	function delete_anggaranskpd($id)
	{
		$data=$this->rkpd->delete_anggaranskpd($id);
		echo json_encode($data);
	}
	//Plaform Anggaran SKPD

	//Plaform Anggaran Musrenbang
	function plaform_anggaran_musrenbang()
	{
		$data['tahun']=$this->rkpd->list_tahun();
		$data['skpd']=$this->rkpd->list_skpd_type();
		$data['konten']="plaform_anggaran_musrenbang";
		$this->_template($data);
	}

	function open_anggaranmusrenbang()
	{
			
		$list = $this->rkpd->get_anggaranmusrenbang();
		$data = array();
		$no = $_POST['start'];
		$no =$no+1;
		foreach ($list as $dataDB) {
		////
			$row = array();
			$row[] = "<span class='size'>".$no++."</span>";
			$row[] = "<span class='size'>".$dataDB->n_tahun."</a></span>";
			$row[] = "<span class='size'>".$dataDB->nama_satker."</span>";
			$row[] = "<span class='size'>".$dataDB->pagu_anggaran."</span>";
					
			//add html for action
			$row[] = '
			
			<a class="table-link" href="javascript:void()" title="Edit" onclick="edit('.$dataDB->id_anggaranmusrenbang.')">
			<span class="fa-stack"><i class="fa fa-square fa-stack-2x"></i><i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
			</span> </a>
			
			
			<a class="table-link danger" href="javascript:void()" title="Hapus" onclick="deleted('.$dataDB->id_anggaranmusrenbang.')">
			<span class="fa-stack"><i class="fa fa-square fa-stack-2x"></i><i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
			</span> </a>';		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->rkpd->count_anggaranmusrenbang("t_plaform_musrenbang"),
						"recordsFiltered" =>$this->rkpd->count_filtered_anggaranmusrenbang('t_plaform_musrenbang'),
						"data" => $data,
						);
		//output to json format
		echo json_encode($output);

	}

	function add_anggaranmusrenbang()
	{
		$data=$this->rkpd->add_anggaranmusrenbang();
		echo json_encode($data);
	}

	function edit_anggaranmusrenbang($id)
	{
		$data=$this->rkpd->get_data_anggaranmusrenbang($id);
		echo json_encode($data);
	}		

	function update_anggaranmusrenbang()
	{
		$id=$this->input->post("id_anggaranmusrenbang");
		$data=$this->rkpd->update_anggaranmusrenbang($id);
		echo json_encode($data);
	}

	function delete_anggaranmusrenbang($id)
	{
		$data=$this->rkpd->delete_anggaranmusrenbang($id);
		echo json_encode($data);
	}
	//Plaform Anggaran Musrenbang

	//Musrenbang Kecamatan
	function musrenbang_kecamatan()
	{
		$data['tahun']=$this->rkpd->list_tahun();
		$data['skpd']=$this->rkpd->list_skpd_type();
		$data['skpd2']=$this->rkpd->list_skpd_type2();
		$data['urusan']=$this->rkpd->list_urusan();
		$data['bid_urusan']=$this->rkpd->list_bid_urusan();
		$data['program']=$this->rkpd->list_program();
		$data['kegiatan']=$this->rkpd->list_kegiatan();
		$data['konten']="musrenbang_kecamatan";
		$this->_template($data);
	}

	function open_musrenbang_kecamatan()
	{
			
		$list = $this->rkpd->get_musrenbang_kecamatan();
		$data = array();
		$no = $_POST['start'];
		$no =$no+1;
		foreach ($list as $dataDB) {
		////
			$row = array();
			$row[] = "<span class='size'>".$no++."</span>";
			$row[] = "<span class='size'>".$dataDB->kode_urusan."/".$dataDB->kode_bid_urusan."/".$dataDB->k_program."/".$dataDB->k_kegiatan."</a></span>";
			$row[] = "<span class='size'>".$dataDB->nama_program."<br>
										 ".$dataDB->nama_kegiatan."</span>";
			$row[] = "<span class='size'>Indikator Program : ".$dataDB->indikator_program."<br>
										 Indikator kegiatan : ".$dataDB->indikator_kegiatan."</span>";
			$row[] = "<span class='size'>Kec : ".$dataDB->nama_satker."<br>
										 Desa : ".$dataDB->lok_desa."<br>
										 CPCL : ".$dataDB->lok_cpcl."</span>";
			$row[] = "<span class='size'>APBD Kab : ".$dataDB->apbd_kab."<br>
										 APBD Kec : ".$dataDB->apbd_kec."<br>
										 APBN : ".$dataDB->apbn."</span>";
			//add html for action
			$row[] = '
			
			<a class="table-link" href="javascript:void()" title="Edit" onclick="edit('.$dataDB->id_musrenbang.')">
			<span class="fa-stack"><i class="fa fa-square fa-stack-2x"></i><i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
			</span> </a>
			
			
			<a class="table-link danger" href="javascript:void()" title="Hapus" onclick="deleted('.$dataDB->id_musrenbang.')">
			<span class="fa-stack"><i class="fa fa-square fa-stack-2x"></i><i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
			</span> </a>';		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->rkpd->count_musrenbang_kecamatan("t_musrenbang"),
						"recordsFiltered" =>$this->rkpd->count_filtered_musrenbang_kecamatan('t_musrenbang'),
						"data" => $data,
						);
		//output to json format
		echo json_encode($output);

	}

	function add_musrenbang_kecamatan()
	{
		$data=$this->rkpd->add_musrenbang_kecamatan();
		echo json_encode($data);
	}

	function edit_musrenbang_kecamatan($id)
	{
		$data=$this->rkpd->get_data_musrenbang_kecamatan($id);
		echo json_encode($data);
	}		

	function update_musrenbang_kecamatan()
	{
		$id=$this->input->post("id_musrenbang");
		$data=$this->rkpd->update_musrenbang_kecamatan($id);
		echo json_encode($data);
	}

	function delete_musrenbang_kecamatan($id)
	{
		$data=$this->rkpd->delete_musrenbang_kecamatan($id);
		echo json_encode($data);
	}
	//Musrenbang Kecamatan

}

