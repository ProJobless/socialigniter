<?php
class Module_model extends CI_Model{
    
    //Get Published modules
    public function get_modules(){
        $this->db->order_by('order');
        $this->db->where('is_published', 1); 
        $query = $this->db->get('modules');
        return $query->result();
    }
    
    //Get module by id
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
    
    //Get module by page
    public function get_page_modules($page){
        $this->db->select('module_id');
        $this->db->where('page',$page);
        $query = $this->db->get('modules_to_pages');
        return $query->result();
    }
    
    //Get pages to modules relationships
    public function get_modules_to_pages(){
        $query = $this->db->get('modules_to_pages');
        return $query->result();
    }


}