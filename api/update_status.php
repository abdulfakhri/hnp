
<?php
//include("header.php");
include_once 'db.php';
$dbname = "u979436226_hnsp";
$username = "u979436226_hnsp";
$password = "!@#123qweasdZXC";
$conn = mysqli_connect($host, $username, $password, $dbname);
if (!$conn) {
    die('Could not Connect MySql Server:');
}

$result = mysqli_query($conn, "SELECT * FROM students ");

if (mysqli_num_rows($result) > 0) {

    while ($row = mysqli_fetch_array($result)) {

        $sid = $row["student_id"];

        $result1 = mysqli_query($conn, "SELECT * FROM students where student_id='$sid'");
        if (mysqli_num_rows($result1) > 0) {
            while ($ro = mysqli_fetch_array($result1)) {

                $si = $ro["student_id"];
                $st = $ro["student_status"];

                if (isset($st)=="approved_by_our_site") {
                    $status_plain = "Approved By Our Site";
                    $sts = "approveStudents";
                } elseif ($st == "reject_by_our_site") {
                    $status_plain = "Reject By Our Site";
                    $sts = "rejectStudent";
                } elseif ($st == "approved_by_nsp") {
                    $status_plain = "Approved By NSP";
                    $sts = "approveStudents";
                } elseif ($st == "approved_by_college") {
                    $status_plain = "Approved By College";
                    $sts = "approveStudents";
                } elseif ($st == "rejected_by_college") {
                    $status_plain = "Reject By College";
                } elseif ($st == "nsp_reject") {
                    $status_plain = "Reject By NSP";
                    $sts = "rejectStudent";
                } elseif ($st == "defect_by_our_site") {
                    $status_plain = "Defect by Our Site";
                    $sts = "defectStudents";
                } elseif ($st == "defect_by_college") {
                    $status_plain = "Defect By College";
                } elseif ($st == "defect_by_nsp") {
                    $status_plain = "Defect By NSP";
                    $sts = "defectStudents";
                }elseif ($st=="Pending"){
                    $status_plain = "Pending";
                    $sts = "pendingStudents";
                }

                $query = "UPDATE students2 SET student_status='$st',student_st='$status_plain',studentst='$sts' WHERE student_id='$si'";
                mysqli_query($conn, $query);
            }
        }
    }
}
?>
   