<!doctype html>
<html class="no-js" lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <!-- The above 3 meta tags *must* come first in the head -->

    <!-- SITE TITLE -->
    <title><?php echo $title_for_layout; ?></title>
    <meta name="description" content="Education  />
    <meta name="keywords" content="Education, Academy, University, Responsive, HTML5" />
    <meta name="author" content="httpcoder.com" />

    <!-- twitter card starts from here, if you don't need remove this section -->
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="@yourtwitterusername" />
    <meta name="twitter:creator" content="@yourtwitterusername" />
    <meta name="twitter:url" content="http://yourdomain.com/" />
    <meta name="twitter:title" content="Your home page title, max 140 char" /> <!-- maximum 140 char -->
    <meta name="twitter:description" content="Your site description, maximum 140 char " /> <!-- maximum 140 char -->
    <meta name="twitter:image" content="<?php echo ASSET_URL; ?>theme_edu/assets/img/twittercardimg/twittercard-280-150.jpg" />  <!-- when you post this page url in twitter , this image will be shown -->
    <!-- twitter card ends from here -->

    <!-- facebook open graph starts from here, if you don't need then delete open graph related  -->
    <meta property="og:title" content="Your home page title" />
    <meta property="og:url" content="http://your domain here.com" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:site_name" content="Your site name here" />
    <!--meta property="fb:admins" content="" /-->  <!-- use this if you have  -->
    <meta property="og:type" content="website" />
    <meta property="og:image" content="<?php echo ASSET_URL; ?>theme_edu/assets/img/opengraph/fbphoto.jpg" /> <!-- when you post this page url in facebook , this image will be shown -->
    <!-- facebook open graph ends from here -->

    <!--  FAVICON AND TOUCH ICONS -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo ASSET_URL; ?>theme_edu/assets/img/favicon.ico" />  <!-- this icon shows in browser toolbar -->
    <link rel="icon" type="image/x-icon" href="<?php echo ASSET_URL; ?>theme_edu/assets/img/favicon.ico" /> <!-- this icon shows in browser toolbar -->
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo ASSET_URL; ?>theme_edu/assets/img/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo ASSET_URL; ?>theme_edu/assets/img/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo ASSET_URL; ?>theme_edu/assets/img/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo ASSET_URL; ?>theme_edu/assets/img/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo ASSET_URL; ?>theme_edu/assets/img/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo ASSET_URL; ?>theme_edu/assets/img/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo ASSET_URL; ?>theme_edu/assets/img/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo ASSET_URL; ?>theme_edu/assets/img/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo ASSET_URL; ?>theme_edu/assets/img/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="<?php echo ASSET_URL; ?>theme_edu/assets/img/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo ASSET_URL; ?>theme_edu/assets/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo ASSET_URL; ?>theme_edu/assets/img/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo ASSET_URL; ?>theme_edu/assets/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?php echo ASSET_URL; ?>theme_edu/assets/img/favicon/manifest.json">

    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="<?php echo ASSET_URL; ?>theme_edu/assets/libs/bootstrap/css/bootstrap.min.css" media="all" />

    <!-- ICOFONT AWESOME -->
    <link rel="stylesheet" href="<?php echo ASSET_URL; ?>theme_edu/assets/libs/icofont/css/icofont.css" media="all" />


    <!-- GOOGLE FONT -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700,800%7cMerriweather:300,400,400i,700,900"/>


    <!-- OWL CAROUSEL CSS -->
    <link rel="stylesheet" href="<?php echo ASSET_URL; ?>theme_edu/assets/libs/owlcarousel/owl.carousel.min.css" media="all" />
    <link rel="stylesheet" href="<?php echo ASSET_URL; ?>theme_edu/assets/libs/owlcarousel/owl.theme.default.min.css" media="all" />


    <!-- MASTER  STYLESHEET  -->
    <link id="csi-master-style" rel="stylesheet" href="<?php echo ASSET_URL; ?>theme_edu/assets/css/style-default.min.css" media="all" />

    <!-- MODERNIZER CSS  -->
    <script src="<?php echo ASSET_URL; ?>theme_edu/assets/js/vendor/modernizr-2.8.3.min.js"></script>
    
    <?php if($this->global_setting->google_analytics){ ?>         
            <!-- Global site tag (gtag.js) - Google Analytics -->
            <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo $this->global_setting->google_analytics; ?>"></script>
            <script>
              window.dataLayer = window.dataLayer || [];
              function gtag(){dataLayer.push(arguments);}
              gtag('js', new Date());
              gtag('config', '<?php echo $this->global_setting->google_analytics; ?>');
            </script>
        <?php } ?>

</head>
<body class="home">

<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<div class="csi-container ">
    <!-- ***  ADD YOUR SITE CONTENT HERE *** -->

    <!--HEADER-->
    <?php $this->load->view('layout/header'); ?>  
    
    <!--HEADER END-->
      <!-- page content -->        
        <?php echo $content_for_layout; ?>
      <!-- /page content -->

    <!-- footer content -->
        <?php $this->load->view('layout/footer'); ?>   
    <!-- /footer content -->

</div>


 <!--//.csi SITE CONTAINER-->
<!-- *** ADD YOUR SITE SCRIPT HERE *** -->
<!-- JQUERY  -->
<script data-cfasync="false" src="../../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="<?php echo ASSET_URL; ?>theme_edu/assets/js/vendor/jquery-1.12.4.min.js"></script>

<!-- BOOTSTRAP JS  -->
<script src="<?php echo ASSET_URL; ?>theme_edu/assets/libs/bootstrap/js/bootstrap.min.js"></script>


<!-- SKILLS SCRIPT  -->
<script src="<?php echo ASSET_URL; ?>theme_edu/assets/libs/jquery.validate.js"></script>

<!-- if load google maps then load this api, change api key as it may expire for limit cross as this is provided with any theme -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDzfNvH2kifJQ0PhBIyuuG-swdkW1NPQVE"></script>

<!-- CUSTOM GOOGLE MAP -->
<script type="text/javascript" src="<?php echo ASSET_URL; ?>theme_edu/assets/libs/gmap/jquery.googlemap.js"></script>

<!-- Owl Carousel  -->
<script src="<?php echo ASSET_URL; ?>theme_edu/assets/libs/owlcarousel/owl.carousel.min.js"></script>


<!-- tweetie feed js  -->
<script src="<?php echo ASSET_URL; ?>theme_edu/tweetie/tweetie.js"></script>

<!-- type js -->
<script src="<?php echo ASSET_URL; ?>theme_edu/assets/libs/typed/typed.min.js"></script>

<!-- SMOTH SCROLL -->
<script src="<?php echo ASSET_URL; ?>theme_edu/assets/libs/jquery.smooth-scroll.min.js"></script>
<script src="<?php echo ASSET_URL; ?>theme_edu/assets/libs/jquery.easing.min.js"></script>

<!-- CUSTOM SCRIPT  -->
<script src="<?php echo ASSET_URL; ?>theme_edu/assets/js/custom.script.js"></script>




</body>


</html>
