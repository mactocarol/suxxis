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
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="<?php echo base_url('theme');?>/css/style.css">
        <style>
		body{ background:url(theme/images/login-bg.jpg); background-size:cover}
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
    width: 400px;
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
.social_icon_login a.facebook {
    background: #3B5998;
}
.social_icon_login a {
    background: #000;
    color: #fff;
    text-transform: capitalize;
    font-size: 14px;
    padding: 10px;
    margin: 0 5px;
    display: inline-block;
    border-radius: 3px;
}
.social_icon_login a.twitter {
    background: #1DA1F2;
}
.social_icon_login a.google {
    background: #DD4B39;
}
.social_icon_login a i {
    margin-right: 5px;
}
.login_panel h3 {
    text-align: center;
    font-size: 14px;
    font-weight: 600;
    margin: 10px 0 15px;
    float: left;
    width: 100%;
    font-family: 'Poppins', sans-serif;
    border-top: 1px solid #eee;
    padding-top: 20px;
}
.social_icon_login {
    float: left;
    width: 100%;
    text-align: center;
}

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
            		<form method="post" action="<?php echo site_url('forgot/reset_link'); ?>">
                    	<div class="form-group"><input type="text" placeholder="Email" name="email" class="input-text-login"> <i class="fa fa-user"></i></div>                        
                        <input type="submit" value="Send Link">
                    </form>
                    <div class="col-md-12 text-center"><a href="<?php echo site_url('user');?>" class="txt1">Signin</a> </div>
                     <div class="col-md-12 text-center">
                    <a class="txt1" href="<?php echo site_url('user/user_register');?>">Create new account<i class="fa fa-long-arrow-right"></i>		</a></div>
                    
                    <!--<h3>or login with</h3>
                    <div class="social_icon_login"><a href="#" class="facebook"><i class="fa fa-facebook"> </i> facebook</a>
                        <a href="#" class="twitter"><i class="fa fa-twitter"> </i> twitter</a>
                        <a href="#" class="google"><i class="fa fa-google-plus"> </i> google</a></div>-->
            </div>
        </div>
    
    </body>
</html>
