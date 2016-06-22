<?php
/**
 * Wip Blog back compat functionality
 *
 * Prevents Wip Blog from running on WordPress versions prior to 4.1,
 * since this theme is not meant to be backward compatible beyond that and
 * relies on many newer functions and markup changes introduced in 4.1.
 *
 * @package Wip_Blog
 * @since Wip Blog 1.0
 */

/**
 * Prevent switching to Wip Blog on old versions of WordPress.
 *
 * Switches to the default theme.
 *
 * @since Wip Blog 1.0
 */
function wipblog_switch_theme() {
	switch_theme( WP_DEFAULT_THEME, WP_DEFAULT_THEME );
	unset( $_GET['activated'] );
	add_action( 'admin_notices', 'wipblog_upgrade_notice' );
}
add_action( 'after_switch_theme', 'wipblog_switch_theme' );

/**
 * Add message for unsuccessful theme switch.
 *
 * Prints an update nag after an unsuccessful attempt to switch to
 * Wip Blog on WordPress versions prior to 4.1.
 *
 * @since Wip Blog 1.0
 */
function wipblog_upgrade_notice() {
	$wipblog_message = sprintf( esc_html__( 'Wip Blog requires at least WordPress version 4.1. You are running version %s. Please upgrade and try again.', 'wip-blog' ), $GLOBALS['wp_version'] );
	printf( '<div class="error"><p>%s</p></div>', $wipblog_message );
}

/**
 * Prevent the Customizer from being loaded on WordPress versions prior to 4.1.
 *
 * @since Wip Blog 1.0
 */
function wipblog_prevent_customize() {
	wp_die( sprintf( esc_html__( 'Wip Blog requires at least WordPress version 4.1. You are running version %s. Please upgrade and try again.', 'wip-blog' ), $GLOBALS['wp_version'] ), '', array(
		'back_link' => true,
	) );
}
add_action( 'load-customize.php', 'wipblog_prevent_customize' );

/**
 * Prevent the Theme Preview from being loaded on WordPress versions prior to 4.1.
 *
 * @since Wip Blog 1.0
 */
function wipblog_preview() {
	if ( isset( $_GET['preview'] ) ) {
		wp_die( sprintf( esc_html__( 'Wip Blog requires at least WordPress version 4.1. You are running version %s. Please upgrade and try again.', 'wip-blog' ), $GLOBALS['wp_version'] ) );
	}
}
add_action( 'template_redirect', 'wipblog_preview' );
