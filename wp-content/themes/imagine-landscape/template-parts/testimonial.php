<?php
$testimonial_section_title = get_sub_field('testimonial_section_title') ?: 'What People Say About Us';

if (have_rows('testimonials')): ?>
	<section class="testimonials">
		<div class="container">
			<h2 class="oswald-bold"><?php echo esc_html($testimonial_section_title); ?></h2>
			<div class="testimonial-slider-wrapper">
				<button class="slider-prev" aria-label="Previous Testimonial">❮</button>
				<div class="testimonial-slider">
					<?php while (have_rows('testimonials')):
						the_row();
						$quote = get_sub_field('quote');
						$name = get_sub_field('name');
						if ($quote && $name): ?>
							<div class="testimonial-slide">
								<div class="quote-icons">
									<span class="quote-left oswald-bold">“</span>
									<blockquote class="oswald-bold"><?php echo wp_kses_post($quote); ?></blockquote>
									<span class="quote-right oswald-bold">”</span>
								</div>
								<p class="testimonial-name oswald-regular"><?php echo esc_html($name); ?></p>
							</div>
						<?php endif;
					endwhile; ?>
				</div>
				<button class="slider-next" aria-label="Next Testimonial">❯</button>
			</div>
		</div>
	</section>
<?php endif; ?>