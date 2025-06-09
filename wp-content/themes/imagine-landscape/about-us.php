<?php
/* Template Name: About Us Page */
get_header();
?>

<div class="container">
	<div class="wrapper-container">
		<h1 class="text-center oswald-bold"><?php the_title(); ?></h1>
	</div>
</div>

<?php // Flexible Content for SBS
if (have_rows('flexible_content')):
	while (have_rows('flexible_content')):
		the_row();
		if (get_row_layout() == 'sbs'):
			get_template_part('template-parts/sbs');
		endif;
	endwhile;
endif;
?>

<?php if (have_rows('team_member')): ?>
	<div class="wrapper-container">

		<div class="team-grid">
			<?php while (have_rows('team_member')):
				the_row();
				$member_name = get_sub_field('member_name');
				$member_bio = get_sub_field('member_bio');
				$member_image = get_sub_field('member_image');
				// Only render if name and bio exist (image is optional)
				if ($member_name && $member_bio): ?>
					<div class="team-member">
						<?php if ($member_image): ?>
							<img src="<?php echo esc_url($member_image['url']); ?>"
								alt="<?php echo esc_attr($member_image['alt'] ?: $member_name . ' Photo'); ?>" class="member-image">
						<?php endif; ?>
						<h3 class="oswald-bold"><?php echo esc_html($member_name); ?></h3>
						<div class="member-bio"><?php echo wp_kses_post($member_bio); ?></div>
					</div>
				<?php endif;
			endwhile; ?>
		</div>
	</div>
<?php endif; ?>

<?php
get_footer();
?>