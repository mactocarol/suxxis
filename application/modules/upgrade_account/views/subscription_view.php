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
                            <div class="col-lg-12 col-md-12">
                                    <section class="col-lg-12 connectedSortable">
                                    <div class="form-group">
                                       <?php if(!empty($my_wallet)) {
                                                   echo isset($current_stage->level) ? "<h3>Current Stage : Level ".$current_stage->level."</h3>" : "<h3>Current Stage : Level 0"."</h3>";
                                                    
                                                    
                                                   if(isset($subscription_validity->created_at)){
                                                        $now = time(); // or your date as well
                                                        $your_date = date('Y-m-d H:i:s',strtotime('+30 days',strtotime($subscription_validity->created_at)));
                                                        $due_date = strtotime($your_date);
                                                        $datediff = $due_date - $now ;
                                                        $day_left = round($datediff / (60 * 60 * 24));
                                                        echo "<h4>Amount : ".$subscription_validity->amount."(xvg) | validity :".$day_left." (Days Left)</h4><br>(subscription button will appear before 5 days to expire)";
                                                    }
                                                   
                                                   if(isset($day_left) && $day_left <=5){ 
                                                    
                                                   if(empty($payment)) {                                                                               
                                       ?>
                                                        <div class="alert alert-danger">
                                                            <i class="fa fa-exclamation-circle"></i>&nbsp;&nbsp;
                                                            Please <a href="<?php echo site_url('upgrade_account');?>">upgrade</a> to get your subscription
                                                        </div>                                  
                                                       
                                               <?php } else if($payment->status == 0) { ?>
                                                           <div class="alert alert-success" id="alerts">
                                                                  <strong></strong>Your Payment is wailting for approval, please be patient.
                                                           </div>                                                    
                                                       <?php } else if($payment->status == 2){ ?>                                                                                                          
                                                               <div class="alert alert-danger" id="alerts">
                                                                       <strong>Oh! </strong>Your Payment is Declined, please send correct Information.
                                                               </div>
                                                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                  
                                                                      <div class="panel panel-default">
                                                                          <div class="panel-heading" role="tab" id="headingOne">
                                                                              <h4 class="panel-title">
                                                                                  <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                                      <i class="more-less glyphicon glyphicon-plus"></i>
                                                                                     STEP 1: <strong><?=$upgrade_cost->level?></strong> - <?=$upgrade_cost->cost?> xvg
                                                                                     
                                                                                  </a>
                                                                              </h4>
                                                                          </div>
                                                                          <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                                                              <div class="panel-body">
                                                                                    <div class="col-md-2"><div class="list-box-listing-img"><img src="<?php echo base_url('upload/profile_image/thumb/'.$parents['image']);?>" alt=""></div></div>
                                                                                      <div class="col-md-10">
                                                                                           <div class="list-box-listing-content">
                                                                                               
                                                                                               <h3><?php echo $parents['username'];?> <span class="user_position"> </span></h3>
                                                                                               <div class="inner-booking-list">
                                                                                                               <h5>Contact Me:</h5>
                                                                                                               <ul class="contact-list">
                                                                                                                   <li><?php echo $parents['email'];?></li>
                                                                                                                   <!--<li>123-456-789</li>-->
                                                                                                               </ul>
                                                                                                           </div>
                                                                                          
                                                                                          </div>
                                                                                      </div>
                                                                                      <div class="col-md-12">
                                                                                          <h4  class="notice_box">
                                                                                              <span class="red">IMPORTANT:</span> Send donation <b>ONLY</b> to the <b>wallet</b> listed below
                                                                                              &nbsp; <i class="fa fa-arrow-down red fs18" aria-hidden="true"></i>
                                                                                          </h4>
                                                              
                                                              
                                                                                          <div class="col-lg-6 center m-t-10">
                                                                                                                          <div class="alert alert-warning center">
                                                                                                                          <?php echo $parents['address'];?>
                                                                                                                          </div>                                                                            
                                                                                                                  </div>
                                                                                          <div class="col-lg-6 center" style="margin-top:-10px;">
                                                                                              <img src="https://chart.googleapis.com/chart?chs=250x250&amp;cht=qr&amp;chl=bitcoin:1Ed5ttUeDxAbxNXnerx8zC6uT6WNypdNEZ?amount=0.0025000&amp;message=donation">
                                                                              
                                                                                          </div>
                                                                              
                                                                                       </div>                                           
                                                                              </div>
                                                                          </div>
                                                                      </div>
                                                      
                                                                      <div class="panel panel-default">
                                                                          <div class="panel-heading" role="tab" id="headingTwo">
                                                                              <h4 class="panel-title">
                                                                                  <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                                                      <i class="more-less glyphicon glyphicon-plus"></i>
                                                                                    STEP 2: <strong><?=$upgrade_cost->level?></strong> - <?=$upgrade_cost->cost?> xvg
                                                                                  </a>
                                                                              </h4>
                                                                          </div>
                                                                          <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                                                              <div class="panel-body">                                                                                                                                            
                                                                                  <div class="col-md-12 formContainer">
                                                                                      <div class="fs18 underline">DONATION AMOUNT (xvg) = <?=$upgrade_cost->cost?> xvg </div>
                                                                          
                                                                                      <form name="proofForm" action="<?php echo base_url().'upgrade_account/pay_subscription'; ?>" method="post" class="frm_ajax">
                                                                                          <input type="hidden" class="form-control" name="address" readonly value="<?php echo $parents['address'];?>">                                                                                        
                                                                          
                                                                                          <div class="form-group">
                                                                                              <label for="transaction_id">Transaction Hash ID</label>
                                                                                              <input class="form-control" maxlength="100" required name="hash" id="transaction_id" value="" placeholder="Transaction Hash Id" type="text">
                                                                                          </div>
                                                                                          <div class="form-group">
                                                                                              <label for="amount">Exact Amount Sent</label>
                                                                                              <input class="form-control" maxlength="100" required name="amount" id="amount" value="" placeholder="Enter amount of xvg" onkeyup="maskAmount(this);" type="text">
                                                                                          </div>
                                                                          
                                                                                          <div class="formBottom">
                                                                                              <input value="Submit" class="btn btn-alt" type="submit">
                                                                                          </div>
                                                                                      </form>
                                                                                  </div>
                                                                              </div>
                                                                          </div>
                                                                      </div>
                                                                </div>
                                                              
                                                              <?php
                                                       }else if($payment->status == 1){?>
                                                               
                                                                 <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                
                                                                    <div class="panel panel-default">
                                                                        <div class="panel-heading" role="tab" id="headingOne">
                                                                            <h4 class="panel-title">
                                                                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                                    <i class="more-less glyphicon glyphicon-plus"></i>
                                                                                   STEP 1: <strong><?=$upgrade_cost->level?></strong> - <?=$upgrade_cost->cost?> xvg
                                                                                   
                                                                                </a>
                                                                            </h4>
                                                                        </div>
                                                                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                                                            <div class="panel-body">
                                                                                  <div class="col-md-2"><div class="list-box-listing-img"><img src="<?php echo base_url('upload/profile_image/thumb/'.$parents['image']);?>" alt=""></div></div>
                                                                                    <div class="col-md-10">
                                                                                         <div class="list-box-listing-content">
                                                                                             
                                                                                             <h3><?php echo $parents['username'];?> <span class="user_position"> </span></h3>
                                                                                             <div class="inner-booking-list">
                                                                                                             <h5>Contact Me:</h5>
                                                                                                             <ul class="contact-list">
                                                                                                                 <li><?php echo $parents['email'];?></li>
                                                                                                                 <!--<li>123-456-789</li>-->
                                                                                                             </ul>
                                                                                                         </div>
                                                                                        
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-12">
                                                                                        <h4  class="notice_box">
                                                                                            <span class="red">IMPORTANT:</span> Send donation <b>ONLY</b> to the <b>wallet</b> listed below
                                                                                            &nbsp; <i class="fa fa-arrow-down red fs18" aria-hidden="true"></i>
                                                                                        </h4>
                                                            
                                                            
                                                                                        <div class="col-lg-6 center m-t-10">
                                                                                                                        <div class="alert alert-warning center">
                                                                                                                        <?php echo $parents['address'];?>
                                                                                                                        </div>                                                                            
                                                                                                                </div>
                                                                                        <div class="col-lg-6 center" style="margin-top:-10px;">
                                                                                            <img src="https://chart.googleapis.com/chart?chs=250x250&amp;cht=qr&amp;chl=bitcoin:1Ed5ttUeDxAbxNXnerx8zC6uT6WNypdNEZ?amount=0.0025000&amp;message=donation">
                                                                            
                                                                                        </div>
                                                                            
                                                                                     </div>                                           
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                    
                                                                    <div class="panel panel-default">
                                                                        <div class="panel-heading" role="tab" id="headingTwo">
                                                                            <h4 class="panel-title">
                                                                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                                                    <i class="more-less glyphicon glyphicon-plus"></i>
                                                                                  STEP 2: <strong><?=$upgrade_cost->level?></strong> - <?=$upgrade_cost->cost?> xvg
                                                                                </a>
                                                                            </h4>
                                                                        </div>
                                                                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                                                            <div class="panel-body">                                                                                
                                                            
                                                                                <div class="col-md-12 formContainer">
                                                                                    <div class="fs18 underline">DONATION AMOUNT (xvg) = <?=$upgrade_cost->cost?> xvg </div>
                                                                        
                                                                                    <form name="proofForm" action="<?php echo base_url().'upgrade_account/pay_subscription'; ?>" method="post" class="frm_ajax">
                                                                                        <input type="hidden" class="form-control" name="address" readonly value="<?php echo $parents['address'];?>">                                                                                        
                                                                        
                                                                                        <div class="form-group">
                                                                                            <label for="transaction_id">Transaction Hash ID</label>
                                                                                            <input class="form-control" maxlength="100" required name="hash" id="transaction_id" value="" placeholder="Transaction Hash Id" type="text">
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label for="amount">Exact Amount Sent</label>
                                                                                            <input class="form-control" maxlength="100" required name="amount" id="amount" value="" placeholder="Enter amount of xvg" onkeyup="maskAmount(this);" type="text">
                                                                                        </div>
                                                                        
                                                                                        <div class="formBottom">
                                                                                            <input value="Submit" class="btn btn-alt" type="submit">
                                                                                        </div>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                                                              
                                                    <?php   }                                      
                                               ?>      
                                               
                                       <?php } } else { ?>
                                       <h3 class="box-title">Add your Bitcoin Wallet first .</h3>
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
        
                            
