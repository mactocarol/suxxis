<?php $this->load->view('admin/includes/sidebar'); ?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Partner
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('admin/dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Partner</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">      
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        
         
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
                 
        <section class="col-lg-12 connectedSortable">
                <button class="btn btn-danger"><a href="<?php echo base_url(); ?>admin/ListPartner" style="color:white">Go to Partner List</a></button>&nbsp;
               <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Edit Partner</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <form role="form" id="profile_form_admin" name="" method="post" action="<?php echo base_url().'admin/EditPartner/'.$id; ?>">
                        <!-- text input -->
                        <section class="col-lg-12 connectedSortable">
                             <div class="form-group">
                                <label>First Name <small>(Required)</small></label>
                                <input type="text" class="form-control" name="f_name" placeholder="First Name" value="<?php echo isset($reslt['f_name']) ? $reslt['f_name'] : ''; ?>">
                             </div>
                             <div class="form-group">
                                <label>Last Name <small>(Required)</small></label>
                                <input type="text" class="form-control" name="l_name" placeholder="Last Name" value="<?php echo isset($reslt['l_name']) ? $reslt['l_name'] : ''; ?>">
                             </div>
                             <div class="form-group">
                                <label>Username <small>(Required)</small></label>
                                <input type="text" class="form-control" name="username" placeholder="Username" value="<?php echo isset($reslt['username']) ? $reslt['username'] : ''; ?>">
                             </div>
                             <div class="form-group">
                                <label>Email <small>(Required)</small></label>
                                <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo isset($reslt['email']) ? $reslt['email'] : ''; ?>">
                             </div>
                             <div class="form-group">
                                <label>Password </label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="">
                                <span><small>Default password would be 123456</small></span>
                             </div>
                             <div class="form-group">
                                <label>Confirm Password</label>
                                <input type="password" class="form-control" id="repassword" name="repassword" placeholder="Confirm Password" value="">
                             </div>
                             
                             <hr> <h3>Company Info</h3>
                             <div class="form-group">
                                <label>Company Name </label>
                                <input type="text" class="form-control" name="company_name" placeholder="Company Name" value="<?php echo isset($reslt['company_name']) ? $reslt['company_name'] : ''; ?>">
                             </div>
                             <div class="form-group">
                                <label>VAT Number </label>
                                <input type="text" class="form-control" name="vat_number" placeholder="VAT Number" value="<?php echo isset($reslt['vat_number']) ? $reslt['vat_number'] : ''; ?>">
                             </div>
                             <div class="form-group">
                                <label>Phone Number </label>
                                <input type="text" class="form-control" name="phone_number" placeholder="Phone Number" value="<?php echo isset($reslt['phone_number']) ? $reslt['phone_number'] : ''; ?>">
                             </div>
                             <div class="form-group">
                                <label>Street No.</label>
                                <input type="text" class="form-control" name="street" placeholder="Street No." value="<?php echo isset($reslt['street']) ? $reslt['street'] : ''; ?>">
                             </div>
                             <div class="form-group">
                                <label>Address</label>
                                <textarea class="form-control" name="address" placeholder="Address" value=""><?php echo isset($reslt['c_address']) ? $reslt['c_address'] : ''; ?></textarea>
                             </div>
                             <div class="form-group">
                                <label>Country.</label>
                                <select class="select2 form-control" id="country" data-max-options="3" data-live-search="true" name="country">                                  
                                      <option value="">Select Country</option>
                                      <option <?php echo (isset($reslt['c_country']) && $reslt['c_country'] == 'United Kingdom') ? 'selected' : ''; ?>>United Kingdom</option>
                                      <option <?php echo (isset($reslt['c_country']) && $reslt['c_country'] == 'India') ? 'selected' : ''; ?>>India</option>
                                      <option <?php echo (isset($reslt['c_country']) && $reslt['c_country'] == 'Australia') ? 'selected' : ''; ?>>Australia</option>
                                      <option <?php echo (isset($reslt['c_country']) && $reslt['c_country'] == 'Canada') ? 'selected' : ''; ?>>Canada</option>
                                      <option <?php echo (isset($reslt['c_country']) && $reslt['c_country'] == 'United Kingdom') ? 'selected' : ''; ?>>United Kingdom</option>                                  
                                </select>
                             </div>
                             
                             <div class="form-group">
                                <label>State.</label>
                                <select class="select2 form-control" id="state" data-max-options="3" data-live-search="true" name="state">                                  
                                      <option value="">Select State</option>
                                      <option <?php echo (isset($reslt['c_state']) && $reslt['c_state'] == 'Aveiro') ? 'selected' : ''; ?>>Aveiro</option>
                                      <option <?php echo (isset($reslt['c_state']) && $reslt['c_state'] == 'Azores') ? 'selected' : ''; ?>>Azores</option>
                                      <option <?php echo (isset($reslt['c_state']) && $reslt['c_state'] == 'Beja') ? 'selected' : ''; ?>>Beja</option>
                                      <option <?php echo (isset($reslt['c_state']) && $reslt['c_state'] == 'Braga') ? 'selected' : ''; ?>>Braga</option>
                                      <option <?php echo (isset($reslt['c_state']) && $reslt['c_state'] == 'Braganca') ? 'selected' : ''; ?>>Braganca</option>                                  
                                </select>
                             </div>
                             
                             <div class="form-group">
                                <label>City </label>
                                <input type="text" class="form-control" name="city" placeholder="City" value="<?php echo isset($reslt['c_city']) ? $reslt['c_city'] : ''; ?>">
                             </div>
                             
                             <div class="form-group">
                                <label>Zip Code</label>
                                <input type="text" class="form-control" name="zipcode" placeholder="Zip Code" value="<?php echo isset($reslt['c_zipcode']) ? $reslt['c_zipcode'] : ''; ?>">
                             </div>
                             
                             <div class="box-footer">
                                <input type="submit" class="btn btn-primary" name="Update_profile" value="Update">
                                
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
