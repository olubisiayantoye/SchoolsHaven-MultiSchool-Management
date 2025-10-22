<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/* * *****************Bulk.php**********************************
 * @type            : Class
 * @class name      : Bulk
 * @description     : Manage bulk students imformation of the school.  
 * @author          : Codetroopers Team 	
 * @url             : https://themeforest.net/user/codetroopers      
 * @support         : yousuf361@gmail.com	
 * @copyright       : Codetroopers Team	 	
 * ********************************************************** */

class Bulk extends MY_Controller {

    public $data = array();

    function __construct() {
        parent::__construct();      
        
        $this->load->model('Student_Model', 'student', true);          
    }

    
    /*****************Function add**********************************
    * @type            : Function
    * @function name   : add
    * @description     : Load "Add Bulk Student" user interface                 
    *                    and process to store "Bulk Student" into database 
    * @param           : null
    * @return          : null 
    * ********************************************************** */
    public function add() {

        check_permission(ADD);

        if ($_POST) {   
		
		//check academic year is set
		  
			  
            $status = $this->_get_posted_student_data();
            if ($status) {                   

                create_log('Has been added Bulk Student');
                success($this->lang->line('insert_success'));
                redirect('student/index/'.$this->input->post('class_id'));
            			} else {
                error($this->lang->line('insert_failed'));
                redirect('student/bulk/add/');
            			}            
        		} 
        
                    
        if($this->session->userdata('role_id') != SUPER_ADMIN){   
  $school_id = $this->session->userdata('school_id');
 $this->data['classes'] = $this->student->get_list('classes', array('status' => 1, 'school_id'=>$school_id), '', '', '', 'id', 'ASC');
  $this->data['school_id'] = $this->session->userdata('school_id');
        }else{ 
            $this->data['classes'] = array();   
        }
		
        
	    
		
        $this->layout->title($this->lang->line('add') . ' ' . $this->lang->line('student') . ' | ' . SMS);
        $this->layout->view('bulk', $this->data);
    }

     

    /*****************Function _get_posted_student_data**********************************
    * @type            : Function
    * @function name   : _get_posted_student_data
    * @description     : Prepare "Student" user input data to save into database                  
    *                       
    * @param           : null
    * @return          : $data array(); value 
    * ********************************************************** */
    private function _get_posted_student_data() {
		
		$sch_id = $this->input->post('school_id');
		
		$check_year_set = $this->student->get_academic_year($sch_id);
			
		if(is_null($check_year_set->academic_year_id) || $check_year_set->academic_year_id ==0){
			
			//error($this->lang->line('Academic Year not ACTIVATED'));
			echo ("<script LANGUAGE='JavaScript'>
    window.alert('Academic Year not ACTIVATED');
    window.location.href='".base_url()."student/bulk/add/';
    </script>");
			
			
		
            //redirect('student/bulk/add/');
			die();
			}
		  
		  
        $this->_upload_file($sch_id);

        $destination = 'assets/csv/bulk_'.$sch_id.'_uploaded_student.csv';
        if (($handle = fopen($destination, "r")) !== FALSE) {

            $count = 1;
            
            $school_id  = $this->input->post('school_id'); 
			
			
			          
            $school = $this->student->get_school_by_id($school_id); 
			
			

            while (($arr = fgetcsv($handle)) !== false) {

                if ($count == 1) {
                    $count++;
                    continue;
                }

                // need atleast some mandatory data
                // name, admission_no, roll_no, username, password
                //if ($arr[0] != '' && $arr[1] != '' && $arr[6] != '' && $arr[11] != '' && $arr[12] != '') {
					
					if ($arr[0] != '' && $arr[1] != '' && $arr[2 ] != '' ) {

                    // need to check email unique
                    if ($this->student->student_duplicate_check($arr[0])) {
                        continue;
                    }

                    $data = array();
                    $enroll = array();
                    $user = array();
					
					$data['school_id'] = $school_id;
					$data['admission_date'] = date('Y-m-d');
					
                    $addmm = $this->genetrate_student_admin($school_id);
        
					
					$data['admission_no'] = isset($arr[0]) ? $arr[0] : $addmm; //3.	Admission No:*


					$data['surname']= isset($arr[1]) ? $arr[1] : ''; //1.	Surname:*
					$data['name'] = isset($arr[2]) ? $arr[2] : '';//2.	Other Names:*
					$data['guardian_id'] = isset($arr[3]) ? $arr[3] : ''; //4.	Guardian Id
					$data['dob'] = isset($arr[4]) ? date('Y-m-d', strtotime($arr[4])) : '';//5.	Birth Date: 11-01-2011
					$data['gender'] = isset($arr[5]) ? $arr[5] : '';//6.	Gender:
					$data['place_of_birth'] = isset($arr[6]) ? $arr[6] : '';//7.	Place Of Birth:
					$data['nationality'] = isset($arr[7]) ? $arr[7] : '';//8.	Nationality:
					$data['religion'] = isset($arr[8]) ? $arr[8] : '';//9.	Religion:
					$data['present_address'] = isset($arr[9]) ? $arr[9] : ''; //10.	Home Address:
					$data['phone'] = isset($arr[10]) ? $arr[10] : '';//11.	Home Phone
					$data['permanent_address'] = isset($arr[11]) ? $arr[11] : ''; //12.	Permanent Address:
					$data['email'] = isset($arr[12]) ? $arr[12] : '';//13.	Email:
					$data['second_language'] = isset($arr[13]) ? $arr[13] : ''; //13.	Native Language:
					$data['previous_school'] = isset($arr[14]) ? $arr[14] : ''; //14.	Previous School:
					$data['previous_class'] = isset($arr[15]) ? $arr[15] : '';//15.	Previous Class
					$data['father_name'] = isset($arr[16]) ? $arr[16] : ''; //16.	Father Name:
					$data['father_phone'] = isset($arr[17]) ? $arr[17] : ''; //17.	Father Phone:
					$data['father_profession'] = isset($arr[18]) ? $arr[18] : '';//19.	Father Profession:
					$data['mother_name'] = isset($arr[19]) ? $arr[19] : ''; //20.	Mother Name:
					$data['mother_phone'] = isset($arr[20]) ? $arr[20] : ''; //21.	Mother Phone:
					$data['mother_profession'] = isset($arr[21]) ? $arr[21] : ''; //22.	Mother Profession:
				    $roll_no = $this->genetrate_student_id($school_id);
					$enroll['roll_no'] = $roll_no;
					
                    $user['username'] = $roll_no;
                    $user['password'] = isset($arr[1]) ? $arr[1] : '';

                    /*
                    $data['relation_with'] = isset($arr[3]) ? $arr[3] : '';
                    $data['national_id'] = isset($arr[4]) ? $arr[4] : '';
                    $data['registration_no'] = isset($arr[5]) ? $arr[5] : '';
                    
                    
                    $data['group'] = isset($arr[13]) ? $arr[13] : '';
                    $data['blood_group'] = isset($arr[14]) ? $arr[14] : '';
                    $data['discount_id'] = isset($arr[16]) ? $arr[16] : '';
                    $data['health_condition'] = isset($arr[20]) ? $arr[20] : '';
                    $data['father_education'] = isset($arr[24]) ? $arr[24] : '';
                    $data['father_designation'] = isset($arr[26]) ? $arr[26] : '';
                    $data['mother_education'] = isset($arr[29]) ? $arr[29] : '';
                    $data['mother_designation'] = isset($arr[31]) ? $arr[31] : '';
                    $data['other_info'] = isset($arr[32]) ? $arr[32] : '';  */

                    $data['age'] = $data['dob'] ? floor((time() - strtotime($data['dob'])) / 31556926) : 0;
                    $data['created_at'] = date('Y-m-d H:i:s');
                    $data['created_by'] = logged_in_user_id();
                    $data['status'] = 1;
                    
                    $user['school_id'] = $school_id;


                    // first need to create user
                    $data['user_id'] = $this->_create_user($user);

                    // Second now need to create student
                    $enroll['student_id'] = $this->student->insert('students', $data);

                    // Third now need to create enroll
                    $enroll['academic_year_id'] = $school->academic_year_id;
                    $this->_insert_enrollment($enroll);
					
					
                }
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
    private function _upload_file($sch_id) {

        $file = $_FILES['bulk_student']['name'];

        if ($file != "") {

            $destination ='assets/csv/bulk_'.$sch_id.'_uploaded_student.csv';        
            //$ext = strtolower(end(explode('.', $file)));
			$ext1 = explode('.', $file);
			$ext2 = end($ext1);
			$ext = strtolower($ext2);
			
			
            if ($ext == 'csv') {                 
                move_uploaded_file($_FILES['bulk_student']['tmp_name'], $destination);  
            }
        } else {
            error($this->lang->line('insert_failed'));
            redirect('student/bulk/add/');
        }       
    }
   
    
    /*****************Function _create_user**********************************
    * @type            : Function
    * @function name   : _create_user
    * @description     : save user info to users while create a new student                  
    * @param           : $insert_id integer value
    * @return          : null 
    * ********************************************************** */
    private function _create_user($user){
        
        $data = array();
        $data['role_id']    = STUDENT;
        $data['school_id']    = $user['school_id'];
        $data['password']   = md5($user['password']);
        $data['temp_password'] = base64_encode($user['password']);
        $data['username']      = $user['username'];
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['created_by'] = logged_in_user_id();
        $data['status']     = 1; // by default would not be able to login
        $this->student->insert('users', $data);
        return $this->db->insert_id();
    }
    
    
    /*****************Function _insert_enrollment**********************************
    * @type            : Function
    * @function name   : _insert_enrollment
    * @description     : save student info to enrollment while create a new student                  
    * @param           : $insert_id integer value
    * @return          : null 
    * ********************************************************** */
    private function _insert_enrollment($enroll) {
        
        $data = array();
        $data['student_id'] = $enroll['student_id'];
        $data['school_id']   = $this->input->post('school_id');
        $data['class_id']   = $this->input->post('class_id');
        $data['section_id'] = $this->input->post('section_id');        
        
        $data['academic_year_id'] = $enroll['academic_year_id'];
       
        
        $data['roll_no'] = $enroll['roll_no'];
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['created_by'] = logged_in_user_id();
        $data['status'] = 1;
        $this->student->insert('enrollments', $data);
    }
	////////////////////////////////////////////////////////////

 public function genetrate_student_admin($school_id="") {

    $this->db->select_max('admission_no');
    $this->db->where('school_id', $school_id);
    $result = $this->db->get('students')->row();
    $res = preg_replace('/[^0-9]/', '', $result->admission_no);
    //$whatIWant = substr($result->admission_no, strpos($result->admission_no, "/") + 3);
    $current_year = date("Y");
    if($result->admission_no){
        $arr = explode("/", $result->admission_no, 3);
            if($current_year == $arr){
                $admin_num = $arr + 1;
            }else{
                $admin_num = ($current_year * 1000) + 1;
            }
        }else{

          $admin_num = ($current_year * 1000) + 1;  
        } 

    
    /////////////////////////////////////
    
    if (isset($school_id) && !empty($school_id)){
     $this->db->select('school_name');
     $this->db->from('schools');
     $this->db->where('id', $school_id);
     $temp = $this->db->get()->row();
     $words = explode(" ",  $temp->school_name);
      
        }else{
            
            $words = explode(" ", "Schools Haven");
            
            }
        $acronym = "";

      foreach ($words as $w) {
      $acronym .= $w[0];    
        }
        
    /////////   
    $acronym2 = strtoupper($acronym); 
     return $acronym2.$admin_num;
    }





    /////////////////////////////////////////
	
	
	
	public function genetrate_student_id($school_id="") {
    $chars = "07659242202345640248765924276987346549823433445754767659242599";
    srand ( ( double ) microtime () * 1000000 );
    $i = 0;
    $pass = '';
    while ( $i <= 7 ) {
          $num = rand () % 33;      
          $tmp = substr ( $chars, $num, 1 );
          $pass = $pass . $tmp;
          $i ++;
    }
    if($pass[0] == "0" ){$pass = substr( $pass, 1);}
	
	/////////////////////////////////////
	
	if (isset($school_id) && !empty($school_id)){
	 $this->db->select('school_name');
	 $this->db->from('schools');
	 $this->db->where('id', $school_id);
	 $temp = $this->db->get()->row();
	 $words = explode(" ", 	$temp->school_name);
      
        }else{
			
			$words = explode(" ", "Schools Haven");
			
			}
        $acronym = "";

      foreach ($words as $w) {
      $acronym .= $w[0];	
		}
		
	/////////	
	$acronym2 = strtoupper($acronym); 
	 return $acronym2.$pass;
    }
	
	 ////////////////student last admission number//////////////

    public function get_last_max_admission(){

    $school_id = $this->input->post('school_id');
    $this->db->select_max('admission_no');
    $this->db->where('school_id', $school_id);
    $result = $this->db->get('students')->row();
    echo $result->admission_no;
    }   
    ///END/////////////student last admission number//////////////

    ////////////////ADD TO student last admission number//////////////

    public function newfrom_max_admission($school_id =" "){
    //$school_id = $this->input->post('school_id');
    $this->db->select_max('admission_no');
    $this->db->where('school_id', $school_id);
    $result = $this->db->get('students')->row();
    $res = preg_replace('/[^0-9]/', '', $result->admission_no);
    $current_year = date("Y");

    if($result->admission_no){
        $arr = explode("/", $result->admission_no, 3);
         //echo $arr[1] + 1; die();
            if($current_year == $arr[1]){
                $admin_num = $current_year."/".($arr[2] + 1);
            }else{
                $admin_num = ($current_year + 1) ."/". 1000;
            }
        }else{

          $admin_num = $current_year."/". 1000; 
        } 

    
    /////////////////////////////////////
    
    if (isset($school_id) && !empty($school_id)){
     $this->db->select('school_name');
     $this->db->from('schools');
     $this->db->where('id', $school_id);
     $temp = $this->db->get()->row();
     $words = explode(" ",  $temp->school_name);
      
        }else{
            
            $words = explode(" ", "Schools Haven");
            
            }
        $acronym = "";

      foreach ($words as $w) {
      $acronym .= $w[0];    
        }
        
    /////////   
    $acronym2 = strtoupper($acronym); 
     return $acronym2."/".$admin_num;

    }   
///////END///ADD TO student last admission number//////////////
	
	
	
	
}