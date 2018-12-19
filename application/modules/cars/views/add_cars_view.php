<?php $this->load->view('admin/includes/sidebar'); ?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Cars
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('admin/dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Cars</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">      
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        
         
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
                  
        <section class="col-lg-12 connectedSortable">
                <button class="btn btn-danger"><a href="<?php echo base_url(); ?>cars" style="color:white">List Cars</a></button>&nbsp;
               <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Add Car</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <form role="form" id="car_form" name="" method="post" action="<?php echo base_url().'cars/add'; ?>" enctype="multipart/form-data">
                        <!-- text input -->
                        <section class="col-lg-12 connectedSortable">
                             <div class="form-group">
                                <label>Model <small>(required)</small></label>
                                <input type="text" class="form-control" name="title" placeholder="Cars Model (eg. Ford Fiesta)" value="">
                             </div>
                             <div class="form-group">
                                <label>Description </label>                                
                                <textarea name="editor1" id="editor1" class="form-control"></textarea>
		
                             </div>
                             <div class="form-group">
                                <label>Transmision <small>(required)</small></label>
                                <select class="select2 form-control" id="transmission" data-max-options="3" data-live-search="true" name="transmission">                                  
                                      <option value="">Select Transmission</option>
                                      <option value="1">Automatic</option>
																			<option value="0">Manual</option>                                      
                                  
                                </select>
                             </div>
														 <div class="form-group">
                                <label>Category <small>(required)</small></label>
                                <select class="select2 form-control" id="category" data-max-options="3" data-live-search="true" name="category">                                  
                                      <option value="">Select Category</option>
                                      <option value="Luxury Car">Luxury Car</option>
																			<option value="Sporty Car">Sporty Car</option>
																			<option value="Old Car">Old Car</option>                                                                        
                                </select>
                             </div>
														 <div class="form-group">
                                <label>Fuel Type <small>(required)</small></label>
                                <select class="select2 form-control" id="fuel_type" data-max-options="3" data-live-search="true" name="fuel_type">                                  
                                      <option value="">Select Fuel Type</option>
                                      <option value="Petrol">Petrol</option>
																			<option value="Diesel">Diesel</option>																			
                                </select>
                             </div>
														 <div class="form-group">
                                <label>Image <small>(required)</small></label>
                                <input type="file" class="form-control" name="image[]" value="" multiple>
                             </div>
														 <div class="from-group">
															<label>Price / Day</label>
																<div class="table-responsive mytb">
																	<table class="table table-bordered">
																		<thead>
																			<th colspan="7">Number Of Days</th>
																		</thead>
																	<tbody>
																		<tr>
																			<td><span>1</span><div>
																				<input type="number" name="price[]" class="num"  min="1">
																			</div></td>
																			<td><span>2</span><div>
																				<input type="number" name="price[]" class="num"  min="1">
																			</div></td>
																			<td><span>3</span><div>
																				<input type="number" name="price[]" class="num"  min="1">
																			</div></td>
																			<td><span>4</span><div>
																				<input type="number" name="price[]" class="num"  min="1">
																			</div></td>
																			<td><span>5</span><div>
																				<input type="number" name="price[]" class="num"  min="1">
																			</div></td>
																			<td><span>6</span><div>
																				<input type="number" name="price[]" class="num"  min="1">
																			</div></td>
																			<td><span>7</span><div>
																				<input type="number" name="price[]" class="num"  min="1">
																			</div></td>
															
																		</tr>
																		<tr>
																			<td><span>8</span><div>
																				<input type="number" name="price[]" class="num"  min="1">
																			</div></td>
																			<td><span>9</span><div>
																				<input type="number" name="price[]" class="num"  min="1">
																			</div></td>
																			<td><span>10</span><div>
																				<input type="number" name="price[]" class="num"  min="1">
																			</div></td>
																			<td><span>11</span><div>
																				<input type="number" name="price[]" class="num"  min="1">
																			</div></td>
																			<td><span>12</span><div>
																				<input type="number" name="price[]" class="num"  min="1">
																			</div></td>
																			<td>13<div>
																				<input type="number" name="price[]" class="num" min="1">
																			</div></td>
																			<td><span>14</span><div>
																				<input type="number" name="price[]" class="num"  min="1">
																			</div></td>
																		</tr>
																		<tr>
																			<td><span>15</span><div>
																				<input type="number" name="price[]" class="num"  min="1">
																			</div></td>
																			<td><span>16</span><div>
																				<input type="number" name="price[]" class="num"  min="1">
																			</div></td>
																			<td><span>17</span><div>
																				<input type="number" name="price[]" class="num"  min="1">
																			</div></td>
																			<td><span>18</span><div>
																				<input type="number" name="price[]" class="num"  min="1">
																			</div></td>
																			<td><span>19</span><div>
																				<input type="number" name="price[]" class="num"  min="1">
																			</div></td>
																			<td><span>20</span><div>
																				<input type="number" name="price[]" class="num"  min="1">
																			</div></td>
																			<td><span>21</span><div>
																				<input type="number" name="price[]" class="num"  min="1">
																			</div></td>
																		</tr>
																		<tr>
																			<td><span>22</span><div>
																				<input type="number" name="price[]" class="num"  min="1">
																			</div></td>
																			<td><span>23</span><div>
																				<input type="number" name="price[]" class="num"  min="1">
																			</div></td>
																			<td><span>24</span><div>
																				<input type="number" name="price[]" class="num"  min="1">
																			</div></td>
																			<td><span>25</span><div>
																				<input type="number" name="price[]" class="num"  min="1">
																			</div></td>
																			<td><span>26</span><div>
																				<input type="number" name="price[]" class="num"  min="1">
																			</div></td>
																			<td><span>27</span><div>
																				<input type="number" name="price[]" class="num"  min="1">
																			</div></td>
																			<td><span>28</span><div>
																				<input type="number" name="price[]" class="num"  min="1">
																			</div></td>
																		</tr>
																		<tr>
																			<td><span>29</span><div>
																				<input type="number" name="price[]" class="num"  min="1">
																			</div></td>
																			<td><span>30</span><div>
																				<input type="number" name="price[]" class="num"  min="1">
																			</div></td>
																			<td><span>31</span><div>
																				<input type="number" name="price[]" class="num"  min="1">
																			</div></td>
																			<td></td>
																			<td></td>
																			<td></td>
																			<td></td>
																		</tr>
																	</tbody>
																</table>
															</div>
														 </div>
                             <div class="box-footer">
                                <input type="submit" class="btn btn-primary" name="Update_profile" value="Add">
                                
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
	
	<script>
        $('#car_form').bootstrapValidator({
            //container: '#messages',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                title: {
                    validators: {
                        notEmpty: {
                            message: 'This field is required'
                        },
                    }
                },
                editor1: {
                    validators: {
                        notEmpty: {
                            message: 'This field is required'
                        },
                    }
                },
                transmission: {
                    validators: {
                        notEmpty: {
                            message: 'This field is required'
                        },
                    }
                },
								fuel_type: {
                    validators: {
                        notEmpty: {
                            message: 'This field is required'
                        },
                    }
                },
								category: {
                    validators: {
                        notEmpty: {
                            message: 'This field is required'
                        },
                    }
                },
								image: {
                    validators: {
                        notEmpty: {
                            message: 'This field is required'
                        },
                    }
                },
            }
        });
    </script>
