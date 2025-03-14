  <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
        <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="<?php echo base_url();?>media/front/images/active.png" width="30%" alt="User Image">
        <div>
          <p class="app-sidebar__user-name"><?php echo strtoupper($user_account['user_sponser_id']); ?></p>
          
        </div>
      </div>
      <ul class="app-menu">
        <li><a class="app-menu__item active" href="<?php echo base_url();?>dashboard"><i class="app-menu__icon fa fa-home"></i><span class="app-menu__label">Home</span></a></li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Profile</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="<?php echo base_url();?>welcome-letter"><i class="icon fa fa-circle-o"></i> Welcome Letter</a></li>
            <li><a class="treeview-item" href="<?php echo base_url();?>editprofile"><i class="icon fa fa-circle-o"></i> Update Profile</a></li>
            <li><a class="treeview-item" href="<?php echo base_url();?>update-pass"><i class="icon fa fa-circle-o"></i> Change Password</a></li>
          </ul>
        </li>
        
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-tasks"></i><span class="app-menu__label">Team Details</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="<?php echo base_url();?>level"><i class="icon fa fa-circle-o"></i> Member Tree</a></li>
            <!--<li><a class="treeview-item" href="<?php echo base_url();?>member"><i class="icon fa fa-circle-o"></i> Team Level</a></li>-->
            <li><a class="treeview-item" href="<?php echo base_url();?>direct"><i class="icon fa fa-circle-o"></i> Direct List</a></li>
          </ul>
        </li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-comment"></i><span class="app-menu__label">Message</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="<?php echo base_url();?>message-list"><i class="icon fa fa-circle-o"></i> Message List</a></li>
            <li><a class="treeview-item" href="<?php echo base_url();?>compose"><i class="icon fa fa-circle-o"></i> Message</a></li>
          </ul>
        </li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-credit-card"></i><span class="app-menu__label">My Income</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="<?php echo base_url();?>donation"><i class="icon fa fa-circle-o"></i> Donation Income</a></li>
            <!--<li><a class="treeview-item" href="<?php echo base_url();?>income"><i class="icon fa fa-circle-o"></i> Total Income Report</a></li>-->
          </ul>
        </li>
        <li><a class="app-menu__item" href="<?php echo base_url();?>logout"><i class="app-menu__icon fa fa-power-off"></i><span class="app-menu__label">Logout</span></a></li>
      </ul>
    </aside>