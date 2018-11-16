<footer>
				<div class="container">
					<div class="row">
						<div class="col-md-3 col-sm-6">
							
								<div class="title-block">
									<h4>About Suxxis</h4>
									
								</div>
								<ul class="imp-link">
									<li><a href="#">work for us</a></li>
									<li><a href="<?php echo site_url('Contact-us');?>">contact us</a></li>
									<li><a href="<?php echo site_url('Faq');?>">FAQ's</a></li>
									
									<li><a href="#">Testimonials</a></li>

								</ul>
							
							
						</div>
                        <div class="col-md-3 col-sm-6">
							
								<div class="title-block">
									<h4>services</h4>
									
								</div>
								<ul class="imp-link">
									<li><a href="<?php echo site_url('Risk-management');?>">Risk Management</a></li>
                                    <li><a href="<?php echo site_url('How-it-works');?>">How It Works </a></li>
                                    <li><a href="<?php echo site_url('Peer-to-peer');?>">Peer to Peer Lending Program  </a></li>

								</ul>
							
							
						</div>
						
						<div class="col-md-3 col-sm-6">
							
								<div class="title-block">
									<h4>Business Hours	</h4>
									
								</div>
								<ul class="imp-link">
									<li>Monday - Friday 9am - 5pm </li>
                                    <li>Saturday - 10am - 2pm</li>
                                    <li>Sunday - Closed  </li>

								</ul>
							
						</div>
						<div class="col-md-3 col-sm-6">
							
								<div class="title-block">
									<h4>Connecting People </h4>
									
								</div>
								<img src="<?php echo base_url('assets/front');?>/images/footer-map.png" class="img-responsive" alt="Image">
                               
                               
							</div>
						
                        
                        <div class="col-md-12 col-sm-12 social_panel">
                        	<div class="col-md-5"><img src="<?php echo base_url('assets/front');?>/images/live_chat.png" class="chat_img"> Live Chat Support Available 24 Hours A Day</div>
                            <div class="col-md-3 col-sm-6"> <ul class="footer-social">
									<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
								</ul></div>
                                
                                <div class="col-md-2 col-sm-6"><a href="https://vergecurrency.com/" class="comp_logo"><img src="<?php echo base_url('assets/front');?>/images/verge-logo.png"></a> </div>
                        </div>
                        
                        
					</div>
				</div>
			</footer>

<section class="bottom_footer">
				<div class="container">
					<div class="col-md-6 col-sm-8">
									<p><a href="<?php echo site_url('');?>"><img src="<?php echo base_url('assets/front');?>/images/footer-logo.png" width="200px"> </a>© 2018 Suxxis - All Rights Reserved  
</span></p>
								</div>
						<div class="col-md-3 col-sm-4 pull-right">
									<ul>
                                    	<li><a href="#">Site Map </a></li>

										<li><a href="#">Privacy Policy    </a></li>
										
									</ul>
						</div>
								
							</div>
						
					</div>
				</div>
			</section>

	    <!-- Placed at the end of the document so the pages load faster -->
	    <script src="<?php echo base_url('assets/front');?>/js/jquery.min.js"></script>
	   <script src="<?php echo base_url('assets/front');?>/js/bootstrap.min.js"></script>
	     
	     <script>
		 	$(document).ready(function() {   
	            var sideslider = $('[data-toggle=collapse-side]');
	            var sel = sideslider.attr('data-target');
	            var sel2 = sideslider.attr('data-target-2');
	            sideslider.click(function(event){
	                $(sel).toggleClass('in');
	                $(sel2).toggleClass('out');
	            });
	        });
		 </script>
		 <script src="<?php echo base_url('assets/front');?>/js/owl.carousel.js"></script>
<script>
$(document).ready(function(){
	$('.owl-carousel').owlCarousel({
		loop:true,
		margin:10,
		items:1,
		responsiveClass:true,

		responsive:{
			0:{
				items:1,
				nav:true
			},
			600:{
				items:1,
				nav:false
			},
			1000:{
				items:1,
				nav:true,
				loop:false,
				margin:20
			}
		}
	})
	
	
	
	
})
</script>
<script src="<?php echo base_url('assets/front');?>/js/aos.js"></script>

		<script>
			AOS.init({
				easing: 'ease-out-back',
				duration: 1000
			});
		</script>
<script>
(function() {

  'use strict';

  // define variables
  var items = document.querySelectorAll(".timeline li");

  // check if an element is in viewport
  // http://stackoverflow.com/questions/123999/how-to-tell-if-a-dom-element-is-visible-in-the-current-viewport
  function isElementInViewport(el) {
    var rect = el.getBoundingClientRect();
    return (
      rect.top >= 0 &&
      rect.left >= 0 &&
      rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
      rect.right <= (window.innerWidth || document.documentElement.clientWidth)
    );
  }

  function callbackFunc() {
    for (var i = 0; i < items.length; i++) {
      if (isElementInViewport(items[i])) {
        items[i].classList.add("in-view");
      }
    }
  }

  // listen for events
  window.addEventListener("load", callbackFunc);
  window.addEventListener("resize", callbackFunc);
  window.addEventListener("scroll", callbackFunc);

})();
</script>

	  </body>
	</html>
