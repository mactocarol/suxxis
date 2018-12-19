<section class="row page-cover">
  		<div class="container">
  			<h2 class="h1 page-title"></h2>
  			<ol class="breadcrumb">
  				<li><a href="index.html">home</a></li>
  				<li class="active"></li>
  			</ol>
  		</div>
  	</section>
    
 <section class="car_listing_outer">
 	<div class="container">
    	<div class="col-md-4 col-sm-5">
        	<div class="car_filter_box">
            	<img src="<?php echo base_url('assets/front');?>/images/car1.png">
            	<h4 class="widget-title">Why Car Rental</h4>
                
                  <ul>
                	<li><i class="fa fa-check-circle"></i>     No credit card or deposit required</li>
    <li><i class="fa fa-check-circle"></i> NO Excess, No online payment </li>
    <li><i class="fa fa-check-circle"></i> No change or cancellation fees</li>
    <li><i class="fa fa-check-circle"></i> No Airport surcharge for rentals of 7 days or longer</li>
                </ul>
                <br /> <br /> <br />
                <h4 class="widget-title">All our prices include:</h4>
                
                  <ul>
                	<li><i class="fa fa-check-circle"></i>  Insurance with fully comprehensive coverage (SCDW, TW, WDC, TDC) and No Excess</li>
    <li><i class="fa fa-check-circle"></i> Pai (Personal accident insurance) for all ocupants of the vehicle including the driver </li>
    <li><i class="fa fa-check-circle"></i> 24 hour Roadside Assistance </li>
    <li><i class="fa fa-check-circle"></i> Unlimited mileage/km</li>
    <li><i class="fa fa-check-circle"></i> VAT (22%)</li>
                </ul>
                
                
            </div>
            
            
            
            
        </div>
        
        <div class="col-md-8 col-sm-7">
        	
            
            <form id="booking_form" name="booking_form" method="POST" action="<?php echo site_url('Booking/'.$car['id']);?>">
        		 <div class="form-wrap">
                 		
                        <div class="col-md-12">
                        	 <div class="form-group">
                        	<h4>Vehicle</h4>
                        <div class="form-input-icon">
                        	
                            <select name="booking_car" id="booking_car" class="myboxtext">
                                <option value="<?=$car['title']?>" disabled selected="selected"><?=$car['title']?></option>                                
                            </select>
			    <input type="hidden" name="car_id" value="<?=$car['id']?>">
			</div>
                        
                        </div>
                        
                        </div>
                        
                        
               <div class="col-md-6">
                 
                 <div class="form-group">
                        <h4>Pick-up Date/Time</h4>
                        <div class="form-input-icon form-date-box"><input type="text" class="form-control" name="frm_date" placeholder="Date" id="datetimepicker1"><i class="fa fa-calendar"></i></div>
                        <div class="select-box">
                        	<select name="hour_from" id="cr_hour_from" class="crSelect crHourMin"><option value="00">00</option><option value="01">01</option><option value="02">02</option><option value="03">03</option><option value="04">04</option><option value="05">05</option><option value="06">06</option><option value="07">07</option><option value="08">08</option><option value="09" selected="selected">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option></select>
                            
                            <select name="minutes_from" id="cr_minutes_from" class="crSelect crHourMin"><option value="00" selected="selected">00</option><option value="15">15</option><option value="30">30</option><option value="45">45</option></select>
                        </div>
			<span id="frm_date_error" style="color:red"></span>
                 </div>
                 
                  		<div class="form-group location-box">
                        <h4>picking up location</h4>
                        <div class="form-input-icon"><input type="text" class="form-control" name="pickup" placeholder="Location"><i class="fa fa-globe"></i></div>
                 </div>
                 
                 </div>
                  <div class="col-md-6">
                 
                 <div class="form-group">
                        <h4>Return Date/Time</h4>
                        <div class="form-input-icon form-date-box"><input type="text" name="to_date" class="form-control" placeholder="Date" id="datetimepicker2"><i class="fa fa-calendar"></i></div>
                        <div class="select-box">
                        	<select name="hour_from1" id="cr_hour_from1" class="crSelect crHourMin"><option value="00">00</option><option value="01">01</option><option value="02">02</option><option value="03">03</option><option value="04">04</option><option value="05">05</option><option value="06">06</option><option value="07">07</option><option value="08">08</option><option value="09" selected="selected">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option></select>
                            
                            <select name="minutes_from1" id="cr_minutes_from1" class="crSelect crHourMin"><option value="00" selected="selected">00</option><option value="15">15</option><option value="30">30</option><option value="45">45</option></select>
                        </div>
			<span id="to_date_error" style="color:red"></span>
                 </div>
                 
                  		<div class="form-group location-box">
                        <h4> Return location</h4>
                        <div class="form-input-icon"><input type="text" name="dropoff" class="form-control" placeholder="Location"><i class="fa fa-globe"></i></div>
                 </div>
                 
                 </div>
                 
                 <div class="col-md-12">
                 	<p>Funchal Car Hire provides quality rent-a-car services in all Madeira.</p>
                    <p><i class="fa fa-check"></i> Full Insurance - ALL INCLUSIVE (included in price)</p>
                 </div>
                 
                <div class="col-md-12">
                	<div class="row">
                    <div class="total_price">
                       <div class="col-md-12"><h4>Total Price</h4></div>
                    <div class="col-md-4">
                        <div class="form-group location-box">
                          
                            <div class="form-input-icon"><input type="text" class="form-control" id="total_price" placeholder="Total Price" value="" readonly></div>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="form-group location-box">
                            <div class="form-input-icon"><input type="text" class="form-control" placeholder="Currency" readonly><i class="fa fa-eur"></i></div>
                        </div>
                    </div>
                    
                    <div class="col-md-4">                    	
                    </div>
                   
                    </div>
                    </div>
                </div>
                 
                 <div class="col-md-12">
                 <div class="form-ser-btn">
            		<div class="form-group">
                        
                        <button type="button" id="availability" class="btn btn-primary">Check Price & Availabillity</button>
			<button type="submit" class="btn btn-primary">Book Now</button>
                    </div>
                    </div>
             </div>
                 </div>
                 
             
        </form>
             
             
             
            
            
        </div>
        
        
    </div>
</section>



 <section class="add-banner">
 	<div class="container">
    	<div class="col-md-6">
        	<div class="r-sub-banner-in r-sub-dark">
                <span>BLACK CARS DISCOUNT 50%</span>
                <h4>Special Offers For <br><b>Black Friday.</b></h4>
              </div>
        </div>
        <div class="col-md-6">
        	<div class="r-sub-banner-in r-sub-accent">
                <span>MONTHLY SPECIAL OFFER</span>
                <h4>Rent 3 Days &amp; Get <br><b>Free Insurance.</b></h4>
              </div>
        </div>
    </div>
 </section>
 
 <script>
        $('#booking_form').bootstrapValidator({
            //container: '#messages',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                pickup: {
                    validators: {
                        notEmpty: {
                            message: 'This field is required'
                        },
                    }
                },
                dropoff: {
                    validators: {
                        notEmpty: {
                            message: 'This field is required'
                        },
                    }
                },
                frm_date: {
                    validators: {
                        notEmpty: {
                            message: 'This field is required'
                        },
                    }
                },
		to_date: {
                    validators: {
                        notEmpty: {
                            message: 'This field is required'
                        },
                    }
                },           
            }
        });
    </script>
 
	<script>
	$('#availability').on('click',function () {
		//alert();
		    var url = '<?php echo site_url('car/availability'); ?>'; // the script where you handle the form input.
		    
		    $.ajax({
			   type: "POST",
			   url: url,
			   data: $("#booking_form").serialize(), // serializes the form's elements.
			   beforeSend: function() {
				$("#preloader").show();
				$(".pace").show();
			     },
			   success: function(data)
			   {
			      console.log(data); // show response from the php script.
			      var res = JSON.parse(data);
			      
			      if(res.error){
				$('#frm_date_error').html(res.message);				
			      }else if(res.error1){
				console.log('khan '+res.error1);
				$('#frm_date_error').html('');
				$('#to_date_error').html(res.message1);				
			      }else if(res.price){
				$('#frm_date_error').html('');
				$('#to_date_error').html('');
				$('#total_price').val(res.price);
			      }
			      			
			   }
			 });
		
		    e.preventDefault(); // avoid to execute the actual submit of the form.
	    
	});
	</script>