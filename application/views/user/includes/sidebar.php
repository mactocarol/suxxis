<div id="sidebar-wrapper">
            <ul class="sidebar-nav">
              	<li class="sidebar-brand">
                    <br>
                </li>
                
                <li <?php if($page == 'dashboard') echo 'class="active"';?>>
                    <a href="<?php echo site_url('user/dashboard');?>"><span class="fa fa-gear" aria-hidden="true"></span> Dashboard</a>
                    
                    
                </li>
                 <li <?php if($page == 'profile' || $page == 'upload_image') echo 'class="active"';?>>
                    <a href="<?php echo site_url('user/update_profile');?>"><span class="fa fa-users" aria-hidden="true"></span>Update Profile</a>
                </li>
                <li <?php if($page == 'testimonial') echo 'class="active"';?>>
                    <a href="<?php echo site_url('testimonial');?>"><span class="fa fa-plus-circle" aria-hidden="true"></span> Add Your Testimonial</a>
                </li>
                 
               
                <li <?php if($page == 'my referals') echo 'class="active"';?>>
                    <a href="<?php echo site_url('referal_link/my_referal');?>"><span class="fa fa-users" aria-hidden="true"></span> My Referrals</a>
                </li>
                <li <?php if($page == 'referal_link') echo 'class="active"';?>>
                    <a href="<?php echo site_url('referal_link');?>"><span class="fa fa-users" aria-hidden="true"></span> My Link</a>
                </li>
                <li <?php if($page == 'wallet' || $page == 'upgrade' || $page == 'subscription' || $page == 'pending_fee' || $page == 'completed_fee') echo 'class="active"';?>>
                    <a href="#moneySubmenu"  data-toggle="collapse" <?php if($page == 'wallet' || $page == 'upgrade' || $page == 'pending_fee' || $page == 'completed_fee') {  echo 'aria-expanded="true"'; } else { echo 'aria-expanded="false"'; } ?>><span class="fa fa-money" aria-hidden="true"></span> My money</a>
                    
                    
                    <ul id="moneySubmenu" <?php if($page == 'wallet' || $page == 'upgrade' || $page == 'subscription' || $page == 'pending_fee' || $page == 'completed_fee') { echo 'aria-expanded="true" class="list-unstyled collapse in"'; } else { echo 'aria-expanded="false" class="list-unstyled collapse"'; }?>>
                            <li><a href="<?php echo site_url('upgrade_account/wallet');?>">My wallet</a></li>
                            <li><a href="<?php echo site_url('upgrade_account');?>">Upgrade Account</a></li>
                            <li><a href="<?php echo site_url('upgrade_account/subscription');?>">Subscription</a></li>
                            <li><a href="<?php echo site_url('upgrade_account/pending_fee');?>">Pending Membership Fee</a></li>
                            <li><a href="<?php echo site_url('upgrade_account/completed_fee');?>">Completed Membership Fee</a></li>
                        </ul>
                </li>
                
                <li <?php if($page == 'tutorial') echo 'class="active"';?>>
                    <a href="<?php echo site_url('tutorial');?>"><span class="fa fa-pencil" aria-hidden="true"></span> Tutorial</a>
                </li>
                <li <?php if($page == 'settings') echo 'class="active"';?>>
                    <a href="<?php echo site_url('settings');?>"><span class="fa fa-gear" aria-hidden="true"></span> Settings</a>
                </li>
                <li <?php if($page == 'support') echo 'class="active"';?>>
                    <a href="<?php echo site_url('support');?>"><span class="fa fa-headphones" aria-hidden="true"></span> Support</a>
                </li>
              	<li <?php if($page == 'news') echo 'class="active"';?>>
                    <a href="<?php echo site_url('news');?>"><span class="fa fa-newspaper-o" aria-hidden="true"></span> News</a>
                </li>
                <li>
                    <a href="<?php echo site_url('user/logout');?>"><span class="fa fa-power-off" aria-hidden="true"></span> Logout</a>
                </li>
            </ul>
        </div>