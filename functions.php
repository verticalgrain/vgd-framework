<?php 

/* Call WP-Less plugin into framework 
================================================== */

	// Include the class
	require_once( 'inc/wp-less/wp-less.php' );




/* Call Mobble plugin into framework 
================================================== */

	// Include the class
	require_once( 'inc/mobble/mobble.php' );




/* Enque Some Styles
================================================== */

	// Loads our wordpress stylesheet and main stylesheet

		function enqueueMyStyles() {
			wp_enqueue_style( 'vgd-style', get_template_directory_uri() . '/css/main.less' );
			wp_enqueue_style( 'vgd-style', get_template_directory_uri() . '/style.css' );
		}

		add_action('wp_enqueue_scripts', 'enqueueMyStyles');


	// Add some styles to the admin end
		function custom_colors() {
		   echo '<style type="text/css">
				   #menu-comments, #menu-links, #menu-media, #menu-dashboard { display:none; }
				 </style>';
		}
		
		// add_action('admin_head', 'custom_colors');



/* Register some Scripts
================================================== */

	// Registering Scripts


		function enqueueMyScripts() {
			if( !is_admin()){ 
			wp_deregister_script('jquery');
			wp_register_script('jquery', ("//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"), '', '1.10.2', false);
			wp_enqueue_script('jquery');
			}

			// Google Maps API - remember to generate a new API key at https://code.google.com/apis/console/ and plug it into the script below			
			// if( !is_admin()){ 
			// wp_register_script('google-maps', ("http://maps.googleapis.com/maps/api/js?key=AIzaSyC1otxUxVvRSxyIWFFRXQEZctVZMge2HTo&sensor=false"), '', '1.10.3', false);
			// wp_enqueue_script('google-maps');
			// }	

			if( !is_admin()){ 
			wp_register_script('modernizer', ( get_template_directory_uri() . "/js/modernizr.js"), '', '2.6.2', false);
			wp_enqueue_script('modernizer');
			}
			

				if( !is_admin()){ 
				wp_register_script('respond', ( get_template_directory_uri() . "/js/respond.min.js"), '', '1.4.2', true);
				wp_enqueue_script('respond');
				}
			

			// if( !is_admin()){ 
			// wp_register_script('backstretch', ( get_template_directory_uri() . "/js/jquery.backstretch.min.js"), '', '2.0.4', false);
			// wp_enqueue_script('backstretch');
			// }

			// if( !is_admin()){ 
			// wp_register_script('parallax', ( get_template_directory_uri() . "/js/jquery.parallax-1.1.3.js"), '', '1.1.3', false);
			// wp_enqueue_script('parallax');
			// }			

			// if( !is_admin()){ 
			// wp_register_script('packery', ( get_template_directory_uri() . "/js/packery.min.js"), '', '1.0.6', false);
			// wp_enqueue_script('packery');
			// }			

			// if( !is_admin()){ 
			// wp_register_script('isotope', ( get_template_directory_uri() . "/js/jquery.isotope.min.js"), '', '1.0.6', false);
			// wp_enqueue_script('isotope');
			// }	
			
			// if( !is_admin()){ 
			// wp_register_script('slides', ( get_template_directory_uri() . "/js/jquery.slides.min.js"), 'jQuery', '3.0.4', true);
			// wp_enqueue_script('slides');
			// }

			if( !is_admin()){ 
			wp_register_script('mmenu', ( get_template_directory_uri() . "/js/jquery.mmenu.min.js"), '', '3.0.5', true);
			wp_enqueue_script('mmenu');
			}

			// if( !is_admin()){ 
			// wp_register_script('cycle', ( get_template_directory_uri() . "/js/jquery.cycle.all.js"), '', '3.0.2', false);
			// wp_enqueue_script('cycle');
			// }					

			// if( !is_admin()){ 
			// wp_register_script('responsive-nav', ( get_template_directory_uri() . "/js/responsive-nav.js"), '', '1.0.15', true);
			// wp_enqueue_script('responsive-nav');
			// }	

			// if( !is_admin()){
			// wp_register_script('colorbox', ( get_template_directory_uri() . "/js/jquery.colorbox-min.js"), 'jQuery', '1.4.33', true);
			// wp_enqueue_script('colorbox');
			// }					

			if( !is_admin()){ 
			wp_register_script('theme-scripts', ( get_template_directory_uri() . "/js/theme-scripts.js"), '', '0.5', false);
			wp_enqueue_script('theme-scripts');
			}
		}

		add_action('wp_enqueue_scripts', 'enqueueMyScripts');





/* Enque some Fonts
================================================== */

	// Load some fonts from Google Fonts 

		function load_fonts() {
			wp_register_style('googleFonts', 'http://fonts.googleapis.com/css?family=Raleway:100');
			wp_enqueue_style( 'googleFonts');
		}
		
		add_action('wp_enqueue_scripts', 'load_fonts');




/* Add Image Sizes
================================================== */

	// Add post thumbnail theme support
		add_theme_support( 'post-thumbnails' );
		
	// Add Image Sizes
		//add_image_size('thumb',170,255, true);



/* Wordpress Resets
================================================== */

	// Removes Wordpress admin bar from frontend 
		add_filter( 'show_admin_bar', '__return_false' );
	
	// Remove useless l1on script associated with admin bar
		add_action( 'init', 'remove_l1on' );
		function remove_l1on() {
		if ( !is_admin() ) {
			wp_deregister_script('l10n');
		  }
		}


/* Custom Post Types
================================================== */

	// Custom Post Types
	/*
		add_action( 'init', 'create_post_type' );
		function create_post_type() {
			register_post_type( 'developments',
				array(
					'labels' => array(
						'name' => __( 'Developments Gallery' ),
						'singular_name' => __( 'Developments' )
					),
				'public' => true,
				'has_archive' => true,
				)
			);
		}
	*/



/* Register some Sidebars 
================================================== */

	// Register Sidebars
	/*
		if(function_exists('register_sidebar')) {
			register_sidebar(array(
				'name' => 'Left Sidebar',
				'id' => 'left-sidebar',
				'description' => 'This is a widgetized area.'
			));
		}
	*/

			/*
				//use the following template tag to display the sidebar: 
				<?php if(function_exists('dynamic_sidebar') && dynamic_sidebar('left-sidebar')): else: ?>
					<!-- Show default sidebar -->
				<?php endif; ?>
			*/

	


/* Register some Menus 
================================================== */

	// Register Menus 

		add_action('init', 'register_custom_menus');

		function register_custom_menus() {
			register_nav_menus(array(
				'main-menu' => 'Main Menu',
				'footer-links' => 'Footer Links'
			));
		}


			/*
				// Use the following template tag to display the menu:
				<?php
					wp_nav_menu(array(
						'theme_location' => 'footer-links',
						'container' => '',
						'items_wrap' => '%3$s'
					));
				?>
			*/





/* Custom Excerpt Length 
================================================== */

	function new_excerpt_length($length) {
		return 12;
	}
	add_filter('excerpt_length', 'new_excerpt_length');





/* Excerpt More Text
================================================== */

	function new_excerpt_more( $more ) {
		return '...';
	}
	add_filter('excerpt_more', 'new_excerpt_more');





/* Add a mobile body class for mobile devices 
================================================== */

	add_filter('body_class','my_class_names');

	function my_class_names($classes) {
	   
		if ( is_mobile() ) {
		    $classes[] = 'mobile';
		    return $classes;
		} elseif ( is_tablet() ) {
			 $classes[] = 'tablet';
		    return $classes;
		} else {
			$classes[] = 'notmobile';
			return $classes;
		}

	}



/* Add browser specific body classes
================================================== */

	function organizedthemes_browser_body_class($classes) {
	 
	    global $is_gecko, $is_IE, $is_opera, $is_safari, $is_chrome;
	 
	    if($is_gecko)      $classes[] = 'gecko';
	    elseif($is_opera)  $classes[] = 'opera';
	    elseif($is_safari) $classes[] = 'safari';
	    elseif($is_chrome) $classes[] = 'chrome';
	    elseif($is_IE)     $classes[] = 'ie';
	    else               $classes[] = 'unknown';
	 
	    return $classes;
	 
	}
	add_filter('body_class','organizedthemes_browser_body_class');




/* Set the email from address and name
================================================== */


	/* enter the full email address you want displayed */

	// function xyz_filter_wp_mail_from($email){
	// 	return "info@verticalgraindesign.com";
	// }
	// add_filter("wp_mail_from", "xyz_filter_wp_mail_from");
	// add_filter("wp_mail_from", "xyz_filter_wp_mail_from");


	 /* enter the full name you want displayed alongside the email address */

	// function xyz_filter_wp_mail_from_name($from_name){
	// return "John Smith";
	// }
	// add_filter("wp_mail_from_name", "xyz_filter_wp_mail_from_name");



/* Handy Snippets 
*/

/* Old style facebook share using sharer.php
<a href="http://www.facebook.com/sharer/sharer.php?s=100&p[url]=http://&p[images][0]=img/facebookwide.png&p[title]=Rethink%20Advent%20Calendar&p[summary]=Who&nbsp;needs&nbsp;chocolate&nbsp;when&nbsp;you&nbsp;have&nbsp;Vine&#63;&nbsp;rethinkadvent&#46;com&nbsp;25&nbsp;days&nbsp;of&nbsp;6&nbsp;second&nbsp;surprises&#46;&nbsp;&#35;rethinkadvent&nbsp;&#35;happyholidays" target="_blank"><img src="/img/facebookwide.png" /></a>
*/

/* New style facebook share using other way 
<a class="facebook-share-wide" href="https://www.facebook.com/dialog/feed?app_id=546509055425938&link=http://rethinkcanada.com&picture=http://verticalgraindesign.com/hosted/rethink-advent-facebook-share.png&name=Rethink&caption=Who%20needs%20chocolate%20when%20you%20have%20Vine?%20rethinkadvent.com%2025%20days%20of%206%20second%20surprises.&redirect_uri=http://rethinkcanada.com" target="_blank">Test Share</a>                            
*/



?>