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
        </style>
        <script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>media/backend/js/jquery.validate.min.js"></script>
        <script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>media/backend/js/user-manage/add-user.js"></script>
        <link rel="stylesheet" href="<?php echo base_url(); ?>media/front/css/jquery.validate.password.css" />
        <script src="<?php echo base_url(); ?>media/front/js/jquery.validate.password.js"></script>
    <script>
$(function(){
    start_date = new Date();
    $('#dob').datepicker({
            maxDate: new Date(start_date.getFullYear(), start_date.getMonth(), start_date.getDate(), start_date.getHours(), start_date.getMinutes()),
            dateFormat: 'dd-M-yy',
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
                    <li> <a href="<?php echo base_url(); ?>backend/dashboard">Dashboard</a> <span class="divider">/</span> </li>
                    <li> <a href="<?php echo base_url(); ?>backend/user/list">Manage User</a> <span class="divider">/</span></li>
                    <li> Add User </li>
                </ul>
            </div>
            <div class="row-fluid sortable"> 
                <!--[sortable header start]-->
                <div class="box span12">
                    <div class="box-header well">
                        <h2><i class=""></i>Add User</h2>
                        <div class="box-icon">
                            <a title="Manage USer" class="btn btn-plus btn-round" href="<?php echo base_url(); ?>backend/user/list"><i class="icon-arrow-left"></i></a>
                        </div>
                    </div>
                    <br >
                    <!--[sortable body]-->
                    <div class="box-content">
                        <form name="frm_user_details" id="frm_user_details" action="<?php echo base_url(); ?>backend/user/add" method="post" >
<!--                            <div class="control-group">
                                <label for="typeahead" class="control-label">Username<sup class="mandatory">*</sup> </label>
                                <div class="controls">
                                    <input type="text" value="" id="user_name" name="user_name" class="FETextInput">
                                </div>
                            </div>-->
                            <div class="control-group">
                                <label for="typeahead" class="control-label">Name<sup class="mandatory"></sup> </label>
                                <div class="controls">
                                    <input type="text" value="" name="first_name" id="first_name" class="FETextInput">
                                </div>
                            </div>

                            <div class="control-group">
                                <label for="typeahead" class="control-label">Email Id<sup class="mandatory">*</sup> </label>
                                <div class="controls">
                                    <input type="text" value="" name="user_email" id="user_email" class="FETextInput">
                                </div>
                            </div>

                            <div class="control-group">
                                <label for="typeahead" class="control-label">Password<sup class="mandatory">*</sup> </label>
                                <div class="controls">
                                    <input type="password" id="user_password" name="user_password" class="FETextInput">

                                    <div style="padding-left: 120px;">
                                        <div class="password-meter" style="display:none">
                                            <div class="password-meter-message password-meter-message-too-short">Too short</div>
                                            <div class="password-meter-bg">
                                                <div class="password-meter-bar password-meter-too-short"></div>
                                            </div>
                                        </div>
                                        <span>
                                            (Password must be combination of atleast 1 number, 1 special character and 1 upper case letter with minimum 8 characters) 
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="control-group">
                                <label for="typeahead" class="control-label">Confirm Password<sup class="mandatory">*</sup> </label>
                                <div class="controls">
                                    <input type="password" id="confirm_password" name="confirm_password" class="FETextInput">
                                </div>
                            </div>
                            
                             <div class="control-group">
                                <label for="typeahead" class="control-label">Mobile Phone No.<sup class="mandatory"></sup> </label>
                                <div class="controls">
                                    <input type="text" maxlength="17" value="" name="phone" id="phone" class="FETextInput">
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label for="typeahead" class="control-label">invite<sup class="mandatory"></sup> </label>
                                <div class="controls">
                                    <input type="text" value="" name="invite" id="invite" class="FETextInput">
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label for="typeahead" class="control-label">Guider's Email<sup class="mandatory"></sup> </label>
                                <div class="controls">
                                    <input type="text" value="" name="parent_email" id="parent_email" class="FETextInput">
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label for="typeahead" class="control-label">Guider's Phone no<sup class="mandatory"></sup> </label>
                                <div class="controls">
                                    <input type="text" value="" name="parent_phone" id="parent_phone" class="FETextInput">
                                </div>
                            </div>
                            <div class="control-group">
                                <label for="typeahead" class="control-label">How did you learn about us<sup class="mandatory"></sup> </label>
                                <div class="controls">
                                    <select name="how_find_us" id="how_find_us" class="FETextInput">
                                        <option value="1"> from friends</option>
                                        <option value="2"> sms</option>
                                        <option value="3"> another site</option>
                                        <option value="4"> video advertising</option>
                                        <option value="5"> banners</option>
                                        <option value="6"> search engines</option>
                                        <option value="7"> social networks</option>
                                        <option value="8"> forums</option>
                                        <option value="100"> others</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label for="typeahead" class="control-label">Structure</label>
                                <div class="controls">
                                    <input type="text" name="structure" id="structure" value="" class="FETextInput">
                                </div>
                            </div>

                            <div class="control-group">
                                <label for="typeahead" class="control-label">Prom Referrer</label>
                                <div class="controls">
                                    <input type="text" name="prom_referrer" id="prom_referrer" value="" class="FETextInput">
                                </div>
                            </div>

                            <div class="control-group">
                                <label for="typeahead" class="control-label">Parent Phone</label>
                                <div class="controls">
                                    <input type="text" name="parent_phone" id="parent_phone" value="" class="FETextInput">
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label for="typeahead" class="control-label">Country Code</label>
                                <div class="controls">
                                    <select name="country_code" id="country_code" class="FETextInput">
                                        <option value="1">India</option>
                                        <option value="2">America</option>
                                        <option value="3">China</option>
                                        <option value="4">Other</option>
                                    </select>
                                </div>
                            </div>

                            <div class="control-group">
                                <label for="typeahead" class="control-label">Site Id</label>
                                <div class="controls">
                                    <input type="text" name="site_id" id="site_id" value="" class="FETextInput">
                                </div>
                            </div>

                            <div class="control-group">
                                <label for="typeahead" class="control-label">Reference</label>
                                <div class="controls">
                                    <input type="text" name="referer" id="referer" value="" class="FETextInput">
                                </div>
                            </div>

                            <div class="control-group">
                                <label for="typeahead" class="control-label">Date Of Birth</label>
                                <div class="controls">
                                    <input type="text" name="dob" id="dob" value="" class="FETextInput">
                                </div>
                            </div>

                            <div class="control-group">
                                <label for="typeahead" class="control-label">Skype Id</label>
                                <div class="controls">
                                    <input type="text" name="skype" id="skype" value="" class="FETextInput">
                                </div>
                            </div>

                            <div class="control-group">
                                <label for="typeahead" class="control-label">Yahoo Message</label>
                                <div class="controls">
                                    <input type="text" name="yahoomsg" id="yahoomsg" value="" class="FETextInput">
                                </div>
                            </div>

                            <div class="control-group">
                                <label for="typeahead" class="control-label">Information</label>
                                <div class="controls">
                                    <input type="text" name="information" id="information" value="" class="FETextInput">
                                </div>
                            </div>

                            <div class="control-group">
                                <label for="typeahead" class="control-label">Twitter Id</label>
                                <div class="controls">
                                    <input type="text" name="twitter" id="twitter" value="" class="FETextInput">
                                </div>
                            </div>

                            <div class="control-group">
                                <label for="typeahead" class="control-label">Google Id</label>
                                <div class="controls">
                                    <input type="text" name="google" id="google" value="" class="FETextInput">
                                </div>
                            </div>

                            <div class="control-group">
                                <label for="typeahead" class="control-label">Facebook Id</label>
                                <div class="controls">
                                    <input type="text" name="facebook" id="facebook" value="" class="FETextInput">
                                </div>
                            </div>

                            <div class="control-group">
                                <label for="typeahead" class="control-label">Website</label>
                                <div class="controls">
                                    <input type="text" name="website" id="website" value="" class="FETextInput">
                                </div>
                            </div>

                            <div class="control-group">
                                <label for="typeahead" class="control-label">User Status</label>
                                <div class="controls">
                                    <select name="usr_status" id="usr_status" class="FETextInput">
                                        <?php
                                        if (count($arr_cat) > 0) {
                                            foreach ($arr_cat as $cat) {
                                                ?>
                                                <option value="<?php echo $cat['category_id']; ?>"> <?php echo $cat['category_name']; ?></option>
                                            <?php }
                                        } ?>

                                    </select>
                                </div>

                            </div>


                            <div class="form-actions">
                                <button type="submit" name="btn_submit" class="btn btn-primary" value="Save changes">Save changes</button>
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