<?php
include('db.php');
include('function.php');
if(isset($_POST["user_id"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM students 
		WHERE student_id = '".$_POST["user_id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	
	
	foreach($result as $row)
	{
		$output["full_name"]      = $row["full_name"];
		$output["bank_name"]      = $row["bank_name"];
		$output["tr_number"]      = $row["tr_number"];
		$output["bnk_acnt_number"] = $row["bnk_acnt_number"];
		$output["mobile"]         = $row["mobile"];
		$output["ifsc_code"]      = $row["ifsc_code"];
		$output["state"]          = $row["state"];
		$output["credit_amount"]  = $row["credit_amount"];
		$output["withdraw"]      = $row["withdraw"];
		$output["account_balance"] = $row["account_balance"];
	
	}
	echo json_encode($output);
	
}
?>