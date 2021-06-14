
<?php 
//include("header.php");
include_once 'db.php';

  /*
  $result = mysqli_query($conn,"SELECT * FROM students");  
  
  if(mysqli_num_rows($result) > 0) {
      
   $i=0;
   while($unserlizedData = mysqli_fetch_array($result)) {
     
    $unserlizedData = unserialize($row["student_uploaded_data"]);
    $st= $row["student_id"];
    $dis=$row['is_assigned'];
    $dds=$row['is_deleted'];
    $tr= $row["tr_number"];
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
    $bonafide=$unserlizedData['bonafide'];
    $p_photo=$unserlizedData['p_photo'];
    $prtc=$unserlizedData['prtc'];
    $caste_certi=$unserlizedData['caste_certi'];
    $ac_front=$unserlizedData['ac_front'];
    $ac_back=$unserlizedData['ac_back'];
    $income_certi=$unserlizedData['income_certi'];
 
    
    $sql="
    INSERT INTO students(
    student_id,
    is_assigned,
    is_deleted,
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
  */
  
  $result = mysqli_query($conn,"SELECT * FROM user");
  
    if(mysqli_num_rows($result) > 0) {
      
   $i=0;
   while($unserlizedData = mysqli_fetch_array($result)) {
       /*
       id,
  first_name,
  last_name,
  chat_username,
  email,
  password,
  mobile,
  alt_mobile,
  address1,
  address2,
  pin_code,
  addr_state,
  country,
  bank_name,
  account_number,
  ifsc_code,
  aadhar_card,
  voter_id,
  bank_passbook,
  profile_pic,
  status,
  role,
  user_ip,
  otp_email,
  otp_confirmed,
  created_at,
  is_deleted
  
  '$first_name',
  '$last_name',
  '$chat_username',
  '$email',
  '$password',
  '$mobile',
  '$alt_mobile',
  '$address1',
  '$address2',
  '$pin_code',
  '$addr_state',
  '$country',
  '$bank_name',
  '$account_number',
  '$ifsc_code',
  '$aadhar_card',
  '$voter_id',
  '$bank_passbook',
  '$profile_pic',
  '$status',
  '$role',
  '$user_ip',
  '$otp_email',
  '$otp_confirmed',
  '$created_at',
  '$is_deleted'
    */
    
   
   $first_name=$unserlizedData['first_name'];
   
  $last_name=$unserlizedData['last_name'];
  //chat_username 
  $chat_username=$unserlizedData['chat_username'];
  //email 
  $email=$unserlizedData['email'];
  //password 
  $password=$unserlizedData['password'];
//   mobile 
  $mobile=$unserlizedData['mobile'];
//   alt_mobile 
  $alt_mobile=$unserlizedData['alt_mobile'];
//   address1 
  $address1=$unserlizedData['address1'];
//   address2 
  $address2=$unserlizedData['address2'];
//   pin_code
  $pin_code=$unserlizedData['pin_code'];
//   addr_state 
  $addr_state=$unserlizedData['addr_state'];
//   country 
  $country=$unserlizedData['country'];
//   bank_name 
  $bank_name=$unserlizedData['bank_name'];
//   account_number 
  $account_number=$unserlizedData['account_number'];
//   ifsc_code 
  $ifsc_code=$unserlizedData['ifsc_code'];
//   aadhar_card
  $aadhar_card=$unserlizedData['aadhar_card'];
//   voter_id 
  $voter_id=$unserlizedData['voter_id'];
//   bank_passbook 
  $bank_passbook=$unserlizedData['bank_passbook'];
//   profile_pic 
  $profile_pic=$unserlizedData['profile_pic'];
//   status 
  $status=$unserlizedData['status'];
//   role 
  $role=$unserlizedData['role'];
//   user_ip 
  $user_ip=$unserlizedData['user_ip'];
//   otp_email 
  $otp_email=$unserlizedData['otp_email'];
//   otp_confirmed 
  $otp_confirmed=$unserlizedData['otp_confirmed'];
//   created_at
  $created_at=$unserlizedData['created_at'];
//   is_deleted 
  $is_deleted=$unserlizedData['is_deleted'];
  
  
    $aadhar_card1=$unserlizedData['aadhar_card'];
    $aadhar_card=str_replace("https://hellonsp.in/","",$aadhar_card1);
    $voter_id1=$unserlizedData['voter_id'];
    $voter_id=str_replace("https://hellonsp.in/","",$voter_id1);
    $bank_passbook1=$unserlizedData['bank_passbook'];
    $bank_passbook=str_replace("https://hellonsp.in/","",$bank_passbook1);
    $profile_pic1=$unserlizedData['profile_pic'];
    $profile_pic=str_replace("https://hellonsp.in/","",$profile_pic1);
 
    $sql="
    INSERT INTO user2(
   first_name,
  last_name,
  chat_username,
  email,
  password,
  mobile,
  alt_mobile,
  address1,
  address2,
  pin_code,
  addr_state,
  country,
  bank_name,
  account_number,
  ifsc_code,
  aadhar_card,
  voter_id,
  bank_passbook,
  profile_pic,
  status,
  role,
  user_ip,
  otp_email,
  otp_confirmed,
  created_at,
  is_deleted
    )VALUES(
    '$first_name',
  '$last_name',
  '$chat_username',
  '$email',
  '$password',
  '$mobile',
  '$alt_mobile',
  '$address1',
  '$address2',
  '$pin_code',
  '$addr_state',
  '$country',
  '$bank_name',
  '$account_number',
  '$ifsc_code',
  '$aadhar_card',
  '$voter_id',
  '$bank_passbook',
  '$profile_pic',
  '$status',
  '$role',
  '$user_ip',
  '$otp_email',
  '$otp_confirmed',
  '$created_at',
  '$is_deleted'
      )";

   if ($conn->query($sql) === TRUE) {
      echo "New record created successfully<br>";
  
   } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
   }

   }
  } 
  
  
  
  
  ?>
   