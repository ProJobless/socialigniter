<?php
//User Model
class User_model extends CI_Model{

	public function create_member($data){
		$insert = $this->db->insert('users', $data);
		return $insert;
	}

	public function create_member_profile($data){
		$insert = $this->db->insert('profiles', $data);
		return $insert;
	}

	public function get_user_id_from_reg($reg_id){
		$this->db->where('reg_id',$reg_id);
        $query = $this->db->get('users');
        return $query->row()->id;
	}

	 public function check_nickname_exists($nickname){
        $this->db->select('nickname');
        $this->db->where('nickname',$nickname);
        $result = $this->db->get('users');
        if($result->num_rows > 0){
                //It exists
                return true;
	} else {
                //It doesnt exist
                return false;
        }
    }
    
     public function check_email_exists($email){
        $this->db->select('email');
        $this->db->where('email',$email);
        $result = $this->db->get('users');
        if($result->num_rows > 0){
                //It exists
                return true;
	} else {
                //It doesnt exist
                return false;
        }
    }

   public function insert_avatar($reg_id,$data){
        $this->db->where('reg_id', $reg_id);
        $this->db->update('profiles', $data); 
        return true;
    }

    public function confirm_code($activation_code){
        $data = array();
        $this->db->select('id');
        $this->db->where('activation_code',$activation_code);
        $result = $this->db->get('users');
        if($result->num_rows() > 0){
            $data = array('is_activated' => 1);
            $this->db->where('activation_code',$activation_code);
            $this->db->update('users',$data);
            return true;
        } else {
            return false;
        }
    }

    public function get_activate_email_address($reg_id){
        $this->db->where('reg_id',$reg_id);
        $query = $this->db->get('users');
        return $query->row()->email;
    }

     public function login_user($email,$passowrd){
        //Secure password
        $enc_password = md5($passowrd);
        
        //Validate
        $this->db->where('email',$email);
        $this->db->where('password',$enc_password);
        $this->db->where('is_activated',1);
        
        $result = $this->db->get('users');
        if($result->num_rows() == 1){
            return $result->row();
        } else {
            return false;
        }
    }

    public function get_user_avatar($user_id){
        $this->db->select('avatar');
        $this->db->where('user_id',$user_id);
        $query = $this->db->get('profiles');
        return $query->row()->avatar;
    }
}