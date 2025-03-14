<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Buyplans extends CI_Controller {
    /*  An Controller having functions to manage admin user login,add edit, forgot password, profile and activating user account */

    public function __construct() {
        parent::__construct();
        $this->load->model('common_model');
        CHECK_USER_STATUS();
    }

    public function listbuyPlans() {
        /* checking admin is logged in or not */
        if (!$this->common_model->isLoggedIn()) {
            redirect(base_url() . "backend/login");
        }
        /* Getting Common data */
        $data = $this->common_model->commonFunction();
        /* checking user has privilige for the Manage Admin */
        if ($data['user_account']['role_id'] != 1) {
            /* an admin which is not super admin not privileges to access Manage Role */
            /* setting session for displaying notiication message. */
            $this->session->set_userdata("msg", "<span class='error'>You doesn't have priviliges to  manage admin!</span>");
            redirect(base_url() . "backend/home");
        }
        if (count($_POST) > 0) {
            if (isset($_POST['btn_delete_all'])) {
                /* getting all ides selected */
                $arr_user_ids = $this->input->post('checkbox');
                if (count($arr_user_ids) > 0) {
                    /* deleting the admin selected */
                    $this->common_model->deleteRows($arr_user_ids, "mst_users_buy_plan", "buy_plan_id");
                }
                $this->session->set_userdata("msg", "<span class='success'>User plan deleted successfully!</span>");
            }
        }

        /* using the admin model */
        $this->load->model('buyplans_model');
        $data['title'] = "Manage Buy Plans";
        $data['arr_user_list'] = $this->buyplans_model->getBuyPlanDetails('');
//        echo "<pre>";
//        print_r($data['arr_user_list']);
//        echo "</pre>";
        $this->load->view('backend/buy-plans/list', $data);
    }

    public function getPlans() {
        if ($this->input->post('plan_id') != "") {
            $condition = "role_id = " . $this->input->post('plan_id');
            $data['arr_plans'] = $this->common_model->getRecords("mst_plans", $fields = '', $condition, $order_by = '', $limit = '', $debug = 0);
            $arr_plans = array_shift($data['arr_plans']);

            echo json_encode($arr_plans);
        } else {
            /* if something going wrong providing error message.  */
            echo json_encode(array("error" => "1", "error_message" => "Sorry, your request can not be fulfilled this time. Please try again later"));
        }
    }

    /* function to check existancs of user name */

    public function addBuyPlans() {
        /* checking admin is logged in or not */
        if (!$this->common_model->isLoggedIn()) {
            redirect(base_url() . "backend/login");
        }
        /* getting common data */
        $data = $this->common_model->commonFunction();

        /* checking user has privilige for the Manage Admin */
        if ($data['user_account'] ['role_id'] != 1) {
            /* an admin which is not super admin not privileges to access Manage Admin */
            /* setting session for displaying notiication message. */
            $this->session->set_userdata("msg", "<span class='error'>You doesn't have priviliges to  manage admin!</span>");
            redirect(base_url() . "backend/home");
        }

        if (count($_POST) > 0) {
            if ($this->input->post('btn_submit') != "") {
                $end_date = date('Y-m-d H:i:s', strtotime('+' . $this->input->post('duration') . ' days'));
                /* user record to add */
                $arr_to_insert = array(
                    "user_id" => mysql_real_escape_string($this->input->post('user_id')),
                    "plan_id" => mysql_real_escape_string($this->input->post('plan_id')),
                    "duration" => mysql_real_escape_string($this->input->post('duration')),
                    "price" => mysql_real_escape_string($this->input->post('price')),
                    "sac_code" => mysql_real_escape_string($this->input->post('sac_code')),
                    "gst_percentage" => mysql_real_escape_string($this->input->post('gst_percentage')),
                    "plan_name" => ($this->input->post('plan_name')),
                    'plan_start_date' => date("Y-m-d H:i:s"),
                    'plan_end_date' => $end_date,
                );

                /* inserting admin details into the dabase */
                $last_insert_id = $this->common_model->insertRow($arr_to_insert, "mst_users_buy_plan");
//                $last_insert_id = '17';
                $this->load->model('buyplans_model');
                $data['arr_enq_users'] = $this->buyplans_model->getBuyPlanDetails('', $last_insert_id);

                $link = '';
                $link .= '<script src="https://use.fontawesome.com/e2d16502eb.js"></script>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';
                $link.='<link href="https://fonts.googleapis.com/css?family=Droid+Sans" rel="stylesheet">';
                $link .= '<style>
            #page-wrap { width: 297mm; height:210mm; margin: 0 auto; }
            td {
                font-size:12px;
            }

            @media all {
                .page-break	{ display: none; }
            }

            @media print {
                .page-break	{ display: block; page-break-before: always; }
            }

            body{


                font-family: "Droid Sans", sans-serif;

            }

        </style>';
                $link .= '<div id="page-wrap" >';
                $link .= '<table width="90%" style="border:1px solid;" cellspacing="0" cellpadding="0">';
                $link .= '<tr>';
                $link .= '<td style="height:30px; border-bottom:1px solid;" valign="top">';
                $link .= '<h1 style="text-align:center; font-weight:bolder; text-transform:uppercase; margin-top:3px; margin-bottom:3px;"><b>Tax Invoice</b></h1>';
                $link .= '</td>';
                $link .= '</tr>';

                $link .= '<tr>';
                $link .= '<td style="height:60px;" valign="top">';
                $link .= '<table width="100%" cellspacing="0" cellpadding="0">';
                $link .= '<tr>';
                $link .= '<td width="50%" style="height:60px;" valign="top">';
                $link .= '<p style="font-size:25px; font-weight:bolder; text-align:center;">MUSCLE TREE GoGreen</p>';
                $link .= '<p style="text-align:center; font-weight:bold; margin-bottom:0px; margin-top:4px;">DC Plaza, Nagala Park, Kolhapur. 416003</p>';
                $link .= '<p style="text-align:center; font-weight:bold; margin-top:4px; margin-bottom:0px;">Maharashtra (India)</p>';
                $link .= '<p style="text-align:center; font-weight:bold; margin-bottom:0px; margin-top:4px;"><i class="fa fa-phone" aria-hidden="true"></i> +91 8149199911, +91 8149299911</p>';
                $link .= '<p style="text-align:center; font-weight:bold;  margin-top:4px; margin-bottom:4px;"><i class="fa fa-envelope-o" aria-hidden="true"></i> muscletreegym@gmail.com | <i class="fa fa-globe" aria-hidden="true"></i> www.muscletreegym.com</p>';
                $link .= '</td>';
                $link .= '</tr>';
                $link .= '</table>';
                $link .= '</td>';
                $link .= '</tr>';
                $link .= '<tr>';
                $link .= '<td width="100%">';
                $link .= '<table width="100%" cellspacing="0" cellpadding="0">';
                $link .= '</table>';
                $link .= '</td>';
                $link .= '</tr>';
                $link .= '<tr>';
                $link .= '<td width="100%">';
                $link .= '<table width="100%" cellspacing="0" cellpadding="0">';
                $link .= '<tr>';
                $link .= '<td width="50%" style="border-top:1px solid; height:25px; border-right:1px solid; background-color:#eaeaea; text-align:center;">Details of Receiver (Billed to)</td>';
                $link .= '<td width="50%" style="border-top:1px solid; background-color:#eaeaea; height:25px; text-align:center;">Details of consignee (Shipped to)</td>';
                $link .= '</tr>';
                $link .= '</table>';
                $link .= '</td>';
                $link .= '</tr>';

                $link .= '<tr>';
                $link .= '<td width="100%">';
                $link .= '<table width="100%" cellspacing="0" cellpadding="0">';
                $link .= '<tr>';
                $link .= '<td width="50%" style="border-top:1px solid; height:110px; border-right:1px solid; padding-left:10px;" valign="top">';
                $link .= '<table >';
                $link .= '<tr>';
                $link .= '<td style="height:20px;">Name</td>';
                $link .= '<td>:</td>';
                $link .= '<td>' . $data["arr_enq_users"][0]["first_name"] . '</td>';
                $link .= '</tr>';
                $link .= '<tr>';
                $link .= '<td style="height:20px;">Address</td>';
                $link .= '<td>:</td>';
                $link .= '<td>' . $data["arr_enq_users"][0]["address"] . '</td>';
                $link .= '</tr>';
                $link .= '<tr>';
                $link .= '<td style="height:20px;">Mobile No.</td>';
                $link .= '<td>:</td>';
                $link .= '<td>' . $data["arr_enq_users"][0]["phone"] . '</td>';
                $link .= '</tr>';
                $link .= '<tr>';
                $link .= '<td style="height:20px;">GSTIN Number</td>';
                $link .= '<td>:</td>';
                $link .= '<td>' . $data["arr_enq_users"][0]["cust_gst_no"] . '</td>';
                $link .= '</tr>';
                $link .= '</table>';



                $link .= '</td>';
                $link .= '<td width="50%" style="border-top:1px solid; padding-left:10px;" valign="top">';

                $link .= '<table >';
                $link .= '<tr>';
                $link .= '<td style="height:20px;"></td>';
                $link .= '<td></td>';
                $link .= '</tr>';
                $link .= '<tr>';
                $link .= '<td style="height:20px;">Invoice Number</td>';
                $link .= '<td>:</td>';
                $link .= '<td>00000' . $data["arr_enq_users"][0]["buy_plan_id"] . '</td>';
                $link .= '</tr>';

                $link .= '<tr>';
                $link .= '<td style="height:20px;"></td>';
                $link .= '<td></td>';
                $link .= '</tr>';
                $link .= '<tr>';
                $link .= '<td style="height:20px;">Invoice Date</td>';
                $link .= '<td>:</td>';
                $link .= '<td>' . date("Y-m-d") . '</td>';
                $link .= '</tr>';
                $link .= '</table>';

                $link .= '</td>';
                $link .= '</tr>';
                $link .= '</table>';
                $link .= '</td>';
                $link .= '</tr>';


                $link .= '<tr>';
                $link .= '<td width="100%">';
                $link .= '<table cellspacing="0" cellpadding="0" width="100%">';
                $link .= '<tr>';
                $link .= '<td style="border-top:1px solid; border-right:1px solid; height:20px; text-align:center;" width="3%">No</td>';
                $link .= '<td width="24%" style="border-top:1px solid; border-right:1px solid; text-align:center; height:20px;">Description of Goods</td>';
                $link .= '<td width="8%" style="border-top:1px solid; border-right:1px solid; text-align:center; height:20px;">SAC Code</td>';
                $link .= '<td width="8%" style="border-top:1px solid; border-right:1px solid; text-align:center; height:20px;">Quantity</td>';
                $link .= '<td width="10%" style="border-top:1px solid; border-right:1px solid; text-align:center; height:20px;">RATE</td>';
                $link .= '<td width="10%" style="border-top:1px solid; border-right:1px solid; text-align:center; height:20px;">TOTAL <br> (A)</td>';
                $link .= '<td width="10%" style="border-top:1px solid; border-right:1px solid; text-align:center; height:35px;">';
                $link .= '<table width="100%" cellspacing="0" cellpadding="0">';
                $link .= '<tr>';
                $link .= '<td colspan="2" style="border-bottom:1px solid; height:15px;" width="100%">CGST  (B)</td>';
                $link .= '</tr>';
                $link .= '<tr>';
                $link .= '<td width="30%" style="border-right:1px solid; height:20px;">%</td>';
                $link .= '<td width="70%">Amount</td>';
                $link .= '</tr>';
                $link .= '</table>';

                $link .= '</td>';
                $link .= '<td width="10%" style="border-top:1px solid; border-right:1px solid; text-align:center; height:35px;">';
                $link .= '<table width="100%" cellspacing="0" cellpadding="0">';
                $link .= '<tr>';
                $link .= '<td colspan="2" style="border-bottom:1px solid; height:15px;" width="100%">SGST (C)</td>';
                $link .= '</tr>';
                $link .= '<tr>';
                $link .= '<td width="30%" style="border-right:1px solid; height:20px;">%</td>';
                $link .= '<td width="70%">Amount</td>';
                $link .= '</tr>';
                $link .= '</table>';

                $link .= '</td>';
                $link .= '<td width="10%" style="border-top:1px solid;  text-align:center; height:35px;">';
                $link .= '<table width="100%" cellspacing="0" cellpadding="0">';
                $link .= '<tr>';
                $link .= '<td colspan="2" style="border-bottom:1px solid; height:15px;" width="100%">CGST  (D)</td>';
                $link .= '</tr>';
                $link .= '<tr>';
                $link .= '<td width="30%" style="border-right:1px solid; height:20px;">%</td>';
                $link .= '<td width="70%">Amount</td>';
                $link .= '</tr>';
                $link .= '</table>';

                $link .= '</td>';
                $link .= '<td width="8%" style="border-top:1px solid; border-left:1px solid; text-align:center; height:20px;">(A+B+C+D)  TOTAL</td>';
                $link .= '</tr>';
                $link .= '</table>';
                $link .= '</td>';
                $link .= '</tr>';


                $link .= '<tr>';
                $link .= '<td width="100%">';
                $link .= '<table cellspacing="0" cellpadding="0" width="100%">';
                $link .= '<tr>';
                $link .= '<td style="border-top:1px solid; border-right:1px solid; height:30px; text-align:center;" width="3%">1.</td>';
                $link .= '<td width="24%" style="border-top:1px solid; border-right:1px solid; text-align:center; height:30px;">' . $data["arr_enq_users"][0]["plan_name"] . '</td>';
                $link .= '<td width="8%" style="border-top:1px solid; border-right:1px solid; text-align:center; height:30px;">' . $data["arr_enq_users"][0]["sac_code"] . '</td>';
                $link .= '<td width="8%" style="border-top:1px solid; border-right:1px solid; text-align:center; height:30px;">1 Nos</td>';
                $link .= '<td width="10%" style="border-top:1px solid; border-right:1px solid; text-align:center; height:30px;">' . $data["arr_enq_users"][0]["price"] . '</td>';
                $link .= '<td width="10%" style="border-top:1px solid; border-right:1px solid; text-align:center; height:30px;">' . $data["arr_enq_users"][0]["price"] . '</td>';
                $link .= '<td width="10%" style="border-top:1px solid; border-right:1px solid; text-align:center; height:30px;">';
                $link .= '<table width="100%" cellspacing="0" cellpadding="0">';
                $link .= '<tr>';
                $link .= '<td width="30%" style="border-right:1px solid; height:35px;">' . ($data["arr_enq_users"][0]["gst_percentage"] / 2) . '</td>';
                $link .= '<td width="70%">' . (($data["arr_enq_users"][0]["price"] / 100) * $data["arr_enq_users"][0]["gst_percentage"] / 2) . '</td>';
                $link .= '</tr>';
                $link .= '</table>';
                $link .= '</td>';
                $link .= '<td width="10%" style="border-top:1px solid; border-right:1px solid; text-align:center; height:30px;">';
                $link .= '<table width="100%" cellspacing="0" cellpadding="0">';
                $link .= '<tr>';
                $link .= '<td width="30%" style="border-right:1px solid; height:35px;">' . ($data["arr_enq_users"][0]["gst_percentage"] / 2) . '</td>';
                $link .= '<td width="70%">' . (($data["arr_enq_users"][0]["price"] / 100) * $data["arr_enq_users"][0]["gst_percentage"] / 2) . '</td>';
                $link .= '</tr>';
                $link .= '</table>';
                $link .= '</td>';
                $link .= '<td width="10%" style="border-top:1px solid;  text-align:center; height:35px;">';
                $link .= '<table width="100%" cellspacing="0" cellpadding="0">';
                $link .= '<tr>';
                $link .= '<td width="30%" style="border-right:1px solid; height:35px;">-</td>';
                $link .= '<td width="70%">-</td>';
                $link .= '</tr>';
                $link .= '</table>';
                $link .= '</td>';
                $link .= '<td width="8%" style="border-top:1px solid; border-left:1px solid;  text-align:center; height:30px;">' . $data["arr_enq_users"][0]["price"] + (($data["arr_enq_users"][0]["price"] / 100) * $data["arr_enq_users"][0]["gst_percentage"]) . '</td>';
                $link .= '</tr>';
                $link .= '</table>';
                $link .= '</td>';
                $link .= '</tr>';

                $link .= '<tr>';
                $link .= '<td width="100%">';
                $link .= '<table cellspacing="0" cellpadding="0" width="100%">';
                $link .= '<tr>';
                $link .= '<td style="border-top:1px solid;  height:35px; text-align:center;" width="83%"></td>';

                $link .= '<td width="10%" style="border-top:1px solid;  text-align:center; height:20px;">';
                $link .= '<table width="100%" cellspacing="0" cellpadding="0">';
                $link .= '<tr>';
                $link .= '<td width="30%" style="border-right:1px solid; height:35px;"></td>';
                $link .= '<td width="70%">Total</td>';
                $link .= '</tr>';
                $link .= '</table>';
                $link .= '</td>';
                $link .= '<td width="8%" style="border-top:1px solid; border-left:1px solid;  text-align:center; height:20px;">' . ($data["arr_enq_users"][0]["price"] + (($data["arr_enq_users"][0]["price"] / 100) * $data["arr_enq_users"][0]["gst_percentage"])) . '</td>';
                $link .= '</tr>';
                $link .= '</table>';
                $link .= '</td>';
                $link .= '</tr>';

                $link .= '<tr>';
                $link .= '<td width="100%">';
                $link .= '<table cellspacing="0" cellpadding="0" width="100%">';
                $link .= '<tr>';
                $link .= '<td style="border-top:1px solid; border-right:1px solid;  height:35px; padding-left:10px;" width="50%">';
                $link .= '<p style="text-align:left:">Declaration :</p>';
                $link .= '<p style="text-align:left:">I hereby declare that I am medically fit to use this equipments. I shall not hold the management</p>';
                $link .= '<p style="text-align:left:">responsibly for any consequence deemed to reult from the use such equipments.</p>';
                $link .= '</td>';

                $link .= '<td width="50%" style="border-top:1px solid;  text-align:center; height:20px;">';

                $link .= '</td>';
                $link .= '</tr>';


                $link .= '</table>';

                $link .= '</div>';

                $invoice_link = $link;
                $lang_id = 17;
                $reserved_words = array("||USER_NAME||" => $data['arr_enq_users'][0]['first_name'], "||INVOICE_LINK||" => $invoice_link, "||USER_EMAIL||" => $data['arr_enq_users'][0]['user_email']);
                $template_title = 'user-invoice';
                $arr_emailtemplate_data1 = $this->common_model->getEmailTemplateInfo($template_title, $lang_id, $reserved_words);
                $from1 = $data['global']['site_email'];
                $subject1 = $arr_emailtemplate_data1['subject'];
                $message1 = $arr_emailtemplate_data1['content'];
//                echo "<pre>";
//                print_r($message1);
//                echo $subject1 . "</pre>";
//                echo "to=>" . $data['arr_enq_users'][0]['user_email'];
//                die;
                $mail1 = $this->common_model->sendEmail($data['arr_enq_users'][0]['user_email'], $from1, $subject1, $message1);
                if ($mail1) {
                    $this->session->set_userdata('query_success', "Congratulation!</strong> your request has been submitted successfully.<strong>" . $this->input->post('user_email') . "</strong>.");
                }


                /* Activation link  */
                redirect(base_url() . "backend/buyplans");
            }
        }
        $arr_privileges = array();
        /* getting all privileges */
        $data['arr_privileges'] = $this->common_model->getRecords('mst_privileges');
        $data['title'] = "Add User buy plan";
        $data['arr_plans'] = $this->common_model->getRecords("mst_plans");
        $condition = "user_type = '3'";
        $data['arr_enq_users'] = $this->common_model->getRecords("mst_users", $fields = 'user_id,first_name,user_email,phone', $condition, $order_by = '', $limit = '', $debug = 0);
        $this->load->view('backend/buy-plans/add', $data);
    }

    public function editBuyPlans($edit_id = '') {
        /* checking admin is logged in or not */
        if (!$this->common_model->isLoggedIn()) {
            redirect(base_url() . "backend/login");
        }
        $data = $this->common_model->commonFunction();

        /* checking user has privilige for the Manage Admin */
        if ($data['user_account'] ['role_id'] != 1) {
            /* an admin which is not super admin not privileges to access Manage Admin */
            /* setting session for displaying notiication message. */
            $this->session->set_userdata("msg", "<span class='error'>You doesn't have priviliges to  manage admin!</span>");
            redirect(base_url() . "backend/home");
        }

        if (count($_POST) > 0) {

            if ($this->input->post('edit_id') != "") {
                if ($this->input->post('plan_id') != $this->input->post('old_plan_id')) {
                    $end_date = date('Y-m-d H:i:s', strtotime('+' . $this->input->post('duration') . ' days'));
                    /* user record to add */
                    $arr_to_update = array(
                        "user_id" => mysql_real_escape_string($this->input->post('user_id')),
                        "plan_id" => mysql_real_escape_string($this->input->post('plan_id')),
                        "duration" => mysql_real_escape_string($this->input->post('duration')),
                        "price" => mysql_real_escape_string($this->input->post('price')),
                        "gst_percentage" => mysql_real_escape_string($this->input->post('gst_percentage')),
                        "sac_code" => mysql_real_escape_string($this->input->post('sac_code')),
                        "plan_name" => ($this->input->post('plan_name')),
                        'plan_start_date' => date("Y-m-d H:i:s"),
                        'plan_end_date' => $end_date,
                    );
                    $this->common_model->updateRow("mst_users_buy_plan", $arr_to_update, array("buy_plan_id" => $this->input->post('edit_id')));
                }

                $this->load->model('buyplans_model');
                $data['arr_enq_users'] = $this->buyplans_model->getBuyPlanDetails('', $this->input->post('edit_id'));

                $link = '';
                $link .= '<script src="https://use.fontawesome.com/e2d16502eb.js"></script>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';
                $link.='<link href="https://fonts.googleapis.com/css?family=Droid+Sans" rel="stylesheet">';
                $link .= '<style>
            #page-wrap { width: 297mm; height:210mm; margin: 0 auto; }
            td {
                font-size:12px;
            }

            @media all {
                .page-break	{ display: none; }
            }

            @media print {
                .page-break	{ display: block; page-break-before: always; }
            }

            body{


                font-family: "Droid Sans", sans-serif;

            }

        </style>';
                $link .= '<div id="page-wrap" >';
                $link .= '<table width="90%" style="border:1px solid;" cellspacing="0" cellpadding="0">';
                $link .= '<tr>';
                $link .= '<td style="height:30px; border-bottom:1px solid;" valign="top">';
                $link .= '<h1 style="text-align:center; font-weight:bolder; text-transform:uppercase; margin-top:3px; margin-bottom:3px;"><b>Tax Invoice</b></h1>';
                $link .= '</td>';
                $link .= '</tr>';

                $link .= '<tr>';
                $link .= '<td style="height:60px;" valign="top">';
                $link .= '<table width="100%" cellspacing="0" cellpadding="0">';
                $link .= '<tr>';
                $link .= '<td width="50%" style="height:60px;" valign="top">';
                $link .= '<p style="font-size:25px; font-weight:bolder; text-align:center;">MUSCLE TREE GoGreen</p>';
                $link .= '<p style="text-align:center; font-weight:bold; margin-bottom:0px; margin-top:4px;">DC Plaza, Nagala Park, Kolhapur. 416003</p>';
                $link .= '<p style="text-align:center; font-weight:bold; margin-top:4px; margin-bottom:0px;">Maharashtra (India)</p>';
                $link .= '<p style="text-align:center; font-weight:bold; margin-bottom:0px; margin-top:4px;"><i class="fa fa-phone" aria-hidden="true"></i> +91 8149199911, +91 8149299911</p>';
                $link .= '<p style="text-align:center; font-weight:bold;  margin-top:4px; margin-bottom:4px;"><i class="fa fa-envelope-o" aria-hidden="true"></i> muscletreegym@gmail.com | <i class="fa fa-globe" aria-hidden="true"></i> www.muscletreegym.com</p>';
                $link .= '</td>';
                $link .= '</tr>';
                $link .= '</table>';
                $link .= '</td>';
                $link .= '</tr>';
                $link .= '<tr>';
                $link .= '<td width="100%">';
                $link .= '<table width="100%" cellspacing="0" cellpadding="0">';
                $link .= '</table>';
                $link .= '</td>';
                $link .= '</tr>';
                $link .= '<tr>';
                $link .= '<td width="100%">';
                $link .= '<table width="100%" cellspacing="0" cellpadding="0">';
                $link .= '<tr>';
                $link .= '<td width="50%" style="border-top:1px solid; height:25px; border-right:1px solid; background-color:#eaeaea; text-align:center;">Details of Receiver (Billed to)</td>';
                $link .= '<td width="50%" style="border-top:1px solid; background-color:#eaeaea; height:25px; text-align:center;">Details of consignee (Shipped to)</td>';
                $link .= '</tr>';
                $link .= '</table>';
                $link .= '</td>';
                $link .= '</tr>';

                $link .= '<tr>';
                $link .= '<td width="100%">';
                $link .= '<table width="100%" cellspacing="0" cellpadding="0">';
                $link .= '<tr>';
                $link .= '<td width="50%" style="border-top:1px solid; height:110px; border-right:1px solid; padding-left:10px;" valign="top">';
                $link .= '<table >';
                $link .= '<tr>';
                $link .= '<td style="height:20px;">Name</td>';
                $link .= '<td>:</td>';
                $link .= '<td>' . $data["arr_enq_users"][0]["first_name"] . '</td>';
                $link .= '</tr>';
                $link .= '<tr>';
                $link .= '<td style="height:20px;">Address</td>';
                $link .= '<td>:</td>';
                $link .= '<td>' . $data["arr_enq_users"][0]["address"] . '</td>';
                $link .= '</tr>';
                $link .= '<tr>';
                $link .= '<td style="height:20px;">Mobile No.</td>';
                $link .= '<td>:</td>';
                $link .= '<td>' . $data["arr_enq_users"][0]["phone"] . '</td>';
                $link .= '</tr>';
                $link .= '<tr>';
                $link .= '<td style="height:20px;">GSTIN Number</td>';
                $link .= '<td>:</td>';
                $link .= '<td>' . $data["arr_enq_users"][0]["cust_gst_no"] . '</td>';
                $link .= '</tr>';
                $link .= '</table>';



                $link .= '</td>';
                $link .= '<td width="50%" style="border-top:1px solid; padding-left:10px;" valign="top">';

                $link .= '<table >';
                $link .= '<tr>';
                $link .= '<td style="height:20px;"></td>';
                $link .= '<td></td>';
                $link .= '</tr>';
                $link .= '<tr>';
                $link .= '<td style="height:20px;">Invoice Number</td>';
                $link .= '<td>:</td>';
                $link .= '<td>00000' . $data["arr_enq_users"][0]["buy_plan_id"] . '</td>';
                $link .= '</tr>';

                $link .= '<tr>';
                $link .= '<td style="height:20px;"></td>';
                $link .= '<td></td>';
                $link .= '</tr>';
                $link .= '<tr>';
                $link .= '<td style="height:20px;">Invoice Date</td>';
                $link .= '<td>:</td>';
                $link .= '<td>' . date("Y-m-d") . '</td>';
                $link .= '</tr>';
                $link .= '</table>';

                $link .= '</td>';
                $link .= '</tr>';
                $link .= '</table>';
                $link .= '</td>';
                $link .= '</tr>';


                $link .= '<tr>';
                $link .= '<td width="100%">';
                $link .= '<table cellspacing="0" cellpadding="0" width="100%">';
                $link .= '<tr>';
                $link .= '<td style="border-top:1px solid; border-right:1px solid; height:20px; text-align:center;" width="3%">No</td>';
                $link .= '<td width="24%" style="border-top:1px solid; border-right:1px solid; text-align:center; height:20px;">Description of Goods</td>';
                $link .= '<td width="8%" style="border-top:1px solid; border-right:1px solid; text-align:center; height:20px;">SAC Code</td>';
                $link .= '<td width="8%" style="border-top:1px solid; border-right:1px solid; text-align:center; height:20px;">Quantity</td>';
                $link .= '<td width="10%" style="border-top:1px solid; border-right:1px solid; text-align:center; height:20px;">RATE</td>';
                $link .= '<td width="10%" style="border-top:1px solid; border-right:1px solid; text-align:center; height:20px;">TOTAL <br> (A)</td>';
                $link .= '<td width="10%" style="border-top:1px solid; border-right:1px solid; text-align:center; height:35px;">';
                $link .= '<table width="100%" cellspacing="0" cellpadding="0">';
                $link .= '<tr>';
                $link .= '<td colspan="2" style="border-bottom:1px solid; height:15px;" width="100%">CGST  (B)</td>';
                $link .= '</tr>';
                $link .= '<tr>';
                $link .= '<td width="30%" style="border-right:1px solid; height:20px;">%</td>';
                $link .= '<td width="70%">Amount</td>';
                $link .= '</tr>';
                $link .= '</table>';

                $link .= '</td>';
                $link .= '<td width="10%" style="border-top:1px solid; border-right:1px solid; text-align:center; height:35px;">';
                $link .= '<table width="100%" cellspacing="0" cellpadding="0">';
                $link .= '<tr>';
                $link .= '<td colspan="2" style="border-bottom:1px solid; height:15px;" width="100%">SGST (C)</td>';
                $link .= '</tr>';
                $link .= '<tr>';
                $link .= '<td width="30%" style="border-right:1px solid; height:20px;">%</td>';
                $link .= '<td width="70%">Amount</td>';
                $link .= '</tr>';
                $link .= '</table>';

                $link .= '</td>';
                $link .= '<td width="10%" style="border-top:1px solid;  text-align:center; height:35px;">';
                $link .= '<table width="100%" cellspacing="0" cellpadding="0">';
                $link .= '<tr>';
                $link .= '<td colspan="2" style="border-bottom:1px solid; height:15px;" width="100%">CGST  (D)</td>';
                $link .= '</tr>';
                $link .= '<tr>';
                $link .= '<td width="30%" style="border-right:1px solid; height:20px;">%</td>';
                $link .= '<td width="70%">Amount</td>';
                $link .= '</tr>';
                $link .= '</table>';

                $link .= '</td>';
                $link .= '<td width="8%" style="border-top:1px solid; border-left:1px solid; text-align:center; height:20px;">(A+B+C+D)  TOTAL</td>';
                $link .= '</tr>';
                $link .= '</table>';
                $link .= '</td>';
                $link .= '</tr>';


                $link .= '<tr>';
                $link .= '<td width="100%">';
                $link .= '<table cellspacing="0" cellpadding="0" width="100%">';
                $link .= '<tr>';
                $link .= '<td style="border-top:1px solid; border-right:1px solid; height:30px; text-align:center;" width="3%">1.</td>';
                $link .= '<td width="24%" style="border-top:1px solid; border-right:1px solid; text-align:center; height:30px;">' . $data["arr_enq_users"][0]["plan_name"] . '</td>';
                $link .= '<td width="8%" style="border-top:1px solid; border-right:1px solid; text-align:center; height:30px;">' . $data["arr_enq_users"][0]["sac_code"] . '</td>';
                $link .= '<td width="8%" style="border-top:1px solid; border-right:1px solid; text-align:center; height:30px;">1 Nos</td>';
                $link .= '<td width="10%" style="border-top:1px solid; border-right:1px solid; text-align:center; height:30px;">' . $data["arr_enq_users"][0]["price"] . '</td>';
                $link .= '<td width="10%" style="border-top:1px solid; border-right:1px solid; text-align:center; height:30px;">' . $data["arr_enq_users"][0]["price"] . '</td>';
                $link .= '<td width="10%" style="border-top:1px solid; border-right:1px solid; text-align:center; height:30px;">';
                $link .= '<table width="100%" cellspacing="0" cellpadding="0">';
                $link .= '<tr>';
                $link .= '<td width="30%" style="border-right:1px solid; height:35px;">' . ($data["arr_enq_users"][0]["gst_percentage"] / 2) . '</td>';
                $link .= '<td width="70%">' . (($data["arr_enq_users"][0]["price"] / 100) * $data["arr_enq_users"][0]["gst_percentage"] / 2) . '</td>';
                $link .= '</tr>';
                $link .= '</table>';
                $link .= '</td>';
                $link .= '<td width="10%" style="border-top:1px solid; border-right:1px solid; text-align:center; height:30px;">';
                $link .= '<table width="100%" cellspacing="0" cellpadding="0">';
                $link .= '<tr>';
                $link .= '<td width="30%" style="border-right:1px solid; height:35px;">' . ($data["arr_enq_users"][0]["gst_percentage"] / 2) . '</td>';
                $link .= '<td width="70%">' . (($data["arr_enq_users"][0]["price"] / 100) * $data["arr_enq_users"][0]["gst_percentage"] / 2) . '</td>';
                $link .= '</tr>';
                $link .= '</table>';
                $link .= '</td>';
                $link .= '<td width="10%" style="border-top:1px solid;  text-align:center; height:35px;">';
                $link .= '<table width="100%" cellspacing="0" cellpadding="0">';
                $link .= '<tr>';
                $link .= '<td width="30%" style="border-right:1px solid; height:35px;">-</td>';
                $link .= '<td width="70%">-</td>';
                $link .= '</tr>';
                $link .= '</table>';
                $link .= '</td>';
                $link .= '<td width="8%" style="border-top:1px solid; border-left:1px solid;  text-align:center; height:30px;">' . $data["arr_enq_users"][0]["price"] + (($data["arr_enq_users"][0]["price"] / 100) * $data["arr_enq_users"][0]["gst_percentage"]) . '</td>';
                $link .= '</tr>';
                $link .= '</table>';
                $link .= '</td>';
                $link .= '</tr>';

                $link .= '<tr>';
                $link .= '<td width="100%">';
                $link .= '<table cellspacing="0" cellpadding="0" width="100%">';
                $link .= '<tr>';
                $link .= '<td style="border-top:1px solid;  height:35px; text-align:center;" width="83%"></td>';

                $link .= '<td width="10%" style="border-top:1px solid;  text-align:center; height:20px;">';
                $link .= '<table width="100%" cellspacing="0" cellpadding="0">';
                $link .= '<tr>';
                $link .= '<td width="30%" style="border-right:1px solid; height:35px;"></td>';
                $link .= '<td width="70%">Total</td>';
                $link .= '</tr>';
                $link .= '</table>';
                $link .= '</td>';
                $link .= '<td width="8%" style="border-top:1px solid; border-left:1px solid;  text-align:center; height:20px;">' . ($data["arr_enq_users"][0]["price"] + (($data["arr_enq_users"][0]["price"] / 100) * $data["arr_enq_users"][0]["gst_percentage"])) . '</td>';
                $link .= '</tr>';
                $link .= '</table>';
                $link .= '</td>';
                $link .= '</tr>';

                $link .= '<tr>';
                $link .= '<td width="100%">';
                $link .= '<table cellspacing="0" cellpadding="0" width="100%">';
                $link .= '<tr>';
                $link .= '<td style="border-top:1px solid; border-right:1px solid;  height:35px; padding-left:10px;" width="50%">';
                $link .= '<p style="text-align:left:">Declaration :</p>';
                $link .= '<p style="text-align:left:">I hereby declare that I am medically fit to use this equipments. I shall not hold the management</p>';
                $link .= '<p style="text-align:left:">responsibly for any consequence deemed to reult from the use such equipments.</p>';
                $link .= '</td>';

                $link .= '<td width="50%" style="border-top:1px solid;  text-align:center; height:20px;">';

                $link .= '</td>';
                $link .= '</tr>';


                $link .= '</table>';

                $link .= '</div>';

                $invoice_link = $link;
                $lang_id = 17;
                $reserved_words = array("||USER_NAME||" => $data['arr_enq_users'][0]['first_name'], "||INVOICE_LINK||" => $invoice_link, "||USER_EMAIL||" => $data['arr_enq_users'][0]['user_email']);
                $template_title = 'user-invoice';
                $arr_emailtemplate_data1 = $this->common_model->getEmailTemplateInfo($template_title, $lang_id, $reserved_words);
                $from1 = $data['global']['site_email'];
                $subject1 = $arr_emailtemplate_data1['subject'];
                $message1 = $arr_emailtemplate_data1['content'];
                $mail1 = $this->common_model->sendEmail($data['arr_enq_users'][0]['user_email'], $from1, $subject1, $message1);
            }
            $this->session->set_userdata("msg", "<span class='success'>User plan updated successfully!</span>");
            redirect(base_url() . "backend/buyplans");
        }
        $arr_privileges = array();
        /* getting all privileges  */
        $data['arr_privileges'] = $this->common_model->getRecords('mst_privileges');
        /* getting admin details from $edit_id from function parameter */
        $data['arr_user_detail'] = $this->common_model->getRecords("mst_users_buy_plan", "", array("buy_plan_id" => intval(base64_decode($edit_id))));
        /* single row fix */
        $data['arr_user_detail'] = end($data['arr_user_detail']);
        $data['title'] = "edit User plan";
        $data['edit_id'] = $edit_id;
        $data['arr_roles'] = $this->common_model->getRecords("mst_role");
        $data['arr_plans'] = $this->common_model->getRecords("mst_plans");
        $condition = "user_type = '3'";
        $data['arr_enq_users'] = $this->common_model->getRecords("mst_users", $fields = 'user_id,first_name,user_email,phone', $condition, $order_by = '', $limit = '', $debug = 0);

        $this->load->view('backend/buy-plans/edit', $data);
    }

    public function viewBuyPlans($view_id = '') {
        /* checking admin is logged in or not */
        if (!$this->common_model->isLoggedIn()) {
            redirect(base_url() . "backend/login");
        }
        $data = $this->common_model->commonFunction();

        /* checking user has privilige for the Manage Admin */
        if ($data['user_account'] ['role_id'] != 1) {
            /* an admin which is not super admin not privileges to access Manage Admin */
            /* setting session for displaying notiication message. */
            $this->session->set_userdata("msg", "<span class='error'>You doesn't have priviliges to  manage admin!</span>");
            redirect(base_url() . "backend/home");
        }

        if (count($_POST) > 0) {
            if ($this->input->post('view_id') != "") {
                if ($this->input->post('plan_id') != $this->input->post('old_plan_id')) {
                    $end_date = date('Y-m-d H:i:s', strtotime('+' . $this->input->post('duration') . ' days'));
                    /* user record to add */
                    $arr_to_update = array(
                        "user_id" => mysql_real_escape_string($this->input->post('user_id')),
                        "plan_id" => mysql_real_escape_string($this->input->post('plan_id')),
                        "duration" => mysql_real_escape_string($this->input->post('duration')),
                        "price" => mysql_real_escape_string($this->input->post('price')),
                        "sac_code" => mysql_real_escape_string($this->input->post('sac_code')),
                        "gst_percentage" => mysql_real_escape_string($this->input->post('gst_percentage')),
                        "plan_name" => ($this->input->post('plan_name')),
                        'plan_start_date' => date("Y-m-d H:i:s"),
                        'plan_end_date' => $end_date,
                    );
                    $this->common_model->updateRow("mst_users_buy_plan", $arr_to_update, array("buy_plan_id" => $this->input->post('edit_id')));
                }
            }
            $this->session->set_userdata("msg", "<span class='success'>User plan updated successfully!</span>");
            redirect(base_url() . "backend/buyplans");
        }
        $arr_privileges = array();
        /* getting all privileges  */
        $data['arr_privileges'] = $this->common_model->getRecords('mst_gymtypes');
        $arr_role_privileges = array();
        $arr_role_privileges = $this->common_model->getRecords("trans_plans_privileges", "privilege_id", array("role_id" => intval(base64_decode($view_id))));
//        echo base64_decode($view_id) . "<pre>";
//        print_r($arr_role_privileges);
//        echo "</pre>";
        foreach ($arr_role_privileges as $role_privilege) {
            $data['arr_role_privileges'][] = $role_privilege['privilege_id'];
        }

        /* getting admin details from $edit_id from function parameter */
        $data['arr_user_detail'] = $this->common_model->getRecords("mst_users_buy_plan", "", array("buy_plan_id" => intval(base64_decode($view_id))));
        /* single row fix */
        $data['arr_user_detail'] = end($data['arr_user_detail']);
        $data['title'] = "View User plan";
        $data['view_id'] = base64_decode($view_id);
        //  $data['arr_roles'] = $this->common_model->getRecords("mst_role");
        //  $data['arr_plans'] = $this->common_model->getRecords("mst_plans");
//
        // $condition = "user_id = " . $data['arr_user_detail']['user_id'];
        // $data['arr_enq_users'] = $this->common_model->getRecords("mst_users", $fields = 'user_id,first_name,user_email,phone,dob,gender', $condition, $order_by = '', $limit = '', $debug = 0);
        $this->load->model('buyplans_model');
        $data['arr_enq_users'] = $this->buyplans_model->getBuyPlanDetails('', $data['view_id']);

        /* echo '<pre>';
          print_r($data);
          // print_r($data['arr_enq_users']);
          die; */
        $this->load->view('backend/buy-plans/view', $data);
    }

}
