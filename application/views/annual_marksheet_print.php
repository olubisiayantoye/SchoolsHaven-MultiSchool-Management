<?php
$CI =& get_instance(); 
$CI->load->model('checkmyresult_model');
$CI->load->model('Ajax_Model');

	$class_name		 	= 	$this->db->get_where('classes' , array('id' => $class_id))->row()->name;
	$position_format	= 	$this->db->get_where('classes' , array('id' => $class_id))->row()->position_format;
	$position_input	 	= 	$this->db->get_where('classes' , array('id' => $class_id))->row()->position_input;
	$exam_name  		= 	$this->db->get_where('exams' , array('id' => $exam_id))->row()->title;
	$total_attendance  		= 	$this->db->get_where('exams' , array('id' => $exam_id))->row()->total_attendance;
	$next_term_begins  		= 	$this->db->get_where('exams' , array('id' => $exam_id))->row()->next_term_begins;
	
	
	$school_logo        =	$this->db->get_where('schools' , array('id'=> $school_id))->row()->logo;

	$system_name        =	$this->db->get_where('schools' , array('id'=> $school_id))->row()->school_name;
	$system_address    =	$this->db->get_where('schools' , array('id'=> $school_id))->row()->address;
	$academic_year_id    =	$this->db->get_where('schools' , array('id'=> $school_id))->row()->academic_year_id;
		
    $running_year       =   $this->db->get_where('academic_years' , array('id' =>$academic_year_id))->row()->session_year;
	$dateofbirth = @$this->db->get_where('students' , array('id' => $student_id))->row()->dob;
	$student_pic = $this->db->get_where('students' , array('id' => $student_id))->row()->photo;
	$class_population = $this->db->get_where('enrollments' , array('academic_year_id' => $academic_year_id,'school_id' => $school_id,'class_id' => $class_id))->num_rows();
	
	$psection_id = $this->db->get_where('enrollments' , array('academic_year_id' => $academic_year_id,'school_id' => $school_id,'class_id' => $class_id))->row()->section_id;
	
	$section_population = $this->db->get_where('enrollments' , array('academic_year_id' => $academic_year_id,'school_id' => $school_id,'section_id' => $psection_id))->num_rows();
	
	//var_dump($psection_id); die();
	
	 $students = $CI->Ajax_Model->get_student_list_by_section($school_id, $section_id, $academic_year_id);
		//first find how many exam
	$all_exam  		= 	$this->db->order_by('term', 'ASC')->get_where('exams' , array('academic_year_id' => $academic_year_id,'school_id' => $school_id))->result_array();
	
   $all_exam_num  = $this->db->order_by('term', 'ASC')->get_where('exams' , array('academic_year_id' => $academic_year_id,'school_id' => $school_id))->num_rows();

	
 $anual_summaexam_total	= 0;
 $anual_total	= 0;
 
?>



 
<style type="text/css">


 #printz {
     
     width: 21cm;
        height: 29.7cm;
        margin: 30mm 45mm 30mm 45mm; 
     
 }



		td {
			padding: 5px;
		}
		
		.StandardTable thead th{
    background: #ADD8E6; 
}

.StandardTable thead th:first-of-type{
    border-top-left-radius: 10px; 
}

.StandardTable thead th:last-of-type{
    border-top-right-radius: 10px; 
}
	</style>
	
	
	<style>
tablex {
  font-family: arial, sans-serif;
  font-size:12px;
  border-collapse: collapse;
  width: 100%;
  
}

tdx, thx {
  border: 1px solid #6FA8DC;
  text-align: left;
  padding: 8px;
}

trx:nth-child(even) {
  background-color: #6FA8DC;
}
</style>


<style>
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
  font-weight:bold;
  
}

#customers td, #customers th {
  border: 1px solid #191818;
  padding: 2px;
  
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
    padding-top: 6px;
  padding-bottom: 6px;
  text-align: left;
  background-color: #93fb97;
  color: black;
}
</style>




<div id="print">

	<script src="assets/js/jquery-1.11.0.min.js"></script>
	







<table width="100%" border="0" align="center">
  <tr>
    <td width="" rowspan="5"><img src="<?php if($student_pic != null){ echo base_url().'assets/uploads/student-photo/'.$student_pic;} //echo $this->crud_model->get_image_url('student',$student_id);?>" class="img-circle" width="120" /></td>
    <td width="446"><center>
    
		<img src="<?php echo base_url(); ?>assets/uploads/logo/<?php echo $school_logo ?>" style="max-height : 80px;">
    </center></td>
    <td width="133" rowspan="5">&nbsp;</td>
  </tr>
  <tr>
    <td></td>
  </tr>
  <tr>
    <td align="center"><span style="font-weight: 100;"><font size="+2"><?php echo $system_name;?></font></span></td>
  </tr>
  <tr>
    <td align="center"><?php echo $system_address;?> : </td>
  </tr>
  <tr>
    <td align="center"><?php //echo get_phrase('student_marksheet');?>
      <?php // echo $this->db->get_where('student' , array('student_id' => $student_id))->row()->name;?>
      <?php // echo get_phrase('class') . ' ' . $class_name;?>
      <?php echo $exam_name;?></td>
  </tr>
</table>

	

    

    <table width="100%" border="0">
  <tr>
    <th scope="row">Full Name:</th>
    <td><?php echo $this->db->get_where('students' , array('id' => $student_id))->row()->surname;?>
    <?php echo $this->db->get_where('students' , array('id' => $student_id))->row()->name;?>
    </td>
    <td>&nbsp;</td>
    <th scope="row">&nbsp;</th>
    <td>&nbsp;</td>
    <td></td>
    <th scope="row">Sex:</th>
     <td>
	
     <?php $gender = $this->db->get_where('students' , array('id' => $student_id))->row()->gender;
     echo ucwords($gender);
     ?>
     </td>
  </tr>
  <tr>
    <th scope="row">Class:</th>
    <td><?php echo $class_name; ?></td>
    <td>&nbsp;</td>
    <th scope="row"></th>
      
    <td><?php //echo $dateofbirth; ?></td>
    <td>&nbsp;</td>
   <th scope="row">Next term begins:</th>
    <td><?php echo $next_term_begins; ?></td>
  </tr>
  
</table>

<BR />

<table id="customers" ;="" style="width:100%; border-collapse:collapse;border: 1px solid #ccc; margin-top: 10px;" border="1">
                   <thead>
                        <tr>
                             <th rowspan="3"><?php echo $this->lang->line('sl_no'); ?></th>
                            <th rowspan="3"><?php echo $this->lang->line('subject'); ?></th>
                            <!-- LOOP EXAM <th>First C A T</th>-->
                             
                             <?php
							
                                if (isset($class_ass) && !empty($class_ass)) {
                                
                                $ccl= explode(":",$class_ass->abbreviation);
                                $ccl2 = array_filter($ccl);
                               // $ccl2v = range($ccl);
                                 //var_dump($ccl2v);
                                $lenth = count($ccl2);
                               
                                for($xx= 0; $xx < $lenth;$xx++){
                               echo '<th>'.$ccl[$xx].'</th>';
                                
                                }
                                } 
                                ?>
                             <!--END LOOP EXAM -->
                            
                            
                            
                                                                        
                            <th>Exam</th>                                            
                            <th>Total</th>                                            
                            <th rowspan="3">Grade</th>                                            
                            <!--th rowspan="2"></th -->                                            
                            <th rowspan="3">Lowest</th>                                            
                            <th rowspan="3">Highest</th>
                            <th rowspan="3">Ps</th>
                            <th colspan="6">SUMMARY OF TERM&quot;S&quot; WORK</th>
                        </tr>
                        <tr>
                            <!-- LOOP EXAM <th>Mark 15</th>-->
                      <?php
						    if (isset($class_ass) && !empty($class_ass)) {
                                	
                              	$ccl44= explode(":",$class_ass->cat_ass_test);
                              	$cclmm= explode(":",$class_ass->cont_mark);
                                $ccl244 = array_filter($ccl44);
                                $lenth44 = count($ccl244);
                                for($xx= 0; $xx < $lenth44;$xx++){ 

						 @$totalcat += $cclmm[$xx];
                           echo "<th>".$this->lang->line('mark').':'.$cclmm[$xx]."%"."</th>";
						   
						    }
                                } 
						    ?>      
                          <!--END LOOP EXAM -->                                            
                                                                    
                          
                                                                        
                    <th>Mark:<?php echo 100-$totalcat; ?>%</th>                                            
                    <th>Mark:<?php echo $totalcat+(100-$totalcat); ?>%</th>
                    <!--loop summary term work <th>THIRD</th>--->
    
                        <?php foreach ($all_exam as $obj_exam) {?>
            <th><?php echo explode(' ',trim($obj_exam['term']))[0]; ?> </th>
                        <?php }  ?> 
                             
                    <!--End loop summary term work  -->      
                            <th rowspan="2">AVG</th>
                            <th rowspan="2">GRADE</th>
                            <!--th rowspan="2">PS</th -->                                            
                        </tr>
                        <tr>
                        <!-- LOOP EXAM <th>Obtained</th>-->    
                          
                          
                          <?php
						    if (isset($class_ass) && !empty($class_ass)) {
                                	
                              	$ccl44= explode(":",$class_ass->cat_ass_test);
                              	$cclmm= explode(":",$class_ass->cont_mark);
                                $ccl244 = array_filter($ccl44);
                                $lenth44 = count($ccl244);
                                for($xx= 0; $xx < $lenth44;$xx++){ 

						 
                           echo "<th>Obtained</th>";
						   
						    }
                                } 
						    ?>
                        <!--END LOOP EXAM --> 
                          <th>Obtained</th>
                          <th>Obtained</th>
                          
                          <!--loop summary term work <th>100</th>------>
                          
                          <?php  foreach ($all_exam as $obj_exam) {?>
                         <th><?php echo "100%"; ?> </th>
                        <?php }  ?> 
                          <!--END loop summary term work--->
                        </tr>
                    </thead>
                    <tbody id="fn_mark">   

                                 <?php
                        $count = 1;
                        if (isset($subjects) && !empty($subjects)) {
                            ?>
                            <?php foreach ($subjects as $obj) { ?>
                            <?php $lh = get_lowet_height_mark($school_id, $exam_id, $class_id, $section_id, $obj->subject_id ); 
    $CI->checkmyresult_model->delete_duplicate_mark($school_id, $exam_id, $section_id, $student_id, $obj->subject_id, $academic_year_id);                        
                            ?>
                            <?php $position = get_position_in_subject($school_id, $exam_id, $class_id, $section_id, $obj->subject_id , $obj->obtain_total_mark); ?>
                             <?php  if ( $position == 0 ) { continue; } ?>
                                <tr>
                                <td><?php echo $count++;  ?></td>
                                <td><?php
                                $subjtaken_id = $obj->subject_id;
                                echo ucfirst($obj->subject); ?></td>   
                                    
                                    
                                    
                    <!--written #--First Continuous Assessment Test--||||||||||||||||||||||||||||||--> 

                     <?php
						    if (isset($class_ass) && !empty($class_ass)) {
                                	
                              	$ccl44= explode(":",$class_ass->cat_ass_test);
                                $ccl244 = array_filter($ccl44);
                                $lenth44 = count($ccl244); if( $lenth44 >= 1) {?>

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
                                    
                                    <!--td><?php //echo $obj->practical_mark; ?></td-->
                                    <td><?php echo $obj->practical_obtain; ?></td>
                                    
                                  <?php  }
                                } 
                                ?>
                <!--practical #--Third Continuous Assessment Test|||||||||||||||||||end   |--> 
                   
                    <!--practical #--Fourth Continuous Assessment Test--|||||||||||||||||||||||||||||||-->
                    <?php
						    if (isset($class_ass) && !empty($class_ass)) {
                                	
                              	$ccl44= explode(":",$class_ass->cat_ass_test);
                                $ccl244 = array_filter($ccl44);
                                $lenth44 = count($ccl244); if( $lenth44 >= 4 ) { ?>
                                    
                                    <!--td><?php //echo $obj->viva_mark; ?></td-->
                                    <td><?php echo $obj->viva_obtain; ?></td>
                                    
                                  <?php  }
                                } 
                                ?>
                    <!--practical #--Fourth Continuous Assessment Test|||||||||||||||||||end   |-->
                                    
                                <td><?php echo $obj->exam_obtain; ?></td>
                                <td><?php echo $obj->obtain_total_mark; 
									@$exam_total_mark += $obj->exam_total_mark;
									@$total_marks += $obj->obtain_total_mark;
									?></td>
                                <td>
                                <?php
							 if (isset($obj->obtain_total_mark) && !empty($obj->obtain_total_mark)) {
$result = $CI->checkmyresult_model->get_grade($obj->obtain_total_mark,$class_id,$school_id ) ; echo $result["name"]; 
                                 }
 
								?>
                                </td>
                                    <!--td>                                    
                                     
                                    </td-->                               
                                    <td><?php echo $lh->lowest; ?></td>
                                    <td><?php echo $lh->height; ?></td>
                                    <td><?php echo $position; ?></td>
                        <!--loop summary term work--<td>ok</td>-->
                            <?php $numexa=0; $summaexam_total=0; foreach ($all_exam as $obj_exam) {
                            @$sum_score = $CI->checkmyresult_model->summaryget_total_scored($school_id,$student_id,$subjtaken_id,$obj_exam['id'], $class_id, $section_id, $academic_year_id);
							     //echo $sum_score;
                            echo "<td>".$sum_score."</td>";
                           $summaexam_total += $sum_score;
                            $numexa++;
                              }
                              ?> 
                         <!--end loop summary term work --->
                        <td><?php  $summaexam_total2 = round($summaexam_total/$numexa, 2); 
                        echo $summaexam_total2;
                         $anual_summaexam_total += $summaexam_total2;
                         $anual_total += $summaexam_total;
                        ?></td>
                                    <td>
                                     <?php
							 if (isset($summaexam_total2) && !empty($summaexam_total2)) {
@$result2 = $CI->checkmyresult_model->get_grade($summaexam_total2,$class_id,$school_id ) ; echo @$result2["name"]; 
                                 }
 
								?>   
                                        
                                    </td>                               
                                    <!-- td>&nbsp; PS</td-->                               
                                 </tr>
                            <?php } ?>
                        <?php }else{ ?>
                                <tr>
                                    <td colspan="17" align="center"><?php echo $this->lang->line('no_data_found'); ?></td>
                                </tr>
                        <?php } ?>
                    </tbody>
</table>
<br>
<?php 
$phyco = $this->db->get_where('exam_results' , array('student_id' => $student_id,'exam_id' => $exam_id))->row();
$gremark_name = $this->db->get_where('schools' , array('id' => $school_id))->row(); 
$keygrade = $this->db->order_by('point', 'DESC')->get_where('grades' , array('class_id' => $class_id,'school_id' => $school_id))->result_array();

//var_dump($keygrade);
?>

 

<table style="width:100%; border-collapse:collapse;border: 1px solid #ccc; margin-top: 10px;" border="1">
  <tr>
    <th>AFFECTIVE</th>
    <td>1-5</td>
    <td>&nbsp;</td>
    <th>PSYCHOMOTOR</th>
    <td>1-5</td>
    <td>&nbsp;</td>
    <th scope="row">KEY</th>
    <!--td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td-->
  </tr>
  <tr>
   <td><?php $af1 =(!empty($gremark_name->affective_1)) ? $gremark_name->affective_1 :"Speaking/Fluency"; echo $af1; ?></td>
    <td><?php if(!is_null($phyco)){echo $phyco->affective_1;}?></td>
    <td>&nbsp;</td>
    <td><?php $ps1 =(!empty($gremark_name->psycho_1)) ? $gremark_name->psycho_1 :"Handwritting"; echo $ps1; ?></td>
    <td><?php if(!is_null($phyco)){echo $phyco->psycho_1;}?></td>
    <td>&nbsp;</td>
    <td>MARK</td>
    <?php foreach($keygrade as $item):?>
    
    <td> <?php echo $item['mark_from'].'-'.$item['mark_to']; ?></td>
    
    <?php endforeach; ?>
    
  </tr>
  <tr>
    <td><?php $af2 =(!empty($gremark_name->affective_2)) ? $gremark_name->affective_2 :"Punctual/neatness"; echo $af2; ?></td>
    <td><?php if(!is_null($phyco)){echo $phyco->affective_2;}?></td>
    <td>&nbsp;</td>
    <td><?php $ps2 =(!empty($gremark_name->psycho_2)) ? $gremark_name->psycho_2 :"Games"; echo $ps2; ?></td>
    <td><?php if(!is_null($phyco)){echo $phyco->psycho_2;}?></td>
    <td>&nbsp;</td>
    <td>REMARK</td>
    
    <?php foreach($keygrade as $item2):?>
    
    <td><?php  echo $item2['note']; ?></td>
    
    <?php endforeach; ?>
    
  </tr>
  <tr>
    <td><?php $af3 =(!empty($gremark_name->affective_3)) ? $gremark_name->affective_3 :"Attentiveness"; echo $af3; ?></td>
    <td><?php if(!is_null($phyco)){echo $phyco->affective_3;}?></td>
    <td>&nbsp;</td>
    <td><?php $ps3 =(!empty($gremark_name->psycho_3)) ? $gremark_name->psycho_3 :"Music Skill/Fine Art"; echo $ps3; ?></td>
    <td><?php if(!is_null($phyco)){echo $phyco->psycho_3;}?></td>
    <td>&nbsp;</td>
    <td>GRADE</td>
    
    <?php foreach($keygrade as $item3):?>
    
    <td><?php echo $item3['name']; ?></td>
    
    <?php endforeach; ?>
 
  </tr>
  <tr>
    <td><?php $af4 =(!empty($gremark_name->affective_4)) ? $gremark_name->affective_4 :" "; echo $af4; ?></td>
    <td><?php if(!is_null($phyco)){echo $phyco->affective_4;}?></td>
    <td>&nbsp;</td>
    <td><?php $ps4 =(!empty($gremark_name->psycho_4)) ? $gremark_name->psycho_4 :" "; echo $ps4; ?></td>
    <td><?php if(!is_null($phyco)){echo $phyco->psycho_4;}?></td>
    <td>&nbsp;</td>
    <td>SCALE</td>
    <?php foreach($keygrade as $item4):?>
    
    <td><?php echo $item4['point']; ?></td>
    
    <?php endforeach; ?>
    
  </tr>

  <tr>
    <td><?php $af5 =(!empty($gremark_name->affective_5)) ? $gremark_name->affective_5 :" "; echo $af5; ?></td>
    <td><?php if(!is_null($phyco)){echo $phyco->affective_5;}?></td>
    <td>&nbsp;</td>
    <td><?php $ps5 =(!empty($gremark_name->psycho_5)) ? $gremark_name->psycho_5 :" "; echo $ps5; ?></td>
    <td><?php if(!is_null($phyco)){echo $phyco->psycho_5;}?></td>
    <td></td>
    <!--td>thh hhhh hh</td>
    <td>thh hhhh hh</td>
    <td>thh hhhh hh</td>
    <td>thh hhhh hh</td>
    <td>thh hhhh hh</td>
    <td>thh hhhh hh</td-->
  </tr>

</table>
<br>
<table  style="width:100%; border-collapse:collapse;border: 1px solid #ccc; margin-top: 10px;" border="0" >
  <tr>
    <td><strong>Annual Total Marks Obtained: </strong><?php echo  $anual_total ; //echo @$total_marks;?></td>
    <td></td>
    <td>&nbsp;</td>
    <td><strong> <?php echo "Student's Annual Average Mark";?></strong> : 
	        <?php //@$average_mark = (@$total_marks/(@$count-1));
			//echo number_format(@$average_mark,2);
			@$average_mark = (@$anual_total/(@$count-1));
			@$av_mark = (@$summaexam_total2/(@$count-1));
			 echo number_format(@$average_mark,2); ; 

	        ?></td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td><strong>Teacher's Comment</strong>:<?php if(!is_null($phyco)){echo $phyco->teacher_comment;}?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><strong>Conduct</strong>:<?php if(!is_null($phyco)){echo $phyco->conduct;}?></td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td><strong>General Comment</strong>:
      <?php if(!is_null($phyco)){echo $phyco->general_comment;}?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><strong>Class Position</strong>:
    <?php
	
$position = $CI->checkmyresult_model->student_class_position($school_id,$exam_id,$class_id,$student_id);

	
	 //$section_id	= 	$this->db->get_where('enroll' , array('class_id' => $class_id,'student_id' => $student_id,'year'=>$running_year))->row()->section_id;

	//$position = $this->crud_model->student_class_position($exam_id,$class_id,$student_id);
	//$position_manual = $this->crud_model->student_class_position_manual($exam_id,$class_id,$student_id); 
	
	
	
	
	
	function ordinal($number) {
    $ends = array('th','st','nd','rd','th','th','th','th','th','th');
    if ((($number % 100) >= 11) && (($number%100) <= 13))
        return $number. 'th';
    else
        return $number. $ends[$number % 10];
} 
//Example Usage
	if($position_format ==1){
     if($position_input== 1){
	echo ordinal($position); }
	else{
	if(!is_null($phyco)){echo ordinal($phyco->class_position);};
		} 
	}
	if($position_format ==2){
 		@$average_mark2 = round(@$average_mark,0);
 		if($all_exam_num==2){
 		    @$total_scored_percet = (100*@$average_mark2)/200;
 		 }elseif($all_exam_num==3){
 		    @$total_scored_percet = (100*@$average_mark2)/300;
 		 }else{
 		    @$total_scored_percet = (100*@$average_mark2)/100;
 		 } 
 		
 		@$scored_percet = round(@$total_scored_percet,0);
		@$grade_name = $CI->checkmyresult_model->get_grade(@$scored_percet,$class_id,$school_id ) ; echo "Grade ".@$grade_name["name"];

	 	//echo "Grade ".$myGrade->name;
		//var_dump($all_exam_num); die();
		//echo "Grade ".$scored_percet;
	}
	
		 //var_dump($exam_id);
	 ?>
    
    </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><strong>Total Attendance</strong>:<strong>
      <?php if(!is_null($phyco)){echo $phyco->attendance.''."....Out of....".@$total_attendance;}?>
     </strong></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
   <td><strong><?php 
   if($school_id == 8){
       echo "Class-Section Population: ".@count($students); //Great emminence school
   }else{
      echo "Class Population: ".@$class_population;  
   }
   ?></strong></td>
    <td>&nbsp;</td>
    </tr>
</table>

<center>

     <br>
	  
  </center>
  <center><strong>Any alteration on this result renders it invalid</strong></center>

</div>


<script type="text/javascript">

	jQuery(document).ready(function($)
	{
		var elem = $('#print');
		PrintElem(elem);
		Popup(data);

	});

    function PrintElem(elem)
    {
        Popup($(elem).html());
    }

    function Popup(data) 
    {
        var mywindow = window.open('', 'my div', 'height=400,width=600');
        mywindow.document.write('<html><head><title></title>');
        //mywindow.document.write('<link rel="stylesheet" href="assets/css/print.css" type="text/css" />');
        mywindow.document.write('</head><body >');
        //mywindow.document.write('<style>.print{border : 1px;}</style>');
        mywindow.document.write(data);
        mywindow.document.write('</body></html>');

        mywindow.document.close(); // necessary for IE >= 10
        mywindow.focus(); // necessary for IE >= 10

        mywindow.print();
        mywindow.close();

        return true;
    }
</script>