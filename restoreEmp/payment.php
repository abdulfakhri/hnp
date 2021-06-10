<?php 
/*
$ak=$_GET['ak'];
if($ak!=17){
   header("Location: /"); 
}
*/

$servername = "localhost";
$dbname = "u979436226_hnsp";
$username = "u979436226_hnsp";
$password = "!@#123qweasdZXC";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
if(isset($_POST["submit"])){
    /*
  fname
  price
  email
  address 
  city
  state 
  zipcode
  cardname
  cardnumber 
  expday 
  expmonth 
  expyear 
  cvv 
  
  $fname=$_POST['fname'];
  $price=$_POST['price'];
  $email=$_POST['email'];
  $address =$_POST['address'];
  $city=$_POST['city'];
  $state=$_POST['state']; 
  $zipcode=$_POST['zipcode'];
  $cardname=$_POST['cardname'];
  $cardnumber=$_POST['cardnumber']; 
  $expday=$_POST['expday']; 
  $expmonth=$_POST['expmonth']; 
  $expyear=$_POST['expyear']; 
  $cvv=$_POST['cvv'];
  
  $fname
  $price
  $email
  $address 
  $city
  $state 
  $zipcode
  $cardname
  $cardnumber 
  $expday 
  $expmonth 
  $expyear 
  $cvv 
   
  '$fname'
  '$price'
  '$email'
  '$address' 
  '$city'
  '$state' 
  '$zipcode'
  '$cardname'
  '$cardnumber' 
  '$expday'
  '$expmonth' 
  '$expyear' 
  $cvv' 
  
  '$fname',
  '$price',
  '$email',
  '$address', 
  '$city',
  '$state', 
  '$zipcode',
  '$cardname',
  '$cardnumber',
  '$expday',
  '$expmonth', 
  '$expyear', 
  $cvv' 
    */
  $fname=$_POST['fname'];
  $price=$_POST['price'];
  $email=$_POST['email'];
  $phone =$_POST['phone'];
  $address =$_POST['address'];
  $city=$_POST['city'];
  $state=$_POST['state']; 
  $zipcode=$_POST['zipcode'];
  $cardname=$_POST['cardname'];
  $cardnumber=$_POST['cardnumber']; 
  //$expday=$_POST['expday']; 
  $expmonth=$_POST['expmonth']; 
  $expyear=$_POST['expyear']; 
  $cvv=$_POST['cvv']; 
  
$sql = "INSERT INTO checkout(
  fname,
  price,
  email,
  phone,
  address, 
  city,
  state, 
  zipcode,
  cardname,
  cardnumber, 
  expmonth, 
  expyear, 
  cvv 
)
VALUES (
  '$fname',
  '$price',
  '$email',
  '$phone',
  '$address', 
  '$city',
  '$state', 
  '$zipcode',
  '$cardname',
  '$cardnumber',
  '$expmonth', 
  '$expyear', 
  '$cvv'
    )";

if (mysqli_query($conn, $sql)) {
  echo "Payment Processed successfully";
} else {
    echo "Failed,Payment Process Please Enter Correct Card Details";
  //echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
mysqli_close($conn);
 
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>HelpFoundation</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>		
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
 

        
 <style>
body {
  font-family: Arial;
  font-size: 17px;
  padding: 8px;
}

* {
  box-sizing: border-box;
}

.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #04AA6D;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #45a049;
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}
</style>
 </head>
 <body>
   
<script> 
function myFun(){
window.location='/hnsp/admin/dashboard/'; 
}
</script>   

<script type="text/javascript" language="javascript" >

function myFunction() {
  //document.getElementById("demo").innerHTML = "Hello World";
  alert("Please Wait...Processing");
}
</script>
     
      <center><h1>HelpFoundation Payroll System</h1></center>
        <div align="left">
    
    <button  onclick="myFun();">Dashboard</button>
    </div>
      <div align="right">
    
    <button type="button" name="" id="" class=""><a href="javascript:location.reload(true)">Refresh Page</a></button>
    </div>
    
  </div>
      <div class="row">
      
  <div class="col-75">
    <div class="container">
      <form action=""  method="POST">
      
        <div class="row">
  
          <div class="col-50">
            <h3>Checkout Details</h3>
            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
            <input type="text" id="fname" name="fname" placeholder="" required>
             <label for="fname"><i class="fa fa-user"></i> Development Service Payment</label>
            <input type="text" id="price" name="price" placeholder="$" required>
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email" placeholder="" required>
            <label for="phone"><i class="fa fa-envelope"></i> Phone</label>
            <input type="text" id="phone" name="phone" placeholder="" required>
            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
            <input type="text" id="address" name="address" placeholder="" required>
            <label for="city"><i class="fa fa-institution"></i> City</label>
            <input type="text" id="city" name="city" placeholder="" required>

            <div class="row">
              <div class="col-50">
                <label for="state">State</label>
                <input type="text" id="state" name="state" placeholder="" required>
              </div>
              <div class="col-50">
                <label >PIN Code(Zip, Postal Code) </label>
                <input type="text" id="zipcode" name="zipcode" placeholder="" required>
              </div>
            </div>
          </div>

          <div class="col-50">
            <h3>Payment</h3>
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
                
                <i class="" style="color:navy;">Debit Card</i>|
              <i class="fa fa-cc-visa" style="color:navy;"></i>|
              <i class="fa fa-cc-amex" style="color:blue;"></i>|
              <i class="fa fa-cc-mastercard" style="color:red;"></i>|
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
            <label for="cname">Full Name on Card</label>
            <input type="text" id="cardname" name="cardname" placeholder="" required>
            <label for="ccnum">Credit card number</label>
            <input type="text" id="cardnumber" name="cardnumber" placeholder="" required>
            <label for="expmonth">Card Expiry Month</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="" required>
         
          
            
            
            
            <div class="row">
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" name="expyear" placeholder="" required>
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="" required>
              </div>
            </div>
          </div>
          
        </div>
      
        <input type="submit" value="Continue to Pay" class="btn" name="submit">
      </form>
    </div>
  </div>
 
</div>
  
  </body>
</html>   
     

   
   