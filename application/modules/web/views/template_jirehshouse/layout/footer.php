 <!-- Footer Start -->
<div class="footer-wrap">
  <div class="container">
    <div class="row">
      <div class="col-lg-4">
        <div class="footer_logo">

<?php if(isset($school->logo)){ ?>                            
                              <img alt="" class="footer-default" src="<?php echo UPLOAD_PATH; ?>/logo/<?php echo $school->logo; ?>" alt=""  />
                            <?php }else{ ?>
                               <img alt="" class="footer-default" src="<?php echo UPLOAD_PATH; ?>/logo/<?php echo $this->global_setting->front_logo; ?>" alt=""  />
                            <?php } ?> 



          <!--img alt="" class="footer-default" src="<?php echo ASSET_URL; ?>jirehshouse/images/logo.png"-->



        </div>
        <p><?php if(isset($school->about_text) && !empty($school->about_text)){ ?>
                <?php //echo "<p>".substr($school->about_text, 0, 350)."</p>"; ?>
                            <?php } ?> </p>
      </div>
      <div class="col-lg-2 col-md-3">
        <h3>Quick links</h3>
        <ul class="footer-links">
          <li> <a href="index.html">Home</a></li>
          <li> <a href="about.html">About</a></li>
          <li> <a href="classes.html">Classes</a></li>
          <li> <a href="teachers.html">Teachers</a></li>
          <li> <a href="testimonials.html">Testimonials</a></li>
          <li> <a href="blog.html">Blog</a></li>
          <li> <a href="contact.html">Contact Us</a></li>
        </ul>
      </div>
      <div class="col-lg-3 col-md-4">
        <h3>Opening Hours</h3>
        <ul class="unorderList hourswrp">
          <li>Monday <span>08:00 - 02:00</span></li>
          <li>Tuesday <span>08:00 - 02:00</span></li>
          <li>Wednesday <span>08:00 - 02:00</span></li>
          <li>Thursday <span>08:00 - 02:00</span></li>
          <li>Friday <span>08:00 - 02:00</span></li>
          <li>Saturday <span>08:00 - 02:00</span></li>
          <li>Sunday <span>Closed</span></li>
        </ul>
      </div>
      <div class="col-lg-3 col-md-4">
        <div class="footer_info">
          <h3>Get in Touch</h3>
          <ul class="footer-adress">
            <li class="footer_address"> <i class="fas fa-map-signs"></i> <span>
              
              <?php if(isset($school->address)){ ?>
                                     <?php echo $school->address; ?>
                                <?php } ?>
            </span> </li>


            <li class="footer_email"> <i class="fas fa-envelope" aria-hidden="true"></i> <span>
<?php if(isset($school->email)){ ?>
              <a href="<?php echo $school->email; ?>"> 
                            <?php echo $school->email; ?>


                                <?php } ?> </a></span> </li>
            <li class="footer_phone"> <i class="fas fa-phone-alt"></i> <span>
<?php if(isset($school->phone)){ ?>
              <a href="tel:<?php echo $school->phone; ?>">

                  <?php echo $school->phone; ?>
                                <?php } ?>

              </a></span> </li>
          </ul>
          <div class="social-icons footer_icon">
            <ul>
              <li><a href="index.html#"><i class="fab fa-facebook-f" aria-hidden="true"></i></a></li>
              <li><a href="index.html#"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
              <li><a href="index.html#"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
              <li><a href="index.html#"><i class="fab fa-youtube" aria-hidden="true"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Footer End --> 
