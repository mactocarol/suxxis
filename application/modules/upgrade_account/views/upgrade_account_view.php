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
                    
                
                
                <?php if(!empty($my_wallet)) { ?>
                    <div class="row">
                        <div class="dashboard-list-box margin-top-0">
                            <!--<h4>Account Upgrade</h4>-->
                            <!-- panel-group -->
            
                            <div class="currentAccount">Account Upgrade: </div>
                            <!--<div class="alert alert-danger">
                                <b>IMPORTANT!</b> Your first donation recipient may change if you reload this page. We have made every effort
                                to assign members the proper position in your team and in order to prevent any problems we ask that when
                                you are ready to upgrade, please send your payment to the member shown and do not close this window until
                                you submit the form below.
                            </div>-->
                            
                            <div class="showHide m-b-20 alert alert-info" id="upgrade_instructions">
                                <h3>Instructions - Read Carefully</h3>
                            
                                <ul class="fs15">
                                    <li>You must complete the following <b>2 steps</b>.</li>
                                    <li><b>Step 1:</b> Send xvg payment to the wallet listed by the payee.</li>
                                    <li><b>Step 2:</b> Provide the transaction hash ID using the form provided below.
                                    </li>
                                    <li>This payment approval may take 2 - 3 days as it does manually.</li>
                                    <li>Your upgrade will not be in effect until donation is validated and approved by the payee.
                                    </li>
                                    <li>All donations are voluntarily and final. Refunds are not available.
                                    </li>
                                    <li>Communication about the upgrade process, donation and approval is between you and the payee only.
                                    </li>
                                    <li><b>You have 2 days to upgrade  or your account will be removed.</b></li>
                                    <li>If your account expires while your donation for your first upgrade is pending approval your account will not be removed.
                                    </li>
                                    <li>All disagreements and problems will be manually handled by system administrator. Submit a <a href="#"><b>support ticket</b></a> to report any issues.
                                    </li>
                                    <li>You must read and agree to the ZarFund <a href="#"><b>terms of service</b></a>.
                                    </li>
                                </ul>
                                <input class="dontShow" data-what="upgrade_instructions" type="checkbox">
                                <span class="fs12"> Don't show this again.</span>                    
                            </div>                                                                                                            
                        </div>
                    </div>
                    <?php } ?>
                    <div class="alert alert-danger">
                            <strong>Note: </strong> Upgrade your account when you recieve enough payments from your downline, Otherwise you will be skipped from next level payment.
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
                                                        echo "<h4>Amount : ".$subscription_validity->amount."(xvg) | validity :".$day_left." (Days Left)</h4>";
                                                    }
                                                if((!empty($current_stage) && $current_stage->level < 7) || empty($current_stage)) { 
                                                   if(empty($payment)) {                                                                               
                                       ?>                                                
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
                                                                                <?php $img = ($parents['image'] && $parents['show_avatar'])? $parents['image'] : 'no_image.jpg'?>
                                                                                    <div class="col-md-2"><div class="list-box-listing-img"><img src="<?php echo base_url('upload/profile_image/thumb/'.$img);?>" alt=""></div></div>
                                                                                      <div class="col-md-10">
                                                                                           <div class="list-box-listing-content">
                                                                                               
                                                                                               <h3><?php echo $parents['username'];?> <span class="user_position"> </span></h3>
                                                                                               <div class="inner-booking-list">
                                                                                                               <h5>Contact Me:</h5>
                                                                                                               <ul class="contact-list">
                                                                                                                   <li>Email : <?php echo ($parents['email'] && $parents['show_email']) ? $parents['email'] : 'Not Mentioned';?></li>
                                                                                                                 <li>Phone : <?php echo ($parents['phone'] && $parents['show_phone']) ? $parents['phone'] : 'Not Mentioned';?></li>
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
                                                                                  <div class=" alert alert-info">             
                                                                                      <h3> Where to find the Transaction Hash ID after you made payment?</h3>
                                                                                  
                                                                                      <ol class="fs15">
                                                                                          <li> Go to <a href="https://blockchain.info/">https://xvg.info/</a></li>
                                                                                          <li>Copy the xvg Wallet address you see in Step 1 and paste it in the search box on xvg.info then click on search.</li>
                                                                                          <li> On the next page, look for Transactions (Oldest First). Just below that you will see a long string of characters.
                                                                                          </li>
                                                                                          <li>Copy that long string of characters and come paste it in here in the Transaction Hash ID field.</li>
                                                                                          <li>Click on Submit. if you've done it correctly your payment will be seem to your payee, who approves the transaction.
                                                                                          </li>
                                                                                      </ol>
                                                                                     
                                                                                      <input class="dontShow" data-what="step2_instructions" type="checkbox">
                                                                                      <span class="fs12"> Don't show this again.</span>
                                                                                  </div>
                                                              
                                                                                  <div class="col-md-12 formContainer">
                                                                                      <div class="fs18 underline">DONATION AMOUNT (xvg) = <?=$upgrade_cost->cost?> xvg </div>
                                                                          
                                                                                      <form name="proofForm" action="<?php echo base_url().'upgrade_account/pay'; ?>" method="post" class="frm_ajax">
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
                                                                                <?php $img = ($parents['image'] && $parents['show_avatar'])? $parents['image'] : 'no_image.jpg'?>
                                                                                    <div class="col-md-2"><div class="list-box-listing-img"><img src="<?php echo base_url('upload/profile_image/thumb/'.$img);?>" alt=""></div></div>
                                                                                      <div class="col-md-10">
                                                                                           <div class="list-box-listing-content">
                                                                                               
                                                                                               <h3><?php echo $parents['username'];?> <span class="user_position"> </span></h3>
                                                                                               <div class="inner-booking-list">
                                                                                                               <h5>Contact Me:</h5>
                                                                                                               <ul class="contact-list">
                                                                                                                   <li>Email : <?php echo ($parents['email'] && $parents['show_email']) ? $parents['email'] : 'Not Mentioned';?></li>
                                                                                                                 <li>Phone : <?php echo ($parents['phone'] && $parents['show_phone']) ? $parents['phone'] : 'Not Mentioned';?></li>
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
                                                                                  <div class=" alert alert-info">             
                                                                                      <h3> Where to find the Transaction Hash ID after you made payment?</h3>
                                                                                  
                                                                                      <ol class="fs15">
                                                                                          <li> Go to <a href="https://blockchain.info/">https://xvg.info/</a></li>
                                                                                          <li>Copy the xvg Wallet address you see in Step 1 and paste it in the search box on xvg.info then click on search.</li>
                                                                                          <li> On the next page, look for Transactions (Oldest First). Just below that you will see a long string of characters.
                                                                                          </li>
                                                                                          <li>Copy that long string of characters and come paste it in here in the Transaction Hash ID field.</li>
                                                                                          <li>Click on Submit. if you've done it correctly your payment will be seem to your payee, who approves the transaction.
                                                                                          </li>
                                                                                      </ol>
                                                                                     
                                                                                      <input class="dontShow" data-what="step2_instructions" type="checkbox">
                                                                                      <span class="fs12"> Don't show this again.</span>
                                                                                  </div>
                                                              
                                                                                  <div class="col-md-12 formContainer">
                                                                                      <div class="fs18 underline">DONATION AMOUNT (xvg) = <?=$upgrade_cost->cost?> xvg </div>
                                                                          
                                                                                      <form name="proofForm" action="<?php echo base_url().'upgrade_account/pay'; ?>" method="post" class="frm_ajax">
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
                                                                                <?php $img = ($parents['image'] && $parents['show_avatar'])? $parents['image'] : 'no_image.jpg'?>
                                                                                  <div class="col-md-2"><div class="list-box-listing-img"><img src="<?php echo base_url('upload/profile_image/thumb/'.$img);?>" alt=""></div></div>
                                                                                    <div class="col-md-10">
                                                                                         <div class="list-box-listing-content">
                                                                                             
                                                                                             <h3><?php echo $parents['username'];?> <span class="user_position"> </span></h3>
                                                                                             <div class="inner-booking-list">
                                                                                                             <h5>Contact Me:</h5>
                                                                                                             <ul class="contact-list">
                                                                                                                 <li>Email : <?php echo ($parents['email'] && $parents['show_email']) ? $parents['email'] : 'Not Mentioned';?></li>
                                                                                                                 <li>Phone : <?php echo ($parents['phone'] && $parents['show_phone']) ? $parents['phone'] : 'Not Mentioned';?></li>
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
                                                                                <div class=" alert alert-info">             
                                                                                    <h3> Where to find the Transaction Hash ID after you made payment?</h3>
                                                                                
                                                                                    <ol class="fs15">
                                                                                        <li> Go to <a href="https://blockchain.info/">https://xvg.info/</a></li>
                                                                                        <li>Copy the xvg Wallet address you see in Step 1 and paste it in the search box on xvg.info then click on search.</li>
                                                                                        <li> On the next page, look for Transactions (Oldest First). Just below that you will see a long string of characters.
                                                                                        </li>
                                                                                        <li>Copy that long string of characters and come paste it in here in the Transaction Hash ID field.</li>
                                                                                        <li>Click on Submit. if you've done it correctly your payment will be seem to your payee, who approves the transaction.
                                                                                        </li>
                                                                                    </ol>
                                                                                   
                                                                                    <input class="dontShow" data-what="step2_instructions" type="checkbox">
                                                                                    <span class="fs12"> Don't show this again.</span>
                                                                                </div>
                                                            
                                                                                <div class="col-md-12 formContainer">
                                                                                    <div class="fs18 underline">DONATION AMOUNT (xvg) = <?=$upgrade_cost->cost?> xvg </div>
                                                                        
                                                                                    <form name="proofForm" action="<?php echo base_url().'upgrade_account/pay'; ?>" method="post" class="frm_ajax">
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
        
                            
