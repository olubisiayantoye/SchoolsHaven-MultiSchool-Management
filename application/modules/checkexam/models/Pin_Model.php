<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pin_Model extends MY_Model {
    
    function __construct() {
        parent::__construct();
    }
    
     public function get_pin_list($school_id = null){
        
         $this->db->select('P.*,S.school_name');
        $this->db->from('pin_result AS P');
        $this->db->join('schools AS S', 'S.id = P.school_id', 'left');
		$this->db->where('P.status', 1);
		$this->db->where('P.used_by',NULL);
        if($school_id){
            $this->db->where('school_id', $school_id); 
        } 
        
        if($this->session->userdata('role_id') != SUPER_ADMIN){
            $this->db->where('school_id', $this->session->userdata('school_id'));
        }
       
       $this->db->order_by('P.pin_id', 'DESC'); 
        return $this->db->get()->result();
        
    }
	
	  public function get_usedpin_list($school_id = null){
        
       $this->db->select('P.*,S.school_name, STUD.admission_no, STUD.surname, STUD.name');
        $this->db->from('pin_result AS P');
        $this->db->join('schools AS S', 'S.id = P.school_id', 'left');
        $this->db->join('students AS STUD', 'STUD.id = P.used_by', 'left');
		$this->db->where('P.status', 1);
		$this->db->where('P.used_by !=',NULL);
		
        if($school_id){
            $this->db->where('P.school_id', $school_id); 
        } 
        
        if($this->session->userdata('role_id') != SUPER_ADMIN){
            $this->db->where('P.school_id', $this->session->userdata('school_id'));
        }
       $this->db->order_by('P.pin_id', 'DESC'); 
        return $this->db->get()->result();
        
    }
	
	 public function get_blockedpin_list($school_id = null){
        
        $this->db->select('P.*,S.school_name');
        $this->db->from('pin_result AS P');
        $this->db->join('schools AS S', 'S.id = P.school_id', 'left');
		$this->db->where('P.status', 0);
		//$this->db->where('P.used_by !=',NULL);
		
        if($school_id){
            $this->db->where('school_id', $school_id); 
        } 
        
        if($this->session->userdata('role_id') != SUPER_ADMIN){
            $this->db->where('school_id', $this->session->userdata('school_id'));
        }
       $this->db->order_by('P.pin_id', 'DESC'); 
        return $this->db->get()->result();
        
    }
	
	
	
	
	 public function update_pinrenew($pin_id, $status,$used_by){
		 
		 
		$data = array(
		'status' => $status,
		'used_by' => $used_by
		);
  		$this->db->where('pin_id', $id);
		return $this->db->update('pin_result', $data);
		 
		 }
	
	
    
    public function get_single_subject($id){
        
        $this->db->select('S.*, SC.school_name, C.name AS class_name, T.name AS teacher');
        $this->db->from('subjects AS S');
        $this->db->join('teachers AS T', 'T.id = S.teacher_id', 'left');
        $this->db->join('classes AS C', 'C.id = S.class_id', 'left');
        $this->db->join('schools AS SC', 'SC.id = S.school_id', 'left');
        $this->db->where('S.id', $id);
        return $this->db->get()->row();
        
    }
    
    function duplicate_check($school_id, $class_id, $name, $id = null ){   
        
        if($id){
            $this->db->where_not_in('id', $id);
        }
        $this->db->where('class_id', $class_id);
        $this->db->where('name', $name);
        $this->db->where('school_id', $school_id);
        return $this->db->get('subjects')->num_rows();        
    }   

}
