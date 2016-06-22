<?php
/**
 * 
 * Wip Blog functions and definitions
 * 
 * @package Wip_blog
 * @since Wip Blog 1.0
 * 
 */
 
/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since Wip Blog 1.0
 */

if ( ! isset( $content_width ) ) {
	$content_width = 700;
}


/**
 * Wip Blog only works in WordPress 4.3 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.3-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

if ( ! function_exists( 'wipblog_setup' ) ) :
/**
 * 
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * @since Wip Blog 1.0
 */
function wipblog_setup() {

	load_theme_textdomain( 'wip-blog', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'wip-blog' ),
		'footer'  => esc_html__( 'Footer Menu', 'wip-blog' )
	) );
	
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
	) );

}
endif; 
add_action( 'after_setup_theme', 'wipblog_setup' );


/**
 * 
 * Register widget area
 * @since Wip Blog 1.0
 */
if ( ! function_exists( 'wipblog_widgets_reg' ) ) :
	
function wipblog_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'wip-blog' ),
		'id'            =>  'wipblog-sidebar',
		'description'   => esc_html__( 'Add widgets here to appear in your sidebar.', 'wip-blog' ),
		'before_widget' => '<div id="%1$s" class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="details-color"><span class="line-center">',
		'after_title'   => '</span></h4>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer One', 'wip-blog' ),
		'id'            =>  'footer-one',
		'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'wip-blog' ),
		'before_widget' => '<div id="%1$s" class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="details-color"><span class="line-center">',
		'after_title'   => '</span></h4>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Two', 'wip-blog' ),
		'id'            =>  'footer-two',
		'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'wip-blog' ),
		'before_widget' => '<div id="%1$s" class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="details-color"><span class="line-center">',
		'after_title'   => '</span></h4>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Three', 'wip-blog' ),
		'id'            =>  'footer-three',
		'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'wip-blog' ),
		'before_widget' => '<div id="%1$s" class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="details-color"><span class="line-center">',
		'after_title'   => '</span></h4>',
	) );
}

endif;
add_action( 'widgets_init', 'wipblog_widgets_init' );


/**
 *  Enqueue scripts and styles
 *  @since Wip Blog 1.0
 */

if ( ! function_exists( 'wipblog_blog_enqueue_scripts' ) ) :
	
function wipblog_blog_enqueue_scripts() {
	wp_enqueue_style( 'wip-blog-style', get_stylesheet_uri(), array( 'bootstrap', 'font-awesome' ) );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/vendor/bootstrap/css/bootstrap.min.css' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/vendor/font-awesome/css/font-awesome.min.css' );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/vendor/bootstrap/js/bootstrap.min.js', array( 'jquery' ), '', true );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
endif;
add_action( 'wp_enqueue_scripts', 'wipblog_blog_enqueue_scripts' );


/**
 * 
 * Get's a value from kirki options
 * @since Wip Blog 1.07
 * 
 */
function wip_blog_get_option( $setting, $default ) {
    $wip_blog_options = get_option( 'wipblog', array() );
    $wip_blog_value = $default;
    if ( isset( $wip_blog_options[ $setting ] ) ) {
        $wip_blog_value = $wip_blog_options[ $setting ];
    }
    return $wip_blog_value;
}
/**
 *  Customize the excerpt ending
 *  @since Wip Blog 1.0
 */
if ( ! function_exists( 'wipblog_new_excerpt_more' ) ) :
	
function wipblog_new_excerpt_more( $more ) {
	return '...';
}
endif;
add_filter('excerpt_more', 'wipblog_new_excerpt_more');

if ( ! class_exists( 'wp_bootstrap_navwalker' ) ) {
	//Require bootstrap nav walker class
	include_once( get_template_directory(). '/vendor/wp-bootstrap-navwalker/wp_bootstrap_navwalker.php');
}

// Require custom template tags
include_once( get_template_directory() . '/inc/wipblog-template-tags.php');
// Include kirki config file
include_once( get_template_directory() . '/inc/wipblog-kirki-conf.php' );
// Include tgm plugin activation
include_once( get_template_directory() . '/inc/class-tgm-plugin-activation.php' );



/**
 * 
 * TGM plugin activation 
 * @since Wip Blog 1.0
 */
if ( ! function_exists( 'wipblog_register_required_plugins' ) ) : 

function wipblog_register_required_plugins(){
	
	$wipblog_plugins = array(
		array(
			'name'      => esc_html__( 'Kirki', 'wip-blog' ),
			'slug'      => 'kirki',
			'required'  => false,			
			)
		);
		
		$wipblog_config = array(
		'domain'	=> 'wip-blog',
        'default_path' => '',                      // Default absolute path to pre-packaged plugins.
        'menu'         => 'install-required-plugins', // Menu slug.
        'has_notices'  => true,                    // Show admin notices or not.
        'is_automatic' => true,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
        'strings'          => array(
	        'page_title'                      => esc_html__( 'Install Required Plugins', 'wip-blog' ),
	        'menu_title'                      => esc_html__( 'Install Plugins', 'wip-blog' ),
	        'installing'                      => esc_html__( 'Installing Plugin: %s', 'wip-blog' ),
	        'oops'                            => esc_html__( 'Something went wrong with the plugin API.', 'wip-blog' ),
	        'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'wip-blog' ),
	        'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'wip-blog' ),
	        'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'wip-blog' ),
	        'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'wip-blog' ),
	        'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'wip-blog' ),
	        'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'wip-blog' ),
	        'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'wip-blog' ),
	        'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'wip-blog' ),
	        'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'wip-blog' ),
	        'activate_link'                   => _n_noop( 'Activate installed plugin', 'Activate installed plugins', 'wip-blog' ),
	        'return'                          => esc_html__( 'Return to Required Plugins Installer', 'wip-blog' ),
	        'plugin_activated'                => esc_html__( 'Plugin activated successfully.', 'wip-blog' ),
	        'complete'                        => esc_html__( 'All plugins installed and activated successfully. %s', 'wip-blog' ),
	        'nag_type'                        => 'updated'
	    )                  
		);
		tgmpa( $wipblog_plugins, $wipblog_config );
}
endif;
add_action( 'tgmpa_register', 'wipblog_register_required_plugins' );