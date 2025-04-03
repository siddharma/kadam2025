<?php $this->load->view("front/common/header.php"); ?>
<?php $this->load->view("front/common/left-menu.php"); ?>

<style>

#progress-bar {background-color: #12CC1A;height:20px;color: #FFFFFF;width:0%;-webkit-transition: width .3s;-moz-transition: width .3s;transition: width .3s;}
.btnSubmit{background-color:#09f;border:0;padding:10px 40px;color:#FFF;border:#F0F0F0 1px solid; border-radius:4px;}
#progress-div {border:#0FA015 1px solid;padding: 5px 0px;margin:30px 0px;border-radius:4px;text-align:center;}
#targetLayer{width:100%;text-align:center;}

</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script>
<script src="https://malsup.github.io/jquery.form.js"></script>
<script>
/* jquery.form.min.js */

</script>

<script type="text/javascript">
$(document).ready(function() { 
	 $('#hier-form').submit(function(e) {	
    // alert("Here");
		// if($('#userImg').val()) {
		// 	e.preventDefault();
		// 	$('#loader-icon').show();
		// 	$(this).ajaxSubmit({ 
		// 		target:   '#targetLayer', 
		// 		beforeSubmit: function() {
		// 		  $("#progress-bar").width('0%');
		// 		},
		// 		uploadProgress: function (event, position, total, percentComplete){	
		// 			$("#progress-bar").width(percentComplete + '%');
		// 			$("#progress-bar").html('<div id="progress-status">' + percentComplete +' %</div>')
		// 		},
		// 		success:function (){
		// 			$('#loader-icon').hide();
		// 		},
		// 		resetForm: true 
		// 	}); 
		// 	return false; 
		// }
	});

  toggle();
}); 

</script>

<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i>Transaction Update</h1>
        </div>
      </div>
      <div class="col-md-12">
          <form width="100%;" enctype="multipart/form-data"  id="hier-form" action="<?php echo base_url(); ?>pnrupdate" method="post">
        <div class="col-md-6">
          <div class="tile">
            <h5 style="color:red">How Many Forms You Want To Active</h5>
            <div class="">
              <div id="form">  
            <?php 
            switch ($user_account["form_id"]) { 
              case 1: ?>
                <span style="visibility:visible;"><input type="radio" name="form" value="1"  id="frm1" onchange="toggle();" checked="checked" ><span class="label-text chkright" id="myspan1" style="visibility:visible;">Form1</b></span></span>
                <span style="visibility:hidden;"><input type="radio" name="form" value="2"  id="frm2" onchange="toggle();" ><span class="label-text chkright" id="myspan2" style="visibility:hidden;">Form2</span></span>
                <span style="visibility:hidden;"><input type="radio" name="form" value="3"  id="frm3" onchange="toggle();" ><span class="label-text chkright" id="myspan3" style="visibility:hidden;">Form3</span></span>
                <?php break;
                 case 2: ?>
                <span style="visibility:hidden;"><input type="radio" name="form" value="1"  id="frm1" onchange="toggle();" ><span class="label-text chkright" id="myspan1" style="visibility:hidden;">Form1</b></span></span>
                <span style="visibility:visible;"><input type="radio" name="form" value="2"  id="frm2" onchange="toggle();" checked="checked" ><span class="label-text chkright" id="myspan2" style="visibility:visible;">Form2</span></span>
                <span style="visibility:hidden;"><input type="radio" name="form" value="3"  id="frm3" onchange="toggle();" ><span class="label-text chkright" id="myspan3" style="visibility:hidden;">Form3</span></span>
                <?php break;case 3: ?>
                  <span style="visibility:hidden;"><input type="radio" name="form" value="1"  id="frm1" onchange="toggle();" ><span class="label-text chkright" id="myspan1" style="visibility:hidden;">Form1</b></span></span>
                <span style="visibility:hidden;"><input type="radio" name="form" value="2"  id="frm2" onchange="toggle();" ><span class="label-text chkright" id="myspan2" style="visibility:hidden;">Form2</span></span>
                <span style="visibility:visible;"><input type="radio" name="form" value="3"  id="frm3" onchange="toggle();" checked="checked" ><span class="label-text chkright" id="myspan3" style="visibility:visible;">Form3</span></span>
            <?php break;
             /*case 0: ?>
              <span style="visibility:hidden;"><input type="radio" name="form" value="1"  id="frm1" onchange="toggle();" ><span class="label-text chkright" id="myspan1" >Form1</span></span>
                <span style="visibility:hidden;"><input type="radio" name="form" value="2"  id="frm2" onchange="toggle();" ><span class="label-text chkright" id="myspan2" >Form2</span></span>
                <span style="visibility:hidden;"><input type="radio" name="form" value="3"  id="frm3" onchange="toggle();" ><span class="label-text chkright" id="myspan3" >Form3</span></span>
                <?php break; */
            default:
                    break;
            } ?>
              
                </div>
            </div>
            <div id="form1_div" style="background : red;color:#ffffff; text-align:center;font-weight: bold; margin:10px 10px;">Please Select Donor
          </div>
            <div>
           
            <?php /* foreach ($unactive_user as $inactive) { ?>
              <span id="User_usr_code" class="chkright "><input class="clikcnt" id="usr_code_<?php echo $inactive["user_sponser_id"]; ?>" value="<?php echo $inactive["user_sponser_id"]; ?>" type="checkbox" name="user_code[]" onclick="updateCount()"/>
                  <label for="User_usr_code_0"><?php echo $inactive["user_sponser_id"]; ?></label>
              </span> 
            <?php } */ ?>
            
          </div>
        </div>
        </div>
          <style>.chkright{padding: 10px 10px 10px 10px; }</style>
            <div class="clearfix"></div>
        <div class="col-md-12">
          <div class="tile">
            <h5 class="tile-title">Form Data</h5>
            <span><span style="color:red"><strong>Note : </strong></span><br>
                1) Do Not Provide Fake or Wrong Transaction NO. , Otherwise Your Id will Be Blocked.<br/>
                2) Please Check Image Before Upload , It Must Be Readable.</span>
            <div id="pnr_update" class="table-responsive" style="visibility:hidden;">
              <table class="table">

                <tbody>
                    <?php for ($i = 12; $i >= 1; $i--) { ?>
                        <tr>
                    <td >
                        <?php //echo $sponsered_user["sponser_id"][$i]; ?>
                        <input type="hidden" name="pnr_holder<?php echo $i; ?>" value="<?php echo $sponsered_user["sponser_id"][$i]; ?>">
                            <lable style="width:100px"><?php echo "" . $sponsered_user["full_name"][$i] ; ?></lable>
                    </td>
                    <td><input id="myInput_<?php echo $i; ?>" readonly class="myInput" onclick="myFunction(<?php echo $i; ?>)" value="<?php echo $sponsered_user["upi_address"][$i]; ?>"  /></td>
                    <!-- <td><input type="hidden" name="pnr_no<?php echo $i; ?>" placeholder="Enter Transaction No." ></td> -->
                    <input type="hidden" name="pnr_no<?php echo $i; ?>" placeholder="Enter Transaction No." >
                    <td><input type="text" name="pnr_amount<?php echo $i; ?>" style="width:50px" readonly></td>
                    <td>
                    <?php if($arr_form_data['form_count'] <= 0) {?>
                    <input type="file" name="pnr_holder_img_<?php echo $i; ?>" />
                    <?php } else { 
                      foreach($transaction_data as $transaction) {  
                        if($transaction['to_id'] !== $sponsered_user["sponser_id"][$i]) {
                          continue;
                        }
                      ?>
                      <a href="<?php echo base_url().'media/front/transaction-photo/'.$transaction['transaction_image'];?>" target="_blank"><img src="<?php echo base_url().'media/front/transaction-photo/'.$transaction['transaction_image'];?>" width="30" /></a> 
                        
                      <?php echo '<br/>'.(strtolower($transaction['payment_status']) === 'no'? "Pending": "Connfirmed"); }}?>
                  </td>
                  </tr>
                   <?php } ?>
          
                </tbody>
              </table>
            </div>
            <div class="clearfix"></div>
            <!-- <div class="form-group row" id='up_img' style="visibility:hidden;">
              <label class="control-label col-md-3"><strong>Upload Form Image</strong></label>
                <div class="col-md-8">
                  <input class="form-control" type="file" name="userImg" id="userImg" required="required">
                </div>
            </div> -->

             
             <div id="btndata" style="visibility:hidden;">
             <div class="form-group row">
                  <div class="col-md-8 col-md-offset-3">
                    <div class="form-check">
                      <label class="form-check-label">
                       You accept all <a href="#" target="_blank">Terms & Conditions</a> clicking on submit button.
                      </label>
                    </div>
                  </div>
                </div>
             <div id="progress-div">
              <div id="progress-bar"></div>
            </div>
            <div id="targetLayer">
            </div>

            <div class="tile-footer">
              <div class="row">
                <div class="col-md-8 col-md-offset-3">
                  <?php if($arr_form_data['form_count'] <= 0) {?>
                    <input type="submit" class="btn btn-primary" id="btnpnr" name="btnpnr" value="Submit">
                <?php } ?>

                  </div>
              </div>
            </div>
            </div>
          </div>
          </div>
            </form>
       <div id="loader-icon" style="display:none;"><img src="<?php echo base_url(); ?>/media/front/images/LoaderIcon.gif" /></div>
          
     

<div class="col-md-12">
          <div class="tile table-responsive">
            <div class="tile-body">
              <h2><i class="fa fa-th-list"></i> My Directs</h2>
       
              <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>User Code</th>
                    <th>User Name</th>
                    <th>Register Date</th>
                    <th>Active Date</th>
                    <th>Remark</th>
                  </tr>
                </thead>
                <tbody>
                     <?php
                     $i = 1;
                     foreach ($arr_team_data as $team) { ?>
                  <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $team["user_sponser_id"]; ?></td>
                    <td><?php echo $team["full_name"]; ?></td>
                    <td><?php echo $team["register_date"]; ?></td>
                    <td><?php echo $team["activate_date"]; ?></td>
                    <td><?php echo $team["user_status"]; ?></td>
                  </tr>
                    <?php }
                     ?>
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
        </div>
     </main>
<?php $this->load->view("front/common/footer.php"); ?>

   <script type="text/javascript" >

function myFunction(id) {
  var copyText = document.getElementById("myInput_"+id);
  copyText.select();
  copyText.setSelectionRange(0, 99999); 
  navigator.clipboard.writeText(copyText.value);
  alert("Copied " + copyText.value);
}
  
 function toggle()
{
    var rate_value=0;
    var msg="";var i=0;
    if (document.getElementById('frm1').checked)
    {
      rate_value = document.getElementById('frm1').value;
      // document.getElementById('up_img').style.visibility='visible';
//      document.getElementById('up_img1').style.visibility='hidden'; 
//      document.getElementById('up_img2').style.visibility='hidden'; 
      document.getElementById('pnr_update').style.visibility='visible'; 
      document.getElementById('btndata').style.visibility='visible'; 
      msg='Please Select Only '+rate_value+' Donor';
      changeForm(rate_value);
    }
    else if (document.getElementById('frm2').checked)
    {
      rate_value = document.getElementById('frm2').value;
      // document.getElementById('up_img').style.visibility='visible';
//      document.getElementById('up_img1').style.visibility='visible'; 
//      document.getElementById('up_img2').style.visibility='hidden'; 
      document.getElementById('pnr_update').style.visibility='visible'; 
      document.getElementById('btndata').style.visibility='visible';
      msg='Please Select Only '+rate_value+' Donors';
      changeForm(rate_value);
      
    }
    else if (document.getElementById('frm3').checked)
    {
      rate_value = document.getElementById('frm3').value;
      // document.getElementById('up_img').style.visibility='visible';
//      document.getElementById('up_img1').style.visibility='visible'; 
//      document.getElementById('up_img2').style.visibility='visible'; 
      document.getElementById('pnr_update').style.visibility='visible';
      document.getElementById('btndata').style.visibility='visible';
      msg='Please Select All Donors';
      changeForm(rate_value);
    }
    else if (document.getElementById('frm4').checked)
    {
       rate_value = document.getElementById('frm4').value;
      //  document.getElementById('up_img').style.visibility='visible';
//       document.getElementById('up_img1').style.visibility='hidden'; 
//       document.getElementById('up_img2').style.visibility='hidden';
//       document.getElementById('up_img3').style.visibility='visible';
       document.getElementById('pnr_update').style.visibility='hidden'; 
       document.getElementById('btndata').style.visibility='visible';
       msg='Please Select Donor';
    }
    
 document.getElementById('form1_div').innerHTML = msg;//'Please Select Only '+rate_value+' Donor';

 
 


function changeForm(rate_value) {

  if(rate_value < 3) {
      <?php for ($i = 1; $i < 13; $i++) {
          $z = $i;
          //$i+1;
          ?>
    <?php
    if ($z < 10) { ?>
    var amnt=<?php echo $global["level" . $z . "_amt"]; ?>;  
    <?php }
    if ($z > 9) { ?>
      var amnt=<?php echo $global["fix_level" . ($z - 9) . "_amt"]; ?>;  
      <?php }
    ?>
          
    $('[name="pnr_amount<?php echo $i; ?>"]').val(amnt);
        if(rate_value>0)
        {
            //name="pnr_holder"
            // $('[name="pnr_no<?php echo $i; ?>"]').prop("required", true);
        }
  <?php
      } ?>
  } else {

    <?php for ($i = 1; $i < 13; $i++) {
        $z = $i;
        //$i+1;
        ?>
  var amnt = null;
    <?php
    if ($z == 1) { ?>
    var amnt=<?php echo $global["form3_level1_amt"]; ?>;  
    <?php }
    if ($z > 9) { ?>
      var amnt=<?php echo $global["fix_level" . ($z - 9) . "_amt"]; ?>;  
      <?php }
    ?>
          
    $('[name="pnr_amount<?php echo $i; ?>"]').val(amnt);
        if(rate_value>0)
        {
            //name="pnr_holder"
            $('[name="pnr_no<?php echo $i; ?>"]').prop("required", true);
        }
  <?php
    } ?>
  }
  
}


 $('.clikcnt').prop("checked", false);
    if (rate_value == 3)
    {
      $('.clikcnt').prop("checked", true);
    }
    
    window.updateCount = function() {
    var x = $(".clikcnt:checked").length;
   
    if (x > rate_value)
    {
    alert('Please select only '+rate_value+' Checkboxes');
    $('.clikcnt').prop("checked", false);
    return false;
    }
   
};
 }

 
</script>     
        
