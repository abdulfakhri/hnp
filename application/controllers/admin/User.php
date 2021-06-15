<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct(){
        parent::__construct();
        check_login_user();
       $this->load->model('common_model');
       $this->load->model('login_model');
    }


  

    public function createEmployee()
    {
        $data = array();
        $data['page_title'] = 'New Employee';
        $data['country'] = $this->common_model->select('country');
        $data['power'] = $this->common_model->get_all_power('user_power');
        $data['main_content'] = $this->load->view('admin/user/add', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

    //-- add new user by admin
    public function add()
    {   
        if ($_POST) {


            $aadhar = $this->common_model->upload_image(1040,'aadhar_card');
            $voter = $this->common_model->upload_image(1040,'voter_id');
            $passbook = $this->common_model->upload_image(1040,'bank_passbook');
            $profile_pic = $this->common_model->upload_image(1040,'profile_pic');
            //$server_path= $_SERVER['HTTP_ORIGIN']."/";   
            $server_path="/";  
                // print_r($aadhar);
                // die;

            $emailId = explode('@', $_POST['email']);
            $chat_userName = strtolower($_POST['first_name'])."_".strtolower($_POST['last_name']).'_'.strtolower($emailId[0]);


            $data = array(
                'first_name' => $_POST['first_name'],
                'last_name' => $_POST['last_name'],
                'email' => $_POST['email'],
                'password' => md5($_POST['password']),
                'mobile' => $_POST['mobile'],
                'alt_mobile' => $_POST['alt_mobile'],
                'address1' => $_POST['address1'],
                'address2' => $_POST['address2'],
                'pin_code' => $_POST['pin_code'],
                'addr_state' => $_POST['addr_state'],
                'country' => $_POST['country'],
                'bank_name' => $_POST['bank_name'],
                'account_number' => $_POST['account_number'],
                'ifsc_code' => $_POST['ifsc_code'],
                /*
                'aadhar_card' => $server_path.$aadhar['mainImg'].", ".$server_path.$aadhar['thumb'],
                'voter_id' => $server_path.$voter['mainImg'].", ".$server_path.$voter['thumb'],
                'bank_passbook' => $server_path.$passbook['mainImg'].", ".$server_path.$passbook['thumb'],
                'profile_pic' => $server_path.$profile_pic['mainImg'].", ".$server_path.$profile_pic['thumb'],
                */
                  
                'aadhar_card' => $aadhar['mainImg'],
                'voter_id' => $voter['mainImg'],
                'bank_passbook' =>$passbook['mainImg'],
                'profile_pic' => $profile_pic['mainImg'],
                 
                'status' => $_POST['status'],
                'role' => $_POST['role'],
                'chat_username' => $chat_userName,
                'created_at' => current_datetime()
            );
            $data = $this->security->xss_clean($data);

            if($_POST['role'] == 'user'){
                $groupCahtAccess = 2;
            }else{
                 $groupCahtAccess = 1;
            }

            $chatData = array(
                'fullname'=>$_POST['first_name'].' '.$_POST['last_name'],
                'username'=> $chat_userName,
                'password'=>md5($_POST['password']),
                'date'=>my_date_show(current_datetime())
            );

             $groupChatData = array(
                'uname'=>$_POST['first_name'].' '.$_POST['last_name'],
                'username'=> $chat_userName,
                'password'=>md5($_POST['password']),
                'photo'=>$server_path.$profile_pic['mainImg'],
                 'access'=> $groupCahtAccess
            );

          
            //-- check duplicate email
            $email = $this->common_model->check_email($_POST['email']);

            if (empty($email)) {
                $user_id = $this->common_model->insert($data, 'user');
                $chatData['id'] = $user_id;
                $groupChatData['userid'] = $user_id;
                $chatData = $this->security->xss_clean($chatData);
                $chatData_id = $this->common_model->insert($chatData, 'chat_vpb_users');
                $group_chatData_id = $this->common_model->insert($groupChatData, 'groupChat_user');
            
                if ($this->input->post('role') == "user") {
                    $actions = $this->input->post('role_action');
                    foreach ($actions as $value) {
                        $role_data = array(
                            'user_id' => $user_id,
                            'action' => $value
                        ); 
                       $role_data = $this->security->xss_clean($role_data);
                       $this->common_model->insert($role_data, 'user_role');
                    }
                }
                $this->session->set_flashdata('msg', 'User added Successfully');
                redirect(base_url('admin/user/all_user_list'));
            } else {
                $this->session->set_flashdata('error_msg', 'Email already exist, try another email');
                redirect(base_url('admin/user'));
            }
            
        }
    }

    public function all_user_list()
    {
	 	$data['page_title'] = 'All Registered Users';
        $data['users'] = $this->common_model->get_all_user();
        $data['country'] = $this->common_model->select('country');
        $data['count'] = $this->common_model->get_user_total();
        $data['main_content'] = $this->load->view('admin/user/users', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

      public function deleted_user_list()
    {
	 	$data['page_title'] = 'All Registered Users';
        $data['users'] = $this->common_model->get_all_deleted_users();
        $data['country'] = $this->common_model->select('country');
        $data['count'] = $this->common_model->get_user_total();
        $data['main_content'] = $this->load->view('admin/user/deleted_users', $data, TRUE);
        $this->load->view('admin/index', $data);
    }


    // view user data

    public function user_view_data($id)
    {
	 	$data['page_title'] = 'User Details';
        // $data['users'] = $this->common_model->get_all_user($id);
        $data['user'] = $this->common_model->get_single_user_info($id);
        
        $data['country'] = $this->common_model->select('country');
        $data['count'] = $this->common_model->get_user_total();
        $data['main_content'] = $this->load->view('admin/user/user_view', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

    //-- update users info
    public function update($id)
    {
        if ($_POST) {

            $aadhar = $this->common_model->upload_image(1040,'aadhar_card');
            $voter = $this->common_model->upload_image(1040,'voter_id');
            $passbook = $this->common_model->upload_image(1040,'bank_passbook');
            $profile_pic = $this->common_model->upload_image(1040,'profile_pic');
            //$server_path=""; 
            // print_r($aadhar);
            // echo "<pre>";  
            // print_r($_POST);
            // echo "<br>";
           
            // $data['aadhar_card'] = (array_key_exists('msg', $aadhar) ? $_POST['hidden_aadhar_card'] : $server_path.$aadhar['mainImg'].", ".$server_path.$aadhar['thumb']) ;

            // $data['voter_id'] = (array_key_exists('msg', $voter) ? $_POST['hidden_voter_id'] : $server_path.$voter['mainImg'].", ".$server_path.$voter['thumb']) ;

            // $data['bank_passbook'] = (array_key_exists('msg', $passbook) ? $_POST['hidden_bank_passbook'] : $server_path.$passbook['mainImg'].", ".$server_path.$passbook['thumb']) ;

            // $data['profile_pic'] = (array_key_exists('msg', $profile_pic) ? $_POST['hidden_profile_pic'] : $server_path.$profile_pic['mainImg'].", ".$server_path.$profile_pic['thumb']) ;
           
            // die;
            /*
             'aadhar_card' => (array_key_exists('msg', $aadhar) ? $_POST['hidden_aadhar_card'] : $server_path.$aadhar['mainImg'].", ".$server_path.$aadhar['thumb']) ,
                'voter_id' => (array_key_exists('msg', $voter) ? $_POST['hidden_voter_id'] : $server_path.$voter['mainImg'].", ".$server_path.$voter['thumb']),
                'bank_passbook' => (array_key_exists('msg', $passbook) ? $_POST['hidden_bank_passbook'] : $server_path.$passbook['mainImg'].", ".$server_path.$passbook['thumb']),
                'profile_pic' => (array_key_exists('msg', $profile_pic) ? $_POST['hidden_profile_pic'] : $server_path.$profile_pic['mainImg'].", ".$server_path.$profile_pic['thumb']),
            */
            $emailId = explode('@', $_POST['email']);
            $chat_userName = strtolower($_POST['first_name'])."_".strtolower($_POST['last_name']).'_'.strtolower($emailId[0]);
            
            
            $data = array(
                'first_name' => $_POST['first_name'],
                'last_name' => $_POST['last_name'],
                'email' => $_POST['email'],
                // 'password' => md5($_POST['password']),
                'mobile' => $_POST['mobile'],
                'alt_mobile' => $_POST['alt_mobile'],
                'address1' => $_POST['address1'],
                'address2' => $_POST['address2'],
                'pin_code' => $_POST['pin_code'],
                'addr_state' => $_POST['addr_state'],
                // 'country' => $_POST['country'],
                'bank_name' => $_POST['bank_name'],
                'account_number' => $_POST['account_number'],
                'ifsc_code' => $_POST['ifsc_code'],
                'aadhar_card' => (array_key_exists('msg', $aadhar) ? $_POST['hidden_aadhar_card'] : $aadhar['mainImg']),
                'voter_id' => (array_key_exists('msg', $voter) ? $_POST['hidden_voter_id'] : $voter['mainImg']),
                'bank_passbook' => (array_key_exists('msg', $passbook) ? $_POST['hidden_bank_passbook'] : $passbook['mainImg']),
                'profile_pic' => (array_key_exists('msg', $profile_pic) ? $_POST['hidden_profile_pic'] : $profile_pic['mainImg']),
                // 'status' => $_POST['status'],
                'role' => $_POST['role'],
                 'chat_username' => $chat_userName,
                'created_at' => current_datetime()
            );

            $data = $this->security->xss_clean($data);

            $chatUser_data =  array(
                'fullname'=>$_POST['first_name'].' '.$_POST['last_name'],
                'username'=> $chat_userName,
                'password' => $_POST['password'],
                'photo'=> (array_key_exists('msg', $profile_pic) ? $ppic = explode(",", $_POST['hidden_profile_pic'])[0] : $server_path.$profile_pic['mainImg']),
                'date'=>my_date_show(current_datetime())
            );

            if($_POST['role'] == 'user'){
                $groupCahtAccess = 2;
            }else{
                 $groupCahtAccess = 1;
            }


            $group_chatUser_data =  array(
                'uname'=>$_POST['first_name'].' '.$_POST['last_name'],
                'username'=> $chat_userName,
                'password' => $_POST['password'],
                'photo'=> (array_key_exists('msg', $profile_pic) ? $ppic = explode(",", $_POST['hidden_profile_pic'])[0] : $server_path.$profile_pic['mainImg']),
                'access'=> $groupCahtAccess
            );


            $powers = $this->input->post('role_action');
            if (!empty($powers)) {
                $this->common_model->delete_user_role($id, 'user_role');
                foreach ($powers as $value) {
                   $role_data = array(
                        'user_id' => $id,
                        'action' => $value
                    ); 
                   $role_data = $this->security->xss_clean($role_data);
                   $this->common_model->insert($role_data, 'user_role');
                }
            }

            $this->common_model->edit_option($data, $id, 'user');
            $this->common_model->updateChatUsers($chatUser_data, $id, 'chat_vpb_users');
            $this->common_model->updateChatUsers($group_chatUser_data, $id, 'groupChat_user','gc');



            $this->session->set_flashdata('msg', 'Information Updated Successfully');
            redirect(base_url('admin/user/all_user_list'));

        }
		
        $data['user'] = $this->common_model->get_single_user_info($id);
        $data['user_role'] = $this->common_model->get_user_role($id);
        $data['power'] = $this->common_model->select('user_power');
        $data['country'] = $this->common_model->select('country');
        $data['main_content'] = $this->load->view('admin/user/edit_user', $data, TRUE);
		$data['page_title'] = 'Edit Users';
        $this->load->view('admin/index', $data);
        
    }

    public function attendance($id ='')
    {
        $data['page_title'] = 'All Registered Users';
        if($id){
            $data['singleUser'] = $this->common_model->get_single_user_info($id);
            $data['emp_attendance'] = $this->common_model->get_emp_time($id,'mainPage');
        }        
        $data['users'] = $this->common_model->get_all_user();
        $data['country'] = $this->common_model->select('country');
        $data['count'] = $this->common_model->get_user_total();
        $data['main_content'] = $this->load->view('admin/user/attendance', $data, TRUE);
        $this->load->view('admin/index', $data);
    }

    
    //-- active user
    public function active($id) 
    {
        $data = array(
            'status' => 1
        );
        $data = $this->security->xss_clean($data);
        $this->common_model->update($data, $id,'user');
        $this->session->set_flashdata('msg', 'User active Successfully');
        redirect(base_url('admin/user/all_user_list'));
    }

    //-- deactive user
    public function deactive($id) 
    {
        $data = array(
            'status' => 0
        );
        $data = $this->security->xss_clean($data);
        $this->common_model->update($data, $id,'user');
        $this->session->set_flashdata('msg', 'User deactive Successfully');
        redirect(base_url('admin/user/all_user_list'));
    }

    //-- delete user
    public function delete($id)
    {
        // $this->common_model->delete($id,'user'); 
        $data = array(
            'is_deleted' => 1
        );
        $data = $this->security->xss_clean($data);
        $this->common_model->update($data, $id,'user');
        $this->session->set_flashdata('msg', 'User deleted Successfully');
        redirect(base_url('admin/user/all_user_list'));
    }


    public function power()
    {   
		$data['page_title'] = 'Add User Role';
        $data['powers'] = $this->common_model->get_all_power('user_power');
        $data['main_content'] = $this->load->view('admin/user/user_power', $data, TRUE);
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
            redirect(base_url('admin/user/power'));
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
            redirect(base_url('admin/user/power'));
        }
        
    }

    public function delete_power($id)
    {
        $this->common_model->delete($id,'user_power'); 
        $this->session->set_flashdata('msg', 'Power deleted Successfully');
        redirect(base_url('admin/user/power'));
    }

	// Employee task table controller
	public function employee_task()
    {
       if($this->session->userdata('role') == 'admin'){

             $finalStudentStatus = array();
        foreach ($this->common_model->all_studentStatus() as $key => $value) {
            $finalStudentStatus[$value['student_id']]['db_id'] = $value['id']; 
            // $finalStudentStatus[$value['student_id']]['Status'] = $value['student_status']; 
            $finalStudentStatus[$value['student_id']]['Status'] = ucwords(implode(' ',explode("_",$value['student_status']))); 
            $finalStudentStatus[$value['student_id']]['formData'] = $value['formData']; 
        }

       	 	$data['page_title'] = 'All Registered Users';
            $data['users'] = $this->common_model->get_all_user();
            $data['assigned_task'] = $this->common_model->get_assigned_students();
            $data['students'] = $this->common_model->get_all_students();
            $data['studentStatus'] = $finalStudentStatus;
            $data['country'] = $this->common_model->select('country');
            $data['count'] = $this->common_model->get_user_total();
            $data['assigned_at'] =  current_datetime();
            $data['main_content'] = $this->load->view('admin/user/employee_task', $data, TRUE);

            $this->load->view('admin/index', $data);
        }else{
            redirect(base_url() . 'admin/dashboard', 'refresh');
        }
    }

    //  Employee add task controller

    public function assign_task($id){

        $finalStudentStatus = array();
        foreach ($this->common_model->all_studentStatus() as $key => $value) {
            $finalStudentStatus[$value['student_id']]['db_id'] = $value['id']; 
            // $finalStudentStatus[$value['student_id']]['Status'] = $value['student_status']; 
            $finalStudentStatus[$value['student_id']]['Status'] = ucwords(implode(' ',explode("_",$value['student_status']))); 
            $finalStudentStatus[$value['student_id']]['formData'] = $value['formData']; 
        }

        $data['studentStatus'] = $finalStudentStatus;
        
        $data['page_title'] = 'Assign Task';
        $data['user'] = $this->common_model->get_single_user_info($id);
        $data['students'] = $this->common_model->get_unassigned_students();

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

        $data['assigned_at'] =  current_datetime();
        $data['main_content'] = $this->load->view('admin/user/add_task', $data, TRUE);
        // $data['main_content'] = $this->load->view('admin/user/test_data', $data, TRUE);

        $this->load->view('admin/index', $data);
    }

    // get selected students is
    public function save_selected_stud(){
       
        if ($_POST) {
            if(!empty($_POST['selected_val'])  && !empty($_POST['emp_id']))
            {
                $stu_status = array(
                    'is_assigned' => 1
                );
            
                $sel_task_remark=$_POST['sel_task_remark'];
                $sel_stu_id = array_unique(($_POST['selected_val']));
                foreach ($sel_stu_id as $array_val) {
                  
                    $data=array(
                        'emp_id' => $_POST['emp_id'],
                        'stu_id' => $array_val,
                        'task_status' => 0,
                        'task_remarks' => $sel_task_remark,
                        'assigned_at' => current_datetime()
                    );

                    $data = $this->security->xss_clean($data);
                    $insert_task = $this->common_model->insert($data, 'emp_task_assigned');
                    $this->common_model->update_stu_task($stu_status, $array_val, 'student_data');
                }
                  echo 1;
            }else{
                echo 0;
            }
          
           
        }
    }

    //-- delete user
    public function delete_task($id)
    {
        
        $data = array(
            'is_assigned' => NULL
        );
        $this->common_model->delete_task($id,'emp_task_assigned'); 
        $this->common_model->update_stu_task($data, $id,'student_data');
        $this->session->set_flashdata('msg', 'Task Deleted Successfully');
        redirect(base_url('admin/user/employee_task'));
    }

    //-- delete user
    public function multiple_delete_task()
    {
       
        foreach ($_POST['selected_val'] as $delete_task_Id) {
            $id = $delete_task_Id;
              $data = array(
                'is_assigned' => NULL
            );
            $this->common_model->delete_task($id,'emp_task_assigned'); 
            $this->common_model->update_stu_task($data, $id,'student_data');
            $this->session->set_flashdata('msg', 'Multiple Task Deleted Successfully');
        }
    }

       //-- show profile  user
    public function profile($id)
    {
        if($this->session->userdata('id') == $id){
            $data = array();
            $data['page_title'] = 'Profile';
            $data['userId'] = $id;
            $data['user'] = $this->common_model->get_single_user_info($id);
            $data['country'] = $this->common_model->select('country');
            $data['count'] = $this->common_model->get_user_total();
            $data['main_content'] = $this->load->view('admin/user/profile', $data, TRUE);
            $this->load->view('admin/index', $data); 
        } else {
            redirect(base_url() . 'admin/dashboard', 'refresh');
        }        
    }


    public function workDone()
    {
        if($this->session->userdata('id')){
            $data = array();
            $data['page_title'] = 'Work History';
            $data['all_users'] = $this->common_model->get_all_user();
            $data['all_student'] = $this->common_model->get_all_students();
            $data['workDone'] = $this->common_model->select('student_modified_history');
            $data['main_content'] = $this->load->view('admin/user/workhistory', $data, TRUE);
            $this->load->view('admin/index', $data); 
        } else {
            redirect(base_url() . 'admin/dashboard', 'refresh');
        }        
    }

    public function modificationHistory()
    {
        if($_POST && $this->session->userdata('role') == 'admin' ){

            $modifiedArray = $filterType_array = $commonArrayData =  array();
            $id = $_POST['filter_id'];
            $filter_type = $_POST['filter_type'];
            $studentEmployeeCheck = false;
             $data = array();
                
                $modificationArray = $this->common_model->get_modfication_historyData($id,$filter_type);

                if($filter_type == 'student' && !empty($modificationArray)){

                    $studentEmployeeCheck = true;
                    
                    $filterType_array['student_id'] = $this->common_model->get_single_student_info($id); 
                    $filterType_array['student_id']->students = $filterType_array['student_id']->students;

                    $commonArrayData = $filterType_array['student_id'];
                }
                else if($filter_type == 'employee'  && !empty($modificationArray)){

                    $studentEmployeeCheck = false;
                    $filterType_array['emp_id'] =  $this->common_model->get_single_user_info($id); 
                    $commonArrayData = $filterType_array['emp_id'];
                }
                foreach ($modificationArray as $key => $value) {
                    $modificationArray[$key]['id'] = $value['id'] ;
                    
                    if(!$studentEmployeeCheck){
                        $modificationArray[$key]['student_id'] = $this->common_model->get_single_student_info($value['student_id']); 
                        $modificationArray[$key]['student_id']->student_uploaded_data = unserialize($modificationArray[$key]['student_id']->student_uploaded_data); 
                    } else {
                         $modificationArray[$key]['emp_id'] =  $this->common_model->get_single_user_info($value['emp_id']);  
                    }

                    $modificationArray[$key]['updated_at'] = $value['updated_at'];
                }
                $modificationArray['filterCommon'] = $commonArrayData;
                $modificationArray['filter_type'] = $filter_type;
             
             echo json_encode($modificationArray);

        } else{
            redirect(base_url() . 'admin/dashboard', 'refresh'); 
        }
      
    }

    public function getLoginTimeFix($id)
    {
        $timeData =  $this->common_model->get_emp_time($id);
        $delId = $timeData[0]->id;
        $this->common_model->delete($delId,'emp_time_details');
        $this->session->set_flashdata('msg', 'Login Time is Reset Succesfully!!    ');
        redirect(base_url() . 'admin/user/all_user_list', 'refresh');

    }

    public function getOnlineStatus()
    {
       $onlineUsers = $this->common_model->select('chat_vpb_online_users');
       $finalOnlineArray = array();
        foreach ($onlineUsers as $key => $value) {
          $finalOnlineArray[]=$value['username'];
        }

       echo json_encode($finalOnlineArray);

    }

    //  show employee chat history

    public function chatHistory($id){

        $data['page_title'] = 'Chat History';
        $data['single_emp'] = $this->common_model->get_single_user_info($id);
        $data['all_emp'] = $this->common_model->get_all_user();
        $data['assigned_at'] =  current_datetime();
        $data['main_content'] = $this->load->view('admin/user/show_chat', $data, TRUE);

        $this->load->view('admin/index', $data);
    }
    // reset the user password
    public function resetPass(){

        $data = array();
        if ($_POST) {
            $email =  $this->common_model->check_email($_POST['userEmail']);
            
            if(!empty($email)){

                $data['userid'] = $email[0]->id;
                $data['username'] = $email[0]->chat_username;
                $data['newpass'] = md5($_POST['psw']);

                $userTable =  $this->common_model->changeUserPassword($data, 'user');
                $chatTable =  $this->common_model->changeChatUserPassword($data, 'chat_vpb_users');
                $groupChatTable =  $this->common_model->changeChatUserPassword($data, 'groupChat_user');
                $this->session->set_flashdata('msg', 'Password changed successfully');
                redirect(base_url('admin/user/resetPass'));
            }else {
                $this->session->set_flashdata('error_msg', 'Email doesn\'t exist, try another email');
                redirect(base_url('admin/user/resetPass'));
            }
        }
        $_POST = false;
        $data['page_title'] = 'Reset Password';
        $data['main_content'] = $this->load->view('admin/user/reset', $data, TRUE);
        
        $this->load->view('admin/index', $data);
    }



}