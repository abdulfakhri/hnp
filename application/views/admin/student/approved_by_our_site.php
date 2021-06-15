<?php error_reporting(0) ?>
<style type="text/css">
    thead, tfoot {
        background: #03a9f3;
    }
    thead tr th , tfoot tr th {
        color: #fff;
    }
    tbody{
        color:#000;
    }
    tr[data-class|="rejectStudent"] , li.rejectStudent, td[data-class|="rejectStudent"] {
        background-color: #ff00009e !important;
    }
    tr[data-class|="approveStudents"] ,li.approveStudents, td[data-class|="approveStudents"] {
        background-color: mediumspringgreen !important;
    }
    tr[data-class|="defectStudents"] , li.defectStudents,td[data-class|="defectStudents"] {
        background-color: #ab8ce48a !important;
    }
    tr[data-class|="pendingStudents"] ,li.pendingStudents, td[data-class|="pendingStudents"] {
        background-color: yellow !important;
    }
</style>
<?php
$assignedStudentArray = array();
foreach ($assignedTaskList as $assignedStudent) {
    $assignedStudentArray[$assignedStudent['stu_id']] = $assignedStudent;
}
$assignedTaskList = $assignedStudentArray;

$assignedStudentArray1 = array();
foreach ($assignedTaskListPending as $assignedStudent1) {
    $assignedStudentArray1[$assignedStuden1t['stu_id']] = $assignedStudent1;
}
$assignedTaskListPending = $assignedStudentArray1;


$assignedStudentArray2 = array();
foreach ($assignedTaskListComplete as $assignedStudent2) {
    $assignedStudentArray2[$assignedStudent2['stu_id']] = $assignedStudent2;
}
$assignedTaskListComplete = $assignedStudentArray2;

function startsWith ($string, $startString)
{
    $len = strlen($startString);
    return (substr($string, 0, $len) === $startString);
}

?>
<div class="row all_stud_table">
        <div class="col-lg-12">
          

            <div class="panel-body table-responsive">

                <?php $msg = $this->session->flashdata('msg'); ?>
                <?php if (isset($msg)): ?>
                    <div class="alert alert-success delete_msg pull" style="width: 100%"> <i class="fa fa-check-circle"></i>
                        <?php echo $msg; ?> &nbsp;
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span
                                    aria-hidden="true">×</span> </button>
                    </div>
                <?php endif ?>

                <?php $error_msg = $this->session->flashdata('error_msg'); ?>
                <?php if (isset($error_msg)): ?>
                    <div class="alert alert-danger delete_msg pull" style="width: 100%"> <i class="fa fa-times"></i>
                        <?php echo $error_msg; ?> &nbsp;
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span
                                    aria-hidden="true">×</span> </button>
                    </div>
                <?php endif ?>
             
                <?php if ($this->session->userdata('role') == 'admin'){ ?>
                 

                    <table id="studentAllTable" class="display nowrap" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>S.No</th>
                            <?php if($this->session->userdata('role') == 'admin'){ ?>
                                <th>Action</th>
                            <?php } ?>
                            <th>TR Number</th>
                            <th>Name</th>
                            <th>Date Of Birth</th>
                            <th>Mobile</th>
                            <th>Account No.</th>
                            <th>Account Status</th>
                            <th>Course</th>
                          
                            <th>State</th>
                            <th>Caste</th>
                            <th>Status</th>
                          
                           
                        </tr>
                        </thead>
                      
                        <tbody>
                        <?php
                        $all_scount = $all_assam_stu = $all_tripura_stu = 0;
                        foreach ($users as $user):
                            $unserlizedData = $user;
                            /*
                            * todo: add control condition  from employee to admin
                            */
                            if(($user['uploadedBy'] == $this->session->userdata('id') || $this->session->userdata('role') == 'admin') && $user['is_deleted'] != 1 && $studentFilter == 'all' ) {

                                //if( $this->session->userdata('role') == 'admin'|| (($this->session->userdata('id') == $assignedTaskList[$user['student_id']]['emp_id']) && $assignedTaskList[$user['student_id']]['stu_id'] == $user['student_id'] ) && $user['is_deleted'] != 1) {
                                $scount++;
                                $chekVal = '';
                                ?>
                                <?php
                                $chekVal = 'pendingStudents';
                                if( isset($studentStatus[$user['student_id']]['Status']) && strpos($studentStatus[$user['student_id']]['Status'], 'Reject') !== false){
                                    $chekVal = 'rejectStudent';
                                }

                                if( isset($studentStatus[$user['student_id']]['Status']) && strpos($studentStatus[$user['student_id']]['Status'], 'Approved') !== false){
                                    $chekVal = 'approveStudents';
                                }

                                if( isset($studentStatus[$user['student_id']]['Status']) && strpos($studentStatus[$user['student_id']]['Status'], 'Defect') !== false){
                                    $chekVal = 'defectStudents';
                                }



                                ?>
                                <tr data-class="<?=$chekVal;?>">

                                    <td data-class="<?=$chekVal;?>"><?=$scount?></td>
                                    <?php if($this->session->userdata('role') == 'admin'){ ?>
                                        <td class="icon_action">

                                            <a href="<?php echo base_url('admin/student/stu_delete/'.$user['student_id']); ?>"
                                               data-toggle="tooltip" onclick="return confirm('Are you sure that you want to delete this student?')"  data-original-title="Delete">
                                                <button type="button" class="btn btn-danger btn-circle btn-xs">
                                                    <i class="fa fa-trash-o"></i>
                                                </button>
                                            </a>
                                            <a href="<?php echo base_url('admin/student/stu_clone/'.$user['student_id']); ?>"
                                               data-toggle="tooltip" onclick="return confirm('Are you sure that you want to copy this student?')" data-original-title="Clone">
                                                <button type="button" class="btn btn-info btn-circle btn-xs">
                                                    <i class="fa fa-clone"></i>
                                                </button>
                                            </a>
                                            <a href="<?php echo base_url('admin/student/student_view_data/'.$user['student_id']); ?>"
                                               data-toggle="tooltip"  data-original-title="Clone">
                                                <button type="button" class="btn btn-info btn-circle btn-xs">
                                                    View
                                                </button>
                                            </a>
                                            <a href="<?php echo base_url('admin/student/update/'.$user['student_id']); ?>"
                                               data-toggle="tooltip"  data-original-title="Clone">
                                                <button type="button" class="btn btn-info btn-circle btn-xs">
                                                    Edit
                                                </button>
                                            </a>


                                        </td>

                                    <?php } ?>
                                    <td>
                                        <?php echo $user['tr_number']; ?>
                                    </td>
                                    <td>
                                        <a
                                         href="<?php echo base_url('admin/student/student_view_data/'.$user['student_id']); ?>">
                                            <?php 
                                        
                                            echo $user['full_name'];
                                            ?>
                                        </a>
                                    </td>
                                    <td>
                                        <?php
                                        $dob=$user['dob'];
                                        //ech $unserlizedData['dob'];
                                        echo date("d/m/Y", strtotime($dob));
                                        //echo date("d/m/Y",$dob);
                                        ?>
                                    </td>
                                    <td>
                                        <?php echo $user['mobile']; ?>
                                    </td>
                                    <td>
                                        <?php echo $user['account_number']; ?>
                                    </td>
                                     <td>
                                        <?php 
                                        $jsondata=$user["bankstatus"];
                                        $decodejson=json_decode($jsondata);
                                        $full_name_db=$user['full_name'];
                                        //$full_name_db=$user['first_name']." ".$user['last_name'];
  
                                        $sid=$user["student_id"];

                                        $api_fetched_name=$decodejson->data->full_name;
                                        $account_exists=$decodejson->data->account_exists;
                                        $success=$decodejson->success;
                                        $status_code=$decodejson->status_code;
                                        $message_code=$decodejson->message_code;
                                        //echo $user['api_fetched_name']; 
                                        $full_name_db_touppercase= strtoupper($full_name_db);
   
                                        $api_fetched_name_touppercase= strtoupper($api_fetched_name);
   
                                        $full_name_db_trimed = str_replace(" ","",$full_name_db_touppercase);
   
                                        $api_fetched_name_trimed = str_replace(" ","",$api_fetched_name_touppercase);
   
                                        $full_name_db_cleaned=trim($full_name_db_trimed);
  
                                        $api_fetched_name_cleaned=trim($api_fetched_name_trimed);
  
                                       if(($full_name_db_cleaned==$api_fetched_name_cleaned) and ($account_exists==true) and ($success==true) and($status_code==200) and($message_code=="success")){
     
                                           $msg="Matched";
                                           $stcolor="green";
                                           $ncolor="blue";
                                           $st="<p style=color:".$stcolor.">".$msg."</p>";
                                           $final_name="<p style=color:".$ncolor.">".$api_fetched_name."</p>";
                                           //$final_name="<p style=color:".$ncolor.">".$full_name_db."</p>";
                                           $status=$st;
                                           $stu= "Verified";
      
                                       }else if((!empty($api_fetched_name_cleaned)) and ($account_exists==true) and ($success==true) and($status_code==200) and($message_code=="success")){
      $msg="Not Matched";
      $stcolor="#ff00ff";
      $ncolor="blue";
      $st="<p style=color:".$stcolor.">".$msg."</p>";
      $final_name="<p style=color:".$ncolor.">".$api_fetched_name."</p>";
      //$final_name="<p style=color:".$ncolor.">".$full_name_db."</p>";
      //$status=$final_name."<hr>".$st; 
        $status=$st;
      $stu= "Not Verified";
      $query ="UPDATE students SET api_bank_st ='$stu',api_fetched_name ='$api_fetched_name' WHERE student_id='$sid'";
      mysqli_query($conn,$query);
      
                                       }else if((empty($api_fetched_name_cleaned)==true) and ($account_exists==false) and ($success==false) and($status_code==422) and($message_code=="verification_failed")){
      $msg="Not Availble";
      $color="red";
      $st="<p style=color:".$color.">".$msg."</p>";
      $final_name="<p style=color:".$ncolor.">".$api_fetched_name."</p>";
      $status=$st;
      //$status="<p style=color:".$color.">".$msg."</p>";
      
      $stu= "Not Availble";
      $query ="UPDATE students SET api_bank_st ='$stu',api_fetched_name ='$api_fetched_name' WHERE student_id='$sid'";
      mysqli_query($conn,$query);
       
                                       }else if(empty($jsondata)==true){
       
      $msg="Not Verified Yet";
      $color="brown";
      $st="<p style=color:".$color.">".$msg."</p>";
      //$status="<p style=color:".$color.">".$msg."</p>";
        $status=$st;
      
      
                                       }else{
      $msg="API Balance Is Finished";
      $color="red";
      $status="<p style=color:".$color.">".$msg."</p>";
      
      
   }
                                       echo $status;
                                        ?>
                                    </td>
                                    <td>
                                        <?php echo $user['course_details']; ?></td>
                                
                                	
                                    <td>
                                        <?php echo $user['state']; ?>
                                    </td>
                                    <td>
                                        <?php echo $user['caste_details']; ?>
                                    </td>
                                   
                                 <td>Approved By Our Site</td>

                                </tr>
                            <?php } 
                  




                  

                <?php } ?>
            </div>
       
       </div>
</div>

<script type="text/javascript">
    $(document).ready( function () {

        var searchHash = location.hash.substr(1),
            searchString = searchHash.substr(searchHash.indexOf('search='))
                .split('&')[0]
                .split('=')[1];

        if(searchHash != '' ){
            searchString = searchString.replace(/%20/g, " ");
        }

        // console.log(searchHash);
        // console.log(searchString);

        function cloneStudents() {
            alert("yepiee");
        }


        var table = $('#studentAllTable').DataTable({
            dom: 'Blfrtip',
            "pageLength": 10,
            responsive: true,
            "lengthChange": true,
            "lengthMenu": [[10, 25, 50,75,100,500, -1], [10, 25, 50,75,100,500, "All"]],
            "oSearch": { "sSearch": searchString },
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]


        });

        $(document).on('click', '.remarksSection p' , function() {
            $(this).parent().find('#remarkModal').modal('show');
        });

    });
</script>