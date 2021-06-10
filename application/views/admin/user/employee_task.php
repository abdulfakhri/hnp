<?php
error_reporting(0);

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

	table.dataTable tbody tr.selected {
		background-color: #B0BED9 !important;
	}

	.white-box.btnSection {
		padding: 10px;
	}

	#billdesc {
		padding-top: 50px;
	}

	#test {
		width: 100%;
		height: 30px;
	}

	option {
		height: 30px;
		line-height: 30px;
	}

	.editOption {
		width: 90%;
		height: 24px;
		position: relative;
		top: -30px
	}

	#remarkModal {
		background: #0000009c;
	}

	#remarkModal .modal-content {
		border: 3px solid #000;
		/*background-color: antiquewhite;s*/
	}

	.modal-open .modal {
		padding-top: 0px;
	}

	.modal {
		overflow-y: auto !important;
	}

	.dt-buttons.select_assign_btn {
		margin-bottom: 50px;
		margin-top: 25px;
	}

	.dt-buttons.select_assign_btn .dt-button {
		font-size: 15px;
		font-weight: 400;
	}
</style>
<div class="row">
	<div class="col-sm-12">
		<div class="white-box">
			<h3 class="box-title m-b-0">Employee Tasks</h3>
			<!-- <p class="text-muted m-b-30">Export data to Copy, CSV, Excel, PDF & Print</p> -->
			<div class="table-responsive">
				<table id="example23" class="display nowrap" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>Employee Name</th>
							<th>Mobile No</th>
							<th>Assigned Tasks</th>
							<th>Completed Tasks</th>
							<th>Pending Tasks</th>

							<th>Action</th>
						</tr>
					</thead>

					<tbody>
						<?php
						$count = 0;
						foreach ($users as $emp) :
							if ($emp['role'] == 'user' && $emp['is_deleted'] != 1) :
								//$pic_val= explode(",",$emp['profile_pic']); 
								$pic_val = $emp['profile_pic'];
						?>
								<tr>

									<td>
										<a class='image-popup-no-margins' href='<?php echo $pic_val; ?>' title='Profile Picture'>
											<img style="width:50px; height:50px; border-radius:50%;" src='<?php echo $pic_val; ?>'>
										</a>

										<a href="<?php echo base_url('admin/user/assign_task/' . $emp['id']); ?>">
											<?php echo "&nbsp; " . $emp['first_name'] . " " . $emp['last_name']; ?>
										</a>
									</td>
									<td><?php echo $emp['mobile']; ?></td>
									<td class="student_task_stat">

										<!-- task completed modal -->

										<div id="task_complete" style="padding-right: 0px !important;" class="modal fade task_complete" aria-hidden="true" role="dialog">
											<div class="modal-dialog modal-dialog-centered" style="max-width: 95%;">
												<!-- Modal content-->
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close closeMainModal" data-dismiss="modal">&times;</button>
														<h4 class="modal-title" style="text-align-last: center">Tasks Completed</h4>
													</div>
													<div class="modal-body">
														<div class="panel-body table-responsive">
															<table id="pending_by_college_student" class="display nowrap" cellspacing="0" width="100%">
																<thead>
																	<tr>
																		<th>S.No</th>
																		<th>TR Number</th>
																		<th>Name</th>
																		<th>Mobile</th>
																		<th>Course</th>
																		<th>Agent Name</th>
																		<th>Remarks</th>
																		<th>Status</th>
																	</tr>
																</thead>

																<tbody>

																	<?php
																	$count = 0;
																	foreach ($assigned_task as $assigned_data) :
																		if ($emp['id'] == $assigned_data['emp_id'] && $assigned_data['task_status'] == 1) :
																			$count++;
																			foreach ($students as $stud_data) :
																				if ($assigned_data['stu_id'] == $stud_data['student_id'] && $stud_data['is_deleted'] != 1) :

																					$stud_unserialize = $stud_data;
																					// $assigned_data['stud_name'] = $stud_unserialize['first_name']." ".$stud_unserialize['last_name'];

																	?>
																					<tr>
																						<td><?php echo $count; ?></td>
																						<td><?php echo $stud_unserialize['tr_number']; ?></td>
																						<td><?php echo $stud_unserialize['first_name'] . " " . $stud_unserialize['last_name']; ?></td>
																						<td><?php echo $stud_unserialize['mobile']; ?></td>
																						<td><?php echo $stud_unserialize['course_details']; ?></td>
																						<td><?php echo $stud_unserialize['agent_name']; ?></td>
																						<td class="remarksSection">
																							<?php
																							$statusRemarkSection = unserialize($studentStatus[$stud_data['student_id']]['formData']);
																							if ($statusRemarkSection['formData']['status_reason']) {
																								$remarksContent = $statusRemarkSection['formData']['status_reason'];
																							} else {
																								$remarksContent = trim($stud_unserialize['remarks']);
																							}

																							?>
																							<p style="max-width: 100px; text-overflow: ellipsis; overflow: hidden; margin-bottom: 0px"><?php echo $remarksContent ?></p>
																							<div id="remarkModal" class="modal fade" id="myModal" role="dialog" style="max-height: 100%; ">
																								<div class="modal-dialog modal-xl">

																									<!-- Modal content-->
																									<div class="modal-content">
																										<div class="modal-header">
																											<button type="button" class="close closeRemarkModal">&times;</button>
																											<h2 class="modal-title">Remark</h2>
																											<h4> <?php echo $stud_unserialize['first_name'] . " " . $stud_unserialize['last_name']; ?> (<?php echo $stud_unserialize['tr_number']; ?>)</h4>
																										</div>
																										<div class="modal-body">
																											<label style="white-space: break-spaces;"><?php echo $remarksContent; ?></label>
																										</div>
																										<div class="modal-footer">
																											<button type="button" class="btn btn-default closeRemarkModal">Close</button>
																										</div>
																									</div>

																								</div>
																						</td>
																						<td><?php echo isset($studentStatus[$stud_data['student_id']]['Status']) ? $studentStatus[$stud_data['student_id']]['Status'] : "Pending From Our Site" ?>
																					</tr>
																	<?php
																				endif;
																			endforeach;
																		endif;
																	endforeach;
																	?>
																</tbody>
															</table>
														</div>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-default closeMainModal" data-dismiss="modal">Close</button>
													</div>
												</div>
											</div>
										</div>

										<p><?php echo $count;
											?></p>
									</td>
									<td class="student_task_stat">

										<!-- task completed modal -->

										<div id="task_complete" style="padding-right: 0px !important;" class="modal fade task_complete" aria-hidden="true" role="dialog">
											<div class="modal-dialog modal-dialog-centered" style="max-width: 95%; max-height: 90%;">
												<!-- Modal content-->
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close closeMainModal" data-dismiss="modal">&times;</button>
														<h4 class="modal-title" style="text-align-last: center">Tasks Left</h4>
													</div>
													<div class="modal-body">
														<div class="panel-body table-responsive">
															<table id="pending_by_college_student" class="display nowrap" cellspacing="0" width="100%">
																<thead>
																	<tr>
																		<th>S.No</th>
																		<th>TR Number</th>
																		<th>Name</th>
																		<th>Mobile</th>
																		<th>Course</th>
																		<th>Agent Name</th>
																		<th>Remarks</th>
																		<th>Status</th>
																	</tr>
																</thead>

																<tbody>

																	<?php
																	$count = 0;
																	foreach ($assigned_task as $assigned_data) :
																		if ($emp['id'] == $assigned_data['emp_id'] && $assigned_data['task_status'] == 0) :

																			$count++;
																			foreach ($students as $stud_data) :
																				if ($assigned_data['stu_id'] == $stud_data['student_id'] && $stud_data['is_deleted'] != 1) :

																					$stud_unserialize = $stud_data;
																					// $assigned_data['stud_name'] = $stud_unserialize['first_name']." ".$stud_unserialize['last_name'];

																	?>
																					<tr>
																						<td><?php echo $count; ?></td>
																						<td><?php echo $stud_unserialize['tr_number']; ?></td>
																						<td><?php echo $stud_unserialize['first_name'] . " " . $stud_unserialize['last_name']; ?></td>
																						<td><?php echo $stud_unserialize['mobile']; ?></td>
																						<td><?php echo $stud_unserialize['course_details']; ?></td>
																						<td><?php echo $stud_unserialize['agent_name']; ?></td>
																						<td class="remarksSection">
																							<?php
																							$statusRemarkSection = unserialize($studentStatus[$stud_data['student_id']]['formData']);
																							if ($statusRemarkSection['formData']['status_reason']) {
																								$remarksContent = $statusRemarkSection['formData']['status_reason'];
																							} else {
																								$remarksContent = trim($stud_unserialize['remarks']);
																							}

																							?>
																							<p style="max-width: 100px; text-overflow: ellipsis; overflow: hidden; margin-bottom: 0px"><?php echo $remarksContent ?></p>
																							<div id="remarkModal" class="modal fade" id="myModal" role="dialog" style="max-height: 100%; ">
																								<div class="modal-dialog modal-xl">

																									<!-- Modal content-->
																									<div class="modal-content">
																										<div class="modal-header">
																											<button type="button" class="close closeRemarkModal">&times;</button>
																											<h2 class="modal-title">Remark</h2>
																											<h4> <?php echo $stud_unserialize['first_name'] . " " . $stud_unserialize['last_name']; ?> (<?php echo $stud_unserialize['tr_number']; ?>)</h4>
																										</div>
																										<div class="modal-body">
																											<label style="white-space: break-spaces;"><?php echo $remarksContent; ?></label>
																										</div>
																										<div class="modal-footer">
																											<button type="button" class="btn btn-default closeRemarkModal">Close</button>
																										</div>
																									</div>

																								</div>
																						<td><?php echo isset($studentStatus[$stud_data['student_id']]['Status']) ? $studentStatus[$stud_data['student_id']]['Status'] : "Pending From Our Site" ?>
																					</tr>
																	<?php
																				endif;
																			endforeach;
																		endif;
																	endforeach;
																	?>
																</tbody>
															</table>
														</div>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-default closeMainModal" data-dismiss="modal">Close</button>
													</div>
												</div>
											</div>
										</div>

										<p><?php echo $count;
											?></p>

									</td>
									<td class="student_task_stat">

										<!-- task completed modal -->

										<div id="task_complete" style="padding-right: 17px;" class="modal fade task_complete" aria-hidden="true" role="dialog">
											<div class="modal-dialog modal-dialog-centered" style="max-width: 95%;">
												<!-- Modal content-->
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close closeMainModal" data-dismiss="modal">&times;</button>
														<h4 class="modal-title" style="text-align-last: center">Total Tasks Assigned</h4>
													</div>
													<div class="modal-body">
														<div class="panel-body table-responsive">
															<table id="pending_by_college_student" class="display nowrap" cellspacing="0" width="100%">
																<thead>
																	<tr>
																		<th>S.No</th>
																		<th>TR Number</th>
																		<th>Name</th>
																		<th>Mobile</th>
																		<th>Course</th>
																		<th>Agent Name</th>
																		<th>Remarks</th>
																		<th>Status</th>
																	</tr>
																</thead>

																<tbody>

																	<?php
																	$count = 0;
																	foreach ($assigned_task as $assigned_data) :
																		if ($emp['id'] == $assigned_data['emp_id']) :
																			$count++;
																			foreach ($students as $stud_data) :
																				if ($assigned_data['stu_id'] == $stud_data['student_id'] && $stud_data['is_deleted'] != 1) :

																					$stud_unserialize = $stud_data;
																					// $assigned_data['stud_name'] = $stud_unserialize['first_name']." ".$stud_unserialize['last_name'];

																	?>
																					<tr>
																						<td><?php echo $count; ?></td>
																						<td><?php echo $stud_unserialize['tr_number']; ?></td>
																						<td><?php echo $stud_unserialize['first_name'] . " " . $stud_unserialize['last_name']; ?></td>
																						<td><?php echo $stud_unserialize['mobile']; ?></td>
																						<td><?php echo $stud_unserialize['course_details']; ?></td>
																						<td><?php echo $stud_unserialize['agent_name']; ?></td>
																						<td class="remarksSection">
																							<?php
																							$statusRemarkSection = unserialize($studentStatus[$stud_data['student_id']]['formData']);
																							if ($statusRemarkSection['formData']['status_reason']) {
																								$remarksContent = $statusRemarkSection['formData']['status_reason'];
																							} else {
																								$remarksContent = trim($stud_unserialize['remarks']);
																							}

																							?>
																							<p style="max-width: 100px; text-overflow: ellipsis; overflow: hidden; margin-bottom: 0px"><?php echo $remarksContent ?></p>
																							<div id="remarkModal" class="modal fade" id="myModal" role="dialog" style="max-height: 100%; ">
																								<div class="modal-dialog modal-xl">

																									<!-- Modal content-->
																									<div class="modal-content">
																										<div class="modal-header">
																											<button type="button" class="close closeRemarkModal">&times;</button>
																											<h2 class="modal-title">Remark</h2>
																											<h4> <?php echo $stud_unserialize['first_name'] . " " . $stud_unserialize['last_name']; ?> (<?php echo $stud_unserialize['tr_number']; ?>)</h4>
																										</div>
																										<div class="modal-body">
																											<label style="white-space: break-spaces;"><?php echo $remarksContent; ?></label>
																										</div>
																										<div class="modal-footer">
																											<button type="button" class="btn btn-default closeRemarkModal">Close</button>
																										</div>
																									</div>

																								</div>
																						<td><?php echo isset($studentStatus[$stud_data['student_id']]['Status']) ? $studentStatus[$stud_data['student_id']]['Status'] : "Pending From Our Site" ?>
																					</tr>
																	<?php
																				endif;
																			endforeach;
																		endif;
																	endforeach;
																	?>
																</tbody>
															</table>
														</div>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-default closeMainModal" data-dismiss="modal">Close</button>
													</div>
												</div>
											</div>
										</div>

										<p><?php echo $count;
											?></p>
									</td>
									<td style="text-align: center;">
										<!-- <a href="<?php echo base_url('admin/user/assign_task/' . $emp['id']) ?>"  data-toggle="tooltip" data-original-title="View">
                                	<button type="button" class="btn  btn-circle btn-xs"><i class="fa fa-eye"></i></button>
                                </a> -->

										<a href="<?php echo base_url('admin/user/assign_task/' . $emp['id']) ?>" data-toggle="tooltip" data-original-title="Edit">
											<button type="button" class="btn btn-info btn-circle btn-xs"><i class="fa fa-edit"></i></button>
										</a>
									

									</td>
								</tr>
						<?php
							endif;
						endforeach;
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<div class="row stu_assign_list">
	<div class="col-sm-12">
		<div class="white-box">
			<div class="col-sm-4">
				<div class="white-box btnSection">
					<button class="btn-block fcbtn btn btn-rounded btn-danger btn-lg" id="remove_selected_task_btn" onclick="return confirm('Are you sure, you want to delete all these tasks?');"> <i class="fa fa-cross"></i>Remove Selected Task</button>
				</div>
			</div>
			<?php $msg = $this->session->flashdata('msg'); ?>
			<?php if (isset($msg)) : ?>
				<div class="alert alert-success delete_msg pull" style="width: 100%"> <i class="fa fa-check-circle"></i> <?php echo $msg; ?> &nbsp;
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
				</div>
			<?php endif ?>
			<h3 class="box-title m-b-0">Students List</h3>
			<div class="table-responsive">
				<div class="dt-buttons select_assign_btn">
					<button class="dt-button select_all" id="removeTaskSelectall" type="button">
						<span>Select all</span>
					</button>
					<button class="dt-button deselect_all" id="removeTaskDeselectall" type="button">
						<span>Select none</span>
					</button>
				</div>
				<table id="myTableReplace" class="table table-striped">
					<thead>
						<tr>
							<!-- <th></th> -->
							<th> Student Name </th>
							<th> Student Email </th>
							<th> Assigned To </th>
							<th> Assigned At </th>
							<th> Task Remarks </th>
							<th> Task Completed </th>
							<th> Action </th>
						</tr>
					</thead>

					<tbody>
						<?php
						foreach ($assigned_task as $assigned_data) :

							foreach ($students as $stud_data) :
								if ($assigned_data['stu_id'] == $stud_data['student_id'] && $stud_data['is_deleted'] != 1) :

									$stud_unserialize = $stud_data;
								// $assigned_data['stud_name'] = $stud_unserialize['first_name']." ".$stud_unserialize['last_name'];
								endif;
							endforeach;
							foreach ($users as $user_data) :
								if ($assigned_data['emp_id'] == $user_data['id']) :

									$assigned_data['emp_name'] = $user_data['first_name'] . " " . $user_data['last_name'];
								endif;
							endforeach;

						?>
							<tr data-attr="<?php echo $assigned_data['stu_id']; ?>">
								<td><?php echo $stud_unserialize['first_name'] . " " . $stud_unserialize['last_name']; ?></td>
								<td><?php echo $stud_unserialize['email']; ?></td>
								<td>
									<?php echo $assigned_data['emp_name']; ?>
								</td>
								<td>
									<?php
									echo $assigned_data['assigned_at'];
									?>
								</td>
								<td>
									<?php echo $assigned_data['task_remarks']; ?>
								</td>
								<td>
									<?php
									if ($assigned_data['task_status'] == 0) {

										echo "No";
									} else {
										echo "Yes";
									}
									?>
								</td>
								<td style="text-align: center;">
									<a href="<?php echo base_url('admin/user/delete_task/' . $assigned_data['stu_id']) ?>" data-toggle="tooltip" data-original-title="Delete">
										<button type="button" class="btn btn-danger btn-circle btn-xs"><i class="fa fa-times"></i></button>
									</a>
								</td>
							</tr>


						<?php

						endforeach;
						?>
					</tbody>
				</table>
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
		$("#agent_option").on('click', function() {
			// console.log("click");
			$(this).parent().find(".search_add").css("display", "block");
			// console.log("click 2");

		});
		$(".search_add").change(function() {
			var option_val = $(this).val();
			$(this).siblings("#agent_option").append("<option value='" + option_val + "'>" + option_val + "</option>");
			$(this).val("");
		});

		var initialText = $('.editable').val();
		$('.editOption').val(initialText);

		$('#test').change(function() {
			var selected = $('option:selected', this).attr('class');
			var optionText = $('.editable').text();

			if (selected == "editable") {
				$('.editOption').show();


				$('.editOption').keyup(function() {
					var editText = $('.editOption').val();
					$('.editable').val(editText);
					$('.editable').html(editText);
				});

			} else {
				$('.editOption').hide();
			}
		});

		// $('a.asigned_show').click(function(){

		// 	var type=$(this).data( "option" );
		// 	var empl_id=$(this).data( "attr" );
		// 	console.log(type+" "+empl_id);

		// })
		$('#task_complete table.display').DataTable({
			responsive: true,
		});
		var commonDatable = $('#myTableReplace').DataTable({
			"pageLength": 50,
			lengthMenu: [
				[10, 25, 50, 100, 200, 500, -1],
				['10 rows', '25 rows', '50 rows', '100 rows', '200 rows', '500 rows', 'Show all']
			]
		});


		$('#myTableReplace tbody').on('click', 'tr', function() {
			$(this).toggleClass('selected');
		});

		//var RemoveTask = $('.stu_assign_list #myTableReplace').DataTable({"pageLength": 50,lengthMenu: [[ 10, 25, 50, 100 ,200, 500, -1 ],[ '10 rows', '25 rows', '50 rows', '100 rows', '200 rows','500 rows', 'Show all' ]]});

		$('#removeTaskSelectall').click(function() {
			var select1 = commonDatable.rows({
				page: 'current'
			}).nodes().to$().addClass('selected');
		});

		$('#removeTaskDeselectall').click(function() {
			var select1 = commonDatable.rows({
				page: 'current'
			}).nodes().to$().removeClass('selected');
		});


		$('#remove_selected_task_btn').click(function() {

			var remove_selected_task = [];
			$("#myTableReplace .selected").each(function(index) {
				remove_selected_task.push($(this).data("attr"));
			});
			$.ajax({
				type: "POST",
				data: {
					selected_val: remove_selected_task,
					'<?php echo $this->security->get_csrf_token_name(); ?>': '<?= $this->security->get_csrf_hash(); ?>'
				},

				url: '<?= site_url("admin/user/multiple_delete_task") ?>',
				success: function(msg) {
					window.location.href = "<?php echo base_url('admin/user/employee_task') ?>";
				}
			});
		})


		$(document).on('click', '.student_task_stat p', function() {
			$(this).parent().find('.task_complete').modal('show');
			$(this).parent().find('.task_complete').addClass('show');

		});
		$(document).on('click', '.closeMainModal', function() {
			$(this).parents('div#task_complete').removeClass('show');
		})

		$(document).on('click', '.remarksSection p', function() {
			$(this).parent().find('#remarkModal').modal('show');
		});
		$(document).on('click', '.closeRemarkModal', function() {
			$(this).parents('div#remarkModal').modal('hide');
		});

	})
</script>