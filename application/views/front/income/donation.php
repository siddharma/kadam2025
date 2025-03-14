<?php $this->load->view('front/common/header.php'); ?>
<?php $this->load->view('front/common/left-menu.php'); ?>
<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> My Donation Income</h1>
        </div>
        
      </div>
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
                    <th>PNR No</th>
                    <th>Donar ID</th>
                   
                  </tr>
                </thead>
                <tbody>
                  
                    <?php $i=1;
                    foreach ($donationAmt as $team){?>
                  <tr>
                    <td><?php echo $i++;?></td>
                    <td><?php echo $team['transaction_date'];?></td>
                    <td><?php echo $team['amount'];?></td>
                    <td><?php echo $team['pnr_no'];?></td>
                    <td><?php echo $team['from_id'];?></td>
                   
                  </tr>
                    <?php }?>
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </main>
<?php $this->load->view('front/common/footer.php'); ?>
