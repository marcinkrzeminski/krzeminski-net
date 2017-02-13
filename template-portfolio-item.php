<?php
/**
 * Template Name: Portfolio item
 *
 * Single portfolio item
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package krzeminski.net
 */

get_header(); ?>

<main id="main" class="site-main" role="main">
  
  <article class="c-portfolio__details">
    <?php
    while ( have_posts() ) : the_post();
      echo '<h1 class="c-portfolio__main-title">';
      the_title();
      echo '<a class="c-portfolio__back" href="' . get_permalink( 11 ) . '">&lt; Powrót</a>';
      echo '</h1>';
      
      echo '<div class="c-portfolio__gallery">';
      the_post_thumbnail( 'full', array( 'class' => 'c-portfolio__item c-portfolio__item--full' ) );
      echo '</div>';
      
      echo '<div class="c-portfolio__description">';
      the_content();
      echo '</div>';
    
    endwhile; // End of the loop.
    ?>
  </article>
</main>

<?php get_footer(); ?>
