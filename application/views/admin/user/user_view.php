<?php
// echo "<pre>";
// print_r($user);

?>

<!-- Start Page Content -->

<div class="row">
    <div class="col-lg-12">


        <div class="panel panel-info">
            <div class="panel-heading">
                <a href="<?php echo base_url('admin/user/update/'.$user->id) ?>"><i class="fa fa-pencil"></i> &nbsp;Edit
                    User Details</a> <a href="<?php echo base_url('admin/user/all_user_list') ?>"
                    class="btn btn-info btn-sm pull-right"><i class="fa fa-list"></i> All Users </a>

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
                <!-- .row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="white-box">
                            <!-- <h3 class="box-title">Bookmarked ribbons</h3> -->
                            <!-- <p>Add class: <code>.ribbon-bookmark</code> right after the <code>.ribbon</code> class. -->
                            <div class="row m-b-10">
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 d-flex m-t-10">
                                    <div class="ribbon-wrapper" style="width:100%; word-break: break-word;">
                                        <div class="ribbon ribbon-bookmark ribbon-default">Personal Details</div>
                                        <!-- <p class="ribbon-content">Duis mollis, est non commodo luctus, nisi erat porttitor ligula</p> -->
                                        <div class="row m-t-10">
                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                <label>First Name</label>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                <label><?php echo $user->first_name; ?></label>
                                            </div>
                                        </div>
                                        <div class="row m-t-10">
                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                <label>Last Name</label>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                <label><?php echo $user->last_name; ?></label>
                                            </div>
                                        </div>
                                        <div class="row m-t-10">
                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                <label><?php echo $user->email; ?></label>
                                            </div>
                                        </div>
                                        <div class="row m-t-10">
                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                <label>Contact Details</label>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                <label><?php echo $user->mobile; ?></label>
                                            </div>
                                        </div>
                                        <div class="row m-t-10">
                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                <label>Alternate Contact</label>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                <label><?php echo $user->alt_mobile; ?></label>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 d-flex m-t-10">
                                    <div class="ribbon-wrapper"  style="width:100%; word-break: break-word;">
                                        <div class="ribbon ribbon-bookmark ribbon-right ribbon-danger">Other Details
                                        </div>
                                        <!-- <p class="ribbon-content">Duis mollis, est non commodo luctus, nisi erat porttitor ligula</p> -->
                                        <div class="row m-t-10">
                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                <label>Address</label>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                <label><?php echo $user->address1.', '.$user->address2 .', '.$user->addr_state.' - '.$user->pin_code.', '.$user->country_name; ?></label>
                                            </div>
                                        </div>
                                        <div class="row m-t-10">
                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                <label>Bank Name</label>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                <label><?php echo $user->bank_name; ?></label>
                                            </div>
                                        </div>
                                        <div class="row m-t-10">
                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                <label>Account Number</label>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                <label><?php echo $user->account_number; ?></label>
                                            </div>
                                        </div>
                                        <div class="row m-t-10">
                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                <label>IFSC Code</label>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-lg-6">
                                                <label><?php echo $user->ifsc_code; ?></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                            
                    <div class="col-sm-12">
                        <div class="white-box">
                            <!-- <div class="row">
                                <div class="col-sm-12"> -->
                                    <h3 class="box-title m-b-0">Documents Uploaded</h3>
                                    <div id="image-popups" class="row">
                                        <div class="col-sm-2">
                                            <a href="<?php echo $editaad_val['0']; ?>" title="Aadhar Card"  data-effect="mfp-3d-unfold">
                                                <img src="<?php echo $editaad_val['0']; ?>" style="width:195px; height:130px;" class="m-b-5 img-responsive"/>
                                                <br>Aadhar Card
                                            </a>
                                        </div>
                                        <div class="col-sm-2">
                                            <a href="<?php echo $editvot_val['0'] ?>" title="Voter Id" data-effect="mfp-3d-unfold">
                                                <img src="<?php echo $editvot_val['0'] ?>" style="width:195px; height:130px;" class="m-b-5 img-responsive" />
                                                <br>Voter Id
                                            </a>
                                        </div>
                                        <div class="col-sm-2">
                                            <a href="<?php echo $editpass_val['0'] ?>" title="Bank Passbook"  data-effect="mfp-3d-unfold">
                                                <img src="<?php echo $editpass_val['0'] ?>" style="width:195px; height:130px;" class="m-b-5 img-responsive" />
                                                <br>Bank Passbook
                                            </a>
                                        </div>
                                        <div class="col-sm-2">
                                            <a href="<?php echo $editpic_val['0'] ?>" title="Profile Picture" data-effect="mfp-3d-unfold">
                                                <img src="<?php echo $editpic_val['0'] ?>" style="width:195px; height:130px;" class="m-b-5 img-responsive"/>
                                                <br>Profile Picture
                                            </a>
                                        </div>
                                    </div>
                                <!-- </div>
                            </div> -->
                        </div>
                    </div>
                </div>
                <!-- .row -->

            </div>
        </div>
    </div>
</div>

<!-- End Page Content -->