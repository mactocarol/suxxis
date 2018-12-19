<section class="row page-cover">
  		<div class="container">
  			<h2 class="h1 page-title"> Car Detail</h2>
  			<ol class="breadcrumb">
  				<li><a href="index.html">home</a></li>
  				<li class="active">Car Detail</li>
  			</ol>
  		</div>
  	</section>
     <section class="car-detail ">
     	<div class="container">
        	<div class="col-md-4 col-sm-4">
            <div class="single_car_header_price">
				<span id="single_car_price"><span class="single_car_currency">$</span><span class="single_car_price"><?=$car['price']?></span></span>
				<span id="single_car_price_per_unit_change" class="single_car_price_per_unit">
					<span id="single_car_unit">Per Km</span>
					<span class="ti-angle-down"></span>
					
					<ul id="price_per_unit_select">
						
												<li class="active">
							<a class="active" href="javascript:;" data-filter="car_price_day" data-price="&lt;span class=&quot;single_car_currency&quot;&gt;$&lt;/span&gt;&lt;span class=&quot;single_car_price&quot;&gt;64&lt;/span&gt;">Per Day</a>
						</li>
																		<li>
							<a class="active" href="javascript:;" data-filter="car_price_hour" data-price="&lt;span class=&quot;single_car_currency&quot;&gt;$&lt;/span&gt;&lt;span class=&quot;single_car_price&quot;&gt;8&lt;/span&gt;">Per Hour</a>
						</li>
																		<li>
							<a class="active" href="javascript:;" data-filter="car_price_airport" data-price="&lt;span class=&quot;single_car_currency&quot;&gt;$&lt;/span&gt;&lt;span class=&quot;single_car_price&quot;&gt;75&lt;/span&gt;">Airport Transfer</a>
						</li>
											</ul>
				</span>
			</div>
            	<div class="car_filter_box">
                	<form>
                    	<div class="input-group">
								<input type="text" name="name" id="name" class="form-control" placeholder="Your Full Name">
								<span class="input-group-addon"><i class="fa fa-user"></i></span>
							</div>
                            
                            <div class="input-group">
								<input type="email" name="email" id="email" class="form-control" placeholder="Your Email Id">
								<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
							</div>
                            <div class="input-group">
								<input type="tel" name="tel" id="tel" class="form-control" placeholder="Your Phone Number">
								<span class="input-group-addon"><i class="fa fa-phone"></i></span>
							</div>
                            
                            <div class="input-group">
								<input type="text" name="pick_add" id="pick_add" class="form-control" placeholder="Pickup Address">
								<span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
							</div>
                            <div class="input-group">
                           
								<input type="text" name="pick_date"  class="form-control" placeholder="Pickup Date & Time" id='datetimepicker1'>
								<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
							</div>
                             <div class="input-group">
								<input type="text" name="drop_add" id="drop_add" class="form-control" placeholder="Drop Off Address">
								<span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
							</div>
                            <div class="input-group">
								<input type="text" name="drop_date"  class="form-control" placeholder="Drop Off Date & Time" id='datetimepicker1'>
								<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
							</div>
								<button class="btn btn-primary">Book Now</button>
								
                            
                    </form>
                    
                    <div class="form_note">
                    	<div class="col-md-10">This car's been viewed 544 times in the past week</div>
                        <div class="col-md-2"><i class="fa fa-clock-o"></i></div>
                    </div>
					
                    
                    
                </div>
            </div>
            <div class="col-md-8 col-sm-8">
            	
                <section class="slider">
                        <div id="slider" class="flexslider">
                          <ul class="slides">
							<?php if(!empty($car['image'])){
								foreach($car['image'] as $row) { ?>
									<li><img src="<?php echo base_url('upload/'.$row);?>" /></li>
							<?php } } else { ?>
									<li><img src="<?php echo base_url('upload/no-car.jpg');?>" /></li>
							<?php } ?>                                                            
                          </ul>
                        </div>
                        <div id="carousel" class="flexslider">
                          <ul class="slides">
							<?php if(!empty($car['image'])){
								foreach($car['image'] as $row) { ?>
									<li><img src="<?php echo base_url('upload/'.$row);?>" /></li>
							<?php } } else { ?>
									<li><img src="<?php echo base_url('upload/no-car.jpg');?>" /></li>
							<?php } ?>
                          </ul>
                        </div>
                      </section>
                      
                      <h1><?=$car['title']?></h1>
                      <div class="car-rating">
                      	<div class="br-widget">
				<a href="javascript:;" class="fa fa-star"></a><a href="javascript:;" class="fa fa-star"></a><a href="javascript:;" class="fa fa-star"></a><a href="javascript:;" class="fa fa-star"></a><a href="javascript:;" class="fa fa-star"></a>							</div>
                <div class="single_car_attribute_wrapper">
                	<div class="col-md-3">
                    	<p><i class="fa fa-user"></i>  5 Passengers </p>
                    </div>
                    <div class="col-md-3">
                    	<p><i class="fa fa-briefcase"></i> 	2 Luggages  </p>
                    </div>
                     <div class="col-md-3">
                    	<p><i class="fa fa-car"></i> 		4  Doors   </p>
                    </div>
                    
                    <div class="col-md-3">
                    	<p><i class="fa fa-car"></i> 		4  Doors   </p>
                    </div>
                    
                    
                </div>
                <div class="car_feature">
                	<h3>Refueling</h3>
                    <p>Meh synth Schlitz, tempor duis single-origin coffee ea next level ethnic fingerstache fanny pack nostrud. Photo booth anim 8-bit hella, PBR 3 wolf moon beard Helvetica. Salvia esse nihil, flexitarian Truffaut synth art party deep v chillwave. Seitan High Life reprehenderit consectetur cupidatat kogi. Et leggings fanny pack, elit bespoke vinyl art party Pitchfork selfies master cleanse.</p>
                </div>
                <div class="car_feature">
                	<h3>Car Wash</h3>
                    <p>Meh synth Schlitz, tempor duis single-origin coffee ea next level ethnic fingerstache fanny pack nostrud. Photo booth anim 8-bit hella, PBR 3 wolf moon beard Helvetica. Salvia esse nihil, flexitarian Truffaut synth art party deep v chillwave. Seitan High Life reprehenderit consectetur cupidatat kogi. Et leggings fanny pack, elit bespoke vinyl art party Pitchfork selfies master cleanse.</p>
                </div>
                <div class="car_feature">
                	<h3>No Smoking</h3>
                    <p>Meh synth Schlitz, tempor duis single-origin coffee ea next level ethnic fingerstache fanny pack nostrud. Photo booth anim 8-bit hella, PBR 3 wolf moon beard Helvetica. Salvia esse nihil, flexitarian Truffaut synth art party deep v chillwave. Seitan High Life reprehenderit consectetur cupidatat kogi. Et leggings fanny pack, elit bespoke vinyl art party Pitchfork selfies master cleanse.</p>
                </div>
                
                <div class="single_car_departure_wrapper ">
                	<div class="col-md-3"><h3>Included</h3></div>
                    <div class="col-md-9">
                    	<ul>
                        	<li><i class="fa fa-check"></i> Audio input </li>
                            <li><i class="fa fa-check"></i> Bluetooth</li>
                            <li><i class="fa fa-check"></i> Heated seats </li>
                            <li><i class="fa fa-check"></i> All Wheel drive  </li>
                            <li><i class="fa fa-check"></i>USB input  </li>
                            <li><i class="fa fa-check"></i> FM Radio  </li>
                            
                        </ul>
                    </div>
                </div>
                
                
                      </div>
                
                
            </div>
        </div>
    </section>

    <section class="row funfacts">
		<div class="container">
			<div class="row inner">
				<!--Fact-->
				<div class="col-xs-6 col-md-3 fact">
					<div class="inner-fact">
						<div class="this-icon"><i class="fa fa-clock-o"></i></div>
						<div class="this-texts">
							<h2 class="this-counter"><span class="counter">1991</span><sup>+</sup></h2>
							<h5 class="this-about">Hours Saled</h5>
						</div>
					</div>
				</div>
				<!--Fact-->
				<div class="col-xs-6 col-md-3 fact">
					<div class="inner-fact">
						<div class="this-icon"><i class="fa fa-bullseye"></i></div>
						<div class="this-texts">
							<h2 class="this-counter"><span class="counter">69</span></h2>
							<h5 class="this-about">City Park</h5>
						</div>
					</div>
				</div>
				<!--Fact-->
				<div class="col-xs-6 col-md-3 fact">
					<div class="inner-fact">
						<div class="this-icon"><i class="fa fa-paw"></i></div>
						<div class="this-texts">
							<h2 class="this-counter"><span class="counter">581</span></h2>
							<h5 class="this-about">Clients in USA</h5>
						</div>
					</div>
				</div>
				<!--Fact-->
				<div class="col-xs-6 col-md-3 fact">
					<div class="inner-fact">
						<div class="this-icon"><i class="fa fa-dashboard"></i></div>
						<div class="this-texts">
							<h2 class="this-counter"><span class="counter">251</span><sup>+</sup></h2>
							<h5 class="this-about">Cars Storage</h5>
						</div>
					</div>
				</div>
			</div>
		</div>   	
	</section>
    <section class="row banner01 mar_50bt">
		<div class="container">
			<div class="row inner text-center">
				
					<h4 class="this-deliver">DELIVERED AT <u>YOUR DOOR</u></h4>
					<h2 class="this-title">Anytime, any where!</h2>
					<h4 class="this-hire">Hire a car <u>never been easier!</u></h4>
					<a href="#" class="btn btn-outline">RESERVE A CAR</a>
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