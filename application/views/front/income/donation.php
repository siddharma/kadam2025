<?php $this->load->view('front/common/header.php'); ?>
<?php $this->load->view('front/common/left-menu.php'); ?>
<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> My Donation Income</h1>
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
      $(document).ready(function(){

            
$(".change_status").change(function () {
  // alert("Hello"+$(this).val()+"---"+$(this).attr('ref'));

  if($(this).val()!=''){   
    $.ajax({
      type: 'POST',
      url: '<?php echo base_url(); ?>update-donation-status',
      dataType: 'text',
      data: {
        'payment_status' : $(this).val(),
        'trans_id' :$(this).attr('ref')
      },
      success : function(result){
        location.reload();
        
      }
    });
  }
});
      });
	</script>
      <div class="row">
        <div class="col-md-12">
          <div class="tile table-responsive">
            <div class="tile-body">
              <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                    <th>Sr. No</th>
                    <th>Date</th>
                    <th>Amount</th>
                    <!-- <th>Transaction No</th> -->
                    <th>Donar ID</th>
                    <th>Image</th>
                    <th>Is Payment Received?</th>
                  </tr>
                </thead>
                <tbody>
                    <?php $i=1;
                    $totalReceivedAmount = 0;
                    foreach ($donationAmt as $team){ ?>
                  <tr>
                    <td><?php echo $i++;?></td> 
                    <td><?php echo $team['transaction_date'];?></td>
                    <td><?php echo $team['amount'];?></td>
                    <!-- <td><?php //echo $team['pnr_no'];?></td> -->
                    <td><?php echo $team['full_name'];?></td>
                    <td><a href="<?php echo base_url().'media/front/transaction-photo/'.$team['transaction_image'];?>" target="_blank"><img src="<?php echo base_url().'media/front/transaction-photo/'.$team['transaction_image'];?>" width="30" /></a></td>
                   <td>
                   <?php if($team['payment_status'] !== 'Yes') { ?> 
                      <select name="status" id="received_<?php echo $i?>" ref="<?php echo $team['trans_id'];?>" class="change_status">
                          <option value="">Choose Status</option>
                          <option value="Yes">Yes</option>
                          <option value="No">No</option>
                      </select>
                   <?php }  else { $totalReceivedAmount+=$team['amount'];
                    echo 'Received'; }?>
                  </td>
                  </tr>
                    <?php }?>
                  
                </tbody>
              </table>
              <h5>Total Received Amount is <?php echo $totalReceivedAmount; ?></h5>
            </div>
          </div>
        </div>
      </div>
    </main>
<?php $this->load->view('front/common/footer.php'); ?>
