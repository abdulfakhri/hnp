
<?php 
//include("header.php");
include_once 'db.php';
/*
CREATE TABLE `students2` (
  `student_id` int(150) NOT NULL,
  `account_number` varchar(150) DEFAULT NULL,
  `bankstatus` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `api_bank_st` varchar(150) DEFAULT NULL,
  `api_fetched_name` varchar(150) DEFAULT NULL,
  `is_assigned` varchar(150) DEFAULT NULL,
  `is_deleted` varchar(150) DEFAULT NULL,
  `tr_number` varchar(150) DEFAULT NULL,
  `trnumber` varchar(150) DEFAULT NULL,
  `bnk_acnt_number` varchar(150) DEFAULT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `first_name` varchar(150) DEFAULT NULL,
  `last_name` varchar(150) DEFAULT NULL,
  `dad_name` varchar(150) DEFAULT NULL,
  `mom_name` varchar(150) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(150) DEFAULT NULL,
  `mobile` varchar(150) DEFAULT NULL,
  `aadhar_number` varchar(150) DEFAULT NULL,
  `income_details` varchar(150) DEFAULT NULL,
  `district` varchar(150) DEFAULT NULL,
  `sub_division` varchar(150) DEFAULT NULL,
  `state` varchar(150) DEFAULT NULL,
  `caste_details` varchar(150) DEFAULT NULL,
  `address1` varchar(150) DEFAULT NULL,
  `pin_code` varchar(150) DEFAULT NULL,
  `ten_year` varchar(150) DEFAULT NULL,
  `ten_marks` varchar(150) DEFAULT NULL,
  `plustwo_year` varchar(150) DEFAULT NULL,
  `plustwo_marks` varchar(150) DEFAULT NULL,
  `uploadedBy` varchar(150) DEFAULT NULL,
  `createdAt` varchar(150) DEFAULT NULL,
  `updatedAt` varchar(150) DEFAULT NULL,
  `lastModifiedBy` varchar(150) DEFAULT NULL,
  `education_details` varchar(150) DEFAULT NULL,
  `course_details` varchar(150) DEFAULT NULL,
  `education_details_year` varchar(150) DEFAULT NULL,
  `scholarship_amount` varchar(150) DEFAULT NULL,
  `bank_name` varchar(150) DEFAULT NULL,
  `ifsc_code` varchar(150) DEFAULT NULL,
  `agent_name` varchar(150) DEFAULT NULL,
  `agent_mobile` varchar(150) DEFAULT NULL,
  `remarks` varchar(150) DEFAULT NULL,
  `bonafide` varchar(150) DEFAULT NULL,
  `p_photo` varchar(150) DEFAULT NULL,
  `prtc` varchar(150) DEFAULT NULL,
  `caste_certi` varchar(150) DEFAULT NULL,
  `ac_front` varchar(150) DEFAULT NULL,
  `ac_back` varchar(150) DEFAULT NULL,
  `income_certi` varchar(150) DEFAULT NULL,
  `salary` varchar(20) DEFAULT NULL,
  `city` varchar(80) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
*/
  
  $result = mysqli_query($conn,"SELECT * FROM student_data LIMIT 1");  
  
  if(mysqli_num_rows($result) > 0) {
      
   $i=0;
   //while($unserlizedData = mysqli_fetch_array($result)) {
 while($row= mysqli_fetch_array($result)) {
     /*
    student_id` int(255) NOT NULL,
  `student_uploaded_data` varchar(10000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tr_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bnk_acnt_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_assigned` int(11) DEFAULT NULL,
  `is_deleted` int(11) DEFAULT NULL,
  `api_fetched_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `api_json_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `api_bank_st` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
    */ 
    $unserlizedData = unserialize($row["student_uploaded_data"]);
    $st= $row["student_id"];
    $dis=$row['is_assigned'];
    $dds=$row['is_deleted'];
    $tr= $row["tr_number"];
    /*
    $st= $unserlizedData["student_id"];
    $dis=$unserlizedData['is_assigned'];
    $dds=$unserlizedData['is_deleted'];
    $tr= $unserlizedData["tr_number"];
    */
    $bankstatus=$row['bankstatus'];
    $api_bank_st=$row['api_bank_st'];
    $api_fetched_name=$row['api_fetched_name'];
    $bnk=$unserlizedData['account_number'];
    $first_name=$unserlizedData['first_name'];
    $last_name=$unserlizedData['last_name'];
    $full_name=$unserlizedData['first_name']." ".$unserlizedData['last_name'];
    $caste=$unserlizedData['caste_details'];
    $createdyear=$unserlizedData['createdAt'];
    $state=$unserlizedData['state'];
    $trnumber=$unserlizedData['trnumber'];
    $bnk_acnt_number=$row['bnk_acnt_number'];
    $dad_name=$unserlizedData['dad_name'];
    $mom_name=$unserlizedData['mom_name'];
    $dob=$unserlizedData['dob'];
    $gender=$unserlizedData['gender'];
    $mobile=$unserlizedData['mobile'];
    $aadhar_number=$unserlizedData['aadhar_number'];
    $income_details=$unserlizedData['income_details'];
    $district=$unserlizedData['district'];
    $sub_division=$unserlizedData['sub_division'];
    $caste_details=$unserlizedData['caste_details'];
    $address1=$unserlizedData['address1'];
    $pin_code=$unserlizedData['pin_code'];
    $ten_year=$unserlizedData['ten_year'];
    $ten_marks=$unserlizedData['ten_marks'];
    $plustwo_year=$unserlizedData['plustwo_year'];
    $plustwo_marks=$unserlizedData['plustwo_marks'];
    $uploadedBy=$unserlizedData['uploadedBy'];
    $createdAt=$unserlizedData['createdAt'];
    $updatedAt=$unserlizedData['updatedAt'];
    $lastModifiedBy=$unserlizedData['lastModifiedBy'];
    $uploadedBy=$unserlizedData['uploadedBy'];
    $createdAt=$unserlizedData['createdAt'];
    $updatedAt=$unserlizedData['updatedAt'];
    $lastModifiedBy=$unserlizedData['lastModifiedBy'];
    $education_details=$unserlizedData['education_details'];
    $course_details=$unserlizedData['course_details'];
    $education_details_year=$unserlizedData['education_details_year'];
    $scholarship_amount=$unserlizedData['scholarship_amount'];
    $bank_name=$unserlizedData['bank_name'];
    $account_number=$unserlizedData['account_number'];
    $ifsc_code=$unserlizedData['ifsc_code'];
    $agent_name=$unserlizedData['agent_name'];
    $bank_name=$unserlizedData['bank_name'];
   
    $agent_name=$unserlizedData['agent_name'];
    $agent_mobile=$unserlizedData['agent_mobile'];
    $remarks=$unserlizedData['remarks'];
    $bonafide1=$unserlizedData['bonafide'];
    $bonafide2=str_replace("http://hellonsp.in/","",$bonafide1);
    $bonafide3=str_replace("https://hellonsp.in/","",$bonafide2);
    list($bonafide, $img) = explode(',', $bonafide3);
    $p_photo1=$unserlizedData['p_photo'];
    $p_photo2=str_replace("http://hellonsp.in/","",$p_photo1);
    $p_photo3=str_replace("https://hellonsp.in/","",$p_photo2);
    list($p_photo, $img) = explode(',', $p_photo3);
    $prtc1=$unserlizedData['prtc'];
    $prtc2=str_replace("http://hellonsp.in/","",$prtc1);
    $prtc3=str_replace("https://hellonsp.in/","",$prtc2);
    list($prtc, $img) = explode(',', $prtc3);
    $caste_certi1=$unserlizedData['caste_certi'];
    $caste_certi2=str_replace("http://hellonsp.in/","",$caste_certi1);
    $caste_certi3=str_replace("https://hellonsp.in/","",$caste_certi2);
    list($caste_certi, $img) = explode(',', $caste_certi3);
    $ac_front1=$unserlizedData['ac_front'];
    $ac_front2=str_replace("http://hellonsp.in/","",$ac_front1);
    $ac_front3=str_replace("https://hellonsp.in/","",$ac_front2);
    list($ac_front, $img) = explode(',', $ac_front3);
    $ac_back1=$unserlizedData['ac_back'];
    $ac_back2=str_replace("http://hellonsp.in/","",$ac_back1);
    $ac_back3=str_replace("https://hellonsp.in/","",$ac_back2);
    list($ac_back, $img) = explode(',', $ac_back3);
    $income_certi1=$unserlizedData['income_certi'];
    $income_certi2=str_replace("http://hellonsp.in/","",$income_certi1);
    $income_certi3=str_replace("https://hellonsp.in/","",$income_certi2);
    list($income_certi, $img) = explode(',', $income_certi3);
/*
while($row= mysqli_fetch_array($result)) {

    $bankstatus=$unserlizedData['bankstatus'];
    $api_bank_st=$unserlizedData['api_bank_st'];
    $api_fetched_name=$unserlizedData['api_fetched_name'];
    $bnk=$unserlizedData['account_number'];
    $first_name=$unserlizedData['first_name'];
    $last_name=$unserlizedData['last_name'];
    $full_name=$unserlizedData['first_name']." ".$unserlizedData['last_name'];
    $caste=$unserlizedData['caste_details'];
    $createdyear=$unserlizedData['createdAt'];
    $state=$unserlizedData['state'];
    $trnumber=$unserlizedData['trnumber'];
    $bnk_acnt_number=$row['bnk_acnt_number'];
    $dad_name=$unserlizedData['dad_name'];
    $mom_name=$unserlizedData['mom_name'];
    $dob=$unserlizedData['dob'];
    $gender=$unserlizedData['gender'];
    $mobile=$unserlizedData['mobile'];
    $aadhar_number=$unserlizedData['aadhar_number'];
    $income_details=$unserlizedData['income_details'];
    $district=$unserlizedData['district'];
    $sub_division=$unserlizedData['sub_division'];
    $caste_details=$unserlizedData['caste_details'];
    $address1=$unserlizedData['address1'];
    $pin_code=$unserlizedData['pin_code'];
    $ten_year=$unserlizedData['ten_year'];
    $ten_marks=$unserlizedData['ten_marks'];
    $plustwo_year=$unserlizedData['plustwo_year'];
    $plustwo_marks=$unserlizedData['plustwo_marks'];
    $uploadedBy=$unserlizedData['uploadedBy'];
    $createdAt=$unserlizedData['createdAt'];
    $updatedAt=$unserlizedData['updatedAt'];
    $lastModifiedBy=$unserlizedData['lastModifiedBy'];
    $uploadedBy=$unserlizedData['uploadedBy'];
    $createdAt=$unserlizedData['createdAt'];
    $updatedAt=$unserlizedData['updatedAt'];
    $lastModifiedBy=$unserlizedData['lastModifiedBy'];
    $education_details=$unserlizedData['education_details'];
    $course_details=$unserlizedData['course_details'];
    $education_details_year=$unserlizedData['education_details_year'];
    $scholarship_amount=$unserlizedData['scholarship_amount'];
    $bank_name=$unserlizedData['bank_name'];
    $account_number=$unserlizedData['account_number'];
    $ifsc_code=$unserlizedData['ifsc_code'];
    $agent_name=$unserlizedData['agent_name'];
    $bank_name=$unserlizedData['bank_name'];
    $account_number=$unserlizedData['account_number'];
    $agent_name=$unserlizedData['agent_name'];
    $agent_mobile=$unserlizedData['agent_mobile'];
    $remarks=$unserlizedData['remarks'];
    $bonafide1=$unserlizedData['bonafide'];
    $bonafide=str_replace("http://hellonsp.in/","",$bonafide1);
    $p_photo1=$unserlizedData['p_photo'];
    $p_photo=str_replace("http://hellonsp.in/","",$p_photo1);
    $prtc1=$unserlizedData['prtc'];
    $prtc2=str_replace("http://hellonsp.in/","",$prtc1);
    $prtc=str_replace("https://hellonsp.in/","",$prtc2);
    $caste_certi1=$unserlizedData['caste_certi'];
    $caste_certi2=str_replace("http://hellonsp.in/","",$caste_certi1);
    $caste_certi=str_replace("https://hellonsp.in/","",$caste_certi2);
    $ac_front1=$unserlizedData['ac_front'];
    $ac_front2=str_replace("http://hellonsp.in/","",$ac_front1);
    $ac_front=str_replace("http://hellonsp.in/","",$ac_front2);
    $ac_back1=$unserlizedData['ac_back'];
    $ac_back2=str_replace("http://hellonsp.in/","",$ac_back1);
    $ac_back=str_replace("http://hellonsp.in/","",$ac_back2);
    $income_certi1=$unserlizedData['income_certi'];
    $income_certi2=str_replace("http://hellonsp.in/","",$income_certi1);
    $income_certi=str_replace("http://hellonsp.in/","",$income_certi2);
    

*/
    
    $sql="
    INSERT INTO students3(
    student_id,
    is_assigned,
    is_deleted,
    bankstatus,
    api_bank_st,
    api_fetched_name,
  tr_number,
  trnumber,
  bnk_acnt_number,
  full_name,
  first_name,
  last_name,
  dad_name,
  mom_name,
  dob,
  gender,
  mobile,
  aadhar_number,
  income_details,
  district,
  sub_division,
  state,
  caste_details,
  address1,
  pin_code,
  ten_year,
  ten_marks,
  plustwo_year,
  plustwo_marks,
  uploadedBy,
  createdAt,
  updatedAt,
  lastModifiedBy,
  education_details,
  course_details,
  education_details_year,
  scholarship_amount,
  bank_name,
  account_number,
  ifsc_code,
  agent_name,
  agent_mobile,
  remarks,
  bonafide,
  p_photo,
  prtc,
  caste_certi,
  ac_front,
  ac_back,
   income_certi)VALUES(
  '$st',
  '$dis',
  '$dds',
  '$bankstatus',
  '$api_bank_st',
  '$api_fetched_name',
  '$tr',
  '$trnumber',
  '$bnk_acnt_number',
  '$full_name',
  '$first_name',
  '$last_name',
  '$dad_name',
  '$mom_name',
  '$dob',
  '$gender',
  '$mobile',
  '$aadhar_number',
  '$income_details',
  '$district',
  '$sub_division',
  '$state',
  '$caste_details',
  '$address1',
  '$pin_code',
  '$ten_year',
  '$ten_marks',
  '$plustwo_year',
  '$plustwo_marks',
  '$uploadedBy',
  '$createdAt',
  '$updatedAt',
  '$lastModifiedBy',
  '$education_details',
  '$course_details',
  '$education_details_year',
  '$scholarship_amount',
  '$bank_name',
  '$account_number',
  '$ifsc_code',
  '$agent_name',
  '$agent_mobile',
  '$remarks',
  '$bonafide',
  '$p_photo',
  '$prtc',
  '$caste_certi',
  '$ac_front',
  '$ac_back',
  '$income_certi'
  )";

   if ($conn->query($sql) === TRUE) {
      echo "New record created successfully<br>";
  
   } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
   }

   }
  } 
  
  

  
  
  
  
  ?>
   