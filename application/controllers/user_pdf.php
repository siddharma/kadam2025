<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
error_reporting(E_ALL);
ini_set("display_errors", "on");

class User_Pdf extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model("common_model");
        $this->load->model("register_model");
        
    }

    /* function to display public profile */

     public function welcomePDF()
    {
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
        $arr_user_data = end($arr_user_data);
//           $this->load->library('Pdf');
//           $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
//           $pdf->SetTitle('Pdf Example');
//           $pdf->SetHeaderMargin(30);
//           $pdf->SetTopMargin(20);
//           $pdf->setFooterMargin(20);
//           $pdf->SetAutoPageBreak(true);
//           $pdf->SetAuthor('Author');
//           $pdf->SetDisplayMode('real', 'default');
//           $pdf->Write(5, 'CodeIgniter TCPDF Integration');
           
//  output the HTML content
//           $pdf->writeHTML($html, true, false, true, false, '');
//           $pdf->Output('pdfexample.pdf', 'I');
           
           
           $this->load->library('Pdf');
           $obj_pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);

            $obj_pdf->SetCreator(PDF_CREATOR);
            $title = "PDF Report";
            $obj_pdf->SetTitle($title);
//            $obj_pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, $title, PDF_HEADER_STRING);
//            $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
//            $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
            $obj_pdf->SetDefaultMonospacedFont('helvetica');
            $obj_pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
//            $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
            $obj_pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
//            $obj_pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
            $obj_pdf->SetFont('helvetica', '', 9);
            $obj_pdf->setFontSubsetting(false);
            
            // add a page
            $obj_pdf->AddPage();
            $full_name = strtoupper($arr_user_data['full_name']);
            $register_date = $arr_user_data['register_date'];
            $mobile_no = $arr_user_data['mobile_no'];
            $user_email = $arr_user_data['user_email'];
            $member_id = $arr_user_data['user_sponser_id'];
            
            $welcome = '<html>
            <head>
            <title></title>
            <meta name="viewport" content="width=device-width, initial-scale=1">
             <title>Bootstrap Example</title>
              <meta charset="utf-8">
              <meta name="viewport" content="width=device-width, initial-scale=1">
            </head>
            <body>
             <div style=" background-repeat: no-repeat; display: block; margin: 0 auto; margin-bottom: 0.5cm; width: 21cm;  height: 29.7cm; ">
            <div class="container" style="width:795px;height:1300px">
		<div style="float: left;height:200px;visibility:hidden;">
		</div>
		<br/>
		<div class="row" style="margin-top:190px">
                <p>
                 
		</p>
                <div class="about-letter">
                                       
                                        <strong> Congratulations ! </strong> <br> <br>

                                        You Are Successfully Register With <strong> JANHIT </strong> <br><br>

                                        <table cellpadding="pixels" cellspacing="pixels"><tbody>
                                                <tr><td><strong> Member ID </strong>  </td><td> - '.$member_id.'</td></tr>

                                                <tr><td><strong> Name  </strong> </td><td> - '.$full_name.'</td></tr>   

                                                <tr><td><strong> Date of Joining  </strong></td><td> - '.$register_date.'</td></tr>

                                                <tr><td><strong> Mobile No.  </strong> </td><td> - '.$mobile_no.'</td></tr> 

                                                <tr><td><strong> E-Mail ID  </strong></td><td> -'.$user_email.'</td></tr>

                                            </tbody></table> <br><br>

                                        <strong> Dear Sir/Madam,</strong><br> <br>

                                        We Congratulate you for being the part of <strong>JANHIT.</strong> We wholeheartedly welcome you. We really appreciate your decision of choosing the best system which will make you economically independent. We have launched a totally different concept which will make you feel everything different than old traditional System. We have provided you a golden opportunity to prove yourself and carry out all your caliber .
                                        <br> <br>
                                        OUR concept is genuine System in which you have to enrol persons who are really interested and voluntarily offer them to be the part of this group just like you and develop a strong system which will keep you at very high prominent place and apex of success. All the staff members are always ready to assist you all the time. Please do feel free to share your new thoughts and ideas. For latest information and updates keep surfing at <strong> www.gogreensavetree.in </strong> and forward your suggestion by mailing us to <strong> gogreensavetree52@gmail.com </strong> Your suggestions are very precious to us.   <br> <br>

                                        We once again congratulate and welcome you to the world of <strong> JANHIT </strong>  System and thank you for giving us an opportunity to serve you.   <br> <br>

                                        Yours Sincerely,   <br> <br>

                                        <strong> JANHIT </strong> Team  <br> <br>

                                        <br> 
                                        <strong> Managing Director </strong>

                                        <div class="space20"></div>

                                        <div class="space20"></div>
                                    </div></div></div></div></body>
</html>';
                                // output the HTML content
//echo $welcome;die;
                        $obj_pdf->writeHTML($welcome, true, false, true, false, '');

                                $obj_pdf->Output($full_name.'.pdf', 'I');
                                //D : Force Download , F: Save File
                                //I : Inline browser , S : Return document as String
      }
      
    function getUserFormTreeInfo($sponser_data, $loop) {
        $table_to_pass = 'mst_users';
       
        $condition_to_pass = array("user_sponser_id" => end($sponser_data['sponser_id']));
        $arr_user_data = $this->common_model->getRecords($table_to_pass, 'sponser_id, full_name,mobile_no, address,city,pin_code,register_date,upi_address', $condition_to_pass, $order_by_to_pass = '', $limit_to_pass = '', $debug_to_pass = 0);
       
        if (count($arr_user_data) > 0) {
            $arr_user_data = $arr_user_data[0];
            if ($loop > 0) {
                $sponser_data['sponser_id'][] = $arr_user_data['sponser_id'];
                $sponser_data['full_name'][] = $arr_user_data['full_name'];
                $sponser_data['mobile_no'][] = $arr_user_data['mobile_no'];
                $sponser_data['address'][] = $arr_user_data['address'];
                $sponser_data['city'][] = $arr_user_data['city'];
                $sponser_data['pin_code'][] = $arr_user_data['pin_code'];
                $sponser_data['register_date'][] = $arr_user_data['register_date'];
                $sponser_data['upi_address'][] = $arr_user_data['upi_address'];
                return $this->getUserFormTreeInfo($sponser_data, $loop - 1);
            } else {
                $userData = array('sponser_id'=>$sponser_data['sponser_id'],
                'full_name'=>$sponser_data['full_name'], 
                'mobile_no'=>$sponser_data['mobile_no'], 
                'address'=> $sponser_data['address'],'city'=> $sponser_data['city'],
                'pin_code'=> $sponser_data['pin_code'],
                'upi_address'=> $sponser_data['upi_address'],
                'register_date'=> $sponser_data['register_date']);
                return $userData;
            }
        } else {
                $userData = array('sponser_id'=>$sponser_data['sponser_id'],
                'full_name'=>$sponser_data['full_name'],
                'mobile_no'=>$sponser_data['mobile_no'],
                'upi_address'=>$sponser_data['upi_address']
              );
                return $userData;
        }
    }
   

/*

ALTER TABLE `green_mst_users` ADD `upline7_id` VARCHAR(50) NOT NULL AFTER `upline6_donation_amt`, ADD `upline7_donation_amt` VARCHAR(50) NOT NULL AFTER `upline7_id`, ADD `upline8_id` VARCHAR(50) NOT NULL AFTER `upline7_donation_amt`, ADD `upline8_donation_amt` VARCHAR(50) NOT NULL AFTER `upline8_id`, ADD `upline9_id` VARCHAR(50) NOT NULL AFTER `upline8_donation_amt`, ADD `upline9_donation_amt` VARCHAR(50) NOT NULL AFTER `upline9_id`, ADD `upline_fix1_id` VARCHAR(50) NOT NULL AFTER `upline9_donation_amt`, ADD `upline_fix1_donation_amt` VARCHAR(50) NOT NULL AFTER `upline_fix1_id`, ADD `upline_fix2_id` VARCHAR(50) NOT NULL AFTER `upline_fix1_donation_amt`, ADD `upline_fix2_donation_amt` VARCHAR(50) NOT NULL AFTER `upline_fix2_id`;
ALTER TABLE `green_mst_users` 
ADD `upline_fix3_id` VARCHAR(50) NOT NULL  AFTER `upline_fix2_donation_amt`,  
ADD `upline_fix3_donation_amt` VARCHAR(50) NOT NULL  AFTER `upline_fix3_id`,
ADD `upi_address` VARCHAR(100) NOT NULL  AFTER `mobile_no`;

*/


      public function form1PDF(){
        $this->load->language('common');
        if (!$this->common_model->isLoggedIn()) {
            redirect('signin');
        }
      
        $data = $this->common_model->commonFunction();
        $data['user_session'] = $this->session->userdata('user_account');
         //Get all members upto 7 levels
        $sponser_data['sponser_id'][] = $data['user_account']['user_sponser_id'];
        $userDetail = $this->getUserFormTreeInfo($sponser_data, 10);
        $fix_data['sponser_id'][] = 'F100003';
        $userFixDetail = $this->getUserFormTreeInfo($fix_data, 3);
        
         
        $this->load->library('Pdf');
        $obj_pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
        $obj_pdf->SetCreator(PDF_CREATOR);
        $title = "Form1 PDF";
        $obj_pdf->SetTitle($title);
        $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
        $obj_pdf->SetDefaultMonospacedFont('helvetica');
        $obj_pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
//        $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
        $obj_pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $obj_pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        $obj_pdf->SetFont('helvetica', '', 9);
        $obj_pdf->setFontSubsetting(false);
        // add a page
        $obj_pdf->AddPage();
        // $bg = "background-image: url('".base_url()."media/front/images/bg-1.png')!important;";
        $time = strtotime($userDetail['register_date'][0]);
        $userdate = date("d/m/Y", $time);
        $pdformd = '<html>
            <head>
            <title></title>
            <meta name="viewport" content="width=device-width, initial-scale=1">
             <title>Bootstrap Example</title>
              <meta charset="utf-8">
              <meta name="viewport" content="width=device-width, initial-scale=1">
            </head>
            <body>
            <div style=" background-repeat: no-repeat; display: block; margin: 0 auto; margin-bottom: 0.5cm; width: 21cm;  height: 29.7cm; ">
            <div class="container" style="width:795px;height:1300px">
		<div style="float: left;height:200px;visibility:hidden;">
		</div>
		<br/>
		<div class="row" style="margin-top:190px">
                <p>
                 <table style="width:100%;" >
                <tr>
                <td style="text-align:left;"><strong>Donar Code: '.$userDetail['sponser_id'][0].'/Form-1</strong></td>
                <td style="text-align:right;"><strong>Date: '.$userdate.'</strong></td>
                </tr>
                </table>
		</p>
            <table style=" border: 1px solid black;border-collapse: collapse;width:100%;" cellpadding="4" align="center">
              
            
            <tr style=" border: 1px solid black;border-collapse: collapse;">
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; margin-top:25px;width:10%"><strong>Level </strong></td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:35%"><strong>Name </strong></td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; width:20%"><strong>Contact No </strong></td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:25%"><strong>UPI Address</strong></td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:10%"><strong>Amount</strong></td>
            </tr>



            <tr style=" border: 1px solid black;border-collapse: collapse;">
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; margin-top:25px;width:10%"><strong>Fix </strong></td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:35%">'.ucfirst($userFixDetail['full_name'][2]).'</td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; width:20%">'.($userFixDetail['mobile_no'][2]).'</td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:25%">'.($userFixDetail['upi_address'][2]).'</td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:10%">'.$data['global']['fix_level3_amt'].'</td>
            </tr>
            <tr style=" border: 1px solid black;border-collapse: collapse;">
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; margin-top:25px;width:10%"><strong>Fix </strong></td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:35%">'.ucfirst($userFixDetail['full_name'][1]).'</td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; width:20%">'.($userFixDetail['mobile_no'][1]).'</td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:25%">'.($userFixDetail['upi_address'][1]).'</td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:10%">'.$data['global']['fix_level2_amt'].'</td>
            </tr>


            <tr style=" border: 1px solid black;border-collapse: collapse;">
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; margin-top:25px;width:10%"><strong>Fix </strong></td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:35%">'.ucfirst($userFixDetail['full_name'][0]).'</td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; width:20%">'.($userFixDetail['mobile_no'][0]).'</td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:25%">'.($userFixDetail['upi_address'][0]).'</td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:10%">'.$data['global']['fix_level1_amt'].'</td>
            </tr>




            <tr style=" border: 1px solid black;border-collapse: collapse;">
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; margin-top:25px;width:10%"><strong>9 </strong></td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:35%">'.ucfirst($userDetail['full_name'][9]).' ['.$userDetail['sponser_id'][9].']</td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; width:20%">'.($userDetail['mobile_no'][9]).'</td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:25%">'.($userDetail['upi_address'][9]).'</td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:10%">'.$data['global']['level9_amt'].'</td>
            </tr>

            <tr style=" border: 1px solid black;border-collapse: collapse;">
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; margin-top:25px;width:10%"><strong>8 </strong></td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:35%">'.ucfirst($userDetail['full_name'][8]).' ['.$userDetail['sponser_id'][8].']</td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; width:20%">'.($userDetail['mobile_no'][9]).'</td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:25%">'.($userDetail['upi_address'][8]).'</td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:10%">'.$data['global']['level8_amt'].'</td>
            </tr>
  
            <tr style=" border: 1px solid black;border-collapse: collapse;">
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; margin-top:25px;width:10%"><strong>7 </strong></td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:35%">'.ucfirst($userDetail['full_name'][7]).' ['.$userDetail['sponser_id'][7].']</td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; width:20%">'.($userDetail['mobile_no'][7]).'</td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:25%">'.($userDetail['upi_address'][7]).'</td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:10%">'.$data['global']['level7_amt'].'</td>
            </tr>
            <tr style=" border: 1px solid black;border-collapse: collapse;">
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; margin-top:25px;width:10%"><strong>6 </strong></td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:35%">'.ucfirst($userDetail['full_name'][6]).' ['.$userDetail['sponser_id'][6].']</td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; width:20%">'.($userDetail['mobile_no'][6]).'</td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:25%">'.($userDetail['upi_address'][6]).'</td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:10%">'.$data['global']['level6_amt'].'</td>
            </tr>
            <tr style=" border: 1px solid black;border-collapse: collapse;">
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; margin-top:25px;width:10%"><strong>5 </strong></td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:35%">'.ucfirst($userDetail['full_name'][5]).' ['.$userDetail['sponser_id'][5].']</td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; width:20%">'.($userDetail['mobile_no'][5]).'</td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:25%">'.($userDetail['upi_address'][5]).'</td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:10%">'.$data['global']['level5_amt'].'</td>
            </tr>
            <tr style=" border: 1px solid black;border-collapse: collapse;">
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; margin-top:25px;width:10%"><strong>4 </strong></td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:35%">'.ucfirst($userDetail['full_name'][4]).' ['.$userDetail['sponser_id'][4].']</td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; width:20%">'.($userDetail['mobile_no'][4]).'</td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:25%">'.($userDetail['upi_address'][4]).'</td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:10%">'.$data['global']['level4_amt'].'</td>
            </tr>
            <tr style=" border: 1px solid black;border-collapse: collapse;">
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; margin-top:25px;width:10%"><strong>3 </strong></td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:35%">'.ucfirst($userDetail['full_name'][3]).' ['.$userDetail['sponser_id'][3].']</td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; width:20%">'.($userDetail['mobile_no'][3]).'</td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:25%">'.($userDetail['upi_address'][3]).'</td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:10%">'.$data['global']['level3_amt'].'</td>
            </tr>
            <tr style=" border: 1px solid black;border-collapse: collapse;">
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; margin-top:25px;width:10%"><strong>2 </strong></td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:35%">'.ucfirst($userDetail['full_name'][2]).' ['.$userDetail['sponser_id'][2].']</td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; width:20%">'.($userDetail['mobile_no'][2]).'</td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:25%">'.($userDetail['upi_address'][2]).'</td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:10%">'.$data['global']['level2_amt'].'</td>
            </tr>
            <tr style=" border: 1px solid black;border-collapse: collapse;">
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; margin-top:25px;width:10%"><strong>1 </strong></td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:35%">'.ucfirst($userDetail['full_name'][1]).' ['.$userDetail['sponser_id'][1].']</td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; width:20%">'.($userDetail['mobile_no'][1]).'</td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:25%">'.($userDetail['upi_address'][1]).'</td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:10%">'.$data['global']['level1_amt'].'</td>
            </tr>


            <tr style=" border: 1px solid black;border-collapse: collapse;">
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; margin-top:25px;width:10%"><strong> </strong></td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:35%">TOTAL RS</td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; width:20%"></td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:25%"></td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:10%">'.$data['global']['donation_amt'].'</td>
            </tr>

 
            </table>
            <br>
            <br>			
            <table style=" border: 1px solid black;width:100%;  border-collapse: inherit; border-spacing: 0 8px;">
                    <tr>
                <td style="padding: 15px; text-align: left;width:14%"><strong>Donar Name:</strong></td>
                <td style=" padding: 15px; border-bottom: 1px solid black;width:36%;">'.$data['user_session']['full_name'].'</td>
                <td style=" padding: 15px; text-align: left;width:14%"><strong>Mobile:</strong></td>
                <td style=" padding: 15px; border-bottom: 1px solid black;width:36%">'.$data['user_session']['mobile_no'].'</td>
              </tr>
                    <tr>
                <td style="padding: 15px; text-align: left;width:14%"><strong>UPI ID:</strong></td>
                <td style=" padding: 15px; border-bottom: 1px solid black;width:36%;">'.$data['user_session']['upi_address'].'</td>
                <td style=" padding: 15px; text-align: left;width:14%"><strong>Donar Id:</strong></td>
                <td style=" padding: 15px; border-bottom: 1px solid black;width:36%">'.$data['user_session']['user_sponser_id'].'</td>
              </tr>
               
              <tfoot >
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
            </tfoot>
            </table>
        </div>
    </div>
    </div>
</body>
</html>';
        
$obj_pdf->writeHTML($pdformd, true, false, true, false, '');
$obj_pdf->Output('Form1.pdf', 'D');
//D : Force Download , F: Save File
//I : Inline browser , S : Return document as String

  }



  public function form2PDF(){
    $this->load->language('common');
    if (!$this->common_model->isLoggedIn()) {
        redirect('signin');
    }
  
    $data = $this->common_model->commonFunction();
    $data['user_session'] = $this->session->userdata('user_account');
     //Get all members upto 7 levels
    $sponser_data['sponser_id'][] = $data['user_account']['user_sponser_id'];
    $userDetail = $this->getUserFormTreeInfo($sponser_data, 10);
    $fix_data['sponser_id'][] = 'F100003';
    $userFixDetail = $this->getUserFormTreeInfo($fix_data, 3);
    
     
    $this->load->library('Pdf');
    $obj_pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
    $obj_pdf->SetCreator(PDF_CREATOR);
    $title = "Form2 PDF";
    $obj_pdf->SetTitle($title);
    $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
    $obj_pdf->SetDefaultMonospacedFont('helvetica');
    $obj_pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
//        $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
    $obj_pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    $obj_pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
    $obj_pdf->SetFont('helvetica', '', 9);
    $obj_pdf->setFontSubsetting(false);
    // add a page
    $obj_pdf->AddPage();
    // $bg = "background-image: url('".base_url()."media/front/images/bg-1.png')!important;";
    $time = strtotime($userDetail['register_date'][0]);
    $userdate = date("d/m/Y", $time);
    $pdformd = '<html>
        <head>
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
         <title>Bootstrap Example</title>
          <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">
        </head>
        <body>
        <div style=" background-repeat: no-repeat; display: block; margin: 0 auto; margin-bottom: 0.5cm; width: 21cm;  height: 29.7cm; ">
        <div class="container" style="width:795px;height:1300px">
<div style="float: left;height:200px;visibility:hidden;">
</div>
<br/>
<div class="row" style="margin-top:190px">
            <p>
             <table style="width:100%;" >
            <tr>
            <td style="text-align:left;"><strong>Donar Code: '.$userDetail['sponser_id'][0].'/Form-2</strong></td>
            <td style="text-align:right;"><strong>Date: '.$userdate.'</strong></td>
            </tr>
            </table>
</p>
        <table style=" border: 1px solid black;border-collapse: collapse;width:100%;" cellpadding="4" align="center">
          
        
        <tr style=" border: 1px solid black;border-collapse: collapse;">
            <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; margin-top:25px;width:10%"><strong>Level </strong></td>
            <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:35%"><strong>Name </strong></td>
            <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; width:20%"><strong>Contact No </strong></td>
            <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:25%"><strong>UPI Address</strong></td>
            <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:10%"><strong>Amount</strong></td>
        </tr>



        <tr style=" border: 1px solid black;border-collapse: collapse;">
            <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; margin-top:25px;width:10%"><strong>Fix </strong></td>
            <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:35%">'.ucfirst($userFixDetail['full_name'][2]).'</td>
            <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; width:20%">'.($userFixDetail['mobile_no'][2]).'</td>
            <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:25%">'.($userFixDetail['upi_address'][2]).'</td>
            <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:10%">'.$data['global']['fix_level3_amt'].'</td>
        </tr>
        <tr style=" border: 1px solid black;border-collapse: collapse;">
            <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; margin-top:25px;width:10%"><strong>Fix </strong></td>
            <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:35%">'.ucfirst($userFixDetail['full_name'][1]).'</td>
            <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; width:20%">'.($userFixDetail['mobile_no'][1]).'</td>
            <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:25%">'.($userFixDetail['upi_address'][1]).'</td>
            <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:10%">'.$data['global']['fix_level2_amt'].'</td>
        </tr>


        <tr style=" border: 1px solid black;border-collapse: collapse;">
            <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; margin-top:25px;width:10%"><strong>Fix </strong></td>
            <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:35%">'.ucfirst($userFixDetail['full_name'][0]).'</td>
            <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; width:20%">'.($userFixDetail['mobile_no'][0]).'</td>
            <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:25%">'.($userFixDetail['upi_address'][0]).'</td>
            <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:10%">'.$data['global']['fix_level1_amt'].'</td>
        </tr>




        <tr style=" border: 1px solid black;border-collapse: collapse;">
            <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; margin-top:25px;width:10%"><strong>9 </strong></td>
            <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:35%">'.ucfirst($userDetail['full_name'][9]).' ['.$userDetail['sponser_id'][9].']</td>
            <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; width:20%">'.($userDetail['mobile_no'][9]).'</td>
            <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:25%">'.($userDetail['upi_address'][9]).'</td>
            <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:10%">'.$data['global']['level9_amt'].'</td>
        </tr>

        <tr style=" border: 1px solid black;border-collapse: collapse;">
            <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; margin-top:25px;width:10%"><strong>8 </strong></td>
            <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:35%">'.ucfirst($userDetail['full_name'][8]).' ['.$userDetail['sponser_id'][8].']</td>
            <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; width:20%">'.($userDetail['mobile_no'][9]).'</td>
            <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:25%">'.($userDetail['upi_address'][8]).'</td>
            <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:10%">'.$data['global']['level8_amt'].'</td>
        </tr>

        <tr style=" border: 1px solid black;border-collapse: collapse;">
            <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; margin-top:25px;width:10%"><strong>7 </strong></td>
            <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:35%">'.ucfirst($userDetail['full_name'][7]).' ['.$userDetail['sponser_id'][7].']</td>
            <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; width:20%">'.($userDetail['mobile_no'][7]).'</td>
            <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:25%">'.($userDetail['upi_address'][7]).'</td>
            <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:10%">'.$data['global']['level7_amt'].'</td>
        </tr>
        <tr style=" border: 1px solid black;border-collapse: collapse;">
            <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; margin-top:25px;width:10%"><strong>6 </strong></td>
            <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:35%">'.ucfirst($userDetail['full_name'][6]).' ['.$userDetail['sponser_id'][6].']</td>
            <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; width:20%">'.($userDetail['mobile_no'][6]).'</td>
            <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:25%">'.($userDetail['upi_address'][6]).'</td>
            <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:10%">'.$data['global']['level6_amt'].'</td>
        </tr>
        <tr style=" border: 1px solid black;border-collapse: collapse;">
            <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; margin-top:25px;width:10%"><strong>5 </strong></td>
            <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:35%">'.ucfirst($userDetail['full_name'][5]).' ['.$userDetail['sponser_id'][5].']</td>
            <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; width:20%">'.($userDetail['mobile_no'][5]).'</td>
            <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:25%">'.($userDetail['upi_address'][5]).'</td>
            <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:10%">'.$data['global']['level5_amt'].'</td>
        </tr>
        <tr style=" border: 1px solid black;border-collapse: collapse;">
            <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; margin-top:25px;width:10%"><strong>4 </strong></td>
            <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:35%">'.ucfirst($userDetail['full_name'][4]).' ['.$userDetail['sponser_id'][4].']</td>
            <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; width:20%">'.($userDetail['mobile_no'][4]).'</td>
            <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:25%">'.($userDetail['upi_address'][4]).'</td>
            <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:10%">'.$data['global']['level4_amt'].'</td>
        </tr>
        <tr style=" border: 1px solid black;border-collapse: collapse;">
            <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; margin-top:25px;width:10%"><strong>3 </strong></td>
            <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:35%">'.ucfirst($userDetail['full_name'][3]).' ['.$userDetail['sponser_id'][3].']</td>
            <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; width:20%">'.($userDetail['mobile_no'][3]).'</td>
            <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:25%">'.($userDetail['upi_address'][3]).'</td>
            <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:10%">'.$data['global']['level3_amt'].'</td>
        </tr>
        <tr style=" border: 1px solid black;border-collapse: collapse;">
            <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; margin-top:25px;width:10%"><strong>2 </strong></td>
            <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:35%">'.ucfirst($userDetail['full_name'][2]).' ['.$userDetail['sponser_id'][2].']</td>
            <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; width:20%">'.($userDetail['mobile_no'][2]).'</td>
            <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:25%">'.($userDetail['upi_address'][2]).'</td>
            <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:10%">'.$data['global']['level2_amt'].'</td>
        </tr>
        <tr style=" border: 1px solid black;border-collapse: collapse;">
            <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; margin-top:25px;width:10%"><strong>1 </strong></td>
            <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:35%">'.ucfirst($userDetail['full_name'][1]).' ['.$userDetail['sponser_id'][1].']</td>
            <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; width:20%">'.($userDetail['mobile_no'][1]).'</td>
            <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:25%">'.($userDetail['upi_address'][1]).'</td>
            <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:10%">'.$data['global']['level1_amt'].'</td>
        </tr>


        <tr style=" border: 1px solid black;border-collapse: collapse;">
            <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; margin-top:25px;width:10%"><strong> </strong></td>
            <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:35%">TOTAL RS</td>
            <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; width:20%"></td>
            <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:25%"></td>
            <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:10%">'.$data['global']['donation_amt'].'</td>
        </tr>


        </table>
        <br>
        <br>			
        <table style=" border: 1px solid black;width:100%;  border-collapse: inherit; border-spacing: 0 8px;">
                <tr>
            <td style="padding: 15px; text-align: left;width:14%"><strong>Donar Name:</strong></td>
            <td style=" padding: 15px; border-bottom: 1px solid black;width:36%;">'.$data['user_session']['full_name'].'</td>
            <td style=" padding: 15px; text-align: left;width:14%"><strong>Mobile:</strong></td>
            <td style=" padding: 15px; border-bottom: 1px solid black;width:36%">'.$data['user_session']['mobile_no'].'</td>
          </tr>
                <tr>
            <td style="padding: 15px; text-align: left;width:14%"><strong>UPI ID:</strong></td>
            <td style=" padding: 15px; border-bottom: 1px solid black;width:36%;">'.$data['user_session']['upi_address'].'</td>
            <td style=" padding: 15px; text-align: left;width:14%"><strong>Donar Id:</strong></td>
            <td style=" padding: 15px; border-bottom: 1px solid black;width:36%">'.$data['user_session']['user_sponser_id'].'</td>
          </tr>
           
          <tfoot >
            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
        </tfoot>
        </table>
    </div>
</div>
</div>
</body>
</html>';
    
$obj_pdf->writeHTML($pdformd, true, false, true, false, '');
$obj_pdf->Output('Form2.pdf', 'D');
//D : Force Download , F: Save File
//I : Inline browser , S : Return document as String

}

public function form3PDF(){
  $this->load->language('common');
  if (!$this->common_model->isLoggedIn()) {
      redirect('signin');
  }

  $data = $this->common_model->commonFunction();
  $data['user_session'] = $this->session->userdata('user_account');
   //Get all members upto 7 levels
  $sponser_data['sponser_id'][] = $data['user_account']['user_sponser_id'];
  $userDetail = $this->getUserFormTreeInfo($sponser_data, 10);
  $fix_data['sponser_id'][] = 'F100003';
  $userFixDetail = $this->getUserFormTreeInfo($fix_data, 3);
  
   
  $this->load->library('Pdf');
  $obj_pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
  $obj_pdf->SetCreator(PDF_CREATOR);
  $title = "Form3 PDF";
  $obj_pdf->SetTitle($title);
  $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
  $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
  $obj_pdf->SetDefaultMonospacedFont('helvetica');
  $obj_pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
//        $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
  $obj_pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
  $obj_pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
  $obj_pdf->SetFont('helvetica', '', 9);
  $obj_pdf->setFontSubsetting(false);
  // add a page
  $obj_pdf->AddPage();
  // $bg = "background-image: url('".base_url()."media/front/images/bg-1.png')!important;";
  $time = strtotime($userDetail['register_date'][0]);
  $userdate = date("d/m/Y", $time);
  $pdformd = '<html>
      <head>
      <title></title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
       <title>Bootstrap Example</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
      </head>
      <body>
      <div style=" background-repeat: no-repeat; display: block; margin: 0 auto; margin-bottom: 0.5cm; width: 21cm;  height: 29.7cm; ">
      <div class="container" style="width:795px;height:1300px">
<div style="float: left;height:200px;visibility:hidden;">
</div>
<br/>
<div class="row" style="margin-top:190px">
          <p>
           <table style="width:100%;" >
          <tr>
          <td style="text-align:left;"><strong>Donar Code: '.$userDetail['sponser_id'][0].'/Form-3</strong></td>
          <td style="text-align:right;"><strong>Date: '.$userdate.'</strong></td>
          </tr>
          </table>
</p>
      <table style=" border: 1px solid black;border-collapse: collapse;width:100%;" cellpadding="4" align="center">
        
      
      <tr style=" border: 1px solid black;border-collapse: collapse;">
          <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; margin-top:25px;width:10%"><strong>Level </strong></td>
          <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:35%"><strong>Name </strong></td>
          <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; width:20%"><strong>Contact No </strong></td>
          <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:25%"><strong>UPI Address</strong></td>
          <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:10%"><strong>Amount</strong></td>
      </tr>



      <tr style=" border: 1px solid black;border-collapse: collapse;">
          <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; margin-top:25px;width:10%"><strong>Fix </strong></td>
          <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:35%">'.ucfirst($userFixDetail['full_name'][2]).'</td>
          <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; width:20%">'.($userFixDetail['mobile_no'][2]).'</td>
          <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:25%">'.($userFixDetail['upi_address'][2]).'</td>
          <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:10%">'.$data['global']['fix_level3_amt'].'</td>
      </tr>
      <tr style=" border: 1px solid black;border-collapse: collapse;">
          <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; margin-top:25px;width:10%"><strong>Fix </strong></td>
          <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:35%">'.ucfirst($userFixDetail['full_name'][1]).'</td>
          <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; width:20%">'.($userFixDetail['mobile_no'][1]).'</td>
          <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:25%">'.($userFixDetail['upi_address'][1]).'</td>
          <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:10%">'.$data['global']['fix_level2_amt'].'</td>
      </tr>


      <tr style=" border: 1px solid black;border-collapse: collapse;">
          <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; margin-top:25px;width:10%"><strong>Fix </strong></td>
          <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:35%">'.ucfirst($userFixDetail['full_name'][0]).'</td>
          <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; width:20%">'.($userFixDetail['mobile_no'][0]).'</td>
          <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:25%">'.($userFixDetail['upi_address'][0]).'</td>
          <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:10%">'.$data['global']['fix_level1_amt'].'</td>
      </tr>




      <tr style=" border: 1px solid black;border-collapse: collapse;">
          <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; margin-top:25px;width:10%"><strong>9 </strong></td>
          <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:35%">'.ucfirst($userDetail['full_name'][9]).' ['.$userDetail['sponser_id'][9].']</td>
          <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; width:20%">'.($userDetail['mobile_no'][9]).'</td>
          <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:25%">'.($userDetail['upi_address'][9]).'</td>
          <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:10%"></td>
      </tr>

      <tr style=" border: 1px solid black;border-collapse: collapse;">
          <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; margin-top:25px;width:10%"><strong>8 </strong></td>
          <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:35%">'.ucfirst($userDetail['full_name'][8]).' ['.$userDetail['sponser_id'][8].']</td>
          <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; width:20%">'.($userDetail['mobile_no'][8]).'</td>
          <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:25%">'.($userDetail['upi_address'][8]).'</td>
          <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:10%"></td>
      </tr>

      <tr style=" border: 1px solid black;border-collapse: collapse;">
          <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; margin-top:25px;width:10%"><strong>7 </strong></td>
          <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:35%">'.ucfirst($userDetail['full_name'][7]).' ['.$userDetail['sponser_id'][7].']</td>
          <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; width:20%">'.($userDetail['mobile_no'][7]).'</td>
          <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:25%">'.($userDetail['upi_address'][7]).'</td>
          <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:10%"></td>
      </tr>
      <tr style=" border: 1px solid black;border-collapse: collapse;">
          <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; margin-top:25px;width:10%"><strong>6 </strong></td>
          <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:35%">'.ucfirst($userDetail['full_name'][6]).' ['.$userDetail['sponser_id'][6].']</td>
          <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; width:20%">'.($userDetail['mobile_no'][6]).'</td>
          <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:25%">'.($userDetail['upi_address'][6]).'</td>
          <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:10%"></td>
      </tr>
      <tr style=" border: 1px solid black;border-collapse: collapse;">
          <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; margin-top:25px;width:10%"><strong>5 </strong></td>
          <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:35%">'.ucfirst($userDetail['full_name'][5]).' ['.$userDetail['sponser_id'][5].']</td>
          <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; width:20%">'.($userDetail['mobile_no'][5]).'</td>
          <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:25%">'.($userDetail['upi_address'][5]).'</td>
          <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:10%"></td>
      </tr>
      <tr style=" border: 1px solid black;border-collapse: collapse;">
          <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; margin-top:25px;width:10%"><strong>4 </strong></td>
          <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:35%">'.ucfirst($userDetail['full_name'][4]).' ['.$userDetail['sponser_id'][4].']</td>
          <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; width:20%">'.($userDetail['mobile_no'][4]).'</td>
          <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:25%">'.($userDetail['upi_address'][4]).'</td>
          <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:10%"></td>
      </tr>
      <tr style=" border: 1px solid black;border-collapse: collapse;">
          <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; margin-top:25px;width:10%"><strong>3 </strong></td>
          <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:35%">'.ucfirst($userDetail['full_name'][3]).' ['.$userDetail['sponser_id'][3].']</td>
          <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; width:20%">'.($userDetail['mobile_no'][3]).'</td>
          <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:25%">'.($userDetail['upi_address'][3]).'</td>
          <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:10%"></td>
      </tr>
      <tr style=" border: 1px solid black;border-collapse: collapse;">
          <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; margin-top:25px;width:10%"><strong>2 </strong></td>
          <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:35%">'.ucfirst($userDetail['full_name'][2]).' ['.$userDetail['sponser_id'][2].']</td>
          <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; width:20%">'.($userDetail['mobile_no'][2]).'</td>
          <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:25%">'.($userDetail['upi_address'][2]).'</td>
          <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:10%"></td>
      </tr>
      <tr style=" border: 1px solid black;border-collapse: collapse;">
          <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; margin-top:25px;width:10%"><strong>1 </strong></td>
          <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:35%">'.ucfirst($userDetail['full_name'][1]).' ['.$userDetail['sponser_id'][1].']</td>
          <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; width:20%">'.($userDetail['mobile_no'][1]).'</td>
          <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:25%">'.($userDetail['upi_address'][1]).'</td>
          <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:10%">'.$data['global']['form3_level1_amt'].'</td>
      </tr>


      <tr style=" border: 1px solid black;border-collapse: collapse;">
          <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; margin-top:25px;width:10%"><strong> </strong></td>
          <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:35%">TOTAL RS</td>
          <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; width:20%"></td>
          <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:25%"></td>
          <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:10%">'.$data['global']['donation_amt'].'</td>
      </tr>


      </table>
      <br>
      <br>			
      <table style=" border: 1px solid black;width:100%;  border-collapse: inherit; border-spacing: 0 8px;">
              <tr>
          <td style="padding: 15px; text-align: left;width:14%"><strong>Donar Name:</strong></td>
          <td style=" padding: 15px; border-bottom: 1px solid black;width:36%;">'.$data['user_session']['full_name'].'</td>
          <td style=" padding: 15px; text-align: left;width:14%"><strong>Mobile:</strong></td>
          <td style=" padding: 15px; border-bottom: 1px solid black;width:36%">'.$data['user_session']['mobile_no'].'</td>
        </tr>
              <tr>
          <td style="padding: 15px; text-align: left;width:14%"><strong>UPI ID:</strong></td>
          <td style=" padding: 15px; border-bottom: 1px solid black;width:36%;">'.$data['user_session']['upi_address'].'</td>
          <td style=" padding: 15px; text-align: left;width:14%"><strong>Donar Id:</strong></td>
          <td style=" padding: 15px; border-bottom: 1px solid black;width:36%">'.$data['user_session']['user_sponser_id'].'</td>
        </tr>
         
        <tfoot >
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
      </tfoot>
      </table>
  </div>
</div>
</div>
</body>
</html>';
  
$obj_pdf->writeHTML($pdformd, true, false, true, false, '');
$obj_pdf->Output('Form3.pdf', 'D');
//D : Force Download , F: Save File
//I : Inline browser , S : Return document as String

}





  /*
      public function form2PDF(){
        $this->load->language('common');
        if (!$this->common_model->isLoggedIn()) {
            redirect('signin');
        }
      
        $data = $this->common_model->commonFunction();
        $data['user_session'] = $this->session->userdata('user_account');
         //Get all members upto 7 levels
        $sponser_data['sponser_id'][] = $data['user_account']['user_sponser_id'];
        $userDetail = $this->getUserFormTreeInfo($sponser_data, 9);
        $this->load->library('Pdf');
        $obj_pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
        $obj_pdf->SetCreator(PDF_CREATOR);
        $title = "Form2 PDF";
        $obj_pdf->SetTitle($title);
        $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
        $obj_pdf->SetDefaultMonospacedFont('helvetica');
        $obj_pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
//        $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
        $obj_pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $obj_pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        $obj_pdf->SetFont('helvetica', '', 9);
        $obj_pdf->setFontSubsetting(false);
        // add a page
        $obj_pdf->AddPage();
        // $bg = "background-image: url('".base_url()."media/front/images/bg-1.png')!important;";
        $time = strtotime($userDetail['register_date'][0]);
        $userdate = date("d/m/Y", $time);
        $pdformd = '<html>
            <head>
            <title></title>
            <meta name="viewport" content="width=device-width, initial-scale=1">
             <title>Bootstrap Example</title>
              <meta charset="utf-8">
              <meta name="viewport" content="width=device-width, initial-scale=1">
            </head>
            <body>
            <div style=" background-repeat: no-repeat; display: block; margin: 0 auto; margin-bottom: 0.5cm; width: 21cm;  height: 29.7cm; ">
            <div class="container" style="width:795px;height:1300px">
		<div style="float: left;height:200px;visibility:hidden;">
		</div>
		<br/>
		<div class="row" style="margin-top:190px">
                <p>
                 <table style="width:100%;" >
                <tr>
                <td style="text-align:left;"><strong>Donar Code: '.$userDetail['sponser_id'][0].'/Form-2</strong></td>
                <td style="text-align:right;"><strong>Date: '.$userdate.'</strong></td>
                </tr>
                </table>
		</p>
            <table style=" border: 1px solid black;border-collapse: collapse;width:100%;" cellpadding="6" align="center">
              <tr style=" border: 1px solid black;border-collapse: collapse;">
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; margin-top:25px;width:10%">7</td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:50%"><strong>NAME: '.ucfirst($userDetail['full_name'][6]).' ['.$userDetail['sponser_id'][6].']</strong><br/>'
                               . 'UPI ID: '.ucfirst($userDetail['upi_address']).', '.ucfirst($userDetail['city'][6]).', '.$userDetail['pin_code'][6].'</td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; width:10%">'.$data['global']['level7_amt'].'</td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:35%"></td>
              </tr>
              <tr style=" border: 1px solid black;border-collapse: collapse;">
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; width:10%">6</td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:50%"><strong>NAME: '.ucfirst($userDetail['full_name'][5]).' ['.$userDetail['sponser_id'][5].']</strong><br/>'
                              . 'UPI ID: '.ucfirst($userDetail['address'][5]).', '.ucfirst($userDetail['city'][5]).', '.$userDetail['pin_code'][5].'</td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; width:10%">'.$data['global']['level6_amt'].'</td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:35%"></td>
              </tr>
             <tr style=" border: 1px solid black;border-collapse: collapse;">
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; width:10%">5</td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:50%"><strong>NAME: '.ucfirst($userDetail['full_name'][4]).' ['.$userDetail['sponser_id'][4].']</strong><br/>'
                              . 'UPI ID: '.ucfirst($userDetail['address'][4]).', '.ucfirst($userDetail['city'][4]).', '.$userDetail['pin_code'][4].'</td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; width:10%">'.$data['global']['level5_amt'].'</td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:35%"></td>
              </tr>
              <tr style=" border: 1px solid black;border-collapse: collapse;">
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px;width:10%">4</td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:50%"><strong>NAME: '.ucfirst($userDetail['full_name'][3]).' ['.$userDetail['sponser_id'][3].']</strong><br/>'
                               . 'UPI ID: '.ucfirst($userDetail['address'][3]).', '.ucfirst($userDetail['city'][3]).', '.$userDetail['pin_code'][3].'</td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; width:10%">'.$data['global']['level4_amt'].'</td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:35%"></td>
              </tr>
              <tr style=" border: 1px solid black;border-collapse: collapse;">
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; width:10%">3</td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:50%"><strong>NAME: '.ucfirst($userDetail['full_name'][2]).' ['.$userDetail['sponser_id'][2].']</strong><br/>'
                              . 'UPI ID: '.ucfirst($userDetail['address'][2]).', '.ucfirst($userDetail['city'][2]).', '.$userDetail['pin_code'][2].'</td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; width:10%">'.$data['global']['level3_amt'].'</td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:35%"></td>
              </tr>
             <tr style=" border: 1px solid black;border-collapse: collapse;">
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; width:10%">2</td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:50%"><strong>NAME: '.ucfirst($userDetail['full_name'][1]).' ['.$userDetail['sponser_id'][1].']</strong><br/>'
                              . 'UPI ID: '.ucfirst($userDetail['address'][1]).', '.ucfirst($userDetail['city'][1]).', '.$userDetail['pin_code'][1].'</td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; width:10%">'.$data['global']['level2_amt'].'</td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:35%"></td>
              </tr>
              <tr style=" border: 1px solid black;border-collapse: collapse;">
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px;  left;width:10%">1</td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:50%"><strong>NAME: '.ucfirst($userDetail['full_name'][0]).' ['.$userDetail['sponser_id'][0].']</strong><br/>'
                              . 'UPI ID: '.ucfirst($userDetail['address'][0]).', '.ucfirst($userDetail['city'][0]).', '.$userDetail['pin_code'][0].'</td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; width:10%">0</td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:35%"></td>
              </tr>
            </table>
            <br>
            <br>			
            <table style=" border: 1px solid black;width:100%;  border-collapse: inherit; border-spacing: 0 10px;">
                    <tr>
                <td style="padding: 15px; text-align: left;width:14%"><strong>Full Name:</strong></td>
                <td style=" padding: 15px; border-bottom: 1px solid black;width:36%;"></td>
                <td style=" padding: 15px; text-align: left;width:14%"><strong>Mobile:</strong></td>
                <td style=" padding: 15px; border-bottom: 1px solid black;width:36%"></td>
              </tr>
                    <tr>
                <td style="padding: 15px; text-align: left;width:14%"><strong>Email Id:</strong></td>
                <td style=" padding: 15px; border-bottom: 1px solid black;width:36%;"></td>
                <td style=" padding: 15px; text-align: left;width:14%"><strong>Donar Id:</strong></td>
                <td style=" padding: 15px; border-bottom: 1px solid black;width:36%"></td>
              </tr>
                   <tr>
                <td style="padding: 15px; text-align: left;width:14%"><strong>UPI ID:</strong></td>
                <td style=" padding: 15px; border-bottom: 1px solid black;width:36%;"></td>
                <td style=" padding: 15px; border-bottom: 1px solid black;width:14%"></td>
                <td style=" padding: 15px; border-bottom: 1px solid black;width:36%"></td>
              </tr>
                    <tr>
                <td style="padding: 15px; text-align: left;width:14%"></td>
                <td style=" padding: 15px; border-bottom: 1px solid black;width:36%;"></td>
                <td style=" padding: 15px; text-align: left;width:14%"><strong>Pin Code:</strong></td>
                <td style=" padding: 15px; border-bottom: 1px solid black;width:36%"></td>
              </tr>
              <tfoot >
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
            </tfoot>
            </table>
        </div>
    </div>
    </div>
</body>
</html>';
$obj_pdf->writeHTML($pdformd, true, false, true, false, '');
$obj_pdf->Output('Form2.pdf', 'D');
//D : Force Download , F: Save File
//I : Inline browser , S : Return document as String

  }
      public function form3PDF(){
        $this->load->language('common');
        if (!$this->common_model->isLoggedIn()) {
            redirect('signin');
        }
      
        $data = $this->common_model->commonFunction();
        $data['user_session'] = $this->session->userdata('user_account');
         //Get all members upto 7 levels
        $sponser_data['sponser_id'][] = $data['user_account']['user_sponser_id'];
        $userDetail = $this->getUserFormTreeInfo($sponser_data, 7);
        $this->load->library('Pdf');
        $obj_pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
        $obj_pdf->SetCreator(PDF_CREATOR);
        $title = "Form3 PDF";
        $obj_pdf->SetTitle($title);
        $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
        $obj_pdf->SetDefaultMonospacedFont('helvetica');
        $obj_pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
//        $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
        $obj_pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $obj_pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        $obj_pdf->SetFont('helvetica', '', 9);
        $obj_pdf->setFontSubsetting(false);
        // add a page
        $obj_pdf->AddPage();
        $bg = "background-image: url('".base_url()."media/front/images/bg-1.png')!important;";
        $time = strtotime($userDetail['register_date'][0]);
        $userdate = date("d/m/Y", $time);
        $pdformd = '<html>
            <head>
            <title></title>
            <meta name="viewport" content="width=device-width, initial-scale=1">
             <title>Bootstrap Example</title>
              <meta charset="utf-8">
              <meta name="viewport" content="width=device-width, initial-scale=1">
            </head>
            <body>
            <div style=" background-repeat: no-repeat; display: block; margin: 0 auto; margin-bottom: 0.5cm; width: 21cm;  height: 29.7cm; ">
            <div class="container" style="width:795px;height:1300px">
		<div style="float: left;height:200px;visibility:hidden;">
		</div>
		<br/>
		<div class="row" style="margin-top:190px">
                <p>
                 <table style="width:100%;" >
                <tr>
                <td style="text-align:left;"><strong>Donar Code: '.$userDetail['sponser_id'][0].'/Form-3</strong></td>
                <td style="text-align:right;"><strong>Date: '.$userdate.'</strong></td>
                </tr>
                </table>
		</p>
            <table style=" border: 1px solid black;border-collapse: collapse;width:100%;" cellpadding="6" align="center">
              <tr style=" border: 1px solid black;border-collapse: collapse;">
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; margin-top:25px;width:10%">7</td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:50%"><strong>NAME: '.ucfirst($userDetail['full_name'][6]).' ['.$userDetail['sponser_id'][6].']</strong><br/>'
                               . 'UPI ID: '.ucfirst($userDetail['upi_address']).', '.ucfirst($userDetail['city'][6]).', '.$userDetail['pin_code'][6].'</td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; width:10%">'.$data['global']['level7_amt'].'</td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:35%"></td>
              </tr>
              <tr style=" border: 1px solid black;border-collapse: collapse;">
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; width:10%">6</td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:50%"><strong>NAME: '.ucfirst($userDetail['full_name'][5]).' ['.$userDetail['sponser_id'][5].']</strong><br/>'
                              . 'UPI ID: '.ucfirst($userDetail['address'][5]).', '.ucfirst($userDetail['city'][5]).', '.$userDetail['pin_code'][5].'</td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; width:10%">'.$data['global']['level6_amt'].'</td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:35%"></td>
              </tr>
             <tr style=" border: 1px solid black;border-collapse: collapse;">
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; width:10%">5</td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:50%"><strong>NAME: '.ucfirst($userDetail['full_name'][4]).' ['.$userDetail['sponser_id'][4].']</strong><br/>'
                              . 'UPI ID: '.ucfirst($userDetail['address'][4]).', '.ucfirst($userDetail['city'][4]).', '.$userDetail['pin_code'][4].'</td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; width:10%">'.$data['global']['level5_amt'].'</td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:35%"></td>
              </tr>
              <tr style=" border: 1px solid black;border-collapse: collapse;">
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px;width:10%">4</td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:50%"><strong>NAME: '.ucfirst($userDetail['full_name'][3]).' ['.$userDetail['sponser_id'][3].']</strong><br/>'
                               . 'UPI ID: '.ucfirst($userDetail['address'][3]).', '.ucfirst($userDetail['city'][3]).', '.$userDetail['pin_code'][3].'</td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; width:10%">'.$data['global']['level4_amt'].'</td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:35%"></td>
              </tr>
              <tr style=" border: 1px solid black;border-collapse: collapse;">
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; width:10%">3</td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:50%"><strong>NAME: '.ucfirst($userDetail['full_name'][2]).' ['.$userDetail['sponser_id'][2].']</strong><br/>'
                              . 'UPI ID: '.ucfirst($userDetail['address'][2]).', '.ucfirst($userDetail['city'][2]).', '.$userDetail['pin_code'][2].'</td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; width:10%">'.$data['global']['level3_amt'].'</td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:35%"></td>
              </tr>
             <tr style=" border: 1px solid black;border-collapse: collapse;">
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; width:10%">2</td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:50%"><strong>NAME: '.ucfirst($userDetail['full_name'][1]).' ['.$userDetail['sponser_id'][1].']</strong><br/>'
                              . 'UPI ID: '.ucfirst($userDetail['address'][1]).', '.ucfirst($userDetail['city'][1]).', '.$userDetail['pin_code'][1].'</td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; width:10%">'.$data['global']['level2_amt'].'</td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:35%"></td>
              </tr>
              <tr style=" border: 1px solid black;border-collapse: collapse;">
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px;  left;width:10%">1</td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:50%"><strong>NAME: '.ucfirst($userDetail['full_name'][0]).' ['.$userDetail['sponser_id'][0].']</strong><br/>'
                              . 'UPI ID: '.ucfirst($userDetail['address'][0]).', '.ucfirst($userDetail['city'][0]).', '.$userDetail['pin_code'][0].'</td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; width:10%">0</td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:35%"></td>
              </tr>
            </table>
            <br>
            <br>			
            <table style=" border: 1px solid black;width:100%;  border-collapse: inherit; border-spacing: 0 10px;">
                    <tr>
                <td style="padding: 15px; text-align: left;width:14%"><strong>Full Name:</strong></td>
                <td style=" padding: 15px; border-bottom: 1px solid black;width:36%;"></td>
                <td style=" padding: 15px; text-align: left;width:14%"><strong>Mobile:</strong></td>
                <td style=" padding: 15px; border-bottom: 1px solid black;width:36%"></td>
              </tr>
                    <tr>
                <td style="padding: 15px; text-align: left;width:14%"><strong>Email Id:</strong></td>
                <td style=" padding: 15px; border-bottom: 1px solid black;width:36%;"></td>
                <td style=" padding: 15px; text-align: left;width:14%"><strong>Donar Id:</strong></td>
                <td style=" padding: 15px; border-bottom: 1px solid black;width:36%"></td>
              </tr>
                    <tr>
                <td style="padding: 15px; text-align: left;width:14%"><strong>UPI ID:</strong></td>
                <td style=" padding: 15px; border-bottom: 1px solid black;width:36%;"></td>
                <td style=" padding: 15px; border-bottom: 1px solid black;width:14%"></td>
                <td style=" padding: 15px; border-bottom: 1px solid black;width:36%"></td>
              </tr>
                    <tr>
                <td style="padding: 15px; text-align: left;width:14%"></td>
                <td style=" padding: 15px; border-bottom: 1px solid black;width:36%;"></td>
                <td style=" padding: 15px; text-align: left;width:14%"><strong>Pin Code:</strong></td>
                <td style=" padding: 15px; border-bottom: 1px solid black;width:36%"></td>
              </tr>
              <tfoot >
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
            </tfoot>
            </table>
        </div>
    </div>
    </div>
</body>
</html>';
$obj_pdf->writeHTML($pdformd, true, false, true, false, '');
$obj_pdf->Output('Form3.pdf', 'D');
//D : Force Download , F: Save File
//I : Inline browser , S : Return document as String

  }
      
      public function form4PDF(){
        $this->load->language('common');
        if (!$this->common_model->isLoggedIn()) {
            redirect('signin');
        }
      
        $data = $this->common_model->commonFunction();
        $data['user_session'] = $this->session->userdata('user_account');
         //Get all members upto 7 levels
        $sponser_data['sponser_id'][] = $data['user_account']['user_sponser_id'];
        $userDetail = $this->getUserFormTreeInfo($sponser_data, 7);
        $this->load->library('Pdf');
        $obj_pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
        $obj_pdf->SetCreator(PDF_CREATOR);
        $title = "Form4 PDF";
        $obj_pdf->SetTitle($title);
        $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
        $obj_pdf->SetDefaultMonospacedFont('helvetica');
        $obj_pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
//        $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
        $obj_pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $obj_pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        $obj_pdf->SetFont('helvetica', '', 9);
        $obj_pdf->setFontSubsetting(false);
        // add a page
        $obj_pdf->AddPage();
        $bg = "background-image: url('".base_url()."media/front/images/bg-1.png')!important;";
        $time = strtotime($userDetail['register_date'][0]);
        $userdate = date("d/m/Y", $time);
        $pdformd = '<html>
            <head>
            <title></title>
            <meta name="viewport" content="width=device-width, initial-scale=1">
             <title>Bootstrap Example</title>
              <meta charset="utf-8">
              <meta name="viewport" content="width=device-width, initial-scale=1">
            </head>
            <body>
            <div style=" background-repeat: no-repeat; display: block; margin: 0 auto; margin-bottom: 0.5cm; width: 21cm;  height: 29.7cm; ">
            <div class="container" style="width:795px;height:1300px">
		<div style="float: left;height:200px;visibility:hidden;">
		</div>
		<br/>
		<div class="row" style="margin-top:190px">
                <p>
                 <table style="width:100%;" >
                <tr>
                <td style="text-align:left;"><strong>Donar Code: '.$userDetail['sponser_id'][0].'/Form-4</strong></td>
                <td style="text-align:right;"><strong>Date: '.$userdate.'</strong></td>
                </tr>
                </table>
		</p>
            <table style=" border: 1px solid black;border-collapse: collapse;width:100%;" cellpadding="6" align="center">
              <tr style=" border: 1px solid black;border-collapse: collapse;">
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; margin-top:25px;width:10%">7</td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:50%"><strong>NAME: '.ucfirst($userDetail['full_name'][6]).' ['.$userDetail['sponser_id'][6].']</strong><br/>'
                               . 'UPI ID: '.ucfirst($userDetail['upi_address']).', '.ucfirst($userDetail['city'][6]).', '.$userDetail['pin_code'][6].'</td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; width:10%">0</td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:35%"></td>
              </tr>
              <tr style=" border: 1px solid black;border-collapse: collapse;">
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; width:10%">6</td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:50%"><strong>NAME: '.ucfirst($userDetail['full_name'][5]).' ['.$userDetail['sponser_id'][5].']</strong><br/>'
                              . 'UPI ID: '.ucfirst($userDetail['address'][5]).', '.ucfirst($userDetail['city'][5]).', '.$userDetail['pin_code'][5].'</td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; width:10%">0</td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:35%"></td>
              </tr>
             <tr style=" border: 1px solid black;border-collapse: collapse;">
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; width:10%">5</td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:50%"><strong>NAME: '.ucfirst($userDetail['full_name'][4]).' ['.$userDetail['sponser_id'][4].']</strong><br/>'
                              . 'UPI ID: '.ucfirst($userDetail['address'][4]).', '.ucfirst($userDetail['city'][4]).', '.$userDetail['pin_code'][4].'</td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; width:10%">0</td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:35%"></td>
              </tr>
              <tr style=" border: 1px solid black;border-collapse: collapse;">
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px;width:10%">4</td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:50%"><strong>NAME: '.ucfirst($userDetail['full_name'][3]).' ['.$userDetail['sponser_id'][3].']</strong><br/>'
                               . 'UPI ID: '.ucfirst($userDetail['address'][3]).', '.ucfirst($userDetail['city'][3]).', '.$userDetail['pin_code'][3].'</td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; width:10%">0</td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:35%"></td>
              </tr>
              <tr style=" border: 1px solid black;border-collapse: collapse;">
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; width:10%">3</td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:50%"><strong>NAME: '.ucfirst($userDetail['full_name'][2]).' ['.$userDetail['sponser_id'][2].']</strong><br/>'
                              . 'UPI ID: '.ucfirst($userDetail['address'][2]).', '.ucfirst($userDetail['city'][2]).', '.$userDetail['pin_code'][2].'</td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; width:10%">0</td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:35%"></td>
              </tr>
             <tr style=" border: 1px solid black;border-collapse: collapse;">
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; width:10%">2</td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:50%"><strong>NAME: '.ucfirst($userDetail['full_name'][1]).' ['.$userDetail['sponser_id'][1].']</strong><br/>'
                              . 'UPI ID: '.ucfirst($userDetail['address'][1]).', '.ucfirst($userDetail['city'][1]).', '.$userDetail['pin_code'][1].'</td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; width:10%">0</td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:35%"></td>
              </tr>
              <tr style=" border: 1px solid black;border-collapse: collapse;">
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px;  left;width:10%">1</td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:50%"><strong>NAME: '.ucfirst($userDetail['full_name'][0]).' ['.$userDetail['sponser_id'][0].']</strong><br/>'
                              . 'UPI ID: '.ucfirst($userDetail['address'][0]).', '.ucfirst($userDetail['city'][0]).', '.$userDetail['pin_code'][0].'</td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; width:10%">'.$data['global']['donation_amt'].'</td>
                <td style=" border: 1px solid black;border-collapse: collapse; padding: 15px; text-align: left;width:35%"></td>
              </tr>
            </table>
            <br>
            <br>			
            <table style=" border: 1px solid black;width:100%;  border-collapse: inherit; border-spacing: 0 10px;">
                    <tr>
                <td style="padding: 15px; text-align: left;width:14%"><strong>Full Name:</strong></td>
                <td style=" padding: 15px; border-bottom: 1px solid black;width:36%;"></td>
                <td style=" padding: 15px; text-align: left;width:14%"><strong>Mobile:</strong></td>
                <td style=" padding: 15px; border-bottom: 1px solid black;width:36%"></td>
              </tr>
                    <tr>
                <td style="padding: 15px; text-align: left;width:14%"><strong>Email Id:</strong></td>
                <td style=" padding: 15px; border-bottom: 1px solid black;width:36%;"></td>
                <td style=" padding: 15px; text-align: left;width:14%"><strong>Donar Id:</strong></td>
                <td style=" padding: 15px; border-bottom: 1px solid black;width:36%"></td>
              </tr>
                    <tr>
                <td style="padding: 15px; text-align: left;width:14%"><strong>UPI ID:</strong></td>
                <td style=" padding: 15px; border-bottom: 1px solid black;width:36%;"></td>
                <td style=" padding: 15px; border-bottom: 1px solid black;width:14%"></td>
                <td style=" padding: 15px; border-bottom: 1px solid black;width:36%"></td>
              </tr>
                    <tr>
                <td style="padding: 15px; text-align: left;width:14%"></td>
                <td style=" padding: 15px; border-bottom: 1px solid black;width:36%;"></td>
                <td style=" padding: 15px; text-align: left;width:14%"><strong>Pin Code:</strong></td>
                <td style=" padding: 15px; border-bottom: 1px solid black;width:36%"></td>
              </tr>
              <tfoot >
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
            </tfoot>
            </table>
        </div>
    </div>
    </div>
</body>
</html>';
$obj_pdf->writeHTML($pdformd, true, false, true, false, '');
$obj_pdf->Output('Form4.pdf', 'D');
//D : Force Download , F: Save File
//I : Inline browser , S : Return document as String

  }

  */
}

?>