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
                                <li class="breadcrumb-item active" aria-current="page"><?php echo $this->lang->line('holidays'); ?></li>
                            </ol>
                        </nav>
                    </div>  <!-- page banner cont -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    
    <!--====== PAGE BANNER PART ENDS ======-->







<section class="page-notice-area">
    <div class="container">
        <div class="row">
        <?php if(isset($holidays) && !empty($holidays)){ ?>
            <?php foreach($holidays as $obj ){ ?>
                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="single-notice">
                        <h2 class="title"><a href="<?php echo site_url('holiday-detail/'.$obj->id); ?>"><?php echo $obj->title; ?></a></h2>
                        <h5 class="date">
                            <span class="icon"><i class="far fa-calendar-alt"></i></span><span class="info"> <?php echo date($this->global_setting->date_format, strtotime($obj->date_from)); ?></span>
                            <span class="seprator"> ⇔ </span>
                            <span class="icon"><i class="far fa-calendar-alt"></i></span><span class="info"> <?php echo date($this->global_setting->date_format, strtotime($obj->date_to)); ?></span>
                        </h5>
                        <p class="text"><?php echo substr($obj->note, 0, 180); ?> ...</p>
                        <div class="more text-right">
                            <a href="<?php echo site_url('holiday-detail/'.$obj->id); ?>" class="link glbscl-link-btn hvr-bs"><?php echo $this->lang->line('read_more'); ?></a>
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