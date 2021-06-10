<!DOCTYPE html>
<html>
<head>
<style>
table {
  width: 100%;
  border-collapse: collapse;
}

table, td, th {
  border: 1px solid black;
  padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
$q = intval($_GET['q']);

$con = mysqli_connect('localhost','hellonsp_nspuser','hellonsp_!@#123','hellonsp_nsp2');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}

//mysqli_select_db($con,"hellonsp_nsp2");
$sql="SELECT * FROM colleges WHERE state='".$q."'";
$result = mysqli_query($con,$sql);

while($row = mysqli_fetch_array($result)) {
          
           echo $row['amount'];
}

mysqli_close($con);
?>
</body>
</html>