<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Student extends CI_Controller {

	public function __construct(){
        parent::__construct();
        check_login_user();
       $this->load->model('common_model');
       $this->load->model('login_model');
    }
    
   public function list_users(){
    $users = $this->common_model->getUsernames();

    $data['users'] = $users;

    $this->load->view('admin/student/user_view',$data);
    // $this->load->view('admin/index', $data);
   }
   
   
  
   public function userDetails(){
    // POST data
    $postData = $this->input->post();

    // get data
    $data = $this->common_model->getUserDetails($postData);

    echo json_encode($data);
    }


    public function createStudent()
    {
        $data = array();
        $data['page_title'] = 'Student';
        $data['country'] = $this->common_model->select('country');
        $data['power'] = $this->common_model->get_all_power('user_power');

       



        $data['main_content'] = $this->load->view('admin/student/add', $data, TRUE);
        $this->load->view('admin/index', $data);

    }
   public function addcollege()
    {
        $data = array();
        $data['page_title'] = 'New Employee';
        $data['country'] = $this->common_model->select('country');
        $data['power'] = $this->common_model->get_all_power('user_power');
        $data['main_content'] = $this->load->view('admin/student/college', $data, TRUE);
        $this->load->view('admin/index', $data);
       
    }
      public function colleges()
    {
	    $data['page_title'] = 'All Registered Colleges';
        $data['colleges'] = $this->common_model->get_all_college();
        $data['country'] = $this->common_model->select('country');
        $data['count'] = $this->common_model->get_college_total();
        $data['main_content'] = $this->load->view('admin/college/colleges', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

    //-- add new user by admin
     public function addc(){   

        if ($_POST) {

       
            $data = array(
             
                'name'=>$_POST['name'],
                'course_name'=>$_POST['course_name'],
                'country'=>$_POST['country'],
                'state'=>$_POST['state'],
                'caste'=>$_POST['caste'],
                'amount'=>$_POST['amount']
            );

      
                $data = $this->security->xss_clean($data);
                $student_id = $this->common_model->insert($data, 'colleges');
                $this->session->set_flashdata('msg', 'College added Successfully');
                redirect(base_url('admin/student/all_student_list'));
        
        }
    }
    //-- add new user by admin
    public function add()
    {   

        if ($_POST) {

            $bonafide = $this->common_model->upload_image(1020,'bonafide');
            $p_photo = $this->common_model->upload_image(1020,'p_photo');
            $prtc = $this->common_model->upload_image(1020,'prtc');
            $caste_certi = $this->common_model->upload_image(1020,'caste_certi');
            $ac_front = $this->common_model->upload_image(1020,'ac_front');
            $ac_back = $this->common_model->upload_image(1020,'ac_back');
            $income_certi = $this->common_model->upload_image(1020,'income_certi');

            /*
            $_POST['bonafide'] = site_url($bonafide['images']).','.site_url($bonafide['thumb']).','.site_url($bonafide['mainImg']);

            $_POST['p_photo'] = site_url($p_photo['images']).','.site_url($p_photo['thumb']).','.site_url($p_photo['mainImg']);

            $_POST['prtc'] = site_url($prtc['images']).','.site_url($prtc['thumb']).','.site_url($prtc['mainImg']);

            $_POST['caste_certi'] = site_url($caste_certi['images']).','.site_url($caste_certi['thumb']).','.site_url($caste_certi['mainImg']);

            $_POST['ac_front'] = site_url($ac_front['images']).','.site_url($ac_front['thumb']).','.site_url($ac_front['mainImg']);

            $_POST['ac_back'] = site_url($ac_back['images']).','.site_url($ac_back['thumb']).','.site_url($ac_back['mainImg']);
            
            $_POST['income_certi'] = site_url($income_certi['images']).','.site_url($income_certi['thumb']).','.site_url($income_certi['mainImg']);
          
            
            
                        
            $_POST['bonafide'] = ($bonafide['images']).','.($bonafide['thumb']).','.($bonafide['mainImg']);

            $_POST['p_photo'] = ($p_photo['images']).','.($p_photo['thumb']).','.($p_photo['mainImg']);

            $_POST['prtc'] = ($prtc['images']).','.($prtc['thumb']).','.($prtc['mainImg']);

            $_POST['caste_certi'] = ($caste_certi['images']).','.($caste_certi['thumb']).','.($caste_certi['mainImg']);

            $_POST['ac_front'] = ($ac_front['images']).','.($ac_front['thumb']).','.($ac_front['mainImg']);

            $_POST['ac_back'] = ($ac_back['images']).','.($ac_back['thumb']).','.($ac_back['mainImg']);
            
            $_POST['income_certi'] = ($income_certi['images']).','.($income_certi['thumb']).','.($income_certi['mainImg']);
             */
             
            /*
             $_POST['bonafide'] = $bonafide['images'];

            $_POST['p_photo'] = $p_photo['images'];

            $_POST['prtc'] = $prtc['images'];

            $_POST['caste_certi'] = $caste_certi['images'];

            $_POST['ac_front'] = $ac_front['images'];

            $_POST['ac_back'] =$ac_back['images'];
            
            $_POST['income_certi'] = $income_certi['images'];
            
            */
          
            $_POST['bonafide'] = $bonafide['mainImg'];

            $_POST['p_photo'] = $p_photo['mainImg'];

            $_POST['prtc'] = $prtc['mainImg'];

            $_POST['caste_certi'] = $caste_certi['mainImg'];

            $_POST['ac_front'] = $ac_front['mainImg'];

            $_POST['ac_back'] = $ac_back['mainImg'];
            
            $_POST['income_certi'] = $income_certi['mainImg'];
            
            //$serializedAdminFormData = serialize($_POST); 
            $data = array(
                
                'tr_number'=>$_POST['tr_number'],
                'trnumber'=>$_POST['tr_number'],
                'year'=>$_POST['year'],
                'bnk_acnt_number'=>$_POST['account_number'],
                'account_number'=>$_POST['account_number'],
                'caste_details'=>$_POST['caste_details'],
                 'createdAt'=>$_POST['createdAt'],
                 'state'=>$_POST['state'],
                 'mom_name'=>$_POST['mom_name'],
                 'dad_name'=>$_POST['dad_name'],
                 
                 'mobile'=>$_POST['mobile'],
                 'gender'=>$_POST['gender'],
                 'dob'=>$_POST['dob'],
             
             
                 'aadhar_number'=>$_POST['aadhar_number'],
                 'income_details'=>$_POST['income_details'],
                 
                 'sub_division'=>$_POST['sub_division'],
                 'district'=>$_POST['district'],
                 
                 'address1'=>$_POST['address1'],
                 'pin_code'=>$_POST['pin_code'],
             
                'ten_year'=>$_POST['ten_year'],
             
                'ten_marks'=>$_POST['ten_marks'],
                'plustwo_year'=>$_POST['plustwo_year'],
             
                
                'updatedAt'=>$_POST['updatedAt'],
                'createdAt'=>$_POST['createdAt'],
                
                 'uploadedBy'=>$_POST['uploadedBy'],
                'plustwo_marks'=>$_POST['plustwo_marks'],
                
                
             
                 'lastModifiedBy'=>$_POST['lastModifiedBy'],
                'updatedAt'=>$_POST['updatedAt'],
                
                 'course_details'=>$_POST['course_details'],
                'education_details'=>$_POST['education_details'],
             
             
                'scholarship_amount'=>$_POST['scholarship_amount'],
                'education_details_year'=>$_POST['education_details_year'],
                
                'full_name'=>$_POST['full_name'],
               
                'caste_details'=>$_POST['caste_details'],
                
                'income_certi'=>$_POST['income_certi'],
                'ac_front'=>$_POST['ac_front'],
                'ac_back'=>$_POST['ac_back'],
                
                'caste_certi'=>$_POST['caste_certi'],
                'prtc'=>$_POST['prtc'],
                
                
                'p_photo'=>$_POST['p_photo'],
                'bonafide'=>$_POST['bonafide'],
                
                'remarks'=>$_POST['remarks'],
                'agent_mobile'=>$_POST['agent_mobile'],
                
                'agent_name'=>$_POST['agent_name'],
                'bank_name'=>$_POST['bank_name'],
                
                'ifsc_code'=>$_POST['ifsc_code'],
                'bank_name'=>$_POST['bank_name']
            );

              //-- check duplicate trnumber
            $tr_numberCheck = $this->common_model->check_fields('tr_number',$_POST['tr_number']);
            $bnk_acnt_number_Check = $this->common_model->check_fields('bnk_acnt_number',$_POST['account_number']);

            // if (empty($tr_numberCheck) && empty($bnk_acnt_number_Check))  {

                $data = $this->security->xss_clean($data);
                $student_id = $this->common_model->insert($data, 'students');
                $this->session->set_flashdata('msg', 'Student added Successfully');
                redirect(base_url('admin/student/all_student_list'));
            /*
            }else {
                $this->session->set_flashdata('error_msg', 'TR number or Account Number already exist, try another!!!');
                redirect(base_url('admin/student'));
            }
            */
        }
    }

    public function all_user_list()
    {
	 	$data['page_title'] = 'All Registered Students';
        $data['users'] = $this->common_model->get_all_students();
        $data['country'] = $this->common_model->select('country');
        $data['count'] = $this->common_model->get_user_total();
        $data['main_content'] = $this->load->view('admin/student/all_student', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

    // all student view function

   // public function student_bank_verifiy($yr,$st,$caste){ 
    public function student_bank_verifiy(){ 
        //filter_year=2020&filter_state=Tripura&filter_cast=SC&filter_status=approve_by_our_site&filter=
        
        $yr=$_GET['filter_year'];
        $st=$_GET['filter_state'];
        $caste=$_GET['filter_caste'];
        $status=$_GET['filter_status'];

          //$st=$state;
            /////////////////////////////////////////////////////

            $finalStudentStatus = array();
            foreach ($this->common_model->all_studentStatus() as $key => $value) {
                $finalStudentStatus[$value['student_id']]['db_id'] = $value['id']; 
                $finalStudentStatus[$value['student_id']]['Status'] = $value['student_status']; 
                $finalStudentStatus[$value['student_id']]['Status'] = ucwords(implode(' ',explode("_",$value['student_status']))); 
                $finalStudentStatus[$value['student_id']]['formData'] = $value['formData']; 
            }
            $current_EmpId = $this->session->userdata('id');
            //$data['studentFilter'] = 'Tripura';
            $data['page_title'] = 'All Registered Students';
            $data['users'] = $this->common_model->get_all_students_bank_id($yr,$st,$caste,$status);
            $data['studentStatus'] = $finalStudentStatus;
            $data['country'] = $this->common_model->select('country');
            $data['count'] = $this->common_model->get_user_total();
            $data['assignedTaskList'] =  $this->common_model->get_EmployeeWith_Allstudents($current_EmpId,'emp_task_assigned');
            $data['main_content'] = $this->load->view('admin/student/all_student_bank', $data, TRUE);
            $this->load->view('admin/index', $data);

            /////////////////////////////////////////////////////////////

     
       
    }
    
     public function all_student_list()
    { 
        $finalStudentStatus = array();
        foreach ($this->common_model->all_studentStatus() as $key => $value) {
            $finalStudentStatus[$value['student_id']]['db_id'] = $value['id']; 
            $finalStudentStatus[$value['student_id']]['Status'] = $value['student_status']; 
            $finalStudentStatus[$value['student_id']]['Status'] = ucwords(implode(' ',explode("_",$value['student_status']))); 
            $finalStudentStatus[$value['student_id']]['formData'] = $value['formData']; 
        }
        $current_EmpId = $this->session->userdata('id');
	 	$data['page_title'] = 'All Registered Students';
        $data['studentFilter'] = 'all';
        $data['users'] = $this->common_model->get_all_students();
        $data['studentStatus'] = $finalStudentStatus;
        $data['country'] = $this->common_model->select('country');
        $data['count'] = $this->common_model->get_user_total();
        $data['assignedTaskList'] =  $this->common_model->get_EmployeeWith_Allstudents($current_EmpId,'emp_task_assigned');
        $data['assignedTaskListPending'] =  $this->common_model->get_EmployeeWith_Allstudents_Pending($current_EmpId,'emp_task_assigned');
        $data['assignedTaskListComplete'] =  $this->common_model->get_EmployeeWith_Allstudents_Completed($current_EmpId,'emp_task_assigned');
        $data['main_content'] = $this->load->view('admin/student/all_student', $data, TRUE);
        $this->load->view('admin/index', $data);
    }
      public function  students_total_site()
    { 
        $finalStudentStatus = array();
        foreach ($this->common_model->all_studentStatus() as $key => $value) {
            $finalStudentStatus[$value['student_id']]['db_id'] = $value['id']; 
            $finalStudentStatus[$value['student_id']]['Status'] = $value['student_status']; 
            $finalStudentStatus[$value['student_id']]['Status'] = ucwords(implode(' ',explode("_",$value['student_status']))); 
            $finalStudentStatus[$value['student_id']]['formData'] = $value['formData']; 
        }
        $current_EmpId = $this->session->userdata('id');
	 	$data['page_title'] = 'All Registered Students';
        $data['studentFilter'] = 'all';
        $data['users'] = $this->common_model->students_total();
        $data['studentStatus'] = $finalStudentStatus;
        $data['country'] = $this->common_model->select('country');
        $data['count'] = $this->common_model->get_user_total();
        $data['assignedTaskList'] =  $this->common_model->get_EmployeeWith_Allstudents($current_EmpId,'emp_task_assigned');
        $data['assignedTaskListPending'] =  $this->common_model->get_EmployeeWith_Allstudents_Pending($current_EmpId,'emp_task_assigned');
        $data['assignedTaskListComplete'] =  $this->common_model->get_EmployeeWith_Allstudents_Completed($current_EmpId,'emp_task_assigned');
        $data['main_content'] = $this->load->view('admin/student/total_student_site', $data, TRUE);
        $this->load->view('admin/index', $data);
    }
    public function  approved_by_our_site(){ 
        $finalStudentStatus = array();
        foreach ($this->common_model->all_studentStatus() as $key => $value) {
            $finalStudentStatus[$value['student_id']]['db_id'] = $value['id']; 
            $finalStudentStatus[$value['student_id']]['Status'] = $value['student_status']; 
            $finalStudentStatus[$value['student_id']]['Status'] = ucwords(implode(' ',explode("_",$value['student_status']))); 
            $finalStudentStatus[$value['student_id']]['formData'] = $value['formData']; 
        }
        $current_EmpId = $this->session->userdata('id');
	 	$data['page_title'] = 'All Registered Students';
        $data['studentFilter'] = 'all';
        $data['users'] = $this->common_model->approved_by_our_site();
        $data['studentStatus'] = $finalStudentStatus;
        $data['country'] = $this->common_model->select('country');
        $data['count'] = $this->common_model->get_user_total();
        $data['assignedTaskList'] =  $this->common_model->get_EmployeeWith_Allstudents($current_EmpId,'emp_task_assigned');
        $data['assignedTaskListPending'] =  $this->common_model->get_EmployeeWith_Allstudents_Pending($current_EmpId,'emp_task_assigned');
        $data['assignedTaskListComplete'] =  $this->common_model->get_EmployeeWith_Allstudents_Completed($current_EmpId,'emp_task_assigned');
        $data['main_content'] = $this->load->view('admin/student/approved_by_our_site', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

     public function  pending_by_our_site(){ 
        $finalStudentStatus = array();
        foreach ($this->common_model->all_studentStatus() as $key => $value) {
            $finalStudentStatus[$value['student_id']]['db_id'] = $value['id']; 
            $finalStudentStatus[$value['student_id']]['Status'] = $value['student_status']; 
            $finalStudentStatus[$value['student_id']]['Status'] = ucwords(implode(' ',explode("_",$value['student_status']))); 
            $finalStudentStatus[$value['student_id']]['formData'] = $value['formData']; 
        }
        $current_EmpId = $this->session->userdata('id');
	 	$data['page_title'] = 'All Registered Students';
        $data['studentFilter'] = 'all';
        $data['users'] = $this->common_model->pending_by_our_site();
        $data['studentStatus'] = $finalStudentStatus;
        $data['country'] = $this->common_model->select('country');
        $data['count'] = $this->common_model->get_user_total();
        $data['assignedTaskList'] =  $this->common_model->get_EmployeeWith_Allstudents($current_EmpId,'emp_task_assigned');
        $data['assignedTaskListPending'] =  $this->common_model->get_EmployeeWith_Allstudents_Pending($current_EmpId,'emp_task_assigned');
        $data['assignedTaskListComplete'] =  $this->common_model->get_EmployeeWith_Allstudents_Completed($current_EmpId,'emp_task_assigned');
        $data['main_content'] = $this->load->view('admin/student/pending_by_our_site', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

     public function  defect_by_our_site(){ 
        $finalStudentStatus = array();
        foreach ($this->common_model->all_studentStatus() as $key => $value) {
            $finalStudentStatus[$value['student_id']]['db_id'] = $value['id']; 
            $finalStudentStatus[$value['student_id']]['Status'] = $value['student_status']; 
            $finalStudentStatus[$value['student_id']]['Status'] = ucwords(implode(' ',explode("_",$value['student_status']))); 
            $finalStudentStatus[$value['student_id']]['formData'] = $value['formData']; 
        }
        $current_EmpId = $this->session->userdata('id');
	 	$data['page_title'] = 'All Registered Students';
        $data['studentFilter'] = 'all';
        $data['users'] = $this->common_model->defect_by_our_site();
        $data['studentStatus'] = $finalStudentStatus;
        $data['country'] = $this->common_model->select('country');
        $data['count'] = $this->common_model->get_user_total();
        $data['assignedTaskList'] =  $this->common_model->get_EmployeeWith_Allstudents($current_EmpId,'emp_task_assigned');
        $data['assignedTaskListPending'] =  $this->common_model->get_EmployeeWith_Allstudents_Pending($current_EmpId,'emp_task_assigned');
        $data['assignedTaskListComplete'] =  $this->common_model->get_EmployeeWith_Allstudents_Completed($current_EmpId,'emp_task_assigned');
        $data['main_content'] = $this->load->view('admin/student/defect_by_our_site', $data, TRUE);
        $this->load->view('admin/index', $data);
    }
    
    public function  reject_by_our_site(){ 
        $finalStudentStatus = array();
        foreach ($this->common_model->all_studentStatus() as $key => $value) {
            $finalStudentStatus[$value['student_id']]['db_id'] = $value['id']; 
            $finalStudentStatus[$value['student_id']]['Status'] = $value['student_status']; 
            $finalStudentStatus[$value['student_id']]['Status'] = ucwords(implode(' ',explode("_",$value['student_status']))); 
            $finalStudentStatus[$value['student_id']]['formData'] = $value['formData']; 
        }
        $current_EmpId = $this->session->userdata('id');
	 	$data['page_title'] = 'All Registered Students';
        $data['studentFilter'] = 'all';
        $data['users'] = $this->common_model->reject_by_our_site();
        $data['studentStatus'] = $finalStudentStatus;
        $data['country'] = $this->common_model->select('country');
        $data['count'] = $this->common_model->get_user_total();
        $data['assignedTaskList'] =  $this->common_model->get_EmployeeWith_Allstudents($current_EmpId,'emp_task_assigned');
        $data['assignedTaskListPending'] =  $this->common_model->get_EmployeeWith_Allstudents_Pending($current_EmpId,'emp_task_assigned');
        $data['assignedTaskListComplete'] =  $this->common_model->get_EmployeeWith_Allstudents_Completed($current_EmpId,'emp_task_assigned');
        $data['main_content'] = $this->load->view('admin/student/reject_by_our_site', $data, TRUE);
        $this->load->view('admin/index', $data);
    }





     public function  students_total_college_site()
    { 
        $finalStudentStatus = array();
        foreach ($this->common_model->all_studentStatus() as $key => $value) {
            $finalStudentStatus[$value['student_id']]['db_id'] = $value['id']; 
            $finalStudentStatus[$value['student_id']]['Status'] = $value['student_status']; 
            $finalStudentStatus[$value['student_id']]['Status'] = ucwords(implode(' ',explode("_",$value['student_status']))); 
            $finalStudentStatus[$value['student_id']]['formData'] = $value['formData']; 
        }
        $current_EmpId = $this->session->userdata('id');
	 	$data['page_title'] = 'All Registered Students';
        $data['studentFilter'] = 'all';
        $data['users'] = $this->common_model->students_total_college_site();
        $data['studentStatus'] = $finalStudentStatus;
        $data['country'] = $this->common_model->select('country');
        $data['count'] = $this->common_model->get_user_total();
        $data['assignedTaskList'] =  $this->common_model->get_EmployeeWith_Allstudents($current_EmpId,'emp_task_assigned');
        $data['assignedTaskListPending'] =  $this->common_model->get_EmployeeWith_Allstudents_Pending($current_EmpId,'emp_task_assigned');
        $data['assignedTaskListComplete'] =  $this->common_model->get_EmployeeWith_Allstudents_Completed($current_EmpId,'emp_task_assigned');
        $data['main_content'] = $this->load->view('admin/student/total_student_college_site', $data, TRUE);
        $this->load->view('admin/index', $data);
    }
    public function  approved_by_college_site(){ 
        $finalStudentStatus = array();
        foreach ($this->common_model->all_studentStatus() as $key => $value) {
            $finalStudentStatus[$value['student_id']]['db_id'] = $value['id']; 
            $finalStudentStatus[$value['student_id']]['Status'] = $value['student_status']; 
            $finalStudentStatus[$value['student_id']]['Status'] = ucwords(implode(' ',explode("_",$value['student_status']))); 
            $finalStudentStatus[$value['student_id']]['formData'] = $value['formData']; 
        }
        $current_EmpId = $this->session->userdata('id');
	 	$data['page_title'] = 'All Registered Students';
        $data['studentFilter'] = 'all';
        $data['users'] = $this->common_model->approved_by_college_site();
        $data['studentStatus'] = $finalStudentStatus;
        $data['country'] = $this->common_model->select('country');
        $data['count'] = $this->common_model->get_user_total();
        $data['assignedTaskList'] =  $this->common_model->get_EmployeeWith_Allstudents($current_EmpId,'emp_task_assigned');
        $data['assignedTaskListPending'] =  $this->common_model->get_EmployeeWith_Allstudents_Pending($current_EmpId,'emp_task_assigned');
        $data['assignedTaskListComplete'] =  $this->common_model->get_EmployeeWith_Allstudents_Completed($current_EmpId,'emp_task_assigned');
        $data['main_content'] = $this->load->view('admin/student/approved_by_college_site', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

     public function  pending_by_college_site(){ 
        $finalStudentStatus = array();
        foreach ($this->common_model->all_studentStatus() as $key => $value) {
            $finalStudentStatus[$value['student_id']]['db_id'] = $value['id']; 
            $finalStudentStatus[$value['student_id']]['Status'] = $value['student_status']; 
            $finalStudentStatus[$value['student_id']]['Status'] = ucwords(implode(' ',explode("_",$value['student_status']))); 
            $finalStudentStatus[$value['student_id']]['formData'] = $value['formData']; 
        }
        $current_EmpId = $this->session->userdata('id');
	 	$data['page_title'] = 'All Registered Students';
        $data['studentFilter'] = 'all';
        $data['users'] = $this->common_model->pending_by_college_site();
        $data['studentStatus'] = $finalStudentStatus;
        $data['country'] = $this->common_model->select('country');
        $data['count'] = $this->common_model->get_user_total();
        $data['assignedTaskList'] =  $this->common_model->get_EmployeeWith_Allstudents($current_EmpId,'emp_task_assigned');
        $data['assignedTaskListPending'] =  $this->common_model->get_EmployeeWith_Allstudents_Pending($current_EmpId,'emp_task_assigned');
        $data['assignedTaskListComplete'] =  $this->common_model->get_EmployeeWith_Allstudents_Completed($current_EmpId,'emp_task_assigned');
        $data['main_content'] = $this->load->view('admin/student/pending_by_college_site
        ', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

     public function  defect_by_college_site(){ 
        $finalStudentStatus = array();
        foreach ($this->common_model->all_studentStatus() as $key => $value) {
            $finalStudentStatus[$value['student_id']]['db_id'] = $value['id']; 
            $finalStudentStatus[$value['student_id']]['Status'] = $value['student_status']; 
            $finalStudentStatus[$value['student_id']]['Status'] = ucwords(implode(' ',explode("_",$value['student_status']))); 
            $finalStudentStatus[$value['student_id']]['formData'] = $value['formData']; 
        }
        $current_EmpId = $this->session->userdata('id');
	 	$data['page_title'] = 'All Registered Students';
        $data['studentFilter'] = 'all';
        $data['users'] = $this->common_model->defect_by_college_site();
        $data['studentStatus'] = $finalStudentStatus;
        $data['country'] = $this->common_model->select('country');
        $data['count'] = $this->common_model->get_user_total();
        $data['assignedTaskList'] =  $this->common_model->get_EmployeeWith_Allstudents($current_EmpId,'emp_task_assigned');
        $data['assignedTaskListPending'] =  $this->common_model->get_EmployeeWith_Allstudents_Pending($current_EmpId,'emp_task_assigned');
        $data['assignedTaskListComplete'] =  $this->common_model->get_EmployeeWith_Allstudents_Completed($current_EmpId,'emp_task_assigned');
        $data['main_content'] = $this->load->view('admin/student/defect_by_college_site', $data, TRUE);
        $this->load->view('admin/index', $data);
    }
    
    public function reject_by_college_site(){ 
        $finalStudentStatus = array();
        foreach ($this->common_model->all_studentStatus() as $key => $value) {
            $finalStudentStatus[$value['student_id']]['db_id'] = $value['id']; 
            $finalStudentStatus[$value['student_id']]['Status'] = $value['student_status']; 
            $finalStudentStatus[$value['student_id']]['Status'] = ucwords(implode(' ',explode("_",$value['student_status']))); 
            $finalStudentStatus[$value['student_id']]['formData'] = $value['formData']; 
        }
        $current_EmpId = $this->session->userdata('id');
	 	$data['page_title'] = 'All Registered Students';
        $data['studentFilter'] = 'all';
        $data['users'] = $this->common_model->reject_by_college_site();
        $data['studentStatus'] = $finalStudentStatus;
        $data['country'] = $this->common_model->select('country');
        $data['count'] = $this->common_model->get_user_total();
        $data['assignedTaskList'] =  $this->common_model->get_EmployeeWith_Allstudents($current_EmpId,'emp_task_assigned');
        $data['assignedTaskListPending'] =  $this->common_model->get_EmployeeWith_Allstudents_Pending($current_EmpId,'emp_task_assigned');
        $data['assignedTaskListComplete'] =  $this->common_model->get_EmployeeWith_Allstudents_Completed($current_EmpId,'emp_task_assigned');
        $data['main_content'] = $this->load->view('admin/student/reject_by_college_site', $data, TRUE);
        $this->load->view('admin/index', $data);
    }
     
     public function  students_total_nsp_site(){ 
        $finalStudentStatus = array();
        foreach ($this->common_model->all_studentStatus() as $key => $value) {
            $finalStudentStatus[$value['student_id']]['db_id'] = $value['id']; 
            $finalStudentStatus[$value['student_id']]['Status'] = $value['student_status']; 
            $finalStudentStatus[$value['student_id']]['Status'] = ucwords(implode(' ',explode("_",$value['student_status']))); 
            $finalStudentStatus[$value['student_id']]['formData'] = $value['formData']; 
        }
        $current_EmpId = $this->session->userdata('id');
	 	$data['page_title'] = 'All Registered Students';
        $data['studentFilter'] = 'all';
        $data['users'] = $this->common_model->students_total_nsp_site();
        $data['studentStatus'] = $finalStudentStatus;
        $data['country'] = $this->common_model->select('country');
        $data['count'] = $this->common_model->get_user_total();
        $data['assignedTaskList'] =  $this->common_model->get_EmployeeWith_Allstudents($current_EmpId,'emp_task_assigned');
        $data['assignedTaskListPending'] =  $this->common_model->get_EmployeeWith_Allstudents_Pending($current_EmpId,'emp_task_assigned');
        $data['assignedTaskListComplete'] =  $this->common_model->get_EmployeeWith_Allstudents_Completed($current_EmpId,'emp_task_assigned');
        $data['main_content'] = $this->load->view('admin/student/total_student_nsp_site', $data, TRUE);
        $this->load->view('admin/index', $data);
    }


    public function  approved_by_nsp_site(){ 
        $finalStudentStatus = array();
        foreach ($this->common_model->all_studentStatus() as $key => $value) {
            $finalStudentStatus[$value['student_id']]['db_id'] = $value['id']; 
            $finalStudentStatus[$value['student_id']]['Status'] = $value['student_status']; 
            $finalStudentStatus[$value['student_id']]['Status'] = ucwords(implode(' ',explode("_",$value['student_status']))); 
            $finalStudentStatus[$value['student_id']]['formData'] = $value['formData']; 
        }
        $current_EmpId = $this->session->userdata('id');
	 	$data['page_title'] = 'All Registered Students';
        $data['studentFilter'] = 'all';
        $data['users'] = $this->common_model->approved_by_nsp_site();
        $data['studentStatus'] = $finalStudentStatus;
        $data['country'] = $this->common_model->select('country');
        $data['count'] = $this->common_model->get_user_total();
        $data['assignedTaskList'] =  $this->common_model->get_EmployeeWith_Allstudents($current_EmpId,'emp_task_assigned');
        $data['assignedTaskListPending'] =  $this->common_model->get_EmployeeWith_Allstudents_Pending($current_EmpId,'emp_task_assigned');
        $data['assignedTaskListComplete'] =  $this->common_model->get_EmployeeWith_Allstudents_Completed($current_EmpId,'emp_task_assigned');
        $data['main_content'] = $this->load->view('admin/student/approved_by_nsp_site', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

     public function  pending_by_nsp_site(){ 
        $finalStudentStatus = array();
        foreach ($this->common_model->all_studentStatus() as $key => $value) {
            $finalStudentStatus[$value['student_id']]['db_id'] = $value['id']; 
            $finalStudentStatus[$value['student_id']]['Status'] = $value['student_status']; 
            $finalStudentStatus[$value['student_id']]['Status'] = ucwords(implode(' ',explode("_",$value['student_status']))); 
            $finalStudentStatus[$value['student_id']]['formData'] = $value['formData']; 
        }
        $current_EmpId = $this->session->userdata('id');
	 	$data['page_title'] = 'All Registered Students';
        $data['studentFilter'] = 'all';
        $data['users'] = $this->common_model->pending_by_nsp_site();
        $data['studentStatus'] = $finalStudentStatus;
        $data['country'] = $this->common_model->select('country');
        $data['count'] = $this->common_model->get_user_total();
        $data['assignedTaskList'] =  $this->common_model->get_EmployeeWith_Allstudents($current_EmpId,'emp_task_assigned');
        $data['assignedTaskListPending'] =  $this->common_model->get_EmployeeWith_Allstudents_Pending($current_EmpId,'emp_task_assigned');
        $data['assignedTaskListComplete'] =  $this->common_model->get_EmployeeWith_Allstudents_Completed($current_EmpId,'emp_task_assigned');
        $data['main_content'] = $this->load->view('admin/student/pending_by_nsp_site
        ', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

     public function  defect_by_nsp_site(){ 
        $finalStudentStatus = array();
        foreach ($this->common_model->all_studentStatus() as $key => $value) {
            $finalStudentStatus[$value['student_id']]['db_id'] = $value['id']; 
            $finalStudentStatus[$value['student_id']]['Status'] = $value['student_status']; 
            $finalStudentStatus[$value['student_id']]['Status'] = ucwords(implode(' ',explode("_",$value['student_status']))); 
            $finalStudentStatus[$value['student_id']]['formData'] = $value['formData']; 
        }
        $current_EmpId = $this->session->userdata('id');
	 	$data['page_title'] = 'All Registered Students';
        $data['studentFilter'] = 'all';
        $data['users'] = $this->common_model->defect_by_nsp_site();
        $data['studentStatus'] = $finalStudentStatus;
        $data['country'] = $this->common_model->select('country');
        $data['count'] = $this->common_model->get_user_total();
        $data['assignedTaskList'] =  $this->common_model->get_EmployeeWith_Allstudents($current_EmpId,'emp_task_assigned');
        $data['assignedTaskListPending'] =  $this->common_model->get_EmployeeWith_Allstudents_Pending($current_EmpId,'emp_task_assigned');
        $data['assignedTaskListComplete'] =  $this->common_model->get_EmployeeWith_Allstudents_Completed($current_EmpId,'emp_task_assigned');
        $data['main_content'] = $this->load->view('admin/student/defect_by_nsp_site', $data, TRUE);
        $this->load->view('admin/index', $data);
    }
    
    public function reject_by_nsp_site(){ 
        $finalStudentStatus = array();
        foreach ($this->common_model->all_studentStatus() as $key => $value) {
            $finalStudentStatus[$value['student_id']]['db_id'] = $value['id']; 
            $finalStudentStatus[$value['student_id']]['Status'] = $value['student_status']; 
            $finalStudentStatus[$value['student_id']]['Status'] = ucwords(implode(' ',explode("_",$value['student_status']))); 
            $finalStudentStatus[$value['student_id']]['formData'] = $value['formData']; 
        }
        $current_EmpId = $this->session->userdata('id');
	 	$data['page_title'] = 'All Registered Students';
        $data['studentFilter'] = 'all';
        $data['users'] = $this->common_model->reject_by_nsp_site();
        $data['studentStatus'] = $finalStudentStatus;
        $data['country'] = $this->common_model->select('country');
        $data['count'] = $this->common_model->get_user_total();
        $data['assignedTaskList'] =  $this->common_model->get_EmployeeWith_Allstudents($current_EmpId,'emp_task_assigned');
        $data['assignedTaskListPending'] =  $this->common_model->get_EmployeeWith_Allstudents_Pending($current_EmpId,'emp_task_assigned');
        $data['assignedTaskListComplete'] =  $this->common_model->get_EmployeeWith_Allstudents_Completed($current_EmpId,'emp_task_assigned');
        $data['main_content'] = $this->load->view('admin/student/reject_by_nsp_site', $data, TRUE);
        $this->load->view('admin/index', $data);
    }
  
    public function deleted_student_list(){ 
        $finalStudentStatus = array();
        foreach ($this->common_model->all_studentStatus() as $key => $value) {
            $finalStudentStatus[$value['student_id']]['db_id'] = $value['id']; 
            $finalStudentStatus[$value['student_id']]['Status'] = $value['student_status']; 
            $finalStudentStatus[$value['student_id']]['Status'] = ucwords(implode(' ',explode("_",$value['student_status']))); 
            $finalStudentStatus[$value['student_id']]['formData'] = $value['formData']; 
        }
        $current_EmpId = $this->session->userdata('id');
	 	$data['page_title'] = 'All Registered Students';
        $data['studentFilter'] = 'all';
        $data['users'] = $this->common_model->get_all_deleted_students();
        $data['studentStatus'] = $finalStudentStatus;
        $data['country'] = $this->common_model->select('country');
        $data['count'] = $this->common_model->get_user_total();
        $data['assignedTaskList'] =  $this->common_model->get_EmployeeWith_Allstudents($current_EmpId,'emp_task_assigned');
        $data['assignedTaskListPending'] =  $this->common_model->get_EmployeeWith_Allstudents_Pending($current_EmpId,'emp_task_assigned');
        $data['assignedTaskListComplete'] =  $this->common_model->get_EmployeeWith_Allstudents_Completed($current_EmpId,'emp_task_assigned');
        $data['main_content'] = $this->load->view('admin/student/all_student_delete', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

    public function all_student_up()
    { 
        $finalStudentStatus = array();
        foreach ($this->common_model->all_studentStatus() as $key => $value) {
            $finalStudentStatus[$value['student_id']]['db_id'] = $value['id']; 
            $finalStudentStatus[$value['student_id']]['Status'] = $value['student_status']; 
            $finalStudentStatus[$value['student_id']]['Status'] = ucwords(implode(' ',explode("_",$value['student_status']))); 
            $finalStudentStatus[$value['student_id']]['formData'] = $value['formData']; 
        }
        $current_EmpId = $this->session->userdata('id');
	 	$data['page_title'] = 'All Registered Students';
        $data['studentFilter'] = 'all';
        $data['users'] = $this->common_model->get_all_students();
        $data['studentStatus'] = $finalStudentStatus;
        $data['country'] = $this->common_model->select('country');
        $data['count'] = $this->common_model->get_user_total();
        $data['assignedTaskList'] =  $this->common_model->get_EmployeeWith_Allstudents($current_EmpId,'emp_task_assigned');
        $data['assignedTaskListPending'] =  $this->common_model->get_EmployeeWith_Allstudents_Pending($current_EmpId,'emp_task_assigned');
        $data['assignedTaskListComplete'] =  $this->common_model->get_EmployeeWith_Allstudents_Completed($current_EmpId,'emp_task_assigned');
        $data['main_content'] = $this->load->view('admin/student/all_student_up', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

    public function students_2020()
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
        $data['users'] = $this->common_model->students_2020();
        $data['studentStatus'] = $finalStudentStatus;
        $data['country'] = $this->common_model->select('country');
        $data['count'] = $this->common_model->get_user_total();
        $data['assignedTaskList'] =  $this->common_model->get_EmployeeWith_Allstudents($current_EmpId,'emp_task_assigned');
        $data['assignedTaskListPending'] =  $this->common_model->get_EmployeeWith_Allstudents_Pending($current_EmpId,'emp_task_assigned');
        $data['assignedTaskListComplete'] =  $this->common_model->get_EmployeeWith_Allstudents_Completed($current_EmpId,'emp_task_assigned');
        $data['main_content'] = $this->load->view('admin/student/students2020', $data, TRUE);
        $this->load->view('admin/index', $data);
    }
    public function students_tripura()
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
        $data['users'] = $this->common_model->students_tripura();
        $data['studentStatus'] = $finalStudentStatus;
        $data['country'] = $this->common_model->select('country');
        $data['count'] = $this->common_model->get_user_total();
        $data['assignedTaskList'] =  $this->common_model->get_EmployeeWith_Allstudents($current_EmpId,'emp_task_assigned');
        $data['assignedTaskListPending'] =  $this->common_model->get_EmployeeWith_Allstudents_Pending($current_EmpId,'emp_task_assigned');
        $data['assignedTaskListComplete'] =  $this->common_model->get_EmployeeWith_Allstudents_Completed($current_EmpId,'emp_task_assigned');
        $data['main_content'] = $this->load->view('admin/student/students_tripura', $data, TRUE);
        $this->load->view('admin/index', $data);
    }
    public function students_assam()
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
        $data['users'] = $this->common_model->students_assam();
        $data['studentStatus'] = $finalStudentStatus;
        $data['country'] = $this->common_model->select('country');
        $data['count'] = $this->common_model->get_user_total();
        $data['assignedTaskList'] =  $this->common_model->get_EmployeeWith_Allstudents($current_EmpId,'emp_task_assigned');
        $data['assignedTaskListPending'] =  $this->common_model->get_EmployeeWith_Allstudents_Pending($current_EmpId,'emp_task_assigned');
        $data['assignedTaskListComplete'] =  $this->common_model->get_EmployeeWith_Allstudents_Completed($current_EmpId,'emp_task_assigned');
        $data['main_content'] = $this->load->view('admin/student/students_assam', $data, TRUE);
        $this->load->view('admin/index', $data);
    }
    public function students_2022()
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
        $data['users'] = $this->common_model->students_2022();
        $data['studentStatus'] = $finalStudentStatus;
        $data['country'] = $this->common_model->select('country');
        $data['count'] = $this->common_model->get_user_total();
        $data['assignedTaskList'] =  $this->common_model->get_EmployeeWith_Allstudents($current_EmpId,'emp_task_assigned');
        $data['assignedTaskListPending'] =  $this->common_model->get_EmployeeWith_Allstudents_Pending($current_EmpId,'emp_task_assigned');
        $data['assignedTaskListComplete'] =  $this->common_model->get_EmployeeWith_Allstudents_Completed($current_EmpId,'emp_task_assigned');
        $data['main_content'] = $this->load->view('admin/student/students2020', $data, TRUE);
        $this->load->view('admin/index', $data);
    }
    public function students_pending()
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
        $data['users'] = $this->common_model->students_pending();
        $data['studentStatus'] = $finalStudentStatus;
        $data['country'] = $this->common_model->select('country');
        $data['count'] = $this->common_model->get_user_total();
        $data['assignedTaskList'] =  $this->common_model->get_EmployeeWith_Allstudents($current_EmpId,'emp_task_assigned');
        $data['assignedTaskListPending'] =  $this->common_model->get_EmployeeWith_Allstudents_Pending($current_EmpId,'emp_task_assigned');
        $data['assignedTaskListComplete'] =  $this->common_model->get_EmployeeWith_Allstudents_Completed($current_EmpId,'emp_task_assigned');
        $data['main_content'] = $this->load->view('admin/student/students_pending', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

    public function students_2021()
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
        $data['users'] = $this->common_model->students_2021();
        $data['studentStatus'] = $finalStudentStatus;
        $data['country'] = $this->common_model->select('country');
        $data['count'] = $this->common_model->get_user_total();
        $data['assignedTaskList'] =  $this->common_model->get_EmployeeWith_Allstudents($current_EmpId,'emp_task_assigned');
        $data['assignedTaskListPending'] =  $this->common_model->get_EmployeeWith_Allstudents_Pending($current_EmpId,'emp_task_assigned');
        $data['assignedTaskListComplete'] =  $this->common_model->get_EmployeeWith_Allstudents_Completed($current_EmpId,'emp_task_assigned');
        $data['main_content'] = $this->load->view('admin/student/students2021', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

    // all tripura student view function

    public function all_tripura_student_list()
    { 
        $finalStudentStatus = array();
        foreach ($this->common_model->all_studentStatus() as $key => $value) {
            $finalStudentStatus[$value['student_id']]['db_id'] = $value['id']; 
            // $finalStudentStatus[$value['student_id']]['Status'] = $value['student_status']; 
            $finalStudentStatus[$value['student_id']]['Status'] = ucwords(implode(' ',explode("_",$value['student_status']))); 
            $finalStudentStatus[$value['student_id']]['formData'] = $value['formData']; 
        }
        $current_EmpId = $this->session->userdata('id');
        $data['studentFilter'] = 'tripura';
        $data['page_title'] = 'All Registered Students';
        $data['users'] = $this->common_model->get_all_students();
        $data['studentStatus'] = $finalStudentStatus;
        $data['country'] = $this->common_model->select('country');
        $data['count'] = $this->common_model->get_user_total();
        $data['assignedTaskList'] =  $this->common_model->get_EmployeeWith_Allstudents($current_EmpId,'emp_task_assigned');
        $data['main_content'] = $this->load->view('admin/student/all_student', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

    // all student view function

    public function all_assam_student_list()
    { 
        $finalStudentStatus = array();
        foreach ($this->common_model->all_studentStatus() as $key => $value) {
            $finalStudentStatus[$value['student_id']]['db_id'] = $value['id']; 
            // $finalStudentStatus[$value['student_id']]['Status'] = $value['student_status']; 
            $finalStudentStatus[$value['student_id']]['Status'] = ucwords(implode(' ',explode("_",$value['student_status']))); 
            $finalStudentStatus[$value['student_id']]['formData'] = $value['formData']; 
        }
        $current_EmpId = $this->session->userdata('id');
        $data['studentFilter'] = 'assam';
        $data['page_title'] = 'All Registered Students';
        $data['users'] = $this->common_model->get_all_students();
        $data['studentStatus'] = $finalStudentStatus;
        $data['country'] = $this->common_model->select('country');
        $data['count'] = $this->common_model->get_user_total();
        $data['assignedTaskList'] =  $this->common_model->get_EmployeeWith_Allstudents($current_EmpId,'emp_task_assigned');
        $data['main_content'] = $this->load->view('admin/student/all_student', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

    // single student view function

    public function student_view_data($id)
    {   
        $statusOrig=$status = '';
        foreach ($this->common_model->single_studentStatus($id) as $statusValue) {
           
           $status = ucwords(implode(' ',explode("_",$statusValue['student_status']))); 
           $statusOrig = $statusValue['student_status'];
        }

	 	$data['page_title'] = 'Student Details';
        $data['user'] = $this->common_model->get_single_student_info($id);
        $data['currentStatus'] =   $status;   
        $data['originalStatus'] = $statusOrig;    
        $data['country'] = $this->common_model->select('country');
        $data['count'] = $this->common_model->get_user_total();
        $data['main_content'] = $this->load->view('admin/student/student_view', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

    //-- update users info
    public function update($id){

        if($_POST) {  

            // echo "<pre>";
            // print_r($_POST);
            // die;
            
            $bonafide = $this->common_model->upload_image(1020,'bonafide');
            $p_photo = $this->common_model->upload_image(1020,'p_photo');
            $prtc = $this->common_model->upload_image(1020,'prtc');
            $caste_certi = $this->common_model->upload_image(1020,'caste_certi');
            $ac_front = $this->common_model->upload_image(1020,'ac_front');
            $ac_back = $this->common_model->upload_image(1020,'ac_back');
            $income_certi = $this->common_model->upload_image(1020,'income_certi');

            /*
            $_POST['bonafide'] = (array_key_exists('msg', $bonafide) ? $_POST['hidden_bonfide'] :site_url($bonafide['images']).','.site_url($bonafide['thumb']).','.site_url($bonafide['mainImg']));

            $_POST['p_photo'] = (array_key_exists('msg', $p_photo) ? $_POST['hidden_p_photo'] :site_url($p_photo['images']).','.site_url($p_photo['thumb']).','.site_url($p_photo['mainImg']));

            $_POST['prtc'] = (array_key_exists('msg', $prtc) ? $_POST['hidden_prtc'] :site_url($prtc['images']).','.site_url($prtc['thumb']).','.site_url($prtc['mainImg']));

            $_POST['caste_certi'] = (array_key_exists('msg', $caste_certi) ? $_POST['hidden_caste_certi'] : site_url($caste_certi['images']).','.site_url($caste_certi['thumb']).','.site_url($caste_certi['mainImg']));

            $_POST['ac_front'] =  (array_key_exists('msg', $ac_front) ? $_POST['hidden_ac_front'] : site_url($ac_front['images']).','.site_url($ac_front['thumb']).','.site_url($ac_front['mainImg']));

            $_POST['ac_back'] = (array_key_exists('msg', $ac_back) ? $_POST['hidden_ac_back'] : site_url($ac_back['images']).','.site_url($ac_back['thumb']).','.site_url($ac_back['mainImg']));
            
            $_POST['income_certi'] = (array_key_exists('msg', $income_certi) ? $_POST['hidden_income_certi'] : site_url($income_certi['images']).','.site_url($income_certi['thumb']).','.site_url($income_certi['mainImg']));
            */
            
            
            
            
             $_POST['bonafide'] = (array_key_exists('msg', $bonafide) ? $_POST['hidden_bonfide'] :($bonafide['images']));

            $_POST['p_photo'] = (array_key_exists('msg', $p_photo) ? $_POST['hidden_p_photo'] :($bonafide['images']));

            $_POST['prtc'] = (array_key_exists('msg', $prtc) ? $_POST['hidden_prtc'] :($bonafide['images']));

            $_POST['caste_certi'] = (array_key_exists('msg', $caste_certi) ? $_POST['hidden_caste_certi'] :($bonafide['images']));

            $_POST['ac_front'] =  (array_key_exists('msg', $ac_front) ? $_POST['hidden_ac_front'] :($bonafide['images']));

            $_POST['ac_back'] = (array_key_exists('msg', $ac_back) ? $_POST['hidden_ac_back'] :($bonafide['images']));
            
            $_POST['income_certi'] = (array_key_exists('msg', $income_certi) ? $_POST['hidden_income_certi'] :($bonafide['images']));

              
            //$serializedAdminFormData = serialize($_POST); 
            $data = array(
                //'student_uploaded_data' => $serializedAdminFormData,
                
                 'tr_number'=>$_POST['tr_number'],
                'trnumber'=>$_POST['tr_number'],
                'bnk_acnt_number'=>$_POST['account_number'],
                'account_number'=>$_POST['account_number'],
                'caste_details'=>$_POST['caste_details'],
                 'createdAt'=>$_POST['createdAt'],
                 'state'=>$_POST['state'],
                 'mom_name'=>$_POST['mom_name'],
                 'dad_name'=>$_POST['dad_name'],
                 
                 'mobile'=>$_POST['mobile'],
                 'gender'=>$_POST['gender'],
                 'dob'=>$_POST['dob'],
             
             
                 'aadhar_number'=>$_POST['aadhar_number'],
                 'income_details'=>$_POST['income_details'],
                 
                 'sub_division'=>$_POST['sub_division'],
                 'district'=>$_POST['district'],
                 
                 'address1'=>$_POST['address1'],
                 'pin_code'=>$_POST['pin_code'],
             
                'ten_year'=>$_POST['ten_year'],
             
                'ten_marks'=>$_POST['ten_marks'],
                'plustwo_year'=>$_POST['plustwo_year'],
             
                
                'updatedAt'=>$_POST['updatedAt'],
                'createdAt'=>$_POST['createdAt'],
                
                 'uploadedBy'=>$_POST['uploadedBy'],
                'plustwo_marks'=>$_POST['plustwo_marks'],
                
                
             
                 'lastModifiedBy'=>$_POST['lastModifiedBy'],
                'updatedAt'=>$_POST['updatedAt'],
                
                 'course_details'=>$_POST['course_details'],
                'education_details'=>$_POST['education_details'],
             
             
                'scholarship_amount'=>$_POST['scholarship_amount'],
                'education_details_year'=>$_POST['education_details_year'],
                
                'full_name'=>$_POST['full_name'],
               
                'caste_details'=>$_POST['caste_details'],
                
                'income_certi'=>$_POST['income_certi'],
                'ac_front'=>$_POST['ac_front'],
                'ac_back'=>$_POST['ac_back'],
                
                'caste_certi'=>$_POST['caste_certi'],
                'prtc'=>$_POST['prtc'],
                
                
                'p_photo'=>$_POST['p_photo'],
                'bonafide'=>$_POST['bonafide'],
                
                'remarks'=>$_POST['remarks'],
                'agent_mobile'=>$_POST['agent_mobile'],
                
                'agent_name'=>$_POST['agent_name'],
                'bank_name'=>$_POST['bank_name'],
                
                'ifsc_code'=>$_POST['ifsc_code'],
                'bank_name'=>$_POST['bank_name']
                
                
            );
            
            //-- check duplicate trnumber
            $tr_numberCheck = $this->common_model->check_fields('tr_number',$_POST['tr_number']);
            $bnk_acnt_number_Check = $this->common_model->check_fields('bnk_acnt_number',$_POST['account_number']); 
            $dbValue = $this->common_model->get_single_student_info($id);                    

            if($_POST['tr_number'] == 'Pending' || $dbValue->tr_number == 'Pending'){

               $arr = array('student_id'=>$id);
                $tr_numberCheck[] = (object) $arr;
            }

             if($dbValue->bnk_acnt_number != $_POST['account_number'] && empty($bnk_acnt_number_Check)) {

               $arr = array('student_id'=>$id);
                $bnk_acnt_number_Check[] = (object) $arr;
            }

           

         //  if ((empty($tr_numberCheck) && empty($bnk_acnt_number_Check)) || ($tr_numberCheck[0]->student_id == $id && $bnk_acnt_number_Check[0]->student_id == $id))  {
                   // echo "<pre>";
                   // print_r($_POST);
                    if (array_key_exists('task_assign_statuss',$_POST)){
                        date_default_timezone_set('Aisa/Kolkata');
                        $taskStatus=array(
                            'task_status' => $_POST['task_assign_statuss'],
                            'complete_at' => date('y-m-d h:i:s'),
                        );
                        $this->common_model->emp_task_status_update($id,'emp_task_assigned',$taskStatus);
                        // die('xxxxx');
                    }

                    $modfiedHistory = array(
                        'student_id' => $id,
                        'emp_id' => $_POST['lastModifiedBy'],
                        'updated_at' => $_POST['updatedAt']
                    );
                    
                    $modfiedHistoryData = $this->security->xss_clean($modfiedHistory);
                    $modfiedHistoryData_id = $this->common_model->insert($modfiedHistoryData, 'student_modified_history');

                    $data = $this->security->xss_clean($data);
                    $this->common_model->edit_option($data, $id, 'students','stu');
                    $this->session->set_flashdata('msg', 'Information Updated Successfully');
                    redirect(base_url('admin/student/all_student_list'));
           // } else {
                    /*
                    $this->session->set_flashdata('error_msg', 'You are trying to set the duplicate values. Please Check it');
                        redirect(base_url('admin/student/update/'.$id));
                    */
             //   }

        }
         $statusOrig=$status = '';
        foreach ($this->common_model->single_studentStatus($id) as $statusValue) {
           
           $status = ucwords(implode(' ',explode("_",$statusValue['student_status_data']))); 
           $statusOrig = $statusValue['student_status'];
        }
		
        $data['userData'] = $this->common_model->get_single_student_info($id);        
        $data['user_role'] = $this->common_model->get_user_role($id);
        $data['assignedTaskList'] =  $this->common_model->getStudentTaskWithEmployee($id,'emp_task_assigned');
        $data['s_id'] = $id;
        $data['country'] = $this->common_model->select('country');
        $data['currentStatus'] =   $status;   
        $data['originalStatus'] = $statusOrig;  
        $data['main_content'] = $this->load->view('admin/student/edit_user', $data, TRUE);
		$data['page_title'] = 'Edit Users';
        $this->load->view('admin/index', $data);
        
    }
    public function stu_clone($id)
    {
        // echo "string";
        // print_r($id);
        // die;
        // echo "<pre>";
        // the array which value will default  or blank

        $defaultArray =  array('address1','address2','city','sub_division','district','pin_code','bank_name','ifsc_code','updatedAt','createdAt','uploadedBy','lastModifiedBy');

        $cloneStudent = $this->common_model->get_single_student_info($id);   
        
    /*
    $caste=$unserlizedData['caste_details'];
    $createdyear=$unserlizedData['createdAt'];
    $state=$unserlizedData['state'];
    $dad_name=$unserlizedData['dad_name'];
    $mom_name=$unserlizedData['mom_name'];
    $dob=$unserlizedData['dob'];
    $gender=$unserlizedData['gender'];
    $mobile=$unserlizedData['mobile'];
   */
  
         $data = array(
                 'caste_details'=>$cloneStudent->caste_details,
                 'createdAt'=>$cloneStudent->createdAt,
                 'state'=>$cloneStudent->state,
                 'mom_name'=>$cloneStudent->mom_name,
                 'dad_name'=>$cloneStudent->dad_name,
                 
                 'mobile'=>$cloneStudent->mobile,
                 'gender'=>$cloneStudent->gender,
             
             
                 'aadhar_number'=>$cloneStudent->aadhar_number,
                 'income_details'=>$cloneStudent->income_details,
                 
                 'sub_division'=>$cloneStudent->sub_division,
                 'district'=>$cloneStudent->district,
                 
                 'address1'=>$cloneStudent->address1,
                 'pin_code'=>$cloneStudent->pin_code,
             
                'ten_year'=>$cloneStudent->ten_year,
             
                'ten_marks'=>$cloneStudent->ten_marks,
                'plustwo_year'=>$cloneStudent->plustwo_year,
             
                
                'updatedAt'=>$cloneStudent->updatedAt,
                'createdAt'=>$cloneStudent->createdAt,
                
                 'uploadedBy'=>$cloneStudent->uploadedBy,
                'plustwo_marks'=>$cloneStudent->plustwo_marks,
                
                
             
                 'lastModifiedBy'=>$cloneStudent->lastModifiedBy,
                'updatedAt'=>$cloneStudent->updatedAt,
                
                 'course_details'=>$cloneStudent->course_details,
                'education_details'=>$cloneStudent->education_details,
             
             
                'scholarship_amount'=>$cloneStudent->scholarship_amount,
                'education_details_year'=>$cloneStudent->education_details_year,
                
                'full_name'=>$cloneStudent->full_name,
                'caste_details'=>$cloneStudent->caste_details,
                
                'income_certi'=>$cloneStudent->income_certi,
                'ac_front'=>$cloneStudent->ac_front,
                
                'caste_certi'=>$cloneStudent->caste_certi,
                'prtc'=>$cloneStudent->prtc,
                
                
                'p_photo'=>$cloneStudent->p_photo,
                'bonafide'=>$cloneStudent->bonafide,
                
                'remarks'=>$cloneStudent->remarks,
                'agent_mobile'=>$cloneStudent->agent_mobile,
                
                'agent_name'=>$cloneStudent->agent_name,
                'bank_name'=>$cloneStudent->bank_name,
                
                'ifsc_code'=>$cloneStudent->ifsc_code,
                'bank_name'=>$cloneStudent->bank_name,
                
                

            );

                $data = $this->security->xss_clean($data);
                $student_id = $this->common_model->insert($data, 'students');
                $this->session->set_flashdata('msg', 'Student Cloned Successfully');
                redirect(base_url('admin/student/all_student_list'));


         // print_r($data);
    }

    public function check_tr_bnk()
    {
       if((isset($_POST['pageType'])) && ($_POST['pageType'] == 'editSection' )) {


            if($_POST['sel_textBox_id'] == 'tr_number'){

                $tr_numberCheck = $this->common_model->check_fields('tr_number',$_POST['sel_value']);
                 if ((empty($tr_numberCheck)) || ($tr_numberCheck[0]->student_id == $_POST['stu_id']))  {
                   echo json_encode(array('ajax_msg' => 'OK'));
                 } else{
                    echo json_encode(array('ajax_msg' => 'TR number is Matched'));
                 }
            }

             if($_POST['sel_textBox_id'] == 'account_number'){

                $bnk_acnt_number_Check = $this->common_model->check_fields('bnk_acnt_number',$_POST['sel_value']);
                 if ((empty($bnk_acnt_number_Check)) || ($bnk_acnt_number_Check[0]->student_id == $_POST['stu_id']))  {
                  echo json_encode(array('ajax_msg' => 'OK'));
                 } else{
                    echo json_encode(array('ajax_msg' => 'Bank Account is Matched'));
                 }
            }
        }
        if((isset($_POST['pageType'])) && ($_POST['pageType'] == 'addSection')){

             if($_POST['sel_textBox_id'] == 'tr_number'){

                $tr_numberCheck = $this->common_model->check_fields('tr_number',$_POST['sel_value']);
                 if (empty($tr_numberCheck))  {
                   echo json_encode(array('ajax_msg' => 'OK'));
                 } else{
                    echo json_encode(array('ajax_msg' => 'TR number is Matched'));
                 }
            }

             if($_POST['sel_textBox_id'] == 'account_number'){

                $bnk_acnt_number_Check = $this->common_model->check_fields('bnk_acnt_number',$_POST['sel_value']);
                 if (empty($bnk_acnt_number_Check))  {
                  echo json_encode(array('ajax_msg' => 'OK'));
                 } else{
                    echo json_encode(array('ajax_msg' => 'Bank Account is Matched'));
                 }
            }
        }
    }

    // get emplyee name 

    public function getEmployeeName()
    {
        $emp_id = $_POST['emp_id'];
        $emp_name_aaray = (array)$this->common_model->get_single_user_name($emp_id);
        echo $emp_name_aaray['first_name']." ".$emp_name_aaray['last_name'];
    }

    // public function for setting the status 
    public function status()
    {
        if ($_POST) {
           
            $formKey = array_keys($_POST['formData']);
              $data = array(
                'student_id' => $_POST['student_id'],
                'student_status' =>$formKey[0],
                'formData' => serialize($_POST)
            );
        

        $checkStatusIdExist = $this->common_model->get_single_studentStatus_id($_POST['student_id']);
        
        if(empty($checkStatusIdExist)){

            $data = $this->security->xss_clean($data);
            $statusData = $this->common_model->insert($data, 'student_status_data');
        } else {

            $this->common_model->delete($checkStatusIdExist->id,'student_status_data'); 
            $statusData = $this->common_model->insert($data, 'student_status_data');
        }

        $this->session->set_flashdata('msg', 'Student is '.$_POST['student_status']);
        // redirect(base_url('admin/student/update/'.$_POST['student_id']));

        }
    }

    //-- bankdetails

    public function setBankDetails()
    {
        // echo "<pre>";
        // print_r($_POST);
        // // $pic_val= $_POST['debit_name'];
        // die;
        $newVal=$_POST['debit_card_name'];

       if($_POST) {
            $studId = $_POST['student_id'];
            $debit_pic="";
            if(array_key_exists('debit_card_name', $_POST)){
                if(array_key_exists('debit_status', $_POST))
                {
                    if(($_POST['debit_status']=='yes') || ($_POST['sec_debit_status']=='yes')){
                        $debit_pic = $this->common_model->upload_image(1020, $_POST['debit_card_name']);
                    }
                }else{
                    $debit_pic = $this->common_model->upload_image(1020, $_POST['debit_card_name']);
                }


            }else{
                $debit_pic = $this->common_model->upload_image(1020, $_POST['debit_card_name']);
            }

            if(empty($debit_pic) || array_key_exists('msg', $debit_pic)){
                $upload_pic=$_POST['savedDebit'];
                // echo "-----<br>";

            }else{

                $upload_pic=implode(", ",$debit_pic);
                // echo "++++++++++++++<br>";

            }

            if(is_array($upload_pic) || strpos($upload_pic, 'You did not select a file to upload.') == false){
                 $_POST[$newVal]=$upload_pic;
                 // echo "**************<br>";
            }
            
            // print_r($_POST);
            // die('xxxxx');
                $studentBankDetails_all = $this->common_model->get_single_student_info($_POST['student_id']);   
                $bank_StudentArray = array();
                $All_bank_StudentArray =  unserialize($studentBankDetails_all->student_uploaded_data);

                foreach ($All_bank_StudentArray as $stu_key => $stu_value) {
                    $bank_StudentArray[$stu_key] = $stu_value;
                    if($stu_key == 'account_number'){
                         $bank_StudentArray[$stu_key] = $_POST['account_number'];
                    }
                }
                 $stuBnk_data = array(
                        'student_uploaded_data' =>serialize($bank_StudentArray),
                        'tr_number'=>$studentBankDetails_all->tr_number,
                        'bnk_acnt_number'=>$_POST['account_number']
                    );


         
            $data = array(
                'student_id'=>$_POST['student_id'],
                'bank_id'=>serialize($_POST),
            );
       }
       // echo "<br>------------<br>";
       //      print_r($data);

       //      die;

       $checkBankIdExist = $this->common_model->get_single_bank_id($_POST['student_id']);


        $bnk_acnt_number_Check = $this->common_model->check_fields('bnk_acnt_number',$_POST['account_number']);
         if ((empty($bnk_acnt_number_Check)) || ($bnk_acnt_number_Check[0]->student_id == $_POST['student_id']))  {
            $checkBank = "KARTHIK";
         } else{

                $failBankStudent = $this->common_model->get_single_student_info($bnk_acnt_number_Check[0]->student_id);   
                $failBankStudent_array = array();
                $failBankStudent_all_array =  unserialize($failBankStudent->student_uploaded_data);

              $this->session->set_flashdata('error_msg', 'Bank Account is matching with '.$failBankStudent_all_array['first_name'].' '.$failBankStudent_all_array['last_name']);
          redirect(base_url('admin/student/getBankDetails'));
         }
     if($checkBank == 'KARTHIK'){
            if(empty($checkBankIdExist)){
                $statusData = $this->common_model->insert($data, 'student_bank_ids');
            } else{
                $this->common_model->delete($checkBankIdExist->id,'student_bank_ids'); 
                 $statusData = $this->common_model->insert($data, 'student_bank_ids');
             }
            $studentBnk_data = $this->security->xss_clean($stuBnk_data);
            $this->common_model->edit_option($studentBnk_data,$_POST['student_id'], 'student_data','stu');
           
            $this->session->set_flashdata('msg', 'Info is saved');
              redirect(base_url('admin/student/getBankDetails'));
          } else {
             $this->session->set_flashdata('msg', 'Please Check the bank account number');
              redirect(base_url('admin/student/getBankDetails'));
          }
       

    }

    public function getBankDetails()
    {
        $bankIds = $this->common_model->get_all_students_bank_ids();
        $finalBankIds = array();
        foreach ($bankIds as $key => $value) {
           $finalBankIds[$value['student_id']]['id']=$value['id'];
           $finalBankIds[$value['student_id']]['student_id']=$value['student_id'];
           $finalBankIds[$value['student_id']]['bank_id']=unserialize($value['bank_id']);
        }
        $data['page_title'] = "Add Student Bank Id's";
        $data['studentsData'] = $this->common_model->get_all_students();
        $data['studentsBankIds'] = $finalBankIds;
        $data['main_content'] = $this->load->view('admin/student/student_bank_ids', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

    /*
    //-- active user
    public function active($id) 
    {
        $data = array(
            'status' => 1
        );
        $data = $this->security->xss_clean($data);
        $this->common_model->update($data, $id,'student');
        $this->session->set_flashdata('msg', 'User active Successfully');
        redirect(base_url('admin/student/all_user_list'));
    }

    //-- deactive user
    public function deactive($id) 
    {
        $data = array(
            'status' => 0
        );
        $data = $this->security->xss_clean($data);
        $this->common_model->update($data, $id,'student');
        $this->session->set_flashdata('msg', 'User deactive Successfully');
        redirect(base_url('admin/student/all_user_list'));
    }
*/
    //-- delete user
    public function stu_delete($id)
    {
        // $this->common_model->delete($id,'student_data'); 
        $data = array(
            'is_deleted' => 1
        );
        $data = $this->security->xss_clean($data);
        $this->common_model->update_stu_task($data, $id,'students');
        $this->session->set_flashdata('msg', 'User deleted Successfully');
        redirect(base_url('admin/student/all_student_list'));
    }

    public function mine()
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
        $data['users'] = $this->common_model->get_all_students();
        $data['studentStatus'] = $finalStudentStatus;
        $data['country'] = $this->common_model->select('country');
        $data['count'] = $this->common_model->get_user_total();
        $data['assignedTaskList'] =  $this->common_model->get_EmployeeWith_Allstudents($current_EmpId,'emp_task_assigned');
        $data['main_content'] = $this->load->view('admin/student/mystudents', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

    public function deleteStatus($id)
    {
        $this->common_model->stu_delete($id,'student_status_data');

        $this->session->set_flashdata('error_msg', 'Student Status is reset!!!.' );
          redirect(base_url('admin/student/update/'.$id));
    }

    public function homePageStatus()
    {
        if ($_GET) {

            $s_status= '';
            $completeStatus = str_replace(' ', '_', strtolower($_GET['status']));

            if(strpos($_GET['status'], 'Reject') !== false){
                  $s_status = 'Reject';

            }elseif (strpos($_GET['status'], 'Approved') !== false) {
                $s_status = 'Approve';

            }elseif (strpos($_GET['status'], 'Defect') !== false) {
                $s_status = 'Defect';
            }
           
            // $formKey = array_keys($_POST['formData']);
              $data = array(
                'student_id' => $_GET['student_id'],
                'student_status' =>$completeStatus,
                'formData' => serialize($_GET)
            );

        $checkStatusIdExist = $this->common_model->get_single_studentStatus_id($_GET['student_id']);
        
        if(empty($checkStatusIdExist)){

            $data = $this->security->xss_clean($data);
            $statusData = $this->common_model->insert($data, 'student_status_data');
        } else {

            $this->common_model->delete($checkStatusIdExist->id,'student_status_data'); 
            $statusData = $this->common_model->insert($data, 'student_status_data');
        }

        $this->session->set_flashdata('msg', 'Student is '.$_POST['student_status']);
        redirect(base_url('admin/dashboard'));

        }
    }

      public function deleteStatusFromHomePage($id)
    {
        $this->common_model->stu_delete($id,'student_status_data');

        $this->session->set_flashdata('error_msg', 'Student Status is reset!!!.' );
        redirect(base_url('admin/dashboard'));
    }

/*
    public function power()
    {   
		$data['page_title'] = 'Add User Role';
        $data['powers'] = $this->common_model->get_all_power('user_power');
        $data['main_content'] = $this->load->view('admin/student/user_power', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

    //-- add user power
    public function add_power()
    {   
        if (isset($_POST)) {
            $data = array(
                'name' => $_POST['name'],
                'power_id' => $_POST['power_id']
            );
            $data = $this->security->xss_clean($data);
            
            //-- check duplicate power id
            $power = $this->common_model->check_exist_power($_POST['power_id']);
            if (empty($power)) {
                $user_id = $this->common_model->insert($data, 'user_power');
                $this->session->set_flashdata('msg', 'Power added Successfully');
            } else {
                $this->session->set_flashdata('error_msg', 'Power id already exist, try another one');
            }
            redirect(base_url('admin/student/power'));
        }
        
    }

    //--update user power
    public function update_power()
    {   
        if (isset($_POST)) {
            $data = array(
                'name' => $_POST['name']
            );
            $data = $this->security->xss_clean($data);
            
            $this->session->set_flashdata('msg', 'Power updated Successfully');
            $user_id = $this->common_model->edit_option($data, $_POST['id'], 'user_power');
            redirect(base_url('admin/student/power'));
        }
        
    }

    public function delete_power($id)
    {
        $this->common_model->delete($id,'user_power'); 
        $this->session->set_flashdata('msg', 'Power deleted Successfully');
        redirect(base_url('admin/student/power'));
    }
    */

}