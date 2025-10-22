<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Checkmyresult_Model extends MY_Model {
    
    function __construct() {
        parent::__construct();
    }
    
      public function get_exam_list($school_id = null, $academic_year_id = null){
		  
		  
        
        $this->db->select('E.*, S.school_name, AY.session_year');
        $this->db->from('exams AS E');
        $this->db->join('academic_years AS AY', 'AY.id = E.academic_year_id', 'left');
        $this->db->join('schools AS S', 'S.id = E.school_id', 'left');
                
         
        if($this->session->userdata('role_id') != SUPER_ADMIN){
            $school_id = $this->session->userdata('school_id');
        }
        
        if($school_id){
            $this->db->where('E.school_id', $school_id);
        }
        
        if($academic_year_id){        
            $this->db->where('E.academic_year_id', $academic_year_id);
        }       
         
        return $this->db->get()->result();
        
    }
    
    
    public function get_exam_list_result($school_id = null, $academic_year_id = null){
          
        $this->db->select('E.*, S.school_name, AY.session_year');
        $this->db->from('exams AS E');
        $this->db->join('academic_years AS AY', 'AY.id = E.academic_year_id', 'left');
        $this->db->join('schools AS S', 'S.id = E.school_id', 'left');
        $this->db->where('E.school_id', $school_id);
             
         
        return $this->db->get()->result();
        
    }

    
    public function get_class_list($school_id,$class_id){
	             $this->db->select('*');
				 $this->db->from('classes'); 
				 $this->db->where('id', $class_id);
				 $this->db->where('school_id', $school_id);
	 			 return $this->db->get()->row();	
	 			}
   
     public function get_subject_list($school_id, $exam_id, $class_id, $section_id, $student_id,$academic_year_id)
    {
        $this->db->select('M.*,S.name AS subject, G.point, G.name');
        $this->db->from('marks AS M');        
        $this->db->join('subjects AS S', 'S.id = M.subject_id', 'left');
        $this->db->join('grades AS G', 'G.id = M.grade_id', 'left');
        
       // $this->db->where('M.academic_year_id', $academic_year_id); 
        $this->db->where('M.class_id', $class_id);
        $this->db->where('M.section_id', $section_id);
        $this->db->where('M.student_id', $student_id);
        $this->db->where('M.exam_id', $exam_id);
        $this->db->where('M.school_id', $school_id);
       
        return $this->db->get()->result();     
    }
	
	 public function get_grade($mark_obtained,$class_id,$school_id){
      
		$query = $this->db->get_where('grades', array('class_id' => $class_id,'school_id' => $school_id));
        $grades = $query->result_array();
        foreach ($grades as $row) {
            if ($mark_obtained >= $row['mark_from'] && $mark_obtained <= $row['mark_to'])
                return $row;
        }
    }

    function student_class_position_manual($exam_id,$class_id,$student_id){
		 $query = $this->db->get_where('exam_comment', array('student_id' => $student_id ,'class_id' => $class_id , 'exam_id' => $exam_id))->row();
        return $query->class_position;
		
		}
	
		
		function student_class_position($school_id,$exam_id,$class_id,$student_id){
			
			
			
		$this->db->select('student_id, SUM(obtain_total_mark) as total');
			// $this->db->select_sum('mark_obtained');
			 $this->db->from('marks');
             $this->db->where('school_id' , $school_id);
			 $this->db->where('exam_id' , $exam_id);
             $this->db->where('class_id' , $class_id);
           
			// $this->db->where('mark_obtained >' ,$total_mark_obtained);
			 $this->db->group_by('student_id'); 
 			 $this->db->order_by('total', 'desc'); 
			 $query=$this->db->get();
			$poses= $query->result_array();
			$poscnt=1;
			 foreach($poses as $posd)
			 {
				 if($posd["student_id"]==$student_id)
				 {
				return $poscnt;
				break;
				 }
				 $poscnt++; 
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
        
    public function summaryget_total_scored($school_id,$student_id,$subject_id,$exam_id, $class_id, $section_id, $academic_year_id){
            
            
            $query = $this->db->get_where('marks', array(
                'subject_id' => $subject_id,
                'school_id' => $school_id,
                'student_id' => $student_id ,
                'class_id' => $class_id , 
                'exam_id' => $exam_id
                ))->row();
        return $query->obtain_total_mark;
        }
        
}
