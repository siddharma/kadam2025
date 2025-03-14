<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class BuyPlans_Model extends CI_Model {
    #function to get admin list from the database

    public function getBuyPlanDetails($user_id = '', $view_id = '') {
        $this->db->select('u.user_id,u.first_name,u.user_email,u.phone,u.address,u.cust_gst_no,r.*');
        $this->db->from('mst_users as u');
        $this->db->join('mst_users_buy_plan as r', 'u.user_id = r.user_id', 'right');

        if ($user_id != '') {
            $this->db->where("u.user_id", $user_id);
        }
        if ($view_id != '') {
            $this->db->where("r.buy_plan_id", $view_id);
        }


        $result = $this->db->get();
        return $result->result_array();
    }

}
