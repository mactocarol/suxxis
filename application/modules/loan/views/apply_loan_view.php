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
                                  <li>Apply Loan</li>
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
                        <div class="col-md-12">
                            <form role="form" id="apply_loan_form" name="" method="post" action="<?php echo base_url().'loan/apply'; ?>">    
                                <div class="dashboard-list-box profile_option">
                                    <h4>How much loan you want ?</h4>
                                        <div class="col-md-12">
                                            <h5>Upto 1500 xvg (interest rate would be 12%,  minimum period - 30 days,  maximum period - 60 days)</h5>
                                            <h5>Upto 3000 xvg (interest rate would be 18%,  minimum period - 30 days,  maximum period - 90 days)</h5>
                                            <h5>Upto 5000 xvg (interest rate would be 35%,  minimum period - 30 days,  maximum period - 120 days)</h5>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="joined">Amount</label>
                                                <input type="text" name="amount" class="form-control input-text" id="amount" value="<?php echo isset($amount)?$amount:''?>" <?php echo isset($amount)? 'readonly':''?>>                                                
                                            </div>
                                        </div>
                                        <?php if(isset($lenders) && !empty($lenders)) { ?>
                                        <div class="col-md-12">                        	 
                                            <div class="form-group">
                                               <label for="country">Lenders</label>                                    
                                                   <select name="lender" class="form-control input-text" onchange="return load_duration(this.value);" required>
                                                       <option value="">Select Lender</option>
                                                       <?php foreach($lenders as $l):?>
                                                       <option value="<?=$l['user_id']?>" ><?=$l['username']?></option>
                                                       <?php endforeach;?>                                         
                                                  </select>                                    
                                            </div>
                                       </div>
                                        <div class="col-md-12">                        	 
                                            <div class="form-group">
                                               <label for="country">Duration</label>                                    
                                                   <select name="duration" id="duration" class="form-control input-text" required>
                                                       <option value="">Select Duration</option>
                                                                                              
                                                  </select>                                    
                                            </div>
                                       </div>
                                        <input type="hidden" name="amt" class="form-control input-text" id="amount" value="<?php echo isset($amount)?$amount:''?>">
                                        <?php }?>
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-default">Submit</button>
                                        </div>
                                </div>
                            </form>
                        </div>
                    </div>
                            
<script>
    function load_duration(id){
            $.ajax({
                url: '<?php echo site_url('loan/load_duration');?>',
                type: 'post',
                data: { "userid": id},
                success: function(data){
                    console.log(data);
                    $('#duration').html( data );
                },
                error: function( jqXhr, textStatus, errorThrown ){
                    console.log( errorThrown );
                }
            });

            e.preventDefault();
        }
</script>