
    <!--====== PAGE BANNER PART START ======-->
    
    <section id="page-banner" class="pt-105 pb-110 bg_cover" data-overlay="8" style="background-image: url(images/page-banner-1.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-banner-cont">
                        <h2><?php echo $this->lang->line('event'); ?> <?php echo $this->lang->line('detail'); ?></h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo site_url(); ?>"><?php echo $this->lang->line('home'); ?></a></li>
                                <li class="breadcrumb-item"><a href="<?php echo site_url('events'); ?>"><?php echo $this->lang->line('events'); ?></a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?php echo $this->lang->line('event'); ?> <?php echo $this->lang->line('detail'); ?></li>
                            </ol>
                        </nav>
                    </div>  <!-- page banner cont -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    
    <!--====== PAGE BANNER PART ENDS ======-->




<section class="page-event-details-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-sm-12 col-12">
                <div class="page-event-details">
                    <div class="banner">
                        <img src="<?php echo UPLOAD_PATH; ?>event/<?php echo $event->image; ?>" alt="">
                    </div>
                    <h2 class="title"><?php echo $event->title; ?></h2>
                    <ul class="event-meta">
                        <li class="info"><span class="icon"><i class="fas fa-user"></i></span> <?php echo $event->event_for ? $event->event_for : $this->lang->line('all'); ?> (<?php echo $this->lang->line('event_for'); ?>)</li>
                        <li class="info"><span class="icon"><i class="far fa-calendar-alt"></i></span> <?php echo date($this->global_setting->date_format, strtotime($event->event_from)); ?> (<?php echo $this->lang->line('start_date'); ?>)</li>
                        <li class="info"><span class="icon"><i class="far fa-calendar-alt"></i></span> <?php echo date($this->global_setting->date_format, strtotime($event->event_to)); ?> (<?php echo $this->lang->line('end_date'); ?>)</li>
                        <li class="info"><span class="icon"><i class="fas fa-map-marker-alt"></i></span> <?php echo $event->event_place; ?></li>
                    </ul>
                    <h2 class="info-title"><?php echo $this->lang->line('event'); ?> <?php echo $this->lang->line('information'); ?> :</h2>
                    <p class="text"><?php echo $event->note; ?></p>
                </div>
            </div>
            
            <div class="col-lg-4 offset-lg-0 col-md-6 offset-md-3 col-sm-8 offset-sm-2 col-12">
                <div class="sidebar">
                    <div class="sidebar-widget">
                        <h2 class="sidebar-title"><?php echo $this->lang->line('latest'); ?> <?php echo $this->lang->line('event'); ?></h2>
                        <ul class="widget-event">
                            <?php if(isset($events) && !empty($events)){ ?> 
                                <?php foreach($events AS $obj){ ?>
                                <li>
                                    <a href="<?php echo site_url('event-detail/'.$obj->id); ?>">
                                        <span class="img"><img src="<?php echo UPLOAD_PATH; ?>event/<?php echo $obj->image; ?>" alt=""></span>
                                        <span class="content">
                                            <span class="title"><?php echo $obj->title; ?></span>
                                            <span class="event-meta">
                                                <span class="info"><span class="icon"><i class="fas fa-user"></i></span> <?php echo $obj->event_for ? $obj->event_for : $this->lang->line('all'); ?> (<?php echo $this->lang->line('event_for'); ?>)</span>
                                                <span class="info"><span class="icon"><i class="far fa-calendar-alt"></i></span> <?php echo date($this->global_setting->date_format, strtotime($obj->event_from)); ?> (<?php echo $this->lang->line('start_date'); ?>)</span>
                                                <span class="info"><span class="icon"><i class="far fa-calendar-alt"></i></span> <?php echo date($this->global_setting->date_format, strtotime($obj->event_to)); ?> (<?php echo $this->lang->line('end_date'); ?>)</span>
                                                <span class="info"><span class="icon"><i class="fas fa-map-marker-alt"></i></span> <?php echo $obj->event_place; ?></span>
                                            </span>
                                        </span>
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