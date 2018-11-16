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
                                           <h3 class="box-title">Referral Link</h3>
                                         </div>
                                         <!-- /.box-header -->
                                         <div class="box-body">
                                             <?php if(!empty($reslt)) {?>
                                                 <a href="<?php echo base_url(); ?>referal_link/generate" <?php if($result->referal_link){ echo "disabled onclick='return false;'" ;}?> style="color:white"><button class="btn btn-danger" <?php if($result->referal_link){ echo "disabled" ;}?>>Generate</button></a><br><br>
                                                 <span>
                                                     <?php if($result->referal_link){?>
                                                         This is your referal link - <strong><?=site_url()."user/user_register/".$result->referal_link?></strong>
                                                     <?php } else { ?>
                                                         No Referal Link generated now.
                                                     <?php } ?>
                                                 </span>
                                             <?php }else { ?>
                                                 <div class="alert alert-danger">
                                                     <i class="fa fa-exclamation-circle"></i>&nbsp;&nbsp;
                                                     Please <a href="<?php echo site_url('upgrade_account');?>">upgrade</a> to enable your referral link
                                                 </div>
                                             <?php } ?>
                                           <!--<form role="form" id="profile_update_form" name="" method="post" action="<?php echo base_url().'admin/about_us/'; ?>">
                                                 <!-- text input --
                                                 <section class="col-lg-12 connectedSortable">                            
                                                      <div class="form-group">                                
                                                         <label>Page Description</label>                                
                                                             <textarea class="form-control" name="desc" id="editor1" ><?php echo isset($reslt->description)? $reslt->description:'';?></textarea>                                
                                                      </div>
                                                      
                                                      <div class="box-footer">
                                                         <input type="submit" class="btn btn-primary" name="Update_profile" value="Update">
                                                         
                                                      </div>
                                                    </section>
                                                 
                                           </form>-->
                                         </div>
                                        </div>
                                 </section>
                            </div>                                                               
                    </div>
        
                            
