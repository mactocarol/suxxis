<?php $this->load->view('admin/includes/sidebar'); ?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add User
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('admin/dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add user</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">      
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-7 connectedSortable">
         
			<?php
			if($this->session->flashdata('item')) {
				$items = $this->session->flashdata('item');
				if($items->success){
				?>
					<div class="alert alert-success" id="alert">
							<strong>Success!</strong> <?php print_r($items->message); ?>
					</div>
				<?php
				}else{
				?>
					<div class="alert alert-danger" id="alert">
							<strong>Error!</strong> <?php print_r($items->message); ?>
					</div>
				<?php
				}
			}
			?>
        </section>            
        <section class="col-lg-12 connectedSortable">
               <button class="btn btn-danger"><a href="<?php echo base_url(); ?>admin/lists" style="color:white">Go to User List</a></button>&nbsp; 
               <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Add User</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <form role="form" id="profile_form" name="" method="post" action="<?php echo base_url().'admin/add'; ?>">
                        <!-- text input -->
                        <section class="col-lg-12 connectedSortable">
                             <div class="form-group">
                                <label>First Name </label>
                                <input type="text" class="form-control" name="f_name" placeholder="First Name" value="">
                             </div>
                             <div class="form-group">
                                <label>Last Name </label>
                                <input type="text" class="form-control" name="l_name" placeholder="Last Name" value="">
                             </div>
                             <div class="form-group">
                                <label>Username </label>
                                <input type="text" class="form-control" name="username" placeholder="Username" value="">
                             </div>
                             <div class="form-group">
                                <label>Email </label>
                                <input type="email" class="form-control" name="email" placeholder="Email" value="">
                             </div>
                             <div class="form-group">
                                <label>Password </label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="">
                             </div>
                             <div class="form-group">
                                <label>Confirm Password</label>
                                <input type="password" class="form-control" id="repassword" name="repassword" placeholder="Confirm Password" value="">
                             </div>
                             
                             <div class="box-footer">
                                <input type="submit" class="btn btn-primary" name="Update_profile" value="Add">
                                
                             </div>
                           </section>
                        
                  </form>
                </div>
               </div>
        </section>
        <!-- /.Left col -->
   
    </div>

    </section>
    <!-- /.content -->
  </div>
