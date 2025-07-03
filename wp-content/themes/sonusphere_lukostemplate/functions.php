<?php

/**
 * Functions of the theme
 */

define( 'SETUP_ENV', 'DEVELOPMENT' ); // DEVELOPMENT | PRODUCTION
define( 'DISABLE_JQUERY_MIGRATE', true );
define( 'DISABLE_BLOCK_STYLES', true );
define( 'DISABLE_UNUSED_CF7', true );

if ( ! function_exists( 'lukostempl_setup' ) ) :
	function lukostempl_setup() {

		// Add RSS feed links to <head> for posts and comments.
		add_theme_support( 'automatic-feed-links' );

		//translations
		load_theme_textdomain( 'lukostempl', get_template_directory() . '/languages' );

		// Enable support for Post Thumbnails, and declare two sizes.
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 672, 372, true );

		// add_image_size( 'blog_thumb', 279, 245, true );

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus(
			array(
				'primary' => __( 'Primary menu', 'lukostempl' ),
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
add_action( 'after_setup_theme', 'lukostempl_setup' );
/**********************************************************************/

/**
 * Include scripts and styles
 */
function lukostempl_setup_scripts() {
	$version = wp_get_theme( get_template() )->get( 'Version' );
	if ( SETUP_ENV === 'DEVELOPMENT' ) {
		$version = time();
	}

	// Load our main stylesheet.
	if ( SETUP_ENV === 'DEVELOPMENT' ) {
		wp_enqueue_style( 'lukostempl-vendor', get_template_directory_uri() . '/assets/css/header.css', array(), $version );
		wp_enqueue_style( 'lukostempl-main', get_template_directory_uri() . '/assets/css/footer.css', array(), $version );
	} else {
		wp_enqueue_style( 'lukostempl-vendor', get_template_directory_uri() . '/css/vendor.min.css', array(), $version );
		wp_enqueue_style( 'lukostempl-main', get_template_directory_uri() . '/css/bundle.min.css', array( 'lukostempl-vendor' ), $version );
	}

	// Load our scripts
	wp_enqueue_script( 'lukostempl-vendor', get_template_directory_uri() . '/js/vendor.js', array( 'jquery' ), $version, true );
	wp_enqueue_script( 'lukostempl-main', get_template_directory_uri() . '/js/app.js', array( 'jquery', 'lukostempl-vendor' ), $version, true );

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
add_action( 'wp_enqueue_scripts', 'lukostempl_setup_scripts' );
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
function lukostempl_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$content_width = isset( $GLOBALS['content_width'] )
		? (int) $GLOBALS['content_width']
		: 1200;

	$GLOBALS['content_width'] = $content_width;
}
add_action( 'after_setup_theme', 'lukostempl_content_width', 0 );
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
function lukostempl_widgets_init() {
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
add_action( 'widgets_init', 'lukostempl_widgets_init' );


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
