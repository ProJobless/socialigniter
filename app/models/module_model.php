<?php
class Module_model extends CI_Model{
    
    //Get Published modules
    public function get_modules(){
        $this->db->order_by('order');
        $this->db->where('is_published', 1); 
        $query = $this->db->get('modules');
        return $query->result();
    }
    
    //Get module
    public function get_module($mod_id){
        $this->db->where('id', $mod_id);
        $query = $this->db->get('modules');
        return $query->row();
    }

    //Get ALL modules
    public function get_all_modules(){
        $this->db->order_by('order');
        $query = $this->db->get('modules');
        return $query->result();
    }


}