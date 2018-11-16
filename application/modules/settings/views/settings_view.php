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
                        <h4>Setting</h4>
                        <!-- panel-group -->
                        <form method="post" action="<?php echo site_url('settings/save');?>">
                        <ul>
                            <li>
                                <div class="col-md-6">Send email when i get a new referal at any level</div>
                                <div class="col-md-6">
                                    <div class="btn-group" id="status" data-toggle="buttons">
                                        <label class="btn btn-default btn-on <?php echo ($result->send_referal_email == 1) ? 'active': '';?>">
                                        <input type="radio" value="1" name="send_referal_email">ON</label>
                                        <label class="btn btn-default btn-off <?php echo ($result->send_referal_email == 0) ? 'active': '';?>">
                                        <input type="radio" value="0" name="send_referal_email">OFF</label>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="col-md-6">Send email when a donation is submitted to me</div>
                                <div class="col-md-6">
                                    <div class="btn-group" id="status" data-toggle="buttons">
                                        <label class="btn btn-default btn-on <?php echo ($result->send_donation_submitted_email == 1) ? 'active': '';?>">
                                        <input type="radio" value="1" name="send_donation_submitted_email">ON</label>
                                        <label class="btn btn-default btn-off <?php echo ($result->send_donation_submitted_email == 0) ? 'active': '';?>">
                                        <input type="radio" value="0" name="send_donation_submitted_email">OFF</label>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="col-md-6">Send email when a donation I send is approved</div>
                                <div class="col-md-6">
                                    <div class="btn-group" id="status" data-toggle="buttons">
                                        <label class="btn btn-default btn-on <?php echo ($result->send_donation_approved_email == 1) ? 'active': '';?>">
                                        <input type="radio" value="1" name="send_donation_approved_email">ON</label>
                                        <label class="btn btn-default btn-off <?php echo ($result->send_donation_approved_email == 0) ? 'active': '';?>">
                                        <input type="radio" value="0" name="send_donation_approved_email">OFF</label>
                                     </div>
                                </div>
                            </li>
                            <li>
                                <button type="submit" class="btn btn-primary">Save</button>        
                            </li>
                        </ul>
                        
                        </form>
                        
                    </div>
                </div>
        
                            
