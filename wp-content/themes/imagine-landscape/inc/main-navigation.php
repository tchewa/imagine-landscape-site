<nav class="main-navigation">
	<div class="container">
		<?php
		wp_nav_menu(array(
			'theme_location' => 'primary',
			'menu_class' => 'navigation-items',
			'container' => false,
		));
		?>
	</div>
</nav>