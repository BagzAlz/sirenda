<!DOCTYPE html>
<html>
<head>
<?php $this->load->view("template/head");?>

</head>
<body>
<div id="theme-wrapper">
<?php $this->load->view("template/header");?>
</div>

<div id="page-wrapper" class="container">
			<?php $this->load->view("template/sidebar");?>
</div>



<div id="content-wrapper">

<div>


 <div class="row">
			<?php $this->load->view("template/konten");?>
			<?php $this->load->view("template/konten_footer");?>

</div>


</div>

<?php $this->load->view("template/setting");?>
</body>
<?php $this->load->view("template/footer");?>
<?php $this->load->view('template/script'); ?>
</html>