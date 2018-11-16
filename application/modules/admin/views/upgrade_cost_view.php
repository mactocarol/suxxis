<?php $this->load->view('admin/includes/sidebar'); ?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Set Upgrade Cost
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('admin/dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Upgrade Cost</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">      
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
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
        <section class="col-lg-12 connectedSortable">
                <!--<button class="btn btn-danger"><a href="<?php echo base_url(); ?>admin/lists" style="color:white">Go to User List</a></button>&nbsp;-->
               <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Upgrade Cost</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <form role="form" id="profile_update_form" name="" method="post" action="<?php echo base_url().'admin/upgrade_cost/'; ?>">
                        <!-- text input -->
                        <section class="col-lg-12 connectedSortable">
                            <?php foreach($reslt as $row) { ?>
                             <div class="form-group">                                
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="level<?php echo isset($row['id'])? $row['id']:'';?>" placeholder="Level Name" value="<?php echo isset($row['level'])? $row['level']:'';?>">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="cost<?php echo isset($row['id'])? $row['id']:'';?>" placeholder="Cost" value="<?php echo isset($row['cost'])? $row['cost']:'';?>">
                                    <input type="hidden" class="form-control" name="id<?php echo isset($row['id'])? $row['id']:'';?>" placeholder="" value="<?php echo isset($row['id'])? $row['id']:'';?>">
                                </div>
                               
                             </div>
                             <br><br>
                             <?php } ?> 
                             
                             <div class="box-footer">
                                <input type="submit" class="btn btn-primary" name="Update_profile" value="Update">
                                
                             </div>
                           </section>
                        
                  </form>
                </div>
               </div>
        </section>
        <!-- /.Left col -->
   
    </div>

    </section>
    <!-- /.content -->
  </div>
