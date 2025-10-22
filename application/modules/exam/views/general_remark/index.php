<?php //var_dump($school->school_name); die(); ?>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h3 class="head-title"><i class="fa fa-file-text-o"></i><small> <?php echo $this->lang->line('manage'); ?> <?php echo $this->lang->line('general_remark'); ?> <?php echo $this->lang->line('result'); ?></small></h3>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>                    
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content quick-link">
                 <span><?php echo $this->lang->line('quick_link'); ?>:</span>
                <?php if(has_permission(VIEW, 'exam', 'mark')){ ?>
                    <a href="<?php echo site_url('exam/mark'); ?>"><?php echo $this->lang->line('manage_mark'); ?></a>
                <?php } ?>
                <?php if(has_permission(VIEW, 'exam', 'generalremark')){ ?>
                   | <a href="<?php echo site_url('exam/generalremark'); ?>"><?php echo $this->lang->line('exam_term'); ?> <?php echo $this->lang->line('result'); ?></a>                 
                <?php } ?>
                <?php if(has_permission(VIEW, 'exam', 'finalresult')){ ?>
                   | <a href="<?php echo site_url('exam/finalresult'); ?>"><?php echo $this->lang->line('exam_final_result'); ?></a>                 
                <?php } ?>
                <?php if(has_permission(VIEW, 'exam', 'meritlist')){ ?>
                   | <a href="<?php echo site_url('exam/meritlist'); ?>"><?php echo $this->lang->line('merit_list'); ?></a>                 
                <?php } ?>   
                <?php if(has_permission(VIEW, 'exam', 'marksheet')){ ?>
                   | <a href="<?php echo site_url('exam/marksheet'); ?>"><?php echo $this->lang->line('mark_sheet'); ?></a>
                <?php } ?>
                 <?php if(has_permission(VIEW, 'exam', 'resultcard')){ ?>
                   | <a href="<?php echo site_url('exam/resultcard'); ?>"><?php echo $this->lang->line('result_card'); ?></a>
                <?php } ?>   
                <?php if(has_permission(VIEW, 'exam', 'mail')){ ?>
                   | <a href="<?php echo site_url('exam/mail'); ?>"><?php echo $this->lang->line('mark_send_by_email'); ?></a>                    
                <?php } ?>
                <?php if(has_permission(VIEW, 'exam', 'text')){ ?>
                   | <a href="<?php echo site_url('exam/text'); ?>"><?php echo $this->lang->line('mark_send_by_sms'); ?></a>                  
                <?php } ?>
                <?php if(has_permission(VIEW, 'exam', 'resultemail')){ ?>
                   | <a href="<?php echo site_url('exam/resultemail/index'); ?>"> <?php echo $this->lang->line('result'); ?> <?php echo $this->lang->line('email'); ?></a>                    
                <?php } ?>
                <?php if(has_permission(VIEW, 'exam', 'resultsms')){ ?>
                   | <a href="<?php echo site_url('exam/resultsms/index'); ?>"> <?php echo $this->lang->line('result'); ?> <?php echo $this->lang->line('sms'); ?></a>                  
                <?php } ?>
            </div>

            <div class="x_content"> 
                <?php echo form_open_multipart(site_url('exam/generalremark/index'), array('name' => 'result', 'id' => 'result', 'class' => 'form-horizontal form-label-left'), ''); ?>
                <div class="row"> 
                    
                    <div class="col-md-10 col-sm-10 col-xs-12">
                    
                    <?php $this->load->view('layout/school_list_filter'); ?> 
                    
                    <div class="col-md-3 col-sm-3 col-xs-12">
                        <div class="item form-group"> 
                            <div><?php echo $this->lang->line('exam'); ?>  <span class="required">*</span></div>
                            <select  class="form-control col-md-7 col-xs-12" name="exam_id" id="exam_id"  required="required">
                                <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                <?php foreach ($exams as $obj) { ?>
                                <option value="<?php echo $obj->id; ?>" <?php if(isset($exam_id) && $exam_id == $obj->id){ echo 'selected="selected"';} ?>><?php echo $obj->title; ?></option>
                                <?php } ?>
                            </select>
                            <div class="help-block"><?php echo form_error('exam_id'); ?></div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-12">
                        <div class="item form-group"> 
                            <div><?php echo $this->lang->line('class'); ?>  <span class="required">*</span></div>
                            <select  class="form-control col-md-7 col-xs-12" name="class_id" id="class_id"  required="required" onchange="get_section_by_class(this.value,'');">
                                <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                <?php foreach ($classes as $obj) { ?>
                                <option value="<?php echo $obj->id; ?>" <?php if(isset($class_id) && $class_id == $obj->id){ echo 'selected="selected"';} ?>><?php echo $obj->name; ?></option>
                                <?php } ?>
                            </select>
                            <div class="help-block"><?php echo form_error('class_id'); ?></div>
                        </div>
                    </div>
                    
                    <div class="col-md-3 col-sm-3 col-xs-12">
                        <div class="item form-group"> 
                            <div><?php echo $this->lang->line('section'); ?> <span class="required">*</span></div>
                            <select  class="form-control col-md-7 col-xs-12" name="section_id" id="section_id"  required="required">                                
                                <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                            </select>
                            <div class="help-block"><?php echo form_error('section_id'); ?></div>
                        </div>
                    </div>                    
                    </div>
                    <div class="col-md-3 col-sm-2 col-xs-12">
                        <div class="item form-group"><br/>
                            <button id="send"  name="generate"  type="submit" class="btn btn-success col-md-7 col-xs-12"><?php echo $this->lang->line('find'); ?></button>
                        </div>
                        
                    </div>
                    <div class="col-md-3 col-sm-2 col-xs-12">
                        <div class="item form-group"><br/>
                            <button id="generate" name="generate" value="generate" type="submit" class="btn btn-success col-md-7 col-xs-12"><?php echo $this->lang->line('generate'); ?></button>
                        </div>
                        
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
            <br/>
            
            <div class="x_content">
            
             <div class="" data-example-id="togglable-tabs">
             
                <ul  class="nav nav-tabs bordered">
                        <li class="<?php if(isset($list)){ echo 'active'; }?>"><a href="#tab_generalremark_list"   role="tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-list-ol"></i> <?php echo $this->lang->line('remark'); ?> <?php echo $this->lang->line('list'); ?></a> </li>
                        
                        
             <?php if(has_permission(UPLOAD, 'exam', 'mark')){ ?>
<li  class="<?php if(isset($upload)){ echo 'active'; }?>"><a href="#tab__generalremark_upload"  role="tab"  data-toggle="tab" aria-expanded="false"><i class="fa fa-plus-square-o"></i> <?php echo $this->lang->line('upload'); ?> <?php echo $this->lang->line('remark'); ?></a> </li> <?php } ?>           
        </ul>
        
              <div class="tab-content">
             
              <div  class="tab-pane fade in <?php if(isset($list)){ echo 'active'; }?>" id="tab_generalremark_list" >
              
              
<br/>
           <?php  if (isset($students) && !empty($students)) { ?>
            <div class="x_content">             
                <div class="row">
                    <div class="col-sm-4  col-sm-offset-4 layout-box">
                        <p>
                            <h4><?php echo $this->lang->line('exam_term'); ?> <?php echo $this->lang->line('general_remark'); ?> <?php echo $this->lang->line('result'); ?></h4>                            
                            <?php echo $this->lang->line('exam'); ?> <?php echo $this->lang->line('title'); ?>: <?php echo $exam->title; ?>
                        </p>
                    </div>
                </div>            
            </div>
             <?php } ?>
              
              
              
              
                 <?php echo form_open(site_url('exam/generalremark/add'), array('name' => 'add', 'id' => 'add', 'class'=>'form-horizontal form-label-left'), ''); ?>
                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th><?php echo $this->lang->line('admission_no'); ?></th>
                            <th><?php echo $this->lang->line('name'); ?></th>
                            <th><?php echo $this->lang->line('psychomotor'); ?></th>
                            <th><?php echo $this->lang->line('psychomotor'); ?></th>                             
                            <th><?php echo $this->lang->line('comment'); ?> / <?php echo $this->lang->line('conduct'); ?></th>                                            
                            <th><?php echo $this->lang->line('attendance'); ?></th>                                            
                            <th><?php echo $this->lang->line('position'); ?></th>                                            
                        </tr>
                    </thead>
                    <tbody id="fn_result">   
                        <?php
                        $count = 1;
                        if (isset($students) && !empty($students)) {
                            ?>
                            <?php foreach ($students as $obj) { ?>                           
                            <?php  
                            $result = get_exam_result($school_id, $exam_id, $obj->id, $academic_year_id,  $class_id, $section_id ); 
                           // $mark = get_exam_total_mark($school_id, $exam->id, $obj->id, $academic_year_id,  $class_id, $section_id );
                            ?>
                                <tr>
                                    <td><?php echo $obj->admission_no; ?></td>
                                    <td><?php echo ucfirst($obj->name); ?></td>
                                    <td>
                                       
                                        <input type="hidden" value="<?php echo $obj->id; ?>"  name="students[]" />
                                        <ul>
<li><?php  echo !empty($school->psycho_1) ? $school->psycho_1 : 'Handwritting'; ?>:<br/>
<input  type="number" max="5" min="0"  value="<?php if(isset($result) && $result->psycho_1 != ''){ echo $result->psycho_1; } ?>"  name="psycho_1[<?php echo $obj->id; ?>]" class="form-control col-md-7 col-xs-12"  autocomplete="off"/>
</li>
<li><?php echo !empty($school->psycho_2) ? $school->psycho_2 : 'Games'; ?>:<br/>
    <input  type="number" max="5" min="0" value="<?php if(isset($result) && $result->psycho_2 != ''){ echo $result->psycho_2; } ?>"  name="psycho_2[<?php echo $obj->id; ?>]" class="form-control col-md-7 col-xs-12"  autocomplete="off"/>

<li><?php echo !empty($school->psycho_3) ? $school->psycho_3 : 'Music Skill/Fine Art'; ?>:<br/>
<input  type="number" max="5" min="0"  value="<?php if(isset($result) && $result->psycho_3 != ''){ echo $result->psycho_3; } ?>"  name="psycho_3[<?php echo $obj->id; ?>]" class="form-control col-md-7 col-xs-12"  autocomplete="off"/>

<?php if(!empty($school->psycho_4)){ ?>
<li><?php echo !empty($school->psycho_4) ? $school->psycho_4 : ''; ?>:<br/>     
<input  type="number" max="5" min="0" value="<?php if(isset($result) && $result->psycho_4 != ''){ echo $result->psycho_4; } ?>"  name="psycho_4[<?php echo $obj->id; ?>]" class="form-control col-md-7 col-xs-12"  autocomplete="off"/>
 <?php } ?>


 <?php if(!empty($school->psycho_5)){ ?>
<li><?php echo !empty($school->psycho_5) ? $school->psycho_5 : ''; ?>:<br/>     
<input  type="number" max="5" min="0"  value="<?php if(isset($result) && $result->psycho_5 != ''){ echo $result->psycho_5; } ?>"  name="psycho_5[<?php echo $obj->id; ?>]" class="form-control col-md-7 col-xs-12"  autocomplete="off"/>
<?php } ?>
</ul>       
                                    </td>
                                    <td>
                                        <ul>
<li><?php echo !empty($school->affective_1) ? $school->affective_1 : 'Speaking/Fluency'; ?>:<br/>
<input  type="number" max="5" min="0"  value="<?php if(isset($result) && $result->affective_1 != ''){ echo $result->affective_1; } ?>"  name="affective_1[<?php echo $obj->id; ?>]" class="form-control col-md-7 
col-xs-12"  autocomplete="off"/>
</li>
<li><?php echo !empty($school->affective_2) ? $school->affective_2 : 'Punctual/neatness'; ?>:<br/>
<input  type="number" max="5" min="0" value="<?php if(isset($result) && $result->affective_2 != ''){ echo $result->affective_2; } ?>"  name="affective_2[<?php echo $obj->id; ?>]" class="form-control col-md-7 col-xs-12"  autocomplete="off"/>
<li><?php echo !empty($school->affective_3) ? $school->affective_3 : 'Attentiveness'; ?>:<br/>    
<input  type="number" max="5" min="0"  value="<?php if(isset($result) && $result->affective_3 != ''){ echo $result->affective_3; } ?>"  name="affective_3[<?php echo $obj->id; ?>]" class="form-control col-md-7 col-xs-12"  autocomplete="off"/>

<?php if(!empty($school->affective_4)){ ?>
<li><?php echo !empty($school->affective_4) ? $school->affective_4 : ''; ?>:<br/>
<input  type="number" max="5" min="0" value="<?php if(isset($result) && $result->affective_4 != ''){ echo $result->affective_4; } ?>"  name="affective_4[<?php echo $obj->id; ?>]" class="form-control col-md-7 col-xs-12"  autocomplete="off"/>
<?php } ?>

<?php if(!empty($school->affective_5)){ ?>
<li><?php echo !empty($school->affective_5) ? $school->affective_5 : ''; ?>:<br/>
<input  type="number" max="5" min="0"  value="<?php if(isset($result) && $result->affective_5 != ''){ echo $result->affective_5; } ?>"  name="affective_5[<?php echo $obj->id; ?>]" class="form-control col-md-7 col-xs-12"  autocomplete="off"/>
<?php } ?> 
</ul>
                                    </td>                                     
                                    <td> 
<p>Teacher's Comment:</p>
<textarea  name="teacher_comment[<?php echo $obj->id; ?>]"    rows="3" cols="50" class="form-control col-md-3 col-xs-6" ><?php if(isset($result->teacher_comment) && $result->teacher_comment != ''){ echo $result->teacher_comment; }?></textarea>

<p>General Comment:</p>
<textarea name="general_comment[<?php echo $obj->id; ?>]" rows="3" cols="50" class="form-control col-md-3 col-xs-6" ><?php if(isset($result->general_comment) && $result->general_comment != ''){ echo $result->general_comment; }?></textarea>

<p>Conduct Comment:</p>
<textarea name="conduct[<?php echo $obj->id; ?>]" rows="3" cols="50" class="form-control col-md-3 col-xs-6" ><?php if(isset($result) && $result->conduct != ''){ echo $result->conduct; } ?></textarea>
                                    </td>
  
                                    <td>
       <input type="text" value="<?php if(isset($result) && $result->attendance != ''){ echo $result->attendance; } ?>"  name="attendance[<?php echo $obj->id; ?>]" class="form-control "  autocomplete="off"/>
                                    </td>
   
                                    <td>
       <input type="text" value="<?php if(isset($result) && $result->class_position != ''){ echo $result->class_position; } ?>"  name="class_position[<?php echo $obj->id; ?>]" class="form-control "  autocomplete="off"/>
       </td>
                                </tr>
                            <?php } ?>
                        <?php }else{ ?>
                                <tr>
                                    <td colspan="12" align="center"><?php echo $this->lang->line('no_data_found'); ?></td>
                                </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <div class="ln_solid"></div>
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-5">
                        <input type="hidden" value="<?php echo isset($school_id) ? $school_id : ''; ?>"  name="school_id" />
                        <input type="hidden" value="<?php echo isset($exam_id) ? $exam_id : ''; ?>"  name="exam_id" />
                        <input type="hidden" value="<?php echo isset($class_id) ? $class_id : ''; ?>"  name="class_id" />
                        <input type="hidden" value="<?php echo isset($section_id) ? $section_id : ''; ?>"  name="section_id" />
                        <?php  if (isset($students) && !empty($students)) { ?>
                         <a href="<?php echo site_url('exam/generalremark'); ?>" class="btn btn-primary"><?php echo $this->lang->line('cancel'); ?></a>
                         <button id="send" type="submit" class="btn btn-success"><?php echo $this->lang->line('submit'); ?></button>
                        <?php } ?>
                    </div>
                </div>
                 <?php echo form_close(); ?>
                
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="instructions"><strong><?php echo $this->lang->line('instruction'); ?>: </strong> <?php echo $this->lang->line('exam_result_instruction'); ?></div>
                </div>
                </div>
                
                <div  class="tab-pane fade in" id="tab__generalremark_upload" >
                
                <div class="x_content"> 
                               <?php echo form_open_multipart(site_url('exam/generalremark/upload'), array('name' => 'add', 'id' => 'add', 'class'=>'form-horizontal form-label-left'), ''); ?>
                               
                                <?php  if (isset($students) && !empty($students)) { ?>
                                <input type="hidden" value="<?php echo $school_id; ?>"  name="school_id" />
                                <input type="hidden" value="<?php echo $exam_id; ?>"  name="exam_id" />
                                <input type="hidden" value="<?php echo $class_id; ?>"  name="class_id" />
                                <input type="hidden" value="<?php echo $section_id; ?>"  name="section_id" />
                                <input type="hidden" value="<?php echo $academic_year_id; ?>"  name="academic_year_id" />
                       			<?php } ?>
                       
                                <div class="row">                                      
                                
                                
                                    
                                     
                                      
                                     <div class="col-md-2 col-sm-2 col-xs-12">
                                         <div class="item form-group">
                                             <label for="">&nbsp;</label>
                                            <a href=""   class="btn btn-success btn-md">Select EDITED CSV FILE </a>
                             
                                         </div>
                                     </div> 
                                    <div class="col-md-2 col-sm-2 col-xs-12">
                                         <div class="item form-group">
                                             <label ><?php echo $this->lang->line('csv_file'); ?>&nbsp;</label>
                                            <div class="btn btn-default btn-file">
                                                <i class="fa fa-paperclip"></i> <?php echo $this->lang->line('upload'); ?>
                                                <input  class="form-control col-md-7 col-xs-12"  name="bulk_remark"  id="bulk_remark" type="file">
                                            </div>
                                         </div>
                                     </div>
                                </div>
                                
                                                            
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <a  href="<?php echo site_url('student'); ?>" class="btn btn-primary"><?php echo $this->lang->line('cancel'); ?></a>
                                        <button id="send" type="submit" class="btn btn-success"><?php echo $this->lang->line('submit'); ?></button>
                                    </div>
                                </div>
                                <?php echo form_close(); ?>
                                
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="instructions"><strong><?php echo $this->lang->line('instruction'); ?>: </strong> 
                                        <ol>
                                            <li><?php echo $this->lang->line('bulk_student_instruction_1'); ?></li>
                                            <li><?php echo $this->lang->line('bulk_student_instruction_2'); ?></li>
                                            <li><?php echo $this->lang->line('bulk_student_instruction_3'); ?></li>
                                            
                                            <li>
                                                <?php echo $this->lang->line('bulk_student_instruction_4'); ?>
                                                <a target="_blank" href="<?php echo site_url('guardian'); ?>"> <?php echo $this->lang->line('view'); ?> <?php echo $this->lang->line('guardian'); ?></a>
                                            </li>
                                            <li><?php echo $this->lang->line('bulk_student_instruction_5'); ?></li>
                                            <li><?php echo $this->lang->line('bulk_student_instruction_6'); ?></li>
                                        </ol>
                                    </div>
                                </div>
                                
                            </div>
                </div>
                
               </div> <!--tabbb//////////////////-->
              </div>  <!--toggle//////////////////-->
            </div> 
            
           </div>
    </div>
</div>


<!-- Super admin js START  -->
 <script type="text/javascript">
 
 
 
 
        
    $("document").ready(function() {
         <?php if(isset($school_id) && !empty($school_id)){ ?>               
            $(".fn_school_id").trigger('change');
         <?php } ?>
    });
    
    $('.fn_school_id').on('change', function(){
      
        var school_id = $(this).val();
        var exam_id = '';
        var class_id = '';
        
        <?php if(isset($school_id) && !empty($school_id)){ ?>
            exam_id =  '<?php echo $exam_id; ?>';           
            class_id =  '<?php echo $class_id; ?>';           
         <?php } ?> 
           
        if(!school_id){
           toastr.error('<?php echo $this->lang->line('select'); ?> <?php echo $this->lang->line('school'); ?>');
           return false;
        }
       
       $.ajax({       
            type   : "POST",
            url    : "<?php echo site_url('ajax/get_exam_by_school'); ?>",
            data   : { school_id:school_id, exam_id:exam_id},               
            async  : false,
            success: function(response){                                                   
               if(response)
               { 
                    $('#exam_id').html(response);  
                   get_class_by_school(school_id,class_id); 
               }
            }
        });
    }); 

   function get_class_by_school(school_id, class_id){       
         
        $.ajax({       
            type   : "POST",
            url    : "<?php echo site_url('ajax/get_class_by_school'); ?>",
            data   : { school_id:school_id, class_id:class_id},               
            async  : false,
            success: function(response){                                                   
               if(response)
               {
                    $('#class_id').html(response); 
               }
            }
        }); 
		
		
		
		
		
   }  
   
  </script>
<!-- Super admin js end -->


 <script type="text/javascript">  
 
 function generate_csv(){
	 
	 var class_id 	= $('#class_id').val();
	 var section_id 	= $('#section_id').val();
	 
	 
	 }
    
  
    <?php if(isset($class_id) && isset($section_id)){ ?>
        get_section_by_class('<?php echo $class_id; ?>', '<?php echo $section_id; ?>');
    <?php } ?>
    
    function get_section_by_class(class_id, section_id){       
       
        var school_id = $('.fn_school_id').val();     
             
        if(!school_id){
           toastr.error('<?php echo $this->lang->line('select'); ?> <?php echo $this->lang->line('school'); ?>');
           return false;
        } 
        
        $.ajax({       
            type   : "POST",
            url    : "<?php echo site_url('ajax/get_section_by_class'); ?>",
            data   : {school_id:school_id, class_id : class_id , section_id: section_id},               
            async  : false,
            success: function(response){                                                   
               if(response)
               {
                  $('#section_id').html(response);
               }
            }
        });         
    } 
 $("#result").validate(); 
 $("#add").validate();
 
 
 
 
 
  
 
</script>
<style>
#datatable-responsive label.error{display: none !important;}
</style>


