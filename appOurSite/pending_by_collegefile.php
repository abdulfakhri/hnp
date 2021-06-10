<?php
include 'config.php';

## Read value
$draw = $_POST['draw'];
$row = $_POST['start'];
$rowperpage = $_POST['length']; // Rows display per page
$columnIndex = $_POST['order'][0]['column']; // Column index
$columnName = $_POST['columns'][$columnIndex]['data']; // Column name
$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
$searchValue = mysqli_real_escape_string($con,$_POST['search']['value']); // Search value

## Search 
$searchQuery = " ";
if($searchValue != ''){
	$searchQuery = " and (full_name like '%".$searchValue."%' or 
        tr_number like '%".$searchValue."%' or 
        state like'%".$searchValue."%' ) ";
}

## Total number of records without filtering
$sel = mysqli_query($con,"select count(*) as allcount from students");



$records = mysqli_fetch_assoc($sel);
$totalRecords = $records['allcount'];

## Total number of records with filtering
$sel = mysqli_query($con,"select count(*) as allcount FROM students  
    LEFT JOIN student_status_data
    ON students.student_id=student_status_data.student_id 
    WHERE student_status='pending_by_college' ".$searchQuery);
$records = mysqli_fetch_assoc($sel);
$totalRecordwithFilter = $records['allcount'];

## Fetch records


//$empQuery = "select * from students WHERE state='Assam' ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;


$empQuery = "SELECT students.bnk_acnt_number,students.tr_number,students.full_name,student_status_data.student_id,students.mobile,students.course_details,students.agent_name,students.remarks,
student_status_data.student_id,students.ifsc_code,students.account_number,students.account_balance,students.transcation,
students.credit_amount,students.bankstatus,student_status_data.student_status,students.withdraw,students.dob
FROM students  
LEFT JOIN student_status_data
ON students.student_id=student_status_data.student_id 
WHERE student_status='pending_by_college' ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;



$empRecords = mysqli_query($con, $empQuery);
$i=1;
while ($row = mysqli_fetch_assoc($empRecords)) {
   $remarks= $row['remarks'];
   
   $list=explode(" ",$remarks);
   
   $st=$row['student_status'];
   
   $status=str_replace("_"," ",$st);
   
   $remake=explode($remarks,3," ");
   
   $c=$i++;
   
 
    $data[] = array(
            
    		"tr_number"=>$row['tr_number'],
    		"mobile"=>$row['mobile'],
    		"full_name"=>'<a href="/admin/student/student_view_data/'.$row['student_id'].'">'.$row['full_name'].'<a>',
    		"dob"=>$row['dob'],
    		"course_details"=>$row['course_details'],
    		"agent_name"=>$row['agent_name'],
    		"remarks"=>'<a href="/appOurSite/remarkview.php?st='.$row['student_id'].'" target="_blank">'.$list[0].$list[1].'<a>',
    		"student_status"=>$status
    	);
}

## Response
$response = array(
    "draw" => intval($draw),
    "iTotalRecords" => $totalRecords,
    "iTotalDisplayRecords" => $totalRecordwithFilter,
    "aaData" => $data
);

echo json_encode($response);
