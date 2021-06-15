<?php
class Common_model extends CI_Model {
   
   
   function __construct(){
   parent::__construct();
   $this->load->helper('url');  
   }
    
    //-- insert function
    public function insert($data,$table){
        $this->db->insert($table,$data);        
        return $this->db->insert_id();
    }

    //-- edit function
    function edit_option($action, $id, $table,$dbtype = 'emp'){
        if($dbtype == 'stu' ){
            $this->db->where('student_id',$id);
        } else {
             $this->db->where('id',$id);
         }       
        $this->db->update($table,$action);
        return;
    } 

    //-- update function
    function update($action, $id, $table){
        $this->db->where('id',$id);
        $this->db->update($table,$action);
        return;
    } 

    // --- update chat user table 

    function updateChatUsers($action, $id, $table,$groupChat=''){

        if($groupChat == 'gc'){
            $this->db->where('userid', $id);
        } else {
            $this->db->where('id', $id);
        }
            $q = $this->db->get($table);
            $this->db->reset_query();
        if($groupChat == 'gc'){
             if ( $q->num_rows() > 0 ) 
            {
                $this->db->where('userid', $id)->update($table, $action);
            } else {
                $this->db->set('userid', $id)->insert($table, $action);
            }
        } else {
             if ( $q->num_rows() > 0 ) 
            {
                $this->db->where('id', $id)->update($table, $action);
            } else {
                $this->db->set('id', $id)->insert($table, $action);
            }
        }   
           

    }

     //-- delete function
    function delete_user($username,$table){
        $this->db->delete($table, array('username' => $username));
        return;
    }

     //-- delete function
    function delete_OTP($email,$all='no'){

        $this->db->where('created_for', $email);
        if($all == 'yes'){
            $this->db->where('is_expired!=1');
        }
        $this->db->delete('otp_expiry');
        return;
    }


    function update_OTP($otp)
    {
        //$this->db->query(" UPDATE otp_expiry SET is_expired = 1 WHERE otp = '" .$otp. "'" );

        $this->db->set('is_expired', '1');
        $this->db->where('otp', $otp);
        $this->db->update('otp_expiry');
        return;
    }

    function get_OTP_verification($otp,$email)
    {
         $this->db->select('*');
        $this->db->from('otp_expiry');
        $this->db->where('otp',$otp);
        $this->db->where('is_expired!=1');
        $this->db->where('created_for',$email);
         $query = $this->db->get();
        $query = $query->result_array();  
        return $query;

    }

    // task assgned update
    //-- update function
    function update_stu_task($action, $id, $table){
        $this->db->where('student_id',$id);
        $this->db->update($table,$action);
        return;
    } 

    //-- delete function
    function delete($id,$table){
        $this->db->delete($table, array('id' => $id));
        return;
    }

    //-- delete function
    function stu_delete($id,$table){
        $this->db->delete($table, array('student_id' => $id));
        return;
    }

    // delete assign task 
    //-- delete function
    function delete_task($id,$table){
        $this->db->delete($table, array('stu_id' => $id));
        return;
    }

    // Employee Task Status Update

    function emp_task_status_update($id,$table,$action){
        $this->db->where('stu_id',$id);
   
        $this->db->update($table,$action);
        return;
    }

    function changeChatUserPassword($data,$table){
        $this->db->set('password', $data['newpass']);
        $this->db->where('username', $data['username']);
        $this->db->update($table);
        return;

    }
    
    function changeUserPassword($data,$table){
        $this->db->set('password', $data['newpass']);
        $this->db->where('chat_username', $data['username']);
        $this->db->update($table);
        return;

    }
    // getTAsk of student on particular id assign task 
    //-- delete function
    function getStudentTaskWithEmployee($id,$table){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('stu_id',$id);
        $query = $this->db->get();
        $query = $query->result_array();  
        return $query;
    }

    function get_EmployeeWith_Allstudents($id,$table){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('emp_id',$id);
        $this->db->where('task_status',0);
        $this->db->limit(1);
        $query = $this->db->get();
        $query = $query->result_array();  
        return $query;
    }
    
    function get_EmployeeWith_Allstudents_Pending($id,$table){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('emp_id',$id);
        $this->db->where('task_status',0);
        $query = $this->db->get();
        $query = $query->result_array();  
        return $query;
    }
    
    
    function get_EmployeeWith_Allstudents_Completed($id,$table){
       // $wh="WHERE task_status='1' OR task_status='0'";
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('emp_id',$id);
        $this->db->where('task_status',1);
        $this->db->or_where('task_status',0);
        //$this->db->where($wh);
        $query = $this->db->get();
        $query = $query->result_array();  
        return $query;
    }
    
    //-- get last inserted id of user for logout options
     function get_emp_time($id,$pageType = ''){

        $this->db->select();
        $this->db->from('emp_time_details etd');
        $this->db->order_by('id','DESC');
        $this->db->where('etd.emp_id',$id);
        
        if($pageType == 'mainPage') {
            $this->db->where('etd.in_office',0);
            $query = $this->db->get();
            $query = $query->result_array();  
            return $query;
        } else {
            $this->db->limit(1);
            $query = $this->db->get();
            if($query->num_rows() == 1) {                 
                return $query->result();
            } else {
                return false;
            }
        }        
     }

    //-- user role delete function
    function delete_user_role($id,$table){
        $this->db->delete($table, array('user_id' => $id));
        return;
    }

    // -- single student form status
    function single_studentStatus($id)
    {
        $this->db->select();
        $this->db->from('student_status_data');
        $this->db->order_by('id','ASC');
        $this->db->where('student_id',$id);
        $query = $this->db->get();
        $query = $query->result_array();  
        return $query;
    }

    // -- student form status
    function all_studentStatus()
    {
        $this->db->select();
        $this->db->from('student_status_data');
        $this->db->order_by('id','ASC');
        $query = $this->db->get();
        $query = $query->result_array();  
        return $query;
    }


    //-- select function
    function select($table){
        $this->db->select();
        $this->db->from($table);
        $this->db->order_by('id','ASC');
        $query = $this->db->get();
        $query = $query->result_array();  
        return $query;
    }

    //-- select by id
    function select_option($id,$table){
        $this->db->select();
        $this->db->from($table);
        $this->db->where('id', $id);
        $query = $this->db->get();
        $query = $query->result_array();  
        return $query;
    } 

    //-- check user role power
    function check_power($type){
        $this->db->select('ur.*');
        $this->db->from('user_role ur');
        $this->db->where('ur.user_id', $this->session->userdata('id'));
        $this->db->where('ur.action', $type);
        $query = $this->db->get();
        $query = $query->result_array();  
        return $query;
    }

    public function check_email($email){
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('email', $email); 
        $this->db->limit(1);
        $query = $this->db->get();
        if($query->num_rows() == 1) {                 
            return $query->result();
        }else{
            return false;
        }
    }

// to check the email and bank account duplicate
    public function check_fields($columnName,$dataValue){
        
        if($columnName == 'tr_number' && $dataValue =='Pending'){
            return false;
        }
        $this->db->select('*');
        $this->db->from('student_data');
        $this->db->where($columnName, $dataValue); 
        $this->db->where('student_data.is_deleted',NULL);
        $this->db->limit(1);
        $query = $this->db->get();
        if($query->num_rows() == 1) {                 
            return $query->result();
        }else{
            return false;
        }
    }

    public function check_exist_power($id){
        $this->db->select('*');
        $this->db->from('user_power');
        $this->db->where('power_id', $id); 
        $this->db->limit(1);
        $query = $this->db->get();
        if($query->num_rows() == 1) {                 
            return $query->result();
        }else{
            return false;
        }
    }


    //-- get all power
    function get_all_power($table){
        $this->db->select();
        $this->db->from($table);
        $this->db->order_by('power_id','ASC');
        $query = $this->db->get();
        $query = $query->result_array();  
        return $query;
    }

    //-- get logged user info
    function get_user_info(){
        $this->db->select('u.*');
        $this->db->select('c.name as country_name');
        $this->db->from('user u');
        $this->db->join('country c','c.id = u.country','LEFT');
        $this->db->where('u.id',$this->session->userdata('id'));
        $this->db->order_by('u.id','DESC');
        $query = $this->db->get();
        $query = $query->result_array();  
        return $query;
    }

    //-- get single user info
    function get_single_user_info($id){
        $this->db->select('u.*');
        $this->db->select('c.name as country_name');
        $this->db->from('user u');
        $this->db->join('country c','c.id = u.country','LEFT');
        $this->db->where('u.id',$id);
        $query = $this->db->get();
        $query = $query->row();  
        return $query;
    }

      //-- get single user info
    function get_single_user_name($id){
        $this->db->select('u.first_name,u.last_name');
        $this->db->from('user u');
        $this->db->where('u.id',$id);
        $query = $this->db->get();
        $query = $query->row();  
        return $query;
    }

    //-- get single user info
    /*
    function get_single_student_info($id) {
        
        $this->db->select('u.*');
        $this->db->from('students u');
        $this->db->where('u.student_id',$id);
        $query = $this->db->get();
        $query = $query->row();  
        return $query;
    }
    */
     function get_single_student_info($id) {
        
        $this->db->select('*');
        $this->db->from('students');
        $this->db->where('student_id',$id);
        $query = $this->db->get();
        $query = $query->row();  
        return $query;
    }
    //-- get single user info
    function get_user_role($id){
        $this->db->select('ur.*');
        $this->db->from('user_role ur');
        $this->db->where('ur.user_id',$id);
        $query = $this->db->get();
        $query = $query->result_array();  
        return $query;
    }


    //-- get all users with type 2
    function get_all_user(){
        $this->db->select('u.*');
        $this->db->select('c.name as country, c.id as country_id');
        $this->db->from('user u');
        $this->db->join('country c','c.id = u.country','LEFT');
        $this->db->order_by('u.id','DESC');
        $query = $this->db->get();
        $query = $query->result_array();  
        return $query;
    }

//-- get all students with type 2
    function get_all_students(){
        $this->db->select('*');
        $this->db->from('students');
        $this->db->where('is_deleted IS NULL or is_deleted <> 1');
        //$this->db->where('is_deleted',NULL);
        $this->db->order_by('student_id','ASC');
        $query = $this->db->get();
        $query = $query->result_array();  
        return $query;
    }
    function get_all_deleted_students(){
        $this->db->select('*');
        $this->db->from('students');
        $this->db->where('is_deleted IS NOT NULL or is_deleted=1');
        //$this->db->where('is_deleted',NULL);
        $this->db->order_by('student_id','ASC');
        $query = $this->db->get();
        $query = $query->result_array();  
        return $query;
    }

    function get_all_students_bank_id($yr,$st,$caste,$status){
       
        $this->db->select('*');
        $this->db->from('students');
        $this->db->where('is_deleted IS NULL or is_deleted <> 1');
        if(!empty($yr) OR !empty($st) OR !empty($caste) OR !empty($status)) {
            $this->db->where('year', $yr);
            $this->db->where('state', $st);
            $this->db->where('caste_details', $caste);
            $this->db->where('student_status', $status);
        }
        $this->db->order_by('student_id','ASC');
        $query = $this->db->get();
        $query = $query->result_array();  
        return $query;
       
      
    }
    function students_bank_id(){

            $this->db->select('*');
            $this->db->from('students');
            $this->db->where('is_deleted IS NULL or is_deleted <> 1');
            $this->db->order_by('student_id','ASC');
            $query = $this->db->get();
            $query = $query->result_array();  
            return $query;
    }

    function students_2020(){
        $this->db->select('*');
        $this->db->from('students');
        $this->db->where('is_deleted IS NULL or is_deleted <> 1');
        $this->db->where('year',2020);
        $query = $this->db->get();
        $query = $query->result_array();  
        return $query;
    }

     function approved_by_our_site(){
        $this->db->select('*');
        $this->db->from('students');
        $this->db->where('is_deleted IS NULL or is_deleted <> 1');
        $this->db->where('student_status','approved_by_our_site');
        $query = $this->db->get();
        $query = $query->result_array();  
        return $query;
    }
  
    function pending_by_our_site(){
        $this->db->select('*');
        $this->db->from('students');
        $this->db->where('is_deleted IS NULL or is_deleted <> 1');
        $this->db->where('student_status','Pending');
        $query = $this->db->get();
        $query = $query->result_array();  
        return $query;
    }
    function defect_by_our_site(){
        $this->db->select('*');
        $this->db->from('students');
        $this->db->where('is_deleted IS NULL or is_deleted <> 1');
        $this->db->where('student_status','defect_by_our_site');
        $query = $this->db->get();
        $query = $query->result_array();  
        return $query;
    }
      
      function students_total(){
        $this->db->select('*');
        $this->db->from('students');
        $this->db->where('is_deleted IS NULL or is_deleted <> 1');
        $query = $this->db->get();
        $query = $query->result_array();  
        return $query;
    }
    function students_tripura(){
        $this->db->select('*');
        $this->db->from('students');
        $this->db->where('is_deleted IS NULL or is_deleted <> 1');
        $this->db->where('state',"Tripura");
        $query = $this->db->get();
        $query = $query->result_array();  
        return $query;
    }
    function students_assam(){
        $this->db->select('*');
        $this->db->from('students');
        $this->db->where('is_deleted IS NULL or is_deleted <> 1');
        $this->db->where('state',"Assam");
        $query = $this->db->get();
        $query = $query->result_array();  
        return $query;
    }
    function students_2022(){
        $this->db->select('*');
        $this->db->from('students');
        $this->db->where('is_deleted IS NULL or is_deleted <> 1');
        $this->db->where('year',2022);
        $query = $this->db->get();
        $query = $query->result_array();  
        return $query;
    }
    function students_2021(){
        $this->db->select('*');
        $this->db->from('students');
        $this->db->where('is_deleted IS NULL or is_deleted <> 1');
        $this->db->where('year',2021);
        $query = $this->db->get();
        $query = $query->result_array();  
        return $query;
    }
    function students_pending(){
        $this->db->select('*');
        $this->db->from('students');
        $this->db->where('is_deleted IS NULL or is_deleted <> 1');
       // $this->db->where('year ="Pending"');
        $this->db->where('year',"Pending");
        $query = $this->db->get();
        $query = $query->result_array();  
        return $query;
    }
    //function get_all_students_filt($st,$cs,$yr,$lim){
    function get_all_students_filt($st){
        $this->db->select('*');
        $this->db->from('students');
        $this->db->where('state',$st);
      //  $this->db->where('caste',$cs);
       // $this->db->where('education_details_year',$yr);
      //  $this->db->order_by('student_id','DESC');
      //  $this->db->limit($lim);
        $query = $this->db->get();
        $query = $query->result_array();  
        return $query;
    }
    /*
    function get_all_students_for(){
        $this->db->select('u.*');
        $this->db->from('student_data u');
        $this->db->where('u.is_deleted',NULL);
        $this->db->order_by('u.student_id','DESC');
        $this->db->limit(2);
        $query = $this->db->get();
        $query = $query->result_array();  
        return $query;
    }
    */
    // select unassigned students
      function get_all_students_for(){
        $this->db->select('*');
        $this->db->from('students');
        $this->db->where('is_deleted',NULL);
        $this->db->order_by('student_id','DESC');
        $this->db->limit(2);
        $query = $this->db->get();
        $query = $query->result_array();  
        return $query;
      }
      /*
       function get_unassigned_students(){
        $this->db->select('u.*');
        $this->db->from('student_data u');
        $this->db->order_by('u.student_id','DESC');
        $this->db->where('u.is_assigned IS NULL AND is_deleted IS NULL or is_deleted <> 1');
        $this->db->where('u.is_assigned',NULL);
        $query = $this->db->get();
        $query = $query->result_array();  
        return $query;
    }
    */
    function get_unassigned_students(){
        $this->db->select('u.*');
        $this->db->from('students u');
        $this->db->order_by('u.student_id','DESC');
        $this->db->where('u.is_assigned IS NULL AND is_deleted IS NULL or is_deleted <> 1');
        $this->db->where('u.is_assigned',NULL);
        $query = $this->db->get();
        $query = $query->result_array();  
        return $query;
    }

    // get assigned students
    function get_assigned_students(){
        $this->db->select('u.*');
        $this->db->from('emp_task_assigned u');
        // $this->db->order_by('u.student_id','DESC');
        // $this->db->where('u.is_assigned',NULL);
        $query = $this->db->get();
        $query = $query->result_array();  
        return $query;
    }


//-- get the banks ids
     function get_all_students_bank_ids(){
        $this->db->select('u.*');
        $this->db->from('student_bank_ids u');
        $this->db->order_by('u.id','DESC');
        $query = $this->db->get();
        $query = $query->result_array();  
        return $query;
    }
//--- get single bank Id

    function get_single_bank_id($id){
        $this->db->select('u.*');
        $this->db->from('student_bank_ids u');
        $this->db->where('u.student_id',$id);
        $query = $this->db->get();
        $query = $query->row();  
        return $query;
    }


//--- get single bank Id

    function get_single_studentStatus_id($id){
        $this->db->select('*');
        $this->db->from('student_status_data');
        $this->db->where('student_id',$id);
        $query = $this->db->get();
        $query = $query->row();  
        return $query;
    }

// --- get modified history

    function get_modfication_historyData($id,$ftype){

        $this->db->select('smu.*');
        $this->db->from('student_modified_history smu');
        if($ftype == 'student') {

           $this->db->where('smu.student_id',$id);

        } else if($ftype == 'employee' ) {

            $this->db->where('smu.emp_id',$id);

        }
        $query = $this->db->get();
        $query = $query->result_array();  
        return $query;
    

    }




    //-- count active, inactive and total user
    function get_user_total(){
        $this->db->select('*');
        $this->db->select('count(*) as total');
        $this->db->select('(SELECT count(user.id)
                            FROM user 
                            WHERE (user.status = 1)
                            )
                            AS active_user',TRUE);

        $this->db->select('(SELECT count(user.id)
                            FROM user 
                            WHERE (user.status = 0)
                            )
                            AS inactive_user',TRUE);

        $this->db->select('(SELECT count(user.id)
                            FROM user 
                            WHERE (user.role = "admin")
                            )
                            AS admin',TRUE);

        $this->db->from('user');
        $query = $this->db->get();
        $query = $query->row();  
        return $query;
    }

      //-- count active, inactive and total user
    function get_students_total(){
        // $this->db->select('*');
        $this->db->select('count(*) as total');
        $this->db->where('`is_deleted` IS NULL or `is_deleted` <> 1');
        $this->db->select('((SELECT COUNT(student_id) FROM students WHERE `student_id` IN (SELECT student_id FROM student_status_data) AND `is_deleted` IS NULL or `is_deleted` <> 1)) AS submittedStudent',TRUE);
          
          /*
       $this->db->select('((SELECT student_id FROM student_status_data) AND `is_deleted` IS NULL or `is_deleted` <> 1)) AS submittedStudent',TRUE);
       */
       $this->db->select('(SELECT COUNT(student_id) 
                            FROM student_data 
                            WHERE student_id NOT IN (SELECT student_id FROM student_status_data)  AND is_deleted IS NULL or is_deleted <> 1
                            ) AS pendingStudent',TRUE);
        $this->db->select('(SELECT COUNT(student_id) 
                            FROM student_data 
                            WHERE student_id NOT IN (SELECT student_id FROM student_status_data)  AND is_deleted IS NULL or is_deleted <> 1
                            ) AS pendingStudent',TRUE);
        // for college site

        $this->db->select('(SELECT count(*) FROM `students` WHERE `student_id` IN (SELECT `student_id` FROM `student_status_data` WHERE `student_status` LIKE "%pending_by_college%") AND `is_deleted` IS NULL or `is_deleted` <> 1) AS pendingCollege',TRUE);

        $this->db->select('(SELECT count(*) FROM `student_data` WHERE `student_id` IN (SELECT `student_id` FROM `student_status_data` WHERE `student_status` LIKE "%defect_by_college%") AND `is_deleted` IS NULL or `is_deleted` <> 1) AS defectCollege',TRUE);


        $this->db->select('(SELECT count(*) FROM `student_data` WHERE `student_id` IN (SELECT `student_id` FROM `student_status_data` WHERE `student_status` LIKE "%approved_by_college%") AND `is_deleted` IS NULL or `is_deleted` <> 1) AS approvedCollege',TRUE);


        $this->db->select('(SELECT count(*) FROM `student_data` WHERE `student_id` IN (SELECT `student_id` FROM `student_status_data` WHERE `student_status` LIKE "%college_reject%") AND `is_deleted` IS NULL or `is_deleted` <> 1) AS rejectCollege',TRUE);

        // for nsp site

        $this->db->select('(SELECT count(*) FROM `student_data` WHERE `student_id` IN (SELECT `student_id` FROM `student_status_data` WHERE `student_status` LIKE "%pending_by_nsp%") AND `is_deleted` IS NULL or `is_deleted` <> 1) AS pendingNsp',TRUE);

        $this->db->select('(SELECT count(*) FROM `student_data` WHERE `student_id` IN (SELECT `student_id` FROM `student_status_data` WHERE `student_status` LIKE "%defect_by_nsp%") AND `is_deleted` IS NULL or `is_deleted` <> 1) AS defectNsp',TRUE);

        $this->db->select('(SELECT count(*) FROM `student_data` WHERE `student_id` IN (SELECT `student_id` FROM `student_status_data` WHERE `student_status` LIKE "%approved_by_nsp%") AND `is_deleted` IS NULL or `is_deleted` <> 1) AS approvedNsp',TRUE);

        $this->db->select('(SELECT count(*) FROM `student_data` WHERE `student_id` IN (SELECT `student_id` FROM `student_status_data` WHERE `student_status` LIKE "%nsp_reject%") AND `is_deleted` IS NULL or `is_deleted` <> 1) AS rejectNsp',TRUE);
         /*
        $this->db->select('((SELECT COUNT(student_id) FROM `students` WHERE `student_id` IN (SELECT student_id FROM student_status_data) AND `is_deleted` IS NULL or `is_deleted` <> 1)) AS submittedStudent',TRUE);

        $this->db->select('(SELECT COUNT(student_id) 
                            FROM students 
                            WHERE student_id NOT IN (SELECT student_id FROM student_status_data)  AND is_deleted IS NULL or is_deleted <> 1
                            ) AS pendingStudent',TRUE);
        // for college site

        $this->db->select('(SELECT count(*) FROM `students` WHERE `student_id` IN (SELECT `student_id` FROM `student_status_data` WHERE `student_status` LIKE "%pending_by_college%") AND `is_deleted` IS NULL or `is_deleted` <> 1) AS pendingCollege',TRUE);

        $this->db->select('(SELECT count(*) FROM `students` WHERE `student_id` IN (SELECT `student_id` FROM `student_status_data` WHERE `student_status` LIKE "%defect_by_college%") AND `is_deleted` IS NULL or `is_deleted` <> 1) AS defectCollege',TRUE);


        $this->db->select('(SELECT count(*) FROM `students` WHERE `student_id` IN (SELECT `student_id` FROM `student_status_data` WHERE `student_status` LIKE "%approved_by_college%") AND `is_deleted` IS NULL or `is_deleted` <> 1) AS approvedCollege',TRUE);


        $this->db->select('(SELECT count(*) FROM `students` WHERE `student_id` IN (SELECT `student_id` FROM `student_status_data` WHERE `student_status` LIKE "%college_reject%") AND `is_deleted` IS NULL or `is_deleted` <> 1) AS rejectCollege',TRUE);

        // for nsp site

        $this->db->select('(SELECT count(*) FROM `students` WHERE `student_id` IN (SELECT `student_id` FROM `student_status_data` WHERE `student_status` LIKE "%pending_by_nsp%") AND `is_deleted` IS NULL or `is_deleted` <> 1) AS pendingNsp',TRUE);

        $this->db->select('(SELECT count(*) FROM `students` WHERE `student_id` IN (SELECT `student_id` FROM `student_status_data` WHERE `student_status` LIKE "%defect_by_nsp%") AND `is_deleted` IS NULL or `is_deleted` <> 1) AS defectNsp',TRUE);

        $this->db->select('(SELECT count(*) FROM `students` WHERE `student_id` IN (SELECT `student_id` FROM `student_status_data` WHERE `student_status` LIKE "%approved_by_nsp%") AND `is_deleted` IS NULL or `is_deleted` <> 1) AS approvedNsp',TRUE);

        $this->db->select('(SELECT count(*) FROM `students` WHERE `student_id` IN (SELECT `student_id` FROM `student_status_data` WHERE `student_status` LIKE "%nsp_reject%") AND `is_deleted` IS NULL or `is_deleted` <> 1) AS rejectNsp',TRUE);
        */
        // for our site section 

        /*
            - approved_by_our_site
            - pending_by_our_site
            - defect_by_our_site
            - reject_by_our_site
        */

          $this->db->select('(SELECT count(*) FROM `student_data` WHERE `student_id` IN (SELECT `student_id` FROM `student_status_data` WHERE `student_status` LIKE "%pending_by_our_site%") AND `is_deleted` IS NULL or `is_deleted` <> 1) AS pendingOurSite',TRUE);

        $this->db->select('(SELECT count(*) FROM `student_data` WHERE `student_id` IN (SELECT `student_id` FROM `student_status_data` WHERE `student_status` LIKE "%defect_by_our_site%") AND `is_deleted` IS NULL or `is_deleted` <> 1) AS defectOurSite',TRUE);

        $this->db->select('(SELECT count(*) FROM `student_data` WHERE `student_id` IN (SELECT `student_id` FROM `student_status_data` WHERE `student_status` LIKE "%approved_by_our_site%") AND `is_deleted` IS NULL or `is_deleted` <> 1) AS approvedOurSite',TRUE);

        $this->db->select('(SELECT count(*) FROM `student_data` WHERE `student_id` IN (SELECT `student_id` FROM `student_status_data` WHERE `student_status` LIKE "%reject_by_our_site%") AND `is_deleted` IS NULL or `is_deleted` <> 1) AS rejectOurSite',TRUE);


        $this->db->from('students');
        $query = $this->db->get();
        $query = $query->row();  
        return $query;
    }

  //-- get Our site Pending , Active
  /*
    function get_Oursite_student_details($pendingColoumn ='pending'){
        $this->db->select('*');
        $this->db->from('student_data');
        if($pendingColoumn == 'pending'){
            $this->db->where(' student_id NOT IN (SELECT student_id FROM student_status_data) AND is_deleted IS NULL or is_deleted <> 1');    
        } else {
            $this->db->where(' student_id IN (SELECT student_id FROM student_status_data) AND is_deleted IS NULL or is_deleted <> 1');   
        }
        
        $query = $this->db->get();
        $query = $query->result_array();  
        return $query;
    }
*/
  function get_Oursite_student_details($pendingColoumn ='pending'){
        $this->db->select('*');
        $this->db->from('students');
        if($pendingColoumn == 'pending'){
            $this->db->where(' student_id NOT IN (SELECT student_id FROM student_status_data) AND is_deleted IS NULL or is_deleted <> 1');    
        } else {
            $this->db->where(' student_id IN (SELECT student_id FROM student_status_data) AND is_deleted IS NULL or is_deleted <> 1');   
        }
        $query = $this->db->get();
        $query = $query->result_array();  
        return $query;
    }


    //- get College pending,approved,defect,reject studensts
     function get_college_studentDetails($condition)
     {
        $this->db->select('*');
        $this->db->from('students');
        $this->db->where(' student_id IN (SELECT `student_id` FROM `student_status_data`  WHERE `student_status` LIKE "%'.$condition.'%") AND is_deleted IS NULL or is_deleted <> 1');      
        
        $query = $this->db->get();
        $query = $query->result_array();  
        return $query;
     }
     /*
     function get_college_studentDetails($condition)
     {
        $this->db->select('*');
        $this->db->from('student_data');
        $this->db->where(' student_id IN (SELECT `student_id` FROM `student_status_data`  WHERE `student_status` LIKE "%'.$condition.'%") AND is_deleted IS NULL or is_deleted <> 1');      
        
        $query = $this->db->get();
        $query = $query->result_array();  
        return $query;
     }
     */

     //get chat history of 2 employees

     function getChatHistory($to,$from){

        //select * from `chat` where `to` = 'super_admin_admin1' and `from` = 'abhijit_sarkar_abc' and `sender_deleted` = 'no' || `to` = 'abhijit_sarkar_abc' and `from` = 'super_admin_admin1' and `receiver_deleted` = 'no' order by `id` desc 

        //select * ,chat_vpb_users.photo from `chat` INNER JOIN `chat_vpb_users` ON chat.to = chat_vpb_users.username where `to` = 'super_admin_admin1' and `from` = 'abhijit_sarkar_abc' and `sender_deleted` = 'no' || `to` = 'abhijit_sarkar_abc' and `from` = 'super_admin_admin1' and `receiver_deleted` = 'no' order by `chat`.id desc

        //select * from chat inner join chat_vpb_users where chat.to=chat_vpb_users.username or chat.from=chat_vpb_users.username


        $this->db->select('*');
        $this->db->from('chat');
        $this->db->join('chat_vpb_users', 'chat.from = `chat_vpb_users`.username','inner');
        $this->db->where("`to` = '".$to."' and `from` = '".$from."' and `sender_deleted` = 'no' || `to` = '".$from."' and `from` = '".$to."' and `receiver_deleted` = 'no' order by chat.`id` desc"); 

        $query = $this->db->get();
        $query = $query->result_array();  
        return $query;




     }
    //-- image upload function with resize option

    function upload_image($max_size,$fieldName){
        
          //   echo "<pre>";
          //   // print_r($fieldName);
          // print_r($_FILES[$fieldName]['size']);
          // die('test');
            //-- set upload path
            $config['upload_path']  = "./assets/images/";
            $config['allowed_types']= 'gif|jpg|png|jpeg';
            $config['max_size']     = '92000';
            $config['max_width']    = '92000';
            $config['max_height']   = '92000';
            $config['encrypt_name'] = TRUE;

            // $new_name = time().$_FILES["userfiles"]['name'].uniqid();
            // $config['file_name'] = $new_name;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload($fieldName)) {

                
                $data = $this->upload->data();
              
                    //-- set upload path
                    $source             = "./assets/images/".$data['file_name'];
                    $destination_thumb  = "./assets/images/thumbnail/" ;
                    $destination_medium = "./assets/images/medium/" ;
              
                $main_img = $data['file_name'];
                // Permission Configuration
                chmod($source, 0777) ;

                /* Resizing Processing */
                // Configuration Of Image Manipulation :: Static
                $this->load->library('image_lib') ;
                $img['image_library'] = 'GD2';
                $img['create_thumb']  = TRUE;
                $img['maintain_ratio']= TRUE;

                /// Limit Width Resize
                $limit_medium   = $max_size ;
                $limit_thumb    = 200 ;

                // Size Image Limit was using (LIMIT TOP)
                $limit_use  = $data['image_width'] > $data['image_height'] ? $data['image_width'] : $data['image_height'] ;

                // Percentase Resize
                if ($limit_use > $limit_medium || $limit_use > $limit_thumb) {
                    $percent_medium = $limit_medium/$limit_use ;
                    $percent_thumb  = $limit_thumb/$limit_use ;
                }

                //// Making THUMBNAIL ///////
                $img['width']  = $limit_use > $limit_thumb ?  $data['image_width'] * $percent_thumb : $data['image_width'] ;
                $img['height'] = $limit_use > $limit_thumb ?  $data['image_height'] * $percent_thumb : $data['image_height'] ;

                // Configuration Of Image Manipulation :: Dynamic
                $img['thumb_marker'] = '_thumb-'.floor($img['width']).'x'.floor($img['height']) ;
                $img['quality']      = ' 100%' ;
                $img['source_image'] = $source ;
                $img['new_image']    = $destination_thumb ;

                $thumb_nail = $data['raw_name']. $img['thumb_marker'].$data['file_ext'];
                // Do Resizing
                $this->image_lib->initialize($img);
                $this->image_lib->resize();
                $this->image_lib->clear() ;

                ////// Making MEDIUM /////////////
                $img['width']   = $limit_use > $limit_medium ?  $data['image_width'] * $percent_medium : $data['image_width'] ;
                $img['height']  = $limit_use > $limit_medium ?  $data['image_height'] * $percent_medium : $data['image_height'] ;

                // Configuration Of Image Manipulation :: Dynamic
                $img['thumb_marker'] = '_medium-'.floor($img['width']).'x'.floor($img['height']) ;
                $img['quality']      = '100%' ;
                $img['source_image'] = $source ;
                $img['new_image']    = $destination_medium ;

                $mid = $data['raw_name']. $img['thumb_marker'].$data['file_ext'];
                // Do Resizing
                $this->image_lib->initialize($img);
                $this->image_lib->resize();
                $this->image_lib->clear() ;

                //-- set upload path
                $images = 'assets/images/medium/'.$mid;
                $thumb  = 'assets/images/thumbnail/'.$thumb_nail;
                $source = "/assets/images/".$data['file_name'];
                //unlink($source) ;

                return array(
                    'images' => $images,
                    'thumb' => $thumb,
                    'mainImg'=>$source
                );
            }
            else {
                $error_msg = array('msg' => $this->upload->display_errors()); 
                // print_r($error);
                // echo "<br>Failed! to upload image" ;
                // $error_msg['msg'] = 'Failed';
                return $error_msg;
            }
            
    }

}