<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h3 class="head-title"><i class="fa fa-file-text-o"></i><small> <?php echo "Manage E-library Resources"; ?></small></h3>
                <ul class="nav navbar-right panel_toolbox">
                    <li><input type="button" class="btn btn-info btn-xs" align="left" value="Back" onclick="history.back()"></li>
  <li><input type="button" class="btn btn-info btn-xs" align="left" value="Back" onclick="frame_name.history.back()"></li>
    <li><input type="button" class="btn btn-info btn-xs" align="left" id="btn" value="Refresh" /></li>
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>                    
                </ul>
               
     
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
               
               <iframe id="iframeid" src="<?php echo isset($elibrary) ? $elibrary->elibrary_url : $elibrary_url; ?>" style="border:none;" width="100%" height="2900px" title="Iframe Example"></iframe>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    

  function reload() {
            document.getElementById('iframeid').src += '';
        }
        btn.onclick = reload;  

</script>



