  <!-- Header -->
  <header>
        <div id="csi-header" class="csi-header csi-banner-header">
            <div class="header-top">
                <div class="header-top-inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="contact">
                                    <ul class="list-inline">
                                        <li><i class="icofont icofont-ui-call"></i> +8934-3489-87774</li>
                                        <li><i class="icofont icofont-ui-message"></i> <a href="">[email&#160;protected]</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="right-menu">
                                
                                    <ul class="list-inline csi-social">
                                        <li><a href="#"><i class="icofont icofont-social-twitter"></i></a></li>
                                        <li><a href="#"><i class="icofont icofont-social-facebook"></i></a></li>
                                        <li><a href="#"><i class="icofont icofont-social-google-plus"></i></a></li>
                                        <li><a href="#"><i class="icofont icofont-social-instagram"></i></a></li>
                                        <li><a href="#"><i class="icofont icofont-youtube-play"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!--//.header-top-->
            <div class="csi-header-bottom csi-header-bottom-transparent ">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <nav class="navbar navbar-default csi-navbar">
                                <div class="container">
                                    <nav class="navbar navbar-default csi-navbar">
                                        <div class="csicontainer">
                                            <div class="navbar-header">
                                                <button type="button" class="navbar-toggle" data-toggle="collapse"
                                                        data-target=".navbar-collapse">
                                                    <span class="sr-only">Toggle navigation</span>
                                                    <span class="icon-bar"></span>
                                                    <span class="icon-bar"></span>
                                                    <span class="icon-bar"></span>
                                                </button>
                                                <div class="csi-logo">
                                                    <a href="index.php">
                                                       <a href="<?php echo site_url(); ?>">
                            <?php if(isset($school->logo)){ ?>                            
                                <img src="<?php echo UPLOAD_PATH; ?>/logo/<?php echo $school->logo; ?>" alt=""  />
                            <?php }else{ ?>
                                <img src="<?php echo UPLOAD_PATH; ?>/logo/<?php echo $this->global_setting->front_logo; ?>" alt=""  />
                            <?php } ?>    
                        </a>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="collapse navbar-collapse">
                                                <ul class="nav navbar-nav csi-nav">
                                                  
			   <li><a class="csi-scroll" href="<?php echo site_url(); ?>"><?php echo $this->lang->line('home'); ?></a></li>
               <li class="dropdown"><a href="#"><?php echo $this->lang->line('announcement'); ?> <span class="icon fas fa-chevron-down"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?php echo site_url('news'); ?>"><?php echo $this->lang->line('news'); ?></a></li>
                                        <li><a href="<?php echo site_url('notice'); ?>"><?php echo $this->lang->line('notice'); ?></a></li>
                                        <li><a href="<?php echo site_url('holiday'); ?>"><?php echo $this->lang->line('holiday'); ?></a></li>
                                    </ul>                                
                                </li>
                                <li><a class="csi-scroll" href="<?php echo site_url('events'); ?>"><?php echo $this->lang->line('event'); ?></a></li>
                                <li><a class="csi-scroll" href="<?php echo site_url('galleries'); ?>"><?php echo $this->lang->line('gallery'); ?></a></li>
                                <li><a class="csi-scroll" href="<?php echo site_url('teachers'); ?>"><?php echo $this->lang->line('teacher'); ?></a></li>
                                <li><a class="csi-scroll" href="<?php echo site_url('staff'); ?>"><?php echo $this->lang->line('staff'); ?></a></li>
                                <li><a class="csi-scroll" href="<?php echo site_url('check_result'); ?>"><?php echo $this->lang->line('check_result'); ?></a></li> 
                                <li><a class="csi-scroll" href="<?php echo site_url('contact'); ?>"><?php echo $this->lang->line('contact_us'); ?></a></li>
                                <?php if(isset($header_pages) && !empty($header_pages)){ ?>
                                    <li class="dropdown"><a href="javascript:void(0)"><?php echo $this->lang->line('page'); ?> <span class="icon fas fa-chevron-down"></span></a>
                                        <ul class="dropdown-menu">
                                        <?php foreach($header_pages AS $obj ){ ?>
                                             <li><a  href="<?php echo site_url('page/'.$obj->page_slug); ?>"><?php echo $obj->page_title; ?></a></li>
                                         <?php } ?> 
                                        </ul>                                
                                    </li>    
                                <?php } ?>
                                                    
                                                </ul>
                                            </div>
                                            <!--/.nav-collapse -->
                                        </div>
                                    </nav>
                                </div>
                                <!-- /.container -->
                            </nav>
                        </div>
                    </div>
                    <!--//.ROW-->
                </div>
                <!-- //.CONTAINER -->
            </div>
            <!-- //.INNER-->
        </div>
    </header>