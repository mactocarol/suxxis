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
            
            
            
            
                            <div class="row">
                    
                                <!-- Item -->
                                <div class="col-lg-3 col-md-6">
                                    <div class="dashboard-stat color-1">
                                        <div class="dashboard-stat-content"><h4><?=date('d M Y h:i:s',strtotime($result->created_at))?></h4> <span>joined</span></div>
                                        
                                    </div>
                                </div>
                    
                                <!-- Item -->
                                <div class="col-lg-3 col-md-6">
                                    <div class="dashboard-stat color-2">
                                        <div class="dashboard-stat-content"><h4>20-Mar-2018</h4> <span>last login</span></div>
                                    </div>
                                </div>
                    
                                
                                <!-- Item -->
                                <div class="col-lg-3 col-md-6">
                                    <div class="dashboard-stat color-3">
                                        <div class="dashboard-stat-content"><h4>95 XVG</h4> <span>0  donation  sent</span></div>
                                    </div>
                                </div>
                    
                                <!-- Item -->
                                <div class="col-lg-3 col-md-6">
                                    <div class="dashboard-stat color-4">
                                        <div class="dashboard-stat-content"><h4>95 XVG</h4> <span>0 donation received</span></div>
                                    </div>
                                </div>
                            </div>
                          
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="user_active_outer">
                                <div class="col-md-1 col-sm-2">
                                    <img src="<?=base_url('upload/profile_image/thumb/').'/'.$result->image?>">
                                </div>
                                <div class="col-md-11 co-sm-10">
                                    <ul>
                                        <li><a href="<?php echo site_url('upgrade_account/wallet');?>">add your wallet</a></li>
                                        <li><a href="<?php echo site_url('upgrade_account');?>">upgrade to next stage</a></li>
                                        <li><a href="<?php echo site_url('user/update_profile');?>">edit profile</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                
                
                
                    <div class="row">                
                            <!-- Recent Activity -->
                            <div class="col-lg-6 col-md-12">
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
                            </div>    
                
                            <!-- Invoices -->
                            <div class="col-lg-6 col-md-12">
                                <div class="dashboard-list-box profile-info-user with-icons margin-top-20">
                                    <h4>your sponsor : <?php echo isset($parents->username)? $parents->username : '';?></h4>
                                    <?php $img = ($parents->image && $parents->show_avatar)? $parents->image : 'no_image.jpg'?>
                                    <div class="col-md-3"><img src="<?=base_url('upload/profile_image/thumb/').'/'.$img?>"></div>
                                    <div class="col-md-9">
                                    <ul class="profile-info">
                                       <li><i class="list-box-icon fa fa-envelope"></i> <a href="mailto:<?=$parents->email?>"><?=($parents->email && $parents->show_email) ? $parents->email : 'Not Mentioned';?></a></li>
                                       <!--<li><i class="list-box-icon fa fa-skype"></i> <a href="#"> <?=$parents->email?></a></li>-->
                                       <li><i class="list-box-icon fa fa-phone"></i> <a href="#"> <?= ($parents->phone && $parents->show_phone) ? $parents->phone : 'Not Mentioned'; ?></a></li>
                                    </ul>
                                    </div>
                                </div>
                            </div>                    
                    </div>
        
                    <div class="row">
                        <div class="dashboard-list-box profile-info-user with-icons margin-top-20">
                            <h4>Referral Summary</h4>
                            <div class="dashboard-table-outer col-md-12">
                                <table id="example" class="display" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Donation</th>
                                            <th>Max. Referrals</th>
                                            <th>Referrals</th>
                                            <th>received</th>
                                            <th>Potential</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $profit = 0; $total = 0; $i=1; $j=1; foreach($upgrade_cost as $cost){?>
                                        <tr>
                                            <td data-th="Level"><?=$i?></td>
                                            <td data-th="Price"><?=$cost['cost']?> xvg <img src="https://s2.coinmarketcap.com/static/img/coins/32x32/693.png" class="logo-32x32" width="15px" alt="Verge"></td>
                                            <td data-th="Max. Referrals" class="right"><?=$j*2?>(<?=$j*2*$cost['cost']?> xvg)<img src="https://s2.coinmarketcap.com/static/img/coins/32x32/693.png" class="logo-32x32" width="15px" alt="Verge"></td>
                                            <td data-th="Referrals" class="right"><a href="/back_office/referrals_list#Level1">0</a></td>
                                            <td data-th="Received" class="right">0.00 xvg <img src="https://s2.coinmarketcap.com/static/img/coins/32x32/693.png" class="logo-32x32" width="15px" alt="Verge"></td>
                                            <td data-th="Potential" class="right">0.00 xvg <img src="https://s2.coinmarketcap.com/static/img/coins/32x32/693.png" class="logo-32x32" width="15px" alt="Verge"></td>
                                        </tr>
                                        <?php $i++; $profit += $j*2*$cost['cost']; $j = $j*2; $total += $j; } ?>
                                        
                                        <!--<tr>
                                <td data-th="Level">
                                    1            </td>
                                <td data-th="Price">
                                    xvg 0.011            </td>
                                <td data-th="Max. Referrals" class="right">
                                    2                (xvg 0.022)
                                </td>
                                <td data-th="Referrals" class="right">
                                    <a href="/back_office/referrals_list#Level1">0</a>
                                </td>
                                <td data-th="Received" class="right">
                                    xvg 0.00            </td>
                                <td data-th="Potential" class="right">
                                    xvg 0.00            </td>
                            </tr>
                    
                                <tr>
                                <td data-th="Level">
                                    2            </td>
                                <td data-th="Price">
                                    xvg 0.021            </td>
                                <td data-th="Max. Referrals" class="right">
                                    4                (xvg 0.084)
                                </td>
                                <td data-th="Referrals" class="right">
                                    <a href="/back_office/referrals_list#Level2">0</a>
                                </td>
                                <td data-th="Received" class="right">
                                    xvg 0.00            </td>
                                <td data-th="Potential" class="right">
                                    xvg 0.00            </td>
                            </tr>
                    
                                <tr>
                                <td data-th="Level">
                                    3            </td>
                                <td data-th="Price">
                                    xvg 0.04            </td>
                                <td data-th="Max. Referrals" class="right">
                                    8                (xvg 0.32)
                                </td>
                                <td data-th="Referrals" class="right">
                                    <a href="/back_office/referrals_list#Level3">0</a>
                                </td>
                                <td data-th="Received" class="right">
                                    xvg 0.00            </td>
                                <td data-th="Potential" class="right">
                                    xvg 0.00            </td>
                            </tr>
                    
                                <tr>
                                <td data-th="Level">
                                    4            </td>
                                <td data-th="Price">
                                    xvg 0.10            </td>
                                <td data-th="Max. Referrals" class="right">
                                    16                (xvg 1.60)
                                </td>
                                <td data-th="Referrals" class="right">
                                    <a href="/back_office/referrals_list#Level4">0</a>
                                </td>
                                <td data-th="Received" class="right">
                                    xvg 0.00            </td>
                                <td data-th="Potential" class="right">
                                    xvg 0.00            </td>
                            </tr>
                    
                                <tr>
                                <td data-th="Level">
                                    5            </td>
                                <td data-th="Price">
                                    xvg 0.20            </td>
                                <td data-th="Max. Referrals" class="right">
                                    32                (xvg 6.40)
                                </td>
                                <td data-th="Referrals" class="right">
                                    <a href="/back_office/referrals_list#Level5">0</a>
                                </td>
                                <td data-th="Received" class="right">
                                    xvg 0.00            </td>
                                <td data-th="Potential" class="right">
                                    xvg 0.00            </td>
                            </tr>
                    
                                <tr>
                                <td data-th="Level">
                                    6            </td>
                                <td data-th="Price">
                                    xvg 0.50            </td>
                                <td data-th="Max. Referrals" class="right">
                                    64                (xvg 32.00)
                                </td>
                                <td data-th="Referrals" class="right">
                                    <a href="/back_office/referrals_list#Level6">0</a>
                                </td>
                                <td data-th="Received" class="right">
                                    xvg 0.00            </td>
                                <td data-th="Potential" class="right">
                                    xvg 0.00            </td>
                            </tr>
                    
                                <tr>
                                <td data-th="Level">
                                    7            </td>
                                <td data-th="Price">
                                    xvg 1.00            </td>
                                <td data-th="Max. Referrals" class="right">
                                    128                (xvg 128.00)
                                </td>
                                <td data-th="Referrals" class="right">
                                    <a href="/back_office/referrals_list#Level7">0</a>
                                </td>
                                <td data-th="Received" class="right">
                                    xvg 0.00            </td>
                                <td data-th="Potential" class="right">
                                    xvg 0.00            </td>
                            </tr>-->
                                       
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <<td data-th="Sum" class="listTotal">Total</td>
                                <td data-th="" class="listTotal">&nbsp;</td>
                                <td data-th="" class="listTotal right"><?=$total?> (<?=$profit?> xvg)</td>
                                <td data-th="Referrals" class="listTotal right">0</td>
                                <td data-th="Received" class="listTotal right">xvg 0.00</td>
                                <td data-th="Potential" class="listTotal right">xvg 0.00</td>
                                        </tr>
                                    </tfoot>
                                </table>                            
                            </div>
                        </div>
                    </div>
                            
