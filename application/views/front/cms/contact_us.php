<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>media/front/css/styleb24e.css">
<section class="content">
    <h1>
        Enquiry Form </h1>
    <div class="registration">
        <form id="contact" action="<?php echo base_url(); ?>contact-us" method="post" enctype="multipart/form-data">
            <div class="line">
                <div class="left"><label>Enquiry Reference*:</label></div>
                <div class="right">
                    <select class="feedback_themes" name="ticket_main_question">
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
            <div class="line">
                <div class="left"><label>Subject*:</label></div>
                <div class="right"><input type="text" name="subject"/></div>
            </div>
            <div class="line">
                <div class="left"><label>Text message*:</label></div>
                <div class="right"><textarea name="contents"></textarea></div>
            </div>
            <div class="line">
                <div class="left"><label>Your name*:</label></div>
                <div class="right"><input name="first_name" type="text"/></div>
            </div>
            <div class="line">
                <div class="left"><label>Your Email*:</label></div>
                <div class="right"><input name="user_email" type="text"/></div>
            </div>
            <div class="line">
                <div class="left"><label>Address*:</label></div>
                <div class="right"><textarea name="address"></textarea></div>
            </div>
            <div class="line">
                <div class="left"><label>Gender*:</label></div>
                <input name="gender" id="gender" type="radio" checked="checked" value="1"/>Male
                <input name="gender" id="gender" type="radio" value="2"/>Female
            </div>

            <div class="line">
                <div class="left"><label>Birth Date:</label></div>
                <div class="right"><input name="dob" id="dob" type="text"/></div>
            </div>
            <div class="line">
                <div class="left"><label>GST No:</label></div>
                <div class="right"><input name="cust_gst_no" id="cust_gst_no" type="text"/></div>
            </div>
            <div class="line">
                <div class="left"><label>Phone*:</label></div>
                <div class="right"><input name="phone" type="text"/></div>
            </div>
            <div class="line">
                <div class="left"><label>Upload Photo:</label></div>
                <div class="right"><input name="attachment" id="attachment" type="file"/></div>
            </div>

            <div class="line">
                <div class="left"></div>
                <div class="right" data-form-errors-container="">
                </div>
            </div>
            <div class="line">
                <div class="left"></div>
                <div class="right">
                    <input type="submit" id="submitButton" name="submitButton" value="Submit">
                </div>
            </div>
        </form>
    </div>
</section>

<script src="<?php echo base_url(); ?>media/backend/js/jquery-1.7.2.min.js"></script>
<script src="<?php echo base_url(); ?>media/backend/js/jquery-ui.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>media/front/js/jquery.validate.js" type="text/javascript"></script>
<script>
    jQuery(document).ready(function(e) {
        jQuery("#contact").validate(
                {
                    errorElement: "div",
                    errorClass: "text-danger",
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
<link href="<?php echo base_url(); ?>media/backend/css/jquery-ui-1.8.21.custom.css" rel="stylesheet">
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
