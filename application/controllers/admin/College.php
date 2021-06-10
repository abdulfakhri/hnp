<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct(){
        parent::__construct();
        check_login_user();
       $this->load->model('common_model');
       $this->load->model('login_model');
    }

 public function addcollege()
    {
       
        $this->load->view('admin/college/add.php', $data);
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
            $server_path= $_SERVER['HTTP_ORIGIN']."/";   
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
                'aadhar_card' => $server_path.$aadhar['mainImg'].", ".$server_path.$aadhar['thumb'],
                'voter_id' => $server_path.$voter['mainImg'].", ".$server_path.$voter['thumb'],
                'bank_passbook' => $server_path.$passbook['mainImg'].", ".$server_path.$passbook['thumb'],
                'profile_pic' => $server_path.$profile_pic['mainImg'].", ".$server_path.$profile_pic['thumb'],
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

    public function colleges()
    {
	 	$data['page_title'] = 'All Registered Colleges';
        $data['colleges'] = $this->common_model->get_all_college();
        $data['country'] = $this->common_model->select('country');
        $data['count'] = $this->common_model->get_college_total();
        $data['main_content'] = $this->load->view('admin/college/colleges', $data, TRUE);
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
            $server_path= $_SERVER['HTTP_ORIGIN']."/"; 
            // print_r($aadhar);
            // echo "<pre>";  
            // print_r($_POST);
            // echo "<br>";
           
            // $data['aadhar_card'] = (array_key_exists('msg', $aadhar) ? $_POST['hidden_aadhar_card'] : $server_path.$aadhar['mainImg'].", ".$server_path.$aadhar['thumb']) ;

            // $data['voter_id'] = (array_key_exists('msg', $voter) ? $_POST['hidden_voter_id'] : $server_path.$voter['mainImg'].", ".$server_path.$voter['thumb']) ;

            // $data['bank_passbook'] = (array_key_exists('msg', $passbook) ? $_POST['hidden_bank_passbook'] : $server_path.$passbook['mainImg'].", ".$server_path.$passbook['thumb']) ;

            // $data['profile_pic'] = (array_key_exists('msg', $profile_pic) ? $_POST['hidden_profile_pic'] : $server_path.$profile_pic['mainImg'].", ".$server_path.$profile_pic['thumb']) ;
           
            // die;

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
                'aadhar_card' => (array_key_exists('msg', $aadhar) ? $_POST['hidden_aadhar_card'] : $server_path.$aadhar['mainImg'].", ".$server_path.$aadhar['thumb']) ,
                'voter_id' => (array_key_exists('msg', $voter) ? $_POST['hidden_voter_id'] : $server_path.$voter['mainImg'].", ".$server_path.$voter['thumb']),
                'bank_passbook' => (array_key_exists('msg', $passbook) ? $_POST['hidden_bank_passbook'] : $server_path.$passbook['mainImg'].", ".$server_path.$passbook['thumb']),
                'profile_pic' => (array_key_exists('msg', $profile_pic) ? $_POST['hidden_profile_pic'] : $server_path.$profile_pic['mainImg'].", ".$server_path.$profile_pic['thumb']),
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



}