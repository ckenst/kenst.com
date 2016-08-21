<?php
/**
 * The header for our theme.
 *
 * @package Stash
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php stash_metadata(); ?>
	<?php wp_head(); ?>
</head>

<?php $post_layout = ( 'layout_right_sidebar' == get_theme_mod( 'stash_post_layout' ) ) ? 'has-sidebar' : ''; ?>

<body <?php body_class( esc_html($post_layout) ); ?>>

<div id="page" class="site">

<?php if ( !is_404() ) : ?>

	<header id="masthead" class="site-header">

		<?php stash_site_logo(); ?>

		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'stash' ); ?></a>

		<?php if ( has_nav_menu( 'primary' ) ) : ?>
			<nav id="site-navigation" class="main-navigation hide-on-mobile" role="navigation">
				<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
			</nav><!-- .main-navigation -->
			<a id="nav-btn" class="mobile-menu-toggle" href="javascript:void(0);"><span><?php esc_html_e( 'Navigation', 'stash' ); ?></span></a>
		<?php endif;

		/*
		 * Add the search toggle, if selected in the Customizer.
		 * The $search_visibility class is used to show/hide the .searcb-btn div in the Customizer.
		 */
		$search_visibility = ( false == get_theme_mod('header_search') ) ? 'hidden' : '';
		if ( get_theme_mod( 'header_search' ) || is_customize_preview() ) : ?>
			<a id="search-btn" class="site-header--right search-btn<?php echo esc_html($search_visibility);?>" href="javascript:void(0);"><i class="icon fa fa-search fa-lg"></i></a>
		<?php endif;

		/*
		 * The $twitter_visibility class is used to show/hide the .site-header--right div in the Customizer.
		 */
		$twitter_visibility = ( false == get_theme_mod('header_twitter_btns') ) ? 'hidden' : '';
		if ( get_theme_mod( 'header_twitter_btns' ) || is_customize_preview() ) : ?>
			<div class="site-header--right hide-on-mobile <?php echo esc_html($twitter_visibility);?>">
				<?php stash_twitter_btn(); ?>
				<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
			</div>
		<?php endif; ?>

	</header><!-- .site-header -->

	<?php
	/*
	 * Add the search toggle, if selected in the Customizer.
	 */
	if ( get_theme_mod( 'header_search' ) || is_customize_preview() ) : ?>

	<form id="header-search" class="header-search" action="<?php echo home_url(); ?>/" method="get" >
		<input type="text" name="s" id="search"/>
		<button id="header-search--submit" class="header-search--submit" type="submit" aria-label="Submit"><i class="fa fa-search"></i></button>
		<span class="header-search--enter"><?php esc_html_e( 'Press Enter', 'stash' ); ?></span>
	</form><!-- END .header-search -->

	<?php endif; ?>

	<div id="content" class="site-content content-wrap">
		<div id="search-close" class="search-close"></div>

<?php endif; ?>
