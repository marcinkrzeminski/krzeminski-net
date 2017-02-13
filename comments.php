<?php
/**
 * The template for displaying comments.
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package krzeminski.net
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
  return;
}

function my_comments_callback( $comment, $args, $depth ) {
  $GLOBALS['comment'] = $comment;
  ?>
  <li <?php comment_class('c-comments__item-wrap'); ?>>
    <article class="c-comments__item">
      <footer class="c-comments__meta">
        <div class="c-comments__author vcard">
          <?php if ( 0 != $args['avatar_size'] ) echo get_avatar( $comment, $args['avatar_size'], '', false, array('class' => 'c-comments__avatar') ); ?>
          <?php printf( __( '%s <span class="says">says:</span>' ), sprintf( '<b class="fn">%s</b>', get_comment_author_link( $comment ) ) ); ?>
        </div><!-- .comment-author -->
      
        <div class="c-comments__metadata">
          <a href="<?php echo esc_url( get_comment_link( $comment, $args ) ); ?>">
            <time datetime="<?php comment_time( 'c' ); ?>">
              <?php
              /* translators: 1: comment date, 2: comment time */
              printf( __( '%1$s at %2$s' ), get_comment_date( '', $comment ), get_comment_time() );
              ?>
            </time>
          </a>
          <?php edit_comment_link( __( 'Edit' ), '<span class="edit-link">', '</span>' ); ?>
        </div><!-- .comment-metadata -->
      
        <?php if ( '0' == $comment->comment_approved ) : ?>
          <p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></p>
        <?php endif; ?>
      </footer><!-- .comment-meta -->
    
      <?php comment_text(); ?>
    
      <?php
      comment_reply_link( array_merge( $args, array(
        'add_below' => 'div-comment',
        'depth'     => $depth,
        'max_depth' => $args['max_depth'],
        'before'    => '<div class="reply">',
        'after'     => '</div>'
      ) ) );
      ?>
    </article><!-- .comment-body -->
  </li>
  <?php
}

?>

<div id="comments" class="c-comments">
  
  <?php
  // You can start editing here -- including this comment!
  if ( have_comments() ) : ?>
    <h2 class="c-comments__title">
      <?php
      printf( // WPCS: XSS OK.
        esc_html( _nx( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'krzeminski-net' ) ),
        number_format_i18n( get_comments_number() ),
        '<span>' . get_the_title() . '</span>'
      );
      ?>
    </h2>
    
    <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
      <nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
        <h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'krzeminski-net' ); ?></h2>
        <div class="nav-links">
          
          <div
            class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'krzeminski-net' ) ); ?></div>
          <div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'krzeminski-net' ) ); ?></div>
        
        </div><!-- .nav-links -->
      </nav><!-- #comment-nav-above -->
    <?php endif; // Check for comment navigation. ?>
    
    <ol class="c-comments__list">
      <?php
      wp_list_comments( array(
        'style'      => 'ol',
        'short_ping' => true,
        'callback'   => 'my_comments_callback'
      ) );
      ?>
    </ol><!-- .comment-list -->
    
    <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
      <nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
        <h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'krzeminski-net' ); ?></h2>
        <div class="nav-links">
          
          <div
            class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'krzeminski-net' ) ); ?></div>
          <div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'krzeminski-net' ) ); ?></div>
        
        </div><!-- .nav-links -->
      </nav><!-- #comment-nav-below -->
      <?php
    endif; // Check for comment navigation.
  
  endif; // Check for have_comments().
  
  
  // If comments are closed and there are comments, let's leave a little note, shall we?
  if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
    
    <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'krzeminski-net' ); ?></p>
    <?php
  endif;

  $fields =  array(
    'author' => '<p><label class="c-comments-form__label" for="author">' . __( 'Name' ) . ( $req ? ' *' : '' ).'</label>
                <input class="c-comments-form__field" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>',
    'email'  => '<p><label class="c-comments-form__label" for="email">' . __( 'Email' ) . ( $req ? ' *' : '' ).'</label>
    <input class="c-comments-form__field"  id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></p>',
    'url'    => '<p><label  class="c-comments-form__label" for="url">' . __( 'Website' ) . '</label>' .
                '<input class="c-comments-form__field"  id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>',
  );

  $comment_field = '<p><label class="c-comments-form__label" for="comment">' . _x( 'Comment', 'noun' ) . ' *</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>';
  
  $args = array(
    'fields' => $fields,
    'comment_field' => $comment_field,
    'class_form' => 'c-comments-form',
    'id_form' => false,
    'class_submit' => 'c-button',
    'title_reply_before' => '<h3 class="c-comments-form__reply-title">',
    'title_reply_after' => '</h3>'
  );
  
  comment_form($args);
  ?>

</div><!-- #comments -->
