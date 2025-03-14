<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function GET_TIMEDIFF($dbTime)
{
    $CI =& get_instance();
	$getUpdateTime = $dbTime;
	
	$query =  $CI->db->query("SELECT CURTIME() as  today_time");
	if ($query->num_rows() > 0)
	{
		$row = $query->row();
		$current_time=$row->today_time;
	} 
	$time1 = strtotime($getUpdateTime);
	$time2 = strtotime($current_time);
	$seconds = $time2  -$time1;
	$days    = floor($seconds / 86400);
	$hours   = floor(($seconds - ($days * 86400)) / 3600);
	$minutes = floor(($seconds - ($days * 86400) - ($hours * 3600))/60);
	$seconds = floor(($seconds - ($days * 86400) - ($hours * 3600) - ($minutes*60)));
	
	return $days;
}

#check user details if user delete or block by super admin
function CHECK_USER_STATUS()
{
	$CI=& get_instance();
	$user_account = $CI->session->userdata('user_account');
	
	if(isset($user_account['user_id']) && $user_account['user_id'] != '')
	{
		
		$where = array("user_id"=> $user_account['user_id']);
		$arr_user=$CI->db->get_where('mst_users',$where)->row_array();
		#if delete user
		if(empty($arr_user))	
		{
			 $CI->session->unset_userdata('user_account');
			 $CI->session->set_userdata("msg-error", "Sorry your account has been deleted by admin.");
			 redirect(base_url());	
		}
		else
		{
			#if user blocked by admin
			if($arr_user['user_status']=='0' || $arr_user['user_status']=='2')	
			{
				$CI->session->unset_userdata('user_account');
				
				if($arr_user['user_status']==2)
					$CI->session->set_userdata('msg-error','Your account has been blocked by admin.');
				else
					$CI->session->set_userdata('msg-error','Your account has been inactivated by admin.');
					
					redirect(base_url());
			}
				
		}
	}
}
	
