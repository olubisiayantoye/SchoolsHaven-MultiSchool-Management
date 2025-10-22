  <!-- Header -->
  <header id="header" class="header">
    <div class="header-top border-bottom sm-text-center p-0 bg-theme-color-blue">
      <div class="container pt-5 pb-5">
        <div class="row">
          <div class="col-md-6 sm-text-center">
            <div class="widget no-border m-0">
              <ul class="list-inline xs-text-center m-0">
              
               <?php if(isset($school->phone)){ ?>
                <li class="m-0 pl-10 pr-10"> 
                  <a href="#" class="text-white"><i class="fa fa-phone"></i> <?php echo $this->lang->line('call_us'); ?> : <?php echo $school->phone; ?></a>
                </li>
                <?php } ?>
                <?php if(isset($school->email)){ ?>
                <li class="m-0 pl-10 pr-10"> 
                  <a href="#" class="text-white"><i class="fa fa-envelope-o mr-5"></i><?php echo $this->lang->line('email_us'); ?> : <?php echo $school->email; ?></a> 
                </li>
                 <?php } ?>
              </ul>
            </div>
          </div>
          <div class="col-md-6 text-right sm-text-center">
            <div class="no-border col-md-2">
              
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
             <ul class="list-inline xs-text-center m-0">
                       <li class="m-0 pl-10 pr-10">           
                        <a class="text-white" href="<?php echo site_url('admission'); ?>"><?php echo $this->lang->line('admission'); ?></a>                  </li>
                 
                    <?php if (logged_in_user_id()) { ?>  
                    
                         <li class="m-0 pl-10 pr-10"> 
                            <a class="text-white" href="<?php echo site_url('dashboard'); ?>"><?php echo $this->lang->line('dashboard'); ?></a>
                       </li>
                        <li class="m-0 pl-10 pr-10"> 
                            <span class="icon"><i class="fas fa-sign-out-alt"></i></span>
                            <a class="text-white" href="<?php echo site_url('auth/logout'); ?>"><?php echo $this->lang->line('logout'); ?></a>
                        </li>
                    <?php }else{ ?>
                         <li class="m-0 pl-10 pr-10"> 
                            <span class="icon"><i class="fas fa-sign-in-alt"></i></span>
                            <a class="text-white" href="<?php echo site_url('login'); ?>"><?php echo $this->lang->line('login'); ?></a>
                        </li>
                    <?php } ?>
           </ul>
           
          </div>
        </div>
      </div>
    </div>
    <div class="header-nav">
      <div class="header-nav-wrapper navbar-scrolltofixed bg-white">
        <div class="container">
          <nav id="menuzord-right" class="menuzord default">
            <a class=" pull-left " href="<?php echo site_url(); ?>">
           
                            <?php if(isset($school->logo)){ ?>                            
                                <img src="<?php echo UPLOAD_PATH; ?>/logo/<?php echo $school->logo; ?>" alt="" width="70%" height="70%"  />
                            <?php }else{ ?>
                                <img src="<?php echo UPLOAD_PATH; ?>/logo/<?php echo $this->global_setting->front_logo; ?>" alt=""  />
                            <?php } ?>    
            
            </a>
            <ul class="menuzord-menu">
             <!--start menu navigate -->  
          
                                <li class="active"><a href="<?php echo site_url(); ?>"><?php echo $this->lang->line('home'); ?></a></li>
                                <li><a href="#"><?php echo $this->lang->line('announcement'); ?> <span class="icon fas fa-chevron-down"></span></a>
                                    <ul class="dropdown">
                                        <li><a href="<?php echo site_url('news'); ?>"><?php echo $this->lang->line('news'); ?></a></li>
                                        <li><a href="<?php echo site_url('notice'); ?>"><?php echo $this->lang->line('notice'); ?></a></li>
                                        <li><a href="<?php echo site_url('holiday'); ?>"><?php echo $this->lang->line('holiday'); ?></a></li>
                                    </ul>                                
                                </li>
                                <li><a href="<?php echo site_url('events'); ?>"><?php echo $this->lang->line('event'); ?></a></li>
                                <li><a href="<?php echo site_url('galleries'); ?>"><?php echo $this->lang->line('gallery'); ?></a></li>
                                <li><a href="<?php echo site_url('teachers'); ?>"><?php echo $this->lang->line('teacher'); ?></a></li>
                                <li><a href="<?php echo site_url('staff'); ?>"><?php echo $this->lang->line('staff'); ?></a></li>
                                <li><a href="<?php echo site_url('check_result'); ?>"><?php echo $this->lang->line('check_result'); ?></a></li> 
                                <li><a href="<?php echo site_url('contact'); ?>"><?php echo $this->lang->line('contact_us'); ?></a></li>
                                <?php if(isset($header_pages) && !empty($header_pages)){ ?>
                                    <li><a href="javascript:void(0)"><?php echo $this->lang->line('page'); ?> <span class="icon fas fa-chevron-down"></span></a>
                                        <ul class="dropdown">
                                        <?php foreach($header_pages AS $obj ){ ?>
                                             <li><a href="<?php echo site_url('page/'.$obj->page_slug); ?>"><?php echo $obj->page_title; ?></a></li>
                                         <?php } ?> 
                                        </ul>                                
                                    </li>    
                                <?php } ?> 
                         
           <!--end menu navigate -->   
			</ul>
          </nav>
        </div>
      </div>
    </div>
  </header>