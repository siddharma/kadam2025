<?php $this->load->view('front/common/header.php'); ?>
<?php $this->load->view('front/common/left-menu.php'); ?>
<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Message List</h1>
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
                    <th>Subject</th>
                    <th>Message</th>
                    <th>Remark</th>
                    <th>view</th>
                  </tr>
                </thead>
                <tbody>
                    <?php if(count($arrAllmsg)>0){
                        foreach($arrAllmsg as $msg){?>
                  <tr>
                    <td><?php echo $msg['ims_id'];?></td>
                    <td><?php echo ucfirst($msg['subject']);?></td>
                    <td><?php echo ucfirst($msg['contents']);?></td>
                    <td><?php echo $msg['msg_status'];?></td>
                    <td><a href="<?php echo base_url().'view-message/'.$msg['ims_id'];?>">View Reply</a></td>
                  </tr>
                        <?php } } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </main>
<?php $this->load->view('front/common/footer.php'); ?>
