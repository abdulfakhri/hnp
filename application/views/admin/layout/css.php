<?php 
$system_name = $this->db->get_where('settings', array('type' => 'system_name'))->row()->description;
$system_title = $this->db->get_where('settings', array('type' => 'system_title'))->row()->description;

// setcookie("login", "123456789 rvcfc");
// print_r($_COOKIE);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="">
    <title>Admin</title>
    


<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}

body{
    background: #ff1;
}
</style>

	<!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url();?>optimum/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>optimum/plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
    
	<!-- Menu CSS -->
    <link href="<?php echo base_url();?>optimum/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>optimum/plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
    
	<!-- animation CSS -->
    <link href="<?php echo base_url();?>optimum/css/animate.css" rel="stylesheet">
    
	<!-- Custom CSS -->
    <link href="<?php echo base_url();?>optimum/css/style.css" rel="stylesheet">

    <!-- Style Custom CSS -->
    <link href="<?php echo base_url();?>optimum/css/custom_style.css" rel="stylesheet">
    
	<!-- color CSS -->
    <!-- <link href="<?php echo base_url();?>optimum/css/colors/green.css" id="theme" rel="stylesheet"> -->
    <link href="<?php echo base_url();?>optimum/css/colors/blue-dark.css" id="theme" rel="stylesheet">
    
	
	<!-- color CSS -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>optimum/plugins/bower_components/dropify/dist/css/dropify.min.css">
	<link href="<?php echo base_url(); ?>optimum/plugins/bower_components/dropzone-master/dist/dropzone.css" rel="stylesheet" type="text/css" />
	
	<!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>optimum/plugins/bower_components/bootstrap-table/dist/bootstrap-table.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>optimum/plugins/bower_components/html5-editor/bootstrap-wysihtml5.css" />
	
	<link href="<?php echo base_url(); ?>optimum/plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>optimum/plugins/bower_components/custom-select/custom-select.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>optimum/plugins/bower_components/switchery/dist/switchery.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>optimum/plugins/bower_components/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>optimum/plugins/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>optimum/plugins/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>optimum/plugins/bower_components/multiselect/css/multi-select.css" rel="stylesheet" type="text/css" />
	
	    <link href="<?php echo base_url(); ?>optimum/plugins/bower_components/Magnific-Popup-master/dist/magnific-popup.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>optimum/plugins/bower_components/icheck/skins/all.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>optimum/plugins/bower_components/tablesaw-master/dist/tablesaw.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>optimum/plugins/bower_components/bootstrap-switch/bootstrap-switch.min.css" rel="stylesheet">
		 <!-- summernotes CSS -->
    <link href="<?php echo base_url(); ?>optimum/plugins/bower_components/summernote/dist/summernote.css" rel="stylesheet" />
	
		<!--alerts CSS -->
    <link href="<?php echo base_url(); ?>optimum/plugins/bower_components/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
	
	 <!-- Typehead CSS -->
    <link href="<?php echo base_url(); ?>optimum/plugins/bower_components/typeahead.js-master/dist/typehead-min.css" rel="stylesheet">
	
	
		<!-- Wizard CSS -->
    <link href="<?php echo base_url(); ?>optimum/plugins/bower_components/jquery-wizard-master/css/wizard.css" rel="stylesheet">
	
		 <!-- Cropper CSS -->
    <link href="<?php echo base_url(); ?>optimum/plugins/bower_components/cropper/cropper.min.css" rel="stylesheet">
		<!-- Dropzone css -->
    <link href="<?php echo base_url(); ?>optimum/plugins/bower_components/dropzone-master/dist/dropzone.css" rel="stylesheet" type="text/css" />
	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>optimum/plugins/bower_components/gallery/css/animated-masonry-gallery.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>optimum/plugins/bower_components/fancybox/ekko-lightbox.min.css" />

    <link href="<?php echo base_url(); ?>optimum/plugins/bower_components/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url(); ?>optimum/plugins/bower_components/clockpicker/dist/jquery-clockpicker.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>optimum/plugins/bower_components/calendar/dist/fullcalendar.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>optimum/plugins/bower_components/toast-master/css/jquery.toast.css" rel="stylesheet">
	
	<!-- Timeline CSS -->
    <link href="<?php echo base_url(); ?>optimum/plugins/bower_components/horizontal-timeline/css/horizontal-timeline.css" rel="stylesheet">
	
	 <!--nestable CSS -->
    <link href="<?php echo base_url(); ?>optimum/plugins/bower_components/nestable/nestable.css" rel="stylesheet" type="text/css" />
	
	
	 <!--Range slider CSS -->
    <link href="<?php echo base_url(); ?>optimum/plugins/bower_components/ion-rangeslider/css/ion.rangeSlider.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>optimum/plugins/bower_components/ion-rangeslider/css/ion.rangeSlider.skinModern.css" rel="stylesheet">
	
	<!-- Wizard CSS -->
	<link href="<?php echo base_url(); ?>optimum/plugins/bower_components/register-steps/steps.css" rel="stylesheet">
	
	 <!--Owl carousel CSS -->
    <link href="<?php echo base_url(); ?>optimum/plugins/bower_components/owl.carousel/owl.carousel.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>optimum/plugins/bower_components/owl.carousel/owl.theme.default.css" rel="stylesheet" type="text/css" />
	<script src="<?php echo base_url(); ?>optimum/js/jquery-1.11.0.min.js"></script>
	
	
	<!-- Editable CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>optimum/plugins/bower_components/jquery-datatables-editable/datatables.css" />
	
	 <!-- Footable CSS -->
    <link href="<?php echo base_url(); ?>optimum/plugins/bower_components/footable/css/footable.core.css" rel="stylesheet">
	


	<!--<link href="<?php echo base_url(); ?>optimum/fullcalendar/css/style.css" rel="stylesheet">-->

<!--Amcharts-->
<script src="<?php echo base_url(); ?>optimum/js/amcharts/amcharts.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>optimum/js/amcharts/pie.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>optimum/js/amcharts/serial.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>optimum/js/amcharts/gauge.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>optimum/js/amcharts/funnel.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>optimum/js/amcharts/radar.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>optimum/js/amcharts/exporting/amexport.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>optimum/js/amcharts/exporting/rgbcolor.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>optimum/js/amcharts/exporting/canvg.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>optimum/js/amcharts/exporting/jspdf.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>optimum/js/amcharts/exporting/filesaver.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>optimum/js/amcharts/exporting/jspdf.plugin.addimage.js" type="text/javascript"></script>

	
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
 <!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">-->


<!-- custom scipts by karthik and shraddha  start-->
     <link type="text/css" rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/themes/smoothness/jquery-ui.css"  />
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js" type="text/javascript"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js" type="text/javascript"></script>
    <script src="https://jillelaine.github.io/jquery-idleTimeout/javascripts/store.min.js" type="text/javascript"></script>
    <script src="https://jillelaine.github.io/jquery-idleTimeout/javascripts/jquery-idleTimeout.js" type="text/javascript"></script>

  <script type="text/javascript" charset="utf-8">
    $(document).ready(function (){
        (function ($) {

  $.fn.idleTimeout = function (userRuntimeConfig) {

    //##############################
    //## Public Configuration Variables
    //##############################
    var defaultConfig = {
      redirectUrl: '/auth/logout',     // redirect to this url on logout. Set to "redirectUrl: false" to disable redirect

      // idle settings
      idleTimeLimit: 180,         // 'No activity' time limit in seconds. 1200 = 20 Minutes
      idleCheckHeartbeat: 2,       // Frequency to check for idle timeouts in seconds

      // optional custom callback to perform before logout
      customCallback: false,       // set to false for no customCallback
      // customCallback:    function () {    // define optional custom js function
          // perform custom action before logout
      // },

      // configure which activity events to detect
      // http://www.quirksmode.org/dom/events/
      // https://developer.mozilla.org/en-US/docs/Web/Reference/Events
      activityEvents: 'click keypress scroll wheel mousewheel mousemove', // separate each event with a space

      // warning dialog box configuration
      enableDialog: true,           // set to false for logout without warning dialog
      dialogDisplayLimit: 120,       // Time to display the warning dialog before logout (and optional callback) in seconds. 180 = 3 Minutes
      dialogTitle: 'Session Expiration Warning', // also displays on browser title bar
      dialogText: 'Because you have been inactive, your session is about to expire.',
      dialogTimeRemaining: 'Time remaining',
      dialogStayLoggedInButton: 'Stay Logged In',
      dialogLogOutNowButton: 'Log Out Now',

      // error message if https://github.com/marcuswestin/store.js not enabled
      errorAlertMessage: 'Please disable "Private Mode", or upgrade to a modern browser. Or perhaps a dependent file missing. Please see: https://github.com/marcuswestin/store.js',

      // server-side session keep-alive timer
      sessionKeepAliveTimer: 60,   // ping the server at this interval in seconds. 600 = 10 Minutes. Set to false to disable pings
      sessionKeepAliveUrl: window.location.href // set URL to ping - does not apply if sessionKeepAliveTimer: false
    },

    //##############################
    //## Private Variables
    //##############################
      currentConfig = $.extend(defaultConfig, userRuntimeConfig), // merge default and user runtime configuration
      origTitle = document.title, // save original browser title
      activityDetector,
      startKeepSessionAlive, stopKeepSessionAlive, keepSession, keepAlivePing, // session keep alive
      idleTimer, remainingTimer, checkIdleTimeout, checkIdleTimeoutLoop, startIdleTimer, stopIdleTimer, // idle timer
      openWarningDialog, dialogTimer, checkDialogTimeout, startDialogTimer, stopDialogTimer, isDialogOpen, destroyWarningDialog, countdownDisplay, // warning dialog
      logoutUser;

    //##############################
    //## Public Functions
    //##############################
    // trigger a manual user logout
    // use this code snippet on your site's Logout button: $.fn.idleTimeout().logout();
    this.logout = function () {
      store.set('idleTimerLoggedOut', true);
    };

    //##############################
    //## Private Functions
    //##############################

    //----------- KEEP SESSION ALIVE FUNCTIONS --------------//
    startKeepSessionAlive = function () {

      keepSession = function () {
        $.get(currentConfig.sessionKeepAliveUrl);
        startKeepSessionAlive();
      };

      keepAlivePing = setTimeout(keepSession, (currentConfig.sessionKeepAliveTimer * 1000));
    };

    stopKeepSessionAlive = function () {
      clearTimeout(keepAlivePing);
    };

    //----------- ACTIVITY DETECTION FUNCTION --------------//
    activityDetector = function () {

      $('body').on(currentConfig.activityEvents, function () {

        if (!currentConfig.enableDialog || (currentConfig.enableDialog && isDialogOpen() !== true)) {
          startIdleTimer();
          $('#activity').effect('shake'); // added for demonstration page
        }
      });
    };

    //----------- IDLE TIMER FUNCTIONS --------------//
    checkIdleTimeout = function () {

      var timeIdleTimeout = (store.get('idleTimerLastActivity') + (currentConfig.idleTimeLimit * 1000));

      if ($.now() > timeIdleTimeout) {

        if (!currentConfig.enableDialog) { // warning dialog is disabled
          logoutUser(); // immediately log out user when user is idle for idleTimeLimit
        } else if (currentConfig.enableDialog && isDialogOpen() !== true) {
          openWarningDialog();
          startDialogTimer(); // start timing the warning dialog
        }
      } else if (store.get('idleTimerLoggedOut') === true) { //a 'manual' user logout?
        logoutUser();
      } else {

        if (currentConfig.enableDialog && isDialogOpen() === true) {
          destroyWarningDialog();
          stopDialogTimer();
        }
      }
    };

    startIdleTimer = function () {
      stopIdleTimer();
      store.set('idleTimerLastActivity', $.now());
      checkIdleTimeoutLoop();
    };

    checkIdleTimeoutLoop = function () {
      checkIdleTimeout();
      idleTimer = setTimeout(checkIdleTimeoutLoop, (currentConfig.idleCheckHeartbeat * 1000));
    };

    stopIdleTimer = function () {
      clearTimeout(idleTimer);
    };

    //----------- WARNING DIALOG FUNCTIONS --------------//
    openWarningDialog = function () {

      var dialogContent = "<div id='idletimer_warning_dialog'><p style='font-weight: bold;color: #0a0a0a;background: red;padding: 12px;'>" + currentConfig.dialogText + "</p><p style='display:inline;color:red;font-size:20px;'>" + currentConfig.dialogTimeRemaining + ": <div style='display:inline;color: red;font-size: 28px;' id='countdownDisplay'></div></p></div>";

      $(dialogContent).dialog({
        buttons: [{
          text: currentConfig.dialogStayLoggedInButton,
          click: function () {
            destroyWarningDialog();
            stopDialogTimer();
            startIdleTimer();
          }
        },
          {
            text: currentConfig.dialogLogOutNowButton,
            click: function () {
              logoutUser();
            }
          }
          ],
        closeOnEscape: false,
        modal: true,
        title: currentConfig.dialogTitle,
        open: function () {
          $(this).closest('.ui-dialog').find('.ui-dialog-titlebar-close').hide();
        }
      });

      countdownDisplay();

      document.title = currentConfig.dialogTitle;

      if (currentConfig.sessionKeepAliveTimer) {
        stopKeepSessionAlive();
      }
    };

    checkDialogTimeout = function () {
      var timeDialogTimeout = (store.get('idleTimerLastActivity') + (currentConfig.idleTimeLimit * 1000) + (currentConfig.dialogDisplayLimit * 1000));

      if (($.now() > timeDialogTimeout) || (store.get('idleTimerLoggedOut') === true)) {
        logoutUser();
      }
    };

    startDialogTimer = function () {
      dialogTimer = setInterval(checkDialogTimeout, (currentConfig.idleCheckHeartbeat * 1000));
    };

    stopDialogTimer = function () {
      clearInterval(dialogTimer);
      clearInterval(remainingTimer);
    };

    isDialogOpen = function () {
      var dialogOpen = $("#idletimer_warning_dialog").is(":visible");

      if (dialogOpen === true) {
        return true;
      }
      return false;
    };

    destroyWarningDialog = function () {
      $("#idletimer_warning_dialog").dialog('destroy').remove();
      document.title = origTitle;

      if (currentConfig.sessionKeepAliveTimer) {
        startKeepSessionAlive();
      }
    };

    countdownDisplay = function () {
      var dialogDisplaySeconds = currentConfig.dialogDisplayLimit, mins, secs;

      remainingTimer = setInterval(function () {
        mins = Math.floor(dialogDisplaySeconds / 60); // minutes
        if (mins < 10) { mins = '0' + mins; }
        secs = dialogDisplaySeconds - (mins * 60); // seconds
        if (secs < 10) { secs = '0' + secs; }
        $('#countdownDisplay').html(mins + ':' + secs);
        dialogDisplaySeconds -= 1;
      }, 1000);
    };

    //----------- LOGOUT USER FUNCTION --------------//
    logoutUser = function () {
      store.set('idleTimerLoggedOut', true);

      if (currentConfig.sessionKeepAliveTimer) {
        stopKeepSessionAlive();
      }

      if (currentConfig.customCallback) {
        currentConfig.customCallback();
      }

      if (currentConfig.redirectUrl) {
        window.location.href = currentConfig.redirectUrl;
      }
    };

    //###############################
    // Build & Return the instance of the item as a plugin
    // This is your construct.
    //###############################
    return this.each(function () {

      if (store.enabled) {

        store.set('idleTimerLastActivity', $.now());
        store.set('idleTimerLoggedOut', false);

        activityDetector();

        if (currentConfig.sessionKeepAliveTimer) {
          startKeepSessionAlive();
        }

        startIdleTimer();

      } else {
        alert(currentConfig.errorAlertMessage);
      }

    });
  };
}(jQuery));


      $(document).idleTimeout({
      redirectUrl: '/auth/logout',      // redirect to this url on logout. Set to "redirectUrl: false" to disable redirect

      // idle settings
      idleTimeLimit: 600,           // 'No activity' time limit in seconds. 1200 = 20 Minutes
      // idleTimeLimit: 14400,           // 'No activity' time limit in seconds. 1200 = 20 Minutes
      idleCheckHeartbeat: 2,       // Frequency to check for idle timeouts in seconds

      // optional custom callback to perform before logout
      customCallback: false,       // set to false for no customCallback
      // customCallback:    function () {    // define optional custom js function
          // perform custom action before logout
      // },

      // configure which activity events to detect
      // http://www.quirksmode.org/dom/events/
      // https://developer.mozilla.org/en-US/docs/Web/Reference/Events
      activityEvents: 'click keypress scroll wheel mousewheel mousemove', // separate each event with a space

      // warning dialog box configuration
      enableDialog: true,           // set to false for logout without warning dialog
      dialogDisplayLimit: 30,       // 20 seconds for testing. Time to display the warning dialog before logout (and optional callback) in seconds. 180 = 3 Minutes
      dialogTitle: 'Session Expiration Warning', // also displays on browser title bar
      dialogText: 'Because you have been inactive, your session is about to expire.',
      dialogTimeRemaining: 'Time remaining',
      dialogStayLoggedInButton: 'Stay Logged In',
      dialogLogOutNowButton: 'Log Out Now',

      // error message if https://github.com/marcuswestin/store.js not enabled
      errorAlertMessage: 'Please disable "Private Mode", or upgrade to a modern browser. Or perhaps a dependent file missing. Please see: https://github.com/marcuswestin/store.js',

      // server-side session keep-alive timer
      sessionKeepAliveTimer: 65,   // ping the server at this interval in seconds. 600 = 10 Minutes. Set to false to disable pings
      sessionKeepAliveUrl: window.location.href // set URL to ping - does not apply if sessionKeepAliveTimer: false
      });

    });
  </script>

<!-- custom scipts by karthik and shraddha  end-->

</head>
<style type="text/css">
	.right-side-toggle{
		display: none !important;
	}
 select.form-control.custom-select {
    font-size: 15px;
    border: 1px solid;
}
 .req_idetifier{
    color:red;
  }
  label {
    color: black !important;
  }

.separator {
    display: flex;
    align-items: center;
    text-align: center;
    font-size: 23px;
}
.separator::before, .separator::after {
    content: '';
    flex: 1;
    /*border-bottom: 1px solid #000;*/
    border-bottom: 7px double #000;
}
.separator::before {
    margin-right: .25em;
}
.separator::after {
    margin-left: .25em;
}
thead, tfoot , #task_complete table.dataTable.display thead th, #task_complete table.dataTable.display tfoot th  {
    background: #03a9f3;
}
thead tr th , tfoot tr th , #task_complete table.dataTable.display thead th, #task_complete table.dataTable.display tfoot th {
    color: #fff;
}
tbody{
    color:#000;
}
#timeout {
    display: none;
}
</style>
<?php if ($this->session->userdata('role') != 'admin'){ ?>
<style type="text/css">
	div.dt-buttons{
		display: none;
	}
</style>
<?php } ?>
<!-- <body class="karthikClass" onload="StartTimers();" onmousemove="ResetTimers();" onclick="ResetTimers();" onkeypress="ResetTimers();"onscroll="ResetTimers();"> -->
<body>
	<div id="timeout" title="Session About To Timeouts">
        <!-- <h1>
            </h1> -->
        <p>
            You will be automatically logged out in 1 minute.<br />
            Please start working!!!
    </div>
	