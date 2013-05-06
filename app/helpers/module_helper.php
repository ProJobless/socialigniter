<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
*	Gets a users avatar - can be used in modules
**/
function user_avatar($user_id){
    $CI =& get_instance();
    $CI->load->model('User_model');
    $avatar = $CI->User_model->get_user_avatar($user_id);
    return $avatar;
}

/**
*	Get latest users
**/
function get_latest_users(){
    $CI =& get_instance();
    $CI->load->model('User_model');
    $users = $CI->User_model->get_users(20);
    return $users;
}

/**
*	Get blog categories
**/
function get_blog_categories(){
    $CI =& get_instance();
    $CI->load->model('Blog_model');
    $categories = $CI->Blog_model->get_blog_categories();
    return $categories;
}