<?php
//User Model
class Wall_model extends CI_Model{

	public function get_published_wall_posts($users_wall_id = 0){
		$this->db->select('*');
		$this->db->where('is_published',1);
		$this->db->where('users_wall_id',$users_wall_id);
		$this->db->from('users');
		$this->db->join('wall_posts', 'users.id = wall_posts.user_id','left');
		$this->db->group_by('wall_posts.id'); 
		$this->db->order_by('wall_posts.create_date','desc');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_published_wall_post_comments(){
		$this->db->select('*');
		$this->db->where('is_published',1);
		$this->db->from('users');
		$this->db->join('wall_comments', 'users.id = wall_comments.user_id','left');
		$this->db->group_by('wall_comments.id'); 
		$query = $this->db->get();
		return $query->result();
	}

	public function get_all_profiles(){
		$query = $this->db->get('profiles');
		return $query->result();
	}

	public function get_wall_post_comments($post_id){
		$this->db->where('post_id',$post_id);
		$query = $this->db->get('wall_comments');
		return $query->result();
	}

	public function add_wall_post($data){
		$insert = $this->db->insert('wall_posts', $data);
		return $insert;
	}

	public function add_wall_post_comment($data){
		$insert = $this->db->insert('wall_comments', $data);
		return $insert;
	}

	public function remove_wall_post($post_id){
		$this->db->where('id', $post_id);
		$this->db->delete('wall_posts'); 
		return;
	}

	public function remove_wall_post_comments($post_id){
		$this->db->where('post_id', $post_id);
		$this->db->delete('wall_comments'); 
		return;
	}


}