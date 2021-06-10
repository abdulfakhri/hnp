<?php 
error_reporting(0);

$id = $this->session->userdata('id');
$otp_email = $this->session->userdata('otp_email');
$otp_confirmed = $this->session->userdata('otp_confirmed');

//echo $id;
echo "<br>";
//echo $otp_email;
echo "<br>";
//echo $otp_confirmed;

if($otp_confirmed !=1){
    
   // echo "Please Confirm the OTP";
    
?>
<!Doctype html>
<head>
    <style>
          .card {
    width: 350px;
    padding: 10px;
    border-radius: 20px;
    background: #fff;
    border: none;
    height: 350px;
    position: relative
}

.container {
    height: 100vh
}

body {
    background: #eee
}

.mobile-text {
    color: #989696b8;
    font-size: 15px
}

.form-control {
    margin-right: 12px
}

.form-control:focus {
    color: #495057;
    background-color: #fff;
    border-color: #ff8880;
    outline: 0;
    box-shadow: none
}

.cursor {
    cursor: pointer
}
    </style>
  
</head>
<body>
    <center>
        <form action="" method="get">
         <div class="d-flex justify-content-center align-items-center container">
    <div class="card py-5 px-3">
        <h2>OTP Code</h2>
        <span>Enter the code we just send on Admin mobile phone,Ask Him the code
        <b class="text-danger"></b></span>
        <div class="d-flex flex-row mt-5">
            
        <input type="text" name="otp" class="form-control">
        
        </div>
        <div class="text-center mt-5">
            <br>
             <input type="submit" class="btn-primary" value="Submit OTP"><br>
            <span class="d-block mobile-text">Don't receive the code?</span><span class="font-weight-bold text-danger cursor">Resend</span></div>
    </div>
</div>
   
   </form>
    </center>
   
</body>
</html>
<?PHP
$OTP=$_GET['otp'];
        
$otp_email = $this->session->userdata('otp_email');

$otp_confirmed = $this->session->userdata('otp_confirmed');
        
        if($otp_email == $OTP){
    
         $this->session->set_userdata('otp_confirmed', 1);
         
         header("Location:/admin/dashboard"); 
         
}
    
    
}else{

   header("Location:/admin/dashboard"); 
}
?>