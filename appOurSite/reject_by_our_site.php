<?php include("header.php");?>
<style>
   body
   {
    margin:0;
    padding:0;
    background-color:#ff0000; 
    
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

       <div class="container box">
           <h3 style="color:black;text-align:center;">Reject By Our Site</h3>
           
            <!-- Table -->
              <!-- Table -->
            <table id='empTable' class='table'>
                <thead>
             
                 <tr>
                  
                    <th>TR Number</th>
                     <th>Name</th>
                      <th>DoB</th>
                     <th>Mobile</th>
                    <th>Course</th>
                   <th>Agent Name</th>
                    <th>Remarks</th>
                    <th>Status</th>
                </tr>
                </thead>
                
            </table>
        	
        
        <!-- Script -->
        <script>
        $(document).ready(function(){
            $('#empTable').DataTable({
                'processing': true,
                'serverSide': true,
                'serverMethod': 'post',
                'ajax': {
                    'url':'reject_by_our_sitefile.php'
                },
                
                'columns': [
                  
                    { data: 'tr_number' },
                    { data: 'full_name' },
                    { data: 'dob' },
                    { data: 'mobile' },
                    { data: 'course_details' },
                    { data: 'agent_name' },
                    { data: 'remarks' },
                    { data: 'student_status' },
                ]
            });
        });
        </script>
    </body>

</html>
