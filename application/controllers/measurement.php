<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Measurement extends CI_Controller {
    /*  An Controller having functions to manage admin user login,add edit, forgot password, profile and activating user account */

    public function __construct() {
        parent::__construct();
        $this->load->model('common_model');
        CHECK_USER_STATUS();
    }

    public function listmeasurements() {
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
        $this->load->view('backend/measurement/list', $data);
    }

    public function getUserPlans() {
        if ($this->input->post('user_id') != "") {
            $condition = "user_id = " . $this->input->post('user_id');
            $data['arr_plans'] = $this->common_model->getRecords("mst_users_buy_plan", $fields = '', $condition, $order_by = '', $limit = '', $debug = 0);
            $arr_plans = array_shift($data['arr_plans']);

            echo json_encode($arr_plans);
        } else {
            /* if something going wrong providing error message.  */
            echo json_encode(array("error" => "1", "error_message" => "Sorry, your request can not be fulfilled this time. Please try again later"));
        }
    }

    /* function to check existancs of user name */

    public function addMeasurement() {
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
                    "plan_name" => ($this->input->post('plan_name')),
                    'plan_start_date' => date("Y-m-d H:i:s"),
                    'plan_end_date' => $end_date,
                );
                /* inserting admin details into the dabase */
                $last_insert_id = $this->common_model->insertRow($arr_to_insert, "mst_users_buy_plan");
                /* Activation link  */
                redirect(base_url() . "backend/buyplans");
            }
        }
        $arr_privileges = array();
        /* getting all privileges */
        $data['arr_privileges'] = $this->common_model->getRecords('mst_privileges');
        $data['title'] = "Add User measurement";
        $data['arr_plans'] = $this->common_model->getRecords("mst_plans");
        $condition = "user_type = '3'";
        $data['arr_enq_users'] = $this->common_model->getRecords("mst_users", $fields = 'user_id,first_name,user_email,phone', $condition, $order_by = '', $limit = '', $debug = 0);
        $this->load->view('backend/measurement/add', $data);
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

}
