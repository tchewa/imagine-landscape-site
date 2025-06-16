<?php if (have_rows('service_item')): ?>
	<?php while (have_rows('service_item')):
		the_row();
		$service_icon = get_sub_field('service_icon');
		$service_title = get_sub_field('service_title');
		$service_description = get_sub_field('service_description');

		// Only render if name and bio exist
		if (!empty($service_title) && !empty($service_description && !empty($service_icon))): ?>
			<div class="service-item column">
				<?php if (!empty($service_icon) && is_array($service_icon)): ?>
					<img src="<?php echo esc_url($service_icon['url']); ?>"
						alt="<?php echo esc_attr($service_icon['alt'] ?: $member_name . ' Icon'); ?>" class="service-icon">
				<?php endif; ?>
				<h3 class="oswald-bold"><?php echo esc_html($service_title); ?></h3>
				<div class="service-description"><?php echo wp_kses_post($service_description); ?></div>
			</div>
		<?php endif; ?>
	<?php endwhile; ?>
<?php endif; ?>