<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/* * *****************Pin.php**********************************
 * @product name    : Global Multi School Management System Express
 * @type            : Class
 * @class name      : Pin
 * @description     : PIN generated is for checking of atudents result online.  
	
 * ********************************************************** */

class Pin extends MY_Controller {

    public $data = array();
   
    
    function __construct() {
        parent::__construct();
         $this->load->model('Pin_Model', 'pin', true);         
    }



    
    /*****************Function index**********************************
    * @type            : Function
    * @function name   : index
    * @description     : Load "Students Assesment Result Checking PIN List" user interface                 
    *                    with pin wise listing    
    * @param           : $id integer value
    * @return          : null 
    * ********************************************************** */
 public function index($school_id = null) {
       
        check_permission(VIEW);
        
      
        $this->data['filter_school_id'] = $school_id;
        $this->data['pin'] = $this->pin->get_pin_list($school_id);        
       
        $condition = array();
        $condition['status'] = 1;        
        if($this->session->userdata('role_id') != SUPER_ADMIN){            
            $condition['school_id'] = $this->session->userdata('school_id');
            //$this->data['classes'] = $this->subject->get_list('classes', $condition, '','', '', 'id', 'ASC');
            //$this->data['teachers'] = $this->subject->get_list('teachers', $condition, '','', '', 'id', 'ASC');
        }
        //var_dump($this->schools);
		//die();
        $this->data['list'] = TRUE;
        $this->data['schools'] = $this->schools;
		//$this->data['pins'] = $this->pin_result;
        $this->layout->title($this->lang->line('manage_pin'). ' | ' . SMS);
		//var_dump($this->data['pin']);
		//die();
        $this->layout->view('pin/index', $this->data); 
    }

  public function view($subject_id = null){
        
        check_permission(VIEW);
        
 
        
        $this->data['subject'] = $this->subject->get_single_subject($subject_id);
        $class_id = $this->data['subject']->class_id;
        
        $this->data['subjects'] = $this->subject->get_subject_list($class_id);        
        
        $condition = array();
        $condition['status'] = 1;        
        if($this->session->userdata('role_id') != SUPER_ADMIN){            
            $condition['school_id'] = $this->session->userdata('school_id');
        }
        $this->data['classes'] = $this->subject->get_list('classes', $condition, '','', '', 'id', 'ASC');
        $this->data['teachers'] = $this->subject->get_list('teachers', $condition, '','', '', 'id', 'ASC');
        
        $this->data['class_id'] = $class_id;
        $this->data['schools'] = $this->schools; 
        $this->data['detail'] = TRUE;       
        $this->layout->title($this->lang->line('view'). ' ' . $this->lang->line('subject'). ' | ' . SMS);
        $this->layout->view('pin/index', $this->data);
    }

////////////////////////////////////////////////////////////////////////

	/****MANAGE EXAMINATION PIN NUMBER*****/
 public function exam_pin_number($param1='') {
	 
					check_permission(VIEW);
					
				//var_dump($param1);die();
				
						if ($param1 == 'create') {
							
							if($this->session->userdata('role_id') != SUPER_ADMIN){
								
						$data['school_id'] = $this->session->userdata('school_id'); 
								}else{
									
						$data['school_id'] = $this->input->post('school_id'); 		
									
									}
							
							
						
						if ($this->input->post('number_of_pin') != null) {
						$number_of_pin = $this->input->post('number_of_pin');
						
						}
						
						if ($this->input->post('digits_needed') != null) {
						$digits_needed = $this->input->post('digits_needed');
						}
						
						if ($this->input->post('number_of_use') != null) {
						//$data['number_of_use'] = $this->input->post('number_of_use');
						$number_of_use = $this->input->post('number_of_use');
						}
						if ($this->input->post('status') != null) {
						//$data['status'] = $this->input->post('status');
						$status = $this->input->post('status');
						}
						if ($this->input->post('title') != null) {
						//$data['status'] = $this->input->post('status');
						$title= $this->input->post('title');
						}
						if ($this->input->post('note') != null) {
						//$data['status'] = $this->input->post('status');
						$data['note'] = $this->input->post('note');
						
						}


							$number_of_pin2= $number_of_pin-1;
							/*//////////////////////////////////////////////////////////*/	
							
							/*for ($x = 0; $x <= $number_of_pin2; $x++) {
							
							//$digits_needed = $this->input->post('digits_needed') ;
							$digits_needed=10;
							$random_number=''; // set up a blank string
							$count=0;
							while ( $count < $digits_needed ) {
							$random_digit = mt_rand(0, 9);
							$random_number .= $random_digit;
							$count++;
							}  */
								//$number_of_pin = 8;
								
								for ($x = 0; $x <= $number_of_pin2; $x++) {
								
								
								
								$digits_needed = $this->input->post('digits_needed');;
								$random_number=''; // set up a blank string
								$count=0;
								while ( $count < $digits_needed ) {
								$random_digit = mt_rand(0, 9);
								$random_number .= $random_digit;
								$count++;
								
								}
								$data['time_stamp'] =   strtotime(date("Y-m-d H:i:s"));
								$data['status'] =  $status;
								$data['number_of_use']= $number_of_use;
								$data['pin_number'] = $random_number;
								$data['title'] = $title;
								
								//var_dump($data); die();
								$this->db->insert('pin_result',  $data);
								
								}
									
		/*///////////////////////////////////////////////////////////*/	
		
		if ($this->db->affected_rows() > 0 ) {
		$this->session->set_flashdata('flash_message' , 'PIN Generation Successfully');
		
		redirect(site_url('checkexam/pin/index'), 'refresh');
		}else{
		$this->session->set_flashdata('flash_message' , 'No PIN Generation inserted');
		redirect(site_url('checkexam/pin/index'), 'refresh');
		}
		
							
		 						 }
		
		redirect(site_url('checkexam/pin/index'), 'refresh');
		
		}
			
	
	
	private function _get_posted_pin_data() {

        $items = array();
        $items[] = 'school_id';
        $items[] = 'title';
		$items[] = 'number_of_pin';
		$items[] = 'digits_needed';
		$items[] = 'number_of_use';
		$items[] = 'number_of_use';
		$items[] = 'status';
	    $data = elements($items, $_POST);

        $data['date'] = date('d-m-Y', strtotime($this->input->post('date')));

        if ($this->input->post('id')) {
            $data['modified_at'] = date('Y-m-d H:i:s');
            $data['modified_by'] = logged_in_user_id();
        } else {
            $data['created_at'] = date('Y-m-d H:i:s');
            $data['created_by'] = logged_in_user_id();
            $data['status'] = 1;
            // create user 
            $data['user_id'] = $this->teacher->create_user();
        }

        return $data;
    }
	
	
	
	
}
