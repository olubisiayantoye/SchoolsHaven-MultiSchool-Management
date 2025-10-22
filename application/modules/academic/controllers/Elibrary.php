<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/* * *****************elibrary.php**********************************
 * @product name    : Global Multi School Management System Express
 * @type            : Class
 * @class name      : elibrary
 * @description     : Manage employee elibrary.  
 * @author          : Codetroopers Team     
 * @url             : https://themeforest.net/user/codetroopers      
 * @support         : yousuf361@gmail.com   
 * @copyright       : Codetroopers Team     
 * ********************************************************** */

class Elibrary extends MY_Controller {

    public $data = array();
    
    
    function __construct() {
        parent::__construct();
        $this->load->model('elibrary_Model', 'elibrary', true);
        
    }

    
    /*****************Function index**********************************
    * @type            : Function
    * @function name   : index
    * @description     : Load "elibrary List" user interface                 
    *                       
    * @param           : null
    * @return          : null 
    * ********************************************************** */
    public function index() {
        
        check_permission(VIEW);
        
        $this->data['elibrarys'] = $this->elibrary->get_elibrary(); 
        
        $this->data['list'] = TRUE;
        $this->layout->title($this->lang->line('manage_elibrary'). ' | ' . SMS);
        $this->layout->view('elibrary/index', $this->data);  
    }

    
    /*****************Function add**********************************
    * @type            : Function
    * @function name   : add
    * @description     : Load "Add new elibrary" user interface                 
    *                    and process to store "elibrary" into database 
    * @param           : null
    * @return          : null 
    * ********************************************************** */
    public function add() {

         check_permission(ADD);
        if ($_POST) {
            $this->_prepare_elibrary_validation();
            if ($this->form_validation->run() === TRUE) {
                $data = $this->_get_posted_elibrary_data();

                $insert_id = $this->elibrary->insert('elibrarys', $data);
                if ($insert_id) {
                    
                    create_log('Has been created a elibrary : '.$data['name']);
                    
                    success($this->lang->line('insert_success'));
                    redirect('academic/elibrary/index');
                } else {
                    error($this->lang->line('insert_failed'));
                    redirect('academic/elibrary/add');
                }
            } else {
                $this->data = $_POST;
            }
        }

        $this->data['elibrarys'] = $this->elibrary->get_elibrary(); 
        
        $this->data['add'] = TRUE;
        $this->layout->title($this->lang->line('add'). ' ' . $this->lang->line('elibrary'). ' | ' . SMS);
        $this->layout->view('elibrary/index', $this->data);
    }


     public function enter_elibrary($id = null) {  

      if ($id) {
                $this->data['elibrary'] = $this->elibrary->get_single('elibrarys', array('id' => $id));

            }else{

                     redirect('academic/elibrary/index');
            }

       
        $this->layout->title($this->lang->line('view'). ' ' . $this->lang->line('elibrary'). ' | ' . SMS);
        $this->layout->view('elibrary/elibrary', $this->data);

     }











        
    /*****************Function edit**********************************
    * @type            : Function
    * @function name   : edit
    * @description     : Load Update "elibrary" user interface                 
    *                    with populate "elibrary" value 
    *                    and process to update "elibrary" into database    
    * @param           : $id integer value
    * @return          : null 
    * ********************************************************** */
    public function edit($id = null) {       

         check_permission(EDIT);
        if ($_POST) {
            $this->_prepare_elibrary_validation();
            if ($this->form_validation->run() === TRUE) {
                $data = $this->_get_posted_elibrary_data();
                $updated = $this->elibrary->update('elibrarys', $data, array('id' => $this->input->post('id')));

                if ($updated) {
                    
                    create_log('Has been updated a elibrary : '.$data['name']);
                    
                    success($this->lang->line('update_success'));
                    redirect('academic/elibrary/index');                   
                } else {
                    error($this->lang->line('update_failed'));
                    redirect('academic/elibrary/edit/' . $this->input->post('id'));
                }
            } else {
                $this->data['elibrary'] = $this->elibrary->get_single('elibrarys', array('id' => $this->input->post('id')));
            }
        } else {
            if ($id) {
                $this->data['elibrary'] = $this->elibrary->get_single('elibrarys', array('id' => $id));

                if (!$this->data['elibrary']) {
                     redirect('academic/elibrary/index');
                }
            }
        }

        $this->data['school_id'] = $this->data['elibrary']->school_id;
        
        $this->data['elibrarys'] = $this->elibrary->get_elibrary(); 
        
        $this->data['edit'] = TRUE;
        $this->layout->title($this->lang->line('edit'). ' ' . $this->lang->line('elibrary'). ' | ' . SMS);
        $this->layout->view('elibrary/index', $this->data);
    }

        
    /*****************Function _prepare_elibrary_validation**********************************
    * @type            : Function
    * @function name   : _prepare_elibrary_validation
    * @description     : Process "elibrary" user input data validation                 
    *                       
    * @param           : null
    * @return          : null 
    * ********************************************************** */
    private function _prepare_elibrary_validation() {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error-message" style="color: red;">', '</div>');
        
        $this->form_validation->set_rules('school_id', $this->lang->line('school'), 'trim|required');
        $this->form_validation->set_rules('name', $this->lang->line('name'), 'trim|required|callback_name');
        $this->form_validation->set_rules('elibrary_url', $this->lang->line('elibrary_url'), 'trim|required');
        $this->form_validation->set_rules('note', $this->lang->line('note'), 'trim');
    }

                    
    /*****************Function name**********************************
    * @type            : Function
    * @function name   : name
    * @description     : Unique check for "elibrary Name" data/value                  
    *                       
    * @param           : null
    * @return          : boolean true/false 
    * ********************************************************** */ 
    public function name() {
        if ($this->input->post('id') == '') {
            $elibrary = $this->elibrary->duplicate_check($this->input->post('school_id'), $this->input->post('name'));
            if ($elibrary) {
                $this->form_validation->set_message('name', $this->lang->line('already_exist'));
                return FALSE;
            } else {
                return TRUE;
            }
        } else if ($this->input->post('id') != '') {
            $elibrary = $this->elibrary->duplicate_check($this->input->post('school_id'), $this->input->post('name'), $this->input->post('id'));
            if ($elibrary) {
                $this->form_validation->set_message('name', $this->lang->line('already_exist'));
                return FALSE;
            } else {
                return TRUE;
            }
        } else {
            return TRUE;
        }
    }
       
    /*****************Function _get_posted_elibrary_data**********************************
    * @type            : Function
    * @function name   : _get_posted_elibrary_data
    * @description     : Prepare "elibrary" user input data to save into database                  
    *                       
    * @param           : null
    * @return          : $data array(); value 
    * ********************************************************** */
    private function _get_posted_elibrary_data() {

        $items = array();
        $items[] = 'school_id';
        $items[] = 'name';
        $data = elements($items, $_POST);        
        $data['note'] = $this->input->post('note');
        $data['elibrary_url'] = $this->input->post('elibrary_url');
        
        if ($this->input->post('id')) {
            $data['modified_at'] = date('Y-m-d H:i:s');
            $data['modified_by'] = logged_in_user_id();
        } else {
            $data['created_at'] = date('Y-m-d H:i:s');
            $data['created_by'] = logged_in_user_id();
            $data['status'] = 1;
        }

        return $data;
    }

    
        
    
    /*****************Function delete**********************************
    * @type            : Function
    * @function name   : delete
    * @description     : delete "elibrary" data from database                  
    *                       
    * @param           : $id integer value
    * @return          : null 
    * ********************************************************** */
    public function delete($id = null) {
        
        check_permission(DELETE);
         
        if(!is_numeric($id)){
             error($this->lang->line('unexpected_error'));
             redirect('academic/elibrary/index');        
        }
        
        $elibrary = $this->elibrary->get_single('elibrarys', array('id' => $id));
        
        if ($this->elibrary->delete('elibrarys', array('id' => $id))) { 
            
            create_log('Has been deleted a elibrary : '.$elibrary->name);
            success($this->lang->line('delete_success'));
        } else {
            error($this->lang->line('delete_failed'));
        }
        redirect('academic/elibrary/index');
    }

}
