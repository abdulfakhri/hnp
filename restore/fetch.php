<?php
include('db.php');
$dbname = "u979436226_hnsp";
$username = "u979436226_hnsp";
$password = "!@#123qweasdZXC";
$conn=mysqli_connect($host,$username,$password,$dbname);
if(!$conn){
    die('Could not Connect MySql Server:' .mysql_error());
}

include('function.php');
$query = '';
$output = array();
include('database_connection.php');
/*
$query .= "SELECT students.bnk_acnt_number,students.tr_number,students.full_name,student_status_data.student_id,
student_status_data.student_id,students.ifsc_code,students.account_number,students.account_balance,students.transcation,
students.credit_amount,students.bankstatus,student_status_data.student_status,students.withdraw
FROM students  
LEFT JOIN student_status_data
ON students.student_id=student_status_data.student_id ";
*/
$query .= "SELECT * FROM students WHERE is_deleted='1' ";

if(isset($_POST["search"]["value"])){
    
	$query .= 'AND tr_number LIKE "%'.$_POST["search"]["value"].'%" ';
	/*
	$query .= 'OR account_number LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR CONCAT(first_name," ",last_name) LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR CONCAT(state, " ",caste_details) LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR CONCAT(state," ",caste_details," ",createdAt) LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR state LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR caste_details LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR api_bank_st="'.$_POST["search"]["value"].'" ';
    */

	
}else{
    
    echo "Nothing  Found";
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
      $status=$final_name."<hr>".$st;
      $stu= "Verified";
      
       
      
       $query ="UPDATE students SET api_bank_st ='$msg',api_fetched_name ='$api_fetched_name' WHERE student_id='$sid'";
       mysqli_query($conn,$query);
       
       
        
       
   }else if((!empty($api_fetched_name_cleaned)) and ($account_exists==true) and ($success==true) and($status_code==200) and($message_code=="success")){
      $msg="Not Matched";
      $stcolor="#ff00ff";
      $ncolor="blue";
      $st="<p style=color:".$stcolor.">".$msg."</p>";
      $final_name="<p style=color:".$ncolor.">".$api_fetched_name."</p>";
      //$final_name="<p style=color:".$ncolor.">".$full_name_db."</p>";
      $status=$final_name."<hr>".$st; 
      
      $stu= "Not Verified";
      $query ="UPDATE students SET api_bank_st ='$msg',api_fetched_name ='$api_fetched_name' WHERE student_id='$sid'";
      mysqli_query($conn,$query);
      
   }else if((empty($api_fetched_name_cleaned)==true) and ($account_exists==false) and ($success==false) and($status_code==422) and($message_code=="verification_failed")){
      $msg="Not Availble";
      $color="red";
      $st="<p style=color:".$color.">".$msg."</p>";
      $final_name="<p style=color:".$ncolor.">".$api_fetched_name."</p>";
      $status=$st;
      //$status="<p style=color:".$color.">".$msg."</p>";
      
      $stu= "Not Availble";
     
      $query ="UPDATE students SET api_bank_st ='$msg',api_fetched_name ='$api_fetched_name' WHERE student_id='$sid'";
      mysqli_query($conn,$query);
       
   }else if(empty($jsondata)==true){
       
      $msg="Not Verified Yet";
      $color="brown";
      $st="<p style=color:".$color.">".$msg."</p>";
      $status="<p style=color:".$color.">".$msg."</p>";
      
      $stu= "Not Verified Yet";
      $query ="UPDATE students SET api_bank_st ='$msg',api_fetched_name ='$stu' WHERE student_id='$sid'";
      mysqli_query($conn,$query);
      
   }else{
      $msg="API Balance Is Finished";
      $color="red";
      $status="<p style=color:".$color.">".$msg."</p>";
      
      $stu= "API Balance Is Finished";
      //$query ="UPDATE students SET api_bank_st ='$stu',api_fetched_name ='$stu' WHERE student_id='$sid'";
      //mysqli_query($conn,$query);
   }
    
	$sub_array = array();
   
    $sub_array[] = $i++;
 	//$sub_array[] = $row["tr_number"];
 	/*
 	$sub_array[] = $row["trnumber"];
	$sub_array[] = $row['full_name'];
	$sub_array[] = $row["ifsc_code"];
	$sub_array[] = $row["account_number"];
	*/


	$sub_array[] =$tr_number3;
    $sub_array[] =$row['full_name'];
    $sub_array[] =$row['ifsc_code'];
    //$sub_array[] =$ifsc_code3;
    $sub_array[] =$account_number3;
    
    //$sub_array[] =$row['transcation'];
    $sub_array[] =$credits;
    $sub_array[] =$withdraw;
    $sub_array[] =$bal;
	//$sub_array[] = $row["bnk_acnt_number"];

	$sub_array[] = $status;
	$sub_array[] = '<button type="button" name="delete" id="'.$row["student_id"].'" onclick="return confirm("Are you sure that you want to restore this student?")" class="btn btn-warning btn-xs delete">Restore</button>';
	$sub_array[] = '<button type="button" name="deletePer" id="'.$row["student_id"].'" onclick="return confirm("Are you sure that you want to permanent delete this student?")" class="btn btn-warning btn-xs delete">Delete </button>';
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
