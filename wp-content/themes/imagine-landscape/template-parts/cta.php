<?php
$simple_cta = get_sub_field('simple_cta');
$cta_color = get_sub_field('cta_color_option');

?>
<div class="container">
	<?php if ($simple_cta): ?>
		<div class="simple-cta flex justify-content-center<?php echo ($cta_color === 'dark') ? ' bg-dark' : ' bg-light'; ?>">
			<div class="wrapper-container flex flex-align-center">
				<a href="/contact-us"><button class="secondary">Contact Us</button></a>
			</div>
		</div>
	<?php elseif ($cta_color === 'dark'): ?>
		<div class="cta-logo-bg-dark flex justify-content-center"
			style="background-image: url('<?php echo esc_url(get_template_directory_uri() . '/images/il-background-dark.png'); ?>');">
			<div class="wrapper-container flex flex-column flex-align-center large-cta">
				<span class="heading-big">Contact Us for a Free Consultation & Quote!</span>
				<a href="/contact-us"><button class="secondary">Contact Us</button></a>
			</div>
		</div>
	<?php else: ?>
		<div class="cta-logo-bg-light flex justify-content-center"
			style="background-image: url('<?php echo esc_url(get_template_directory_uri() . '/images/il-background-light.png'); ?>');">
			<div class="wrapper-container flex flex-column flex-align-center large-cta">
				<span class="heading-big">Contact Us for a Free Consultation & Quote!</span>
				<a href="/contact-us"><button class="outline">Contact Us</button></a>
			</div>
		</div>
	<?php endif; ?>
</div>