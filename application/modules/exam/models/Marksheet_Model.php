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
    
    
    public function get_exam_comments($school_id, $exam_id, $class_id, $section_id, $student_id) {
        $ci = & get_instance();
        $ci->db->select('teacher_comment, general_comment');
        $ci->db->from('exam_results');        
        $ci->db->where('school_id', $school_id);
        $ci->db->where('class_id', $class_id);
        $ci->db->where('section_id', $section_id);
        $ci->db->where('student_id', $student_id);
        $ci->db->where('exam_id', $exam_id);
        return  $ci->db->get()->result();     
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
    
    public function delete_duplicate_mark($school_id= null, $exam_id = null,$section_id = null, $student_id= null, $subject_id=null, $academic_year_id= null){           
            //$class_id = 68;
           // $section_id = 83;
           
            $this->db->select('id');
            $this->db->from('marks');
            $this->db->where('school_id', $school_id);
            $this->db->where('exam_id', $exam_id);
           // $this->db->where('class_id', $class_id);
            $this->db->where('section_id', $section_id);
            $this->db->where('subject_id', $subject_id);
            $this->db->where('academic_year_id', $academic_year_id);
            $this->db->where('student_id', $student_id);
            $result = $this->db->get()->result();
            $counter = count($result);
            //var_dump($result[1]->id); die();
            if($counter > 1){
              
               $dell = $counter - 1;
                $x = 1;

                while($x <= $dell) {
                echo $result[$x]->id."= Refresh this page to remove Duplicate"."<br>";
                $this->db->query("delete  from marks where id='".$result[$x]->id."'");
                $x++;
                }     
            }
        }


}
