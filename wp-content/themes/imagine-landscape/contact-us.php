<?php /* Template Name: Contact Us Page */
remove_filter('the_content', 'wpautop');
get_header(); ?>
<div class="container">
	<div class="wrapper-container">
		<div class="column-container contact-us-container">
			<div class="column">
				<h1 class="page-title"><?php echo get_the_title(); ?></h1>
				<div class="page-content">
					<?php
					the_content();
					?>
					<div class="contact-info flex">
						<div class="flex contact-phone">
							<img class="contact-icon" src="<?php echo get_template_directory_uri(); ?>/images/icons/phone-icon.png"
								alt="phone icon" />
							<a href="tel:<?php echo esc_html(get_field('contact_phone')); ?>">
								<?php echo esc_html(get_field('contact_phone')); ?>
							</a>
						</div>
						<div class="flex contact-email">
							<img class="contact-icon" src="<?php echo get_template_directory_uri(); ?>/images/icons/email-icon.png"
								alt="map pin icon" />
							<a href="mailto:<?php echo esc_html(get_field('contact_email')); ?>">
								<?php echo esc_html(get_field('contact_email')); ?>
							</a>
						</div>
						<div class="flex contact-address">
							<img class="contact-icon" src="<?php echo get_template_directory_uri(); ?>/images/icons/icon-mappin.png"
								alt="map pin icon" />
							<?php $address = get_field('contact_address');
							if ($address) {
								echo $address;
							}
							?>
						</div>
					</div>
				</div>
			</div>
			<div class="column">
				<div class="form-container">
					<?php echo do_shortcode('[ninja_form id=2]'); ?>
					<p class="required-note" id="required-note">Fields marked with an * are required.</p>
				</div>
			</div>
		</div>
	</div>


	<?php
	get_footer();
	?>