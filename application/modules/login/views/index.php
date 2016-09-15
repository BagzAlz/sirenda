<?php $con=new konfig(); ?>
<link media="screen" charset="utf-8" rel="stylesheet" href="<?php echo base_url();?>blog/css/layout.css" />
<body><div class="page-wrapper">
        <div class="slug-pattern"><div class="overlay"><div class="slug-cut"></div></div></div>
      
        
        <div class="body" align="center">
   
<br><br><br><br><br><br>
<img src="<?php echo base_url();?>plug/img/logo-ribbon.png" height="120px"><br><br>
<h1>SIRENDA MUSRENBANG</h1>
<span id="msg" style='position:absolute;margin-left:-120px;margin-top:5px'></span>
<div id="login-box-inner" style="max-width:30%;border-radius:15px">
<form role="form" id="form" action="javascript:login()">
<div class="input-group" style='padding-bottom:5px'>
<span class="input-group-addon"><i class="fa fa-user"></i></span>
<input class="form-control" name='username' required type="text" placeholder="Username or email">
</div>

<div class="input-group" style='padding-bottom:5px'>
<span class="input-group-addon"><i class="fa fa-key"></i></span>
<input type="password" class="form-control" required name='password' placeholder="Password">
</div>

<div class="input-group" style='padding-bottom:5px'>
<span class="input-group-addon">
<img src="<?php echo base_url()?>login/captcha" style="margin-left:3px">
</span>
<input type="text" class="form-control" required name='captcha' placeholder="Nomor Captcha">
</div>


<div class="col-xs-12">
<button type="submit" style='background-image:url("<?php echo base_url();?>blog/images/design/tile.jpg")' class="btn btn-success col-xs-12" >Login</button>
</div>

<br>

</div>
<span class="spesial">
BAPPEDA Kab. Subang  <?php echo date('Y') ?>
</span>
</form>

<div style='height:30%'></div>

</div>
</div>
</div>
</div>

           <!----------------------------------->
        </div>
</body>
                     <!----------------------------------------->
<script>
function login()
{
$('#msg').html("<img src='<?php echo base_url();?>plug/img/load.gif'> Please wait...");
	$.ajax({
	url:"<?php echo base_url();?>login/cekLogin",
	type: "POST",
    data: $('#form').serialize(),
	dataType: "JSON",
	 success: function(data)
            {
			 var result=data.split("_");
               //if success close modal and reload ajax table
			   if(result[0]=="0"){
               $('#msg').html("<i class='fa fa-warning'></i> Username/Password Salah!"); 
			   }else if(result[0]=="1"){
				$('#msg').html("<img src='<?php echo base_url();?>plug/img/load.gif'> Success! Mohon Tunggu..."); 
				 <?php
				 $link=$con->direct();
				 foreach($link as $link)
				 {?>
				 if(result[1]=="<?php echo $link->nama; ?>"){
				 window.location.href="<?php echo base_url().$link->direct;?>"; 
				 }
				 <?php } ?>
			   }else
			   {
	 		     $('#msg').html("<i class='fa fa-warning'></i> Nomor Captcha tidak sesuai!"); 
			     
			   }
              
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Try Again!');
            }
	});
}
</script>



      