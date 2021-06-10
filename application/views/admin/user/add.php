<!-- Start Page Content -->

<div class="row">
    <div class="col-lg-12">


        <div class="panel panel-info">
            <div class="panel-heading">
                <i class="fa fa-plus"></i> &nbsp;Add New User <a
                    href="<?php echo base_url('admin/user/all_user_list') ?>" class="btn btn-info btn-sm pull-right"><i
                        class="fa fa-list"></i> List Users </a>

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


                <form method="post" action="<?php echo base_url('admin/user/add') ?>" enctype="multipart/form-data" class="form-horizontal"
                    >
                    <div class="form-group row">
                       
                        <div class="col-sm-6">
                        <label for="example-text">First Name <span style="color:red;">*</span></label>
                            <input type="text" name="first_name" class="form-control" required data-validation-required-message="First Name is required">
                        </div>
                    <!-- </div>


                    <div class="form-group"> -->
                        
                        <div class="col-sm-6">
                        <label for="example-text">Last Name </label>
                            <input type="text" name="last_name" class="form-control">
                        </div>
                    </div>


                    <div class="form-group row">
                       
                        <div class="col-sm-6">
                            <label class="col-md-12" for="example-text">Email <span style="color:red;">*</span></label>
                            <input type="email" name="email" class="form-control" required
                                data-validation-required-message="Email is required">
                        </div>
                    <!-- </div>

                    <div class="form-group"> -->
                        <div class="col-sm-6">
                        <label class="col-md-12" for="example-text">Password <span style="color:red;">*</span></label>
                            <input type="password" name="password" class="form-control" required
                                data-validation-required-message="Password is required">
                        </div>
                    </div>


                    <div class="form-group row">
                       
                        <div class="col-sm-6">
                        <label class="col-md-12" for="example-text">Phone Number <span style="color:red;">*</span></label>
                            <input type="number" name="mobile" class="form-control" required data-validation-required-message="Phone number is required">
                        </div>
                    <!-- </div>

                    <div class="form-group">  -->
                        
                        <div class="col-sm-6">
                        <label class="col-md-12" for="example-text">Alternate Phone Number</label>
                            <input type="number" name="alt_mobile" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-12" for="example-text">Address Line 1 <span style="color:red;">*</span></label>
                        <div class="col-sm-12">
                            <input type="text" name="address1" class="form-control" required data-validation-required-message="Address line is required">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-12" for="example-text">Address Line 2</label>

                        <div class="col-sm-12">
                            <input type="text" name="address2" class="form-control">
                        </div>
                    </div>


                    <div class="form-group row">
                        
                    <div class="col-sm-4">
                        <label class="col-md-12" for="example-text">Pin Code <span style="color:red;">*</span></label>
                        <input type="number" name="pin_code" class="form-control" required data-validation-required-message="Pin code is required">
                    </div>

                    <div class="col-sm-4">
                        <label class="col-md-12" for="example-text">State <span style="color:red;">*</span></label>
                        <input type="text" name="addr_state" class="form-control" required data-validation-required-message="State is required">
                    </div>

                        <div class="col-sm-4">
                        <label class="col-md-12" for="example-text">Country <span style="color:red;">*</span></label>
                            <select class="form-control custom-select" name="country" aria-invalid="false" required>
                                <option value="0">Select</option>
                                <?php foreach ($country as $cn): ?>
                                <option value="<?php echo $cn['id']; ?>"><?php echo $cn['name']; ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-12" for="example-text">Bank Details <span style="color:red;">*</span></label>

                        <div class="col-sm-12 col-lg-4 col-md-4">
                            <input type="text" name="bank_name" class="form-control" placeholder="Bank Name" required>
                        </div>

                        <div class="col-sm-12 col-lg-4 col-md-4">
                            <input type="number" name="account_number" class="form-control" placeholder="Account Number" required>
                        </div>

                        <div class="col-sm-12 col-lg-4 col-md-4">
                            <input type="text" name="ifsc code" class="form-control" placeholder="IFSC Code" required>
                        </div>
                    </div>
                    <hr>
                    <h4><label>Documents Upload</label></h4>
                    <hr>
                    <div class="form-group">
                       
                        <div class="col-sm-6 col-md-6 col-xs-12">
                            <label class="col-md-12" for="example-text">Aadhar Card <span style="color:red;">*</span></label>
                            <div class="white-box">
                                <!-- <h3 class="box-title">File Upload1</h3> -->
                                <!-- <label for="input-file-now">Your so fresh input file � Default version</label> -->
                                <!-- <input type="file" id="input-file-now" class="dropify" /> -->
                                <input type="file" id="aadhar_card" name="aadhar_card" class="dropify" required/>
                            </div>
                        </div>

                        
                        <div class="col-sm-6 col-md-6 col-xs-12">
                        <label class="col-md-12" for="example-text">Voter Card <span style="color:red;">*</span></label>
                            <div class="white-box">
                                <!-- <h3 class="box-title">File Upload1</h3> -->
                                <!-- <label for="input-file-now">Your so fresh input file � Default version</label> -->
                                <input type="file" id="voter_id" name="voter_id" class="dropify" required/>
                            </div>
                        </div>
                    <!-- </div>

                    <div class="form-group"> -->
                       
                        <div class="col-sm-6 col-md-6 col-xs-12">
                            <label class="col-md-12" for="example-text">Bank Passbook <span style="color:red;">*</span></label>
                            <div class="white-box">
                                <!-- <h3 class="box-title">File Upload1</h3> -->
                                <!-- <label for="input-file-now">Your so fresh input file � Default version</label> -->
                                <input type="file" id="bank_passbook" name="bank_passbook" class="dropify" required />
                            </div>
                        </div>

                        
                        <div class="col-sm-6 col-md-6 col-xs-12">
                        <label class="col-md-12" for="example-text">Profile Picture <span style="color:red;">*</span></label>
                            <div class="white-box">
                                <!-- <h3 class="box-title">File Upload1</h3> -->
                                <!-- <label for="input-file-now">Your so fresh input file � Default version</label> -->
                                <input type="file" id="profile_pic" name="profile_pic" class="dropify" required />
                            </div>
                        </div>
                    </div>

                    <!-- New User  -->
                    <input type="radio" onclick="javascript:yesnoCheck();" name="role" id="yesCheck" value="user"
                        checked  style="visibility:hidden">
                    <!-- New Admin -->
                    <input type="radio" onclick="javascript:yesnoCheck();" name="role" id="noCheck" value="admin"
                    style="visibility:hidden"><br>
                    <div id="ifYes" style="visibility:hidden">
                        <hr>
                        Select Permission:&nbsp;

                        <?php foreach ($power as $pw): ?>

                        <input type="checkbox" value="<?php echo $pw['power_id']; ?>" name="role_action[]"
                            class="js-switch">&nbsp;&nbsp;<?php echo $pw['name']; ?>

                        <?php endforeach ?>
                    </div>
                    <hr>
                    <!-- CSRF token -->
                    <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>"
                        value="<?=$this->security->get_csrf_hash();?>" />
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                            <button type="submit" class="btn btn-info btn-rounded btn-sm"> <i
                                    class="fa fa-plus"></i>&nbsp;&nbsp;Save</button>
                        </div>
                    </div>

            </div>

            </form>
        </div>
    </div>
</div>
</div>

<!-- End Page Content -->