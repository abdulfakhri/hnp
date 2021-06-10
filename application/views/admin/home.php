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
   header("Location:/auth/logout"); 
}   
?>
<?php error_reporting(0);?>
<style type="text/css">
     div.dt-buttons {
      display: none;
    }
    .modal-open .modal{
        padding-top: 0px;
    }
    #modal_pending_website ,#modal_pending_website,#totalStudent_website,#pending_by_college,#defect_by_college,#approved_by_college,#college_reject,#pending_by_nsp,#defect_by_nsp,#approved_by_nsp,#nsp_reject,#remarkModal {
        padding-right:0px!important;
    }
    #remarkModal{
        background: #0f1;
    }
    #remarkModal .modal-content{
        border: 3px dashed #03a9f3;
    }
    .modal {
    overflow-y: auto !important;
}
    .dashboardRow .col-md-3.col-sm-6 .white-box,.dashboardRow .col-md-2.col-sm-6 .white-box ,  .dashboardRow .col-md-4.col-sm-6 .white-box{
        border: 2px solid black;
    }

    .dashboardRow {
      display: -webkit-box;
      display: -webkit-flex;
      display: -ms-flexbox;
      display:         flex;
      flex-wrap: wrap;
      text-align: center;
    justify-content: space-evenly;
    }
    .r-icon-stats .bodystate h4 {
    margin-bottom: 0;
    font-weight: bold;
    font-size: x-large;
    }
    .dashboardRow > [class*='col-'] {
      display: flex;
      flex-direction: column;
    }

    .r-icon-stats .bodystate {
        padding-left: 0px; 
        display: inline-block;
        vertical-align: middle;
    }

    .approved .white-box {
        /*background: #00c29257;*/
        background: mediumspringgreen;
    } 

    .defect .white-box {
      /*background: red;*/
      background: #ab8ce48a;
    }

     .pending .white-box {
      background: yellow;
      /*background: #fec10787;*/
    }

     .reject .white-box {
        background: #ff00009e;
      /*background: #ff6849ad;*/
    }
    .text-muted a{
        font-weight: bold;
        color: #2b2b2b;
    }

      tr[data-class|="rejectStudent"] , li.rejectStudent, td[data-class|="rejectStudent"] {
        background-color: #ff00009e !important;
    }
    tr[data-class|="approveStudents"] ,li.approveStudents, td[data-class|="approveStudents"] {
        background-color: mediumspringgreen !important;
    }
    tr[data-class|="defectStudents"] , li.defectStudents,td[data-class|="defectStudents"] {
            background-color: #ab8ce48a !important;
        }
    tr[data-class|="pendingStudents"] ,li.pendingStudents, td[data-class|="pendingStudents"] {
            background-color: yellow !important;
        }

    .dropdown-menu>li>a{
        padding: 3px 30px !important;
    }
    ul.dropdown-menu {
        border: 1px solid;
        background: #b0e0e6 !important;
    }
    .dropdown-menu .divider {
        height: 1px;
        margin: 9px 0;
        overflow: hidden;
        background-color: #fff;
    }

 </style>
 <!--row -->  

<?php 

  $chekVal = 'pendingStudents';


$os_total = $studentcount->total; 

$os_pending =  $studentcount->pendingOurSite+$studentcount->pendingStudent;

$os_approve = $studentcount->approvedOurSite+$studentcount->approvedCollege+$studentcount->rejectCollege+$studentcount->defectCollege+$studentcount->approvedNsp+$studentcount->rejectNsp+$studentcount->defectNsp;
$os_reject = $studentcount->rejectOurSite;
$os_defect = $studentcount->defectOurSite;
//$os_approve = $studentcount->approvedOurSite+$studentcount->approvedCollege+$studentcount->defectCollege+$studentcount->rejectCollege+$studentcount->pendingNsp+$studentcount->defectNsp+$studentcount->rejectNsp+$studentcount->approvedNsp;



$os_total_array = array_filter(array_merge((array)$users));
$os_approve_array = array_filter(array_merge($approved_by_our_site,$approved_by_college,$college_reject,$defect_by_college,$approved_by_nsp,$nsp_reject,$defect_by_nsp));
$os_pending_array = array_filter(array_merge((array)$pending_website,(array)$pending_by_college));
$os_reject_array = array_filter((array)$reject_by_our_site);
$os_defect_array = array_filter((array)$defect_by_our_site) ;


$clg_pending = $os_approve-($studentcount->approvedCollege+$studentcount->rejectCollege+$studentcount->defectCollege+$studentcount->approvedNsp+$studentcount->rejectNsp+$studentcount->defectNsp);
$clg_approve = $studentcount->approvedCollege+$studentcount->approvedNsp+$studentcount->rejectNsp+$studentcount->defectNsp;
$clg_reject = $studentcount->rejectCollege;
$clg_defect =  $studentcount->defectCollege;
$clg_total = $clg_pending+$clg_approve+$clg_reject+$clg_defect;
// $clg_total = $total_ourSiteStudent_approved - ($studentcount->approvedCollege + $studentcount->defectCollege +$studentcount->rejectCollege); 

$clg_approve_array = array_filter(array_merge((array)$approved_by_college,(array)$approved_by_nsp,(array)$defect_by_nsp,(array)$nsp_reject));
$clg_reject_array =array_filter((array)$college_reject);
$clg_defect_array =array_filter((array)$defect_by_college);
$clg_pending_array = array_filter((array)$approved_by_our_site);
$clg_total_array = array_filter(array_merge((array)$clg_approve_array,(array)$clg_reject_array,(array)$clg_defect_array,(array)$clg_pending_array)) ;


$nsp_approve    = $studentcount->approvedNsp;
$nsp_pending    = $clg_approve-($studentcount->approvedNsp+$studentcount->rejectNsp+$studentcount->defectNsp);
$nsp_reject_count     = $studentcount->rejectNsp;
$nsp_defect     = $studentcount->defectNsp;
$nsp_total      = $nsp_approve+$nsp_pending+$nsp_reject_count+$nsp_defect;


$nsp_approve_array = array_filter((array)$approved_by_nsp);
$nsp_reject_array  = array_filter((array)$nsp_reject);
$nsp_defect_array  = array_filter((array)$defect_by_nsp);
$nsp_pending_array = array_filter(array_merge($approved_by_college));
$nsp_total_array = $clg_approve_array;

?>
<center>
 <!-- Our Site  Students -->
<div class="w3-row-padding w3-margin-bottom">
    <center><h1>Our Site</h1></center> 


        <!-- Total Students OurSite -->
        <div class="col-md-2 col-sm-6">
            <div class="white-box">
                <div class="r-icon-stats">
                  
                    <div class="bodystate">
                        <!-- <h4><?php echo $studentcount->total; ?></h4> -->
                        <!-- <h4><?php echo $total_ourSiteStudent; ?></h4> -->
                        <h4><?php //echo $os_total; ?></h4>
                       <a  href="/appOurSite/totalstudent_by_our_site.php" class="btn-primary" >Total Students</a>
                    </div>
                </div>
            </div>
        </div> 
         <!-- Total Students Approve OurSite -->  
        <div class="col-md-2 col-sm-6 approved">
            <div class="white-box">
                <div class="r-icon-stats">
                
                    <!-- <div class="bodystate"><h4><?php echo $total_ourSiteStudent_approved   ?></h4><span class="text-muted"><a  href="#" data-toggle="modal" data-target="#pending_by_college">Total Approve </a></span> -->
                    <div class="bodystate"><!-- <h4><?php echo $studentcount->approvedOurSite; ?></h4> --><!-- <h4><?php echo $studentcount->approvedOurSite;    ?></h4> -->
                        <!-- <h4><?php echo $total_ourSiteStudent_approved   ?></h4> -->
                        <h4><?php //echo $os_approve;?></h4>
                        <span class=""><a  href="/appOurSite/approved_by_our_site.php" class="btn-primary" >Total Approve </a></span>
                    </div>
                </div>
            </div>
        </div>
        <!-- Total Students Pending OurSite -->
        <div class="col-md-2 col-sm-6 pending">
            <div class="white-box">
                <div class="r-icon-stats">
                    
                    <div class="bodystate">
                        <!-- <h4><?php echo $total_ourSiteStudent_pending; ?></h4> -->
                        <h4><?php //echo $os_pending; ?></h4>
                        <!-- <h4><?php //echo $studentcount->pendingOurSite + $studentcount->pendingStudent; ?></h4> -->
                        <!-- <span class="text-muted"><a  href="#" data-toggle="modal" data-target="#pending_by_our_site"> -->
                      <span class=""><a  href="/appOurSite/pending_by_our_site.php" class="btn-primary" >Total Pending </a></span>
                    </div>
                </div>
            </div>
        </div>
        <!-- Total Students Defect OurSite -->
        <div class="col-md-2 col-sm-6 defect">
            <div class="white-box">
                <div class="r-icon-stats">
                
                    <div class="bodystate">
                        <!-- <h4><?php echo $studentcount->defectOurSite; ?></h4> -->
                        <h4><?php //echo $os_defect; ?></h4>
                         <span class=""><a  href="/appOurSite/defect_by_our_site.php" class="btn-primary">Total Defect </a></span>
                    </div>
                </div>
            </div>
        </div>
        <!-- Total Students Reject  OurSite -->
        <div class="col-md-2 col-sm-6 reject">
            <div class="white-box">
                <div class="r-icon-stats">
                   
                    <div class="bodystate">
                        <!-- <h4><?php echo $studentcount->rejectOurSite; ?></h4> -->
                        <h4><?php //echo $os_reject; ?></h4>
                        <span class=""><a  href="/appOurSite/reject_by_our_site.php" class="btn-primary">Total Reject </a></span>
                    </div>
                </div>
            </div>
        </div>
    </div> 
<hr>
<!-- College Student -->
<div class="w3-row-padding w3-margin-bottom">
 <center><h1>College Site</h1></center>
         <!-- Total Students College -->
        <div class="col-md-2 col-sm-6">
            <div class="white-box">
                <div class="r-icon-stats">
               
                    <div class="bodystate">
                        <!-- <h4><?php echo $studentcount->total; ?></h4> -->
                        <!-- <h4><?php echo $studentcount->approvedOurSite; ?></h4> -->
                        <!-- <h4><?php echo $total_collegeSiteStudent; ?></h4> -->
                        <!-- <h4><?php echo $total_collegeSiteStudent; ?></h4> -->
                        <h4><?php //echo $clg_total; ?></h4>
                        <span class=""><a  href="/appOurSite/totalstudent_by_our_site.php" class="btn-primary">Total Students</a></span>
                    </div>
                </div>
            </div>
        </div> 
		 <!-- Total Students Approve College -->  
        <div class="col-md-2 col-sm-6 approved">
            <div class="white-box">
                <div class="r-icon-stats">
                    
                    <div class="bodystate">
                        <!-- <h4><?php echo $studentcount->approvedCollege; ?></h4> -->
                        <h4><?php //echo $clg_approve; ?></h4>
                         <span class=""><a  href="/appOurSite/approved_by_college.php" class="btn-primary">Total Approve </a></span>
                       
                    </div>
                </div>
            </div>
        </div>
         <!-- Total Students Pending College --> 
        <div class="col-md-2 col-sm-6 pending">
            <div class="white-box">
                <div class="r-icon-stats">
               
                    <div class="bodystate">
                        <!-- <h4><?php echo $studentcount->pendingCollege; ?></h4> -->
                        <!-- <h4><?php echo $total_collegePendingStudent ?></h4> -->
                        <!-- <h4><?php echo $total_collegePendingStudent ?></h4> -->
                        <h4><?php //echo $clg_pending ?></h4>
                        <span class=""><a  href="/appOurSite/pending_by_college.php" class="btn-primary">Total Pending </a></span>
                    </div>
                </div>
            </div>
        </div>
        <!-- Total Students Defect College --> 
        <div class="col-md-2 col-sm-6  defect">
            <div class="white-box">
                <div class="r-icon-stats">
                   
                    <div class="bodystate">
                        <!-- <h4><?php echo $studentcount->defectCollege; ?></h4> -->
                        <h4><?php //echo $clg_defect; ?></h4>
                         <span class=""><a  href="/appOurSite/defect_by_college.php" class="btn-primary">Total Defect </a></span>
                    </div>
                </div>
            </div>
        </div>
        <!-- Total Students Reject College --> 
        <div class="col-md-2 col-sm-6 reject">
            <div class="white-box">
                <div class="r-icon-stats">
                  
                    <div class="bodystate">
                        <!-- <h4><?php echo $studentcount->rejectCollege; ?></h4> -->
                        <h4><?php //echo $clg_reject; ?></h4>
                        
                        <span class=""><a  href="/appOurSite/college_reject.php" class="btn-primary">Total Reject </a></span>
                    </div>
                </div>
            </div>
        </div>
	</div>
<hr>	
<!-- NSP Site  Students -->
<div class="w3-row-padding w3-margin-bottom">
     <center><h1>NSP Site</h1></center>   
            <!-- Total Students NSP -->
            <div class="col-md-2 col-sm-6">
                        <div class="white-box">
                            <div class="r-icon-stats">
                               
                                <div class="bodystate">
                                    <!-- <h4><?php echo $total_NSPSiteStudent; ?></h4> -->
                                    <h4><?php //echo $nsp_total; ?></h4>
                                     <span class=""><a  href="/appOurSite/totalstudent_by_our_site.php " class="btn-primary">Total Students</a></span>
                                </div>
                            </div>
                        </div>
            </div>
            
            <!-- Total Students Approve NSP -->      
            <div class="col-md-2 col-sm-6 approved">
                <div class="white-box">
                    <div class="r-icon-stats">
                      
                        <div class="bodystate">
                            <h4><?php //echo $nsp_approve; ?></h4>
                            <!-- <h4><?php echo $studentcount->approvedNsp; ?></h4> -->
                             <!-- <h4><?php echo $studentcount->approvedCollege; ?></h4> -->
                            <span class=""><a  href="/appOurSite/approved_by_nsp.php" class="btn-primary">Total Approve</a></span>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Total Students Pending NSP --> 
            <div class="col-md-2 col-sm-6 pending">
                <div class="white-box">
                    <div class="r-icon-stats">
                       
                        <div class="bodystate">
                            <!-- <h4><?php echo $total_NSPPendingStudent ?></h4> -->
                            <h4><?php //echo $nsp_pending ?></h4>
                             <span class=""><a  href="/appOurSite/pending_by_nsp.php" class="btn-primary">Total Pending</a></span>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Total Students Defect NSP --> 
            <div class="col-md-2 col-sm-6 defect">
                <div class="white-box">
                    <div class="r-icon-stats">
                       
                        <div class="bodystate">
                            <h4><?php //echo $nsp_defect; ?></h4>
                            <!--  <i class="ti-user"></i><h4><?php echo $studentcount->defectNsp; ?></h4> -->
                             <span class=""><a  href="/appOurSite/defect_by_nsp.php" class="btn-primary">Total Defect </a></span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Students Reject NSP --> 
            <div class="col-md-2 col-sm-6 reject">
                <div class="white-box">
                    <div class="r-icon-stats">
                       
                        <div class="bodystate">
                            <h4><?php //echo $nsp_reject_count ?></h4>
                            <!-- <h4><?php echo $studentcount->rejectNsp; ?></h4> -->
                            <span class=""><a  href="/appOurSite/nsp_reject.php" class="btn-primary">Total Reject </a></span>
                        </div>
                    </div>
                </div>
            </div>                   
					
    </div>   
</center>






