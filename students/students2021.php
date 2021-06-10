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
    background-color:#f1f1f1;
   }
   .box
   {
    width:1270px;
    padding:20px;
    background-color:#fff;
    border:1px solid #ccc;
    border-radius:5px;
    margin-top:25px;
   }
  </style>
 </head>
 <body>
       <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" onclick="myFun();" href="#">Dashboard</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="/app/?ak=17">Home</a></li>
     
      <li><a href="javascript:location.reload(true)">Refresh</a></li>
      
    </ul>
      <ul class="nav navbar-nav navbar-right">
      <li class="active"><a href="/auth/logout">Logout</a></li>

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
     
  <div class="container-fluid">
  <center><h3 style="color:black">2021 Students</h3></center> 

   <div class="row">

   
   <div class="table-responsive">

    <table id="user_data" class="table table-bordered table-striped">
           <thead>
                        <tr>
                            <th>S.No</th>
                            
                                <th>Action</th>
                            
                            <th>TR Number</th>
                             <th>Year</th>
                            <th>Name</th>
                            <th>DoB</th>
                            <th>Mobile</th>
                            <th>Account No.</th>
                            <th>Ac.Status</th>
                            <th>Course</th>
                          
                            <th>State</th>
                            <th>Caste</th>
                            <th>Students Status</th>
                          
                           
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
     url:"fetch2021_students.php",
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
   