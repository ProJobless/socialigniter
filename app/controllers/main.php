<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends Public_Controller {
	public function __construct(){
		parent::__construct();

		//Validate user
        if($this->session->userdata('logged_in') != true){
        	//Set error
        	$this->session->set_flashdata('access_denied', 'Sorry, you must be logged in to access this area');
        	redirect(); 
        }
	}

	public function index(){
		$data['wall_posts'] = $this->Wall_model->get_published_wall_posts();
		$data['wall_post_comments'] = $this->Wall_model->get_published_wall_post_comments();
		$data['profiles'] = $this->Wall_model->get_all_profiles();
		
		$data['mod_right'] = 1; //Set right modules

		//Views
    	$data['main_content'] = 'public/main/index';
    	$this->load->view('public/layouts/main', $data);
	}

	public function add_wall_post(){
		$data = array(
                       'user_id'   => $this->input->post('user_id'),
                       'body'      => $this->input->post('post_body')
                      );
		 $this->Wall_model->add_wall_post($data);
		 redirect('main');
	}

	public function ajax_add_wall_post(){
		$user_id = $this->input->post('user_id');
        $post_body = $this->input->post('post_body');
		$this->Wall_model->ajax_add_wall_post($user_id,$post_body);

	}

	public function add_wall_post_comment(){
		 $data = array(
                            'post_id'   	=> $this->input->post('post_id'),
                            'user_id'  		=> $this->input->post('user_id'),
                            'comment_body'  => $this->input->post('comment_body')
                            );
		 $this->Wall_model->add_wall_post_comment($data);
		 redirect('main');
	}
}