<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package imaginelandscape
 */

get_header();
?>

<div class="container">
	<div class="wrapper-container">
		<?php if (has_post_thumbnail()): ?>
			<div class="featured-image" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>');"></div>
		<?php endif; ?>

		<div class="column-container contact-us-container">
			<div class="column">
				<h1 class="page-title"><?php echo get_the_title(); ?></h1>
				<div class="page-content">
					<?php
					the_content();
					?>
				</div>
			</div>
			<div class="column">
				<div class="form-container">
					<?php echo do_shortcode('[ninja_form id=3]'); ?>
					<p class="required-note-trees" id="required-note">Fields marked with an * are required.</p>
				</div>
			</div>
		</div>
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