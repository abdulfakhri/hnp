<?php 
$ak=$_GET['ak'];
if($ak!=17){
   header("Location: /"); 
}

?>
<!DOCTYPE html>
<html lang="en">
 <head>
  <title>HelpFoundation</title>
         <meta charset="utf-8">
         
         <meta name="viewport" content="width=device-width, initial-scale=1">
         
     	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
 		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		
		<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
		
		<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
		
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
		
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<style>
   body
   {
    margin:0;
    padding:0;
    background-color:#fff;
   }
   
   
  </style>
 </head>
 <body>
       <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header" style="color:Red">
      <a class="navbar-brand" onclick="myFun();" href="#" style="color:Red">Dashboard</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="/app/?ak=17">Home</a></li>
     
      <li><a href="javascript:location.reload(true)" style="color:Red">Refresh</a></li>
      <li class="active"></li>
    </ul>
      <ul class="nav navbar-nav navbar-right">
      <li><a href="/auth/logout" style="color:Red">Logout</a></li>

    </ul>
  </div>
</nav> 
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
<h1 style="color:Red;text-align:center;weight: 12px;">Bank Verification</h1>

  <div class="container-fluid" style="border:2px solid grey">
  <div style="color:blue;text-align:right;weight: 12px;"><button onclick="window.print();return false;" class="btn btn-primary">Print</button></div>
   <br />
   <div class="row" style="border:2px solid blue;text-align:center;" >
   
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
   
      <select name="filter_cast" id="filter_cast"  required>
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
  
      <button type="button" name="filter" id="filter" class="btn btn-info">Filter</button>
      <button class="btn btn-reset"><a href="javascript:location.reload(true)">Clear</a></button>
     
     
    
  
   </div>
   
   <div class="table-responsive">
    
    <div align="left">
    <button type="button" name="delete_all" id="delete_all" onclick="myFunction()" class="btn btn-danger btn-xs">Verify Selected</button>
    </div>
    <br />
    <table id="user_data" class="table table-bordered table-striped">
     <thead>
      <tr>
          
         <th>
             <input id="check_all" type="checkbox"></th>
                            <th>S.No</th>
                            <th>TR Number</th>
                            <th>Name</th>
                            <th>IFSC Code</th>
                            <th>Account No</th>
                            <th>Credited</th>
                            <th>Withdraw</th>
                            <th>Balance</th>
                            <th>Edit</th> 
                            <th>Real Status</th>
                            <th>Verify</th>
      
      </tr>
      
     </thead>
    </table>
    <br />
    <br />
    <br />
   </div>
  </div>
 </body>
</html>

<div id="userModal" class="modal fade">
	<div class="modal-dialog">
		<form method="post" id="user_form" enctype="multipart/form-data">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Edit Student</h4>
				</div>
				<div class="modal-body">
				    <label>TR Number</label>
					<input type="text" name="tr_number" id="tr_number" class="form-control" />
					<label>Enter First Name</label>
					<input type="text" name="full_name" id="full_name" class="form-control" />
					<label>Mobile</label>
					<input type="text" name="mobile" id="mobile" class="form-control" />
					
					<label>State </label>
					<input type="text" name="state" id="state" disabled class="form-control" />
					<select  name="state" required>
                                  <option></option>
                                <option  value="Assam">Assam</option>
                                <option  value="Tripura">Tripura</option>
                    </select>            
                    <br />         
					<label>Bank Account Number</label>
					<input type="text" name="bnk_acnt_number" id="bnk_acnt_number" class="form-control" />
					
					<label>IFSC Code</label>
					<input type="text" name="ifsc_code" id="ifsc_code" maxlength="11" class="form-control" />
					<br />
					<label>Enter Bank Name</label>
					<input type="text" name="bank_name" id="bank_name" class="form-control" />
					<br />
					<label>Credits </label>
					<input type="text" name="credit_amount1" id="credit_amount1" class="form-control" placeholder="+ Credit"/>
					<input type="hidden" name="credit_amount" id="credit_amount" class="form-control" />
					<br />
					<label>Withdraw</label>
					<input type="text" name="withdraw1" id="withdraw1" class="form-control" placeholder="- Withdraw" />
					<input type="hidden" name="withdraw" id="withdraw" class="form-control" />
					<br />
					
					<input type="hidden" name="account_balance" id="account_balance" />
					<br />
					
				</div>
				<div class="modal-footer">
					<input type="hidden" name="user_id" id="user_id" />
					<input type="hidden" name="operation" id="operation" />
					<input type="submit" name="action" id="action" class="btn btn-success" value="Add" />
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</form>
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
			url:"fetch_single.php",
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
    url:"delete.php",
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
   