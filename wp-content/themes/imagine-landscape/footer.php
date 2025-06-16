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
	<div class="wrapper-container">
		<div class="desktop-footer">
			<div class="column-container">
				<div class="column">
					<div class="footer-links">
						<?php
						wp_nav_menu(array(
							'theme_location' => 'primary',
							'menu_class' => 'nav',
							'container' => 'false',
						));
						?>
					</div>
					<div class="social-media-links">
						<a class="desktop-link" href="">
							<img src="<?php echo get_template_directory_uri(); ?>/images/icons/il-instagram-green.png"
								alt="instagram Logo">
							<img class="show-on-hover"
								src="<?php echo get_template_directory_uri(); ?>/images/icons/il-instagram-white.png"
								alt="instagram Logo">
						</a>
						<a class="desktop-link" href="">
							<img src="<?php echo get_template_directory_uri(); ?>/images/icons/il-facebook-green.png"
								alt="facebook Logo">
							<img class="show-on-hover"
								src="<?php echo get_template_directory_uri(); ?>/images/icons/il-facebook-white.png"
								alt="facebook Logo">
						</a>
						<a class="desktop-link" href="">
							<img src="<?php echo get_template_directory_uri(); ?>/images/icons/il-yelp-green.png" alt="yelp Logo">
							<img class="show-on-hover"
								src="<?php echo get_template_directory_uri(); ?>/images/icons/il-yelp-white.png" alt="yelp Logo">
						</a>
					</div>
				</div>
				<div class="column">
					<div class="footer-logo">
						<img src="<?php echo get_template_directory_uri(); ?>/images/il-logo.png" alt="Imagine Landscape Logo">
					</div>
					<span class="copyright">© 2025 Imagine Landscape, LLC</span>
				</div>
				<div class="column">
					<div class="hoo">
						<span class="title"><u>Operating Hours</u></span>
						<span>Mon - Fri: 8 a.m. - 5 p.m.</span>
						<span>Saturday: 9 a.m. - 12 p.m.</span>
					</div>
					<div class="contact-info">
						<a href="tel:8018952006">801-895-2006</a>
						<a href="mailto: info@Imagine-Landscape.com">info@Imagine-Landscape.com</a>
					</div>
				</div>
			</div>
		</div>
		<div class="mobile-footer">
			<div class="column-container">
				<div class="column">
					<div class="footer-logo">
						<img src="<?php echo get_template_directory_uri(); ?>/images/il-logo.png" alt="Imagine Landscape Logo">
					</div>
					<span class="copyright">© 2025 Imagine Landscape, LLC</span>
				</div>
				<div class="column">
					<div class="footer-links">
						<?php
						wp_nav_menu(array(
							'theme_location' => 'primary',
							'menu_class' => 'nav',
							'container' => 'false',
						));
						?>
					</div>
					<div class="social-media-links">
						<a href="#">
							<img src="<?php echo get_template_directory_uri(); ?>/images/icons/il-instagram-green.png"
								alt="instagram Logo">
						</a>
						<a href="#">
							<img src="<?php echo get_template_directory_uri(); ?>/images/icons/il-facebook-green.png"
								alt="facebook Logo">
						</a>
						<a href="#">
							<img src="<?php echo get_template_directory_uri(); ?>/images/icons/il-yelp-green.png" alt="yelp Logo">
						</a>
						<a href="#">
							<img src="<?php echo get_template_directory_uri(); ?>/images/icons/phone-icon-green.png" alt="phone icon">
						</a>
						<a href="#">
							<img src="<?php echo get_template_directory_uri(); ?>/images/icons/email-icon-green.png" alt="yelp Logo">
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>

</body>

</html>