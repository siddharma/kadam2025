<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
  | -------------------------------------------------------------------------
  | URI ROUTING
  | -------------------------------------------------------------------------
  | This file lets you re-map URI requests to specific controller functions.
  |
  | Typically there is a one-to-one relationship between a URL string
  | and its corresponding controller class/method. The segments in a
  | URL normally follow this pattern:
  |
  |	example.com/class/method/id/
  |
  | In some instances, however, you may want to remap this relationship
  | so that a different class/function is called than the one
  | correosponding to the URL.
  |
  | Please see the user guide for complete details:
  |
  |	http://codeigniter.com/user_guide/general/routing.html
  |
  | -------------------------------------------------------------------------
  | RESERVED ROUTES
  | -------------------------------------------------------------------------
  |
  | There area two reserved routes:
  |
  |	$route['default_controller'] = 'welcome';
  |
  | This route indicates which controller class should be loaded if the
  | URI contains no data. In the above example, the "welcome" class
  | would be loaded.
  |
  |	$route['404_override'] = 'errors/page_missing';
  |
  | This route will tell the Router what URI segments to use if those fovided
  | in the URL cannot be matched to a valid route.
  |
 */

/* --------------  admin side route -------------------- */
/* admin login, dashboard and forgot password */

$route['default_controller'] = 'welcome';
$route['signup'] = 'register/userRegistration';
$route['getuserinfo'] = 'register/getSponserUserInfo';
$route['signin'] = "register/signin";
$route['dashboard'] = "user_account/profile";
$route['logout'] = "user_account/logout";
$route['reset-password'] = "register/resetPassword";
$route['recover-password/(:any)'] = "register/recoverPassword/$1";
$route['editprofile'] = "user_account/editProfile";
$route['update-pass'] = "user_account/updatePassword";
$route['chkpass'] = "user_account/chkUserPassword";
$route['test'] = 'welcome/myaddition';
$route['pnrupdate'] = "user_account/memberPNRDetails";
$route['welcome-letter'] = "user_account/welcomeLetter";
//Generate pdf
$route['generate-pdf'] = "user_pdf/welcomePDF";
$route['form1'] = "user_pdf/form1PDF";
$route['form2'] = "user_pdf/form2PDF";
$route['form3'] = "user_pdf/form3PDF";
$route['form4'] = "user_pdf/form4PDF";
$route['direct'] = "team_details/directList";
$route['member'] = "team_details/memberList";
$route['level'] = "team_details/levelList";
$route['level/(:any)'] = "team_details/levelList/$1";

$route['compose'] = "support/composeMessage";
$route['message-list'] = "support/listMessage";
$route['view-message/(:any)'] = "support/viewMessage/$1";
$route['income'] = "team_details/totalIncome";
$route['donation'] = "team_details/totalDonation";

// User admin Report
$route['report/userlist'] = "reports/userReport";
$route['report/income'] = "reports/userDonationIncome";
$route['report/userlog'] = "user/log_list";




$route['backend'] = "admin/index";
$route['backend/login'] = "admin/index";
$route['backend/index'] = "admin/index";
$route['backend/home'] = "admin/home";
$route['backend/dashboard'] = "admin/home";
$route['backend/log-out'] = "admin/logout";
$route['backend/forgot-password'] = "admin/forgotPassword";
$route['backend/forgot-password-email'] = "admin/checkForgotPasswordEmail";
$route['backend/reset-admin-password/([0-9]+)'] = "admin/resetAdminPassword/$1";
$route['backend/reset-admin-password-action'] = "admin/resetAdminPasswordAction";

/* admin login, dashboard and forgot password end here */
/* Manage User Start Here */
$route['backend/user/mainlist'] = "user/listMainUser";
$route['backend/user/list'] = "user/listUser";
$route['backend/user/log-list'] = "user/log_list";
$route['backend/user/deletion-list'] = "user/deletion_list";
$route['backend/user/change-status'] = "user/changeStatus";
$route['backend/user/change-member-status'] = "user/changeMemberStatus";
$route['backend/user/add'] = "user/addUser";
$route['backend/user/check-user-username'] = "user/checkUserUsername";
$route['backend/user/check-user-email'] = "user/checkUserEmail";
$route['backend/user/account-activate/(:any)'] = "user/activateAccount/$1";
$route['backend/user/edit/(:any)'] = "user/editUser/$1";
$route['backend/user/view/(:any)'] = "user/userProfile/$1";
//$route['backend/user/view-request/(:any)'] = "user/userViewRequest/$1";
$route['backend/user/deactivate'] = "user/deactivateUser";
/* Manage User End Here */
/* Manage Admin  */
$route['backend/admin/list'] = "admin/listAdmin";
$route['backend/admin/change-status'] = "admin/changeStatus";
$route['backend/admin/add'] = "admin/addAdmin";
$route['backend/admin/check-admin-username'] = "admin/checkAdminUsername";
$route['backend/admin/check-admin-email'] = "admin/checkAdminEmail";
$route['backend/admin/account-activate/(:any)'] = "admin/activateAccount/$1";
$route['backend/admin/edit/(:any)'] = "admin/editAdmin/$1";
$route['backend/admin/profile'] = "admin/adminProfile";
/* edit subadmin */
$route['backend/admin/edit-profile'] = "admin/editProfile";
/* Manage Admin End Here */

/* Manage email template routes */
$route['backend/email-template/list'] = "email_template/index";
$route['backend/edit-email-template/(:any)'] = "email_template/editEmailTemplate/$1";
/* Manage email template routes */

/* ----------------------strat : front end cms section-------------------------- */
$route['contact-us'] = "cms/contactUs";
$route['backend/support'] = "support/supportList";
$route['backend/support/users'] = "support/userList";
$route['backend/support/edit/(:any)'] = "support/editUser/$1";
$route['backend/support/add'] = "support/add";
$route['backend/support/view/(:any)'] = "support/viewSupportList/$1";
$route['backend/support/reply/(:any)'] = "support/replySupportMesssageByAdmin/$1";

/* Global Settings:   */
$route['backend/global-settings/list'] = "global_setting/listGlobalSettings";
$route['backend/global-settings/edit/(:any)'] = "global_setting/editGlobalSettings/$1/$2";
$route['backend/global-settings/edit-parameter-language/(:any)'] = "global_setting/editParameterLanguage/$1";
$route['backend/global-settings/get-global-parameter-language'] = "global_setting/getGlobalParameterLanguage";
/* Global Settings End Here */

/* Manage Role: */
$route['backend/role/list'] = "role/listRole";
$route['backend/role/edit/(:any)'] = "role/addRole/$1";
$route['backend/role/add'] = "role/addRole";
$route['backend/role/check-role'] = "role/checkRole";

/* Manage user Plans: */
$route['backend/plans/list'] = "plans/listPlans";
$route['backend/plans/edit/(:any)'] = "plans/addPlans/$1";
$route['backend/plans/add'] = "plans/addPlans";
$route['backend/plans/check-plans'] = "plans/checkPlans";

$route['backend/buyplans'] = "buyplans/listbuyPlans";
$route['backend/buyplans/getPlans'] = "buyplans/getPlans";
$route['backend/buyplans/add'] = "buyplans/addBuyPlans";
$route['backend/buyplans/edit/(:any)'] = "buyplans/editBuyPlans/$1";
$route['backend/buyplans/view/(:any)'] = "buyplans/viewBuyPlans/$1";

$route['backend/measurements'] = "measurement/listmeasurements";
$route['backend/measurements/getUserPlans'] = "measurement/getUserPlans";
$route['backend/measurements/getPlans'] = "measurement/getPlans";
$route['backend/measurements/add'] = "measurement/addMeasurement";
$route['backend/measurements/edit/(:any)'] = "measurement/editBuyPlans/$1";

/* ----------------------end : front end cms section---------------------------- */
$route['404_override'] = '';
/* End of file routes.php */
/* Location: ./application/config/routes.php */
