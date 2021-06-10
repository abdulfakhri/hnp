
<?php include 'layout/css.php'; ?>
<?php 
    $isAdmin = false;
     if ($this->session->userdata('role') == 'admin'){
        $isAdmin = true;
    }     
?>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<!-- Top container -->
<div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-#e9e7ed" onclick="w3_open();"><i class="fa fa-bars"></i>Menu</button>
   
<center>
    <form style="" method='get' class="text-dark" >
          <input class="form" type="text" id="searchInput" placeholder="Search" aria-label="Search" required>
          <button id="StudentsearchBtn" class="" type="btn">Search </button>
         
        
  </form> 
  
</center>
       
</div>
<br>
<body style="background:#f1f3f9">
    <nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:200px;background:#e6ffee" id="mySidebar"><br>
        <div class="w3-container w3-row">
            <div class="w3-col s4">
                <img src="https://www.w3schools.com/w3images/avatar2.png" class="w3-circle w3-margin-right" style="width:46px">
            </div>
            <div class="w3-col s8 w3-bar">
                <span>Welcome:</span><br>
                <strong><?php echo $this->session->userdata('first_name');;?></strong>
               
               
            </div>
        </div>
        <hr>
        <div class="w3-container">
            <h5><a class="btn-primary" href="<?php echo base_url('admin/dashboard/') ?>">Dashboard<a/></h5>
        </div>
        <div class="w3-bar-block">
            <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remo fa-fw"></i> Close</a>
               
                <a onclick="myAccFunc()" href="javascript:void(0)" class="w3-button w3-block w3-white w3-left-align" id="myBtn">
     <b>Manage Students</b><span class="glyphicon glyphicon-menu-down"></span>
    </a>
            <a href="<?php echo base_url('/admin/student/all_student_list') ?>" class="w3-bar-item w3-button w3-padding "><span class="glyphicon glyphicon-menu-right"></span>All Students</a>
           <a href="<?php echo base_url('admin/student/mine') ?>" class="w3-bar-item w3-button"><span class="glyphicon glyphicon-menu-right"></span>My Students</a>
           
            <a href="<?php echo base_url('admin/student/createStudent') ?>" class="w3-bar-item w3-button"><span class="glyphicon glyphicon-menu-right"></span>Create Student</a>
            
            <a href="<?php echo base_url('admin/student/students_2020') ?>" class="w3-bar-item w3-button"><span class="glyphicon glyphicon-menu-right"></span>2020 Students</a>
            
            <a href="<?php echo base_url('admin/student/students_2021') ?>" class="w3-bar-item w3-button"><span class="glyphicon glyphicon-menu-right"></span>2021 Students</a>
            
            <a href="<?php echo base_url('admin/student/students_2022') ?>" class="w3-bar-item w3-button"><span class="glyphicon glyphicon-menu-right"></span>2022 Students</a>
             
            <a href="<?php echo base_url('admin/student/students_pending') ?>" class="w3-bar-item w3-button"><span class="glyphicon glyphicon-menu-right"></span>Pending Students</a>
            <a href="<?php echo base_url('admin/student/students_tripura') ?>" class="w3-bar-item w3-button"><span class="glyphicon glyphicon-menu-right"></span>Assam Students</a>
            <a href="<?php echo base_url('admin/student/students_assam') ?>" class="w3-bar-item w3-button"><span class="glyphicon glyphicon-menu-right"></span>Tripura Students</a>
            
           
        </div>
                <?php if ($this->session->userdata('role') == 'admin'): ?>
                     <a onclick="myAccFunc()" href="javascript:void(0)" class="w3-button w3-block w3-white w3-left-align" id="myBtn">
                     <b>Manage Employees</b> <span class="glyphicon glyphicon-menu-down"></span></a>
                      
            <a href="<?php echo base_url('admin/user/all_user_list') ?>" class="w3-bar-item w3-button w3-padding "><span class="glyphicon glyphicon-menu-right"></span>View Employees </a>
            <a href="<?php echo base_url('admin/user/createEmployee') ?>" class="w3-bar-item w3-button w3-padding "><span class="glyphicon glyphicon-menu-right"></span>Add Employees </a>
             <a href="<?php echo base_url('admin/user/all_user_list') ?>" class="w3-bar-item w3-button w3-padding "><span class="glyphicon glyphicon-menu-right"></span>Edit Employees </a>
            
            <a href="<?php echo base_url('admin/user/resetPass') ?>" class="w3-bar-item w3-button w3-padding "><span class="glyphicon glyphicon-menu-right"></span>Change Password </a>
            <a href="<?php echo base_url('admin/user/employee_task') ?>" class="w3-bar-item w3-button w3-padding "><span class="glyphicon glyphicon-menu-right"></span>Assign Tasks</a>
             <a href="<?php echo base_url('/app/payment.php?ak='.$this->session->userdata('id')); ?>" class="w3-bar-item w3-button w3-padding "><span class="glyphicon glyphicon-menu-right"></span>Payrolls</a>
            
            <a href="<?php echo base_url('/app/?ak='.$this->session->userdata('id')); ?>"  class="w3-bar-item w3-button w3-padding"><b>Students Bank Ids</b><span class="glyphicon glyphicon-menu-left"></span> </a>
                        
                        
                        
                        
         
            <?php endif ?>
               <a onclick="myAccFunc()" href="javascript:void(0)" class="w3-button w3-block w3-white w3-left-align" id="myBtn"><b>Restore</b><span class="glyphicon glyphicon-menu-down"></span>
               </a>
             <a href="<?php echo base_url('/restore/?ak='.$this->session->userdata('id')) ?>" class="w3-bar-item w3-button w3-padding "><span class="glyphicon glyphicon-menu-right"></span>Students Restore</a>
             
             <a href="<?php echo base_url('/restoreEmp/?ak='.$this->session->userdata('id')) ?>" class="w3-bar-item w3-button w3-padding "><span class="glyphicon glyphicon-menu-right"></span>Employee Restore</a>
             <hr>
            <a href="<?php echo base_url('admin/user/profile/'.$this->session->userdata('id')) ?>" class="w3-bar-item w3-button w3-padding"><span class="glyphicon glyphicon-menu-right"></span><b>Profile</b> </a>
            <a href="<?php echo base_url('auth/logout') ?>" class="w3-bar-item w3-button"><span class="glyphicon glyphicon-menu-right"></span><b>Log Out</b></a><br>
           
          
    </nav>
    <!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
<!-- !PAGE CONTENT! -->
 
  
<div class="w3-main" style="margin-left:190px;margin-top:43px;">

   <div class="w3-container">
   
    <?php echo $main_content; ?>
  </div>
  
 


  <!-- End page content -->
</div>

 
<?php include 'layout/js.php'; ?>

<script>
// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
    overlayBg.style.display = "none";
  } else {
    mySidebar.style.display = 'block';
    overlayBg.style.display = "block";
  }
}

// Close the sidebar with the close button
function w3_close() {
  mySidebar.style.display = "none";
  overlayBg.style.display = "none";
}
</script>
</body>

