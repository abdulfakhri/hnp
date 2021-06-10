<?php 

include_once 'db.php';

    $ifsc=$_GET['ifsc'];
    $ac=$_GET['id_number'];

     $result = mysqli_query($conn,"SELECT * FROM bank_status WHERE ifsc_code='$ifsc' AND account_number='$ac'"); 

   $i=0;
    if(mysqli_num_rows($result) > 0) {
       while($row = mysqli_fetch_array($result)) {
       $st=$row["bank_info"];
      $acn=$row["account_number"];
      
       echo $st;
       //echo json_encode($st);
   
       $i++;
     }
    } 

   ?>

