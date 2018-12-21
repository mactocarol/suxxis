<section class="row page-cover">
        <div class="container">
            <h2 class="h1 page-title">My Transactions</h2>
            <ol class="breadcrumb">
                <li><a href="index.html">home</a></li>
                <li class="active">My Transactions</li>
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
                        <h4><span>Transactions</span></h4>
                     </div>
                     
                     <div class="park_panel">
                    <div class="panel_heading">
                      <h4>My Bookings</h4>
                    </div>
                    <div class="Dta_table">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                          <thead>
                              <tr>
                                  <th>Transaction Id</th>
                                  <th>Order Id</th>                                  
                                  <th>Amount</th>
                                  <th>Payment Mode</th>                                  
                                  <th>Status</th>                                  
                              </tr>
                          </thead>
                          <tbody>
                            <?php if(!empty($transactions)) { ?>
                                <?php foreach($transactions as $row) {?>
                                        <tr>                                            
                                            <td><?php echo $row['txn_id']; ?></td>
                                            <td><?php echo $row['order_id']; ?></td>                                            
                                            <td><?php echo '$'.$row['payment_amt']; ?></td>
                                            <td><?php echo $row['payment_mode']; ?></td>                                            
                                            <td>
                                                <?php echo $row['status']; ?>
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
