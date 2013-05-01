<?php
//Profile Model
class Profile_model extends CI_Model{
	public function get_profile_fileds($user_id){
		$this->db->where('user_id',$user_id);
		$query = $this->db->get('profiles');
		return $query->result();
	}
}