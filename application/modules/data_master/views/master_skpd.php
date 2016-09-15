<div class="row">
  <div class="col-lg-12">
  <div class="row">
    <div class="col-lg-12">
    <ol class="breadcrumb">
      <li><a href="#">Data Satker</a></li>
      <li class="active"><span>Master Satker</span></li>
    </ol>
    </div>
  </div>
  <br>
<div class="row">
  <div class="col-lg-12">
  <div class="main-box clearfix" style="min-height: 820px;">
<header class="main-box-header clearfix">
<h2 class="sadow05 black b">Master Satker <a href="javascript:add()" class="btn btn-primary pull-right">
<i class="fa fa-plus-circle fa-lg"></i> Tambah Satker
</a></h2>
</header>
<div class="main-box-body clearfix ">

<table id='table' class="tabel black table-striped table-bordered table-hover dataTable">
		  	<thead>			
				<th class='thead' axis="string" width='15px'>No</th>
        <th class='thead' axis="string" width='80px'>Kode Satker</th>
				<th class='thead' axis="string">Satker</th>
        <th class='thead' axis="string" width='80px'>Type Satker</th>	
        <th class='thead' axis="string" width='90px'>Kategori</th>			
				<th>&nbsp;</th>
			</thead>
</table>

</div>
</div>
</div>
</div>
<!--<link href="http://localhost/ajax_crud_datatables/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">-->
  <link href="<?php echo base_url();?>/plug/datatables/css/dataTables.bootstrap.css" rel="stylesheet">
  <script src="<?php echo base_url()?>plug/datatables/js/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url()?>plug/datatables/js/dataTables.bootstrap.js"></script>			

  <script type="text/javascript">
      var save_method; //for save method string
    var table;
    $(document).ready(function() {
      table = $('#table').DataTable({ 
        
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('data_master/open_skpd/'.$this->uri->segment(3).'')?>",
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        { 
          "targets": [ -1 ], //last column
          "orderable": false, //set not orderable
        },
        ],

      });
    });

    function reload_table()
    {
      table.ajax.reload(null,false); //reload datatable ajax 
    }


    function deleted(id)
    {
      if(confirm('Are you sure delete this data?'))
      {
        // ajax delete data to database
          $.ajax({
            url:"<?php echo base_url();?>data_master/delete_skpd/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
               //if success reload ajax table
               $('#modal_form').modal('hide');
               reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
         
      }
    }
	

	function edit(id)
    {
     var save_method = 'update';
      $('#form')[0].reset(); // reset form on modals
	  //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo base_url();?>data_master/edit_skpd/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {	
            $("#idskpd").val(id);
            $('[name="kode_satker"]').val(data.kode_satker);
            $('[name="nama_satker"]').val(data.nama_satker);
            $('[name="type_satker"]').val(data.type_satker);
            $('[name="kategori"]').val(data.kategori);
           					
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').html('<b>Edit Satker</b>'); // Set title to Bootstrap modal title
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
    }

  </script>		
  
  <!-- Bootstrap modal -->
  <div class="modal fade" id="modal_form" role="dialog">
		<div class="modal-dialog">
               <div class="md-content">
				<div class="modal-header">
				<button data-dismiss="modal" class="md-close close">&times;</button>
				<h4 class="modal-title"><b>Tambah Satker</b></h4>
				</div>
				<div class="modal-body">
	<form  action="javascript:simpan()" id="form" class="form-horizontal" method="post">
<input type="hidden" id="idskpd" name="idskpd">
<div class="form-group">
  <label class="black col-lg-2 control-label">Kode</label>
   <div class="col-lg-9">
    <input type="text" class="form-control" value='' name="kode_satker" placeholder="Kode Satker">
   </div>
</div>

<div class="form-group">
  <label class="black col-lg-2 control-label">Satker</label>
   <div class="col-lg-9">
    <input type="text" class="form-control"  value='' name="nama_satker" placeholder="Nama Satker">
   </div>
</div>

<div class="form-group">
  <label class="black col-lg-2 control-label">Type</label>
   <div class="col-lg-9">
    <input type="text" class="form-control"  value='' name="type_satker" placeholder="Type Satker">
   </div>
</div>

<div class="form-group">
  <label class="black col-lg-2 control-label">Kategori</label>
   <div class="col-lg-9">
    <input type="text" class="form-control"  value='' name="kategori" placeholder="Kategori Satker">
   </div>
</div>

<div class="modal-footer">
    <button type="submit" id="btnSave" class="btn btn-primary pull-right" onclick="javascript:simpan()">Save</button>
			<span id="msg" style='padding-right:15px;margin-top:20px'></span>
    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cancel</button>
</div>
       
</form>
				</div>
				</div>
						
				</div>
         </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
  <!-- End Bootstrap modal -->
		

<script src="<?php echo base_url('plug/jqueryform/jquery.form.js');?>"></script>
<script type="text/javascript">
var save_method="";
function add()
	{
	save_method="add";
	 $('#form')[0].reset(); // reset form on modal
	$("#msg").html("");
	 $('#modal_form').modal('show'); 
  $('.modal-title').html('<b>Tambah Satker</b>'); 
	}
	
	
	
function simpan()
{
  var id=$('[name="idskpd"]').val();
  if(save_method=="add")
  {
      var link='<?php echo base_url("data_master/add_skpd"); ?>'; 
  }
    else
  {
      var link='<?php echo base_url("data_master/update_skpd"); ?>'; 
  }
  
  
    $('#form').ajaxForm({
    url:link,
    data: $('#form').serialize(),
    dataType: "JSON",
    success: function(data)
    {
      //if success close modal and reload ajax table
      $('#modal_form').modal('hide');
      reload_table();
    },
      error: function (jqXHR, textStatus, errorThrown)
    {
      alert('Error adding / update data');
    } 
    });         
};
</script> 