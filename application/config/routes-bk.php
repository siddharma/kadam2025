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
$route['backend'] = "admin/index";
$route['backend/login'] = "admin/index";
$route['backend/index'] = "admin/index";
$route['backend/home'] = "admin/home";
$route['backend/dashboard'] = "admin/home";
$route['backend/log-out'] = "admin/logout";
$route['backend/forgot-password'] = "admin/forgotPassword";
$route['backend/forgot-password-email'] = "admin/checkForgotPasswordEmail";
/* 5 feb */
$route['backend/reset-admin-password/([0-9]+)'] = "admin/resetAdminPassword/$1";
$route['backend/reset-admin-password-action'] = "admin/resetAdminPasswordAction";

/* admin login, dashboard and forgot password end here */

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

/* Manage Role End Here */

/* Manage Admin  */
$route['backend/admin/list'] = "admin/listAdmin";
$route['backend/admin/change-status'] = "admin/changeStatus";
$route['backend/admin/add'] = "admin/addAdmin";
$route['backend/admin/check-admin-username'] = "admin/checkAdminUsername";
$route['backend/admin/check-admin-email'] = "admin/checkAdminEmail";
$route['backend/admin/account-activate/(:any)'] = "admin/activateAccount/$1";
$route['backend/admin/edit/(:any)'] = "admin/editAdmin/$1";
$route['backend/admin/profile'] = "admin/adminProfile";
/* 27 feb edit subadmin */
$route['backend/admin/edit-profile'] = "admin/editProfile";
/* Manage Admin End Here */

/* Manage email template routes */
$route['backend/email-template/list'] = "email_template/index";
$route['backend/edit-email-template/(:any)'] = "email_template/editEmailTemplate/$1";
/* Manage email template routes */

/* Start : Manage currency */
$route['backend/currency/list'] = "currency/index";
$route['backend/currency/edit-currency/([0-9]+)'] = "currency/editCurrency/$1";
$route['backend/currency/edit-currency'] = "currency/editCurrency";
$route['backend/currency/add-currency'] = "currency/addCurrency";
/* end :manage currency */

/* Testimonial Routs backend */
$route['backend/testimonial/list'] = "testimonial/listTestimonial";
$route['backend/testimonial/change-status'] = "testimonial/changeStatus";
$route['backend/testimonial/add/(:any)'] = "testimonial/addTestimonial/$1";
$route['backend/testimonial/add'] = "testimonial/addTestimonial";
/* Testimonial Routs bacend end here */

/* Manage User Start Here */
$route['backend/user/list'] = "user/listUser";
$route['backend/user/log-list'] = "user/log_list";
$route['backend/user/deletion-list'] = "user/deletion_list";
$route['backend/user/change-status'] = "user/changeStatus";
$route['backend/user/add'] = "user/addUser";
$route['backend/user/check-user-username'] = "user/checkUserUsername";
$route['backend/user/check-user-email'] = "user/checkUserEmail";
$route['backend/user/chkphone-duplicate'] = "user/checkPhoneDuplicate";
$route['backend/user/account-activate/(:any)'] = "user/activateAccount/$1";
$route['backend/user/edit/(:any)'] = "user/editUser/$1";
$route['backend/user/view/(:any)'] = "user/userProfile/$1";
$route['backend/user/view-request/(:any)'] = "user/userViewRequest/$1";
$route['backend/user/deactivate'] = "user/deactivateUser";
/* Manage User End Here */

/* Manage trusted people start here */
$route['backend/accounts/trusted'] = "account/trusted_to";
/* Manage trusted people end here */

/* Manage advertise start here */
$route['backend/advertise'] = "advertise/list_advertisement";
$route['backend/advertise/add'] = "advertise/add_advertisement";
$route['backend/advertise/add-action'] = "advertise/add_advertisement_action";
$route['backend/advertise/edit/(:any)'] = "advertise/edit_advertisement/$1";
$route['backend/advertise/edit-action'] = "advertise/edit_advertisement_action";
/* Manage advertise end here */


/* Manage Help */

$route["backend/request-help/list"] = "help_provider/listProvider";
$route["backend/request-help/edit/(:any)"] = "help_provider/editHelp/$1";
$route["backend/request-help/view/(:any)"] = "help_provider/viewRequest/$1";



$route["get-matched-help-data"] = "help_provider/getMatchedHelpData";
$route["assign-help-request"] = "help_provider/assignRequestTogetRequestor";
/* Manage Help */



/* --------------  admin side route end here -------------------- */

/* --------------  user module route start here -------------------- */

$route['default_controller'] = "home";

/* User login and registration section start */
$route['add-user'] = "register/managerReferUserRgistration";
$route['signup'] = "register/userRegistration";
$route['mobileVerification'] = "register/mobileVerification";
$route['ajax/onapi/form/register'] = "register/userRegistration";


$route['fb-signup'] = "register/fbUserRegistration";
$route['chk-email-duplicate'] = "register/chkEmailDuplicate";
$route['chk-email-exist'] = "register/chkEmailExist";
$route['generate-captcha/(:any)'] = "register/generateCaptcha/$1";

$route['ajax/onapi/captcha/get'] = "register/generateCaptcha/$1";
$route['check-captcha'] = "register/checkCaptcha";
$route['ajax/onapi/check-captcha'] = "register/checkCaptchaAjax";
$route['chk-username-duplicate'] = "register/chkUserDuplicate";
$route['chk-phone-duplicate'] = "register/chkMobileDuplicate";
$route['verify-phone'] = "register/verifyPhone";
$route['user-activation/(:any)'] = "register/userActivation/$1";
//$route['user-activation/(:any)'] = "register/userActivation/$1";
$route['signin'] = "register/signin";
$route['ajax/onapi/signin'] = "register/signin";
$route['password-recovery'] = "register/passwordRecovery";
$route['terms-and-conditions/(:any)'] = "register/termsConditions/$1/$2";
/* forgot password 4 feb 14 */
$route['reset-password/([0-9]+)'] = "register/resetPassword/$1";
/* 5 feb */
$route['reset-password-action'] = "register/resetPasswordAction";
/* 25 feb */
$route['resend-verfication-link/([0-9]+)'] = 'register/resendEmailVerficationLink/$1';


/* User login and registration section end */
/* User account section start */
$route['profile'] = "user_account/profile";
$route['profile/edit'] = "user_account/edit_profile";
$route['profile/delete'] = "user_account/delete_profile";
$route['profile/delete-request'] = "user_account/delete_request";
$route['chk-edit-email-duplicate'] = "user_account/chkEditEmailDuplicate";
$route['chk-edit-username-duplicate'] = "user_account/chkEditUSernameDuplicate";
$route['profile/account-setting'] = "user_account/account_setting";
$route['profile/account-setting/(:any)'] = "user_account/account_setting/$1";
$route['profile/account-setting-list'] = "user_account/account_setting/0/list";
$route['profile/account-delete/(:any)'] = "user_account/account_delete/$1";
$route['profile/edit-user-password-chk'] = "user_account/edit_user_password_chk";
$route['profile/change-profile-picture'] = "user_account/change_profile_picture";
$route['profile/change-profile-picture-action'] = "user_account/change_profile_picture_action";
$route['referrals'] = "user_account/referrals_list";
$route['referrals/(:any)'] = "user_account/referrals_list/$1";
$route['logout'] = "user_account/logout";



$route['add-request'] = "help_provider/addRequest";
$route['add-account'] = "help_provider/addAccount";
$route['help-amount'] = "help_provider/helpAmount";
$route['request-detail'] = "help_provider/requestDetail";
$route['ph-cancel/(:any)'] = "help_provider/cancelHelp/$1";


//get help

$route["backend/get-help/list"] = "help_provider/getHelpList";
$route["backend/get-help/edit/(:any)"] = "help_provider/editGetHelp/$1";
$route["backend/get-help/view/(:any)"] = "help_provider/viewGetRequest/$1";
$route["backend/all-request-summary"] = "help_provider/getAllRequestSummary";
$route["send-message-from-dashboard"] = "home/sendMessageToUser";
$route["send-request-images"] = "home/sendRequestImages";
/* get help */

$route['cash-request'] = "help_provider/addCashRequest";
$route['cash-account'] = "help_provider/addCashAccount";
$route['get-amount'] = "help_provider/getAmount";
$route['amount-detail'] = "help_provider/amountRequestDetail";


$route['account-summary'] = "help_provider/getAccountList";


/* trusted people */
$route['trusted-contacts/invite-friend'] = 'trusted_contacts/inviteFriend';

/* Advertise or post a trade section start */
$route['advertise'] = "advertise/post_trade";
$route['advertise/add'] = "advertise/post_trade_add";
/* Advertise or post a trade section end */
/* Two factor authentication starts here */
$route['accounts/two-factor'] = "account/two_factor";
$route['accounts/gridcard'] = "account/generate_gridcard";
$route['accounts/enable-two-factor-auth-paper'] = "account/enable_two_factor_paper";
$route['accounts/enable-two-factor-auth-mobile'] = "account/enable_two_factor_mobile";
/* Two factor authentication starts here */
/* start : user edit profile : 3 feb 14 */
$route['profile/change-email'] = 'user_account/changeEmailId';
$route['profile/change-real-name'] = 'user_account/changeRealName';
$route['profile/update-email/(:any)'] = 'user_account/updateUserEmail/$1';
$route['chk-realname-duplicate'] = "user_account/chkUserRealNameDuplicate";
/* end : user edit profile */

/* User account section end */
$route['ewallet'] = "wallet/displayWalletTransaction";

/* back end cms section */
$route['cms/(:any)'] = "cms/cmsDetails/$1";
$route['backend/cms'] = "cms/listCMS";
$route['backend/cms/edit-cms/(:any)'] = "cms/editCMS/$1";
/* 26 feb */
$route['support-and-contact'] = "cms/supportAndContact";
$route['discussion-forum'] = "cms/discusionForum";
$route['payment-dispute'] = "cms/paymentDispute";
//28Aug
$route['backend/reports/(:any)'] = 'reports/reportList/$1';
$route['backend/viewReport/(:any)'] = 'reports/generateReport/$1';
//31Aug
$route['backend/help-reports/(:any)'] = 'reports/helpReportList/$1';
$route['backend/view-help-report/(:any)'] = 'reports/generateHelpReport/$1';

/* --------------  user module route end here -------------------- */
/* ----------------------strat : front end cms section-------------------------- */
$route['cms/(:any)'] = "cms/getCmsPage/$1/$2";
$route['contact-us'] = "cms/contactUs";
/* ----------------------end : front end cms section---------------------------- */
$route['404_override'] = '';
/* End of file routes.php */
/* Location: ./application/config/routes.php */
