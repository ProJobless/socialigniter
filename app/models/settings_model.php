<?php
class Settings_model extends CI_Model{
   public function get_global_settings(){
        $query = $this->db->get('globals');
        $result = $query->result();
         return $result;
    }
    
    public function get_global_setting($key){
        $this->db->where('key', $key);
        $query = $this->db->get('globals');
         if ($query->num_rows() == 1) {
             return $query->row();
        } else {
            return FALSE;
        }
    }
 
     //Get main site name
    public function get_site_name(){
        $this->db->where('key','website_name');
        $query = $this->db->get('globals');
        return $query->row()->value;
    }
    
    
    public function get_logo(){
        $this->db->where('key','logo_image');
        $query = $this->db->get('globals');
        return $query->row()->value;
    }
    
    //Insert or update setting values
    public function update_settings($post_data){
        foreach($post_data as $key => $value){
            $this->db->where('key',$key);
            $this->db->set('value',$value);
            $this->db->update('globals');          
        }
    }
    
    //Get main site email
    public function get_site_email(){
        $this->db->where('key','site_email');
        $query = $this->db->get('globals');
        return $query->row()->value;
    }
   
}
