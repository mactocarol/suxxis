<section class="cumber_lne">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="cumber_head park_lne text-center">
              <h2>Complete payment</h2>
            </div>
          </div>
        </div>
        <div class="payment_tb">
        	<div class="row">
        		<div class="col-md-12">
        			<table class="table table-bordered">
					    <tbody>
					      <tr>
					        <th>Model</th>
					        <td><a href="<?php echo site_url('');?>"><?php echo $car->title;?></a></td>
					      </tr>
					      <tr>
					        <th>Arriving on</th>
					        <td><?php echo ($fdate) ? date('d M Y h:i:s',strtotime($fdate)): ''; ?></td>
					      </tr>
					      <tr>
					        <th>Departing on</th>
					        <td><?php echo ($ldate) ? date('d M Y h:i:s',strtotime($ldate)): ''; ?></td>
					      </tr>
					      <tr>
					        <th>Pick up Location</th>
					        <td><?=($pickup) ? $pickup : ''; ?></td>
					      </tr>
                          <tr>
					        <th>Drop off Location</th>
					        <td><?=($dropoff) ? $dropoff : ''; ?></td>
					      </tr>
					      <tr>
					        <th>Total Price</th>
					        <td>$<?=($price) ? $price : 'Free'?></td>
					      </tr>
					    </tbody>
					  </table>
        		</div>
        	</div>
            <div class="col-md-12">
                <div class="">
                                
                        <h5>Choose Payment Method</h5>
                                                            
        
                                 <form action="<?php echo base_url().'Book'; ?>" method="post">
                                    
                                    <input type="hidden" name="currency_code" value="USD">
                                    
                                    <input type="hidden" name="fdate" value="<?=$fdate?>">
                                    <input type="hidden" name="ldate" value="<?=$ldate?>">
                                    <input type="hidden" name="car_id" value="<?=$car->id?>">
                                    <input type="hidden" name="pickup" value="<?=$pickup?>">
                                    <input type="hidden" name="dropoff" value="<?=$dropoff?>">
                                    
                                    <input type="hidden" name="amount" id="amount" value="<?=$price?>">                                
                                    
                                
                                    <div class="">
                                    <br>                                    
                                    Paypal <input type="radio" name="payment_method" value="paypal" checked><br>
                                    <br>
                                    <input type="submit" id="onetime" class="btn btn-primary" name="Update_profile" value="Pay">
                                    <a href="<?php echo site_url('Booking/'.$car->id);?>"><input type="button" id="onetime" class="btn btn-primary" name="Update_profile" value="Back"></a>
                                    <br>
                                    </div>
                                </form>
                     
                    </div>
            </div>
        </div>
      </div>
    </section>