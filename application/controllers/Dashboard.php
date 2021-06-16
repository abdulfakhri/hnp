<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Student extends CI_Controller {

	public function __construct(){
        parent::__construct();
        check_login_user();
      
       $this->load->model('dashboard_model');
       
    }

     public function total_students_our_site(){ 
        
        $current_EmpId = $this->session->userdata('id');
        $data['users'] = $this->common_model->total_students_our_site();
        $data['main_content'] = $this->load->view('admin/student/total_student_our_site.php', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

}