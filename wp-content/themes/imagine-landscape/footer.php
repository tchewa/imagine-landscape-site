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
		<div class="column-container">
			<div class="column">
				<div class="footer-links">
					<a href="">Gallery</a>
					<a href="">About Us</a>
					<a href="">Services</a>
					<a href="">Contact Us</a>
				</div>
				<div class="social-media-links">
					<a href="">
						<img src="<?php echo get_template_directory_uri(); ?>/images/icons/il-instagram-green.png"
							alt="instagram Logo">
					</a>
					<a href="">
						<img src="<?php echo get_template_directory_uri(); ?>/images/icons/il-facebook-green.png"
							alt="facebook Logo">
					</a>
					<a href="">
						<img src="<?php echo get_template_directory_uri(); ?>/images/icons/il-yelp-green.png" alt="yelp Logo">
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
					<span><u>Operating Hours</u></span>
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
</footer>

<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/site.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/navigation.js"></script>

</body>

</html>