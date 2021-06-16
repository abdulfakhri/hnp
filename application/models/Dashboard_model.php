<?php
class Common_model extends CI_Model {
   
   
   function __construct(){
   parent::__construct();
   $this->load->helper('url');  
   }
    
    
    function total_students_oursite(){
        $this->db->select('*');
        $this->db->from('students');
        $this->db->where('is_deleted IS NULL or is_deleted <> 1');
        $query = $this->db->get();
        $query = $query->result_array();  
        return $query;
    }
  
 
}