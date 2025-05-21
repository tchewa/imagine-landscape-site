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
				'menu-1' => esc_html__('Primary', 'imaginelandscape'),
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
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

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

function create_product_post_type()
{
	register_post_type(
		'product',
		array(
			'labels' => array(
				'name' => 'Products',
				'singular_name' => 'Product',
				'add_new' => 'Add New Product',
				'edit_item' => 'Edit Product',
				'all_items' => 'All Products',
				'search_items' => 'Search Products',
			),
			'public' => true,
			'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'), // Add custom fields if needed
			'rewrite' => array('slug' => 'products'), // Optional: Use /products URL for product archive
		)
	);
}
add_action('init', 'create_product_post_type');

function imaginelandscape_register_menus()
{
	register_nav_menus(array(
		'primary' => __('Primary Menu', 'imaginelandscape'),
	));
}
add_action('init', 'imaginelandscape_register_menus');

function imaginelandscape_register_footer_menus()
{
	register_nav_menus(array(
		'footer_shop' => __('Footer Shop Menu', 'imaginelandscape'),
		'footer_customer_service' => __('Footer Customer Service Menu', 'imaginelandscape'),
		'footer_resources' => __('Footer Resources Menu', 'imaginelandscape'),
	));
}
add_action('init', 'imaginelandscape_register_footer_menus');

function register_locations_post_type()
{
	$labels = array(
		'name' => 'Locations',
		'singular_name' => 'Location',
		'menu_name' => 'Locations',
		'name_admin_bar' => 'Location',
		'add_new' => 'Add New',
		'add_new_item' => 'Add New Location',
		'new_item' => 'New Location',
		'edit_item' => 'Edit Location',
		'view_item' => 'View Location',
		'all_items' => 'All Locations',
		'search_items' => 'Search Locations',
		'not_found' => 'No locations found.',
		'not_found_in_trash' => 'No locations found in Trash.',
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'has_archive' => false,
		'rewrite' => array('slug' => 'locations'),
		'supports' => array('title', 'editor', 'thumbnail', 'page-attributes'), // Add 'page-attributes' for menu_order
		'menu_position' => 5,
		'menu_icon' => 'dashicons-location',
	);

	register_post_type('location', $args);
}
add_action('init', 'register_locations_post_type');

function add_location_meta_boxes()
{
	add_meta_box(
		'location_details',
		'Location Details',
		'render_location_meta_boxes',
		'location',
		'normal',
		'high'
	);
}
add_action('add_meta_boxes', 'add_location_meta_boxes');

function render_location_meta_boxes($post)
{
	// Retrieve existing values
	$address = get_post_meta($post->ID, 'address', true);
	$google_map_link = get_post_meta($post->ID, 'google_map_link', true);
	$phone_number = get_post_meta($post->ID, 'phone_number', true);
	$website = get_post_meta($post->ID, 'website', true);
	$email = get_post_meta($post->ID, 'email', true);


	// Render fields
	?>
	<p>
		<label for="address">Address:</label><br>
		<input type="address" id="address" name="address" value="<?php echo esc_attr($address); ?>" style="width: 100%;">
	</p>
	<p>
		<label for="google_map_link">Google Map Link:</label><br>
		<input type="url" id="google_map_link" name="google_map_link" value="<?php echo esc_attr($google_map_link); ?>"
			style="width: 100%;">
	</p>
	<p>
		<label for="phone_number">Phone Number:</label><br>
		<input type="text" id="phone_number" name="phone_number" value="<?php echo esc_attr($phone_number); ?>"
			style="width: 100%;">
	</p>
	<p>
		<label for="website">Website:</label><br>
		<input type="url" id="website" name="website" value="<?php echo esc_attr($website); ?>" style="width: 100%;">
	</p>
	<p>
		<label for="email">Email:</label><br>
		<input type="email" id="email" name="email" value="<?php echo esc_attr($email); ?>" style="width: 100%;">
	</p>
	<?php
}

function save_location_meta_boxes($post_id)
{
	// Save Address
	if (isset($_POST['address'])) {
		update_post_meta($post_id, 'address', sanitize_text_field($_POST['address']));
	}

	// Save Google Map Link
	if (isset($_POST['google_map_link'])) {
		update_post_meta($post_id, 'google_map_link', sanitize_text_field($_POST['google_map_link']));
	}

	// Save Phone Number
	if (isset($_POST['phone_number'])) {
		update_post_meta($post_id, 'phone_number', sanitize_text_field($_POST['phone_number']));
	}

	// Save Website
	if (isset($_POST['website'])) {
		update_post_meta($post_id, 'website', esc_url_raw($_POST['website']));
	}

	// Save Email
	if (isset($_POST['email'])) {
		update_post_meta($post_id, 'email', sanitize_email($_POST['email']));
	}
}
add_action('save_post', 'save_location_meta_boxes');

function remove_comments_from_admin_menu()
{
	remove_menu_page('edit-comments.php'); // Removes the Comments menu item
}
add_action('admin_menu', 'remove_comments_from_admin_menu');

function disable_comments_support()
{
	// Disable support for comments and trackbacks in post types
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
	$wp_admin_bar->remove_node('comments'); // Removes the Comments item from the admin bar
}
add_action('wp_before_admin_bar_render', 'remove_comments_from_admin_bar');

function remove_posts_from_admin_menu()
{
	remove_menu_page('edit.php'); // Removes the Posts menu item
}
add_action('admin_menu', 'remove_posts_from_admin_menu');

function remove_posts_from_admin_bar()
{
	global $wp_admin_bar;
	$wp_admin_bar->remove_node('new-post'); // Removes the "New Post" option from the admin bar
}
add_action('wp_before_admin_bar_render', 'remove_posts_from_admin_bar');

function customize_dynamic_footer_headings($wp_customize)
{
	// Add a section for footer headings
	$wp_customize->add_section('footer_headings_section', array(
		'title' => __('Footer Headings', 'imaginelandscape'),
		'priority' => 30,
	));

	// Add a setting for dynamic headings
	$wp_customize->add_setting('footer_headings', array(
		'default' => json_encode(array('Shop', 'Customer Service', 'Resources', 'Follow Us')), // Default headings
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_footer_headings',
	));

	// Add a control for the headings
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		'footer_headings_control',
		array(
			'label' => __('Footer Headings (Comma-Separated)', 'imaginelandscape'),
			'description' => __('Enter headings separated by commas (e.g., Shop, Customer Service, Resources, Follow Us).', 'imaginelandscape'),
			'section' => 'footer_headings_section',
			'settings' => 'footer_headings',
			'type' => 'textarea',
		)
	));
}

// Sanitize the headings input
function sanitize_footer_headings($input)
{
	$headings = json_decode($input, true);
	if (json_last_error() !== JSON_ERROR_NONE || !is_array($headings)) {
		$headings = explode(',', $input); // Fallback to comma-separated values
	}
	return json_encode(array_map('sanitize_text_field', $headings));
}

add_action('customize_register', 'customize_dynamic_footer_headings');

function register_faqs_post_type()
{
	$labels = array(
		'name' => 'FAQs',
		'singular_name' => 'FAQ',
		'menu_name' => 'FAQs',
		'name_admin_bar' => 'FAQ',
		'add_new' => 'Add New',
		'add_new_item' => 'Add New FAQ',
		'new_item' => 'New FAQ',
		'edit_item' => 'Edit FAQ',
		'view_item' => 'View FAQ',
		'all_items' => 'All FAQs',
		'search_items' => 'Search FAQs',
		'not_found' => 'No FAQs found.',
		'not_found_in_trash' => 'No FAQs found in Trash.',
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'has_archive' => false,
		'rewrite' => array('slug' => 'faqs'),
		'supports' => array('title', 'editor'),
		'menu_position' => 5,
		'menu_icon' => 'dashicons-editor-help',
	);

	register_post_type('faq', $args);
}
add_action('init', 'register_faqs_post_type');

function register_promo_post_type()
{
	$labels = array(
		'name' => 'Promos',
		'singular_name' => 'Promo',
		'menu_name' => 'Promos',
		'name_admin_bar' => 'Promo',
		'add_new' => 'Add New',
		'add_new_item' => 'Add New Promo',
		'new_item' => 'New Promo',
		'edit_item' => 'Edit Promo',
		'view_item' => 'View Promo',
		'all_items' => 'All Promos',
		'search_items' => 'Search Promos',
		'not_found' => 'No promos found.',
		'not_found_in_trash' => 'No promos found in Trash.',
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'has_archive' => true,
		'rewrite' => array('slug' => 'promos'),
		'supports' => array('title', 'editor', 'thumbnail'),
		'menu_icon' => 'dashicons-megaphone',
	);

	register_post_type('promo', $args);
}
add_action('init', 'register_promo_post_type');

function add_promo_meta_boxes()
{
	add_meta_box(
		'promo_details',
		'Promo Details',
		'promo_meta_box_callback',
		'promo',
		'normal',
		'high'
	);
}
add_action('add_meta_boxes', 'add_promo_meta_boxes');

function promo_meta_box_callback($post)
{
	wp_nonce_field('promo_save_meta_box_data', 'promo_meta_box_nonce');
	$promo_code = get_post_meta($post->ID, '_promo_code', true);
	$promo_product = get_post_meta($post->ID, '_promo_product', true);
	?>
	<p>
		<label for="promo_code">Promo Code</label><br>
		<input type="text" id="promo_code" name="promo_code" value="<?php echo esc_attr($promo_code); ?>"
			style="width: 100%;" />
	</p>
	<p>
		<label for="promo_product">Select Product</label><br>
		<select id="promo_product" name="promo_product" style="width: 100%;">
			<option value="">Select a Product</option>
			<?php
			$products = get_posts(array(
				'post_type' => 'product',
				'posts_per_page' => -1,
				'post_status' => 'publish',
			));
			foreach ($products as $product) {
				echo '<option value="' . esc_attr($product->ID) . '"' . selected($promo_product, $product->ID, false) . '>' . esc_html($product->post_title) . '</option>';
			}
			?>
		</select>
	</p>
	<?php
}

function promo_save_meta_box_data($post_id)
{
	if (!isset($_POST['promo_meta_box_nonce']) || !wp_verify_nonce($_POST['promo_meta_box_nonce'], 'promo_save_meta_box_data')) {
		return;
	}
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return;
	}
	if (isset($_POST['promo_code'])) {
		update_post_meta($post_id, '_promo_code', sanitize_text_field($_POST['promo_code']));
	}
	if (isset($_POST['promo_product'])) {
		update_post_meta($post_id, '_promo_product', absint($_POST['promo_product']));
	}
}
add_action('save_post', 'promo_save_meta_box_data');