
<?php 
//include("header.php");
include_once 'db.php';

  $result = mysqli_query($conn,"SELECT * FROM students");  
  
  if(mysqli_num_rows($result) > 0) {
      
   $i=0;
   while($unserlizedData = mysqli_fetch_array($result)) {

    $st= $unserlizedData["student_id"];
    $dis=$unserlizedData['is_assigned'];
    $dds=$unserlizedData['is_deleted'];
    $tr= $unserlizedData["tr_number"];
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
    $bnk_acnt_number=$unserlizedData['bnk_acnt_number'];
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
   