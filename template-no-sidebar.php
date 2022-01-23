<?php
/**
 * Template Name: No Sidebar
 *
 * Full width - no sidebar
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package krzeminski.net
 */

get_header();

while ( have_posts() ) : the_post();
	get_template_part( 'template-parts/content', 'page' );
endwhile; // End of the loop.

get_footer();
