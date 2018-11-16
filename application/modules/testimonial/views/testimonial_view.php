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
                            <div class="row">
                                <div class="col-md-12">
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add New</button>
                                </div>
                            </div>                                                                                              
                        </div>
                    </div>
                    
                    <!-- Modal -->
                    <div id="myModal" class="modal fade" role="dialog">
                      <div class="modal-dialog">
                    
                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Add Your Testimonial</h4>
                          </div>
                          <div class="modal-body">
                            <p>
                                <form method="post" action="<?php echo site_url('testimonial/add');?>">
                                    <textarea class="form-control" name="text" rows=5 required></textarea><br>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </p>                            
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          </div>
                        </div>
                    
                      </div>
                    </div>
                
                
                    <div class="row">
                        <div class="dashboard-list-box margin-top-0">
                        <h4>Testimonials</h4>
                            <ul>
                                <?php if(!empty($testimonials)) {
                                        foreach($testimonials as $row){?>
                                            <li>
                                                <div class="list-box-listing testimonial">
                                                    <div class="col-md-1 col-sm-2"><img src="<?php echo site_url('upload/profile_image/thumb/'.$row['image']);?>" alt=""></div>
                                                    <div class="col-md-11 col-sm-10">
                                                        <div class="inner">
                                                            <h3><?=$row['username']?></h3>
                                                            <p><?=$row['text']?></p>
                                                                        
                                                        </div>
                                                    </div>
                                                    <span class="time-client"><?=get_time_ago(strtotime($row['created_at']))?></span>
                                                </div>
                                                
                                            </li>
                                <?php } }?>                                        
                                
                            </ul>
                     </div>
                </div>
        
                            
