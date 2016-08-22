<?php
	
/**
 * elisa 2016 Theme functions and definitions
 *
 */
	
if ( ! function_exists( 'elisa_theme_setup' ) ) :
	function elisa_theme_setup()
	{
	/**
	 * Set the content width based on the theme's design and stylesheet.
	 */
		if ( ! isset( $content_width ) ) {
			$content_width = 640; /* pixels */
		}
		/**
		* Add default posts and comments RSS feed links to head.
		*/
		add_theme_support( 'automatic-feed-links' );
		/**
		 * Enable HTML5 markup
		 */
		add_theme_support( 'html5', array(
			'comment-list',
			'search-form',
			'comment-form',
			'gallery',
		) );
		/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
		*/
		add_theme_support( 'post-thumbnails' );
		/*
		* Enable title tag support for all posts.
		*
		* @link http://codex.wordpress.org/Title_Tag
		*/
		add_theme_support( 'title-tag' );
		/*
		* Add Editor Style for adequate styling in text editor.
		*
		* @link http://codex.wordpress.org/Function_Reference/add_editor_style
		*/
		add_editor_style( '/assets/css/editor-style.css' );
		
		// This theme uses wp_nav_menu() in one location.
		register_nav_menu( 'primary-navigation', __( 'Primary Menu', 'elisa2016' ) );
		// Enable support for Post Formats.
		if ( 'yes' === get_theme_mod( 'elisa2016_post_format_support' ) ) {
			add_theme_support( 'post-formats',
				array(
					'aside',
					'image', 
					'video',
					'quote',
					'link',
					'status',
					'gallery',
					'chat',
					'audio'
				) );
		}
	}
endif; // elisa_theme_setup
add_action( 'after_setup_theme', 'elisa_theme_setup' );

//Making jQuery to load from Google Library
function replace_jquery() {
	if (!is_admin()) {
		// comment out the next two lines to load the local copy of jQuery
		wp_deregister_script('jquery');
		wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js', false, '2.2.0');
		wp_enqueue_script('jquery');
	}
}
add_action('init', 'replace_jquery');

/**
 * Enqueue scripts.
 */
if ( ! function_exists( 'elisa_theme_scripts' ) ) :
	function elisa_theme_scripts()
	{
		// Vendor Scripts
		wp_register_script( 'modernizr-js', get_template_directory_uri() . '/assets/js/vendor/modernizr/modernizr-custom.js', array( 'jquery' ), '2.8.2', false );
		wp_enqueue_script( 'modernizr-js' );
		wp_register_script( 'selectivizr-js', get_template_directory_uri() . '/assets/js/vendor/selectivizr/selectivizr.js', array( 'jquery' ), '1.0.2b', false );
		wp_enqueue_script( 'selectivizr' );
  		wp_script_add_data( 'selectivizr', 'conditional', '(gte IE 6)&(lte IE 8)' );
		wp_register_script( 'cycle2', get_template_directory_uri() . '/assets/js/vendor/cycle2/jquery.cycle2.min.js', array( 'jquery' ), '2.1.6', false );
		wp_enqueue_script( 'cycle2' );
		wp_register_script( 'cycle2swipe', get_template_directory_uri() . '/assets/js/vendor/cycle2/jquery.cycle2.swipe.min.js', array( 'cycle2' ), '', false );
		wp_enqueue_script( 'cycle2swipe' );
	}
	add_action( 'wp_enqueue_scripts', 'elisa_theme_scripts' );
endif; 


/**
 * Enqueue styles.
 */
if ( ! function_exists( 'elisa_theme_styles' ) ) :
	function elisa_theme_styles() {
			wp_register_style('elisa_theme-style', get_template_directory_uri() . '/assets/css/elisa.css', '', '1.0', 'screen');
			wp_enqueue_style( 'elisa_theme-style' );


	}
  add_action( 'wp_enqueue_scripts', 'elisa_theme_styles' );
endif; 

/**
 * Register widgetized area and update sidebar with default widgets.
 */
function elisa_theme_widgets_init()
{
	register_sidebar(
		array(
		'name'          => __( 'Sidebar', 'some-like-it-neat' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
		)
	);
}
add_action( 'widgets_init', 'elisa_theme_widgets_init' );
	
// Make uploaded images SCALE responsive
add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 );
add_filter( 'image_send_to_editor', 'remove_width_attribute', 10 );

function remove_width_attribute( $html ) {
   $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
   return $html;
}

// Allow SVG Uploads
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');


function wpb_list_child_pages() { 

global $post; 

if ( is_page() && $post->post_parent )

	$childpages = wp_list_pages( 'sort_column=menu_order&title_li=&child_of=' . $post->post_parent . '&echo=0' );
else
	$childpages = wp_list_pages( 'sort_column=menu_order&title_li=&child_of=' . $post->ID . '&echo=0' );

if ( $childpages ) {

	$string = '<ul>' . $childpages . '</ul>';
}

return $string;

}

add_shortcode('wpb_childpages', 'wpb_list_child_pages');

