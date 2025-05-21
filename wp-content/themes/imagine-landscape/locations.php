<?php /* Template Name: Locations Page */ get_header(); ?>
<div class="container">
	<div class="section no-border-top">
		<div class="collapse-left-right">
			<h2 class="section-title"><?php echo get_the_title(); ?></h2>
			<div class="location-container">
				<?php
				$args = array(
					'post_type' => 'location',
					'posts_per_page' => -1,
					'orderby' => 'menu_order',
					'order' => 'ASC',
				);
				$locations_query = new WP_Query($args);

				if ($locations_query->have_posts()):
					while ($locations_query->have_posts()):
						$locations_query->the_post(); ?>

						<div class="location">
							<div class="location-image">
								<?php if (has_post_thumbnail()): ?>
									<img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>"
										alt="<?php echo get_post_meta(get_post_thumbnail_id(get_the_ID()), '_wp_attachment_image_alt', true); ?>" />
								<?php endif; ?>
							</div>
							<div class="location-data">
								<h4><u><?php echo get_the_title() ?></u></h4>
								<a href="<?php echo esc_url(get_post_meta(get_the_ID(), 'google_map_link', true)); ?>" target="_blank">
									<?php echo esc_html(get_post_meta(get_the_ID(), 'address', true)); ?>
								</a>
								<?php
								$phone_number = get_post_meta(get_the_ID(), 'phone_number', true);
								if (!empty($phone_number)) {
									$formatted_phone = preg_replace('/[^0-9]/', '', $phone_number);

									if (strlen($formatted_phone) === 10) {
										$formatted_phone = '(' . substr($formatted_phone, 0, 3) . ') ' . substr($formatted_phone, 3, 3) . '-' . substr($formatted_phone, 6);
									}
									?>
									<h4>Phone:</h4>
									<a href="tel:<?php echo esc_attr($formatted_phone); ?>">
										<?php echo esc_html($formatted_phone); ?>
									</a>
								<?php } ?>
								<?php
								$website = get_post_meta(get_the_ID(), 'website', true);
								if (!empty($website)): ?>
									<h4>Website:</h4>
									<a href="<?php echo esc_url($website); ?>" target="_blank">
										<?php echo esc_html($website); ?>
									</a>
								<?php endif; ?>
								<h4>Email:</h4>
								<a
									href="mailto:<?php echo esc_html(get_post_meta(get_the_ID(), 'email', true)); ?>"><?php echo esc_html(get_post_meta(get_the_ID(), 'email', true)); ?></a>
							</div>
						</div>
					<?php endwhile;
					wp_reset_postdata();
				else: ?>
					<p>No locations found.</p>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>

<?php
get_footer();
?>