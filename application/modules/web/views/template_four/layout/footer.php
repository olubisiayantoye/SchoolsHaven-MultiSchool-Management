<footer id="footer-part">
        <div class="footer-top pt-40 pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="footer-about mt-40">
                            <div class="logo">
                                <a href="#">
                                <?php if(isset($school->logo)){ ?>                            
                                <img src="<?php echo UPLOAD_PATH; ?>/logo/<?php echo $school->logo; ?>" alt=""  />
                            <?php }else{ ?>
                                <img src="<?php echo UPLOAD_PATH; ?>/logo/<?php echo $this->global_setting->front_logo; ?>" alt=""  />
                            <?php } ?> 
                                </a>
                            </div>
                            <p><?php if(isset($school->about_text) && !empty($school->about_text)){ ?>
                                <?php echo substr($school->about_text, 0, 350); ?>
                            <?php } ?></p>
                            <ul class="mt-20">
                                 <?php if(isset($school->facebook_url) && !empty($school->facebook_url)){ ?>
                                <li><a href="<?php echo $school->facebook_url; ?>" target="_blank"><i class="fa fa-facebook-f"></i></i></a></li>
                            <?php } ?> 
                            <?php if(isset($school->twitter_url)  && !empty($school->twitter_url)){ ?>
                                <li><a href="<?php echo $school->twitter_url; ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
                            <?php } ?>                             
                            <?php if(isset($school->linkedin_url)  && !empty($school->linkedin_url)){ ?>
                                <li><a href="<?php echo $school->linkedin_url; ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                            <?php } ?>                             
                            <?php if(isset($school->google_plus_url)  && !empty($school->google_plus_url)){ ?>
                                <li><a href="<?php echo $school->google_plus_url; ?>" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                            <?php } ?>                              
                            <?php if(isset($school->youtube_url)  && !empty($school->youtube_url)){ ?>
                                <li><a href="<?php echo $school->youtube_url; ?>" target="_blank"><i class="fa fa-youtube"></i></a></li>
                            <?php } ?>                              
                            <?php if(isset($school->instagram_url)  && !empty($school->instagram_url)){ ?>
                                <li><a href="<?php echo $school->instagram_url; ?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
                            <?php } ?>                              
                            <?php if(isset($school->pinterest_url)  && !empty($school->pinterest_url)){ ?>
                                <li><a href="<?php echo $school->pinterest_url; ?>" target="_blank"><i class="fa fa-pinterest-p"></i></a></li>
                            <?php } ?> 
                            </ul>
                        </div> <!-- footer about -->
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="footer-link mt-40">
                            <div class="footer-title pb-25">
                                <h6><span><?php echo $this->lang->line('quick_link'); ?>:</span></h6>
                            </div>
                            <ul>
                            <li><a href="<?php echo site_url('admission'); ?>"><i class="fa fa-angle-right"></i><?php echo $this->lang->line('admission'); ?></a></li>
                            <li><a href="<?php echo site_url('news'); ?>"><i class="fa fa-angle-right"></i><?php echo $this->lang->line('news'); ?></a></li>
                            <li><a href="<?php echo site_url('notice'); ?>"><i class="fa fa-angle-right"></i><?php echo $this->lang->line('notice'); ?></a></li>
                            <li><a href="<?php echo site_url('holiday'); ?>"><i class="fa fa-angle-right"></i><?php echo $this->lang->line('holiday'); ?></a></li>
                            <li><a href="<?php echo site_url('events'); ?>"><i class="fa fa-angle-right"></i><?php echo $this->lang->line('event'); ?></a></li>
                            <li><a href="<?php echo site_url('galleries'); ?>"><i class="fa fa-angle-right"></i><?php echo $this->lang->line('gallery'); ?></a></li>
                            <li><a href="<?php echo site_url('teachers'); ?>"><i class="fa fa-angle-right"></i><?php echo $this->lang->line('teacher'); ?></a></li>
                            <li><a href="<?php echo site_url('staff'); ?>"><i class="fa fa-angle-right"></i><?php echo $this->lang->line('staff'); ?></a></li>
                            <li><a href="<?php echo site_url('contact'); ?>"><i class="fa fa-angle-right"></i><?php echo $this->lang->line('contact_us'); ?></a></li>
                            <?php if(isset($footer_pages) && !empty($footer_pages)){ ?>
                               <?php foreach($footer_pages AS $obj ){ ?>
                                    <li><a href="<?php echo site_url('page/'.$obj->page_slug); ?>"><i class="fa fa-angle-right"></i><?php echo $obj->page_title; ?></a></li>
                                <?php } ?> 
                            <?php } ?> 
                        </ul>
   
                        </div> <!-- footer link -->
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-6">
                        <div class="footer-link support mt-40">
                            <div class="footer-title pb-25">
                                <h6><?php echo $this->lang->line('social_link'); ?></h6>
                            </div>
                          
                            <ul >
                            <?php if(isset($school->facebook_url) && !empty($school->facebook_url)){ ?>
                                <li><a href="<?php echo $school->facebook_url; ?>" target="_blank"><i class="fa fa-facebook-f"></i></i></a></li>
                            <?php } ?> 
                            <?php if(isset($school->twitter_url)  && !empty($school->twitter_url)){ ?>
                                <li><a href="<?php echo $school->twitter_url; ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
                            <?php } ?>                             
                            <?php if(isset($school->linkedin_url)  && !empty($school->linkedin_url)){ ?>
                                <li><a href="<?php echo $school->linkedin_url; ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                            <?php } ?>                             
                            <?php if(isset($school->google_plus_url)  && !empty($school->google_plus_url)){ ?>
                                <li><a href="<?php echo $school->google_plus_url; ?>" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                            <?php } ?>                              
                            <?php if(isset($school->youtube_url)  && !empty($school->youtube_url)){ ?>
                                <li><a href="<?php echo $school->youtube_url; ?>" target="_blank"><i class="fa fa-youtube"></i></a></li>
                            <?php } ?>                              
                            <?php if(isset($school->instagram_url)  && !empty($school->instagram_url)){ ?>
                                <li><a href="<?php echo $school->instagram_url; ?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
                            <?php } ?>                              
                            <?php if(isset($school->pinterest_url)  && !empty($school->pinterest_url)){ ?>
                                <li><a href="<?php echo $school->pinterest_url; ?>" target="_blank"><i class="fa fa-pinterest-p"></i></a></li>
                            <?php } ?> 
                        </ul>
                        </div> <!-- support -->
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-address mt-40">
                            <div class="footer-title pb-25">
                                <h6>Contact Us</h6>
                            </div>
                            <ul>
                                <li>
                                    <div class="icon">
                                        <i class="fa fa-home"></i>
                                    </div>
                                    <div class="cont">
                                        <p><?php if(isset($school->address)){ ?>
                                     <?php echo $school->address; ?>
                                <?php } ?></p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    <div class="cont">
                                        <p><?php if(isset($school->phone)){ ?>
                                     <?php echo $school->phone; ?>
                                <?php } ?></p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <i class="fa fa-envelope-o"></i>
                                    </div>
                                    <div class="cont">
                                        <p><?php if(isset($school->email)){ ?>
                                     <?php echo $school->email; ?>
                                <?php } ?></p>
                                    </div>
                                </li>
                            </ul>
                        </div> <!-- footer address -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- footer top -->
        
        <div class="footer-copyright pt-10 pb-25">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="copyright text-md-left text-center pt-15">
                            <p><?php if(isset($school->footer)){ ?>                            
                    <?php echo $school->footer; ?>
                <?php }else{ ?>
                    <?php echo $this->global_setting->brand_footer; ?>
                <?php } ?>  </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="copyright text-md-right text-center pt-15">
                            <p>Powered by <span>WinnersWorld / SchoolsHaven</span> </p>
                        </div>
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- footer copyright -->
    </footer>