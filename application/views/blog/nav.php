<?php
$home='';
$price='';
$contact='';
$signup='';
$agen='';
$uri=$this->uri->segment(2);
if($uri=="home")
{
$home='class="active"'; }
elseif($uri=="agent")
{
$agen='class="active"'; }elseif($uri=="price")
{
$price='class="active"'; }elseif($uri=="contact")
{
$contact='class="active"'; }elseif($uri=="signup")
{
$signup='class="active"'; }
?>
<div class="standard">
                    
                        <div class="five column alpha">
                            <div class="logos" style='margin-top:15px'>
                                <a href="<?php echo base_url();?>"><img width="290px" src="<?php echo base_url();?>plug/img/logo3.png" /></a><!-- Large Logo -->
                            </div>
                        </div>
                    
                        <div class="eleven column omega tabwrapper">
                            <div class="menu-wrapper">
                                <ul class="tabs menu">
                                    <li>
                                       <a href="<?php echo base_url();?>" ><span>Home</span></a>
                                    </li>
                                    <li><a href="<?php echo base_url();?>welcome/agent"  <?php echo $agen; ?> >Agen</a>
                                       
                                    </li>
                                   
                                     
									 <li><a href="<?php echo base_url();?>welcome/price"  <?php echo $price; ?>>Price</a>
								<!--	 <li> <a href="<?php echo base_url();?>welcome/client">Client</a> </li> -->
                                    <li>
                                        <a href="<?php echo base_url();?>welcome/contact"  <?php echo $contact; ?>>
                                            Contact
                                        </a>
                                    </li>
									 <li><a href="<?php echo base_url();?>welcome/signup"  <?php echo $signup; ?>>Sign Up</a>
									 <li><a href="<?php echo base_url();?>login">Login</a>
                                       
                                    </li>
                                </ul>
								<?php /*
								$bhs=$this->session->userdata("bhs");
								if($bhs=="engslish"){?>
								<div style='float:right;color:white'><span style='font-weight:bold'>Engslish</span> | <span><a href="<?php echo base_url();?>on/id">Indonesia</a></span> </div>
								<?php }else{?>
								<div style='float:right;color:white'><span><a href="<?php echo base_url();?>on/eg">Engslish</a></span> | <span style='font-weight:bold'>Indonesia</span> </div>
								<?php } */?>
						  </div>
                        </div>
                    </div>