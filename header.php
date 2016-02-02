<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Eighties
 * @author Justin Kopepasah
 * @since 1.0.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no"">
	<?php
	if (is_front_page() && is_home()) {
		$tagline = get_bloginfo('description');

		echo "<meta name=\"description\" content=\"$tagline\"/>";
	}
	else {
		$post = get_post();
    setup_postdata( $post );
    $excerpt = get_the_excerpt();
		$excerpt = (strlen($excerpt) > 155) ? substr($excerpt,0, 152).'...' : $excerpt;
    wp_reset_postdata();

		echo "<meta name=\"description\" content=\"$excerpt\"/>";
	}
	?>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="page" class="hfeed site">
		<div class="site-toggles">
			<a href class="main-navigation-toggle"><i class="fa fa-bars"></i></a>
			<?php if ( is_active_sidebar( 'eighties-interactive-sidebar' ) ) : ?>
				<a href class="widget-area-toggle"><i class="fa fa-align-right"></i></a>
			<?php endif; ?>
		</div>

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<a href class="main-navigation-toggle"><i class="fa fa-times"></i></a>
			<h4 class="main-navigation-title"><?php _e( 'Menu', 'eighties' ); ?></h4>
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
			<?php wp_nav_menu( array( 'theme_location' => 'social', 'menu_class' => 'menu menu-social', 'link_before' => '<span class="screen-reader-text">', 'link_after' => '</span>', 'fallback_cb' => false ) ); ?>
		</nav><!-- #site-navigation -->

		<?php if ( eighties_header_image() || get_theme_mod( 'header_textcolor' ) !== 'blank' ) : ?>
			<header id="masthead" class="site-header" role="banner">
				<a class="skip-link screen-reader-text" href="#content" <?php echo ( eighties_header_image() ) ? 'data-backstretch="' . eighties_header_image() . '"' : ''; ?>><?php _e( 'Skip to content', 'eighties' ); ?></a>
				<div class="site-branding">
					<?php if ( is_home() || is_front_page() ) { echo "<h1 class=\"site-title\">"; } else { echo "<div class=\"site-title\">"; } ?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
					<?php if ( is_home() || is_front_page() ) { echo "</h1>"; } else { echo "</div>"; } ?>
					<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
					<nav class="site-social-nav">
						<a href="https://github.com/yannickl" alt="Github" class="github"><i class="fa fa-github"></i></span></a>
						<a href="https://twitter.com/yannickloriot" alt="Twitter" class="twitter"><i class="fa fa-twitter"></i></a>
						<a href="https://plus.google.com/u/0/+YannickLoriot" alt="Google+" class="googleplus"><i class="fa fa-google-plus"></i></a>
						<a href="https://www.linkedin.com/in/yannickloriot" alt="LinkedIn" class="linkedin"><i class="fa fa-linkedin"></i></a>
						<a href="http://yannickloriot.com/rss" alt="Rss Feed" class="rss"><i class="fa fa-rss"></i></span></a>
					</nav>
				</div>
			</header><!-- #masthead -->
		<?php endif; ?>

		<div id="content" class="site-content">
