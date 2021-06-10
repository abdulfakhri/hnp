<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 	
	//-- check logged user
	if (!function_exists('check_login_user')) {
	    function check_login_user() {
	        $ci = get_instance();
	        if ($ci->session->userdata('is_login') != TRUE) {
	            $ci->session->sess_destroy();
	            redirect(base_url('auth'));
	        }
	    }
	}

	if(!function_exists('check_power')){
	    function check_power($type){        
	        $ci = get_instance();
	        
	        $ci->load->model('common_model');
	        $option = $ci->common_model->check_power($type);        
	        
	        return $option;
	    }
    } 

	//-- current date time function
	if(!function_exists('current_datetime')){
	    function current_datetime(){        
	        $dt = new DateTime('now', new DateTimezone('Asia/Calcutta'));
	        $date_time = $dt->format('Y-m-d H:i:s');      
	        return $date_time;
	    }
	}

	//-- show current date & time with custom format
	if(!function_exists('my_date_show_time')){
	    function my_date_show_time($date){       
	        if($date != ''){
	            $date2 = date_create($date);
	            $date_new = date_format($date2,"d M Y h:i A");
	            return $date_new;
	        }else{
	            return '';
	        }
	    }
	}

	//-- show current date & time with custom format
	if(!function_exists('my_date_only_time')){
	    function my_date_only_time($date){       
	        if($date != ''){
	            $date2 = date_create($date);
	            $date_new = date_format($date2,"h:i A");
	            return $date_new;
	        }else{
	            return '';
	        }
	    }
	}

	//-- show current date with custom format
	if(!function_exists('my_date_show')){
	    function my_date_show($date){       
	        
	        if($date != ''){
	            $date2 = date_create($date);
	            $date_new = date_format($date2,"d M Y");
	            return $date_new;
	        }else{
	            return '';
	        }
	    }
	}

	//-- minto hour converter
	if(!function_exists('hoursandmins')){
		function hoursandmins($time, $format = '%02d:%02d') 
		{
		    if ($time < 1) {
		        return;
		    }
		    $hours = floor($time / 60);
		    $minutes = ($time % 60);
		    return sprintf($format, $hours, $minutes);
		}
	}


	if(!function_exists('formatSizeUnits')){
	    function formatSizeUnits($bytes) {   

	        if($bytes >=1073741824){
	        	$bytes = number_format($bytes /1073741824,2).' GB';
	        } elseif ($bytes >=1048576) {
	        	$bytes = number_format($bytes /1048576,2).' MB';
	        } elseif ($bytes >=1024) {
	        	$bytes = number_format($bytes /1024,2).' KB'; 
	        } elseif ($bytes >1){
	        	$bytes = $bytes .' bytes'; 
	        } elseif ($bytes ==1){ 
	        	$bytes = $bytes .' byte'; 
	        } else{ 
	        	$bytes ='0 bytes';
	        }

	      	return "Image Size : ".$bytes;
	  	}
	 }


	if(!function_exists('downloadFile')){
		function downloadFile($fileName) {   

		    /*     
		        IMAGETYPE_GIF (1)
		        IMAGETYPE_JPEG (2)
		        IMAGETYPE_PNG (3)

		    */

		    $imgType = exif_imagetype($fileName['fileName']);
		    if($imgType == 3){
		        $extType = '.png';
		    } else if($imgType == 2){
		         $extType = '.jpg';
		    } else {
		         $extType = '.gif';
		    }

		   // Remote download URL
		    $remoteURL = $fileName['fileName'];
		    $basename = $fileName['basename'].$fileName['fileType'].$extType;
		    
		    // Force download
		    header("Content-type: application/x-file-to-save"); 
		    header("Content-Disposition: attachment; filename=".basename($basename));
		    ob_end_clean();
		    readfile($remoteURL);
		    exit;
		}

		//-- show current date with custom format
		if(!function_exists('getEmployeeNamebyId')){
		    function getEmployeeNamebyId($employeeID){       
		    
		    $ci = get_instance();	        
	        $ci->load->model('common_model');
		    
		    $emp_id = $employeeID;
		    $emp_name_aaray = (array)$ci->common_model->get_single_user_name($emp_id);
        	return $emp_name_aaray['first_name']." ".$emp_name_aaray['last_name'];
		    }
		}

		// -- get the value and change into masked form 
		if(!function_exists('maskSenstiveData')){
		    function maskSenstiveData($number){       
		    
		   $mask_number =  str_repeat("*", strlen($number)-4) . substr($number, -4 );
		   return $mask_number;
		    }
		}

		/*
			* Name: all_employee_chat_histroy
			* parameters 	: senderName,receiverName
			* senderName 	: The name of employee whose page is opened (to)
			* receiverName	: The name of employee whose mesage is sent (from)
			* returns the chat of both employees

			*/
			if(!function_exists('all_employee_chat_histroy')){
				function all_employee_chat_histroy($senderName,$receiverName)
				{
					$ci = get_instance();
					$ci->load->model('common_model');
					$chatHistory = $ci->common_model->getChatHistory($senderName,$receiverName);
					return $chatHistory;
				}
			}


}	

  