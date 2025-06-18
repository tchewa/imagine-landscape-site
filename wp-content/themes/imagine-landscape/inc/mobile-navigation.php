<div class="mobile-navigation">
	<div class="logo">
		<a href="/">
			<img src="<?php echo get_template_directory_uri(); ?>/images/il-logo.png" alt="Logo" />
		</a>
	</div>
	<?php
	wp_nav_menu(array(
		'theme_location' => 'primary',
		'menu_class' => 'mobile-navigation-items',
		'container' => true,
	));
	?>
	<div class="cta">
		<a href="/contact-us"><button class="secondary">Contact Us</button></a>
	</div>
	<a class="mobile-nav-trigger"><span></span></a>
</div>