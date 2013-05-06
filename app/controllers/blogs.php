<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blogs extends Public_Controller {
    public function __construct() {
        parent::__construct();
        
        //Validate User
	$this->validate_user();
    }
    
    public function index(){
        
        $data['mod_right'] = 1; //Set right modules
        $data['page_modules'] = $this->Module_model->get_page_modules('blogs');//Get page modules
        
        //Views
        $data['main_content'] = 'public/blogs/index';
        $this->load->view('public/layouts/main', $data);
    }
    
    public function posts(){
        $data['posts'] = $this->Blog_model->get_published_blog_posts();
        $data['authors'] = $this->User_model->get_users();
        
        $data['mod_right'] = 1; //Set right modules
        $data['page_modules'] = $this->Module_model->get_page_modules('blogs');//Get page modules
        
        //Views
        $data['main_content'] = 'public/blogs/posts';
        $this->load->view('public/layouts/main', $data);
    }
    
    
    public function category($category){
        $category_id     = $this->Blog_model->get_id_from_name($category);
        $data['posts']   = $this->Blog_model->get_published_blog_posts($category_id);
        $data['authors'] = $this->User_model->get_users();
        
        $data['mod_right'] = 1; //Set right modules
        $data['page_modules'] = $this->Module_model->get_page_modules('blogs');//Get page modules
        
        //Views
        $data['main_content'] = 'public/blogs/posts';
        $this->load->view('public/layouts/main', $data);
    }
    
    
     public function post($post_id){ 
         if($this->Blog_model->get_post($post_id) == FALSE){
             show_error('Sorry, that is an invalid id');
         }
        $data['post']     = $this->Blog_model->get_post($post_id);
        $data['comments'] = $this->Blog_model->get_comments($post_id);

        $data['mod_right']    = 1; //Set right modules
        $data['page_modules'] = $this->Module_model->get_page_modules('blogs');//Get page modules
        
        //Views
        $data['main_content'] = 'public/blogs/post';
        $this->load->view('public/layouts/main', $data);
    }
    
    public function add_comment($post_id){
        $user_id = $this->session->userdata('user_id');
        if(empty($user_id)){
            $user_id = 0;
        }
        $data = array(  'user_id'       => $user_id,
                        'post_id' 	=> $post_id,
                        'name' 	        => $this->input->post('name'),
			'email' 	=> $this->input->post('email'),
			'website' 	=> $this->input->post('website'),
			'comment'      => $this->input->post('comment')
                      );
        if($this->Blog_model->add_comment($data)){
            //Create message
            $this->session->set_flashdata('comment_added', 'Your comment has been added and will be moderated');
            redirect('blogs/post/'.$post_id.'#comment-form');
        }
    }
    
    public function new_post($user_id){
        
    }
    
    public function create_post($user_id){
        
    }
}