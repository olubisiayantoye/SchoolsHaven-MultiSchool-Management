<!DOCTYPE html>
<html dir="ltr" lang="en">


<head>

<!-- Meta Tags -->
<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<meta name="description" content="ChildHaven - Kids School & Kinder Garten HTML5 Template" />
<meta name="keywords" content="kindergarten,children,kidsschool,child,school,baby,childschool" />
<meta name="author" content="ThemeMascot" />

<!-- Page Title -->
<title>ChildHaven - Kids School & Kinder Garten HTML5 Template</title>

<!-- Favicon and Touch Icons -->
<link href="<?php echo ASSET_URL; ?>theme_two/images/favicon.png" rel="shortcut icon" type="image/png">
<link href="<?php echo ASSET_URL; ?>theme_two/images/apple-touch-icon.png" rel="apple-touch-icon">
<link href="<?php echo ASSET_URL; ?>theme_two/images/apple-touch-icon-72x72.png" rel="apple-touch-icon" sizes="72x72">
<link href="<?php echo ASSET_URL; ?>theme_two/images/apple-touch-icon-114x114.png" rel="apple-touch-icon" sizes="114x114">
<link href="<?php echo ASSET_URL; ?>theme_two/images/apple-touch-icon-144x144.png" rel="apple-touch-icon" sizes="144x144">

<!-- Stylesheet -->
<link href="<?php echo ASSET_URL; ?>theme_two/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo ASSET_URL; ?>theme_two/css/jquery-ui.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo ASSET_URL; ?>theme_two/css/animate.css" rel="stylesheet" type="text/css">
<link href="<?php echo ASSET_URL; ?>theme_two/css/css-plugin-collections.css" rel="stylesheet"/>
<!-- CSS | menuzord megamenu skins -->
<link id="menuzord-menu-skins" href="<?php echo ASSET_URL; ?>theme_two/css/menuzord-skins/menuzord-rounded-boxed.css" rel="stylesheet"/>
<!-- CSS | Main style file -->
<link href="<?php echo ASSET_URL; ?>theme_two/css/style-main.css" rel="stylesheet" type="text/css">
<!-- CSS | Preloader Styles -->
<link href="<?php echo ASSET_URL; ?>theme_two/css/preloader.css" rel="stylesheet" type="text/css">
<!-- CSS | Custom Margin Padding Collection -->
<link href="<?php echo ASSET_URL; ?>theme_two/css/custom-bootstrap-margin-padding.css" rel="stylesheet" type="text/css">
<!-- CSS | Responsive media queries -->
<link href="<?php echo ASSET_URL; ?>theme_two/css/responsive.css" rel="stylesheet" type="text/css">
<!-- CSS | Style css. This is the file where you can place your own custom css code. Just uncomment it and use it. -->
<!-- <link href="css/style.css" rel="stylesheet" type="text/css"> -->

<!-- Revolution Slider 5.x CSS settings -->
<link  href="<?php echo ASSET_URL; ?>theme_two/js/revolution-slider/css/settings.css" rel="stylesheet" type="text/css"/>
<link  href="<?php echo ASSET_URL; ?>theme_two/js/revolution-slider/css/layers.css" rel="stylesheet" type="text/css"/>
<link  href="<?php echo ASSET_URL; ?>theme_two/js/revolution-slider/css/navigation.css" rel="stylesheet" type="text/css"/>

<!-- CSS | Theme Color -->
<link href="<?php echo ASSET_URL; ?>theme_two/css/colors/theme-skin-colorset.css" rel="stylesheet" type="text/css">

<!-- external javascripts -->
<script src="<?php echo ASSET_URL; ?>theme_two/js/jquery-2.2.4.min.js"></script>
<script src="<?php echo ASSET_URL; ?>theme_two/js/jquery-ui.min.js"></script>
<script src="<?php echo ASSET_URL; ?>theme_two/js/bootstrap.min.js"></script>
<!-- JS | jquery plugin collection for this theme -->
<script src="<?php echo ASSET_URL; ?>theme_two/js/jquery-plugin-collection.js"></script>

<!-- Revolution Slider 5.x SCRIPTS -->
<script src="<?php echo ASSET_URL; ?>theme_two/js/revolution-slider/js/jquery.themepunch.tools.min.js"></script>
<script src="<?php echo ASSET_URL; ?>theme_two/js/revolution-slider/js/jquery.themepunch.revolution.min.js"></script>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body class="">
<div id="wrapper" class="clearfix">
  <!-- preloader -->
  <div id="preloader">
    <div id="spinner">
      <img class="floating" src="images/preloaders/13.png" alt="">
      <h5 class="line-height-50 font-18 ml-15">Loading...</h5>
    </div>
    <div id="disable-preloader" class="btn btn-default btn-sm">Disable Preloader</div>
  </div>
        
        <?php $this->load->view('layout/header'); ?>  
        
        <!-- page content -->  <!-- Start main-content -->       
        <?php echo $content_for_layout; ?>
        <!-- /page content --> <!-- end main-content -->
        
        <!-- footer content -->
        <?php $this->load->view('layout/footer'); ?>   
        <!-- /footer content -->


     

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
   
   
   
<!-- Footer Scripts -->
<!-- JS | Custom script for all pages -->
<script src="<?php echo ASSET_URL; ?>theme_two/js/custom.js"></script>

<!-- SLIDER REVOLUTION 5.0 EXTENSIONS  
      (Load Extensions only on Local File Systems ! 
       The following part can be removed on Server for On Demand Loading) -->
<script type="text/javascript" src="<?php echo ASSET_URL; ?>theme_two/js/revolution-slider/js/extensions/revolution.extension.actions.min.js"></script>
<script type="text/javascript" src="<?php echo ASSET_URL; ?>theme_two/js/revolution-slider/js/extensions/revolution.extension.carousel.min.js"></script>
<script type="text/javascript" src="<?php echo ASSET_URL; ?>theme_two/js/revolution-slider/js/extensions/revolution.extension.kenburn.min.js"></script>
<script type="text/javascript" src="<?php echo ASSET_URL; ?>theme_two/js/revolution-slider/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script type="text/javascript" src="<?php echo ASSET_URL; ?>theme_two/js/revolution-slider/js/extensions/revolution.extension.migration.min.js"></script>
<script type="text/javascript" src="<?php echo ASSET_URL; ?>theme_two/js/revolution-slider/js/extensions/revolution.extension.navigation.min.js"></script>
<script type="text/javascript" src="<?php echo ASSET_URL; ?>theme_two/js/revolution-slider/js/extensions/revolution.extension.parallax.min.js"></script>
<script type="text/javascript" src="<?php echo ASSET_URL; ?>theme_two/js/revolution-slider/js/extensions/revolution.extension.slideanims.min.js"></script>
<script type="text/javascript" src="<?php echo ASSET_URL; ?>theme_two/js/revolution-slider/js/extensions/revolution.extension.video.min.js"></script>

</body>


</html>