<?php
$sbs_image = get_sub_field('sbs_image');
$sbs_title = get_sub_field('sbs_title');
$sbs_copy = get_sub_field('sbs_copy');
$sbs_cta_text = get_sub_field('sbs_cta_text');
$sbs_cta_link = get_sub_field('sbs_cta_link');
$sbs_reverse_order = get_sub_field(selector: 'sbs_reverse_order');
$sbs_padding_collapse = get_sub_field('sbs_padding_collapse'); // true/false field

$padding_class = $sbs_padding_collapse ? 'padding-collapse' : '';

if ($sbs_image || $sbs_title || $sbs_copy): ?>

	<div
		class="side-by-side container flex <?php echo esc_attr($padding_class); ?> <?php echo $sbs_reverse_order ? ' reverse-order' : ''; ?>">
		<div class="wrapper-container">
			<div class="sbs-image">
				<?php if ($sbs_image): ?>
					<img src="<?php echo esc_url($sbs_image['url']); ?>"
						alt="<?php echo esc_attr($sbs_image['alt'] ?: 'Side by Side Image'); ?>">
				<?php endif; ?>
			</div>
			<div class="sbs-content">
				<?php if ($sbs_title): ?>
					<h2 class="sbs-title oswald-bold"><?php echo esc_html($sbs_title); ?></h2>
				<?php endif; ?>
				<?php if ($sbs_copy): ?>
					<div class="sbs-copy"><?php echo wp_kses_post($sbs_copy); ?></div>
				<?php endif; ?>
				<?php if ($sbs_cta_text): ?>
					<div class="sbs-cta">
						<a href="<?php echo esc_url($sbs_cta_link); ?>">
							<button class="primary"><?php echo esc_html($sbs_cta_text); ?></button>
						</a>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
<?php endif; ?>