
<script> 
function myFun(){
window.location='/admin/dashboard/'; 
}
</script>   

<script type="text/javascript" language="javascript" >

function myFunction() {
  //document.getElementById("demo").innerHTML = "Hello World";
  alert("Please Wait...Processing");
}
</script>
<h2 style="color:Red;text-align:center;weight: 12px;">Students Bank Accounts Verification</h2>





<center>
<form action="" method="GET" style="text-align:center;">
   <center>
   <select name="filter_year" id="filter_year">
 
 <option select>Year</option>
 <option value="2020">2020</option>
 <option value="2021">2021</option>
 <option value="2019">2019</option>
 <option value="Pendin">Pending</option>
</select> 

 <select name="filter_state" id="filter_state"  required>
  <option value="">Select State</option>
  <option value="Tripura">Tripura</option>
  <option value="Assam">Assam</option>
 </select>

 <select name="filter_caste" id="filter_caste"  required>
 <option select>Select Cast</option>
  <option value="SC">SC</option>
   <option value="ST">ST</option>
 <option value="OBC">OBC</option>
 <option value="RM">RM</option>
 <option value="General">General</option>
 </select>

 <select name="filter_status" id="filter_status">

 <option value="All Students" select>All Students</option>
 <option value="approve_by_our_site">Approved By Our Site</option>
 <option value="reject_by_our_site">Rejected By Our Site</option>
 <option value="defect_by_our_site">Defected By Our Site</option>
 <option value="pending_by_site">Pending By Our Site</option>
 <option value="approved_by_college">Approved By College Site</option>
 <option value="rejected_by_college">Rejected By College Site</option>
 <option value="defect_by_college">Defected By College Site</option>
 <option value="pending_by_college">Pending By College Site</option>
 <option value="approve_by_nsp">Approved By NSP Site</option>
 <option value="rejected_by_nsp">Rejected By NSP Site</option>
 <option value="defect_by_nsp">Defected By NSP Site</option>
 <option value="pending_by_nsp">Pending By NSP Site</option>
 </select>

 <button type="submit"  class="btn btn-info">Filter</button>
 <button type="submit" class="btn btn-reset"><a href="/admin/student/student_bank_verifiy/">Clear</a></button>
   
 
   </form>

</center>



<div class="row" style="border:2px solid grey;" >
<div class="col-lg-6" style="text-align:left;">
<button type="button" name="delete_all" id="delete_all" onclick="myFunction()" class="btn btn-primary">Verify Selected</button>
</div>
<div class="col-lg-6" style="text-align:right;">
<button onclick="window.print();return false;" class="btn btn-primary">Print</button>
</div>



</div>




<div class="row all_stud_table">
        <div class="col-lg-12">
           
            <div class="panel-body table-responsive">

               
              
                 

                    <table id="studentAllTable" class="display nowrap" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                           <th>Select</th>
                            <th>S.No</th>
                            
                            <th>TR Number</th>
                            <th>Name</th>
                            <th>IFSC Code</th>
                            <th>Account No.</th>
                            <th>Credit</th>
                            <th>Withdrawal</th>
                            
                            <th>Balance</th>
                            <th>Edit</th>
                          
                            <th>Account</th>
                            <th>Verifiy</th>
                          
                          
                           
                        </tr>
                        </thead>
                      
                        <tbody>
                        <?php
                        $all_scount = $all_assam_stu = $all_tripura_stu = 0;
                        foreach ($users as $user):
                            $unserlizedData = $user;
                             $scount++;
                              
                    
                                ?>
                                <tr data-class="<?=$chekVal;?>">

                                    
                                    <td>
                                    <input type="checkbox" class="delete_checkbox" name="row-check" value="<?php echo $user['student_id']; ?>">
                                    </td>
                                    <td data-class="<?=$chekVal;?>"><?=$scount?></td>
                                    <td>
                                        <?php echo $user['tr_number']; ?>
                                    </td>
                                    <td>
                                        <a
                                         href="<?php echo base_url('admin/student/student_view_data/'.$user['student_id']); ?>">
                                            <?php 
                                        
                                            echo $user['full_name'];
                                            ?>
                                        </a>
                                    </td>
                                     <td>
                                        <?php echo $user['ifsc_code']; ?>
                                    </td>
                                     <td>
                                        <?php echo $user['bnk_acnt_number']; ?>
                                    </td>
                                    <td>
                                        <?php echo $user['credit_amount']; ?>
                                    </td>
                                    <td>
                                        <?php echo $user['withdraw']; ?>
                                    </td>
                                    <td>
                                        <?php echo $user['account_balance']; ?>
                                    </td>
                                    <td>
                                     <a href="/admin/student/update/<?php echo $user['student_id']; ?>">Update</a>   
                                    </td>
                                     <td>
                                        <?php 
                                        $jsondata=$user["bankstatus"];
                                        $decodejson=json_decode($jsondata);
                                        $full_name_db=$user['full_name'];
                                        //$full_name_db=$user['first_name']." ".$user['last_name'];
  
                                        $sid=$user["student_id"];

                                        $api_fetched_name=$decodejson->data->full_name;
                                        $account_exists=$decodejson->data->account_exists;
                                        $success=$decodejson->success;
                                        $status_code=$decodejson->status_code;
                                        $message_code=$decodejson->message_code;
                                        //echo $user['api_fetched_name']; 
                                        $full_name_db_touppercase= strtoupper($full_name_db);
   
                                        $api_fetched_name_touppercase= strtoupper($api_fetched_name);
   
                                        $full_name_db_trimed = str_replace(" ","",$full_name_db_touppercase);
   
                                        $api_fetched_name_trimed = str_replace(" ","",$api_fetched_name_touppercase);
   
                                        $full_name_db_cleaned=trim($full_name_db_trimed);
  
                                        $api_fetched_name_cleaned=trim($api_fetched_name_trimed);
  
                                       if(($full_name_db_cleaned==$api_fetched_name_cleaned) and ($account_exists==true) and ($success==true) and($status_code==200) and($message_code=="success")){
     
                                           $msg="Matched";
                                           $stcolor="green";
                                           $ncolor="blue";
                                           $st="<p style=color:".$stcolor.">".$msg."</p>";
                                           $final_name="<p style=color:".$ncolor.">".$api_fetched_name."</p>";
                                          
                                           $status=$final_name."<hr>".$st; 
                                           $stu= "Verified";
      
                                       }else if((!empty($api_fetched_name_cleaned)) and ($account_exists==true) and ($success==true) and($status_code==200) and($message_code=="success")){
      $msg="Not Matched";
      $stcolor="#ff00ff";
      $ncolor="blue";
      $st="<p style=color:".$stcolor.">".$msg."</p>";
      $final_name="<p style=color:".$ncolor.">".$api_fetched_name."</p>";
     
      $status=$final_name."<hr>".$st; 
        $status=$st;
      $stu= "Not Verified";
      $query ="UPDATE students SET api_bank_st ='$stu',api_fetched_name ='$api_fetched_name' WHERE student_id='$sid'";
      mysqli_query($conn,$query);
      
                                       }else if((empty($api_fetched_name_cleaned)==true) and ($account_exists==false) and ($success==false) and($status_code==422) and($message_code=="verification_failed")){
      $msg="Not Availble";
      $color="red";
      $st="<p style=color:".$color.">".$msg."</p>";
      $final_name="<p style=color:".$ncolor.">".$api_fetched_name."</p>";
      $status=$st;
      //$status="<p style=color:".$color.">".$msg."</p>";
      
      $stu= "Not Availble";
      $query ="UPDATE students SET api_bank_st ='$stu',api_fetched_name ='$api_fetched_name' WHERE student_id='$sid'";
      mysqli_query($conn,$query);
       
                                       }else if(empty($jsondata)==true){
       
      $msg="Not Verified Yet";
      $color="brown";
      $st="<p style=color:".$color.">".$msg."</p>";
      //$status="<p style=color:".$color.">".$msg."</p>";
        $status=$st;
      
      
                                       }else{
      $msg="API Balance Is Finished";
      $color="red";
      $status="<p style=color:".$color.">".$msg."</p>";
      
      
   }
                                       echo $status;
                                        ?>
                                    </td>
                                     <td>
                                     
                                     <button type="button" name="delete" id="<?php echo $user['student_id']; ?>" onclick="myFunction()" class="btn btn-warning btn-xs delete">Verify</button>
                                    </td>
                                 
                              <?php  endforeach ?>
                        </tbody>
                    </table>
            
            </div>
       
       </div>
</div>

<script type="text/javascript" language="javascript" >
 $(document).ready(function(){

	$('#add_button').click(function(){
		$('#user_form')[0].reset();
		$('.modal-title').text("Add User");
		$('#action').val("Add");
		$('#operation').val("Add");
		$('#user_uploaded_image').html('');
	});
	
  fill_datatable();
  
function fill_datatable(filter_state = '', filter_cast = '',filter_year = '',filter_status=''){
      
    
   var dataTable = $('#user_data').DataTable({
    "processing" : true,
    "serverSide" : true,
    "order" : [],
    "searching" : true,
    "ajax" : {
     url:"fetch.php",
     type:"POST",
     data:{
      filter_state:filter_state, filter_cast:filter_cast, filter_year:filter_year,filter_status:filter_status
     }
    },
    "columnDefs":[
			{
				"targets":[0, 3,4],
				"orderable":false,
			},
		],

   });
   /*
   setInterval( function () {
    dataTable.ajax.reload( null, false ); // user paging is not reset on reload
    }, 3000 ); 
    */
    
  }
 
$('#filter').click(function(){
      
   var filter_state = $('#filter_state').val();
   var filter_cast = $('#filter_cast').val();
   var filter_year = $('#filter_year').val();
   var filter_status = $('#filter_status').val();

   if( filter_year !=''){
       
    $('#user_data').DataTable().destroy();
    fill_datatable(filter_state, filter_cast, filter_year,filter_status);
    
   }else{
       
    alert('Select Both filter option');
    $('#user_data').DataTable().destroy();
    fill_datatable();
    
   }
   
  });
  
$('.delete_checkbox').click(function(){
        if($(this).is(':checked'))
        {
            $(this).closest('tr').addClass('removeRow');
        }
        else
        {
            $(this).closest('tr').removeClass('removeRow');
        }
    });

$('#delete_all').click(function(){
        var checkbox = $('.delete_checkbox:checked');
        if(checkbox.length > 0)
        {
            var checkbox_value = [];
            $(checkbox).each(function(){
                checkbox_value.push($(this).val());
            });

            $.ajax({
                url:"delete.php",
                method:"POST",
                data:{checkbox_value:checkbox_value},
                success:function(data)
                {
                    //$('.removeRow').fadeOut(1500);
                   alert(data);
                    //dataTable.ajax.reload();
                    
                }
            });
        }
        else
        {
            alert("Select atleast one records");
        }
    });
           
$(document).on('submit', '#user_form', function(event){
		event.preventDefault();
		var full_name = $('#full_name').val();
		var bank_name = $('#bank_name').val();
		var tr_number = $('#tr_number').val();
		var mobile =    $('#mobile').val();
		var ifsc_code =    $('#ifsc_code').val();
		var tr_number = $('#tr_number').val();
		var state = $('#state').val();
		var bnk_acnt_number = $('#bnk_acnt_number').val();
        var credit_amount = $('#credit_amount').val();
        var withdraw = $('#withdraw').val();
        var credit_amount = $('#credit_amount1').val();
        var withdraw = $('#withdraw1').val();
    	var account_balance = $('#account_balance').val();
    	
		if(full_name != '' && bank_name != '')
		{
			$.ajax({
				url:"insert.php",
				method:'POST',
				data:new FormData(this),
				contentType:false,
				processData:false,
				success:function(data)
				{
					alert(data);
					$('#user_form')[0].reset();
					$('#userModal').modal('hide');
					dataTable.ajax.reload();
				}
			});
		}
		else
		{
			alert("Both Fields are Required");
		}
	});
	
$(document).on('click', '.update', function(){
		var user_id = $(this).attr("id");
		$.ajax({
			
            url:"<?php echo base_url('/app/fetch_single.php') ?>",
			method:"POST",
			data:{user_id:user_id},
			dataType:"json",
			success:function(data)
			{
			      
				$('#userModal').modal('show');
				$('#full_name').val(data.full_name);
				$('#bank_name').val(data.bank_name);
				$('#tr_number').val(data.tr_number);
				$('#mobile').val(data.mobile);
		    	$('#bnk_acnt_number').val(data.bnk_acnt_number);
				$('#ifsc_code').val(data.ifsc_code);
				$('#state').val(data.state);
				
				$('#account_balance').val(data.account_balance);
				$('#withdraw').val(data.withdraw);
				$('#withdraw1').val(data.withdraw1);
				$('#credit_amount1').val(data.credit_amount1);
				$('#credit_amount').val(data.credit_amount);
				
			
				$('.modal-title').text("Edit User");
				$('#user_id').val(user_id);
				$('#action').val("Edit");
				$('#operation').val("Edit");
				
				dataTable.ajax.reload();
			}
		})
	});
 
$(document).on('click', '.delete', function(){
  var user_id = $(this).attr("id");
 
   $.ajax({
    url:"<?php echo base_url('/app/delete.php') ?>",
    method:"POST",
    data:{user_id:user_id},
    success:function(data)
    {
       
          alert(data);
          //dataTable.ajax.reload();
       
     
    }
   });
 
 });
  
 });
 
</script>
<script>
$(function() {
	//If check_all checked then check all table rows
	$("#check_all").on("click", function () {
		if ($("input:checkbox").prop("checked")) {
			$("input:checkbox[name='row-check']").prop("checked", true);
		} else {
			$("input:checkbox[name='row-check']").prop("checked", false);
		}
	});

	// Check each table row checkbox
	$("input:checkbox[name='row-check']").on("change", function () {
		var total_check_boxes = $("input:checkbox[name='row-check']").length;
		var total_checked_boxes = $("input:checkbox[name='row-check']:checked").length;

		// If all checked manually then check check_all checkbox
		if (total_check_boxes === total_checked_boxes) {
			$("#check_all").prop("checked", true);
		}
		else {
			$("#check_all").prop("checked", false);
		}
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
            "pageLength": 10,
            responsive: true,
            "lengthChange": true,
            "lengthMenu": [[10, 25, 50,75,100,500,600, -1], [10, 25, 50,75,100,500,600, "All"]],
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