<?php  
$CI =& get_instance(); 
$CI->load->model('marksheet_model');

?>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h3 class="head-title"><i class="fa fa-file-text-o"></i><small> <?php echo $this->lang->line('student'); ?> <?php echo $this->lang->line('mark_sheet'); ?></small></h3>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>                    
                </ul>
                <div class="clearfix"></div>
            </div>
            
              <div class="x_content quick-link no-print">
                 <span><?php echo $this->lang->line('quick_link'); ?>:</span>
                <?php if(has_permission(VIEW, 'exam', 'mark')){ ?>
                    <a href="<?php echo site_url('exam/mark'); ?>"><?php echo $this->lang->line('manage_mark'); ?></a>
                <?php } ?>
                <?php if(has_permission(VIEW, 'exam', 'examresult')){ ?>
                   | <a href="<?php echo site_url('exam/examresult'); ?>"><?php echo $this->lang->line('exam_term'); ?> <?php echo $this->lang->line('result'); ?></a>                 
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
            
            <div class="x_content no-print"> 
                <?php echo form_open_multipart(site_url('exam/marksheet/index'), array('name' => 'marksheet', 'id' => 'marksheet', 'class' => 'form-horizontal form-label-left'), ''); ?>
                <div class="row"> 
                        
                    <?php $this->load->view('layout/school_list_filter'); ?>  
                    
                    <div class="col-md-3 col-sm-3 col-xs-12">
                        <div class="item form-group"> 
                            <div><?php echo $this->lang->line('academic_year'); ?>  <span class="required">*</span></div>
                            <select  class="form-control col-md-7 col-xs-12" name="academic_year_id" id="academic_year_id" required="required">
                                <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                <?php foreach ($academic_years as $obj) { ?>
                                <option value="<?php echo $obj->id; ?>" <?php if(isset($academic_year_id) && $academic_year_id == $obj->id){ echo 'selected="selected"';} ?>><?php echo $obj->session_year; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                        
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
                    
                    <?php if($this->session->userdata('role_id') != STUDENT ){ ?>    
                    <div class="col-md-2 col-sm-2 col-xs-12">
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
                    
                    <div class="col-md-2 col-sm-2 col-xs-12">
                        <div class="item form-group"> 
                            <div><?php echo $this->lang->line('section'); ?>  <span class="required">*</span></div>
                            <select  class="form-control col-md-7 col-xs-12" name="section_id" id="section_id" required="required" onchange="get_student_by_section(this.value,'');">                                
                                <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                            </select>
                            <div class="help-block"><?php echo form_error('section_id'); ?></div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-12">
                        <div class="item form-group"> 
                            <div><?php echo $this->lang->line('student'); ?>  <span class="required">*</span></div>
                            <select  class="form-control col-md-7 col-xs-12" name="student_id" id="student_id" required="required">                                
                                <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                            </select>
                            <div class="help-block"><?php echo form_error('student_id'); ?></div>
                        </div>
                    </div>
                    <?php } ?>    
                                   
                    <div class="col-md-2 col-sm-2 col-xs-12">
                        <div class="form-group"><br/>
                            <button id="send" type="submit" class="btn btn-success"><?php echo $this->lang->line('find'); ?></button>
                        </div>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>

            <?php  if (isset($student) && !empty($student)) { ?>
            <div class="x_content">             
                <div class="row">
                    <div class="col-sm-6 col-xs-6  col-sm-offset-3  col-xs-offset-3 layout-box">
                        <p>
                            <?php if(isset($school)){ ?>
                            <div><img   src="<?php echo UPLOAD_PATH; ?>/logo/<?php echo $school->logo; ?>" alt="" width="70" /></div>
                            <h4><?php echo $school->school_name; ?></h4>
                            <p> <?php echo $school->address; ?></p>
                            <?php } ?>
                            <h4><?php echo $this->lang->line('student'); ?> <?php echo $this->lang->line('mark_sheet'); ?></h4> 
                            <?php echo $this->lang->line('name'); ?> : <?php echo '<strong>'.$student->surname.'</strong>'.' '.$student->name; ?><br/>
                            <?php echo $this->lang->line('exam'); ?> : <?php echo $exam->title; ?><br/>
                            <?php //echo $this->lang->line('class'); ?> : <?php //echo $student->class_name; ?>,
                            <?php echo $this->lang->line('section'); ?> : <?php echo $student->section; ?>,
                            <?php echo $this->lang->line('roll_no'); ?> : <?php echo $student->roll_no; ?>
                        </p>
                    </div>
                </div>            
            </div>
             <?php } ?>
            
            <div class="x_content">
                
                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                   <thead>
                        <tr>
                            <th rowspan="2"><?php echo $this->lang->line('sl_no'); ?></th>
                            <th rowspan="2"><?php echo $this->lang->line('subject'); ?></th>
                            
                             <?php
							
                                if (isset($class_ass) && !empty($class_ass)) {
                                
                                $ccl= explode(":",$class_ass->cat_ass_test);
                                $ccl2 = array_filter($ccl);
                                $lenth = count($ccl2);
                               // var_dump($ccl2);
                                for($xx= 0; $xx < $lenth;$xx++){
                               echo '<th colspan="2">'.$ccl[$xx].'</th>';
                                
                                }
                                } 
                                ?>
                            
                            
                            
                            
                                                                        
                            <th colspan="2"><?php echo $this->lang->line('exam'); ?></th>                                            
                            <th colspan="2"><?php echo $this->lang->line('total'); ?></th>                                            
                            <th rowspan="2"><?php echo $this->lang->line('grade'); ?></th>                                            
                            <th rowspan="2"><?php echo $this->lang->line('point'); ?></th>                                            
                            <th rowspan="2"><?php echo $this->lang->line('lowest'); ?></th>                                            
                            <th rowspan="2"><?php echo $this->lang->line('height'); ?></th>                                            
                            <th rowspan="2"><?php echo $this->lang->line('position'); ?></th>                                              
                        </tr>
                        <tr>
                         <?php
						    if (isset($class_ass) && !empty($class_ass)) {
                                	
                              	$ccl44= explode(":",$class_ass->cat_ass_test);
                                $ccl244 = array_filter($ccl44);
                                $lenth44 = count($ccl244);
                                for($xx= 0; $xx < $lenth44;$xx++){ 
						   
						  // echo "<th>".$this->lang->line('obtained').' '.$this->lang->line('mark').' '." &#8681;</th>";
						   echo "<th>". $this->lang->line('mark')."</th>";                                            
                           echo "<th>".$this->lang->line('obtain')."</th>";
						   
						    }
                                } 
						    ?>                                
                                                                      
                                                                    
                          
                                                                        
                            <th><?php echo $this->lang->line('mark'); ?></th>                                            
                            <th><?php echo $this->lang->line('obtain'); ?></th>                                            
                            <th><?php echo $this->lang->line('mark'); ?></th>                                            
                            <th><?php echo $this->lang->line('obtain'); ?></th> 
                        </tr>
                    </thead>
                    <tbody id="fn_mark">   
                        <?php
                        $count = 1;
                        if (isset($subjects) && !empty($subjects)) {
                            ?>
                            <?php foreach ($subjects as $obj) { ?>
                            <?php $lh = get_lowet_height_mark($school_id, $exam_id, $class_id, $section_id, $obj->subject_id ); 
                            ?>
                            <?php $position = get_position_in_subject($school_id, $exam_id, $class_id, $section_id, $obj->subject_id , $obj->obtain_total_mark); 
                            //var_dump($section_id); die();
                            $CI->marksheet_model->delete_duplicate_mark($school_id, $exam_id, $section_id, $student->id, $obj->subject_id, $academic_year_id);
                            
                            ?>
                                <tr>
                                    <td><?php echo $count++;  ?></td>
                                    <td><?php echo ucfirst($obj->subject); ?></td>
                                    
                              <!--written #--First Continuous Assessment Test--||||||||||||||||||||||||||||||--> 
                                <?php
						    if (isset($class_ass) && !empty($class_ass)) {
                                	
                              	$ccl44= explode(":",$class_ass->cat_ass_test);
                                $ccl244 = array_filter($ccl44);
                                $lenth44 = count($ccl244); if( $lenth44 >= 1) {?>
                                
                                    <td><?php echo $obj->written_mark; ?></td>
                                    <td><?php echo $obj->written_obtain; ?></td>
                                    
                                      <?php }
                                } 
                                ?>
                                    
                                     <!--written #--First Continuous Assessment Test--||||||||||||||||||||||end   |--> 
                                 
                                 <!--tutorial #--Second Continuous Assessment Test--||||||||||||||||||||||||||||||||||||||||--> 
                          <?php
						    if (isset($class_ass) && !empty($class_ass)) {
                                	
                              	$ccl44= explode(":",$class_ass->cat_ass_test);
                                $ccl244 = array_filter($ccl44);
                                $lenth44 = count($ccl244); if( $lenth44 >= 2) {?>
                                
                                    <td><?php echo $obj->tutorial_mark; ?></td>
                                    <td><?php echo $obj->tutorial_obtain; ?></td>
                                    
                                        <?php }
                                } 
                                ?>
                                
                                 <!--tutorial #--Second Continuous Assessment Test--||||||||||||||||||||||||||end   |--> 
                                 
                                 <!--practical #--Third Continuous Assessment Test--|||||||||||||||||||||||||||||||--> 
                          <?php
						    if (isset($class_ass) && !empty($class_ass)) {
                                	
                              	$ccl44= explode(":",$class_ass->cat_ass_test);
                                $ccl244 = array_filter($ccl44);
                                $lenth44 = count($ccl244); if( $lenth44 >= 3 ) { ?>
                                    
                                    <td><?php echo $obj->practical_mark; ?></td>
                                    <td><?php echo $obj->practical_obtain; ?></td>
                                    
                                  <?php  }
                                } 
                                ?>
                                 <!--practical #--Third Continuous Assessment Test|||||||||||||||||||end   |--> 
                                  
                            <!--vivan #--Fourth Continuous Assessment Test--|||||||||||||||||||||||||||||||--> 
                          <?php
						    if (isset($class_ass) && !empty($class_ass)) {
                                	
                              	$ccl44= explode(":",$class_ass->cat_ass_test);
                                $ccl244 = array_filter($ccl44);
                                $lenth44 = count($ccl244); if( $lenth44 >= 4 ) { ?>
                                    
                                    <td><?php echo $obj->viva_mark; ?></td>
                                    <td><?php echo $obj->viva_obtain; ?></td>
                                    
                                  <?php  }
                                } 
                                ?>
                                 <!--vivan #--Fourth Continuous Assessment Test|||||||||||||||||||end   |--> 
                                  
                                  
                                    
                                    <td><?php echo $obj->exam_mark; ?></td>
                                    <td><?php echo $obj->exam_obtain; ?></td>
                                    <td><?php echo $obj->exam_total_mark; ?></td>
                                    <td><?php echo $obj->obtain_total_mark; ?></td>
                                    <td>
									<?php
							 if (isset($obj->obtain_total_mark) && !empty($obj->obtain_total_mark)) {
@$result = $CI->marksheet_model->get_grade($obj->obtain_total_mark,$class_id,$school_id ) ; echo @$result["name"]; 
                                 }
									
									
									 //echo $obj->name; 
									 ?>
                                    
                                    </td>
                                    <td><?php // echo $grade_point; //$obj->point; ?>
                                    
                                   <?php @$result = $CI->marksheet_model->get_grade($obj->obtain_total_mark,$class_id,$school_id ) ; echo @$result["point"]; ?>  
                                    </td>                               
                                    <td><?php echo $lh->lowest; ?></td>                               
                                    <td><?php echo $lh->height; ?></td>                               
                                    <td><?php echo $position; ?></td>                               
                                </tr>
                            <?php } ?>
                        <?php }else{ ?>
                                <tr>
                                    <td colspan="17" align="center"><?php echo $this->lang->line('no_data_found'); ?></td>
                                </tr>
                        <?php } ?>
                    </tbody>
                </table>             
            </div>


        <div class="col-md-12 col-sm-12 col-xs-12 no-print">
            <?php if (isset($result_comments) && !empty($result_comments)) { ?>
            <form>
                <?php foreach ($result_comments as $comments); ?>
                <?php //endforech} ?>
                <div class="instructions">
                    <label>Teachers Comment</label>
                    <input id="teacher_comment" class="form-control" style="width:70% " type="text" name="" value="<?php echo $comments->teacher_comment; ?>">
                    <label>General Comment</label>
                    <input id="general_comment" class="form-control" style="width:70% " type="text" name="" value="<?php echo $comments->general_comment; ?>">
                </div>
                
                <div class="instructions"><a  onclick="update_comment()" id="update_comment" >Click here to update</a>
            </form>
        <?php }else{ ?>
                <form>
                
                <div class="instructions">
                    <label>Teachers Comment</label>
                    <input id="teacher_comment" class="form-control" style="width:70% " type="text" name="" value="">
                    <label>General Comment</label>
                    <input id="general_comment" class="form-control" style="width:70% " type="text" name="" value="">
                </div>
                
                <div class="instructions"><a  onclick="update_comment()" id="update_comment" >Click here to update</a>
            </form>

        <?php } ?>
        </div>



            <div class="row no-print">
                <div class="col-xs-12 text-right">
                    <!--button class="btn btn-default " onclick="window.print();"><i class="fa fa-print"></i> <?php //echo $this->lang->line('print'); ?></button-->
                    <button class="btn btn-default " value="Open Window" onclick="document.forms['myform2'].submit(); return false;"><i class="fa fa-print"></i> <?php echo $this->lang->line('print').' Student Annual Report Summary'; ?></button>
                    
                    <button class="btn btn-default " value="Open Window" onclick="document.forms['myform'].submit(); return false;"><i class="fa fa-print"></i> <?php echo $this->lang->line('print').' Student Report Sheet'; ?></button>

                   
                </div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 no-print">
                <div class="instructions"><strong><?php echo $this->lang->line('instruction'); ?>: </strong> <?php echo $this->lang->line('mark_sheet_instruction'); ?></div>
            </div>
        </div>
    </div>
</div>

<form name="myform" method="post" action="<?php echo site_url('checkmyresult/student_marksheet_print_view'); ?>"
  target="_blank">
<input type="hidden" name="school_id" value="<?php echo @$school_id; ?>">
<input type="hidden" name="exam_id" value="<?php echo @$exam_id; ?>">
<input type="hidden" name="student_id" value="<?php echo @$student_id; ?>">
</form>

<form name="myform2" method="post" action="<?php echo site_url('checkmyresult/student_annualreport_view'); ?>"
  target="_blank">
<input type="hidden" name="school_id" value="<?php echo @$school_id; ?>">
<input type="hidden" name="exam_id" value="<?php echo @$exam_id; ?>">
<input type="hidden" name="student_id" value="<?php echo @$student_id; ?>">
</form>

 <script>
function openWin() {

  window.open("<?php echo site_url('checkmyresult/student_marksheet_print_view'); ?>");
}
</script>
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
        var academic_year_id = '';
        
        <?php if(isset($school_id) && !empty($school_id)){ ?>
            exam_id =  '<?php echo $exam_id; ?>';           
            class_id =  '<?php echo $class_id; ?>';           
            academic_year_id =  '<?php echo $academic_year_id; ?>';           
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
                   get_academic_year_by_school(school_id, academic_year_id);
               }
            }
        });
    }); 

    function get_academic_year_by_school(school_id, academic_year_id){       
         
        $.ajax({       
            type   : "POST",
            url    : "<?php echo site_url('ajax/get_academic_year_by_school'); ?>",
            data   : { school_id:school_id, academic_year_id :academic_year_id},               
            async  : false,
            success: function(response){                                                   
               if(response)
               { 
                    $('#academic_year_id').html(response); 
               }
            }
        });
   }
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
  
    <?php if(isset($class_id) && isset($section_id)){ ?>
        get_section_by_class('<?php echo $class_id; ?>', '<?php echo $section_id; ?>');
    <?php } ?>
    
    
    function get_section_by_class(class_id, section_id){       
       
       var school_id = $('#school_id').val();  
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
 
    <?php if(isset($class_id) && isset($section_id)){ ?>
        get_student_by_section('<?php echo $section_id; ?>', '<?php echo $student_id; ?>');
    <?php } ?>
    
    function get_student_by_section(section_id, student_id){       
        
        var school_id = $('#school_id').val();
        var academic_year_id = $('#academic_year_id').val(); 

        //alert(academic_year_id); 

        if(!school_id){
           toastr.error('<?php echo $this->lang->line('select'); ?> <?php echo $this->lang->line('school'); ?>');
           return false;
        } 
           
        $.ajax({       
            type   : "POST",
            url    : "<?php echo site_url('ajax/get_student_by_section'); ?>",
            data   : { section_id: section_id, student_id: student_id, academic_year_id: academic_year_id },               
            async  : false,
            success: function(response){                                                   
               if(response)
               {
                  $('#student_id').html(response);
               }
            }
        });         
    }
 
  $("#marksheet").validate(); 
</script>

<script type="text/javascript">
    
    function update_comment(){ 
        var school_id = $('#school_id').val();
        var exam_id =  '<?php echo $exam_id; ?>';           
        var class_id =  '<?php echo $class_id; ?>'; 
        var section_id =  '<?php echo $section_id; ?>'
        var student_id =  '<?php echo $student_id; ?>'
        var student_name = '<?php echo @$student->surname; ?>'          
        var academic_year_id =  '<?php echo $academic_year_id; ?>';
        var teacher_comment = $('#teacher_comment').val();
        var general_comment = $('#general_comment').val();
         alert('You Comment on '+ student_name);

        $.ajax({       
            type   : "POST",
            url    : "<?php echo site_url('ajax/update_result_comments'); ?>",
            data   : { school_id:school_id, exam_id:exam_id, class_id:class_id, section_id:section_id, student_id:student_id, academic_year_id:academic_year_id, teacher_comment:teacher_comment, general_comment:general_comment  },               
            async  : false,
            success: function(response){                                                   
               if(response)
               {
                    //$('#class_id').html(response); 
                     alert("successful"); 
               }
            }
        }); 
   }
</script>
<style>
.table>thead>tr>th {
    padding: 4px;
}
</style>



