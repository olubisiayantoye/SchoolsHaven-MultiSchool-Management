  
    <!--====== SEARCH BOX PART START ======-->
    
    <div class="search-box">
        <div class="search-form">
            <div class="closebtn">
                <span></span>
                <span></span>
            </div>
            <form action="#">
                <input type="text" placeholder="Search by keyword">
                <button><i class="fa fa-search"></i></button>
            </form>
        </div> <!-- search form -->
    </div>
    
    <!--====== SEARCH BOX PART ENDS ======-->
   
    <!--====== SLIDER PART START ======-->
    <?php if(isset($sliders) && !empty($sliders)){ ?>
    
    <section id="slider-part" class="slider-active ">
      <?php foreach($sliders AS $obj ){ ?>
        <div class="single-slider bg_cover pt-150" style="background-image: url(<?php echo UPLOAD_PATH; ?>slider/<?php echo $obj->image; ?>)" data-overlay="4">
            <div class="container">
                <div class="row">
                    <div class="col-xl-7 col-lg-9">
                        <div class="slider-cont">
                            <h1 data-animation="fadeInLeft" data-delay="1s">
                            <?php if(isset($obj->title) && !empty($obj->title)){ ?>
                                <?php echo substr($obj->title, 0, 150); ?>
                            <?php } ?>
                        
                        </h1>
                            <p data-animation="fadeInUp" data-delay="1.3s">
                            <?php if(isset($obj->note) && !empty($obj->note)){ ?>
                                <?php echo substr($obj->note, 0, 150); ?>
                            <?php } ?> 
                            </p>
                            <ul>
                                <li><a data-animation="fadeInUp" data-delay="1.6s" class="main-btn" href="<?php echo site_url('about'); ?>">Read More</a></li>
                                <li><a data-animation="fadeInUp" data-delay="1.9s" class="main-btn" href="<?php echo site_url('admission'); ?>"><?php echo $this->lang->line('admission'); ?> <?php echo $this->lang->line('now'); ?></a></li>
                            </ul>
                        </div>
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- single slider -->
       <?php } ?>    
    </section>
    
     <?php } ?> 
    <!--====== SLIDER PART ENDS ======-->
   
    <!--====== CATEGORY PART START ======-->
    
    
    
    <!--====== CATEGORY PART ENDS ======-->
   
    <!--====== ABOUT PART START ======-->
    <?php if(isset($school->about_text) && !empty($school->about_text)){ ?>
   
       <section id="about-part" class="about-tow pt-65">
        <div class="about-shape">
            <img src="images/about/shape.png" alt="">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="section-title mt-50">
                                                <h5>About us</h5>
                        <h2>Welcome to <?php if(isset($school->school_name)){ ?>
                            <?php echo $school->school_name; ?>
                        <?php }else{ ?>
                              <?php echo SMS; ?>
                        <?php } ?> </h2>

                        
                    </div> <!-- section title -->
                    <div class="about-cont">

                        <p><?php echo substr($school->about_text, 0, 550); ?></p>
                        <a href="#" class="main-btn mt-55">Learn More</a>
                    </div> <!-- about cont -->
                </div>
                <div class="col-lg-6 offset-lg-1 col-11 offset-1">
                    <div class="about-image-tow mt-55">
                        
                        <?php if(isset($school->about_image) && !empty($school->about_image)){ ?>
                            <img src="<?php echo UPLOAD_PATH; ?>about/<?php echo $school->about_image; ?>" alt="">
                      
                        <div class="about-shape-tow">
                            <img src="<?php echo ASSET_URL; ?>theme_bin/images/about/shape-2.png" alt="shape">
                        </div>
                        <div class="about-shape-three">
                         
                            <img src="<?php echo ASSET_URL; ?>theme_bin/images/about/shape-3.png" alt="shape">
                        </div>
                        <?php } ?> 
                    </div> <!-- about image tow -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
     <?php } ?> 
     
  
    
   
    <!--====== ABOUT PART ENDS ======-->
    
    
    
     <!--====== CATEGORY PART START ======-->
    
    <section id="category-part" class="pt-115 pb-120">
        <div class="container">
            <div class="category pt-40 pb-80">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="category-text pt-40">
                            <h2>Best platform to learn everything</h2>
                        </div>
                    </div>
                    <div class="col-lg-6 offset-lg-1 col-md-8 offset-md-2 col-sm-8 offset-sm-2 col-8 offset-2">
                        <div class="row category-slide mt-40">
                            <div class="col-lg-4">
                                <a href="#">
                                    <span class="single-category text-center color-1">
                                        <span class="icon">
                                            <img src="<?php echo ASSET_URL; ?>theme_bin/images/all-icon/ctg-1.png" alt="Icon">
                                        </span>
                                        <span class="cont">
                                            <span>Language</span>
                                        </span>
                                    </span> <!-- single category -->
                                </a>
                            </div>
                            <div class="col-lg-4">
                                <a href="#">
                                    <span class="single-category text-center color-2">
                                        <span class="icon">
                                            <img src="<?php echo ASSET_URL; ?>theme_bin/images/all-icon/ctg-2.png" alt="Icon">
                                        </span>
                                        <span class="cont">
                                            <span>Business</span>
                                        </span>
                                    </span> <!-- single category -->
                                </a>
                            </div>
                            <div class="col-lg-4">
                                <a href="#">
                                    <span class="single-category text-center color-3">
                                        <span class="icon">
                                            <img src="<?php echo ASSET_URL; ?>theme_bin/images/all-icon/ctg-3.png" alt="Icon">
                                        </span>
                                        <span class="cont">
                                            <span>Literature</span>
                                        </span>
                                    </span> <!-- single category -->
                                </a>
                            </div>
                            <div class="col-lg-4">
                                <a href="#">
                                    <span class="single-category text-center color-1">
                                        <span class="icon">
                                            <img src="<?php echo ASSET_URL; ?>theme_bin/images/all-icon/ctg-1.png" alt="Icon">
                                        </span>
                                        <span class="cont">
                                            <span>Language</span>
                                        </span>
                                    </span> <!-- single category -->
                                </a>
                            </div>
                            <div class="col-lg-4">
                                <a href="#">
                                    <span class="single-category text-center color-2">
                                        <span class="icon">
                                            <img src="<?php echo ASSET_URL; ?>theme_bin/images/all-icon/ctg-2.png" alt="Icon">
                                        </span>
                                        <span class="cont">
                                            <span>Business</span>
                                        </span>
                                    </span> <!-- single category -->
                                </a>
                            </div>
                            <div class="col-lg-4">
                                <a href="#">
                                    <span class="single-category text-center color-3">
                                        <span class="icon">
                                            <img src="<?php echo ASSET_URL; ?>theme_bin/images/all-icon/ctg-3.png" alt="Icon">
                                        </span>
                                        <span class="cont">
                                            <span>Literature</span>
                                        </span>
                                    </span> <!-- single category -->
                                </a>
                            </div>
                        </div> <!-- category slide -->
                    </div>
                </div> <!-- row -->
            </div> <!-- category -->
        </div> <!-- container -->
    </section>
    
        <!--====== CATEGORY PART ENDS ======-->

   
    <!--====== COURSE PART START ======-->
    
    
    
    <!--====== COURSE PART ENDS ======-->
   
    <!--====== VIDEO FEATURE PART START ======-->
    
    
    
    <!--====== VIDEO FEATURE PART ENDS ======-->
   
    <!--====== TEACHERS PART START ======-->
    
    
    
    <!--====== TEACHERS PART ENDS ======-->
   
    <!--====== PUBLICATION PART START ======-->
    
    
    
    <!--====== PUBLICATION PART ENDS ======-->
   <section id="publication-part" class="pt-115 pb-120 gray-bg">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-lg-6 col-md-8 col-sm-7">
                    <div class="section-title pb-60">
                        <h5>Publications</h5>
                        <h2>From Store </h2>
                    </div> <!-- section title -->
                </div>
                <div class="col-lg-6 col-md-4 col-sm-5">
                    <div class="products-btn text-right pb-60">
                        <a href="#" class="main-btn">All Products</a>
                    </div> <!-- products btn -->
                </div>
            </div> <!-- row -->
            <div class="row justify-content-center">
                <div class="col-lg-3 col-md-6 col-sm-8">
                    <div class="single-publication mt-30 text-center">
                        <div class="image">
                            <img src="<?php echo ASSET_URL; ?>theme_bin/images/publication/p-1.jpg" alt="Publication">
                            <div class="add-cart">
                                <ul>
                                    <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                    <li><a href="#"><i class="fa fa-heart-o"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="content pt-10">
                            <h5 class="book-title"><a href="#">Stones The Road </a></h5>
                            <p class="writer-name"><span>By</span> Scott Trench</p>
                            <div class="price-btn d-flex align-items-center justify-content-between">
                                <div class="price pt-20">
                                    <span class="discount-price">$250</span>
                                    <span class="normal-price">$200</span>
                                </div>
                                <div class="button pt-10">
                                    <a href="#" class="main-btn"><i class="fa fa-cart-plus"></i> Buy Now</a>
                                </div>
                            </div>
                        </div>
                    </div> <!-- single publication -->
                </div>
                <div class="col-lg-3 col-md-6 col-sm-8">
                    <div class="single-publication mt-30 text-center">
                        <div class="image">
                            <img src="<?php echo ASSET_URL; ?>theme_bin/images/publication/p-2.jpg" alt="Publication">
                            <div class="add-cart">
                                <ul>
                                    <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                    <li><a href="#"><i class="fa fa-heart-o"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="content pt-10">
                            <h5 class="book-title"><a href="#">The Stranded </a></h5>
                            <p class="writer-name"><span>By</span> Scott Trench</p>
                            <div class="price-btn d-flex align-items-center justify-content-between">
                                <div class="price pt-20">
                                    <span class="discount-price">$250</span>
                                    <span class="normal-price">$200</span>
                                </div>
                                <div class="button pt-10">
                                    <a href="#" class="main-btn"><i class="fa fa-cart-plus"></i> Buy Now</a>
                                </div>
                            </div>
                        </div>
                    </div> <!-- single publication -->
                </div>
                <div class="col-lg-3 col-md-6 col-sm-8">
                    <div class="single-publication mt-30 text-center">
                        <div class="image">
                            <img src="<?php echo ASSET_URL; ?>theme_bin/images/publication/p-3.jpg" alt="Publication">
                            <div class="add-cart">
                                <ul>
                                    <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                    <li><a href="#"><i class="fa fa-heart-o"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="content pt-10">
                            <h5 class="book-title"><a href="#">The Sicario </a></h5>
                            <p class="writer-name"><span>By</span> Scott Trench</p>
                            <div class="price-btn d-flex align-items-center justify-content-between">
                                <div class="price pt-20">
                                    <span class="discount-price">$250</span>
                                    <span class="normal-price">$200</span>
                                </div>
                                <div class="button pt-10">
                                    <a href="#" class="main-btn"><i class="fa fa-cart-plus"></i> Buy Now</a>
                                </div>
                            </div>
                        </div>
                    </div> <!-- single publication -->
                </div>
                <div class="col-lg-3 col-md-6 col-sm-8">
                    <div class="single-publication mt-30 text-center">
                        <div class="image">
                            <img src="<?php echo ASSET_URL; ?>theme_bin/images/publication/p-4.jpg" alt="Publication">
                            <div class="add-cart">
                                <ul>
                                    <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                    <li><a href="#"><i class="fa fa-heart-o"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="content pt-10">
                            <h5 class="book-title"><a href="#">There Were None </a></h5>
                            <p class="writer-name"><span>By</span> Scott Trench</p>
                            <div class="price-btn d-flex align-items-center justify-content-between">
                                <div class="price pt-20">
                                    <span class="discount-price">$250</span>
                                    <span class="normal-price">$200</span>
                                </div>
                                <div class="button pt-10">
                                    <a href="#" class="main-btn"><i class="fa fa-cart-plus"></i> Buy Now</a>
                                </div>
                            </div>
                        </div>
                    </div> <!-- single publication -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    <!--====== TEASTIMONIAL PART START ======-->
   <?php if(isset($feedbacks) && !empty($feedbacks)){ ?> 
    <section id="testimonial" class="bg_cover pt-115 pb-115" data-overlay="8" style="background-image: url(<?php echo ASSET_URL; ?>theme_bin/images/bg-2.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-title pb-40">
                        <h5>Testimonial</h5>
                        <h2>What they say</h2>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row testimonial-slide mt-40">
            <?php foreach($feedbacks AS $obj){ ?>
                <div class="col-lg-6">
                    <div class="single-testimonial">
                        <div class="testimonial-thum">
                        <?php if($obj->photo){ ?>
                                <img src="<?php echo UPLOAD_PATH; ?>guardian-photo/<?php echo $obj->photo; ?>" alt="">
                            <?php }else{ ?>
                                <img src="<?php echo IMG_URL; ?>default-user.png" alt="">
                            <?php } ?>
                            
                            <div class="quote">
                                <i class="fa fa-quote-right"></i>
                            </div>
                        </div>
                        <div class="testimonial-cont">
                            <p><?php echo $obj->feedback; ?> </p>
                            <h6><?php echo $obj->name; ?></h6>
                            <!--span>Bsc, Engineering</span-->
                        </div>
                    </div> <!-- single testimonial -->
                </div>
                <?php } ?>
                <div class="col-lg-6">
                    <div class="single-testimonial">
                        <div class="testimonial-thum">
                            <img src="images/testimonial/t-1.jpg" alt="Testimonial">
                            <div class="quote">
                                <i class="fa fa-quote-right"></i>
                            </div>
                        </div>
                        <div class="testimonial-cont">
                            <p>Aliquetn sollicitudirem quibibendum auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet sem nibh id elit sollicitudirem </p>
                            <h6>Rubina Helen</h6>
                            <span>Bsc, Engineering</span>
                        </div>
                    </div> <!-- single testimonial -->
                </div>
            </div> <!-- testimonial slide -->
            
        </div> <!-- container -->
    </section>
    
    <?php } ?>
    
    <!--====== TEASTIMONIAL PART ENDS ======-->
   
    <!--====== NEWS PART START ======-->
    <?php if(isset($news) && !empty($news)){ ?>
    
    
    <section id="news-part" class="pt-115 pb-110">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-title pb-50">
                        <h5>Latest News</h5>
                        <h2>From the news</h2>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="single-news mt-30">
                        <div class="news-thum pb-25">
                            <img src="<?php echo ASSET_URL; ?>theme_bin/images/news/n-1.jpg" alt="News">
                        </div>
                        <div class="news-cont">
                            <ul>
                                <li><a href="#"><i class="fa fa-calendar"></i>2 December 2018 </a></li>
                                <li><a href="#"> <span>By</span> Adam linn</a></li>
                            </ul>
                            <a href="blog-single.html"><h3>Tips to grade high cgpa in university life</h3></a>
                            <p>Lorem ipsum gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt .</p>
                        </div>
                    </div> <!-- single news -->
                </div>
                <div class="col-lg-6">
                <?php foreach($news AS $obj){ ?>
                    <div class="single-news news-list">
                    
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="news-thum mt-30">
                                    <img src="<?php echo UPLOAD_PATH; ?>news/<?php echo $obj->image; ?>" alt="News">
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="news-cont mt-30">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-calendar"></i><?php echo date($this->global_setting->date_format, strtotime($obj->date)); ?></a></li>
                                        <li><a href="#"> <span>By</span> <?php echo $obj->name; ?></a></li>
                                    </ul>
                                    <a href="<?php echo site_url('news-detail/'.$obj->id); ?>"><h3><?php echo $obj->title; ?></h3></a>
                                    <p><?php echo substr($obj->news, 0, 150); ?> ...</p>
                                </div>
                            </div>
                        </div> <!-- row -->
                    </div> <!-- single news -->
                 <?php } ?>
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    
    
    
    <?php } ?>
    
    <!--====== NEWS PART ENDS ======-->
   
    <!--====== PATNAR LOGO PART START ======-->
    
     
    
    <!--====== PATNAR LOGO PART ENDS ======-->