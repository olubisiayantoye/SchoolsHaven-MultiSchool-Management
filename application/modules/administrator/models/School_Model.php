<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class School_Model extends MY_Model {
    
    function __construct() {
        parent::__construct();
    }
    
        
    function duplicate_check($school_name, $id = null ){           
           
        if($id){
            $this->db->where_not_in('id', $id);
        }
        $this->db->where('school_name', $school_name);
        return $this->db->get('schools')->num_rows();            
    }
	
	
	
	function get_temp_list(){  
	
	 		$this->load->helper('directory');
		    $map = directory_map('./application/modules/web/views', 1);
			return $map;
	
	}
	
	
	
}
