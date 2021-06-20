<?php error_reporting(0) ?>
<!-- Start Page Content -->
<?php
// echo "<pre>";
// print_r($user);
// die;
// print_r($assignedTaskList);
// die('xxx');

//$userData = (object)unserialize($user->student_uploaded_data);
$bonafide = explode(',', $userData->bonafide);
$p_photo = explode(',', $userData->p_photo);
$prtc = explode(',', $userData->prtc);
$caste_certi = explode(',', $userData->caste_certi);
$ac_front = explode(',', $userData->ac_front);
$ac_back = explode(',', $userData->ac_back);
$income_certi = explode(',', $userData->income_certi);

//$userData=$user;

$course = $caste = $banks = $states = array();

// for states
$states['Assam'] = 'Assam';
$states['Tripura'] = 'Tripura';


//For Banks
$banks['Gramin Bank'] = 'Gramin Bank';
$banks['ICICI Bank'] = 'ICICI Bank';
$banks['State Bank of India'] = 'State Bank of India';

// For Caste
$caste['SC'] = 'SC';
$caste['ST'] = 'ST';
$caste['OBC'] = 'OBC';


//GNM,BSC,Post Bsc, Msc, MBA, LLb,Pharmacy,Bed 
$course['GNM Nursing'] = 'GNM Nursing';
$course['BSc Nursing'] = 'BSc Nursing';
$course['(Post Basic) BSc Nursing'] = '(Post Basic) BSc Nursing';
$course['MSc Nursing'] = 'MSc Nursing';
$course['MBA'] = 'MBA';
$course['Pharmacy'] = 'Pharmacy';
$course['LLB'] = 'LLB';
$course['B.ed'] = 'B.ed';
?>
<style type="text/css">
  thead,
  tfoot {
    background: #03a9f3;
  }

  thead tr th,
  tfoot tr th {
    color: #fff;
  }

  tbody {
    color: #000;
  }

  tr[data-class|="rejectStudent"],
  li.rejectStudent,
  td[data-class|="rejectStudent"] {
    background-color: #ff00009e !important;
  }

  tr[data-class|="approveStudents"],
  li.approveStudents,
  td[data-class|="approveStudents"] {
    background-color: mediumspringgreen !important;
  }

  tr[data-class|="defectStudents"],
  li.defectStudents,
  td[data-class|="defectStudents"] {
    background-color: #ab8ce48a !important;
  }

  tr[data-class|="pendingStudents"],
  li.pendingStudents,
  td[data-class|="pendingStudents"] {
    background-color: yellow !important;
  }
</style>
<?php
$assignedStudentArray = array();
foreach ($assignedTaskList as $assignedStudent) {
  $assignedStudentArray[$assignedStudent['stu_id']] = $assignedStudent;
}
$assignedTaskList = $assignedStudentArray;


function startsWith($string, $startString)
{
  $len = strlen($startString);
  return (substr($string, 0, $len) === $startString);
}

?>


<?php
$word = "site";
$mystring = $originalStatus;

if (strlen($originalStatus) > 0) {
} else { ?>
  <style type="text/css">
    .college,
    .nsp {
      display: none;
    }
  </style>
<?php }

// Test if string contains the word 
if (strpos($mystring, $word) !== false) { ?>
  <style type="text/css">
    .site,
    .nsp {
      display: none;
    }
  </style>
<?php } ?>

<?php
$word = "college";
$mystring = $originalStatus;

// Test if string contains the word 
if (strpos($mystring, $word) !== false) { ?>
  <style type="text/css">
    .college,
    .site {
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
if (strpos($mystring, $word) !== false) { ?>
  <style type="text/css">
    .nsp,
    .approveSection,
    .defectSection,
    .rejectSection,
    .edit_btn {
      display: none;
    }

    .lastInfo {
      display: block;
    }
  </style>
<?php } ?>


<?php
$word = "reject";
$mystring = $originalStatus;

// Test if string contains the word 
if (strpos($mystring, $word) !== false) { ?>
  <style type="text/css">
    .nsp,
    .approveSection,
    .defectSection,
    .rejectSection,
    .edit_btn {
      display: none;
    }

    .lastInfo {
      display: block;
    }
  </style>
<?php } ?>


<?php
$word = "defect";
$mystring = $originalStatus;

// Test if string contains the word 
if (strpos($mystring, $word) !== false) { ?>
  <style type="text/css">
    .nsp,
    .approveSection,
    .defectSection,
    .rejectSection,
    .edit_btn {
      display: none;
    }

    .lastInfo {
      display: block;
    }
  </style>
<?php } ?>


<div class="row">
  <div class="col-lg-12">


    <div class="panel panel-info">
      <div class="panel-heading">
        <i class="fa fa-pencil"></i> &nbsp;Student Edit <a href="<?php echo base_url('admin/student/all_student_list') ?>" class="btn btn-info btn-sm pull-right"><i class="fa fa-list"></i> All Student </a>

      </div>
      <div class="panel-body table-responsive">

        <?php $error_msg = $this->session->flashdata('error_msg'); ?>
        <?php if (isset($error_msg)) : ?>
          <div class="alert alert-danger delete_msg pull" style="width: 100%"> <i class="fa fa-times"></i> <?php echo $error_msg; ?> &nbsp;
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">�</span> </button>
          </div>
        <?php endif ?>

        <?php $msg = $this->session->flashdata('msg'); ?>
        <?php if (isset($msg)) : ?>
          <div id="statusNotification" class="alert alert-success delete_msg pull" style="width: 100%"> <i class="fa fa-check-circle"></i> <?php echo $msg; ?> &nbsp;
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">�</span> </button>
          </div>
        <?php endif ?>


        <form method="post" action="<?php echo base_url('/admin/student/update/' . "$userData->student_id") ?>" class="form-horizontal student_data_form" enctype="multipart/form-data">

          <div class="form-group row">
            <div class="col-sm-4">
              <label for="example-text">Application Number Availability <span class="req_idetifier">*</span></label>
              <select class="form-control custom-select trnumber" name="trnumber" onchange="yesnoCheck2(this);">
                <option value="pending" <?php if ($userData->trnumber == "pending") echo 'selected="selected"'; ?>>Pending</option>
                <option value="other" <?php if ($userData->trnumber == "other") echo 'selected="selected"'; ?>>Enter The Application Number</option>
              </select>
            </div>
            <div class="col-sm-4" id="ifYesTrNumber">
              <label for="example-text">Application Number <span class="req_idetifier">*</span></label>
              <input type="text" id='tr_number' value="<?php echo $userData->tr_number ?>" <?php if ($userData->trnumber == "pending") { ?>readonly <?php } ?> name="tr_number" class="form-control" required data-validation-required-message="Application Number is required">
            </div>
            <div class="col-sm-4" id="">
              <label for="example-text">Student Status</span></label><br />

              <select name="student_status" id="student_status" class="form-control">
                <option select><?php echo $userData->student_status ?></option>
                <option value="">
                  <hr>
                </option>
                <option select>Select Status</option>


                <option value="approved_by_our_site">Approved By Our Site</option>
                <option value="reject_by_our_site">Rejected By Our Site</option>
                <option value="defect_by_our_site">Defected By Our Site</option>
                <option value="pending_by_our_site">Pending By Our Site</option>
                <option value="approved_by_college">Approved By College Site</option>
                <option value="rejected_by_college">Rejected By College Site</option>
                <option value="defect_by_college">Defected By College Site</option>
                <option value="pending_by_college">Pending By College Site</option>
                <option value="approved_by_nsp">Approved By NSP Site</option>
                <option value="rejected_by_nsp">Rejected By NSP Site</option>
                <option value="defect_by_nsp">Defected By NSP Site</option>
                <option value="pending_by_nsp">Pending By NSP Site</option>
              </select>
            </div>
          </div>
          <fieldset>
            <legend>Personal Details</legend>
            <div class="form-group row">
              <div class="col-sm-6">
                <label for="example-text">Full Name <span class="req_idetifier">*</span></label>
                <input type="text" name="full_name" value="<?php echo $userData->full_name ?>" class="form-control" required data-validation-required-message="Name is required">
              </div>
              <div class="col-sm-6">
                <label for="example-text">Father Name <span class="req_idetifier">*</span></label>
                <input type="text" name="dad_name" value="<?php echo $userData->dad_name ?>" class="form-control" required data-validation-required-message="Father Name is required">
              </div>
            </div>

            <div class="form-group row">

              <div class="col-sm-6">
                <label for="example-text">Mother Name <span class="req_idetifier">*</span></label>
                <input type="text" name="mom_name" value="<?php echo $userData->mom_name ?>" class="form-control" required data-validation-required-message="Mother Name is required">
              </div>
              <div class="col-sm-6">
                <label for="example-text">Date of Birth <span class="req_idetifier">*</span></label>
                <input type="date" name="dob" class="form-control" value="<?php echo $userData->dob ?>" required data-validation-required-message="Date of birth is required">
              </div>
            </div>

            <div class="form-group row">

              <div class="col-sm-6">
                <label for="example-text">Gender <span class="req_idetifier">*</span></label>
                <div class="gender_class">
                  <div class="gender_option"><input type="radio" name="gender" value="Male" <?php echo ($userData->gender == 'Male') ?  "checked" : "";  ?> class="form-control m-r-10" required><span>Male</span></div>
                  <div class="gender_option"><input type="radio" name="gender" value="Female" <?php echo ($userData->gender == 'Female') ?  "checked" : "";  ?> class="form-control m-r-10" required><span>Female</span></div>
                </div>
              </div>
              <div class="col-sm-6">
                <label class="col-md-12" for="example-text">Phone Number <span class="req_idetifier">*</span></label>
                <input type="text" name="mobile" value="<?php echo $userData->mobile ?>" class="form-control" required data-validation-required-message="Phone Number is required">
              </div>
            </div>


            <div class="form-group  row">
              <div class="col-sm-6">
                <label class="col-md-12" for="example-text">Aadhar</label>
                <input type="text" name="aadhar_number" value="<?php echo $userData->aadhar_number ?>" class="form-control">
              </div>
              <div class="col-sm-6">
                <label class="col-md-12" for="example-text">Family Income</label>
                <input type="text" name="income_details" value="<?php echo $userData->income_details ?>" class="form-control">
              </div>

            </div>
            <div class="form-group row">
              <div class="col-sm-6">
                <label class="col-md-12" for="example-text">State *</label>

                <select class="form-control custom-select" name="state" aria-invalid="false" required>
                  <option disabled value="0">Select</option>
                  <?php foreach ($states as $st_keys => $st_values) : ?>
                    <option <?php if ($st_values == $userData->state) {
                              echo 'selected="selected"';
                            } ?> value="<?php echo $st_keys ?>"><?php echo $st_values; ?></option>

                    <!-- <option value="<?php echo $st_keys ?>"><?php echo $st_values; ?></option> -->
                  <?php endforeach ?>
                </select>
              </div>
              <div class="col-sm-6">
                <label class="col-md-12" for="example-text">District</label>
                <input type="text" name="district" class="form-control" value="<?php echo $userData->district ?>">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-6">
                <label class="col-md-12" for="example-text">Sub Division</label>
                <input type="text" name="sub_division" class="form-control" value="<?php echo $userData->sub_division ?>">
              </div>

              <div class="col-sm-6">
                <label class="col-md-12" for="example-text">Caste<span class="req_idetifier">*</span></label>
                <!-- <input type="text" name="caste_details" value="<?php echo $userData->caste_details ?>" class="form-control" required data-validation-required-message="Caste details is required"> -->

                <select class="form-control custom-select" name="caste_details" aria-invalid="false" required>
                  <option disabled value="0">Select</option>
                  <?php foreach ($caste as $st_keys => $st_values) : ?>
                    <!-- <option value="<?php echo $st_keys ?>"><?php echo $st_values; ?></option> -->
                    <option <?php if ($st_values == $userData->caste_details) {
                              echo 'selected="selected"';
                            } ?> value="<?php echo $st_keys ?>"><?php echo $st_values; ?></option>
                  <?php endforeach ?>
                </select>

              </div>
            </div>
            <div class="form-group row">


              <div class="col-sm-6">
                <label class="col-md-12" for="example-text">City/Village</label>
                <input type="text" name="address1" class="form-control" value="<?php echo $userData->address1; ?>">
              </div>
              <div class="col-sm-6">
                <label class="col-md-12" for="example-text">Pin Code</label>
                <input type="text" name="pin_code" class="form-control" value="<?php echo $userData->pin_code ?>">
              </div>

            </div>



          </fieldset>
          <fieldset>
            <legend>Educational Details</legend>
            <div class="separator m-b-20 m-t-20">Previous course details</div>
            <div class="form-group  row ">
              <div class="col-sm-6 ol-md-6 col-xs-12">
                <label class="col-md-12" for="example-text">10<sup>th</sup> Passing Year</label>
                <input type="number" value="<?php echo $userData->ten_year ?>" name="ten_year" class="form-control">
              </div>

              <div class="col-sm-6 ol-md-6 col-xs-12">
                <label class="col-md-12" for="example-text">12<sup>th</sup> Passing Year</label>
                <input type="number" value="<?php echo $userData->plustwo_year ?>" name="plustwo_year" class="form-control">
              </div>
            </div>
            <div class="form-group  row ">
              <div class="col-sm-6 ol-md-6 col-xs-12">
                <label class="col-md-12" for="example-text">10th Marks</label>
                <input type="number" value="<?php echo $userData->ten_marks ?>" name="ten_marks" class="form-control">
              </div>

              <div class="col-sm-6 ol-md-6 col-xs-12">
                <label class="col-md-12" for="example-text">12th Marks</label>
                <input type="number" value="<?php echo $userData->plustwo_marks ?>" name="plustwo_marks" class="form-control">
                <?php if (isset($userData->createdAt)) { ?>
                  <input type="hidden" name="createdAt" value="<?= $userData->createdAt ?>">
                <?php  } else { ?>
                  <input type="hidden" name="createdAt" value="<?= current_datetime() ?>">
                <?php } ?>
                <input type="hidden" name="uploadedBy" value="<?= $userData->uploadedBy ?>">
                <input type="hidden" name="updatedAt" value="<?= current_datetime() ?>">
                <input type="hidden" name="lastModifiedBy" value="<?= $this->session->userdata('id') ?>">
              </div>
            </div>
            <div class="separator m-b-20 m-t-20">Current course details</div>
            <div class="form-group  row ">
              <div class="col-sm-6">
                <label class="col-md-12" for="example-text">College Name</label>
                <input type="text" value="<?php echo $userData->education_details ?>" name="education_details" class="form-control">
              </div>

              <div class="col-sm-6 ol-md-6 col-xs-12">
                <label class="col-md-12" for="example-text">Current Year(1<sup>st</sup>,2<sup>nd</sup>,3<sup>rd</sup>,4<sup>th</sup>)</label>
                <input type="text" value="<?php echo $userData->education_details_year ?>" name="education_details_year" class="form-control">
              </div>

            </div>

          </fieldset>

          <div class="form-group row ">
            <div class="col-sm-6">
              <label class="col-md-12" for="example-text">Course Details</label>
              <!-- <input type="text" name="course_details" value="<?= $userData->course_details ?>" class="form-control"> -->
              <select class="form-control custom-select" name="course_details" aria-invalid="false">
                <option disabled value="0">Select</option>
                <?php foreach ($course as $st_keys => $st_values) : ?>
                  <!-- <option value="<?php echo $st_keys ?>"><?php echo $st_values; ?></option> -->
                  <option <?php if ($st_values == $userData->course_details) {
                            echo 'selected="selected"';
                          } ?> value="<?php echo $st_keys ?>"><?php echo $st_values; ?></option>

                <?php endforeach ?>
              </select>
            </div>
            <div class="col-sm-6">
              <label class="col-md-12" for="example-text">Scholarship Amount</label>
              <input type="text" name="scholarship_amount" value="<?= $userData->scholarship_amount ?>" class="form-control">
            </div>

          </div>
          <fieldset>
            <legend> Bank Details </legend>
            <div class="form-group row">
              <div class="col-sm-12 col-lg-4 col-md-4">
                <label class="col-md-12" for="example-text"> Bank Name</label>

                <select class="form-control custom-select bank_name_section" name="bank_name" aria-invalid="false">
                  <option disabled value="0">Select</option>
                  <?php foreach ($banks as $st_keys => $st_values) : ?>
                    <option <?php if ($st_values == $userData->bank_name) {
                              echo 'selected="selected"';
                            } ?> value="<?php echo $st_keys ?>"><?php echo $st_values; ?></option>
                    <!-- <option value="<?php echo $st_keys ?>"><?php echo $st_values; ?></option> -->
                  <?php endforeach ?>
                </select>
              </div>

              <div class="col-sm-12 col-lg-4 col-md-4">
                <label class="col-md-12" for="example-text"> Account Number</label>
                <input type="text" name="account_number" id="account_number" class="form-control" value="<?= $userData->account_number ?>" placeholder="Account Number" required>
              </div>

              <div class="col-sm-12 col-lg-4 col-md-4">
                <label class="col-md-12" for="example-text">IFSC Code</label>
                <input type="text" name="ifsc_code" id="ifsc_code" class="form-control" value="<?= $userData->ifsc_code ?>" placeholder="IFSC Code" maxlength="11" minlength="11">
              </div>
            </div>
          </fieldset>

          <div class="form-group row">
            <div class="col-sm-6">
              <label class="col-md-6" for="example-text">Agent Name</label>
              <input type="text" value="<?= $userData->agent_name ?>" name="agent_name" class="form-control">
            </div>
            <div class="col-sm-6">
              <label class="col-md-6" for="example-text">Agent Mobile Number</label>
              <input type="text" value="<?= $userData->agent_mobile ?>" name="agent_mobile" class="form-control">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-6">
              <label class="col-md-6" for="example-text">Credits</label>
              <input type="text" value="" name="credit_amount" class="form-control">
            </div>
            <div class="col-sm-6">
              <label class="col-md-6" for="example-text">Withdrawal</label>
              <input type="text" value="" name="withdraw" class="form-control">
              <input type="hidden" value="<?= $userData->account_balance ?>"" name=" account_balance" class="form-control">
            </div>
          </div>
          <fieldset>
            <legend>Documents Upload</legend>
            <div class="form-group  row ">
              <div class="col-sm-6 ol-md-6 col-xs-12">
                <div class="white-box">
                  <h3 class="box-title">Bonafide </h3>
                  <label for="input-file-max-fs">Bonafide</label>
                  <input type="file" id="bonafide" name="bonafide" class="dropify" data-max-file-size="2M" data-show-remove="false" data-default-file="/<?php echo $bonafide['0'] ?>" />
                  <input type="hidden" name="hidden_bonfide" value="<?php echo $userData->bonafide ?>">
                </div>
              </div>
              <div class="col-sm-6 ol-md-6 col-xs-12">
                <div class="white-box">
                  <h3 class="box-title">Photo </h3>
                  <label for="input-file-max-fs">Photo</label>
                  <input type="file" id="p_photo" name="p_photo" class="dropify" data-max-file-size="2M" data-show-remove="false" data-default-file="/<?php echo $p_photo['0'] ?>" />
                  <input type="hidden" name="hidden_p_photo" value="<?php echo $userData->p_photo ?>">
                </div>
              </div>
            </div>

            <div class="form-group  row ">
              <div class="col-sm-6 ol-md-6 col-xs-12">
                <div class="white-box">
                  <h3 class="box-title">PRTC </h3>
                  <label for="input-file-max-fs">PRTC</label>
                  <input type="file" id="prtc" name="prtc" class="dropify" data-max-file-size="2M" data-show-remove="false" data-default-file="/<?php echo $prtc['0'] ?>" />
                  <input type="hidden" name="hidden_prtc" value="<?php echo $userData->prtc ?>">
                </div>
              </div>
              <div class="col-sm-6 ol-md-6 col-xs-12">
                <div class="white-box">
                  <h3 class="box-title">Caste </h3>
                  <label for="input-file-max-fs">Caste</label>
                  <input type="file" id="caste_certi" name="caste_certi" class="dropify" data-max-file-size="2M" data-show-remove="false" data-default-file="/<?php echo $caste_certi['0'] ?>" />
                  <input type="hidden" name="hidden_caste_certi" value="<?php echo $userData->caste_certi ?>">
                </div>
              </div>
            </div>

            <div class="form-group  row ">
              <div class="col-sm-4 ol-md-4 col-xs-12">
                <div class="white-box">
                  <h3 class="box-title">Aadhar Card (Front) </h3>
                  <label for="input-file-max-fs">Aadhar Card (Front)</label>
                  <input type="file" id="ac_front" name="ac_front" class="dropify" data-max-file-size="2M" data-show-remove="false" data-default-file="/<?php echo $ac_front['0'] ?>" />
                  <input type="hidden" name="hidden_ac_front" value="<?php echo $userData->ac_front ?>">
                </div>
              </div>
              <div class="col-sm-4 ol-md-4 col-xs-12">
                <div class="white-box">
                  <h3 class="box-title">Aadhar Card (Back) </h3>
                  <label for="input-file-max-fs">Aadhar Card (Back)</label>
                  <input type="file" id="ac_back" name="ac_back" class="dropify" data-max-file-size="2M" data-show-remove="false" data-default-file="/<?php echo $ac_back['0'] ?>" />
                  <input type="hidden" name="hidden_ac_back" value="<?php echo $userData->ac_back ?>">
                </div>

              </div>

              <div class="col-sm-4 ol-md-4 col-xs-12">
                <div class="white-box">
                  <h3 class="box-title">Income Certificate </h3>
                  <label for="input-file-max-fs">Income Certificate</label>
                  <input type="file" id="income_certi" name="income_certi" class="dropify" data-max-file-size="2M" data-show-remove="false" data-default-file="/<?php echo $income_certi['0'] ?>" />
                  <input type="hidden" name="hidden_income_certi" value="<?php echo $userData->income_certi ?>">
                </div>
              </div>
            </div>
          </fieldset>
          <div class="form-group row">
            <label class="col-md-6" for="example-text">Remarks for Admin about student</label>
            <textarea id="textarea" name="remarks" rows="10" class="form-control" required><?= $userData->remarks ?></textarea>
          </div>

          <div class="form-group row">
            <div class="col-sm-6">
              <label class="col-md-6" for="example-text">Student Created By</label>
              <input type="text" id="emp_name" readonly name="emp_name" class="form-control">
            </div>

            <div class="col-sm-6">
              <label class="col-md-6" for="example-text">Student Created At</label>
              <input type="text" id="c_time" readonly name="c_time" value="<?= my_date_show_time($userData->createdAt) ?>" class="form-control">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-6">
              <label class="col-md-6" for="example-text">Last Modified By</label>
              <input type="text" id="last_emp_name" readonly name="last_emp_name" class="form-control">
            </div>

            <div class="col-sm-6">
              <label class="col-md-6" for="example-text">Last Modified At</label>
              <input type="text" id="last_time" readonly name="last_time" value="<?= my_date_show_time($userData->updatedAt) ?>" class="form-control">
            </div>
          </div>
          <hr>
          <!-- CSRF token -->
          <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" />
          <div class="form-group row  ">
            <div class="col-sm-offset-3 col-lg-2 col-sm-4 col-xs-12 mb-1 mt-1 p-3 ">
              <?php if ($this->session->userdata('role') == 'admin') { ?>
                <button type="submit" class="btn btn-info btn-block btn-rounded btn-lg"> <i class="fa fa-plus"></i>&nbsp;&nbsp;Update</button>
                <?php  } else {
                foreach ($assignedTaskList as $check_assigned) {
                  if ($check_assigned['emp_id'] == $this->session->userdata('id')) { ?>
                    <input type="hidden" class="task_assign_status" name="task_assign_statuss">
                    <button type="button" id="assign_warning" class="asigned_btn btn btn-info btn-block btn-rounded btn-lg"> <i class="fa fa-plus"></i>&nbsp;&nbsp;Update</button>
                <?php }
                }

                ?>


              <?php } ?>
            </div>
           
          </div>

          <!-- final div closing tags -->
      </div> <!-- final div closing tags -->

      </form>

    </div>
  </div>
</div>
</div>

<!-- code for ssetting the student status -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="exampleModalCenterTitle">Modal title</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" id="student_status_form" action="<?php echo base_url('admin/student/status') ?>" class="form-horizontal">
          <ul class="icheck-list">
            <li>
              <input type="radio" class="check" id="college_approved" name="flat-radio" data-radio="iradio_flat-green">
              <label for="college_approved">Approved By College</label>
            </li>
            <li>
              <input type="radio" class="check" id="nsp_approved" name="flat-radio" data-radio="iradio_flat-green">
              <label for="nsp_approved">Approved By NSP</label>
            </li>
          </ul>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" id="modal_close_btn" class="btn btn-secondary btn btn-block btn-rounded btn-lg" data-dismiss="modal">Close</button>
        <button type="button" id="modal_success_btn" class="btn btn-primary btn btn-block btn-rounded btn-lg btn-success">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- End Page Content -->
<script>
  $(document).ready(function() {
    $('html, body').animate({
      scrollTop: 0
    }, 'slow');
    $.ajax({
      url: "<?= site_url("admin/student/getEmployeeName") ?>",
      type: "post",
      data: {
        emp_id: '<?= $userData->uploadedBy ?>',
        '<?php echo $this->security->get_csrf_token_name(); ?>': '<?= $this->security->get_csrf_hash(); ?>'
      },
      success: function(response) {
        $('#emp_name').val(response);
      }
    });

    $.ajax({
      url: "<?= site_url("admin/student/getEmployeeName") ?>",
      type: "post",
      data: {
        emp_id: '<?= $userData->lastModifiedBy ?>',
        '<?php echo $this->security->get_csrf_token_name(); ?>': '<?= $this->security->get_csrf_hash(); ?>'
      },
      success: function(response) {
        $('#last_emp_name').val(response);
      }
    });

    $(document).on('change', 'input[type=radio]', function() {
      $('input[type=radio]:checked').not(this).prop('checked', false);
    });

    // Form Submit for the modal section 
    $(document).on('click', '#modal_success_btn', function() {

      var new_obj = {};
      $.each($('#student_status_form').serializeArray(), function(i, obj) {
        new_obj[obj.name] = obj.value
      })

      $.ajax({
        url: '<?php echo base_url('admin/student/status') ?>', //this is the submit URL
        type: 'POST',
        data: {
          'formData': new_obj,
          'student_id': '<?= $userData->student_id ?>',
          'student_status': $(this).html(),
          '<?php echo $this->security->get_csrf_token_name(); ?>': '<?= $this->security->get_csrf_hash(); ?>'
        },
        success: function(data) {
          $('#exampleModalCenter').modal('hide');
          location.reload();
        }
      });
    });


    $(document).on('focusout', '#tr_number,#account_number', function() {
      var clickedElement = $(this);
      $.ajax({
        url: "<?= site_url("admin/student/check_tr_bnk") ?>",
        type: "post",
        data: {
          stu_id: '<?= $s_id ?>',
          sel_textBox_id: $(this).attr('id'),
          sel_value: $(this).val(),
          pageType: 'editSection',
          '<?php echo $this->security->get_csrf_token_name(); ?>': '<?= $this->security->get_csrf_hash(); ?>'
        },
        success: function(response) {
          var msg = JSON.parse(response);
          if (msg.ajax_msg != 'OK') {
            alert(msg.ajax_msg);
            clickedElement.val('');
          } else {
            clickedElement.css('border-color', '#000');
          }
        }
      });
    });
    $(":file").on('change', function(evt) {
      console.log(this.files[0].size);
      $(this).parent().after("<div><p style='color:red; margin-top:5px; font-weight:bold; text-align:center'> Image size : <u>" + this.files[0].size + " Kbs</u></p></div>");
    });

    $('#assign_warning').click(function() {
      swal({
        title: "Is Assigned task completed?",
        text: "You will not be able to update the student till reassign",
        type: "warning",
        showCancelButton: true,
        cancelButtonText: "No",
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes",
        closeOnConfirm: false,
        closeOnCancel: false
      }, function(isConfirm) {
        if (isConfirm) {
          swal("Ok!", "Student Will be updated soon.", "success");
          $('.task_assign_status').val(1);
          // swal("Deleted!", "Your imaginary file has been deleted.", "success");   
        } else {
          $('.task_assign_status').val(0);
          // swal("Cancelled", "Your imaginary file is safe :)", "error"); 

        }
        console.log($('.student_data_form').submit());
      });
    });

  });
</script>
<script type="text/javascript">
  $(document).ready(function() {

    var searchHash = location.hash.substr(1),
      searchString = searchHash.substr(searchHash.indexOf('search='))
      .split('&')[0]
      .split('=')[1];

    if (searchHash != '') {
      searchString = searchString.replace(/%20/g, " ");
    }

    // console.log(searchHash);
    // console.log(searchString);

    function cloneStudents() {
      alert("yepiee");
    }


    var table = $('#studentAllTable').DataTable({
      dom: 'Blfrtip',
      "pageLength": 75,
      responsive: true,
      "lengthChange": true,
      "lengthMenu": [
        [10, 25, 50, 75, 100, 500, -1],
        [10, 25, 50, 75, 100, 500, "All"]
      ],
      "oSearch": {
        "sSearch": searchString
      },
      buttons: [
        'copy', 'csv', 'excel', 'pdf', 'print'
      ]


    });

    $(document).on('click', '.remarksSection p', function() {
      $(this).parent().find('#remarkModal').modal('show');
    });

  });
</script>