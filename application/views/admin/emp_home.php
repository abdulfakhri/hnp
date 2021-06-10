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
<?php

	// echo "<pre>";

	// echo "123456789<br><br>";

	// print_r($login_id);
	// echo "<br><br>";
	// print_r($assigned_task);

	// print_r($submitted_website);
	
	$total_task=array();

	$web_complete=array_merge($pending_by_our_site, $defect_by_our_site, $reject_by_our_site, $pending_website);

	$college_complete=array_merge($approved_by_our_site, $defect_by_college, $college_reject);

	$nsp_complete=array_merge($approved_by_college, $defect_by_nsp, $pending_by_nsp, $approved_by_nsp, $nsp_reject);

	// print_r($web_complete);

	// print_r($college_complete);

	// print_r($nsp_complete);

	$assigned_web=$assigned_coll=$assigned_nsp=array();

	$web_pen=$web_comp=$coll_pen=$coll_comp=$nsp_pen=$nsp_comp=array();

	$total_count=$webcount=$colcount=$nspcount=$webpen=$webcomp=$collpen=$collcomp=$nsppen=$nspcomp=0;

	foreach ($assigned_task as $emp_total_task) {
		if($emp_total_task['emp_id'] == $login_id){

			$total_count++;
			$total_task[$total_count]=$emp_total_task;
		}
	}

	foreach ($total_task as $task_stat) {
		foreach ($web_complete as $web_comp) {

			$assigned_web[$webcount]=$task_stat;
			

			if($task_stat['stu_id'] == $web_comp['student_id'] && $task_stat['task_status'] == 0){
				$web_pen[$webpen]=$task_stat;
				$webpen++;
				$webcount++;
				
			}elseif ($task_stat['stu_id'] == $web_comp['student_id'] && $task_stat['task_status'] == 1) {
				$web_comp[$webcomp]=$task_stat;
				$webcomp++;
				$webcount++;
			}
		}
		foreach ($college_complete as $college_comp) {

			$assigned_coll[$webcount]=$task_stat;
		

			if ($task_stat['stu_id'] == $college_comp['student_id'] && $task_stat['task_status']== 0) {
				$coll_pen[$collpen]=$task_stat;
				$collpen++;
					$colcount++;
			# code...
			}elseif ($task_stat['stu_id'] == $college_comp['student_id'] && $task_stat['task_status']== 1) {
				$coll_comp[$collcomp]=$task_stat;
				$collcomp++;
					$colcount++;
			# code...
			}
		}
		foreach ($nsp_complete as $nsp_comp) {

			$assigned_nsp[$webcount]=$task_stat;
		

			if ($task_stat['stu_id'] == $nsp_comp['student_id'] && $task_stat['task_status'] == 0) {
				$nsp_pen[$nsppen]=$task_stat;
				$nsppen++;
					$nspcount++;
			
			}elseif ($task_stat['stu_id'] == $nsp_comp['student_id'] && $task_stat['task_status'] == 1) {
				$nsp_comp[$nspcomp]=$task_stat;
				$nspcomp++;
					$nspcount++;
				
			}


		}
	}

	// print_r($webcount);
	// print_r($webpen);
	// print_r($webcomp);

	// print_r($colcount);
	// print_r($collpen);
	// print_r($collcomp);

	// print_r($nspcount);
	// print_r($nsp_pen);
	// print_r($nspcomp);


	// print_r($total_task);
?>

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
        background: #0000009c;
    }
    #remarkModal .modal-content{
        border: 3px dashed #03a9f3;
    }
    .modal {
    overflow-y: auto !important;
}
    .dashboardRow .col-md-4.col-sm-12 .white-box,.dashboardRow .col-md-4.col-sm-12 .white-box ,  .dashboardRow .col-md-4.col-sm-12 .white-box{
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
      background: red;
      /*background: #ff6849ad;*/
    }
    .text-muted a{
        font-weight: bold;
        color: #2b2b2b;
    }

 </style>


<div style="display: flex;justify-content: space-between;flex-wrap: wrap;">
    <h3>Total Assigned Students : <strong><?php echo $total_count; ?> </strong></h3>
    <h3 style="display:none;">Today's Working Hours : <strong></strong></h3>
</div>

<div class="separator m-b-20 m-t-20"> <h2>Assigned Site Students</h2></div>

<div class="row dashboardRow">
	<!-- Total Students OurSite -->
        <div class="col-md-4 col-sm-12">
            <div class="white-box">
                <div class="r-icon-stats">
                    <i class="ti-user"></i>
                    <div class="bodystate">
                        <!-- <h4><?php echo $studentcount->total; ?></h4> -->
                        <h4><?php echo $webcount; ?></h4>
                        <span class="text-muted"><a  href="#" data-toggle="modal" data-target="#totalStudent_website">Total Tasks</a></span>
                    </div>
                </div>
            </div>
        </div> 
         <!-- Total Students Approve OurSite -->  
        <div class="col-md-4 col-sm-12 approved">
            <div class="white-box">
                <div class="r-icon-stats">
                    <i class="ti-user"></i>
                    <div class="bodystate"><!-- <h4><?php echo $studentcount->approvedOurSite; ?></h4> --><!-- <h4><?php echo $studentcount->approvedOurSite;    ?></h4> --><h4><?php echo $webcomp;   ?></h4><span class="text-muted"><a  href="#" data-toggle="modal" data-target="#pending_by_college">Completed Tasks</a></span>
                    </div>
                </div>
            </div>
        </div>
        <!-- Total Students Pending OurSite -->
        <div class="col-md-4 col-sm-12 pending">
            <div class="white-box">
                <div class="r-icon-stats">
                    <i class="ti-user"></i>
                    <div class="bodystate">
                        <h4><?php echo $webpen; ?></h4>
                        <!-- <h4><?php echo $studentcount->pendingOurSite + $studentcount->pendingStudent; ?></h4> -->
                        <!-- <span class="text-muted"><a  href="#" data-toggle="modal" data-target="#pending_by_our_site"> -->
                        <span class="text-muted"><a  href="#" data-toggle="modal" data-target="#modal_pending_website">Not Started </a></span>
                    </div>
                </div>
            </div>
        </div>
</div>

<div class="separator m-b-20 m-t-20"> <h2>Assigned College Students</h2></div>

<div class="row dashboardRow">
	<!-- Total Students OurSite -->
        <div class="col-md-4 col-sm-12 ">
            <div class="white-box">
                <div class="r-icon-stats">
                    <i class="ti-user"></i>
                    <div class="bodystate">
                        <!-- <h4><?php echo $studentcount->total; ?></h4> -->
                        <h4><?php echo $colcount; ?></h4>
                        <span class="text-muted"><a  href="#" data-toggle="modal" data-target="#totalStudent_website">Total Tasks</a></span>
                    </div>
                </div>
            </div>
        </div> 
         <!-- Total Students Approve OurSite -->  
        <div class="col-md-4 col-sm-12 approved">
            <div class="white-box">
                <div class="r-icon-stats">
                    <i class="ti-user"></i>
                    <div class="bodystate"><!-- <h4><?php echo $studentcount->approvedOurSite; ?></h4> --><!-- <h4><?php echo $studentcount->approvedOurSite;    ?></h4> --><h4><?php echo $collcomp;   ?></h4><span class="text-muted"><a  href="#" data-toggle="modal" data-target="#pending_by_college">Completed Tasks</a></span>
                    </div>
                </div>
            </div>
        </div>
        <!-- Total Students Pending OurSite -->
        <div class="col-md-4 col-sm-12 pending">
            <div class="white-box">
                <div class="r-icon-stats">
                    <i class="ti-user"></i>
                    <div class="bodystate">
                        <h4><?php echo $collpen; ?></h4>
                        <!-- <h4><?php echo $studentcount->pendingOurSite + $studentcount->pendingStudent; ?></h4> -->
                        <!-- <span class="text-muted"><a  href="#" data-toggle="modal" data-target="#pending_by_our_site"> -->
                        <span class="text-muted"><a  href="#" data-toggle="modal" data-target="#modal_pending_website">Not Started </a></span>
                    </div>
                </div>
            </div>
        </div>
</div>

<div class="separator m-b-20 m-t-20"> <h2>Assigned NSP Students</h2></div>

<div class="row dashboardRow">
	<!-- Total Students OurSite -->
        <div class="col-md-4 col-sm-12">
            <div class="white-box">
                <div class="r-icon-stats">
                    <i class="ti-user"></i>
                    <div class="bodystate">
                        <!-- <h4><?php echo $studentcount->total; ?></h4> -->
                        <h4><?php echo $nspcount; ?></h4>
                        <span class="text-muted"><a  href="#" data-toggle="modal" data-target="#totalStudent_website">Total Tasks</a></span>
                    </div>
                </div>
            </div>
        </div> 
         <!-- Total Students Approve OurSite -->  
        <div class="col-md-4 col-sm-12 approved">
            <div class="white-box">
                <div class="r-icon-stats">
                    <i class="ti-user"></i>
                    <div class="bodystate"><!-- <h4><?php echo $studentcount->approvedOurSite; ?></h4> --><!-- <h4><?php echo $studentcount->approvedOurSite;    ?></h4> --><h4><?php echo $nspcomp;   ?></h4><span class="text-muted"><a  href="#" data-toggle="modal" data-target="#pending_by_college">Completed Tasks</a></span>
                    </div>
                </div>
            </div>
        </div>
        <!-- Total Students Pending OurSite -->
        <div class="col-md-4 col-sm-12 pending">
            <div class="white-box">
                <div class="r-icon-stats">
                    <i class="ti-user"></i>
                    <div class="bodystate">
                        <h4><?php echo $nsppen; ?></h4>
                        <!-- <h4><?php echo $studentcount->pendingOurSite + $studentcount->pendingStudent; ?></h4> -->
                        <!-- <span class="text-muted"><a  href="#" data-toggle="modal" data-target="#pending_by_our_site"> -->
                        <span class="text-muted"><a  href="#" data-toggle="modal" data-target="#modal_pending_website">Not Started </a></span>
                    </div>
                </div>
            </div>
        </div>
</div>
<p id="result" style="display: none;"></p>
<script type="text/javascript">
    $(document).ready(function() {

           // Set up global variable
        var result;
        var locationDetails = '';

       
    function showPosition() {
        // Store the element where the page displays the result
        result = document.getElementById("result");
        
        // If geolocation is available, try to get the visitor's position
        if(navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(successCallback, errorCallback,{enableHighAccuracy: true, maximumAge: 10000});
            result.innerHTML = "Getting the position information...";
            
        } else {
            alert("Sorry, your browser does not support HTML5 geolocation.");
        }
    };
    
    // Define callback function for successful attempt
    function successCallback(position) {
        result.innerHTML = position.coords.latitude + ", " +position.coords.longitude;
        // getLocDetails();
         getLocDetails();
    }
    
    // Define callback function for failed attempt
    function errorCallback(error) {
        if(error.code == 1) {
            result.innerHTML = "Employee Blocked The location";
        } else if(error.code == 2) {
            result.innerHTML = "The network is down or the positioning service can't be reached.";
        } else if(error.code == 3) {
            result.innerHTML = "The attempt timed out before it could get the location data.";
        } else {
            result.innerHTML = "Geolocation failed due to unknown error.";
        }
         getLocDetails();
    }

            showPosition();

    function getLocDetails() {
         $.ajax({
                url: "<?=site_url("admin/dashboard/getLocationDetails")?>",
                type: "post",
                data: {
                        locationData:jQuery('#result').html(),
                        'emp_id':'<?=$this->session->userdata('id')?>',
                        '<?php echo $this->security->get_csrf_token_name(); ?>': '<?=$this->security->get_csrf_hash();?>'
                },
                success:function(response){
                 console.log("yeahhh!!!!")
                }
            });
    }        
            



    });
</script>