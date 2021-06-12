
<div class="row all_stud_table">
        <div class="col-lg-12">
          

            <div class="panel-body table-responsive">
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
                          
                          
                           
                        </tr>
                        </thead>
                      
                        <tbody>
                        <?php
                        $all_scount = $all_assam_stu = $all_tripura_stu = 0;
                        foreach ($users as $user):
                            $unserlizedData =$user;
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
                                        <?php echo $user['course_details']; ?></td>
                                
                                	
                                    <td>
                                        <?php echo $user['state']; ?>
                                    </td>
                                    <td>
                                        <?php echo $user['caste_details']; ?>
                                    </td>
                                   
                                 <td><?php 
                                 echo isset($studentStatus[$user['student_id']]['Status']) ? $studentStatus[$user['student_id']]['Status'] : "Pending From Our Site" ;
                                 $dbname = "u979436226_hnsp";
                                 $username = "u979436226_hnsp";
                                 $password = "!@#123qweasdZXC";
                                 $conn=mysqli_connect($host,$username,$password,$dbname);
                                 if(!$conn){
                                     die('Could not Connect MySql Server:' .mysql_error());
                                 }
                                 $ur=$user['student_id'];
                                 //$query ="UPDATE students2 SET student_status =".$studentStatus[$user['student_id']]['Status']." WHERE student_id=".$ur."";
                                 $query ="UPDATE students2 SET student_status ='".$studentStatus[$user['student_id']]['Status']."' WHERE student_id='".$user['student_id']."'";
                                 mysqli_query($conn,$query);
                                 
                                 ?></td>

                               
                            <?php } ?>
                        <?php endforeach //user foreach ended ?>
                        </tbody>
                    </table>
            

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