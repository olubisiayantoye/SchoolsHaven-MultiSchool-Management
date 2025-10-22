

  <!-- Header -->

  
  <!-- Start main-content -->
  <div class="main-content">
    <?php if(isset($sliders) && !empty($sliders)){ ?>
    <!-- Section: home -->
    <section id="home">
      <div class="container-fluid p-0">
        
        <!-- Slider Revolution Start -->
        <div class="rev_slider_wrapper">
          <div class="rev_slider rev_slider_default" data-version="5.0">
            <ul>
			<?php $xx = 1; foreach($sliders AS $obj ){ ?>
              <!-- SLIDE 1 -->
              <li data-index="rs-<?php echo $xx ?>" data-transition="fade" data-slotamount="default" data-easein="default" data-easeout="default" data-masterspeed="default" data-thumb="<?php echo UPLOAD_PATH; ?>slider/<?php echo $obj->image; ?>" data-rotate="0"  data-fstransition="fade" data-saveperformance="off" data-title="Web Show" data-description="">
                <!-- MAIN IMAGE -->
                <img src="<?php echo UPLOAD_PATH; ?>slider/<?php echo $obj->image; ?>"  alt=""  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-bgparallax="6" data-no-retina>
                
                <!-- LAYERS -->

                <!-- LAYER NR. 1 -->
                <div class="tp-caption tp-shape tp-shapewrapper tp-resizeme rs-parallaxlevel-0" 
                  id="slide-<?php echo $xx ?>-layer-1" 
                  data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
                  data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']" 
                  data-width="full"
                  data-height="full"
                  data-whitespace="normal"
                  data-transform_idle="o:1;"
                  data-transform_in="opacity:0;s:1500;e:Power3.easeInOut;" 
                  data-transform_out="opacity:0;s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" 
                  data-start="1000" 
                  data-basealign="slide" 
                  data-responsive_offset="on"
                  style="z-index: 5; background: -webkit-linear-gradient(right top , rgba(224,45,100, 0.2), rgba(116,117,170, 0.2), rgba(35,170,224,0.2)) repeat scroll 0 0;background: -moz-linear-gradient(right top , rgba(224,45,100, 0.2), rgba(116,117,170, 0.2), rgba(35,170,224,0.2)) repeat scroll 0 0;background: -ms-linear-gradient(right top , rgba(224,45,100, 0.2), rgba(116,117,170, 0.2), rgba(35,170,224,0.2)) repeat scroll 0 0;background: -o-linear-gradient(right top , rgba(224,45,100, 0.2), rgba(116,117,170, 0.2), rgba(35,170,224,0.2)) repeat scroll 0 0;"> 
                </div>

                <!-- LAYER NR. 2 -->
                <div class="tp-caption tp-resizeme sft font-weight-700 text-theme-color-blue" 
                  id="rs-<?php echo $xx ?>-layer-2"

                  data-x="['left']"
                  data-hoffset="['30']"
                  data-y="['middle']"
                  data-voffset="['-115']"
                  data-fontsize="['28']"
                  data-lineheight="['48']"
                  data-width="none"
                  data-height="none"
                  data-whitespace="nowrap"
                  data-transform_idle="o:1;s:500"
                  data-transform_in="y:100;scaleX:1;scaleY:1;opacity:0;"
                  data-transform_out="x:left(R);s:1000;e:Power3.easeIn;s:1000;e:Power3.easeIn;"
                  data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                  data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                  data-speed="500"
                  data-start="600"
                  data-splitin="none"
                  data-splitout="none" 
                  data-responsive_offset="on" 
                  style="z-index: 5; white-space: nowrap;"><?php echo $this->lang->line('welcome_to'); ?>
                </div>

                <!-- LAYER NR. 3 -->
                <div class="tp-caption tp-resizeme sft text-theme-color-orange font-Chewy font-weight-700 m-0" 
                  id="rs-<?php echo $xx ?>-layer-3"

                  data-x="['left']"
                  data-hoffset="['30']"
                  data-y="['middle']"
                  data-voffset="['-50']"
                  data-fontsize="['78']"
                  data-lineheight="['96']"
                  data-width="none"
                  data-height="none"
                  data-whitespace="nowrap"
                  data-transform_idle="o:1;s:500"
                  data-transform_in="y:100;scaleX:1;scaleY:1;opacity:0;"
                  data-transform_out="x:left(R);s:1000;e:Power3.easeIn;s:1000;e:Power3.easeIn;"
                  data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                  data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                  data-speed="500"
                  data-start="800"
                  data-splitin="none" 
                  data-splitout="none" 
                  data-responsive_offset="on" 
                  style="z-index: 5; white-space: nowrap;">your<span class="text-theme-color-sky"> <?php if(isset($school->school_name)){ ?>
                            <?php echo $school->school_name; ?>
                        <?php }else{ ?>
                              <?php echo SMS; ?>
                        <?php } ?></span>
                </div>

                <!-- LAYER NR. 4 -->
                <div class="tp-caption tp-resizeme sft text-black-333" 
                  id="rs-<?php echo $xx ?>-layer-4"

                  data-x="['left']"
                  data-hoffset="['30']"
                  data-y="['middle']"
                  data-voffset="['28','30','35']"
                  data-fontsize="['20','22',24']"
                  data-lineheight="['28','30','36']"
                  data-width="none"
                  data-height="none"
                  data-whitespace="nowrap"
                  data-transform_idle="o:1;s:500"
                  data-transform_in="y:100;scaleX:1;scaleY:1;opacity:0;"
                  data-transform_out="x:left(R);s:1000;e:Power3.easeIn;s:1000;e:Power3.easeIn;"
                  data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                  data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                  data-speed="500"
                  data-start="1200"
                  data-splitin="none" 
                  data-splitout="none" 
                  data-responsive_offset="on"
                  style="z-index: 5; white-space: nowrap; font-weight:400;">We provides always our best teaching techniques <br>so that your kids learn quickly.
                </div>

                <!-- LAYER NR. 5 -->
                <div class="tp-caption sft" 
                  id="rs-<?php echo $xx ?>-layer-5"

                  data-x="['left']"
                  data-hoffset="['30']"
                  data-y="['middle']"
                  data-voffset="['90','100','120']"
                  data-width="none"
                  data-height="none"
                  data-whitespace="nowrap"
                  data-transform_idle="o:1;s:500"
                  data-transform_in="y:100;scaleX:1;scaleY:1;opacity:0;"
                  data-transform_out="x:left(R);s:1000;e:Power3.easeIn;s:1000;e:Power3.easeIn;"
                  data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                  data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                  data-speed="500"
                  data-start="1400"
                  data-splitin="none" 
                  data-splitout="none" 
                  data-responsive_offset="on"
                  style="z-index: 5; white-space: nowrap; letter-spacing:1px;"><a class="btn btn-colored btn-theme-color-blue btn-lg btn-flat font-weight-600 pl-30 pr-30" href="<?php echo site_url('admission'); ?>"><?php echo $this->lang->line('admission'); ?> <?php echo $this->lang->line('now'); ?></a>
                </div>
              </li>
			
             <?php $xx++;} ?>
            
            </ul>
          </div>
          <!-- end .rev_slider -->
        </div>
        <!-- end .rev_slider_wrapper -->
        <script>
          $(document).ready(function(e) {
            $(".rev_slider_default").revolution({
              sliderType:"standard",
              sliderLayout: "auto",
              dottedOverlay: "none",
              delay: 5000,
              navigation: {
                  keyboardNavigation: "off",
                  keyboard_direction: "horizontal",
                  mouseScrollNavigation: "off",
                  onHoverStop: "off",
                  touch: {
                      touchenabled: "on",
                      swipe_threshold: 75,
                      swipe_min_touches: 1,
                      swipe_direction: "horizontal",
                      drag_block_vertical: false
                  },
                arrows: {
                  style: "gyges",
                  enable: true,
                  hide_onmobile: false,
                  hide_onleave: true,
                  hide_delay: 200,
                  hide_delay_mobile: 1200,
                  tmp: '',
                  left: {
                      h_align: "left",
                      v_align: "center",
                      h_offset: 0,
                      v_offset: 0
                  },
                  right: {
                      h_align: "right",
                      v_align: "center",
                      h_offset: 0,
                      v_offset: 0
                  }
                },
                bullets: {
                  enable: true,
                  hide_onmobile: true,
                  hide_under: 800,
                  style: "hebe",
                  hide_onleave: false,
                  direction: "horizontal",
                  h_align: "center",
                  v_align: "bottom",
                  h_offset: 0,
                  v_offset: 30,
                  space: 5,
                  tmp: '<span class="tp-bullet-image"></span><span class="tp-bullet-imageoverlay"></span><span class="tp-bullet-title"></span>'
                }
              },
              responsiveLevels: [1240, 1024, 778],
              visibilityLevels: [1240, 1024, 778],
              gridwidth: [1170, 1024, 778, 480],
              gridheight: [640, 768, 960, 720],
              lazyType: "none",
              parallax: {
                  origo: "slidercenter",
                  speed: 1000,
                  levels: [5, 10, 15, 20, 25, 30, 35, 40, 45, 46, 47, 48, 49, 50, 100, 55],
                  type: "scroll"
              },
              shadow: 0,
              spinner: "off",
              stopLoop: "on",
              stopAfterLoops: 0,
              stopAtSlide: -1,
              shuffle: "off",
              autoHeight: "off",
              fullScreenAutoWidth: "off",
              fullScreenAlignForce: "off",
              fullScreenOffsetContainer: "",
              fullScreenOffset: "0",
              hideThumbsOnMobile: "off",
              hideSliderAtLimit: 0,
              hideCaptionAtLimit: 0,
              hideAllCaptionAtLilmit: 0,
              debugMode: false,
              fallbacks: {
                  simplifyAll: "off",
                  nextSlideOnWindowFocus: "off",
                  disableFocusListener: false,
              }
            });
          });
        </script>
        <!-- Slider Revolution Ends -->
      </div>
    </section>
    
    <?php } ?>

   
    <?php if(isset($school->about_text) && !empty($school->about_text)){ ?>
    <!-- Section About -->
   <section>
      <div class="container pt-70 pb-40">
        <div class="section-title">
          <div class="row">
            <div class="col-md-6">
              <div class="about-thumb">
            
                 <?php if(isset($school->about_image) && !empty($school->about_image)){ ?>
                   <img src="<?php echo UPLOAD_PATH; ?>about/<?php echo $school->about_image; ?>" alt="" class="img-fullwidth">
                    <?php } ?> 
              </div>
            </div>
            <div class="col-md-6">
              <div class="about-details">
                <h2 class="text-theme-color-sky font-36 mt-0"> <?php echo $this->lang->line('welcome_to'); ?> <?php if(isset($school->school_name)){ ?>
                            <?php echo $school->school_name; ?>
                        <?php }else{ ?>
                              <?php echo SMS; ?>
                        <?php } ?></h2>
                <p><?php echo substr($school->about_text, 0, 550); ?> </p>
                <div class="singnature mt-20">
                  <img src="images/signature.png" alt="">
                </div>
                <a href="<?php echo site_url('about'); ?>" class="btn btn-flat btn-colored btn-theme-color-blue mt-15 mr-15"><?php echo $this->lang->line('read_more'); ?></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
	<?php } ?> 
    
    <!-- Section: Our Stuff -->
 


    <!-- Divider: Funfact -->
     
    <section class="divider parallax layer-overlay overlay-theme-color-sky" data-bg-img="images/bg/bg6.jpg" data-parallax-ratio="0.7">
      <div class="container pt-90 pb-90">
        <div class="row">
          <div class="col-xs-12 col-sm-6 col-md-3 mb-md-50">
            <div class="funfact text-center">
              <i class="pe-7s-users mt-5 text-white"></i>
              <h2 data-animation-duration="2000" data-value="<?php if(isset($teacher)){ ?>
                                <?php echo $teacher; ?>
                            <?php } ?>" class="animate-number text-white font-42 font-weight-300 mt-0 mb-0">0</h2>
              <h5 class="text-white text-uppercase font-weight-600">Qualified <?php echo $this->lang->line('teacher'); ?></h5>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-3 mb-md-50">
            <div class="funfact text-center">
              <i class="pe-7s-study mt-5 text-white"></i>
              <h2 data-animation-duration="2000" data-value="<?php if(isset($student)){ ?>
                                <?php echo $student; ?>
                            <?php } ?>" class="animate-number text-white font-42 font-weight-300 mt-0 mb-0">0</h2>
              <h5 class="text-white text-uppercase font-weight-600">Successful <?php echo $this->lang->line('student'); ?></h5>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-3 mb-md-50">
            <div class="funfact text-center">
              <i class="pe-7s-smile mt-5 text-white"></i>
              <h2 data-animation-duration="2000" data-value="<?php if(isset($staff)){ ?>
                                <?php echo $staff; ?>
                            <?php } ?>" class="animate-number text-white font-42 font-weight-300 mt-0 mb-0">0</h2>
              <h5 class="text-white text-uppercase font-weight-600"><?php echo $this->lang->line('staff'); ?></h5>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-3 mb-md-50">
            <div class="funfact text-center">
              <i class="pe-7s-medal mt-5 text-white"></i>
              <h2 data-animation-duration="2000" data-value="<?php if(isset($user)){ ?>
                                <?php echo $user; ?>
                            <?php } ?>" class="animate-number text-white font-42 font-weight-300 mt-0 mb-0">0</h2>
              <h5 class="text-white text-uppercase font-weight-600"><?php echo $this->lang->line('user'); ?></h5>
            </div>
          </div>
        </div>
      </div>
    </section>
    

    <!-- Section: Our Gallery -->

    <!-- Section: Our Courses -->
    

    <!-- Section: Why Choose Us -->


    <?php if(isset($news) && !empty($news)){ ?>
    <!-- Section: blog -->
    <section id="blog" class="layer-overlay overlay-white-7" data-bg-img="images/bg/bg5.jpg">
      <div class="container pb-70">
        <div class="section-title text-center">
          <div class="row">
            <div class="col-md-8 col-md-offset-2">
              <h2 class="text-uppercase line-bottom-center mt-0"><?php echo $this->lang->line('latest'); ?> <span class="text-theme-color-red"><?php echo $this->lang->line('news'); ?></span></h2>
              <div class="title-flaticon">
                <i class="pe-7s-study"></i>
              </div>
              <!-- p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem autem<br> voluptatem obcaecati!</p -->
            </div>
          </div>
        </div>
        <div class="section-content">
          <div class="row">
          <?php foreach($news AS $obj){ ?>
            <div class="col-xs-12 col-sm-6 col-md-4">
              <article class="post clearfix bg-white mb-sm-30">
                <div class="entry-header">
                  <div class="post-thumb thumb"> 
                    <img src="<?php echo UPLOAD_PATH; ?>news/<?php echo $obj->image; ?>" alt="" class="img-responsive img-fullwidth">
                  </div>
                </div>
                <div class="entry-content p-20">
                  <h4 class="entry-title text-white text-uppercase"><a class="font-weight-600" href="<?php echo site_url('news-detail/'.$obj->id); ?>"><?php echo $obj->title; ?></a></h4>
                  <div class="entry-meta">
                    <ul class="list-inline font-12 mb-10">
                      <li><i class="fa fa-user text-theme-color-sky mr-5"></i><?php echo $this->lang->line('by'); ?> / <?php echo $obj->name; ?></li>
                      <li><i class="fa fa-calendar text-theme-color-sky mr-5"></i><?php echo date($this->global_setting->date_format, strtotime($obj->date)); ?></li>
                      <!-- li><i class="fa fa-comment-o text-theme-color-sky mr-5"></i>45 </li -->
                    </ul>
                  </div>
                  <p class="mt-5"><?php echo substr($obj->news, 0, 180); ?> ...</p>
                  <a class="btn btn-theme-color-sky btn-sm mt-10" href="<?php echo site_url('news-detail/'.$obj->id); ?>"> <?php echo $this->lang->line('read_more'); ?></a>
                </div>
              </article>
            </div>
           <?php } ?> 
          </div>
        </div>
      </div>
    </section>    
    <?php } ?>
    
    
    <!-- Divider: Clients -->
    <section class="bg-theme-color-sky">
      <div class="container pt-40 pb-40">
        <div class="row">
          <div class="col-md-12">
            <div class="sm-text-center">
              <div class="col-md-9">
                <h3 class="text-white text-uppercase mt-5 m-0"><?php echo $this->lang->line('apply_now_for_your_kid'); ?></h3>
              </div>
              <div class="col-md-3 text-right sm-text-center"> 
                <a class="btn btn-transparent btn-border btn-circled btn-lg" href="<?php echo site_url('admission'); ?>"><?php echo $this->lang->line('apply'); ?>  <?php echo $this->lang->line('now'); ?></a> 
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    
  </div>
  <!-- end main-content -->
  
 