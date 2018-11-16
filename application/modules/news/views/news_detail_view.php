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
                
                                        <a href="<?php echo site_url('news');?>"><button class="btn btn-danger">Back</button></a>
                                         <!-- /.box-header -->
                                         <div class="box-body">
                                           
                                                 <!-- text input -->
                                                 <section class="col-lg-12 connectedSortable">
                                                      <div class="form-group">
                                                         <label><h3><?php echo isset($news->title)? $news->title:'';?></h3> </label>                                                         
                                                      </div>
                                                      <div class="form-group">
                                                         
                                                         <?php echo isset($news->description)? $news->description:'';?>
                                                         
                                                      </div>
                                                      
                                                    </section>
                                                 
                                           
                                         </div>
                                        </div>
                                 </section>
                            </div>                                                               
                    </div>
        
                            
