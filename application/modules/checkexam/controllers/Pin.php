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
       	$this->data['used_pin'] = $this->pin->get_usedpin_list($school_id);
		$this->data['blocked_pin'] = $this->pin->get_blockedpin_list($school_id);  
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
			
	
	
	public function actions(){
		
					if (isset($_POST['action1'])) {
					
					if ($_POST['action1'] == 'block') {
				/////////////////////////////////////////////////////////////		
					$checkbox = $_POST['check1'];
					for($i=0;$i<count($checkbox);$i++){
					$pin_id = $checkbox[$i];
		$this->pin->update('pin_result', array('status' => 0), array('pin_id' => $pin_id));
					success($this->lang->line('update_success'));
					
					}
					redirect(site_url('checkexam/pin/index'), 'refresh');
				//////////////////////////////////////////////////////////////
				} 
				
				if ($_POST['action1'] == 'delete') {
				//action for delete
				//////////////////////////////////////////////////
				$checkbox = $_POST['check1'];
				for($i=0;$i<count($checkbox);$i++){
				$pin_id = $checkbox[$i];
				$this->pin->delete('pin_result', array('pin_id' => $pin_id));
				
				success($this->lang->line('delete_success'));
				
				}
				redirect(site_url('checkexam/pin/index'), 'refresh');
				////////////////////////////////////////////////////////////////
				}
				
			}
			
				
			if (isset($_POST['action2'])) {	
				if ($_POST['action2'] == 'block') {
				//action for block here
				////////////////////////////////////////////////////////////////////
				$checkbox = $_POST['check2'];
					for($i=0;$i<count($checkbox);$i++){
					$pin_id = $checkbox[$i];
		$this->pin->update('pin_result', array('status' => 0), array('pin_id' => $pin_id));
					success($this->lang->line('update_success'));
					
					}
					redirect(site_url('checkexam/pin/index'), 'refresh');
				///////////////////////////////////////////////////////////////////
				}
				
				if ($_POST['action2'] == 'renew') {
				//action for renew
				/////////////////////////////////////////////////////////////		
					$checkbox = $_POST['check2'];
					for($i=0;$i<count($checkbox);$i++){
					$pin_id = $checkbox[$i];
					$status = 1;
					$used_by = NULL;
		            $this->pin->update_pinrenew($pin_id, $status,$used_by);
					success($this->lang->line('update_success'));
					
					}
					redirect(site_url('checkexam/pin/index'), 'refresh');
				//////////////////////////////////////////////////////////////
				}
				if ($_POST['action2'] == 'Delete') {
				//action for delete
				//////////////////////////////////////////////////
				$checkbox = $_POST['check2'];
				for($i=0;$i<count($checkbox);$i++){
				$pin_id = $checkbox[$i];
				$this->pin->delete('pin_result', array('pin_id' => $pin_id));
				
				success($this->lang->line('delete_success'));
				
				}
				redirect(site_url('checkexam/pin/index'), 'refresh');
				////////////////////////////////////////////////////////////////
				}
			}
			
			
			if (isset($_POST['action3'])) {
				
				 if ($_POST['action3'] == 'block') {
				//action for block here
				////////////////////////////////////////////////////////////////////
				$checkbox = $_POST['check3'];
					for($i=0;$i<count($checkbox);$i++){
					$pin_id = $checkbox[$i];
		$this->pin->update('pin_result', array('status' => 1), array('pin_id' => $pin_id));
					success($this->lang->line('update_success'));
					
					}
					redirect(site_url('checkexam/pin/index'), 'refresh');
				///////////////////////////////////////////////////////////////////
				}
				
				if ($_POST['action3'] == 'delete') {
				//action for delete
				//////////////////////////////////////////////////
				$checkbox = $_POST['check3'];
				for($i=0;$i<count($checkbox);$i++){
				$pin_id = $checkbox[$i];
				$this->pin->delete('pin_result', array('pin_id' => $pin_id));
				
				success($this->lang->line('delete_success'));
				
				}
				redirect(site_url('checkexam/pin/index'), 'refresh');
				////////////////////////////////////////////////////////////////

				} 
			}
	}
	
}
