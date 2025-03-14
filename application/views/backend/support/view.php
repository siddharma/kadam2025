<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php echo (isset($title)) ? $title : $global['site_title']; ?></title>
        <?php $this->load->view('backend/sections/header'); ?>
        <script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>media/backend/js/jquery.validate.min.js"></script>
        

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
    </head>
    <body>
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
                        <li> <a href="<?php echo base_url(); ?>backend/support">Manage Enquiry</a> <span class="divider">/</span></li>
                        <?php
                    }
                    ?>
                    <li>Enquiry Details </li>
                </ul>
            </div>

            <div class="row-fluid sortable">
                <!--[sortable header start]-->
                <div class="box span12">
                    <div class="box-header well">
                        <h2><i class=""></i>Enquiry Details</h2>
                        <div class="box-icon">
                            <a title="Go Back" class="btn btn-plus btn-round" onClick="history.go(-1);" href="javascript:void(0);"><i class="icon-arrow-left"></i></a>
                        </div>
                    </div>
                    <br >
                    <!--[sortable body]-->
                    <div class="box-content">
                        <div class="control-group span12">
                            <label for="typeahead" class="control-label span4"></label>
                            <div class="controls-text span8">

                            </div>
                        </div>
                        <div class="control-group span12">
                            <label for="typeahead" class="control-label span4">Enquiry Id</label>
                            <div class="controls-text span8">
                                <?php echo $arr_forum_detail['ims_id']; ?>
                            </div>
                        </div>
                        <div class="control-group span12">
                            <label for="typeahead" class="control-label span4">Registration Id</label>
                            <div class="controls-text span8">
                                <?php echo $arr_forum_detail['user_sponser_id']; ?>
                            </div>
                        </div>
                        <div class="control-group span12">
                            <label for="typeahead" class="control-label span4">Name</label>
                            <div class="controls-text span8">
                                <?php echo $arr_forum_detail['full_name']; ?>
                            </div>
                        </div>
                        <div class="control-group span12">
                            <label for="typeahead" class="control-label span4">Email</label>
                            <div class="controls-text span8">
                                <?php echo $arr_forum_detail['user_email']; ?>
                            </div>
                        </div>
                        <div class="control-group span12">
                            <label for="typeahead" class="control-label span4">Contact No</label>
                            <div class="controls-text span8">
                                <?php echo $arr_forum_detail['mobile_no']; ?>
                            </div>
                        </div>
                        
                      

                        <div class = "control-group span12">
                            <label for = "typeahead" class = "control-label span4">Subject </label>
                            <div class = "controls-text span8">
                                <?php echo $arr_forum_detail['subject'];
                                ?>
                            </div>
                        </div>
                        <div class = "control-group span12">
                            <label for = "typeahead" class = "control-label span4">Content </label>
                            <div class = "controls-text span8">
                                <?php echo $arr_forum_detail['contents'];
                                ?>
                            </div>
                        </div>
                        
                        <div class = "control-group span12">
                            <label for = "typeahead" class = "control-label span4">Status </label>
                            <div class = "controls-text span8">
                                <?php
                                if ($arr_forum_detail['msg_status'] == '2') {
                                    echo "Resolved";
                                } else if ($arr_forum_detail['msg_status'] == '1') {
                                    echo "Inprogress";
                                } else {
                                    echo "Pending";
                                }
                                ?>
                            </div>
                        </div>


                        <?php
                        if (count($arrReplyDetails) > 0) {
                            foreach ($arrReplyDetails as $reply) {
                                ?>
                                <div style="border-radius: 10px; padding: 10px; margin: 10px 0; background: #E0D7BE ; border: 1px solid #cfcfcf; ">
                                    <h3><?php echo ucfirst($reply['full_name']); ?></h3>
                                    <p>
                                        <?php echo ucfirst($reply['contents']); ?>
                                        <br></p>
                                    <p>
                                        <?php echo ucfirst($reply['createddate']); ?>
                                        <br></p>
                                    
                                    <?php
                                    if (count($reply['photos']) > 0) {
                                        foreach ($reply['photos'] as $photo) {
                                            ?><a href="<?php echo base_url(); ?>media/front/user-photos/<?php echo $photo['photo_path']; ?>" target='_blank'>
                                                <img width="100px" height="100px" src="<?php echo base_url(); ?>media/front/user-photos/<?php echo $photo['photo_path']; ?>"></a>

                                            <?php
                                        }
                                    }
                                    ?>
                                    <div style="clear: both;"></div>
                                </div>

                                <?php
                            }
                        }
                        ?>
                        <div class="form-actions">
                        </div>
                        <div class="box-content">
                            <form name="frm_user_details" id="frm_user_details" enctype="multipart/form-data" action="<?php echo base_url(); ?>backend/support/reply/<?php echo ($arr_forum_detail['ims_id']); ?>" method="post">
                                <div class="control-group span12">
                                    <label for="typeahead" class="control-label span4"><sup class="mandatory"></sup> </label>
                                    <div class="controls-text span8">
                                    </div>
                                </div>
                                <div class="control-group span12">
                                    <label for="typeahead" class="control-label span4">Reply<sup class="mandatory"></sup> </label>
                                    <div class="controls-text span8">
                                        <textarea name="msg_reply" id="msg_reply" class="FETextInput"></textarea>
                                    </div>
                                </div>
<!--                                <div class="control-group span12">
                                    <label for="typeahead" class="control-label span4">Attachment</label>
                                    <div class="controls-text span8">
                                        <input multiple="multiple" type="file" id="file[]" name="file[]" class="FETextInput">
                                    </div>
                                </div>-->
                                <div class="control-group span12">
                                    <label for="typeahead" class="control-label span4">Status</label>
                                    <div class="controls-text span8">
                                        <select name="msg_status" id="msg_status" class="FETextInput" onchange="openNewDiv();">
                                            <option value="0" <?php if ($arr_forum_detail['msg_status'] == 0) { ?> selected="selected" <?php } ?>> Pending</option>
                                            <option value="1" <?php if ($arr_forum_detail['msg_status'] == 1) { ?> selected="selected" <?php } ?>> In progress</option>
                                            <option value="2" <?php if ($arr_forum_detail['msg_status'] == 2) { ?> selected="selected" <?php } ?>> Resolved</option>
                                        </select>
                                    </div>
                                </div>
<!--                                <div class="control-group span12" id="remainderId">
                                    <label for="typeahead" class="control-label span4">Remainder Date</label>
                                    <div class="controls-text span8">
                                        <input type="text" id="remainder_date" name="remainder_date" class="FETextInput" value="<?php echo (count($arrReplydateDetails) > 0) ? $arrReplydateDetails[0]['remainder_date'] : ''; ?>">
                                        <input type="hidden" id="old_remainder_date" name="old_remainder_date" class="FETextInput" value="<?php echo $arr_forum_detail['remainder_date']; ?>">
                                    </div>
                                </div>-->
                                <div class="form-actions">
                                    <button type="submit" name="btn_submit" class="btn btn-primary" value="Save changes">Save Changes</button>
                                    <input type="hidden" name="ims_id" id="ims_id" value="<?php echo ($arr_forum_detail['ims_id']); ?>" />
                                </div>
                            </form>

                            <div class="form-actions">
                                <a title="Go Back" class="btn" onClick="history.go(-1);" href="<?php echo base_url(); ?>backend/support">Back</a>
                            </div>
                        </div>
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
<script>
    var status = $('#msg_status').val();
    if (status == '1') {
        $('#remainderId').show();
    } else {
        $('#remainderId').hide();
    }

    function openNewDiv() {
        var status = $('#msg_status').val();
        if (status != '1') {
            $('#remainderId').hide();
        } else {
            $('#remainderId').show();
        }
    }

</script>