<?php 
// echo "<pre>";
// print_r($all_student);
// die;

// foreach ($all_users as $user) {
	// echo $user['id'];
// }

?>
 <!-- .row -->
		<div class="row">
			<div class="col-lg-12">
				<div class="white-box">
			    <h3 class="box-title">Show Modification History/Work Done</h3>
			    	<div class="row">
			        	<div class="col-lg-12 bt-switch">            
			           	 <div class="m-b-30">
			                <input id="student_emp_box" type="checkbox" data-text-label="TV" data-toggle="toggle" class="chkbox_student_emp_filter" data-toggle="toggle" checked data-on-color="primary" data-off-color="success" data-on-text="Show Employee Work History" data-size="large" data-off-text="Show Student Modfication History">
			             </div>
			            </div>
			        </div>
			    </div>
			</div>
		</div>
<!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box workhistoryBox employeeBox">
                    <h3 class="box-title m-b-0">Select Employee </h3>
                    <p class="text-muted m-b-30"> Select Employee to see the work history</p>
                    <select class="form-control select2 stu_emplBox" data-selectType = "employee">
                        <option>Select</option>                   
                            <?php foreach ($all_users as $user) { 
                            		  if($user['role']=='user' && $user['is_deleted'] != 1){
                            ?>
                            	 <option value="<?=$user['id']?>"><?=$user['first_name'].' '.$user['last_name']?></option>                            	
                            <?php } }  ?>
                    </select>
                </div>
                <div class="white-box workhistoryBox studentBox">
                    <h3 class="box-title m-b-0">Select Student </h3>
                    <p class="text-muted m-b-30"> Select Student to see the list of employee who edited </p>
                    <select class="form-control select2 stu_emplBox" data-selectType = "student">
                        <option>Select</option>                           
                            <?php foreach ($all_student as $student) { 
                            		//$uns_student = unserialize($student['student_uploaded_data']);
                            ?>
                            	 <option value="<?=$student['student_id']?>"><?=$student['first_name'].' '.$student['last_name'].' ('.$student['tr_number'].')'?></option>                            	
                            <?php } ?>
                    </select>
                </div>
            </div>
        </div>

 <div class="row all_emp_table" style="display: none;">
        <div class="col-lg-12">
           <div class="panel panel-info">               
                <div class="panel-body table-responsive">
                			<table id="studentTable" class="display nowrap" style="display: none;" cellspacing="0" width="100%">
						        <thead>
						            <tr>
						                <th>S. No</th>
						                <th>Name</th>
						                <th>TR Number</th>
						                <th>Agent Name</th>
						                <th>Date Of Birth</th>
						                <th>Updated On</th>
						            </tr>
						        </thead>
						      
						    </table>
						    <table id="employeeTable" class="display nowrap" style="display: none;" cellspacing="0" width="100%">
						        <thead>
						            <tr>
						                <th>S. No</th>
						                <th>Name</th>
						                <th>Email</th>
						                <th>Updated On</th>
						            </tr>
						        </thead>
						        <tfoot>
						            <tr>
						               <th>S. No</th>
						               <th>Name</th>
						                <th>Email</th>
						                <th>Updated On</th>
						            </tr>
						        </tfoot>
						    </table>

                    </div>
            </div>
        </div>
    </div>

 </div>

<script type="text/javascript">
	$(document).ready(function(){


		$('.workhistoryBox').hide();
		$('.bootstrap-switch-label').html("Display Work History")

		// jquery for checkbook switch 
		 $('#student_emp_box').on('switchChange.bootstrapSwitch', function (event, state) {
		     
		     $('.workhistoryBox').hide();
		     $('.all_emp_table').hide();
		     $('.workhistoryBox').unblock();
		     if(state){
		     	$('.employeeBox').show();

		     } else{
		     	$('.studentBox').show();
		     }
		   })

		$(function(){
		    $('.stu_emplBox').on('change', function() {

		    	if($(this).select2('data').id != 'Select'){

	    		 	var theID = $(this).select2('data').id;
	    			var theSelection = $(this).select2('data').text;
	    			var selectionType = $(this).attr( "data-selectType" );
			      	  $(this).parents('div.white-box').block({
				            message: '<h3>Please Wait. While we are searching records for.. </h3><strong>'+theSelection+'</strong>',
						            overlayCSS: {
						                backgroundColor: '#02bec9'
						            },
						            css: {
						                border: '3px solid #fff'
						            }
				        	});	
			      	 
			      	  	$.ajax({
			                url: "<?=site_url("admin/user/modificationHistory")?>",
			                type: "post",
			                data: {
			                        filter_id:theID,
			                        filter_type:selectionType,
			                        '<?php echo $this->security->get_csrf_token_name(); ?>': '<?=$this->security->get_csrf_hash();?>'
			                },
				               //  success:function(response){
				               //  console.log(response);
				               //   
			                // }
			                 success : function(data, textStatus, jqXHR) {
			                 	 var quotations = [];
			                 	$('.all_emp_table').show();
			                 	$('#employeeTable,#studentTable,#studentTable_wrapper,#employeeTable_wrapper').hide();
			                 	if(selectionType == 'student' ){
			                 		$('#employeeTable').show();
			                 	} else {
			                 		$('#studentTable').show();
			                 	}
			                 	var countData = 0;
			                 	$('.stu_emplBox').parents('div.white-box').unblock();
			                 // var table = $('table.display').DataTable();
			                 			// console.log(data)
			                 			// console.log(data.length)
			                 		
								        var table_data = JSON.parse(data);
								         // console.log(table_data.size);
								         $('.stu_emplBox').parents('div.white-box').unblock();
 										
 									// 	var myObject = Object.assign({}, table_data);
										// console.log(myObject);
									if(table_data['filter_type'] == 'employee') {
										for (i in table_data) {
												var tableDetails = {};
											
											if(i != 'filterCommon' && i != 'filter_type'){												
												// console.log(i);
												countData+=1;
												console.log(table_data[i]);
												tableDetails.name = table_data[i].student_id.first_name+' '+table_data[i].student_id.student_uploaded_data.last_name;
										        tableDetails.trnumber =  table_data[i].student_id.trnumber;
										        tableDetails.agent =  table_data[i].student_id.agent_name;
										        tableDetails.dob =  table_data[i].student_id.dob;
										        tableDetails.updatedby =  table_data[i].student_id.updatedAt;
										        tableDetails.count = countData;
										     
											quotations.push(tableDetails);
																					   
										}
									}
									//table code
									$('#studentTable').DataTable().destroy();
									 $('#studentTable').DataTable( {
									 	data: quotations,
									 	 "order": [[ 0, "asc" ]],
									        "columns": [
									            { "data": "count" },
									            { "data": "name" },
									            { "data": "trnumber" },									            
									            { "data": "agent" },
									            { "data": "dob" },
									            { "data": "updatedby" },
									        ]
									    } );

								} else 	if(table_data['filter_type'] == 'student') {
									for (i in table_data) {
												var tableDetails = {};
											
											if(i != 'filterCommon' && i != 'filter_type'){												
												// console.log(i);
												// name //mobile //email	//updated_at

												countData+=1;
												//console.log(table_data[i]);
												tableDetails.name = table_data[i].emp_id.first_name+' '+table_data[i].emp_id.last_name;
										      
										        // tableDetails.agent =  table_data[i].student_id.student_uploaded_data.agent_name;
										        tableDetails.email =  table_data[i].emp_id.email;
										        tableDetails.updatedby =  table_data[i].updated_at
										        tableDetails.count = countData;
										     
											quotations.push(tableDetails);
																					   
										}
									}

									//table code
									$('#employeeTable').DataTable().destroy();
									 $('#employeeTable').DataTable( {
									 	data: quotations,
									 	 "order": [[ 0, "asc" ]],
									        "columns": [
									            { "data": "count" },
									            { "data": "name" },								            
									            { "data": "email" },
									            { "data": "updatedby" },
									        ]
									    } );



								}


								
									


								}
				    });
		    	} else {
		    		alert("You can select the first options!!!");
		    	}
		    });

		});
	});
</script>