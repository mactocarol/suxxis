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
                                  <li>Borrowed Loan</li>
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
                        <div class="dashboard-list-box profile-info-user with-icons margin-top-20">
                            <h4>My Borrowed Loan</h4>
                            <div class="dashboard-table-outer col-md-12">
                                <table id="example" class="display" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Sr. No.</th>                        
                                            <th>Lender</th>                                            
                                            <th>Amount</th>
                                            <th>Duration (in days)</th>
                                            <th>Rate (in %)</th>
                                            <th>Due Amount</th>
                                            <th>Start Date</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(!empty($loan)) {
                                                $count = 0;                              
                                                foreach($loan as $row){ ?>
                                                <tr>
                                                    <td><?= ++$count; ?></td>
                                                    <td>
                                                        <?php echo ($row['lender_id']) ? get_user($row['lender_id'])->username : '--Not Assigned--'; ?>                                    
                                                    </td>                                                    
                                                    <td>
                                                        <?php echo isset($row['amount']) ? $row['amount'] : '';   ?>
                                                    </td>
                                                    <td>
                                                        <?php echo isset($row['duration']) ? $row['duration'] : '';   ?>
                                                    </td>
                                                    <td>
                                                        <?php echo isset($row['rate']) ? $row['rate'] : '';   ?>
                                                    </td>
                                                    <td>
                                                        <?php echo isset($row['due_amount']) ? $row['due_amount'] : '';   ?>
                                                    </td>
                                                    <td>
                                                        <?php echo isset($row['created_at']) ? date('d M Y h:i:s',strtotime($row['created_at'])) : '';   ?>
                                                    </td>
                                                    <td>
                                                        <?php if($row['status'] == '0') { echo '<button class="btn btn-primary">Pending</button>'; }  ?>
                                                        <?php if($row['status'] == '1') { echo '<button class="btn btn-success">Running</button>'; }  ?>
                                                        <?php if($row['status'] == '2') { echo '<button class="btn btn-danger">Declined</button>'; }  ?>
                                                        <?php if($row['status'] == '3') { echo '<button class="btn">Completed</button>'; }  ?>
                                                        <?php if($row['status'] == '4') { echo '<button class="btn btn-primary">Pending</button>'; }  ?>
                                                    </td>
                                                    <td>
                                                        <?php if($row['status'] == '1') { ?>
                                                            <a href="<?php echo site_url('loan/send_back_money/'.$row['id']);?>"><button class="btn btn-primary" <?php if($row['status'] != 1) echo 'disabled';?>>Send Money</button></a>                                                        
                                                        <?php }else{  ?>
                                                        -----
                                                        <?php } ?>
                                                    </td>
                                                </tr>                          
                                        <?php   }
                                            } ?>
                                    </tbody>                                    
                                </table>                            
                            </div>
                        </div>
                    </div>
                            
