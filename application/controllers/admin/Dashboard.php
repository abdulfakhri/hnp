<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    $isAdmin = false;
     


class Dashboard extends CI_Controller {

	public function __construct(){
        parent::__construct();
        check_login_user();
        $this->load->model('common_model');
       $this->load->model('dashboard_model');
    }
    
  


    public function index()

    {
        $finalStudentStatus = array();
         foreach ($this->common_model->all_studentStatus() as $key => $value) {
            $finalStudentStatus[$value['student_id']]['db_id'] = $value['id']; 
            // $finalStudentStatus[$value['student_id']]['Status'] = $value['student_status']; 
            $finalStudentStatus[$value['student_id']]['Status'] = ucwords(implode(' ',explode("_",$value['student_status']))); 
            $finalStudentStatus[$value['student_id']]['formData'] = $value['formData']; 
        }



        $data = array();
        $data['page_title'] = 'Dashboard';
        $data['count'] = $this->common_model->get_user_total();
        $data['studentcount'] = $this->common_model->get_students_total();

        $data['studentStatus'] = $finalStudentStatus;
        $data['assigned_task'] = $this->common_model->get_assigned_students();

        $data['users'] = $this->common_model->get_all_students();
        $data['submitted_website'] = $this->common_model->get_Oursite_student_details('submitt');
        $data['pending_website'] = $this->common_model->get_Oursite_student_details();         
        
        $data['pending_by_college'] = $this->common_model->get_college_studentDetails('pending_by_college');  
        $data['defect_by_college'] = $this->common_model->get_college_studentDetails('defect_by_college');  
        $data['approved_by_college'] = $this->common_model->get_college_studentDetails('approved_by_college');  
        $data['college_reject'] = $this->common_model->get_college_studentDetails('college_reject'); 

        $data['defect_by_nsp'] = $this->common_model->get_college_studentDetails('defect_by_nsp');  
        $data['pending_by_nsp'] = $this->common_model->get_college_studentDetails('pending_by_nsp'); 
        $data['approved_by_nsp'] = $this->common_model->get_college_studentDetails('approved_by_nsp');  
        $data['nsp_reject'] = $this->common_model->get_college_studentDetails('nsp_reject');  

        $data['defect_by_our_site'] = $this->common_model->get_college_studentDetails('defect_by_our_site');  
        $data['pending_by_our_site'] = $this->common_model->get_college_studentDetails('pending_by_our_site'); 
        $data['approved_by_our_site'] = $this->common_model->get_college_studentDetails('approved_by_our_site');  
        $data['reject_by_our_site'] = $this->common_model->get_college_studentDetails('reject_by_our_site');
       
        

        if ($this->session->userdata('role') == 'admin'){
            $isAdmin = true;
            $data['main_content'] = $this->load->view('admin/home', $data, TRUE);
        }else{
            $data['login_id'] = $this->session->userdata('id');
            $data['main_content'] = $this->load->view('admin/emp_home', $data, TRUE);
        }
        $this->load->view('admin/index', $data);
    }


 
	 
    public function backup($fileName='db_backup.zip'){
        $this->load->dbutil();
        $backup =& $this->dbutil->backup();
        $this->load->helper('file');
        write_file(FCPATH.'/downloads/'.$fileName, $backup);
        $this->load->helper('download');
        force_download($fileName, $backup);
    }

    public function getLocationDetails()
    {
         $data = array(
            'user_ip' =>  $_POST['locationData']
        );
        $data = $this->security->xss_clean($data);
        $this->common_model->update($data, $_POST['emp_id'],'user');

    }
     public function resetStatus()
    {
        $this->common_model->truncateTable();
        redirect(base_url('admin/dashboard'));

    }
        public function toOtp()
    {
       // $this->common_model->truncateTable();
        //$this->load->view('admin/home_view', $data);
        //redirect(base_url('admin/home_view'));
        
        if ($this->session->userdata('role') == 'admin'){
            
            $isAdmin = true;
            $this->load->view('admin/home_view', $data);
        }else{
            $data['login_id'] = $this->session->userdata('id');
            $this->load->view('admin/emp_home_view', $data);
        }

    }
    
    


}