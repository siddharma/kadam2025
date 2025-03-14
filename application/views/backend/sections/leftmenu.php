<div class="container-fluid">
    <div class="row-fluid">
        <?php if ($user_account['role_id'] == 1) { ?>
            <!-- left menu starts -->
            <div class="span2 main-menu-span">

                <div class="well nav-collapse sidebar-nav">

                    <ul class="nav nav-tabs nav-stacked main-menu">

                        <li class="nav-header hidden-tablet">Admin Settings</li>

                        <li> <a class="ajax-link" href="<?php echo base_url(); ?>backend/global-settings/list"><i class="icon-globe"></i> <span class="hidden-tablet">Manage Global Settings</span></a> </li>
                       

                        <li> <a class="ajax-link" href="<?php echo base_url(); ?>backend/email-template/list"><i class="icon-globe"></i> <span class="hidden-tablet">Manage Email Templates</span></a> </li>
                        
                        <li> <a class="ajax-link" href="<?php echo base_url(); ?>backend/role/list"><i class="icon-adjust"></i> <span class="hidden-tablet">Manage Roles</span></a> </li>

                        <li> <a class="ajax-link" href="<?php echo base_url(); ?>backend/admin/list"><i class="icon-user"></i> <span class="hidden-tablet">Manage Admin</span></a> </li>
                        <li class="nav-header hidden-tablet">View Details</li>
                        <li> <a class="ajax-link" href="<?php echo base_url(); ?>backend/user/mainlist"><i class="icon-user"></i> <span class="hidden-tablet">Manage All Users</span></a> </li>
                        <li> <a class="ajax-link" href="<?php echo base_url(); ?>backend/user/list"><i class="icon-user"></i> <span class="hidden-tablet">Users Pending Form </span></a> </li>
                        <li> <a class="ajax-link" href="<?php echo base_url(); ?>backend/support"><i class="icon-user"></i> <span class="hidden-tablet">Manage Messages</span></a> </li>
                        
                        <li class="nav-header hidden-tablet">Report Details</li>
                        <li> <a class="ajax-link" href="<?php echo base_url(); ?>report/userlist"><i class="icon-user"></i> <span class="hidden-tablet">Users Report</span></a> </li>
                        <li> <a class="ajax-link" href="<?php echo base_url(); ?>report/income"><i class="icon-user"></i> <span class="hidden-tablet">Donation Income</span></a> </li>
                        <li> <a class="ajax-link" href="<?php echo base_url(); ?>report/userlog"><i class="icon-user"></i> <span class="hidden-tablet">User Log</span></a> </li>
                         </ul>
                </div>

            </div>
            <!--/span-->
            <!-- left menu ends -->
            <!-- content starts -->
            <?php
        } else {
            ?>
            <div class="span2 main-menu-span">
                <div class="well nav-collapse sidebar-nav">
                    <ul class="nav nav-tabs nav-stacked main-menu">
                        <?php
                        $arr_login_admin_privileges = unserialize($user_account['user_privileges']);
//                        echo "<pre>";print_r($arr_login_admin_privileges);echo "</pre>";    
                        if (count($arr_login_admin_privileges) > 0) {
                            $user_section = TRUE;
                            foreach ($arr_login_admin_privileges as $privilage) {
                                switch ($privilage) {
                                    case 1:
                                        ?>
                        <li class="nav-header hidden-tablet">Admin Settings</li>

                         
                        <li> <a class="ajax-link" href="<?php echo base_url(); ?>backend/global-settings/list"><i class="icon-globe"></i> <span class="hidden-tablet">Manage Global Settings</span></a> </li>
                       <?php   break; case 2:?>
                        <li> <a class="ajax-link" href="<?php echo base_url(); ?>backend/email-template/list"><i class="icon-globe"></i> <span class="hidden-tablet">Manage Email Templates</span></a> </li>
                        <?php   break; case 3:?>
                        <li> <a class="ajax-link" href="<?php echo base_url(); ?>backend/role/list"><i class="icon-adjust"></i> <span class="hidden-tablet">Manage Roles</span></a> </li>
                        <?php   break; case 4:?>
                            <li> <a class="ajax-link" href="<?php echo base_url(); ?>backend/admin/list"><i class="icon-user"></i> <span class="hidden-tablet">Manage Admin</span></a> </li>
                        <?php   break; case 5:?>
                            <li class="nav-header hidden-tablet">View Details</li>
                        <li> <a class="ajax-link" href="<?php echo base_url(); ?>backend/user/mainlist"><i class="icon-user"></i> <span class="hidden-tablet">Manage All Users</span></a> </li>
                        <?php   break; case 6:?>
                        <li> <a class="ajax-link" href="<?php echo base_url(); ?>backend/user/list"><i class="icon-user"></i> <span class="hidden-tablet">Users Pending Form </span></a> </li>
                        <?php   break; case 7:?>
                        <li> <a class="ajax-link" href="<?php echo base_url(); ?>backend/support"><i class="icon-user"></i> <span class="hidden-tablet">Manage Messages</span></a> </li>
                                    <?php   break; case 8:?>
                        <li class="nav-header hidden-tablet">Report Details</li>
                        <li> <a class="ajax-link" href="<?php echo base_url(); ?>report/userlist"><i class="icon-user"></i> <span class="hidden-tablet">Users Report</span></a> </li>
                        <?php   break; case 9:?>
                        <li> <a class="ajax-link" href="<?php echo base_url(); ?>report/income"><i class="icon-user"></i> <span class="hidden-tablet">Donation Income</span></a> </li>
                        <?php   break; case 10:?>
                        <li> <a class="ajax-link" href="<?php echo base_url(); ?>report/userlog"><i class="icon-user"></i> <span class="hidden-tablet">User Log</span></a> </li>
                        <?php   break; case 11:?> 
                                        <li> <a class="ajax-link" href="<?php echo base_url(); ?>backend/user/list"><i class="icon-user"></i> <span class="hidden-tablet">Manage User</span></a> </li>
                                        <?php
                                        break;
                                   
                                }
                            }
                            }
                            ?>
                    </ul>
                </div>

            </div>
        <?php }
        ?>
        <!-- [end:::left menu] -->