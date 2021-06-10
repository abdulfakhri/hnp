<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    //$isAdmin = false;
     


class Home extends CI_Controller {

	public function __construct(){
        parent::__construct();
        //check_login_user();
        $this->load->model('common_model');
    }
    
 

    public function index()

    {
       
        $data = array();
        $data['page_title'] = 'Home';
        $data['count'] = $this->common_model->get_user_total();
        $data['studentcount'] = $this->common_model->get_students_total();
        
        if ($this->session->userdata('role') == 'admin'){
            $isAdmin = true;
            
            $data['main_content'] = $this->load->view('admin/home_view', $data, TRUE);
            
        }else{
        
            $data['login_id'] = $this->session->userdata('id');
            $data['main_content'] = $this->load->view('admin/emp_home_view', $data, TRUE);
            
        }
        
        //$this->load->view('admin/index', $data);
    }





}