<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Fav Icon -->
  <link rel="shortcut icon" href="favicon.ico">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="<?php echo ASSET_URL; ?>jirehshouse/css/bootstrap.min.css">
  <link href="<?php echo ASSET_URL; ?>jirehshouse/css/all.css" rel="stylesheet">
  <link href="<?php echo ASSET_URL; ?>jirehshouse/css/owl.carousel.css" rel="stylesheet">

  <!-- <link rel="stylesheet" href="css/switcher.css"> -->
  <link rel="stylesheet" href="<?php echo ASSET_URL; ?>jirehshouse/rs-plugin/css/settings.css">
  <!-- Jquery Fancybox CSS -->
  <link rel="stylesheet" type="text/css" href="<?php echo ASSET_URL; ?>jirehshouse/css/jquery.fancybox.min.css" media="screen" />
  <link href="<?php echo ASSET_URL; ?>jirehshouse/css/animate.css" rel="stylesheet">
  <link href="<?php echo ASSET_URL; ?>jirehshouse/css/style.css" rel="stylesheet"  id="colors">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <title><?php echo $school->school_name; ?></title>
</head>
<body>

        
        

         <!--====== HEADER PART START ======-->
        <?php $this->load->view('layout/header'); ?> 
         <!--====== HEADER PART ENDS ======--> 

       <!-- page content -->        
        <?php echo $content_for_layout; ?>
        <!-- /page content -->


        <!-- footer content -->
        <?php $this->load->view('layout/footer'); ?>   
        <!-- /footer content -->




<!--Copyright Start-->
<div class="footer-bottom text-center">
  <div class="container">
    <div class="copyright-text">Copyright © <?php echo $school->school_name; ?> 2022. All Rights Reserved</div>
  </div>
</div>
<!--Copyright End--> 

<!-- Js --> 
<script src="<?php echo ASSET_URL; ?>jirehshouse/js/jquery.min.js"></script> 
<script src="<?php echo ASSET_URL; ?>jirehshouse/js/bootstrap.min.js"></script> 
<script src="js/popper.min.js"></script> 
<script src="<?php echo ASSET_URL; ?>jirehshouse/rs-plugin/js/jquery.themepunch.tools.min.js"></script> 
<script src="<?php echo ASSET_URL; ?>jirehshouse/rs-plugin/js/jquery.themepunch.revolution.min.js"></script> 
<!-- Jquery Fancybox --> 
<script src="<?php echo ASSET_URL; ?>jirehshouse/js/jquery.fancybox.min.js"></script> 
<!-- Animate js --> 
<script src="<?php echo ASSET_URL; ?>jirehshouse/js/animate.js"></script> 
<script>
  new WOW().init();
</script> 
<!-- WOW file --> 
<script src="<?php echo ASSET_URL; ?>jirehshouse/js/wow.js"></script> 
<!-- general script file --> 
<script src="<?php echo ASSET_URL; ?>jirehshouse/js/owl.carousel.js"></script> 
<script src="<?php echo ASSET_URL; ?>jirehshouse/js/script.js"></script>
</body>
</html>      