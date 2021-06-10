
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
<h3 style="color:Red;text-align:center;weight: 12px;">Students Bank Accounts Verification</h3>




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

<div class="row" style="border:2px solid grey;" >
<div class="col-lg-6">
<button type="button" name="delete_all" id="delete_all" onclick="myFunction()" class="btn btn-primary">Verify Selected</button>
</div>
<div class="col-lg-6 text-left">
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
                                           //$final_name="<p style=color:".$ncolor.">".$full_name_db."</p>";
                                           $status=$st;
                                           $stu= "Verified";
      
                                       }else if((!empty($api_fetched_name_cleaned)) and ($account_exists==true) and ($success==true) and($status_code==200) and($message_code=="success")){
      $msg="Not Matched";
      $stcolor="#ff00ff";
      $ncolor="blue";
      $st="<p style=color:".$stcolor.">".$msg."</p>";
      $final_name="<p style=color:".$ncolor.">".$api_fetched_name."</p>";
      //$final_name="<p style=color:".$ncolor.">".$full_name_db."</p>";
      //$status=$final_name."<hr>".$st; 
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
                                     <a href="/admin/student/update/<?php echo $user['student_id']; ?>">Verifiy</a>   
                                    </td>
                                 
                              <?php  endforeach ?>
                        </tbody>
                    </table>
            
            </div>
       
       </div>
</div>

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