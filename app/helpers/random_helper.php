<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
*	Gets a users age from their birthday
**/
function get_age($dob){
	$dob = strtotime(str_replace("/","-",$dob));       
	$tdate = time();

	$age = 0;
	while( $tdate > $dob = strtotime('+1 year', $dob)){
    	++$age;
	}
	return $age;
}