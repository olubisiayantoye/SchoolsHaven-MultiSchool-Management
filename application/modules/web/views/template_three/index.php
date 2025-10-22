 <!--SLIDER-->
 <?php if(isset($sliders) && !empty($sliders)){ ?>
    <section>
        <div class="csi-slider csi-simple-slider">
            <div class="csi-banner-style">
                <div class="csi-inner">

                    <div id="csi-main-slider" class="owl-carousel">

                        <!--SLIDER ITEM 1-->
                       <?php foreach($sliders AS $obj ){ ?>
                        <div class="csi-item-common csi-item-left">

                            <div class="col-sm-12g">
                                <div class="slider-text-single">
                                    <figure>
                                        <img src="<?php echo UPLOAD_PATH; ?>slider/<?php echo $obj->image; ?>" alt=""/>
                                        <figcaption>
                                            <div class="figcaption-inner csi-fadeInRight-img">
                                                <div class="csi-container">
                                                    <div class="csi-hover-link">
                                                        <div class="csi-vertical">
                                                            <div class="csi-banner-content">
                                                                <h3 class="csi-subtitle"><?php if(isset($school->school_name)){ ?>
                            <?php echo $school->school_name; ?>
                        <?php }else{ ?>
                              <?php echo SMS; ?>
                        <?php } ?></h3>
                                                                <h2 class="csi-title"><?php if(isset($obj->title) && !empty($obj->title)){ ?>
                                <?php echo substr($obj->title, 0, 150); ?>
                            <?php } ?></h2>
                                                                <p class="text">
                                                                 <?php if(isset($obj->note) && !empty($obj->note)){ ?>
                                <?php echo substr($obj->note, 0, 150); ?>
                            <?php } ?> </p>
                                                                <div class="btn-area">
                                                                    <a class="csi-btn" href="<?php echo site_url('admission'); ?>">Resister now</a>
                                                                    <a class="csi-btn csi-btn-brand" href="<?php echo site_url('about'); ?>">Read More</a>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </div>
                            </div> <!--//.col-->
                        </div>
                        <!--SLIDER ITEM 1 End-->
						<?php } ?>
                       
                    </div> <!--//.csi-main-slider-->
                    <!-- //.CONTAINER -->
                </div>
                <!-- //.INNER -->
            </div>
        </div>
    </section>
  <?php } ?>
    <!--SLIDER END-->


    <!--ABOUT-->
    <section>
        <div id="csi-about" class="csi-about">
            <div class="csi-inner">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="csi-about-img">
                                 <?php if(isset($school->about_image) && !empty($school->about_image)){ ?>
                            <img src="<?php echo UPLOAD_PATH; ?>about/<?php echo $school->about_image; ?>" alt="">
                    <?php } ?>    
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="csi-heading">
                                <h2 class="title"><?php echo $this->lang->line('welcome_to'); ?></h2>
                            </div>
                            <div class="csi-about-content">
                                <h3 class="title"> <?php if(isset($school->school_name)){ ?>
                            <?php echo $school->school_name; ?>
                        <?php }else{ ?>
                              <?php echo SMS; ?>
                        <?php } ?></h3>
                                <p class="text">
                                    <?php echo substr($school->about_text, 0, 550); ?>
                                </p>
                                <a class="csi-btn" href="<?php echo site_url('about'); ?>">Read More</a>
                            </div>
                        </div>
                    </div>
                </div><!-- //.CONTAINER -->
            </div><!-- //.INNER -->
        </div>
    </section>
    <!--ABOUT END-->


    <!--SERVICE-->
    <section>
        <div id="csi-services" class="csi-services">
            <div class="csi-inner">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-4">
                            <div class="csi-single-service">
                                <span class="icon"><i class="icofont icofont-ui-video-play"></i></span>
                                <h2 class="title"><a href="#">Free Tutorials</a></h2>
                                <p>Etiam vel ante ac lacus vestibulum rutrum. Aliquam vehicula, massa in auctor dapibus commodo quis vehicula lacus metus sed justo. </p>
                                <a class="csi-btn-simple" href="#">Read More</a>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4">
                            <div class="csi-single-service">
                                <span class="icon"><i class="icofont icofont-education"></i></span>
                                <h2 class="title"><a href="#">500+ Courses</a></h2>
                                <p>Etiam vel ante ac lacus vestibulum rutrum. Aliquam vehicula, massa in auctor dapibus commodo quis vehicula lacus metus sed justo. </p>
                                <a class="csi-btn-simple" href="#">Read More</a>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4">
                            <div class="csi-single-service">
                                <span class="icon"><i class="icofont icofont-book-alt"></i></span>
                                <h2 class="title"><a href="#">180k Books Available</a></h2>
                                <p>Etiam vel ante ac lacus vestibulum rutrum. Aliquam vehicula, massa in auctor dapibus commodo quis vehicula lacus metus sed justo. </p>
                                <a class="csi-btn-simple" href="#">Read More</a>
                            </div>
                        </div>
                    </div>
                </div><!-- //.CONTAINER -->
            </div><!-- //.INNER -->
        </div>
    </section>
    <!--SERVICE END-->



    <!--COURSES-->
    <section>
        <div id="csi-courses" class="csi-courses">
            <div class="csi-inner">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="csi-heading">
                                <h2 class="title">Explore all Courses</h2>
                                <h3 class="subtitle">We have step by step tutorials & instructions</h3>
                            </div>
                        </div>
                    </div>
                    <div class="csi-course-content">
                        <div class="row">
                            <div class="csi-single-course">
                                <div class="csi-single-course-inner">
                                    <figure>
                                        <img src="<?php echo ASSET_URL; ?>theme_edu/assets/img/courses/cours1.jpg" alt="cours">
                                        <figcaption>
                                            <div class="csi-hover-link">
                                                <div class="csi-vertical">
                                                    <a href="#"><i class="icofont icofont-plus"></i></a>
                                                </div>
                                            </div>
                                        </figcaption>
                                    </figure>
                                    <div class="course-info">
                                        <h3 class="title"><a href="#">Web Designing</a></h3>
                                        <p class="text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium natus error</p>
                                        <ul class="list-unstyled">
                                            <li>4 Months(16weeks)</li>
                                            <li>3 sessions of 2 hours in a week.</li>
                                        </ul>
                                        <a class="csi-btn registration-btn" href="#">Registration</a>
                                    </div>
                                </div>
                            </div> <!-- //.Single Course -->
                            <div class="csi-single-course">
                                <div class="csi-single-course-inner">
                                    <figure>
                                        <img src="<?php echo ASSET_URL; ?>theme_edu/assets/img/courses/cours2.jpg" alt="cours">
                                        <figcaption>
                                            <div class="csi-hover-link">
                                                <div class="csi-vertical">
                                                    <a href="#"><i class="icofont icofont-plus"></i></a>
                                                </div>
                                            </div>
                                        </figcaption>
                                    </figure>
                                    <div class="course-info">
                                        <h3 class="title"><a href="#">Material Engineering</a></h3>
                                        <p class="text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium natus error</p>
                                        <ul class="list-unstyled">
                                            <li>4 Months(16weeks)</li>
                                            <li>3 sessions of 2 hours in a week.</li>
                                        </ul>
                                        <a class="csi-btn registration-btn" href="#">Registration</a>
                                    </div>
                                </div>
                            </div> <!-- //.Single Course -->
                            <div class="csi-single-course">
                                <div class="csi-single-course-inner">
                                    <figure>
                                        <img src="<?php echo ASSET_URL; ?>theme_edu/assets/img/courses/cours3.jpg" alt="cours">
                                        <figcaption>
                                            <div class="csi-hover-link">
                                                <div class="csi-vertical">
                                                    <a href="#"><i class="icofont icofont-plus"></i></a>
                                                </div>
                                            </div>
                                        </figcaption>
                                    </figure>
                                    <div class="course-info">
                                        <h3 class="title"><a href="#">Process Engineering</a></h3>
                                        <p class="text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium natus error</p>
                                        <ul class="list-unstyled">
                                            <li>4 Months(16weeks)</li>
                                            <li>3 sessions of 2 hours in a week.</li>
                                        </ul>
                                        <a class="csi-btn registration-btn" href="#">Registration</a>
                                    </div>
                                </div>
                            </div> <!-- //.Single Course -->
                            <div class="csi-single-course">
                                <div class="csi-single-course-inner">
                                    <figure>
                                        <img src="<?php echo ASSET_URL; ?>theme_edu/assets/img/courses/cours4.jpg" alt="cours">
                                        <figcaption>
                                            <div class="csi-hover-link">
                                                <div class="csi-vertical">
                                                    <a href="#"><i class="icofont icofont-plus"></i></a>
                                                </div>
                                            </div>
                                        </figcaption>
                                    </figure>
                                    <div class="course-info">
                                        <h3 class="title"><a href="#">Mobile Application</a></h3>
                                        <p class="text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium natus error</p>
                                        <ul class="list-unstyled">
                                            <li>4 Months(16weeks)</li>
                                            <li>3 sessions of 2 hours in a week.</li>
                                        </ul>
                                        <a class="csi-btn registration-btn" href="#">Registration</a>
                                    </div>
                                </div>
                            </div> <!-- //.Single Course -->
                            <div class="csi-single-course">
                                <div class="csi-single-course-inner">
                                    <figure>
                                        <img src="<?php echo ASSET_URL; ?>theme_edu/assets/img/courses/cours5.jpg" alt="cours">
                                        <figcaption>
                                            <div class="csi-hover-link">
                                                <div class="csi-vertical">
                                                    <a href="#"><i class="icofont icofont-plus"></i></a>
                                                </div>
                                            </div>
                                        </figcaption>
                                    </figure>
                                    <div class="course-info">
                                        <h3 class="title"><a href="#">Corrosion Engineering</a></h3>
                                        <p class="text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium natus error</p>
                                        <ul class="list-unstyled">
                                            <li>4 Months(16weeks)</li>
                                            <li>3 sessions of 2 hours in a week.</li>
                                        </ul>
                                        <a class="csi-btn registration-btn" href="#">Registration</a>
                                    </div>
                                </div>
                            </div> <!-- //.Single Course -->
                            <div class="csi-single-course">
                                <div class="csi-single-course-inner">
                                    <figure>
                                        <img src="<?php echo ASSET_URL; ?>theme_edu/assets/img/courses/cours1.jpg" alt="cours">
                                        <figcaption>
                                            <div class="csi-hover-link">
                                                <div class="csi-vertical">
                                                    <a href="#"><i class="icofont icofont-plus"></i></a>
                                                </div>
                                            </div>
                                        </figcaption>
                                    </figure>
                                    <div class="course-info">
                                        <h3 class="title"><a href="#">Web Designing</a></h3>
                                        <p class="text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium natus error</p>
                                        <ul class="list-unstyled">
                                            <li>4 Months(16weeks)</li>
                                            <li>3 sessions of 2 hours in a week.</li>
                                        </ul>
                                        <a class="csi-btn registration-btn" href="#">Registration</a>
                                    </div>
                                </div>
                            </div> <!-- //.Single Course -->
                        </div> <!-- //.Course Content Area-->
                    </div>
                </div><!-- //.CONTAINER -->
            </div><!-- //.INNER -->
        </div>
    </section>
    <!--COURSES END-->




    <!--REGISTRATION-->
    <section>
        <div id="csi-registration" class="csi-registration">
            <div class="csi-inner">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-10 col-md-7">
                            <div class="csi-heading-registration">
                                <h3 class="subtitle">You’re Learning Free</h3>
                                <h2 class="title">Started Today!</h2>
                            </div>
                            <div class="csi-registration-info">
                                <p class="text">Mauris sagittis felis vitae augue posuere fringilla. Nulla tincidunt, magna non sceleris tempor, libero arcu tempor erat, quis imperdiet mi purus eget arcu. Sed luctus viverra libero, non rutrum ligula volutpat a. Etiam commodo bibendum elit at vestibulum</p>
                                <a class="csi-btn registration-btn" href="#">Registration</a>
                            </div>
                        </div>
                    </div>
                </div><!-- //.CONTAINER -->
            </div><!-- //.INNER -->
        </div>
    </section>
    <!--REGISTRATION END-->



    <!--TEACHERS-->
    <section>
        <div id="csi-teachers" class="csi-teachers">
            <div class="csi-inner">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="csi-heading">
                                <h2 class="title">Expert Teachers</h2>
                                <h3 class="subtitle">Some Special Teachers From The Industry!</h3>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div id="csi-owlteachers" class="owl-carousel csi-owlteachers">
                            <div class="item">
                                <div class="csi-single-teacher">
                                    <figure>
                                        <img src="<?php echo ASSET_URL; ?>theme_edu/assets/img/teachers/teacher1.jpg" alt="">
                                        <figcaption>
                                            <div class="csi-hover-link">
                                                <div class="csi-vertical">
                                                    <a href="#"><i class="icofont icofont-plus"></i></a>
                                                </div>
                                            </div>
                                        </figcaption>
                                    </figure>
                                    <div class="teacher-info">
                                        <h2 class="name"><a href="#">Matt Macfarlane</a></h2>
                                        <h4 class="designation">Software Engineer</h4>
                                        <ul class="list-inline ">
                                            <li><a href="#"><i class="icofont icofont-social-twitter"></i></a></li>
                                            <li><a href="#"><i class="icofont icofont-social-facebook"></i></a></li>
                                            <li><a href="#"><i class="icofont icofont-social-skype"></i></a></li>
                                            <li><a href="#"><i class="icofont icofont-social-whatsapp"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div> <!--//.Item-->
                            <div class="item">
                                <div class="csi-single-teacher">
                                    <figure>
                                        <img src="<?php echo ASSET_URL; ?>theme_edu/assets/img/teachers/teacher2.jpg" alt="">
                                        <figcaption>
                                            <div class="csi-hover-link">
                                                <div class="csi-vertical">
                                                    <a href="#"><i class="icofont icofont-plus"></i></a>
                                                </div>
                                            </div>
                                        </figcaption>
                                    </figure>
                                    <div class="teacher-info">
                                        <h2 class="name"><a href="#">Matt Macfarlane</a></h2>
                                        <h4 class="designation">Software Engineer</h4>
                                        <ul class="list-inline ">
                                            <li><a href="#"><i class="icofont icofont-social-twitter"></i></a></li>
                                            <li><a href="#"><i class="icofont icofont-social-facebook"></i></a></li>
                                            <li><a href="#"><i class="icofont icofont-social-skype"></i></a></li>
                                            <li><a href="#"><i class="icofont icofont-social-whatsapp"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div> <!--//.Item-->
                            <div class="item">
                                <div class="csi-single-teacher">
                                    <figure>
                                        <img src="<?php echo ASSET_URL; ?>theme_edu/assets/img/teachers/teacher3.jpg" alt="">
                                        <figcaption>
                                            <div class="csi-hover-link">
                                                <div class="csi-vertical">
                                                    <a href="#"><i class="icofont icofont-plus"></i></a>
                                                </div>
                                            </div>
                                        </figcaption>
                                    </figure>
                                    <div class="teacher-info">
                                        <h2 class="name"><a href="#">Matt Macfarlane</a></h2>
                                        <h4 class="designation">Software Engineer</h4>
                                        <ul class="list-inline ">
                                            <li><a href="#"><i class="icofont icofont-social-twitter"></i></a></li>
                                            <li><a href="#"><i class="icofont icofont-social-facebook"></i></a></li>
                                            <li><a href="#"><i class="icofont icofont-social-skype"></i></a></li>
                                            <li><a href="#"><i class="icofont icofont-social-whatsapp"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div> <!--//.Item-->
                        </div><!--l//#csi-OWL TESTIMONIAL-->
                    </div>
                </div><!-- //.CONTAINER -->
            </div><!-- //.INNER -->
        </div>
    </section>
    <!--TEACHERS END-->



    <!--EVENTS-->
    <section>
        <div id="csi-events" class="csi-events">
            <div class="csi-inner">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="csi-heading">
                                <h2 class="title">Updating Events</h2>
                                <h3 class="subtitle">Our Upcoming Seminars/Events Dont Miss Out!</h3>
                            </div>
                        </div>
                    </div>
                    <!--//.ROW-->
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="csi-news-area">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="csi-single-event">
                                            <figure>
                                                <a href="#"><img src="<?php echo ASSET_URL; ?>theme_edu/assets/img/news/news1.jpg" alt="featured event"></a>
                                                <figcaption>
                                                    <div class="figcaption">
                                                    </div>
                                                    <div class="event-info">
                                                        <div class="date">
                                                            <h4>12<span>jan</span></h4>
                                                        </div>
                                                        <div class="info-right">
                                                            <p class="time">6:30 AM - 5:00 PM</p>
                                                            <h4 class="location">Swick Hill Street, Charlotte, UK</h4>
                                                            <h3 class="title"><a href="#">Those Other College Expenses You Aren't Thinking About</a></h3>
                                                        </div>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="csi-single-event">
                                            <figure>
                                                <a href="#"><img src="<?php echo ASSET_URL; ?>theme_edu/assets/img/news/news2.jpg" alt="featured event"></a>
                                                <figcaption>
                                                    <div class="figcaption">
                                                    </div>
                                                    <div class="event-info">
                                                        <div class="date">
                                                            <h4>12<span>jan</span></h4>
                                                        </div>
                                                        <div class="info-right">
                                                            <p class="time">6:30 AM - 5:00 PM</p>
                                                            <h4 class="location">Swick Hill Street, Charlotte, UK</h4>
                                                            <h3 class="title"><a href="#">Guest Interview will Occur Goon</a></h3>
                                                        </div>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--//.ROW-->
                </div>
                <!-- //.CONTAINER -->
            </div>
            <!-- //.INNER -->
        </div>
    </section>
    <!--EVENTS END-->



    <!--TESTIMONIALS-->
    <section>
        <div id="csi-testimonials" class="csi-testimonials">
            <div class="csi-inner">
                <div class="container">
                    <div id="csi-owltestimonial" class="owl-carousel csi-owltestimonial">

                        <div class="item">
                            <!--Testimonial single-->
                            <div class="csi-testi-single">
                                <figure class="csi-client-image">
                                    <img src="<?php echo ASSET_URL; ?>theme_edu/assets/img/client1.jpg" alt="testpersion1"/>
                                </figure>
                                <div class="testi-info-area">
                                    <i class="icofont icofont-quote-left"></i>
                                    <p class="csi-review">
                                        Integer porta orci elit, et tincidunt ante cursus a. Morbi nisl ipsum, egestas sit amet sem at, efficitur consectetur ligula. Praesent scelerisque est nec diam cursus, accumsan gravida dui eleifend. Maecenas vel vestibulum est. Proin ultricies arcu at dapibus tincidunt. Etiam non finibus metus. Morbi justo dui, rutrum eu ornare at, ornare et lacus. Orci varius natoque penatibus et magnis
                                    </p>
                                    <h4 class="csi-client-name">Jonathon Doe</h4>
                                    <h5 class="csi-client-des">Head Teacher</h5>
                                </div>
                            </div> <!--//.Testimonial single-->
                        </div> <!--//.Item-->
                        <div class="item">
                            <!--Testimonial single-->
                            <div class="csi-testi-single">
                                <figure class="csi-client-image">
                                    <img src="<?php echo ASSET_URL; ?>theme_edu/assets/img/client2.jpg" alt="testpersion"/>
                                </figure>
                                <div class="testi-info-area">
                                    <i class="icofont icofont-quote-left"></i>
                                    <p class="csi-review">
                                        Integer porta orci elit, et tincidunt ante cursus a. Morbi nisl ipsum, egestas sit amet sem at, efficitur consectetur ligula. Praesent scelerisque est nec diam cursus, accumsan gravida dui eleifend. Maecenas vel vestibulum est. Proin ultricies arcu at dapibus tincidunt. Etiam non finibus metus. Morbi justo dui, rutrum eu ornare at, ornare et lacus. Orci varius natoque penatibus et magnis
                                    </p>
                                    <h4 class="csi-client-name">Jonathon Doe</h4>
                                    <h5 class="csi-client-des">Head Teacher</h5>
                                </div>
                            </div> <!--//.Testimonial single-->
                        </div> <!--//.Item-->
                        <div class="item">
                            <!--Testimonial single-->
                            <div class="csi-testi-single">
                                <figure class="csi-client-image">
                                    <img src="<?php echo ASSET_URL; ?>theme_edu/assets/img/client3.jpg" alt="testpersion"/>
                                </figure>
                                <div class="testi-info-area">
                                    <i class="icofont icofont-quote-left"></i>
                                    <p class="csi-review">
                                        Integer porta orci elit, et tincidunt ante cursus a. Morbi nisl ipsum, egestas sit amet sem at, efficitur consectetur ligula. Praesent scelerisque est nec diam cursus, accumsan gravida dui eleifend. Maecenas vel vestibulum est. Proin ultricies arcu at dapibus tincidunt. Etiam non finibus metus. Morbi justo dui, rutrum eu ornare at, ornare et lacus. Orci varius natoque penatibus et magnis
                                    </p>
                                    <h4 class="csi-client-name">Jonathon Doe</h4>
                                    <h5 class="csi-client-des">Head Teacher</h5>
                                </div>
                            </div> <!--//.Testimonial single-->
                        </div> <!--//.Item-->
                    </div><!--l//#csi-OWL TESTIMONIAL-->
                </div>
            </div>
        </div>
    </section>
    <!--TESTIMONIALS END-->



    <!--news-->
    <section>
        <div id="csi-news" class="csi-news">
            <div class="csi-inner">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="csi-heading">
                                <h2 class="title">News Updates</h2>
                                <h3 class="subtitle">Our Latest Education News Updates Dont Miss Out!</h3>
                            </div>
                        </div>
                    </div>
                    <!--//.ROW-->
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="csi-news-area">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="csi-single-news csi-featured-news">
                                            <figure>
                                                <a href="#"><img src="<?php echo ASSET_URL; ?>theme_edu/assets/img/news/news1.jpg" alt="featured event"></a>
                                                <figcaption>
                                                    <div class="figcaption">
                                                    </div>
                                                    <div class="news-info">
                                                        <h4 class="categori"><a href="#">Education</a></h4>
                                                        <h3 class="title"><a href="blog-single.html">Introducing Backer: The best crowdfunding WordPress theme ever</a></h3>
                                                        <ul class="list-inline">
                                                            <li>by<a href="#"> Rayhan Arif</a></li>
                                                            <li><a href="#"> June 14, 2017</a></li>
                                                        </ul>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="csi-single-news csi-single-normal">
                                            <div class="news-info">
                                                <h4 class="categori"><a href="#">Education</a></h4>
                                                <h3 class="title"><a href="news-singlex.html">Introducing Backer: The best crowdfunding WordPress theme ever</a></h3>
                                                <ul class="list-inline">
                                                    <li>by<a href="#"> Rayhan Arif</a></li>
                                                    <li><a href="#"> June 14, 2017</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="csi-single-news csi-single-normal">
                                            <div class="news-info">
                                                <h4 class="categori"><a href="#">Education</a></h4>
                                                <h3 class="title"><a href="news-singlex.html">Introducing Backer: The best crowdfunding WordPress theme ever</a></h3>
                                                <ul class="list-inline">
                                                    <li>by<a href="#"> Rayhan Arif</a></li>
                                                    <li><a href="#"> June 14, 2017</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--//.ROW-->
                </div>
                <!-- //.CONTAINER -->
            </div>
            <!-- //.INNER -->
        </div>
    </section>
    <!--news END-->


    <!--Subscribe-->
    <section>
        <div id="csi-subscribtion" class="csi-subscribtion">
            <div class="csi-inner">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="csi-heading">
                                <h2 class="title">Subscription</h2>
                                <h3 class="subtitle">Dont Miss Out on the Latest Education Master Updates</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                            <div class="csi-subscribe-area">
                                <p class="text">If you want to receive the latest news,<br> please subscribe us.</p>
                                <div class="subscribe-form">
                                    <form class="subscribe-form-action csi-subscribe-form" action="#">
                                        <div class="form-group csi-subscribe-input">
                                            <input type="email" id="subscribe" class="csi-input csi-input-form form-control" required placeholder="Enter Email Address ...">
                                        </div>
                                        <div class="form-group csi-subscribe-btn">
                                            <button class="csi-btn csi-submit" name="csi-submit" type="submit">Subscribe <i class="fa fa-paper-plane"></i></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- //.CONTAINER -->
            </div><!-- //.INNER -->
        </div>
    </section>
    <!--Subscribe END-->



    <!--FOOTER-->
    
    <!--FOOTER END-->
