<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends Public_Controller {

	public function __construct(){
		parent::__construct();
	}

	/**
	 * Welcome Page/Form
	 */
	public function index(){
		//Get random code for register_id
		$data['randomcode'] = $this->_randomcode(10);

        	//form validation
			$this->form_validation->set_rules('first_name','First Name','trim|required|xss_clean');
        	$this->form_validation->set_rules('last_name','Last Name','trim|required|xss_clean');
        	$this->form_validation->set_rules('email','Email','trim|required|valid_email|xss_clean');
        	$this->form_validation->set_rules('password','Password','trim|required|min_length[4]|max_length[50]|xss_clean');
        	$this->form_validation->set_rules('password2','Confirm Password','trim|required|matches[password]|xss_clean');

        	if($this->form_validation->run() == FALSE){
        		//Views
        		$data['main_content'] = 'public/user/welcome';
        		$this->load->view('public/layouts/welcome', $data);
        	} else {
			//Post values to array
			$reg_welcome_fields = array(
					'reg_id' 	    => $this->input->post('reg_id'),
					'first_name' 	=> $this->input->post('first_name'),
					'last_name' 	=> $this->input->post('last_name'),
					'gender' 		=> $this->input->post('gender'),
					'birthdate' 	=> $this->input->post('birthdate'),
					'zipcode' 		=> $this->input->post('zipcode'),
					'email' 		=> $this->input->post('email'),
					'password' 		=> md5($this->input->post('password'))
				);

			//print_r($reg_welcome_fields); //debug

			//Send input to model for insert
			//$this->User_model->register1($data);

			$data['show_sidebar'] = FALSE;

			$this->session->set_flashdata('reg_id', $this->input->post('reg_id'));

			redirect('register_optional','refresh');
        }
	}

	/**
	 * Registration Page with optional fields
	 */
	public function register_optional(){

		//form validation
			$this->form_validation->set_rules('about_me','About Me','trim|xss_clean|alpha_dash');
			$this->form_validation->set_rules('where_from','Where are you from','trim|xss_clean|alpha_dash');
			$this->form_validation->set_rules('where_live','Where do you live','trim|xss_clean|alpha_dash');
			$this->form_validation->set_rules('occupation','Occupation','trim|xss_clean|alpha_dash');
			$this->form_validation->set_rules('website','Website','trim|xss_clean');
			$this->form_validation->set_rules('facebook','Facebook','trim|xss_clean');
			$this->form_validation->set_rules('twitter','Twitter','trim|xss_clean');
			$this->form_validation->set_rules('mobile_phone','Mobile Phone','trim|xss_clean|alpha_dash');
			$this->form_validation->set_rules('hobbies','Hobbies','trim|xss_clean|alpha_dash');
			$this->form_validation->set_rules('movies','Favorite Movies','trim|xss_clean|alpha_dash');
			$this->form_validation->set_rules('music','Favorite Music','trim|xss_clean|alpha_dash');

			if($this->form_validation->run() == FALSE){
        		//Views
        		$data['main_content'] = 'public/user/register_optional';
        		$this->load->view('public/layouts/main', $data);
        	} else {
			//Post values to array
			$reg_optional_fields = array(
					'reg_id' 			    => $this->input->post('reg_id'),
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

			//Send input to model
			//$this->User_model->register2($data);

			redirect('register_invite','refresh');			
        }
	}

	/**
	 * Options to invite friends
	 */
	public function register_invite(){
		//Views
        $data['main_content'] = 'public/user/register_invite';
        $this->load->view('public/layouts/main', $data);
	}

	/**
	 * Display activation info
	 */
	public function register_activation(){

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