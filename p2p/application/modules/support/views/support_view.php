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
                        <div class="dashboard-list-box margin-top-0">
                        <h4>Support</h4>
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <?php if(!empty($support)) {
                                    $k =1;
                                    foreach($support as $row) { ?>
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="heading_<?=$k?>">
                                        <h4 class="panel-title">
                                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_<?=$k?>" aria-expanded="true" aria-controls="collapseOne">
                                                <i class="more-less glyphicon glyphicon-plus"></i>
                                               <?=$k?>) <?=$row['question']?>.
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse_<?=$k?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_<?=$k?>">
                                        <div class="panel-body">
                                              <?=$row['answer']?>.
                                        </div>
                                    </div>
                                </div>
                                <?php $k++; } } ?>
                                
                        
                        </div><!-- panel-group -->                                        
                    </div>
                </div>
        
                            
