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
                                  <li>Dashboard</li>
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
                            <h4>Pending Membership Fee</h4>
                            <div class="dashboard-table-outer col-md-12">
                                <table id="example" class="display" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Sr. No.</th>                        
                                            <th>UserName</th>
                                            <th>Transaction Hash Id</th>
                                            <th>Amount</th>
                                            <th>Payment Date</th>
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
                                                        <?php echo isset($row['txn_hash']) ? $row['txn_hash'] : '';   ?>
                                                    </td>
                                                    <td>
                                                        <?php echo isset($row['amount']) ? $row['amount'] : '';   ?>
                                                    </td>
                                                    <td>
                                                        <?php echo isset($row['created_at']) ? date('d M Y h:i:s',strtotime($row['created_at'])) : '';   ?>
                                                    </td>
                                                    <td>
                                                        <?php echo ($row['status'] == '0') ? 'Pending' : 'Decline';   ?>
                                                    </td>
                                                    <td>
                                                        <a href="<?php echo site_url('upgrade_account/approve/'.$row['id']);?>" onclick=" var c = confirm('Are you sure want to Approve?'); if(!c) return false;"><button class="btn btn-success" <?php if($row['status'] != 0) echo "disabled";?>>Approve</button></a>
                                                        <a href="<?php echo site_url('upgrade_account/decline/'.$row['id']);?>" onclick=" var c = confirm('Are you sure want to Decline?'); if(!c) return false;"><button class="btn btn-danger" <?php if($row['status'] != 0) echo "disabled";?>>Decline</button></a>
                                                    </td>
                                                </tr>                          
                                        <?php   }
                                            } ?>
                                    </tbody>                                    
                                </table>                            
                            </div>
                        </div>
                    </div>
                            
