<section class="row page-cover">
        <div class="container">
            <h2 class="h1 page-title">Booking Received</h2>
            <ol class="breadcrumb">
                <li><a href="index.html">home</a></li>
                <li class="active">Booking Received</li>
            </ol>
        </div>
    </section>

    <section class="info dash">
         <div class="container">
            <div class="bx_shdo">
               <div class="row">
                    <div class="col-md-4">
                    <?php $this->load->view('sidebar');?>        
                    </div>
                  <!--end of col -->
                  <div class="col-md-8">
                     <div class="credit">
                        <h4><span>Booking</span></h4>
                     </div>
                     
                     <div class="park_panel">
                    <div class="panel_heading">
                      <h4>Bookings Received</h4>
                    </div>
                    <div class="Dta_table">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                          <thead>
                              <tr>
                                  <th>Booking Id</th>
                                  <th>Car-Model</th>
                                  <th>From Date</th>
                                  <th>To Date</th>
                                  <th>Amount</th>
                                  <th>Username</th>
                                  <th>Phone</th>
                                  <th>Pickup Location</th>
                                  <th>Dropoff Location</th>                                  
                                  <th>Status</th>                                  
                              </tr>
                          </thead>
                          <tbody>
                            <?php if(!empty($booking)) { ?>
                                <?php rsort($booking); foreach($booking as $row) {?>
                                        <tr>                                            
                                            <td><?php echo $row['order_id']; ?></td>
                                            <td><?php echo $row['cars']->title; ?></td>                                            
                                            <td><?php echo $row['fdate']; ?></td>
                                            <td><?php echo $row['ldate']; ?></td>
                                            <td><?php echo '$'.$row['booking'][0]['amount']; ?></td>
                                            <td><?php echo $row['users']->username; ?></td>
                                            <td><?php echo $row['users']->phone; ?></td>                                            
                                            <td><?php echo $row['pickup']; ?></td>
                                            <td><?php echo $row['dropoff']; ?></td>                                            
                                            <td>
                                                <?php if($row['booking'][0]['payment_status'] == 2){?>
                                                <button type="button" class="btn btn-success">Completed</button>
                                                <?php } else { ?>
                                                <button type="button" class="btn btn-warning">Pending</button>
                                                <?php } ?>
                                            </td>                                            
                                        </tr>
                                       <?php } }?>                               
                          </tbody>
                      </table>
                    </div>
                  </div><!--End Of Data Table -->
                  </div>
               </div>
            </div>
         </div>
      </section>
