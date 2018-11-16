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
                                  <li>Current Loan</li>
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
                            <h4>Current Loans</h4>
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
                                            <th>Date</th>
                                            <th>Status</th>
                                            <!--<th>Action</th>-->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(!empty($recieved)) {
                                                $count = 0;                              
                                                foreach($recieved as $row){ ?>
                                                <tr>
                                                    <td><?= ++$count; ?></td>
                                                    <td>
                                                        <?php echo isset($row['user_id']) ? get_user($row['user_id'])->username : ''; ?>                                                                        
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
                                                        <?php echo isset($row['updated_at']) ? date('d M Y h:i:s',strtotime($row['updated_at'])) : '';   ?>
                                                    </td>
                                                    <td>
                                                        <?php echo ($row['status'] == '1') ? 'Running' : '';   ?>
                                                    </td>                                
                                                </tr>                          
                                        <?php   }
                                            }  ?>
                                    </tbody>                                    
                                </table>                            
                            </div>
                        </div>
                    </div>
                    
                    