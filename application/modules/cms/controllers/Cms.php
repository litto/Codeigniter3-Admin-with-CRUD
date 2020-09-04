<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Cms extends MX_Controller {

        public function __construct()
   {    parent::__construct();
        $this->load->database();       
        $this->load->library(['ion_auth', 'form_validation','pagination']);
        $this->load->helper(['url', 'language','form']);
        $this->load->model('cms_model');
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
        $this->lang->load('auth');
    }
        public function _get_csrf_nonce()
    {
        $this->load->helper('string');
        $key = random_string('alnum', 8);
        $value = random_string('alnum', 20);
        $this->session->set_flashdata('csrfkey', $key);
        $this->session->set_flashdata('csrfvalue', $value);

        return [$key => $value];
    }

    /**
     * @return bool Whether the posted CSRF token matches
     */
    public function _valid_csrf_nonce(){
        $csrfkey = $this->input->post($this->session->flashdata('csrfkey'));
        if ($csrfkey && $csrfkey === $this->session->flashdata('csrfvalue'))
        {
            return TRUE;
        }
            return FALSE;
    }

        public function index()
        {
        $data['news'] = $this->news_model->get_news();
        $data['title'] = 'News archive';

        $this->load->view('templates/header', $data);
        $this->load->view('news/index', $data);
        $this->load->view('templates/footer');
        }

      



      public function admin_list()
       {


        if (!$this->ion_auth->logged_in())
        {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        }
        else if (!$this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
        {
            // redirect them to the home page because they must be an administrator to view this
            show_error('You must be an administrator to view this page.');
        }
        else
        {

          // Loading Libraries

      

            //unpublish Record

       if($this->input->post('unpublish')=='submitted')
       {
        $cnt    =   $this->input->post('count');
        $list   =   array();
       for($i=0;$i<$cnt;$i++){

        if(isset($_POST['chkId'.$i])){
            $list[] =   $this->input->post('chkId'.$i);
        }
         }
        if(count($list)>0){
       $this->cms_model->unpublish_records($list);
       $data['message']="Selected Items Unpublished";
       $this->session->set_flashdata('warning', 'Selected Items Unpublished');
        }else{
        $data['message']="No Items Selected";
        $this->session->set_flashdata('warning', 'No Items Selected');
        }   
       redirect('auth/cms/list', 'refresh');
       }

//publish records
       if($this->input->post('publish')=='submitted')
          {
        $cnt    =   $this->input->post('count');
        $list   =   array();
       for($i=0;$i<$cnt;$i++){

        if(isset($_POST['chkId'.$i])){
            $list[] =   $this->input->post('chkId'.$i);
        }
         }
        if(count($list)>0){

       $this->cms_model->publish_records($list);
       $data['message']="Selected Items Published";
        $this->session->set_flashdata('success', 'Selected Items Published');
        }else{
        $data['message']="No Items Selected";
         $this->session->set_flashdata('warning', 'No Items Selected');
        }   
       redirect('auth/cms/list', 'refresh');   
       }

//delete records
       if($this->input->post('delete')=='submitted')
         {
        $cnt    =   $this->input->post('count');
        $list   =   array();
       for($i=0;$i<$cnt;$i++){
        if(isset($_POST['chkId'.$i])){
            $list[] =   $this->input->post('chkId'.$i);
        }
         }
        if(count($list)>0){
       $this->cms_model->delete_records($list);
       $data['warning']="Selected Items Deleted";
       $this->session->set_flashdata('error', 'Selected Items Deleted');
        }else{
        $data['message']="No Items Selected";
        $this->session->set_flashdata('warning', 'No Items Selected');
        }   
       redirect('auth/cms/list', 'refresh');

       }

     if($this->input->post('updateOrder')=='submitted')
       {
        $cnt    =   $this->input->post('count');
        $list   =   array();
      $p  =   0;
    for($i=0;$i<$cnt;$i++){
        $list[$p][0]    =  $this->input->post('id'.$i);
        $list[$p][1]    =   $this->input->post('txtOrder'.$i);
        $p++;
         }
        if(count($list)>0){
       $this->cms_model->setorder_records($list);
       $data['message']="Selected Items Ordered";
       $this->session->set_flashdata('success', 'Selected Items Ordered');
        }else{
        $data['message']="No Items Selected";
        $this->session->set_flashdata('warning', 'No Items Selected');
        }   
       redirect('auth/cms/list', 'refresh');
       }

            $data['cms_model'] = $this->cms_model; 
            $data['currentpage']="page-content";
            $data['title'] = 'CMS Section';
            $data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
            $loggeduser = $this->ion_auth->user()->row();
            $data['user']=$loggeduser;
            //list the users
            //$data['users'] = $this->ion_auth->users()->result();
         
            $searchstring='';

            if($this->input->post('keyword')!=''){

            $keyword=$this->input->post('keyword');
            $searchstring .='&keyword=' . $keyword;

            }else if($this->input->get('keyword')!='')
            {
             $keyword=$this->input->get('keyword');
             $searchstring .='&keyword=' . $keyword;

            }else{
                $keyword='';
            }

                if($this->input->post('order')!=''){

            $order=$this->input->post('order');
            $searchstring .='&order=' . $order;

            }else if($this->input->get('order')!='')
            {
             $keyword=$this->input->get('order');
             $searchstring .='&order=' . $order;

            }else{
                $order='';
            }

            $searchparameters=array('keyword'=>$keyword);
    // Fetch Records 

          $data['urls']=base_url();
        
         if($this->input->get('per_page')!=''){
             $page=$this->input->get('per_page');
        
          }else{
         $page=0;

          }
         // $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
          $data['keyword']=$keyword;
          $order=2;
          $per_page_records=15; 
          
         $totalrecords= $this->cms_model->get_allrecords($searchparameters);
         $data['records']=$this->cms_model->get_records($per_page_records,$page,$searchparameters);
         $data['count']=count($totalrecords);
    //Pagination
    $config['base_url'] = $data['urls'].'/auth/cms/list';
    $config['suffix']=$searchstring;
    // configuring url to which page is located
    $config['total_rows'] = $data['count'];// total count of records fetched
    $config['per_page'] = $per_page_records; //count wanted per page
    $config["uri_segment"] = 2;         
    $config['first_url'] = $config['base_url'] .'?'. $config['suffix'];     
    $config['full_tag_open'] = "<ul class='pagination pull-right no-margin'>";
    $config['full_tag_close'] = '</ul>';
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li class="active"><a href="#">';
    $config['cur_tag_close'] = '</a></li>';
    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';
    $config['first_tag_open'] = '<li>';
    $config['first_tag_close'] = '</li>';
    $config['last_tag_open'] = '<li>';
    $config['last_tag_close'] = '</li>';
    $config['prev_link'] = '<i class="ace-icon fa fa-angle-double-left"></i>';
    $config['prev_tag_open'] = '<li class="prev">';
    $config['prev_tag_close'] = '</li>';
    $config['next_link'] = '<i class="ace-icon fa fa-angle-double-right"></i>';
    $config['next_tag_open'] = '<li class="next">';
    $config['next_tag_close'] = '</li>';
    $config['use_page_numbers'] = FALSE;
    $config['enable_query_strings'] = TRUE;
    $config['page_query_string'] = TRUE;
    $config['reuse_query_string'] = FALSE;
    $config['attributes'] = array('keyword' =>$keyword);
    $config['attributes']['rel'] = TRUE;

    $this->pagination->initialize($config);// initializing the configs 
    $data['pagelinks']= $this->pagination->create_links();//creating links
    

            
// Passing to Theme
        $mainheader=$this->load->view('admin_template/admin_mainheader', $data,true);
        $sidemenu = $this->load->view("admin_template/admin_sidebar" , $data , true);
        $topheader = $this->load->view("admin_template/admin_topbar" , $data , true);
        $messagebar = $this->load->view("admin_template/admin_message" , $data , true);
        $footer = $this->load->view("admin_template/admin_footer" , $data , true);
        $data['mainheader']=$mainheader;
        $data['sidemenu']=$sidemenu;
        $data['topheader']=$topheader;
        $data['footer']=$footer;
        $data['messagebar']=$messagebar;
        
        $this->load->view('cms/admin_list', $data);
        //$this->_render_page('auth' . DIRECTORY_SEPARATOR . 'dashboard', $this->data);

        }
    }


public function unpublish_record($id){

        if (!$this->ion_auth->logged_in())
        {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        }
        else if (!$this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
        {
            // redirect them to the home page because they must be an administrator to view this
            show_error('You must be an administrator to view this page.');
        }
        else
        {
      
        $data = array();
        $data = array('published' =>'0');

        $this->cms_model->update_record($id, $data);
         $this->session->set_flashdata('warning', 'Selected Items Unpublished');
        echo '<script type="text/javascript">location.reload();</script>';

        }   

}


public function publish_record($id){

        if (!$this->ion_auth->logged_in())
        {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        }
        else if (!$this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
        {
            // redirect them to the home page because they must be an administrator to view this
            show_error('You must be an administrator to view this page.');
        }
        else
        {
  
        $data = array();
        $data = array('published' =>'1');
      $this->session->set_flashdata('success', 'Selected Items Published');
        $this->cms_model->update_record($id, $data);
        echo '<script type="text/javascript">location.reload();</script>';

        }   

}

public function del_record($id){

        if (!$this->ion_auth->logged_in())
        {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        }
        else if (!$this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
        {
            // redirect them to the home page because they must be an administrator to view this
            show_error('You must be an administrator to view this page.');
        }
        else
        {
   
        $data = array();
        $this->cms_model->delete_record($id);
              $this->session->set_flashdata('success', 'Selected Items Deleted');
        echo '<script type="text/javascript">location.reload();</script>';

        }   

}


public function create()
{
  
   if (!$this->ion_auth->logged_in())
        {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        }
        else if (!$this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
        {
            // redirect them to the home page because they must be an administrator to view this
            show_error('You must be an administrator to view this page.');
        }
        else
        {
      
            $data['title'] = 'Create Page';
                // validate form input
        $this->form_validation->set_rules('txtMenuTitle', 'Title', 'trim|required');
        $this->form_validation->set_rules('txtParent', 'Parent', 'trim|required');
        $this->form_validation->set_rules('txtTitle', 'PageTitle', 'trim|required');
        $this->form_validation->set_rules('txtContent', 'Content', 'trim|required');
    if (isset($_POST) && !empty($_POST))
        {

      if ($this->_valid_csrf_nonce() === FALSE)
            {
                show_error($this->lang->line('error_csrf'));
            }      
    if ($this->form_validation->run() === TRUE)
        {
           
           $txtMenu        =   $this->input->post('txtMenuTitle');
           $txtParent      =   $this->input->post('txtParent');
           $txtTitle       =   $this->input->post('txtTitle');
           $txtContent     =   $this->input->post('txtContent');
           $seo_title      =   $this->input->post('seo_title');
           $seo_description=   $this->input->post('seo_description');
           $seo_keywords   =   $this->input->post('seo_keywords');
           $seo_slug       =   $this->input->post('seo_slug');
           $radPublish     =    1;
           $txtPosition    =    1;
            $imagename='';

           $config = array('upload_path' => "./uploads/",'allowed_types' => "gif|jpg|png|jpeg",'overwrite' => TRUE,'max_size' => "3048000",'remove_spaces'=>TRUE,'encrypt_name'=>TRUE);

          $this->load->library('upload', $config);
      
          if(!$this->upload->do_upload('txtFile')) 
          {
             $this->upload->display_errors(); 
          }
          else { 

        $fInfo = $this->upload->data(); //uploading
         $imagename=$fInfo['file_name'];
          }

        $level  =  $this->cms_model->getLevl($txtParent);
        $order  =  $this->cms_model->getNextOrder($txtParent);
        $txtContent1=addslashes($txtContent);
        $date_update=date("Y-m-d H:i:s");
        if($seo_slug!=''){
         $seo_slug = url_title($seo_slug, 'dash', TRUE);    
        }else{ 
        $seo_slug = url_title($txtMenu, 'dash', TRUE); 
        }
       

        $insertdata = array('order'=>$order,'level'=>$level,'parent'=>$txtParent,'published'=>$radPublish,'title'=>$txtMenu,'page_title'=>$txtTitle,'content'=>$txtContent1,'position'=>$txtPosition,'date_update'=>$date_update,'seo_title'=>$seo_title,'seo_description'=>$seo_description,'seo_keywords'=>$seo_keywords,'seo_slug'=>$seo_slug,'banner'=>$imagename);

                // check to see if we are updating the user
                if ($this->cms_model->insertrecord($insertdata))
                {
                    $lastid=$this->cms_model-> getlastinsertid();
                    $successmessage='Record Inserted successfuly with Id: '.$lastid;
                    // redirect them back to the admin page if admin, or to the base url if non admin
                    $this->session->set_flashdata('success', $successmessage);
                    redirect("auth/cms/list", 'refresh');

                }
                else
                {
                    // redirect them back to the admin page if admin, or to the base url if non admin
                    $this->session->set_flashdata('error', $this->cms_model->geterrormessages());
                    $this->redirectUser();

                }


        }//form submitted
    } //form valid
    

    $this->form_validation->set_value('txtMenuTitle');
     $data['txtMenuTitle']=$this->form_validation->set_value('txtMenuTitle');
    $this->form_validation->set_value('txtParent');
     $data['txtParent']=$this->form_validation->set_value('txtParent');
    $this->form_validation->set_value('txtTitle');
     $data['txtTitle']=$this->form_validation->set_value('txtTitle');
    $this->form_validation->set_value('txtContent');
     $data['txtContent']=$this->form_validation->set_value('txtContent');
    $this->form_validation->set_value('seo_title');
     $data['seo_title']=$this->form_validation->set_value('seo_title');
    $this->form_validation->set_value('seo_keywords');
     $data['seo_keywords']=$this->form_validation->set_value('seo_keywords');
    $this->form_validation->set_value('seo_slug');
     $data['seo_slug']=$this->form_validation->set_value('seo_slug');
    $this->form_validation->set_value('seo_description');
     $data['seo_description']=$this->form_validation->set_value('seo_description');
     $data['remainingtitlecount']='';
     $data['remainingdesccount']='';
      $data['parentList']=$this->cms_model->get_level_selection();
      $data['csrf'] = $this->_get_csrf_nonce();
      $data['currentpage']="edit_user";
      $data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
      $loggeduser = $this->ion_auth->user()->row();
      $data['user']=$loggeduser; 
        $mainheader=$this->load->view("admin_template/admin_mainheader",$data, true);
        $sidemenu = $this->load->view("admin_template/admin_sidebar" ,$data , true);
        $topheader = $this->load->view("admin_template/admin_topbar" ,$data , true);
        $footer = $this->load->view("admin_template/admin_footer" ,$data , true);
        $messagebar = $this->load->view("admin_template/admin_message" , $data , true);
        $data['mainheader']=$mainheader;
        $data['sidemenu']=$sidemenu;
        $data['topheader']=$topheader;
        $data['footer']=$footer;
        $data['messagebar']=$messagebar;
        $this->load->view("cms/create",$data);
        

    }//valid request form submit


}






    public function edit($id)
      {
        
       if (!$this->ion_auth->logged_in())
        {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        }
        else if (!$this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
        {
            // redirect them to the home page because they must be an administrator to view this
            show_error('You must be an administrator to view this page.');
        }
        else
        {

      
            $data['title'] = 'Edit Page';
                // validate form input
        $this->form_validation->set_rules('txtMenuTitle', 'Title', 'trim|required');
        $this->form_validation->set_rules('txtParent', 'Parent', 'trim|required');
        $this->form_validation->set_rules('txtTitle', 'PageTitle', 'trim|required');
        $this->form_validation->set_rules('txtContent', 'Content', 'trim|required');
        if (isset($_POST) && !empty($_POST))
        {

      if ($this->_valid_csrf_nonce() === FALSE || $id != $this->input->post('id'))
            {
                show_error($this->lang->line('error_csrf'));
            }      
    if ($this->form_validation->run() === TRUE)
        {
           
           $txtMenu        =   $this->input->post('txtMenuTitle');
           $txtParent      =   $this->input->post('txtParent');
           $txtTitle       =   $this->input->post('txtTitle');
           $txtContent     =   $this->input->post('txtContent');
           $seo_title      =   $this->input->post('seo_title');
           $seo_description=   $this->input->post('seo_description');
           $seo_keywords   =   $this->input->post('seo_keywords');
           $seo_slug       =   $this->input->post('seo_slug');
     

           $config = array('upload_path' => "./uploads/",'allowed_types' => "gif|jpg|png|jpeg",'overwrite' => TRUE,'max_size' => "3048000",'remove_spaces'=>TRUE,'encrypt_name'=>TRUE);

          $this->load->library('upload', $config);
      
          if(!$this->upload->do_upload('txtFile')) 
          {
             $this->upload->display_errors(); 
          }
          else { 

        $fInfo = $this->upload->data(); //uploading
         $imagename=$fInfo['file_name'];
         $upd=array('banner'=>$imagename);
         $this->cms_model->updaterecord($upd,$id);
          }
        $base=$this->cms_model->getdetails($id);
        $txtContent1=addslashes($txtContent);
        $date_update=date("Y-m-d H:i:s");
        if($seo_slug!=''){
         $seo_slug = url_title($seo_slug, 'dash', TRUE);    
        }else{ 
        $seo_slug = url_title($txtMenu, 'dash', TRUE); 
        }
       

        $updatedata = array('parent'=>$txtParent,'title'=>$txtMenu,'page_title'=>$txtTitle,'content'=>$txtContent1,'date_update'=>$date_update,'seo_title'=>$seo_title,'seo_description'=>$seo_description,'seo_keywords'=>$seo_keywords,'seo_slug'=>$seo_slug);

                // check to see if we are updating the user
                if ($this->cms_model->updaterecord($updatedata,$id))
                {
                
                if($base[0]["parent"]!=$txtParent){
                    $level  =  $this->cms_model->getLevl($txtParent);
                    $order  =  $this->cms_model->getNextOrder($txtParent);
              
                    $options=Array('order'=>$order,'level'=>$level);
                    $this->cms_model->updaterecord($options,$id);

                if($level!=1 && $base[0]["default"]==1){
                    
                    $options=Array('default'=>0);
                    $this->cms_model->updaterecord($options,$id);
                }
                
            }

                    $successmessage='Record Updated successfuly with Id: '.$id;
                    // redirect them back to the admin page if admin, or to the base url if non admin
                    $this->session->set_flashdata('success', $successmessage);
                    redirect("auth/cms/list", 'refresh');

                }
                else
                {
                    // redirect them back to the admin page if admin, or to the base url if non admin
                    $this->session->set_flashdata('error', $this->cms_model->geterrormessages());
                    $this->redirectUser();

                }


        }//form submitted
    } //form valid
    



        $data['record']=$this->cms_model->getdetails($id);
        
        $data['remainingtitlecount']='';
        $data['remainingdesccount']='';
        $data['parentList']=$this->cms_model->get_level_selection();
        $data['csrf'] = $this->_get_csrf_nonce();
        $data['currentpage']="edit_cms";
        $data['id']=$id;
        $data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
        $loggeduser = $this->ion_auth->user()->row();
        $data['user']=$loggeduser; 
        $mainheader=$this->load->view("admin_template/admin_mainheader",$data, true);
        $sidemenu = $this->load->view("admin_template/admin_sidebar" ,$data , true);
        $topheader = $this->load->view("admin_template/admin_topbar" ,$data , true);
        $footer = $this->load->view("admin_template/admin_footer" ,$data , true);
        $messagebar = $this->load->view("admin_template/admin_message" , $data , true);
        $data['mainheader']=$mainheader;
        $data['sidemenu']=$sidemenu;
        $data['topheader']=$topheader;
        $data['footer']=$footer;
        $data['messagebar']=$messagebar;
        $this->load->view("cms/edit",$data);
        




        }//valid request form submit    

     }






}







?>