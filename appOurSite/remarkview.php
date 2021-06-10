<?php
include 'config.php';


$stn=$_GET['st'];


$empQuery = "SELECT * FROM students WHERE student_id='$stn'";


$empRecords = mysqli_query($con, $empQuery);


while ($row = mysqli_fetch_assoc($empRecords)) {
    
   $remarks= $row['remarks'];
   
   echo $remarks;
}

