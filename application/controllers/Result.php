<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Result extends CI_Controller {

    function __construct() {

        parent::__construct();
		$this->load->database();
        $this->load->library('session');
		$this->load->model('Ajax_Model', 'ajax', true);
        
       /*cache control*/
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
    }
	
	
	
	//RESULT CHECKER SELECTIONS	
	 public function get_enroll_class($exam_id){
		
		 if($this->session->userdata('front_school_id')){
			 
		$school_id = $this->session->userdata('front_school_id');
		//$this->db->distinct();
		//$this->db->group_by('class_id');
		//$classes = $this->db->get_where('marks' , array('exam_id' => $exam_id ,'school_id' => $school_id ))->result_array();
		
		$this->db->select('class_id');
        $this->db->from('marks');        
        $this->db->where('exam_id', $exam_id ); 
        $this->db->where('school_id', $school_id);        
        $this->db->group_by('class_id');             
        //$this->db->order_by('I.id', 'DESC');  
        $query = $this->db->get();
        $classes = $query->result_array(); 
		
		
		
		
		
		echo '<option value="' . 0 . '">' . "Now select class". '</option>';
        foreach ($classes as $row) {
            
	echo '<option value="' . $row['class_id'] . '">' . $this->db->get_where(' classes' , array(
            'id'  => $row['class_id'],'school_id' => $school_id ))->row()->name . '</option>';
        }
		
		
		}
	 }
	
	
		function get_class_students_result($class_id)
    {
		 if($this->session->userdata('front_school_id')){
			 
			 $school_id = $this->session->userdata('front_school_id');
		
        $students = $this->db->get_where('enrollments' , array( 'class_id' => $class_id ,'school_id' => $school_id   ))->result_array();
		
		echo '<option value="' . 0 . '">' . "Now select Student". '</option>';
        foreach ($students as $row) {
            $query_name = $this->db->get_where('students' , array('id' => $row['student_id'],'school_id' => $school_id ))->row();
			$name = $query_name->surname.' '.$query_name->name;
			$student_code = $query_name->admission_no;
		
			echo '<option value="' . $row['student_id'] . '">' .$student_code ." - ". $name . '</option>';
        }
		
														 }
		
    }
	
}