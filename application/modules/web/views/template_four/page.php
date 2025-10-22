    <!--====== PAGE BANNER PART START ======-->
    
    <section id="page-banner" class="pt-105 pb-110 bg_cover" data-overlay="8" style="background-image: url(images/page-banner-1.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-banner-cont">
                        <h2><?php echo $page->page_title; ?></h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo site_url(); ?>"><?php echo $this->lang->line('home'); ?></a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?php echo $page->page_title; ?></li>
                            </ol>
                        </nav>
                    </div>  <!-- page banner cont -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    
    <!--====== PAGE BANNER PART ENDS ======-->



<?php if(isset($page) && !empty($page)){ ?>
<section class="top-banner-area">
    <div class="container">
        <div class="row">
            
            <?php if(isset($page->page_image) && !empty($page->page_image)){ ?>
            
                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="top-banner-content">                      
                        <!--<h2 class="title"><?php echo $page->page_title; ?>  </h2>-->
                        <p class="text">                        
                            <?php echo $page->page_description; ?>                       
                        </p>                     
                    </div>
                </div>            
                <div class="col-lg-6 col-md-6 col-sm-12 col-12 text-center">
                    <div class="top-banner-img">
                        <?php if(isset($page->page_image) && !empty($page->page_image)){ ?>
                                <img src="<?php echo UPLOAD_PATH; ?>page/<?php echo $page->page_image; ?>" alt="">
                        <?php } ?>                     
                    </div>
                </div>
            
            <?php }else{ ?>
            
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="top-banner-content">  
                        <!--<h2 class="title"><?php echo $page->page_title; ?>  </h2>-->
                        <p class="text">                        
                             <?php echo $page->page_description; ?>                       
                        </p>                    
                    </div>
                </div>  
            
            <?php } ?>
            
        </div>
    </div>
</section>
 <?php } ?> 
