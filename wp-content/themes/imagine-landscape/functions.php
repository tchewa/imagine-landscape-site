<?php
/**
 * imaginelandscape functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package imaginelandscape
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

if (!function_exists('imaginelandscape_setup')):
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function imaginelandscape_setup()
	{
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on imaginelandscape, use a find and replace
		 * to change 'imaginelandscape' to the name of your theme in all the template files.
		 */
		load_theme_textdomain('imaginelandscape', get_template_directory() . '/languages');

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support('title-tag');

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support('post-thumbnails');

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'primary' => esc_html__('Primary', 'imaginelandscape'),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'imaginelandscape_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support('customize-selective-refresh-widgets');

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height' => 250,
				'width' => 250,
				'flex-width' => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action('after_setup_theme', 'imaginelandscape_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function imaginelandscape_content_width()
{
	$GLOBALS['content_width'] = apply_filters('imaginelandscape_content_width', 640);
}
add_action('after_setup_theme', 'imaginelandscape_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function imaginelandscape_widgets_init()
{
	register_sidebar(
		array(
			'name' => esc_html__('Sidebar', 'imaginelandscape'),
			'id' => 'sidebar-1',
			'description' => esc_html__('Add widgets here.', 'imaginelandscape'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		)
	);
}
add_action('widgets_init', 'imaginelandscape_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function imaginelandscape_scripts()
{
	wp_enqueue_style('theme-style', get_stylesheet_uri());
	wp_style_add_data('imaginelandscape-style', 'rtl', 'replace');

	wp_enqueue_script('imaginelandscape-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'imaginelandscape_scripts');

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

function remove_comments_from_admin_menu()
{
	remove_menu_page('edit-comments.php');
}
add_action('admin_menu', 'remove_comments_from_admin_menu');

function disable_comments_support()
{

	$post_types = get_post_types();
	foreach ($post_types as $post_type) {
		remove_post_type_support($post_type, 'comments');
		remove_post_type_support($post_type, 'trackbacks');
	}
}
add_action('init', 'disable_comments_support');

function remove_comments_from_admin_bar()
{
	global $wp_admin_bar;
	$wp_admin_bar->remove_node('comments');
}
add_action('wp_before_admin_bar_render', 'remove_comments_from_admin_bar');

function remove_posts_from_admin_menu()
{
	remove_menu_page('edit.php');
}
add_action('admin_menu', 'remove_posts_from_admin_menu');

function remove_posts_from_admin_bar()
{
	global $wp_admin_bar;
	$wp_admin_bar->remove_node('new-post');
}
add_action('wp_before_admin_bar_render', 'remove_posts_from_admin_bar');
