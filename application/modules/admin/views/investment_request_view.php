<?php $this->load->view('admin/includes/sidebar'); ?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Investment Request
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('admin/dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Investment Request</li>
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
                  <h3 class="box-title">Investment Request</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Sr. No.</th>                        
                        <th>UserName</th>                                            
                        <th>Limit</th>
                        <th>Loan Allowed (at a time)</th>                        
                        <th>Level</th>
                        <th>No. of Current Loan</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                          <?php if(!empty($pending)) {
                                    $count = 0;                              
                                    foreach($pending as $row){ ?>
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
                                            <a href="<?php echo site_url('admin/decline_invest/'.$row['id']); ?>"><button type="button" class="btn btn-danger" onclick=" var c = confirm('Are you sure want to decline this investor ?'); if(!c) return false;">Decline</button></a> 
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
  