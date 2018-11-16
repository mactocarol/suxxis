<?php $this->load->view('admin/includes/sidebar'); ?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Loan Payments
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('admin/dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Loan Payments</li>
      </ol>
    </section>

        <!-- Main content -->
        <section class="content">
          
          <!-- Main row -->
          <div class="row">            
            <section class="col-lg-7 connectedSortable">         
                <?php
                if($this->session->flashdata('item')) {
                    $items = $this->session->flashdata('item');
                    if($items->success){
                    ?>
                        <div class="alert alert-success" id="alert">
                                <strong>Success!</strong> <?php print_r($items->message); ?>
                        </div>
                    <?php
                    }else{
                    ?>
                        <div class="alert alert-danger" id="alert">
                                <strong>Error!</strong> <?php print_r($items->message); ?>
                        </div>
                    <?php
                    }
                }
                ?>
            </section>
            <!-- Left col -->
            <section class="col-lg-12 connectedSortable">                
               <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Loan Payments</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Sr. No.</th>                        
                        <th>Sender</th>                                            
                        <th>Amount</th>
                        <th>Transaction Hash Id</th>
                        <th>Receiver</th>
                        <th>Date</th> 
                    </tr>
                    </thead>
                    <tbody>
                          <?php if(!empty($payment)) {
                                    $count = 0;                              
                                    foreach($payment as $row){ ?>
                                    <tr>
                                        <td><?= ++$count; ?></td>
                                        <td>
                                            <?php echo isset($row['sender_id']) ? get_user($row['sender_id'])->username : ''; ?>                                    
                                        </td>                                                    
                                        <td>
                                            <?php echo isset($row['amount']) ? $row['amount'] : '';   ?>
                                        </td>
                                        <td>
                                            <?php echo isset($row['txn_hash']) ? $row['txn_hash'] : '';   ?>
                                        </td>
                                        <td>
                                            <?php echo isset($row['receiver_id']) ? get_user($row['receiver_id'])->username : '';   ?>
                                        </td>
                                        <td>
                                            <?php echo isset($row['created_at']) ? date('d M Y h:i:s',strtotime($row['created_at'])) : '';   ?>
                                        </td>
                                    </tr>                          
                            <?php   }
                                } ?>                     
                                                       
                    </tfoot>
                  </table>
                 
              
                </div>
                <!-- /.box-body -->
              </div>
    
            </section>
            <!-- /.Left col -->
          </div>
          <!-- /.row (main row) -->
        
        </section>

    <!-- /.content -->
  </div>
  <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Assign Lender</h4>
      </div>
      <div class="modal-body">
        <div class="box-body">
                <h4>Loan amount - <span id="loan_amount"></span></h4>
                 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Sr. No.</th>                        
                        <th>Lender Name</th>                                            
                        <th>Limit</th>
                        <th>Loan Allowed (at a time)</th>                        
                        <th>Level</th>
                        <th>No. of Current Loan</th>                        
                        <th>Action</th>                   
                    </tr>
                    </thead>
                    <tbody>
                          <?php if(!empty($invest_list)) {
                                    $count = 0;                              
                                    foreach($invest_list as $row){ ?>
                                    <tr>
                                        <td><?= ++$count; ?></td>
                                        <td>
                                            <?php echo isset($row['email']) ? $row['email'] : ''; ?>                                    
                                        </td>                                                    
                                        <td>
                                            <?php echo isset($row['loan_cost']->limit) ? $row['loan_cost']->limit : '';   ?>
                                        </td>
                                        <td>
                                            <?php echo isset($row['loan_cost']->loan_allowed) ? $row['loan_cost']->loan_allowed : '';   ?>
                                        </td>
                                        <td>
                                            <?php echo isset($row['loan_cost']->level) ? $row['loan_cost']->level : '';   ?>
                                        </td>
                                        <td>
                                            <?php echo isset($row['loan_cost']->current_loan) ? $row['loan_cost']->current_loan : '';   ?>
                                        </td>
                                        
                                        <td>
                                            <form method="post" action="<?php echo site_url('admin/assign_loan'); ?>">
                                            <input type="hidden" id="loan" name="loan" value="">
                                            <input type="hidden" id="lender" name="lender" value="<?=$row['sender_id']?>">
                                            <input type="hidden" id="invest_id" name="invest_id" value="<?=$row['id']?>">
                                            <button type="submit" class="btn btn-success" onclick=" var c = confirm('Are you sure want to assign loan to this lender ?'); if(!c) return false;">Assign</button>
                                            </form>
                                        </td>
                                    </tr>                          
                            <?php   }
                                } ?>                     
                                                       
                    </tfoot>
                  </table>                
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script>
    function assign_loan(id,amount){
        $('#loan').val(id);
        $('#loan_amount').html(amount);
    }
</script>
<style>
    .modal-dialog {
    width: 80%;
    margin: 30px auto;
}
</style>