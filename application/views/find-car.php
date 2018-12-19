<section class="row page-cover">
  		<div class="container">
  			<h2 class="h1 page-title">Car Listing</h2>
  			<ol class="breadcrumb">
  				<li><a href="index.html">home</a></li>
  				<li class="active">Car Listing</li>
  			</ol>
  		</div>
  	</section>
    
 <section class="car_listing_outer">
 	<div class="container">
    <div class="row">
    	<div class="col-md-3 col-sm-4">
	<form method="post" action="<?php echo site_url('Find-car'); ?>">
        	<div class="car_filter_box" id="task_flyout">
             <div class="filter_toggle_click">
            	<h4 class="widget-title">Filter Cars</h4>
              </div>
                <div class="filter_toggle">
				
		<div class="widget-inner">
                	<div class="form-group">
                	<label>Car Category</label>
                    <div class="advanced_search_row">
                        <select name="category" data-size="7" data-live-search="true" class="selectpicker" data-title="type" id="type" data-width="100%">
                        <option value="Luxury car" selected>Luxury car</option>
                        <option value="Sporty Car">Sporty Car</option>
                        <option value="Old car">Old car</option>
                        <option value="Other Type">Other Type</option> 
                        </select>
                    </div>
                   </div>
                </div>
				
				
                <div class="widget-inner">
                	<div class="form-group">
                	<label>Transmission type</label>
                    <div class="advanced_search_row">
                        <select name="transmission" data-size="7" data-live-search="true" class="selectpicker  " data-title="Manual" id="brand" data-width="100%">   
                        <option value="0">Manual </option>
                        <option value="1">Automatic</option>
                        
                        </select>
                    </div>
                   </div>
                </div>
                  
               
                
               
                <div class="widget-inner mar_50bt">
                	<div class="form-group">
                	<label>Fuel  type</label>
                    <div class="advanced_search_row">
                        <select name="fuel_type" data-size="7" data-live-search="true" class="selectpicker  " data-title="Engine" id="Engine" data-width="100%">
                        <option value="Petrol" selected>Petrol </option>
                        <option value="Diesel">Diesel</option>
                       
                        </select>
                    </div>
                   </div>
                </div>               
                
                <button type="submit" class="btn btn-primary">Apply</button>
                </div>
            </div>
            
            
           </form> 
            
        </div>
        
        <div class="col-md-9 col-sm-8">
        	<div class="sorting_panel ">
            		<div class="show_panel">
                    	<label>Show</label>
                    	 <div class="advanced_search_row">
                        <select data-size="7" class="selectpicker  " >
                        <option value="1" selected>10 </option>
                        <option value="2">20</option>
                        <option value="3">30 </option>
                        <option value="4">All</option> 
                        </select>
                    </div>
                    </div>
                    
                    <div class="sort_panel">
                    	 <div class="advanced_search_row">
                        <select data-size="7" class="selectpicker  " >
                        <option value="popularity" selected="selected">Sort by popularity</option><option value="rating">Sort by average rating</option><option value="date">Sort by latest</option><option value="price">Sort by price: low to high</option><option value="price-desc">Sort by price: high to low</option>  
                        </select>
                    </div>
                    </div>
                    
            </div>
            
            <div class="car_listing_inner">
		<?php if(!empty($cars)) {
                foreach($cars as $row){?>  
            	<div class="car-list row">
                	<div class="col-md-4 col-sm-4">
				<?php if(isset($row['image']) && !empty($row['image'])) {?>
				<a href="<?php echo site_url('Car-Detail/'.$row['id']);?>"><img src="<?php echo base_url('upload/'.$row['image'][0]);?>"></a>
				<?php } else { ?>
				<a href="<?php echo site_url('Car-Detail/'.$row['id']);?>"><img src="<?php echo base_url('upload/no-car.jpg');?>"></a>
				<?php } ?>
			</div>
			<div class="col-md-8 col-sm-8">
			    <div class="car-list-body">
				    <div class="car-list-header">
					<div class="col-md-8 col-sm-8">
					    <div class="row car-list-left">
						<h2 class="rent">$<?=json_decode($row['price'])[0]->k1?><sub>/day</sub></h2>
						<h6 class="reviews">
							<i class="fa fa-star-o starred"></i>
							<i class="fa fa-star-o starred"></i>
							<i class="fa fa-star-o starred"></i>
							<i class="fa fa-star-o"></i>
							<i class="fa fa-star-o"></i> 
							(5 reviews)
						</h6>
						</div>
					    
					    <h4 class="vehicle-title row"><?=$row['title']?></h4>
					</div>
					<div class="col-md-4 col-sm-4">
					    <div class="row car-list-right">
						<a href="<?php echo site_url('Booking/'.$row['id']);?>">Booking <i class="fa fa-key"></i></a>
					    </div>
					</div>
					
					
				</div>
				<div class="col-md-12">
				<div class="car-list-highlight row">
				    <h2>Highlights</h2>
				    <ul>
					<li>Automatic transmission: <?php echo ($row['transmission']) ? 'Yes' : 'No'; ?></li>
					<li>Category: <?=$row['category']?> </li>
					<li>Fuel type: <?=$row['fuel_type']?> </li>
				    </ul>
				</div>
				</div>
				 <div class="col-md-12">
				<div class="car-list-specifications row">
				    <h2 data-toggle="collapse" data-target="#specifications1">specifications</h2>
				    <ul id="specifications1" class="collapse">
					       <li>Engine: 2000 cm3</li>
					   <li> Stock status: In stock</li>
					   <li> Horsepower: 180 hp</li>
					   <li> Color: black</li>
					   <li> Interior Color: blue</li>
					   <li> Condition: New</li>
					   <li> Doors : 4 doors</li>
					   <li> February 2, 2016</li>
    
				    </ul>
				</div>
				</div>
				
			    </div>
			</div>
                	</div>
                        <?php } } else { ?>                                                    
                        <div class="col-md-4 col-sm-4">
				<h3>No Match Found</h3>
			</div>
			<?php } ?>
           	 </div>
             
             
             
            
            
        </div>
        </div>
        
    </div>
</section>



 <section class="add-banner">
 	<div class="container">
    <div class="row">
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
    </div>
 </section>