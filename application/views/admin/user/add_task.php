<?php

	error_reporting(0);
 //   	echo "<pre>";
	// //print_r($user);
	// // 	die;
	// echo "-----------------<br><br>--------------";

	// print_r($students);
	// print_r($studentStatus);

	// die;
	// foreach ($students as $stud):
	// 	$unStud=unserialize($stud['student_uploaded_data']);
	// 	print_r($unStud);
	
	// endforeach;

	
	//print_r($pending_website);
	//print_r($defect_by_college);
	//die;

?>

<style type="text/css">
    thead, tfoot {
        background: #03a9f3;
    }
	.remarksSection p{
		/*max-width: 100px;*/
		 white-space: pre;
		/*text-overflow: ellipsis;
		overflow: hidden; */
	}
	tbody tr.odd.selected,tbody tr.even.selected {
	    background-color: #acbad4 !important;
	}
	#pen_site tbody tr,#pen_site tr.even>.sorting_1,#pen_site tr.odd>.sorting_1,
	#pen_col tbody tr,#pen_col tr.even>.sorting_1,#pen_col tr.odd>.sorting_1,
	#pen_nsp tbody tr,#pen_nsp tr.even>.sorting_1,#pen_nsp tr.odd>.sorting_1,
	tr[data-class|="pendingStudents"],td[data-class|="pendingStudents"]
	{
		background: yellow ;
		background-color: yellow ;
	}
	#sub_site tbody tr,#sub_site tr.even>.sorting_1,#sub_site tr.odd>.sorting_1,
	#sub_col tbody tr,#sub_col tr.even>.sorting_1,#sub_col tr.odd>.sorting_1,
	#sub_nsp tbody tr,#sub_nsp tr.even>.sorting_1,#sub_nsp tr.odd>.sorting_1,
	tr[data-class|="approveStudents"],td[data-class|="approveStudents"]
	{
		background: mediumspringgreen ;
		background-color: mediumspringgreen ;
	}
	#def_col tbody tr,#def_col tr.even>.sorting_1,#def_col tr.odd>.sorting_1,
	#def_nsp tbody tr,#def_nsp tr.even>.sorting_1,#def_nsp tr.odd>.sorting_1,
	tr[data-class|="defectStudents"],td[data-class|="defectStudents"]
	{
		background: #ab8ce48a;
		background-color: #ab8ce48a;
	}
	#rej_col tbody tr,#rej_col tr.even>.sorting_1,#rej_col tr.odd>.sorting_1,
	#rej_nsp tbody tr,#rej_nsp tr.even>.sorting_1,#rej_nsp tr.odd>.sorting_1,
	tr[data-class|="rejectStudent"],td[data-class|="rejectStudent"]
	{
		background: #ff00009e;
		background-color: #ff00009e;
	} 
    thead tr th , tfoot tr th {
        color: #fff;
    }
    #example_assign .selected, #example_assign .selected td{
	    background-color: #bf9616;
	    color: #fff;
	    font-weight: bolder;
    }
    #example_assign tr.odd,
    #example_assign tr.even{
	    
	    color: #000;
	    font-weight: 500;
    }
    .show_selected{
    	font-size: 18px;
	    font-weight: 600;
	    color: #000;
    }
	.panel_style{
		border: 2px solid #4c5667;
		border-radius: 10px;
		overflow: hidden;
	}
	.panel-success.panel_style{
		border: 2px solid #00c292;
		border-radius: 10px;
		overflow: hidden;
	}
	.panel-primary.panel_style{
		border: 2px solid #ab8ce4;
		border-radius: 10px;
		overflow: hidden;
	}
	.collapse.in {
		-webkit-transition-delay: 5s;
		transition-delay: 5s;
	}
	.collapse {
		-webkit-transition-delay: 6s;
		transition-delay: 6s;
	}
	tr{
		text-align: left;
	}
	.dt-buttons.select_assign_btn .dt-button {
		font-size: 15px;
		font-weight: 400;
	}
	.dt-buttons.select_assign_btn {
		margin-bottom: 50px;
		margin-top: 25px;
	}
	section > div.col-sm-12{
		overflow-x:scroll;
	}
	@media screen and (max-width: 58em)
	{
		.sttabs nav a span {
			display: block;
		}
		.sttabs{
			overflow: scroll;
		}
	}
</style>

<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="Our Site" data-toggle="tab" href="#our_site" role="tab" aria-controls="our_site" aria-selected="true">Our Site</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="by college" data-toggle="tab" href="#by_college" role="tab" aria-controls="by_college" aria-selected="false">By College</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="by nsa" data-toggle="tab" href="#by_nsa" role="tab" aria-controls="by_nsa" aria-selected="false">By NSP</a>
  </li>
   <li class="nav-item">
    <a class="nav-link" id="by caste" data-toggle="tab" href="#by_caste" role="tab" aria-controls="by_caste" aria-selected="false">By Caste</a>
  </li>
    <li class="nav-item">
    <a class="nav-link" id="by state" data-toggle="tab" href="#by_state" role="tab" aria-controls="by_state" aria-selected="false">By State</a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="our_site" role="tabpanel" aria-labelledby="Our Site">
      <div class="col-lg-12 col-sm-12 our_site">
					<div class="panel panel-inverse panel_style" >
						<div class="panel-heading" data-perform="panel-collapse"> Our Site
							<div class="pull-right">
								<a href="#" data-perform="panel-collapse">
									<i class="ti-minus"></i>
								</a> 
						
							</div>
						</div>
						<!-- <div class="panel-wrapper collapse in" aria-expanded="true"> -->
						<div class="panel-wrapper collapse" aria-expanded="false">
							<div class="panel-body">
								<section class="m-t-40">
									<div class="sttabs tabs-style-linebox">
										<nav>
											<ul>
												<li><a href="#section-linebox-1"><span>Pending</span></a></li>
												<!-- <li><a href="#section-linebox-2"><span>Pending</span></a></li> -->
												<li><a href="#section-linebox-3"><span>Submitted</span></a></li>
											</ul>
										</nav>
										<div class="content-wrap text-center">
											<section id="section-linebox-1">
												<!-- <h3>Best Clean Tab ever</h3> -->
												<div class="col-sm-12 m-t-5">
													<div class="dt-buttons select_assign_btn"> 
														<button class="dt-button select_all" id="table10" tabindex="0" aria-controls="example_assign0" type="button">
															<span>Select all</span>
														</button> 
														<button class="dt-button deselect_all" id="table11" tabindex="0" aria-controls="example_assign0" type="button">
															<span>Select none</span>
														</button> 
													</div>
													<table id="pen_site" data-countAttr="table1" class="display" style="width:100%">
														<thead>
															<tr>
																<th>S.No.</th>
																<th>TR Number</th>
																<th>Student name</th>
																<th>Account Number</th>
																<th>Mobile Number</th>
																<th>Caste</th>
																<th>College Name</th>
																<th>Course Name</th>
																<th>Agent Name</th>
																<th>Remarks</th>
															</tr>
														</thead>
													
														<tbody>
															<?php
																$sno=1;
																foreach($pending_website as $pen_web):
																	$unserial=$pen_web;
																	if($pen_web['is_assigned']==""):
															?>
																	<tr data-attr="<?php echo $pen_web['student_id']; ?>">
																		
																		<td><?php echo $sno; ?></td>
																		<td><?php echo $unserial['tr_number']; ?></td>
																		<td><?php echo $unserial['first_name']." ".$unserial['last_name']; ?></td>
																		<td><?php echo $unserial['account_number']; ?></td>
																		<td><?php echo $unserial['mobile'] ?></td>
																		<td><?php echo $unserial['caste_details']; ?></td>
																		<td><?php echo $unserial['education_details'] ?></td>
																		<td><?php echo $unserial['course_details'] ?></td>
																		<td><?php echo $unserial['agent_name'] ?></td>
																		<td class="remarksSection">
																			<p><?php echo $unserial['remarks'] ?></p>
																			<div id="remarkModal" class="modal fade" id="myModal" role="dialog">
																				<div class="modal-dialog modal-xl">
																				
																					<!-- Modal content-->
																					<div class="modal-content">
																						<div class="modal-header">
																						<button type="button" class="close" data-dismiss="modal">&times;</button>
																						<h2 class="modal-title">Remark</h2>
																						<h4> <?php echo $unserial['first_name']." ".$unserial['last_name']; ?> (<?php echo $unserial['tr_number']; ?>)</h4>
																						</div>
																						<div class="modal-body">
																						<label style="white-space: break-spaces;"><?php echo $unserial['remarks']; ?></label>
																						</div>
																						<div class="modal-footer">
																						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
																						</div>
																					</div>
																				
																				</div>
																			</div>
																		</td>
																	</tr>
															<?php
																		$sno++;
																	endif;

																endforeach;
															
															?>
															
														</tbody>
													</table>
												</div>

											</section>
											<section id="section-linebox-3">
												<!-- <h2>Tabbing 5</h2> -->
												<div class="col-sm-12 m-t-5">
													<div class="dt-buttons select_assign_btn"> 
														<button class="dt-button select_all" id="table12" tabindex="0" aria-controls="example_assign4" type="button">
															<span>Select all</span>
														</button> 
														<button class="dt-button deselect_all" id="table13" tabindex="0" aria-controls="example_assign4" type="button">
															<span>Select none</span>
														</button> 
													</div>
													<table id="sub_site" data-countAttr="table2" class="display" style="width:100%">
														<thead>
															<tr>
																<th>S.No.</th>
																<th>TR Number</th>
																<th>Student name</th>
																<th>Account Number</th>
																<th>Mobile Number</th>
																<th>Caste</th>
																<th>College Name</th>
																<th>Course Name</th>
																<th>Agent Name</th>
																<th>Remarks</th>
															</tr>
														</thead>
										
														<tbody>
														<?php
															$sno=1;
															foreach($submitted_website as $pen_sub):
																$unserial=$pen_sub;
																if($pen_sub['is_assigned']==""):
															?>
																<tr data-attr="<?php echo $pen_sub['student_id']; ?>">
																	<td><?php echo $sno; ?></td>
																	<td><?php echo $unserial['tr_number']; ?></td>
																	<td><?php echo $unserial['first_name']." ".$unserial['last_name']; ?></td>
																	<td><?php echo $unserial['account_number']; ?></td>
																	<td><?php echo $unserial['mobile'] ?></td>
																	<td><?php echo $unserial['caste_details']; ?></td>
																	<td><?php echo $unserial['education_details'] ?></td>
																	<td><?php echo $unserial['course_details'] ?></td>
																	<td><?php echo $unserial['agent_name'] ?></td>
																	<td class="remarksSection">
																		<p><?php echo $unserial['remarks'] ?></p>
																		<div id="remarkModal" class="modal fade" id="myModal" role="dialog">
																			<div class="modal-dialog modal-xl">
																			
																				<!-- Modal content-->
																				<div class="modal-content">
																					<div class="modal-header">
																					<button type="button" class="close" data-dismiss="modal">&times;</button>
																					<h2 class="modal-title">Remark</h2>
																					<h4> <?php echo $unserial['first_name']." ".$unserial['last_name']; ?> (<?php echo $unserial['tr_number']; ?>)</h4>
																					</div>
																					<div class="modal-body">
																					<label style="white-space: break-spaces;"><?php echo $unserial['remarks']; ?></label>
																					</div>
																					<div class="modal-footer">
																					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
																					</div>
																				</div>
																			
																			</div>
																		</div>
																	</td>
																</tr>
															<?php
																		$sno++;
																	endif;

																endforeach;
															
															?>
														</tbody>
													</table>
												</div>
											</section>
										</div>
										<!-- /content -->
									</div>
									<!-- /tabs -->
								</section>
								
							</div>
						</div>
					</div>
				</div>
  
  </div>
  <div class="tab-pane fade" id="by_college" role="tabpanel" aria-labelledby="by_college">
  	<div class="col-lg-12 col-sm-12 m-t-5 by_college">
					<div class="panel panel-success panel_style">
						<div class="panel-heading"  data-perform="panel-collapse"> By College
							<div class="pull-right">
								<a href="#"  data-perform="panel-collapse">
									<i class="ti-plus"></i>
								</a> 
								<!-- <a href="#" data-perform="panel-dismiss">
									<i class="ti-close"></i>
								</a>  -->
							</div>
						</div>
						<div class="panel-wrapper collapse " aria-expanded="false">
							<div class="panel-body">
								<section class="m-t-40">
									<div class="sttabs tabs-style-linebox">
										<nav>
											<ul>
												<li><a href="#section-linebox-4"><span>Pending</span></a></li>
												<li><a href="#section-linebox-5"><span>Defect</span></a></li>
												<li><a href="#section-linebox-6"><span>Reject</span></a></li>
												<li><a href="#section-linebox-7"><span>Approved</span></a></li>
											</ul>
										</nav>
										<div class="content-wrap text-center">
											<section id="section-linebox-4">
												<!-- <h2>Tabbing 2</h2> -->
												<div class="col-sm-12 m-t-5"> 
													<div class="dt-buttons select_assign_btn"> 
														<button class="dt-button select_all" id="table20" tabindex="0" aria-controls="example_assign1" type="button">
															<span>Select all</span>
														</button> 
														<button class="dt-button deselect_all" id="table21" tabindex="0" aria-controls="example_assign1" type="button">
															<span>Select none</span>
														</button> 
													</div>
													<table id="pen_col" data-countAttr="table3" class="display" style="width:100%">
														<thead>
															<tr>
																<th>S.No.</th>
																<th>TR Number</th>
																<th>Student name</th>
																<th>Account Number</th>
																<th>Mobile Number</th>
																<th>Caste</th>
																<th>College Name</th>
																<th>Course Name</th>
																<th>Agent Name</th>
																<th>Remarks</th>
															</tr>
														</thead>
													
														<tbody>
														<?php
															$sno=1;
															foreach($pending_by_college as $pen_coll):
																$unserial=$pen_coll;
																if($pen_coll['is_assigned']==""):
															?>
																<tr data-attr="<?php echo $pen_coll['student_id']; ?>">
																	
																	<td><?php echo $sno; ?></td>
																	<td><?php echo $unserial['tr_number']; ?></td>
																	<td><?php echo $unserial['first_name']." ".$unserial['last_name']; ?></td>
																	<td><?php echo $unserial['account_number']; ?></td>
																	<td><?php echo $unserial['mobile'] ?></td>
																	<td><?php echo $unserial['caste_details']; ?></td>
																	<td><?php echo $unserial['education_details'] ?></td>
																	<td><?php echo $unserial['course_details'] ?></td>
																	<td><?php echo $unserial['agent_name'] ?></td>
																	<td class="remarksSection">
																		<p><?php echo $unserial['remarks'] ?></p>
																		<div id="remarkModal" class="modal fade" id="myModal" role="dialog">
																			<div class="modal-dialog modal-xl">
																			
																				<!-- Modal content-->
																				<div class="modal-content">
																					<div class="modal-header">
																					<button type="button" class="close" data-dismiss="modal">&times;</button>
																					<h2 class="modal-title">Remark</h2>
																					<h4> <?php echo $unserial['first_name']." ".$unserial['last_name']; ?> (<?php echo $unserial['tr_number']; ?>)</h4>
																					</div>
																					<div class="modal-body">
																					<label style="white-space: break-spaces;"><?php echo $unserial['remarks']; ?></label>
																					</div>
																					<div class="modal-footer">
																					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
																					</div>
																				</div>
																			
																			</div>
																		</div>
																	</td>
																</tr>
															<?php
																		$sno++;
																	endif;

																endforeach;
															
															?>
														</tbody>
													</table>
												</div>
												
											</section>
											<section id="section-linebox-5">
											
												<div class="col-sm-12 m-t-5">

													<div class="dt-buttons select_assign_btn"> 
														<button class="dt-button select_all" id="table22" tabindex="0" aria-controls="example_assign2" type="button">
															<span>Select all</span>
														</button> 
														<button class="dt-button deselect_all" id="table23" tabindex="0" aria-controls="example_assign2" type="button">
															<span>Select none</span>
														</button> 
													</div>
													<table id="def_col" data-countAttr="table4" class="display" style="width:100%">
														<thead>
															<tr>
																<th>S.No.</th>
																<th>TR Number</th>
																<th>Student name</th>
																<th>Account Number</th>
																<th>Mobile Number</th>
																<th>Caste</th>
																<th>College Name</th>
																<th>Course Name</th>
																<th>Agent Name</th>
																<th>Remarks</th>
															</tr>
														</thead>
													
														<tbody>
														<?php
															$sno=1;
															foreach($defect_by_college as $def_coll):
																$unserial=$def_coll;
																if($def_coll['is_assigned']==""):
															?>
																<tr data-attr="<?php echo $def_coll['student_id']; ?>">
																	
																	<td><?php echo $sno; ?></td>
																	<td><?php echo $unserial['tr_number']; ?></td>
																	<td><?php echo $unserial['first_name']." ".$unserial['last_name']; ?></td>
																	<td><?php echo $unserial['account_number']; ?></td>
																	<td><?php echo $unserial['mobile'] ?></td>
																	<td><?php echo $unserial['caste_details']; ?></td>
																	<td><?php echo $unserial['education_details'] ?></td>
																	<td><?php echo $unserial['course_details'] ?></td>
																	<td><?php echo $unserial['agent_name'] ?></td>
																	<td class="remarksSection">
																		<p><?php echo $unserial['remarks'] ?></p>
																		<div id="remarkModal" class="modal fade" id="myModal" role="dialog">
																			<div class="modal-dialog modal-xl">
																			
																				<!-- Modal content-->
																				<div class="modal-content">
																					<div class="modal-header">
																					<button type="button" class="close" data-dismiss="modal">&times;</button>
																					<h2 class="modal-title">Remark</h2>
																					<h4> <?php echo $unserial['first_name']." ".$unserial['last_name']; ?> (<?php echo $unserial['tr_number']; ?>)</h4>
																					</div>
																					<div class="modal-body">
																					<label style="white-space: break-spaces;"><?php echo $unserial['remarks']; ?></label>
																					</div>
																					<div class="modal-footer">
																					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
																					</div>
																				</div>
																			
																			</div>
																		</div>
																	</td>
																</tr>
															<?php
																		$sno++;
																	endif;

																endforeach;
															
															?>
														</tbody>
													</table>
												</div>

											</section>
											<section id="section-linebox-6">
												<div class="col-sm-12 m-t-5">
													<div class="dt-buttons select_assign_btn"> 
														<button class="dt-button select_all" id="table24" tabindex="0" aria-controls="example_assign3" type="button">
															<span>Select all</span>
														</button> 
														<button class="dt-button deselect_all" id="table25" tabindex="0" aria-controls="example_assign3" type="button">
															<span>Select none</span>
														</button> 
													</div>
													<table id="rej_col" data-countAttr="table5" class="display" style="width:100%">
														<thead>
															<tr>
																<th>S.No.</th>
																<th>TR Number</th>
																<th>Student name</th>
																<th>Account Number</th>
																<th>Mobile Number</th>
																<th>Caste</th>
																<th>College Name</th>
																<th>Course Name</th>
																<th>Agent Name</th>
																<th>Remarks</th>
															
															</tr>
														</thead>
													
														<tbody>
														<?php
															$sno=1;
															foreach($college_reject as $rej_coll):
																$unserial=$rej_coll;
																if($rej_coll['is_assigned']==""):
															?>
																<tr data-attr="<?php echo $rej_coll['student_id']; ?>">
																	
																	<td><?php echo $sno; ?></td>
																	<td><?php echo $unserial['tr_number']; ?></td>
																	<td><?php echo $unserial['first_name']." ".$unserial['last_name']; ?></td>
																	<td><?php echo $unserial['account_number']; ?></td>
																	<td><?php echo $unserial['mobile'] ?></td>
																	<td><?php echo $unserial['caste_details']; ?></td>
																	<td><?php echo $unserial['education_details'] ?></td>
																	<td><?php echo $unserial['course_details'] ?></td>
																	<td><?php echo $unserial['agent_name'] ?></td>
																	<td class="remarksSection">
																		<p><?php echo $unserial['remarks'] ?></p>
																		<div id="remarkModal" class="modal fade" id="myModal" role="dialog">
																			<div class="modal-dialog modal-xl">
																			
																				<!-- Modal content-->
																				<div class="modal-content">
																					<div class="modal-header">
																					<button type="button" class="close" data-dismiss="modal">&times;</button>
																					<h2 class="modal-title">Remark</h2>
																					<h4> <?php echo $unserial['first_name']." ".$unserial['last_name']; ?> (<?php echo $unserial['tr_number']; ?>)</h4>
																					</div>
																					<div class="modal-body">
																					<label style="white-space: break-spaces;"><?php echo $unserial['remarks']; ?></label>
																					</div>
																					<div class="modal-footer">
																					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
																					</div>
																				</div>
																			
																			</div>
																		</div>
																	</td>
																</tr>
															<?php
																		$sno++;
																	endif;

																endforeach;
															
															?>
														</tbody>
													</table>
												</div>
											
											</section>
											<section id="section-linebox-7">
												<!-- <h2>Tabbing 5</h2> -->
												<div class="col-sm-12 m-t-5">
													<div class="dt-buttons select_assign_btn"> 
														<button class="dt-button select_all" id="table26" tabindex="0" aria-controls="example_assign4" type="button">
															<span>Select all</span>
														</button> 
														<button class="dt-button deselect_all" id="table27" tabindex="0" aria-controls="example_assign4" type="button">
															<span>Select none</span>
														</button> 
													</div>
													<table id="sub_col" data-countAttr="table6" class="display" style="width:100%">
														<thead>
															<tr>
																<th>S.No.</th>
																<th>TR Number</th>
																<th>Student name</th>
																<th>Account Number</th>
																<th>Mobile Number</th>
																<th>Caste</th>
																<th>College Name</th>
																<th>Course Name</th>
																<th>Agent Name</th>
																<th>Remarks</th>
															</tr>
														</thead>
													
														<tbody>
														<?php
															$sno=1;
															foreach($approved_by_college as $app_coll):
																$unserial=$app_coll;
																if($app_coll['is_assigned']==""):
															?>
																<tr data-attr="<?php echo $app_coll['student_id']; ?>">
																	
																	<td><?php echo $sno; ?></td>
																	<td><?php echo $unserial['tr_number']; ?></td>
																	<td><?php echo $unserial['first_name']." ".$unserial['last_name']; ?></td>
																	<td><?php echo $unserial['account_number']; ?></td>
																	<td><?php echo $unserial['mobile'] ?></td>
																	<td><?php echo $unserial['caste_details']; ?></td>
																	<td><?php echo $unserial['education_details'] ?></td>
																	<td><?php echo $unserial['course_details'] ?></td>
																	<td><?php echo $unserial['agent_name'] ?></td>
																	<td class="remarksSection">
																		<p><?php echo $unserial['remarks'] ?></p>
																		<div id="remarkModal" class="modal fade" id="myModal" role="dialog">
																			<div class="modal-dialog modal-xl">
																			
																				<!-- Modal content-->
																				<div class="modal-content">
																					<div class="modal-header">
																					<button type="button" class="close" data-dismiss="modal">&times;</button>
																					<h2 class="modal-title">Remark</h2>
																					<h4> <?php echo $unserial['first_name']." ".$unserial['last_name']; ?> (<?php echo $unserial['tr_number']; ?>)</h4>
																					</div>
																					<div class="modal-body">
																					<label style="white-space: break-spaces;"><?php echo $unserial['remarks']; ?></label>
																					</div>
																					<div class="modal-footer">
																					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
																					</div>
																				</div>
																			
																			</div>
																		</div>
																	</td>
																</tr>
															<?php
																		$sno++;
																	endif;

																endforeach;
															
															?>
														
														</tbody>
													</table>
												</div>
											</section>
										</div>
										<!-- /content -->
									</div>
									<!-- /tabs -->
								</section>
								
							</div>
						</div>
					</div>
				</div>
  </div>
  <div class="tab-pane fade" id="by_nsa" role="tabpanel" aria-labelledby="by_nsa">
  <div class="col-lg-12 col-sm-12 m-t-5 by_nsa">
					<div class="panel panel-primary panel_style">
						<div class="panel-heading"   data-perform="panel-collapse"> By NSP
							<div class="pull-right">
								<a href="#"  data-perform="panel-collapse">
									<i class="ti-plus"></i>
								</a> 
								<!-- <a href="#" data-perform="panel-dismiss">
									<i class="ti-close"></i>
								</a>  -->
							</div>
						</div>
						<div class="panel-wrapper collapse" aria-expanded="false">
							<div class="panel-body">
								<section class="m-t-40">
									<div class="sttabs tabs-style-linebox">
										<nav>
											<ul>
												<li><a href="#section-linebox-8"><span>Pending</span></a></li>
												<li><a href="#section-linebox-9"><span>Defect</span></a></li>
												<li><a href="#section-linebox-10"><span>Reject</span></a></li>
												<li><a href="#section-linebox-11"><span>Approved</span></a></li>
											</ul>
										</nav>
										<div class="content-wrap text-center">
											
											<section id="section-linebox-8">
												<!-- <h2>Tabbing 2</h2> -->
												<div class="col-sm-12 m-t-5"> 
													<div class="dt-buttons select_assign_btn"> 
														<button class="dt-button select_all" id="table30" tabindex="0" aria-controls="example_assign1" type="button">
															<span>Select all</span>
														</button> 
														<button class="dt-button deselect_all" id="table31" tabindex="0" aria-controls="example_assign1" type="button">
															<span>Select none</span>
														</button> 
													</div>
													<table id="pen_nsp" data-countAttr="table7" class="display" style="width:100%">
														<thead>
															<tr>
																<th>S.No.</th>
																<th>TR Number</th>
																<th>Student name</th>
																<th>Account Number</th>
																<th>Mobile Number</th>
																<th>Caste</th>
																<th>College Name</th>
																<th>Course Name</th>
																<th>Agent Name</th>
																<th>Remarks</th>
															
															</tr>
														</thead>
														
														<tbody>
														<?php
															$sno=1;
															foreach($pending_by_nsp as $pen_nsp):
																$unserial=$pen_nsp;
																if($pen_nsp['is_assigned']==""):
															?>
																<tr data-attr="<?php echo $pen_nsp['student_id']; ?>">
																	
																	<td><?php echo $sno; ?></td>
																	<td><?php echo $unserial['tr_number']; ?></td>
																	<td><?php echo $unserial['first_name']." ".$unserial['last_name']; ?></td>
																	<td><?php echo $unserial['account_number']; ?></td>
																	<td><?php echo $unserial['mobile'] ?></td>
																	<td><?php echo $unserial['caste_details']; ?></td>
																	<td><?php echo $unserial['education_details'] ?></td>
																	<td><?php echo $unserial['course_details'] ?></td>
																	<td><?php echo $unserial['agent_name'] ?></td>
																	<td class="remarksSection">
																		<p><?php echo $unserial['remarks'] ?></p>
																		<div id="remarkModal" class="modal fade" id="myModal" role="dialog">
																			<div class="modal-dialog modal-xl">
																			
																				<!-- Modal content-->
																				<div class="modal-content">
																					<div class="modal-header">
																					<button type="button" class="close" data-dismiss="modal">&times;</button>
																					<h2 class="modal-title">Remark</h2>
																					<h4> <?php echo $unserial['first_name']." ".$unserial['last_name']; ?> (<?php echo $unserial['tr_number']; ?>)</h4>
																					</div>
																					<div class="modal-body">
																					<label style="white-space: break-spaces;"><?php echo $unserial['remarks']; ?></label>
																					</div>
																					<div class="modal-footer">
																					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
																					</div>
																				</div>
																			
																			</div>
																		</div>
																	</td>
																</tr>
															<?php
																		$sno++;
																	endif;

																endforeach;
															
															?>
														</tbody>
													</table>
												</div>
												
											</section>
											<section id="section-linebox-9">
												
												<div class="col-sm-12 m-t-5">
													<div class="dt-buttons select_assign_btn"> 
														<button class="dt-button select_all" id="table32" tabindex="0" aria-controls="example_assign2" type="button">
															<span>Select all</span>
														</button> 
														<button class="dt-button deselect_all" id="table33" tabindex="0" aria-controls="example_assign2" type="button">
															<span>Select none</span>
														</button> 
													</div>
													<table id="def_nsp" data-countAttr="table8" class="display" style="width:100%">
														<thead>
															<tr>
																<th>S.No.</th>
																<th>TR Number</th>
																<th>Student name</th>
																<th>Account Number</th>
																<th>Mobile Number</th>
																<th>Caste</th>
																<th>College Name</th>
																<th>Course Name</th>
																<th>Agent Name</th>
																<th>Remarks</th>
															</tr>
														</thead>
													
														<tbody>
														<?php
															$sno=1;
															foreach($defect_by_nsp as $def_nsp):
																$unserial=$def_nsp;
																if($def_nsp['is_assigned']==""):
															?>
																<tr data-attr="<?php echo $def_nsp['student_id']; ?>">
																	
																	<td><?php echo $sno; ?></td>
																	<td><?php echo $unserial['tr_number']; ?></td>
																	<td><?php echo $unserial['first_name']." ".$unserial['last_name']; ?></td>
																	<td><?php echo $unserial['account_number']; ?></td>
																	<td><?php echo $unserial['mobile'] ?></td>
																	<td><?php echo $unserial['caste_details']; ?></td>
																	<td><?php echo $unserial['education_details'] ?></td>
																	<td><?php echo $unserial['course_details'] ?></td>
																	<td><?php echo $unserial['agent_name'] ?></td>
																	<td class="remarksSection">
																		<p><?php echo $unserial['remarks'] ?></p>
																		<div id="remarkModal" class="modal fade" id="myModal" role="dialog">
																			<div class="modal-dialog modal-xl">
																			
																				<!-- Modal content-->
																				<div class="modal-content">
																					<div class="modal-header">
																					<button type="button" class="close" data-dismiss="modal">&times;</button>
																					<h2 class="modal-title">Remark</h2>
																					<h4> <?php echo $unserial['first_name']." ".$unserial['last_name']; ?> (<?php echo $unserial['tr_number']; ?>)</h4>
																					</div>
																					<div class="modal-body">
																					<label style="white-space: break-spaces;"><?php echo $unserial['remarks']; ?></label>
																					</div>
																					<div class="modal-footer">
																					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
																					</div>
																				</div>
																			
																			</div>
																		</div>
																	</td>
																</tr>
															<?php
																		$sno++;
																	endif;

																endforeach;
															
															?>
														</tbody>
													</table>
												</div>

											</section>
											<section id="section-linebox-10">
												<!-- <h2>Tabbing 4</h2> -->

												<div class="col-sm-12 m-t-5">
													<div class="dt-buttons select_assign_btn"> 
														<button class="dt-button select_all" id="table34" tabindex="0" aria-controls="example_assign3" type="button">
															<span>Select all</span>
														</button> 
														<button class="dt-button deselect_all" id="table35" tabindex="0" aria-controls="example_assign3" type="button">
															<span>Select none</span>
														</button> 
													</div>
													<table id="rej_nsp" data-countAttr="table9" class="display" style="width:100%">
														<thead>
															<tr>
																<th>S.No.</th>
																<th>TR Number</th>
																<th>Student name</th>
																<th>Account Number</th>
																<th>Mobile Number</th>
																<th>Caste</th>
																<th>College Name</th>
																<th>Course Name</th>
																<th>Agent Name</th>
																<th>Remarks</th>
															</tr>
														</thead>
													
														<tbody>
															<?php
															$sno=1;
															foreach($nsp_reject as $rej_nsp):
																$unserial=$rej_nsp;
																if($rej_nsp['is_assigned']==""):
															?>
																<tr data-attr="<?php echo $rej_nsp['student_id']; ?>">
																	
																	<td><?php echo $sno; ?></td>
																	<td><?php echo $unserial['tr_number']; ?></td>
																	<td><?php echo $unserial['first_name']." ".$unserial['last_name']; ?></td>
																	<td><?php echo $unserial['account_number']; ?></td>
																	<td><?php echo $unserial['mobile'] ?></td>
																	<td><?php echo $unserial['caste_details']; ?></td>
																	<td><?php echo $unserial['education_details'] ?></td>
																	<td><?php echo $unserial['course_details'] ?></td>
																	<td><?php echo $unserial['agent_name'] ?></td>
																	<td class="remarksSection">
																		<p><?php echo $unserial['remarks'] ?></p>
																		<div id="remarkModal" class="modal fade" id="myModal" role="dialog">
																			<div class="modal-dialog modal-xl">
																			
																				<!-- Modal content-->
																				<div class="modal-content">
																					<div class="modal-header">
																					<button type="button" class="close" data-dismiss="modal">&times;</button>
																					<h2 class="modal-title">Remark</h2>
																					<h4> <?php echo $unserial['first_name']." ".$unserial['last_name']; ?> (<?php echo $unserial['tr_number']; ?>)</h4>
																					</div>
																					<div class="modal-body">
																					<label style="white-space: break-spaces;"><?php echo $unserial['remarks']; ?></label>
																					</div>
																					<div class="modal-footer">
																					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
																					</div>
																				</div>
																			
																			</div>
																		</div>
																	</td>
																</tr>
															<?php
																		$sno++;
																	endif;

																endforeach;
															
															?>
														</tbody>
													</table>
												</div>
											
											</section>
											<section id="section-linebox-11">
												<!-- <h2>Tabbing 5</h2> -->
												<div class="col-sm-12 m-t-5">
													<div class="dt-buttons select_assign_btn"> 
														<button class="dt-button select_all" id="table36" tabindex="0" aria-controls="example_assign4" type="button">
															<span>Select all</span>
														</button> 
														<button class="dt-button deselect_all" id="table37" tabindex="0" aria-controls="example_assign4" type="button">
															<span>Select none</span>
														</button> 
													</div>
													<table id="sub_nsp" data-countAttr="table10" class="display" style="width:100%">
														<thead>
															<tr>
																<th>S.No.</th>
																<th>TR Number</th>
																<th>Student name</th>
																<th>Account Number</th>
																<th>Mobile Number</th>
																<th>Caste</th>
																<th>College Name</th>
																<th>Course Name</th>
																<th>Agent Name</th>
																<th>Remarks</th>
															</tr>
														</thead>
													
														<tbody>
														<?php
															$sno=1;
															foreach($approved_by_nsp as $appr_nsp):
																$unserial=$appr_nsp;
																if($appr_nsp['is_assigned']==""):
															?>
																<tr data-attr="<?php echo $appr_nsp['student_id']; ?>">
																	
																	<td><?php echo $sno; ?></td>
																	<td><?php echo $unserial['tr_number']; ?></td>
																	<td><?php echo $unserial['first_name']." ".$unserial['last_name']; ?></td>
																	<td><?php echo $unserial['account_number']; ?></td>
																	<td><?php echo $unserial['mobile'] ?></td>
																	<td><?php echo $unserial['caste_details']; ?></td>
																	<td><?php echo $unserial['education_details'] ?></td>
																	<td><?php echo $unserial['course_details'] ?></td>
																	<td><?php echo $unserial['agent_name'] ?></td>
																	<td class="remarksSection">
																		<p><?php echo $unserial['remarks'] ?></p>
																		<div id="remarkModal" class="modal fade" id="myModal" role="dialog">
																			<div class="modal-dialog modal-xl">
																			
																				<!-- Modal content-->
																				<div class="modal-content">
																					<div class="modal-header">
																					<button type="button" class="close" data-dismiss="modal">&times;</button>
																					<h2 class="modal-title">Remark</h2>
																					<h4> <?php echo $unserial['first_name']." ".$unserial['last_name']; ?> (<?php echo $unserial['tr_number']; ?>)</h4>
																					</div>
																					<div class="modal-body">
																					<label style="white-space: break-spaces;"><?php echo $unserial['remarks']; ?></label>
																					</div>
																					<div class="modal-footer">
																					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
																					</div>
																				</div>
																			
																			</div>
																		</div>
																	</td>
																</tr>
															<?php
																		$sno++;
																	endif;

																endforeach;
															
															?>
														</tbody>
													</table>
												</div>
											</section>
										</div>
										<!-- /content -->
									</div>
									<!-- /tabs -->
								</section>
								
							</div>
						</div>
					</div>
				</div>
  </div>
  <div class="tab-pane fade" id="by_caste" role="tabpanel" aria-labelledby="by_caste">
   	<div class="col-lg-12 col-sm-12 m-t-5 by_caste">
					<div class="panel panel-success panel_style">
						<div class="panel-heading"   data-perform="panel-collapse"> By Caste
							<div class="pull-right">
								<a href="#"  data-perform="panel-collapse">
									<i class="ti-plus"></i>
								</a> 
								<!-- <a href="#" data-perform="panel-dismiss">
									<i class="ti-close"></i>
								</a>  -->
							</div>
						</div>
						<div class="panel-wrapper collapse" aria-expanded="false">
							<div class="panel-body">
								<section class="m-t-40">
									<div class="sttabs tabs-style-linebox">
										<nav>
											<ul>
												<li><a href="#section-linebox-12"><span>SC</span></a></li>
												<li><a href="#section-linebox-13"><span>ST</span></a></li>
												<li><a href="#section-linebox-14"><span>OBC</span></a></li>
											</ul>
										</nav>
										<div class="content-wrap text-center">
											
											<section id="section-linebox-12">
												<!-- <h2>Tabbing 2</h2> -->
												<div class="col-sm-12 m-t-5"> 
													<div class="dt-buttons select_assign_btn"> 
														<button class="dt-button select_all" id="table38" tabindex="0" aria-controls="example_assign1" type="button">
															<span>Select all</span>
														</button> 
														<button class="dt-button deselect_all" id="table39" tabindex="0" aria-controls="example_assign1" type="button">
															<span>Select none</span>
														</button> 
													</div>
													<table id="caste_SC" data-countAttr="table11" class="display" style="width:100%">
														<thead>
															<tr>
																<th>S.No.</th>
																<th>TR Number</th>
																<th>Student name</th>
																<th>Status</th>
																<th>Account Number</th>
																<th>Mobile Number</th>
																<th>Caste</th>
																<th>College Name</th>
																<th>Course Name</th>
																<th>Agent Name</th>
																<th>Remarks</th>
															</tr>
														</thead>
													
														<tbody>
														<?php
															$sno=1;
															foreach($students as $students_sc):
															$unserial=$students_sc;
															if($students_sc['is_assigned']=="" && $unserial['caste_details'] == "SC"):
												
																$chekVal = 'pendingStudents';
																if( isset($studentStatus[$students_sc['student_id']]['Status']) && strpos($studentStatus[$students_sc['student_id']]['Status'], 'Reject') !== false){
																	$chekVal = 'rejectStudent';
																} 

																if( isset($studentStatus[$students_sc['student_id']]['Status']) && strpos($studentStatus[$students_sc['student_id']]['Status'], 'Approved') !== false){
																	$chekVal = 'approveStudents';
																} 

																if( isset($studentStatus[$students_sc['student_id']]['Status']) && strpos($studentStatus[$students_sc['student_id']]['Status'], 'Defect') !== false){
																	$chekVal = 'defectStudents';
																}
														?>
																	<tr data-attr="<?php echo $students_sc['student_id']; ?>" data-class="<?=$chekVal;?>">
																		
																		<td data-class="<?=$chekVal;?>"><?php echo $sno; ?></td>
																		<td><?php echo $unserial['tr_number']; ?></td>
																		<td><?php echo $unserial['first_name']." ".$unserial['last_name']; ?></td>
																		<?php 
																			if( isset($studentStatus[$students_sc['student_id']]['Status'])){
																				$selStatus = $studentStatus[$students_sc['student_id']]['Status'];
																			}else {
																				$selStatus = "Pending From Our Site";
																			}
																		?>
																		<td><?php echo $selStatus; ?></td>
																		<td><?php echo $unserial['account_number']; ?></td>
																		<td><?php echo $unserial['mobile'] ?></td>
																		<td><?php echo $unserial['caste_details']; ?></td>
																		<td><?php echo $unserial['education_details'] ?></td>
																		<td><?php echo $unserial['course_details'] ?></td>
																		<td><?php echo $unserial['agent_name'] ?></td>
																		<td class="remarksSection">
																			<p><?php echo $unserial['remarks'] ?></p>
																			<div id="remarkModal" class="modal fade" id="myModal" role="dialog">
																			<div class="modal-dialog modal-xl">
																			
																				<!-- Modal content-->
																				<div class="modal-content">
																					<div class="modal-header">
																					<button type="button" class="close" data-dismiss="modal">&times;</button>
																					<h2 class="modal-title">Remark</h2>
																					<h4> <?php echo $unserial['first_name']." ".$unserial['last_name']; ?> (<?php echo $unserial['tr_number']; ?>)</h4>
																					</div>
																					<div class="modal-body">
																					<label style="white-space: break-spaces;"><?php echo $unserial['remarks']; ?></label>
																					</div>
																					<div class="modal-footer">
																					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
																					</div>
																				</div>
																			
																			</div>
																		</div>
																		</td>
																		
																	</tr>
															<?php
																		$sno++;
																	endif;

																endforeach;
															
															?>
														</tbody>
													</table>
												</div>
												
											</section>
											<section id="section-linebox-13">
												
												<div class="col-sm-12 m-t-5">
													<div class="dt-buttons select_assign_btn"> 
														<button class="dt-button select_all" id="table40" tabindex="0" aria-controls="example_assign2" type="button">
															<span>Select all</span>
														</button> 
														<button class="dt-button deselect_all" id="table41" tabindex="0" aria-controls="example_assign2" type="button">
															<span>Select none</span>
														</button> 
													</div>
													<table id="caste_ST" data-countAttr="table12" class="display" style="width:100%">
														<thead>
															<tr>
																<th>S.No.</th>
																<th>TR Number</th>
																<th>Student name</th>
																<th>Status</th>
																<th>Account Number</th>
																<th>Mobile Number</th>
																<th>Caste</th>
																<th>College Name</th>
																<th>Course Name</th>
																<th>Agent Name</th>
																<th>Remarks</th>
															</tr>
														</thead>
												
														<tbody>
														<?php
															$sno=1;
															foreach($students as $students_st):
																$unserial=$students_st;
																if($students_st['is_assigned']=="" && $unserial['caste_details'] == "ST"):

																	$chekVal = 'pendingStudents';
																	if( isset($studentStatus[$students_st['student_id']]['Status']) && strpos($studentStatus[$students_st['student_id']]['Status'], 'Reject') !== false){
																		$chekVal = 'rejectStudent';
																	} 

																	if( isset($studentStatus[$students_st['student_id']]['Status']) && strpos($studentStatus[$students_st['student_id']]['Status'], 'Approved') !== false){
																		$chekVal = 'approveStudents';
																	} 

																	if( isset($studentStatus[$students_st['student_id']]['Status']) && strpos($studentStatus[$students_st['student_id']]['Status'], 'Defect') !== false){
																		$chekVal = 'defectStudents';
																	}
															?>
																<tr data-attr="<?php echo $students_st['student_id']; ?>" data-class="<?=$chekVal;?>">
																	
																	<td data-class="<?=$chekVal;?>"><?php echo $sno; ?></td>
																	<td><?php echo $unserial['tr_number']; ?></td>
																	<td><?php echo $unserial['first_name']." ".$unserial['last_name']; ?></td>
																	<?php 
																			if( isset($studentStatus[$students_st['student_id']]['Status'])){
																				$selStatus = $studentStatus[$students_st['student_id']]['Status'];
																			}else {
																				$selStatus = "Pending From Our Site";
																			}
																		?>
																		<td><?php echo $selStatus; ?></td>
																	<td><?php echo $unserial['account_number']; ?></td>
																	<td><?php echo $unserial['mobile'] ?></td>
																	<td><?php echo $unserial['caste_details']; ?></td>
																	<td><?php echo $unserial['education_details'] ?></td>
																	<td><?php echo $unserial['course_details'] ?></td>
																	<td><?php echo $unserial['agent_name'] ?></td>
																	<td class="remarksSection">
																		<p><?php echo $unserial['remarks'] ?></p>
																		<div id="remarkModal" class="modal fade" id="myModal" role="dialog">
																			<div class="modal-dialog modal-xl">
																			
																				<!-- Modal content-->
																				<div class="modal-content">
																					<div class="modal-header">
																					<button type="button" class="close" data-dismiss="modal">&times;</button>
																					<h2 class="modal-title">Remark</h2>
																					<h4> <?php echo $unserial['first_name']." ".$unserial['last_name']; ?> (<?php echo $unserial['tr_number']; ?>)</h4>
																					</div>
																					<div class="modal-body">
																					<label style="white-space: break-spaces;"><?php echo $unserial['remarks']; ?></label>
																					</div>
																					<div class="modal-footer">
																					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
																					</div>
																				</div>
																			
																			</div>
																		</div>
																	</td>
																</tr>
															<?php
																		$sno++;
																	endif;

																endforeach;
															
															?>
														</tbody>
													</table>
												</div>

											</section>
											<section id="section-linebox-14">
												<!-- <h2>Tabbing 4</h2> -->

												<div class="col-sm-12 m-t-5">
													<div class="dt-buttons select_assign_btn"> 
														<button class="dt-button select_all" id="table42" tabindex="0" aria-controls="example_assign3" type="button">
															<span>Select all</span>
														</button> 
														<button class="dt-button deselect_all" id="table43" tabindex="0" aria-controls="example_assign3" type="button">
															<span>Select none</span>
														</button> 
													</div>
													<table id="caste_OBC" data-countAttr="table13" class="display" style="width:100%">
														<thead>
															<tr>
																<th>S.No.</th>
																<th>TR Number</th>
																<th>Student name</th>
																<th>Status</th>
																<th>Account Number</th>
																<th>Mobile Number</th>
																<th>Caste</th>
																<th>College Name</th>
																<th>Course Name</th>
																<th>Agent Name</th>
																<th>Remarks</th>
															</tr>
														</thead>
												
														<tbody>
															<?php
															$sno=1;
															foreach($students as $students_obc):
																//$unserial=unserialize($students_obc['student_uploaded_data']);
																$unserial=$students_obc;
																if($students_obc['is_assigned']=="" && $unserial['caste_details'] == "OBC"):

																	$chekVal = 'pendingStudents';
																	if( isset($studentStatus[$students_obc['student_id']]['Status']) && strpos($studentStatus[$students_obc['student_id']]['Status'], 'Reject') !== false){
																		$chekVal = 'rejectStudent';
																	} 

																	if( isset($studentStatus[$students_obc['student_id']]['Status']) && strpos($studentStatus[$students_obc['student_id']]['Status'], 'Approved') !== false){
																		$chekVal = 'approveStudents';
																	} 

																	if( isset($studentStatus[$students_obc['student_id']]['Status']) && strpos($studentStatus[$students_obc['student_id']]['Status'], 'Defect') !== false){
																		$chekVal = 'defectStudents';
																	}
															?>
																<tr data-attr="<?php echo $students_obc['student_id']; ?>" data-class="<?=$chekVal;?>">
																	
																	<td data-class="<?=$chekVal;?>"><?php echo $sno; ?></td>
																	<td><?php echo $unserial['tr_number']; ?></td>
																	<td><?php echo $unserial['first_name']." ".$unserial['last_name']; ?></td>
																	<?php 
																			if( isset($studentStatus[$students_obc['student_id']]['Status'])){
																				$selStatus = $studentStatus[$students_obc['student_id']]['Status'];
																			}else {
																				$selStatus = "Pending From Our Site";
																			}
																		?>
																		<td><?php echo $selStatus; ?></td>
																	<td><?php echo $unserial['account_number']; ?></td>
																	<td><?php echo $unserial['mobile'] ?></td>
																	<td><?php echo $unserial['caste_details']; ?></td>
																	<td><?php echo $unserial['education_details'] ?></td>
																	<td><?php echo $unserial['course_details'] ?></td>
																	<td><?php echo $unserial['agent_name'] ?></td>
																	<td class="remarksSection">
																		<p><?php echo $unserial['remarks'] ?></p>
																		<div id="remarkModal" class="modal fade" id="myModal" role="dialog">
																			<div class="modal-dialog modal-xl">
																			
																				<!-- Modal content-->
																				<div class="modal-content">
																					<div class="modal-header">
																					<button type="button" class="close" data-dismiss="modal">&times;</button>
																					<h2 class="modal-title">Remark</h2>
																					<h4> <?php echo $unserial['first_name']." ".$unserial['last_name']; ?> (<?php echo $unserial['tr_number']; ?>)</h4>
																					</div>
																					<div class="modal-body">
																					<label style="white-space: break-spaces;"><?php echo $unserial['remarks']; ?></label>
																					</div>
																					<div class="modal-footer">
																					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
																					</div>
																				</div>
																			
																			</div>
																		</div>
																	</td>
																</tr>
															<?php
																		$sno++;
																	endif;

																endforeach;
															
															?>
														</tbody>
													</table>
												</div>
											
											</section>
										</div>
										<!-- /content -->
									</div>
									<!-- /tabs -->
								</section>
								
							</div>
						</div>
					</div>
				</div>
  </div>
  <div class="tab-pane fade" id="by_state" role="tabpanel" aria-labelledby="by_state">
 	<div class="col-lg-12 col-sm-12 m-t-5 by_state">
					<div class="panel panel-inverse panel_style">
						<div class="panel-heading"   data-perform="panel-collapse"> By State
							<div class="pull-right">
								<a href="#"  data-perform="panel-collapse">
									<i class="ti-plus"></i>
								</a> 
								<!-- <a href="#" data-perform="panel-dismiss">
									<i class="ti-close"></i>
								</a>  -->
							</div>
						</div>
						<div class="panel-wrapper collapse" aria-expanded="false">
							<div class="panel-body">
								<section class="m-t-40">
									<div class="sttabs tabs-style-linebox">
										<nav>
											<ul>
												<li><a href="#section-linebox-14"><span>Assam</span></a></li>
												<li><a href="#section-linebox-15"><span>Tripura</span></a></li>
											</ul>
										</nav>
										<div class="content-wrap text-center">
											
											<section id="section-linebox-14">
												<!-- <h2>Tabbing 2</h2> -->
												<div class="col-sm-12 m-t-5"> 
													<div class="dt-buttons select_assign_btn"> 
														<button class="dt-button select_all" id="table44" tabindex="0" aria-controls="example_assign1" type="button">
															<span>Select all</span>
														</button> 
														<button class="dt-button deselect_all" id="table45" tabindex="0" aria-controls="example_assign1" type="button">
															<span>Select none</span>
														</button> 
													</div>
													<table id="state_assam" data-countAttr="table14" class="display" style="width:100%">
														<thead>
															<tr>
																<th>S.No.</th>
																<th>TR Number</th>
																<th>Student name</th>
																<th>Status</th>
																<th>Account Number</th>
																<th>Mobile Number</th>
																<th>Caste</th>
																<th>College Name</th>
																<th>Course Name</th>
																<th>Agent Name</th>
																<th>Remarks</th>
															
															</tr>
														</thead>
													
														<tbody>
														<?php
																$sno=1;
																foreach($students as $students_assam):
																	$unserial=$students_assam;
																	if($students_assam['is_assigned']=="" && $unserial['state']=="Assam"):

																		
																		$chekVal = 'pendingStudents';
																		if( isset($studentStatus[$students_assam['student_id']]['Status']) && strpos($studentStatus[$students_assam['student_id']]['Status'], 'Reject') !== false){
																			$chekVal = 'rejectStudent';
																		} 

																		if( isset($studentStatus[$students_assam['student_id']]['Status']) && strpos($studentStatus[$students_assam['student_id']]['Status'], 'Approved') !== false){
																			$chekVal = 'approveStudents';
																		} 

																		if( isset($studentStatus[$students_assam['student_id']]['Status']) && strpos($studentStatus[$students_assam['student_id']]['Status'], 'Defect') !== false){
																			$chekVal = 'defectStudents';
																		}


															?>
																	<tr data-attr="<?php echo $students_assam['student_id']; ?>" data-class="<?=$chekVal;?>">
																		
																		<td data-class="<?=$chekVal;?>"><?php echo $sno; ?></td>
																		<td><?php echo $unserial['tr_number']; ?></td>
																		<td><?php echo $unserial['first_name']." ".$unserial['last_name']; ?></td>
																		<?php 
																			if( isset($studentStatus[$students_assam['student_id']]['Status'])){
																				$selStatus = $studentStatus[$students_assam['student_id']]['Status'];
																			}else {
																				$selStatus = "Pending From Our Site";
																			}
																		?>
																		<td><?php echo $selStatus; ?></td>
																		<td><?php echo $unserial['account_number']; ?></td>
																		<td><?php echo $unserial['mobile'] ?></td>
																		<td><?php echo $unserial['caste_details']; ?></td>
																		<td><?php echo $unserial['education_details'] ?></td>
																		<td><?php echo $unserial['course_details'] ?></td>
																		<td><?php echo $unserial['agent_name'] ?></td>
																		<td class="remarksSection">
																			<p><?php echo $unserial['remarks'] ?></p>
																			<div id="remarkModal" class="modal fade" id="myModal" role="dialog">
																				<div class="modal-dialog modal-xl">
																				
																					<!-- Modal content-->
																					<div class="modal-content">
																						<div class="modal-header">
																						<button type="button" class="close" data-dismiss="modal">&times;</button>
																						<h2 class="modal-title">Remark</h2>
																						<h4> <?php echo $unserial['first_name']." ".$unserial['last_name']; ?> (<?php echo $unserial['tr_number']; ?>)</h4>
																						</div>
																						<div class="modal-body">
																						<label style="white-space: break-spaces;"><?php echo $unserial['remarks']; ?></label>
																						</div>
																						<div class="modal-footer">
																						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
																						</div>
																					</div>
																				
																				</div>
																			</div>
																		</td>
																	</tr>
															<?php
																		$sno++;
																	endif;

																endforeach;
															
															?>
														</tbody>
													</table>
												</div>
												
											</section>
											<section id="section-linebox-15">
												
												<div class="col-sm-12 m-t-5">
													<div class="dt-buttons select_assign_btn"> 
														<button class="dt-button select_all" id="table46" tabindex="0" aria-controls="example_assign2" type="button">
															<span>Select all</span>
														</button> 
														<button class="dt-button deselect_all" id="table47" tabindex="0" aria-controls="example_assign2" type="button">
															<span>Select none</span>
														</button> 
													</div>
													<table id="state_tripura" data-countAttr="table15" class="display" style="width:100%">
														<thead>
															<tr>
																<th>S.No.</th>
																<th>TR Number</th>
																<th>Student name</th>
																<th>Status</th>
																<th>Account Number</th>
																<th>Mobile Number</th>
																<th>Caste</th>
																<th>College Name</th>
																<th>Course Name</th>
																<th>Agent Name</th>
																<th>Remarks</th>
															</tr>
														</thead>
														
														<tbody>
														<?php
															$sno=1;
															foreach($students as $students_tripura):
																$unserial=$students_tripura;
																if($students_tripura['is_assigned']=="" && $unserial['state']=="Tripura"):

																	
																	$chekVal = 'pendingStudents';
																	if( isset($studentStatus[$students_tripura['student_id']]['Status']) && strpos($studentStatus[$students_tripura['student_id']]['Status'], 'Reject') !== false){
																		$chekVal = 'rejectStudent';
																	} 

																	if( isset($studentStatus[$students_tripura['student_id']]['Status']) && strpos($studentStatus[$students_tripura['student_id']]['Status'], 'Approved') !== false){
																		$chekVal = 'approveStudents';
																	} 

																	if( isset($studentStatus[$students_tripura['student_id']]['Status']) && strpos($studentStatus[$students_tripura['student_id']]['Status'], 'Defect') !== false){
																		$chekVal = 'defectStudents';
																	}
															?>
																<tr data-attr="<?php echo $students_tripura['student_id']; ?>" data-class="<?=$chekVal;?>">
																	
																	<td data-class="<?=$chekVal;?>"><?php echo $sno; ?></td>
																	<td><?php echo $unserial['tr_number']; ?></td>
																	<td><?php echo $unserial['first_name']." ".$unserial['last_name']; ?></td>
																	<?php 
																			if( isset($studentStatus[$students_tripura['student_id']]['Status'])){
																				$selStatus = $studentStatus[$students_tripura['student_id']]['Status'];
																			}else {
																				$selStatus = "Pending From Our Site";
																			}
																	?>
																	<td><?php echo $selStatus; ?></td>
																	<td><?php echo $unserial['account_number']; ?></td>
																	<td><?php echo $unserial['mobile'] ?></td>
																	<td><?php echo $unserial['caste_details']; ?></td>
																	<td><?php echo $unserial['education_details'] ?></td>
																	<td><?php echo $unserial['course_details'] ?></td>
																	<td><?php echo $unserial['agent_name'] ?></td>
																	<td class="remarksSection">
																		<p><?php echo $unserial['remarks'] ?></p>
																		<div id="remarkModal" class="modal fade" id="myModal" role="dialog">
																			<div class="modal-dialog modal-xl">
																			
																				<!-- Modal content-->
																				<div class="modal-content">
																					<div class="modal-header">
																					<button type="button" class="close" data-dismiss="modal">&times;</button>
																					<h2 class="modal-title">Remark</h2>
																					<h4> <?php echo $unserial['first_name']." ".$unserial['last_name']; ?> (<?php echo $unserial['tr_number']; ?>)</h4>
																					</div>
																					<div class="modal-body">
																					<label style="white-space: break-spaces;"><?php echo $unserial['remarks']; ?></label>
																					</div>
																					<div class="modal-footer">
																					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
																					</div>
																				</div>
																			
																			</div>
																		</div>
																	</td>
																</tr>
															<?php
																		$sno++;
																	endif;

																endforeach;
															
															?>
														</tbody>
													</table>
												</div>

											</section>
										</div>
										<!-- /content -->
									</div>
									<!-- /tabs -->
								</section>
								
							</div>
						</div>
					</div>
				</div>
  </div>
</div>
</ul>

<div class="row task_assign_row emp_name_sel" data-attr="<?php echo $user->id; ?>">
	<div class="col-sm-12">
		 <div class="white-box">
		 	<div class="row m-b-5">

			 	

			
		

			


			

				<div class="separator"></div>

				<button class="btn btn-info edit_btn btn-block btn-rounded btn-lg m-t-5 btn-assign"  data-toggle="modal" data-target="#remarkModalAssign">
					<i class="fa fa-edit"></i>&nbsp;&nbsp;Assign
				</button>

				<div class="modal fade" id="remarkModalAssign" tabindex="-1" role="dialog" aria-labelledby="remarkModalAssignlLabel" aria-hidden="true">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <label class="modal-title" id="exampleModalLabel">Task Remarks</label>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body text-center">
				        <textarea  id="task_remarks"></textarea> 
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				        <button type="button" class="btn btn-primary" id="save_assigned_task">Save changes</button>
				      </div>
				    </div>
				  </div>
				</div>

			</div>
		</div>
	</div>
</div>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="
https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

<script type="text/javascript" src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>

<script type="text/javascript">
	$(document).ready(function() {
		var myObj = {};
		// var table1 = $('table.display').DataTable();
		var table1 = $('#pen_site').DataTable({"pageLength": 50,lengthMenu: [[ 10, 25, 50, 100 ,200, 500, -1 ],[ '10 rows', '25 rows', '50 rows', '100 rows', '200 rows','500 rows', 'Show all' ]]});
		var table2 = $('#sub_site').DataTable({"pageLength": 50,lengthMenu: [[ 10, 25, 50, 100 ,200, 500, -1 ],[ '10 rows', '25 rows', '50 rows', '100 rows', '200 rows','500 rows', 'Show all' ]]});
		var table3 = $('#pen_col').DataTable({"pageLength": 50,lengthMenu: [[ 10, 25, 50, 100 ,200, 500, -1 ],[ '10 rows', '25 rows', '50 rows', '100 rows', '200 rows','500 rows', 'Show all' ]]});
		var table4 = $('#def_col').DataTable({"pageLength": 50,lengthMenu: [[ 10, 25, 50, 100 ,200, 500, -1 ],[ '10 rows', '25 rows', '50 rows', '100 rows', '200 rows','500 rows', 'Show all' ]]});
		var table5 = $('#rej_col').DataTable({"pageLength": 50,lengthMenu: [[ 10, 25, 50, 100 ,200, 500, -1 ],[ '10 rows', '25 rows', '50 rows', '100 rows', '200 rows','500 rows', 'Show all' ]]});
		var table6 = $('#sub_col').DataTable({"pageLength": 50,lengthMenu: [[ 10, 25, 50, 100 ,200, 500, -1 ],[ '10 rows', '25 rows', '50 rows', '100 rows', '200 rows','500 rows', 'Show all' ]]});
		var table7 = $('#pen_nsp').DataTable({"pageLength": 50,lengthMenu: [[ 10, 25, 50, 100 ,200, 500, -1 ],[ '10 rows', '25 rows', '50 rows', '100 rows', '200 rows','500 rows', 'Show all' ]]});
		var table8 = $('#def_nsp').DataTable({"pageLength": 50,lengthMenu: [[ 10, 25, 50, 100 ,200, 500, -1 ],[ '10 rows', '25 rows', '50 rows', '100 rows', '200 rows','500 rows', 'Show all' ]]});
		var table9 = $('#rej_nsp').DataTable({"pageLength": 50,lengthMenu: [[ 10, 25, 50, 100 ,200, 500, -1 ],[ '10 rows', '25 rows', '50 rows', '100 rows', '200 rows','500 rows', 'Show all' ]]});
		var table10 = $('#sub_nsp').DataTable({"pageLength": 50,lengthMenu: [[ 10, 25, 50, 100 ,200, 500, -1 ],[ '10 rows', '25 rows', '50 rows', '100 rows', '200 rows','500 rows', 'Show all' ]]});
		var table11 = $('#caste_SC').DataTable({"pageLength": 50,lengthMenu: [[ 10, 25, 50, 100 ,200, 500, -1 ],[ '10 rows', '25 rows', '50 rows', '100 rows', '200 rows','500 rows', 'Show all' ]]});
		var table12 = $('#caste_ST').DataTable({"pageLength": 50,lengthMenu: [[ 10, 25, 50, 100 ,200, 500, -1 ],[ '10 rows', '25 rows', '50 rows', '100 rows', '200 rows','500 rows', 'Show all' ]]});
		var table13 = $('#caste_OBC').DataTable({"pageLength": 50,lengthMenu: [[ 10, 25, 50, 100 ,200, 500, -1 ],[ '10 rows', '25 rows', '50 rows', '100 rows', '200 rows','500 rows', 'Show all' ]]});
		var table14 = $('#state_assam').DataTable({"pageLength": 50,lengthMenu: [[ 10, 25, 50, 100 ,200, 500, -1 ],[ '10 rows', '25 rows', '50 rows', '100 rows', '200 rows','500 rows', 'Show all' ]]});
		var table15 = $('#state_tripura').DataTable({"pageLength": 50,lengthMenu: [[ 10, 25, 50, 100 ,200, 500, -1 ],[ '10 rows', '25 rows', '50 rows', '100 rows', '200 rows','500 rows', 'Show all' ]]});
		var path;

		var table_array={table1, table2, table3, table4, table5, table6, table7, table8, table9, table10, table11, table12, table13, table14, table15};
      $.each(table_array, function (i, value) {
           myObj[i] = value;
      });  
   // console.log("===========================================================");
   //    console.log(myObj);
   // console.log("===========================================================");





		$(".select_assign_btn .dt-button").on('click', function (){
			
			path=$(this).parents('.content-current').find('table.display tbody');
			var click_btn=$(this).attr("id");
			console.log(click_btn);
			console.log("----------------");
			if(click_btn == 'table10'){
				var select1=table1.rows({ page: 'current' }).nodes().to$().addClass('selected');
			}else if(click_btn == 'table11'){
				var deselect1=table1.rows({ page: 'current' }).nodes().to$().removeClass('selected');
			}else if(click_btn == 'table12'){
				var select2=table2.rows({ page: 'current' }).nodes().to$().addClass('selected');
			}else if(click_btn == 'table13'){
				var deselect2=table2.rows({ page: 'current' }).nodes().to$().removeClass('selected');
			}else if(click_btn == 'table20'){
				var select3=table3.rows({ page: 'current' }).nodes().to$().addClass('selected');
			}else if(click_btn == 'table21'){
				var deselect3=table3.rows({ page: 'current' }).nodes().to$().removeClass('selected');
			}else if(click_btn == 'table22'){
				var select4=table4.rows({ page: 'current' }).nodes().to$().addClass('selected');
			}else if(click_btn == 'table23'){
				var deselect4=table4.rows({ page: 'current' }).nodes().to$().removeClass('selected');
			}else if(click_btn == 'table24'){
				var select5=table5.rows({ page: 'current' }).nodes().to$().addClass('selected');
			}else if(click_btn == 'table25'){
				var deselect5=table5.rows({ page: 'current' }).nodes().to$().removeClass('selected');
			}else if(click_btn == 'table26'){
				var select6=table6.rows({ page: 'current' }).nodes().to$().addClass('selected');
			}else if(click_btn == 'table27'){
				var deselect6=table6.rows({ page: 'current' }).nodes().to$().removeClass('selected');
			}else if(click_btn == 'table30'){
				var select7=table7.rows({ page: 'current' }).nodes().to$().addClass('selected');
			}else if(click_btn == 'table31'){
				var deselect7=table7.rows({ page: 'current' }).nodes().to$().removeClass('selected');
			}else if(click_btn == 'table32'){
				var select8=table8.rows({ page: 'current' }).nodes().to$().addClass('selected');
			}else if(click_btn == 'table33'){
				var deselect8=table8.rows({ page: 'current' }).nodes().to$().removeClass('selected');
			}else if(click_btn == 'table34'){
				var select9=table9.rows({ page: 'current' }).nodes().to$().addClass('selected');
			}else if(click_btn == 'table35'){
				var deselect9=table9.rows({ page: 'current' }).nodes().to$().removeClass('selected');
			}else if(click_btn == 'table36'){
				var select10=table10.rows({ page: 'current' }).nodes().to$().addClass('selected');
			}else if(click_btn == 'table37'){
				var deselect10=table10.rows({ page: 'current' }).nodes().to$().removeClass('selected');
			}else if(click_btn == 'table38'){
				var select11=table11.rows({ page: 'current' }).nodes().to$().addClass('selected');
			}else if(click_btn == 'table39'){
				var deselect11=table11.rows({ page: 'current' }).nodes().to$().removeClass('selected');
			}else if(click_btn == 'table40'){
				var select12=table12.rows({ page: 'current' }).nodes().to$().addClass('selected');
			}else if(click_btn == 'table41'){
				var deselect12=table12.rows({ page: 'current' }).nodes().to$().removeClass('selected');
			}else if(click_btn == 'table42'){
				var select13=table13.rows({ page: 'current' }).nodes().to$().addClass('selected');
			}else if(click_btn == 'table43'){
				var deselect13=table13.rows({ page: 'current' }).nodes().to$().removeClass('selected');
			}else if(click_btn == 'table44'){
				var select14=table14.rows({ page: 'current' }).nodes().to$().addClass('selected');
			}else if(click_btn == 'table45'){
				var deselect14=table14.rows({ page: 'current' }).nodes().to$().removeClass('selected');
			}else if(click_btn == 'table46'){
				var select15=table15.rows({ page: 'current' }).nodes().to$().addClass('selected');
			}else if(click_btn == 'table47'){
				var deselect15=table15.rows({ page: 'current' }).nodes().to$().removeClass('selected');
			}
		})

		$('table.display tbody, .select_assign_btn').on( 'click', 'tr, .dt-button', function () {
			var sumRows = 0;
	        // $(this).toggleClass('selected');
			// console.log($(this));
			if($(this).attr("role")=='row'){
				 $(this).toggleClass('selected');
				// $(this).parents('.content-wrap').find('tbody tr').toggleClass('selected');

			}
			//	var selected_num=$(this).parents('.content-wrap').find('tbody').find('.selected').length;
			var total_num=$(this).parents('.content-wrap').find('.selected').length;


			var rowCounter = $(this).parents('.content-wrap').find('.content-current').find('table').data('countattr');

			// console.log(rowCounter);

			console.log( 'Rows '+myObj[rowCounter].rows( '.selected' ).count()+' are selected' );
		
			var selected_num=myObj[rowCounter].rows( '.selected' ).count();

			$(this).parents('.content-wrap').find('table').each(function(){ 
				// console.log($(this).data('countattr')); 
				sumRows += myObj[$(this).data('countattr')].rows( '.selected' ).count();

				});
				total_num = sumRows;
			console.log(total_num);



			// var selected_num= $(this).parents('tbody').find('.selected').length;
			// var total_num=$(this).parents('.content-wrap').find('.selected').length;

			// console.log(total_num+" selected num");
	        if(selected_num==1){
                $(this).parents('.content-wrap').find('.dataTables_wrapper .show_selected').remove();
				$(this).parents('.content-wrap').find('.dataTables_wrapper .row:first-child .col-sm-6:first-child').append("<p class='show_selected text-right'>"+selected_num+" student selected");
				// $(this).parents('.dataTables_wrapper').find('.show_selected').remove();
				// $(this).parents('.dataTables_wrapper').find('.row:first-child .col-sm-6:first-child').append("<p class='show_selected text-right'>"+selected_num+" student selected");
	        
			}else if(selected_num > 0){
				$(this).parents('.content-wrap').find('.dataTables_wrapper .show_selected').remove();
				$(this).parents('.content-wrap').find('.dataTables_wrapper .row:first-child .col-sm-6:first-child').append("<p class='show_selected text-right'>"+selected_num+" student selected");
				// $(this).parents('.dataTables_wrapper').find('.show_selected').remove();
				// $(this).parents('.dataTables_wrapper').find('.row:first-child .col-sm-6:first-child').append("<p class='show_selected text-right'>"+selected_num+" student selected");
	        
			
			}else{
				$(this).parents('.content-wrap').find('.dataTables_wrapper .show_selected').remove();
				// $(this).parents('.dataTables_wrapper').find('.show_selected').remove();
			
			}

			if(total_num==1){
				$(this).parents('.panel_style').find('.panel-heading .pull-right .show_total').remove();
				$(this).parents('.panel_style').find('.panel-heading .pull-right').prepend("<span class='show_total text-left'> Total Selected: "+total_num+" student</span>");
	        
			}else if(total_num > 1){
				$(this).parents('.panel_style').find('.panel-heading .pull-right .show_total').remove();
				$(this).parents('.panel_style').find('.panel-heading .pull-right').prepend("<span class='show_total text-left'> Total Selected: "+total_num+" students</span>");
			
			}else{
				$(this).parents('.panel_style').find('.panel-heading .pull-right .show_total').remove();
			
			}

			
	        
	         // console.log(  +' row(s) selected' );
	    } );

		$('.panel-heading').click(function(){
			$(this).parents('.col-lg-12').siblings().find('.panel-wrapper').attr("aria-expanded","false");
				$(this).parents('.col-lg-12').siblings().find('.panel-wrapper').removeClass("in");
		});

		$('#save_assigned_task').click(function(){

			var table = $('table.display').DataTable();
 
			var temp1= table.rows( '.selected', { selected: true } ).nodes();
			var count_sel=0;
			

				var selected_val = [];
				var emp_id = $('.emp_name_sel').data("attr");
				var sel_task_remark=$('#task_remarks').val();

				$.each( temp1, function(key){
					// console.log(temp1[count].attributes[0].nodeValue);
					selected_val.push(temp1[count_sel].attributes[0].nodeValue);
					count_sel++;

				})

		    // $( ".task_assign_row .selected" ).each(function( index ) {
				

    	  	// $( ".select_student ul li.ms-selected" ).each(function( index ) {
		    	
		        // if(!$(this).is(':visible'))
	         //    {
	                // selected_val.push($(this).data("attr"));
	            // }
	           
		    // });
		      	console.log(selected_val);
				// exit();
		       // 	console.log(emp_id);
		       	// console.log(sel_task_remark + " s");
		    
		    $.ajax({
			   type: "POST",
			   data: {
                    selected_val:selected_val,
                    emp_id:emp_id,
                    sel_task_remark:sel_task_remark,
                    '<?php echo $this->security->get_csrf_token_name(); ?>': '<?=$this->security->get_csrf_hash();?>'
                },
			 
			   url: '<?=site_url("admin/user/save_selected_stud")?>',
			   success: function(msg){
			   		console.log(msg);
			    	if(msg==1){
			    		window.location.href="<?php echo base_url('admin/user/employee_task') ?>";
			    	}else{
			    		alert("Task Assigned Unsuccessfull");
			    	}
			   }
			});
		        
			$(document).on('click', '.remarksSection p' , function() {
				$(this).parent().find('#remarkModal').modal('show');
			});
		//      console.log($('.select_student ul li.ms-selected').find('span').data("attr"));
		})
	} );
</script>
