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