<?php
$dbform=$this->db->query("SELECT main_level.`nama` AS level FROM admin,main_level WHERE admin.`level`=main_level.`id_level` AND admin.`id_admin`='".$this->session->userdata("id")."'")->row();
$uri=$this->uri->segment(1);
$jmlForm=$this->db->query("select * from data_form where id_admin='".$this->session->userdata("id")."'")->num_rows();
if($dbform->level=="user" && $uri!="form" && $jmlForm<1) 
{
echo "<script>alert('Silahkan membuat Form registrasi')</script>";
echo "<script>window.location.href='".base_url()."form';</script>";
}
?>	
	
<?php $con=new konfig(); ?> 
<?php
$sesi=$this->session->userdata("level");
if(!$sesi){ redirect("login/logout"); }?>
<header class="navbar" id="header-navbar">
<div class="container">
<a href="<?php echo base_url().$con->dataKonfig(1);?>" id="logo" class="navbar-brand">

<span style='font-size:15px;text-shadow: 2px 2px 2px #A6250C;'><?php echo $con->konfigurasi(2); ?></span>
</a>
<div class="clearfix">
<button class="navbar-toggle" data-target=".navbar-ex1-collapse" data-toggle="collapse" type="button">
<span class="sr-only">Toggle navigation</span>
<span class="fa fa-bars"></span>
</button>
<div class="nav-no-collapse navbar-left pull-left hidden-sm hidden-xs">
<ul class="nav navbar-nav pull-left">
<li>
<a class="btn" id="make-small-nav">
<i class="fa fa-bars"></i>
</a>
</li>
</ul>
</div>
<div class="nav-no-collapse pull-right" id="header-nav">
<ul class="nav navbar-nav pull-right" >

<?php $con=new konfig(); $dp=$con->dataProfile($this->session->userdata("id")); ?> 
</li>
<li class="dropdown profile-dropdown">
<a href="#" class="dropdown-toggle " data-toggle="dropdown">
<img src="<?php echo base_url();?>file_upload/dp/<?php echo $dp->poto;?>" alt=""/>
<span class="hidden-xs spesial"><?php echo $dp->owner; ?></span> <b class="caret"></b>
</a>
<?php echo $this->load->view("template/dropdown");?>
</li>

<!--
<li class="dropdown language hidden-xs">
<a class="btn dropdown-toggle" data-toggle="dropdown">
English
<i class="fa fa-caret-down"></i>
</a>
<ul class="dropdown-menu">
<li class="item">
<a href="#">
Spanish
</a>
</li>
<li class="item">
<a href="#">
German
</a>
</li>
<li class="item">
<a href="#">
Italian
</a>
</li>

</ul>
-->
</li>
</ul>
</div>
</div>
</div>
</header>