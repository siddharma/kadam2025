<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Support extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model("common_model");
        $this->load->model("user_model");
    }

      function listMessage() {
        $this->load->language('common');
        if (!$this->common_model->isLoggedIn()) {
            redirect('signin');
        }
        $data = $this->common_model->commonFunction();
        $data['user_session'] = $this->session->userdata('user_account');


        #check that user has already requested for deactivate his account
        $table_to_pass = 'mst_ims';
        $fields_to_pass = '*';
        $condition_to_pass = array("user_id" => $data['user_session']['user_id'], 'type' => 'Forum', 'parent_id' => '0');
        $data['arrAllmsg'] = array();
        $data['arrAllmsg'] = $this->common_model->getRecords($table_to_pass, $fields_to_pass, $condition_to_pass, $order_by_to_pass = 'ims_id DESC', $limit_to_pass = '', $debug_to_pass = 0);

         $this->load->view('front/message/message-list', $data);
    }
      function viewMessage($msgId) {
        $this->load->language('common');
        if (!$this->common_model->isLoggedIn()) {
            redirect('signin');
        }
        $data = $this->common_model->commonFunction();
        $data['user_session'] = $this->session->userdata('user_account');
        $data['arrReplyDetails'] = $this->user_model->getUserForumReplyDetailsById($msgId);
        $this->load->view('front/message/view-reply', $data);
    }

    public function composeMessage() {
        $this->load->language('common');

        if (!$this->common_model->isLoggedIn()) {
            redirect('signin');
        }
        $data['user_session'] = $this->session->userdata('user_account');
        $user_id = $data['user_session']['user_id'];

        if ($this->input->post('subject') != '' && $this->input->post('message') != '' ) {

             /* insert customer request email */
            $table = 'mst_ims';
            $fields = array(
                'contents' => mysql_real_escape_string($this->input->post('message')),
                'subject' => mysql_real_escape_string($this->input->post('subject')),
                'type' => 'Forum',
                'user_id' => $data['user_session']['user_id'],
                'parent_id' => '0',
                'msg_status' => '0',
                'createddate' => date('Y-m-d H:i:s'),
                'remainder_date' => date('Y-m-d H:i:s')
            );
            $insert_id = $this->common_model->insertRow($fields, $table);
            redirect(base_url() . 'message-list');
        }

        $data = $this->common_model->commonFunction();
        $data['user_session'] = $this->session->userdata('user_account');
        $this->load->view('front/message/compose', $data);
    }
    
    
    function add() {

        /* checking admin is logged in or not */
        if (!$this->common_model->isLoggedIn()) {
            redirect(base_url() . "backend/login");
        }
        /* Getting Common data */
        $data = $this->common_model->commonFunction();
        /* checking user has privilige for the Manage Role */
        if ($data['user_account']['role_id'] != 1) {
            /* an admin which is not super admin not privileges to access Manage Role */
            /* setting session for displaying notiication message. */
            $this->session->set_userdata("msg", "<span class='error'>You doesn't have priviliges to  manage role!</span>");
            redirect(base_url() . "backend/home");
        }

        if ($this->input->post('user_email') != '') {
            $user_email = $this->input->post('user_email');
            $user_data = $this->common_model->getRecords('gym_mst_users', '', array("user_email" => $user_email));
            if (count($user_data) > 0) {
                $insert_user_id = $user_data[0]['user_id'];
            } else {
                $table1 = 'gym_mst_users';
                $fields1 = array(
                    'first_name' => mysql_real_escape_string($this->input->post('first_name')),
                    'user_email' => mysql_real_escape_string($user_email),
                    'gender' => mysql_real_escape_string($this->input->post('gender')),
                    'dob' => mysql_real_escape_string($this->input->post('dob')),
                    'address' => mysql_real_escape_string($this->input->post('address')),
                    'cust_gst_no' => mysql_real_escape_string($this->input->post('cust_gst_no')),
                    'user_password' => '123456',
                    'phone' => $this->input->post('phone')
                );
                $insert_user_id = $this->common_model->insertRow($fields1, $table1);

                /* start : for image upload */
                if (isset($_FILES['attachment']['name']) && $_FILES['attachment']['name'] != '') {
                    //configuration
                    $config['upload_path'] = './media/front/images/';
                    $config['allowed_types'] = 'jpg|jpeg';
                    $config['max_size'] = '9000000';
                    $config['max_width'] = '12024';
                    $config['max_height'] = '7268';
                    $file_name = 'attach_' . rand();
                    $config['file_name'] = $file_name;
                    /* upload libraray */
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);

                    if (!$this->upload->do_upload('attachment')) {
                        $error = array('error' => $this->upload->display_errors());
                        redirect(base_url() . 'contact-us');
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                        $image_data = $this->upload->data();
                        $image_name = $image_data['file_name'];
                        /* update image to table */
                        if ($insert_user_id) {
                            $table_name = 'gym_mst_users';
                            $update_data = array('profile_picture' => $image_name);
                            $condition_to_pass = array("user_id" => $insert_user_id);
                            $this->common_model->updateRow($table_name, $update_data, $condition_to_pass);
                        }
                    }
                }
                /* end : for image upload */
            }
            /* insert customer request email */
            $table = 'gym_mst_ims';
            $fields = array(
                'contents' => mysql_real_escape_string($this->input->post('contents')),
                'subject' => mysql_real_escape_string($this->input->post('subject')),
                'type' => 'Forum',
                'user_id' => $insert_user_id,
                'ticket_main_question' => mysql_real_escape_string($this->input->post('ticket_main_question')),
                'parent_id' => '0',
                'msg_status' => '0',
                'createddate' => date('Y-m-d H:i:s'),
                'remainder_date' => date('Y-m-d H:i:s')
            );
            $insert_id = $this->common_model->insertRow($fields, $table);
            /* for email paramter */
            $name = $this->input->post('first_name');
            // Email for admin
            $lang_id = 17;
            $reserved_words = array("||MESSAGE||" => $this->input->post('contents'), "||ADMIN_NAME||" => 'Admin', "||USER_EMAIL||" => $user_email);
            $template_title = 'contact-us-email';
            $arr_emailtemplate_data = $this->common_model->getEmailTemplateInfo($template_title, $lang_id, $reserved_words);


            $recipeinets = $data['global']['site_email'];
            $from = array("email" => $user_email, 'name' => $name);
            $subject = $arr_emailtemplate_data['subject'];
            $message = $arr_emailtemplate_data['content'];

            $mail = $this->common_model->sendEmail($recipeinets, $from, $subject, $message);
            // email for user
            $lang_id = 17;
            $reserved_words = array("||USER_NAME||" => $name, "||CONTENTS||" => $this->input->post('contents'), "||SUBJECTS||" => $this->input->post('subject'), "||USER_EMAIL||" => $user_email);
            $template_title = 'user-register';
            $arr_emailtemplate_data1 = $this->common_model->getEmailTemplateInfo($template_title, $lang_id, $reserved_words);
            $from1 = $data['global']['site_email'];
            $subject1 = $arr_emailtemplate_data1['subject'];
            $message1 = $arr_emailtemplate_data1['content'];

            $mail1 = $this->common_model->sendEmail($user_email, $from1, $subject1, $message1);
            if ($mail1) {
                $this->session->set_userdata('query_success', "Congratulation!</strong> your request has been submitted successfully.<strong>" . $this->input->post('user_email') . "</strong>.");
            }

            redirect(base_url() . "backend/support");
        }
        $this->load->view('backend/support/add', $data);
    }

  

  
    public function replySupportMesssage($ims_id) {
        $this->load->language('common');

        if (!$this->common_model->isLoggedIn()) {
            redirect('signin');
        }
        $data['user_session'] = $this->session->userdata('user_account');
        $user_id = $data['user_session']['user_id'];

        if ($this->input->post('msg_reply') != '') {

            //            mst_ims
            $arrInsertIntoIMS = array(
                'phid' => '',
                'ghid' => '',
                'parent_id' => $ims_id,
                'contents' => mysql_real_escape_string($this->input->post('msg_reply')),
                'ticket_main_question' => '',
                'user_id' => $user_id,
                'type' => 'Forum',
                'subject' => '',
            );

            $intlastInsertId = $this->common_model->insertRow($arrInsertIntoIMS, 'mst_ims');

            if (isset($_FILES['file']) && $_FILES['file']['name'][0] != '') {
                $user_account = $this->session->userdata("user_account");
                $data['global'] = $this->common_model->getGlobalSettings();
                $logged_user_id = $user_account['user_id'];
                $logged_user_name = $user_account['user_name'];
                $logged_user_email = $user_account['user_email'];

                for ($i = 0; $i < count($_FILES['file']['name']); $i++) {
                    $config['upload_path'] = 'media/front/user-photos';
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
                    $config['file_name'] = time();
                    $this->load->library('upload');
                    $this->upload->initialize($config);
                    $_FILES['user_image_file']['name'] = $_FILES['file']['name'][$i];
                    $_FILES['user_image_file']['type'] = $_FILES['file']['type'][$i];
                    $_FILES['user_image_file']['tmp_name'] = $_FILES['file']['tmp_name'][$i];
                    $_FILES['user_image_file']['size'] = $_FILES['file']['size'][$i];
                    $upload_dir = $config['upload_path'];
                    if (!$this->upload->do_upload('user_image_file')) {
                        $error = array('error' => $this->upload->display_errors());
                    } else {
                        $this->load->library('image_lib');
                        $data = array('upload_data' => $this->upload->data());
                        $image_data = $this->upload->data();
                        $image_name = $image_data['file_name'];
                        $absolute_path = $this->common_model->absolutePath();
                        $image_path = $absolute_path . $upload_dir;
                        $image_main = $image_path . "/" . $image_name;
                        $thumbs_image1 = $image_path . "/thumbs/" . $image_name;
                        $thumbs_image2 = $image_path . "/small-thumbs/" . $image_name;

                        $str_console = "convert " . $image_main . " -resize 50% " . $thumbs_image1;
                        exec($str_console);

                        $str_console = "convert " . $image_main . " -resize 158!X153! " . $thumbs_image2;
                        exec($str_console);

                        $file_name = $image_data['file_name'];
                        $table_name = 'trans_user_photos';
                        $arr_post_image = array('photo_path' => $file_name,
                            'phid' => '',
                            'ghid' => '',
                            'ims_id' => mysql_real_escape_string($intlastInsertId),
                            'user_id' => mysql_real_escape_string($logged_user_id),
                            'photo_status' => '1',
                            'added_date' => date('Y-m-d H:i:s')
                        );
                        $user_image = $this->common_model->insertRow($arr_post_image, $table_name);
                    }
                }
            }
        }
        redirect(base_url() . 'default-support/' . $ims_id);
    }

    public function supportList() {

        /* checking admin is logged in or not */
        if (!$this->common_model->isLoggedIn()) {
            redirect(base_url() . "backend/login");
        }
        /* Getting Common data */
        $data = $this->common_model->commonFunction();
        /* Delete selected */
        if (count($_POST) > 0) {
            if (isset($_POST['btn_delete_all'])) {
                /* getting all ides selected */
                $arr_user_ids = $this->input->post('checkbox');
                if (count($arr_user_ids) > 0) {

                    if (count($arr_user_ids) > 0) {
                        /* deleting the user selected */
                        $this->common_model->deleteRows($arr_user_ids, "mst_ims", "ims_id");
                    }
                    $this->session->set_userdata("msg", "<span class='success'>Request deleted successfully!</span>");
                }
            }
        }

        /* using the user model */
        $this->load->model('user_model');
        $data['title'] = "User support";
        $data['arrAllForum'] = array();
        $data['arrAllForum'] = $this->user_model->getUserForumDetails();
        $this->load->view('backend/support/list', $data);
    }

    public function userList() {

        /* checking admin is logged in or not */
        if (!$this->common_model->isLoggedIn()) {
            redirect(base_url() . "backend/login");
        }
        /* Getting Common data */
        $data = $this->common_model->commonFunction();
        /* Delete selected */
        if (count($_POST) > 0) {
            if (isset($_POST['btn_delete_all'])) {
                /* getting all ides selected */
                $arr_user_ids = $this->input->post('checkbox');
                if (count($arr_user_ids) > 0) {
                    if (count($arr_user_ids) > 0) {
                        /* deleting the user selected */
                        $this->common_model->deleteRows($arr_user_ids, "mst_users", "user_id");
                    }
                    $this->session->set_userdata("msg", "<span class='success'>User deleted successfully!</span>");
                }
            }
        }

        /* using the user model */
        $this->load->model('user_model');
        $data['title'] = "User support";
        $data['arrAllForum'] = array();
        $data['arrAllForum'] = $this->user_model->getEnquiryUserDetails();
        $this->load->view('backend/support/user-list', $data);
    }

    public function editUser($edit_id = '') {
        /* checking admin is logged in or not */
        if (!$this->common_model->isLoggedIn()) {
            redirect(base_url() . "backend/login");
        }
        $data = $this->common_model->commonFunction();

        if (count($_POST) > 0) {
//            echo "<pre>";
//            print_r($_POST);
//            echo "</pre>";
//            die;
            if ($this->input->post('edit_id') != "") {

                $arr_admin_detail = $this->common_model->getRecords("mst_users", "", array("user_id" => intval($this->input->post('edit_id'))));
                /* single row fix */
                $arr_admin_detail = end($arr_admin_detail);
                /* setting variable to update or add admin record. */

                $arr_to_update = array(
                    "first_name" => mysql_real_escape_string($this->input->post('first_name')),
                    "user_email" => mysql_real_escape_string($this->input->post('user_email')),
                    "gender" => mysql_real_escape_string($this->input->post('gender')),
                    "phone" => mysql_real_escape_string($this->input->post('phone')),
                    "dob" => mysql_real_escape_string($this->input->post('dob')),
                    "cust_gst_no" => mysql_real_escape_string($this->input->post('cust_gst_no')),
                    "address" => mysql_real_escape_string($this->input->post('address')),
                );

                /* updating the user details */
                $this->common_model->updateRow("mst_users", $arr_to_update, array("user_id" => $this->input->post('edit_id')));
                if ($this->input->post('user_email') != $this->input->post('old_email')) {
                    /* sending account updating mail to user */
                    $admin_login_link = '<a href="' . base_url() . '/signin" target="_new">Please login</a>';
                    $reserved_words = array
                        ("||SITE_TITLE||" => $data['global']['site_title'],
                        "||SITE_PATH||" => base_url(),
                        "||USER_NAME||" => $this->input->post('first_name'),
                        "||ADMIN_NAME||" => 'Admin',
                        "||ADMIN_EMAIL||" => $data['global']['user_email'],
                        "||PASSWORD||" => '123456',
                    );

                    /* getting mail subect and mail message using email template title and lang_id and reserved works */
                    $email_content = $this->common_model->getEmailTemplateInfo('admin-updated', 17, $reserved_words);
                    /* sending the mail to deleting user */
                    /* 1.recipient array. 2.From array containing email and name, 3.Mail subject 4.Mail Body */
                    $mail = $this->common_model->sendEmail(array($this->input->post('user_email')), array("email" => $data['global']['site_email'], "name" => $data['global']['site_title']), $email_content['subject'], $email_content['content']);
                }
                $this->session->set_userdata("msg", "<span class='success'>User updated successfully!</span>");
                redirect(base_url() . "backend/support/users");
            }
        }
        $arr_privileges = array();
        /* getting all privileges */
        $data['arr_privileges'] = $this->common_model->getRecords('mst_privileges');
        /* getting admin details from $edit_id from function parameter */
        $data['arr_admin_detail'] = $this->common_model->getRecords("mst_users", "", array("user_id" => intval(base64_decode($edit_id))));
        /* single row fix */
        $data['arr_admin_detail'] = end($data['arr_admin_detail']);
        $data['title'] = "edit User";
        $data['edit_id'] = $edit_id;
        $this->load->view('backend/support/edit', $data);
    }

    public function viewSupportList($ims_id) {
        if (!$this->common_model->isLoggedIn()) {
            redirect(base_url() . "backend/login");
        }
        /* using the admin model */
        $this->load->model('user_model');
        $data = $this->common_model->commonFunction();

        $arr_privileges = array();
        /* getting all privileges */
        $data['arr_privileges'] = $this->common_model->getRecords('mst_privileges');
        /* getting admin details from user id from function parameter */
        $data['arr_forum_detail'] = $this->user_model->getUserForumDetailsById(base64_decode($ims_id));
        /* single row fix */
        $data['arr_forum_detail'] = end($data['arr_forum_detail']);
        $data['forum_photo'] = $this->user_model->getPhotoDetailsById(base64_decode($ims_id), $data['arr_forum_detail']['user_id']);
        $data['arrReplyDetails'] = $this->user_model->getUserForumReplyDetailsById(base64_decode($ims_id));
        $data['arrReplydateDetails'] = $this->user_model->getUserForumReplydateDetailsById(base64_decode($ims_id));
        foreach ($data['arrReplyDetails'] as $key => $reply) {
            $data['arrReplyDetails'][$key]['photos'] = $this->user_model->getPhotoDetailsById($reply['ims_id'], $reply['user_id']);
        }
        $data['title'] = "View details";
        $this->load->view('backend/support/view', $data);
    }

    public function replySupportMesssageByAdmin($ims_id) {
        if (!$this->common_model->isLoggedIn()) {
            redirect(base_url() . "backend/login");
        }
        /* using the admin model */
        $this->load->model('user_model');
        $data = $this->common_model->commonFunction();
        $user_id = $data['user_account']['user_id'];

        if ($this->input->post('msg_reply') != '') {

//            $date = $this->input->post('remainder_date');
//            if ($date != '') {
//                $remainder_date = $date;
//            } else {
//                $remainder_date = $this->input->post('old_remainder_date');
//            }

            if ($this->input->post('msg_status') == '2') {
                $remainder_date = date('Y-m-d H:i:s');
            }

            $arrInsertIntoIMS = array(
                'parent_id' => $ims_id,
                'contents' => mysql_real_escape_string($this->input->post('msg_reply')),
             
                'user_id' => $user_id,
                'type' => 'Forum',
                'subject' => '',
                'createddate' => date('Y-m-d'),
                'msg_status' => $this->input->post('msg_status'),
               
            );

            $intlastInsertId = $this->common_model->insertRow($arrInsertIntoIMS, 'mst_ims');

            $arr_to_update = array(
                "msg_status" => $this->input->post('msg_status'),
             
            );
            /* condition to update record for the admin status */
            $condition_array = array('ims_id' => intval($ims_id));
            /* updating the global setttings parameter value into database */
            $this->common_model->updateRow('mst_ims', $arr_to_update, $condition_array);

            if (isset($_FILES['file']) && $_FILES['file']['name'][0] != '') {

                for ($i = 0; $i < count($_FILES['file']['name']); $i++) {
                    $config['upload_path'] = 'media/front/user-photos';
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
                    $config['file_name'] = time();
                    $this->load->library('upload');
                    $this->upload->initialize($config);
                    $_FILES['user_image_file']['name'] = $_FILES['file']['name'][$i];
                    $_FILES['user_image_file']['type'] = $_FILES['file']['type'][$i];
                    $_FILES['user_image_file']['tmp_name'] = $_FILES['file']['tmp_name'][$i];
                    $_FILES['user_image_file']['size'] = $_FILES['file']['size'][$i];
                    $upload_dir = $config['upload_path'];
                    if (!$this->upload->do_upload('user_image_file')) {
                        $error = array('error' => $this->upload->display_errors());
                    } else {
                        $this->load->library('image_lib');
                        $data = array('upload_data' => $this->upload->data());
                        $image_data = $this->upload->data();
                        $image_name = $image_data['file_name'];
                        $absolute_path = $this->common_model->absolutePath();
                        $image_path = $absolute_path . $upload_dir;
                        $image_main = $image_path . "/" . $image_name;
                        $thumbs_image1 = $image_path . "/thumbs/" . $image_name;
                        $thumbs_image2 = $image_path . "/small-thumbs/" . $image_name;

                        $str_console = "convert " . $image_main . " -resize 50% " . $thumbs_image1;
                        exec($str_console);

                        $str_console = "convert " . $image_main . " -resize 158!X153! " . $thumbs_image2;
                        exec($str_console);

                        $file_name = $image_data['file_name'];
                        $table_name = 'trans_user_photos';
                        $arr_post_image = array('photo_path' => $file_name,
                            'phid' => '',
                            'ghid' => '',
                            'ims_id' => mysql_real_escape_string($intlastInsertId),
                            'user_id' => mysql_real_escape_string($user_id),
                            'photo_status' => '1',
                            'added_date' => date('Y-m-d H:i:s')
                        );
                        $user_image = $this->common_model->insertRow($arr_post_image, $table_name);
                    }
                }
            }
        }
        redirect(base_url() . 'backend/support/view/' . base64_encode($ims_id));
    }

}
