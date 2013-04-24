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
