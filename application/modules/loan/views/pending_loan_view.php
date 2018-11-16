<div id="wrapper" class="toggled">
    <div class="container-fluid">
        <!-- Sidebar -->
        <?php $this->load->view('admin/includes/sidebar');?> 
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="breadcum_outer">
                              <ul>
                                  <li><a href="#">Home</a></li>
                                  <li>Pending Loan Request</li>
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
                        <div class="dashboard-list-box profile-info-admin with-icons margin-top-20">
                            <h4>Pending Loan Request</h4>
                            <div class="dashboard-table-outer col-md-12">
                                <table id="example" class="display" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Sr. No.</th>                        
                                            <th>UserName</th>                                            
                                            <th>Amount</th>
                                            <th>Duration (in days)</th>
                                            <th>Rate (in %)</th>
                                            <th>Due Amount</th>
                                            <th>Request Date</th>
                                            <th>Status</th>
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
                                                        <?php echo ($row['status'] == '0') ? 'Pending' : 'Decline';   ?>
                                                    </td>
                                                    <td>
                                                        <a href="<?php echo site_url('loan/approve/'.$row['id']);?>" onclick=" var c = confirm('Are you sure want to Approve?'); if(!c) return false;"><button class="btn btn-success" <?php if($row['status'] != 0) echo "disabled";?>>Approve</button></a>
                                                        <a href="<?php echo site_url('loan/decline/'.$row['id']);?>" onclick=" var c = confirm('Are you sure want to Decline?'); if(!c) return false;"><button class="btn btn-danger" <?php if($row['status'] != 0) echo "disabled";?>>Decline</button></a>
                                                    </td>
                                                </tr>                          
                                        <?php   }
                                            } ?>
                                    </tbody>                                    
                                </table>                            
                            </div>
                        </div>
                    </div>
                            
