<?php
/**
 * The template for displaying courses.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package krzeminski.net
 */

get_header();

// custom query - get only top level elements
$args = array(
    'post_parent' => 0,
    'post_type' => 'courses',
    'posts_per_page' => -1
);
$query = new WP_Query($args);
$page = get_query_var('paged');
if ($page > 0) {
    $post_type = get_queried_object();
    $slug = '/' . $post_type->rewrite['slug'];
    wp_redirect($slug, 301);
}
?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

            <?php
            if ( $query->have_posts() ) : ?>

                <?php
                /* Start the Loop */
                while ( $query->have_posts() ) : $query->the_post();

                    /*
                     * Include the Post-Format-specific template for the content.
                     * If you want to override this in a child theme, then include a file
                     * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                     */
                    get_template_part( 'template-parts/content', get_post_format() );

                endwhile;

            else :

                get_template_part( 'template-parts/content', 'none' );

            endif;

            ?>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_sidebar();
get_footer();
