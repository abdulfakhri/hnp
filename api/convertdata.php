
<?php 
//include("header.php");
include_once 'db.php';

  
  $result = mysqli_query($conn,"SELECT * FROM students ");  
  
  if(mysqli_num_rows($result) > 0) {
      
   $i=0;
   while($row = mysqli_fetch_array($result)) {
     
    //$unserlizedData = unserialize($row["student_uploaded_data"]);
    $unserlizedData = $row;
    $st= $row["student_id"];
    $dis=$row['is_assigned'];
    $dds=$row['is_deleted'];
    $tr= $row["tr_number"];
  
    if(($tr!="Pending") or ($tr!="pending")){
          $var1=str_split($tr,6);
          $yr0=$var1[0];
          $year1=trim($yr0,"TR");
          $year=trim($year1,"AS");
    }else{
         $year=$tr;
        
    }
    $st= $row["student_id"];
   
    $bnk=$unserlizedData['account_number'];
    
    $account_balance=$unserlizedData['account_balance'];
    
    $transcation=$unserlizedData['transcation'];
    
    $credit_amount=$unserlizedData['credit_amount'];
    
    $withdraw=$unserlizedData['withdraw'];
    
    $bankstatus=$unserlizedData['bankstatus'];
    
    $api_bank_st=$unserlizedData['api_bank_st'];
    
    $is_assigned =$unserlizedData['is_assigned'];
    
    $is_deleted =$unserlizedData['is_deleted'];
    
    $api_fetched_name=$unserlizedData['api_fetched_name'];
    
    $first_name= $unserlizedData['first_name'];
    
    $last_name= $unserlizedData['last_name'];
 
    $full_name=$unserlizedData['first_name']." ".$unserlizedData['last_name'];
    
    $caste=$unserlizedData['caste_details'];
    
    $createdyear=$unserlizedData['createdAt'];
    
    $state=$unserlizedData['state'];
    
    $trnumber=$unserlizedData['tr_number'];
    
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
    
    $education_details=$unserlizedData['education_details'];
    
    $course_details=$unserlizedData['course_details'];
    
    $education_details_year=$unserlizedData['education_details_year'];
    
    $scholarship_amount=$unserlizedData['scholarship_amount'];
    
    $bank_name=$unserlizedData['bank_name'];
    
    $ifsc_code=$unserlizedData['ifsc_code'];
    
    $agent_name=$unserlizedData['agent_name'];
    
    $bank_name=$unserlizedData['bank_name'];
    
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
    $i=1;
    
    $sql="
    INSERT INTO student2(
    student_id,
    account_number,
    account_balance,
    transcation,
    credit_amount,
    withdraw,
    bankstatus,
    api_bank_st,
    api_fetched_name,
    is_assigned,
    is_deleted,
    tr_number,
    trnumber,
    year,
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
    income_certi
   )VALUES(
   '$st',
   '$bnk_acnt_number',
   '$account_balance',
   '$transcation',
   '$credit_amount',
   '$withdraw',
   '$bankstatus',
   '$api_bank_st',
   '$api_fetched_name',
   '$is_assigned',
   '$is_deleted',
   '$trnumber',
   '$trnumber',
   '$year',
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
   