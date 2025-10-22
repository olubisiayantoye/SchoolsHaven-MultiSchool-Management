<!--Header Start-->
<div class="header-wrap">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-3 col-md-12 navbar-light">
        <div class="logo"> 
<a href="<?php echo site_url(); ?>">
 <?php if(isset($school->logo)){ ?>                            
            <img alt="" width="150" height="80" class="logo-default" src="<?php echo UPLOAD_PATH; ?>/logo/<?php echo $school->logo; ?>" alt=""  />
                            <?php }else{ ?>
            <img alt="" class="logo-default" src="<?php echo UPLOAD_PATH; ?>/logo/<?php echo $this->global_setting->front_logo; ?>" alt=""  />
                            <?php } ?>    

          

            <!--img alt="" class="logo-default" src="<?php echo ASSET_URL; ?>jirehshouse/images/logo.png"-->


        </a></div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
      </div>
      <div class="col-lg-8 col-md-12">
        <div class="navigation-wrap" id="filters">
          <nav class="navbar navbar-expand-lg navbar-light"> <a class="navbar-brand" href="index.html#">Menu</a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <button class="close-toggler" type="button" data-toggle="offcanvas"> <span><i class="fas fa-times-circle" aria-hidden="true"></i></span> </button>

              <ul class="navbar-nav mr-auto">
                <li class="nav-item"> <a class="nav-link active" href="<?php echo site_url(); ?>"><?php echo $this->lang->line('home'); ?> <span class="sr-only">(current)</span></a> </li>
                <li class="nav-item"><a class="nav-link" href="about.html">About</a></li>
                <li class="nav-item"><a class="nav-link" href="classes.html">Classes</a> <i class="fas fa-caret-down"></i>
                  <ul class="submenu">
                    <li><a href="classes.html">Classes</a></li>
                    <li><a href="classes-details.html">Classes Details</a></li>
                  </ul>
                </li>
                <li class="nav-item"><a class="nav-link" href="teachers.html">Teachers</a>
                  <ul class="submenu">
                    <li><a href="teachers.html">Teachers</a></li>
                    <li><a href="teachers-details.html">Teachers Details</a></li>
                  </ul>
                </li>
                <li class="nav-item"><a class="nav-link" href="index.html#.">Pages gggg</a> <i class="fas fa-caret-down"></i>
                  <ul class="submenu">
                    <li><a href="about.html">About Us</a></li>
                    <li><a href="teachers.html">Our Teachers</a></li>
                    <li><a href="login.html">Login</a></li>
                    <li><a href="register.html">Register</a></li>
                    <li><a href="pricing.html">Our Pricing</a></li>
                    <li><a href="faqs.html">Faqs</a></li>
                    <li><a href="testimonials.html">Testimonials</a></li>
                    <li><a href="typography.html">Typography</a></li>
                    <li><a href="404.html">404</a></li>
                  </ul>
                </li>
                <li class="nav-item"><a class="nav-link" href="blog.html">Blog ok</a> <i class="fas fa-caret-down"></i>
                  <ul class="submenu">
                    <li><a href="blog.html">Blog</a></li>
                    <li><a href="blog-grid.html">Blog Grid Sidebar</a></li>
                    <li><a href="blog-list.html">Blog List sidebar</a></li>
                    <li><a href="blog-details.html">Blog Details</a></li>
                  </ul>
                </li>
                <li class="nav-item"><a class="nav-link" href="<?php echo site_url('check_result'); ?>"><?php echo $this->lang->line('check_result'); ?></a></li>
                <li class="nav-item"><a class="nav-link" href="<?php echo site_url('contact'); ?>"><?php echo $this->lang->line('contact_us'); ?></a></li>
              </ul>

            </div>
          </nav>
        </div>
      </div>
      <div class="col-lg-1">
        <div class="header_info">
          
          <div class="loginwrp"><a href="login.html">Login</a></div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--Header End--> 

