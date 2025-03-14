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
                        <form id="frm_admin_dtl" class="form-horizontal" name="frm_admin_dtl" action="<?php echo base_url(); ?>report/income" method="post">
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
                                <label for="typeahead" class="control-label">User ID</label>
                                <div class="controls-text">
                                    <input type="text" id="user_id" name="user_id" value="<?php echo $user_id;?>">
                                </div>
                            </div>
                            
                            <div class="form-actions">
                                <input type="submit" id="submit" name="submit" value="Submit">
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
                                    <!--</th>-->
                                    <th width="8%" class="workcap">Doantion Date</th>
                                <th width="8%" class="workcap">To ID</th>
                                <th width="10%" class="workcap">To Name</th>
                                <th width="10%" class="workcap">From ID</th>
                                
                                <th width="8%" class="workcap">Amount</th>
                                <th width="8%" class="workcap">PNR No</th>
                                <th width="8%" class="workcap">View</th>
                                </thead>
                                <tbody>
                                    <?php if(count($arr_user_list)>0){
                                    foreach ($arr_user_list as $user) {
                                        ?>
                                        <tr>
                                            <td class="worktd"  align="left"><?php echo ($user['transaction_date'])?date($global['date_format'], strtotime($user['transaction_date'])):'-'; ?></td>
                                            <td class="worktd"  align="left"><?php echo stripslashes($user['to_id']); ?></td>
                                            <td class="worktd"  align="left"><?php echo stripslashes($user['full_name']); ?></td>
                                            <td class="worktd"  align="left"><?php echo stripslashes($user['from_id']); ?></td>
                                            
                                            <td class="worktd"  align="left"><?php echo ($user['amount'])?ucfirst($user['amount']):'-'; ?></td>
                                            <td class="worktd"  align="left"><?php echo ($user['pnr_no'])?ucfirst($user['pnr_no']):'-'; ?></td>
                                            <td class="worktd"  align="left">
                                                <a class="btn btn-primary" target="_blank" title="View Image" href="<?php echo base_url(); ?>media/front/transaction-photo/<?php echo $user['transaction_image']; ?>">
                                            <i class="icon-eye-open icon-white"></i>View</a>
                                                </td>
                                        </tr>
                                            <?php
                                    } }
                                        ?>
                                </tbody>
                                
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