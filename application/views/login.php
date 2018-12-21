<section class="row page-cover">
  		<div class="container">
  			<h2 class="h1 page-title"><?=$page_heading?></h2>
  			<ol class="breadcrumb">
  				<li><a href="<?php echo site_url('Home');?>">home</a></li>
  				<li class="active"><?=$page_link?></li>
  			</ol>
  		</div>
  	</section>
    
<section class="login">
      <div class="container">
        <div class="row">
          <div class="login-wrapper">
          <div class="col-md-5">
            <div class="sign_in_frm">
              
            <div class="Feat_head wow fadeInDown" style="visibility: visible; animation-name: fadeInDown;">
              <h2><span>Login </span>Now</h2>
              <h6>Login to our website</h6>
            </div>
            <div class="fb_login">
              <div class="fb_icon"><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></div>
              <div class="fb_txt"><a href="<?php echo site_url();?>/login-with.php?provider=Facebook">Login with Facebook</a></div>
            </div>
            <div class="Sign_in text-center">
              <span>or sign in</span>
            </div>
            <div class="frm_Fields">
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
			
			<form method="post" action="<?php echo site_url('user/login_check'); ?>">
              <div class="form-group">
                <input type="text" class="form-control" id="email" placeholder="Email" name="email">
              </div>
              <div class="form-group">
                <input type="password" class="form-control" id="password" placeholder="Password" name="password">
              </div>
	      <input type="hidden" class="form-control" name="return_uri" value="<?php echo isset($return_uri) ? $return_uri : ''; ?>">	      
              <button type="submit" class="btn btn-default">Login-Now</button>
			  </form>	
              <div class="forgot text-right">
              <a href="forgetpassword.html">Forgot Password?</a>
            </div>
            </div>
          
          </div>
          </div>
          <div class="col-md-2 bdr-pos">
            <div class="bdr">
              <span>OR</span>
            </div>
          </div>
          <div class="col-md-5">
          <div class="sign_in_frm_rgt">
              
            <div class="Feat_head wow fadeInDown" style="visibility: visible; animation-name: fadeInDown;">
              <h2><span>Register </span>Now</h2>
              <h6>Required information for account creation</h6>
            </div>
			<?php
			//print_r($this->session->userdata('partnerdata'));
			// display error & success messages
			if(isset($messages)) {					
				if($success){
				?>
				  <div class="alert alert-dismissible alert-success">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Success!</strong> <?php print_r($messages); ?>
				  </div>						
				<?php
				}else{
				?>
					<div class="alert alert-dismissible alert-danger">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>Error!</strong> <?php print_r($messages); ?>
					</div>						
				<?php
				}
			}
			?>
		<form method="post" id="registration"  name="registration" action="<?php echo site_url('Signup'); ?>">
            <div class="frm_Fields">
              <div class="form-group">
                <input type="text" class="form-control" id="name" placeholder="User Name" name="username">
              </div>
              <div class="form-group">
                <input type="password" class="form-control" id="password" placeholder="Password" name="password">
              </div>
              <div class="form-group">
                <input type="password" class="form-control" id="cnfrm_pass" placeholder="Confirm Password" name="cpassword">
              </div>
              <div class="form-group">
                <input type="email" class="form-control" id="email" placeholder="Email Address" name="email">
              </div>
	      
	      <div class="form-group">
                Signup as User <input type="radio" class="" id="usertype" placeholder="" name="usertype" value="2" <?php if(!$this->session->userdata('partnerdata')){ echo 'checked'; } ?>>
		Signup as Partner <input type="radio" class="" id="usertype" placeholder="" name="usertype" value="3" <?php if($this->session->userdata('partnerdata')){ echo 'checked'; } ?>>
              </div>
	      
               <button type="submit" class="btn btn-default">Sign up Now</button>
            </div>
          </form>
        </div>
        </div>
      </div>
      </div>
    </div>
    </section>
 <section class="add-banner">
 	<div class="container">
    	<div class="col-md-6">
        	<div class="r-sub-banner-in r-sub-dark">
                <span>BLACK CARS DISCOUNT 50%</span>
                <h4>Special Offers For <br><b>Black Friday.</b></h4>
              </div>
        </div>
        <div class="col-md-6">
        	<div class="r-sub-banner-in r-sub-accent">
                <span>MONTHLY SPECIAL OFFER</span>
                <h4>Rent 3 Days &amp; Get <br><b>Free Insurance.</b></h4>
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
					 url: "<?php echo site_url();?>user/check_username_exists",
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
					notEmpty: {
						message : 'The Password Field is required.'
					},
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
					
					notEmpty: {
						message : 'The confirm Password Field is required and cannot be empty '
					},
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