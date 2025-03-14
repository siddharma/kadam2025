<?php $this->load->view('front/common/header.php'); ?>
<?php $this->load->view('front/common/left-menu.php'); ?>
<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> My Total Income</h1>
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
                    <th>Donation Income</th>
                    <th>Total Income</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>2011/04/25</td>
                    <td>Edinburgh</td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>2011/04/25</td>
                    <td>good</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </main>
<?php $this->load->view('front/common/footer.php'); ?>
