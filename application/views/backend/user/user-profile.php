<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= isset($title) ? $title : $global['site_title']; ?></title>
    <?php $this->load->view('backend/sections/header'); ?>

    <style>
        .error {
            color: #BD4247;
            margin-left: 120px;
            width: 210px;
        }
        .FETextInput {
            margin-left: 120px;
            margin-top: -28px;
        }
        .controls-text {
            margin-left: 160px;
        }
        .form-horizontal .control-label {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <!-- JS Libraries -->
    <script src="<?= base_url('media/backend/js/jquery.dataTables.min.js'); ?>"></script>
    <script src="<?= base_url('media/backend/js/bootstrap-tab.js'); ?>"></script>
    <script src="<?= base_url('media/backend/js/bootstrap-tooltip.js'); ?>"></script>
    <script src="<?= base_url('media/backend/js/charisma.js'); ?>"></script>
    <script src="<?= base_url('media/backend/js/select-all-delete.js'); ?>"></script>

    <?php 
        $this->load->view('backend/sections/top-nav.php');
        $this->load->view('backend/sections/leftmenu.php');
    ?>

    <div id="content" class="span10">
        <!-- Breadcrumb -->
        <ul class="breadcrumb">
            <li><a href="<?= base_url('backend/dashboard'); ?>">Dashboard</a> <span class="divider">/</span></li>
            <?php if ($this->session->userdata('user_account')['role_id'] == 1): ?>
                <li><a href="<?= base_url('backend/user/mainlist'); ?>">Manage User</a> <span class="divider">/</span></li>
            <?php endif; ?>
            <li>User Profile</li>
        </ul>

        <div class="row-fluid sortable">
            <div class="box span12">
                <div class="box-header well">
                    <h2>User Profile</h2>
                    <div class="box-icon">
                        <a title="Go Back" class="btn btn-plus btn-round" onclick="history.go(-1);" href="javascript:void(0);">
                            <i class="icon-arrow-left"></i>
                        </a>
                    </div>
                </div>

                <br>

                <div class="box-content">
                    <form id="frm_admin_dtl" class="form-horizontal" name="frm_admin_dtl">
                        <?php
                        $fields = [
                            'User Id' => 'user_sponser_id',
                            'Sponser Id' => 'sponser_id',
                            'Name' => 'full_name',
                            'Email Id' => 'user_email',
                            'Register Date' => date($global['date_format'], strtotime($arr_user_detail['register_date'])),
                            'Phone' => 'mobile_no',
                        ];

                        foreach ($fields as $label => $value):
                        ?>
                            <div class="control-group">
                                <label class="control-label"><?= $label ?></label>
                                <div class="controls-text">
                                    <?= is_string($value) && isset($arr_user_detail[$value]) ? $arr_user_detail[$value] : $value ?>
                                </div>
                            </div>
                        <?php endforeach; ?>

                        <h3>User's Upload Files and Data</h3>
                        <table class="table table-striped table-bordered bootstrap-datatable datatable">
                            <thead>
                                <tr>
                                    <th>Full Name</th>
                                    <th>Transaction Number</th>
                                    <th>Amount</th>
                                    <th>Uploaded Date</th>
                                    <th>Image</th>
                                </tr>
                            </thead>
                            <tbody>
                             
                                <?php if (!empty($arr_user_detail['user_trans'])): ?>
                                    <?php foreach ($arr_user_detail['user_trans'] as $key => $values): ?>
                                        <tr>
                                            <td><?= $values['full_name']; ?></td>
                                            <td><?= $values['pnr_no']; ?></td>
                                            <td><?= $values['amount']; ?></td>
                                            <td><?= $values['transaction_date']; ?></td>
                                            <?php if (in_array($key, [0, 6, 12])): ?>
                                                <td rowspan="6">
                                                    <a target="_blank" href="<?= base_url('media/front/transaction-photo/' . $values['transaction_image']); ?>">
                                                        <img src="<?= base_url('media/front/transaction-photo/' . $values['transaction_image']); ?>" width="350" height="300">
                                                    </a>
                                                    <br>Form for below ids:
                                                    <?php foreach (explode('-', $values['from_id']) as $data): ?>
                                                        <br><?= $data ?>
                                                    <?php endforeach; ?>
                                                </td>
                                            <?php endif; ?>
                                        </tr>
                                        <?php if (in_array($key, [5, 11])): ?>
                                            <tr style="background-color:#d2bbbb;">
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            </tr>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>

                        <h3>User's Direct Members</h3>
                        <table class="table table-striped table-bordered bootstrap-datatable datatable">
                            <thead>
                                <tr>
                                    <th>Sr No</th>
                                    <th>Name</th>
                                    <th>User Id</th>
                                    <th>Email Id</th>
                                    <th>Phone No</th>
                                    <th>Request Status</th>
                                    <th>Reg. Date</th>
                                </tr>
                            </thead>
                            <tbody>
                            
                                <?php if (!empty($arr_user_detail['user_members'])): ?>
                                    <?php foreach ($arr_user_detail['user_members'] as $key => $value): ?>
                                        <tr>
                                            <td><?= $key + 1; ?></td>
                                            <td><?= $value['full_name']; ?></td>
                                            <td><?= $value['user_sponser_id']; ?></td>
                                            <td><?= $value['user_email']; ?></td>
                                            <td><?= $value['mobile_no']; ?></td>
                                            <td>
                                                <div id="active_div<?= $value['user_id']; ?>" style="display:<?= $value['is_active'] == 'Yes' ? 'inline-block' : 'none'; ?>">
                                                    <a class="label label-success" title="Click to Change Status"
                                                       onclick="changeStatus('<?= $value['user_id']; ?>', 'No');"
                                                       href="javascript:void(0);">Active</a>
                                                </div>
                                                <div id="blocked_div<?= $value['user_id']; ?>" style="display:<?= $value['is_active'] == 'No' ? 'inline-block' : 'none'; ?>">
                                                    <a class="label label-important" title="Click to Change Status"
                                                       onclick="changeStatus('<?= $value['user_id']; ?>', 'Yes');"
                                                       href="javascript:void(0);">Inactive</a>
                                                </div>
                                            </td>
                                            <td><?= $value['register_date']; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>

                        <div class="form-actions">
                            <button onclick="history.go(-1);" class="btn" type="button">Back</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php $this->load->view('backend/sections/footer.php'); ?>
    </div>
</body>

<script type="text/javascript">
    function changeStatus(user_id, user_status) {
        if (confirm('Do you want to change member status?')) {
            $.post("<?= base_url('backend/user/change-member-status'); ?>", {
                user_id: user_id,
                user_status: user_status
            }, function (msg) {
                if (msg.error === "1") {
                    alert(msg.error_message);
                } else {
                    $("#active_div" + user_id).toggle(user_status !== 'No');
                    $("#blocked_div" + user_id).toggle(user_status === 'No');
                }
            }, "json");
        }
    }
</script>
</html>
