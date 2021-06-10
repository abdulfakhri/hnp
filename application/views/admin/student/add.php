<?php error_reporting(0) ?>
<?php

$course = $caste = $banks = $states = array();

// for states
$states['Assam'] = 'Assam';
$states['Tripura'] = 'Tripura';


//For Banks
$banks['Gramin Bank'] = 'Gramin Bank';
$banks['ICICI Bank'] = 'ICICI Bank';
$banks['State Bank of India'] = 'State Bank of India';

$caste['SC'] ='SC';
$caste['ST'] ='ST';
$caste['OBC'] ='OBC';
$caste['RM'] ='RM';
$caste['General'] ='General';


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

<div class="row">
    <div class="col-lg-12">


        <div class="panel panel-info">

            <div class="panel-body table-responsive">

                <?php $error_msg = $this->session->flashdata('error_msg'); ?>
                <?php if (isset($error_msg)): ?>
                    <div class="alert alert-danger delete_msg pull" style="width: 100%"> <i class="fa fa-times"></i> <?php echo $error_msg; ?> &nbsp;
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                    </div>
                <?php endif ?>


                <form method="post" action="<?php echo base_url('admin/student/add') ?>" enctype="multipart/form-data" class="form-horizontal" >

                    <div class="form-group row">
                        <h1>Add New Student</h1>

                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <label for="example-text">Application Number Availability  <span class="req_idetifier">*</span></label>
                            <select class="form-control custom-select trnumber" name="trnumber" onchange="yesnoCheck2(this);">
                                <option value="pending" <?php if($userData->trnumber=="pending") echo 'selected="selected"'; ?> >Pending</option>
                                <option value="other" <?php if($userData->trnumber=="other") echo 'selected="selected"'; ?>>Enter The Application Number</option>
                            </select>
                        </div>
                        <div class="col-sm-4" id="ifYesTrNumber">
                            <label for="example-text">Application Number <span class="req_idetifier">*</span></label>
                            <input type="text" id='tr_number' value="<?php echo $userData->tr_number ?>" <?php if($userData->trnumber=="pending"){?>readonly <?php }?> name="tr_number" class="form-control" required data-validation-required-message="Application Number is required">
                        </div>
                       <div class="col-sm-4">
                            <label for="example-text">Year  <span class="req_idetifier">*</span></label>
                            <select class="form-control custom-select trnumber" name="year" required>
                                
                               <option value="Pending">Pending</option>
                                <option value="2020">2020</option>
                                <option value="2021">2021</option>
                                <option value="2022">2022</option>
                            </select>
                        </div>
                    </div>
            </div>
            <fieldset>
                <legend>Personal Details</legend>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="example-text">Student Name <span class="req_idetifier">*</span></label>
                        <input type="text" name="full_name" class="form-control" required data-validation-required-message="First Name is required">
                    </div>
                   <div class="col-sm-6">
                        <label for="example-text">Father Name <span class="req_idetifier">*</span></label>
                        <input type="text" name="dad_name" class="form-control" required data-validation-required-message="Father Name is required">
                    </div>
                </div>

                <div class="form-group row">
                    
                    <div class="col-sm-6">
                        <label for="example-text">Mother Name <span class="req_idetifier">*</span></label>
                        <input type="text" name="mom_name" class="form-control" required data-validation-required-message="Mother Name is required">
                    </div>
                     <div class="col-sm-6">
                        <label for="example-text">Date of Birth <span class="req_idetifier">*</span></label>
                        <input type="date" name="dob" class="form-control" required data-validation-required-message="Date of birth is required">
                    </div>
                </div>

                <div class="form-group row">
                   
                    <div class="col-sm-6">
                        <label for="example-text">Gender <span class="req_idetifier">*</span></label>
                        <div class="gender_class">
                            <div class="gender_option"><input type="radio" name="gender" value="Male" class="form-control m-r-10" required><span>Male</span></div>
                            <div  class="gender_option"><input type="radio" name="gender" value="Female" class="form-control m-r-10" required><span>Female</span></div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <label class="col-md-12" for="example-text">Phone Number <span class="req_idetifier">*</span></label>
                        <input type="text" name="mobile" id="mobile" class="form-control" required data-validation-required-message="Phone Number is required">
                    </div>
                </div>


               

                <div class="form-group  row ">
                      <div class="col-sm-6">
                        <label class="col-md-12" for="example-text">Aadhar </label>
                        <input type="text" name="aadhar_number" class="form-control">
                    </div>
                     <div class="col-sm-6">
                        <label class="col-md-12" for="example-text">Family Income</label>
                        <input type="text" name="income_details" class="form-control">
                    </div>
                    
                </div>
                  <div class="form-group  row ">
                     <div class="col-sm-6">
                        <label class="col-md-12" for="example-text">State <span class="req_idetifier">*</span></label>
                        <select class="form-control custom-select" name="state" aria-invalid="false" required>
                            <option disabled value="0">Select</option>
                            <?php foreach ($states as $st_keys=>$st_values): ?>
                                <option value="<?php echo $st_keys ?>"><?php echo $st_values; ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <label class="col-md-12" for="example-text">District</label>
                        <input type="text" name="district" class="form-control">
                    </div>
                   
                   
                    
                </div>
                   <div class="form-group  row ">
                        <div class="col-sm-6">
                        <label class="col-md-12" for="example-text">Sub Division <span class="req_idetifier">*</span></label>
                        <input type="text" name="sub_division" class="form-control" required data-validation-required-message="State is required">
                    </div>
                    
                  <div class="col-sm-6">
                        <label class="col-md-12" for="example-text">Caste<span class="req_idetifier">*</span></label>
                        <!-- <input type="text" name="caste_details" class="form-control" required data-validation-required-message="Caste details is required"> -->
                        <select class="form-control custom-select" name="caste_details" onchange="showUser(this.value)" aria-invalid="false" required>
                            <option disabled value="0">Select</option>
                            <?php foreach ($caste as $st_keys=>$st_values): ?>
                                <option value="<?php echo $st_keys ?>"><?php echo $st_values; ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
                
                <div class="form-group  row ">
                     <div class="col-sm-6">
                        <label class="col-md-12" for="example-text">Village/City</label>
                        <input type="text" name="address1" class="form-control">
                    </div>
                  <div class="col-sm-6">
                        <label class="col-md-12" for="example-text">Pin Code </label>
                        <input type="text" name="pin_code" class="form-control">
                    </div>
               
                   
                </div>

            </fieldset>
            <fieldset>
                <legend>Educational Details</legend>
                <div class="separator m-b-20 m-t-20">Previous course details</div>
                <div class="form-group  row ">
                    <div class="col-sm-6 ol-md-6 col-xs-12">
                        <label class="col-md-12" for="example-text">10<sup>th</sup> Passing Year</label>
                        <input type="text" name="ten_year" class="form-control" >
                    </div>
                    <div class="col-sm-6 ol-md-6 col-xs-12">
                        <label class="col-md-12" for="example-text">10<sup>th</sup> Marks </label>
                        <input type="text" name="ten_marks" class="form-control"  >
                    </div>

                </div>
                <div class="form-group  row ">
                    <div class="col-sm-6 ol-md-6 col-xs-12">
                        <label class="col-md-12" for="example-text">12<sup>th</sup> Passing Year</label>
                        <input type="text" name="plustwo_year" class="form-control">
                    </div>

                    <div class="col-sm-6 ol-md-6 col-xs-12">
                        <label class="col-md-12" for="example-text">12<sup>th</sup> Marks</label>
                        <input type="text" name="plustwo_marks" class="form-control">
                        <input type="hidden" name="uploadedBy" value="<?=$this->session->userdata('id')?>">
                        <input type="hidden" name="createdAt" value="<?=current_datetime()?>">
                        <input type="hidden" name="updatedAt" value="<?=current_datetime()?>">
                        <input type="hidden" name="lastModifiedBy" value="<?=$this->session->userdata('id')?>">
                    </div>
                </div>
                <div class="separator m-b-20 m-t-20">Course Name details</div>
                <div class="form-group  row ">
                    <div class="col-sm-6 ol-md-6 col-xs-12">
                        <label class="col-md-12" for="example-text">College Name:</label>
                        <input type="text" name="education_details"  class="form-control">
                    </div>
                    
                    
                    <div class="col-sm-6">
                    <label class="col-md-12" for="example-text">Course Details <span class="req_idetifier"></span></label>
                    <!-- <input type="text" name="course_details" class="form-control"> -->
                    <select class="form-control custom-select" name="course_details" onchange="showUser(this.value)" aria-invalid="false">
                        <option disabled value="0">Select</option>
                        <?php foreach ($course as $st_keys=>$st_values): ?>
                            <option value="<?php echo $st_keys ?>"><?php echo $st_values; ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                </div>


            </fieldset>
          
            <div class="form-group row ">
                <div class="col-sm-6 ol-md-6 col-xs-12">
                        <label class="col-md-12" for="example-text">Current Year(1<sup>st</sup>,2<sup>nd</sup>,3<sup>rd</sup>,4<sup>th</sup>)</label>
                        <input type="text" name="education_details_year"  class="form-control">
                    </div>
               <div class="col-sm-6">
                    <label class="col-md-12" for="example-text">Scholarship Amount</label>
                    <input type="text" name="scholarship_amount" class="form-control">
                </div>

            </div>

            <fieldset>
                <legend>  Bank Details  </legend>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label class="col-md-12" for="example-text"> Bank Name</label>
                        <!-- <input type="text" name="bank_name" class="form-control" placeholder="Bank Name" required> -->
                        <select class="form-control custom-select bank_name_section" name="bank_name" aria-invalid="false" >
                            <option disabled value="0">Select</option>
                            <?php foreach ($banks as $st_keys=>$st_values): ?>
                                <option value="<?php echo $st_keys ?>"><?php echo $st_values; ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>

                    <div class="col-sm-6">
                        <label class="col-md-12" for="example-text"> Account Number </label>
                        <input type="text" id="account_number" name="account_number" class="form-control" placeholder="Account Number">
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-6">
                        <label class="col-md-12" for="example-text">IFSC Code</label>
                        <input type="text" name="ifsc code" class="form-control" maxlength="11" minlength="11" placeholder="IFSC Code">
                    </div>
                </div>
            </fieldset>
         
            <fieldset>
                <legend> Agent Details</legend>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label class="col-md-6" for="example-text">Agent Name</label>
                        <input type="text" name="agent_name" class="form-control">
                    </div>
                    <div class="col-sm-6">
                        <label class="col-md-6" for="example-text">Agent Mobile Number</label>
                        <input type="text" name="agent_mobile" class="form-control">
                    </div>
                </div>
            </fieldset>
            <fieldset>
                <legend>Documents Upload</legend>
                <div class="form-group  row ">
                     <div class="col-sm-6 ol-md-6 col-xs-12">
                        <div class="white-box">
                            <h3 class="box-title">Photo<span class="req_idetifier">*</span> </h3>
                          
                            <input type="file" id="p_photo" name="p_photo" class="dropify"  data-max-file-size="2M" />
                        </div>
                    </div>
                    <div class="col-sm-6 ol-md-6 col-xs-12">
                        
                        <div class="white-box">
                           
                            <h3 class="box-title">Aadhar Card (Front)<span class="req_idetifier">*</span> </h3>
                            <input type="file" id="ac_front" name="ac_front" class="dropify"  data-max-file-size="2M" />
                        </div>
                    
                       
                    </div>
                   
                </div>
                <div class="form-group  row ">
                    <div class="col-sm-6 ol-md-6 col-xs-12">
                     <div class="white-box">
                          <h3 class="box-title">Aadhar Card (Back)</h3>
                           
                            <input type="file" id="ac_back" name="ac_back" class="dropify"  data-max-file-size="2M" />
                         </div>
                    </div>
                    <div class="col-sm-6 ol-md-6 col-xs-12">
                        <div class="white-box">
                            <h3 class="box-title">PRTC <span class="req_idetifier"></span> </h3>
                            
                            <input type="file" id="prtc" name="prtc" class="dropify"  data-max-file-size="2M" />
                        </div>
                    </div>
                    
                </div>    

                <div class="form-group  row ">
                    
                    <div class="col-sm-6 ol-md-6 col-xs-12">
                        <div class="white-box">
                            <h3 class="box-title">Caste <span class="req_idetifier">*</span> </h3>
                            
                            <input type="file" id="caste_certi" name="caste_certi"  class="dropify" data-max-file-size="2M" />
                        </div>
                    </div>
                    <div class="col-sm-6 ol-md-6 col-xs-12">
                     <div class="white-box">
                            <h3 class="box-title">Bonafide </h3>
                            
                            <input type="file" id="bonafide" name="bonafide" class="dropify" data-max-file-size="2M" />
                        </div>
                        </div>
                </div>
                <div class="form-group  row ">
                
                    <div class="col-sm-6 ol-md-6 col-xs-12">
                        <div class="white-box">
                            
                            <label for="input-file-max-fs">Please Upload the Income Certificate</label>
                            <input type="file" id="income_certi" name="income_certi"  class="dropify" data-max-file-size="2M" />
                        </div>
                    </div>
                </div>
            </fieldset>
            <div class="form-group row">
                <label class="col-md-6" for="example-text">Remarks for Admin about student</label>
                <textarea id="textarea" name="remarks" rows=10 class="form-control"></textarea>
            </div>

            <!-- custom Field  end -->

        </div>
        <hr>
        <!-- CSRF token -->
        <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />
        <div class="form-group row">
            <!-- <div class="col-sm-offset-3 col-lg-2 col-sm-4 col-xs-12"> -->
            <div class="col-sm-offset-3 col-lg-12 col-sm-4 col-xs-12 text-center">
                <button type="submit" class="btn btn-info btn-rounded btn-lg btn-block"> <i class="fa fa-plus"></i>&nbsp;&nbsp;Register Student</button>
            </div>
        </div>

    </div>

    </form>
</div>
</div>
</div>
</div>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Large modal</button>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            ...
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $(document).on('focusout','#tr_number,#account_number',function(){
            var clickedElement = $(this);
            $.ajax({
                url: "<?=site_url("admin/student/check_tr_bnk")?>",
                type: "post",
                data: {
                    sel_textBox_id:$(this).attr('id'),
                    sel_value:$(this).val(),
                    pageType:'addSection',
                    '<?php echo $this->security->get_csrf_token_name(); ?>': '<?=$this->security->get_csrf_hash();?>'
                },
                success:function(response){
                    var msg = JSON.parse(response);
                    if(msg.ajax_msg != 'OK'){
                        alert(msg.ajax_msg);
                        clickedElement.css('border-color','#ff0000');
                        clickedElement.val('');
                    }else {
                        clickedElement.css('border-color','#000');
                    }
                }
            });
        });

        $(":file").on('change', function(evt) {
            $('.imageSizeBox').remove();
            $(this).parent().after("<div class='imageSizeBox'><p style='color:red; margin-top:5px; font-weight:bold; text-align:center'> Image size : <u>"+ (this.files[0].size/1024/1024).toFixed(2) +" MB</u></p></div>");
        });
    });

</script>
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
            "pageLength": 75,
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