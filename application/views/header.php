<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<title> Car Rental</title>
    
	<link rel="icon" href="../../favicon.ico">
	<link href="<?php echo base_url('assets/front');?>/css/font-awesome.min.css" rel="stylesheet">
	<link href="<?php echo base_url('assets/front');?>/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url('assets/front');?>/css/bootstrap-datetimepicker.css" rel="stylesheet">
	<link href="<?php echo base_url('assets/front');?>/css/flexslider.css" type="text/css" rel="stylesheet" media="screen" />
	<link href="<?php echo base_url('assets/front');?>/css/owl.theme.default.min.css" rel="stylesheet">
  <link href="<?php echo base_url('assets/front');?>/css/owl.carousel.min.css" rel="stylesheet">
	<link href="<?php echo base_url('assets/front');?>/css/jquery-ui.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/css/bootstrap-select.min.css" rel="stylesheet">
	
	<!--<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/front');?>/css/bootstrap-select.min.css">-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/front');?>/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/front');?>/css/jquery.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/front');?>/css/responsive.dataTables.min.css">
	
	<link href="<?php echo base_url('assets/front');?>/css/style.css" rel="stylesheet">
	
	<script src="<?php echo base_url('assets/front');?>/js/jquery.min.js"></script>
	<script src="<?php echo base_url('assets/front');?>/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url();?>/assets/js/bootstrapValidator.min.js"></script>
</head>

<body>
	<section class="row info-bar">
	<div class="container">
	    <div class="row">
	        <div class="col-sm-3 col-xs-8 logo-box">
		<a href="index.html" class="logo"><h1>Rent car</h1></a>
	        </div>
	        <div class="col-sm-9 col-xs-4 info-box">
	        <div class="navbar-header">
	    <button type="button" class="navbar-toggle collapsed" data-toggle="slide-collapse" data-target="#main-nav-outer" aria-expanded="false">
	      <span class="sr-only">Toggle navigation</span>
	      <span class="icon-bar"></span>
	      <span class="icon-bar"></span>
	      <span class="icon-bar"></span>
	    </button>
	  </div>
	   <div class="header-informations hidden-xs top-bar">
	      <ul class="social-lists-wSearch nav pull-right">
	        <li><a href="<?php echo site_url('Find-car');?>">Find a Car</a></li>
	          <?php if($this->session->userdata('user_id')){ ?>
					<?php if(isset($result->user_type) && $result->user_type == 2){?>
					<li><a href="<?php echo site_url('Become-partner');?>">Become a Partner</a></li>
					<?php } ?>
			  <?php }else { ?>
					<li><a href="<?php echo site_url('Become-partner');?>">Become a Partner</a></li>
			  <?php } ?>
	          <?php if($this->session->userdata('user_id')) { ?>
						<li><a href="<?php echo site_url('user');?>"><i class="fa fa-lock"></i> My Account</a></li>
						<li><a href="<?php echo site_url('Logout');?>"><i class="fa fa-user-plus" aria-hidden="true"></i> Logout</a></li>
						<?php } else { ?>
						<li><a href="<?php echo site_url('Login');?>"><i class="fa fa-lock"></i> Login</a></li>
						<li><a href="<?php echo site_url('Signup');?>"><i class="fa fa-user-plus" aria-hidden="true"></i> Sign Up</a></li>
						<?php } ?>
	      </ul>
	      </div>
	        </div>
	    </div>
	</div>
	</section>
	<div class="clearfix"></div>
	<section class="tp_info">
	  <div class="container">
	    <div class="row">
	      <div class="col-sm-12">
	        <div class="header-informations top-bar2">
	          <ul class="social-lists-wSearch nav pull-right">
		<li><a href="<?php echo site_url('Find-car');?>">Find a Car</a></li>
		  <?php if($this->session->userdata('user_id')){ ?>
				<?php if($result->user_type == 2){?>
				<li><a href="<?php echo site_url('Become-partner');?>">Become a Partner</a></li>
				<?php } ?>
		  <?php }else { ?>
				<li><a href="<?php echo site_url('Become-partner');?>">Become a Partner</a></li>
		  <?php } ?>
			<?php if($this->session->userdata('user_id')) { ?>
			<li><a href="<?php echo site_url('user');?>"><i class="fa fa-lock"></i> My Account</a></li>
		  <li><a href="<?php echo site_url('Logout');?>"><i class="fa fa-user-plus" aria-hidden="true"></i> Logout</a></li>
			<?php } else { ?>
		  <li><a href="<?php echo site_url('Login');?>"><i class="fa fa-lock"></i> Login</a></li>
		  <li><a href="<?php echo site_url('Signup');?>"><i class="fa fa-user-plus" aria-hidden="true"></i> Sign Up</a></li>
			<?php } ?>
	          </ul>
	          </div>
	      </div>
	    </div>
	  </div>
	</section> 
	<nav class="navbar navbar-default main-navigation navbar-static-top" id="main-nav-outer">
	<div class="container">
	    
	    <!-- Collect the nav links, forms, and other content for toggling -->
	     
	    <div class="navbar-collapse collapse" id="main-nav">				
	        <ul class="nav navbar-nav">
						<li class="<?php echo ($page_link == 'Home') ? 'active' : ''; ?>"><a href="<?php echo site_url('Home');?>">home </a></li>
						<li class="<?php echo ($page_link == 'About-us') ? 'active' : ''; ?>"><a href="<?php echo site_url('About-us');?>">about</a></li>
						<li class="<?php echo ($page_link == 'Services') ? 'active' : ''; ?>"><a href="<?php echo site_url('Services');?>">services</a></li>
						<li class="<?php echo ($page_link == 'Support') ? 'active' : ''; ?>"><a href="<?php echo site_url('Support');?>">support</a></li>
						<li class="<?php echo ($page_link == 'Contact-us') ? 'active' : ''; ?>"><a href="<?php echo site_url('Contact-us');?>">contact</a></li>
		
	        </ul>           
	    </div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
	</nav>