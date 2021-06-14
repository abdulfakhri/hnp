
<?php 
include("header.php");
include_once 'db.php';
    $studentC=$_GET['countstudent'];
    if($studentC==null){
        $studentCN="   ";
        // echo "<br>";
        //echo $studentCN;
    }else if($studentC=='All'){
        $studentCN=" ";
       // echo "<br>";
        //echo $studentCN;
    }else{
        $studentCN="LIMIT ".$studentC;
       // echo "<br>";
       // echo $studentCN;
        
    }
    
    $result = mysqli_query($conn,"SELECT * FROM studentnew");
    
    //$result = mysqli_query($conn,"SELECT * FROM students WHERE is_deleted!=1 $studentCN"); 
  
  
    if(mysqli_num_rows($result) > 0) {
     $i=0;
     $k=20;
     while($row = mysqli_fetch_array($result)) {
     $sid= $row["student_id"];
     $trn= $row["tr_number"];
     $ifsc=$row['ifsc_code'];
     $ac=$row['account_number'];
     $fn= $row["full_name"];
     $isd=$row['is_deleted'];
     $response=$row['bankstatus'];
     /*
     $resp='string('.$k++.') "{"data": {"client_id": "bank_validation_nxASiqKhDbmTgmwYpQnI", "account_exists": true, "upi_id": null, "full_name": "'.$row['first_name']." ".$row['last_name'].'", "ifsc_details": {}}, "status_code": 200, "success": true, "message": null, "message_code": "success"} "';   
     */   
         $sql=" INSERT INTO bank_status
         (student_id,
         bank_info,
         tr_number,
         ifsc_code,
         account_number,
         full_name,is_deleted)
         VALUES(
        '$sid',
        '$response',
        '$trn',
        '$ifsc',
        '$ac','$fn','$isd')";
         
         if ($conn->query($sql) === TRUE) {
          echo "New record created successfully<br>";
  
        } else {
           echo "Error: " . $sql . "<br>" . $conn->error;
        }
      
        }
    
     $i++;
     }

   ?>




<?php //include('footer.php');?>
