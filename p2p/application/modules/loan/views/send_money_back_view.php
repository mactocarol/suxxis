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
                        <div class="col-lg-12 col-md-12">
                            <!--<h4>Account Upgrade</h4>-->
                            <!-- panel-group -->
            
                            <div class="currentAccount">Send Money: </div>
                                                                                                                                        
                        </div>
                    </div>
                    <?php } ?>
                    
                    <div class="row">                
                            <!-- Recent Activity -->
                            <div class="col-lg-12 col-md-12">
                                    <section class="col-lg-12 connectedSortable">
                                    <div class="form-group">
                                       <?php if(!empty($my_wallet)) {
                                                                                                                                                                                                                                                                            
                                       ?>                                                
                                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                                                   <div class="panel panel-default">
                                                       <div class="panel-heading" role="tab" id="headingOne">
                                                           <h4 class="panel-title">
                                                               <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                   <i class="more-less glyphicon glyphicon-plus"></i>
                                                                  STEP 1: <strong><?=$loan->due_amount?></strong> xvg
                                                                  
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
                                                                           <span class="red">IMPORTANT:</span> Send Loan amount <b>ONLY</b> to the <b>wallet</b> listed below
                                                                           &nbsp; <i class="fa fa-arrow-down red fs18" aria-hidden="true"></i>
                                                                       </h4>
                                           
                                           
                                                                       <div class="col-lg-6 center m-t-10">
                                                                                                       <div class="alert alert-warning center">
                                                                                                       <?php echo $parents['address'];?>
                                                                                                       </div>                                                                            
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
                                                                 STEP 2: <strong><?=$loan->due_amount?></strong> xvg
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
                                                                   <div class="fs18 underline">DONATION AMOUNT (xvg) = <?=$loan->due_amount?> xvg </div>
                                                       
                                                                   <form name="proofForm" action="<?php echo base_url().'loan/send_back_money/'.$loan_id; ?>" method="post" class="frm_ajax">
                                                                       <input type="hidden" class="form-control" name="address" readonly value="<?php echo $parents['address'];?>">                                                                                        
                                                       
                                                                       <div class="form-group">
                                                                           <label for="transaction_id">Transaction Hash ID</label>
                                                                           <input class="form-control" maxlength="100" required name="hash" id="transaction_id" value="" placeholder="Transaction Hash Id" type="text">
                                                                       </div>
                                                                       <div class="form-group">
                                                                           <label for="amount">Exact Amount Sent</label>
                                                                           <input class="form-control" maxlength="100" required name="amount" id="amount" value="" placeholder="Enter amount of xvg" onkeyup="maskAmount(this);" type="text">
                                                                           <input name="receiver_id"  value="<?php echo $parents['user_id'];?>" type="hidden">
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
                                        <?php  } else { ?>
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
        
                            
