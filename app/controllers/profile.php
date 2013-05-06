<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends Public_Controller {
	public function __construct(){
		parent::__construct();

		//Validate User
		$this->validate_user();
	}

	public function index(){
		$user_id = $this->session->userdata('user_id');
		$data['profile_fields'] = $this->Profile_model->get_profile_fileds($user_id);
		$data['user_fields'] = $this->User_model->get_user($user_id);
		$data['wall_posts'] = $this->Wall_model->get_published_wall_posts($user_id);
		$data['wall_post_comments'] = $this->Wall_model->get_published_wall_post_comments();
		$data['users'] = $this->User_model->get_users();

		$data['mod_right'] = 1; //Set right modules

		//Views
                $data['main_content'] = 'public/profile/index';
                $this->load->view('public/layouts/main', $data);
	}

	public function view($nickname){
		if($nickname == $this->session->userdata('nickname')){
			redirect('profile');
		}
		$user_id = $this->User_model->get_id_from_nickname($nickname);
                if($user_id == FALSE){
                    show_error('Sorry, no profile');
                }
		$data['profile_fields'] = $this->Profile_model->get_profile_fileds($user_id);
		$data['user_fields'] = $this->User_model->get_user($user_id);
		$data['wall_posts'] = $this->Wall_model->get_published_wall_posts($user_id);
		$data['wall_post_comments'] = $this->Wall_model->get_published_wall_post_comments();
		$data['users'] = $this->User_model->get_users();
		$user_data = $this->User_model->get_user_data($user_id);

		foreach($user_data as $row) {
    		$udata = unserialize($row->user_data);
        	if($udata['user_id'] == $user_id && $udata['logged_in'] == 1){
        		$data['status'] = 'Online';
        	} else {
        		$data['status'] = '<span style="color:#666;">Offline</span>';
        	}
		}

		$data['mod_right'] = 1; //Set right modules

		//Views
        $data['main_content'] = 'public/profile/view';
        $this->load->view('public/layouts/main', $data);
	}
}