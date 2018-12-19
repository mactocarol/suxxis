<section class="row page-cover">
        <div class="container">
            <h2 class="h1 page-title">Profile</h2>
            <ol class="breadcrumb">
                <li><a href="index.html">home</a></li>
                <li class="active">Profile Setting</li>
            </ol>
        </div>
    </section>

    <section class="info dash">
         <div class="container">
            <div class="bx_shdo">
               <div class="row">
                  <div class="col-md-4">
                       <?php echo $this->load->view('sidebar'); ?>   
                </div>
                  <!--end of col -->
                  <div class="col-md-8">
					<?php
					// display error & success messages
					if(isset($message)) {					
						if($success){
						?>
						  <div class="alert alert-dismissible alert-success">
							<button type="button" class="close" data-dismiss="alert">&times;</button>
							<strong>Success!</strong> <?php print_r($message); ?>
						  </div>						
						<?php
						}else{
						?>
							<div class="alert alert-dismissible alert-danger">
								<button type="button" class="close" data-dismiss="alert">&times;</button>
								<strong>Error!</strong> <?php print_r($message); ?>
							</div>						
						<?php
						}
					}
					?>
					<form method="post" id="registration" name="registration" action="<?php echo site_url('Update-profile'); ?>" enctype="multipart/form-data">
                     <div class="credit">
                        <h4><span>Profile</span> Setting</h4>
                     </div>
                     <div class="img_upload">
                        <div class="row">
                           <div class="col-md-12">
                              <div class="small-12 medium-2 large-2 columns">
                                 <div class="circle">
                                    <!-- User Profile Image -->
                                    <img class="profile-pic" src="<?php echo base_url('upload/profile_image/'.$result->image);?>" class="img-responsive">
                                    <div class="p-image">
                                       <button type="button" class="verfy upload-button">Change Photo</button>
                                       <input class="file-upload" name="profile_pic" type="file" accept="image/*"/>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="dash_dtl_frm">
                        
                           <div class="row">
                              <div class="col-md-12">
                                 <label for="email">Your Full Name</label>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <input type="text" class="form-control" id="f_name" placeholder="First Name" name="f_name" value="<?php echo ($result->f_name) ? $result->f_name : ''; ?>">
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <input type="text" class="form-control" id="l_name" placeholder="Last Name" name="l_name" value="<?php echo ($result->l_name) ? $result->l_name : ''; ?>">
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-12">
                                 <label for="email">Company Name</label>
                                 <div class="form-group">
                                    <input type="text" class="form-control" id="companyname" placeholder="Enter Company Name" name="companyname" value="<?php echo ($result->companyname) ? $result->companyname : ''; ?>">
                                 </div>
                                 <p>If applicable and you are representing an organization</p>
                                 <div class="notify">
                                    <div class="chiller_cb">
                                       <input id="myCheckbox" type="checkbox" >
                                       <label for="myCheckbox">
                                          Are you VAT registered<!--  -->
                                       </label>
                                       <span></span>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-12">
                                 <label for="email">Password</label>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <input type="password" class="form-control" id="password" placeholder="Enter Password" name="password">
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <input type="password" class="form-control" id="cpassword" placeholder="Re Enter Password" name="cpassword">
                                 </div>
                              </div>
                              <div class="col-md-12">
                                 <p>Please Enter a new password in botyh fields if you wish to change your Password.Password Should be miin. 8 characters.</p>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-12">
                                 <label for="email">Date Of Birth</label>
                                 <div class="form-group">
                                    <input type="text" class="form-control" id="dob" placeholder="Enter Date of Birth" name="dob" value="<?php echo ($result->dob) ? $result->dob : ''; ?>">
                                 </div>
                              </div>
                           </div>
                           <div class="dtl-Sec">
                             <div class="credit">
                                <h4><span>Contact</span> Details (Private)</h4>
                             </div>
                             <div class="row">
                              <div class="col-md-12">
                                 <label for="email">Personal Website</label>
                                 <div class="form-group">
                                    <input type="text" class="form-control" id="website" placeholder="Enter Personal Website" name="website" value="<?php echo ($result->website) ? $result->website : ''; ?>">
                                 </div>
                              </div>
                              </div>
                              <div class="row">
                              <div class="col-md-12">
                                 <label for="email">Your Email</label>
                                 <div class="form-group">
                                    <input type="email" class="form-control" id="name" placeholder="Enter Email" name="email" value="<?php echo ($result->email) ? $result->email : ''; ?>">
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-12">
                                 <label for="email">Phone</label>
                                 <div class="form-group">
                                    <input type="text" class="form-control" id="phone" placeholder="Enter Phone" name="phone" value="<?php echo ($result->phone) ? $result->phone : ''; ?>">
                                 </div>
                              </div>
                           </div>
                         </div>
                         <div class="dtl-Sec">
                             <div class="credit">
                                <h4><span>Home</span> Address (Private)</h4>
                             </div>
                             <div class="row">
                              <div class="col-md-12">
                                 <label for="email">Country</label>
                                 <div class="form-group">
                               <div class="select">
                                <select class="selectpicker" data-style="btn-info custom" name="country" data-max-options="3" data-live-search="true">
                                  <optgroup label="Web">
                                      <option value="">Select Country</option>
                                      <option>United Kingdom</option>
                                      <option>India</option>
                                      <option>Australia</option>
                                      <option>Canada</option>
                                      <option>United Kingdom</option>
                                  </optgroup>
                                </select>
                              </div>
                            </div>
                              </div>
                              </div>
                              <div class="row">
                                <div class="col-md-4">
                                  <label for="email">House Name/No.</label>
                                 <div class="form-group">
                                    <input type="text" class="form-control" id="h_no" placeholder="House Name/No." name="h_no" value="<?php echo ($result->h_no) ? $result->h_no : ''; ?>">
                                 </div>
                                </div>
                                <div class="col-md-8">
                                  <label for="email">Street Address</label>
                                 <div class="form-group">
                                    <input type="text" class="form-control" id="address" placeholder="Street Address" name="address" value="<?php echo ($result->address) ? $result->address : ''; ?>">
                                 </div>
                                </div>
                                 </div>
                                 <div class="row">
                                <div class="col-md-4">
                                  <label for="email">City</label>
                                 <div class="form-group">
                                    <input type="text" class="form-control" id="city" placeholder="City" name="city" value="<?php echo ($result->city) ? $result->city : ''; ?>">
                                 </div>
                                </div>
                                <div class="col-md-4">
                                  <label for="email">Country/State</label>
                                 <div class="form-group">
                                    <input type="text" class="form-control" id="state" placeholder="Country/State" name="state" value="<?php echo ($result->state) ? $result->state : ''; ?>">
                                 </div>
                                </div>
                                <div class="col-md-4">
                                  <label for="email">Postal Code</label>
                                 <div class="form-group">
                                    <input type="text" class="form-control" id="zipcode" placeholder="Postal Code" name="zipcode" value="<?php echo ($result->zipcode) ? $result->zipcode : ''; ?>">
                                 </div>
                                </div>
                                 </div>
                             </div>
                             <div class="dtl-Sec">
                             <div class="credit">
                                <h4><span>Additional</span> Information (Private)</h4>
                             </div>
                             <div class="row">
                              <div class="col-md-4">
                                 <label for="email">Time Zone</label>
                                 <div class="form-group">
                             <div class="select">
                                <select name="timezone" id="slct">
                                  <option>Select Time-Zone</option>
                                  <option value="1">24 Hours</option>
                                  <option value="2">12 Hours</option>
                                </select>
                              </div>
                            </div>
                              </div>
                              <div class="col-md-4">
                                 <label for="email">Select Gender</label>
                                 <div class="form-group">
                             <div class="select">
                                <select name="gender" id="slct">
                                  <option>Select Gender</option>
                                  <option value="1">Male</option>
                                  <option value="2">Female</option>
                                  <option value="3">Both</option>
                                </select>
                              </div>
                            </div>
                              </div>
                              <div class="col-md-4">
                                 <label for="email">Occupation</label>
                                 <div class="form-group">
                             <div class="select">
                                <select name="occupation" id="slct">
                                  <option>Select Occupation</option>
                                  <option value="1">Work</option>
                                  <option value="2">Work</option>
                                  <option value="3">Work</option>
                                </select>
                              </div>
                            </div>
                              </div>
                              </div>
                             </div>
                             <div class="dtl-Sec">
                             <div class="credit">
                                <h4><span>Social Media</span> Connections (Private)</h4>
                             </div>
                             <div class="dash_sbt">
                                <button type="button" class="verfy Fb <?php echo ($result->password == '') ? 'active': '';?>"><i class="fa fa-facebook " aria-hidden="true"></i>Connect with Facebook</button>
                                <button type="button" class="verfy Tw"><i class="fa fa-twitter" aria-hidden="true"></i> Connect with Twitter</button>
                              </div>
                             </div>
                             <div class="row">
                              <div class="col-md-12">
                                 <div class="dash_sbt sec Dash_brd_sbt">
                                    <button type="submit" class="verfy">Update</button>
                                    <button type="button" class="cnsl">Deactivate Your Account</button>
                                 </div>
                              </div>
                           </div>
                        </div>
					 </form>
                  </div>
               </div>
            </div>
         </div>
      </section>
	
	
	<script src="<?php echo base_url();?>/assets/js/bootstrapValidator.min.js"></script>
 <script>
    $(document).ready(function() {
	//alert('http://localhost/caroldata.com/hmvc_hotel_booking/registration/register_email_exists');
    $('#registration').bootstrapValidator({
        //container: '#messages',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {            
            username: {
                validators: {
					notEmpty: {
						message : 'The username Field is required.'
					},
					 remote: {  
					 type: 'POST',
					 url: "<?php echo site_url();?>user/check_username_exists1",
					 data: function(validator) {
						 return {
							 //email: $('#email').val()
							 email: validator.getFieldElements('username').val()
							 };
						},
					 message: 'This username is already in use.'     
					 }
				},
			},
			email: {
                validators: {
					notEmpty: {
						message : 'The email Field is required.'
					},
					 remote: {  
					 type: 'POST',
					 url: "<?php echo site_url();?>user/check_email_exists1",
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
			cpassword: {
				validators: {
										
					identical: {
                        field: 'password',
                        message: 'The password and its confirm are not the same'
                    }
					
				}
			},
        }
    });

});
</script>