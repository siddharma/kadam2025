<?php $this->load->view('front/common/header.php'); ?>
<?php $this->load->view('front/common/left-menu.php'); ?>
  <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i>Change Password</h1>
          <p>Login Password</p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="tile">
            <div class="tile-body">
             <form method="post" id="updatePass" action="<?php echo base_url();?>update-pass">
<!--                <div class="form-group">
                  <label class="control-label">Old Password*</label>
                  <input class="form-control" type="password" name="old_pass" id="old_pass" placeholder="Old Password">
                </div>-->
                <div class="form-group">
                  <label class="control-label">New Password*</label>
                  <input class="form-control" type="password" name="new_pass" id="new_pass" placeholder="New Password">
                </div>
                <div class="form-group">
                  <label class="control-label">Confirm Password*</label>
                  <input class="form-control" type="password" name="confirm_pass" placeholder="Confirm Password">
                </div>
                
                 <input class="btn btn-primary" type="submit" id="submits" name="submits" value="Submit">
              </form>
            </div>
          </div>
        </div>
      </div>
    </main>
<?php  $this->load->view('front/common/footer.php'); ?>
<script src="<?php echo base_url(); ?>media/backend/js/jquery-1.7.2.min.js"></script>
<script src="<?php echo base_url(); ?>media/backend/js/jquery-ui.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>media/front/js/jquery.validate.js" type="text/javascript"></script>
<script>
    jQuery(document).ready(function(e) {
        jQuery("#updatePass").validate(
                {
                    errorElement: "div",
                    errorClass: "text-danger",
                    debug: true,
                    rules:
                            {
//                                old_pass:
//                                        {
//                                            required: true,
//                                     remote: {
//                                            url: '<?php echo base_url();?>chkpass',
//                                            method: 'post',
////                                            cache: false,
////                                            sync: false,
//                                            data: {
//                                                action: 'chkpass'
//                                            }
//                                        }
//                                        },
                                new_pass:
                                        {
                                            required: true,
                                        },
                               
                                confirm_pass:
                                        {
                                          required: true,
                                            equalTo:'#new_pass'
                                        }
                               
                            },
                    messages:
                            {
//                                old_pass:
//                                        {
//                                            required: "Please enter old password",
////                                            remote : "incorrect old password"
//                                        },
                                new_pass:
                                        {
                                            required: "Please enter new password",
                                        },
                                confirm_pass:
                                        {
                                           required: "Please enter confirm password",
                                            equalTo: "Enter confirm password same as password"
                                        },
                               
                            },
                    submitHandler: function(form) {
                        form.submit();
                    }
                });

    });

</script>