jQuery(document).ready(function( $ ) {

	"use strict";
	
	// WPBakery responsive settings
  	responsiveEl();
  
  	function responsiveEl() {
  
  		var matches = document.querySelectorAll("[data-res-css]");
  		var resdata = [];
  		matches.forEach(function(element) {
  			var get_style = element.getAttribute("data-res-css");
  			resdata.push(get_style);
  		 element.removeAttribute("data-res-css");
  		});
  
  		var css = resdata.join(""),
  			head = document.head || document.getElementsByTagName('head')[0],
  			style = document.createElement('style');
  
  		style.type = 'text/css';
  		style.setAttribute("data-type", "agricom-shortcodes-custom-css");
  
  		if (style.styleSheet){
  		  // This is required for IE8 and below.
  		  style.styleSheet.cssText = css;
  		} else {
  		  style.appendChild(document.createTextNode(css));
  		}
  
  		head.appendChild(style);
  
  	}
	
	
	 /* scroll animate
 	================================================== */
 	AOS.init({
 		offset: 120,
 		delay: 100,
 		duration: 450, // or 200, 250, 300, 350.....
 		easing: 'ease-in-out-quad',
 		once: true,
 		disable: 'mobile'
 	});
	
	
	// blog list
	jQuery('.flexslider').flexslider({controlNav:true});
	jQuery(".video-responsive").fitVids();
	jQuery("#blog table" ).addClass( "table table-striped" );
	
	/* Closes the Responsive Menu on Menu Item Click*/
	$('.primary-menu li:not(.item-has-children) a').on('click', function() {
		$('.navbar-toggle:visible').click();
	});
	/*END MENU JS*/ 
		
});