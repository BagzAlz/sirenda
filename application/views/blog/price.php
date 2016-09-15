<?php include("head.php"); ?>

<body><div class="page-wrapper">
        <div class="slug-pattern"><div class="overlay"><div class="slug-cut"></div></div></div>
        <div class="header">
            <div class="nav">
            
                
                <div class="container">
                
                    <!-- Standard Nav (x >= 768px) -->
                    <?php include("nav.php"); ?>
                    <!-- Start of Mini Ends -->
                </div> 
                
            </div>
            
            <div class="shadow"></div>
            <div class="container">
                <div class="page-title">
                    <div class="rg"></div>
                    <h1>Price</h1>
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
                            <h4>harga berlangganan di barcodevent.com</h4>
                             </div>
                        
                        
                    </div>
                    <div class="callout-hr"></div>                        
                    <div class="container">
                    
                        <div class="twelve columns">
                        
                            <div class="blog post">
                                <div class="border">
                                                                     
									  
                                </div>
                                <div class="description">
                                
                                    <div class="info">
                                        POSTED BY: <a href="#">Admin</a> 
                                        <span>|</span> DATE: <a href="#">Juli 7, 2017</a>
                                    </div>
                                    <p style='text-align:justify'>
									Biaya yang dibebankan untuk member barcodevent.com hanya
									biaya quota peserta event yang anda buat dengan ketentuan saat ini hanya Rp 2.000 x Jumlah Quota Event anda
									, serta biaya administrasi Rp 500 per Invoice. <br>
									Misal : <br>
									Anda membuat Event untuk tanggal 17 Agustus <?php echo date('Y'); ?> dengan quota maksimal 200 orang peserta<br>
									Maka biaya yang anda keluarkan sebesar : <br>
									Jumlah quota =(200) x biaya Quota (2000)  = Rp 400.000<br>
									Biaya Adm   = Rp 500<br>
									Jadi total yang harus anda bayar untuk event tanggal 17 Agustus <?php echo date('Y'); ?> sebesar <b>Rp 400.500</b>.<br><br>
									
									Harga berbeda jika anda menggunakan jasa agen kami silahkan pilih agen resmi kami sesuai lokasi anda 
									jika anda membutuhkan pengelolaan event secara langsung ditempat anda.<br>
									Agen kami siap membantu anda secara penuh terkait registrasi atau pelatihan maupun peralatan.<br><br>
									Silahkan hubungi marketing kami untuk pengiriman agen ke kota anda.
									<hr>
									barcodevent.com juga dapat disesuaikan dengan kebutuhan anda jika saat ini fiture yang tersedia tidak anda temukan
									dengan ketentuan biaya sesuai kesepakatan.<br>
									
									
									
									</p>
        
                                </div>
                                
                            
                            </div><!-- Blog Ends -->
                          
                        </div>
                        <div class="four columns">
                            <div class="sidebar">
                                <div class="sideborder"></div>
                                <h5>Agen Kami</h5>
                                <ul class="blogs">
                                    <li>
                                        <div class="border">
                                            <img src="<?php echo base_url();?>blog/images/sidebar-train.jpg" />
                                            <a href="images/untouched/train.jpg" class="zoom prettyPhoto"></a>
                                        </div>
                                        <p>
                                            <a href="#">Didi Casidi</a>
                                            Jakarta Utara
                                            <span>085221288201</span>
                                        </p>
                                        <div class="clear"></div>
                                    </li>
                                    
                                    <li>
                                        <div class="border">
                                            <a href="images/untouched/mountain.jpg" class="zoom prettyPhoto"></a>
                                            <img src="<?php echo base_url();?>blog/images/sidebar-mountain.jpg" />
                                        </div>
                                        <p>
                                            <a href="#">Alex Wijaya</a>
                                            Jogjakarta
                                            <span>085221288201</span>
                                        </p>
                                        <div class="clear"></div>
                                    </li>
                                    
                                     <li>
                                        <div class="border">
                                            <img src="<?php echo base_url();?>blog/images/sidebar-beach.jpg" />
                                            <a href="images/untouched/beachstorm.jpg" class="zoom prettyPhoto"></a>
                                        </div>
                                        <p>
                                            <a href="#">Abdul</a>
                                            Tanjungpinang - Kepri
                                            <span>085221288201</span>
                                        </p>
                                        <div class="clear"></div>
                                    </li>
                                </ul>
                                
                              
                                <div class="clear"></div>
                                
                               
                                
                            </div>
                        </div>    
                                
                        <div class="clear"></div>
                                            
                        <div class="sixteen columns">
                       		<span class="hr lip-quote"></span>
                            <blockquote class="standard bottom">
                                "Kami tidak pernah menghubungi member via telphone terkait pembayaran" 
                            </blockquote>
                        </div>
        
                    </div>
                </div>
            </div>
			
		<?php include('fotter.php'); ?>
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
            $(window).load(function(){
                 $("a[class^='prettyPhoto']").prettyPhoto({social_tools: '' });
            });
        });
    </script>
	<script type="text/javascript" src="http://twitter.com/javascripts/blogger.js"></script>
    <script type="text/javascript" src="http://api.twitter.com/1/statuses/user_timeline/EmpiricalThemes.json?callback=twitterCallback2&count=2"></script>

	</div>
</body>

</html>