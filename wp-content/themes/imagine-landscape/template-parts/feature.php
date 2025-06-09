<?php
$feature_title = get_sub_field('feature_title');
$feature_image = get_sub_field('feature_image');

if ($feature_title && $feature_image): ?>
	<div class="container feature"
		style="background-image: url(<?php echo esc_url(is_array($feature_image) ? $feature_image['url'] : $feature_image); ?>);">
		<div class="wrapper-container">
			<h2 class="oswald-bold"><?php echo esc_html($feature_title); ?></h2>
			<?php if (have_rows('feature_columns')): ?>
				<div class="column-container">
					<?php while (have_rows('feature_columns')):
						the_row();
						$column_title = get_sub_field('column_title');
						$column_content = get_sub_field('column_content');
						if ($column_title && $column_content): ?>
							<div class="column">
								<h3><?php echo esc_html($column_title); ?></h3>
								<p><?php echo wp_kses_post($column_content); ?></p>
							</div>
						<?php endif;
					endwhile; ?>
				</div>
			<?php endif; ?>
		</div>
		<div class="overlay"></div>
	</div>
<?php endif; ?>