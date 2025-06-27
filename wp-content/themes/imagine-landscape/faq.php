<?php
/* Template Name: FAQ Page */
remove_filter('the_content', 'wpautop');
get_header();
?>
<div class="container">
	<div class="wrapper-container">
		<h1 class="text-center page-title"><?php echo the_title(); ?></h1>
		<div class="button-container flex flex-end">
			<button id="open-all-btn" class="primary">Open All</button>
			<button id="close-all-btn" class="primary">Close All</button>
		</div>
	</div>
</div>
<?php
if (have_rows('flexible_content')):
	while (have_rows('flexible_content')):
		the_row();
		if (get_row_layout() == 'faq'):
			get_template_part('template-parts/faq-item');
		elseif (get_row_layout() == 'cta'):
			get_template_part('template-parts/cta');
		endif;
	endwhile;
else:
	echo '<p>No content found.</p>';
endif;
?>


<?php
get_footer();
?>