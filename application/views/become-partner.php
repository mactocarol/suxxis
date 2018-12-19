<section class="car_rent">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <form method="post" name="registration" id="registration" action="<?php echo site_url('partner/add'); ?>" enctype="multipart/form-data">
			<!--<div class="form-group">
                  Update Company Info
                  <input type="checkbox"  id="companyinfo" name="companyinfo">
                </div>-->
			<div id="partner_info">
              <div class="credit abtyu">
             <h4>About Partner</h4>
            </div>
            <div class="row">
                  <div class="col-md-4">
                    <label for="name">Company Name</label>
                   <div class="form-group">
                      <input type="text" class="form-control" id="company_name" placeholder="Company Name" name="company_name" value="<?php echo isset($companyinfo->company_name) ? $companyinfo->company_name : ''; ?>">
                   </div>
                  </div>
                  <div class="col-md-4"><label for="name">Company Vat Number</label>
                   <div class="form-group">
                      <input type="text" class="form-control" id="vat_number" placeholder="Company Vat Number" name="vat_number" value="<?php echo isset($companyinfo->vat_number) ? $companyinfo->vat_number : ''; ?>">
                   </div></div>
                  <div class="col-md-4">
                    <label for="name">Phone Number</label>
                   <div class="form-group">
                      <input type="text" class="form-control" id="phone_number" placeholder="Phone Number" name="phone_number" value="<?php echo isset($companyinfo->phone_number) ? $companyinfo->phone_number : ''; ?>">
                   </div>
                  </div>
                </div>
                <div class="row">
                           <div class="col-md-4">
                              <label for="email">Street No.</label>
                              <div class="form-group">
                                 <input type="text" class="form-control" id="street" placeholder="Company Address" name="street" value="<?php echo isset($companyinfo->street) ? $companyinfo->street : ''; ?>">
                              </div>
                           </div>
                           <div class="col-md-8">
                              <label for="email">Street Address</label>
                              <div class="form-group">
                                 <input type="text" class="form-control" id="address" placeholder="Street Address" name="address" value="<?php echo isset($companyinfo->address) ? $companyinfo->address : ''; ?>">
                              </div>
                           </div>
                      </div>
                      <div class="row">
                              <div class="col-md-6">
                                 <label for="email">Country</label>
                                 <div class="form-group">
                               <div class="select">
                                <select class="selectpicker" data-style="btn-info custom" id="country" data-max-options="3" data-live-search="true" name="country">
                                  <optgroup label="Web">
                                      <option value="">Select Country</option>
                                      <option <?php echo (isset($companyinfo->country) && $companyinfo->country == 'United Kingdom') ? 'selected' : ''; ?>>United Kingdom</option>
                                      <option <?php echo (isset($companyinfo->country) && $companyinfo->country == 'India') ? 'selected' : ''; ?>>India</option>
                                      <option <?php echo (isset($companyinfo->country) && $companyinfo->country == 'Australia') ? 'selected' : ''; ?>>Australia</option>
                                      <option <?php echo (isset($companyinfo->country) && $companyinfo->country == 'Canada') ? 'selected' : ''; ?>>Canada</option>
                                      <option <?php echo (isset($companyinfo->country) && $companyinfo->country == 'United Kingdom') ? 'selected' : ''; ?>>United Kingdom</option>
                                  </optgroup>
                                </select>
                              </div>
                            </div>
                              </div>
                              <div class="col-md-6">
                              <label for="email">State</label>
                              <div class="form-group">
                                 <div class="select">
                                <select class="selectpicker" data-style="btn-info custom" id="state"  data-max-options="3" data-live-search="true" name="state">
                                  <optgroup label="Web">
                                      <option value="">Select State</option>
                                      <option <?php echo (isset($companyinfo->state) && $companyinfo->state == 'United Kingdom') ? 'selected' : ''; ?>>United Kingdom</option>
                                      <option <?php echo (isset($companyinfo->state) && $companyinfo->state == 'India') ? 'selected' : ''; ?>>India</option>
                                      <option <?php echo (isset($companyinfo->state) && $companyinfo->state == 'Australia') ? 'selected' : ''; ?>>Australia</option>
                                      <option <?php echo (isset($companyinfo->state) && $companyinfo->state == 'Canada') ? 'selected' : ''; ?>>Canada</option>
                                      <option <?php echo (isset($companyinfo->state) && $companyinfo->state == 'United Kingdom') ? 'selected' : ''; ?>>United Kingdom</option>
                                  </optgroup>
                                </select>
                              </div>
                              </div>
                           </div>
                              </div>
                      <div class="row">
                           <div class="col-md-6">
                              <label for="email">City</label>
                              <div class="form-group">
                                 <input type="text" class="form-control" id="city" placeholder="City" name="city" value="<?php echo isset($companyinfo->city) ? $companyinfo->city : ''; ?>">
                              </div>
                           </div>
                           <div class="col-md-6">
                              <label for="email">Postal Code</label>
                              <div class="form-group">
                                 <input type="text" class="form-control" id="zipcode" placeholder="Postal Code" name="zipcode" value="<?php echo isset($companyinfo->zipcode) ? $companyinfo->zipcode : ''; ?>">
                              </div>
                           </div>
                        </div>
			</div>
			
                        <div class="credit abtyu">
             <h4><span>Car</span> Information</h4>
            </div>
                 <div class="form-group">
					<label for="comment">Car Model</label>
				  <div class="select">
				   <select class="selectpicker" data-style="btn-info custom" id="title"  data-max-options="3" data-live-search="true" name="title">					 
						 <option value="">Select Model</option>
						 <?php if(!empty($cars)) { ?>
							<?php foreach($cars as $car) {?>
								<option value="<?=$car['id']?>"><?=$car['title']?></option>
							<?php } ?>
						 <?php } ?>						 
				   </select>
				 </div>

                <div class="form-group">
                <label for="comment">Description</label>
                <textarea class="form-control" rows="5" id="description" name="description"></textarea>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="title">Year</label>
                          <input type="text" class="form-control" placeholder="Year of Manufacture" name="year" id="year">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="title">Number Of Car For Rent</label>
                          <input type="number" min="1" class="form-control"placeholder="Number Of Car For Rent" name="no_of_cars" id="no_of_cars">
                        </div>
                    </div>
                    </div><!--End of row -->
                    
                    <div class="row">
                    <div class="col-md-12">
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
                        <!--<div class="form-group">
                          <label for="title">Price</label>
                          <input type="number" class="form-control" id="price" placeholder="Price" name="price">
                        </div>-->

                    </div>
                    
                </div><!-- End of row -->
                

                <div class="row">
                    <div class="col-md-12">
                        <div class="dash_sbt sec Dash_brd_sbt">
                                    <button type="submit" class="verfy">Submit Car</button>
                                </div>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</section>


<script src="<?php echo base_url();?>/assets/js/bootstrapValidator.min.js"></script>
 <script>
    $(document).ready(function() {
	//alert('http://localhost/caroldata.com/hmvc_hotel_booking/registration/register_email_exists');
    $('#registration').bootstrapValidator({
        //container: '#messages',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {            
            company_name: {
                validators: {
					notEmpty: {
						message : 'This Field is required.'
					}
				},
			},
            vat_number: {
                validators: {
					notEmpty: {
						message : 'This Field is required.'
					}
				},
			},
            phone_number: {
                validators: {
					notEmpty: {
						message : 'This Field is required.'
					}
				},
			},
            street: {
                validators: {
					notEmpty: {
						message : 'This Field is required.'
					}
				},
			},
            address: {
                validators: {
					notEmpty: {
						message : 'This Field is required.'
					}
				},
			},
            country: {
                validators: {
					notEmpty: {
						message : 'This Field is required.'
					}
				},
			},
            state: {
                validators: {
					notEmpty: {
						message : 'This Field is required.'
					}
				},
			},
            city: {
                validators: {
					notEmpty: {
						message : 'This Field is required.'
					}
				},
			},
            zipcode: {
                validators: {
					notEmpty: {
						message : 'This Field is required.'
					}
				},
			},
            title: {
                validators: {
					notEmpty: {
						message : 'This Field is required.'
					}
				},
			},
            description: {
                validators: {
					notEmpty: {
						message : 'This Field is required.'
					}
				},
			},
            transmission: {
                validators: {
					notEmpty: {
						message : 'This Field is required.'
					}
				},
			},
            no_of_cars: {
                validators: {
					notEmpty: {
						message : 'This Field is required.'
					}
				},
			},
            category: {
                validators: {
					notEmpty: {
						message : 'This Field is required.'
					}
				},
			},
            fuel_type: {
                validators: {
					notEmpty: {
						message : 'This Field is required.'
					}
				},
			},
            price: {
                validators: {
					notEmpty: {
						message : 'This Field is required.'
					}
				},
			},
            image: {
                validators: {
					notEmpty: {
						message : 'This Field is required.'
					}
				},
			},
						
        }
    });

});
</script>