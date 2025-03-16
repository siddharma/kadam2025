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
        // echo "test<pre>";print_r($_POST); print_r($_FILES); echo "</pre>";//die;
        if($this->input->post('pnr_amount1')!='' &&  $this->input->post('form')>0) {

            // echo "Here";
            for($i=1; $i<=12; $i++) {
                if (empty($_FILES['pnr_holder_img_'.$i]['name'])) {
                    continue;
                }
                
                if ($_FILES["pnr_holder_img_".$i]["error"] > 0) {
                    $error = $_FILES["pnr_holder_img_".$i]["error"];
                    redirect(base_url() . 'pnrupdate');
                } 

                if ( !in_array($_FILES["pnr_holder_img_".$i]["type"],["image/gif","image/jpeg", "image/png", "image/pjpeg"] ) ) {
                    $error = $_FILES["pnr_holder_img_".$i]["error"];
                    redirect(base_url() . 'pnrupdate');
                }
			 

                $rand = rand();
                $image_name = 'janhit_' .$data['user_account']['user_sponser_id'].'_'.$this->input->post('pnr_holder'.$i).'_'. $rand.'.jpg';
                $url = $_SERVER['DOCUMENT_ROOT'].'/gogreen/media/front/transaction-photo/'.$image_name;
                $filename = $this->compress_image($_FILES["pnr_holder_img_".$i]["tmp_name"], $url, 80);
                
                 //add 6 users prn entries
                 $from_users='';
                 if(!empty($this->input->post('user_code'))) {
                    $from_users = implode("-",$this->input->post('user_code'));
                 }
                

                $fields = array(
                    'user_sponser_id'=>$data['user_account']['user_sponser_id'],
                    'from_id'=> $from_users,
                    'to_id' => mysql_real_escape_string($this->input->post('pnr_holder'.$i)),
                    'pnr_no' => mysql_real_escape_string($this->input->post('pnr_no'.$i)),
                    'amount' => mysql_real_escape_string($this->input->post('pnr_amount'.$i)),
                    'transaction_date' => date("Y-m-d H:i:s"),
                    'transaction_image' => $image_name
                );
                
                $table = 'trans_user_transaction';
                $condition_to_pass = [ 'user_sponser_id'=>$data['user_account']['user_sponser_id'],
                    'from_id'=> $this->input->post('form'),
                    'to_id' => mysql_real_escape_string($this->input->post('pnr_holder'.$i))];
                $arr_user_data = $this->common_model->getRecords($table, 'trans_id', $condition_to_pass, $order_by_to_pass = '', $limit_to_pass = '', $debug_to_pass = 0);


                // print_r($arr_user_data);
                
                if(count($arr_user_data) == 0) {
                    $this->common_model->insertRow($fields, $table);
                } else {
                    $this->common_model->updateRow($table, $fields, $condition_to_pass);
                }
                

            }
            //Loop END 
             //update users status
             if(!empty($this->input->post('user_code'))){
                    $users = count($this->input->post('user_code'));
                    foreach($users as $user) {
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
                    $this->common_model->insertRow($fieldsa, $tablea);
                         
                    // echo "test<pre>";print_r($_POST); print_r($_FILES); echo "</pre>";die;
                    redirect(base_url().'dashboard');
                  
                /* end : for image upload */
       
        }
        // die;
       
        //Get data for direct members
      
        $arr_form_data = $this->register_model->getFormCount($table='green_trans_users_form', $data['user_account']['user_sponser_id']);
        $data['arr_form_data'] = end($arr_form_data);
        // print_r($data['arr_form_data']);

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
         
        $this->load->view('front/pnr/pnr-details', $data);
    }
      function getUserTreeInfo($sponser_data, $loop) {
        $table_to_pass = 'mst_users';
        $condition_to_pass = array("user_sponser_id" => end($sponser_data['sponser_id']));
        $arr_user_data = $this->common_model->getRecords($table_to_pass, 'sponser_id, full_name, upi_address', $condition_to_pass, $order_by_to_pass = '', $limit_to_pass = '', $debug_to_pass = 0);
       
        if (count($arr_user_data) > 0) {
            $arr_user_data = $arr_user_data[0];
            if ($loop > 0) {
                $sponser_data['sponser_id'][] = $arr_user_data['sponser_id'];
                $sponser_data['full_name'][] = $arr_user_data['full_name'];
                $sponser_data['upi_address'][] = $arr_user_data['upi_address'];
                return $this->getUserTreeInfo($sponser_data, $loop - 1);
            } else {
                // $userData = array('sponser_id'=>$sponser_data['sponser_id'],'full_name'=>$sponser_data['full_name']);
                $sponser_data['sponser_id'][] = $arr_user_data['sponser_id'];
                $sponser_data['full_name'][] = $arr_user_data['full_name'];
                $sponser_data['upi_address'][] = $arr_user_data['upi_address'];
                return $sponser_data;
            }
        } else {
                $userData = array('sponser_id'=>$sponser_data['sponser_id'],
                'full_name'=>$sponser_data['full_name'],
                'upi_address'=>$sponser_data['upi_address'],
            );
                return $userData;
        }
    }
}

?>