<?php
$radio_value = get_sub_field('hero_color_option');
$headline = get_sub_field('headline');
$subheadline = get_sub_field('subheadline');

if ($headline): ?>
	<div class="hero <?php echo ($radio_value === 'Green') ? 'green-bg' : 'gray-bg'; ?>">
		<div class="wrapper-container">
			<?php echo wp_kses_post($headline); ?>
			<?php if ($subheadline): ?>
				<span class="divider-line"></span>
				<span class="subheadline"><?php echo esc_html($subheadline); ?></span>
			<?php endif; ?>
		</div>
	</div>
<?php endif; ?>