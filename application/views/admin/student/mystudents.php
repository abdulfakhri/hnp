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
</style>
<?php 

$assignedStudentArray = array();
    foreach ($assignedTaskList as $assignedStudent) {
        $assignedStudentArray[$assignedStudent['stu_id']] = $assignedStudent;
    }
   $assignedTaskList = $assignedStudentArray;


?>
<div class="row all_stud_table">
    <div class="col-lg-12">
        <div class="panel panel-info">
            <div class="panel-heading"> <i class="fa fa-list"></i> My Students


                <?php if ($this->session->userdata('role') == 'admin'): ?>
                <a href="<?php echo base_url('admin/student/createStudent') ?>" class="btn btn-info btn-sm pull-right"><i
                        class="fa fa-plus"></i>&nbsp;New Student</a> &nbsp;

                <!--   <a href="<?php echo base_url('admin/student/power') ?>" class="btn btn-info btn-sm pull-right"><i class="fa fa-plus"></i> &nbsp;User Power</a> -->
                <?php else: ?>
                <!-- check logged user role permissions -->

                
                <a href="<?php echo base_url('admin/student/createStudent') ?>" class="btn btn-info btn-sm pull-right"><i
                        class="fa fa-plus"></i>&nbsp;New Student</a>
                <?php endif; ?>

            </div>

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
                <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>TR Number</th>
                            <th>Name</th>
                            <th>Mobile</th>
                            <th>Account No.</th>
                            <th>Course</th>
                            <th>Agent Name</th>
                            <th>Created By</th>
                            <!-- <th>Created At</th> -->
                            <th>Modified By</th>
                            <!-- <th>Modified At</th> -->
                            <th>Remarks</th>
                            <th>Status</th>
                        <?php if($this->session->userdata('role') == 'admin'){ ?>
                            <th>Action</th>
                        <?php } ?>
                        </tr>
                    </thead>
                 
                    <tbody>
                        <?php 
                        $scount = 0;
                        foreach ($users as $user): 
                            $unserlizedData = $user;
                            /*
                            * todo: add control condition  from employee to admin
                            */
                            if(($unserlizedData['uploadedBy'] == $this->session->userdata('id') || $this->session->userdata('role') == 'admin') && $user['is_deleted'] != 1) { 

                             //if( $this->session->userdata('role') == 'admin'|| (($this->session->userdata('id') == $assignedTaskList[$user['student_id']]['emp_id']) && $assignedTaskList[$user['student_id']]['stu_id'] == $user['student_id'] ) && $user['is_deleted'] != 1) { 

                                $scount++;
                        ?>

                        <tr>
                            <td><?=$scount?></td>
                            <td>
                                <?php echo maskSenstiveData($unserlizedData['tr_number']); ?>
                            </td>                            
                            <td>
                                <a href="javascript:void();">
                                    <?php echo $unserlizedData['first_name']." ".$unserlizedData['last_name'];?>
                                </a>
                            </td>
                      
                            <td>
                                <?php echo  maskSenstiveData($unserlizedData['mobile']); ?>
                            </td>
                             <td>
                                <?php echo  maskSenstiveData($unserlizedData['account_number']); ?>
                            </td>
                            <td>
                                <?php echo $unserlizedData['course_details']; ?></td>
                            <td>
                                <?php echo  maskSenstiveData($unserlizedData['agent_name']); ?>
                            </td>
                            <td>
                                <?php echo  maskSenstiveData(getEmployeeNamebyId($unserlizedData['uploadedBy'])); ?>
                            </td>
                            <!--  <td>
                                <?php echo my_date_show_time($unserlizedData['createdAt']); ?>
                            </td> -->
                            <td>
                                <?php echo  maskSenstiveData(getEmployeeNamebyId($unserlizedData['lastModifiedBy'])); ?>
                            </td>
                           <!--  <td>
                                <?php echo my_date_show_time($unserlizedData['updatedAt']); ?>
                            </td> -->
 							<?php 
 								$statusRemarkSection = unserialize($studentStatus[$user['student_id']]['formData']);
 								if($statusRemarkSection['formData']['status_reason']){
 									$remarksContent = $statusRemarkSection['formData']['status_reason'];
 								}else {
 									$remarksContent = trim($unserlizedData['remarks']);
 								}

 							?>
                            <td class="remarksSection">
                                <p style="max-width: 100px; text-overflow: ellipsis; overflow: hidden;"><?php echo $remarksContent ?></p>
                                 <!-- Modal -->
                                  <div id="remarkModal" class="modal fade" id="myModal" role="dialog">
                                    <div class="modal-dialog modal-xl">
                                    
                                      <!-- Modal content-->
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                          <h2 class="modal-title">Remark</h2>
                                          <h4> <?php echo $unserlizedData['first_name']." ".$unserlizedData['last_name']; ?> (<?php echo $unserlizedData['tr_number']; ?>)</h4>
                                        </div>
                                        <div class="modal-body">
                                         <label style="white-space: break-spaces;"><?php echo $remarksContent; ?></label>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                      </div>
                                      
                                    </div>
                                  </div>
                            </td>
                            <td><?php echo isset($studentStatus[$user['student_id']]['Status'])? $studentStatus[$user['student_id']]['Status'] : "Pending From Our Site"?></td>
                        </tr>
                        <?php } endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready( function () {

        //  var table = $('table.display').DataTable({
        //     "lengthChange": true,
        //     "lengthMenu": [[10, 50, 100,500, -1], [10, 50, 100,500, "All"]],
        //      "pageLength": 75,
        // });

        $(document).on('click', '.remarksSection p' , function() {
            $(this).parent().find('#remarkModal').modal('show');
        });
    
    });
</script>