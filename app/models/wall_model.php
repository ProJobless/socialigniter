<?php
//User Model
class Wall_model extends CI_Model{

	public function get_published_wall_posts(){
		$this->db->select('*');
		$this->db->where('is_published',1);
		$this->db->from('users');
		$this->db->join('main_wall', 'users.id = main_wall.user_id','left');
		$this->db->group_by('main_wall.id'); 
		$this->db->order_by('main_wall.create_date','desc');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_published_wall_post_comments(){
		$this->db->select('*');
		$this->db->where('is_published',1);
		$this->db->from('users');
		$this->db->join('main_wall_comments', 'users.id = main_wall_comments.user_id','left');
		$this->db->group_by('main_wall_comments.id'); 
		$query = $this->db->get();
		return $query->result();
	}

	public function get_all_profiles(){
		$query = $this->db->get('profiles');
		return $query->result();
	}

	public function add_wall_post_comment($data){
		$insert = $this->db->insert('main_wall_comments', $data);
		return $insert;
	}

	public function ajax_add_wall_post($user_id,$post_body){
		$query = "INSERT INTO main_wall(user_id,body)
					VALUES(?,?)";
	     $this->db->query($query, array($user_id,$post_body));
	}

	public function add_wall_post($data){
		$insert = $this->db->insert('main_wall', $data);
		return $insert;
	}

}