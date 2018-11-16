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
                                        <div class="form-group">
                                           <?php if(!empty($wallet)) { ?>
                                               <form role="form" id="profile_form" name="" method="post" action="<?php echo base_url().'upgrade_account/edit_wallet'; ?>">
                                                       <!-- text input -->
                                                       <section class="col-lg-12 connectedSortable">
                                                            <div class="form-group">
                                                               <label>Website Website</label>
                                                               <input type="hidden" class="form-control" name="user_id" placeholder="" value="<?php echo $this->session->userdata('user_id');?>">
                                                               <input type="text" class="form-control" name="website" placeholder="Website Url" value="<?php echo $wallet->website;?>">
                                                            </div>
                                                            <div class="form-group">
                                                               <label>Wallet Address </label>
                                                               <input type="text" class="form-control" name="address" placeholder="Wallet Address" value="<?php echo $wallet->address;?>">
                                                            </div>                                                                                                  
                                                            <div class="box-footer">
                                                               <input type="submit" class="btn btn-primary" name="add" value="Update">
                                                               
                                                            </div>
                                                          </section>
                                                       
                                                 </form>
                                               
                                           <?php } else { ?>
                                           <h3 class="box-title">Add your Bitcoin Wallet.</h3>
                                                   <form role="form" id="profile_form" name="" method="post" action="<?php echo base_url().'upgrade_account/wallet'; ?>">
                                                       <!-- text input -->
                                                       <section class="col-lg-12 connectedSortable">
                                                            <div class="form-group">
                                                               <label>Website Website</label>
                                                               <input type="hidden" class="form-control" name="user_id" placeholder="" value="<?php echo $this->session->userdata('user_id');?>">
                                                               <input type="text" class="form-control" name="website" placeholder="Website Url" value="">
                                                            </div>
                                                            <div class="form-group">
                                                               <label>Wallet Address </label>
                                                               <input type="text" class="form-control" name="address" placeholder="Wallet Address" value="">
                                                            </div>                                                                                                  
                                                            <div class="box-footer">
                                                               <input type="submit" class="btn btn-primary" name="add" value="Add">
                                                               
                                                            </div>
                                                          </section>
                                                       
                                                 </form>
                                           <?php } ?>
                                        </div>                                                                                 
                                   </section>
                            </div>                                                               
                    </div>
        
                            
