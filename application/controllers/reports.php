<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Reports extends CI_Controller {
    /* An Controller having functions to manage admin user login,add edit, forgot password, profile and activating user account */

    public function __construct() {
        parent::__construct();
        $this->load->model('common_model');
         $this->load->model('user_model');
    }

    /* function to list all the users */

    public function userReport() {

        /* #checking admin is logged in or not */
        if (!$this->common_model->isLoggedIn()) {
            redirect(base_url() . "backend/login");
        }

        /* Getting Common data */
        $data = $this->common_model->commonFunction();
        /* using the user model */
        $this->load->model('user_model');
        $data['arr_user_list'] = array();
        $data['start_date'] = '';
        $data['end_date'] = '';
        $data['city'] = '';
        $data['request_status'] = '';
         if ($this->input->post('start_date') != '' && $this->input->post('end_date') != '') {

            $start_date = $this->input->post('start_date');
            $end_date = $this->input->post('end_date');
            $request_status = $this->input->post('request_status');
           
            $city = $this->input->post('city');
          
            $data['arr_user_list'] = $this->user_model->getUserReportDetails($start_date, $end_date, $request_status, $city);
            $data['start_date'] = $start_date;
            $data['end_date'] = $end_date;
            $data['city'] = $city;
            $data['request_status'] = $request_status;
//        echo "<pre>";print_r($data['arr_user_list']);echo "</pre>";die;
         
        }
        $this->load->view('backend/reports/list', $data);
    }
    public function userDonationIncome() {

        /* #checking admin is logged in or not */
        if (!$this->common_model->isLoggedIn()) {
            redirect(base_url() . "backend/login");
        }

        /* Getting Common data */
        $data = $this->common_model->commonFunction();
        /* using the user model */
        $this->load->model('user_model');
        $data['arr_user_list'] = array();
        $data['start_date'] = '';
        $data['end_date'] = '';
        $data['user_id'] = '';
        
         if ($this->input->post('start_date') != '' && $this->input->post('end_date') != '') {

            $start_date = $this->input->post('start_date');
            $end_date = $this->input->post('end_date');
            $user_id = $this->input->post('user_id');
          
            $data['arr_user_list'] = $this->user_model->getUserDonationIncomeReport($start_date, $end_date, $user_id);
            $data['start_date'] = $start_date;
            $data['end_date'] = $end_date;
            $data['user_id'] = $user_id;
           
//        echo "<pre>";print_r($data['arr_user_list']);echo "</pre>";die;
         
        }
        $this->load->view('backend/reports/income', $data);
    }

}
