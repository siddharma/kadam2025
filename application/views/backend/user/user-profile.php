<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php echo (isset($title)) ? $title : $global['site_title']; ?></title>
        <?php $this->load->view('backend/sections/header'); ?>
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
                /*margin-top: 6px;*/
            }
            .form-horizontal .control-label{
                font-weight:bold;
            }
        </style>  
      
    </head>
    <body>
       <script src="<?php echo base_url(); ?>media/backend/js/jquery.dataTables.min.js"></script> 
        <script src="<?php echo base_url(); ?>media/backend/js/bootstrap-tab.js"></script>
        <!-- library for advanced tooltip -->
        <script src="<?php echo base_url(); ?>media/backend/js/bootstrap-tooltip.js"></script>
        <script src="<?php echo base_url(); ?>media/backend/js/charisma.js"></script> 
        <script src="<?php echo base_url(); ?>media/backend/js/select-all-delete.js"></script> 


        <?php $this->load->view('backend/sections/top-nav.php'); ?>
        <?php $this->load->view('backend/sections/leftmenu.php'); ?>
        <div id="content" class="span10">
            <!--[breadcrumb]-->
            <div>
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>backend/dashboard">Dashboard</a> <span class="divider">/</span> </li>
                    <?php
                    $user_account = $this->session->userdata('user_account');
                    if ($user_account['role_id'] == 1) {
                        ?>
                        <li> <a href="<?php echo base_url(); ?>backend/user/mainlist">Manage User</a> <span class="divider">/</span></li>
                        <?php
                    }
                    ?>
                    <li>User Profile </li>
                </ul>
            </div>

            <div class="row-fluid sortable"> 
                <!--[sortable header start]-->
                <div class="box span12">
                    <div class="box-header well">
                        <h2><i class=""></i>User Profile</h2>
                        <div class="box-icon">
                            <a title="Go Back" class="btn btn-plus btn-round" onClick="history.go(-1);" href="javascript:void(0);"><i class="icon-arrow-left"></i></a>
                        </div>
                    </div>
                    <br >
                    
                    <!--[sortable body]-->
                    <div class="box-content">
                        <form id="frm_admin_dtl" class="form-horizontal" name="frm_admin_dtl">
                            <div class="control-group">
                                <label for="typeahead" class="control-label">User Id</label>
                                <div class="controls-text">
                                    <?php echo $arr_user_detail['user_sponser_id']; ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label for="typeahead" class="control-label">Sponser Id</label>
                                <div class="controls-text">
                                    <?php echo $arr_user_detail['sponser_id']; ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label for="typeahead" class="control-label">Name</label>
                                <div class="controls-text">
                                    <?php echo $arr_user_detail['full_name']; ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label for="typeahead" class="control-label">Email Id </label>
                                <div class="controls-text">
                                    <?php echo $arr_user_detail['user_email']; ?>
                                </div>
                            </div>

                            <div class="control-group">
                                <label for="typeahead" class="control-label">Register Date</label>
                                <div class="controls-text">
                                    <?php echo date($global['date_format'], strtotime($arr_user_detail['register_date'])); ?>
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label for="typeahead" class="control-label">Phone </label>
                                <div class="controls-text">
                                    <?php echo $arr_user_detail['mobile_no']; ?>
                                </div>
                            </div>
                            <h3>User's upload files and data </h3>
                            <table  class="table table-striped table-bordered bootstrap-datatable datatable">
                                <thead>
                               
                                <th width="10%" class="workcap">Full Name</th>
                                <th width="10%" class="workcap">PNR Number</th>
                                <th width="5%" class="workcap">Amount</th>   
                                <th width="15%" class="workcap">Uploaded Date</th>   
                                <th width="50%" class="workcap">Image</th>   
                                </thead>
                                <tbody>
                                         <tr>
                                            <td colspan="5" style="background-color:#d2bbbb;">&nbsp;</td>
                                           
                                        </tr>
                                            <?php if(count($arr_user_detail['user_trans'])>0){
                                           foreach ($arr_user_detail['user_trans'] as  $key=>$values) { 
                                             ?>
                                                                                     
                                               <?php ?>
                                        <tr>
                                   
                                    <td class="worktd"  align="left"><?php echo $values['full_name']; ?></td>
                                    <td class="worktd"  align="left"><?php echo $values['pnr_no']; ?></td>
                                    <td class="worktd"  align="left"><?php echo $values['amount']; ?></td>
                                    <td class="worktd"  align="left"><?php echo $values['transaction_date']; ?></td>
                                    <?php if($key==0 || $key==6 || $key==12){?>
                                    <td class="worktd"  rowspan="6">
                                        
                                       <a target="_blank" href="<?php echo base_url();?>media/front/transaction-photo/<?php echo $values['transaction_image']; ?>" ><img src="<?php echo base_url();?>media/front/transaction-photo/<?php echo $values['transaction_image']; ?>" width="350" height="300"></a>
                                        <?php $arr = explode('-',$values['from_id']); 
                                            echo "<br>Form for below ids:";
                                                     foreach ($arr as $data){
                                                         echo '<br>'.$data;
                                                     }
?>
                                    </td>
                                       
                                    <?php }?>
                                        </tr>
                                        <?php if($key==5 || $key==11){?>
                                        <tr>
                                            <td colspan="5" style="background-color:#d2bbbb;">&nbsp;</td>
                                           
                                        </tr>
                                        
                                        <?php  } } } ?>
                                </tbody>
                                
                            </table>
                            <h3>User's Direct members </h3>
                            <table  class="table table-striped table-bordered bootstrap-datatable datatable">
                                <thead>
                                <th width="2%" class="workcap">Sr No</th>
                                <th width="8%" class="workcap">Name</th>
                                <th width="8%" class="workcap">User Id</th>
                                <th width="10%" class="workcap">Email Id</th>   
                                <th width="10%" class="workcap">Phone No</th>   
                                <th width="6%" class="workcap">Request Status</th>   
                                <th width="10%" class="workcap">Reg. Date</th>                    
                               
                                </thead>
                                <tbody>
                                      
                                            <?php if(count($arr_user_detail['user_members'])>0){
                                           foreach ($arr_user_detail['user_members'] as  $key=>$value) { ?>
                                        <tr>
                                    <td class="worktd"  align="left"><?php echo $key+1; ?></td>
                                    <td class="worktd"  align="left"><?php echo $value['full_name']; ?></td>
                                    <td class="worktd"  align="left"><?php echo $value['user_sponser_id']; ?></td>
                                    <td class="worktd"  align="left"><?php echo $value['user_email']; ?></td>
                                    <td class="worktd"  align="left"><?php echo $value['mobile_no']; ?></td>
                                    
                                    <td class="worktd"  align="left">
                                        <div id="active_div<?php echo $value['user_id']; ?>"  <?php if ($value['is_active'] == 'Yes') { ?> style="display:inline-block" <?php } else { ?> style="display:none;" <?php } ?>>
                                                    <a class="label label-success" title="Click to Change Status" onClick="changeStatus('<?php echo $value['user_id']; ?>', 'No');" href="javascript:void(0);" id="status_<?php echo $value['user_id']; ?>">Active</a>
                                                </div>

                                                <div id="blocked_div<?php echo $value['user_id']; ?>" <?php if ($value['is_active'] == 'No') { ?> style="display:inline-block" <?php } else { ?> style="display:none;" <?php } ?> >
                                                    <a class="label label-important" title="Click to Change Status" onClick="changeStatus('<?php echo $value['user_id']; ?>', 'Yes');" href="javascript:void(0);" id="status_<?php echo $value['user_id']; ?>">Inactive</a>
                                                </div>
                                       
                                    </td>
                                        <td class="worktd"  align="left"><?php echo $value['register_date']; ?></td>
                                        </tr> 
                                            <?php  } } ?>
                                </tbody>
                                
                            </table>
                            <div class="form-actions">
                                <button onClick="history.go(-1);" class="btn" id="btn_cancel" name="btn_cancel" type="button">Back</button>
                            </div>


                        </form>
                    </div>
                    <!--[sortable body]--> 
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
<script type="text/javascript">
  
            function changeStatus(user_id, user_status)
            {
                if(confirm('Do you want to change member status')){
               
                /* changing the user status*/
                var obj_params = new Object();
                obj_params.user_id = user_id;
                obj_params.user_status = user_status;
                jQuery.post("<?php echo base_url(); ?>backend/user/change-member-status", obj_params, function(msg) {
                    if (msg.error == "1")
                    {
                        alert(msg.error_message);
                    }
                    else
                    {
                        /* toogling the bloked and active div of user*/
                        if (user_status == 'No')
                        {
                            $("#blocked_div" + user_id).css('display', 'inline-block');
                            $("#active_div" + user_id).css('display', 'none');
                        }
                        else
                        {
                            $("#active_div" + user_id).css('display', 'inline-block');
                            $("#blocked_div" + user_id).css('display', 'none');
                        }
                    }
                }, "json");
            }
            }
        </script>