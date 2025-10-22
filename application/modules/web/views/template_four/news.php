    <!--====== PAGE BANNER PART START ======-->
    
    <section id="page-banner" class="pt-105 pb-110 bg_cover" data-overlay="8" style="background-image: url(images/page-banner-1.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-banner-cont">
                        <h2><?php echo $this->lang->line('news'); ?></h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo site_url(); ?>"><?php echo $this->lang->line('home'); ?></a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?php echo $this->lang->line('news'); ?></li>
                            </ol>
                        </nav>
                    </div>  <!-- page banner cont -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    
    <!--====== PAGE BANNER PART ENDS ======-->



<section class="page-news-area">
    <div class="container">
        <div class="row justify-content-center">
        <?php if(isset($news) && !empty($news)){ ?>
            <?php foreach($news AS $obj){ ?> 
             <div class="col-lg-4 col-md-6 col-sm-8 col-12">
                <div class="single-news">
                    <div class="img">
                        <img src="<?php echo UPLOAD_PATH; ?>news/<?php echo $obj->image; ?>" alt="">
                    </div>
                    <div class="content">
                        <ul class="meta">
                            <li class="info"><span class="icon"><i class="fas fa-user"></i></span><?php echo $this->lang->line('by'); ?> / <?php echo $obj->name; ?></li>
                            <li class="info"><span class="icon"><i class="far fa-calendar-alt"></i></span><?php echo date($this->global_setting->date_format, strtotime($obj->date)); ?></li>
                        </ul>
                        <h2 class="title"><a href="<?php echo site_url('news-detail/'.$obj->id); ?>"><?php echo $obj->title; ?></a></h2>
                        <p class="text">
                            <?php echo substr($obj->news, 0, 180); ?> ...
                        </p>
                        <div class="more text-right">
                            <a class="link glbscl-link-btn hvr-bs" href="<?php echo site_url('news-detail/'.$obj->id); ?>"><?php echo $this->lang->line('read_more'); ?></a>
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