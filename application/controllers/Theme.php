<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/* * ******************Theme.php*******************************
 * @product name    : Global Multi School Management System Express
 * @type            : Class
 * @class name      : Theme
 * @description     : This class used to manage color theme functionality 
 *                    of the application.  
 * @author          : Codetroopers Team 	
 * @url             : https://themeforest.net/user/codetroopers      
 * @support         : yousuf361@gmail.com	
 * @copyright       : Codetroopers Team	 	
 * ********************************************************** */

class Theme extends My_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->model('Theme_Model', 'theme', true);
        $this->data['themes'] = $this->theme->get_list('themes', array('status' => 1), '', '', '', 'id', 'ASC');
		
		if($this->session->userdata('role_id') == SUPER_ADMIN){
         $this->data['themes_temp'] = $this->get_active_theme();
        }else{
			
			$this->data['themes_temp'] = $this->get_active_theme($this->session->userdata('school_id'));

		 
        }
		
		//$this->data['themes_temp']= $this->get_active_theme();
		$this->data['list'] = TRUE;
	
    }

    /*     * **************Function index**********************************
     * @type            : Function
     * @function name   : index
     * @description     : this function used to load all default color theme            
     * @param           : null; 
     * @return          : null 
     * ********************************************************** */

    public function index() {

        check_permission(VIEW);

        $this->layout->title($this->lang->line('theme') . ' | ' . SMS);
        $this->layout->view('theme', $this->data);
		
    }

    /*     * **************Function activate**********************************
     * @type            : Function
     * @function name   : activate
     * @description     : this function used to activate user selected theme  
     *                    after successfully activated color theme it's 
     *                    redirected to all default color theme            
     * @param           : $id integer value; 
     * @return          : null 
     * ********************************************************** */

    public function activate($id = null) {

        check_permission(EDIT);

        if ($id == '') {
            error($this->lang->line('update_failed'));
            redirect('theme');
        }

        $theme = $this->theme->get_single('themes', array('id' => $id));
        
        if($this->session->userdata('role_id') == SUPER_ADMIN){
            $this->theme->update('system_admin', array('theme_name' => $theme->slug), array('id' => logged_in_user_id()));
        }else{
            $this->theme->update('schools', array('theme_name' => $theme->slug), array('id' => $this->session->userdata('school_id')));
        }
        
        $this->session->unset_userdata('theme');
        $this->session->set_userdata('theme', $theme->slug);
        success($this->lang->line('update_success'));
        
        create_log('Activate Theme '. $theme->slug);
        redirect('theme');
    }
	
	public function activate_theme_temp($theme) {

        check_permission(EDIT);

        if ($theme == '') {
            error($this->lang->line('update_failed'));
            redirect('theme');
        }

        //$theme = $this->theme->get_single('themes', array('id' => $id));
        
        if($this->session->userdata('role_id') == SUPER_ADMIN){
            $this->theme->update('system_admin', array('theme_template' => $theme), array('user_id' => logged_in_user_id()));
        }else{
            $this->theme->update('schools', array('theme_template' => $theme), array('id' => $this->session->userdata('school_id')));
        }
        
        //$this->session->unset_userdata('theme');
        //$this->session->set_userdata('theme', $theme);
        success($this->lang->line('update_success'));
        
        create_log('Activate Theme '. $theme);
        redirect('theme');
    }
	
	
	
	
	
	
	
//////////////////////////////////////////////new///////////////////////////
public function activate_theme()
	{
		
			//$this->themes_model->activate();
			$theme = $this->input->post('theme');
			$school_id = $this->input->post('school_id');
			
			$this->theme->update('schools', array('theme_template' => $theme), array('id' => $school_id));
			success($this->lang->line('update_success'));
			redirect('theme');
			
		
	}

	public function get_active_theme()
	{
				
				//var_dump($this->session->userdata('school_id')); die();
				if($this->session->userdata('role_id') == SUPER_ADMIN){
           
			     $this->db->select('*');
				 $this->db->from('system_admin');
				 $this->db->where('user_id', logged_in_user_id());
	 			 $temp = $this->db->get()->row();
				
        }else{
           
				$ids = $this->session->userdata('school_id');
				
			     $this->db->select('*');
				 $this->db->from('schools');
				 $this->db->where('id', $ids);
	 			 $temp = $this->db->get()->row();
				
				
        }
				
			 return $temp->theme_template;	 
	}



	 public function get_option($key='')
	{
		$defined = 0;
		if(defined('OPTIONS_ARRAY'))
		{						
			$options = (array)json_decode(constant('OPTIONS_ARRAY'));
			if(isset($options[$key]))
			{
				$defined = 1;
				return $options[$key];
			}
		}


		if($defined==0)
		{
			$CI = get_instance();
			$CI->load->database();
			$query = $CI->db->get_where('options',array('key'=>$key,'status'=>1));		
			if($query->num_rows()>0)
				$option = $query->row();
			else
				$option = array('error'=>'Key not found');

			$options[$key] = $option;
			if(!defined('OPTIONS_ARRAY'))
				define('OPTIONS_ARRAY',json_encode($options));

			return $option;
		}
	}



	public function update_option($key='',$values=array())
	{
		$CI = get_instance();
		$data['school_code'] = $this->session->userdata('school_id');
		$data['values'] = json_encode($values);
		$query = $CI->db->update('options',$data,array('key'=>$key));		
	}



	public function add_option($key='',$values='')
	{
		
		$CI = get_instance();
		$data['values'] = $values;
		$data['school_id'] = $this->session->userdata('school_id');
		
		$result = $this->get_option($key);
		
		if(is_array($result) && isset($result['error']))
		{
	
			$data['key'] = $key;
			$query = $CI->db->insert('options',$data);					
		}
		else
		{
		
			$query = $CI->db->update('options',$data,array('key'=>$key));		
		}
	}

	public function directory_map($source_dir, $directory_depth = 0, $hidden = FALSE)
	{
		if ($fp = @opendir($source_dir))
		{
			$filedata	= array();
			$new_depth	= $directory_depth - 1;
			$source_dir	= rtrim($source_dir, DIRECTORY_SEPARATOR).DIRECTORY_SEPARATOR;

			while (FALSE !== ($file = readdir($fp)))
			{
				// Remove '.', '..', and hidden files [optional]
				if ( ! trim($file, '.') OR ($hidden == FALSE && $file[0] == '.'))
				{
					continue;
				}

				if (($directory_depth < 1 OR $new_depth > 0) && @is_dir($source_dir.$file))
				{
					$filedata[$file] = directory_map($source_dir.$file.DIRECTORY_SEPARATOR, $new_depth, $hidden);
				}
				else
				{
					$filedata[] = $file;
				}
			}

			closedir($fp);
			return $filedata;
		}

		return FALSE;
	}
//////////////////////////////////////////////////////////////

	
	
	
	
	
	

}
