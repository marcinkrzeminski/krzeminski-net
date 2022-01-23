<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package krzeminski.net
 */

?>

</div>

<footer class="c-site-footer" role="contentinfo">
  <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'krzeminski-net' ) ); ?>">
    <?php printf( esc_html__( 'Proudly powered by %s', 'krzeminski-net' ), 'WordPress' ); ?>
  </a>
  & <a href="http://underscores.me/" rel="designer">Underscores.me</a>. <?php esc_html_e('&copy; Wszelkie prawa zastrzeżone', 'krzeminski-net'); ?>
	<?php wp_nav_menu( array(
		'theme_location' => 'footer',
		'menu_class'     => 'c-footer-nav'
	) ); ?>
</footer>

</div>

<?php wp_footer(); ?>
</body>
</html>
