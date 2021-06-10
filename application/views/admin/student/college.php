<!-- Start Page Content -->

<div class="row">
    <div class="col-lg-12">


        <div class="panel panel-info">
            <div class="panel-heading">
             
                 

            </div>
            <div class="panel-body table-responsive">

                <?php $error_msg = $this->session->flashdata('error_msg'); ?>
                <?php if (isset($error_msg)): ?>
                <div class="alert alert-danger delete_msg pull" style="width: 100%"> <i class="fa fa-times"></i>
                    <?php echo $error_msg; ?> &nbsp;
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span
                            aria-hidden="true">×</span> </button>
                </div>
                <?php endif ?>
<center><h4>College</h4></center>

                <form method="post" action="<?php echo base_url('admin/student/addc') ?>"  class="form-horizontal"
                    >
                    <div class="form-group row">
                       
                        <div class="col-sm-6">
                        <label for="example-text">College Name <span style="color:red;">*</span></label>
                            <input type="text" name="name" class="form-control" placeholder="College Name">
                            <input type="hidden" name="country"  value="76">
                        </div>
                    <!-- </div>


                    <div class="form-group"> -->
                        
                        <div class="col-sm-6">
                        <label for="example-text">Course Name </label>
                            <input type="text" name="course_name" class="form-control"  placeholder="Course Name " >
                        </div>
                    </div>

 <hr>
 <center><h4>Scholarship</h4></center>
  <hr>
 
                    <div class="form-group row">
                       
                        <div class="col-sm-6">
                            <label class="col-md-12" for="example-text">State <span style="color:red;">*</span></label>
                           <select name="state" id="state" class="form-control">
                                <option value="OBC">Select State</option>
<option value="Andhra Pradesh">Andhra Pradesh</option>
<option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
<option value="Arunachal Pradesh">Arunachal Pradesh</option>
<option value="Assam">Assam</option>
<option value="Bihar">Bihar</option>
<option value="Chandigarh">Chandigarh</option>
<option value="Chhattisgarh">Chhattisgarh</option>
<option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
<option value="Daman and Diu">Daman and Diu</option>
<option value="Delhi">Delhi</option>
<option value="Lakshadweep">Lakshadweep</option>
<option value="Puducherry">Puducherry</option>
<option value="Goa">Goa</option>
<option value="Gujarat">Gujarat</option>
<option value="Haryana">Haryana</option>
<option value="Himachal Pradesh">Himachal Pradesh</option>
<option value="Jammu and Kashmir">Jammu and Kashmir</option>
<option value="Jharkhand">Jharkhand</option>
<option value="Karnataka">Karnataka</option>
<option value="Kerala">Kerala</option>
<option value="Madhya Pradesh">Madhya Pradesh</option>
<option value="Maharashtra">Maharashtra</option>
<option value="Manipur">Manipur</option>
<option value="Meghalaya">Meghalaya</option>
<option value="Mizoram">Mizoram</option>
<option value="Nagaland">Nagaland</option>
<option value="Odisha">Odisha</option>
<option value="Punjab">Punjab</option>
<option value="Rajasthan">Rajasthan</option>
<option value="Sikkim">Sikkim</option>
<option value="Tamil Nadu">Tamil Nadu</option>
<option value="Telangana">Telangana</option>
<option value="Tripura">Tripura</option>
<option value="Uttar Pradesh">Uttar Pradesh</option>
<option value="Uttarakhand">Uttarakhand</option>
<option value="West Bengal">West Bengal</option>
</select>
                        </div>
                  <div class="col-sm-6">
                            <label class="col-md-12" for="example-text">Caste <span style="color:red;">*</span></label>
                           <select name="caste" id="caste" class="form-control">
                               <option value="OBC">Select Caste</option>
<option value="OBC">OBC</option>
<option value="SC">
    SC
</option>
<option value="ST">
    ST
</option>
<option value="RM">
    RM
</option>
<option value="General">
    General
</option>


</select>
                        </div>
                        <div class="col-sm-6">
                        <label class="col-md-12" for="example-text">Scholarship Amount<span style="color:red;">*</span></label>
                            <input type="text" name="amount" class="form-control" placeholder="Amount">
                    </div>
                 </div>

                    <div class="form-group row">
                      
                    <!-- CSRF token -->
                    <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>"
                        value="<?=$this->security->get_csrf_hash();?>" />
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                            <button type="submit" class="btn btn-info btn-rounded btn-sm"> Register College</button>
                        </div>
                    </div>

               </div>

            </form>
        </div>
    </div>
</div>
</div>

<!-- End Page Content -->