<?php  
$CI =& get_instance(); 
$CI->load->model('Marksheet_Model');
?>

<style type="text/css">
    
    tbody {
    background-color: #e4f0f5;
}

</style>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h3 class="head-title"><i class="fa fa-file-text-o"></i><small> <?php echo $this->lang->line('manage'); ?> <?php echo $this->lang->line('exam_tabulation_sheet'); ?> <?php echo $this->lang->line('result'); ?></small></h3>
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

            <div class="x_content"> 
                <?php echo form_open_multipart(site_url('exam/tabulationsheet/index'), array('name' => 'result', 'id' => 'result', 'class' => 'form-horizontal form-label-left'), ''); ?>
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
                    <div class="col-md-2 col-sm-2 col-xs-12">
                        <div class="form-group"><br/>
                            <button id="send" type="submit" class="btn btn-success"><?php echo $this->lang->line('find'); ?></button>
                        </div>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>

           <?php  if (isset($students) && !empty($students)) { ?>
            <div class="x_content">             
                <div class="row">
                    <div class="col-sm-4  col-sm-offset-4 layout-box">
                        <p>
                            <h4><?php echo $this->lang->line('exam_tabulation_sheet'); ?> <?php echo $this->lang->line('result'); ?></h4>                            
                            <?php echo $this->lang->line('exam'); ?> <?php echo $this->lang->line('title'); ?>: <?php echo $exam->title; ?>
                        </p>
                    </div>
                </div>            
            </div>
             <?php } ?>
            
            <div class="x_content">
                 <?php echo form_open(site_url('exam/examresult/add'), array('name' => 'add', 'id' => 'add', 'class'=>'form-horizontal form-label-left'), ''); ?>
                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th><?php echo $this->lang->line('roll_no'); ?></th>
                            <th><?php echo $this->lang->line('name'); ?></th>
                            <th><?php echo $this->lang->line('photo'); ?></th>                            
                            <th><?php echo $this->lang->line('total'); ?> <?php echo $this->lang->line('subject'); ?></th>
                            <th><?php echo $this->lang->line('exam'); ?> <?php echo $this->lang->line('mark'); ?></th>
                            <th><?php echo $this->lang->line('obtain'); ?> <?php echo $this->lang->line('mark'); ?></th>                			<th> <?php echo $this->lang->line('average'); ?>Mark Average</th>                                            
                            <th><?php echo $this->lang->line('obtain'); ?> Average</th>
                            <th> <?php echo $this->lang->line('average_grade_point'); ?></th>
                            
                            <th><?php echo $this->lang->line('grade'); ?></th>                                            
                            <th><?php echo $this->lang->line('remark'); ?></th>                                            
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
                            $mark = get_exam_total_mark($school_id, $exam->id, $obj->id, $academic_year_id,  $class_id, $section_id );
                            ?>
                                <tr>
                                    <td><?php echo $obj->roll_no; ?></td>
                                    <td><?php echo ucfirst($obj->name); ?></td>
                                    <td>
                                        <?php if ($obj->photo != '') { ?>
                                            <img src="<?php echo UPLOAD_PATH; ?>/student-photo/<?php echo $obj->photo; ?>" alt="" width="45" /> 
                                        <?php } else { ?>
                                            <img src="<?php echo IMG_URL; ?>/default-user.png" alt="" width="45" /> 
                                        <?php } ?>
                                        <input type="hidden" value="<?php echo $obj->id; ?>"  name="students[]" />       
                                    </td>                                     
                                    <td> 
                                        <?php echo $mark->total_subject; ?>
                                        <input type="hidden" name="total_subject[<?php echo $obj->id; ?>]" value="<?php echo $mark->total_subject; ?>" />
                                    </td>
                                    <td>
                                        <?php echo $mark->exam_mark; ?>
                                        <input type="hidden" name="total_mark[<?php echo $obj->id; ?>]" value="<?php echo $mark->exam_mark; ?>" />
                                    </td>                                    
                                    <td>
                                        <?php echo $mark->obtain_mark; ?>
                                        <input type="hidden" name="total_obtain_mark[<?php echo $obj->id; ?>]" value="<?php echo $mark->obtain_mark; ?>" />
                                    </td>                                
                                    <td>
            <?php 
            //var_dump($mark->total_subject); die();
            if(! is_numeric($mark->total_subject) || $mark->total_subject == 0 ){ 
             $average = 0;
            return 0; 
                
            }else{
              $average = @number_format($mark->exam_mark/$mark->total_subject,0);
                echo @number_format($mark->exam_mark/$mark->total_subject,2);  
                
            }
            
            
                                         ?>
                                    </td>
                                    
                                    <td>
     									<?php $average_grade_point = @number_format($mark->obtain_mark/$mark->total_subject,0); 
                                            echo @number_format($mark->obtain_mark/$mark->total_subject,2); 
                                        ?>
                                       
                                    </td>                                
                                    <td>
                <?php $result = $CI->Marksheet_Model->get_grade( $average_grade_point,$class_id,$school_id ) ; echo $result["point"]; ?>
                                    </td>
                                      
                                    <td>
                                       <?php $result2 = $CI->Marksheet_Model->get_grade(@$average_grade_point,$class_id,$school_id ) ; echo $result2["name"]; ?>
                                    </td>
   
                                    <td>
                            <input disabled="disabled" type="text" value="<?php $result3 = $CI->Marksheet_Model->get_grade(@$average_grade_point,$class_id,$school_id ) ; echo $result3["note"]; ?>"  name="" class="form-control col-md-7 col-xs-12" />
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

                <div class="col-md-12">
    <?php    if (isset($subjects) && !empty($subjects)) { ////////START SUBJ IF ?>
                           
        <table  class="table table-bordered">
            <thead>
                <tr>
                <td style="text-align: center;">
                    <?php echo 'students';?> <i class="entypo-down-thin"></i> | <?php echo 'subjects';?> <i class="entypo-right-thin"></i>
                </td>
                <?php 
                    //$subjects = $this->db->get_where('subjects' , array('class_id' => $class_id , 'year' => $running_year))->result_array();
                    foreach($subjects as $row):
                ?>
                    <td style="text-align: center;"><?php echo $row->name;?></td>
                <?php endforeach;?>
                <td style="text-align: center;"><?php echo 'total';?></td>
                <td style="text-align: center;"><?php echo 'average_grade_point';?></td>
                </tr>
            </thead>
            <tbody>
            <?php
                
                //$students = $this->db->get_where('enroll' , array('class_id' => $class_id , 'year' => $running_year))->result_array();
                foreach($students as $row):
            ?>
                <tr>
                    <td style="text-align: center;">
                        <?php echo '['.$row->admission_no.'] '. $row->surname.' '.$row->name; //$this->db->get_where('student' , array('student_id' => $row['student_id']))->row()->name;?>
                    </td>
                <?php
                    $total_marks = 0;
                    $total_grade_point = 0;  
                    foreach($subjects as $row2):
                ?>
                    <td style="text-align: center;">
                          <?php 
                           $obtained_mark_query =  $this->db->get_where('marks' , array(
                                                    'class_id' => $class_id ,
                                                        'exam_id' => $exam_id ,   
                                                            'subject_id' => $row2->id , 
                                                                'student_id' => $row->id
                                                ));
                            if ( $obtained_mark_query->num_rows() > 0) {
                                $obtained_marks = $obtained_mark_query->row()->obtain_total_mark;
                                echo $obtained_marks;
                                $total_marks += $obtained_marks;
                            }
                            

                        ?>
                    </td>
                <?php endforeach;?>
                <td style="text-align: center;"><?php echo $total_marks;?></td>
                <td style="text-align: center;">
                    
                    <?php $avg = ($total_marks/count($subjects)); echo round($avg,2); ?>
                    <?php 
                     /*   $this->db->where('class_id' , $class_id);
                        $this->db->where('year' , $running_year);
                        $this->db->from('subject');
                        $number_of_subjects = $this->db->count_all_results();
                        echo ($total_grade_point / $number_of_subjects);
                        */
                    ?>
                </td>
                </tr>

            <?php endforeach;?>

            </tbody>
        </table>

   <?php     } //////////////////END START SUBJ IF  ?>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-5">
                        <input type="hidden" value="<?php echo isset($school_id) ? $school_id : ''; ?>"  name="school_id" />
                        <input type="hidden" value="<?php echo isset($exam_id) ? $exam_id : ''; ?>"  name="exam_id" />
                        <input type="hidden" value="<?php echo isset($class_id) ? $class_id : ''; ?>"  name="class_id" />
                        <input type="hidden" value="<?php echo isset($section_id) ? $section_id : ''; ?>"  name="section_id" />
                        
                    </div>
                </div>
                 <?php echo form_close(); ?>
                
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="instructions"><strong><?php echo $this->lang->line('instruction'); ?>: </strong> <?php echo $this->lang->line('exam_result_instruction'); ?></div>
                </div>
                
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


