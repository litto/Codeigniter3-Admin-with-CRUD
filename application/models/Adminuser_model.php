<?php

class Adminuser_model extends CI_Model {

    protected $table = 'users';

    public function __construct() {
        parent::__construct();
    }

    public function get_count() {
        return $this->db->count_all($this->table);
    }

    public function get_users($limit,$start,$search) {
 
        if($search['keyword']!=''){
            $keyword=$search['keyword'];
            $this->db->like('username',$keyword);
            $this->db->or_like('email', $keyword);
            $this->db->or_like('company', $keyword);
            $this->db->or_like('phone', $keyword);
            $this->db->or_like('first_name', $keyword);
            $this->db->or_like('last_name', $keyword);
        }

        $this->db->limit($limit, $start);
        $query = $this->db->get($this->table);
        return $query->result_array();
    }

        public function get_allusers($search) {
        

        if($search['keyword']!=''){
            $keyword=$search['keyword'];
            $this->db->like('username',$keyword);
            $this->db->or_like('email', $keyword);
            $this->db->or_like('company', $keyword);
            $this->db->or_like('phone', $keyword);
            $this->db->or_like('first_name', $keyword);
            $this->db->or_like('last_name', $keyword);
        }
        $query = $this->db->get($this->table);
        return $query->result_array();
    
    }


    public function update_record($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('users', $data);
    }

    public function delete_record($id){
       $this->db->where('id', $id);
       $this->db->delete('users');
    }

    public  function unpublish_records($list){

       for($i=0;$i<count($list);$i++){
          $data = array('active' =>'0');
          $this->db->where('id', $list[$i]);
          $this->db->update('users', $data);

        }
    }

    public  function publish_records($list){

       for($i=0;$i<count($list);$i++){
          $data = array('active' =>'1');
          $this->db->where('id', $list[$i]);
          $this->db->update('users', $data);

        }
    }

    public  function delete_records($list){

       for($i=0;$i<count($list);$i++){
          $this->db->where('id', $list[$i]);
          $this->db->delete('users');

        }
    }





}

?>