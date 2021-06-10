
<?php 
//include("header.php");
include_once 'db.php';

  
  $result = mysqli_query($conn,"SELECT * FROM user ");  
  
  if(mysqli_num_rows($result) > 0) {
      
   $i=0;
   while($row = mysqli_fetch_array($result)) {
       
   /*
  `otp_email` int(100) DEFAULT NULL,
  `otp_confirmed` tinyint(1) DEFAULT NULL,
  `account_number` varchar(255) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `ifsc_code` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `chat_username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `alt_mobile` int(11) NOT NULL,
  `address1` varchar(255) NOT NULL,
  `address2` varchar(255) NOT NULL,
  `pin_code` int(11) NOT NULL,
  `addr_state` varchar(255) NOT NULL,
  `country` int(11) NOT NULL,
  `aadhar_card` varchar(255) NOT NULL,
  `voter_id` varchar(255) NOT NULL,
  `bank_passbook` varchar(255) NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `role` varchar(255) NOT NULL,
  `user_ip` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `is_deleted` int(11) DEFAULT NULL
  */
/* 
id
otp_email  
otp_confirmed
account_number
bank_name
ifsc_code
first_name
last_name
chat_username
email
password
mobile
alt_mobile
address1
address2
pin_code
addr_state
country
aadhar_card
voter_id
bank_passbook
profile_pic
status
role
user_ip
created_at
is_deleted

id,
otp_email,  
otp_confirmed,
account_number,
bank_name,
ifsc_code,
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
aadhar_card,
voter_id,
bank_passbook,
profile_pic,
status,
role,
user_ip,
created_at,
is_deleted

'$id',
'$otp_email',  
'$otp_confirmed',
'$account_number',
'$bank_name',
'$ifsc_code',
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
'$aadhar_card',
'$voter_id',
'$bank_passbook',
'$profile_pic',
'$status',
'$role',
'$user_ip',
'$created_at',
'$is_deleted'
*/ 
   $id= $row["id"];
   $otp_email= $row["otp_email"];
   $otp_confirmed= $row["otp_confirmed"];
   $account_number= $row["account_number"];
   $bank_name= $row["bank_name"];
   $ifsc_code= $row["ifsc_code"];
   $first_name= $row["first_name"];
   $last_name= $row["last_name"];
   $chat_username= $row["chat_username"];
   $email= $row["email"];
   $password= $row["password"];
   $mobile= $row["mobile"];
   $alt_mobile= $row["alt_mobile"];
   $address1= $row["address1"];
   $address2= $row["address2"];
   $pin_code= $row["pin_code"];
   $addr_state= $row["addr_state"];
   $country= $row["country"];
   $aadhar_card1= $row["aadhar_card"];
   $voter_id= $row["voter_id"];
   $profile_pic1= $row["profile_pic"];
   $aadhar_card1=$row['aadhar_card'];
   $aadhar_card2=str_replace("https://hellonsp.in/","",$aadhar_card1);
   $aadhar_card3=str_replace("http://hellonsp.in/","",$aadhar_card2);
   $aadhar_card=str_replace("https://helpfoundation.apihub.cloud/","",$aadhar_card3);
   $voter_id1=$row['voter_id'];
   $voter_id2=str_replace("https://hellonsp.in/","",$voter_id1);
   $voter_id3=str_replace("http://hellonsp.in/","",$voter_id2);
   $voter_id =str_replace("https://helpfoundation.apihub.cloud/","",$voter_id3);
   $bank_passbook1=$row['bank_passbook'];
   $bank_passbook2=str_replace("http://hellonsp.in/","",$bank_passbook1);
   $bank_passbook3=str_replace("https://hellonsp.in/","",$bank_passbook2);
   $bank_passbook=str_replace("https://hellonsp.in/","",$bank_passbook3);
   $profile_pic1=$row['profile_pic'];
   $profile_pic=str_replace("https://hellonsp.in/","",$profile_pic1);
   $profile_pic2=str_replace("https://hellonsp.in/","",$profile_pic1);
   $profile_pic3=str_replace("http://hellonsp.in/","",$profile_pic2);
   $profile_pic=str_replace("https://helpfoundation.apihub.cloud/","",$profile_pic3);
   $status= $row["status"];
   $role= $row["role"];
   $user_ip= $row["user_ip"];
   $created_at= $row["created_at"];
   $is_deleted= $row["is_deleted"];
   
    $sql="
    INSERT INTO userFile(
   id,
otp_email,  
otp_confirmed,
account_number,
bank_name,
ifsc_code,
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
aadhar_card,
voter_id,
bank_passbook,
profile_pic,
status,
role,
user_ip,
created_at,
is_deleted
  ) VALUES('$id',
'$otp_email',  
'$otp_confirmed',
'$account_number',
'$bank_name',
'$ifsc_code',
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
'$aadhar_card',
'$voter_id',
'$bank_passbook',
'$profile_pic',
'$status',
'$role',
'$user_ip',
'$created_at',
'$is_deleted')";

   if ($conn->query($sql) === TRUE) {
      echo "New record created successfully<br>";
  
   } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
   }

   }
  } 
  
  ?>
   