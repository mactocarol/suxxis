<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url(); ?>upload/profile_image/<?=$result->image?>" class="img-circle" alt="User Image">
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
        
        <li class="treeview <?php if($page == 'add_partner' || $page == 'list_partner' ) { echo 'menu-open'; }?> ">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Partners</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="<?php if($page == 'add_partner' || $page == 'list_partner' ) { echo 'display:block'; }?>">
            <li <?php if($page == 'add_partner') { echo 'class="active"'; }?> ><a href="<?php echo site_url('admin/AddPartner');?>"><i class="fa fa-circle-o"></i> Add Partner</a></li>
            <li <?php if($page == 'list_partner') { echo 'class="active"'; }?>><a href="<?php echo site_url('admin/ListPartner');?>"><i class="fa fa-circle-o"></i> List Partners</a></li>            
          </ul>
        </li>
        
        <li class="treeview <?php if($page == 'add_cars' || $page == 'list_cars' ) { echo 'menu-open'; }?> ">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Cars</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="<?php if($page == 'add_cars' || $page == 'list_cars' ) { echo 'display:block'; }?>">
            <li <?php if($page == 'add_cars') { echo 'class="active"'; }?> ><a href="<?php echo site_url('cars/add');?>"><i class="fa fa-circle-o"></i> Add Car</a></li>
            <li <?php if($page == 'list_cars') { echo 'class="active"'; }?>><a href="<?php echo site_url('cars');?>"><i class="fa fa-circle-o"></i> List Cars</a></li>            
          </ul>
        </li>
        
        <li class="treeview <?php if($page == 'add_partner' || $page == 'list_bookings' ) { echo 'menu-open'; }?> ">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Bookings</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="<?php if($page == 'add_partner' || $page == 'list_bookings' ) { echo 'display:block'; }?>">            
            <li <?php if($page == 'list_partner') { echo 'class="active"'; }?>><a href="<?php echo site_url('bookings');?>"><i class="fa fa-circle-o"></i> Bookings</a></li>            
          </ul>
        </li>
        <!--<li class="treeview <?php if($page == 'add_news' || $page == 'list_news' ) { echo 'menu-open'; }?> ">
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
        </li>-->
        
        
         <!--<li <?php if($page == 'payments') { echo 'class="active"'; }?>>
          <a href="<?php echo site_url('payments');?>">
            <i class="fa fa-money"></i> <span>Payments</span>            
          </a>          
        </li>        -->
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>