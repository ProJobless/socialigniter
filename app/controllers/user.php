<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends Public_Controller {

	public function __construct(){
		parent::__construct();
	}

	/**
	 * Registration Page with steps
	 */
	public function register($step){
		if($step == 1){
			//Post values to array
			$data = array(
					'register_id' => $this->input->post('register_id'),
					'first_name' => $this->input->post('first_name'),
					'last_name' => $this->input->post('last_name'),
					'gender' => $this->input->post('gender'),
					'birthdate' => $this->input->post('birthdate'),
					'zipcode' => $this->input->post('zipcode'),
					'email' => $this->input->post('email'),
					'password' => $this->input->post('password'),
					'password2' => $this->input->post('password2')
				);

			//Send input to model
			$this->User_model->register1($data);

			$data['show_sidebar'] = FALSE;

			//Views
        	$data['main_content'] = 'public/user/register1';
        	$this->load->view('public/template', $data);
			
		} elseif($step == 2){
			//Send input to model
			$this->User_model->register2($data);

		} elseif($step == 3){
			//Send input to model
			$this->User_model->register3($data);
		}

	}
}