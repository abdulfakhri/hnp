<?php
include('db.php');
include("function.php");


if(isset($_POST["user_id"])){
    
    $nm=$_POST["user_id"];
    
    $result = mysqli_query($conn,"SELECT DISTINCT bankstatus,full_name,account_number,ifsc_code,api_fetched_name,api_bank_st  FROM students WHERE student_id='$nm' LIMIT 1"); 
    
    if(mysqli_num_rows($result) > 0) {
    
    while($row = mysqli_fetch_array($result)) {
        
         $jsondata=$row["bankstatus"];
         
         $decodejson=json_decode($jsondata);
         
         $status=$decodejson->data->full_name;
         
         //$full_name_db=$row['full_name'];
         
         $api_fetched_name=$decodejson->data->full_name;
         
            $ac= $row['account_number'];
            $ifsc=$row['ifsc_code'];
            $cn= $row['student_id'];
            $status=$row['api_bank_st'];
            $bnks=$row["bankstatus"];
            
            
            $api_fetched_name=$decodejson->data->full_name;
            $account_exists=$decodejson->data->account_exists;
            $success=$decodejson->success;
            $status_code=$decodejson->status_code;
            $message_code=$decodejson->message_code;
            

            //if(($bnks==null) or ($message_code=="balance_exhausted")){
                
            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://kyc-api.aadhaarkyc.io/api/v1/bank-verification',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>'{
	        "id_number": "'.$ac.'",
            "ifsc": "'.$ifsc.'"
            }',
            CURLOPT_HTTPHEADER => array(
           'Content-Type: application/json',
           'Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpYXQiOjE2MTczNTgyMDYsIm5iZiI6MTYxNzM1ODIwNiwianRpIjoiMTJhOTRiYzMtZTk3Yi00YjRjLTliYzMtMWU3MmZkMDk1MzZhIiwiZXhwIjoxOTMyNzE4MjA2LCJpZGVudGl0eSI6ImRldi5hYmhpY29sbGVnZTFAYWFkaGFhcmFwaS5pbyIsImZyZXNoIjpmYWxzZSwidHlwZSI6ImFjY2VzcyIsInVzZXJfY2xhaW1zIjp7InNjb3BlcyI6WyJyZWFkIl19fQ.rtKqZ1OqFTncXzp5CHKgCMBwUgojqsfxGyGTLHJrCFg'
           ),
           ));
            $response = curl_exec($curl);
            curl_exec($curl);
            curl_close($curl);
            
            $decodejson=json_decode($response);
            $api_fetched_name=$decodejson->data->full_name;
            $client_id=$decodejson->data->client_id;
            $account_exists=$decodejson->data->account_exists;
            $success=$decodejson->success;
            $status_code=$decodejson->status_code;
            $message_code=$decodejson->message_code;
            $message=$decodejson->message;
            $data=$decodejson->data;
            $api_fetched_name=$decodejson->data->full_name;
            
            if(($message_code=="balance_exhausted") and ($data==null) and($success==false) and ($status_code==403)){
       
               echo "API Balance Is Finished, Please Recharge";
               
            }else{
                 $statement = $connection->prepare("UPDATE students SET bankstatus='$response',api_fetched_name='$api_fetched_name' WHERE student_id= :id"
            );
    	   $result = $statement->execute(
	    	   array(':id'	=>	$_POST["user_id"])
        	);
	      
	        if(!empty($result)){
	           	echo 'Verification Done';
            }else{
                echo "Processing...";
            }
            
           }
           /*
            }else{
              echo "Verification Already Done";
            }
            */
            
    
        }
   
    }
}

if(isset($_POST["checkbox_value"])){
    $c=1;
for($count = 0; $count < count($_POST["checkbox_value"]); $count++){
             
    $result1 = mysqli_query($conn,"SELECT * FROM students WHERE student_id='".$_POST['checkbox_value'][$count]."'"); 
    
    if(mysqli_num_rows($result1) > 0) {
    
    while($row1 = mysqli_fetch_array($result1)) {
       
            $sid= $row1['account_number'];
            
            $ifsc=$row1['ifsc_code'];
            
            $jsondata=$row1["bankstatus"];
         
            $decodejson=json_decode($jsondata);
         
            $status=$decodejson->data->full_name;

            $api_fetched_name=$decodejson->data->full_name;
         
            $ac= $row1['account_number'];
            $ifsc=$row1['ifsc_code'];
            $cn= $row1['student_id'];
            $status=$row1['api_bank_st'];
            $bnks=$row1["bankstatus"];
            
            $api_fetched_name=$decodejson->data->full_name;
            $account_exists=$decodejson->data->account_exists;
            $success=$decodejson->success;
            $status_code=$decodejson->status_code;
            $message_code=$decodejson->message_code;
            
            
            // if(($bnks==null) or ($message_code=="balance_exhausted")){
                   $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://kyc-api.aadhaarkyc.io/api/v1/bank-verification',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>'{
	        "id_number": "'.$sid.'",
            "ifsc": "'.$ifsc.'"
            }',
            CURLOPT_HTTPHEADER => array(
           'Content-Type: application/json',
           'Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpYXQiOjE2MTczNTgyMDYsIm5iZiI6MTYxNzM1ODIwNiwianRpIjoiMTJhOTRiYzMtZTk3Yi00YjRjLTliYzMtMWU3MmZkMDk1MzZhIiwiZXhwIjoxOTMyNzE4MjA2LCJpZGVudGl0eSI6ImRldi5hYmhpY29sbGVnZTFAYWFkaGFhcmFwaS5pbyIsImZyZXNoIjpmYWxzZSwidHlwZSI6ImFjY2VzcyIsInVzZXJfY2xhaW1zIjp7InNjb3BlcyI6WyJyZWFkIl19fQ.rtKqZ1OqFTncXzp5CHKgCMBwUgojqsfxGyGTLHJrCFg'
           ),
           ));
            $response = curl_exec($curl);
            curl_exec($curl);
            curl_close($curl);
            $query = "UPDATE students SET bankstatus='$response' WHERE student_id='".$_POST['checkbox_value'][$count]."'";
            $statement = $connect->prepare($query);
           $result= $statement->execute();
            if(!empty($result)){
	           	echo $c++."#"."Verification Done; For Student#:".$_POST['checkbox_value'][$count]."\n";
            }else{
                echo "Processing...";
            }
            
            /*
             }else{
              echo "Verification Already Done";
            }
            */
          
            
            
            
            
            
            
    }
     
             
    }
}

}


?>