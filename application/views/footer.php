<footer class="footer">
 	<div class="container">
    	<div class="row top">
        	<div class="col-md-3">
            	<h4>Get in Contact</h4>
                <ul class="footer_contact">
                	<li>
                    	<i class="fa fa-map-marker"></i><span class="text">Rock St 12, Newyork City, USA</span>
                    </li>
                    <li>
                    	<i class="fa fa-mobile"></i><span class="text">236-895-4732</span>
                    </li>
                    <li>
                    	<i class="fa fa-envelope"></i><span class="text">carrental@gmail.com</span>
                    </li>
                    <li>
                    	<a href="#" class="link_find_map">Find Us On Map</a>
                    </li>
               </ul>
            </div>
            
            <div class="col-md-3">
            	<h4>Latest Blog</h4>
                <ul class="blog-list">
                    <li><a href="#">Tout Terrain gold city</a>
                        <span class="post-categories">In Motobike</span>
                        <span class="post-date">August 15, 2018</span>
                    </li>
                    <li><a href="#">Car driving a tunnel</a>
                        <span class="post-categories">In Motobike</span>
                        <span class="post-date">August 15, 2018</span>
                    </li>
                    <li><a href="#">How to drive a car ?</a>
                        <span class="post-categories">In Motobike</span>
                        <span class="post-date">August 15, 2018</span>
                    </li>
                </ul>
            </div>
            
              <div class="col-md-3">
                <h4>Usefull Links</h4>
                <ul class="usefull-link">
                    <li><a href="our_partners.html">Our Partners</a></li>
                    <li><a href="#">Careers</a></li>
                    <li><a href="#">Sitemap</a></li>
                    <li><a href="#">Request a Quote</a></li>
                </ul>
               </div>
               
                <div class="col-md-3">
            	<h4>Working Hours</h4>
                
                <div class="ovacrs_working_hour "><div class="title">Sales Department:</div><div class="desc">Monday to Friday: 08.00 to 18.00 <br>Saturday &amp; Sunday: <span>Closed</span></div></div>
                
                <div class="ovacrs_working_hour last"><div class="title">Service Department:</div><div class="desc">Monday to Friday: 08.00 to 18.00 <br>Saturday &amp; Sunday: <span>Closed</span></div></div>
                
                </div>
        </div>
    </div>
    
    <div class="container">
    	<div class="row bottom">
        	<div class="footer_social">
            	<ul class="ireca_socials ">
                    <li class="d-inline"><a href="#" class="facebook" target="_blank">Facebook</a></li>
                    <li class="d-inline"><a href="#" class="twitter" target="_blank">Twitter</a></li>
                    <li class="d-inline"><a href="#" class="youtube" target="_blank">Youtube</a></li>
                    <li class="d-inline"><a href="#" class="google" target="_blank">Google+</a></li>
                    <li class="d-inline"><a href="#" class="rss" target="_blank">Rss feed</a></li>
                </ul>
            </div>
            
            
            <div class="footer_copyright">Copyright by Car Rental. All reserved</div>
        </div>
    </div>
 </footer>  
</body>


<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/bootstrap-select.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/front');?>/js/moment.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/front');?>/js/bootstrap-datetimepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/front');?>/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/front');?>/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/front');?>/js/dataTables.responsive.min.js"></script>
<script type="text/javascript">
            $(function () {
                $('#datetimepicker1').datetimepicker({format: 'DD-MM-YYYY'});
	    $('#datetimepicker2').datetimepicker({format: 'DD-MM-YYYY'});
            });
        </script>
        <script>
            $('.selectpicker').selectpicker();
		</script>
        <script src="<?php echo base_url('assets/front');?>/js/jquery-ui.js"></script>
          <script>
            $( function() {
              $( "#slider-range" ).slider({
                range: true,
                min: 0,
                max: 500,
                values: [ 75, 300 ],
                slide: function( event, ui ) {
                  $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
                }
              });
              $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
                " - $" + $( "#slider-range" ).slider( "values", 1 ) );
            } );
            </script>
        <script type="text/javascript" src="<?php echo base_url('assets/front');?>/js/owl.carousel.min.js"></script>
    <script type="text/javascript">
        $('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:false,
    autoplay:true,
    responsive:{
    0:{
        items:1
    },
    600:{
        items:2
    },
    1000:{
        items:3
    }
    }
    })
    </script> 
        <script type="text/javascript">
	$('[data-toggle="slide-collapse"]').on('click', function() {
	$navMenuCont = $($(this).data('target'));
	$navMenuCont.animate({
	'width': 'toggle'
	}, 350);
	$(".menu-overlay").fadeIn(500);
	
	});
	$(".menu-overlay").click(function(event) {
	$(".navbar-toggle").trigger("click");
	$(".menu-overlay").fadeOut(500);
	});
	
	</script>
     <script type="text/javascript">
      $(window).scroll(function(){
      if ($(this).scrollTop() > 320) {
          $('#task_flyout').addClass('fixed');
      } else {
          $('#task_flyout').removeClass('fixed');
      }
  });
    </script>
     <script type="text/javascript">
         $(function() {
         var Accordion = function(el, multiple) {
         this.el = el || {};
         // more then one submenu open?
         this.multiple = multiple || false;
         
         var dropdownlink = this.el.find('.dropdownlink');
         dropdownlink.on('click',
                         { el: this.el, multiple: this.multiple },
                         this.dropdown);
         };
         
         Accordion.prototype.dropdown = function(e) {
         var $el = e.data.el,
             $this = $(this),
             //this is the ul.submenuItems
             $next = $this.next();
         
         $next.slideToggle();
         $this.parent().toggleClass('open');
         
         if(!e.data.multiple) {
           //show only one menu at the same time
           $el.find('.submenuItems').not($next).slideUp().parent().removeClass('open');
         }
         }
         
         var accordion = new Accordion($('.accordion-menu'), false);
         })
      </script>

      <!-- profile pic update script -->
      <script type="text/javascript">
         $(document).ready(function() {
         
         
         var readURL = function(input) {
           if (input.files && input.files[0]) {
               var reader = new FileReader();
         
               reader.onload = function (e) {
                   $('.profile-pic').attr('src', e.target.result);
               }
         
               reader.readAsDataURL(input.files[0]);
           }
         }
         
         
         $(".file-upload").on('change', function(){
           readURL(this);
         });
         
         $(".upload-button").on('click', function() {
          $(".file-upload").click();
         });
         });
      </script>
        <script type="text/javascript">
            $('#chooseFile').bind('change', function () {
  var filename = $("#chooseFile").val();
  if (/^\s*$/.test(filename)) {
    $(".file-upload").removeClass('active');
    $("#noFile").text("No file chosen..."); 
  }
  else {
    $(".file-upload").addClass('active');
    $("#noFile").text(filename.replace("C:\\fakepath\\", "")); 
  }
});

        </script>
        
        <script type="text/javascript">
      $(document).ready(function() {
    var table = $('#example').DataTable( {
        responsive: true
    } );
 
    new $.fn.dataTable.FixedHeader( table );
} );
      </script>
		
		 <script>
			jQuery("#single_car_price_per_unit_change").on( 'click', function(){
		jQuery('#price_per_unit_select').toggle();
	});
	
	
	
	jQuery("#price_per_unit_select li a").on( 'click', function(){
		
		
		var selectPrice = jQuery(this).attr('data-price');
		var selectUnit = jQuery(this).html();
		
		jQuery('#single_car_price').html(selectPrice);
		jQuery('#single_car_unit').html(selectUnit);
		
		jQuery('#single_car_price_scroll').html(selectPrice);
		jQuery('#single_car_unit_scroll').html(selectUnit);
	});
	
	

		</script>
        <script defer src="<?php echo base_url('assets/front');?>/js/jquery.flexslider.js"></script>

  <script type="text/javascript">
    
    $(window).load(function(){
      $('#carousel').flexslider({
        animation: "slide",
        controlNav: false,
        animationLoop: false,
        slideshow: false,
        itemWidth: 100,
        itemMargin: 5,
        asNavFor: '#slider'
      });

      $('#slider').flexslider({
        animation: "slide",
        controlNav: false,
        animationLoop: false,
        slideshow: false,
        sync: "#carousel",
        start: function(slider){
          $('body').removeClass('loading');
        }
      });
    });
  </script>
</html>