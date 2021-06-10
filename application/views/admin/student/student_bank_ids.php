<?php error_reporting(0); ?>

<style type="text/css">
    thead, tfoot {
        background: #03a9f3;
    }
    thead tr th , tfoot tr th {
        color: #fff;
    }
    .dataTables_filter input{
    	border: 2px solid #000;
    	border-radius: 10px;
    }
    table, th, td {
         border: 1px solid black;
    }
    div.dt-buttons{
    	display: none;
    }
    .group td {
        background: #fb967861;
    }
    .group td a {
        font-weight: 800;   
        color: #1c80bb;
    }
    .modal-dialog,
    .modal-content {
        /* 80% of window height */
        /*height: 80%;*/
    }

    .modal-body {
        /* 100% = dialog height, 120px = header + footer */
        /*max-height: calc(100% - 120px);*/
        overflow-y: scroll;
    }
</style>

<div class="row all_stud_table">
    
    <div class="col-lg-12">


    
            
            <div class="row">
        <div class="col-md-12"> 
            <form  action="<?php //echo base_url('/app/home.php/'); ?>" method="get">
                <input type="hidden" name="conf" value="confirm" >
                
                
                
   
   

      <label class="mr-sm-2" for="inlineFormCustomSelect">Select State</label>
      <select class="custom-select mr-sm-2" id="state" name="state">
        <option selected>Choose...State</option>
        <option value="tripura">Tripura</option>
        <option value="assam">Assam</option>
        <option value="westbangla">Westbangla</option>
      </select>
      <label class="mr-sm-2" for="inlineFormCustomSelect">Caste</label>
       <select class="custom-select mr-sm-2" id="caste" name="caste">
        <option selected>Choose...Caste</option>
        <option value="OBC">OBC</option>
        <option value="SC">SC</option>
        <option value="ST">ST</option>
        <option value="RM">RM</option>
        <option value="General">General</option>
      
      </select>
     
       <label class="mr-sm-2" for="inlineFormCustomSelect">Select Year</label>
      <select class="custom-select mr-sm-2" id="year" name="year">
        <option selected>Choose...Year</option>
         <option value="5">2022</option>
         <option value="1">2021</option>
        <option value="1">2020</option>
         <option value="1">2019</option>
         <option value="1">2018</option>
         <option value="1">2017</option>
         <option value="1">2016</option>
         <option value="1">2015</option>
      
      </select>
       <label class="mr-sm-2" for="inlineFormCustomSelect">Student #</label>
      <select class="custom-select mr-sm-2" id="number" name="number">
        <option selected>Choose...#</option>
         <option value="5">5</option>
         <option value="10">10</option>
        <option value="50">50</option>
         <option value="100">100</option>
         <option value="200">200</option>
         <option value="500">500</option>
         <option value="700">700</option>
         <option value="All">All</option>
      
      </select>
       <input  type="submit" onclick="return confirm('Are sure you want to verifiy Students Banks Accounts?');" style="text-color:black" value="Verifiy Accounts">
      
  </div>
    </form>
       </div>
    </div>
           
           <?php 
          
               
              $confirm=$_GET['conf'];
               
                
               if($confirm=="confirm"){
                   ?>
               <div class="panel-body table-responsive">

                   <table id="studentBankDetailsTable" class="display nowrap" cellspacing="0" width="100%">
              
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>TR Number</th>
                            <th>Name</th>
                            <th>IFSC Code</th>
                            <th>Account No.</th>
                            <th>Real Status</th>
                             <th>Debit Card</th>
                            <th style="max-width: 80px">Action</th>

                        </tr>
                    </thead>
                
                    <tbody>
                        <?php 
                        $scount = 1;
                        $count=0;
                         $num=0;
                         // echo "<pre>";

                         // print_r($studentsBankIds);


                         // die;
                        foreach ($studentsData as $user): 
                            $unserlizedData = unserialize($user['student_uploaded_data']);
                            $sec_debit_img = $debit_img = array();

                            $str=$studentsBankIds[$user['student_id']]['bank_id']['debit_card'];

                            // $server_url=$_SERVER['HTTP_HOST'];
                            if(array_key_exists('debit_card', $studentsBankIds[$user['student_id']]['bank_id'])){
                        		$debit_img = explode(",", $str);
                        		
                        		
                        		// print_r($debit_img[0]);
                        	
                        	}
                            $str1=$studentsBankIds[$user['student_id']]['bank_id']['sec_debit_card'];
                        	if(array_key_exists('sec_debit_card', $studentsBankIds[$user['student_id']]['bank_id'])){
                        		$sec_debit_img = explode(",", $str1);
                        		
                        		// print_r($debit_img[0]);
                        	
                        	}
                           
                        ?>

                        <tr>
                            <td><?php echo $scount;$scount++;?></td>
                            <td style="max-width: 150px">
                                <?php echo trim($unserlizedData['tr_number']); ?>
                            </td>
                            <td style="max-width: 140px">
                                <a
                                    href="<?php echo base_url('admin/student/student_view_data/'.$user['student_id']); ?>">
                                    <?php echo $unserlizedData['first_name']." ".$unserlizedData['last_name']; ?>
                                </a>
                            </td>
                             <td>
                                <?php echo $unserlizedData['ifsc_code']; ?>
                            </td>
                             <td style="max-width: 120px">
                                <?php echo $unserlizedData['account_number']; ?>
                            </td> 
                            <td style="max-width: 150px">
                             
                            </td> 
                             <td style="text-align: center;">
                               <?php 
                                if(array_key_exists('debit_card', $studentsBankIds[$user['student_id']]['bank_id'])){


                                ?>
                           
                                <a class="image-popup-no-margins text-center" href="<?php echo site_url($debit_img[0]); ?>" title="Debit Card">
                                    <img style="width:50px; height:32px;" src="<?php echo site_url($debit_img[0]); ?>">
                                </a>        
                                <?php
                                }
                                ?>
                            </td>                           
                             
                           
                           
                           
                            
                            <?php if($studentsBankIds[$user['student_id']]) { $addEdit = 'Edit'; } else { $addEdit = 'Add';  }  ?>

                            <td class="CustomerIdModal row" style="margin-left: 0px; margin-right: 0px;max-width: 97px">
                            	<div class=""><label><?=$studentsBankIds[$user['student_id']]['bank_id']['Cust_ID']?></label></div>
                                <div class=""><p style="text-align: right; color: #03a9f3;">                            	
                            	<i class="fa fa-plus-square"></i> <?=$addEdit?>
                            </p>
                            </div> 
                                 <div id="remarkModal" class=" modal fade" role="dialog">
                                    <div class="modal-dialog modal-xl">
                                    
                                      <!-- Modal content-->
                                      <div class="modal-content white-box">
                                        <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal" style="font-size: 35px;">&times;</button>
                                          <h2 class="modal-title">Bank Customer ID </h2>
                                          <h4> <?php echo $unserlizedData['first_name']." ".$unserlizedData['last_name']; ?> (<?php echo $unserlizedData['tr_number']; ?>)</h4>
                                        </div>
                                        <div class="modal-body">
	                                        <form method="post"  enctype="multipart/form-data" action="<?php echo site_url('admin/student/setBankDetails')?>" class="form-horizontal Cust_ID_Form bankIDForm_<?=$user['student_id']?>">
	                                            <div class="row m-b-5">  
	                                                <div class="col-sm-6">
	                                                  <label for="example-text" class="active">Bank Name</label>
	                                                </div>                        
	                                                <div class="col-sm-6">
	                                                  <input type="text" name="bank_name" class="form-control" value="<?php echo $unserlizedData['bank_name']; ?>" readonly>
	                                                </div> 
	                                            </div>
	                                           <div class="row m-b-5">                        
	                                                <div class="col-sm-6">
	                                                  <label for="example-text" class="active">Account Number</label>
	                                                </div>                        
	                                                <div class="col-sm-6">
	                                                  <input type="text" name="account_number" class="form-control" value="<?php echo $unserlizedData['account_number']; ?>" readonly>
	                                                </div>
	                                            </div>
	                                           <div class="row m-b-5">  
	                                                <div class="col-sm-6">
	                                                  <label for="example-text" class="active">Customer Id <span class="req_idetifier">*</span></label>
	                                                </div>                        
	                                                <div class="col-sm-6">
	                                                  <input type="text" name="Cust_ID" class="Cust_ID form-control" required="required" value="<?=$studentsBankIds[$user['student_id']]['bank_id']['Cust_ID']?>">
	                                                </div>
	                                            </div>
	                                        <!-- </form>
	                                        <form method="post" enctype="multipart/form-data" id="debitfirst<?php echo $num; ?>"  class="form-horizontal Debit_card_form Cust_ID_Form bankIDForm_<?=$user['student_id']?>">
 -->
	                                            <div class="row m-b-5">  
	                                                <div class="col-sm-12 ol-md-6 col-xs-12">                          
	                                                <?php 


                                                	?>                    
	                                                    <div class="white-box">
	                                                        <h3 class="box-title">Debit Card (Back Side)</h3>
	                                                        <input type="file" name="debit_card" class="dropify debit_upload" data-show-remove="false" data-max-file-size="2M" required="required" <?php echo  (!empty($debit_img[0])) ?  "data-default-file='".site_url($debit_img[0])."'":"";  ?> />
	                                                        <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />
	                                                    </div>
	                                                </div>
	                                            </div>

	                                            	<input type="hidden" name="debit_card_name" value="debit_card" >
	                                            	<input type="hidden" name="student_id" id=student_id_<?=$user['student_id'];?> value="<?=$user['student_id'];?>">

                                                    

                                                    <?php

                                                        if(array_key_exists('debit_card', $studentsBankIds[$user['student_id']]['bank_id'])){
                                                            ?>
                                                            <input type="hidden" name="savedDebit" class="savedDebit" value="<?php echo $studentsBankIds[$user['student_id']]['bank_id']['debit_card']; ?>">
                                                            <input type="hidden" name="debit_status" class="debit_status" value="no">
                                                            <?php
                                                        }


                                                    ?>

	                                          
                                           		<button type="submit" name="save_stu_cust_Id0" id='save_stu_cust_Id_<?=$user['student_id'];?>' class="mb-1 mt-1 p-3 btn btn-info btn-block btn-rounded btn-lg">Save</button>
                                           	<!-- </a> -->
	                                        </form>
                                        </div>
                                        <div class="modal-footer">
                                        	
                                            <button type="button" class=" mb-1 mt-1 p-3 btn btn-default btn-block btn-rounded btn-lg" data-dismiss="modal" id="refersh_id">Close</button>
                                           
                                        </div>
                                      </div>
                                      
                                    </div>
                                  </div>
                                 
                            </td>
                        </tr>
             
                        <?php endforeach ?>
                    </tbody>
                </table>
                 </div>
                 <?php  
            
                   
               }else{
                   ?>
                   <div class="panel-body table-responsive">

                   <table id="studentBankDetailsTable" class="display nowrap" cellspacing="0" width="100%">
              
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>TR Number</th>
                            <th>Name</th>
                            <th>IFSC Code</th>
                            <th>Account No.</th>
                            <th>Real Status</th>
                             <th>Debit Card</th>
                            <th style="max-width: 80px">Action</th>

                        </tr>
                    </thead>
                
                    <tbody>
                        <?php 
                        $scount = 1;
                        $count=0;
                         $num=0;
                         // echo "<pre>";

                         // print_r($studentsBankIds);


                         // die;
                        foreach ($studentsData as $user): 
                            $unserlizedData = unserialize($user['student_uploaded_data']);
                            $sec_debit_img = $debit_img = array();

                            $str=$studentsBankIds[$user['student_id']]['bank_id']['debit_card'];

                            // $server_url=$_SERVER['HTTP_HOST'];
                            if(array_key_exists('debit_card', $studentsBankIds[$user['student_id']]['bank_id'])){
                        		$debit_img = explode(",", $str);
                        		
                        		
                        		// print_r($debit_img[0]);
                        	
                        	}
                            $str1=$studentsBankIds[$user['student_id']]['bank_id']['sec_debit_card'];
                        	if(array_key_exists('sec_debit_card', $studentsBankIds[$user['student_id']]['bank_id'])){
                        		$sec_debit_img = explode(",", $str1);
                        		
                        		// print_r($debit_img[0]);
                        	
                        	}
                           
                        ?>

                        <tr>
                            <td><?php echo $scount;$scount++;?></td>
                            <td style="max-width: 150px">
                                <?php echo trim($unserlizedData['tr_number']); ?>
                            </td>
                            <td style="max-width: 140px">
                                <a
                                    href="<?php echo base_url('admin/student/student_view_data/'.$user['student_id']); ?>">
                                    <?php echo $unserlizedData['first_name']." ".$unserlizedData['last_name']; ?>
                                </a>
                            </td>
                             <td>
                                <?php echo $unserlizedData['ifsc_code']; ?>
                            </td>
                             <td style="max-width: 120px">
                                <?php echo $unserlizedData['account_number']; ?>
                            </td> 
                            <td style="max-width: 150px">
                                
                            </td> 
                             <td style="text-align: center;">
                               <?php 
                                if(array_key_exists('debit_card', $studentsBankIds[$user['student_id']]['bank_id'])){


                                ?>
                           
                                <a class="image-popup-no-margins text-center" href="<?php echo site_url($debit_img[0]); ?>" title="Debit Card">
                                    <img style="width:50px; height:32px;" src="<?php echo site_url($debit_img[0]); ?>">
                                </a>        
                                <?php
                                }
                                ?>
                            </td>                           
                             
                           
                           
                           
                            
                            <?php if($studentsBankIds[$user['student_id']]) { $addEdit = 'Edit'; } else { $addEdit = 'Add';  }  ?>

                            <td class="CustomerIdModal row" style="margin-left: 0px; margin-right: 0px;max-width: 97px">
                            	<div class=""><label><?=$studentsBankIds[$user['student_id']]['bank_id']['Cust_ID']?></label></div>
                                <div class=""><p style="text-align: right; color: #03a9f3;">                            	
                            	<i class="fa fa-plus-square"></i> <?=$addEdit?>
                            </p>
                            </div> 
                                 <div id="remarkModal" class=" modal fade" role="dialog">
                                    <div class="modal-dialog modal-xl">
                                    
                                      <!-- Modal content-->
                                      <div class="modal-content white-box">
                                        <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal" style="font-size: 35px;">&times;</button>
                                          <h2 class="modal-title">Bank Customer ID </h2>
                                          <h4> <?php echo $unserlizedData['first_name']." ".$unserlizedData['last_name']; ?> (<?php echo $unserlizedData['tr_number']; ?>)</h4>
                                        </div>
                                        <div class="modal-body">
	                                        <form method="post"  enctype="multipart/form-data" action="<?php echo site_url('admin/student/setBankDetails')?>" class="form-horizontal Cust_ID_Form bankIDForm_<?=$user['student_id']?>">
	                                            <div class="row m-b-5">  
	                                                <div class="col-sm-6">
	                                                  <label for="example-text" class="active">Bank Name</label>
	                                                </div>                        
	                                                <div class="col-sm-6">
	                                                  <input type="text" name="bank_name" class="form-control" value="<?php echo $unserlizedData['bank_name']; ?>" readonly>
	                                                </div> 
	                                            </div>
	                                           <div class="row m-b-5">                        
	                                                <div class="col-sm-6">
	                                                  <label for="example-text" class="active">Account Number</label>
	                                                </div>                        
	                                                <div class="col-sm-6">
	                                                  <input type="text" name="account_number" class="form-control" value="<?php echo $unserlizedData['account_number']; ?>" readonly>
	                                                </div>
	                                            </div>
	                                           <div class="row m-b-5">  
	                                                <div class="col-sm-6">
	                                                  <label for="example-text" class="active">Customer Id <span class="req_idetifier">*</span></label>
	                                                </div>                        
	                                                <div class="col-sm-6">
	                                                  <input type="text" name="Cust_ID" class="Cust_ID form-control" required="required" value="<?=$studentsBankIds[$user['student_id']]['bank_id']['Cust_ID']?>">
	                                                </div>
	                                            </div>
	                                        <!-- </form>
	                                        <form method="post" enctype="multipart/form-data" id="debitfirst<?php echo $num; ?>"  class="form-horizontal Debit_card_form Cust_ID_Form bankIDForm_<?=$user['student_id']?>">
 -->
	                                            <div class="row m-b-5">  
	                                                <div class="col-sm-12 ol-md-6 col-xs-12">                          
	                                                <?php 


                                                	?>                    
	                                                    <div class="white-box">
	                                                        <h3 class="box-title">Debit Card (Back Side)</h3>
	                                                        <input type="file" name="debit_card" class="dropify debit_upload" data-show-remove="false" data-max-file-size="2M" required="required" <?php echo  (!empty($debit_img[0])) ?  "data-default-file='".site_url($debit_img[0])."'":"";  ?> />
	                                                        <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />
	                                                    </div>
	                                                </div>
	                                            </div>

	                                            	<input type="hidden" name="debit_card_name" value="debit_card" >
	                                            	<input type="hidden" name="student_id" id=student_id_<?=$user['student_id'];?> value="<?=$user['student_id'];?>">

                                                    

                                                    <?php

                                                        if(array_key_exists('debit_card', $studentsBankIds[$user['student_id']]['bank_id'])){
                                                            ?>
                                                            <input type="hidden" name="savedDebit" class="savedDebit" value="<?php echo $studentsBankIds[$user['student_id']]['bank_id']['debit_card']; ?>">
                                                            <input type="hidden" name="debit_status" class="debit_status" value="no">
                                                            <?php
                                                        }


                                                    ?>

	                                            <?php if (array_key_exists("other_account_number",$unserlizedData) &&  strlen($unserlizedData['other_account_number']) > 0){ ?>

	                                            	<input type="hidden" name="sec_bank_name" value="<?php echo $unserlizedData['other_bank_name']; ?>">

	                                            	 <input type="hidden" name="sec_account_number" value="<?php echo $unserlizedData['other_account_number']; ?>">

	                                            	 <input type="hidden" name="sec_Cust_ID" value="<?=$studentsBankIds[$user['student_id']]['bank_id']['sec_Cust_ID']?>">

		                                            
		                                        <?php

                                                    if(array_key_exists('sec_debit_card', $studentsBankIds[$user['student_id']]['bank_id'])){
                                                    

                                                        ?>
                                                         <input type="hidden" name="sec_debit_card" value="<?php echo $studentsBankIds[$user['student_id']]['bank_id']['sec_debit_card']; ?>">

                                                <?
                                                    }


                                                } ?>
		                                        <!-- <a href="<?php echo site_url('admin/student/setBankDetails')?>"> -->
                                           		<button type="submit" name="save_stu_cust_Id0" id='save_stu_cust_Id_<?=$user['student_id'];?>' class="mb-1 mt-1 p-3 btn btn-info btn-block btn-rounded btn-lg">Save</button>
                                           	<!-- </a> -->
	                                        </form>
                                        </div>
                                        <div class="modal-footer">
                                        	<!-- <a href="<?php echo site_url('admin/student/setBankDetails')?>"> -->
                                           	
                                            <button type="button" class=" mb-1 mt-1 p-3 btn btn-default btn-block btn-rounded btn-lg" data-dismiss="modal" id="refersh_id">Close</button>
                                           
                                        </div>
                                      </div>
                                      
                                    </div>
                                  </div>
                                 
                            </td>
                        </tr>
             
                        <?php endforeach ?>
                    </tbody>
                </table>
                 </div>
                   
            <?php       
               }
               
        
           ?>
            


        </div>
    </div>
    
</div>



<script type="text/javascript">
    $(document).ready( function () {
         $('#studentBankDetailsTable').DataTable();
        $(document).on('click', '.CustomerIdModal p' , function() {
            $(this).parents("td.CustomerIdModal.row").find('#remarkModal').modal('show');
        });

        $(":file").on('change', function(evt) {

            if($('.debit_status').length){
                $('.debit_status').val("yes");
                console.log($('.debit_status').val());
            }

            if($('.sec_debit_status').length){
                $('.sec_debit_status').val("yes");
                console.log($('.sec_debit_status').val());
            }
           
          });

    });
</script>