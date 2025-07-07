<?php

/**
 * Functions of the theme
 */

define( 'SETUP_ENV', 'DEVELOPMENT' ); // DEVELOPMENT | PRODUCTION
define( 'DISABLE_JQUERY_MIGRATE', true );
define( 'DISABLE_BLOCK_STYLES', true );
define( 'DISABLE_UNUSED_CF7', true );

<<<<<<< HEAD
// === YouTube Video Import Settings ===
define('LUKOSTEMPL_YOUTUBE_API_KEY', 'AIzaSyDxr2ipM9Z3wQLUhfnhl6NSSEVVVFKLevo'); // <-- Replace with your API key
define('LUKOSTEMPL_YOUTUBE_CHANNEL_ID', 'UCkQK2rQk1vQ1U6jLwQ1Q1Q1Q'); // <-- Replace with your channel ID

if ( ! function_exists( 'lukostempl_setup' ) ) :
	function lukostempl_setup() {
=======
if ( ! function_exists( 'psdtheme_setup' ) ) :
	function psdtheme_setup() {
>>>>>>> parent of 8ad1d2a (renaming Template)

		// Add RSS feed links to <head> for posts and comments.
		add_theme_support( 'automatic-feed-links' );

		//translations
		load_theme_textdomain( 'psdtheme', get_template_directory() . '/languages' );

		// Enable support for Post Thumbnails, and declare two sizes.
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 672, 372, true );

		// add_image_size( 'blog_thumb', 279, 245, true );

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus(
			array(
				'primary' => __( 'Primary menu', 'psdtheme' ),
			)
		);

		/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
		add_theme_support( 'title-tag' );

	}
endif;
add_action( 'after_setup_theme', 'psdtheme_setup' );
/**********************************************************************/

/**
 * Include scripts and styles
 */
function psdtheme_setup_scripts() {
	$version = wp_get_theme( get_template() )->get( 'Version' );
	if ( SETUP_ENV === 'DEVELOPMENT' ) {
		$version = time();
	}

	// Load our main stylesheet.
	if ( SETUP_ENV === 'DEVELOPMENT' ) {
		wp_enqueue_style( 'psdtheme-vendor', get_template_directory_uri() . '/assets/css/header.css', array(), $version );
		wp_enqueue_style( 'psdtheme-main', get_template_directory_uri() . '/assets/css/footer.css', array(), $version );
	} else {
		wp_enqueue_style( 'psdtheme-vendor', get_template_directory_uri() . '/css/vendor.min.css', array(), $version );
		wp_enqueue_style( 'psdtheme-main', get_template_directory_uri() . '/css/bundle.min.css', array( 'psdtheme-vendor' ), $version );
	}

	/*// Load our scripts
	wp_enqueue_script( 'psdtheme-vendor', get_template_directory_uri() . '/js/vendor.js', array( 'jquery' ), $version, true );
	wp_enqueue_script( 'psdtheme-main', get_template_directory_uri() . '/js/app.js', array( 'jquery', 'psdtheme-vendor' ), $version, true );
*/
	// Since we use classic editor we don't need gutenberg stuff
	if ( DISABLE_BLOCK_STYLES ) {
		wp_dequeue_style( 'wp-block-library' );
		wp_dequeue_style( 'wc-block-vendors-style' );
		wp_dequeue_style( 'wc-block-style' );
	}


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'psdtheme_setup_scripts' );
/**********************************************************************/

/**
 * Remove jquery migrate dependancy
 */
function dequeue_jquery_migrate( $scripts ) {
	if ( DISABLE_JQUERY_MIGRATE ) {
		if ( ! is_admin() && ! empty( $scripts->registered['jquery'] ) ) {
			$scripts->registered['jquery']->deps = array_diff(
				$scripts->registered['jquery']->deps,
				array( 'jquery-migrate' )
			);
		}
	}
}
add_action( 'wp_default_scripts', 'dequeue_jquery_migrate' );


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 */
function psdtheme_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$content_width = isset( $GLOBALS['content_width'] )
		? (int) $GLOBALS['content_width']
		: 1200;

	$GLOBALS['content_width'] = $content_width;
}
add_action( 'after_setup_theme', 'psdtheme_content_width', 0 );
/**********************************************************************/

/**
 * Options
 */
if ( function_exists( 'acf_add_options_page' ) ) {

	acf_add_options_page();

}
/**********************************************************************/

/**
 * Register Sidebars
 */
function psdtheme_widgets_init() {
	// Primary Widget area
	register_sidebar(
		array(
			'name'          => 'Primary Widget Area',
			'id'            => 'primary-widget-area',
			'description'   => 'The primary widget area',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);

}
add_action( 'widgets_init', 'psdtheme_widgets_init' );


// Remove update notification for custom parent theme
function remove_parent_theme_update_notification() {
	remove_action( 'load-update-core.php', 'wp_update_themes' );
	add_filter( 'pre_site_transient_update_themes', '__return_null' );
}
add_action( 'admin_init', 'remove_parent_theme_update_notification' );


/**********************************************************************/
/* Include the rest of the files here																  */
/**********************************************************************/

require_once __DIR__ . '/includes/helpers.php';
// require_once __DIR__ . '/includes/cpt.php';
// require_once __DIR__ . '/includes/shortcodes.php';
// require_once __DIR__ . '/includes/ajax-handlers.php';
// require_once __DIR__ . '/includes/misc.php';

// === Schedule YouTube Video Import ===
if (!wp_next_scheduled('lukostempl_import_youtube_videos_event')) {
    wp_schedule_event(time(), 'hourly', 'lukostempl_import_youtube_videos_event');
}
add_action('lukostempl_import_youtube_videos_event', 'lukostempl_import_youtube_videos');

// === Import YouTube Videos Function ===
function lukostempl_import_youtube_videos() {
    $api_key = LUKOSTEMPL_YOUTUBE_API_KEY;
    $channel_id = LUKOSTEMPL_YOUTUBE_CHANNEL_ID;
    $max_results = 10;
    $api_url = "https://www.googleapis.com/youtube/v3/search?key={$api_key}&channelId={$channel_id}&part=snippet,id&order=date&maxResults={$max_results}";
    $response = wp_remote_get($api_url);
    if (is_wp_error($response)) return;
    $body = wp_remote_retrieve_body($response);
    $data = json_decode($body);
    if (empty($data->items)) return;
    foreach ($data->items as $item) {
        if ($item->id->kind !== 'youtube#video') continue;
        $video_id = $item->id->videoId;
        $title = $item->snippet->title;
        $description = $item->snippet->description;
        $thumbnail = $item->snippet->thumbnails->high->url;
        // Check if video already exists
        $existing = get_posts([
            'post_type' => 'youtube_video',
            'meta_key' => 'lukostempl_youtube_video_id',
            'meta_value' => $video_id,
            'posts_per_page' => 1
        ]);
        if ($existing) {
            $post_id = $existing[0]->ID;
            wp_update_post([
                'ID' => $post_id,
                'post_title' => $title,
                'post_content' => $description
            ]);
        } else {
            $post_id = wp_insert_post([
                'post_type' => 'youtube_video',
                'post_title' => $title,
                'post_content' => $description,
                'post_status' => 'publish'
            ]);
            if ($post_id && !is_wp_error($post_id)) {
                update_post_meta($post_id, 'lukostempl_youtube_video_id', $video_id);
                update_post_meta($post_id, 'lukostempl_youtube_thumbnail', $thumbnail);
            }
        }
    }
}
