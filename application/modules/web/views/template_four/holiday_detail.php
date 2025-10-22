    <!--====== PAGE BANNER PART START ======-->
    
    <section id="page-banner" class="pt-105 pb-110 bg_cover" data-overlay="8" style="background-image: url(images/page-banner-1.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-banner-cont">
                        <h2><?php echo $this->lang->line('holiday'); ?></h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo site_url(); ?>"><?php echo $this->lang->line('home'); ?></a></li>
                                 <li><a href="<?php echo site_url('holiday'); ?>"><?php echo $this->lang->line('holidays'); ?></a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?php echo site_url('holiday'); ?>"><?php echo $this->lang->line('holidays'); ?></li>
                            </ol>
                        </nav>
                    </div>  <!-- page banner cont -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    
    <!--====== PAGE BANNER PART ENDS ======-->







<section class="page-notice-details-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-sm-12 col-12">
                <div class="page-notice">
                    <h2 class="title"><?php echo $holiday->title; ?></h2>
                    <h5 class="date">
                        <span class="icon"><i class="far fa-calendar-alt"></i></span><span class="info"> <?php echo date($this->global_setting->date_format, strtotime($holiday->date_from)); ?></span>
                        <span class="seprator"> ⇔ </span>
                        <span class="icon"><i class="far fa-calendar-alt"></i></span><span class="info"> <?php echo date($this->global_setting->date_format, strtotime($holiday->date_to)); ?></span>
                    </h5>
                    <p class="text"><?php echo $holiday->note; ?></p>
                </div>
            </div>
            
            <div class="col-lg-4 offset-lg-0 col-md-6 offset-md-3 col-sm-8 offset-sm-2 col-12">
                <div class="sidebar">
                    <div class="sidebar-widget">
                        <h2 class="sidebar-title"><?php echo $this->lang->line('latest'); ?> <?php echo $this->lang->line('holiday'); ?></h2>
                        <ul class="widget-notice">
                          <?php if(isset($holidays) && !empty($holidays)){ ?>  
                            <?php foreach($holidays as $obj){ ?>  
                              <li>
                                  <a href="<?php echo site_url('holiday-detail/'.$obj->id); ?>">
                                      <span class="title"><?php echo $obj->title; ?></span>
                                      <h5 class="date">
                                        <span class="icon"><i class="far fa-calendar-alt"></i></span><span class="info"> <?php echo date($this->global_setting->date_format, strtotime($obj->date_from)); ?></span>
                                        <span class="seprator"> ⇔ </span>
                                        <span class="icon"><i class="far fa-calendar-alt"></i></span><span class="info"> <?php echo date($this->global_setting->date_format, strtotime($obj->date_to)); ?></span>
                                    </h5>
                                  </a>
                              </li>
                            <?php } ?>
                          <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>