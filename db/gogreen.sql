-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2018 at 09:08 PM
-- Server version: 5.7.9
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gogreen`
--

-- --------------------------------------------------------

--
-- Table structure for table `green_ci_sessions`
--

DROP TABLE IF EXISTS `green_ci_sessions`;
CREATE TABLE IF NOT EXISTS `green_ci_sessions` (
  `session_id` varchar(40) CHARACTER SET utf8 NOT NULL DEFAULT '0',
  `ip_address` varchar(45) CHARACTER SET utf8 NOT NULL DEFAULT '0',
  `user_agent` varchar(120) CHARACTER SET utf8 DEFAULT NULL,
  `last_activity` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `user_data` text CHARACTER SET utf8,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `green_ci_sessions`
--

INSERT INTO `green_ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('13aacc79b7b819d7633ea0a48b2af4e7', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:61.0) Gecko/20100101 Firefox/61.0', 1535611225, 'a:2:{s:12:"user_account";a:6:{s:7:"user_id";s:1:"8";s:15:"user_sponser_id";s:7:"G521387";s:9:"user_name";s:0:"";s:9:"full_name";s:11:"NitinM mane";s:10:"user_email";s:27:"nitin.flyingeagle@gmail.com";s:9:"user_type";s:1:"1";}s:8:"popup_id";s:7:"G521387";}'),
('37d705053ef4f8aeb3506bea243ef96c', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:61.0) Gecko/20100101 Firefox/61.0', 1536125819, ''),
('56a335f246721be5e42545f5995b53cc', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36', 1535610207, 'a:2:{s:9:"user_data";s:0:"";s:12:"user_account";a:6:{s:7:"user_id";s:1:"1";s:9:"user_name";s:5:"admin";s:10:"user_email";s:28:"nitin.flyingeaglea@gmail.com";s:9:"user_type";s:1:"2";s:7:"role_id";s:1:"1";s:15:"user_privileges";s:6:"a:0:{}";}}'),
('89b3d9fe3c408433b2c0ace7e9c216cb', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:61.0) Gecko/20100101 Firefox/61.0', 1536134999, 'a:1:{s:9:"user_data";s:0:"";}'),
('9e2651ca903d6dc40a5ed289b7f82c7f', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:62.0) Gecko/20100101 Firefox/62.0', 1536591399, 'a:1:{s:9:"user_data";s:0:"";}');

-- --------------------------------------------------------

--
-- Table structure for table `green_mst_email_templates`
--

DROP TABLE IF EXISTS `green_mst_email_templates`;
CREATE TABLE IF NOT EXISTS `green_mst_email_templates` (
  `email_template_id` int(11) NOT NULL AUTO_INCREMENT,
  `email_template_title` varchar(100) DEFAULT NULL,
  `email_template_subject` varchar(100) DEFAULT NULL,
  `email_template_content` text,
  `lang_id` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `date_created` date DEFAULT NULL,
  `date_updated` date DEFAULT NULL,
  PRIMARY KEY (`email_template_id`),
  KEY `fk_pro1_email_templates_1` (`lang_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `green_mst_email_templates`
--

INSERT INTO `green_mst_email_templates` (`email_template_id`, `email_template_title`, `email_template_subject`, `email_template_content`, `lang_id`, `created_by`, `date_created`, `date_updated`) VALUES
(1, 'activate-user-email', 'Your account is activated by Admin', '<p>	<span style=\\"font-size:14px;\\">Dear ||USER_NAME||,</span></p><p>	<span style=\\"font-size: 14px;\\">Your account is successfully activated by admin.</span></p><p>	<span style=\\"font-size: 14px;\\">You can use below credentials for website login.</span></p><p>	<span style=\\"color: rgb(0, 0, 0); font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 14px;\\">Email : ||USER_EMAIL||</span></p><p>	<span style=\\"color: rgb(0, 0, 0); font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 14px;\\">Password : ||PASSWORD||</span></p><p>	<span style=\\"color: rgb(0, 0, 0); font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 14px;\\">Website Login: ||LOGIN_LINK||</span></p><p>	&nbsp;</p><p>	<span style=\\"font-size: 14px;\\">Your Sincerely,</span></p><p>	<span style=\\"font-size: 14px;\\">Admin</span></p>', 17, 1, '2018-04-10', '2018-07-28'),
(2, 'contact-us-email', 'Customer Query', '<p>	<span style=\\"font-size:14px;\\">Dear ||ADMIN_NAME||,</span></p><p>	<span style=\\"font-size: 14px; color: rgb(0, 0, 0); font-family: Verdana, Arial, Helvetica, sans-serif; \\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;You have received this mail from the ||USER_EMAIL|| to clerify his question</span></p><div data-mce-style=\\"margin: 0px;\\" style=\\"color: rgb(0, 0, 0); font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 10px; margin: 0px; \\">	<span style=\\"font-size: 14px; \\">||MESSAGE||&nbsp;</span></div><div>	&nbsp;</div><p>	<span style=\\"font-size: 14px; \\">Thank you,</span></p><p>	<span style=\\"font-size:14px;\\">||USER_EMAIL||</span></p>', 17, 1, '2018-04-10', '2018-07-23'),
(3, 'user-invoice', 'User Invoice', '<p>	Dear ||USER_NAME||,</p><p>	&nbsp;</p><p>	Your plan subscription has&nbsp; been completed suceessfully. Please see below invoice details.</p><p>	User Email : ||USER_EMAIL||&nbsp;</p><p>	Invoice link : ||INVOICE_LINK||</p><p>	&nbsp;</p><p>	Your Sincerely,</p><p>	Admin</p>', 17, 1, '2018-04-10', '2018-07-23'),
(4, 'admin-registration-successful', 'Admin  Registration Successful', '<p>	Dear ||USER_NAME||,</p><p>	&nbsp;</p><p>	Your registration has&nbsp; been completed suceessfully. Please click on following link and activitae your account to login.</p><p>	Activation link :&nbsp;</p><p>	||ACTIVATION_LINK||</p><p>	&nbsp;</p><p>	Your Sincerely,</p><p>	||SITE_TITLE||,</p><p>	||SITE_URL||</p>', 17, 1, '2018-04-10', '2018-07-23');

-- --------------------------------------------------------

--
-- Table structure for table `green_mst_global_settings`
--

DROP TABLE IF EXISTS `green_mst_global_settings`;
CREATE TABLE IF NOT EXISTS `green_mst_global_settings` (
  `global_name_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`global_name_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `green_mst_global_settings`
--

INSERT INTO `green_mst_global_settings` (`global_name_id`, `name`) VALUES
(1, 'site_email'),
(2, 'site_title'),
(3, 'contact_email'),
(4, 'date_format'),
(5, 'default_currency'),
(6, 'currency_symbol'),
(7, 'per_page_record'),
(8, 'gst_number'),
(9, 'level1_amt'),
(10, 'level2_amt'),
(11, 'level3_amt'),
(12, 'level4_amt'),
(13, 'level5_amt'),
(14, 'level6_amt'),
(15, 'level7_amt'),
(16, 'donation_amt');

-- --------------------------------------------------------

--
-- Table structure for table `green_mst_ims`
--

DROP TABLE IF EXISTS `green_mst_ims`;
CREATE TABLE IF NOT EXISTS `green_mst_ims` (
  `ims_id` int(11) NOT NULL AUTO_INCREMENT,
  `contents` text,
  `subject` varchar(250) DEFAULT NULL,
  `type` enum('Message','Forum') NOT NULL DEFAULT 'Message',
  `user_id` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `createddate` varchar(100) DEFAULT NULL,
  `remainder_date` varchar(100) DEFAULT NULL,
  `msg_status` enum('0','1','2') NOT NULL DEFAULT '0' COMMENT '''0''=>Pending, ''1''=> Inprogress, ''2''=>Resolved',
  PRIMARY KEY (`ims_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `green_mst_ims`
--

INSERT INTO `green_mst_ims` (`ims_id`, `contents`, `subject`, `type`, `user_id`, `parent_id`, `createddate`, `remainder_date`, `msg_status`) VALUES
(1, 'My message', 'my sub', 'Forum', 8, 0, '2018-07-21 11:35:02', '2018-07-21 11:35:02', '2'),
(2, 'This is ', 'Second Message', 'Forum', 8, 0, '2018-07-21 11:54:12', '2018-07-21 11:54:12', '2'),
(3, 'sdfhgjk', 'fchgj', 'Forum', 8, 0, '2018-07-21 12:04:41', '2018-07-21 12:04:41', '0'),
(4, 'This is test', 'new msg', 'Forum', 8, 0, '2018-07-21 12:24:08', '2018-07-21 12:24:08', '2'),
(5, 'asaas sdcsdff', '', 'Forum', 1, 1, '2018-07-21 12:24:08', NULL, '2'),
(6, 'asdsc', '', 'Forum', 1, 1, '2018-07-25', NULL, '2'),
(7, 'sxdfgv dc', '', 'Forum', 1, 1, '2018-07-25', NULL, '1'),
(8, 'qwdwa efes tg2qedwatgw dfwe4tgsdfawrdb', '', 'Forum', 1, 1, '2018-07-25', NULL, '2'),
(9, 'This is admin reply', '', 'Forum', 1, 4, '2018-07-25', NULL, '2'),
(10, 'qwdefvdxw feesdf', '', 'Forum', 1, 4, '2018-07-25', NULL, '2'),
(11, ' Join Magento at Meet Magento Singapore on 27 August 2018 in Marina Bay Sands.\\r\\n\\r\\nHear from top regional industry leaders and Magento experts like Ben Marks, Magento Evangelist and Nicholas Kontopoulos, Regional Head of APAC Marketing. ', '', 'Forum', 1, 2, '2018-07-28', NULL, '2');

-- --------------------------------------------------------

--
-- Table structure for table `green_mst_languages`
--

DROP TABLE IF EXISTS `green_mst_languages`;
CREATE TABLE IF NOT EXISTS `green_mst_languages` (
  `lang_id` int(11) NOT NULL AUTO_INCREMENT,
  `lang_name` varchar(100) DEFAULT NULL,
  `lang_icon` varchar(100) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`lang_id`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `green_mst_languages`
--

INSERT INTO `green_mst_languages` (`lang_id`, `lang_name`, `lang_icon`, `status`) VALUES
(2, 'Afrikaans', '', 'I'),
(4, 'Arabic', '', 'I'),
(5, 'Armenian', '', 'I'),
(7, 'Basque', '', 'I'),
(8, 'Belarusian', '', 'I'),
(9, 'Bengali', '', 'I'),
(10, 'Bulgarian', '', 'I'),
(11, 'Catalan', '', 'I'),
(12, 'Chinese', '', 'A'),
(13, 'Croatian', '', 'I'),
(14, 'Czech', '', 'I'),
(15, 'Danish', '', 'I'),
(16, 'Dutch', '', 'I'),
(17, 'English', 'en.jpg', 'A'),
(18, 'Esperanto', '', 'I'),
(19, 'Estonian', '', 'I'),
(20, 'Filipino', '', 'I'),
(21, 'Finnish', '', 'I'),
(22, 'French', '', 'I'),
(23, 'Galician', '', 'I'),
(24, 'Georgian', '', 'I'),
(25, 'German', '', 'I'),
(26, 'Greek', '', 'I'),
(27, 'Gujarati', '', 'I'),
(28, 'Haitian Creole', '', 'I'),
(29, 'Hebrew', '', 'I'),
(30, 'Hindi', '', 'I'),
(31, 'Hungarian', '', 'I'),
(32, 'Icelandic', '', 'I'),
(33, 'Indonesian', '', 'I'),
(34, 'Irish', '', 'I'),
(35, 'Italian', '', 'I'),
(36, 'Japanese', 'ar.png', 'I'),
(37, 'Kannada', '', 'I'),
(38, 'Korean', '', 'I'),
(39, 'Latin', '', 'I'),
(40, 'Latvian', '', 'I'),
(41, 'Lithuanian', '', 'I'),
(42, 'Macedonian', '', 'I'),
(43, 'Malay', '', 'I'),
(44, 'Maltese', '', 'I'),
(45, 'Norwegian', '', 'I'),
(46, 'Persian', '', 'I'),
(47, 'Polish', '', 'I'),
(48, 'Portuguese', '', 'I'),
(49, 'Romanian', '', 'I'),
(50, 'Russian', '', 'I'),
(51, 'Serbian', '', 'I'),
(52, 'Slovak', '', 'I'),
(53, 'Slovenian', '', 'I'),
(54, 'Spanish', '', 'I'),
(55, 'Swahili', '', 'I'),
(56, 'Swedish', '', 'I'),
(57, 'Tamil', '', 'I'),
(58, 'Telugu', '', 'I'),
(59, 'Thai', '', 'I'),
(60, 'Turkish', '', 'I'),
(61, 'Ukrainian', '', 'I'),
(62, 'Urdu', '', 'I'),
(63, 'Vietnamese', '', 'I'),
(64, 'Welsh', '', 'I');

-- --------------------------------------------------------

--
-- Table structure for table `green_mst_privileges`
--

DROP TABLE IF EXISTS `green_mst_privileges`;
CREATE TABLE IF NOT EXISTS `green_mst_privileges` (
  `privileges_id` int(11) NOT NULL AUTO_INCREMENT,
  `privilege_name` varchar(200) NOT NULL,
  PRIMARY KEY (`privileges_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `green_mst_privileges`
--

INSERT INTO `green_mst_privileges` (`privileges_id`, `privilege_name`) VALUES
(1, 'manage global settings'),
(2, 'manage email template'),
(3, 'manage role'),
(4, 'manage admin'),
(5, 'manage all users'),
(6, 'manage pending forms'),
(7, 'manage messages'),
(8, 'manage users reports'),
(9, 'manage donation income'),
(10, 'manage users log');

-- --------------------------------------------------------

--
-- Table structure for table `green_mst_role`
--

DROP TABLE IF EXISTS `green_mst_role`;
CREATE TABLE IF NOT EXISTS `green_mst_role` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(50) NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `green_mst_role`
--

INSERT INTO `green_mst_role` (`role_id`, `role_name`) VALUES
(1, 'Super Admin'),
(2, 'Normal User'),
(7, 'subadmin');

-- --------------------------------------------------------

--
-- Table structure for table `green_mst_users`
--

DROP TABLE IF EXISTS `green_mst_users`;
CREATE TABLE IF NOT EXISTS `green_mst_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_sponser_id` varchar(50) DEFAULT NULL,
  `sponser_id` varchar(50) DEFAULT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `user_name` varchar(200) DEFAULT NULL,
  `register_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `form_submit_date` datetime DEFAULT NULL,
  `activate_date` datetime DEFAULT NULL,
  `is_active` enum('Yes','No') NOT NULL DEFAULT 'No' COMMENT 'activated by admin',
  `form_submitted` enum('Yes','No') NOT NULL DEFAULT 'No' COMMENT 'by main user through dashboard',
  `user_email` varchar(250) NOT NULL,
  `user_password` varchar(150) NOT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `gender` enum('1','2') NOT NULL DEFAULT '1',
  `user_type` enum('1','2','3') NOT NULL DEFAULT '3',
  `user_status` enum('0','1','2') NOT NULL DEFAULT '0',
  `role_id` int(11) DEFAULT NULL,
  `activation_code` varchar(100) DEFAULT NULL,
  `email_verified` enum('0','1') NOT NULL DEFAULT '0',
  `address` text,
  `state` varchar(200) DEFAULT NULL,
  `city` varchar(200) DEFAULT NULL,
  `pin_code` varchar(30) DEFAULT NULL,
  `mobile_no` varchar(30) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `occupation` varchar(150) DEFAULT NULL,
  `annual_income` varchar(50) DEFAULT NULL,
  `nominee_name` varchar(150) DEFAULT NULL,
  `nominee_relation` varchar(100) DEFAULT NULL,
  `upline1_id` varchar(50) DEFAULT NULL,
  `upline1_donation_amt` varchar(100) DEFAULT NULL,
  `upline2_id` varchar(50) DEFAULT NULL,
  `upline2_donation_amt` varchar(100) DEFAULT NULL,
  `upline3_id` varchar(50) DEFAULT NULL,
  `upline3_donation_amt` varchar(100) DEFAULT NULL,
  `upline4_id` varchar(50) DEFAULT NULL,
  `upline4_donation_amt` varchar(100) DEFAULT NULL,
  `upline5_id` varchar(50) DEFAULT NULL,
  `upline5_donation_amt` varchar(100) DEFAULT NULL,
  `upline6_id` varchar(50) DEFAULT NULL,
  `upline6_donation_amt` varchar(100) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `green_mst_users`
--

INSERT INTO `green_mst_users` (`user_id`, `user_sponser_id`, `sponser_id`, `full_name`, `user_name`, `register_date`, `form_submit_date`, `activate_date`, `is_active`, `form_submitted`, `user_email`, `user_password`, `profile_picture`, `gender`, `user_type`, `user_status`, `role_id`, `activation_code`, `email_verified`, `address`, `state`, `city`, `pin_code`, `mobile_no`, `last_login`, `occupation`, `annual_income`, `nominee_name`, `nominee_relation`, `upline1_id`, `upline1_donation_amt`, `upline2_id`, `upline2_donation_amt`, `upline3_id`, `upline3_donation_amt`, `upline4_id`, `upline4_donation_amt`, `upline5_id`, `upline5_donation_amt`, `upline6_id`, `upline6_donation_amt`, `first_name`, `last_name`) VALUES
(1, 'G777777', NULL, 'ADMIN', 'admin', '2018-07-19 19:18:30', NULL, NULL, 'No', 'No', 'nitin.flyingeaglea@gmail.com', 'Pass@123$', NULL, '1', '2', '1', 1, '1532934776', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Admin', 'add'),
(2, 'G666666', 'G777777', 'Six Six', 'Six', '2018-07-20 12:38:16', NULL, NULL, 'Yes', 'No', 'six@gmail.com', '123456', NULL, '1', '1', '1', 0, NULL, '1', 'nnnnnnSai Colony, Near Video Centre, Shiroli (P),\nTal-Hatkanangale, Dist-Kolhapur,416110 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'G555555', 'G666666', 'Five Five', 'Five ', '2018-07-20 12:39:36', NULL, NULL, 'Yes', 'No', 'five@gmail.com', '123456', NULL, '1', '1', '1', 0, NULL, '1', '818 E line Bazar kasaba bawada kolhapur,416006', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'G444444', 'G555555', 'Four Four', 'Four', '2018-07-20 12:40:41', NULL, NULL, 'Yes', 'No', 'four@gmail.com', '123456', NULL, '1', '1', '1', 0, NULL, '1', 'Block no-5 pratibha nagar market\nkolhapur,416008', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'G333333', 'G444444', 'Three Three', 'Three', '2018-07-20 12:40:41', NULL, NULL, 'Yes', 'No', 'three@gmail.com', '123456', NULL, '1', '1', '1', 0, NULL, '1', 'BLOCK NO 89 MAHADA COLONY OPPO. HOCKY\nSTEDIUM\nKOLHAPUR,416012', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'G222222', 'G333333', 'Two Two', 'Two', '2018-07-20 12:40:41', NULL, NULL, 'Yes', 'No', 'two@gmail.com', '123456', NULL, '1', '1', '1', 0, NULL, '1', '2801,C ward near Katta group sidhathnagar\nkolhapur,416002', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'G111111', 'G222222', 'One One', 'One', '2018-07-20 12:40:41', NULL, NULL, 'Yes', 'No', 'one@gmail.com', '123456', NULL, '1', '1', '1', 0, NULL, '1', 'AT POST SHINGNAPUR 1425 NEAR\nVIDYANIKETAN TAL\nKARVEER KOLHAPUR,416010', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'G521387', 'G111111', 'NitinM mane', '', '2018-07-20 09:03:32', NULL, NULL, 'Yes', 'No', 'nitin.flyingeagle@gmail.com', '123456', NULL, '1', '1', '1', 0, '153207381212274', '1', '     Polite Panorama, Dighi', NULL, 'pune', '413310', '9284347043', NULL, '', '500000', 'NBMs', 'MEs', '111111', '300', '222222', '300', '333333', '300', '444444', '350', '555555', '350', '666666', '350', NULL, NULL),
(10, 'G189763', 'G521387', 'Dharmendra', NULL, '2018-07-22 07:04:40', NULL, NULL, 'No', 'No', 'dharma@gmail.com', '123456', NULL, '1', '1', '1', NULL, '153223948017846', '0', 'pune', NULL, '', '', '7709123456', NULL, '', '', '', '', '521387', '300', '111111', '300', '222222', '300', '333333', '320', '444444', '320', '555555', '320', NULL, NULL),
(11, 'G216945', 'G521387', 'Pratap', NULL, '2018-07-22 07:05:41', NULL, NULL, 'No', 'Yes', 'pratap@flyingtech.com', '123456', NULL, '1', '1', '1', NULL, '15322395414283', '0', 'Sangli', NULL, '', '', '9865321478', NULL, '', '', '', '', '521387', '300', '111111', '300', '222222', '300', '333333', '320', '444444', '320', '555555', '320', NULL, NULL),
(12, 'G199929', 'G521387', 'Sachin', NULL, '2018-07-22 07:06:59', NULL, NULL, 'No', 'No', 'sachin@gmail.com', '123456', NULL, '1', '1', '1', NULL, '1532239619592', '0', 'Solapur', NULL, 'Pune', '', '765432345', NULL, '', '', '', '', '521387', '300', '111111', '300', '222222', '300', '333333', '320', '444444', '320', '555555', '320', NULL, NULL),
(13, 'G572652', 'G521387', 'Kishor', '', '2018-07-22 07:07:32', NULL, NULL, 'No', 'No', 'kishor@rediffmail.com', '123456', NULL, '1', '1', '1', 0, '15322396521090', '0', '', NULL, '', '', '9665280126', NULL, 'Developer', '', '', '', '521387', '300', '111111', '300', '222222', '300', '333333', '320', '444444', '320', '555555', '320', NULL, NULL),
(18, 'T299289', 'G521387', 'TEST', NULL, '2018-08-30 07:19:44', NULL, NULL, 'No', 'No', 'nitin@gmail.com', '123456', NULL, '1', '1', '1', NULL, '153560998414078', '1', 'Pune', NULL, 'TEST', '413302', '9850454544', NULL, '', '', '', '', 'G521387', '300', 'G111111', '300', 'G222222', '300', 'G333333', '320', 'G444444', '320', 'G555555', '320', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `green_trans_global_settings`
--

DROP TABLE IF EXISTS `green_trans_global_settings`;
CREATE TABLE IF NOT EXISTS `green_trans_global_settings` (
  `global_val_id` int(11) NOT NULL AUTO_INCREMENT,
  `global_name_id` int(11) DEFAULT NULL,
  `value` varchar(1000) DEFAULT NULL,
  `lang_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`global_val_id`),
  KEY `language_fk_genral` (`lang_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `green_trans_global_settings`
--

INSERT INTO `green_trans_global_settings` (`global_val_id`, `global_name_id`, `value`, `lang_id`) VALUES
(1, 1, 'nitinbmane33@gmail.com', 17),
(2, 2, 'GoGreen', 17),
(4, 1, 'san.kullolli@gmail.com', 12),
(5, 2, 'Pipl Code Library', 12),
(6, 3, 'nitinbmane33@gmail.com', 17),
(7, 3, 'pradip@panaceatek.com', 12),
(8, 4, 'Y-m-d H:i', 17),
(9, 4, 'm.d.y', 12),
(10, 5, 'INR', 17),
(11, 5, 'USD', 12),
(12, 6, 'R', 17),
(13, 6, '$', 12),
(14, 8, 'DDBPS8855E', 17),
(15, 9, '300', 17),
(16, 9, '300', 12),
(17, 10, '300', 17),
(18, 11, '300', 17),
(19, 12, '300', 17),
(20, 13, '320', 17),
(21, 14, '320', 17),
(22, 15, '320', 17),
(23, 16, '2000', 17);

-- --------------------------------------------------------

--
-- Table structure for table `green_trans_role_privileges`
--

DROP TABLE IF EXISTS `green_trans_role_privileges`;
CREATE TABLE IF NOT EXISTS `green_trans_role_privileges` (
  `role_privilege_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `privilege_id` int(11) NOT NULL,
  PRIMARY KEY (`role_privilege_id`),
  KEY `fk_Role_id` (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=120 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `green_trans_role_privileges`
--

INSERT INTO `green_trans_role_privileges` (`role_privilege_id`, `role_id`, `privilege_id`) VALUES
(99, 2, 1),
(100, 2, 2),
(101, 2, 5),
(102, 8, 1),
(103, 8, 2),
(110, 7, 1),
(111, 7, 2),
(112, 7, 3),
(113, 7, 4),
(114, 7, 5),
(115, 7, 6),
(116, 7, 7),
(117, 7, 8),
(118, 7, 9),
(119, 7, 10);

-- --------------------------------------------------------

--
-- Table structure for table `green_trans_users_form`
--

DROP TABLE IF EXISTS `green_trans_users_form`;
CREATE TABLE IF NOT EXISTS `green_trans_users_form` (
  `form_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_sponser_id` varchar(30) NOT NULL,
  `form_count` int(11) NOT NULL,
  `added_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`form_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `green_trans_users_form`
--

INSERT INTO `green_trans_users_form` (`form_id`, `user_sponser_id`, `form_count`, `added_date`) VALUES
(1, 'G555555', 1, '2018-07-22 14:38:32'),
(2, 'G222222', 2, '2018-07-22 14:38:32'),
(3, 'G111111', 1, '2018-07-22 14:38:32'),
(5, 'G521387', 1, '2018-07-25 11:11:43');

-- --------------------------------------------------------

--
-- Table structure for table `green_trans_user_transaction`
--

DROP TABLE IF EXISTS `green_trans_user_transaction`;
CREATE TABLE IF NOT EXISTS `green_trans_user_transaction` (
  `trans_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_sponser_id` varchar(50) NOT NULL,
  `from_id` varchar(100) NOT NULL,
  `to_id` varchar(50) NOT NULL,
  `pnr_no` varchar(30) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `transaction_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `transaction_image` varchar(200) NOT NULL,
  PRIMARY KEY (`trans_id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `green_trans_user_transaction`
--

INSERT INTO `green_trans_user_transaction` (`trans_id`, `user_sponser_id`, `from_id`, `to_id`, `pnr_no`, `amount`, `transaction_date`, `transaction_image`) VALUES
(1, 'G521387', 'G199929', 'G111111', 'ESRF', '300', '2018-07-25 12:11:43', 'attach_10373.jpg'),
(2, 'G521387', 'G199929', 'G222222', 'RF', '300', '2018-07-25 12:11:43', 'attach_10373.jpg'),
(3, 'G521387', 'G199929', 'G333333', 'WE', '300', '2018-07-25 12:11:43', 'attach_10373.jpg'),
(4, 'G521387', 'G199929', 'G444444', '44', '320', '2018-07-25 12:11:43', 'attach_10373.jpg'),
(5, 'G521387', 'G199929', 'G555555', 'ADC', '320', '2018-07-25 12:11:43', 'attach_10373.jpg'),
(6, 'G521387', 'G199929', 'G666666', 'qASDF', '320', '2018-07-25 12:11:43', 'attach_10373.jpg'),
(7, 'G521387', 'G216945-G572652', 'G111111', '99999', '600', '2018-07-25 12:14:35', 'attach_26385.jpg'),
(8, 'G521387', 'G216945-G572652', 'G222222', '8888', '600', '2018-07-25 12:14:35', 'attach_26385.jpg'),
(9, 'G521387', 'G216945-G572652', 'G333333', '77777', '600', '2018-07-25 12:14:35', 'attach_26385.jpg'),
(10, 'G521387', 'G216945-G572652', 'G444444', '666666', '640', '2018-07-25 12:14:35', 'attach_26385.jpg'),
(11, 'G521387', 'G216945-G572652', 'G555555', '55555', '640', '2018-07-25 12:14:35', 'attach_26385.jpg'),
(12, 'G521387', 'G216945-G572652', 'G666666', '4444', '640', '2018-07-25 12:14:35', 'attach_26385.jpg'),
(13, 'T718901', 'T332652', 'G199929', '11', '300', '2018-08-06 10:46:30', 'gogreen_T718901_13563.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `green_user_sign_in_log`
--

DROP TABLE IF EXISTS `green_user_sign_in_log`;
CREATE TABLE IF NOT EXISTS `green_user_sign_in_log` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(150) NOT NULL,
  `user_name` varchar(150) DEFAULT NULL,
  `login_by` varchar(150) NOT NULL,
  `ip_address` varchar(150) DEFAULT NULL,
  `geo_location_id` int(11) DEFAULT NULL COMMENT 'primary key of geo location',
  `last_login` date DEFAULT NULL,
  `last_logout` date DEFAULT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `entry_for` varchar(5) NOT NULL DEFAULT 'S',
  PRIMARY KEY (`log_id`),
  KEY `geo_location_id` (`geo_location_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `green_user_sign_in_log`
--

INSERT INTO `green_user_sign_in_log` (`log_id`, `user_id`, `user_name`, `login_by`, `ip_address`, `geo_location_id`, `last_login`, `last_logout`, `created_on`, `entry_for`) VALUES
(1, 'G777777', NULL, 'Admin', NULL, NULL, NULL, NULL, '2018-07-30 15:32:59', 'S'),
(2, '16', 'aaaaa', 'Admin', NULL, NULL, NULL, NULL, '2018-07-30 15:35:48', 'R'),
(3, 'G777777', NULL, 'Admin', NULL, NULL, NULL, NULL, '2018-07-30 18:42:55', 'S'),
(4, '14', NULL, 'Admin', NULL, NULL, NULL, NULL, '2018-07-30 18:48:49', 'S'),
(5, 'G777777', NULL, 'Admin', NULL, NULL, NULL, NULL, '2018-07-30 18:58:52', 'S'),
(6, '14', NULL, 'Admin', NULL, NULL, NULL, NULL, '2018-07-30 18:59:27', 'S'),
(7, 'G521387', 'NitinM mane', 'User', '::1', NULL, NULL, NULL, '2018-07-30 19:11:03', 'S'),
(8, 'G777777', NULL, 'Admin', '127.0.0.1', NULL, NULL, NULL, '2018-07-30 19:12:01', 'S'),
(9, 'G777777', NULL, 'Admin', '127.0.0.1', NULL, NULL, NULL, '2018-07-31 07:54:46', 'S'),
(10, 'G777777', NULL, 'Admin', '127.0.0.1', NULL, NULL, NULL, '2018-07-31 11:37:14', 'S'),
(11, 'G777777', NULL, 'Admin', '127.0.0.1', NULL, NULL, NULL, '2018-08-06 07:35:48', 'S'),
(12, 'T718901', 'qwerty', 'User', '::1', NULL, NULL, NULL, '2018-08-06 07:38:27', 'S'),
(13, 'T332652', 'qwerty1', 'User', '::1', NULL, NULL, NULL, '2018-08-06 07:43:12', 'R'),
(14, 'T718901', 'qwerty', 'User', '::1', NULL, NULL, NULL, '2018-08-06 07:43:29', 'S'),
(15, 'G777777', NULL, 'Admin', '127.0.0.1', NULL, NULL, NULL, '2018-08-06 10:36:25', 'S'),
(16, 'G777777', NULL, 'Admin', '127.0.0.1', NULL, NULL, NULL, '2018-08-06 11:43:45', 'S'),
(17, 'T718901', 'qwerty', 'User', '::1', NULL, NULL, NULL, '2018-08-07 07:50:29', 'S'),
(18, 'G521387', 'NitinM mane', 'User', '127.0.0.1', NULL, NULL, NULL, '2018-08-30 06:09:20', 'S'),
(19, 'G521387', 'NitinM mane', 'User', '127.0.0.1', NULL, NULL, NULL, '2018-08-30 06:16:55', 'S'),
(20, 'T299289', 'Test', 'User', '127.0.0.1', NULL, NULL, NULL, '2018-08-30 06:19:44', 'R'),
(21, 'G521387', 'NitinM mane', 'User', '127.0.0.1', NULL, NULL, NULL, '2018-08-30 06:21:36', 'S'),
(22, 'G777777', NULL, 'Admin', '::1', NULL, NULL, NULL, '2018-08-30 06:23:55', 'S'),
(23, 'G521387', 'NitinM mane', 'User', '127.0.0.1', NULL, NULL, NULL, '2018-08-30 06:31:13', 'S');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
