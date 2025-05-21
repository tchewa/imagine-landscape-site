<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package imaginelandscape
 */

get_header();
?>
<div class="container">
	<div class="section no-border-top">
		<div class="collapse-left-right">
			<div class="text-center">
				<h1>Whoops! Must have gotten lost...</h1>
				<p class="large">The page you're looking for might have been removed, or the URL might be incorrect.</p>
				<p class="large">Click <a style="text-decoration: underline;"
						href="<?php echo esc_url(home_url('/')); ?>">here</a> to head back to the homepage</p>
			</div>
		</div>
	</div>
</div>
<?php
get_footer();
