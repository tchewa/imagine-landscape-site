<?php
/* Template Name: About Us Page */
get_header();

// Get full team image with fallback
$full_team_image = get_field('full_team_image');
$full_team_image_url = !empty($full_team_image['url'])
	? esc_url($full_team_image['url'])
	: esc_url(get_template_directory_uri() . '/images/fake-team.jpg');
?>

<div class="container">
	<div class="wrapper-container">
		<h1 class="text-center oswald-bold"><?php echo esc_html(get_the_title()); ?></h1>
	</div>
</div>

<?php
// Flexible Content for SBS
if (have_rows('flexible_content')): ?>
	<?php while (have_rows('flexible_content')):
		the_row(); ?>
		<?php if (get_row_layout() == 'sbs'): ?>
			<?php get_template_part('template-parts/sbs'); ?>
		<?php endif; ?>
	<?php endwhile; ?>
<?php endif; ?>

<?php if (have_rows('team_member')): ?>
	<div class="wrapper-container">
		<div class="team-grid">
			<?php while (have_rows('team_member')):
				the_row();
				$member_name = get_sub_field('member_name');
				$member_bio = get_sub_field('member_bio');
				$member_image = get_sub_field('member_image');

				// Only render if name and bio exist
				if (!empty($member_name) && !empty($member_bio)): ?>
					<div class="team-member">
						<?php if (!empty($member_image) && is_array($member_image)): ?>
							<img src="<?php echo esc_url($member_image['url']); ?>"
								alt="<?php echo esc_attr($member_image['alt'] ?: $member_name . ' Photo'); ?>" class="member-image">
						<?php endif; ?>
						<h3 class="oswald-bold"><?php echo esc_html($member_name); ?></h3>
						<div class="member-bio"><?php echo wp_kses_post($member_bio); ?></div>
					</div>
				<?php endif; ?>
			<?php endwhile; ?>
		</div>
		<img src="<?php echo $full_team_image_url; ?>" alt="Imagine Landscape Team" class="full-team-image" />
	</div>
<?php endif; ?>

<?php if (have_rows('flexible_content')): ?>
	<?php while (have_rows('flexible_content')):
		the_row(); ?>
		<?php if (get_row_layout() == 'cta'): ?>
			<?php get_template_part('template-parts/cta'); ?>
		<?php endif; ?>
	<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>