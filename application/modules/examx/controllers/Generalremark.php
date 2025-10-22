<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/* * *****************Generalremark.php**********************************
 * @product name    : Global Multi School Management System Express
 * @type            : Class
 * @class name      : Generalremark
 * @description     : Manage exam term result and prepare promotion to next class.  
 * @author          : Codetroopers Team 	
 * @url             : https://themeforest.net/user/codetroopers      
 * @support         : yousuf361@gmail.com	
 * @copyright       : Codetroopers Team	 	
 * ********************************************************** */

class Generalremark extends MY_Controller {

    public $data = array();

    function __construct() {
        parent::__construct();
        $this->load->model('Generalremark_Model', 'generalremark', true); 
		$this->load->helper('url');   
    }

    
        
    /*****************Function index**********************************
    * @type            : Function
    * @function name   : index
    * @description     : Load "Exam result sheet" user interface                 
    *                    with class/section wise filtering option    
    * @param           : null
    * @return          : null 
    * ********************************************************** */
    public function index() {

        check_permission(VIEW);


        if ($_POST) {
            $school_id = $this->input->post('school_id');
            $exam_id = $this->input->post('exam_id');
            $class_id = $this->input->post('class_id');
            $section_id = $this->input->post('section_id');

            $school = $this->generalremark->get_school_by_id($school_id);
            
            if(!$school->academic_year_id){
                error($this->lang->line('set_academic_year_for_school'));
                redirect('exam/generalremark');
            }
            
			
  $this->data['students'] = $this->generalremark->get_student_list($school_id, $class_id, $section_id, $school->academic_year_id);
			
			if ( $_POST['generate'] == 'generate') {
			$this->generate_generalremark__csv($school_id,$exam_id, $class_id, $section_id,$school->academic_year_id);
			}
			
            $condition = array(   
                'school_id' => $school_id,
                'exam_id' => $exam_id,
                'class_id' => $class_id,
                'academic_year_id' => $school->academic_year_id
            );
            
            if($section_id){
                $condition['section_id'] = $section_id;
            }

            $data = $condition;
            if (!empty($this->data['students'])) {

                foreach ($this->data['students'] as $obj) {

                    $condition['student_id'] = $obj->id;
                    $result = $this->generalremark->get_single('exam_results', $condition);

                    if (empty($result)) {
                        $data['school_id'] = $school_id;
                        $data['student_id'] = $obj->id;
                        $data['exam_id'] = $exam_id;
                        $data['class_id'] = $class_id;
                        $data['section_id'] = $section_id;
                        $data['academic_year_id'] = $school->academic_year_id;
                        $data['status'] = 1;
                        $data['created_at'] = date('Y-m-d H:i:s');
                        $data['created_by'] = logged_in_user_id();
                        $this->generalremark->insert('exam_results', $data);
                    }
                }
            }

            $this->data['grades'] = $this->generalremark->get_list('grades', array('status' => 1, 'school_id'=>$school_id), '', '', '', 'id', 'ASC');
            $this->data['exam'] =  $this->generalremark->get_single('exams', array('id'=>$exam_id, 'school_id'=>$school_id));
            
            $this->data['school_id'] = $school_id;
            $this->data['exam_id'] = $exam_id;
            $this->data['class_id'] = $class_id;
            $this->data['section_id'] = $section_id;
            $this->data['academic_year_id'] = $school->academic_year_id;
            
            $class = $this->generalremark->get_single('classes', array('id'=>$class_id, 'school_id'=>$school_id));
            create_log('Has been process exam result for class: '. $class->name);
        }
        
        
        $condition = array();
        $condition['status'] = 1;  
        
        if($this->session->userdata('role_id') != SUPER_ADMIN){
            $school = $this->generalremark->get_school_by_id($this->session->userdata('school_id'));
            $condition['school_id'] = $this->session->userdata('school_id');
            
            $this->data['classes'] = $this->generalremark->get_list('classes', $condition, '','', '', 'id', 'ASC');
            $condition['academic_year_id'] = $school->academic_year_id;
            $this->data['exams'] = $this->generalremark->get_list('exams', $condition, '', '', '', 'id', 'ASC');
        }
		
		

		
		
		$this->data['list']= TRUE;  
        $this->layout->title($this->lang->line('exam') . ' ' . $this->lang->line('result') . ' | ' . SMS);
        $this->layout->view('general_remark/index', $this->data);
    }

    
      // bulk student_general_remark using CSV
    function generate_generalremark__csv($school_id,$xam_id,$class_id, $section_id,$academic_year_id)
    {
		$filename = 'General_Remark_Result_'.$school_id.'_'.$xam_id.'_'.$class_id.'_'.$section_id.'.csv';
     
 $file   = fopen("uploads/".$filename, "w");
 $line   = array('Student ID','Fullname','Speak/Fluency','Punctual/neatness','Attentiveness','Games','Handwritting','Music/fineart','Teachers Comment','General Comment','Conduct','Attendance','Position');
        fputcsv($file, $line, ',');
		
		 $data_array = $this->generalremark->get_student_list($school_id, $class_id, $section_id, $academic_year_id);
		// var_dump($data_array);die();
		
		/*	$data_array = array (
            array ('1','2'),
            array ('2','2'),
            array ('3','6'),
            array ('4','2'),
            array ('6','5')
        ); */
				
			//$csv = "col1,col2 \n";//Column headers
			$csv = "";
			foreach ($data_array as $record){
				$csv.= $record->admission_no.','.$record->name."\n"; //Append data to csv
				//$csv = $record[0].','.$record[1]."\n";
			}
			
			$csv_handler =  $file;
			fwrite ($csv_handler,$csv);
			fclose ($csv_handler);
			
            $file_path = base_url() . 'uploads/'.$filename;
		   //echo anchor($file_path , 'Show in New Window', array('target' = > '_blank'));
		
             //echo '<a href="'.$file_path.'" target="_blank">';

		echo '<script type="text/javascript"> alert("download");window.open("'.$file_path.'", "_blank");</script>';
        
        //echo '<script type="text/javascript">alert(location.href=("'.$file_path.'"));</scr';
			
			
			success($this->lang->line('generate'));

    }
	
	

			
    /*****************Function add**********************************
    * @type            : Function
    * @function name   : add
    * @description     : Process exam result and save into database                  
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

            $school = $this->generalremark->get_school_by_id($school_id);
            if(!$school->academic_year_id){
                error($this->lang->line('set_academic_year_for_school'));
                redirect('exam/generalremark');
            }
			
            
            $condition = array(
                'school_id' => $school_id,
                'exam_id' => $exam_id,
                'class_id' => $class_id,
                'academic_year_id' => $school->academic_year_id,
            );
            
            if($section_id){
                $condition['section_id'] = $section_id;
            }

            $data = $condition;

            if (!empty($_POST['students'])) {

                foreach ($_POST['students'] as $key => $value) {

                    $condition['student_id'] = $value;
                
                   
				   
					$data['speak_fluency'] = $_POST['speak_fluency'][$value];
					$data['punctua_neat']=  $_POST['punctua_neat'][$value];
					$data['attentiveness']= $_POST['attentiveness'][$value];
					$data['games']= $_POST['games'][$value];
					$data['handwritting']= $_POST['handwritting'][$value];
					$data['music_fineart']= $_POST['music_fineart'][$value]; 
				
				
					$data['teacher_comment']= $_POST['teacher_comment'][$value]; 
					$data['general_comment']= $_POST['general_comment'][$value];
		
				   
					$data['conduct'] = $_POST['conduct'][$value];
             		$data['attendance'] = $_POST['attendance'][$value];
                    $data['class_position'] = $_POST['class_position'][$value];
                    $data['status'] = 1;
                    $data['created_at'] = date('Y-m-d H:i:s');
                    $data['created_by'] = logged_in_user_id();
                    
                    // process result status
                   
                    
                    $this->generalremark->update('exam_results', $data, $condition);
                }
            }
            
            $class = $this->generalremark->get_single('classes', array('id'=>$class_id));
            create_log('Has been process and save exam result for class: '. $class->name);
            
            success($this->lang->line('insert_success'));
            redirect('exam/generalremark/');
        }

        $this->layout->title($this->lang->line('exam') . ' ' . $this->lang->line('result') . ' | ' . SMS);
        $this->layout->view('general_remark/index', $this->data);
    }


//////////////////////////////////////////////////////////
 public function upload() {

     //   check_permission(upload);

        if ($_POST) {   
		    $school_id = $this->input->post('school_id');
            $exam_id = $this->input->post('exam_id');
            $class_id = $this->input->post('class_id');
            $section_id = $this->input->post('section_id');
			$academic_year_id = $this->input->post('academic_year_id');
		//check academic year is set
		   $data = array(
                'school_id' => $school_id,
                'exam_id' => $exam_id,
                'class_id' => $class_id,
                'section_id' => $section_id,
                'academic_year_id' => $academic_year_id,
            );
			  
            $status = $this->_uploadmark($school_id,$exam_id, $class_id,$section_id,$academic_year_id);
			//var_dump($status); die();
            if ($status) {                   

                create_log('Has uploaded Student bulk mark ');
                success($this->lang->line('insert_success'));
		//$this->layout->title($this->lang->line('add') . ' ' . $this->lang->line('mark') . ' | ' . SMS);
       // $this->layout->view('mark/index', $this->data);
			
				// i store data to flashdata
				$this->session->set_flashdata('uploadsuccess',$data);
				// after storing i redirect it to the controller
				redirect('exam/generalremark/index');
			
		
		   //var_dump($response); die();
            			} else {
                error($this->lang->line('insert_failed'));
                redirect('exam/generalremark/index/');
            			}            
        		} 
        
                   
        
    }
	

	 public function _uploadmark($school_id,$exam_id, $class_id,$section_id,$academic_year_id) {
					
            $this->_upload_file($class_id,$school_id);
			
			 
			///////////////////////////////////////////////////////
			$school = $this->generalremark->get_school_by_id($school_id);
            if(!$school->academic_year_id){
                error($this->lang->line('set_academic_year_for_school'));
                redirect('exam/generalremark/index/');
            }
            
            $condition = array(
                'school_id' => $school_id,
                'exam_id' => $exam_id,
                'class_id' => $class_id,
                'section_id' => $section_id,
                'academic_year_id' => $academic_year_id,
               
            );

            $data = $condition;
			
			////////////////////////////////////////
			
			$destination ='assets/csv/bulkmark_'.$class_id.'_'.$school_id.'_students_remark.csv';
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
                		
					 
				if ($arr[0] != '' && $arr[1] != '') {
				
					$data = array();
					$condition['school_id'] = $school_id;
					
					$admission_no = isset($arr[0]) ? $arr[0] : ''; //0.	Admission No:*
					$student_id = $this->generalremark->student_id($admission_no);
					$condition['student_id'] = $student_id;
					//var_dump($admission_no); die();
					$data['speak_fluency'] = isset($arr[2]) ? $arr[2] : '';
					$data['punctua_neat'] = isset($arr[3]) ? $arr[3] : '';
					$data['attentiveness'] = isset($arr[4]) ? $arr[4] : '';	
					$data['games'] = isset($arr[5]) ? $arr[5] : '';	
					$data['handwritting'] = isset($arr[6]) ? $arr[6] : '';	
					$data['music_fineart'] = isset($arr[7]) ? $arr[7] : '';
					$data['teacher_comment'] = isset($arr[8]) ? $arr[8] : '';	
					$data['general_comment'] = isset($arr[9]) ? $arr[9] : '';
					$data['conduct'] = isset($arr[10]) ? $arr[10] : '';
					$data['attendance'] = isset($arr[11]) ? $arr[11] : '';		
					$data['class_position'] = isset($arr[12]) ? $arr[12] : '';
					 
					$data['modified_at'] = date('Y-m-d H:i:s');
                    $data['modified_by'] = logged_in_user_id(); 
                    //var_dump($condition); die();
			        $this->generalremark->update('exam_results', $data, $condition);         
							  
				 } 
						      
					
            //$this->mark->update('marks', $data);
			//success($this->lang->line('insert_success'));
            //redirect('exam/general_remark');
			    }
            
        }

        return TRUE;
					
			
	}

///////////////////////////////////////////////////////////////////////

private function _upload_file($class_id,$school_id) {

        $file = $_FILES['bulk_remark']['name'];
		//check number of continous assessment	if it match that of csv file
 		
        if ($file != "") {

            $destination ='assets/csv/bulkmark_'.$class_id.'_'.$school_id.'_students_remark.csv';
			        
            //$ext = strtolower(end(explode('.', $file)));
			$ext1 = explode('.', $file);
			$ext2 = end($ext1);
			$ext = strtolower($ext2);
			
			
            if ($ext == 'csv') {                 
                move_uploaded_file($_FILES['bulk_remark']['tmp_name'], $destination);  
            }
        				} else {
            error($this->lang->line('insert_failed'));
            redirect('exam/generalremark/index/');
        						}       
    	}
		
		

   
   




	
}
