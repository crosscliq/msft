

<?php //echo \Dsc\Debug::dump( $this->app->hive(), false ); ?>

<div class="bottom-nav footer"> 2013 &copy; Crosscliq </div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="/dash/js/jquery.js"></script> 
<script src="/dash/js/bootstrap.min.js"></script> 
<script src="/dash/js/jquery.mixitup.min.js"></script>
<script src="/dash/js/waypoint/waypoints.min.js"></script>
<script src="/dash/js/isotope/jquery.isotope.min.js"></script>
<script src="/dash/js/isotope/imagesloaded.pkgd.min.js"></script>
<script type="text/javascript">
$(function(){
  $('#grid').mixitup();  
});



$(document).ready(function(){
	var $window = $(window);
	
	
	
	/*-----------------------------------------------------------------------------------*/
	/*	Features
	/*-----------------------------------------------------------------------------------*/
	$('.feature-1').waypoint(function(){
			$('.feature-1 .feature-img').addClass('animate');
			$('.feature-1 .feature-content').addClass('animate');
		}, {
			triggerOnce: true,
			offset: function(){
				return $(window).height() - $(this).outerHeight() + 200;
			}
		});
		
	$('.feature-2').waypoint(function(){
			$('.feature-2 .feature-img').addClass('animate');
			$('.feature-2 .feature-content').addClass('animate');
		}, {
			triggerOnce: true,
			offset: function(){
				return $(window).height() - $(this).outerHeight() + 200;
			}
		});
	
	/*-----------------------------------------------------------------------------------*/
	/*	Isotope
	/*-----------------------------------------------------------------------------------*/	
	// cache container
	var $container = $('#filter-items');
	// initialize isotope after image loaded
	$container.imagesLoaded( function(){
		$container.isotope({
		  // options...
		});

		// filter items when filter link is clicked
		$('#filters a').click(function(){
		  var selector = $(this).attr('data-filter');
		  $container.isotope({ filter: selector });
		  $('#filters a').removeClass('active');
		  $(this).addClass('active');
		  return false;
		});
		// filter on smaller screens
		$("#e1").change(function(){
			var selector = $(this).find(":selected").val();
			 $container.isotope({ filter: selector });
			 return false;
		});
	});
	/*-----------------------------------------------------------------------------------*/
	/*	Handle Isotope Images 100%
	/*-----------------------------------------------------------------------------------*/
	function handleIsotopeStretch() {
		var width = $(window).width();
		if ( width < 768 ) {
			$('#filter-items .item').addClass('width-100');
		}
		else {
			$('#filter-items .item').removeClass('width-100');
		}
	}
	handleIsotopeStretch();
	/* On Resize show menu on desktop if hidden */
	jQuery(window).resize(function() {
		handleIsotopeStretch();
	});
	
	/*-----------------------------------------------------------------------------------*/
	/*	Animate
	/*-----------------------------------------------------------------------------------*/	
	$('.events').click(function(){
	  var id = $(this).attr('data-slide');
	  $('#events-slide-'+id).addClass('animated fadeInUpBig').show();
	  return false;
	});
	/*-----------------------------------------------------------------------------------*/
	/*	Mobile Menu
	/*-----------------------------------------------------------------------------------*/
	//Handle sidebar collapse on user interaction
	$('.sidebar-collapse > i').click(function () {
		$('#mobile-menu').slideToggle(200, 'linear').toggleClass('collapse');
	});
	
}); 
</script>
