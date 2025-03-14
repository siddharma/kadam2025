<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
error_reporting(E_ALL);
ini_set("display_errors", "on");

class Team_Details extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model("common_model");
        $this->load->model("register_model");
    }

    /* function to display public profile */

    public function directList() {
        $this->load->language('common');
        if (!$this->common_model->isLoggedIn()) {
            redirect('signin');
        }
        $data = $this->common_model->commonFunction();
        $data['user_session'] = $this->session->userdata('user_account');
        $table_to_pass = 'mst_users';
        $fields_to_pass = '*';
        $condition_to_pass = array("sponser_id" => $data['user_account']['user_sponser_id']);
        $arr_user_data = $this->register_model->getUserInformation($table_to_pass, $fields_to_pass, $condition_to_pass, $order_by_to_pass = '', $limit_to_pass = '', $debug_to_pass = 0);
        $data['arr_team_data'] = $arr_user_data;
//        echo "<pre>";print_r($data['arr_team_data']);echo "</pre>";die;
        $this->load->view('front/team/team-list', $data);
    }
    
    public function memberList() {
        $this->load->language('common');
        if (!$this->common_model->isLoggedIn()) {
            redirect('signin');
        }
        $data = $this->common_model->commonFunction();
        $data['user_session'] = $this->session->userdata('user_account');
        $this->load->view('front/team/member-list', $data);
    }
    
    public function levelList($clickid='') {
        $this->load->language('common');
        if (!$this->common_model->isLoggedIn()) {
            redirect('signin');
        }
        $data = $this->common_model->commonFunction();
        $data['user_session'] = $this->session->userdata('user_account');
      
        if($this->input->post('search_id')!=''){
            //Check user clicked up or down data
             if($this->input->post('btnid')=='Up'){
                 
                 //Check if logged user  and searched user are not same
                 if($this->input->post('search_id')!=$data['user_account']['user_sponser_id']){
                     
                    $condition_to_pass = array("user_sponser_id" => $this->input->post('search_id'));
                    $table_to_pass = 'mst_users';
                    $fields_to_pass = '*';
                    $arr_user = $this->register_model->getUserInformation($table_to_pass, $fields_to_pass, $condition_to_pass, $order_by_to_pass = '', $limit_to_pass = '', $debug_to_pass = 0);
                    $arr_user = end($arr_user);
                    
                    //get uplevel 1
                    $condition_to_pass = array("sponser_id" => $arr_user['sponser_id']);
                    $table_to_pass = 'mst_users';
                    $fields_to_pass = '*';
                    $arr_user_data = $this->register_model->getUserInformation($table_to_pass, $fields_to_pass, $condition_to_pass, $order_by_to_pass = '', $limit_to_pass = '', $debug_to_pass = 0);
                    $data['arr_team_data'] = $arr_user_data;
                    $data['sponser_user'] = $arr_user;
                    
                 }else{
                        $condition_to_passed = array("sponser_id" => $data['user_account']['user_sponser_id']);
                        $data['sponser_id'] = $data['user_account']['user_sponser_id']; 
                        $table_to_passed = 'mst_users';
                        $fields_to_passed = '*';
                        $arr_user_data = $this->register_model->getUserInformation($table_to_passed, $fields_to_passed, $condition_to_passed, $order_by_to_pass = '', $limit_to_pass = '', $debug_to_pass = 0);
                        $data['arr_team_data'] = $arr_user_data;
                        //logged user or (main) information
                        $condition_to_pass = array("user_sponser_id" => $data['user_account']['user_sponser_id']);
                        $table_to_pass = 'mst_users';
                        $fields_to_pass = '*';
                        $arr_user = $this->register_model->getUserInformation($table_to_pass, $fields_to_pass, $condition_to_pass, $order_by_to_pass = '', $limit_to_pass = '', $debug_to_pass = 0);
                        $data['sponser_user'] = end($arr_user);
                 }
                   
             }else{
                    $condition_to_pass = array("sponser_id" => $this->input->post('search_id'));
                    $table_to_pass = 'mst_users';
                    $fields_to_pass = '*';
                    $arr_user_data = $this->register_model->getUserInformation($table_to_pass, $fields_to_pass, $condition_to_pass, $order_by_to_pass = '', $limit_to_pass = '', $debug_to_pass = 0);
                    $data['arr_team_data'] = $arr_user_data;
                    //logged user or (main) information
                    $condition_to_pass = array("user_sponser_id" => $this->input->post('search_id'));
                    $table_to_pass = 'mst_users';
                    $fields_to_pass = '*';
                    $arr_user = $this->register_model->getUserInformation($table_to_pass, $fields_to_pass, $condition_to_pass, $order_by_to_pass = '', $limit_to_pass = '', $debug_to_pass = 0);
                    $data['sponser_user'] = end($arr_user);
             }
       
//        echo "<pre>";print_r($data['arr_team_data']);echo "</pre>";die;
        }else{
            //Check user clicked data otherwise get logged user data
            if($clickid!=''){
                $condition_to_passed = array("sponser_id" => $clickid);
                $data['sponser_id'] = $clickid;  
                $table_to_passed = 'mst_users';
                $fields_to_passed = '*';
                $arr_user_data = $this->register_model->getUserInformation($table_to_passed, $fields_to_passed, $condition_to_passed, $order_by_to_pass = '', $limit_to_pass = '', $debug_to_pass = 0);
                $data['arr_team_data'] = $arr_user_data;
                //logged user or (main) information
                    $condition_to_pass = array("user_sponser_id" => $clickid);
                    $table_to_pass = 'mst_users';
                    $fields_to_pass = '*';
                    $arr_user = $this->register_model->getUserInformation($table_to_pass, $fields_to_pass, $condition_to_pass, $order_by_to_pass = '', $limit_to_pass = '', $debug_to_pass = 0);
                    $data['sponser_user'] = end($arr_user);
            }else{
                $condition_to_passed = array("sponser_id" => $data['user_account']['user_sponser_id']);
               
                $table_to_passed = 'mst_users';
                $fields_to_passed = '*';
                $arr_user_data = $this->register_model->getUserInformation($table_to_passed, $fields_to_passed, $condition_to_passed, $order_by_to_pass = '', $limit_to_pass = '', $debug_to_pass = 0);
                $data['arr_team_data'] = $arr_user_data;
                //logged user or (main) information
                    $condition_to_pass = array("user_sponser_id" => $data['user_account']['user_sponser_id']);
                    $table_to_pass = 'mst_users';
                    $fields_to_pass = '*';
                    $arr_user = $this->register_model->getUserInformation($table_to_pass, $fields_to_pass, $condition_to_pass, $order_by_to_pass = '', $limit_to_pass = '', $debug_to_pass = 0);
                    $data['sponser_user'] = end($arr_user);
                
            }
//         echo "<pre>";print_r($data);echo "</pre>";die;
        
        }
        $this->load->view('front/team/level-list', $data);
    }
    
    public function totalIncome() {
        $this->load->language('common');
        if (!$this->common_model->isLoggedIn()) {
            redirect('signin');
        }
        $data = $this->common_model->commonFunction();
        $data['user_session'] = $this->session->userdata('user_account');
        $this->load->view('front/income/total-income', $data);
    }
    
    public function totalDonation() {
        $this->load->language('common');
        if (!$this->common_model->isLoggedIn()) {
            redirect('signin');
        }
        $data = $this->common_model->commonFunction();
        $data['user_session'] = $this->session->userdata('user_account');
                   
        $data['donationAmt'] = $this->register_model->getuserDonationReport($data['user_account']['user_sponser_id']);
        $data['totalDonation'] = $this->register_model->getuserTotalDonation($data['user_account']['user_sponser_id']);
//       echo $data['user_account']['user_sponser_id']."<pre>";print_r($data['donationAmt']);die;
        $this->load->view('front/income/donation', $data);
    }
    
}

?>