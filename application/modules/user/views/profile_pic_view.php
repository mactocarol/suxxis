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
                                        <div class="box">
                                         <div class="box-header">
                                           <h3 class="box-title">Change Profile Picture</h3>
                                         </div>
                                         <!-- /.box-header -->
                                         <div class="box-body">
                                           <form role="form" id="profile_form" name="" method="post" action="<?php echo base_url().'user/upload_image'; ?>" enctype="multipart/form-data">
                                                 <!-- text input -->
                                                 <section class="col-lg-12 connectedSortable">
                                                      <div class="form-group">
                                                         <label>Image </label>
                                                         <input type="file" class="form-control" name="profile_pic" required >
                                                      </div>                             
                                                      
                                                      <div class="box-footer">
                                                         <input type="submit" class="btn btn-primary" name="Update_profile" value="Upload">
                                                         
                                                      </div>
                                                    </section>
                                                 
                                           </form>
                                         </div>
                                        </div>
                                 </section>
                            </div>                                                               
                    </div>
        
                            
