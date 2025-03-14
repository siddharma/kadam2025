<?php $this->load->view('front/common/header.php'); ?>
<?php $this->load->view('front/common/left-menu.php'); ?>
  <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i>Message</h1>
          <p>Add Message</p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="tile">
            <div class="tile-body">
             <form method="post" id="composeMsg" action="<?php echo base_url();?>compose">
                <div class="form-group">
                  <label class="control-label">subject*</label>
                  <input class="form-control" type="text" name="subject" placeholder="Subject">
                </div>
                <div class="form-group">
                  <label class="control-label">Message*</label>
                  <textarea class="form-control" rows="4" name="message" placeholder="Message"></textarea>
                </div>
                
                 <input class="btn btn-primary" type="submit" id="submita" name="submita" value="Submit">
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
        jQuery("#composeMsg").validate(
                {
                    errorElement: "div",
                    errorClass: "text-danger",
                    debug: true,
                    rules:
                            {
                                subject:
                                        {
                                            required: true,
                                        },
                                message:
                                        {
                                            required: true,
                                        }
                               
                            },
                    messages:
                            {
                                subject:
                                        {
                                            required: "Please enter subject",
                                        },
                                message:
                                        {
                                            required: "Please enter message",
                                        },
                               
                            },
                    submitHandler: function(form) {
                        form.submit();
                    }
                });

    });

</script>