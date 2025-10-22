    <!--====== PAGE BANNER PART START ======-->
    
    <section id="page-banner" class="pt-105 pb-110 bg_cover" data-overlay="8" style="background-image: url(images/page-banner-1.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-banner-cont">
                        <h2><?php echo $this->lang->line('notice'); ?></h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo site_url(); ?>"><?php echo $this->lang->line('home'); ?></a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?php echo $this->lang->line('notices'); ?></li>
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
         <?php if(isset($notices) && !empty($notices)){ ?>
            <?php foreach($notices AS $obj){ ?>
            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="single-notice">
                    <h2 class="title"><a href="<?php echo site_url('notice-detail/'.$obj->id); ?>"><?php echo $obj->title; ?></a></h2>                    
                    <ul class="meta">
                        <li class="info"><span class="icon"><i class="fas fa-user"></i></span> <?php echo $this->lang->line('by'); ?> / <?php echo $obj->name; ?></li>
                        <li class="info"><span class="icon"><i class="far fa-calendar-alt"></i></span> <?php echo date($this->global_setting->date_format, strtotime($obj->date)); ?></li>
                    </ul>
                    <ul class="meta">
                        <li class="info"><span class="icon"><i class="fas fa-users"></i></span> <?php echo $this->lang->line('notice_for'); ?>: <?php echo $obj->notice_for ? $obj->notice_for : $this->lang->line('all'); ?></li>
                    </ul>
                    <p class="text"><?php echo substr($obj->notice, 0, 180); ?> ...</p>
                    <div class="more text-right">
                        <a href="<?php echo site_url('notice-detail/'.$obj->id); ?>" class="link glbscl-link-btn hvr-bs"><?php echo $this->lang->line('read_more'); ?></a>
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
