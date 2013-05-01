<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends Public_Controller {
	/*
     * Declare properties
	*/
	private $from_email = 'techguyifno@gmail.com';
	private $from_name = 'Social Igniter';

	public function __construct(){
		parent::__construct();

		//Load user agent lib to get users ip
		$this->load->library('user_agent');
	}

	/**
	 * Welcome Page/Form
	 */
	public function index(){
        	//form validation
			$this->form_validation->set_rules('first_name','First Name','trim|required|xss_clean');
        	$this->form_validation->set_rules('last_name','Last Name','trim|required|xss_clean');
        	$this->form_validation->set_rules('nickname','Nickname','trim|required|xss_clean|callback_check_nickname_exists');
        	$this->form_validation->set_rules('email','Email','trim|required|valid_email|xss_clean|callback_check_email_exists');
        	$this->form_validation->set_rules('gender','Gender','trim|required');
        	$this->form_validation->set_rules('birthdate','Birthdate','trim|required');
        	$this->form_validation->set_rules('password','Password','trim|required|min_length[4]|max_length[50]|xss_clean');
        	$this->form_validation->set_rules('password2','Confirm Password','trim|required|matches[password]|xss_clean');

        	if($this->form_validation->run() == FALSE){
        		//Views
        		$data['main_content'] = 'public/user/welcome';
        		$this->load->view('public/layouts/welcome', $data);
        	} else {
        		//Generate the registration id
        		$reg_id = $this->_randomcode(10);

        		//Get a random activation code
            	$activation_code = $this->_randomcode(10);

			//Post values to array
			$data = array(
					'reg_id' 	    => $reg_id,
					'first_name' 	=> $this->input->post('first_name'),
					'last_name' 	=> $this->input->post('last_name'),
					'nickname' 		=> $this->input->post('nickname'),
					'email' 		=> $this->input->post('email'),
					'gender' 		=> $this->input->post('gender'),
					'birthdate' 	=> $this->input->post('birthdate'),
					'zipcode' 		=> $this->input->post('zipcode'),
					'activation_code' => $activation_code,
					'ip' 			=> $this->input->ip_address(),
					'password' 		=> md5($this->input->post('password'))
				);

			//print_r($reg_welcome_fields); //debug

			//Send input to model for insert
			 if($query = $this->User_model->create_member($data)){

			 	//Email functions
        		$email = $this->input->post('email');
        		//Load email class
        		$this->load->library('email');
            	//Get global site email
            	$this->email->from($this->from_email,$this->from_name);
            	$this->email->to($email);
            	$this->email->subject('Registration Confirmation');
            	$this->email->message('Please click the following link to activate your account '
                      . anchor(base_url().'user/register_confirm/' . $activation_code, 'Click Here'));

            	//Send email
                if (!$this->email->send()) { //If email did not send
                      //Create error
                      $this->session->set_flashdata('email_no_send', 'There was an issue with sending the activation email. Contact your administrator');
                     //Redirect to next step
                     redirect('register_optional?reg_id=' . urlencode($reg_id),'refresh');
                } else { //If email was sent
                      //Create message
                      $this->session->set_flashdata('email_yes_send', 'An activation link has been sent to your email. Please continue with registering and check it when you are done');
                      //Redirect to next step
			 		redirect('register_optional?reg_id=' . urlencode($reg_id),'refresh');
                }
                //Redirect to next step
			 	redirect('register_optional?reg_id=' . urlencode($reg_id),'refresh');
			 } else {
			 	$this->session->set_flashdata('no_register', 'There was an issue with your registration');
			 	redirect('user');
			 }
			
        }
	}

	/**
	 * Check to see if the nickname is taken
	 */
	 public function check_nickname_exists($nickname){
        $this->form_validation->set_message('check_nickname_exists','That nickname already exists. Please choose a different one');
       if($this->User_model->check_nickname_exists($nickname)){
           return false;
       } else {
           return true;
       }
    }
    
    /**
	 * Check to see if the email address is taken
	 */
     public function check_email_exists($email){
        $this->form_validation->set_message('check_email_exists','That email already exists. Please choose a different one');
       if($this->User_model->check_email_exists($email)){
           return false;
       } else {
           return true;
       }
    }

	/**
	 * Registration Page with optional fields
	 */
	public function register_optional(){
		//form validation
			$this->form_validation->set_rules('about_me','About Me','trim|xss_clean');
			$this->form_validation->set_rules('where_from','Where are you from','trim|xss_clean');
			$this->form_validation->set_rules('where_live','Where do you live','trim|xss_clean');
			$this->form_validation->set_rules('occupation','Occupation','trim|xss_clean');
			$this->form_validation->set_rules('website','Website','trim|xss_clean');
			$this->form_validation->set_rules('facebook','Facebook','trim|xss_clean');
			$this->form_validation->set_rules('twitter','Twitter','trim|xss_clean');
			$this->form_validation->set_rules('mobile_phone','Mobile Phone','trim|xss_clean');
			$this->form_validation->set_rules('hobbies','Hobbies','trim|xss_clean');
			$this->form_validation->set_rules('movies','Favorite Movies','trim|xss_clean');
			$this->form_validation->set_rules('music','Favorite Music','trim|xss_clean');

			if($this->form_validation->run() == FALSE){
        		//Views
        		$data['main_content'] = 'public/user/register_optional';
        		$this->load->view('public/layouts/main', $data);
        	} else {
        		//Get the registration id from hidden field
				$reg_id=  $this->input->post('reg_id');
				//Get user_id from reg_id in users table
        		$user_id = $this->User_model->get_user_id_from_reg($reg_id);

				//Post values to array
				$data = array(
					'reg_id' 			    => $this->input->post('reg_id'),
					'user_id' 			    => $user_id,
					'relationship_status' 	=> $this->input->post('relationship_status'),
					'about_me' 				=> $this->input->post('about_me'),
					'where_from' 			=> $this->input->post('where_from'),
					'where_live' 			=> $this->input->post('where_live'),
					'occupation' 			=> $this->input->post('occupation'),
					'website' 				=> $this->input->post('website'),
					'mobile_phone' 			=> $this->input->post('mobile_phone'),
					'facebook' 				=> $this->input->post('facebook'),
					'twitter' 				=> $this->input->post('twitter'),
					'hobbies' 				=> $this->input->post('hobbies'),
					'movies' 				=> $this->input->post('movies'),
					'music' 				=> $this->input->post('music')
				);
			//print_r($reg_optional_fields); //debug

			//Send input to model for insert
			 if($query = $this->User_model->create_member_profile($data)){
			 	//If it inserts, move to next step
			 	redirect('register_avatar?reg_id=' . urlencode($reg_id),'refresh');
			 } else {
			 	//If it doesnt insert
			 	$this->session->set_flashdata('no_register', 'There was an issue with your registration');
			 	redirect('register_optional?reg_id=' . urlencode($reg_id),'refresh');
			 }			
        }
	}

	/**
	 * Register avatar page
	 */
	public function register_avatar(){

		if($this->input->post('submit-next')){
			$reg_id = $this->input->post('reg_id');
			if($this->input->post('avatar_name')){
				$avatar_name = $this->input->post('avatar_name');
			} else {
				$avatar_name = "no-avatar.jpg";
			}

			$data = array('avatar' => $avatar_name);

			//Send input to model for insert
			 if($query = $this->User_model->insert_avatar($reg_id,$data)){
			 	//If it inserts, move to next step
			 	redirect('register_activation?reg_id=' . urlencode($reg_id),'refresh');
			 } else {
			 	//If it doesnt insert
			 	$this->session->set_flashdata('no_register', 'There was an issue with your registration');
			 	redirect('register_avatar?reg_id=' . urlencode($reg_id),'refresh');
			 }	
			
		}
		
		$data['main_content'] = 'public/user/register_avatar';
        $this->load->view('public/layouts/main', $data);
	}


	/**
	 * Upload the avatar
	 */
	public function upload_avatar(){
		//Get the registration id from hidden field
		$reg_id = $this->input->post('reg_id');

			$config['upload_path'] = './assets/images/avatars/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']	= '2048';
			$config['max_width']  = '1024';
			$config['max_height']  = '768';

			$this->load->library('upload', $config);

			//If it did not upload
			if ( ! $this->upload->do_upload()){
				
			    $errors = $this->upload->display_errors('<p class="error_big">');
				
				$avatar_name = 'noimage.jpg';
				$this->session->set_flashdata('avatar_errors', $errors);
        		redirect('register_avatar?reg_id=' . urlencode($reg_id),'refresh');
			}
			//If it did upload
			else {
				$avatar_name = $_FILES['userfile']['name'];
				$this->session->set_flashdata('avatar_name', $avatar_name);
				redirect('register_avatar?reg_id=' . urlencode($reg_id),'refresh');
			}

	}


	/**
	 * Display activation info
	 */
	public function register_activation(){
		$reg_id = $this->input->get('reg_id');
		$data['activate_email_address'] = $this->User_model->get_activate_email_address($reg_id);
		//Views
		$data['main_content'] = 'public/user/register_activation';
        $this->load->view('public/layouts/main', $data);
	}

	/**
	 * Confirm registration
	 */
	public function register_confirm(){
		//Get code fro url
		$activation_code = $this->uri->segment(3);
		if($activation_code == ''){
			$data['error'] = 'Sorry, there is no activation code';
		} else {
			$data = array('is_activated' => 1);
			if($this->User_model->confirm_code($activation_code,$data)){
				$data['success'] = 'Success! Your account is now activated and you may log in';
			} else {
				$data['error'] = 'Sorry, your activation did not match';
			}
		}

		//Views
		$data['main_content'] = 'public/user/activate';
        $this->load->view('public/layouts/main', $data);
	}


	/**
	 * User login
	 **/
	public function login(){
		 $this->form_validation->set_rules('email','Email','trim|required|valid_email|min_length[4]|xss_clean');
         $this->form_validation->set_rules('password','Password','trim|required|min_length[4]|xss_clean');
         
        if($this->form_validation->run() == FALSE){
            //Set error
            $this->session->set_flashdata('fail_login', 'Sorry, the login info that you entered is invalid');
            redirect();
        } else {
              //Get from post
               $email = $this->input->post('email');
               $password = $this->input->post('password');

               //Get user info from model
               $user_info = $this->User_model->login_user($email,$password);
               //Validate user
               if($user_info){
                   //Create array of user data
                   $user_data = array(
                       'user_id'  	=> $user_info->id,
                       'email'    	=> $user_info->email,
                       'nickname'  	=> $user_info->nickname,
                       'first_name' => $user_info->first_name,
                       'last_name'  => $user_info->last_name,
                       'logged_in' 	=> true
                   );
                  
                    //Set session userdata
                   $this->session->set_userdata($user_data);
                   
                   //Set message
                   $this->session->set_flashdata('pass_login', 'You are now logged in');
                   redirect('main');
               } else {
                    //Set error
                   $this->session->set_flashdata('fail_login', 'Sorry, the login info that you entered is invalid');
                   redirect('user');
               }
                   
               //Set message
               $this->session->set_flashdata('logged_in', 'You are now logged in');
               redirect('index.php');
               
          }
	}

    /**
	 * Kills session and logs user out
	 */
	public function logout(){
        //Unset user data
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('nickname');
        $this->session->unset_userdata('first_name');
        $this->session->unset_userdata('last_name');
        $this->session->sess_destroy();
        
         //Set message
        $this->session->set_flashdata('logged_out', 'You have been logged out');
        redirect('user');
    }

    public function display_avatar_with_logout(){
    	$data['avatar'] = 'this is a test';

    }


	/**
	 * get a random code of desired length
	 */
	 private function _randomcode($length) {
        $len = $length;
        $base = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz123456789";
        $max = strlen($base) - 1;
        $randomcode = '';
        mt_srand((double) microtime() * 1000000);

        while (strlen($randomcode) < $len + 1) {
            $randomcode.=$base[mt_rand(0, $max)];
        }

            return $randomcode;
    }
}