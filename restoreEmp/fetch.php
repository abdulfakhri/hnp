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
$query .= "SELECT * FROM user WHERE is_deleted=1 ";

if(isset($_POST["search"]["value"])){
    
	$query .= 'AND mobile LIKE "%'.$_POST["search"]["value"].'%" ';
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
    
 $query .= 'ORDER BY id DESC ';
 
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

    
	$sub_array = array();
    $sub_array[] = $i++;
	$sub_array[] =$row['first_name']." ".$row['last_name'];
    $sub_array[] =$row['email'];
    $sub_array[] =$row['mobile'];
	$sub_array[] = '<button type="button" name="delete" id="'.$row["id"].'" onclick="return confirm("Are your sure that you want to restore this employee?")" class="btn btn-warning btn-xs delete">Restore</button>';
	$sub_array[] = '<button type="button" name="deletePer" id="'.$row["id"].'" onclick="return confirm("Are your sure that you want to permanent delete this employee?")" class="btn btn-warning btn-xs delete">Delete</button>';
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
