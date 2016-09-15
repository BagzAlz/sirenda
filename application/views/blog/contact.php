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
                                <a href="index.html"><img src="images/logoMINI.png" /></a><!-- Small Logo -->
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
                    <h1>Contact Us</h1>
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
                            <h4>Send us your Thoughts</h4>
                        </div>
                        <div class="four columns button-wrap">
                             
                        </div>
                    </div>
                    <div class="callout-hr"></div>  
                    <div class="container">                   	
                        <div class="contact eleven columns">
                            <div class="standard-form compressed style-2">
                                <h5 class="semi title style-2">Contact Form</h5>
                                <div class="form-result"></div>
                            <!--    <form action="#" class="contactForm" id="contactus" name="contactus">
                                    <input type="text" class="input" id="name" name="name" placeholder="Name *" />
                                    <input type="text" class="input" id="email" name="email" placeholder="Email *" />
                                    <input type="text" class="input extend" id="subject" name="subject" placeholder="Subject" />
                                    <textarea name="comment" style='height:70px' id="comment" rows="10" cols="65" placeholder="Message *" ></textarea>
                                    <div class="submit">
                                          <a class="button color" href="javascript:contactUsSubmit();"><span>Submit</span></a>
                                    </div>
                                    <div class="clear"></div>
                                </form>-->
								<div id="mywidget"></div>
								<script type="text/javascript" src="http://barcodevent.com/widget.js"></script>
								<script type="text/javascript">
								widget_form(570,329,4897128)
								</script>

                            </div>
                        </div>
                        
                        <div class="five columns">
                           <h5 class="semi">Head Office</h5>
                            <p>
                                Lab.Komputer Unsub<br />
                                Subang - Jawa Barat
                                                          
                        </div> 
						
						
						
						<div class="five columns">
                           <h5 class="semi">Marketing</h5>
                            <p>
                                Phone: 085221288210<br />                          
                                Whatsapp: 085221288210<br />                          
                                PIN.BBM: 526DCF55<br />                          
                                Email: cs@barcodevent.com<br />                           
                            </p>
                        </div>
						
						<div class="five columns">
                           <h5 class="semi">Tekhnis</h5>
                            <p>
                                Phone: 085221288210<br />                          
                                Whatsapp: 085221288210<br />                          
                                PIN.BBM: 526DCF55<br />                          
                                Email: cs@barcodevent.com<br />                                              
                            </p>
                        </div>
						
						
                        <div class="clear"></div>
                        <div class="sixteen columns">
                       		<span class="hr lip-quote"></span>
                            <blockquote class="standard bottom">
                                
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
    <script type="text/javascript" src="js/jquery.color.animation.js"></script>
    <script src="ajax/ajax_default.js" type="text/javascript"></script>
    <script src="ajax/email_conf.js" type="text/javascript"></script>
	<script type="text/javascript" src="http://twitter.com/javascripts/blogger.js"></script>
    <script type="text/javascript" src="http://api.twitter.com/1/statuses/user_timeline/EmpiricalThemes.json?callback=twitterCallback2&count=2"></script>

    </div>
</body>

</html>