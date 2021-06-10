<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


// *************************************************************************
// *                                                                       *
// * Optimum LinkupComputers                              *
// * Copyright (c) Optimum LinkupComputers. All Rights Reserved                     *
// *                                                                       *
// *************************************************************************
// *                                                                       *
// * Email: info@optimumlinkupsoftware.com                                 *
// * Website: https://optimumlinkup.com.ng								   *
// * 		  https://optimumlinkupsoftware.com							   *
// *                                                                       *
// *************************************************************************
// *                                                                       *
// * This software is furnished under a license and may be used and copied *
// * only  in  accordance  with  the  terms  of such  license and with the *
// * inclusion of the above copyright notice.                              *
// *                                                                       *
// *************************************************************************

//LOCATION : application - controller - Allowips.php

class Allowips extends CI_Controller {

	public function __construct(){
        parent::__construct();
        check_login_user();
        $this->load->model('common_model');
    }

    /****************Function login**********************************
     * @type            : Function
     * @function name   : index
     * @description     : This redirect to dashboard automatically 
     *                    
     *                       
     * @param           : null 
     * @return          : null 
     * ********************************************************** */
	 
    public function index(){
        $data = array();
        $data['page_title'] = 'Allowips';
        $data['data_content'] = $this->common_model->select('allowed_ips_table');
        $data['main_content'] = $this->load->view('admin/allow_ips', $data, TRUE);
       $this->load->view('admin/index', $data);
    }
     //-- add new user by admin
    public function add()
    {   
        if ($_POST) {

            $data = array(
                'allowed_ips' => $_POST['ipadress']
            );

            $data = $this->security->xss_clean($data);            
            $this->db->truncate('allowed_ips_table');
            $allowedIp_id = $this->common_model->insert($data, 'allowed_ips_table');
            $this->session->set_flashdata('msg', 'Ip Address added Successfully');
            redirect(base_url('admin/allowips'));

        }
    }

}