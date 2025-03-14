<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
error_reporting(E_ALL);
ini_set("display_errors", "on");

class User_Account extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model("common_model");
        $this->load->model("register_model");
        
    }

    /* function to display public profile */

    public function profile() {
        $this->load->language('common');
        if (!$this->common_model->isLoggedIn()) {
            redirect('signin');
        }
        $data = $this->common_model->commonFunction();
        $data['user_session'] = $this->session->userdata('user_account');
        $table_to_pass = 'mst_users';
        $fields_to_pass = '*';
        $condition_to_pass = array("user_id" => $data['user_account']['user_id']);
        $arr_user_data = $this->register_model->getUserInformation($table_to_pass, $fields_to_pass, $condition_to_pass, $order_by_to_pass = '', $limit_to_pass = '', $debug_to_pass = 0);
        $data['arr_user_data'] = end($arr_user_data);
        
        $this->load->view('front/user-account/user-profile', $data);
    }
    
    public function editProfile() {
        $this->load->language('common');
        if (!$this->common_model->isLoggedIn()) {
            redirect('signin');
        }
        $data = $this->common_model->commonFunction();
        $data['user_session'] = $this->session->userdata('user_account');
       if($this->input->post('full_name')!='' && $this->input->post('mobile_no')!=''){
                $update_data = array(
                    'full_name' => mysql_real_escape_string($this->input->post('full_name')),
                    'mobile_no' => mysql_real_escape_string($this->input->post('mobile_no')),
                    'user_email' => mysql_real_escape_string($this->input->post('user_email')),
                    'address' => mysql_real_escape_string($this->input->post('address')),
                    'city' => mysql_real_escape_string($this->input->post('city')),
                    'pin_code' => mysql_real_escape_string($this->input->post('pin_code')),
                    'occupation' => mysql_real_escape_string($this->input->post('occupation')),
                    'nominee_name' => mysql_real_escape_string($this->input->post('nominee_name')),
                    'nominee_relation' => mysql_real_escape_string($this->input->post('nominee_relation')),
                    'annual_income' => mysql_real_escape_string($this->input->post('annual_income')),
                );
             $table_name = 'mst_users';
             $condition_to_pass = array("user_id" => $data['user_account']['user_id']);
             $this->common_model->updateRow($table_name, $update_data, $condition_to_pass);
             redirect(base_url() . "dashboard");
       }

        $table_to_pass = 'mst_users';
        $fields_to_pass = '*';
        $condition_to_pass = array("user_id" => $data['user_account']['user_id']);
        $arr_user_data = $this->register_model->getUserInformation($table_to_pass, $fields_to_pass, $condition_to_pass, $order_by_to_pass = '', $limit_to_pass = '', $debug_to_pass = 0);
        $data['arr_user'] = end($arr_user_data);
        $this->load->view('front/user-account/edit-user-profile', $data);
    }
    
    public function chkUserPassword() {
        $this->load->model("user_model");
        $table_to_pass = 'mst_users';
        $fields_to_pass = array('user_id', 'user_password');
        $condition_to_pass = array("user_password" => ($this->input->post('old_pass')));
        $arr_login_data = $this->register_model->getUserInformation($table_to_pass, $fields_to_pass, $condition_to_pass, $order_by_to_pass = '', $limit_to_pass = '', $debug_to_pass = 0);
        if (count($arr_login_data)) {
            echo 'true';
        } else {
            echo 'false';
        }
    }
    
    public function updatePassword() {
        $this->load->language('common');
        if (!$this->common_model->isLoggedIn()) {
            redirect('signin');
        }
        $data = $this->common_model->commonFunction();
        $data['user_session'] = $this->session->userdata('user_account');
        if($this->input->post('new_pass')!='' ){
                $update_data = array(
                    'user_password' => mysql_real_escape_string($this->input->post('new_pass'))
                    
                );
             $table_name = 'mst_users';
             $condition_to_pass = array("user_id" => $data['user_account']['user_id']);
             $this->common_model->updateRow($table_name, $update_data, $condition_to_pass);
             redirect(base_url() . "dashboard");
       }
        $this->load->view('front/user-account/change-pass', $data);
    }
    
    public function welcomeLetter() {
        $this->load->language('common');
        if (!$this->common_model->isLoggedIn()) {
            redirect('signin');
        }
        $data = $this->common_model->commonFunction();
        $data['user_session'] = $this->session->userdata('user_account');
        $table_to_pass = 'mst_users';
        $fields_to_pass = '*';
        $condition_to_pass = array("user_id" => $data['user_account']['user_id']);
        $arr_user_data = $this->register_model->getUserInformation($table_to_pass, $fields_to_pass, $condition_to_pass, $order_by_to_pass = '', $limit_to_pass = '', $debug_to_pass = 0);
        $data['arr_user_data'] = end($arr_user_data);
        
         
        $this->load->view('front/user-account/welcome', $data);
    }

    function logout() {
        $this->session->unset_userdata('user_account');
        $this->session->unset_userdata('popup_id');
        redirect(base_url() . 'signin');
    }
    
//    $name = ''; $type = ''; $size = ''; $error = '';
	function compress_image($source_url, $destination_url, $quality) {

		$info = getimagesize($source_url);

    		if ($info['mime'] == 'image/jpeg')
        			$image = imagecreatefromjpeg($source_url);

    		elseif ($info['mime'] == 'image/gif')
        			$image = imagecreatefromgif($source_url);

   		elseif ($info['mime'] == 'image/png')
        			$image = imagecreatefrompng($source_url);

    		imagejpeg($image, $destination_url, $quality);
		return $destination_url;
	}

   public function memberPNRDetails() {
        $this->load->language('common');
        if (!$this->common_model->isLoggedIn()) {
            redirect('signin');
        }
        $data = $this->common_model->commonFunction();
        $data['user_session'] = $this->session->userdata('user_account');
//        echo "test<pre>";print_r($_SERVER['DOCUMENT_ROOT']);echo "</pre>";die;
//        echo $_SERVER['ROOT_PATH']; die;
        if($this->input->post('pnr_no1')!='' && $this->input->post('pnr_no2')!='' && $this->input->post('pnr_no3')!='' && $this->input->post('pnr_no4')!='' && $this->input->post('pnr_no5')!='' && $this->input->post('pnr_no6')!='' && $this->input->post('user_code')!='' && $this->input->post('form')>0){
//          if($this->input->post('pnr_no1')!=''){  
            /* start : for image upload */
            
           echo "test<pre>";print_r($_FILES);echo "</pre>";die;
if (isset($_FILES['userImg']['name']) && $_FILES['userImg']['name'] != '') {
   
    		if ($_FILES["userImg"]["error"] > 0) {
        			$error = $_FILES["userImg"]["error"];
                                 redirect(base_url() . 'pnrupdate');
    		} 
    		else if (($_FILES["userImg"]["type"] == "image/gif") || 
			($_FILES["userImg"]["type"] == "image/jpeg") || 
			($_FILES["userImg"]["type"] == "image/png") || 
			($_FILES["userImg"]["type"] == "image/pjpeg")) {
//
////        			$url = 'destination .jpg';
//        			$url = 'D:/wamp/www/gogreen/media/front/transaction-photo/destination .jpg';
//
//        			$filename = $this->compress_image($_FILES["userImg"]["tmp_name"], $url, 80);
//        			$buffer = file_get_contents($url);
//
//        			/* Force download dialog... */
//        			header("Content-Type: application/force-download");
//        			header("Content-Type: application/octet-stream");
//        			header("Content-Type: application/download");
//
//			/* Don't allow caching... */
//        			header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
//
//        			/* Set data type, size and filename */
//        			header("Content-Type: application/octet-stream");
//        			header("Content-Transfer-Encoding: binary");
//        			header("Content-Length: " . strlen($buffer));
//        			header("Content-Disposition: attachment; filename=$url");
//
//        			/* Send our file... */
//        			echo $buffer;
//    		}else {
//        			$error = "Uploaded image should be jpg or gif or png";
//    		}
	
//        die(okk);
//                if (isset($_FILES['userImg']['name']) && $_FILES['userImg']['name'] != '') {
                    //configuration
//                    $config['upload_path'] = './media/front/transaction-photo/';
////                    $config['allowed_types'] = 'gif/pjpeg/png/jpeg';
//                    $config['allowed_types'] = '*';
//                    $config['max_size'] = '9000000';
//                    $config['max_width'] = '12024';
//                    $config['max_height'] = '7268';
//                    $file_name = 'gogreen_' .$data['user_account']['user_sponser_id'].'_'. rand();
                    $rand = rand();
//                    $url = 'D:/wamp/www/gogreen/media/front/transaction-photo/gogreen_' .$data['user_account']['user_sponser_id'].'_'. $rand.'.jpg';
                    $url = $_SERVER['DOCUMENT_ROOT'].'/gogreen/media/front/transaction-photo/gogreen_' .$data['user_account']['user_sponser_id'].'_'. $rand.'.jpg';
                 
                    $filename = $this->compress_image($_FILES["userImg"]["tmp_name"], $url, 80);
                    $image_name = 'gogreen_' .$data['user_account']['user_sponser_id'].'_'. $rand.'.jpg';
//        			$buffer = file_get_contents($url);
//                    $config['file_name'] = $buffer;
//                    /* upload libraray */
//                    $this->load->library('upload', $config);
//                    $this->upload->initialize($config);
//
//                    if (!$this->upload->do_upload('userImg')) {
//                        $error = array('error' => $this->upload->display_errors());
//                         echo "test<pre>";print_r($error);echo "</pre>";die;
//                        die(dsds);
//                        redirect(base_url() . 'pnrupdate');
//                        
//                    } else {
//                        $data = array('upload_data' => $this->upload->data());
//                        $image_data = $this->upload->data();
//                        $image_name = $image_data['file_name'];
                        /* update image to table */
                      
                       
                        $users = count($this->input->post('user_code'));
                       
                        $data = $this->common_model->commonFunction();
                        //update users status
                        if($users >0){
                        foreach($users as $user){
                          
                                $update_data = array(
                                    'form_submitted' => 'Yes',
                                     "form_submit_date" => date('Y-m-d H:i:s'),
                                );
                            $table_name = 'mst_users';
                            $condition_to_pass = array("user_sponser_id" => $user);
                            $this->common_model->updateRow($table_name, $update_data, $condition_to_pass);
                        }
                        }
                        //add form count details
                        $fieldsa = array(
                            'user_sponser_id'=>$data['user_account']['user_sponser_id'],
                            'form_count'=>$this->input->post('form'),
                        );
                       
                        $tablea = 'green_trans_users_form';
                        $insert_id = $this->common_model->insertRow($fieldsa, $tablea);
                        
                        //add 6 users prn entries
                        $from_users = implode("-",$this->input->post('user_code'));
                        
                            for($i=1;$i<=6;$i++){

                            $fields = array(
                            'user_sponser_id'=>$data['user_account']['user_sponser_id'],
                            'from_id'=>$from_users,
                            'to_id' => mysql_real_escape_string($this->input->post('pnr_holder'.$i)),
                            'pnr_no' => mysql_real_escape_string($this->input->post('pnr_no'.$i)),
                            'amount' => mysql_real_escape_string($this->input->post('pnr_amount'.$i)),
                            'transaction_date' => date("Y-m-d H:i:s"),
                            'transaction_image' => $image_name
                        );
                        
                        $table = 'trans_user_transaction';
                        $insert_id = $this->common_model->insertRow($fields, $table);
                        }
                        redirect(base_url().'dashboard');
                  
                    }
                }
                /* end : for image upload */
       
        }
        
       
        //Get data for direct members
      
        $arr_form_data = $this->register_model->getFormCount($table='green_trans_users_form', $data['user_account']['user_sponser_id']);
        $data['arr_form_data'] = end($arr_form_data);

        //Get data for users updated form members
        $table_to_pa = 'mst_users';
        $fields_to_pa = '*';
        $condition_to_pa = array("sponser_id" => $data['user_account']['user_sponser_id']);
        $arr_user_data = $this->register_model->getUserInformation($table_to_pa, $fields_to_pa, $condition_to_pa, $order_by_to_pass = '', $limit_to_pass = '', $debug_to_pass = 0);
        $data['arr_team_data'] = $arr_user_data;
        
        //Get data for direct members inactive members
        $table_to_pass = 'mst_users';
        $fields_to_pass = 'sponser_id,user_sponser_id';
        $condition_to_pass = array("sponser_id" => $data['user_account']['user_sponser_id'],"form_submitted" =>'No');
        $arr_user_datas = $this->register_model->getUserInformation($table_to_pass, $fields_to_pass, $condition_to_pass, $order_by_to_pass = '', $limit_to_pass = '', $debug_to_pass = 0);
        $data['unactive_user'] = $arr_user_datas;
        
        //Get all members upto 6 levels
         $sponser_data['sponser_id'][] = $data['user_account']['user_sponser_id'];
         $userDetail = $this->getUserTreeInfo($sponser_data, 9);
         $data['sponsered_user'] = $userDetail;

         //Get all members upto 6 levels
         $spon_data['sponser_id'][] = 'F100003'; 
         $userDetail = $this->getUserTreeInfo($spon_data, 3);

         unset($data['sponsered_user']['sponser_id'][10]);
         $data['sponsered_user']['sponser_id'] = array_values($data['sponsered_user']['sponser_id']);
         $userDetail = array_reverse($userDetail);
         $data['sponsered_user'] = array_merge_recursive($data['sponsered_user'], $userDetail);
        //  echo '<pre>';
        //  print_r($data['sponsered_user']);
        //  print_r($userDetail);

        //  print_r(array_merge_recursive($data['sponsered_user'], $userDetail));
        //   die();
      
        $this->load->view('front/pnr/pnr-details', $data);
    }
      function getUserTreeInfo($sponser_data, $loop) {
        $table_to_pass = 'mst_users';
        $condition_to_pass = array("user_sponser_id" => end($sponser_data['sponser_id']));
        $arr_user_data = $this->common_model->getRecords($table_to_pass, 'sponser_id, full_name', $condition_to_pass, $order_by_to_pass = '', $limit_to_pass = '', $debug_to_pass = 0);
       
        if (count($arr_user_data) > 0) {
            $arr_user_data = $arr_user_data[0];
            if ($loop > 0) {
                $sponser_data['sponser_id'][] = $arr_user_data['sponser_id'];
                $sponser_data['full_name'][] = $arr_user_data['full_name'];
                return $this->getUserTreeInfo($sponser_data, $loop - 1);
            } else {
                // $userData = array('sponser_id'=>$sponser_data['sponser_id'],'full_name'=>$sponser_data['full_name']);
                $sponser_data['sponser_id'][] = $arr_user_data['sponser_id'];
                $sponser_data['full_name'][] = $arr_user_data['full_name'];
                return $sponser_data;
            }
        } else {
                $userData = array('sponser_id'=>$sponser_data['sponser_id'],'full_name'=>$sponser_data['full_name']);
                return $userData;
        }
    }
}

?>