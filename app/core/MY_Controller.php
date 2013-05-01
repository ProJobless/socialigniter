<?php
//Global Controller
class MY_Controller extends CI_Controller{
    public function __construct() {
            parent::__construct();
           
            //Set timezone
            date_default_timezone_set('America/New_York');
            //Load the user model
            $this->load->model('User_model');
            //Load the profile model
            $this->load->model('Profile_model');
            //Load the menu model
            $this->load->model('Menu_model');
            //Load the modules model
            $this->load->model('Module_model');
             //Load the settings model
            $this->load->model('Settings_model');
            //Load the wall model
            $this->load->model('Wall_model');

           //Loop to get all settings in the "globals" table
            foreach ($this->Settings_model->get_global_settings() as $result){
                 $global_data[$result->key] = $this->Settings_model->get_global_setting($result->key);
            }

            //Get modules
            $global_data['modules'] = $this->Module_model->get_modules();
            
            //Load into all views loaded by this controller
            $this->load->vars($global_data);
    }
    
    
}


//Admin Controller
class Admin_Controller extends MY_Controller{
    public function __construct() {
        parent::__construct();       
    }
}

//Public Controller
class Public_Controller extends MY_Controller{
    public function __construct() {
        parent::__construct();
        
    }
}
