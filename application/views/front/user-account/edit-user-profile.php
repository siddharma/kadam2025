<?php $this->load->view('front/common/header.php'); ?>
<?php $this->load->view('front/common/left-menu.php'); ?>
  <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i>Update Profile</h1>
          <p>User Details</p>
        </div>
      </div>
     
      <div class="row">
        <div class="col-md-6">
          <div class="tile">
            <div class="tile-body">
             <form method="post" id="editProfiel" name="myform" action="<?php echo base_url();?>editprofile">
                <div class="form-group">
                  <label class="control-label">User Full Name*</label>
                  <input class="form-control" type="text" name="full_name" readonly="" value="<?php echo $arr_user['full_name']; ?>" placeholder="User full Name">
                </div>
                <div class="form-group">
                  <label class="control-label">Mobile No*</label>
                  <input class="form-control" type="text" name="mobile_no" readonly="" value="<?php echo $arr_user['mobile_no']; ?>" placeholder="Mobile No">
                </div>
                <div class="form-group">
                  <label class="control-label">Email*</label>
                  <input class="form-control" type="email" name="user_email" readonly="" value="<?php echo $arr_user['user_email']; ?>" placeholder="Email">
                </div>
                <div class="form-group">
                  <label class="control-label">Address</label>
                  <textarea class="form-control" rows="4" name="address" readonly="" placeholder="Address"> <?php echo $arr_user['address']; ?></textarea>
                </div>
                <div class="form-group">
                  <label class="control-label">City</label>
                  <input class="form-control" type="text" name="city" readonly="" value="<?php echo $arr_user['city']; ?>" placeholder="City">
                </div>
                <div class="form-group">
                  <label class="control-label">State</label>
                  <input class="form-control" type="text" name="state" readonly="" value="<?php echo $arr_user['state']; ?>" placeholder="State">
                </div>
                <div class="form-group">
                  <label class="control-label">Country</label>
                  <input class="form-control" type="text" name="country" readonly="" value="<?php echo "India"; ?>" placeholder="Country">
                </div>
                <div class="form-group">
                  <label class="control-label">Pincode</label>
                  <input class="form-control" type="text" name="pin_code" readonly="" value="<?php echo $arr_user['pin_code']; ?>" placeholder="Pincode">
                </div>
                <div class="form-group">
                  <label class="control-label">Nominee</label>
                  <input class="form-control" type="text" name="nominee_name" readonly="" value="<?php echo $arr_user['nominee_name']; ?>" placeholder="Nominee">
                </div>
                <div class="form-group">
                  <label class="control-label">Nominee Relation</label>
                  <input class="form-control" type="text" name="nominee_relation" readonly="" value="<?php echo $arr_user['nominee_relation']; ?>" placeholder="Nominee Relation">
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
        jQuery("#editProfiel").validate(
                {
                    errorElement: "div",
                    errorClass: "text-danger",
                    debug: true,
                    rules:
                            {
                                full_name:
                                        {
                                            required: true,
                                        },
                                mobile_no:
                                        {
                                            required: true,
                                        },
                               
                                user_email:
                                        {
                                            required: true,
                                        }
                               
                            },
                    messages:
                            {
                                full_name:
                                        {
                                            required: "Please enter your full name",
                                        },
                                mobile_no:
                                        {
                                            required: "Please enter mobile no",
                                        },
                                user_email:
                                        {
                                            required: "Please enter email address",
                                        },
                               
                            },
                    submitHandler: function(form) {
                        form.submit();
                    }
                });

    });

</script>