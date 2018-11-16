<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>User Panel</title>

         <!-- Bootstrap CSS CDN -->
         <link href="<?php echo base_url('theme');?>/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo base_url('theme');?>/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url('theme');?>/css/jquery-ui.css">
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="<?php echo base_url('theme');?>/css/style.css">
        <style>
		body{ background:url(<?php echo base_url('theme');?>/images/login-bg.jpg); background-size:cover}
		.overlay_panel{ background:rgba(2,36,71,0.9); position:absolute; width:100%; height:100%;}
		.input-text-login {
    width: 100%;
    height: 40px;
    padding: 10px 10px 10px 30px;border-radius: 3px;
    border: 1px solid #eee;
}
.login_panel {
    background: #fff;
    padding: 20px;
    width: 500px;
    position: absolute;
    right: 0;
    left: 0;
    margin: 0 auto;
    top: 50%;
    transform: translateY(-50%);
    border-top: 5px solid #FBDB06;
}
.login_panel input[type=submit]{ width:100%; background:#FBDB06; color:#000; border:none; padding:10px; text-transform:uppercase; margin:0 0 15px;border-radius: 3px;}
.login_panel a{ display:inline-block; margin:0 0 10px;}
.form-group {
    position: relative;
}
.form-group i {
    position: absolute;
    left: 10px;
    top: 10px;
}
.logo-login img {

    width: 160px;
    display: block;

}
.select_outer select {

    border: none;
    height: 38px;
    width: 107%;
    color: #b0b0b0;
    text-transform: capitalize;
    background: #fff;
}
.select_outer {

    border: 1px solid #eee;
    height: 40px;
    overflow: hidden;
    width: 100%;
    padding-left: 25px;

}

.form-group i.form-control-feedback { right: 0; left: auto; top: 4px; }
.help-block{text-align: right; }

		</style>
    </head>
    <body>
    	
        <div class="overlay_panel">
        	<div class="login_panel">
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
            		<div class="logo-login text-center"><a href="<?php echo site_url('Home');?>"><img src="<?php echo base_url('theme');?>/images/footer-logo.jpg"></a></div>
                    <?php if(!empty($referal)) { echo "You are invited by ".ucwords($referal->username); }?><br><br>
            		<form method="post" id="registration" action="<?php echo site_url('user/user_register'); ?>">
                    	<div class="col-md-12"><div class="form-group"><input type="text" name="username" placeholder="Username" class="input-text-login"> <i class="fa fa-user"></i></div></div>
                        <div class="col-md-6"><div class="form-group"><input type="text" placeholder="First Name" name="f_name" class="input-text-login"> <i class="fa fa-user"></i></div></div>
                        <div class="col-md-6"><div class="form-group"><input type="text" placeholder="Last Name" name="l_name" class="input-text-login"> <i class="fa fa-user"></i></div></div>
                        <div class="col-md-12">
                            <div class="form-group">                          
                                <strong>Gender :</strong>
                                <span>Female <input type="radio" name="gender" value="Female"></span>
                                <span > Male <input type="radio" name="gender" value="Male"></span>
                            </div>
                        </div>
                          
                        <div class="col-md-12">
                            <div class="form-group"><input type="text" name="dob" id="datepicker" placeholder="Date Of Birth" class="input-text-login"> <i class="fa fa-calendar"></i></div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="select_outer">
                                     <select name="country">
                                         <option value="">Select Country</option>
                                         <?php foreach($countries as $c):?>
                                         <option value="<?=$c['name']?>"><?=$c['name']?></option>
                                         <?php endforeach;?>                                         
                                    </select>
                                </div>
                                <i class="fa fa-map-marker"></i>
                            </div>
                        </div>
                        <div class="col-md-12"><div class="form-group"><input type="email" placeholder="Email" name="email" class="input-text-login"> <i class="fa fa-envelope"></i></div></div>
                        <div class="col-md-12"><div class="form-group"><input type="password" name="password" placeholder="Password" class="input-text-login"> <i class="fa fa-key"></i></div></div>
                        <div class="col-md-12"><div class="form-group"><input type="password" name="repassword" placeholder="Confirm Password" class="input-text-login"> <i class="fa fa-check"></i></div></div>
                        <input type="hidden" name="parent" value="<?php if(!empty($referal)) { echo $referal->referal_link; }?>">
                        
                        <input type="submit" value="Sign UP">
                    </form>
                    <div class="col-md-12 text-center"><a href="<?php echo site_url('user');?>" class="txt1">Sign In</a> </div>
                     
                     
                     
            </div>
        </div>
    
    </body>
</html>


<!-- jQuery 3 -->
<script src="<?php echo base_url();?>/assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>/assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url();?>/assets/js/bootstrapValidator.min.js"></script>
<script src="<?php echo base_url();?>/assets/plugins/iCheck/icheck.min.js"></script>
<!--<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>-->


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
            f_name: {
                validators: {
                    notEmpty: {
                        message: 'The First name is required.'
                    },
                }
            },
			l_name: {
                validators: {
                    notEmpty: {
                        message: 'The Last name is required.'
                    },
                }
            },
            gender: {
                validators: {
                    notEmpty: {
                        message: 'The Gender is required.'
                    },
                }
            },
            dob: {
                validators: {
                    notEmpty: {
                        message: 'The Date of Birth is required.'
                    },
                }
            },
            country: {
                validators: {
                    notEmpty: {
                        message: 'The Country is required.'
                    },
                }
            },
            mobile: {
                validators: {
                    notEmpty: {
                        message: 'The Mobile number required.'
                    },
                    stringLength: {
                        min:10 ,
                        max:10,
                        message: 'The mobile no must be  10 digit'
                    }
                }
            },
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
			repassword: {
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

  <!--<script src="<?php echo base_url('theme');?>/js/jquery.min.js"></script>-->
  <script src="<?php echo base_url('theme');?>/js/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker({
      changeMonth: true,
      changeYear: true
    });
  } );
  </script>
