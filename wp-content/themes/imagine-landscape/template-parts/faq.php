<div class="faq-controls">
	<span class="faq-open-all">Open All</span>
	<span class="faq-close-all">Close All</span>
</div>
<div class="faq-container">
	<?php if (have_rows('faq_item')):
		while (have_rows('faq_item')):
			the_row();
			$question = get_sub_field('faq_question');
			$simple_answer = get_sub_field('faq_answer_simple');
			$complex_group = get_sub_field('faq_answer_complex');
			$complex_answer = $complex_group['faq_answer'] ?? '';
			$complex_image = $complex_group['faq_image'] ?? '';
			?>
			<div class="faq-item">
				<div class="faq-question" data-faq-id="<?php echo sanitize_title($question); ?>">
					<?php echo esc_html($question); ?> <span class="faq-toggle">+</span>
				</div>
				<div class="faq-answer" id="faq-<?php echo sanitize_title($question); ?>">
					<?php if ($simple_answer): ?>
						<div class="faq-answer-simple"><?php echo esc_html($simple_answer); ?></div>
					<?php endif; ?>
					<?php if ($complex_answer): ?>
						<div class="faq-answer-complex">
							<?php if ($complex_image): ?>
								<div class="faq-image-container">
									<img src="<?php echo esc_url($complex_image['url']); ?>"
										alt="<?php echo esc_attr($complex_image['alt'] ?: 'FAQ Image'); ?>" class="faq-image"
										style="max-width: 100%; height: auto;">
								</div>
							<?php endif; ?>
							<?php if ($complex_answer): ?>
								<div class="faq-answer-text"><?php echo $complex_answer; ?></div>
							<?php endif; ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		<?php endwhile;
	endif;
	?>
</div>