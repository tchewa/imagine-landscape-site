<?php /* Template Name: Home Page */ get_header(); ?>
<div class="container">
	<div class="section no-border-top">
		<div class="collapse-left-right">
			<div class="homepage-hero sbs">
				<div class="sbs-image">
					<img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>"
						alt="<?php echo get_post_meta(get_post_thumbnail_id(get_the_ID()), '_wp_attachment_image_alt', true); ?>" />
				</div>
				<?php if (have_posts()):
					while (have_posts()):
						the_post(); ?>
						<div class="page-content sbs-content large">
							<?php the_content(); ?>
						</div>
					<?php endwhile; endif; ?>
			</div>
			<?php
			// Check if there are any promos
			$promo_query = new WP_Query(array('post_type' => 'promo', 'posts_per_page' => -1));
			if ($promo_query->have_posts()): ?>
				<h2 class="section-title">Promos</h2>
			<?php endif; ?>
			<div class="promo-carousel-wrapper">
				<button class="promo-arrow left" aria-label="Scroll Left" disabled><span class="arrow-left"></span></button>
				<div class="promo-carousel">
					<?php
					// Loop through promos
					if ($promo_query->have_posts()):
						while ($promo_query->have_posts()):
							$promo_query->the_post();

							$promo_code = get_post_meta(get_the_ID(), '_promo_code', true);
							$related_product_id = get_post_meta(get_the_ID(), '_promo_product', true);
							$related_product_link = get_permalink($related_product_id);
							if ($related_product_id):
								?>
								<a href="<?php echo esc_url($related_product_link); ?>">
									<div class="promo-item">
										<div class="promo-image featured-image"
											style="background-image: url('<?php the_post_thumbnail_url(); ?>');">
											<div class="promo-details featured-image-content">
												<h3 class="promo-title"><?php echo esc_html(get_the_title($related_product_id)); ?></h3>
												<?php if ($promo_code): ?>
													<p class="promo-code">Promo Code: <strong><?php echo esc_html($promo_code); ?></strong></p>
												<?php endif; ?>
											</div>
										</div>
									</div>
								</a>
							<?php endif; ?>
						<?php endwhile;
					endif;

					wp_reset_postdata();
					?>
				</div>
				<button class="promo-arrow right" aria-label="Scroll Right"><span class="arrow-right"></span></button>
			</div>
		</div>
	</div>
</div>

<?php
get_footer();
?>