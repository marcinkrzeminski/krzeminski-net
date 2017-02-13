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
	<?php the_post_thumbnail(array(75, 75), array('class' => 'c-entry__thumb')); ?>
	<header class="c-entry__header">
		<?php
		if ( is_single() ) :
			the_title( '<h1 class="c-entry__title">', '</h1>' );
		else :
			the_title( '<h2 class="c-entry__title"><a class="c-entry__link" href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) : ?>
		<div class="c-entry__meta">
			<?php krzeminski_net_posted_on(); ?>
		</div>
		<?php
		endif; ?>
	</header>

	<div class="c-entry__content clearfix">
		<?php

			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'krzeminski-net' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'krzeminski-net' ),
				'after'  => '</div>',
			) );
		?>
	</div>

	<footer class="c-entry__footer">
		<?php  krzeminski_net_entry_footer(); ?>
	</footer>
</article>
