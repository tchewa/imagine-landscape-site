<?php
/* Template Name: Project Page */
get_header();
?>

<div class="container project-grid">
	<div class="wrapper-container">
		<h1 class="page-title text-center"><?php echo get_the_title(); ?></h1>
		<div class="projects">
			<?php
			// Query all Project posts
			$projects = new WP_Query(array(
				'post_type' => 'project',
				'posts_per_page' => -1,
			));

			if ($projects->have_posts()):
				while ($projects->have_posts()):
					$projects->the_post();
					$title = get_the_title();
					$link = get_permalink();
					$thumb = get_the_post_thumbnail_url(get_the_ID(), 'large');
					if ($thumb):
						?>
						<div class="project-item">
							<a href="<?php echo esc_url($link); ?>" class="project-link">
								<div class="project-thumb" style="background-image: url('<?php echo esc_url($thumb); ?>');">
									<div class="project-hover">
										<h3><?php echo esc_html($title); ?></h3>
									</div>
								</div>
							</a>
						</div>
						<?php
					endif;
				endwhile;
				wp_reset_postdata();
			else:
				echo '<p>No projects found.</p>';
			endif;
			?>
		</div>
	</div>
</div>

<?php get_footer(); ?>