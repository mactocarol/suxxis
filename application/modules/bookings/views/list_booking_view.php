<?php $this->load->view('admin/includes/sidebar'); ?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        List Bookings
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('admin/dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">List Bookings</li>
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
                  <h3 class="box-title">List Bookings</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                                  <th>Sr. No.</th>
                                  <th>UserName</th>
                                  <th>Booking Id</th>
                                  <th>Car-Model</th>
                                  <th>From Date</th>
                                  <th>To Date</th>
                                  <th>Amount</th>
                                  <th>Pickup Location</th>
                                  <th>Dropoff Location</th>                                  
                                  <th>Status</th>
                                  <th>Action</th>
                              </tr>
                    </thead>
                    <tbody>
                         <?php $count = 0; if(!empty($booking)) { ?>
                        <?php foreach($booking as $row) {?>
                                <tr>
                                    <td><?= ++$count; ?></td>
                                    <td><?php echo $row['users']->username; ?></td>
                                    <td><?php echo $row['order_no']; ?></td>
                                    <td><?php echo $row['cars']->title; ?></td>                                            
                                    <td><?php echo $row['booking']->fdate; ?></td>
                                    <td><?php echo $row['booking']->ldate; ?></td>
                                    <td><?php echo '$'.$row['amount']; ?></td>
                                    <td><?php echo $row['booking']->pickup; ?></td>
                                    <td><?php echo $row['booking']->dropoff; ?></td>                                            
                                    <td>
                                        <?php if($row['payment_status'] == 2){?>
                                        <button type="button" class="btn btn-success">Completed</button>
                                        <?php } else { ?>
                                        <button type="button" class="btn btn-warning">Pending</button>
                                        <?php } ?>
                                    </td>
                                    <td>
                                      <?php if($row['booking']->seller_id){?>
                                      <button class="btn btn-success">Assigned to <?=get_user($row['booking']->seller_id)->username;?></button>
                                      <?php } else { ?>
                                      <form method="post" action="<?php echo site_url('bookings/assign');?>">
                                      <select name="partner" class="form-control" required>
                                        <option value="">Select Partner</option>
                                        <?php foreach($partners as $p){?>
                                          <option value="<?php echo $p['id']?>"><?php echo $p['username']?></option>
                                        <?php } ?>
                                      </select>
                                      <input type="hidden" name="booking_id" value="<?php echo $row['booking']->id;?>">
                                      <button type="submit">Assign</button>
                                      </form>
                                      <?php } ?>
                                    </td>
                                </tr>
                               <?php } }?>                      
                                                       
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
  