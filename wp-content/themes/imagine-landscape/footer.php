<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package imaginelandscape
 */

?>

<footer class="site-footer">
	<div class="footer-border"></div>
	<div class="container collapse-left-right">
		<div class="column-container flex-start">
			<?php
			// Get the dynamic headings from the Customizer
			$footer_headings = json_decode(get_theme_mod('footer_headings', json_encode(array())), true);

			// Fallback if no headings are set
			if (empty($footer_headings)) {
				$footer_headings = array('Shop', 'Customer Service', 'Resources', 'Follow Us');
			}

			// Define static menu locations for each column
			$menu_locations = array('footer_shop', 'footer_customer_service', 'footer_resources', 'footer_follow_us');

			// Loop through the headings and render them with static menu locations
			foreach ($footer_headings as $index => $heading):
				$menu_location = $menu_locations[$index] ?? null; // Use the corresponding static menu location
				?>
				<div class="column">
					<span class="heading-text"><?php echo esc_html($heading); ?></span>
					<?php
					if ($menu_location && has_nav_menu($menu_location)) {
						wp_nav_menu(array(
							'theme_location' => $menu_location,
							'menu_class' => 'footer-nav-items',
							'container' => false,
						));
					}
					?>
				</div>
			<?php endforeach; ?>
			<div class="column align-center align-start-mobile">
				<span class="heading-text">Follow Us</span>

				<div class="social-icons">
					<a class="facebook" target="_blank" href="https://www.facebook.com/copyteconline">
						<img class="hide-on-hover" target="_blank" src="<?php bloginfo('template_url'); ?>/images/facebook-logo.png"
							alt="Facebook Icon">
						<img class="show-on-hover" src="<?php bloginfo('template_url'); ?>/images/facebook-logo-dark.png"
							alt="Facebook Icon Dark" />
					</a>
					<a href="https://x.com/CopyTec" target="_blank">
						<img class="hide-on-hover" src="<?php bloginfo('template_url'); ?>/images/x-logo.png" alt="X Icon">
						<img class="show-on-hover" src="<?php bloginfo('template_url'); ?>/images/x-logo-dark.png"
							alt="Facebook Icon Dark" />
					</a>
					<a href="https://www.instagram.com/copyteconline" target="_blank">
						<img class="hide-on-hover" src="<?php bloginfo('template_url'); ?>/images/instagram-logo.png"
							alt="Instagram Icon">
						<img class="show-on-hover" src="<?php bloginfo('template_url'); ?>/images/instagram-logo-dark.png"
							alt="Instagram Icon Dark" />
					</a>
				</div>
			</div>
		</div>
	</div>
	<div class="footer-border"></div>
</footer>
<div class="container collapse-left-right">
	<p>Content and images © Gurr’s Inc. DBA CopyTec, 185 W. 200 S. Pleasant Grove, UT 84062</p>
</div>

<?php wp_footer(); ?>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/site.js"></script>
</body>

</html>