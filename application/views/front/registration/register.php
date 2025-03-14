<!DOCTYPE html>
<html lang="en">
<head>
	<title>New Register !</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
<link rel="icon" type="image/png" href="<?php echo base_url(); ?>application/views/front/registration/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>application/views/front/registration/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>application/views/front/registration/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>application/views/front/registration/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>application/views/front/registration/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>application/views/front/registration/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>application/views/front/registration/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>application/views/front/registration/css/main.css">
<!--===============================================================================================-->
</head>
<body>

	<div class="bg-contact2">
	<!--<div class="bg-contact2">-->
		<div class="container-contact2">
           
			<div class="wrap-contact2">
		<?php $msg = $this->session->userdata( "message" ); ?>
            <!--[message box]-->
            <?php if ($msg != "") { ?>
                <div class="msg_box alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" id="msg_close" name="msg_close">×</button>
                    <?php
                    echo $msg;
                    $this->session->unset_userdata("message");
                    ?> 
                </div>
                <?php } ?> 
                            <span class="clslogin"><a href="<?php echo base_url(); ?>">HOME</a></span>
                            <span class="clslogin"><a href="<?php echo base_url(); ?>signin">LOGIN</a></span>
                            <form class="contact2-form validate-form" method="post" action="<?php echo base_url(); ?>signup">
					<span class="contact2-form-title">
						New Register !
					</span>
                                
                                <style>
                                    .input-success-cl {
    position: relative;
    color: #fff;
    background: #2fcc34;
    border-radius: 6px;
    padding: 5px;
    line-height: normal;
    display: inline-block;
    font-weight: bold;
    width: 100%;
    Clear: both;
    -moz-animation: bounce 1s 1 alternate;
    -ms-animation: bounce 1s 1 alternate;
    -o-animation: bounce 1s 1 alternate;
    -webkit-animation: bounce 1s 1 alternate;
    animation: bounce 1s 1 alternate;
    top: -30px;
}


.input-error-cl {
    position: relative;
    color: #fff;
    background: #f1c40f;
    border-radius: 6px;
    padding: 5px;
    line-height: normal;
    display: inline-block;
    font-weight: bold;
    width: 100%;
    Clear: both;
    -moz-animation: bounce 1s 1 alternate;
    -ms-animation: bounce 1s 1 alternate;
    -o-animation: bounce 1s 1 alternate;
    -webkit-animation: bounce 1s 1 alternate;
    animation: bounce 1s 1 alternate;
    top: -26px;
}
                                    </style>
					<div class="wrap-input2 validate-input" data-validate="Sponsor id is required">
						<input class="input2" type="text" name="sponser_id" id="sponser_id" style="text-transform:uppercase" >
						<span class="focus-input2" data-placeholder="Sponsor ID*"></span>
					</div>
                                            
                    <div id="sponser_user" ></div>

					<div class="wrap-input2 validate-input" data-validate = "User Name is required">
						<input class="input2" type="text" name="full_name" style="text-transform:uppercase" >
						<span class="focus-input2" data-placeholder="User Full Name*"></span>
					</div>
					<div class="wrap-input2 validate-input" data-validate="Mobile is required">
						<input class="input2" type="number" name="mobile_no" >
						<span class="focus-input2" data-placeholder="Mobile*"></span>
					</div>

					<div class="wrap-input2 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input2" type="text" name="user_email"  style="text-transform:lowercase" >
						<span class="focus-input2" data-placeholder="Email*"></span>
					</div>
					
					<!-- <div class="wrap-input2 validate-input" >
						<textarea class="input2" name="address"></textarea>
						<span class="focus-input2" data-placeholder="Address"></span>
					</div>

					<div class="wrap-input2 validate-input">
						<input class="input2" type="text" name="city" style="text-transform:uppercase">
						<span class="focus-input2" data-placeholder="City"  ></span>
					</div>

                    <div class="wrap-input2 validate-input">
						<input class="input2" type="number" name="pin_code">
						<span class="focus-input2" data-placeholder="Pincode"></span>
					</div>
                    
					<div class="wrap-input2 validate-input">
						<input class="input2" type="text" name="annual_income">
						<span class="focus-input2" data-placeholder="Annual Income"></span>
					</div>
                    <div class="wrap-input2 validate-input">
						<input class="input2" type="text" name="occupation">
						<span class="focus-input2" data-placeholder="Occupation"></span>
					</div> -->
					<div class="wrap-input2 validate-input">
						<input class="input2" type="text" name="upi_address">
						<span class="focus-input2" data-placeholder="UPI*"></span>
					</div>


                    <div class="wrap-input2 validate-input">
						<input class="input2" type="text" name="nominee_name">
						<span class="focus-input2" data-placeholder="Nominee Name"></span>
					</div>
                                
					<div class="wrap-input2 validate-input">
						<input class="input2" type="text" name="nominee_relation">
						<span class="focus-input2" data-placeholder="Nominee Relation"></span>
					</div>
                                You accept all <a href="<?php echo base_url(); ?>application/views/front/registration/gogreenrules.pdf" target="_blank">Terms & Conditions</a> clicking on submit button.
					<div class="container-contact2-form-btn">
						<div class="wrap-contact2-form-btn">
							<div class="contact2-form-bgbtn"></div>
							<button class="contact2-form-btn">
								Submit
							</button>
                                                        
                                                        
						</div>
                                            
					</div>
                                <div class="container-contact2-form-btn">
						<div class="wrap-contact2-form-btn">
							<div class="contact2-form-bgbtn"></div>
							
                                                        <input type="reset" id="reset" name="reset" value="Reset" class="custom-contact2-form-btn">
                                                        
						</div>
                                            
					</div>
				</form>
			</div>
		</div>
	</div>




<!--===============================================================================================-->
	<script src="<?php echo base_url(); ?>application/views/front/registration/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url(); ?>application/views/front/registration/vendor/bootstrap/js/popper.js"></script>
	<script src="<?php echo base_url(); ?>application/views/front/registration/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url(); ?>application/views/front/registration/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url(); ?>application/views/front/registration/js/main.js"></script>

	<script>
          
          $("#sponser_id").blur(function () {
          if($(this).val()!=''){   
   $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>getuserinfo',
        dataType: 'text',
        data: {
            'user_id' : $(this).val() 
     },
        success : function(result){
          
            $( "#sponser_user" ).html(result);
            
        }
    });
    }
});
	</script>

</body>
</html>
