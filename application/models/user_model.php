<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_Model extends CI_Model {

    public function getUserInformation($table_to_pass, $fields_to_pass, $condition_to_pass, $order_by_to_pass = '', $limit_to_pass = '', $debug_to_pass = 0) {
        $this->db->select($fields_to_pass, FALSE);
        $this->db->from($table_to_pass);
        if ($condition_to_pass != '')
            $this->db->where($condition_to_pass);

        if ($order_by_to_pass != '')
            $this->db->order_by($order_by_to_pass);

        if ($limit_to_pass != '')
            $this->db->limit($limit_to_pass);

        $query = $this->db->get();

        if ($debug_to_pass)
            echo $this->db->last_query();

        return $query->result_array();
    }

#function to get user list from the database
public function getRecentUser() {
        $this->db->select('*');
        $this->db->from('mst_users as u');
        $this->db->join('mst_role as r', 'u.role_id = r.role_id', 'left');
        $this->db->order_by('u.user_id','DESC');
        $this->db->where("u.user_type", 1);
       
        $result = $this->db->get();
        $arr = $result->result_array();
     
           //Get users count
       foreach($arr as $key=>$sponser){
            $this->db->select('*');
            $this->db->from('mst_users');
            $this->db->where('sponser_id', $sponser['user_sponser_id']);
            $this->db->where("user_type", 1);
            $this->db->where("is_active", 'No');
            $query = $this->db->get();
            $arr1 = $query->num_rows();
            //$arr1= $query->result_array();
          
            $arr[$key]['inactive_user_member']= $arr1;
           }
          
           //Get users count
       foreach($arr as $key=>$sponser){
            $this->db->select_sum('form_count');
            $this->db->from('trans_users_form');
            $this->db->where('user_sponser_id', $sponser['user_sponser_id']);
            $query = $this->db->get();
            $arr2= $query->result_array();
            $arr2 = end($arr2);
            $arr[$key]['user_count']= $arr2['form_count'];
           }

        return $arr;
    }
    
    public function getUserDetails($user_id = '') {
        $this->db->select('*');
        $this->db->from('mst_users as u');
        $this->db->join('mst_role as r', 'u.role_id = r.role_id', 'left');
        if ($user_id != '') {
            $this->db->where("u.user_id", $user_id);
        }
        $this->db->order_by('u.user_id','DESC');
        $this->db->where("u.user_type",'1');
        
        $result = $this->db->get();
        $arr = $result->result_array();
//          echo "ss<pre>";print_r($arr);die;
       foreach($arr as $key=>$sponser){
            $this->db->select_sum('form_count');
            $this->db->from('trans_users_form');
            $this->db->where('user_sponser_id', $sponser['user_sponser_id']);
            $query = $this->db->get();
            $arr1= $query->result_array();
            $arr1 = end($arr1);
            $arr[$key]['user_count']= $arr1['form_count'];
           }

        return $arr;
    }
    public function getUserMembersDetails($user_id = '') {
        $this->db->select('*');
        $this->db->from('mst_users as u');
        $this->db->join('mst_role as r', 'u.role_id = r.role_id', 'left');
        if ($user_id != '') {
            $this->db->where("u.user_id", $user_id);
        }
        $this->db->order_by('u.user_id','DESC');
        $this->db->where("u.user_type", 1);
       
        $result = $this->db->get();
        $arr = $result->result_array();
        //Users member
       foreach($arr as $key=>$sponser){
            $this->db->select('*');
            $this->db->from('mst_users');
            $this->db->where('sponser_id', $sponser['user_sponser_id']);
            $query = $this->db->get();
            $arr1= $query->result_array();
            $arr[$key]['user_members']= $arr1;
           }
           //Users transactions
       foreach($arr as $key=>$sponser){
            $this->db->select('t.*,u.full_name');
            $this->db->from('trans_user_transaction as t');
            $this->db->join('mst_users as u', 't.to_id = u.user_sponser_id', 'left');
            $this->db->where('t.user_sponser_id', $sponser['user_sponser_id']);
            $this->db->order_by('t.trans_id','DESC');
            $query = $this->db->get();
            $arr1= $query->result_array();
            $arr[$key]['user_trans']= $arr1;
           }

        return $arr;
    }

    public function insertUserDeleteRequestInformation($table, $fields, $debug_to_pass = 0) {
        if ($debug_to_pass)
            echo $this->db->last_query();

        $this->db->insert($table, $fields);
        return $this->db->insert_id();
    }
    
    #function to get user log list

    public function getUserLogDetails($user_id = '') {
        $this->db->select('*');
        $this->db->from('user_sign_in_log');
        $this->db->order_by('log_id desc');
        $result = $this->db->get();
        return $result->result_array();
    }

    public function getUserForumDetails() {
        $this->db->select('u.user_id as main_user_id,u.user_name,u.full_name,u.user_sponser_id,i.*');
        $this->db->from('mst_ims as i');
        $this->db->join('mst_users as u', 'u.user_id = i.user_id', 'right');
        $this->db->where("i.type", 'Forum');
//        $this->db->where("i.parent_id", '0');
        $this->db->order_by("i.createddate", 'DESC');
        $result = $this->db->get();
        return $result->result_array();
    }

    public function getEnquiryUserDetails() {
        $this->db->select('u.user_id,u.user_email,u.gender,u.full_name,u.user_sponser_id,u.mobile_no,u.address');
        $this->db->from('mst_users as u');
        $this->db->where('u.user_type', '3');
        $this->db->order_by("u.user_id", 'DESC');
        $result = $this->db->get();
        return $result->result_array();
    }

    public function getUserForumDetailsById($id) {
        $this->db->select('u.user_name,u.gender,u.profile_picture,u.full_name,u.user_sponser_id,u.mobile_no,u.user_email,i.*');
        $this->db->from('mst_ims as i');
        $this->db->join('mst_users as u', 'u.user_id = i.user_id', 'left');
        $this->db->where("i.ims_id", $id);
        $this->db->where("i.type", 'Forum');
        $this->db->where("i.parent_id", '0');
        $result = $this->db->get();
        return $result->result_array();
    }

    public function getUserForumReplyDetailsById($id) {
        $this->db->select('u.user_name,u.full_name,i.*');
        $this->db->from('mst_ims as i');
        $this->db->join('mst_users as u', 'u.user_id = i.user_id', 'left');
//        $this->db->where("i.ims_id", $id);
        $this->db->where("i.type", 'Forum');
        $this->db->where("i.parent_id", $id);
        $result = $this->db->get();
        return $result->result_array();
    }

    public function getUserForumReplydateDetailsById($id) {
        $this->db->select('u.user_name,u.full_name,i.*');
        $this->db->from('mst_ims as i');
        $this->db->join('mst_users as u', 'u.user_id = i.user_id', 'left');
        $this->db->where("i.type", 'Forum');
        $this->db->where("i.parent_id", $id);
        $this->db->order_by('ims_id', 'desc');
        $result = $this->db->get();
        return $result->result_array();
    }

    public function getPhotoDetailsById($id, $user_id) {
        $this->db->select('*');
        $this->db->from('trans_user_photos');
        $this->db->where("ims_id", $id);
        $this->db->where("user_id", $user_id);
        $result = $this->db->get();
        return $result->result_array();
    }
    
    public function getUserReportDetails($start_date = '', $end_date = '', $request_status = '', $city = '') {

        $strJoinCondition = "WHERE u.user_type='1' AND ";
        if ($request_status == '3') {
            $strJoinCondition .= "(u.activate_date >= '" . $start_date . "' AND u.activate_date <= '" . $end_date . "')";
        } else if ($request_status == '2'){
            $strJoinCondition .= "(u.form_submit_date >= '" . $start_date . "' AND u.form_submit_date <= '" . $end_date . "')";
        }else{
            $strJoinCondition .= "(u.register_date >= '" . $start_date . "' AND u.register_date <= '" . $end_date . "')";
        }
        if($city!=''){
            $strJoinCondition .= ' AND (u.city like "%'.$city.'%" OR u.pin_code="'.$city.'")';
        }
        
        $SQL_Query = "SELECT u.*,mu.full_name as sfull_name FROM " . $this->db->dbprefix . "mst_users u"
                . " INNER JOIN " . $this->db->dbprefix . "mst_users mu ON mu.user_sponser_id = u.sponser_id $strJoinCondition order by user_id DESC";

        $arr = $this->db->query($SQL_Query)->result_array();
         foreach($arr as $key=>$sponser){
             
            $this->db->select('user_id');
            $this->db->from('mst_users');
            $this->db->where('sponser_id', $sponser['user_sponser_id']);
            $query = $this->db->get();
            $arr1= $query->result_array();
            $arr1 = count($arr1);
           
            $arr[$key]['reg_user_count']= $arr1;
            
            $this->db->select_sum('form_count');
            $this->db->from('trans_users_form');
            $this->db->where('user_sponser_id', $sponser['user_sponser_id']);
            $query = $this->db->get();
            $arr2= $query->result_array();
            $arr2 = end($arr2);
            $arr[$key]['user_count']= $arr2['form_count'];
           }
           return $arr;
    }
    public function getUserDonationIncomeReport($start_date = '', $end_date = '',$user_id = '') {

        $strJoinCondition = "WHERE mu.user_type='1' AND ";
         if($user_id!=''){
           $strJoinCondition .= " t.to_id='" . $user_id . "' AND ";
        }
       
        $strJoinCondition .= "(transaction_date >= '" . $start_date . "' AND transaction_date <= '" . $end_date . "')";
       
        
        $SQL_Query = "SELECT * FROM " . $this->db->dbprefix . "trans_user_transaction t "
                . " INNER JOIN " . $this->db->dbprefix . "mst_users mu ON mu.user_sponser_id=t.to_id $strJoinCondition order by trans_id DESC";

        return $this->db->query($SQL_Query)->result_array();
    }

}

?>