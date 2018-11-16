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
                                  <li><a href="<?php echo site_url('user/dashboard');?>">Home</a></li>
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
                	<div class="dashboard-refferal-box margin-top-0">
					<h4>tutorials</h4>
					<!-- panel-group -->
                        <div class="tutorial_list">
                            <?php if(!empty($tutorials)) {
                                    foreach($tutorials as $row) { ?>
                                        <div class="col-md-4">
                                            <iframe width="560" height="315" src="<?=$row['link']?>?rel=0&amp;controls=1&amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                            <h3><?=$row['title']?>.</h3>
                                        </div>
                            <?php } }else { ?>
                            <h6>No Tutorials to show.</h6>
                            <?php } ?>
    				
    					</div>				
                   </div>
                   </div>               
                
                
                    
        
                            
