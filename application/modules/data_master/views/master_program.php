<div class="row">
  <div class="col-lg-12">
  <div class="row">
    <div class="col-lg-12">
    <ol class="breadcrumb">
      <li><a href="#">Data Master</a></li>
      <li class="active"><span>Master Program</span></li>
    </ol>
    </div>
  </div>
  <br>
<div class="row">
  <div class="col-lg-12">
  <div class="main-box clearfix" style="min-height: 820px;">
<header class="main-box-header clearfix">
<h2 class="sadow05 black b">Master Program <a href="javascript:add()" class="btn btn-primary pull-right">
<i class="fa fa-plus-circle fa-lg"></i> Tambah Program
</a></h2>
</header>
<div class="main-box-body clearfix ">

<table id='table' class="tabel black table-striped table-bordered table-hover dataTable">
        <thead>     
        <th class='thead' axis="string" width='15px'>No</th>
        <th class='thead' axis="string">Urusan</th>
        <th class='thead' axis="string" width='100px'>Bidang Urusan</th>
        <th class='thead' axis="string" width='100px'>Kode Program</th>
        <th class='thead' axis="string">Program</th>
        <th width="40px">&nbsp;</th>
      </thead>
</table>




</div>
</div>
</div>
</div>
<!--<link href="http://localhost/ajax_crud_datatables/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">-->
  <script src="<?php echo base_url('assets/js/jquery.chained.js'); ?>"></script>
  <script src="<?php echo base_url('plug/jqueryform/jquery.form.js');?>"></script>
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
            "url": "<?php echo site_url('data_master/open_program/'.$this->uri->segment(3).'')?>",
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        { 
          "targets": [ 0,-1 ], //last column
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
            url:"<?php echo base_url();?>data_master/delete_program/"+id,
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
        url : "<?php echo site_url('data_master/edit_program/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {   
            $('[name="id_prog"]').val(data.id_prog); 
            $('[name="kode_urusan"]').val(data.kode_urusan); 
            $('[name="kode_bidang_urusan"]').val(data.kode_bidang_urusan); 
            $('[name="kode_program"]').val(data.kode_program);
            $('[name="nama_program"]').val(data.nama_program);
                    
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').html('<b>Edit Program</b>'); // Set title to Bootstrap modal title
            
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
        <h4 class="modal-title"><b>Tambah Program</b></h4>
        </div>
        <div class="modal-body">
  <form  action="javascript:simpan()" id="form" class="form-horizontal" method="post">
<input type="hidden" value="" name="id_prog">
<div class="form-group">
  <label class="black col-lg-2 control-label">Urusan</label>
   <div class="col-lg-9">
      <select id="urusan" name="kode_urusan" class="form-control">
          <option value="">--Pilih--</option>
            <?php foreach ($this->m_data_master->urusan() as $row): ?>
                <option value="<?php echo $row['kode_urusan']; ?>">
                  <?php echo $row['nama_urusan']; ?>
                </option>
            <?php endforeach; ?>
      </select>   
   </div>
</div>

<div class="form-group">
  <label class="black col-lg-2 control-label">Bid Urusan </label>
   <div class="col-lg-9">
      <select id="bidang_urusan" name="kode_bidang_urusan" class="form-control" >
          <option value="">--Pilih--</option>
            <?php foreach ($this->m_data_master->bidangurusan() as $row): ?>
                  <option id="bidang_urusan"  class="<?php echo $row['kode_urusan']; ?>" value="<?php echo $row['kode_bid_urusan']; ?>" >
                        <?php echo $row['nama_bidang_urusan']; ?>
                  </option><option id="bidang_urusan"  value="<?php echo $row['kode_bid_urusan']; ?>" >
                        <?php echo $row['nama_bidang_urusan']; ?>
                  </option>
            <?php endforeach; ?>
      </select>
   </div>
</div>

<div class="form-group">
  <label class="black col-lg-2 control-label">Kode Program </label>
    <div class="col-md-9">
      <input type="text" class="form-control" value='' name="kode_program" placeholder="Kode Program">
    </div>
</div>
            
<div class="form-group">
  <label class="black col-lg-2 control-label">Program </label>
    <div class="col-md-9">
        <input type="text" class="form-control" value='' name="nama_program" placeholder="Nama Program">
    </div>
</div>

 <div class="modal-footer">
    <button type="submit" id="btnSave" class="btn btn-primary pull-right" onclick="javascript:simpan()">Save</button>
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
  $('.modal-title').html('<b>Tambah Program</b>'); 
  }
  
  
function simpan()
{
  var id=$('[name="id_prog"]').val();
  if(save_method=="add")
  {
      var link='<?php echo base_url("data_master/add_program"); ?>'; 
  }
    else
  {
      var link='<?php echo base_url("data_master/update_program"); ?>'; 
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