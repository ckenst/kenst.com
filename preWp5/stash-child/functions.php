<?php
/**
 *
 * Stash child theme functions and definitions
 * 
 * @package Stash
 * @author  Richard Tabor <rich@themebeans.com>
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU Public License
 * 
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 */


/**
 * Check whether WP_DEBUG or SCRIPT_DEBUG or STASH_DEBUG is set to true. 
 * If so, we’ll load the unminified versions of the main theme stylesheet. If not, load the compressed and combined version.
 * This is also similar to how WordPress core does it. 
 * 
 * @link https://codex.wordpress.org/WP_DEBUG
 */
function stash_child_scripts() {
	if ( WP_DEBUG || SCRIPT_DEBUG || STASH_DEBUG ) {
		// Add the main stylesheet.
		wp_enqueue_style( 'stash-parent-style', get_template_directory_uri(). '/style.css' );
	} else {
		// Add the main minified stylesheet.
		wp_enqueue_style('stash-parent-minified-style', get_template_directory_uri(). '/style-min.css', false, '1.0', 'all');
	}
}
add_action( 'wp_enqueue_scripts', 'stash_child_scripts' );