<!DOCTYPE html>
<html lang="en">
<head>
	<title>Forgot Password</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
<link rel="icon" type="image/png" href="<?php echo base_url();?>application/views/front/registration/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>application/views/front/registration/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>application/views/front/registration/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>application/views/front/registration/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>application/views/front/registration/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>application/views/front/registration/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>application/views/front/registration/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>application/views/front/registration/css/main.css">
<!--===============================================================================================-->
</head>
<body>

	<div class="bg-contact2">
	<!--<div class="bg-contact2">-->
		<div class="container-contact2">
			<div class="wrap-contact2">
                            <?php
            $msg = $this->session->userdata('password_recover');
           
            ?>
                               <!--[message box]-->
            <?php if ($msg != '') { ?>
                <div class="msg_box alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" id="msg_close" name="msg_close">×</button>
                    <?php
                    echo $msg;
                    $this->session->unset_userdata('password_recover');
                    ?> 
                </div>
                <?php
            }
           
          
           
            ?>
                           
                            
                            <form class="contact2-form validate-form" method="post" action="<?php echo base_url();?>reset-password">
                                Have Password ? <a href="<?php echo base_url();?>signin">Login Here</a>
					<span class="contact2-form-title">
						Forgot Password
                                                
					</span>
                                
					<div class="wrap-input2 validate-input" data-validate="User id is required">
						<input class="input2" type="text" name="user_sponser_id">
						<span class="focus-input2" data-placeholder="User ID*"></span>
					</div>
                                
					<div class="container-contact2-form-btn">
						<div class="wrap-contact2-form-btn">
							<div class="contact2-form-bgbtn"></div>
							<button class="contact2-form-btn">
								Submit
							</button>
						</div>
                                            
					</div>
                            
				</form>
                            
			</div>
		</div>
	</div>




<!--===============================================================================================-->
	<script src="<?php echo base_url();?>application/views/front/registration/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>application/views/front/registration/vendor/bootstrap/js/popper.js"></script>
	<script src="<?php echo base_url();?>application/views/front/registration/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>application/views/front/registration/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>application/views/front/registration/js/forgot.js"></script>

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-23581568-13');
	</script>

</body>
</html>
