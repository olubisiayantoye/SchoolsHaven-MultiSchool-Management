    <!--====== PAGE BANNER PART START ======-->
    
    <section id="page-banner" class="pt-105 pb-110 bg_cover" data-overlay="8" style="background-image: url(images/page-banner-1.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-banner-cont">
                        <h2><?php echo $this->lang->line('event'); ?></h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><a href="<?php echo site_url(); ?>"><?php echo $this->lang->line('home'); ?></a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?php echo $this->lang->line('events'); ?></li>
                            </ol>
                        </nav>
                    </div>  <!-- page banner cont -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    
    <!--====== PAGE BANNER PART ENDS ======-->





<section class="page-event-area">
    <div class="container">
        <div class="row justify-content-center">
        <?php if(isset($events) && !empty($events)){ ?>
            <?php foreach($events AS $obj){ ?>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="single-event">
                    <div class="img">
                        <img src="<?php echo UPLOAD_PATH; ?>event/<?php echo $obj->image; ?>" alt="">
                    </div>
                    <div class="content">
                        <h2 class="title"><a href="<?php echo site_url('event-detail/'.$obj->id); ?>"><?php echo $obj->title; ?></a></h2>
                        <ul class="list">
                            <li class="info"><span class="icon"><i class="fas fa-user"></i></span><?php echo $obj->event_for ? $obj->event_for : $this->lang->line('all'); ?> (<?php echo $this->lang->line('event_for'); ?>)</li>
                            <li class="info"><span class="icon"><i class="far fa-calendar-alt"></i></span><?php echo date($this->global_setting->date_format, strtotime($obj->event_from)); ?> (<?php echo $this->lang->line('start_date'); ?>)</li>
                            <li class="info"><span class="icon"><i class="far fa-calendar-alt"></i></span><?php echo date($this->global_setting->date_format, strtotime($obj->event_to)); ?> (<?php echo $this->lang->line('end_date'); ?>)</li>
                            <li class="info"><span class="icon"><i class="fas fa-map-marker-alt"></i></span><?php echo $obj->event_place; ?></li>
                        </ul>
                        <div class="more text-center">
                            <a href="<?php echo site_url('event-detail/'.$obj->id); ?>" class="link glbscl-link-btn hvr-bs"><?php echo $this->lang->line('read_more'); ?></a>
                        </div>
                    </div>
                </div>
            </div>
           <?php } ?>
        <?php }else{ ?>
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <p class="text-center"><strong><?php echo $this->lang->line('no_data_found'); ?></strong></p>
            </div>
        <?php } ?>
        </div>
    </div>
</section>