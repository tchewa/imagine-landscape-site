<div class="container">
	<div class="wrapper-container">
		<div class="faq-container">
			<?php if (have_rows('faq_item')):
				while (have_rows('faq_item')):
					the_row();
					$question = get_sub_field('faq_question');
					$answer = get_sub_field('faq_answer');
					?>
					<div class="faq-item">
						<div class="faq-question">
							<?php echo $question; ?> <span class="faq-toggle"></span>
						</div>
						<div class="faq-answer">
							<div class="faq-answer-text"><?php echo $answer; ?></div>
						</div>
					</div>
				<?php endwhile;
			endif;
			?>
		</div>
	</div>
</div>