<?php $this->load->view('front/common/header.php'); ?>
<?php $this->load->view('front/common/left-menu.php'); ?>
<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> My Directs</h1>
        </div>
        
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile table-responsive">
            <div class="tile-body">
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
                    <?php $i=1;
                    foreach ($arr_team_data as $team){?>
                  <tr>
                    <td><?php echo $i++;?></td>
                    <td><?php echo $team['user_sponser_id'];?></td>
                    <td><?php echo $team['full_name'];?></td>
                    <td><?php echo $team['register_date'];?></td>
                    <td><?php echo $team['activate_date'];?></td>
                    <td><?php echo $team['user_status'];?></td>
                   
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
