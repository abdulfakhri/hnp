
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Student extends CI_Controller {

	public function __construct(){
        parent::__construct();
        check_login_user();
       $this->load->model('common_model');
       $this->load->model('login_model');
        $this->load->model('dashboard_model');
    }
    

   
     public function total_students_our_site(){ 
         $finalStudentStatus = array();
        foreach ($this->common_model->all_studentStatus() as $key => $value) {
            $finalStudentStatus[$value['student_id']]['db_id'] = $value['id']; 
            // $finalStudentStatus[$value['student_id']]['Status'] = $value['student_status']; 
            $finalStudentStatus[$value['student_id']]['Status'] = ucwords(implode(' ',explode("_",$value['student_status']))); 
            $finalStudentStatus[$value['student_id']]['formData'] = $value['formData']; 
        }

        $current_EmpId = $this->session->userdata('id');
	 	$data['page_title'] = 'All Registered Students';
        $data['studentFilter'] = 'all';
        $data['users'] = $this->common_model->total_students_our_site();
         $data['studentStatus'] = $finalStudentStatus;
        $data['country'] = $this->common_model->select('country');
        $data['count'] = $this->common_model->get_user_total();
        $data['assignedTaskList'] =  $this->common_model->get_EmployeeWith_Allstudents($current_EmpId,'emp_task_assigned');
        $data['assignedTaskListPending'] =  $this->common_model->get_EmployeeWith_Allstudents_Pending($current_EmpId,'emp_task_assigned');
        $data['assignedTaskListComplete'] =  $this->common_model->get_EmployeeWith_Allstudents_Completed($current_EmpId,'emp_task_assigned');
        $data['main_content'] = $this->load->view('admin/student/total_student_our_site', $data, TRUE);
        $this->load->view('admin/index', $data);
    }
 




    
     public function all_student_list()
    { 
        $finalStudentStatus = array();
        foreach ($this->common_model->all_studentStatus() as $key => $value) {
            $finalStudentStatus[$value['student_id']]['db_id'] = $value['id']; 
            // $finalStudentStatus[$value['student_id']]['Status'] = $value['student_status']; 
            $finalStudentStatus[$value['student_id']]['Status'] = ucwords(implode(' ',explode("_",$value['student_status']))); 
            $finalStudentStatus[$value['student_id']]['formData'] = $value['formData']; 
        }
        $current_EmpId = $this->session->userdata('id');
	 	$data['page_title'] = 'All Registered Students';
        $data['studentFilter'] = 'all';
        $data['users'] = $this->common_model->get_all_students_bank_id();
        $data['studentStatus'] = $finalStudentStatus;
        $data['country'] = $this->common_model->select('country');
        $data['count'] = $this->common_model->get_user_total();
        $data['assignedTaskList'] =  $this->common_model->get_EmployeeWith_Allstudents($current_EmpId,'emp_task_assigned');
        $data['assignedTaskListPending'] =  $this->common_model->get_EmployeeWith_Allstudents_Pending($current_EmpId,'emp_task_assigned');
        $data['assignedTaskListComplete'] =  $this->common_model->get_EmployeeWith_Allstudents_Completed($current_EmpId,'emp_task_assigned');
        $data['main_content'] = $this->load->view('admin/student/all_student', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

   
    
    
    
  

    
   

   
  


}