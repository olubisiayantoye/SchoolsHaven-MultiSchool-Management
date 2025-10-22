<!doctype html>
<html lang="en">


<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
   
    <!--====== Required meta tags ======-->
    
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!--====== Title ======-->
    <title><?php echo $school->school_name; ?><?php //echo $title_for_layout; ?></title>
    
    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="<?php echo IMG_URL; ?>front/favicon.ico" type="image/x-icon">

    <!--====== Slick css ======-->
    <link rel="stylesheet" href="<?php echo ASSET_URL; ?>theme_bin/css/slick.css">

    <!--====== Animate css ======-->
    <link rel="stylesheet" href="<?php echo ASSET_URL; ?>theme_bin/css/animate.css">
    
    <!--====== Nice Select css ======-->
    <link rel="stylesheet" href="<?php echo ASSET_URL; ?>theme_bin/css/nice-select.css">
    
    <!--====== Nice Number css ======-->
    <link rel="stylesheet" href="<?php echo ASSET_URL; ?>theme_bin/css/jquery.nice-number.min.css">

    <!--====== Magnific Popup css ======-->
    <link rel="stylesheet" href="<?php echo ASSET_URL; ?>theme_bin/css/magnific-popup.css">

    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="<?php echo ASSET_URL; ?>theme_bin/css/bootstrap.min.css">
    
    <!--====== Fontawesome css ======-->
    <link rel="stylesheet" href="<?php echo ASSET_URL; ?>theme_bin/css/font-awesome.min.css">
    
    <!--====== Default css ======-->
    <link rel="stylesheet" href="<?php echo ASSET_URL; ?>theme_bin/css/default.css">
    
    <!--====== Style css ======-->
    <link rel="stylesheet" href="<?php echo ASSET_URL; ?>theme_bin/css/style.css">
    
    <!--====== Responsive css ======-->
    <link rel="stylesheet" href="<?php echo ASSET_URL; ?>theme_bin/css/responsive.css">
  
  
</head>

<body>
   
    <!--====== PRELOADER PART START ======-->

    <div class="preloader">
        <div class="loader rubix-cube">
            <div class="layer layer-1"></div>
            <div class="layer layer-2"></div>
            <div class="layer layer-3 color-1"></div>
            <div class="layer layer-4"></div>
            <div class="layer layer-5"></div>
            <div class="layer layer-6"></div>
            <div class="layer layer-7"></div>
            <div class="layer layer-8"></div>
        </div>
    </div>

    <!--====== PRELOADER PART START ======-->
    
    <!--====== HEADER PART START ======-->
  
    <?php $this->load->view('layout/header'); ?> 
    <!--====== HEADER PART ENDS ======-->
    
  <!-- page content -->

    
     <?php echo $content_for_layout; ?>
     
    
   <!-- /page content -->
   
   
   
   
    <!--====== FOOTER PART START ======-->
    
     <?php $this->load->view('layout/footer'); ?>  
    
    <!--====== FOOTER PART ENDS ======-->
   
    <!--====== BACK TO TP PART START ======-->
    
    <a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>
    
    <!--====== BACK TO TP PART ENDS ======-->
   
    
    
    
    
    
    
    
    <!--====== jquery js ======-->
    <script src="<?php echo ASSET_URL; ?>theme_bin/js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="<?php echo ASSET_URL; ?>theme_bin/js/vendor/jquery-1.12.4.min.js"></script>

    <!--====== Bootstrap js ======-->
    <script src="<?php echo ASSET_URL; ?>theme_bin/js/bootstrap.min.js"></script>
    
    <!--====== Slick js ======-->
    <script src="<?php echo ASSET_URL; ?>theme_bin/js/slick.min.js"></script>
    
    <!--====== Magnific Popup js ======-->
    <script src="<?php echo ASSET_URL; ?>theme_bin/js/jquery.magnific-popup.min.js"></script>
    
    <!--====== Counter Up js ======-->
    <script src="<?php echo ASSET_URL; ?>theme_bin/js/waypoints.min.js"></script>
    <script src="<?php echo ASSET_URL; ?>theme_bin/js/jquery.counterup.min.js"></script>
    
    <!--====== Nice Select js ======-->
    <script src="<?php echo ASSET_URL; ?>theme_bin/js/jquery.nice-select.min.js"></script>
    
    <!--====== Nice Number js ======-->
    <script src="<?php echo ASSET_URL; ?>theme_bin/js/jquery.nice-number.min.js"></script>
    
    <!--====== Count Down js ======-->
    <script src="<?php echo ASSET_URL; ?>theme_bin/js/jquery.countdown.min.js"></script>
    
    <!--====== Validator js ======-->
    <script src="<?php echo ASSET_URL; ?>theme_bin/js/validator.min.js"></script>
    
    <!--====== Ajax Contact js ======-->
    <script src="<?php echo ASSET_URL; ?>theme_bin/js/ajax-contact.js"></script>
    
    <!--====== Main js ======-->
    <script src="<?php echo ASSET_URL; ?>theme_bin/js/main.js"></script>
    
    <!--====== Map js ======-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDC3Ip9iVC0nIxC6V14CKLQ1HZNF_65qEQ"></script>
    <script src="<?php echo ASSET_URL; ?>theme_bin/js/map-script.js"></script>



  <script type="text/javascript">

            jQuery.extend(jQuery.validator.messages, {
                required: "<?php echo $this->lang->line('required_field'); ?>",
                email: "<?php echo $this->lang->line('enter_valid_email'); ?>",
                url: "<?php echo $this->lang->line('enter_valid_url'); ?>",
                date: "<?php echo $this->lang->line('enter_valid_date'); ?>",
                number: "<?php echo $this->lang->line('enter_valid_number'); ?>",
                digits: "<?php echo $this->lang->line('enter_only_digit'); ?>",
                equalTo: "<?php echo $this->lang->line('enter_same_value_again'); ?>",
                remote: "<?php echo $this->lang->line('pls_fix_this'); ?>",
                dateISO: "Please enter a valid date (ISO).",
                maxlength: jQuery.validator.format("Please enter no more than {0} characters."),
                minlength: jQuery.validator.format("Please enter at least {0} characters."),
                rangelength: jQuery.validator.format("Please enter a value between {0} and {1} characters long."),
                range: jQuery.validator.format("Please enter a value between {0} and {1}."),
                max: jQuery.validator.format("Please enter a value less than or equal to {0}."),
                min: jQuery.validator.format("Please enter a value greater than or equal to {0}.")
            });
            
            
            function change_school(school_id){
                if(school_id){
                    window.location.href = '<?php echo site_url('school/'); ?>'+school_id; 
                }
            }           
        </script>





</body>



</html>
