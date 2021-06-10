<!--Start Page Content -->

<div class="row">
    <div class="col-lg-12">


        <div class="panel panel-info">
            <div class="panel-heading">
                <i class="fa fa-pencil"></i> &nbsp;User Edit <a
                    href="<?php echo base_url('admin/user/all_user_list') ?>" class="btn btn-info btn-sm pull-right"><i
                        class="fa fa-list"></i> All Users </a>

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

                <?php
                    // echo "<pre>";
                    //  print_r($user);
                    // die;

                    $editaad_val= explode(",",$user->aadhar_card);
                    $editvot_val= explode(",",$user->voter_id);
                    $editpass_val= explode(",",$user->bank_passbook);
                    $editpic_val= explode(",",$user->profile_pic);

                    // print_r($user->aadhar_card);
                    // print_r($editaad_val);
                    // // print_r($editaad_val);
                    // die;
                ?>

                <form method="post"  enctype="multipart/form-data" action="<?php echo base_url('admin/user/update/'.$user->id) ?>"
                    class="form-horizontal">
                    <div class="form-group">

                        <div class="col-md-6 col-sm-12 col-lg-6">
                            <label class="col-md-12" for="example-text">First Name <span style="color:red;">*</span></label>
                            <input type="text" name="first_name" class="form-control"
                                value="<?php echo trim($user->first_name); ?>" required>
                        </div>
                        <!-- </div>
                              

                           <div class="form-group"> -->
                       
                        <div class="col-sm-12 col-lg-6 col-md-6">
                        <label class="col-md-12" for="example-text">Last Name</label>
                            <input type="text" name="last_name" class="form-control"
                                value="<?php echo $user->last_name; ?>">
                        </div>
                    </div>


                    <div class="form-group">
                        
                        <div class="col-sm-12 col-lg-6 col-md-6">
                        <label class="col-md-12" for="example-text">Email <span style="color:red;">*</span></label>
                            <input type="email" name="email" class="form-control" value="<?php echo $user->email; ?>" required data-validation-required-message="Email is required">
                        </div>
                    <!-- </div>

                    <div class="form-group">  -->
                      <!--   <div class="col-sm-12 col-lg-6 col-md-6">
                        <label class="col-md-12" for="example-text">Password <span style="color:red;">*</span></label>
                            <input type="password" name="password" class="form-control" value="<?php echo $user->password; ?>" required>
                        </div> -->
                         <input type="hidden" name="password" class="form-control" value="<?php echo $user->password; ?>" required>
                    </div>

                        

                    <div class="form-group row">
                       
                       <div class="col-sm-6">
                       <label class="col-md-12" for="example-text">Phone Number <span style="color:red;">*</span></label>
                           <input type="number" name="mobile" class="form-control"  value="<?php echo $user->mobile; ?>" required data-validation-required-message="Phone number is required">
                       </div>
                   <!-- </div>

                   <div class="form-group">  -->
                       
                       <div class="col-sm-6">
                       <label class="col-md-12" for="example-text">Alternate Phone Number</label>
                           <input type="number" name="alt_mobile" class="form-control"  value="<?php echo $user->alt_mobile; ?>" >
                       </div>
                   </div>

                   <div class="form-group">
                       <label class="col-md-12" for="example-text">Address Line 1 <span style="color:red;">*</span></label>
                       <div class="col-sm-12">
                           <input type="text" name="address1" class="form-control" value="<?php echo $user->address1; ?>" required data-validation-required-message="Address line is required">
                       </div>
                   </div>

                   <div class="form-group">
                       <label class="col-md-12" for="example-text">Address Line 2</label>

                       <div class="col-sm-12">
                           <input type="text" name="address2" class="form-control" value="<?php echo $user->address2; ?>">
                       </div>
                   </div>


                   <div class="form-group row">
                       
                   <div class="col-lg-4  col-sm-12">
                       <label class="col-md-12" for="example-text">Pin Code <span style="color:red;">*</span></label>
                       <input type="number" name="pin_code" class="form-control" value="<?php echo $user->pin_code; ?>" required data-validation-required-message="Pin code is required">
                   </div>

                   <div class="col-lg-4 col-sm-12">
                       <label class="col-md-12" for="example-text">State <span style="color:red;">*</span></label>
                       <input type="text" name="addr_state" class="form-control" value="<?php echo $user->addr_state; ?>" required data-validation-required-message="State is required">
                   </div>


                    <div class="col-lg-4 col-sm-12">
                        <label class="col-md-12" for="example-text">Country</label>
                        <!-- <div class="col-sm-12"> -->
                            <select class="form-control form-control-line" name="country" required>

                                <?php foreach ($country as $cn): ?>
                                <?php 
                                                            if($cn['id'] == $user->country){
                                                                $selec = 'selected';
                                                            }else{
                                                                $selec = '';
                                                            }
                                                        ?>
                                <option <?php echo $selec; ?> value="<?php echo $cn['id']; ?>">
                                    <?php echo $cn['name']; ?></option>
                                <?php endforeach ?>

                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-12" for="example-text">Bank Details <span style="color:red;">*</span></label>

                        <div class="col-sm-12 col-lg-4 col-md-4">
                            <input type="text" name="bank_name" class="form-control" placeholder="Bank Name" value="<?php echo $user->bank_name; ?>" required>
                        </div>

                        <div class="col-sm-12 col-lg-4 col-md-4">
                            <input type="number" name="account_number" class="form-control" placeholder="Account Number" value="<?php echo $user->account_number; ?>" required>
                        </div>

                        <div class="col-sm-12 col-lg-4 col-md-4">
                            <input type="text" name="ifsc code" class="form-control" placeholder="IFSC Code" value="<?php echo $user->ifsc_code; ?>" required>
                        </div>
                    </div>
                    <hr>
                    <h4><label>Documents Upload</label></h4>
                    <hr>
                    <div class="form-group">
                       
                        <div class="col-sm-6 col-md-6 col-xs-12">
                            <label class="col-md-12" for="example-text">Aadhar Card <span style="color:red;">*</span></label>
                            <div class="white-box">
                                <input type="file" id="aadhar_card" name="aadhar_card" class="dropify" data-show-remove="false" data-default-file="<?php echo $editaad_val['0']; ?>" />
                                <input type="hidden" name="hidden_aadhar_card" value="<?php echo $user->aadhar_card; ?>">
                            </div>
                        </div>
                        
                        <div class="col-sm-6 col-md-6 col-xs-12">
                        <label class="col-md-12" for="example-text">Voter Card <span style="color:red;">*</span></label>
                            <div class="white-box">
                                <input type="file" id="voter_id" name="voter_id" class="dropify" data-show-remove="false" data-default-file="<?php echo $editvot_val['0'] ?>" />
                                <input type="hidden" name="hidden_voter_id" value="<?php echo $user->voter_id ?>">
                            </div>
                        </div>
                    <!-- </div>

                    <div class="form-group"> -->
                       
                        <div class="col-sm-6 col-md-6 col-xs-12">
                            <label class="col-md-12" for="example-text">Bank Passbook <span style="color:red;">*</span></label>
                            <div class="white-box">
                                <input type="file" id="bank_passbook" name="bank_passbook" class="dropify" data-show-remove="false" data-default-file="<?php echo $editpass_val['0'] ?>" />
                                <input type="hidden" name="hidden_bank_passbook" value="<?php echo $user->bank_passbook ?>">
                            </div>
                        </div>

                        
                        <div class="col-sm-6 col-md-6 col-xs-12">
                        <label class="col-md-12" for="example-text">Profile Picture <span style="color:red;">*</span></label>
                            <div class="white-box">
                                <input type="file" id="profile_pic" name="profile_pic" class="dropify" data-show-remove="false" data-default-file="<?php echo $editpic_val['0'] ?>" />
                                <input type="hidden" name="hidden_profile_pic" value="<?php echo $user->profile_pic ?>">
                            </div>
                        </div>
                    </div>





                    <!-- New User  -->
                    <input <?php if($user->role == "user"){echo "checked";}; ?> type="radio"
                        onclick="javascript:yesnoCheck();" name="role" id="yesCheck" value="user" hidden>
                    <!-- New Admin -->
                    <input <?php if($user->role == "admin"){echo "checked";}; ?> type="radio"
                        onclick="javascript:yesnoCheck();" name="role" id="noCheck" value="admin" hidden><br>
                    <div id="ifYes" style="visibility:hidden">
                        <hr>
                        Select Permission:&nbsp;

                        <?php foreach ($power as $pw): ?>

                        <?php foreach ($user_role as $role){
                                                        if ($role['action'] == $pw['id']) {
                                                            $check = 'checked';
                                                            break;
                                                        }else{
                                                            $check = '';
                                                        }
                                                    }
                                                ?>


                        <input <?php if(isset($check)) {echo $check;} else {echo "";} ?> type="checkbox"
                            value="<?php echo $pw['power_id'] ?>" name="role_action[]"
                            class="js-switch">&nbsp;&nbsp;<?php echo $pw['name'] ?>
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

<!-- End Page Content