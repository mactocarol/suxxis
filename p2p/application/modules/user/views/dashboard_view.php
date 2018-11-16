<div id="wrapper" class="toggled">
    <div class="container-fluid">
        <!-- Sidebar -->
        <?php $this->load->view('user/includes/sidebar');?> 
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="breadcum_outer">
                              <ul>
                                  <li><a href="#">Home</a></li>
                                  <li>Dashboard</li>
                              </ul>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <?php
                                    if($this->session->flashdata('item')) {
                                        $items = $this->session->flashdata('item');
                                        if($items->success){
                                        ?>
                                            <div class="alert alert-success">
                                                    <strong>Success!</strong> <?php print_r($items->message); ?>
                                            </div>
                                        <?php
                                        }else{
                                        ?>
                                            <div class="alert alert-danger">
                                                    <strong>Error!</strong> <?php print_r($items->message); ?>
                                            </div>
                                        <?php
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
            
            
            
            
                            <!--<div class="row">
                    
                                <!-- Item --
                                <div class="col-lg-3 col-md-6">
                                    <div class="dashboard-stat color-1">
                                        <div class="dashboard-stat-content"><h4><?=date('d M Y h:i:s',strtotime($result->created_at))?></h4> <span>joined</span></div>
                                        
                                    </div>
                                </div>
                    
                                <!-- Item --
                                <div class="col-lg-3 col-md-6">
                                    <div class="dashboard-stat color-2">
                                        <div class="dashboard-stat-content"><h4>20-Mar-2018</h4> <span>last login</span></div>
                                    </div>
                                </div>
                    
                                
                                <!-- Item --
                                <div class="col-lg-3 col-md-6">
                                    <div class="dashboard-stat color-3">
                                        <div class="dashboard-stat-content"><h4>95 XVG</h4> <span>0  donation  sent</span></div>
                                    </div>
                                </div>
                    
                                <!-- Item --
                                <div class="col-lg-3 col-md-6">
                                    <div class="dashboard-stat color-4">
                                        <div class="dashboard-stat-content"><h4>95 XVG</h4> <span>0 donation received</span></div>
                                    </div>
                                </div>
                            </div>-->
                          
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <?php if(!($current_loan)) { ?>
                            <p><h4>Want to invest money ? <u><a href="<?php echo site_url('loan/invest');?>"> Click Here to Request</a></u></h4></p>
                            <?php }else { ?>
                            <p><h4>Your request to invest money has been submitted, we will assign borrower to you according to your eligibility.</h4></p>
                            <?php } ?>
                        </div>
                        <div class="col-lg-12">
                            <div class="user_active_outer">
                                <div class="col-md-1 col-sm-2">
                                    <img src="<?=base_url('upload/profile_image/thumb/').'/'.$result->image?>">
                                </div>
                                <div class="col-md-11 co-sm-10">
                                    <ul>
                                        <li><a href="<?php echo site_url('upgrade_account/wallet');?>">My wallet</a></li>
                                        <li><a href="<?php echo site_url('loan');?>">upgrade to next stage</a></li>                                        
                                        <li><a href="<?php echo site_url('user/update_profile');?>">edit profile</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                
                
                
                    <div class="row">                
                            <!-- Recent Activity -->
                            <!--<div class="col-lg-6 col-md-12">
                                <div class="dashboard-list-box with-icons margin-top-20">
                                    <h4>Recent Activities</h4>
                                    <ul>
                                        <li>
                                            <i class="list-box-icon fa fa-star-o"></i> Kathy Brown has paid <span> 14,736 XVG</span><strong> to suxxis.</strong>
                                            <a href="#" class="close-list-item"><i class="fa fa-close"></i></a>
                                        </li>
                
                                        <li>
                                            <i class="list-box-icon fa fa-heart-o"></i>  Someone bookmarked your <span>suxxis</span> <strong>listing!</strong>
                                            <a href="#" class="close-list-item"><i class="fa fa-close"></i></a>
                                        </li>
                
                                        <li>
                                            <i class="list-box-icon fa fa-star-o"></i> Kathy Brown has paid <span> 14,736 XVG</span><strong> to suxxis.</strong>
                                            <a href="#" class="close-list-item"><i class="fa fa-close"></i></a>
                                        </li>
                                        <li>
                                            <i class="list-box-icon fa fa-star-o"></i> Kathy Brown has paid <span> 14,736 XVG</span><strong> to suxxis.</strong>
                                            <a href="#" class="close-list-item"><i class="fa fa-close"></i></a>
                                        </li>
                
                                        <li>
                                            <i class="list-box-icon fa fa-star-o"></i>jhon doe  joined <span> suxxis</span> 
                                            <a href="#" class="close-list-item"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>-->    
                
                            <!-- Invoices -->
                            <!--<div class="col-lg-6 col-md-12">
                                <div class="dashboard-list-box profile-info-user with-icons margin-top-20">
                                    <h4>your sponsor : <?php echo isset($parents->username)? $parents->username : '';?></h4>
                                    <?php $img = ($parents->image && $parents->show_avatar)? $parents->image : 'no_image.jpg'?>
                                    <div class="col-md-3"><img src="<?=base_url('upload/profile_image/thumb/').'/'.$img?>"></div>
                                    <div class="col-md-9">
                                    <ul class="profile-info">
                                       <li><i class="list-box-icon fa fa-envelope"></i> <a href="mailto:<?=$parents->email?>"><?=($parents->email && $parents->show_email) ? $parents->email : 'Not Mentioned';?></a></li>
                                       <!--<li><i class="list-box-icon fa fa-skype"></i> <a href="#"> <?=$parents->email?></a></li>--
                                       <li><i class="list-box-icon fa fa-phone"></i> <a href="#"> <?= ($parents->phone && $parents->show_phone) ? $parents->phone : 'Not Mentioned'; ?></a></li>
                                    </ul>
                                    </div>
                                </div>
                            </div> -->                   
                    </div>
        
                    <!---->
                            
