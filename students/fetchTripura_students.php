<?php
include('db.php');
$dbname = "u979436226_hnsp";
$username = "u979436226_hnsp";
$password = "!@#123qweasdZXC";
$conn=mysqli_connect($host,$username,$password,$dbname);
if(!$conn){
    die('Could not Connect MySql Server:' .mysql_error());
}

function get_total_all_records(){
	include('db.php');
	$statement = $connection->prepare("SELECT * FROM students WHERE is_deleted!=1 AND state='Tripura'");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}

$query = '';
$output = array();
include('database_connection.php');

$query .= "SELECT students.bnk_acnt_number,students.tr_number,students.full_name,student_status_data.student_id,
student_status_data.student_id,students.ifsc_code,students.account_number,students.account_balance,students.transcation,students.course_details,students.state,students.caste_details,
students.credit_amount,students.bankstatus,students.dob,students.mobile,students.year,student_status_data.student_status,students.withdraw
FROM students  
LEFT JOIN student_status_data
ON students.student_id=student_status_data.student_id 
WHERE state='Tripura' ";


if(isset($_POST["search"]["value"])){
    
	$query .= 'AND tr_number LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'AND account_number LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'AND CONCAT(first_name," ",last_name) LIKE "%'.$_POST["search"]["value"].'%" ';
	/*
	$query .= 'AND CONCAT(state, " ",caste_details) LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'AND CONCAT(state," ",caste_details," ",createdAt) LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'AND state LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'AND caste_details LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'AND api_bank_st="'.$_POST["search"]["value"].'" ';
	*/

}

if(isset($_POST['order'])){
    
 $query .= 'ORDER BY '.$column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
 
}else{
    
 $query .= 'ORDER BY student_id DESC ';
 
}


if($_POST["length"] != -1){
    
 $query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
 
}



try{
    
$statement = $connection->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
$filtered_rows = $statement->rowCount();
$i=1;

foreach($result as $row){
    
$sid=$row["is_deleted"];
$tr_number1 = $row["tr_number"];
$trnumber1= $row["trnumber"];
$ifsc_code1= $row["ifsc_code"];
$balance=$row['account_balance'];
$account_number1=$row["account_number"]=$row["bnk_acnt_number"];
$creditsTo =$row['credit_amount'];
$withdrawFrom =$row['withdraw'];
$year=$row['year'];

if($year=="Pendin"){
    $yr="Pending";
}else{
    $yr=$year;
}


if($creditsTo==null){
    $credits="0.00INR";
}else{
    $credits=$creditsTo." INR";
}
if($withdrawFrom==null){
    $withdraw="0.00INR";
}else{
    $withdraw=$withdrawFrom." INR";
}
if($balance==null){
    $bal="0.00INR";
}else{
   $bal= $balance." INR";
}

$tr_number2 = str_replace(" ","",$tr_number1);
   
$ifsc_code2 = str_replace(" ","",$ifsc_code1);

$account_number2 = str_replace(" ","",$account_number1);
   
$trnumber2 = str_replace(" ","",$trnumber1);   

   $tr_number3=trim($tr_number2);
   
   $ifsc_code3=trim($ifsc_code2);
  
   $account_number3=trim($account_number2);
  
   $trnumber3=trim($trnumber2);

       
         
  $jsondata=$row["bankstatus"];
  $decodejson=json_decode($jsondata);
  $full_name_db=$row['full_name'];
  //$full_name_db=$row['first_name']." ".$row['last_name'];
  
  $sid=$row["student_id"];
  $status=$row['full_name'];
  $student_status=$row['student_status'];
  
  $students_status=str_replace("_"," ",$student_status);
  
  
  $api_fetched_name=$decodejson->data->full_name;
  $account_exists=$decodejson->data->account_exists;
  $success=$decodejson->success;
  $status_code=$decodejson->status_code;
  $message_code=$decodejson->message_code;
 
   $full_name_db_touppercase= strtoupper($full_name_db);
   
   $api_fetched_name_touppercase= strtoupper($api_fetched_name);
   
   $full_name_db_trimed = str_replace(" ","",$full_name_db_touppercase);
   
   $api_fetched_name_trimed = str_replace(" ","",$api_fetched_name_touppercase);
   
   $full_name_db_cleaned=trim($full_name_db_trimed);
  
   $api_fetched_name_cleaned=trim($api_fetched_name_trimed);
  
   if(($full_name_db_cleaned==$api_fetched_name_cleaned) and ($account_exists==true) and ($success==true) and($status_code==200) and($message_code=="success")){
     
      $msg="Matched";
      $stcolor="green";
      $ncolor="blue";
      $st="<p style=color:".$stcolor.">".$msg."</p>";
      $final_name="<p style=color:".$ncolor.">".$api_fetched_name."</p>";
      //$final_name="<p style=color:".$ncolor.">".$full_name_db."</p>";
      $status=$st;
      $stu= "Verified";
      
       
      
       
       
       
        
       
   }else if((!empty($api_fetched_name_cleaned)) and ($account_exists==true) and ($success==true) and($status_code==200) and($message_code=="success")){
      $msg="Not Matched";
      $stcolor="#ff00ff";
      $ncolor="blue";
      $st="<p style=color:".$stcolor.">".$msg."</p>";
      $final_name="<p style=color:".$ncolor.">".$api_fetched_name."</p>";
      //$final_name="<p style=color:".$ncolor.">".$full_name_db."</p>";
      $status=$st; 
      
     
      
   }else if((empty($api_fetched_name_cleaned)==true) and ($account_exists==false) and ($success==false) and($status_code==422) and($message_code=="verification_failed")){
      $msg="Not Availble";
      $color="red";
      $st="<p style=color:".$color.">".$msg."</p>";
      $final_name="<p style=color:".$ncolor.">".$api_fetched_name."</p>";
      $status=$st;
     
      
     
       
   }else if(empty($jsondata)==true){
       
      $msg="Not Verified Yet";
      $color="brown";
      $st="<p style=color:".$color.">".$msg."</p>";
      $status="<p style=color:".$color.">".$msg."</p>";
      
    
   }else{
      $msg="API Balance Is Finished";
      $color="red";
      $status="<p style=color:".$color.">".$msg."</p>";
      
     
   }
   /*
   https://helpfoundation.apihub.cloud/admin/student/stu_delete/20
   https://helpfoundation.apihub.cloud/admin/student/stu_clone/20
   https://helpfoundation.apihub.cloud/admin/student/student_view_data/20
   https://helpfoundation.apihub.cloud/admin/student/update/20
    */
	$sub_array = array();
	$sub_array[] = $i++;
    $sub_array[] = '<a href="/admin/student/stu_delete/'.$row["student_id"].'">Delete</a>|
    <a href="/admin/student/stu_clone/'.$row["student_id"].'">Copy</a>|<a href="/admin/student/stu_clone/'.$row["student_id"].'">Copy</a>|<a href="/admin/student/student_view_data/'.$row["student_id"].'">View</a>|<a href="/admin/student/update/'.$row["student_id"].'">Edit</a>';
	$sub_array[] =$tr_number3;
	$sub_array[] =$yr;
    $sub_array[] =$row['full_name'];
    $sub_array[] =$row['dob'];
    $sub_array[] =$row['mobile'];
    $sub_array[] =$account_number3;
    $sub_array[] = $status;
    $sub_array[] =$row['course_details'];
    $sub_array[] =$row['state'];
    $sub_array[] =$row['caste_details'];
    $sub_array[] =$students_status;
	$data[] = $sub_array;
       
  // } 
  
}


$output = array(
	"draw"				=>	intval($_POST["draw"]),
	"recordsTotal"		=> 	$filtered_rows,
	"recordsFiltered"	=>	get_total_all_records(),
	"data"				=>	$data
);

echo json_encode($output);

} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}









?>
