<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php echo (isset($title)) ? $title : $global['site_title']; ?></title>
        <?php $this->load->view('backend/sections/header'); ?>
        <style>
            .error {
                color: #BD4247;
                margin-left: 140px;
                width: 210px;
            }
            .FETextInput{
                margin-left: 120px;
                margin-top: -28px;
            }
        </style>
        <script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>media/backend/js/jquery.validate.min.js"></script>
        <script>
            $(function() {
                remainder_date = new Date();
                $('#dob').datepicker({
                    maxDate: new Date(remainder_date.getFullYear(), remainder_date.getMonth(), remainder_date.getDate(), remainder_date.getHours(), remainder_date.getMinutes()),
                    dateFormat: 'yy-mm-dd',
                    timeFormat: 'hh:mm tt',
                    yearRange: "90:-0",
                    changeMonth: true,
                    changeYear: true,
                });
            });

        </script>
        <!-- validation js -->
        <script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>media/backend/js/jquery.validate.min.js"></script>
    </head>
    <body>
        <?php $this->load->view('backend/sections/top-nav.php'); ?>
        <?php $this->load->view('backend/sections/leftmenu.php'); ?>
        <div id="content" class="span10">
            <!--[breadcrumb]-->
            <div>
                <ul class="breadcrumb">
                    <li> <a href="<?php echo base_url(); ?>backend/dashboard">Dashboard</a> <span class="divider">/</span> </li>
                    <li> <a href="<?php echo base_url(); ?>backend/support">Manage Enquiry</a> <span class="divider">/</span></li>
                    <li> Add Enquiry </li>
                </ul>
            </div>

            <div class="row-fluid sortable">
                <!--[sortable header start]-->
                <div class="box span12">
                    <div class="box-header well">
                        <h2><i class=""></i>Add Enquiry</h2>
                        <div class="box-icon">
                            <a title="Manage Enquiry" class="btn btn-plus btn-round" href="<?php echo base_url(); ?>backend/support"><i class="icon-arrow-left"></i></a>
                        </div>
                    </div>
                    <br >
                    <!--[sortable body]-->
                    <div class="box-content">
                        <form name="contact" id="contact" action="<?php echo base_url(); ?>backend/support/add" method="POST" enctype="multipart/form-data">


                            <div class="control-group">
                                <label class="control-label" for="inputQuestion">Enquiry Reference<sup class="mandatory">*</sup></label>
                                <div class="controls">

                                    <select class="FETextInput" name="ticket_main_question">
                                        <option value="" disabled="disabled" selected="selected">Select Reference</option>
                                        <option value="Just Dial">Just Dial</option>
                                        <option value="News Paper Ads">News Paper Ads</option>
                                        <option value="Not Filled">Not Filled</option>
                                        <option value="Referral">Referral</option>
                                        <option value="Passing By">Passing By</option>
                                        <option value="Website">Website</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="inputQuestion">Subject<sup class="mandatory">*</sup></label>
                                <div class="controls">
                                    <input type="text"  name="subject" id="subject" dir="ltr" style="margin-left:140px; margin-top:-28px" class="FETextInput" size="80" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="inputQuestion">Text message<sup class="mandatory">*</sup></label>
                                <div class="controls">
                                    <textarea  name="contents" id="contents" dir="ltr" style="margin-left:140px; margin-top:-28px" class="FETextInput" size="80" /></textarea>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="inputQuestion">Your name<sup class="mandatory">*</sup></label>
                                <div class="controls">
                                    <input type="text"  name="first_name" id="first_name" dir="ltr" style="margin-left:140px; margin-top:-28px" class="FETextInput" size="80" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="inputQuestion">Your Email<sup class="mandatory">*</sup></label>
                                <div class="controls">
                                    <input type="text"  name="user_email" id="user_email" dir="ltr" style="margin-left:140px; margin-top:-28px" class="FETextInput" size="80" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="inputQuestion">Gender<sup class="mandatory">*</sup></label>
                                <div class="controls">
                                    <input name="gender" id="gender" type="radio" checked="checked" value="1" style="margin-left:140px; margin-top:-28px" class="FETextInput" size="80"/>Male
                                    <input name="gender" id="gender" type="radio" value="2" style="margin-left:140px; margin-top:-28px" class="FETextInput" size="80"/>Female
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="inputQuestion">Birth Date<sup class="mandatory">*</sup></label>
                                <div class="controls">
                                    <input type="text"  name="dob" id="dob" dir="ltr" style="margin-left:140px; margin-top:-28px" class="FETextInput" size="80" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="inputQuestion">GST No</label>
                                <div class="controls">
                                    <input type="text"  name="cust_gst_no" id="dob" dir="ltr" style="margin-left:140px; margin-top:-28px" class="FETextInput" size="80" />
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="inputQuestion">Address<sup class="mandatory">*</sup></label>
                                <div class="controls">
                                    <textarea  name="address" id="address" dir="ltr" style="margin-left:140px; margin-top:-28px" class="FETextInput" size="80" /></textarea>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="inputQuestion">Phone<sup class="mandatory">*</sup></label>
                                <div class="controls">
                                    <input type="text"  name="phone" id="phone" dir="ltr" style="margin-left:140px; margin-top:-28px" class="FETextInput" size="80" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="inputQuestion">Upload Photo<sup class="mandatory">*</sup></label>
                                <div class="controls">
                                    <input type="file"  name="attachment" id="attachment" dir="ltr" style="margin-left:140px; margin-top:-28px" class="FETextInput" size="80" />
                                </div>
                            </div>


                            <div class="form-actions">
                                <button type="submit" name="btn_submit" class="btn btn-primary" value="Save changes">Add</button>
                            </div>

                        </FORM>
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
            jQuery(document).ready(function(e) {
                jQuery("#contact").validate(
                        {
                            errorElement: "label",
                            errorClass: "error",
                            debug: true,
                            rules:
                                    {
                                        ticket_main_question:
                                                {
                                                    required: true,
                                                },
                                        contents:
                                                {
                                                    required: true,
                                                },
                                        first_name:
                                                {
                                                    required: true,
                                                },
                                        user_email:
                                                {
                                                    required: true,
                                                },
                                        subject:
                                                {
                                                    required: true,
                                                },
                                        phone:
                                                {
                                                    required: true,
                                                    number: true
                                                }
                                    },
                            messages:
                                    {
                                        ticket_main_question:
                                                {
                                                    required: "Please select enquiry question",
                                                },
                                        contents:
                                                {
                                                    required: "Please enter content message",
                                                },
                                        first_name:
                                                {
                                                    required: "Please enter full name",
                                                },
                                        user_email:
                                                {
                                                    required: "Please enter email address",
                                                },
                                        subject:
                                                {
                                                    required: "Please enter subject",
                                                },
                                        phone:
                                                {
                                                    required: "Please enter phone number",
                                                    number: "Please enter valid number"
                                                }
                                    },
                            submitHandler: function(form) {
                                form.submit();
                            }

                        });

            });

</script>

