<nav class="main-navigation">
	<div class="container">
		<div class="logo">
			<a href="/">
				<img src="<?php echo get_template_directory_uri(); ?>/images/il-logo.png" alt="Logo" />
			</a>
		</div>

		<div class="nav-items">
			<?php
			wp_nav_menu(array(
				'theme_location' => 'primary',
				'menu_class' => 'nav',
				'container' => 'false',
			));
			?>
		</div>
		<div class="cta">
			<a href="/contact-us"><button class="secondary">Contact Us</button></a>
		</div>
	</div>
</nav>