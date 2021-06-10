<?php 
error_reporting(0);
$isAdmin = false;
 if ($this->session->userdata('role') == 'admin'){
    $isAdmin = true;
}     
?>
<style type="text/css">
    thead, tfoot {
        background: #03a9f3;
    }
    thead tr th , tfoot tr th {
        color: #fff;
    }
    tbody{
        color:#000;
    }

    td .image-popup-no-margins .profile-status {
        border: 2px solid #fff;
        border-radius: 50%;
        display: inline-block;
        height: 13px;
        left: 11.4%;
        position: absolute;
        width: 13px;
    }

    td .image-popup-no-margins .online {
        background: #00c292;
    } 

    td .image-popup-no-margins .offline {
       background: #fec107;
    }

</style>


    <!-- Start Page Content -->

 

