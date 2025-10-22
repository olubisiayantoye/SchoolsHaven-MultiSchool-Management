<div class="row">
   <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
     <div class="x_title">
                <h3 class="head-title"><i class="fa fa-folder-open"></i><small> <?php echo $this->lang->line('manage_pin'); ?></small></h3>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>                    
                </ul>
                <div class="clearfix"></div>
            </div>
    <div class="col-md-12">

        <!------CONTROL TABS START------>
        <ul class="nav nav-tabs bordered">
            <li class="active">
                <a href="#list" data-toggle="tab"><i class="entypo-menu"></i>
                    <?php echo 'Pin Number List'; ?>
                </a></li>
            <li>
                <a href="#add" data-toggle="tab"><i class="entypo-plus-circled"></i>
                    <?php echo 'Generate Exam Pin-Number'; ?>
                </a></li>
                
                <li>
                <a href="#print" data-toggle="tab"><i class="entypo-plus-circled"></i>
                    <?php echo 'Print Exam Pin-Number'; ?>
                </a></li>
                
                
        </ul>
        <!------CONTROL TABS END------>


        <div class="tab-content">
            <br/>
            <!----TABLE LISTING STARTS-->
            <div class="tab-pane box active" id="list">
               
                     <div class="row">

                    <div class="col-md-12">

                        <ul class="nav nav-tabs bordered"><!-- available classes "bordered", "right-aligned" -->
                            <li class="active">
                                <a href="#active" data-toggle="tab">
                                    <span><i class="entypo-home"></i>
                                        <?php echo "New Pin"; ?></span>
                                </a>
                            </li>
                            <li class="">
                                <a href="#pending" data-toggle="tab">
                                    <span><i class="entypo-archive"></i>
                                        <?php echo "Used Pin"; ?></span>
                                </a>
                            </li>
                             <li class="">
                                <a href="#used" data-toggle="tab">
                                    <span><i class="entypo-archive"></i>
                                        <?php echo "Pending/Blocked Pin"; ?></span>
                                </a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <br>
                            <div class="tab-pane active" id="active">

                                <?php include('active_pin_number.php'); ?>
                              

                            </div>
                             <div class="tab-pane " id="pending">

                                <?php include ('used_pin_number.php'); ?>

                            </div>
                            <div class="tab-pane" id="used">

                                <?php include 'blocked_pin_number.php'; ?>

                            </div>
                        </div>


                    </div>

                </div>
            </div>
            <!----TABLE LISTING ENDS--->


            <!----CREATION FORM STARTS---->
            <div class="tab-pane box" id="add" style="padding: 5px">
                <div class="box-content">
<?php echo form_open(site_url('checkexam/pin/exam_pin_number/create') , array(
                      'class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data',
                        'target' => '_top')); ?>
                        
                        <?php $this->load->view('layout/school_list_form'); ?>
                        
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo $this->lang->line('title'); ?><span class="required">*</span></label>
                        <div class="col-sm-5">
                            <input type="text" maxlength="34" class="form-control" name="title" required />
                        </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label"><?php echo $this->lang->line('note'); ?></label>
                  		<div class="col-sm-5">
                  		  <textarea class="form-control" rows="2" name="note"></textarea>
                  		</div>
                  	</div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo $this->lang->line('date'); ?></label>
                        <div class="col-sm-5">
 <input  type="hidden" name="create_timestamp" value="<?php echo date('d/m/Y');?>" required />
            <input type="text" disabled="disabled" type="hidden" value="<?php echo date('d/m/Y');?>" required />
                              
                        </div>
                    </div>
                    
                    <div class="form-group">
          					<label for="field-2" class="col-sm-3 control-label"><?php echo "Number of Digit";?></label>
          						<div class="col-sm-4">
          							<input type="number" min="8" max="15" name="digits_needed" class="form-control" value="10" />
          						</div>
          					</div>

                    

                    <div class="form-group">
          						<label for="field-2" class="col-sm-3 control-label"><?php echo "Number of Exam PIN";?></label>
          						<div class="col-sm-4">
          							<input type="number"  min="1" max="100" name="number_of_pin" class="form-control" value="10" />
          						</div>
          					</div>
                     <div class="form-group">
                        <label for="field-2" class="col-sm-3 control-label"><?php echo "Number of Use";?></label>
                        <div class="col-sm-4">
                            <input type="number"  min="1" max="50" name="number_of_use" class="form-control" value="3" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo "Status"; ?></label>
                        <div class="col-sm-4">
                            <select class="form-control selectboxit" name="status">
                                <option value="1"><?php echo "Active"; ?></option>
                                <option value="2"><?php echo "Pending"; ?></option>
                            </select>
                            <br>
                           
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
   <button type="submit" id="submit_button" class="btn btn-info"><?php echo "Generate Pin Number"; ?></button><br><br><br>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
            <!----CREATION FORM ENDS-->
            
            
              <!----PRINT FORM STARTS---->
            <div class="tab-pane box" id="print" style="padding: 5px">
                <div class="box-content">
                   <?php include ('print_pin_number.php'); ?>  
                 </div>
                    

                    
                 
               
            </div>
            <!----PRINT FORM ENDS-->

        </div>
    </div>
    
    </div>
	</div>
</div>
>>>