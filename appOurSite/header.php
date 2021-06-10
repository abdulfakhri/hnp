<!DOCTYPE html>
<html lang="en">
 <head>
  <title>HelpFoundation</title>
         <meta charset="utf-8">
         
         <meta name="viewport" content="width=device-width, initial-scale=1">
         
              <!-- Datatable CSS -->
        <link href='DataTables/datatables.min.css' rel='stylesheet' type='text/css'>

        <!-- jQuery Library -->
        <script src="jquery-3.3.1.min.js"></script>
        
        <!-- Datatable JS -->
        <script src="DataTables/datatables.min.js"></script>
        
         
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