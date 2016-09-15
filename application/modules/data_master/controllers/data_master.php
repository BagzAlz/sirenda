<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class data_master extends CI_Controller {

	function __construct()
	{
		parent::__construct();	
		$this->load->model('m_data_master','data_master');
		$this->load->model('m_profile','profile');
		$this->load->model('m_data_master');
		$this->m_konfig->validasi_session(array("admin"));
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
	//Dropdown
	function dropdownurusan($id)
	{
		$val=$this->data_master->databidangurusan($id);
		$dataMenu=$this->db->query("SELECT * FROM m_urusan");
			  $dt="";
			  foreach($dataMenu->result() as $op)
			  {
			  $dt[$op->id]=$op->nama_urusan;
			  }
			  $array=$dt;
		echo form_dropdown("kode_urusan",$array,isset($val->kode_urusan)?($val->kode_urusan):"","class='form-control'");
	}

	//Master SKPD
	function master_skpd()
	{
		$data['konten']="master_skpd";
		$this->_template($data);
	}

	function open_skpd()
	{
			
		$list = $this->data_master->get_skpd();
		$data = array();
		$no = $_POST['start'];
		$no =$no+1;
		foreach ($list as $dataDB) {
		////
			$row = array();
			$row[] = "<span class='size'>".$no++."</span>";
			$row[] = "<span class='size'>".$dataDB->kode_satker."</a></span>";
			$row[] = "<span class='size'>".$dataDB->nama_satker."</span>";
			$row[] = "<span class='size'>".$dataDB->type_satker."</span>";
			$row[] = "<span class='size'>".$dataDB->kategori."</span>";
					
			//add html for action
			$row[] = '
			
			<a class="table-link" href="javascript:void()" title="Edit" onclick="edit('.$dataDB->id_satker.')">
			<span class="fa-stack"><i class="fa fa-square fa-stack-2x"></i><i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
			</span> </a>
			
			
			<a class="table-link danger" href="javascript:void()" title="Hapus" onclick="deleted('.$dataDB->id_satker.')">
			<span class="fa-stack"><i class="fa fa-square fa-stack-2x"></i><i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
			</span> </a>';		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->data_master->count_skpd("m_satker"),
						"recordsFiltered" =>$this->data_master->count_filtered_skpd('m_satker'),
						"data" => $data,
						);
		//output to json format
		echo json_encode($output);

	}

	function add_skpd()
	{
		$data=$this->data_master->add_skpd();
		echo json_encode($data);
	}

	function edit_skpd($id)
	{
		$data=$this->data_master->get_data_skpd($id);
		echo json_encode($data);
	}		

	function update_skpd()
	{
		$id=$this->input->post("idskpd");
		$data=$this->data_master->update_skpd($id);
		echo json_encode($data);
	}

	function delete_skpd($id)
	{
		$data=$this->data_master->delete_skpd($id);
		echo json_encode($data);
	}
	//Master SKPD

	//Master Urusan
	function master_urusan()
	{
		$data['konten']="master_urusan";
		$this->_template($data);
	}

	function open_urusan()
	{
			
		$list = $this->data_master->get_urusan();
		$data = array();
		$no = $_POST['start'];
		$no =$no+1;
		foreach ($list as $dataDB) {
		////
			$row = array();
			$row[] = "<span class='size'>".$no++."</span>";
			$row[] = "<span class='size'>".$dataDB->kode_urusan."</a></span>";
			$row[] = "<span class='size'>".$dataDB->nama_urusan."</a></span>";
					
			//add html for action
			$row[] = '
			
			<a class="table-link" href="javascript:void()" title="Edit" onclick="edit('.$dataDB->id.')">
			<span class="fa-stack"><i class="fa fa-square fa-stack-2x"></i><i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
			</span> </a>
			
			
			<a class="table-link danger" href="javascript:void()" title="Hapus" onclick="deleted('.$dataDB->id.')">
			<span class="fa-stack"><i class="fa fa-square fa-stack-2x"></i><i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
			</span> </a>';		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->data_master->count_urusan("m_urusan"),
						"recordsFiltered" =>$this->data_master->count_filtered_urusan('m_urusan'),
						"data" => $data,
						);
		//output to json format
		echo json_encode($output);

	}

	function add_urusan()
	{
		$data=$this->data_master->add_urusan();
		echo json_encode($data);
	}

	function edit_urusan($id)
	{
		$data=$this->data_master->get_data_urusan($id);
		echo json_encode($data);
	}	

	function update_urusan()
	{
		$id=$this->input->post("idurusan");
		$data=$this->data_master->update_urusan($id);
		echo json_encode($data);
	}

	function delete_urusan($id)
	{
		$data=$this->data_master->delete_urusan($id);
		echo json_encode($data);
	}
	//Master Urusan

	//Master Bidang
	public function master_bidang()
	{
		$data['urusan']=$this->data_master->list_urusan();
		$data['konten']="master_bidang";
		$this->_template($data);
	}

	function open_bidang()
	{
			
		$list = $this->data_master->get_bidang();
		$data = array();
		$no = $_POST['start'];
		$no =$no+1;
		foreach ($list as $dataDB) {
		////
			$row = array();
			$row[] = "<span class='size'>".$no++."</span>";
			$row[] = "<span class='size'>".$dataDB->nama_urusan."</a></span>";
			$row[] = "<span class='size'>".$dataDB->kode_bid_urusan."</a></span>";
			$row[] = "<span class='size'>".$dataDB->nama_bidang_urusan."</a></span>";	
			//add html for action
			$row[] = '
			
			<a class="table-link" href="javascript:void()" title="Edit" onclick="edit('.$dataDB->id_bid_urusan.')">
			<span class="fa-stack"><i class="fa fa-square fa-stack-2x"></i><i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
			</span> </a>
			
			
			<a class="table-link danger" href="javascript:void()" title="Hapus" onclick="deleted('.$dataDB->id_bid_urusan.')">
			<span class="fa-stack"><i class="fa fa-square fa-stack-2x"></i><i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
			</span> </a>';		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->data_master->count_bidang("m_bid_urusan"),
						"recordsFiltered" =>$this->data_master->count_filtered_bidang('m_bid_urusan'),
						"data" => $data,
						);
		//output to json format
		echo json_encode($output);

	}

	function add_bidang()
	{
		$data=$this->data_master->add_bidang();
		echo json_encode($data);
	}

	function edit_bidang($id)
	{
		$data=$this->data_master->get_data_bidang($id);
		echo json_encode($data);
	}	

	function update_bidang()
	{
		$id=$this->input->post("id_bid_urusan");
		$data=$this->data_master->update_bidang($id);
		echo json_encode($data);
	}

	function delete_bidang($id)
	{
		$data=$this->data_master->delete_bidang($id);
		echo json_encode($data);
	}
	//Master Bidang

	//Master Program
	public function master_program()
	{
		$data['konten']="master_program";
		$this->_template($data);
	}

	function open_program()
	{
			
		$list = $this->data_master->get_program();
		$data = array();
		$no = $_POST['start'];
		$no =$no+1;
		foreach ($list as $dataDB) {
		////
			$row = array();
			$row[] = "<span class='size'>".$no++."</span>";
			$row[] = "<span class='size'>".$dataDB->nama_urusan."</a></span>";
			$row[] = "<span class='size'>".$dataDB->nama_bidang_urusan."</a></span>";
			$row[] = "<span class='size'>".$dataDB->kode_program."</a></span>";	
			$row[] = "<span class='size'>".$dataDB->nama_program."</a></span>";	
			//add html for action
			$row[] = '
			
			<a class="table-link" href="javascript:void()" title="Edit" onclick="edit('.$dataDB->id_prog.')">
			<span class="fa-stack"><i class="fa fa-square fa-stack-2x"></i><i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
			</span> </a>
			
			
			<a class="table-link danger" href="javascript:void()" title="Hapus" onclick="deleted('.$dataDB->id_prog.')">
			<span class="fa-stack"><i class="fa fa-square fa-stack-2x"></i><i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
			</span> </a>';		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->data_master->count_program("m_program"),
						"recordsFiltered" =>$this->data_master->count_filtered_program('m_program'),
						"data" => $data,
						);
		//output to json format
		echo json_encode($output);

	}

	function add_program()
	{
		$data=$this->data_master->add_program();
		echo json_encode($data);
	}

	function edit_program($id)
	{
		$data=$this->data_master->get_data_program($id);
		echo json_encode($data);
	}	

	function update_program()
	{
		$id=$this->input->post("id_prog");
		$data=$this->data_master->update_program($id);
		echo json_encode($data);
	}

	function delete_program($id)
	{
		$data=$this->data_master->delete_program($id);
		echo json_encode($data);
	}
	//Master Program

	//Master Kegiatan
	public function master_kegiatan()
	{
		$data['konten']="master_kegiatan";
		$this->_template($data);
	}

	function open_kegiatan()
	{
			
		$list = $this->data_master->get_kegiatan();
		$data = array();
		$no = $_POST['start'];
		$no =$no+1;
		foreach ($list as $dataDB) {
		////
			$row = array();
			$row[] = "<span class='size'>".$no++."</span>";
			$row[] = "<span class='size'>".$dataDB->nama_urusan."</a></span>";
			$row[] = "<span class='size'>".$dataDB->nama_bidang_urusan."</a></span>";
			$row[] = "<span class='size'>".$dataDB->nama_program."</a></span>";	
			$row[] = "<span class='size'>".$dataDB->kode_kegiatan."</a></span>";
			$row[] = "<span class='size'>".$dataDB->nama_kegiatan."</a></span>";

			//add html for action
			$row[] = '
			
			<a class="table-link" href="javascript:void()" title="Edit" onclick="edit('.$dataDB->id_keg.')">
			<span class="fa-stack"><i class="fa fa-square fa-stack-2x"></i><i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
			</span> </a>
			
			
			<a class="table-link danger" href="javascript:void()" title="Hapus" onclick="deleted('.$dataDB->id_keg.')">
			<span class="fa-stack"><i class="fa fa-square fa-stack-2x"></i><i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
			</span> </a>';		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->data_master->count_kegiatan("m_kegiatan"),
						"recordsFiltered" =>$this->data_master->count_filtered_kegiatan('m_kegiatan'),
						"data" => $data,
						);
		//output to json format
		echo json_encode($output);

	}

	function add_kegiatan()
	{
		$data=$this->data_master->add_kegiatan();
		echo json_encode($data);
	}

	function edit_kegiatan($id)
	{
		$data=$this->data_master->get_data_kegiatan($id);
		echo json_encode($data);
	}	

	function update_kegiatan()
	{
		$id=$this->input->post("id_keg");
		$data=$this->data_master->update_kegiatan($id);
		echo json_encode($data);
	}

	function delete_kegiatan($id)
	{
		$data=$this->data_master->delete_kegiatan($id);
		echo json_encode($data);
	}
	//Master Kegiatan
	

}

