<aside id="secondary" class="widget-area" role="complementary">
    <?php
        $current_post_id = $post->ID;
        $args = array(
                'post_type' => 'courses',
                'child_of' => $current_post_id
        );
        $children_count = count(get_pages($args));

        $args = array(
            'post_parent' => $post->post_parent,
            'post_type' => 'courses',
            'orderby' => 'menu_order',
            'posts_per_page' => -1,
            'order' => 'ASC'
        );
        $query = new WP_Query($args);

        if ($children_count == 0) :
    ?>
    <section class="c-widget">
        <h2 class="c-widget__title">
            <?php _e('Table of contents', 'krzeminski-net'); ?>:
        </h2>
        <ol class="c-widget__toc">
        <?php

            if ( $query->have_posts() ) :
                while ($query->have_posts()) : $query->the_post(); ?>
                    <li>
                        <a href="<?php the_permalink() ?>">
                        <?php if ($current_post_id == get_the_ID()) :  ?>
                            <strong>
                        <?php endif; ?>
                            <?php the_title(); ?>
                        <?php if ($current_post_id == get_the_ID()) : ?>
                            </strong>
                        <?php endif; ?>
                        </a>
                     </li>
                <?php
                endwhile;
            endif;
        ?>
        </ol>
    </section>
    <?php endif; ?>
    <section class="c-widget">
        <h2 class="c-widget__title">
            <?php _e('Other courses', 'krzeminski-net'); ?>
        </h2>
        <ul class="c-widget__courses">
        <?php
            $args = array(
                    'post_type' => 'courses',
                    'post_parent' => 0,
                    'exclude' => array($post->ID, $post->post_parent)
            );
            $posts = get_posts($args);
            foreach ( $posts as $post ) : setup_postdata( $post ); ?>
                <li class="c-widget__courses-item">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('full', array('class' => 'c-widget__courses-img')); ?>
                    </a>
                </li>
            <?php endforeach;
        ?>
        </ul>
    </section>
</aside>