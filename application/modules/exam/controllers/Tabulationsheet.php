<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/* * *****************Meritlist.php**********************************
 * @product name    : Global Multi School Management System Express
 * @type            : Class
 * @class name      : Meritlist
 * @description     : Manage exam merit list.  
 * @author          : Codetroopers Team     
 * @url             : https://themeforest.net/user/codetroopers      
 * @support         : yousuf361@gmail.com   
 * @copyright       : Codetroopers Team     
 * ********************************************************** */

class Tabulationsheet extends MY_Controller {

    public $data = array();

    function __construct() {
        parent::__construct();
        $this->load->model('Tabulationsheet_Model', 'tabulationsheet', true);
        $this->load->model('Ajax_Model', 'ajax', true);        
    }

    
        
    /*****************Function index**********************************
    * @type            : Function
    * @function name   : index
    * @description     : Load "Exam final result sheet" user interface                 
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

            $school = $this->tabulationsheet->get_school_by_id($school_id);
            $this->data['subjects']  = $this->ajax->get_listsubject_section($school_id,$class_id,$section_id);
            
            if(!$school->academic_year_id){
                error($this->lang->line('set_academic_year_for_school'));
                redirect('exam/tabulationsheet');
            }
            
            $this->data['students'] = $this->tabulationsheet->get_student_list($school_id, $class_id, $section_id, $school->academic_year_id);

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
                    $result = $this->tabulationsheet->get_single('exam_results', $condition);

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
                        $this->tabulationsheet->insert('exam_results', $data);
                    }
                }
            }

            $this->data['grades'] = $this->tabulationsheet->get_list('grades', array('status' => 1, 'school_id'=>$school_id), '', '', '', 'id', 'ASC');
            $this->data['exam'] =  $this->tabulationsheet->get_single('exams', array('id'=>$exam_id, 'school_id'=>$school_id));
            
            $this->data['school_id'] = $school_id;
            $this->data['exam_id'] = $exam_id;
            $this->data['class_id'] = $class_id;
            $this->data['section_id'] = $section_id;
            $this->data['academic_year_id'] = $school->academic_year_id;
             
            
            $class = $this->tabulationsheet->get_single('classes', array('id'=>$class_id, 'school_id'=>$school_id));
            create_log('Has been process exam result for class: '. $class->name);
        }
        
        
        $condition = array();
        $condition['status'] = 1;  
        
        if($this->session->userdata('role_id') != SUPER_ADMIN){
            $school = $this->tabulationsheet->get_school_by_id($this->session->userdata('school_id'));
            $condition['school_id'] = $this->session->userdata('school_id');
            
            $this->data['classes'] = $this->tabulationsheet->get_list('classes', $condition, '','', '', 'id', 'ASC');
            $condition['academic_year_id'] = $school->academic_year_id;
            $this->data['exams'] = $this->tabulationsheet->get_list('exams', $condition, '', '', '', 'id', 'ASC');
        }

        $this->layout->title($this->lang->line('exam_tabulation_sheet') . ' | ' . SMS);
        $this->layout->view('tabulation_sheet/index', $this->data);
    }





}