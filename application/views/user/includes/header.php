<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
            <title>SUXXIS | <?=$title?></title>
    
             <!-- Bootstrap CSS CDN -->
             <link href="<?php echo base_url('theme');?>/css/font-awesome.min.css" rel="stylesheet">
            <link rel="stylesheet" href="<?php echo base_url('theme');?>/css/bootstrap.min.css">
            <link rel="stylesheet" href="<?php echo base_url('theme');?>/css/jquery-ui.css">
            <!-- Our Custom CSS -->
            <link rel="stylesheet" href="<?php echo base_url('theme');?>/css/jquery.dataTables.min.css">
            <link rel="stylesheet" href="<?php echo base_url('theme');?>/css/style.css">
            <link rel="stylesheet" href="<?php echo base_url('theme');?>/css/liMarquee.css">
        </head>
        <body>
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="container-fluid">
                    
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#menu-toggle" id="menu-toggle"><span class="glyphicon glyphicon-list" aria-hidden="true"></span></a>
                        
                        <a href="#" class="logo"><img src="<?php echo base_url('theme');?>/images/Suxxis-Logo.png"></a>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        <?php $latest_payment = get_latest_payments(); //echo "<pre>"; //print_r($latest_payment);?>
                        <div class="marquee_outer">
        	<div class="str9 mWrap">
              <?php foreach($latest_payment as $latest){?>  
                    <div class="textItem">
                    <img src="<?php echo base_url('theme');?>/images/user.png" class="payment-avatar" alt=""><?=$latest->username?> - <?=date('d M h:i',strtotime($latest->created_at))?>            <span>(<?=$latest->amount?> xvg)</span>
                    </div>
                <?php } ?>                
</div>
        </div>
                        <ul class="nav navbar-nav navbar-right">
                            <?php
                                $noti = get_notifications($this->session->userdata('user_id'));
                                //print_r($noti); 
                            ?>                           
                            <li class="dropdown">
                                <a href="#" class="" data-toggle="dropdown"><i class="fa fa-bell"><?php if($noti) { echo '<font color="red" size="1">new</font>'; }?></i></a>                    
                                <ul class="dropdown-menu">
                                    <?php foreach($noti as $n){?>
                                    <li><a href="<?php echo site_url('user/update_notification/'.$n->id);?>"><?=$n->text?></a></li>
                                    <?php } ?>
                                </ul>
                            </li>
                            <li class="user-profile">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <div class="user_img"><img src="<?php echo base_url(); ?>upload/profile_image/thumb/<?=$result->image?>" class="user-image" alt="User Image">
                                        <span>Hi, <?php print_r($this->session->userdata('email'));?></span>
                                    </div>
                                </a>
                                
                                <ul class="dropdown-menu">
                                    <li><a href="<?php echo site_url('user/update_profile');?>">Profile</a></li>
                                    <li><a href="<?php echo site_url('user/logout'); ?>">Logout</a></li>
                                    <!--<li><a href="#">CSS</a></li>
                                    <li><a href="#">JavaScript</a></li>-->
                                </ul>
                            
                            </li>
                        </ul>
                        
                    </div>
                </div>
            </nav>