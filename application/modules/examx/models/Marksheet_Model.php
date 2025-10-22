<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Marksheet_Model extends MY_Model {
    
    function __construct() {
        parent::__construct();
    }
    
    public function get_subject_list($school_id, $exam_id, $class_id, $section_id, $student_id,$academic_year_id)
    {
        $this->db->select('M.*,S.name AS subject, G.point, G.name');
        $this->db->from('marks AS M');        
        $this->db->join('subjects AS S', 'S.id = M.subject_id', 'left');
        $this->db->join('grades AS G', 'G.id = M.grade_id', 'left');
        
        $this->db->where('M.academic_year_id', $academic_year_id); 
        $this->db->where('M.class_id', $class_id);
        $this->db->where('M.section_id', $section_id);
        $this->db->where('M.student_id', $student_id);
        $this->db->where('M.exam_id', $exam_id);
        $this->db->where('M.school_id', $school_id);
       
        return $this->db->get()->result();     
    }
	
			public function get_class_list($school_id,$class_id){
	             $this->db->select('*');
				 $this->db->from('classes'); 
				 $this->db->where('id', $class_id);
				 $this->db->where('school_id', $school_id);
	 			 return $this->db->get()->row();	
	 			}




  public function get_grade($mark_obtained,$class_id,$school_id){
      
		$query = $this->db->get_where('grades', array('class_id' => $class_id,'school_id' => $school_id));
        $grades = $query->result_array();
        foreach ($grades as $row) {
            if ($mark_obtained >= $row['mark_from'] && $mark_obtained <= $row['mark_to'])
                return $row;
        }
    }

}
