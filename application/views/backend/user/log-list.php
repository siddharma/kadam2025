<?php //echo "<pre>"; print_r($arr_user_list); exit;   ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php echo (isset($title)) ? $title : $global['site_title']; ?></title>
        <?php $this->load->view('backend/sections/header'); ?>
        <script src="<?php echo base_url(); ?>media/backend/js/jquery.dataTables.min.js"></script> 
        <script src="<?php echo base_url(); ?>media/backend/js/bootstrap-tab.js"></script>
        <!-- library for advanced tooltip -->
        <script src="<?php echo base_url(); ?>media/backend/js/bootstrap-tooltip.js"></script>
        <script src="<?php echo base_url(); ?>media/backend/js/charisma.js"></script> 
        <script src="<?php echo base_url(); ?>media/backend/js/select-all-delete.js"></script> 
    </head>
    <body>
        <?php $this->load->view('backend/sections/top-nav.php'); ?>
        <?php $this->load->view('backend/sections/leftmenu.php'); ?>
        <div id="content" class="span10">
            <!--[breadcrumb]-->
            <div>
                <ul class="breadcrumb">
                    <li> <a href="<?php echo base_url(); ?>backend/dashboard">Dashboard</a> <span class="divider">/</span> </li>
                    <li>User Log List</li>
                </ul>
            </div>

            <!--[message box]-->
            <?php
            $msg = $this->session->userdata('msg');
            ?>
            <!--[message box]-->
            <?php if ($msg != '') { ?>
                <div class="msg_box alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" id="msg_close" name="msg_close">ï¿½</button>
                    <?php
                    echo $msg;
                    $this->session->unset_userdata('msg');
                    ?> 
                </div>
                <?php
            }
            ?>  
            <div class="row-fluid sortable">  
                <!--[sortable header start]-->
                <div class="box span12">
                    <div class="box-header well">
                        <h2><i class=""></i>User Log List</h2>
                    </div>
                    <br >
                    <form name="frm_users" id="frm_users" action="<?php echo base_url(); ?>backend/user/log-list" method="post">
                        <!--[sortable body]-->
                        <div class="box-content">
                            <table  class="table table-striped table-bordered bootstrap-datatable datatable">
                                <thead>

                                <th width="8%" class="workcap">User ID</th>
                                <th width="12%" class="workcap">Username</th>
                                <th width="12%" class="workcap">Login By</th>
                                <th width="12%" class="workcap">Entry</th>
                                <th width="12%" class="workcap">IP Address</th>
                                <th width="10%" class="workcap">Created On</th>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($arr_user_list as $user) {
                                        ?>
                                        <tr>
                                            <td class="worktd"  align="left"><?php echo ($user['user_id'])?$user['user_id']:''; ?></td>
                                            <td class="worktd"  align="left"><?php echo ($user['user_name'])?$user['user_name']:'-'; ?></td>
                                            <td class="worktd"  align="left"><?php echo stripslashes($user['login_by']); ?></td>
                                            <td class="worktd"  align="left"><?php echo ($user['entry_for']=='S')?'Login':'Register'; ?></td>
                                            <td class="worktd"  align="left"><?php echo stripslashes($user['ip_address']); ?></td>
                                            <td class="worktd"  align="left"><?php echo stripslashes($user['created_on']); ?></td>
                                            
                                        </tr>                                 
                                    <?php }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <!--[sortable body]--> 
                    </form>
                </div>
            </div>

            <!--[sortable table end]--> 

            <!--[include footer]-->
        </div><!--/#content.span10-->

    </div><!--/fluid-row-->
    <?php $this->load->view('backend/sections/footer.php'); ?>
</div><!--/.fluid-container-->


</body>
</html>