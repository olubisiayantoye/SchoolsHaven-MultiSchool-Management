<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/* * *****************Grade.php**********************************
 * @product name    : Global Multi School Management System Express
 * @type            : Class
 * @class name      : Grade
 * @description     : Manage exam result grade point system.  
 * @author          : Codetroopers Team 	
 * @url             : https://themeforest.net/user/codetroopers      
 * @support         : yousuf361@gmail.com	
 * @copyright       : Codetroopers Team	 	
 * ********************************************************** */

class Grade extends MY_Controller {

    public $data = array();

    function __construct() {
        parent::__construct();
        $this->load->model('Grade_Model', 'grade', true);        
    }

    
        
    /*****************Function index**********************************
    * @type            : Function
    * @function name   : index
    * @description     : Load "Grade Point List" user interface                 
    *                     
    * @param           : null
    * @return          : null 
    * ********************************************************** */
    public function index($class_id = null,$school_id = null ) {

        check_permission(VIEW);
       
        
        $this->data['filter_school_id'] = $school_id;
		$this->data['filter_class_id'] = $class_id;
		
		  if($this->session->userdata('role_id') != SUPER_ADMIN){
            $condition['school_id'] = $this->session->userdata('school_id');
            $school = $this->grade->get_school_by_id($condition['school_id']); 
            $this->data['classes'] = $this->grade->get_list('classes', $condition, '','', '', 'id', 'ASC');
			$school_id = $condition['school_id'];
		  }
		  $this->data['grades'] = $this->grade->get_garde_list($school_id); 
		  
		  
        $this->data['schools'] = $this->schools;
        $this->data['list'] = TRUE;
        $this->layout->title($this->lang->line('manage_grade') . ' | ' . SMS);
        $this->layout->view('grade/index', $this->data);
    }

    
    /*****************Function add**********************************
    * @type            : Function
    * @function name   : add
    * @description     : Load "Add new Grade" user interface                 
    *                    and process to store "Grade" into database 
    * @param           : null
    * @return          : null 
    * ********************************************************** */
    public function add() {

        check_permission(ADD);

        if ($_POST) {
            $this->_prepare_grade_validation();
            if ($this->form_validation->run() === TRUE) {
                $data = $this->_get_posted_grade_data();

                $insert_id = $this->grade->insert('grades', $data);
                if ($insert_id) {
                    
                    create_log('Has been created a exam Grade : '.$data['name']);
                    
                    success($this->lang->line('insert_success'));
                    redirect('exam/grade/index/'.$data['school_id']);
                } else {
                    error($this->lang->line('insert_failed'));
                    redirect('exam/grade/add');
                }
            } else {
                $this->data['post'] = $_POST;
            }
        }

        $this->data['grades'] = $this->grade->get_garde_list();
        $this->data['schools'] = $this->schools;
        
        $this->data['add'] = TRUE;
        $this->layout->title($this->lang->line('add') . ' ' . $this->lang->line('exam_grade') . ' | ' . SMS);
        $this->layout->view('grade/index', $this->data);
    }

    
    /*****************Function edit**********************************
    * @type            : Function
    * @function name   : edit
    * @description     : Load Update "Grade" user interface                 
    *                    with populate "Grade" value 
    *                    and update "grade" database    
    * @param           : $id integer value
    * @return          : null 
     * ********************************************************** */
    public function edit($id = null) {

        check_permission(EDIT);

        if(!is_numeric($id)){
             error($this->lang->line('unexpected_error'));
             redirect('exam/grade/index');
        }
        
        if ($_POST) {
			
            $this->_prepare_grade_validation2();
			
            if ($this->form_validation->run() === TRUE) {
                $data = $this->_get_posted_grade_data();
                $updated = $this->grade->update('grades', $data, array('id' => $this->input->post('id')));

                if ($updated) {
                    
                     create_log('Has been updated a exam Grade : '.$data['name']);
                    
                    success($this->lang->line('update_success'));
                    redirect('exam/grade/index/'.$data['school_id']);
                } else {
                    error($this->lang->line('update_failed'));
                    redirect('exam/grade/edit/' . $this->input->post('id'));
                }
            } else {
                $this->data['post'] = $_POST;
                $this->data['grade'] = $this->grade->get_single('grades', array('id' => $this->input->post('id')));
            }
        }

        if ($id) {
            $this->data['grade'] = $this->grade->get_single('grades', array('id' => $id));

            if (!$this->data['grade']) {
                redirect('exam/grade/index');
            }
        }

        $this->data['grades'] = $this->grade->get_garde_list($this->data['grade']->school_id);
        
        $this->data['school_id'] = $this->data['grade']->school_id;
        $this->data['filter_school_id'] = $this->data['grade']->school_id;
        $this->data['schools'] = $this->schools;
        
        $this->data['edit'] = TRUE;
        $this->layout->title($this->lang->line('edit') . ' ' . $this->lang->line('exam_grade') . ' | ' . SMS);
        $this->layout->view('grade/index', $this->data);
    }

    
    /*****************Function view**********************************
    * @type            : Function
    * @function name   : view
    * @description     : Load user interface with specific grade point data                 
    *                       
    * @param           : $id integer value
    * @return          : null 
    * ********************************************************** */
    public function view($id = null) {

        check_permission(VIEW);
        
        $this->data['grades'] = $this->grade->get_garde_list();
        
        $this->data['grade'] = $this->grade->get_single('grades', array('id' => $id));
        $this->data['detail'] = TRUE;
        $this->layout->title($this->lang->line('view') . ' ' . $this->lang->line('exam_grade') . ' | ' . SMS);
        $this->layout->view('grade/index', $this->data);
    }

    
    /*****************Function _prepare_grade_validation**********************************
    * @type            : Function
    * @function name   : _prepare_grade_validation
    * @description     : Process "grade" user input data validation                 
    *                       
    * @param           : null
    * @return          : null 
    * ********************************************************** */
	private function _prepare_grade_validation() {
		
	$this->load->library('form_validation');
	$this->form_validation->set_error_delimiters('<div class="error-message" style="color: red;">', '</div>');
	$this->form_validation->set_rules('mark_from', $this->lang->line('mark_from'), 'trim|required|callback_mark_from');
	$this->form_validation->set_rules('school_id', $this->lang->line('school'), 'trim|required');
	$this->form_validation->set_rules('name', $this->lang->line('exam_grade'), 'trim|required|callback_name');
	$this->form_validation->set_rules('point', $this->lang->line('grade_point'), 'trim');
	$this->form_validation->set_rules('mark_to', $this->lang->line('mark_to'), 'trim|required|callback_mark_to');
	$this->form_validation->set_rules('note', $this->lang->line('note'), 'trim');
	}

	private function _prepare_grade_validation2() {
		
	$this->load->library('form_validation');
	$this->form_validation->set_error_delimiters('<div class="error-message" style="color: red;">', '</div>');
	$this->form_validation->set_rules('school_id', $this->lang->line('school'), 'trim|required');
	$this->form_validation->set_rules('point', $this->lang->line('grade_point'), 'trim');
	$this->form_validation->set_rules('note', $this->lang->line('note'), 'trim');
	$this->name();
	$this->mark_from();
	$this->mark_to();
	/*$this->form_validation->set_rules('mark_from', $this->lang->line('mark_from'), 'trim|required|callback_mark_from');
	$this->form_validation->set_rules('name', $this->lang->line('exam_grade'), 'trim|required|callback_name');
	$this->form_validation->set_rules('mark_to', $this->lang->line('mark_to'), 'trim|required|callback_mark_to'); */
	
	}
    
    /*****************Function name**********************************
    * @type            : Function
    * @function name   : name
    * @description     : Unique check for "grade name" data/value                  
    *                       
    * @param           : null
    * @return          : boolean true/false 
    * ********************************************************** */
    public function name() {
		if ($this->input->post('id') == '') {
			$school_id = $this->input->post('school_id');
			$class_id = $this->input->post('class_id');
			$exam_grade = $this->input->post('name');
			$grade = $this->grade->checkduplicate_name_not_exist($school_id, $class_id, $exam_grade);
			
			 if ($grade == FALSE) {
                $this->form_validation->set_message('name', $this->lang->line('already_exist'));
                return FALSE;
            } else {
                return TRUE;
            }
			
			}
			
			
		
       /* if ($this->input->post('id') == '') {
            $grade = $this->grade->duplicate_check('name',  $this->input->post('school_id'), $this->input->post('name'));
            if ($grade) {
                $this->form_validation->set_message('name', $this->lang->line('already_exist'));
                return FALSE;
            } else {
                return TRUE;
            }
        } else if ($this->input->post('id') != '') {
            $grade = $this->grade->duplicate_check('name',  $this->input->post('school_id'), $this->input->post('name'), $this->input->post('id'));
            if ($grade) {
                $this->form_validation->set_message('name', $this->lang->line('already_exist'));
                return FALSE;
            } else {
                return TRUE;
            }
        } */
    }
 public function mark_from() {
		if ($this->input->post('id') == '') {
			$school_id = $this->input->post('school_id');
			$class_id = $this->input->post('class_id');
			$mark_from = $this->input->post('mark_from');
			$grade = $this->grade->checkduplicate_mark_from_not_exist($school_id, $class_id, $mark_from);
			//var_dump($grade); die();
			 if ($grade == FALSE) {
				$this->form_validation->set_message('mark_from', $this->lang->line('already_exist'));
				return FALSE;
				} else {
				return TRUE;
				}
			
			}
 }
 
 public function mark_to() {
		if ($this->input->post('id') == '') {
			$school_id = $this->input->post('school_id');
			$class_id = $this->input->post('class_id');
			$mark_to = $this->input->post('mark_to');
			$grade = $this->grade->checkduplicate_mark_to_not_exist($school_id, $class_id, $mark_to);
			//var_dump($grade); die();
			 if ($grade == FALSE) {
                $this->form_validation->set_message('mark_to', $this->lang->line('already_exist'));
                return FALSE;
            } else {
                return TRUE;
            }
			
			}
 }
    /*****************Function point**********************************
    * @type            : Function
    * @function name   : point
    * @description     : Unique check for "grade point" data/value                  
    *                       
    * @param           : null
    * @return          : boolean true/false 
    * ********************************************************** */
    public function pointx() {
       
    }

    
    /*****************Function _get_posted_grade_data**********************************
    * @type            : Function
    * @function name   : _get_posted_grade_data
    * @description     : Prepare "grade" user input data to save into database                  
    *                       
    * @param           : null
    * @return          : $data array(); value 
    * ********************************************************** */
    private function _get_posted_grade_data() {

        $items = array();
        $items[] = 'school_id';
		$items[] = 'class_id';
        $items[] = 'name';
        $items[] = 'point';
        $items[] = 'mark_from';
        $items[] = 'mark_to';
        $items[] = 'note';
        $data = elements($items, $_POST);

        if ($this->input->post('id')) {
            $data['modified_at'] = date('Y-m-d H:i:s');
            $data['modified_by'] = logged_in_user_id();
        } else {
            $data['status'] = 1;
            $data['created_at'] = date('Y-m-d H:i:s');
            $data['created_by'] = logged_in_user_id();
        }

        return $data;
    }

    
    /*****************Function delete**********************************
    * @type            : Function
    * @function name   : delete
    * @description     : delete "Grade" from database                  
    *                       
    * @param           : $id integer value
    * @return          : null 
    * ********************************************************** */
    public function delete($id = null) {

        check_permission(DELETE);

        $grade = $this->grade->get_single('grades', array('id' => $id));
        
        if ($this->grade->delete('grades', array('id' => $id))) {
            
            create_log('Has been deleted a exam Grade : '.$grade->name);
            success($this->lang->line('delete_success'));
            
        } else {
            error($this->lang->line('delete_failed'));
        }
        redirect('exam/grade/index');
    }

}
