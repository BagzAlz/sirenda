<div class="row">
  <div class="col-lg-12">
  <div class="row">
    <div class="col-lg-12">
    <ol class="breadcrumb">
      <li><a href="#">RKPD</a></li>
      <li class="active"><span>Musrenbang Kecamatan</span></li>
    </ol>
    </div>
  </div>
  <br>
<div class="row">
  <div class="col-lg-12">
  <div class="main-box clearfix" style="min-height: 820px;">
<header class="main-box-header clearfix">
<h2 class="sadow05 black b">Musrenbang Kecamatan<a href="javascript:add()" class="btn btn-primary pull-right">
<i class="fa fa-plus-circle fa-lg"></i> Tambah Musrenbang Kecamatan
</a></h2>
</header>
<div class="main-box-body clearfix ">

<table id='table' class="tabel black table-striped table-bordered table-hover dataTable">
        <thead>     
        <th class='thead' axis="string" width='15px'>No</th>
        <th class='thead' axis="string">Kode</th>
        <th class='thead' axis="string">Program / Kegiatan</th>
        <th class='thead' axis="string">Indikator</th>     
        <th class='thead' axis="string">Lokasi</th> 
        <th class='thead' axis="string">Rincian</th>  
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
            "url": "<?php echo site_url('rkpd/open_musrenbang_kecamatan/'.$this->uri->segment(3).'')?>",
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
            url:"<?php echo base_url();?>rkpd/delete_musrenbang_kecamatan/"+id,
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
        url : "<?php echo site_url('rkpd/edit_musrenbang_kecamatan/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        { 
            $('[name="id_musrenbang"]').val(data.id_musrenbang); 
            $('[name="tahun"]').val(data.tahun);
            $('[name="kode_satker"]').val(data.kode_satker);
            $('[name="pagu_anggaran"]').val(data.pagu_anggaran);
                    
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').html('<b>Edit Plaform Anggaran SKPD</b>'); // Set title to Bootstrap modal title
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
        <h4 class="modal-title"><b>Tambah Plaform Anggaran SKPD</b></h4>
        </div>
        <div class="modal-body">
  <form  action="javascript:simpan()" id="form" class="form-horizontal" method="post">
  <input type="hidden" value="" name="id_musrenbang"/> 
<div class="form-group">
    <label class="control-label col-md-2">Tahun</label>
          <div class="col-md-3">
            <select name="tahun" class="form-control">
                <?php 
                    foreach ($tahun as $list) 
                    {           
                      echo "<option value='$list->id'>$list->n_tahun</option>";
                    }
                ?>
            </select>
          </div>
</div>

<div class="form-group">
    <label class="control-label col-md-2">Kecamatan</label>
          <div class="col-md-9">
            <select name="kecamatan" class="form-control">
                <?php 
                    foreach ($skpd as $list) 
                    {           
                      echo "<option value='$list->kode_satker'>$list->nama_satker</option>";
                    }
                ?>
            </select>
          </div>
</div>

<div class="form-group">
    <label class="control-label col-md-2">Urusan</label>
          <div class="col-md-3">
            <select name="k_urusan" class="form-control">
                <?php 
                    foreach ($urusan as $list) 
                    {           
                      echo "<option value='$list->kode_urusan'>$list->nama_urusan</option>";
                    }
                ?>
            </select>
          </div>
</div>

<div class="form-group">
    <label class="control-label col-md-2">Bid Urusan</label>
          <div class="col-md-9">
            <select name="k_bid_urusan" class="form-control">
                <?php 
                    foreach ($bid_urusan as $list) 
                    {           
                      echo "<option value='$list->kode_bid_urusan'>$list->nama_bidang_urusan</option>";
                    }
                ?>
            </select>
          </div>
</div>

<div class="form-group">
    <label class="control-label col-md-2">Program</label>
          <div class="col-md-9">
            <select name="k_program" class="form-control">
                <?php 
                    foreach ($program as $list) 
                    {           
                      echo "<option value='$list->kode_program'>$list->nama_program</option>";
                    }
                ?>
            </select>
          </div>
</div>

<div class="form-group">
  <label class="black col-lg-2 control-label">Indikator Program</label>
   <div class="col-lg-9">
    <textarea id="exampleTextarea" class="form-control"  value='' name="indikator_program" placeholder="Indikator Program"></textarea>
   </div>
</div>

<div class="form-group">
    <label class="control-label col-md-2">Kegiatan</label>
          <div class="col-md-9">
            <select name="k_kegiatan" class="form-control">
                <?php 
                    foreach ($kegiatan as $list) 
                    {           
                      echo "<option value='$list->kode_kegiatan'>$list->nama_kegiatan</option>";
                    }
                ?>
            </select>
          </div>
</div>

<div class="form-group">
  <label class="black col-lg-2 control-label">Indikator Kegiatan</label>
   <div class="col-lg-9">
    <textarea id="exampleTextarea" class="form-control"  value='' name="indikator_kegiatan" placeholder="Indikator Kegiatan"></textarea>
   </div>
</div>

<div class="form-group">
  <label class="black col-lg-2 control-label">Volume</label>
   <div class="col-lg-5">
    <input required type="text" class="form-control"  value='' name="volume" placeholder="Volume">
   </div>
</div>

<h3>
<span>Lokasi</span>
</h3>
<div class="form-group">
  <label class="black col-lg-2 control-label">Kecamatan</label>
   <div class="col-lg-9">
      <select name="lok_kecamatan" class="form-control">
        <?php 
          foreach ($skpd as $list) 
            {           
              echo "<option value='$list->kode_satker'>$list->nama_satker</option>";
            }
        ?>
      </select>
   </div>
</div>

<div class="form-group">
  <label class="black col-lg-2 control-label">Desa</label>
   <div class="col-lg-9">
    <input type="text" class="form-control"  value='' name="lok_desa" placeholder="Desa">
   </div>
</div>

<div class="form-group">
  <label class="black col-lg-2 control-label">CPCL</label>
   <div class="col-lg-9">
    <input type="text" class="form-control"  value='' name="lok_cpcl" placeholder="CPCL">
   </div>
</div>

<h3>
<span>Rincian</span>
</h3>
<div class="form-group">
  <label class="black col-lg-2 control-label">APBD Kabupaten</label>
   <div class="col-lg-9">
    <input type="text" class="form-control"  value='' name="apbd_kab" placeholder="APBD Kabupaten">
   </div>
</div>

<div class="form-group">
  <label class="black col-lg-2 control-label">APBD Kecamatan</label>
   <div class="col-lg-9">
    <input type="text" class="form-control"  value='' name="apbd_kec" placeholder="APBD Kecamatan">
   </div>
</div>

<div class="form-group">
  <label class="black col-lg-2 control-label">APBN</label>
   <div class="col-lg-9">
    <input type="text" class="form-control"  value='' name="apbn" placeholder="APBN">
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
  $('.modal-title').html('<b>Tambah Musrenbang Kecamatan</b>'); 
  }
  
  
  
function simpan()
{
  var id=$('[name="id_musrenbang"]').val();
  if(save_method=="add")
  {
      var link='<?php echo base_url("rkpd/add_musrenbang_kecamatan"); ?>'; 
  }
    else
  {
      var link='<?php echo base_url("rkpd/update_musrenbang_kecamatan"); ?>'; 
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