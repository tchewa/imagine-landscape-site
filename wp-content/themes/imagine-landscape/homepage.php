<?php
/* Template Name: Home Page */
get_header();
?>

<?php
// Check if the flexible content field has rows
if (have_rows('flexible_content')):
	// Loop through the rows of flexible content
	while (have_rows('flexible_content')):
		the_row();
		if (get_row_layout() == 'hero'):
			get_template_part('template-parts/hero');
		elseif (get_row_layout() == 'sbs'):
			get_template_part('template-parts/sbs');
		elseif (get_row_layout() == 'cta'):
			get_template_part('template-parts/cta');
		elseif (get_row_layout() == 'feature'):
			get_template_part('template-parts/feature');
		elseif (get_row_layout() == 'testimonial'):
			get_template_part('template-parts/testimonial');
		endif;
	endwhile;
endif;
?>

<?php
get_footer();
?>