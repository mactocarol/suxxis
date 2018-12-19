<?php $this->load->view('admin/includes/sidebar'); ?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        List Partner's Cars
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('admin/dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">List Partner's Cars</li>
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
                <button class="btn btn-danger"><a href="<?php echo base_url(); ?>admin/AddPartner" style="color:white">Add New Partner</a></button>&nbsp;
               <div class="box">
                <div class="box-header">
                  <h3 class="box-title">List Partner's Cars</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                      <th>Sr. No.</th>                        
                      <th>UserName</th>
                      <th>Email</th>                                            
                      <th>Status</th>
                      <th style="width:5px">Cars</th>                    
                      <th style="width:5px">Action</th>                    
                    </tr>
                    </thead>
                    <tbody>
                          <?php if(isset($results)) {
                                $count = 0;                              
                                foreach($results as $row){ ?>
                            <tr>
                                <td><?= ++$count; ?></td>
                                <td>
                                    <?php echo isset($row['username']) ? $row['username'] : ''; ?>                                    
                                  </td>
                                <td>
                                    <?php echo isset($row['email']) ? $row['email'] : '';   ?>
                                </td>                               
                                
                                <td>
                                    <?php echo ($row['is_verified'] == 1) ? '<a href="'.site_url('admin/status/'.$row['is_verified'].'/'.$row['id']).'"><button class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i></button></a>' : '<a href="'.site_url('admin/status/'.$row['is_verified'].'/'.$row['id']).'"><button class="btn btn-danger"><i class="fa fa-close" aria-hidden="true"></i></button></a>';   ?>
                                </td>
                                <td>
                                    <a href="<?php echo base_url(); ?>admin/PartnerCars/<?php echo $row['id'];?>"><i class="fa fa-eye" aria-hidden="true"></i></a>                                
                                </td> 
                                <td>
                                    <a href="<?php echo base_url(); ?>admin/EditPartner/<?php echo $row['id'];?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                    <a href="<?php echo base_url(); ?>admin/DeletePartner/<?php echo $row['id'];?>" onclick=" var c = confirm('Are you sure want to delete?'); if(!c) return false;"><i class="fa fa-close" aria-hidden="true"></i></a>&nbsp;&nbsp;                                    
                                </td>                                
                            </tr>                          
                    <?php  } }?>                      
                                                       
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
  