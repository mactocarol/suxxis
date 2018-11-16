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
                                  <li><?=$page?></li>
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
                        </div>
                    </div>
                    
                
                
                
                    <div class="row">                
                            <!-- Recent Activity -->
                            <div class="col-lg-6 col-md-12">
                                    <section class="col-lg-12 connectedSortable">                
                                        <div class="row">
                                        <div class="dashboard-refferal-box margin-top-0">
                                            <h4>referrals</h4>
                                            <ul class="accordion_example">
                                            
                                            <?php if(!empty($level1)) {
                                                foreach($level1 as $l1){ ?>
                                                <li>	
                                                <!-- Head 1 -->
                                                    <div class="level1">
                                                        <div class="user_img_box">
                                                            <img src="<?php echo base_url('theme');?>/images/user.jpg">
                                                            <span><?=$l1['username']?></span>
                                                        </div>
                                                        <div class="userdetail_box">
                                                            <h2><?=$l1['username']?></h2>
                                                            <p><?=$l1['email']?></p>
                                                            <p>stage : <?=isset(get_current_stage($l1['child_id'])->level) ? get_current_stage($l1['child_id'])->level : 0?></p>
                                                            <p>joined : <?=date('d-M-Y',strtotime($l1['created_at']));?></p>
                                                            <p>referrals : <?=isset($l1['referal_count']) ? $l1['referal_count'] : 0?></p>
                                                        </div>
                                                    </div>
                                                <!-- Head 1 END-->
                                                        <div>
                                                            <div> 
                                                                <ul class="accordion_example">
                                                                <?php if(!empty($l1['level2'])) {
                                                                    foreach($l1['level2'] as $l2){ ?>
                                                                    <li>
                                                                         <!-- Head1.1 -->
                                                                        <div class="level2">
                                                                            <div class="user_img_box">
                                                                                <img src="<?php echo base_url('theme');?>/images/user.jpg">
                                                                                <span><?=$l2['username']?></span>
                                                                            </div>
                                                                            <div class="userdetail_box">
                                                                                <h2><?=$l2['username']?></h2>
                                                                                <p><?=$l2['email']?></p>
                                                                                <p>stage : <?=isset(get_current_stage($l2['child_id'])->level) ? get_current_stage($l2['child_id'])->level : 0?></p>
                                                                                <p>joined : <?=date('d-M-Y',strtotime($l2['created_at']));?></p>
                                                                                <p>referrals : <?=isset($l2['referal_count']) ? $l2['referal_count'] : 0?></p>
                                                                            </div>
                                                                        </div>
                                                                        <!-- Head1.1 END -->
                                                                            <div>
                                                                            <!-- Content -->
                                                                                <ul class="accordion_example">
                                                                                <?php if(!empty($l2['level3'])) {
                                                                                    foreach($l2['level3'] as $l3){ ?>
                                                                                    <li>                                                                                
                                                                                        <div class="level3">
                                                                                            <div class="user_img_box">
                                                                                                <img src="<?php echo base_url('theme');?>/images/user.jpg">
                                                                                                <span><?=$l3['username']?></span>
                                                                                            </div>
                                                                                            <div class="userdetail_box">
                                                                                                <h2><?=$l3['username']?></h2>
                                                                                                <p><?=$l3['email']?></p>
                                                                                                <p>stage : <?=isset(get_current_stage($l3['child_id'])->level) ? get_current_stage($l3['child_id'])->level : 0?></p>
                                                                                                <p>joined : <?=date('d-M-Y',strtotime($l3['created_at']));?></p>
                                                                                                <p>referrals : <?=isset($l3['referal_count']) ? $l3['referal_count'] : 0?></p>
                                                                                            </div>
                                                                                        </div>                                                                                        
                                                                                        <div>
                                                                                            <ul class="accordion_example">
                                                                                            <?php if(!empty($l3['level4'])) {
                                                                                                foreach($l3['level4'] as $l4){ ?>                                                                                                
                                                                                                <li>                                                                                                
                                                                                                    <div class="level4">
                                                                                                        <div class="user_img_box">
                                                                                                            <img src="<?php echo base_url('theme');?>/images/user.jpg">
                                                                                                            <span><?=$l4['username']?></span>
                                                                                                        </div>
                                                                                                        <div class="userdetail_box">
                                                                                                            <h2><?=$l4['username']?></h2>
                                                                                                            <p><?=$l4['email']?></p>
                                                                                                            <p>stage : <?=isset(get_current_stage($l4['child_id'])->level) ? get_current_stage($l4['child_id'])->level : 0?></p>
                                                                                                            <p>joined : <?=date('d-M-Y',strtotime($l4['created_at']));?></p>
                                                                                                            <p>referrals : <?=isset($l4['referal_count']) ? $l4['referal_count'] : 0?></p>
                                                                                                        </div>
                                                                                                    </div>                                                                                                    
                                                                                                    <div>
                                                                                                        <ul class="accordion_example">
                                                                                                        <?php if(!empty($l4['level5'])) {
                                                                                                            foreach($l4['level5'] as $l5){ ?>    
                                                                                                            <li>                                                                                                            
                                                                                                                <div class="level5">
                                                                                                                    <div class="user_img_box">
                                                                                                                        <img src="<?php echo base_url('theme');?>/images/user.jpg">
                                                                                                                        <span><?=$l5['username']?></span>
                                                                                                                    </div>
                                                                                                                    <div class="userdetail_box">
                                                                                                                        <h2><?=$l5['username']?></h2>
                                                                                                                        <p><?=$l5['email']?></p>
                                                                                                                        <p>stage : <?=isset(get_current_stage($l5['child_id'])->level) ? get_current_stage($l5['child_id'])->level : 0?></p>
                                                                                                                        <p>joined : <?=date('d-M-Y',strtotime($l5['created_at']));?></p>
                                                                                                                        <p>referrals : <?=isset($l5['referal_count']) ? $l5['referal_count'] : 0?></p>
                                                                                                                    </div>
                                                                                                                </div>                                                                                                                
                                                                                                                <div>                                                                                                                    
                                                                                                                    <ul class="accordion_example">
                                                                                                                    <?php if(!empty($l5['level6'])) {
                                                                                                                        foreach($l5['level6'] as $l6){ ?>                                                                                                                        
                                                                                                                        <li>                                                                                                                        
                                                                                                                            <div class="level6">
                                                                                                                                <div class="user_img_box">
                                                                                                                                    <img src="<?php echo base_url('theme');?>/images/user.jpg">
                                                                                                                                    <span><?=$l6['username']?></span>
                                                                                                                                </div>
                                                                                                                                <div class="userdetail_box">
                                                                                                                                    <h2><?=$l6['username']?></h2>
                                                                                                                                    <p><?=$l6['username']?></p>
                                                                                                                                    <p>stage : <?=isset(get_current_stage($l6['child_id'])->level) ? get_current_stage($l6['child_id'])->level : 0?></p>
                                                                                                                                    <p>joined : <?=date('d-M-Y',strtotime($l6['created_at']));?></p>
                                                                                                                                    <p>referrals : <?=isset($l6['referal_count']) ? $l6['referal_count'] : 0?></p>
                                                                                                                                </div>
                                                                                                                            </div>                                                                                                                            
                                                                                                                            <div>                                                                                                                                
                                                                                                                                <ul class="accordion_example">
                                                                                                                                <?php if(!empty($l6['level7'])) {
                                                                                                                                    foreach($l6['level7'] as $l7){ ?>
                                                                                                                                    <li>                                                                                                                                    
                                                                                                                                        <div class="level7">
                                                                                                                                            <div class="user_img_box">
                                                                                                                                                <img src="<?php echo base_url('theme');?>/images/user.jpg">
                                                                                                                                                <span><?=$l7['username']?></span>
                                                                                                                                            </div>
                                                                                                                                            <div class="userdetail_box">
                                                                                                                                                <h2><?=$l7['username']?></h2>
                                                                                                                                                <p><?=$l7['email']?></p>
                                                                                                                                                <p>stage : <?=isset(get_current_stage($l7['child_id'])->level) ? get_current_stage($l7['child_id'])->level : 0?></p>
                                                                                                                                                <p>joined : <?=date('d-M-Y',strtotime($l7['created_at']));?></p>
                                                                                                                                                <p>referrals : <?=isset($l7['referal_count']) ? $l7['referal_count'] : 0?></p>
                                                                                                                                            </div>
                                                                                                                                        </div>                                                                                                                                        
                                                                                                                                    </li>
                                                                                                                                    <?php }} else{  ?>
                                                                                                                                    <li>
                                                                                                                                        <div class="level7">
                                                                                                                                            <div class="user_img_box">                                                                                                
                                                                                                                                                <span>No Referrals</span>
                                                                                                                                            </div>                                                                                            
                                                                                                                                        </div>
                                                                                                                                    </li>
                                                                                                                                    <?php } ?>
                                                                                                                                </ul>                                                                                                                                
                                                                                                                            </div>                                                                                                                        
                                                                                                                        </li>
                                                                                                                        <?php }} else{  ?>
                                                                                                                        <li>
                                                                                                                            <div class="level6">
                                                                                                                                <div class="user_img_box">                                                                                                
                                                                                                                                    <span>No Referrals</span>
                                                                                                                                </div>                                                                                            
                                                                                                                            </div>
                                                                                                                        </li>
                                                                                                                        <?php } ?>
                                                                                                                    </ul>                                                                                                                    
                                                                                                                </div>                                                                                                            
                                                                                                            </li>
                                                                                                            <?php }} else{  ?>
                                                                                                            <li>
                                                                                                                <div class="level5">
                                                                                                                    <div class="user_img_box">                                                                                                
                                                                                                                        <span>No Referrals</span>
                                                                                                                    </div>                                                                                            
                                                                                                                </div>
                                                                                                            </li>
                                                                                                            <?php } ?>
                                                                                                        </ul>                                                                                                                                                                                                                                                                                                                
                                                                                                    </div>                                                                                                
                                                                                                </li>
                                                                                                <?php }} else{  ?>
                                                                                                <li>
                                                                                                    <div class="level4">
                                                                                                        <div class="user_img_box">                                                                                                
                                                                                                            <span>No Referrals</span>
                                                                                                        </div>                                                                                            
                                                                                                    </div>
                                                                                                </li>
                                                                                                <?php } ?>
                                                                                            </ul>                                                                                        
                                                                                        </div>                                                                                
                                                                                    </li>
                                                                                    <?php }} else{  ?>
                                                                                    <li>
                                                                                        <div class="level3">
                                                                                            <div class="user_img_box">                                                                                                
                                                                                                <span>No Referrals</span>
                                                                                            </div>                                                                                            
                                                                                        </div>
                                                                                    </li>
                                                                                    <?php } ?>
                                                                                </ul>
                                                                            </div>                                                                    
                                                                    </li>
                                                                    <?php }} else{  ?>
                                                                    <li>
                                                                        <div class="level2">
                                                                            <div class="user_img_box">                                                                                                
                                                                                <span>No Referrals</span>
                                                                            </div>                                                                                            
                                                                        </div>
                                                                    </li>
                                                                    <?php } ?>                                                                                                                                        
                                                                </ul>                                                            
                                                            </div>
                                                        </div>
                                                </li>
                                                <?php }} else{  ?>
                                                
                                                    <div class="level1">
                                                        <div class="user_img_box">                                                                                                
                                                            <span>No Referrals</span>
                                                        </div>                                                                                            
                                                    </div>
                                                
                                                <?php } ?>
                                            </ul>
                                        
                                        </div>
                                    </div>
                                 </section>
                            </div>                                                               
                    </div>
        
                            
