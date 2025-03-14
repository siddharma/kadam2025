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
                    <li>Manage Enquiry Users</li>
                </ul>
            </div>

            <!--[message box]-->
            <?php
            $msg = $this->session->userdata('msg');
            ?>
            <!--[message box]-->
            <?php if ($msg != '') { ?>
                <div class="msg_box alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" id="msg_close" name="msg_close">×</button>
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
                        <h2><i class=""></i>Enquiry User Management</h2>
                        <!--                        <div class="box-icon">
                                                    <a title="Add new enquiry" class="btn btn-plus btn-round" href="<?php echo base_url(); ?>backend/support/add"><i class="icon-plus"></i></a>
                                                </div>-->
                    </div>
                    <br >
                    <form name="frm_users" id="frm_users" action="<?php echo base_url(); ?>backend/support/users" method="post">
                        <!--[sortable body]-->
                        <div class="box-content">
                            <table  class="table table-striped table-bordered bootstrap-datatable datatable">
                                <thead>
                                <th width="7%" class="workcap">
                                    <?php
                                    if (count($arrAllForum) > 1) {
                                        ?>
                                    <center>Select <br><input type="checkbox" name="check_all" id="check_all"  class="select_all_button_class" value="select all" /></center>
                                    <?php
                                }
                                ?>
                                </th>
                                <th width="8%" class="workcap">User Id</th>
                                <th width="18%" class="workcap">User Name</th>
                                <th width="12%" class="workcap">Email</th>
                                <th width="5%" class="workcap">Gender</th>
                                <th width="12%" class="workcap">Address</th>
                                <th width="8%" class="workcap">Contact No</th>
                                <th width="8%" class="workcap">Birth Date</th>
                                <th width="10%" class="workcap" align="center">Action</th>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($arrAllForum as $user) {
                                        ?>
                                        <tr>

                                            <td class="worktd" align="left">
                                    <center><input name="checkbox[]" class="case" type="checkbox" id="checkbox[]" value="<?php echo $user['user_id']; ?>" /></center>

                                    </td>

                                    <td class="worktd"  align="left"><?php echo stripslashes($user['user_id']); ?></td>
                                    <td class="worktd"  align="left"><?php echo stripslashes($user['first_name']); ?></td>
                                    <td class="worktd"  align="left"><?php echo stripslashes($user['user_email']); ?></td>
                                    <td class="worktd"  align="left"><?php echo ($user['gender'] == 1) ? "Male" : "Female"; ?></td>
                                    <td class="worktd"  align="left"><?php echo stripslashes($user['address']); ?></td>
                                    <td class="worktd"  align="left"><?php echo stripslashes($user['phone']); ?></td>
                                    <td class="worktd"  align="left"><?php echo stripslashes($user['dob']); ?></td>

                                    <td class="worktd">

                                        <a class="btn btn-primary" title="Edit" href="<?php echo base_url(); ?>backend/support/edit/<?php echo base64_encode($user['user_id']); ?>">
                                            <i class="icon-edit icon-white"></i>Edit</a>

                                    </td>
                                    <?php
                                }
                                ?>
                                </tbody>
                                <?php
                                if (count($arrAllForum) > 1) {
                                    ?>
                                    <tfoot>
                                    <th colspan="8"><input type="submit" id="btn_delete_all" name="btn_delete_all" class="btn btn-danger" onClick="return deleteConfirm();"  value="Delete Selected"></th>
                                    </tfoot>
                                    <?php
                                }
                                ?>
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