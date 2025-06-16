<?php
/* Template Name: The Process Page */
remove_filter('the_content', 'wpautop');
get_header();
?>

<div class="container">
	<div class="wrapper-container">
		<h1 class="text-center page-title">The Process</h1>
		<?php
		if (have_rows('flexible_content')):
			while (have_rows('flexible_content')):
				the_row();
				if (get_row_layout() == 'sbs'):
					get_template_part('template-parts/sbs');
				elseif (get_row_layout() == 'cta'):
					get_template_part('template-parts/cta');
				elseif (get_row_layout() == 'faq'):
					get_template_part('template-parts/faq');
				endif;
			endwhile;
		else:
			echo '<p>No content found.</p>';
		endif;
		?>
	</div>
</div>

<?php
get_footer();
?>