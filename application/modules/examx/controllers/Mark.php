<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/* * *****************Mark.php**********************************
 * @product name    : Global Multi School Management System Express
 * @type            : Class
 * @class name      : Mark
 * @description     : Manage exam mark for student whose are attend in the exam.  
 * @author          : WinnersWorld Technology 	
 * @url             : https://schoolshaven.com    
 * @support         : yousuf361@gmail.com	
 * @copyright       : Codetroopers Team	 	
 * ********************************************************** */

class Mark extends MY_Controller {

    public $data = array();

    function __construct() {
        parent::__construct();
        $this->load->model('Mark_Model', 'mark', true);        
    }

    
    /*****************Function index**********************************
    * @type            : Function
    * @function name   : index
    * @description     : Load "Exam Mark List" user interface                 
    *                    with filter option  
    * @param           : null
    * @return          : null 
    * ********************************************************** */
	   //public function index($school_id = null,$exam_id = null, $class_id = null,$section_id = null,$subject_id = null,$academic_year_id = null)
    public function index() {
  
        check_permission(VIEW);
		
		
if ($this->session->flashdata('uploadsuccess')){
	$uploadsuccess = $this->session->flashdata('uploadsuccess');
	}
        if ($_POST || isset( $uploadsuccess)  ) {

             if ($_POST ){
			$school_id = $this->input->post('school_id');
            $exam_id = $this->input->post('exam_id');
            $class_id = $this->input->post('class_id');
            $section_id = $this->input->post('section_id');
            $subject_id = $this->input->post('subject_id');
			 }
			 if (isset($uploadsuccess) ){
				 
			$school_id = $uploadsuccess['school_id'];
            $exam_id = $uploadsuccess['exam_id'];
            $class_id = $uploadsuccess['class_id'];
            $section_id = $uploadsuccess['section_id'];
            $subject_id = $uploadsuccess['subject_id']; 
				 
			 }
			//var_dump($school_id.'/'.$exam_id.'/'.$class_id.'/'.$section_id.'/'.$subject_id); die();
            $school = $this->mark->get_school_by_id($school_id);
            if(!$school->academic_year_id){
                error($this->lang->line('set_academic_year_for_school'));
                redirect('exam/mark');
            }
            
			$this->data['students'] = $this->mark->get_student_list($school_id, $exam_id, $class_id, $section_id, $subject_id, $school->academic_year_id);
			
			if(!$this->data['students']){
  echo '<script type="text/javascript">'.'alert("'.$this->lang->line('instruction').' : ----'.$this->lang->line('exam_mark_instruction').'")'.'</script>';
				}

			  $this->data['class_ass'] = $this->mark->get_class_list($school_id,$class_id);
			  
			  if (isset($_POST['generate']) && !empty($_POST['generate'])) {
				  $this->generate_mark__csv($school_id,$exam_id, $class_id, $section_id, $subject_id, $school->academic_year_id);
			}
			
 $this->data['subject'] = $this->db->get_where('subjects' , array('school_id' => $school_id,'class_id' => $class_id,'id' => $subject_id ))->row()->name;
		 $this->data['subject2'] = $this->db->get_where('subjects' , array('school_id' => $school_id,'class_id' => $class_id,'id' => $subject_id ))->row()->code;
		$this->data['session'] = $this->db->get_where('academic_years' , array('school_id' => $school_id,'id' => $school->academic_year_id ))->row()->session_year;
		$this->data['term'] = $this->db->get_where('exams' , array('school_id' => $school_id,'id' => $exam_id ))->row()->title;
		
		
            $condition = array(
                'school_id' => $school_id,
                'exam_id' => $exam_id,
                'class_id' => $class_id,
                'section_id' => $section_id,
                'academic_year_id' => $school->academic_year_id,
                'subject_id' => $subject_id
            );
            
            $condition2 = array(
                'school_id' => $school_id,
                'exam_id' => $exam_id,
                'class_id' => $class_id,
                'academic_year_id' => $school->academic_year_id,
                'subject_id' => $subject_id
            );

            $data = $condition;
            if (!empty($this->data['students'])) {

                foreach ($this->data['students'] as $obj) {

                    $condition['student_id'] = $obj->student_id;
                    $condition2['student_id'] = $obj->student_id;
                    $mark = $this->mark->get_single('marks', $condition2);
                 // var_dump($mark); die();
                    if(!empty($mark)){
                        if($mark->section_id != $condition['section_id'] && !is_null($mark->section_id)){
                            //var_dump($mark->section_id); die();
                          //  $this->mark->update('marks', array('section_id'=>$condition['section_id'], $condition2));
                            $this->mark->update_change_insection($school_id,$exam_id,$class_id,$school->academic_year_id,$subject_id,$condition['section_id']);
                         $this->mark->update_change_insection_attendance($school_id,$exam_id,$class_id,$school->academic_year_id,$subject_id,$condition['section_id']);
                            
                        }
                        
                    }
                    
                    $mark2 = $this->mark->get_single('marks', $condition);

                    if (empty($mark2)) {
                        $data['student_id'] = $obj->student_id;
                        $data['status'] = 1;
                        $data['created_at'] = date('Y-m-d H:i:s');
                        $data['created_by'] = logged_in_user_id();
                        $this->mark->insert('marks', $data);
                    }
                }
            }
$this->data['grades'] = $this->mark->get_list('grades', array('status' => 1, 'school_id'=>$school_id), '', '', '', 'id', 'ASC');
            
            $this->data['school_id'] = $school_id;
            $this->data['exam_id'] = $exam_id;
            $this->data['class_id'] = $class_id;
            $this->data['section_id'] = $section_id;
            $this->data['subject_id'] = $subject_id;
            $this->data['academic_year_id'] = $school->academic_year_id;
            
            
            $class = $this->mark->get_single('classes', array('id'=>$class_id));
            create_log('Has been process exam mark for class: '. $class->name);
            
        }
        
        
        $condition = array();
        $condition['status'] = 1;  
        
        if($this->session->userdata('role_id') != SUPER_ADMIN){
            $school = $this->mark->get_school_by_id($this->session->userdata('school_id'));
            $condition['school_id'] = $this->session->userdata('school_id');
            $this->data['classes'] = $this->mark->get_list('classes', $condition, '','', '', 'id', 'ASC');
            $condition['academic_year_id'] = $school->academic_year_id;
            $this->data['exams'] = $this->mark->get_list('exams', $condition, '', '', '', 'id', 'ASC');
        }  
         
		 
		 $this->data['list'] = TRUE; 
		 $this->data['subject_code'] = TRUE;
		  //$this->data['upload'] = TRUE;
        $this->layout->title($this->lang->line('manage_mark') . ' | ' . SMS);
        $this->layout->view('mark/index', $this->data);
		
    }





					function generate_mark__csv($school_id, $exam_id, $class_id, $section_id, $subject_id, $academic_year_id)
					{
	$filename = 'Mark_Result_Sheet_'.$school_id.'_'.$exam_id.'_'.$class_id.'_'.$section_id.''.$subject_id.'_'.$academic_year_id.'.csv';
					
					$file   = fopen("uploads/".$filename, "w");
					
					$class_ass = $this->mark->get_class_list($school_id,$class_id);
					
					$subject = $this->mark->get_subject($school_id,$class_id,$subject_id);
					$academic = $this->mark->get_academic($school_id,$academic_year_id);
					
					//var_dump($subject);die();
					
					if (isset($class_ass) && !empty($class_ass)) {
					
					$ccl= explode(":",$class_ass->abbreviation);
					$cont_mark = explode(":",$class_ass->cont_mark);
					$ccl2 = array_filter($ccl);
					$lenth = count($ccl2);
					//var_dump($ccl2);
					$array_variable = array();
					for($xx= 0; $xx < $lenth;$xx++){
					$array_variable[] = $ccl[$xx].' ('.$cont_mark[$xx].')';
					
					}
					} 
					
					$eexam = 'Exam('.$class_ass->exam_mark.')';
					
					$line1   = array('Admission Num','Fullname','Session Year');
					$line0   = array('Subject Name','Subject Code');
					$line2 = array($eexam,'Comment');
					$line =  array_merge($line1,$line0,$array_variable,$line2);
					
					//var_dump($line );die();
					fputcsv($file, $line, ',');
					
	$data_array =  $this->mark->get_student_list($school_id, $exam_id, $class_id, $section_id, $subject_id, $academic_year_id);
					// var_dump($data_array);die();
					
					$csv = "";
					foreach ($data_array as $record){
					$csv.= $record->admission_no.','.ucfirst($record->student_name).','.$academic->session_year.','.$subject->name.','.$subject->code."\n"; //Append data to csv
					//$csv = $record[0].','.$record[1]."\n";
					}
					
					$csv_handler =  $file;
					fwrite ($csv_handler,$csv);
					fclose ($csv_handler);
					
					$file_path = base_url() . 'uploads/'.$filename;
					
					
					echo '<script type="text/javascript"> alert("download");window.open("'.$file_path.'", "_blank");</script>';
					
					//echo '<script type="text/javascript">alert(location.href=("'.$file_path.'"));</scr';
					
					
					success($this->lang->line('generate'));
					
					}
					






    
    /*****************Function add**********************************
    * @type            : Function
    * @function name   : add
    * @description     : Process to store "Exam Mark" into database                
    *                     
    * @param           : null
    * @return          : null 
     * ********************************************************** */
    public function add() {

        check_permission(ADD);

        if ($_POST) {
			
			

            $school_id = $this->input->post('school_id');
            $exam_id = $this->input->post('exam_id');
            $class_id = $this->input->post('class_id');
            $section_id = $this->input->post('section_id');
            $subject_id = $this->input->post('subject_id');
			

            $school = $this->mark->get_school_by_id($school_id);
            if(!$school->academic_year_id){
                error($this->lang->line('set_academic_year_for_school'));
                redirect('exam/mark');
            }
            
            $condition = array(
                'school_id' => $school_id,
                'exam_id' => $exam_id,
                'class_id' => $class_id,
                'section_id' => $section_id,
                'academic_year_id' => $school->academic_year_id,
                'subject_id' => $subject_id
            );

            $data = $condition;
			

            if (!empty($_POST['students'])) {

                foreach ($_POST['students'] as $key => $value) {

                    $condition['student_id'] = $value;
					
					
					
					if (isset($_POST['cat_1']) && !empty($_POST['cat_1'])) {
					// ################--First Continuous Assessment Test--#######
                    $data['written_mark'] = $_POST['written_mark'];
                    $data['written_obtain'] = $_POST['written_obtain'][$value];
					}
				
					if(isset($_POST['cat_2']) && !empty($_POST['cat_2'])) {
                    // ################--Second Continuous Assessment Test--#######
                    $data['tutorial_mark'] = $_POST['tutorial_mark'];
                    $data['tutorial_obtain'] = $_POST['tutorial_obtain'][$value];
					}
					
					if(isset($_POST['cat_3']) && !empty($_POST['cat_3'])) {
					// ################--Third Continuous Assessment Test--#######
                    $data['practical_mark'] = $_POST['practical_mark'];
                    $data['practical_obtain'] = $_POST['practical_obtain'][$value];
					}
					
					
					if(isset($_POST['cat_4']) && !empty($_POST['cat_4'])) {
					// ################--Fourth Continuous Assessment Test--#######
                    $data['viva_mark'] = $_POST['viva_mark'];
                    $data['viva_obtain'] = $_POST['viva_obtain'][$value];
					
					}
					
					// ################--EXAMINATION--#######
                    $data['exam_mark'] = $_POST['exam_mark'];
                    $data['exam_obtain'] = $_POST['exam_obtain'][$value];
					
                    
					// ################--ALL TOTAL MARK--#######
                   $data['exam_total_mark'] = $_POST['exam_total_mark'];
                    //$data['obtain_total_mark'] = $_POST['obtain_total_mark'][$value];
				$data['obtain_total_mark'] = @$data['written_obtain'] + @$data['tutorial_obtain'] + @$data['practical_obtain']+ @$data['viva_obtain']+ @$data['exam_obtain'] ;
                    
                    //$data['grade_id'] = $_POST['grade_id'][$value];
					
					// ################--exam comment--#######                    
                    $data['remark'] = $_POST['remark'][$value];
                    
                    $data['status'] = 1;
                    $data['created_at'] = date('Y-m-d H:i:s');
                    $data['created_by'] = logged_in_user_id();
                    $this->mark->update('marks', $data, $condition);
                }
            }
            
            $class = $this->mark->get_single('classes', array('id'=>$class_id));
            create_log('Has been process exam mark and save for class: '. $class->name);
            
            success($this->lang->line('insert_success'));
            redirect('exam/mark');
        }

        $this->layout->title($this->lang->line('add') . ' ' . $this->lang->line('mark') . ' | ' . SMS);
        $this->layout->view('mark/index', $this->data);
    }

	
	    /*****************Function add**********************************
    * @type            : Function
    * @function name   : add
    * @description     : Load "Add Bulk Student" user interface                 
    *                    and process to store "Bulk Student" into database 
    * @param           : null
    * @return          : null 
    * ********************************************************** */
    public function upload() {

     //   check_permission(upload);

        if ($_POST) {   
		    $school_id = $this->input->post('school_id');
            $exam_id = $this->input->post('exam_id');
            $class_id = $this->input->post('class_id');
            $section_id = $this->input->post('section_id');
            $subject_id = $this->input->post('subject_id');
			$academic_year_id = $this->input->post('academic_year_id');
		//check academic year is set
		   $data = array(
                'school_id' => $school_id,
                'exam_id' => $exam_id,
                'class_id' => $class_id,
                'section_id' => $section_id,
                'academic_year_id' => $academic_year_id,
                'subject_id' => $subject_id
            );
			  
            $status = $this->_uploadmark($school_id,$exam_id, $class_id,$section_id,$subject_id,$academic_year_id);
            if ($status) {                   

                create_log('Has uploaded Student bulk mark ');
                success($this->lang->line('insert_success'));
		//$this->layout->title($this->lang->line('add') . ' ' . $this->lang->line('mark') . ' | ' . SMS);
       // $this->layout->view('mark/index', $this->data);
			
				// i store data to flashdata
				$this->session->set_flashdata('uploadsuccess',$data);
				// after storing i redirect it to the controller
				redirect('exam/mark/index');
			
		
		   //var_dump($response); die();
            			} else {
                error($this->lang->line('insert_failed'));
                redirect('exam/mark/index/');
            			}            
        		} 
        
                   
        
    }
	
	/*****************Function uploadmark**********************************
    * @type            : Function
    * @function name   : upload
    * @description     : Process to store "Exam Mark" into database                
    *                     
    * @param           : null
    * @return          : null 
     * ********************************************************** */
	 public function _uploadmark($school_id,$exam_id, $class_id,$section_id,$subject_id,$academic_year_id) {
			

			//var_dump($get_mark_id); die();
			
			$class_ass = $this->mark->get_class_list($school_id,$class_id);
            $this->_upload_file($class_id,$school_id);
			
			 if (isset($class_ass) && !empty($class_ass)) {
                 $obb= explode(":",$class_ass->cont_mark);
				 $total_cas = array_sum ($obb);          	
                 $ccl44= explode(":",$class_ass->cat_ass_test);
                 $ccl244 = array_filter($ccl44);
                 $lenth44 = count($ccl244);
                                
			    }else{
				echo ("<script LANGUAGE='JavaScript'>
    window.alert('ERROR : check class and Create Class properly ');
    window.location.href='".base_url()."exam/mark/index/';
    </script>");
            //redirect('student/bulk/add/');
			die();
				}//end count of cat
			///////////////////////////////////////////////////////
			$school = $this->mark->get_school_by_id($school_id);
            if(!$school->academic_year_id){
                error($this->lang->line('set_academic_year_for_school'));
                redirect('exam/mark/index/');
            }
            
            $condition = array(
                //'school_id' => $school_id,
                'exam_id' => $exam_id,
                'class_id' => $class_id,
                'section_id' => $section_id,
                'academic_year_id' => $academic_year_id,
                'subject_id' => $subject_id
            );

            $data = $condition;
			
			////////////////////////////////////////
			
			$destination ='assets/csv/bulkmark_'.$class_id.'_'.$school_id.'_students_mark.csv';
		   //check number of continous assessment	if it match that of csv file
			$handle = fopen($destination, "r");
		 
        if (($handle = fopen($destination, "r")) !== FALSE) {

            $count = 1;
           
            //$school_id  = $this->input->post('school_id');           
            //$school = $this->student->get_school_by_id($school_id); 

            while (($arr = fgetcsv($handle)) !== false) {

                if ($count == 1) {
                    $count++;
                    continue;
                }
                
				// need atleast some mandatory data
                // name, admission_no, roll_no, username, password
                	
				if ($arr[0] != '' && $arr[1] != '' && $arr[2 ] != '' ) {
					
					$data = array();
					$condition['school_id'] = $school_id;
					$admission_no = isset($arr[0]) ? $arr[0] : ''; //0.	Admission No:*
					$student_id = $this->mark->student_id($admission_no);
					$condition['student_id'] = $student_id;
					$subjectcode = isset($arr[4]) ? $arr[4] : ''; //1.	Subject Code:*
					$subjectcode_id = $this->mark->subjectcode_id($subjectcode,$class_id,$school_id);
					if($subjectcode_id != $subject_id){
						echo ("<script LANGUAGE='JavaScript'>
    window.alert('ERROR :Check Subject Code does not March the Selected Subject');
    window.location.href='".base_url()."exam/mark/index/';
    </script>");
            //redirect('student/bulk/add/');
			die();
						
						}
					
                    // CHECK IF STUDENTS EXIST FOR THE MARK
					
$student_exists_mark = $this->mark->student_exists_mark($school_id,$exam_id,$class_id,$section_id,$subject_id,$academic_year_id,$student_id);
					//var_dump($student_exists_mark); die();
                    if ($student_exists_mark == false) {
                        continue;
                    }  
 					
                    
					
					if ($lenth44 == 4){	
					$data['written_obtain'] = isset($arr[5]) ? $arr[5] : ''; //0. First Continuous Ass't Test
					$data['tutorial_obtain']= isset($arr[6]) ? $arr[6] : ''; //1. Second Continuous Ass't Test
					$data['practical_obtain'] = isset($arr[7]) ? $arr[7] : '';//0.Third Continuous Ass't Test
					$data['viva_obtain']= isset($arr[8]) ? $arr[8] : ''; //1. Fourth Continuous Ass't Test
					$data['exam_obtain']= isset($arr[9]) ? $arr[9] : ''; //1. Examination
					$data['obtain_total_mark'] = @$data['written_obtain'] + @$data['tutorial_obtain'] + @$data['practical_obtain']+ @$data['viva_obtain']+ @$data['exam_obtain'] ;	//Total mark obtained
						
							$data['written_mark'] = $obb[0];
							$data['tutorial_mark'] = $obb[1];
							$data['practical_mark'] = $obb[2];
							$data['viva_mark'] = $obb[3];
							$data['exam_mark']= $class_ass->exam_mark;
							$data['exam_total_mark']= $total_cas + $class_ass->exam_mark;
					}
					
					if ($lenth44 == 3){
					$data['written_obtain'] = isset($arr[5]) ? $arr[5] : ''; //0. First Continuous Assessment Test
					$data['tutorial_obtain']= isset($arr[4]) ? $arr[6] : ''; //1. Second Continuous Assessment Test
					$data['practical_obtain'] = isset($arr[7]) ? $arr[7] : '';//0.Third Continuous Assessment Test
					$data['exam_obtain']= isset($arr[8]) ? $arr[8] : ''; //1. Examination
					$data['obtain_total_mark'] = @$data['written_obtain'] + @$data['tutorial_obtain'] + @$data['practical_obtain']+ @$data['exam_obtain'] ;	//Total mark obtained
					
							$data['written_mark'] = $obb[0];
							$data['tutorial_mark'] = $obb[1];
							$data['practical_mark'] = $obb[2];
							$data['exam_mark']= $class_ass->exam_mark;
							$data['exam_total_mark']= $total_cas + $class_ass->exam_mark;
						
					}
					if ($lenth44 == 2){
					$data['written_obtain'] = isset($arr[5]) ? $arr[5] : ''; //0. First Continuous Assessment Test
					$data['tutorial_obtain']= isset($arr[6]) ? $arr[6] : ''; //1. Second Continuous Assessment Test
					$data['exam_obtain']= isset($arr[7]) ? $arr[7] : ''; //1. Examination
					$data['obtain_total_mark'] = @$data['written_obtain'] + @$data['tutorial_obtain'] + @$data['exam_obtain'] ;	//Total mark obtained
							$data['written_mark'] = $obb[0];
							$data['tutorial_mark'] = $obb[1];
							$data['exam_mark']= $class_ass->exam_mark;
							$data['exam_total_mark']= $total_cas + $class_ass->exam_mark;	
					}
					if ($lenth44 == 1){
					$data['written_obtain'] = isset($arr[5]) ? $arr[5] : ''; //0. First Continuous Assessment Test
					$data['exam_obtain']= isset($arr[6]) ? $arr[6] : ''; //1. Examination
					$data['obtain_total_mark'] = @$data['written_obtain'] + @$data['exam_obtain'] ;	//Total mark obtained	
							$data['written_mark'] = $obb[0];
							$data['exam_mark']= $class_ass->exam_mark;
							$data['exam_total_mark']= $total_cas + $class_ass->exam_mark;
					}
					
					
					 
					$data['modified_at'] = date('Y-m-d H:i:s');
                    $data['modified_by'] = logged_in_user_id(); 
                    //var_dump($condition); die();
			        $this->mark->update('marks', $data, $condition);         
							  
				 } 
						      
					
            //$this->mark->update('marks', $data);
			//success($this->lang->line('insert_success'));
            //redirect('exam/mark');
			    }
            
        }

        return TRUE;
					
			
	}
	  /*****************Function _upload_file**********************************
    * @type            : Function
    * @function name   : _upload_file
    * @description     : upload bulk studebt csv file                  
    * @param           : null
    * @return          : null 
    * ********************************************************** */
    private function _upload_file($class_id,$school_id) {

        $file = $_FILES['student_bulkmark']['name'];
		//check number of continous assessment	if it match that of csv file
 		
        if ($file != "") {

            $destination ='assets/csv/bulkmark_'.$class_id.'_'.$school_id.'_students_mark.csv';
			        
            //$ext = strtolower(end(explode('.', $file)));
			$ext1 = explode('.', $file);
			$ext2 = end($ext1);
			$ext = strtolower($ext2);
			
			
            if ($ext == 'csv') {                 
                move_uploaded_file($_FILES['student_bulkmark']['tmp_name'], $destination);  
            }
        				} else {
            error($this->lang->line('insert_failed'));
            redirect('exam/mark/index/');
        						}       
    	}
		
		

	
	
	
	

}
