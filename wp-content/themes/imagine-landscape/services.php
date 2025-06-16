<?php
/* Template Name: Services Page */
remove_filter('the_content', 'wpautop');
get_header();
?>

<div class="container">
	<div class="wrapper-container">
		<?php
		if (have_rows('flexible_content')):
			while (have_rows('flexible_content')):
				the_row();
				if (get_row_layout() == 'services'): ?>
					<h1 class="text-center page-title">Services</h1>
					<div class="column-container services-container">
						<?php
						get_template_part('template-parts/service');
						?>
					</div>
				<?php endif;
			endwhile;
		else:
			echo '<p>No content found.</p>';
		endif;
		?>
		<img class="hide-on-mobile" src="<?php echo get_template_directory_uri(); ?>/images/services-table.png"
			alt="Services Table" />
		<a class="show-on-mobile" href="<?php echo get_template_directory_uri(); ?>/downloads/services-table.pdf"
			target="_blank">
			<img src="<?php echo get_template_directory_uri(); ?>/images/services-table.png" alt="Services Table" />
		</a>
	</div>
</div>

<?php if (have_rows('flexible_content')): ?>
	<?php while (have_rows('flexible_content')):
		the_row(); ?>
		<?php if (get_row_layout() == 'cta'): ?>
			<?php get_template_part('template-parts/cta'); ?>
		<?php endif; ?>
	<?php endwhile; ?>
<?php endif; ?>

<?php
get_footer();
?>