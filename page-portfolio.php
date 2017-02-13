<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package krzeminski.net
 */

get_header(); ?>
  
  <!-- <div id="primary" class="content-area"> -->
  <main id="main" class="site-main" role="main">
    
    <?php
    while ( have_posts() ) : the_post();
      
      the_content();
    
    endwhile; // End of the loop.
    ?>
    
    <?php
    // list all children
    $args = array(
      'post_type'      => 'page',
      'post_parent'    => $post->ID,
      'posts_per_page' => - 1,
      'orderby'        => 'menu_order',
      'order'          => 'ASC'
    );
    
    query_posts( $args );
    
    // The Loop
    echo '<section class="c-portfolio">';
    while ( have_posts() ) : the_post();
      echo '<article class="c-portfolio__item">';
      echo '<a href="' . get_permalink() . '">';
      if ( has_post_thumbnail() ) {
        the_post_thumbnail( 'portfolio-thumb', array( 'class' => 'c-portfolio__thumb' ) );
      }
      echo '<h3 class="c-portfolio__thumb-title">' . get_the_title() . '</h3>';
      echo '</a>';
      echo '</article>';
    endwhile;
    echo '</section>';
    
    // Reset Query
    wp_reset_query();
    
    ?>
  
  </main>

<?php
//get_sidebar();
get_footer();
