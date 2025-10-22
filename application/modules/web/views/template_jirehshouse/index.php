

<!-- Revolution slider start -->
<?php if(isset($sliders) && !empty($sliders)){ ?>
<div class="tp-banner-container">
  <div class="tp-banner">
    <ul>
       <?php foreach($sliders AS $obj ){ ?>
      <li data-slotamount="7" data-transition="3dcurtain-horizontal" data-masterspeed="1000" data-saveperformance="on"> <img alt="" src="<?php echo ASSET_URL; ?>jirehshouse/images/dummy.png" data-lazyload="<?php echo UPLOAD_PATH; ?>slider/<?php echo $obj->image; ?>">
        <div class="caption lft large-title tp-resizeme slidertext2" data-x="center" data-y="170" data-speed="600" data-start="1600"><span> <?php echo $obj->title; ?> </span></div>
        <div class="caption lfb large-title tp-resizeme slidertext3" data-x="center" data-y="260" data-speed="600" data-start="2200"> <?php echo $obj->note; ?> <br/> </div>
        <div class="caption lfb large-title tp-resizeme slidertext4" data-x="330" data-y="350" data-speed="600" data-start="2800"> <a href="index.html#"><i class="fas fa-edit"></i> Enroll Today</a> </div>
        <div class="caption lfb large-title tp-resizeme slidertext4 slidertext5" data-x="610" data-y="350" data-speed="600" data-start="3400"> <a href="index.html#"><i class="far fa-calendar-alt"></i> Schedule a Tour</a> </div>
      </li> <!--slotzoom-horizontal -->
      <?php } ?>
    </ul>
  </div>
</div>
<?php } ?>
<!-- Revolution slider end --> 

<!-- School Start -->
<div class="our-course-categories-two ">
  <div class="container">
    <div class="categories_wrap">
      <ul class="row unorderList">
        <li class="col-lg-3 col-md-6"> 
          <!-- single-course-categories -->
          <div class="categories-course">
            <div class="item-inner">
              <div class="cours-icon"> <span class="coure-icon-inner"> <img src="<?php echo ASSET_URL; ?>jirehshouse/<?php echo ASSET_URL; ?>jirehshouse/images/teacher.png" alt=""> </span> </div>
              <div class="cours-title">
                <h4>Expert teachers</h4>
                <p>Lorem ipsum dolor sit amet, adipiscing elit. Vivamus nibh dolor gravida at eleifend</p>
              </div>
            </div>
          </div>
          <!--// single-course-categories --> 
        </li>
        <li class="col-lg-3 col-md-6"> 
          <!-- single-course-categories -->
          <div class="categories-course">
            <div class="item-inner">
              <div class="cours-icon"> <span class="coure-icon-inner"> <img src="<?php echo ASSET_URL; ?>jirehshouse/images/book.png" alt=""> </span> </div>
              <div class="cours-title">
                <h4>Quality Education</h4>
                <p>Lorem ipsum dolor sit amet, adipiscing elit. Vivamus nibh dolor gravida at eleifend</p>
              </div>
            </div>
          </div>
          <!--// single-course-categories --> 
        </li>
        <li class="col-lg-3 col-md-6"> 
          <!-- single-course-categories -->
          <div class="categories-course" >
            <div class="item-inner">
              <div class="cours-icon"> <span class="coure-icon-inner"> <img src="<?php echo ASSET_URL; ?>jirehshouse/images/support.png" alt=""> </span> </div>
              <div class="cours-title">
                <h4>Life Time Support</h4>
                <p>Lorem ipsum dolor sit amet, adipiscing elit. Vivamus nibh dolor gravida at eleifend</p>
              </div>
            </div>
          </div>
          <!--// single-course-categories --> 
        </li>
        <li class="col-lg-3 col-md-6"> 
          <!-- single-course-categories -->
          <div class="categories-course">
            <div class="item-inner">
              <div class="cours-icon"> <span class="coure-icon-inner"> <img src="<?php echo ASSET_URL; ?>jirehshouse/images/scholarship.png" alt=""> </span> </div>
              <div class="cours-title">
                <h4>Scholarship News</h4>
                <p>Lorem ipsum dolor sit amet, adipiscing elit. Vivamus nibh dolor gravida at eleifend</p>
              </div>
            </div>
          </div>
          <!--// single-course-categories --> 
        </li>
      </ul>
    </div>
  </div>
</div>

<!-- School End --> 

<!-- About Start -->
<div class="about-wrap  " id="about">
  <div class="container">
    <div class="row">
      <div class="col-lg-7">
        <div class="aboutImg">
<?php if(isset($school->about_image) && !empty($school->about_image)){ ?>
                            <img src="<?php echo UPLOAD_PATH; ?>about/<?php echo $school->about_image; ?>" alt="">
                    <?php } ?>
        </div>
      </div>
      <div class="col-lg-5">
        <div class="about_box">
          <div class="title">
            <h1>Online Learing <span>PLatform</span></h1>
          </div>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus nibh dolor, gravida faucibus dolor consectetur, pulvinar rhoncus risus. Fusce vel rutrum mi.</p>
          <ul class="edu_list">
            <li>
              <div class="learing-wrp">
                <div class="edu_icon"><img src="<?php echo ASSET_URL; ?>jirehshouse/images/education.png" alt=""></div>
                <div class="learn_info">
                  <h3>Special Education</h3>
                  <p>Lorem ipsum dolor sit amet, adipiscing elit. Vivamus nibh dolor gravida at eleifend</p>
                </div>
              </div>
            </li>
            <li>
              <div class="learing-wrp">
                <div class="edu_icon"><img src="<?php echo ASSET_URL; ?>jirehshouse/images/class.png" alt=""></div>
                <div class="learn_info">
                  <h3>Honors classes</h3>
                  <p>Lorem ipsum dolor sit amet, adipiscing elit. Vivamus nibh dolor gravida at eleifend</p>
                </div>
              </div>
            </li>
            <li>
              <div class="learing-wrp">
                <div class="edu_icon"><img src="<?php echo ASSET_URL; ?>jirehshouse/images/academy.png" alt=""></div>
                <div class="learn_info">
                  <h3>Traditional academies</h3>
                  <p>Lorem ipsum dolor sit amet, adipiscing elit. Vivamus nibh dolor gravida at eleifend</p>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- About End --> 

<!-- Classes Start -->
<div class="class-wrap">
  <div class="container">
    <div class="title">
      <h1> Our Popular Classes </h1>
    </div>
    <ul class="owl-carousel  ">
      <li class="item">
        <div class="class_box">
          <div class="class_Img"><img src="<?php echo ASSET_URL; ?>jirehshouse/images/education_img.jpg" alt="">
            <div class="time_box"><span>08:00 am - 10:00 am</span></div>
          </div>
          <div class="path_box">
            <h3><a href="index.html#">Education Programs System</a></h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            <div class="students_box">
              <div class="students">Students: 30</div>
              <div class="stud_fee">Fee: $150</div>
            </div>
          </div>
        </div>
      </li>
      <li class="item">
        <div class="class_box">
          <div class="class_Img"><img src="<?php echo ASSET_URL; ?>jirehshouse/images/kid_game.jpg" alt="">
            <div class="time_box"><span>08:00 am - 10:00 am</span></div>
          </div>
          <div class="path_box">
            <h3><a href="index.html#">Games Program held in a Week</a></h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus nibh dolor.</p>
            <div class="students_box">
              <div class="students">Students: 30</div>
              <div class="stud_fee">Fee: $150</div>
            </div>
          </div>
        </div>
      </li>
      <li class="item">
        <div class="class_box">
          <div class="class_Img"><img src="<?php echo ASSET_URL; ?>jirehshouse/images/lab.jpg" alt="">
            <div class="time_box"><span>08:00 am - 10:00 am</span></div>
          </div>
          <div class="path_box">
            <h3><a href="index.html#">Labs Programs</a></h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus nibh dolor, gravida faucibus dolor adipiscing consectetur.</p>
            <div class="students_box">
              <div class="students">Students: 30</div>
              <div class="stud_fee">Fee: $150</div>
            </div>
          </div>
        </div>
      </li>
    </ul>
  </div>
</div>
<!-- Classes End --> 

<!-- Choice Start -->
<div class="choice-wrap ">
  <div class="container">
    <div class="title">
      <h1>We Are The Best <span>Choice For Your Child</span></h1>
    </div>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam at eleifend est. Donec dictum at diam ut finibus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aliquam diam magna, condimentum in nibh sed, mattis fermentum diam.</p>
    <div class="readmore"><a href="index.html#">Contact Us</a></div>
  </div>
</div>
<!-- Choice End --> 

<!-- Video Start -->
<div class="video-wrap  ">
  <div class="container">
    <div class="title center_title">
      <h1>Watch Our Video</h1>
    </div>
    <div class="video">
      <div class="playbtn"><a data-fancybox="" href="https://youtu.be/PZY-hB2C_Iw"><span></span></a></div>
    </div>
  </div>
</div>
<!-- Video End --> 

<!-- Gallery Start -->
<div class="gallery-wrap ">
  <div class="container">
    <div class="row">
      <div class="col-lg-3">
        <div class="gallery_box">
          <div class="gallery_left">
            <div class="title">
              <h1>Photo Gallery</h1>
            </div>
            <p>Lorem ipsum dolor sit amet, adipiscing elit. Vivamus nibh dolor, gravida faucibus dolor consectetur.</p>
            <div class="readmore"><a href="index.html#">View All Gallery</a></div>
          </div>
        </div>
      </div>
      <div class="col-lg-9">
        <div class="row">
          <div class="col-lg-4 col-md-6">
            <div class="galleryImg"><img src="<?php echo ASSET_URL; ?>jirehshouse/images/gallery-1.jpg" alt="">
              <div class="portfolio-overley">
                <div class="content"> <a href="<?php echo ASSET_URL; ?>jirehshouse/images/gallery-1.jpg" class="fancybox image-link" data-fancybox="images" title="Image Caption Here"><i class="fas fa-search-plus"></i></a> </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="galleryImg"><img src="<?php echo ASSET_URL; ?>jirehshouse/images/gallery-2.jpg" alt="">
              <div class="portfolio-overley">
                <div class="content"> <a href="<?php echo ASSET_URL; ?>jirehshouse/images/gallery-2.jpg" class="fancybox image-link" data-fancybox="images" title="Image Caption Here"><i class="fas fa-search-plus"></i></a> </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="galleryImg"><img src="<?php echo ASSET_URL; ?>jirehshouse/images/gallery-3.jpg" alt="">
              <div class="portfolio-overley">
                <div class="content"> <a href="<?php echo ASSET_URL; ?>jirehshouse/images/gallery-3.jpg" class="fancybox image-link" data-fancybox="images" title="Image Caption Here"><i class="fas fa-search-plus"></i></a> </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="galleryImg"><img src="<?php echo ASSET_URL; ?>jirehshouse/images/gallery-4.jpg" alt="">
              <div class="portfolio-overley">
                <div class="content"> <a href="<?php echo ASSET_URL; ?>jirehshouse/images/gallery-4.jpg" class="fancybox image-link" data-fancybox="images" title="Image Caption Here"><i class="fas fa-search-plus"></i></a> </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="galleryImg"><img src="<?php echo ASSET_URL; ?>jirehshouse/images/gallery-5.jpg" alt="">
              <div class="portfolio-overley">
                <div class="content"> <a href="<?php echo ASSET_URL; ?>jirehshouse/images/gallery-5.jpg" class="fancybox image-link" data-fancybox="images" title="Image Caption Here"><i class="fas fa-search-plus"></i></a> </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="galleryImg"><img src="<?php echo ASSET_URL; ?>jirehshouse/images/gallery-6.jpg" alt="">
              <div class="portfolio-overley">
                <div class="content"> <a href="<?php echo ASSET_URL; ?>jirehshouse/images/gallery-6.jpg" class="fancybox image-link" data-fancybox="images" title="Image Caption Here"><i class="fas fa-search-plus"></i></a> </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Gallery End --> 

<!-- Testimonials Start -->
<div class="testimonials-wrap ">
  <div class="container">
    <div class="title">
      <p>Testimoinials</p>
      <h1> What Parents Say </h1>
    </div>
    <ul class="owl-carousel testimonials_list unorderList">
      <li class="item">
        <div class="testimonials_sec">
          <div class="client_box">
            <div class="clientImg"><img alt="" src="<?php echo ASSET_URL; ?>jirehshouse/images/comment-img-1.jpg"></div>
            <ul class="unorderList starWrp">
              <li><i class="fas fa-star"></i></li>
              <li><i class="fas fa-star"></i></li>
              <li><i class="fas fa-star"></i></li>
              <li><i class="fas fa-star"></i></li>
              <li><i class="fas fa-star"></i></li>
            </ul>
          </div>
          <p>Lorem ipsum dolor sit amet, consectetur elit. Phasellus porttitor leo id tortor cursus, a gravida sem feugiat. Maecenas nisl libero, lobortis id hendrerit sed, fermentum ut nunc. Duis condimentum tincidunt posuere.</p>
          <h3>David Malan <span>Aliquam sodales</span></h3>
          <div class="quote_icon"><i class="fas fa-quote-left"></i></div>
        </div>
      </li>
      <li class="item">
        <div class="testimonials_sec">
          <div class="client_box">
            <div class="clientImg"><img alt="" src="<?php echo ASSET_URL; ?>jirehshouse/images/comment-img-2.jpg"></div>
            <ul class="unorderList starWrp">
              <li><i class="fas fa-star"></i></li>
              <li><i class="fas fa-star"></i></li>
              <li><i class="fas fa-star"></i></li>
              <li><i class="fas fa-star"></i></li>
              <li><i class="fas fa-star"></i></li>
            </ul>
          </div>
          <p>Lorem ipsum dolor sit amet, consectetur elit. Phasellus porttitor leo id tortor cursus, a gravida sem feugiat. Maecenas nisl libero, lobortis id hendrerit sed, fermentum ut nunc. Duis condimentum tincidunt posuere. </p>
          <h3>David Malan <span>Aliquam sodales</span></h3>
          <div class="quote_icon"><i class="fas fa-quote-left"></i></div>
        </div>
      </li>
      <li class="item">
        <div class="testimonials_sec">
          <div class="client_box">
            <div class="clientImg"><img alt="" src="<?php echo ASSET_URL; ?>jirehshouse/images/comment-img-3.jpg"></div>
            <ul class="unorderList starWrp">
              <li><i class="fas fa-star"></i></li>
              <li><i class="fas fa-star"></i></li>
              <li><i class="fas fa-star"></i></li>
              <li><i class="fas fa-star"></i></li>
              <li><i class="fas fa-star"></i></li>
            </ul>
          </div>
          <p>Lorem ipsum dolor sit amet, consectetur elit. Phasellus porttitor leo id tortor cursus, a gravida sem feugiat. Maecenas nisl libero, lobortis id hendrerit sed, fermentum ut nunc. Duis condimentum tincidunt posuere.</p>
          <h3>David Malan <span>Aliquam sodales</span></h3>
          <div class="quote_icon"><i class="fas fa-quote-left"></i></div>
        </div>
      </li>
      <li class="item">
        <div class="testimonials_sec">
          <div class="client_box">
            <div class="clientImg"><img alt="" src="<?php echo ASSET_URL; ?>jirehshouse/images/comment-img-1.jpg"></div>
            <ul class="unorderList starWrp">
              <li><i class="fas fa-star"></i></li>
              <li><i class="fas fa-star"></i></li>
              <li><i class="fas fa-star"></i></li>
              <li><i class="fas fa-star"></i></li>
              <li><i class="fas fa-star"></i></li>
            </ul>
          </div>
          <p>Lorem ipsum dolor sit amet, consectetur elit. Phasellus porttitor leo id tortor cursus, a gravida sem feugiat. Maecenas nisl libero, lobortis id hendrerit sed, fermentum ut nunc. Duis condimentum tincidunt posuere.</p>
          <h3>David Malan <span>Aliquam sodales</span></h3>
          <div class="quote_icon"><i class="fas fa-quote-left"></i></div>
        </div>
      </li>
    </ul>
  </div>
</div>
<!-- Testimonials End --> 

<!-- Enroll Start -->
<div class="choice-wrap enroll-wrap">
  <div class="container">
    <div class="title">
      <h1>Call To Enroll Your Child</h1>
    </div>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam at eleifend est. Donec dictum at diam ut finibus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Class aptent taciti sociosqu ad litora torquent.</p>
    <div class="phonewrp"><img src="<?php echo ASSET_URL; ?>jirehshouse/images/phone_icon.png" alt=""><a href="index.html#">(770) 132 4657</a></div>
  </div>
</div>
<!-- Enroll End --> 

<!-- Teacher Start -->
<section class="teachers-area-three teacher-wrap pt-100 pb-70  ">
  <div class="container">
    <div class="title center_title">
      <h1>Our Teachers</h1>
    </div>
    <div class="row">
      <div class="col-lg-3 col-sm-6">
        <div class="single-teachers">
          <div class="teacherImg"> <img src="<?php echo ASSET_URL; ?>jirehshouse/images/teachers01.jpg" alt="Image">
            <ul class="social-icons list-inline">
              <!-- social-icons -->
              <li class="social-facebook"> <a href="index.html#"><i class="fab fa-facebook-f" aria-hidden="true"></i></a> </li>
              <li class="social-twitter"> <a href="index.html"><i class="fab fa-twitter" aria-hidden="true"></i></a> </li>
              <li class="social-linkedin"> <a href="index.html#"><i class="fab fa-linkedin-in" aria-hidden="true"></i></a> </li>
              <li class="social-googleplus"> <a href="index.html#"><i class="fab fa-instagram" aria-hidden="true"></i></a> </li>
            </ul>
          </div>
          <div class="teachers-content">
            <h3>Stella Roffin</h3>
            <div class="designation">Art teacher</div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-sm-6">
        <div class="single-teachers">
          <div class="teacherImg"> <img src="<?php echo ASSET_URL; ?>jirehshouse/images/teachers02.jpg" alt="Image">
            <ul class="social-icons list-inline">
              <!-- social-icons -->
              <li class="social-facebook"> <a href="index.html#"><i class="fab fa-facebook-f" aria-hidden="true"></i></a> </li>
              <li class="social-twitter"> <a href="index.html"><i class="fab fa-twitter" aria-hidden="true"></i></a> </li>
              <li class="social-linkedin"> <a href="index.html#"><i class="fab fa-linkedin-in" aria-hidden="true"></i></a> </li>
              <li class="social-googleplus"> <a href="index.html#"><i class="fab fa-instagram" aria-hidden="true"></i></a> </li>
            </ul>
          </div>
          <div class="teachers-content">
            <h3>Chris Miller</h3>
            <div class="designation">Mathematic</div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-sm-6">
        <div class="single-teachers">
          <div class="teacherImg"> <img src="<?php echo ASSET_URL; ?>jirehshouse/images/teachers03.jpg" alt="Image">
            <ul class="social-icons list-inline">
              <!-- social-icons -->
              <li class="social-facebook"> <a href="index.html#"><i class="fab fa-facebook-f" aria-hidden="true"></i></a> </li>
              <li class="social-twitter"> <a href="index.html"><i class="fab fa-twitter" aria-hidden="true"></i></a> </li>
              <li class="social-linkedin"> <a href="index.html#"><i class="fab fa-linkedin-in" aria-hidden="true"></i></a> </li>
              <li class="social-googleplus"> <a href="index.html#"><i class="fab fa-instagram" aria-hidden="true"></i></a> </li>
            </ul>
          </div>
          <div class="teachers-content">
            <h3>Jesica Matt</h3>
            <div class="designation">English Teacher</div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-sm-6">
        <div class="single-teachers">
          <div class="teacherImg"> <img src="<?php echo ASSET_URL; ?>jirehshouse/images/teachers04.jpg" alt="Image">
            <ul class="social-icons list-inline">
              <!-- social-icons -->
              <li class="social-facebook"> <a href="index.html#"><i class="fab fa-facebook-f" aria-hidden="true"></i></a> </li>
              <li class="social-twitter"> <a href="index.html"><i class="fab fa-twitter" aria-hidden="true"></i></a> </li>
              <li class="social-linkedin"> <a href="index.html#"><i class="fab fa-linkedin-in" aria-hidden="true"></i></a> </li>
              <li class="social-googleplus"> <a href="index.html#"><i class="fab fa-instagram" aria-hidden="true"></i></a> </li>
            </ul>
          </div>
          <div class="teachers-content">
            <h3>Lena Bodie</h3>
            <div class="designation">Science Teacher</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Teacher Start --> 

<!-- Blog Start -->
<?php if(isset($news) && !empty($news)){ ?>
<div class="blog-wrap flight-wrap ">
  <div class="container">
    <div class="title">
      <h1> Our Blog </h1>
    </div>
    <ul class="row unorderList">
      <?php foreach($news AS $obj){ ?>
      <li class="col-lg-4">
        <div class="blog_box">
          <div class="blogImg"><img src="<?php echo UPLOAD_PATH; ?>news/<?php echo $obj->image; ?>" alt="">
            <div class="time_box"><span>08:00 am - 10:00 am</span></div>
          </div>
          <div class="path_box">
        <h3><a href="<?php echo site_url('news-detail/'.$obj->id); ?>"><?php echo $obj->title; ?></a></h3>
            <p><?php echo substr($obj->news, 0, 180); ?> ...</p>
            <a class="link glbscl-link-btn hvr-bs" href="<?php echo site_url('news-detail/'.$obj->id); ?>"><?php echo $this->lang->line('read_more'); ?></a>
          </div>
        </div>
      </li>
      <?php } ?>
      

    </ul>
  </div>
</div>
<!-- Blog End --> 
<?php } ?>

<!--Newsletter Start-->
<div class="newsletter-wrap ">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <div class="title">
          <h1>Newsletter</h1>
        </div>
        <p>Lorem ipsum dolor sit amet consectetur.</p>
      </div>
      <div class="col-lg-6">
        <div class="news-info">
          <form>
            <div class="input-group">
              <input type="text" class="form-control" name="search" placeholder="Email Address">
              <div class="form_icon"><i class="fas fa-envelope"></i></div>
            </div>
            <button class="sigup">Sign Up</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!--Newsletter End--> 