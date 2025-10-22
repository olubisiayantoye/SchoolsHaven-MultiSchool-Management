<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Theme_Model extends MY_Model {
    
    function __construct() {
        parent::__construct();
    }
	
	
		
//////////////////////////////////////////////////////	
	public function activate_theme()
	{
		if(constant("ENVIRONMENT")=='demo')
		{
			$this->session->set_flashdata('msg', '<div class="alert alert-success">Data updated.[NOT AVAILABLE ON DEMO]</div>');
		}
		else
		{
			//$this->themes_model->activate();
			$theme = $this->input->post('theme');
		    $this->add_option('active_theme',$theme);
			success($this->lang->line('update_success'));
			//$this->session->set_flashdata('msg', '<div class="alert alert-success">'.lang_key('theme_activated').'</div>');
		}
		redirect('theme');
	}

public function get_active_theme()
	{
		if(defined('ACTIVE_THEME'))
		{

			return constant('ACTIVE_THEME');
		}
		else
		{
			
			$row = $this->get_option('active_theme');
			if(is_array($row) && isset($row['error']))
			{
				$theme = 'default';
			}
			else
				$theme = $row->values;			
		
			if(!defined('ACTIVE_THEME'))
			{
				define('ACTIVE_THEME',$theme);
			}
			return $theme;
		}
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
		$data['values'] = json_encode($values);
		$query = $CI->db->update('options',$data,array('key'=>$key));		
	}



	public function add_option($key='',$values='')
	{
		$CI = get_instance();
		$data['values'] = $values;
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
	
	
	
	///////////////////////////////////////////////////////////
	
	
	
	
	
}
