<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Auth extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('login_model');
         $this->load->model('common_model');
    }


    public function index(){
        $data = array();
        $data['page'] = 'Auth';
        if($this->session->userdata('id')){
            redirect(base_url() . 'admin/dashboard/tootp', 'refresh');
         }
        $this->load->view('admin/login', $data);
    }
    




    public function log(){

        if($_POST){ 
            $query = $this->login_model->validate_user();
            
            //collection of allowed IP addresses            
          //  $allowedIp = $this->common_model->select('allowed_ips_table');
         //   $allowlist = explode(",", $allowedIp[0]['allowed_ips']);
            
            // $allowlist = array(//'36.285.23.23',//'12.101.67.56',//'98.465.23.89',//'16.289.90.10',// );
            
            
            //-- if valid
            if($query){
                $data = array();
                 $ip = $_SERVER['REMOTE_ADDR'];
                 $otp_code=rand(10,100000);
                 
                 $to = "Abhicollege1@gmail.com,xplore1990@gmail.com";
                 $subject = "OTP Code";
                 $txt = "Hello Admin,
                 this is the OTP Code:".$otp_code;
                 $headers = "From: system@hellonsp.in" . "\r\n" .
                            "CC: admin@hellonsp.in";
                mail($to,$subject,$txt,$headers);
                   
                foreach($query as $row){

            
                   if($row->status == 0  && $row->role != 'admin' ){
                       
                    $this->session->set_flashdata('inactiveUser', 'Please Contact Admin');
                    redirect(base_url() . 'auth', 'refresh');
                    
                   }
                    $empTimeDetails = $this->common_model->get_emp_time($row->id);
                    
                    if(!empty($empTimeDetails)) {
                        $empTimeDetails = array_pop($empTimeDetails);
                        if($empTimeDetails->in_office == 1 && $row->role != 'admin' ){
                            $this->session->set_flashdata('alreadyLoggedin', 'Already Logged  from another place .Please Contact Admin');
                            redirect(base_url() . 'auth', 'refresh');
                        }
                    }
                    

                   $data = array(
                        'user_ip' =>  $ip,
                        'otp_email'=> $otp_code,
                        'otp_confirmed'=> 0,
                    );
                    $data = $this->security->xss_clean($data);
                    $this->common_model->update($data, $row->id,'user');

                    $login_logout_data = array(
                        'emp_id' => $row->id,
                        'login' => current_datetime(),
                        'logout' => '',
                        'in_office' => 1
                    );

                    $login_logout_data = $this->security->xss_clean($login_logout_data);
                    $login_logout_insert = $this->common_model->insert($login_logout_data, 'emp_time_details');

                    $emailId = explode('@', $row->email);
                    $chat_userName = strtolower(trim($row->first_name))."_".strtolower(trim($row->last_name)).'_'.strtolower(trim($emailId[0]));
                    $chat_FullName = trim($row->first_name)." ".trim($row->last_name);
                     $chatData = array(                           
                            'username'=> $chat_userName
                        );
                     $this->common_model->delete_user($chat_userName, 'chat_vpb_online_users');
                     $chat_user_online_id = $this->common_model->insert($chatData, 'chat_vpb_online_users');

                 
                      $data = array(
                        'id' => $row->id,
                        'otp_email'=> $otp_code,
                        'otp_confirmed'=> $row->otp_confirmed,
                        'first_name' => $row->first_name,
                        'email' =>$row->email,
                        'role' =>$row->role,
                        'is_login' => TRUE,
                        'chat_userName' =>  $chat_userName,
                        'chat_pass' =>  $row->password,
                        'chat_FullName' =>  $chat_FullName,
                        'chat_online_id'=>$chat_user_online_id
                    );
                    $this->session->set_userdata($data);
                    $url = base_url('admin/dashboard/tootp');
                   // $url = base_url('admin/otp');
                }
				redirect(base_url() . 'admin/dashboard/tootp');
				//redirect(base_url() . 'admin/otp');
            }else{
               redirect(base_url() . 'auth');
            }
            
        }else{
            $this->load->view('auth',$data);
        }
    }


    
    function logout(){

        $id = $this->session->userdata('id');
        
        $chat_online_id = $this->session->userdata('chat_online_id');

        $empTimeDetails = $this->common_model->get_emp_time($id);
        if(!empty($empTimeDetails)){
            $empTimeDetails = array_pop($empTimeDetails);
            $start_date = new DateTime($empTimeDetails->login);

            $empUpdateTime = array(
                'logout' => current_datetime(),
                'in_office' => 0

            );
        
            $empUpdateTime = $this->security->xss_clean($empUpdateTime);
            $this->common_model->update($empUpdateTime,$empTimeDetails->id,'emp_time_details');
            $this->common_model->delete($chat_online_id,'chat_vpb_online_users');
        }
        $this->session->sess_destroy();
        $data = array();
        $data['page'] = 'logout';
        $this->load->view('admin/login', $data);
    }
      public function validateUser()
    {
        $oldPw = $this->session->userdata('chat_pass');
        $userData =  $this->common_model->check_email($this->session->userdata('email'));
        $newPw = $userData[0]->password;
        if($oldPw != $newPw){
            echo true;
        }
    }

}