<?php include("head.php"); ?>

<body><div class="page-wrapper">
        <div class="slug-pattern"><div class="overlay"><div class="slug-cut"></div></div></div>
        <div class="header">
            <div class="nav">
            
                
                <div class="container">
                
                     <!-- Standard Nav (x >= 768px) -->
                    <?php include("nav.php"); ?>
                    <!-- Standard Nav Ends, Start of Mini -->
                    
                    <div class="mini">
                        <div class="twelve column alpha omega mini">
                            <div class="logo">
                                <a href="index.html"><img src="<?php echo base_url();?>blog/images/logoMINI.png" /></a><!-- Small Logo -->
                            </div>
                        </div>
                        
                        <div class="twelve column alpha omega navagation-wrapper">
                            <select class="navagation">
                                <option value="" selected="selected">Site Navagation</option>
                            </select>
                        </div>
                    </div>
                    <!-- Start of Mini Ends -->
                </div> 
                
            </div>
            
            <div class="shadow"></div>
            <div class="container">
                <div class="page-title">
                    <div class="rg"></div>
                    <h1>Create Your Account</h1>
                </div>
            </div>
        </div>
        
        <div class="body">
            <div class="body-round"></div>
            <div class="body-wrapper">
                <div class="side-shadows"></div>
                <div class="content">
                    <div class="container callout standard">
                        <div class="twelve columns">
                            <h4>Silahkan isi data anda</h4>
                        </div>
                        <div class="four columns button-wrap">
                            
                        </div>
                    </div>
                    <div class="callout-hr"></div>  
                    <div class="container">                   	
                        <div class="contact eleven columns">
                            <div class="standard-form compressed style-2">
							 <div class="form-result">
                                   <form action="javascript:save()" class="" id="form" method="post" enctype="multipart/form-data">
								    <h5 class="semi title style-2">Nama</h5>
                                    <input class='input' type="text" required="required"  name="nama"/>
									<h5 class="semi title style-2">No.Hp</h5>
                                    <input class='input' type="text" required="required"  name="telp" />
                                    <h5 class="semi title style-2">E-mail</h5>
									<input class='input' type="email" required="required"  name="email" />
                                    <h5 class="semi title style-2">Alamat</h5>
									<textarea class='input'  name="alamat" required="required" style="height:70px"></textarea>
									
                                   	<span class="load" style="font-weight:bold;color:red"></span>
                                          <button style="float:right;height:30px;width:130px;font-size:18px" type="submit" class="button color"><span>Submit</span></button>
                                </form>
							</div>	
                            </div>
                        </div>
                            <script>
	function save()
    {
      
			$('.load').html("<img src='<?php echo base_url();?>plug/img/load.gif'> <font color='#999999'>Please wait...</font>");
			var  url = "<?php echo base_url();?>welcome/register";
			// ajax adding data to database
          $.ajax({
            url : url,
            type: "POST",
            data: $('#form').serialize(),
            dataType: "JSON",
            success: function(data)
            {
			
               //if success close modal and reload ajax table
				if(data=="ip") //ip
				{
				$('.load').html("Maaf komputer anda sudah pernah digunakan untuk mendaptar!");
				}else if(data=="hp") //hp
				{
				$('.load').html("Maaf No.Hp anda sudah pernah digunakan untuk mendaptar!");
				}else if(data=="email") //email
				{
				$('.load').html("Maaf Email anda sudah pernah digunakan untuk mendaptar!");
				}else {	
				$(".form-result").html("<h2><b>Terimakasih!</b></h2> <h3>Password segera kami kirim ke nomor Hp anda.</h3><br><br><br><br>");
				}
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
              alert('Mohon maaf kami sedang melakukan perbaikan\nTerimakasih atas pengertiannya.');
            }
        });
    }
        </script>
                        <div class="five columns">
                            <h5 class="semi">Akun demo</h5>
                                <p>
								Akun Demo klik <a href="<?php echo base_url();?>login">disini</a> <br>
                                Username : user <br>
								Password : user                                          
                               </p>
                            
                        </div>
						
						<div class="five columns">
                            <h5 class="semi">Kesulitan Mendaftar</h5>
                      				 Silahkan hubungi team tekhnis kami  pada kontak di bawah ini: <br>
										<table>
										<tr>
										<td>Telp /Wa</td><td> : </td><td> 085221288210</td>
										</tr>
										
										<tr>
										<td>Pin BBM </td><td> : </td><td> 526DCF55</td>
										</tr>
										</table>                                 
                         
                            
                        </div>
                        <div class="clear"></div>
                        <div class="sixteen columns">
                       		<span class="hr lip-quote"></span>
                            <blockquote class="standard bottom">
							Pastikan nomor HP anda diinput dengan benar
							   </blockquote>
                        </div>
        
                    </div>
                    
                </div>
                
            </div><?php include('fotter.php'); ?>
    </div>
    
    <script type="text/javascript">
        $(document).ready(function() {
            $('.slidewrap2').carousel({
                slider: '.slider',
                slide: '.slide',
                slideHed: '.slidehed',
                nextSlide : '.next',
                prevSlide : '.prev',
                addPagination: false,
                addNav : false
            });
            $('.slide.testimonials').contentSlide({'nav': false});
        });
    </script>
    <script type="text/javascript" src="<?php echo base_url();?>blog/js/jquery.color.animation.js"></script>
    <script src="<?php echo base_url();?>blog/ajax/ajax_default.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>blog/ajax/email_conf.js" type="text/javascript"></script>
	<script type="text/javascript" src="http://twitter.com/javascripts/blogger.js"></script>
    <script type="text/javascript" src="http://api.twitter.com/1/statuses/user_timeline/EmpiricalThemes.json?callback=twitterCallback2&count=2"></script>

    </div>
</body>

</html>