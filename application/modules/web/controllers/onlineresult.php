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

class Onlineresult extends My_Controller {

    

    /*     * **************Function index**********************************
     * @type            : Function
     * @function name   : index
     * @description     : this function used to load all default color theme            
     * @param           : null; 
     * @return          : null 
     * ********************************************************** */

    public function index() {


        //$this->layout->title($this->lang->line('theme') . ' | ' . SMS);
        $this->layout->view('onlineresult');
		
    }

    
	
	

}
