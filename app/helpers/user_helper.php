<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
*	Gets user nickname
**/
function get_nickname_from_id($user_id){
	$CI =& get_instance();
	$CI->load->model('User_model');
	$nickname = $CI->User_model->get_nickname_from_id($user_id);
	return $nickname;
}