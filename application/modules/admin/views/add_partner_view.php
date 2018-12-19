<?php $this->load->view('admin/includes/sidebar'); ?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Partner
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('admin/dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Partner</li>
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
                  <h3 class="box-title">Add Partner</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <form role="form" id="partner_form" name="" method="post" action="<?php echo base_url().'admin/AddPartner'; ?>">
                        <!-- text input -->
                        <section class="col-lg-12 connectedSortable">
                             <div class="form-group">
                                <label>First Name <small>(Required)</small></label>
                                <input type="text" class="form-control" name="f_name" placeholder="First Name" value="">
                             </div>
                             <div class="form-group">
                                <label>Last Name <small>(Required)</small></label>
                                <input type="text" class="form-control" name="l_name" placeholder="Last Name" value="">
                             </div>
                             <div class="form-group">
                                <label>Username <small>(Required)</small></label>
                                <input type="text" class="form-control" name="username" placeholder="Username" value="">
                             </div>
                             <div class="form-group">
                                <label>Email <small>(Required)</small></label>
                                <input type="email" class="form-control" name="email" placeholder="Email" value="">
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
                                <input type="text" class="form-control" name="company_name" placeholder="Company Name" value="">
                             </div>
                             <div class="form-group">
                                <label>VAT Number </label>
                                <input type="text" class="form-control" name="vat_number" placeholder="VAT Number" value="">
                             </div>
                             <div class="form-group">
                                <label>Phone Number </label>
                                <input type="text" class="form-control" name="phone_number" placeholder="Phone Number" value="">
                             </div>
                             <div class="form-group">
                                <label>Street No.</label>
                                <input type="text" class="form-control" name="street" placeholder="Street No." value="">
                             </div>
                             <div class="form-group">
                                <label>Address</label>
                                <textarea class="form-control" name="address" placeholder="Address" value=""></textarea>
                             </div>
                             <div class="form-group">
                                <label>Country.</label>
                                <select class="select2 form-control" id="country" data-max-options="3" data-live-search="true" name="country">
                                  <optgroup label="Web">
                                      <option value="">Select Country</option>
                                      <option <?php echo (isset($companyinfo->country) && $companyinfo->country == 'United Kingdom') ? 'selected' : ''; ?>>United Kingdom</option>
                                      <option <?php echo (isset($companyinfo->country) && $companyinfo->country == 'India') ? 'selected' : ''; ?>>India</option>
                                      <option <?php echo (isset($companyinfo->country) && $companyinfo->country == 'Australia') ? 'selected' : ''; ?>>Australia</option>
                                      <option <?php echo (isset($companyinfo->country) && $companyinfo->country == 'Canada') ? 'selected' : ''; ?>>Canada</option>
                                      <option <?php echo (isset($companyinfo->country) && $companyinfo->country == 'United Kingdom') ? 'selected' : ''; ?>>United Kingdom</option>
                                  </optgroup>
                                </select>
                             </div>
                             
                             <div class="form-group">
                                <label>State.</label>
                                <select class="select2 form-control" id="state" data-max-options="3" data-live-search="true" name="state">
                                  <optgroup label="Web">
                                      <option value="">Select State</option>
                                      <option <?php echo (isset($companyinfo->state) && $companyinfo->state == 'United Kingdom') ? 'selected' : ''; ?>>United Kingdom</option>
                                      <option <?php echo (isset($companyinfo->state) && $companyinfo->state == 'India') ? 'selected' : ''; ?>>India</option>
                                      <option <?php echo (isset($companyinfo->state) && $companyinfo->state == 'Australia') ? 'selected' : ''; ?>>Australia</option>
                                      <option <?php echo (isset($companyinfo->state) && $companyinfo->state == 'Canada') ? 'selected' : ''; ?>>Canada</option>
                                      <option <?php echo (isset($companyinfo->state) && $companyinfo->state == 'United Kingdom') ? 'selected' : ''; ?>>United Kingdom</option>
                                  </optgroup>
                                </select>
                             </div>
                             
                             <div class="form-group">
                                <label>City </label>
                                <input type="text" class="form-control" name="city" placeholder="City" value="">
                             </div>
                             
                             <div class="form-group">
                                <label>Zip Code</label>
                                <input type="text" class="form-control" name="zipcode" placeholder="Zip Code" value="">
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
    <script>
        $('#partner_form').bootstrapValidator({
            //container: '#messages',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                f_name: {
                    validators: {
                        notEmpty: {
                            message: 'The First name is required and cannot be empty'
                        },
                    }
                },
                l_name: {
                    validators: {
                        notEmpty: {
                            message: 'The Last name is required and cannot be empty'
                        },
                    }
                },
                username: {
                    validators: {
                        notEmpty: {
                            message: 'The Last name is required and cannot be empty'
                        },
                    }
                },           
                email: {
                    validators: {
                        notEmpty: {
                            message : 'The email Field is required and cannot be empty '
                        },
                         remote: {  
                         type: 'POST',
                         url: "<?php echo site_url();?>user/check_email_exists",
                         data: function(validator) {
                             return {
                                 //email: $('#email').val()
                                 email: validator.getFieldElements('email').val()
                                 };
                            },
                         message: 'This email is already in use.'     
                         }
                    },
                },    
                
                password: {
                    validators: {					
                        identical: {
                            field: 'con_pass',
                            message: 'The password and its confirm are not the same'
                        },
                        stringLength: {
                            min: 6 ,
                            max: 15,
                            message: 'The password length min 6 and max 15 character Long'
                        }
                    }
                },
                repassword: {
                    validators: {					
                        identical: {
                            field: 'password',
                            message: 'The password and its confirm are not the same'
                        }
                        
                    }
                },
            }
        });
    </script>