<?php
/**
 * Nav Block
 */
?>

<a href="#mobile-menu" class="mobile-nav-trigger"></a>

<nav id="mobile-menu">
	<ul id="menu-main-menu" class="menu">
		<?php
			wp_nav_menu(array(
				'theme_location' => 'main-menu',
				'container' => '',
				'items_wrap' => '%3$s'
			));
		?>
	</ul>
</nav>
