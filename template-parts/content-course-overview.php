<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package krzeminski.net
 */

?>

<article class="c-entry">
    <header class="c-entry__header">
        <?php the_title('<h1 class="c-entry__title">', '</h1>'); ?>
    </header>

    <div class="c-entry__content">
        <?php
        the_content();

        // List children elements
        $args = array('post_parent' => $post->ID, 'post_type' => 'courses', 'orderby' => 'menu_order', 'posts_per_page' => -1, 'order' => 'ASC');
        $child_query = new WP_Query($args);
        if ( $child_query->have_posts() ) :
        ?>
        <h2><?php _e('Table of contents', 'krzeminski-net'); ?>:</h2>
        <ul class="c-courses__list">
        <?php
            while ($child_query->have_posts()) : $child_query->the_post(); ?>
                <li class="c-courses__item">
                    <div class="c-courses__item-title">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        <div class="c-courses__label">
                            <?php _e('Length', 'krzeminski-net'); ?>
                            <?php the_cfc_field('courses_settings', 'length'); ?>
                        </div>
                    </div>
                    <a class="c-button c-button--small u-float-right" href="<?php the_permalink(); ?>">
                        <?php _e('Watch video', 'krzeminski-net'); ?>
                    </a>
                </li>
        <?php
            endwhile; // End of the loop.
        endif;
        wp_reset_query();
        ?>
        </ul>
        <?php
        wp_link_pages(array('before' => '<div class="page-links">' . esc_html__('Pages:', 'krzeminski-net'), 'after' => '</div>',));
        ?>
    </div>
    <?php if (current_user_can('edit_posts')) : ?>
    <footer class="c-entry__footer">
        <?php krzeminski_net_entry_footer(); ?>
    </footer>
    <?php endif; ?>
</article>
