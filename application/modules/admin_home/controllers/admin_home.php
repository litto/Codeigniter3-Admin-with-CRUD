<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_home extends MX_Controller {

            public function __construct()
        {
                parent::__construct();
                $this->load->library('ion_auth');
                //$this->load->model('news/news_model');
                $this->load->helper('url_helper');
        }


     public function index()
        {
           
        $data['title'] = 'Admin Login';
        $data['user']='';
        $data['password']='';
        $data['saveLogin']='';

        $this->load->view('admin_template/login_header', $data);
        $this->load->view('admin_home/index', $data);
        $this->load->view('admin_template/login_footer');
        }



}

?>