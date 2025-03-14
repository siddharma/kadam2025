<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Register extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model("common_model");
        $this->load->model("register_model");
        //CHECK_USER_STATUS();
    }
    
    function getSponserUserInfo(){
        $table_to_pass = 'mst_users';
        $fields_to_pass = '*';
        $condition_to_pass = array("user_sponser_id" => $_POST['user_id']);
        $arr_suser_data = $this->register_model->getUserInformation($table_to_pass, $fields_to_pass, $condition_to_pass, $order_by_to_pass = '', $limit_to_pass = '', $debug_to_pass = 0);
        if(count($arr_suser_data)>0){
        $table_to_pass = 'mst_users';
        $fields_to_pass = '*';
        $condition_to_pass = array("sponser_id" => $_POST['user_id']);
        $arr_user_data = $this->register_model->getUserInformation($table_to_pass, $fields_to_pass, $condition_to_pass, $order_by_to_pass = '', $limit_to_pass = '', $debug_to_pass = 0);
            $direct = count($arr_user_data)+1;
            echo '<p class="input-success-cl">'.$arr_suser_data[0]['full_name'].'<br>This is my '.$direct.' direct<br><br></p>';
        }
        else{
            echo '<p class="input-error-cl">Invalid Sponsor Code</p>';
        }

       
    }
     function getUserInfo($sponser_data, $loop) {
        $table_to_pass = 'mst_users';
        $condition_to_pass = array("user_sponser_id" => end($sponser_data['sponser_id']));
        $arr_user_data = $this->common_model->getRecords($table_to_pass, 'sponser_id', $condition_to_pass, $order_by_to_pass = '', $limit_to_pass = '', $debug_to_pass = 0);
       
        if (count($arr_user_data) > 0) {
            $arr_user_data = $arr_user_data[0];
            if ($loop > 0) {
                $sponser_data['sponser_id'][] = $arr_user_data['sponser_id'];
                return $this->getUserInfo($sponser_data, $loop - 1);
            } else {
                return $sponser_data['sponser_id'];
            }
        } else {
            return $sponser_data['sponser_id'];
        }
    }
    
    public function userRegistration() {
       
        $this->load->language('common');
        $this->load->language('signup');
        $data = $this->common_model->commonFunction();
        $data['title'] = 'signup';
        if($this->input->post('sponser_id')!=''){
            //Checking server side validation for duplicate email
            $user_email = $this->input->post('user_email');
            $sponser_id = $this->input->post('sponser_id');
            $table_to_pass = 'mst_users';
            $fields_to_pass = array('user_id', 'user_email');
            $condition_to_pass = array("user_sponser_id" => $sponser_id);
            $arr_login_data = $this->register_model->getUserInformation($table_to_pass, $fields_to_pass, $condition_to_pass, $order_by_to_pass = '', $limit_to_pass = '', $debug_to_pass = 0);
            if (count($arr_login_data) == 1 ) {
                $sponser_data['sponser_id'][]=$sponser_id;
                $userDetail = $this->getUserInfo($sponser_data, 8);
                $six_digit_random_number = mt_rand(100000, 999999);
                $activation_code = time() . rand();
                $fields = array(
                    'user_sponser_id'=> strtoupper('J'.$six_digit_random_number),
                    'user_password'=>'123456',
                    'sponser_id' => strtoupper($this->input->post('sponser_id')),
                    'full_name' => strtoupper($this->input->post('full_name')),
                    'mobile_no' => mysql_real_escape_string($this->input->post('mobile_no')),
                    'user_email' => strtolower($this->input->post('user_email')),
                    // 'address' => mysql_real_escape_string($this->input->post('address')),
                    // 'city' => strtoupper($this->input->post('city')),
                    // 'pin_code' => mysql_real_escape_string($this->input->post('pin_code')),
                    // 'annual_income' => mysql_real_escape_string($this->input->post('annual_income')),
                    // 'occupation' => mysql_real_escape_string($this->input->post('occupation')),
                    'upi_address' => mysql_real_escape_string($this->input->post('upi_address')),
                    'nominee_name' => mysql_real_escape_string(($this->input->post('nominee_name'))),
                    'nominee_relation' => mysql_real_escape_string(($this->input->post('nominee_relation'))),
                    'upline1_id' => $userDetail[0],
                    'upline1_donation_amt' => $data['global']['level1_amt'],
                    'upline2_id' => $userDetail[1],
                    'upline2_donation_amt' =>$data['global']['level2_amt'],
                    'upline3_id' => $userDetail[2],
                    'upline3_donation_amt' => $data['global']['level3_amt'],
                    'upline4_id' => $userDetail[3],
                    'upline4_donation_amt' => $data['global']['level4_amt'],
                    'upline5_id' => $userDetail[4],
                    'upline5_donation_amt' => $data['global']['level5_amt'],
                    'upline6_id' => $userDetail[5],
                    'upline6_donation_amt' => $data['global']['level6_amt'],

                    'upline7_id' => $userDetail[6],
                    'upline7_donation_amt' => $data['global']['level7_amt'],
                    'upline8_id' => $userDetail[7],
                    'upline8_donation_amt' => $data['global']['level8_amt'],
                    'upline9_id' => $userDetail[8],
                    'upline9_donation_amt' => $data['global']['level9_amt'],

                    'upline_fix1_id' => 'F100001',
                    'upline_fix1_donation_amt' => $data['global']['fix_level1_amt'],
                    'upline_fix2_id' => 'F100002',
                    'upline_fix2_donation_amt' => $data['global']['fix_level2_amt'],
                    'upline_fix3_id' => 'F100003',
                    'upline_fix3_donation_amt' => $data['global']['fix_level3_amt'],

                    'user_type' => '1',
                    'user_status' => '1',
                    'activation_code' => mysql_real_escape_string($activation_code),
                    'email_verified' => '1',
                    'register_date' => mysql_real_escape_string(date("Y-m-d H:i:s")),
                );
                $this->load->model('register_model');
                $condition = '';
                $table = 'mst_users';
                $insert_id = $this->common_model->insertRow($fields, $table);
                
                  //Log
                        $fields = array(
                          'user_id' => 'T'.$six_digit_random_number,
                          'user_name' => $this->input->post('full_name'),
                          'login_by' => 'User',
                             'entry_for'=> 'R',
                             'ip_address' => $_SERVER['REMOTE_ADDR'],
                          );
                          $table = 'user_sign_in_log';
                          $this->common_model->insertRow($fields, $table);
                          
                $this->session->set_userdata('message', 'You are successfully registered.');
                redirect(base_url().'signup');
            }
        }
        
        $this->load->view('front/registration/register', $data);
    }
    
    public function signin() {
     
     
        $data = $this->common_model->commonFunction();
        $data['title'] = 'signin';

        if ($this->input->post('user_sponser_id') != '') {
            $table_to_pass = 'mst_users';
            $fields_to_pass = '*';
            $condition_to_pass = "user_sponser_id = '" . mysql_real_escape_string($_POST['user_sponser_id'])."'";
            $arr_login_data = $this->register_model->getUserInformation($table_to_pass, $fields_to_pass, $condition_to_pass, $order_by_to_pass = '', $limit_to_pass = '', $debug_to_pass = 0);
        
            if (count($arr_login_data)) {
                if ($arr_login_data[0]['user_password'] != ($_POST['user_password'])) {
                    $this->session->set_userdata('login_error', "Please enter correct password.");
                    redirect(base_url() . 'signin');
                } elseif ($arr_login_data[0]['email_verified'] == 1) {
                    if ($arr_login_data[0]['user_status'] == 2) {
                        $this->session->set_userdata('login_error', "Your account has been blocked by administrator.");
                        redirect(base_url() . 'signin');
                    } else {
                        $user_data['user_id'] = $arr_login_data[0]['user_id'];
                        $user_data['user_sponser_id'] = $arr_login_data[0]['user_sponser_id'];
                        $user_data['user_name'] = $arr_login_data[0]['user_name'];
                        $user_data['full_name'] = $arr_login_data[0]['full_name'];
                        $user_data['user_email'] = $arr_login_data[0]['user_email'];
                        $user_data['user_type'] = $arr_login_data[0]['user_type'];
                        $user_data['mobile_no'] = $arr_login_data[0]['mobile_no'];
                        $user_data['upi_address'] = $arr_login_data[0]['upi_address'];
                        $this->session->set_userdata('user_account', $user_data);
                        //Log
                        $fields = array(
                          'user_id' => $arr_login_data[0]['user_sponser_id'],
                          'user_name' => $arr_login_data[0]['full_name'],
                          'login_by' => 'User',
                          'ip_address' => $_SERVER['REMOTE_ADDR'],
                           'entry_for'=> 'S'
                          );
                          $table = 'user_sign_in_log';
                          $this->common_model->insertRow($fields, $table);
                          
                        redirect(base_url().'dashboard');
                    }
                } else {
                    $resend_link = base_url() . 'resend-verfication-link/' . $arr_login_data[0]['user_id'];
                    $this->session->set_userdata('login_error', "Please activate your account.<a href='" . $resend_link . "'>click here</a> to resend the verification link.");
                    redirect(base_url() . 'signin');
                }
            } else {
                $this->session->set_userdata('login_error', "Invalid user id.");
                redirect(base_url() . 'signin');
            }
        }
        
              
        $this->load->view('front/registration/login');
    }

    function resetPassword() {

        /* multi language keywords file */
        
        $data = $this->common_model->commonFunction();
        $data['menu_active'] = "";
        $data['title'] = 'Reset password';
        $data['user_session'] = $this->session->userdata('user_account');
        $this->load->model("user_model");
        if ($this->input->post('user_sponser_id') != '') {
         /* get user information to send reset password email */
            $table_to_pass = 'mst_users';
            $fields_to_pass = '*';
            $condition_to_pass = array("user_sponser_id" => $this->input->post('user_sponser_id'),'is_active'=>'Yes');
            $arr_password_data = $this->register_model->getUserInformation($table_to_pass, $fields_to_pass, $condition_to_pass, $order_by_to_pass = '', $limit_to_pass = '', $debug_to_pass = 0);
            
            if (count($arr_password_data)>0) {

                if (isset($lang_id) && $lang_id != '') {
                    $lang_id = $this->session->userdata('lang_id');
                } else {
                    $lang_id = 17; /* Default is 17(English) */
                }
                $login_link = '<a href="' . base_url() . '"signin/">Click here</a>';
                $reserved_words = array(
                    "||USER_NAME||" => mysql_real_escape_string($arr_password_data[0]['full_name']),
                    "||USER_EMAIL||" => mysql_real_escape_string($arr_password_data[0]['user_email']),
                    "||USER_ID||" => mysql_real_escape_string($arr_password_data[0]['user_sponser_id']),
                    "||PASSWORD||" => mysql_real_escape_string($arr_password_data[0]['user_password']),
                    "||LOGIN_LINK||" => $login_link
                 
                );

                $template_title = 'forgot-password';
                $arr_emailtemplate_data = $this->common_model->getEmailTemplateInfo($template_title, $lang_id, $reserved_words);
                $recipeinets = mysql_real_escape_string($arr_password_data[0]['user_email']);
                $from = array("email" => $data['global']['site_email'], "name" => $data['global']['site_title']);
                $subject = $arr_emailtemplate_data['subject'];
                $message = stripcslashes($arr_emailtemplate_data['content']);
                $mail = $this->common_model->sendEmail($recipeinets, $from, $subject, $message);
                if ($mail) {
                    $this->session->set_userdata('password_recover', "We have been sent password  on your email <strong>" . $arr_password_data[0]['user_email'] . "</strong>.");
                    redirect(base_url() . 'signin');
                } else {
                 
                    $this->session->set_userdata('password_recover', "We have been sent password  on your email <strong>" . $arr_password_data[0]['user_email'] . "</strong>.");
                     redirect(base_url() . 'signin');
                }
            } else {
              
                $this->session->set_userdata('password_recover', "User is not registered or active.");
                redirect(base_url() . 'reset-password');
               
            }
            }
        $this->load->view('front/registration/forgot', $data);
    }

}
