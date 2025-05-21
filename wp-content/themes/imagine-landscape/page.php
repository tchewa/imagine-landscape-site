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
	<div class="section no-border-top">
		<div class="collapse-left-right">
			<?php if (has_post_thumbnail()): ?>
				<div class="featured-image" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>');">
					<div class="featured-image-content">
						<h1><?php the_title(); ?></h1>
					</div>
				<?php endif; ?>
			</div>
			<?php if (have_posts()):
				while (have_posts()):
					the_post(); ?>
					<?php the_content(); ?>
				<?php endwhile; endif; ?>
		</div>
	</div>
</div>

<?php
get_footer();
