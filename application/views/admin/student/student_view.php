<?php error_reporting(0) ;?>
<style type="text/css">
    .single_student_view .ribbon-wrapper .stud_body_font {
    font-size: 15px;
    font-weight: 800;
    /*text-decoration: underline;*/
    color: #000;
}
.separator {
    display: flex;
    align-items: center;
    text-align: center;
    font-size: 23px;
}
.separator::before, .separator::after {
    content: '';
    flex: 1;
    /*border-bottom: 1px solid #000;*/
    border-bottom: 7px double #000;
}
.separator::before {
    margin-right: .25em;
}
.separator::after {
    margin-left: .25em;
}
.panel-heading span label {
     color: #fff !important; 
}
.imageSize{
    color: #000;
    font-weight: normal;
}
.formDetailsSection .ribbon-wrapper {
    border-color: #ff0000;
}
.uploadedByNmae , .f_date , .lstModifiedByNmae , .imageSize{
    color: #ff0000 !important;
}
.single_student_view label.applicationStatus {
    font-size: 22px;
    font-weight: 600;
    margin-bottom: 10px;
    text-align: right;
    width: 50%;
}
.single_student_view label.tr_no {
    width: 48%;
}

.lastInfo{
            display: none;
        }

@media only screen 
  and (min-width: 320px) 
  and (max-width: 736px) {
    .single_student_view label.applicationStatus {
       text-align: left;
       width: 100%;
    }
    .single_student_view label.tr_no {
        width: 100%;
    }
}

</style>


<?php
$word = "site";
$mystring = $originalStatus;

if(strlen($originalStatus)>0){}else{ ?>
	  <style type="text/css">
        .college , .nsp{
            display: none;
        }
    </style>
<?php }

// Test if string contains the word
if(strpos($mystring, $word) !== false){?>
    <style type="text/css">
        .site , .nsp{
            display: none;
        }
    </style>
<?php } ?>

<?php
$word = "college";
$mystring = $originalStatus;

// Test if string contains the word
if(strpos($mystring, $word) !== false){?>
    <style type="text/css">
        .college ,.site {
            display: none;
        }
        /*.site{
            display: none;
        }*/
    </style>
<?php } ?>

<?php
$word = "nsp";
$mystring = $originalStatus;
// Test if string contains the word
if(strpos($mystring, $word) !== false){?>
    <style type="text/css">
        .nsp , .approveSection , .defectSection , .rejectSection ,.edit_btn{
            display: none;
        }
        .lastInfo{
            display: block;
        }
    </style>
<?php } ?>


<?php
$word = "reject";
$mystring = $originalStatus;
// Test if string contains the word 
if(strpos($mystring, $word) !== false){?>
    <style type="text/css">
        .nsp , .approveSection , .defectSection , .rejectSection ,.edit_btn{
            display: none;
        }
        .lastInfo{
            display: block;
        }
    </style>
<?php } ?>


<?php
$word = "defect";
$mystring = $originalStatus;
 
// Test if string contains the word 
if(strpos($mystring, $word) !== false){?>
    <style type="text/css">
        .nsp , .approveSection , .defectSection , .rejectSection ,.edit_btn{
            display: none;
        }
        .lastInfo{
            display: block;
        }
    </style>
<?php } ?>


<?php

$unserlizedData = unserialize($user->student_uploaded_data);
$unserlizedData = $user->student_uploaded_data;
foreach($country as $countries){
    if($countries['id'] == $unserlizedData['country']){
        $country_name = $countries['name'];
    }
}

$stud_bonafide= explode(",",$unserlizedData['bonafide']);
$stud_pic= explode(",",$unserlizedData['p_photo']);
$stud_prtc= explode(",",$unserlizedData['prtc']);
$stud_caste= explode(",",$unserlizedData['caste_certi']);
$stud_front= explode(",",$unserlizedData['ac_front']);
$stud_back= explode(",",$unserlizedData['ac_back']);
$stud_income= explode(",",$unserlizedData['income_certi']);
$stud_plustwo_marksheet= explode(",",$unserlizedData['plustwo_marksheet']);

if(array_key_exists('fileName',$_POST)){
   downloadFile($_POST);
}

?>

<!-- Start Page Content -->

<div class="row single_student_view">
    <div class="col-lg-12">


        <div class="panel panel-info">
            <div class="panel-heading">
                <span>
                   <label> TR Number:&nbsp; </label> <label><?php echo $user->tr_number; ?></label>
                </span>
                <!-- <a href="<?php echo base_url('admin/student/update/'.$user->student_id) ?>" class="btn btn-info btn-sm pull-right">
                    <i class="fa fa-pencil"></i> &nbsp;Edit Student Details
                </a> -->
                <a href="<?php echo base_url('admin/student/all_student_list') ?>" class="btn btn-info btn-sm pull-right"><i
                        class="fa fa-list"></i> All Students 
                </a>
            </div>

            <div class="panel-body table-responsive">

                <?php $error_msg = $this->session->flashdata('error_msg'); ?>
                <?php if (isset($error_msg)): ?>
                <div class="alert alert-danger delete_msg pull" style="width: 100%"> <i class="fa fa-times"></i>
                    <?php echo $error_msg; ?> &nbsp;
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span
                            aria-hidden="true">�</span> </button>
                </div>
                <?php endif ?>

                <!-- .row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="white-box">
                            
                            <div class="row m-b-10">
                                <label class="tr_no">TR Number: <?php echo $user->tr_number;  ?></label>
                                <label class="applicationStatus">Status: <?php echo strlen($currentStatus) > 0 ? $currentStatus  : "Not Available "; ?></label>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 d-flex m-t-10">
                                    <div class="ribbon-wrapper">
                                        <div class="ribbon ribbon-bookmark ribbon-default">Personal Details</div>
                                       
                                        <div class="row m-t-10">
                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                <div class="form-group">
                                                    <div class="col-md-4 col-sm-6">
                                                        <p class="stud_head_font">
                                                            <label class="control-label">Student Name:</label>
                                                        </p>
                                                    </div>
                                                    <div class="col-md-8 col-sm-6">
                                                        <p class="stud_body_font"> <?php echo $user->full_name; ?> </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                <div class="form-group">
                                                    <div class="col-md-4 col-sm-6">
                                                        <p class="stud_head_font">
                                                            <label class="control-label">Father Name: </label>
                                                        </p>
                                                    </div>
                                                    <div class="col-md-8 col-sm-6">
                                                        <p class="stud_body_font"> <?php echo $user->dad_name; ?> </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row m-t-10">
                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                <div class="form-group">
                                                    <div class="col-md-4 col-sm-6">
                                                        <p class="stud_head_font">
                                                            <label class="control-label">Mother Name:</label>
                                                        </p>
                                                    </div>
                                                    <div class="col-md-8 col-sm-6">
                                                        <p class="stud_body_font"> <?php echo $user->mom_name; ?> </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                <div class="form-group">
                                                    <div class="col-md-4 col-sm-6">
                                                        <p class="stud_head_font">
                                                            <label class="control-label">Date Of Birth: </label>
                                                        </p>
                                                    </div>
                                                    <div class="col-md-8 col-sm-6">
                                                        <p class="stud_body_font">
                                                           <?php
                                                             $dob=$user->dob;
                                         
                                                             echo date("d/m/Y", strtotime($dob)); 
                                        
                                                            ?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row m-t-10">
                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                <div class="form-group">
                                                    <div class="col-md-4 col-sm-6">
                                                        <p class="stud_head_font">
                                                            <label class="control-label">Gender:</label>
                                                        </p>
                                                    </div>
                                                    <div class="col-md-8 col-sm-6">
                                                        <p class="stud_body_font"> <?php echo $user->gender; ?> </p>
                                                    </div>
                                                </div>
                                            </div>
                                          
                                        </div>

                                        <div class="row m-t-10">
                                            
                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                <div class="form-group">
                                                    <div class="col-md-4 col-sm-6">
                                                        <p class="stud_head_font">
                                                            <label class="control-label">Contact: </label>
                                                        </p>
                                                    </div>
                                                    <div class="col-md-8 col-sm-6">
                                                        <p class="stud_body_font"> <?php echo $user->mobile; ?> </p>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                               <div class="col-md-6 col-sm-6 col-lg-6">
                                                <div class="form-group">
                                                    <div class="col-md-4 col-sm-6">
                                                        <p class="stud_head_font">
                                                            <label class="control-label">Aadhar: </label>
                                                        </p>
                                                    </div>
                                                    <div class="col-md-8 col-sm-6">
                                                        <p class="stud_body_font"> <?php echo $user->aadhar_number; ?> </p>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>

                                         <div class="row m-t-10">
                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                <div class="form-group">
                                                    <div class="col-md-4 col-sm-6">
                                                        <p class="stud_head_font">
                                                            <label class="control-label">Village: </label>
                                                        </p>
                                                    </div>
                                                    <div class="col-md-8 col-sm-6">
                                                        <p class="stud_body_font"> <?php echo $user->address1; ?> </p>
                                                    </div>
                                                </div>
                                            </div>
                                          
                                        </div>

                                        <div class="row m-t-10">
                                            
                                             <div class="col-md-6 col-sm-6 col-lg-6">
                                                <div class="form-group">
                                                    <div class="col-md-4 col-sm-6">
                                                        <p class="stud_head_font">
                                                            <label class="control-label">Sub Division: </label>
                                                        </p>
                                                    </div>
                                                    <div class="col-md-8 col-sm-6">
                                                        <p class="stud_body_font"> <?php echo $user->sub_division; ?> </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row m-t-10">
                                           
                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                <div class="form-group">
                                                    <div class="col-md-4 col-sm-6">
                                                        <p class="stud_head_font">
                                                            <label class="control-label">State: </label>
                                                        </p>
                                                    </div>
                                                    <div class="col-md-8 col-sm-6">
                                                        <p class="stud_body_font"> <?php echo $user->state; ?> </p>
                                                    </div>
                                                </div>
                                               
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                <div class="form-group">
                                                    <div class="col-md-4 col-sm-6">
                                                        <p class="stud_head_font">
                                                            <label class="control-label">District: </label>
                                                        </p>
                                                    </div>
                                                    <div class="col-md-8 col-sm-6">
                                                        <p class="stud_body_font"> <?php echo $user->district; ?> </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row m-t-10">
                                            
                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                <div class="form-group">
                                                    <div class="col-md-4 col-sm-6">
                                                        <p class="stud_head_font">
                                                            <label class="control-label">Pin Code: </label>
                                                        </p>
                                                    </div>
                                                    <div class="col-md-8 col-sm-6">
                                                        <p class="stud_body_font"> <?php echo $user->pin_code; ?> </p>
                                                    </div>
                                                </div>
                                               
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                <div class="form-group">
                                                    <div class="col-md-4 col-sm-6">
                                                        <p class="stud_head_font">
                                                            <label class="control-label">Country: </label>
                                                        </p>
                                                    </div>
                                                    <div class="col-md-8 col-sm-6">
                                                        <p class="stud_body_font"> <?php echo $user->country; ?> </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row m-t-10">
                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                <div class="form-group">
                                                    <div class="col-md-4 col-sm-6">
                                                        <p class="stud_head_font">
                                                            <label class="control-label">Family Income: </label>
                                                        </p>
                                                    </div>
                                                    <div class="col-md-8 col-sm-6">
                                                        <p class="stud_body_font"> <?php echo $user->income_details; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="col-md-6 col-sm-6 col-lg-6">
                                                <div class="form-group">
                                                    <div class="col-md-4 col-sm-6">
                                                        <p class="stud_head_font">
                                                            <label class="control-label">Caste </label>
                                                        </p>
                                                    </div>
                                                    <div class="col-md-8 col-sm-6">
                                                        <p class="stud_body_font">  <?php echo $user->caste_details; ?></p>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 d-flex m-t-10">
                                    <div class="ribbon-wrapper"  style="width:100%; word-break: break-word;">
                                        <div class="ribbon ribbon-bookmark ribbon-danger">Educational Details
                                        </div>
                                         <div class="separator m-b-20 m-t-20">Previous course details</div>
                                        <div class="row m-t-10">
                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                <div class="form-group">
                                                    <div class="col-md-4 col-sm-6">
                                                        <p class="stud_head_font">
                                                            <label class="control-label">10<sup>th</sup> Passing Yr:</label>
                                                            
                                                        </p>
                                                    </div>
                                                    <div class="col-md-8 col-sm-6">
                                                       <p class="stud_body_font"> <?php echo $user->ten_year; ?> </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                <div class="form-group">
                                                    <div class="col-md-4 col-sm-6">
                                                        <p class="stud_head_font">
                                                            <label class="control-label"> 10th<sup>th</sup> Marks: </label>
                                                        </p>
                                                    </div>
                                                    <div class="col-md-8 col-sm-6">
                                                        <p class="stud_body_font"> <?php echo $user->ten_marks; ?> </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row m-t-10">
                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                <div class="form-group">
                                                    <div class="col-md-4 col-sm-6">
                                                        <p class="stud_head_font">
                                                            <label class="control-label">12<sup>th</sup> Passing Yr:</label>

                                                        </p>
                                                    </div>
                                                    <div class="col-md-8 col-sm-6">
                                                        <p class="stud_body_font"> <?php echo $user->plustwo_year; ?> </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                <div class="form-group">
                                                    <div class="col-md-4 col-sm-6">
                                                        <p class="stud_head_font">
                                                            <label class="control-label"> 12th<sup>th</sup> Marks: </label>
                                                        </p>
                                                    </div>
                                                    <div class="col-md-8 col-sm-6">
                                                        <p class="stud_body_font"> <?php echo $user->plustwo_marks; ?> </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                         <div class="separator m-b-20 m-t-20">Current course details</div>
                                        <div class="row m-t-10">
                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                <div class="form-group">
                                                    <div class="col-md-4 col-sm-6">
                                                        <p class="stud_head_font">
                                                            <label class="control-label">College Name</label>
                                                        </p>
                                                    </div>
                                                    <div class="col-md-8 col-sm-6">
                                                        <p class="stud_body_font"><?php echo $user->education_details; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                <div class="form-group">
                                                    <div class="col-md-4 col-sm-6">
                                                        <p class="stud_head_font">
                                                            <label class="control-label">Current Year: </label>
                                                        </p>
                                                    </div>
                                                    <div class="col-md-8 col-sm-6">
                                                         <p class="stud_body_font"><?php echo $user->education_details_year; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row m-t-10">
                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                <div class="form-group">
                                                    <div class="col-md-4 col-sm-6">
                                                        <p class="stud_head_font">
                                                            <label class="control-label">Course Name:</label>
                                                        </p>
                                                    </div>
                                                    <div class="col-md-8 col-sm-6">
                                                        <p class="stud_body_font"><?php echo $user->course_details; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                <div class="form-group">
                                                    <div class="col-md-4 col-sm-6">
                                                        <p class="stud_head_font">
                                                            <label class="control-label">Scholarship Amount: </label>
                                                        </p>
                                                    </div>
                                                    <div class="col-md-8 col-sm-6">
                                                        <p class="stud_body_font"><?php echo $user->scholarship_amount; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> 


                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 d-flex m-t-10">
                                    <div class="ribbon-wrapper" style="width:100%; word-break: break-word;">
                                        <div class="ribbon ribbon-bookmark ribbon-default">Bank Details</div>

                                        <div class="row m-t-10">
                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                <div class="form-group">
                                                    <div class="col-md-4 col-sm-6">
                                                        <p class="stud_head_font">
                                                            <label class="control-label">Bank Name:</label>
                                                        </p>
                                                    </div>
                                                    <div class="col-md-8 col-sm-6">
                                                        <p class="stud_body_font"> <?php echo $user->bank_name; ?> </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                <div class="form-group">
                                                    <div class="col-md-4 col-sm-6">
                                                        <p class="stud_head_font">
                                                            <label class="control-label">Account Number: </label>
                                                        </p>
                                                    </div>
                                                    <div class="col-md-8 col-sm-6">
                                                         <p class="stud_body_font"> <?php 
                                                        $ac=$user->account_number=$user->bnk_acnt_number;
                                                        echo $ac; ?> </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row m-t-10">
                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                <div class="form-group">
                                                    <div class="col-md-4 col-sm-6">
                                                        <p class="stud_head_font">
                                                            <label class="control-label">IFSC Code:</label>
                                                        </p>
                                                    </div>
                                                    <div class="col-md-8 col-sm-6">
                                                        <p class="stud_body_font"> <?php echo $user->ifsc_code; ?> </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 d-flex m-t-10">
                                    <div class="ribbon-wrapper" style="width:100%; word-break: break-word;">
                                        <div class="ribbon ribbon-bookmark ribbon-default">Other Details</div>

                                        <div class="row m-t-10">
                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                <div class="form-group">
                                                    <div class="col-md-4 col-sm-6">
                                                        <p class="stud_head_font">
                                                            <label class="control-label">Agent Name:</label>
                                                        </p>
                                                    </div>
                                                    <div class="col-md-8 col-sm-6">
                                                        <p class="stud_body_font"> <?php echo $user->agent_name; ?> </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                <div class="form-group">
                                                    <div class="col-md-4 col-sm-6">
                                                        <p class="stud_head_font">
                                                            <label class="control-label">Agent Number: </label>
                                                        </p>
                                                    </div>
                                                    <div class="col-md-8 col-sm-6">
                                                        <p class="stud_body_font"> <?php echo $user->agent_mobile; ?> </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row m-t-10">                                           
                                            <div class="col-md-12 col-sm-12 col-lg-12">
                                                <div class="form-group">
                                                    <div class="col-md-2 col-sm-2">
                                                        <p class="stud_head_font">
                                                            <label class="control-label">Remarks: </label>
                                                        </p>
                                                    </div>
                                                    <div class="col-md-8 col-sm-8">
                                                        <p class="stud_body_font"> <?php echo $user->remarks; ?> </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 d-flex m-t-10 formDetailsSection">
                                    <div class="ribbon-wrapper" style="width:100%; word-break: break-word;">
                                        <div class="ribbon ribbon-bookmark ribbon-default">Forms Details</div>

                                        <div class="row m-t-10">
                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                <div class="form-group">
                                                    <div class="col-md-4 col-sm-6">
                                                        <p class="stud_head_font">
                                                            <label class="control-label">Created By</label>
                                                        </p>
                                                    </div>
                                                    <div class="col-md-8 col-sm-6">
                                                        <p class="stud_body_font uploadedByNmae "> <?php echo $user->uploadedBy; ?> </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                <div class="form-group">
                                                    <div class="col-md-4 col-sm-6">
                                                        <p class="stud_head_font">
                                                            <label class="control-label">Created At </label>
                                                        </p>
                                                    </div>
                                                    <div class="col-md-8 col-sm-6">
                                                        <p class="stud_body_font f_date"> <?php echo my_date_show_time($user->createdAt); ?> </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                         <div class="row m-t-10">
                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                <div class="form-group">
                                                    <div class="col-md-4 col-sm-6">
                                                        <p class="stud_head_font">
                                                            <label class="control-label">Modified By:</label>
                                                        </p>
                                                    </div>
                                                    <div class="col-md-8 col-sm-6">
                                                        <p class="stud_body_font lstModifiedByNmae "> <?php echo $user->lastModifiedBy; ?> </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                <div class="form-group">
                                                    <div class="col-md-4 col-sm-6">
                                                        <p class="stud_head_font">
                                                            <label class="control-label">Modified At:</label>
                                                        </p>
                                                    </div>
                                                    <div class="col-md-8 col-sm-6">
                                                        <p class="stud_body_font f_date"> <?php echo my_date_show_time($user->updatedAt); ?> </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                            
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title m-b-2 doc_head">Documents Uploaded</h3>
                            <div id="image-popups" class="row">
                                <div class="col-sm-3 mb-5">
                                    <a href="/<?php echo $user->bonafide;?>" data-effect="mfp-3d-unfold" title="Bonafide Certificate">
                                        <img src="/<?php echo $user->bonafide;?>" style="width:195px; height:130px;" class="m-b-5 img-responsive" />
                                        <br/>Bonafide Certificate
                                    </a>
                                    <br>
                                    
                                      
                                </div>
                                <div class="col-sm-3 mb-5">
                                    <a href="/<?php echo $user->p_photo;?>" data-effect="mfp-3d-unfold" title="Profile Picture">
                                        <img src="/<?php echo $user->p_photo;?>" style="width:195px; height:130px;" class="m-b-5 img-responsive" />
                                        <br/>Profile Picture
                                    </a>
                                    <br>
                                   
                             
                                </div>
                                <div class="col-sm-3 mb-5">
                                    <a href="/<?php echo $user->prtc;?>" data-effect="mfp-3d-unfold" title="PRTC">
                                        <img src="/<?php echo $user->prtc;?>" style="width:195px; height:130px;" class="m-b-5 img-responsive"/>
                                        <br/>PRTC
                                    </a>
                                    <br>
                                    
                                </div>
                                <div class="col-sm-3 mb-5">
                                    <a href="/<?php echo  $user->caste_certi;?>" data-effect="mfp-3d-unfold" title="Caste Certificate">
                                        <img src="/<?php echo $user->caste_certi;?>" style="width:195px; height:130px;" class="m-b-5 img-responsive" />
                                        <br/>Caste Certificate
                                    </a>
                                    <br>
                                   
                                </div>
                                <div class="col-sm-3 mb-5">
                                    <a href="/<?php echo  $user->ac_back;?>" data-effect="mfp-3d-unfold" title="Aadhar Front">
                                        <img src="/<?php echo  $user->ac_back;?>" style="width:195px; height:130px;" class="m-b-5 img-responsive" />
                                        <br/>Aadhar Front
                                    </a>
                                    <br>
                                  
                                </div>
                                <div class="col-sm-3 mb-5">
                                    <a href="/<?php echo $user->ac_front;?>" data-effect="mfp-3d-unfold" title="Aadhar Back">
                                        <img src="/<?php echo $user->ac_front;?>" style="width:195px; height:130px;" class="m-b-5 img-responsive" />
                                        <br/>Aadhar Back
                                    </a>
                                    <br>
                  
                                </div>
                                 <div class="col-sm-3 mb-5">
                                    <a href="/<?php echo $user->income_certi;?>" data-effect="mfp-3d-unfold" title="Income Certificate">
                                        <img src="/<?php echo $user->income_certi;?>" style="width:195px; height:130px;" class="m-b-5 img-responsive" />
                                        <br/>Income Certificate
                                    </a>
                                    <br>
                                   
                                </div>
                             
                            </div>
                        </div>
                    </div>
                </div>
                <!-- .row -->
                   <div class="form-group row  ">
                            <div class="col-sm-offset-3 col-lg-2 col-sm-4 col-xs-12 mb-1 mt-1 p-3 ">
                                  <button  data-target="<?php echo base_url('admin/student/update/'.$user->student_id) ?>" class="btn btn-info edit_btn btn-block btn-rounded btn-lg"> <i class="fa fa-edit"></i>&nbsp;&nbsp;Edit</button>
                            </div>
                             <div class="col-sm-offset-3 col-lg-2 col-sm-4 col-xs-12 mb-1 mt-1 p-3 approveSection">
                                    <div class="btn btn-block btn-success btn-rounded btn-lg approve_btn"><i class="fa fa-check-square-o"></i>&nbsp;&nbsp;Approve</div>
                                </div>
                                <!--  <div class=" col-sm-offset-3 col-lg-2 col-sm-4 col-xs-12 mb-1 mt-1 p-3 ">
                                    <div class="btn btn-block btn-warning btn-rounded btn-lg pending_btn"><i class="fa fa-exclamation-triangle"></i>&nbsp;&nbsp;Pending</div>
                                </div> -->
                                <div class="col-sm-offset-3 col-lg-2 col-sm-4 col-xs-12 mb-1 mt-1 p-3 defectSection">
                                    <div class="btn btn-block btn-primary btn-rounded btn-lg defect_btn"><i class="fa fa-thumbs-down"></i>&nbsp;&nbsp;Defect</div>
                                </div>
                               
                                <div class="col-sm-offset-3 col-lg-2 col-sm-4 col-xs-12 mb-1 mt-1 p-3 rejectSection ">
                                    <div class="btn btn-block btn-danger btn-rounded btn-lg reject_btn">Reject</div>
                                </div>
                                 <div class="col-lg-12 col-sm-4 col-xs-12 mb-1 mt-1 p-3 lastInfo">
                                 	<button style="color: black;font-size: 25px;font-weight: bold;" data-target="<?php echo base_url('admin/student/deleteStatus/'.$user->student_id) ?>" class="btn btn-warning reset_single_student btn-block btn-rounded btn-lg"> <i class="fa fa-edit"></i>&nbsp;&nbsp;Reset Status Student</button>

                                    <div style="color: black;font-size: 25px;font-weight: bold;" class="btn btn-block btn-danger btn-rounded btn-lg disabled info-btn">Status Can't be changed now!!!. Only student status can be reset</div>
                                </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <!-- code for ssetting the student status -->
   
    <!-- End Page Content -->
<script type="text/javascript">
         $(document).ready(function() {
           $('html, body').animate({ scrollTop: 0 }, 'slow');

                $(document).on('change', 'input[type=radio]', function() {
                    $('input[type=radio]:checked').not(this).prop('checked', false);
                });
// get Employee Name 
              
                    $.ajax({
                        url: "<?=site_url("admin/student/getEmployeeName")?>",
                        type: "post",
                        data: {
                                emp_id:"<?=$unserlizedData['uploadedBy']?>",
                                '<?php echo $this->security->get_csrf_token_name(); ?>': '<?=$this->security->get_csrf_hash();?>'
                        },
                        success:function(response){
                         $('.uploadedByNmae').html(response);
                        }
                    });
             
             $.ajax({
                        url: "<?=site_url("admin/student/getEmployeeName")?>",
                        type: "post",
                        data: {
                                emp_id:"<?=$unserlizedData['lastModifiedBy']?>",
                                '<?php echo $this->security->get_csrf_token_name(); ?>': '<?=$this->security->get_csrf_hash();?>'
                        },
                        success:function(response){
                         $('.lstModifiedByNmae').html(response);
                        }
                    });
             

// edit button
                // $('.edit_btn').on('click', function(event) {
              $(document).on('click', '.edit_btn', function(event) {
                    event.preventDefault(); 
                    var url = $(this).data('target');
                    location.replace(url);
                });
                  $(document).on('click', '.reset_single_student', function(event) {
                    event.preventDefault(); 
                    var url = $(this).data('target');
                    location.replace(url);
                });

// Form Submit for the modal section 
             $(document).on('click', '#modal_success_btn', function() {

                var new_obj = {};
                $.each($('#student_status_form').serializeArray(), function(i, obj) { new_obj[obj.name] = obj.value })

               $.ajax({
                      url: '<?php echo base_url('admin/student/status') ?>', //this is the submit URL
                      type: 'POST',
                      data:{ 
                             'formData':new_obj,
                              'student_id':'<?=$user->student_id?>',
                              'student_status':$(this).html(),
                             '<?php echo $this->security->get_csrf_token_name(); ?>': '<?=$this->security->get_csrf_hash();?>'
                    },
                      success: function(data){
                      $('#exampleModalCenter').modal('hide');
                     location.reload();
                      }
                  });
               });
});
</script>
