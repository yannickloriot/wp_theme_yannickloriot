<?php
/**
 * Eighties compatibility check.
 *
 * Prevents Eighties from running on WordPress versions
 * prior to 3.6, since this theme is not meant to
 * be backward compatible beyond that and relies
 * on many newer functions and markup changes
 * introduced in 3.6.
 *
 * @package Eighties
 * @author Justin Kopepasah
*/

/**
 * Prevent switching to Eighties on old versions of
 * WordPress and switches to the default theme.
 *
 * @since 1.0.0
 * @return void
 */
function eighties_switch_theme() {
	switch_theme( WP_DEFAULT_THEME, WP_DEFAULT_THEME );
	unset( $_GET['activated'] );
	add_action( 'admin_notices', 'eighties_upgrade_notice' );
}
add_action( 'after_switch_theme', 'eighties_switch_theme' );

/**
 * Add message for unsuccessful theme switch.
 *
 * Prints an update nag after an unsuccessful 
 * attempt to switch to Eighties on WordPress versions
 * prior to 3.6.
 *
 * @since 1.0.0
 * @return void
*/
function eighties_upgrade_notice() {
	$message = sprintf( __( 'Eighties requires at least WordPress version 3.6. You are running version %s. Please upgrade and try again.', 'eighties' ), $GLOBALS['wp_version'] );
	printf( '<div class="error"><p>%s</p></div>', $message );
}

/**
 * Prevent the Theme Customizer from being loaded
 * on WordPress versions prior to 3.6.
 *
 * @since 1.0.0
 * @return void
*/
function eighties_customize() {
	wp_die( sprintf( __( 'Eighties requires at least WordPress version 3.6. You are running version %s. Please upgrade and try again.', 'twentyfourteen' ), $GLOBALS['wp_version'] ), '', array(
		'back_link' => true,
	) );
}
add_action( 'load-customize.php', 'eighties_customize' );

/**
 * Prevent the Theme Preview from being loaded on
 * WordPress versions prior to 3.6.
 *
 * @since 1.0.0
 * @return void
*/
function eighties_preview() {
	if ( isset( $_GET['preview'] ) ) {
		wp_die( sprintf( __( 'Eighties requires at least WordPress version 3.6. You are running version %s. Please upgrade and try again.', 'twentyfourteen' ), $GLOBALS['wp_version'] ) );
	}
}
add_action( 'template_redirect', 'eighties_preview' );
