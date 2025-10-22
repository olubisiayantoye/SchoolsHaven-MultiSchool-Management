<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Grade_Model extends MY_Model {
    
    function __construct() {
        parent::__construct();
    }

    public function get_garde_list($school_id = null){
        
		 $this->db->select('G.*, S.school_name,C.name AS class_name');
        $this->db->from('grades AS G');
		$this->db->join('classes AS C', 'C.id = G.class_id', 'left');
        $this->db->join('schools AS S', 'S.id = G.school_id', 'left');
		
        
        if($school_id){
            $this->db->where('G.school_id', $school_id);
        }
        
        if($this->session->userdata('role_id') != SUPER_ADMIN){
            $this->db->where('G.school_id', $this->session->userdata('school_id'));
        }else{
			
		 $this->db->order_by("school_id", "asc");
			}
			
		$this->db->order_by("class_name", "asc");
		$this->db->order_by("name", "asc");
			
        return $this->db->get()->result();
    }
   
    
    function duplicate_check($field, $school_id, $value, $id = null ){           
           
        if($id){
            $this->db->where_not_in('id', $id);
        }
        $this->db->where($field, $value);
        $this->db->where('school_id', $school_id);
        return $this->db->get('grades')->num_rows();            
    }
	
	
	
	function checkduplicate_name_not_exist($school_id, $class_id, $exam_grade){           
           
			$this->db->where('school_id', $school_id);
			$this->db->where('class_id', $class_id);
			$this->db->where('name', $exam_grade);
			$query = $this->db->get('grades');
			//var_dump($query->num_rows()); die();
			if($query->num_rows() >= 1)
			{
			//if query finds one row relating to this user then execute code accordingly here
				return false;
			}else{
				
				return true;
				
				} 
         }
		 
		 function checkduplicate_mark_from_not_exist($school_id, $class_id, $mark_from){           
           
			$this->db->where('school_id', $school_id);
			$this->db->where('class_id', $class_id);
			$this->db->where('mark_from', $mark_from);
			$query = $this->db->get('grades');
			if($query->num_rows() >= 1)
			{
			//if query finds one row relating to this user then execute code accordingly here
				return false;
			}else{
				
				return true;
				
				} 
         }
		 
		 function checkduplicate_mark_to_not_exist($school_id, $class_id, $mark_to){           
           
			$this->db->where('school_id', $school_id);
			$this->db->where('class_id', $class_id);
			$this->db->where('mark_to', $mark_to);
			$query = $this->db->get('grades');
			if($query->num_rows() >= 1)
			{
			//if query finds one row relating to this user then execute code accordingly here
				return false;
			}else{
				
				return true;
				
				} 
         }

}
