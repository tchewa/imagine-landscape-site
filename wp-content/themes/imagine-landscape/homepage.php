<?php /* Template Name: Home Page */ get_header();

$radio_value = get_field('hero_color_option');
?>
<div class="container">
	<div class="hero <?php if ($radio_value === 'Green') {
		echo 'green-bg';
	} else {
		echo 'gray-bg';
	} ?>">
		<div class="wrapper-container">
			<?php echo get_field('headline') ?>
			<span class="divider-line"></span>
			<span class="subheadline"><?php echo get_field('subheadline'); ?></span>
		</div>
	</div>
</div>

<?php
get_template_part('template-parts/sbs');
get_template_part('template-parts/cta');
get_footer();
?>