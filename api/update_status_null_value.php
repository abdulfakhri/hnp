
<?php 
//include("header.php");
include_once 'db.php';
$dbname = "u979436226_hnsp";
$username = "u979436226_hnsp";
$password = "!@#123qweasdZXC";
$conn=mysqli_connect($host,$username,$password,$dbname);
if(!$conn){
    die('Could not Connect MySql Server:');
}
  
  $result = mysqli_query($conn,"SELECT * FROM students_n ");  
  
  if(mysqli_num_rows($result) > 0) {
   
   while($row = mysqli_fetch_array($result)) {

      $sid=$row["student_id"];

           $result1 = mysqli_query($conn,"SELECT * FROM student_n where student_id='$sid'");
           if (mysqli_num_rows($result1) > 0) {
               while ($ro = mysqli_fetch_array($result1)) {

                  $si=$ro["student_id"];
                  $st=$ro["student_status"];
                  if($st=="null"){
                      $status="pending_by_our_site";
                  }else{
                      $status=$st;
                  }

                  $query ="UPDATE students_n SET student_status ='$st' WHERE student_id='$si'";
                  mysqli_query($conn,$query);

               }
           }
   }
  } 
  ?>
   