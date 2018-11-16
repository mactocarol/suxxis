<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url(); ?>upload/profile_image/thumb/<?=$result->image?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php print_r($this->session->userdata('email'));?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li <?php if($page == 'dashboard') { echo 'class="active"'; }?>>
          <a href="<?php echo site_url('admin/dashboard');?>">
            <i class="fa fa-edit"></i> <span>Dashbboard</span>            
          </a>          
        </li>
        <li class="treeview <?php if($page == 'profile' || $page == 'upload_image') { echo 'menu-open'; }?> ">
        <a href="#">
          <i class="fa fa-edit"></i> <span>Profile</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu" style="<?php if($page == 'profile' || $page == 'upload_image') { echo 'display:block'; }?>">
          <li <?php if($page == 'profile') { echo 'class="active"'; }?> ><a href="<?php echo site_url('admin/update_profile');?>"><i class="fa fa-circle-o"></i>Update Profile</a></li>
          <li <?php if($page == 'upload_image') { echo 'class="active"'; }?> ><a href="<?php echo site_url('admin/upload_image');?>"><i class="fa fa-circle-o"></i>Change Profile Picture</a></li>          
        </ul>
      </li>
      
        <li class="treeview <?php if($page == 'add_user' || $page == 'list_user' ) { echo 'menu-open'; }?> ">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Users</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="<?php if($page == 'add_user' || $page == 'list_user' ) { echo 'display:block'; }?>">
            <li <?php if($page == 'add_user') { echo 'class="active"'; }?> ><a href="<?php echo site_url('admin/add');?>"><i class="fa fa-circle-o"></i> Add User</a></li>
            <li <?php if($page == 'list_user') { echo 'class="active"'; }?>><a href="<?php echo site_url('admin/lists');?>"><i class="fa fa-circle-o"></i> List Users</a></li>            
          </ul>
        </li>
        
        <li class="treeview <?php if($page == 'add_news' || $page == 'list_news' ) { echo 'menu-open'; }?> ">
          <a href="#">
            <i class="fa fa-edit"></i> <span>News Panel</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="<?php if($page == 'add_news' || $page == 'list_news' ) { echo 'display:block'; }?>">
            <li <?php if($page == 'add_news') { echo 'class="active"'; }?> ><a href="<?php echo site_url('news_panel/add');?>"><i class="fa fa-circle-o"></i> Add News</a></li>
            <li <?php if($page == 'list_news') { echo 'class="active"'; }?>><a href="<?php echo site_url('news_panel');?>"><i class="fa fa-circle-o"></i> List News</a></li>            
          </ul>
        </li>
        
        <li class="treeview <?php if($page == 'add_tutorial' || $page == 'list_tutorial' ) { echo 'menu-open'; }?> ">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Tutorial Panel</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="<?php if($page == 'add_tutorial' || $page == 'list_tutorial' ) { echo 'display:block'; }?>">
            <li <?php if($page == 'add_tutorial') { echo 'class="active"'; }?> ><a href="<?php echo site_url('tutorial_panel/add');?>"><i class="fa fa-circle-o"></i> Add Tutorial</a></li>
            <li <?php if($page == 'list_tutorial') { echo 'class="active"'; }?>><a href="<?php echo site_url('tutorial_panel');?>"><i class="fa fa-circle-o"></i> List Tutorial</a></li>            
          </ul>
        </li>
        
        <li class="treeview <?php if($page == 'add_support' || $page == 'list_support' ) { echo 'menu-open'; }?> ">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Support Panel</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="<?php if($page == 'add_support' || $page == 'list_support' ) { echo 'display:block'; }?>">
            <li <?php if($page == 'add_support') { echo 'class="active"'; }?> ><a href="<?php echo site_url('support_panel/add');?>"><i class="fa fa-circle-o"></i> Add Support</a></li>
            <li <?php if($page == 'list_support') { echo 'class="active"'; }?>><a href="<?php echo site_url('support_panel');?>"><i class="fa fa-circle-o"></i> List Support</a></li>            
          </ul>
        </li>
        
        <li class="treeview <?php if($page == 'about_us' || $page == 'contact_us' || $page == 'upgrade_cost' || $page == 'loan_upgrade_cost' ) { echo 'menu-open'; }?> ">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Setting</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="<?php if($page == 'about_us' || $page == 'contact_us' || $page == 'upgrade_cost' || $page == 'loan_upgrade_cost') { echo 'display:block'; }?>">
            <li <?php if($page == 'upgrade_cost') { echo 'class="active"'; }?> ><a href="<?php echo site_url('admin/upgrade_cost');?>"><i class="fa fa-circle-o"></i> Upgrade Cost</a></li>
            <li <?php if($page == 'loan_upgrade_cost') { echo 'class="active"'; }?> ><a href="<?php echo site_url('admin/loan_upgrade_cost');?>"><i class="fa fa-circle-o"></i> Loan Upgrade Cost</a></li>
            <li <?php if($page == 'about_us') { echo 'class="active"'; }?> ><a href="<?php echo site_url('admin/about_us');?>"><i class="fa fa-circle-o"></i> About Us Page</a></li>
            <li <?php if($page == 'contact_us') { echo 'class="active"'; }?> ><a href="<?php echo site_url('admin/contact_us');?>"><i class="fa fa-circle-o"></i> Contat Us Page</a></li>            
          </ul>
        </li>
        <li class="treeview <?php if($page == 'loan_request' || $page == 'invest_request' ) { echo 'menu-open'; }?> ">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Loan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="<?php if($page == 'loan_request' || $page == 'invest_request' || $page == 'loan_payment' ) { echo 'display:block'; }?>">
            <li <?php if($page == 'loan_request') { echo 'class="active"'; }?> ><a href="<?php echo site_url('admin/loan_request');?>"><i class="fa fa-circle-o"></i>Loan Request</a></li>
            <li <?php if($page == 'invest_request') { echo 'class="active"'; }?>><a href="<?php echo site_url('admin/investment_request');?>"><i class="fa fa-circle-o"></i>Investment Request</a></li>
            <li <?php if($page == 'loan_payment') { echo 'class="active"'; }?>><a href="<?php echo site_url('admin/loan_payment');?>"><i class="fa fa-circle-o"></i>Loan Payment</a></li>            
          </ul>
        </li>
         <li <?php if($page == 'payments') { echo 'class="active"'; }?>>
          <a href="<?php echo site_url('payments');?>">
            <i class="fa fa-money"></i> <span>Payments</span>            
          </a>          
        </li>        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>