<?php get_header(); ?>

<div class="container single-project">
	<div class="wrapper-container">
		<h1 class="page-title text-center"><?php echo get_the_title(); ?></h1>
		<?php
		$images = get_field('project_gallery');
		if ($images): ?>
			<div class="project-gallery">
				<?php foreach ($images as $image): ?>
					<img src="<?php echo esc_url($image['sizes']['large']); ?>" alt="<?php the_title(); ?> landscape image">
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
		<button class="back-to-top" title="Back to Top"><span></span></button>
	</div>
</div>

<?php get_footer(); ?>