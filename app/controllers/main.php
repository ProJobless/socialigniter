<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends Public_Controller {
	public function __construct(){
		parent::__construct();

		//Validate User
		$this->validate_user();
	}

	public function index(){
		$data['wall_posts'] = $this->Wall_model->get_published_wall_posts();
		$data['wall_post_comments'] = $this->Wall_model->get_published_wall_post_comments();
		$data['users'] = $this->User_model->get_users();
		
		$data['mod_right'] = 1; //Set right modules
                $data['page_modules'] = $this->Module_model->get_page_modules('main');
   

		//Views
                $data['main_content'] = 'public/main/index';
                $this->load->view('public/layouts/main', $data);
	}


	public function add_wall_post($users_wall_id = null){
		//form validation
		$this->form_validation->set_rules('post_body','Post Body','trim|required|xss_clean');

		if($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('wall_error', 'You need to type something');
			redirect('main');
		} else {
			if($users_wall_id == null){
			$data = array(
                       'user_id'   => $this->input->post('user_id'),
                       'body'      => $this->input->post('post_body')
                      );
		 	$this->Wall_model->add_wall_post($data);
		    redirect('main');
		} else {
			$data = array(
					   'users_wall_id'  => $users_wall_id,
                       'user_id'   		=> $this->input->post('user_id'),
                       'body'      		=> $this->input->post('post_body')
                      );
		 	$this->Wall_model->add_wall_post($data);
		 	$nickname = $this->User_model->get_nickname_from_id($users_wall_id);
		 	redirect('profile/view/'.$nickname.'#speakbox');
		}
		}
		
	}


	public function add_wall_post_comment(){
		//form validation
		$this->form_validation->set_rules('comment_body','Comment Body','trim|required|xss_clean');
		if($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('wall_error', 'You need to type something');
			redirect('main');
		} else {
			$data = array(
                            'post_id'   	=> $this->input->post('post_id'),
                            'user_id'  		=> $this->input->post('user_id'),
                            'comment_body'  => $this->input->post('comment_body')
                            );
		 $this->Wall_model->add_wall_post_comment($data);
		 redirect('main#form-'.$this->input->post('post_id'));
		}
		 
	}


	public function remove_post($post_id,$user_id){
		if($user_id == $this->session->userdata('user_id')){
			$this->Wall_model->remove_wall_post_comments($post_id);
			$this->Wall_model->remove_wall_post($post_id);
			$this->session->set_flashdata('wall_post_removed', 'Your post was removed');
			redirect('main');
		}
	}

}