<?php
include('db.php');
include('function.php');
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
		$image = '';
		if($_FILES["user_image"]["name"] != '')
		{
			$image = upload_image();
		}
		$statement = $connection->prepare("
			INSERT INTO users (first_name, last_name, image) 
			VALUES (:first_name, :last_name, :image)
		");
		$result = $statement->execute(
			array(
				':first_name'	=>	$_POST["first_name"],
				':last_name'	=>	$_POST["bank_name"],
				':image'		=>	$image
			)
		);
		if(!empty($result))
		{
			echo 'Data Inserted';
		}
	}
	if($_POST["operation"] == "Edit")
	{
	
		$statement = $connection->prepare(
			"UPDATE students 
			SET full_name = :full_name,tr_number =:tr_number, 
			bank_name = :bank_name,mobile= :mobile,
			ifsc_code= :ifsc_code,state= :state,bnk_acnt_number= :bnk_acnt_number,
			credit_amount=:credit_amount,withdraw=:withdraw,account_balance=:account_balance
			WHERE student_id = :id
			"
		);
		$result = $statement->execute(
			array(
				':full_name'	    =>	$_POST["full_name"],
				':mobile'	        =>	$_POST["mobile"],
				':tr_number'     	=>	$_POST["tr_number"],
				':bank_name'	    =>	$_POST["bank_name"],
				':ifsc_code'	    =>	$_POST["ifsc_code"],
				':state'	        =>	$_POST["state"],
				':bnk_acnt_number'  =>	$_POST["bnk_acnt_number"],
				':id'			    =>	$_POST["user_id"],
				':credit_amount'	=>	$_POST["credit_amount1"],
				':withdraw'	        =>	$_POST["withdraw1"],
				':account_balance'  =>	(($_POST["account_balance"]+$_POST["credit_amount1"])-$_POST["withdraw1"])
				
			)
		);
		if(!empty($result))
		{
			echo 'Data Updated';
		}
	}
}

?>