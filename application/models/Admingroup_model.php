<?php

class Admingroup_model extends CI_Model {



    public function __construct() {
        parent::__construct();
    }

   public function get_users_groups($user)
        {
        $query = $this->db->get_where('users_groups', array('user_id' => $user));
         return $query->result_array();
       }


   public function get_groupdetails($groupid)
        {
        $query = $this->db->get_where('groups', array('id' => $groupid));
        return $query->row_array();
       }

             public function get_all()
        {
  
                $query = $this->db->get('groups');
                return $query->result_array();
      
       }  


}
?>