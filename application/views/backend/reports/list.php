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
        <style>
            .error {
                color: #BD4247;
                margin-left: 120px;
                width: 210px;
            }
            .FETextInput{
                margin-left: 120px;
                margin-top: -28px;
            }

            .controls-text {
                margin-left: 160px;
                margin-top: 6px;
            }
            .form-horizontal .control-label{
                font-weight:bold;
            }
        </style>
        <script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>media/backend/js/jquery.validate.min.js"></script>
        <script>
            $(function() {
                start_date = new Date();
                $('#start_date').datepicker({
                    maxDate: new Date(start_date.getFullYear(), start_date.getMonth(), start_date.getDate(), start_date.getHours(), start_date.getMinutes()),
                    dateFormat: 'yy-mm-dd',
                    timeFormat: 'hh:mm tt',
                    yearRange: "90:-0",
                    changeMonth: true,
                    changeYear: true,
                    onSelect: function(dateText) {
                        $("#end_date").datepicker("option", "minDate", dateText);
                    }
                });

                end_date = new Date();
                $('#end_date').datepicker({
                    maxDate: new Date(end_date.getFullYear(), end_date.getMonth(), end_date.getDate(), end_date.getHours(), end_date.getMinutes()),
                    dateFormat: 'yy-mm-dd',
                    timeFormat: 'hh:mm tt',
                    yearRange: "90:-0",
                    changeMonth: true,
                    changeYear: true,
                });


            });

        </script>
    </head>
    <body>
        <?php $this->load->view('backend/sections/top-nav.php'); ?>
        <?php $this->load->view('backend/sections/leftmenu.php'); ?>
        <div id="content" class="span10">
            <!--[breadcrumb]-->
            <div>
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>backend/dashboard">Dashboard</a> <span class="divider">/</span> </li>

                    <li>View Users Report  </li>
                </ul>
            </div>

            <div class="row-fluid sortable">
                <!--[sortable header start]-->
                <div class="box span12">
                    <div class="box-header well">
                        <h2><i class=""></i>View Users Report</h2>
                        <div class="box-icon">
                            <!--<a title="Go Back" class="btn btn-plus btn-round" onClick="history.go(-1);" href="javascript:void(0);"><i class="icon-arrow-left"></i></a>-->
                        </div>
                    </div>
                    <br >
                    <!--[sortable body]-->
                    <div class="box-content">
                        <form id="frm_admin_dtl" class="form-horizontal" name="frm_admin_dtl" action="<?php echo base_url(); ?>report/userlist" method="post">
                            <div class="control-group">
                                <label for="typeahead" class="control-label">Start Date</label>
                                <div class="controls-text">
                                    <input type="text" id="start_date" name="start_date" value="<?php echo $start_date;?>">
                                </div>
                            </div>
                            <div class="control-group">
                                <label for="typeahead" class="control-label">End Date</label>
                                <div class="controls-text">
                                    <input type="text" id="end_date" name="end_date" value="<?php echo $end_date;?>">
                                </div>
                            </div>
                            <div class="control-group">
                                <label for="typeahead" class="control-label">City/Pincode</label>
                                <div class="controls-text">
                                    <input type="text" id="city" name="city" value="<?php echo $city;?>">
                                </div>
                            </div>
                            <div class="control-group">
                                <label for="typeahead" class="control-label">Report By</label>
                                <div class="controls-text">
                                    <select id="request_status" name="request_status">
                                        <option value="1" <?php if($request_status=='1'){?> selected="selected" <?php } ?>> Registration Date</option>
                                        <option value="2" <?php if($request_status=='2'){?> selected="selected" <?php } ?>> Form Upload Date</option>
                                        <option value="3" <?php if($request_status=='3'){?> selected="selected" <?php } ?>> Activation Date</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-actions">
                                <input type="submit" id="submit" name="submit" value="Submit">
                                <!--<button onClick="history.go(-1);" class="btn" id="btn_cancel" name="btn_cancel" type="button">Back</button>-->
                            </div>
                        </form>
                    </div>
                        <div class="box-content">
                            <table  class="table table-striped table-bordered bootstrap-datatable datatable">
                                <thead>
                                    <?php 
                                    if (count($arr_user_list) > 0) {
                                        ?>
                                                                                                                                                                                                                                                            <!--<center>Select <br><input type="checkbox" name="check_all" id="check_all"  class="select_all_button_class" value="select all" /></center>-->
                                        <?php
                                    }
                                    ?>
                                <th width="4%" class="workcap">ID</th>
                                <th width="6%" class="workcap">Name</th>
                                <th width="5%" class="workcap">Mobile</th>
                                <th width="7%" class="workcap">Email</th>
                                <th width="6%" class="workcap">Reg. Date</th>
                                <th width="6%" class="workcap">Upload Date</th>
                                <th width="6%" class="workcap">Activate Date</th>
                                <th width="4%" class="workcap">City</th>
                                <th width="3%" class="workcap">Pincode</th>
                                <th width="4%" class="workcap">Sponser ID</th>
                                <th width="6%" class="workcap">Sponser Name</th>
                                <th width="2%" class="workcap">Reg. Member Qty</th>
                                <th width="2%" class="workcap">Upload Form Qty</th>
                                <th width="2%" class="workcap">Pending Form Qty</th>
                                <th width="4%" class="workcap">Active Status</th>
                                </thead>
                                <tbody>
                                    <?php if(count($arr_user_list)>0){
                                    foreach ($arr_user_list as $user) {
                                        ?>
                                        <tr>

                                            <td class="worktd"  align="left"><?php echo stripslashes($user['user_sponser_id']); ?></td>
                                            <td class="worktd"  align="left"><?php echo stripslashes($user['full_name']); ?></td>
                                            <td class="worktd"  align="left"><?php echo stripslashes($user['mobile_no']); ?></td>
                                            <td class="worktd"  align="left"><?php echo stripslashes($user['user_email']); ?></td>
                                            <td class="worktd"  align="left"><?php echo ($user['register_date'])?date($global['date_format'], strtotime($user['register_date'])):'-'; ?></td>
                                            <td class="worktd"  align="left"><?php echo ($user['form_submit_date'])?date($global['date_format'], strtotime($user['form_submit_date'])):'-'; ?></td>
                                            <td class="worktd"  align="left"><?php echo ($user['activate_date'])?date($global['date_format'], strtotime($user['activate_date'])):'-'; ?></td>
                                            <td class="worktd"  align="left"><?php echo ($user['city'])?ucfirst($user['city']):'-'; ?></td>
                                            <td class="worktd"  align="left"><?php echo ($user['pin_code'])?ucfirst($user['pin_code']):'-'; ?></td>
                                            <td class="worktd"  align="left"><?php echo ucfirst($user['sponser_id']); ?></td>
                                            <td class="worktd"  align="left"><?php echo ucfirst($user['sfull_name']); ?></td>
                                            <td class="worktd"  align="left"><?php echo ($user['reg_user_count'])?$user['reg_user_count']:'0'; ?></td>
                                            <td class="worktd"  align="left"><?php echo ($user['user_count'])?$user['user_count']:'0'; ?></td>
                                            <td class="worktd"  align="left"><?php  $cnt = 4-($user['user_count']);
                                             if($user['user_count']==3){ echo "0"; }else{ echo $cnt;} ?></td>
                                            <td class="worktd"  align="left"><?php echo ucfirst($user['is_active']); ?></td>
                                        </tr>
                                            <?php
                                    } }
                                        ?>
                                </tbody>
                                  <?php
                               if(count($arr_user_list)>0){
                                    ?>
                                    <tfoot>
                                    <th colspan="15">
                                        <!--<input type="submit" id="btn_delete_all" name="btn_delete_all" class="btn btn-danger" onClick="return deleteConfirm();"  value="Delete Selected">-->
                                    </th>
                                    </tfoot>
                                    <?php
                                }
                                ?>
                            </table>
                        </div>
                     
                </div>
                
            </div>
            <!--[sortable table end]-->
            <!--[include footer]-->
        </div><!--/#content.span10-->
    </div><!--/fluid-row-->
    <?php $this->load->view('backend/sections/footer.php'); ?>
</div>
</body>
</html>