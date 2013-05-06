<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blog_model extends CI_Model{
    public function get_blog_categories(){
        $query = $this->db->get('blog_categories');
        return $query->result();
    }
    
    public function get_id_from_name($category){
        //Format name for database
        $name = str_replace('_', ' & ', $category);
        $name = urldecode(ucwords($name));
        
        $this->db->select('id');
        $this->db->where('name',$name);
        $query = $this->db->get('blog_categories');
        return $query->row()->id;
    }
    
    public function get_published_blog_posts($category_id = null){
        $this->db->select('P.id AS post_id,P.title,P.create_date,P.body,
            U.id,U.first_name,U.last_name,U.nickname,U.avatar');
        if($category_id != null){
            $this->db->where('category_id',$category_id);
        }
        $this->db->from('blog_posts AS P');// I use aliasing make things joins easier
        $this->db->join('users AS U', 'P.user_id = U.id', 'LEFT');
        $query = $this->db->get();
        return $query->result();
    }
    
     public function get_post($post_id){
        $this->db->select('P.id AS post_id,P.title,P.create_date,P.body,
            U.id,U.first_name,U.last_name,U.nickname,U.avatar');
        $this->db->from('blog_posts AS P');// I use aliasing make things joins easier
        $this->db->join('users AS U', 'P.user_id = U.id', 'LEFT');
        $this->db->where('P.id',$post_id);
        $query = $this->db->get();
         if($query->num_rows() != 1){
            return FALSE;
        }
        return $query->row();
    }
    
    public function add_comment($data){
        $this->db->insert('blog_comments', $data);
        if($this->db->affected_rows() < 1){
            return false;
        }
        return true;
    }
    
    public function get_comments($post_id){
         $this->db->select('C.id AS comment_id,C.post_id,C.create_date,C.user_id,
             C.name,C.comment,C.website,U.id,U.first_name,U.last_name,U.nickname,U.avatar');
        $this->db->from('blog_comments AS C');// I use aliasing make things joins easier
        $this->db->join('users AS U', 'C.user_id = U.id', 'LEFT');
        $this->db->where('C.post_id', $post_id);
        $this->db->where('C.is_approved',1);
        $this->db->order_by('C.create_date','DESC');
        $query = $this->db->get();
        if($query->num_rows() < 1){
            return FALSE;
        }
        return $query->result();
    }

}