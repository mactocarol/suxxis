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
                                  <li><a href="<?php echo site_url('user/dashboard');?>">Home</a></li>
                                  <li><?=$page?></li>
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
                        <div class="dashboard-list-box margin-top-0">
                        <h4>News</h4>
                        <!-- panel-group -->
        
                        <div class="dashboard-table-outer col-md-12">
                        <table id="example" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Title</th>
                                        <th>Published On</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(!empty($news)) {
                                     $i = 1;   foreach($news as $row) { ?>
                                    <tr>
                                        <td><?=$i?></td>
                                        <td><?=$row['title']?>.</td>
                                        <td><?=date('d-M-Y h:i:s',strtotime($row['created_at']))?></td>
                                        <td><a href="<?php echo base_url(); ?>news/detail/<?php echo $row['id'];?>"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
                                    </tr>
                                    <?php $i++; }} ?>                                    
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No.</th>
                                        <th>Title</th>
                                        <th>Published On</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        
                        </div>
                        
                        
                    </div>
                </div>
        
                            
