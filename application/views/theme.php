

<div class="" data-example-id="togglable-tabs">

<!--div class="tab">
<button class="tablinks" onclick="openTheme(event, 'theme_color')">Theme Color Management</button>
 <button class="tablinks" onclick="openTheme(event, 'theme_temp')">Theme Template Management</button>


</div-->
 <ul  class="nav nav-tabs bordered">
                        <li class="<?php if(isset($list)){ echo 'active'; }?>"><a href="#tab_theme_temp"   role="tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-list-ol"></i> <?php echo $this->lang->line('theme'); ?> <?php echo $this->lang->line('list'); ?></a> </li>
                        
                        
                          
<li  class=""><a href="#tab_theme_color"  role="tab"  data-toggle="tab" aria-expanded="false"><i class="fa fa-plus-square-o"></i> <?php echo $this->lang->line('theme'); ?> <?php echo $this->lang->line('theme'); ?></a> </li> 
</ul>
 <br/>



<div class="tab-content">


<div  class="tab-pane fade in <?php if(isset($list)){ echo 'active'; }?>" id="tab_theme_temp" >

<div class="row">

`<div class="col-md-12 col-sm-12 col-xs-12">
 <div class="x_panel">
  <div class="x_title">
                <h3 class="head-title"><i class="fa fa-cubes"></i><small> <?php echo $this->lang->line('theme_template'); ?></small></h3>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>                    
                </ul>
                <div class="clearfix"></div>
            </div>	
  <div class="col-md-12">
    <div class="box">
      <div class="box-title">
        <h3><i class="fa fa-bars"></i> <?php echo 'Active Theme'; ?></h3>
        <div class="box-tool">
          <a href="#" data-action="collapse"><i class="fa fa-chevron-up"></i></a>

        </div>
      </div>
      <div class="box-content">
        <?php 
		
         
		$theme = $themes_temp;
	
        $file   = './application/modules/web/views/'.$theme.'/layout/config.xml';
        @$xmlstr = file_get_contents($file);
        if($xmlstr=='')
        {
          echo 'Theme config file not found';die;
        }
        $xml    = simplexml_load_string($xmlstr);
        @$config = $xml->xpath('//config');
        ?>
        <div class="row bs-examples">
          <div class="col-xs-6 col-md-4">
            <a href="javascript:void(0);" class="thumbnail">
              <img alt="" src="<?php echo base_url('application/modules/web/views/'.$theme.'/layout/screen.png');?>">
            </a>
            <h4><?php echo $config[0]->name;?></h4>
            <p><?php echo 'Version : '.$config[0]->version.' <br/> Author : '.$config[0]->author;?></p> 
          </div>
        </div>  

      </div>
    </div>
  </div>
  </div>
</div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="box">
      <div class="box-title">
        <h3><i class="fa fa-bars"></i> <?php echo "Available Themes"; ?></h3>
        <div class="box-tool">
          <a href="#" data-action="collapse"><i class="fa fa-chevron-up"></i></a>

        </div>
      </div>
      <div class="box-content">

        <div class="row bs-examples">
         
        <?php
          $this->load->helper('directory');
          //$map = directory_map('./application/modules/themes/views', 1);
		  $map = directory_map('./application/modules/web/views', 1);
	
          foreach ($map as $theme_folder) 
          {
              if($theme_folder == $theme)continue;
              $file   = './application/modules/web/views/'.$theme_folder.'/layout/config.xml';
              $xmlstr = file_get_contents($file);
              $xml  = simplexml_load_string($xmlstr);
              $config = $xml->xpath('//config');
          ?>
              <div class="col-xs-6 col-md-4" style="margin-bottom:30px;">
                <a href="javascript:void(0);" class="thumbnail">
                  <img alt="" src="<?php echo base_url('application/modules/web/views/'.$theme_folder.'layout/screen.png');?>">
                </a>
                <h4><?php echo $config[0]->name;?></h4>
                
                <p><?php echo 'Version : '.$config[0]->version.' <br/> Author : '.$config[0]->author;?></p>
              
                <form action="<?php echo site_url('theme/activate_theme');?>" method="post">
                   <?php $this->load->view('layout/school_list_form'); ?>
                  <input type="hidden" name="theme" value="<?php echo stripslashes($theme_folder);?>" />
                  <button class="btn btn-success" type="submit"><i class="fa fa-check"></i> <?php echo "activate"; ?></button>
             <?php  if($this->session->userdata('role_id') == SUPER_ADMIN){  ?>   
   <a href="<?php echo site_url('theme/activate_theme_temp/'.$theme_folder); ?>"><div class="btn btn-success">Admin Activate</div></a>
   				 <?php
                 }
                    ?>
                </form> 
               
              </div>
         <?php
          }
          ?>
        </div>

      </div>
    </div>
  </div>
</div>
</div>



<div  class="tab-pane fade in " id="tab_theme_color" >

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h3 class="head-title"><i class="fa fa-cubes"></i><small> <?php echo $this->lang->line('manage_theme'); ?></small></h3>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>                    
                </ul>
                <div class="clearfix"></div>
            </div>

        <div class="x_content">
            <div class="row">                
                <?php if(isset($themes) && !empty($themes)){ ?>
                    <?php foreach($themes as $obj ){ ?>
                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <div class="theme-box">
                            <img src="<?php //echo IMG_URL; ?>theme/<?php echo $obj->slug; ?>.png" alt="" />
                            <a href="<?php echo site_url('theme/activate/'.$obj->id); ?>"><button class="btn btn-success" style="background: <?php echo $obj->color_code; ?>;border: 1px solid <?php echo $obj->color_code; ?>;">  <?php echo $this->session->userdata('theme') == $obj->slug ? '<i class="fa fa-check"></i> '. $this->lang->line('active') : $this->lang->line('activate'); ?></button></a>
                        </div>
                    </div>
                    <?php } ?>
                <?php } ?>
            </div> 
            </div> 
        </div>
    </div>
</div>

</div>


</div>




</div>
