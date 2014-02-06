jQuery.noConflict();

// Functions that run on document ready
	
	jQuery( document ).ready( function() {

		varsToCache();
		sizeContent();
		// jqueryParallaxScript();
		// throttledScroll();
		animatedScroll();
		mobileMenu();
		// googleMaps();
		// onTimeout();
		iosDeviceTest();
		slidesJs(); // SlidesJS is responsive for all devices
	});




// Functions that run on window resize

	jQuery( window ).resize( function() {

		// Don't run the scripts if the device is a mobile device (otherwise causes slow performance in iOS)
		var isthismobile = jQuery('body').hasClass('mobile');
		var isthistablet = jQuery('body').hasClass('tablet');
		if ( isthismobile == false && isthistablet == false ) {

			sizeContent();
		
		};
	});




// Test for iPhone, iPad, iPod
	
	function iosDeviceTest() {
		// var isIPad = function() {
		//     return (/ipad/i).test(navigator.userAgent);
		// };
		// var isIPhone = function() {
		//     return (/iphone/i).test(navigator.userAgent);
		// };
		// var isIPod = function() {
		//     return (/ipod/i).test(navigator.userAgent);
		// };
	}



// Mobile navigation menu 
	
	// function mobileMenu() {
	// 	jQuery('nav#mobile-menu').mmenu();
	// }

// Mobile navigation menu 
	
	function mobileMenu() {
		jQuery('nav#mobile-menu').mmenu({
			position: 'left',
		});
	}



// Some Vars to Cache

	function varsToCache() {
		var isthismobile = jQuery('body').hasClass('mobile');		
	};



// Make the initial section height same as window height
	
	//Dynamically assign height
	function sizeContent() {
		// var windowHeight = window.innerHeight ? window.innerHeight : $(window).height();
		// windowHeight = windowHeight - 5;
		// jQuery("body").css("min-height", windowHeight);
	}





// Slides JS Slider

    function slidesJs() {

	    jQuery(function(){
	      jQuery(".slider").slidesjs({
	        width: 1000,
	        height: 650
	      });
	    });

	}




// Parallax - Use parallax.js to move the background image of a div to parallax it

	function jqueryParallaxScript() {
			
		//jQuery( '#hometop-innerwrapper' ).parallax( '50%', -3 );
			
		// jQuery( '#hometop' ).parallax({
		// 	yparallax: 1,
		// 	xorigin: 'left',
		// 	yorigin: 'bottom',
		// });


	};


// Do some things on scroll
	
	function throttledScroll() {

		// Get the pixel value of the top of the a div
			// var homeTopMessageInnerPosition = $('.manifesto-bigtext').position();
			// var homeTopMessageInnerPositionAdjusted = homeTopMessageInnerPosition.top;
			// var fadePoint = homeTopMessageInnerPositionAdjusted;

		// Get the pixel value of the bottom of a div
			// var homeTop = $('.top-of-page');
			// var homeTopPosition = homeTop.position();
			// var navbarfixpoint = ( homeTopPosition.top ) + ( jQuery(homeTop).height() );


		// Throttle the scroll event, do something on throttled event
			var didScroll = false;

			jQuery(window).scroll(function() {
			    didScroll = true;
			});

			setInterval(function() {
			    if ( didScroll ) {
			        didScroll = false;

			        // Put scripts to be called on throttled scroll here

			        	// Get current position of top of window
						// var navBar = jQuery(window).scrollTop();

						// If the div is above the transition point: 
				        // if ( navBar > fadePoint ) {
					        // Hide the navbar when user scrolls past the bottom of the .hometop-message-inner div
					      	// jQuery('#header').css({ "position": "absolute", "top": fadePoint + "px" });
					      	// jQuery('#header-lower').addClass('show-header-lower');
				        // } else {
					      	// jQuery('#header').css({ "position": "fixed", "top": "0" });
					      	// jQuery('#header-lower').removeClass('show-header-lower');
						// }

			    }
			}, 50); // Change this value to change the amount it is throttled by
	};



// Animate scroll to an anchor

	function animatedScroll() {
	
		jQuery('a').click(function() {
			var elementClicked = jQuery(this).attr("href");
			var destination = jQuery(elementClicked).offset().top;
			jQuery("html:not(:animated),body:not(:animated)").animate({ scrollTop: destination}, 500 );
			return false;
		});
	
	};



// Google Maps API 
// Remember to uncomment the Google Maps script enque in functions.php


	function googleMaps() {
		if ( jQuery('body').hasClass('page-id-68') ) { // only run on the contact page
			
			function initialize()
			{
				var mapProp = {
			  		center:new google.maps.LatLng(49.288565,-123.121548),
			  		zoom: 10,
			  		scrollwheel: false,
			  		streetViewControl: false,
			  		mapTypeId: google.maps.MapTypeId.ROADMAP	  
				};

			  	var map=new google.maps.Map(document.getElementById("map"),mapProp);

			 //  	var marker=new google.maps.Marker({
				//   position:myCenter,
				//   map: map,
				//   icon: '../wp-content/themes/loelliot/images/loelliot-marker.png',
				// });

				// marker.setMap(map);

				/* markers */

					// Bounds variable
					var bounds = new google.maps.LatLngBounds();

				    // Multiple Markers
				    var markers = [
				        ['Canada Financial Group Head Office, Vancouver', 49.288565,-123.121548],
				        ['Canada Financial Group Richmond Office', 49.171145,-123.136864]
				    ];
				                        
				    // Info Window Content
				    var infoWindowContent = [
				        ['<div class="info_content">' +
				        '<h4>Canada Financial Group Head Office</h4>' +
				        '<p>2200 - 1177 West Hastings Street<br /> Vancouver BC V6E 2K3</p>' +        
				        '</div>'],
				        ['<div class="info_content">' +
				        '<h4>Canada Financial Group Richmond Office</h4>' +
				        '<p>880 - 5951 Number 3 Road<br /> Richmond BC V6X 2E3</p>' +        
				        '</div>']
		        				        
				    ];
				        
				    // Display multiple markers on a map
				    var infoWindow = new google.maps.InfoWindow(), marker, i;
				    
				    // Loop through our array of markers & place each one on the map  
				    for( i = 0; i < markers.length; i++ ) {
				        var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
				        bounds.extend(position);
				        marker = new google.maps.Marker({
				            position: position,
				            map: map,
        				  	icon: '../wp-content/themes/cf/images/cf-marker.png',
				            title: markers[i][0]
				        });
				        
				        // Allow each marker to have an info window    
				        google.maps.event.addListener(marker, 'mouseover', (function(marker, i) {
				            return function() {
				                infoWindow.setContent(infoWindowContent[i][0]);
				                infoWindow.open(map, marker);
				            }
				        })(marker, i));

				        // Automatically center the map fitting all markers on the screen
				        map.fitBounds(bounds);
				    }				



				var stylesArray = 
				
					[
					  {
					    "featureType": "water",
					    "elementType": "geometry.fill",
					    "stylers": [
					      { "color": "#eaeaea" }
					    ]
					  },{
					    "featureType": "poi.park",
					    "elementType": "geometry.fill",
					    "stylers": [
					      { "color": "#fafafa" }
					    ]
					  },{
					    "featureType": "road.highway",
					    "elementType": "geometry",
					    "stylers": [
					      { "color": "#999a99" }
					    ]
					  },{
					    "featureType": "transit.line",
					    "elementType": "geometry",
					    "stylers": [
					      { "color": "#a3a3a3" }
					    ]
					  },{
					    "featureType": "poi",
					    "elementType": "geometry",
					    "stylers": [
					      { "color": "#fbfafa" }
					    ]
					  },{
					    "featureType": "transit.line",
					    "elementType": "labels.text.stroke",
					    "stylers": [
					      { "visibility": "off" }
					    ]
					  },{
					    "featureType": "landscape",
					    "elementType": "geometry.fill",
					    "stylers": [
					      { "color": "#faf9fa" }
					    ]
					  },{
					    "featureType": "transit.station",
					    "stylers": [
					      { "color": "#faf9fa" }
					    ]
					  },{
					  }
					]

				map.setOptions({styles: stylesArray});

			}
			
			google.maps.event.addDomListener(window, 'load', initialize);

		};
	};



// Do something after a period of delay
/*
	function onTimeout() {
		setTimeout(function() {
			$('#down-arrow').addClass('finalrestingplace');
		}, 1000);
	};
*/