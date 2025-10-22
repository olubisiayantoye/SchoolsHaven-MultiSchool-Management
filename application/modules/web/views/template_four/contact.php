    <!--====== PAGE BANNER PART START ======-->
    
    <section id="page-banner" class="pt-105 pb-130 bg_cover" data-overlay="8" style="background-image: url(images/page-banner-1.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-banner-cont">
                        <h2><?php echo $this->lang->line('contact_us'); ?></h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo site_url(); ?>"><?php echo $this->lang->line('home'); ?></a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $this->lang->line('contact_us'); ?></li>
                            </ol>
                        </nav>
                    </div>  <!-- page banner cont -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    
    <!--====== PAGE BANNER PART ENDS ======-->
    
    <!--====== CONTACT PART START ======-->
    
    <section id="contact-page" class="pt-90 pb-120 gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="contact-from">
                        <div class="section-title">
                            <h5>Contact Us</h5>
                            <h2>Keep in touch</h2>
                        </div> <!-- section title -->
                        <div class="main-form pt-45">
                    <form action="<?php echo site_url('contact'); ?>" method="post" id="contact_us" name="contact_us" >
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="single-form form-group">
                        <input type="text" name="name"  id="name"  placeholder="<?php echo $this->lang->line('name'); ?> *" data-error="Name is required." required>
                      
                                            <div class="help-block with-errors"></div>
                                        </div> <!-- single form -->
                                    </div>
                                    <div class="col-md-6">
                                        <div class="single-form form-group">
  <input name="email" type="email" id="email" placeholder="<?php echo $this->lang->line('email'); ?> *" data-error="Valid email is required." required>
       
                                            <div class="help-block with-errors"></div>
                                        </div> <!-- single form -->
                                    </div>
                                    <div class="col-md-6">
                                        <div class="single-form form-group">
                   <input name="subject" type="text" placeholder="Subject" data-error="Subject is required." required>
                                            <div class="help-block with-errors"></div>
                                        </div> <!-- single form --> 
                                    </div>
                                    <div class="col-md-6">
                                        <div class="single-form form-group">
                    <input name="phone" type="text" placeholder="Phone" data-error="Phone is required." required>
                                            <div class="help-block with-errors"></div>
                                        </div> <!-- single form -->
                                    </div>
                                    <div class="col-md-12">
                                        <div class="single-form form-group">
                      <textarea name="message" placeholder="Message" data-error="Please,leave us a message." required></textarea>
                                            <div class="help-block with-errors"></div>
                                        </div> <!-- single form -->
                                    </div>
                                    <p class="form-message"></p>
                                    <div class="col-md-12">
                                        <div class="single-form">
                                            <button type="submit" class="main-btn">Send</button>
                                        </div> <!-- single form -->
                                    </div> 
                                </div> <!-- row -->
                            </form>
                        </div> <!-- main form -->
                    </div> <!--  contact from -->
                </div>
                <div class="col-lg-4">
                    <div class="contact-address">
                        <div class="contact-heading">
                            <h5>Address</h5>
                            <p><?php echo $this->lang->line('get_in_touch'); ?></p>
                        </div>
                        <ul>
                            <li>
                                <div class="single-address">
                                    <div class="icon">
                                        <i class="fa fa-home"></i>
                                    </div>
                                    <div class="cont">
                                        <p><?php if(isset($school->address)){ ?>
                                     <?php echo $school->address; ?>
                                <?php } ?></p>
                                    </div>
                                </div> <!-- single address -->
                            </li>
                            <li>
                                <div class="single-address">
                                    <div class="icon">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    <div class="cont">
                                        <p><?php echo $school->phone; ?></p>
                                        <p></p>
                                    </div>
                                </div> <!-- single address -->
                            </li>
                            <li>
                                <div class="single-address">
                                    <div class="icon">
                                        <i class="fa fa-envelope-o"></i>
                                    </div>
                                    <div class="cont">
                                        <p><?php echo $school->email; ?></p>
                                      
                                    </div>
                                </div> <!-- single address -->
                            </li>
                            
                        </ul>
                    </div> <!-- contact address -->
                
                </div>
            </div> <!-- row -->
        </div> <!-- container -->

    </section>
    <div class="map map-big">
        <div id="mymap"></div>
    </div> <!-- map -->
    <!--====== CONTACT PART ENDS ======-->
    
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAH5RWCDq3WYxQy9XSPDrreRX-CY8rxJcY&callback=initMap"></script>
<script>
function initMap() {
    var locationRio = { lat: -<?php echo $school->school_lat; ?>, lng: <?php echo $school->school_lng; ?> };
    var map = new google.maps.Map(document.getElementById('mymap'), {
        zoom: 13,
        center: locationRio,
        gestureHandling: 'cooperative'
    });
    var marker = new google.maps.Marker({
        position: locationRio,
        map: map,
        title: '<?php echo $school->school_name; ?>'
    });
}

$('#contact_us').validate();

</script>
<style type="text/css">
    label.error{
        color: red;
    }
</style>