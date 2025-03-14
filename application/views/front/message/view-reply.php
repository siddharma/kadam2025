<?php $this->load->view('front/common/header.php'); ?>
<?php $this->load->view('front/common/left-menu.php'); ?>
  <main class="app-content">
      
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i>View Message</h1>
          <p>View Replied Message</p>
        </div>
      </div>
      
          <?php foreach ($arrReplyDetails as $reply){?>
      <div class="row">
                <div class="row user">
                    <div class="col-md-12">
                    <div class="col-md-1"></div>
       
        <div class="col-md-9">
          
           
              <div class="timeline-post">

                <div class="post-content">
                  <p><?php echo ucfirst($reply['contents']); ?></p>
                </div>
                <ul class="post-utility">
                  <li class="likes"><?php echo ucfirst($reply['createddate']); ?></li>
                
                  <li class="comments"><i class="fa fa-fw fa-lg fa-comment-o"></i> <?php echo ucfirst($reply['full_name']); ?></li>
                </ul>
             
           
          </div>
        </div>
      </div>
      </div>
          </div>
          <?php }?>
            
      
    </main>
<?php  $this->load->view('front/common/footer.php'); ?>
