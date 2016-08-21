<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme and one of the
 * two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Stash
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<?php
		//Add site description to the header.
		$description = get_bloginfo( 'description', 'display' );
		if ( $description || is_customize_preview() ) : ?>

			<header class="entry-header">
				<?php printf( '<h1 class="entry-title site-description">%s</h1>', esc_html( $description ) ); ?>
				<hr class="divider">
			</header><!-- .entry-header -->

		<?php endif;

		/*
		 * Include the biography template for the author selected in the Customizer.
		 */
		get_template_part( 'template-parts/biography' );
		?>

		<section class="hfeed">
			<?php if ( have_posts() ) :

				//Add a title to the posts list.
				printf( '<h3 class="archive-title">%s</h3>', esc_html( 'Latest Articles', 'stash' ) );

				# Current Year
				$currentYear  = false;

				// Start the loop.
				while ( have_posts() ) : the_post();
          $theYear  = get_the_date('Y');

					# Print the year divider when appropriate
					if ($theYear != $currentYear) :
						 echo "<h3 class='the-year'>{$theYear}</h3>";
						 $currentYear = $theYear;
					endif;

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', get_post_format() );

				// End the loop.
				endwhile;

				// Previous/next page navigation.
				the_posts_pagination( array(
					'prev_text'          => __( 'Previous', 'stash' ),
					'next_text'          => __( 'Next', 'stash' ),
					'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'stash' ) . ' </span>',
				) );

			// If no content, include the "No posts found" template.
			else :
				get_template_part( 'template-parts/content', 'none' );
			endif;
			?>
		</section>

	</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer();
