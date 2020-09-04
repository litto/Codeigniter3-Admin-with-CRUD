<?php
class Cms_model extends CI_model {
 
 protected $table = 'cms_pages';

        public function __construct()
        {
                $this->load->database();
        }



        public function get_records($limit,$start,$search) {
 
        if($search['keyword']!=''){
            $keyword=$search['keyword'];
            $this->db->like('title',$keyword);
            $this->db->or_like('page_title', $keyword);
            $this->db->or_like('seo_title', $keyword);
            $this->db->or_like('seo_keywords', $keyword);
        }

        $this->db->limit($limit, $start);
        $query = $this->db->get($this->table);
        return $query->result_array();
    }

        public function get_allrecords($search) {
    
        if($search['keyword']!=''){
            $keyword=$search['keyword'];
           $this->db->like('title',$keyword);
            $this->db->or_like('page_title', $keyword);
            $this->db->or_like('seo_title', $keyword);
            $this->db->or_like('seo_keywords', $keyword);
        }
        $query = $this->db->get($this->table);
        return $query->result_array();
    
    }


    public function update_record($id, $data) {
        $this->db->where('page_id', $id);
        $this->db->update($this->table, $data);
    }

    public function delete_record($id){
       $this->db->where('page_id', $id);
       $this->db->delete($this->table);
    }

    public  function unpublish_records($list){

       for($i=0;$i<count($list);$i++){
          $data = array('published' =>'0');
          $this->db->where('page_id', $list[$i]);
          $this->db->update($this->table, $data);

        }
    }

    public  function publish_records($list){

       for($i=0;$i<count($list);$i++){
          $data = array('published' =>'1');
          $this->db->where('page_id', $list[$i]);
          $this->db->update($this->table, $data);

        }
    }

    public  function delete_records($list){

       for($i=0;$i<count($list);$i++){
          $this->db->where('page_id', $list[$i]);
          $this->db->delete($this->table);

        }
    }

        public  function setorder_records($list){

       for($i=0;$i<count($list);$i++){
          $data = array('order' =>$list[$i][1]);
          $this->db->where('page_id', $list[$i][0]);
          $this->db->update($this->table, $data);

        }
    }

    public function geterrormessages(){
        return $this->db->getErrorMessage();
    }

    public function getlastinsertid(){
        return $this->db->insert_id();
    }

   public function get_level_selection()
        {
        $query = $this->db->get_where($this->table, array('level' => '1'));
         $rec=$query->result_array();
         $list      =   array();
         for($i=0;$i<count($rec);$i++){
            $list[$i]["id"] =   $rec[$i]['page_id'];
            $list[$i]["title"]  =   $rec[$i]['title'];
            
            $query1 = $this->db->get_where($this->table, array('level' => '2','parent'=>$rec[$i]['page_id']));
              $recc=$query->result_array(); 
           
            for($j=0;$j<count($recc);$j++){
                
                $list[$i]["items"][$j]['id']=$recc[$j]['page_id'];
                $list[$i]["items"][$j]['title']=$recc[$j]['title'];     

               $query2 = $this->db->get_where($this->table, array('level' => '3','parent'=>$recc[$i]['page_id']));
               $reccc=$query2->result_array();

                for($k=0;$k<count($reccc);$k++) {
                    $list[$i]["items"][$j]["items"][$k]['id']       =   $reccc[$k]['page_id'];
                    $list[$i]["items"][$j]["items"][$k]['title']    =   $reccc[$k]['title'];
                }
                unset($reccc);
                
            }
            unset($recc);
        
        }       
        unset($rec);        
        return $list;
       }


    function getLevl($id){
     
        if(empty($id)){
            return 1;
        }else{

            $query = $this->db->get_where($this->table, array('page_id' =>$id));
            $rec=$query->result_array();
            $level  =   $rec[0]['level'];
            return $level+1;
        }
    }

        function getNextOrder($parent){
       $this->db->select_max('order');
       $res1 = $this->db->get($this->table);
       $rec = $res1->result_array();

        if(count($rec)>0){
            return $rec[0]['order']+1;
        }else{
            return 1;
        }
    }

public function insertrecord($data)
{

    return $this->db->insert($this->table, $data);
}

   public function getdetails($id)
        {
        $query = $this->db->get_where($this->table, array('page_id' => $id));
        return $query->result_array();
       }

public function updaterecord($data,$id) {
    $this->db->where('page_id', $id);
    $this->db->update($this->table,$data);
    return true;
}



}

?>