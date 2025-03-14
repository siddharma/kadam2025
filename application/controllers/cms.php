<?php

error_reporting(0);
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class CMS extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('common_model');
        $this->load->model('cms_model');
        CHECK_USER_STATUS();
    }

    function contactUs() {

        /* Getting Common data */
        $data = $this->common_model->commonFunction();
        $data['user_session'] = $this->session->userdata('user_account');
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
                    'cust_gst_no' => mysql_real_escape_string($this->input->post('cust_gst_no')),
                    'address' => mysql_real_escape_string($this->input->post('address')),
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
        }
        $this->load->view('front/cms/contact_us');
        //$this->load->view('front/includes/footer');
    }

}

?>
