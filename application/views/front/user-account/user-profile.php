<?php $this->load->view('front/common/header.php'); ?>
<?php $this->load->view('front/common/left-menu.php'); ?>
  
    <main class="app-content">
      <div class="app-title">
      
        <ul class="app-breadcrumb breadcrumb">
            <?php
            $msg = $this->session->userdata('message');
           
            ?>
            <!--[message box]-->
            <?php if ($msg != '') { ?>
                <div class="msg_box alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" id="msg_close" name="msg_close">×</button>
                    <?php
                    echo $msg;
                    $this->session->unset_userdata('message');
                    ?> 
                </div>
                <?php
            }
            ?>  
        </ul>
      </div>
      <div class="row">
        <div class="col-md-6 col-lg-12">
          <div class="widget-small primary coloured-icon-custom">
              <i class="icon"><img class="app-sidebar__user-avatar" src="<?php echo base_url();?>media/front/images/active.png" width="100"  alt="User Image"></i>
            <div class="info">
              <h4><?php echo strtoupper($arr_user_data['full_name']); ?> (<?php echo $arr_user_data['user_sponser_id']; ?>)</h4>
              <h4>Active Date : <?php echo $arr_user_data['register_date']; ?></h4>
              <a class="btn btn-primary" target="_blank" style="background : #FFC107" href="<?php echo base_url();?>pnrupdate">Update PNR</a>
            </div>
          </div>
        </div>
      </div>
        
      <div class="row">
        <div class="col-md-6 col-lg-3">
            <a href="<?php echo base_url();?>dashboard">
          <div class="widget-small primary coloured-icon"><i class="icon fa fa-user fa-3x"></i>
            <div class="info">
              <h4>Profile</h4>
            </div>
          </div>
                </a>
        </div>
        <div class="col-md-6 col-lg-3">
             <a href="<?php echo base_url();?>update-pass">
          <div class="widget-small primary coloured-icon"><i class="icon fa fa-key fa-3x"></i>
            <div class="info">
              <h4>Password</h4>
            </div>
          </div>
             </a>
        </div>
        <div class="col-md-6 col-lg-3">
             <a href="<?php echo base_url();?>direct">
          <div class="widget-small primary coloured-icon"><i class="icon fa fa-group fa-3x"></i>
            <div class="info">
              <h4>Directs</h4>
            </div>
          </div>
             </a>
        </div>
        <div class="col-md-6 col-lg-3">
             <a href="<?php echo base_url();?>donation">
          <div class="widget-small primary coloured-icon"><i class="icon fa fa-gift fa-3x"></i>
            <div class="info">
              <h4>Donation</h4>
            </div>
          </div>
             </a>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 col-lg-3">
             <a href="<?php echo base_url();?>level">
          <div class="widget-small primary coloured-icon"><i class="icon fa fa-handshake-o fa-3x"></i>
            <div class="info">
              <h4>Team</h4>
            </div>
          </div>
             </a>
        </div>
        <div class="col-md-6 col-lg-3">
             <a href="<?php echo base_url();?>compose">
          <div class="widget-small primary coloured-icon"><i class="icon fa fa-envelope fa-3x"></i>
            <div class="info">
              <h4>Message</h4>
            </div>
          </div>
             </a>
        </div>
        <div class="col-md-6 col-lg-3">
             <a href="<?php echo base_url();?>income">
          <div class="widget-small primary coloured-icon"><i class="icon fa fa-inr fa-3x"></i>
            <div class="info">
              <h4>Income</h4>
            </div>
          </div>
             </a>
        </div>
        <div class="col-md-6 col-lg-3">
             <a href="<?php echo base_url();?>logout">
          <div class="widget-small primary coloured-icon"><i class="icon fa fa-sign-out fa-3x"></i>
            <div class="info">
              <h4>Logout</h4>
            </div>
          </div>
             </a>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 col-lg-3">
             <a href="<?php echo base_url();?>form1">
          <div class="widget-small danger coloured-icon"><i class="icon fa fa-download fa-3x"></i>
            <div class="info">
              <h4>Form1</h4>
            </div>
          </div>
             </a>
        </div>
        <div class="col-md-6 col-lg-3">
             <a href="<?php echo base_url();?>form2">
          <div class="widget-small danger coloured-icon"><i class="icon fa fa-download fa-3x"></i>
            <div class="info">
             <h4>Form2</h4>
            </div>
          </div>
             </a>
        </div>
        <div class="col-md-6 col-lg-3">
             <a href="<?php echo base_url();?>form3">
          <div class="widget-small danger coloured-icon"><i class="icon fa fa-download fa-3x"></i>
            <div class="info">
              <h4>Form3</h4>
            </div>
          </div>
             </a>
        </div>
        <div class="col-md-6 col-lg-3">
             <a href="<?php echo base_url();?>form4">
          <div class="widget-small danger coloured-icon"><i class="icon fa fa-download fa-3x"></i>
            <div class="info">
              <h4>Form4</h4>
            </div>
          </div>
             </a>
        </div>
      </div>
      
    </main>
    <?php $this->load->view('front/common/footer.php'); ?>

<style>
    
.greenpopback {
	background-color: rgba(0, 0, 0, 0.64);
	right: 0px;
	left: 0px;
	top: 0px;
	bottom: 0px;
	position: absolute;
	z-index: 9999;
	height:800px;
}
#greenpop {
	width: 65%;
	margin: 0px auto;
	position: absolute;
	left: 0px;
	right: 0px;
	z-index: 99999;
	opacity: 0;
	top:50px;
}
#greenpop img {
	width: 100%;
	
}
#close {
	position: absolute;
	top: 5px;
	right: 0px;
	z-index: 99999;

	width: 40px;
	height: 40px;
	text-align: center;
	line-height: 30px;
	font-family: sans-serif;
	font-weight: bold;
	cursor: pointer;
	
}
.img{
      border-top:solid 5px white;
      border-left:solid 5px white;
      border-right:solid 5px white;
      border-bottom:solid 5px white;
 }

@media (max-width:500px) {
#greenpop {
	width: 90%;
}

</style>
<?php if(empty($this->session->userdata('popup_id'))==TRUE){?>
<div class="greenpopback"></div>
<div id="greenpop" style="height: 90%;opacity: 1;">
        <img src="<?php echo base_url();?>media/front/images/go-green.jpg" class="img">
          <div id="close">
           <img src="<?php echo base_url();?>media/front/images/close.png" class="img">
        </div>
 </div>
<?php $this->session->set_userdata('popup_id',$user_account['user_sponser_id']);
} ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<script>
$(document).ready(function() {        
        $(".greenpopback").fadeIn("500");
		$("#greenpop").stop(false,true).delay(100).animate({height:"90%", opacity:"1"}, 800);
        });
	
        
		$("#close").click(function() {
		$(".greenpopback").stop(true, false).fadeOut(500);
        $("#greenpop").stop(true, false).fadeOut(500);   
        });
        </script>