  
    <header id="header-part">
        <div class="header-top d-none d-lg-block">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="header-contact">
                            <ul>
                                <li><i class="fa fa-envelope"></i><a href="#"><?php echo $school->email; ?></a></li>
                                <li><i class="fa fa-phone"></i><span><?php echo $school->phone; ?></span></li>
                            </ul>
                        </div> <!-- header contact -->
                    </div>
                    
                    <div class="col-md-6">
                        <div class="header-right d-flex justify-content-end">
                            <div class="social d-flex">
                                <span class="follow-us">Follow Us :</span>
                                <ul>
                                    <li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div> <!-- social -->
                             <?php if(isset($schools) && count($schools) > 1){ ?>
                            <div class="login-register">
                                <ul>
                                    <?php if (logged_in_user_id()) { ?>  
                    
                        <li>
                            <a class="text" href="<?php echo site_url('dashboard'); ?>"><?php echo $this->lang->line('dashboard'); ?></a>
                        </li>
                        <li>
                            <span class="icon"><i class="fas fa-sign-out-alt"></i></span>
                            <a class="text" href="<?php echo site_url('auth/logout'); ?>"><?php echo $this->lang->line('logout'); ?></a>
                        </li>
                    <?php }else{ ?>
                        <li>
                            <span class="icon"><i class="fas fa-sign-in-alt"></i></span>
                            <a class="text" href="<?php echo site_url('login'); ?>"><?php echo $this->lang->line('login'); ?></a>
                        </li>
                    <?php } ?>
                                </ul>
                            </div>
                             <?php } ?> 
                        </div> <!-- header right -->
                    </div>
                    
                    <div class="">
                      
             <?php
			  if($this->session->userdata('role_id') == SUPER_ADMIN){
			 
			  if(isset($schools) && count($schools) > 1){ ?>
                       
                            <?php echo form_open_multipart(site_url('visitor/add'), array('name' => 'add', 'id' => 'add', 'class'=>'form-horizontal form-label-left'), ''); ?>
                                <div class=" no-border m-0"> 
                                <select   name="role_id"  id="edit_role_id" required="required" onchange="change_school(this.value);">
                                     <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                    <?php foreach($schools as $obj ){ ?>
                                    <option value="<?php echo $obj->id; ?>" <?php if($this->session->userdata('front_school_id') == $obj->id){ echo 'selected="selected"';} ?>><?php echo $obj->school_name; ?></option>
                                    <?php } ?>                                            
                                 </select>
                                 
                            <?php echo form_close(); ?>
                        </div>
                    <?php }
					
					 } ?> 
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- header top -->
        
        <div class="navigation">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand" href="<?php echo site_url(); ?>">
                                
                            <?php if(isset($school->logo)){ ?>                            
                                <img src="<?php echo UPLOAD_PATH; ?>/logo/<?php echo $school->logo; ?>" alt="" width="50%"    />
                            <?php }else{ ?>
                                <img src="<?php echo UPLOAD_PATH; ?>/logo/<?php echo $this->global_setting->front_logo; ?>" alt=""  />
                            <?php } ?>    
                            </a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>

                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                <ul class="navbar-nav ml-auto">
                                <!--/////menu///////////////-->
                                 
                                <li class="nav-item"><a href="<?php echo site_url(); ?>"><?php echo $this->lang->line('home'); ?></a></li>
                                <li class="nav-item"><a href="#"><?php echo $this->lang->line('announcement'); ?></a>
                                    <ul class="sub-menu">
                                        <li><a href="<?php echo site_url('news'); ?>"><?php echo $this->lang->line('news'); ?></a></li>
                                        <li><a href="<?php echo site_url('notice'); ?>"><?php echo $this->lang->line('notice'); ?></a></li>
                                        <li><a href="<?php echo site_url('holiday'); ?>"><?php echo $this->lang->line('holiday'); ?></a></li>
                                    </ul>                                
                                </li>
                                <li class="nav-item"><a href="<?php echo site_url('events'); ?>"><?php echo $this->lang->line('event'); ?></a></li>
                                <li class="nav-item"><a href="<?php echo site_url('galleries'); ?>"><?php echo $this->lang->line('gallery'); ?></a></li>
                                <li class="nav-item"><a href="<?php echo site_url('teachers'); ?>"><?php echo $this->lang->line('teacher'); ?></a></li>
                                <li class="nav-item"><a href="<?php echo site_url('staff'); ?>"><?php echo $this->lang->line('staff'); ?></a></li>
                                <li class="nav-item"><a href="<?php echo site_url('check_result'); ?>"><?php echo $this->lang->line('check_result'); ?></a></li> 
                                <li class="nav-item"><a href="<?php echo site_url('contact'); ?>"><?php echo $this->lang->line('contact_us'); ?></a></li>
                                <?php if(isset($header_pages) && !empty($header_pages)){ ?>
                                    <li class="nav-item"><a href="javascript:void(0)"><?php echo $this->lang->line('page'); ?> </a>
                                        <ul class="sub-menu">
                                        <?php foreach($header_pages AS $obj ){ ?>
                                             <li><a href="<?php echo site_url('page/'.$obj->page_slug); ?>"><?php echo $obj->page_title; ?></a></li>
                                         <?php } ?> 
                                        </ul>                                
                                    </li>    
                                <?php } ?> 
                          
                            	<!--////end menu///////////-->
                                </ul>
                            </div>
                            <div class="right-icon text-right">
                                <ul>
                                    <li><a href="javascript:void(0)" id="search"><i class="fa fa-search"></i></a></li>
                                    <li><a href="#"><i class="fa fa-shopping-bag"></i><span>0</span></a></li>
                                </ul>
                            </div> <!-- right icon -->
                        </nav> <!-- nav -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div>
    </header>