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

        <?php endif; ?>

            <?php get_template_part( 'template-parts/biography' ); ?>

            <section class="hfeed">

                <?php
                # Rewind posts and print the list of all the posts
                # --------------------------------------------------------------------------
                $args  = array ( 'posts_per_page' => 15 );
                $query = new WP_Query( $args );

                if ( $query->have_posts() ) :

                    printf( '<h3 class="archive-title">%s</h3>', esc_html( 'Latest Articles', 'stash' ) );

                    # Open the list
                    # ----------------------------------------------------------------------
                    echo "<ol class='the-list-inner'>";

                    # Current day and month
                    # ------------------------------------------------------------------
                    $currentYear  = false;
                    $currentMonth = false;

                    while ( $query->have_posts() ) : $query->the_post();

                        # Fetch the content
                        # ------------------------------------------------------------------
                        $theTitle = get_the_title();
                        $theLink  = get_permalink();
                        $theYear  = get_the_date('Y');
                        $theMonth = get_the_date('F');
                        $theDay   = get_the_date('jS');
                        $theNewId = get_the_id();

                        # Print the divider when is the right moment to do it
                        # ------------------------------------------------------------------
                        //if ($theMonth != $currentMonth) :

                            //$the_class = ( $theYear != $currentYear ) ? '' : 'no_year';

                            //echo "<li class='the-divider {$the_class}'>";

                            # Print the year divider when appropriate
                            # ------------------------------------------------------------------
                              if ($theYear != $currentYear) :
                                 echo "<h3 class='the-year'>{$theYear}</h3>";
                                 $currentYear = $theYear;
                              endif;

                            //echo "<p class='the-month'>{$theMonth}, {$theYear}</p>";
                           // $currentMonth = $theMonth;
                        //endif;

                        # Print the list item
                        # ------------------------------------------------------------------
                        ?>
                        <li class="the-list-item">
                            <?php echo ($theId != $theNewId) ? "<a class='the-list-item-link' href='{$theLink}'><span class='the-list-item-title'>{$theTitle}</span><span class='the-list-item-spacer'></span><time class='the-list-item-date'>{$theDay}</time></a>" : "<span class='the-current-list-item'><span class='the-list-item-title'>{$theTitle}</span><span class='the-list-item-spacer'></span><time class='the-list-item-date'>{$theDay}</time></span>" ?>
                        </li>
                        <?php


                    endwhile;

                    # Close the list
                    # ------------------------------------------------------------------
                    echo "</ol>";

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
