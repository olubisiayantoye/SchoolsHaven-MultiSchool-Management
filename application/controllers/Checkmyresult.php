<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* * ******************Theme.php*******************************
 * @product name    : Global Multi School Management System Express
 * @type            : Class
 * @class name      : Checkmyresult
 * @description     : This class used to manage Checkmyresult functionality 
 *                    of the application.  
	
 * ********************************************************** */

class Checkmyresult extends CI_Controller {
	


    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('html');
        $this->load->database();
		$this->load->model('Checkmyresult_Model');
		
    }

    /*     * **************Function index**********************************
     * @type            : Function
     * @function name   : index
     * @description     : this function used to load all default color theme            
     * @param           : null; 
     * @return          : null 
     * ********************************************************** */

    public function index() {

     //$school_id = $this->session->userdata('front_school_id');
         
		//var_dump($school_id); die();
		//$school = $this->checkmyresult->get_school_by_id($school_id);
		
		if(defined('SITE_ID')){      
              $school_id = SITE_ID; 
			}else{
			$school_id = $this->session->userdata('front_school_id');
				} 
		
		
		
        $this->data['exams'] = $this->Checkmyresult_Model->get_exam_list_result($school_id, @$school->academic_year_id);
		//var_dump($this->data); die();
        $this->load->view('checkmyresult', $this->data);
		
    }

   
	public function marksheet_print($school_id,$exam_id,$student_id) {

		$school_id = $this->session->userdata('front_school_id');
		
        $this->load->view('marksheet_print');
		
    }
 
 public function student_marksheet_print_view($student_id = null , $exam_id = null, $school_id = null) {
     
    

 		 //$school_id = $this->session->userdata('front_school_id');
 	     $school_id = $_POST['school_id'];
		 $exam_id = $_POST['exam_id'];
		 $student_id = $_POST['student_id'];
 	//var_dump($school_id); die();
       /* if ($this->session->userdata('admin_login') != 1)
            redirect(site_url('login'), 'refresh');

        $class_id     = $this->db->get_where('enroll' , array(
            'student_id' => $student_id , 'year' => $this->db->get_where('settings' , array('type' => 'running_year'))->row()->description
        ))->row()->id;
        $class_name   = $this->db->get_where('class' , array('class_id' => $class_id))->row()->name;

        $page_data['student_id'] =   $student_id;
        $page_data['class_id']   =   $class_id;
        $page_data['exam_id']    =   $exam_id;
        $this->load->view('backend/admin/student_marksheet_print_view', $page_data); */




        $class_id = $this->db->get_where('enrollments' , array(
            'student_id' => $student_id , 'academic_year_id' => $this->db->get_where('exams' , array('id' => $exam_id))->row()->academic_year_id
        ))->row()->class_id;
		
		$section_id = $this->db->get_where('enrollments' , array(
            'student_id' => $student_id , 'academic_year_id' => $this->db->get_where('exams' , array('id' => $exam_id))->row()->academic_year_id
        ))->row()->section_id;
        $class_name   = $this->db->get_where('classes' , array('id' => $class_id))->row()->name;

        $page_data['student_id'] =   $student_id;
        $page_data['class_id']   =   $class_id;
		$page_data['section_id']   =   $section_id;
        $page_data['exam_id']    =   $exam_id;
		$page_data['school_id'] = $school_id;
	
		
	
		
		    $condition['school_id'] = $school_id;
            $school = $this->Checkmyresult_Model->get_school_by_id($condition['school_id']);
            $page_data['academic_years'] = $this->Checkmyresult_Model->get_list('academic_years', $condition, '', '', '', 'id', 'ASC');
            
            $page_data['classes'] = $this->Checkmyresult_Model->get_list('classes', $condition, '','', '', 'id', 'ASC');
            
            $condition['academic_year_id'] = $school->academic_year_id;
           $page_data['exams'] = $this->Checkmyresult_Model->get_list('exams', $condition, '', '', '', 'id', 'ASC');
		   $page_data['class_ass'] = $this->Checkmyresult_Model->get_class_list($school_id,$class_id);
		   
		   $page_data['subjects'] = $this->Checkmyresult_Model->get_subject_list($school_id, $exam_id, $class_id, $section_id, $student_id, $school->academic_year_id);

		$this->load->view('marksheet_print', $page_data);
    }
    
	//Annual student report sheet ///////////////////////////////
	
	public function student_annualreport_view($student_id = null , $exam_id = null, $school_id = null) {

 		 //$school_id = $this->session->userdata('front_school_id');
 	     $school_id = $_POST['school_id'];
		 $exam_id = $_POST['exam_id'];
		 $student_id = $_POST['student_id'];
 	//var_dump($school_id); die();
       /* if ($this->session->userdata('admin_login') != 1)
            redirect(site_url('login'), 'refresh');

        $class_id     = $this->db->get_where('enroll' , array(
            'student_id' => $student_id , 'year' => $this->db->get_where('settings' , array('type' => 'running_year'))->row()->description
        ))->row()->id;
        $class_name   = $this->db->get_where('class' , array('class_id' => $class_id))->row()->name;

        $page_data['student_id'] =   $student_id;
        $page_data['class_id']   =   $class_id;
        $page_data['exam_id']    =   $exam_id;
        $this->load->view('backend/admin/student_marksheet_print_view', $page_data); */




        $class_id = $this->db->get_where('enrollments' , array(
            'student_id' => $student_id , 'academic_year_id' => $this->db->get_where('exams' , array('id' => $exam_id))->row()->academic_year_id
        ))->row()->class_id;
		
		$section_id = $this->db->get_where('enrollments' , array(
            'student_id' => $student_id , 'academic_year_id' => $this->db->get_where('exams' , array('id' => $exam_id))->row()->academic_year_id
        ))->row()->section_id;
        $class_name   = $this->db->get_where('classes' , array('id' => $class_id))->row()->name;

        $page_data['student_id'] =   $student_id;
        $page_data['class_id']   =   $class_id;
		$page_data['section_id']   =   $section_id;
        $page_data['exam_id']    =   $exam_id;
		$page_data['school_id'] = $school_id;
	
		
	
		
		    $condition['school_id'] = $school_id;
            $school = $this->Checkmyresult_Model->get_school_by_id($condition['school_id']);
            $page_data['academic_years'] = $this->Checkmyresult_Model->get_list('academic_years', $condition, '', '', '', 'id', 'ASC');
            
            $page_data['classes'] = $this->Checkmyresult_Model->get_list('classes', $condition, '','', '', 'id', 'ASC');
            
            $condition['academic_year_id'] = $school->academic_year_id;
           $page_data['exams'] = $this->Checkmyresult_Model->get_list('exams', $condition, '', '', '', 'id', 'ASC');
		   $page_data['class_ass'] = $this->Checkmyresult_Model->get_class_list($school_id,$class_id);
		   
		   $page_data['subjects'] = $this->Checkmyresult_Model->get_subject_list($school_id, $exam_id, $class_id, $section_id, $student_id, $school->academic_year_id);

		$this->load->view('annual_marksheet_print', $page_data);
    }
	
	
	///////////////////////////////////////////////////////////////
	
			function pin_exists($key)
		{
			$this->db->where('pin_number',$key);
			$query = $this->db->get('pin_result');
			//var_dump($query->num_rows());
			if ($query->num_rows() == 1){
				return true;
			}
			else{
				return false;
			}
		}
	 function result_verification() {
		 
		  //$student_id , $exam_id , $pin_number
		 $school_id = $this->session->userdata('front_school_id');
		 $exam_id = $_POST['exam_id'];
		 $student_id = $_POST['student_id'];
		 $pin_number = $_POST['pin_num'];
		 $pin_id = $this->pin_exists($pin_number);
		 
		 // echo "sden :". $student_id.'/'."exam :".$exam_id.'/'."sch :".$school_id; die();
		 if($pin_id == false){
			 
			echo "INVALID PIN NUMBER , CHECK THE PIN NUMBER AND TRY AGAIN";
			// redirect(site_url('login'), 'refresh');
		 }
		 else{
				 $query_pin = $this->db->get_where('pin_result' , array('pin_number' => $pin_number))->row();
				 $pin_id = $query_pin->pin_id;
				 $card_usage = $query_pin->card_usage;
				 $pin_status = $query_pin->status;
				 
				// if usage is 0 and is active registerd user with the card
				if ($card_usage == 0 && $pin_status== 1)
				{
				$data['used_by'] = $student_id;
				$data['date_use'] = strtotime(date("Y-m-d H:i:s"));
				$this->db->where('pin_id', $pin_id);
				$this->db->where('school_id', $school_id);
                $this->db->update('pin_result', $data); 
				//echo "EXIST".$card_usage.' '.$pin_status.'//student id//'.$student_id; 
				}
				//check result
				$this->student_marksheet_print_result($exam_id,$student_id,$pin_id,$card_usage,$school_id);
			 
			 }
			 
			 
			 
			 
		 
		
    }
    
    
    
	function student_marksheet_print_result($exam_id,$student_id,$pin_id,$card_usage,$school_id){
		
		$query_pin = $this->db->get_where('pin_result' , array('pin_id' => $pin_id, 'school_id' => $school_id))->row();
		//var_dump($query_pin);die();
				 $number_of_use = @$query_pin->number_of_use;
				 $card_usage = @$query_pin->card_usage;
				 $used_by = @$query_pin->used_by;
				 $pin_status = @$query_pin->status;
		
		  if($number_of_use == $card_usage){
			 
			echo "THE PIN NUMBER USAGE HAS EXPIRED, PLEASE GET A NEW PIN NUMBER AND TRY AGAIN";
			// redirect(site_url('login'), 'refresh');
			die();
		    }
				
		  if($student_id != $used_by){
			echo "THE PIN NUMBER HAS BEEN USED BY ANOTHER USER ";
			// redirect(site_url('login'), 'refresh');
			die();
		    }
			
			
			if($pin_status == 0){
			 
			echo "THE PIN NUMBER HAS BEEN BLOCKED OR NOT ACTIVATED ";
			// redirect(site_url('login'), 'refresh');
		    }


        $class_id = $this->db->get_where('enrollments' , array(
            'student_id' => $student_id , 'academic_year_id' => $this->db->get_where('exams' , array('id' => $exam_id))->row()->academic_year_id
        ))->row()->class_id;
		
		$section_id = $this->db->get_where('enrollments' , array(
            'student_id' => $student_id , 'academic_year_id' => $this->db->get_where('exams' , array('id' => $exam_id))->row()->academic_year_id
        ))->row()->section_id;
        $class_name   = $this->db->get_where('classes' , array('id' => $class_id))->row()->name;

        $page_data['student_id'] =   $student_id;
        $page_data['class_id']   =   $class_id;
		$page_data['section_id']   =   $section_id;
        $page_data['exam_id']    =   $exam_id;
		$page_data['school_id'] = $school_id;
		$page_data['pin_id']     =   $pin_id;
		
		if( $card_usage < $number_of_use){
		$data2['card_usage'] = $card_usage + 1;
		$this->db->where('pin_id', $pin_id);
		$this->db->where('school_id', $school_id);
        $this->db->update('pin_result', $data2); 
		}
		
		    $condition['school_id'] = $school_id;
            $school = $this->Checkmyresult_Model->get_school_by_id($condition['school_id']);
            $page_data['academic_years'] = $this->Checkmyresult_Model->get_list('academic_years', $condition, '', '', '', 'id', 'ASC');
            
            $page_data['classes'] = $this->Checkmyresult_Model->get_list('classes', $condition, '','', '', 'id', 'ASC');
            
            $condition['academic_year_id'] = $school->academic_year_id;
           $page_data['exams'] = $this->Checkmyresult_Model->get_list('exams', $condition, '', '', '', 'id', 'ASC');
		   $page_data['class_ass'] = $this->Checkmyresult_Model->get_class_list($school_id,$class_id);
		   
		   $page_data['subjects'] = $this->Checkmyresult_Model->get_subject_list($school_id, $exam_id, $class_id, $section_id, $student_id, $school->academic_year_id);

		$this->load->view('marksheet_print', $page_data);
		
		//var_dump($page_data['subjects']); die();
		}
		
		
  
	
	
	
	
	

}
