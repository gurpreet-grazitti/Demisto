<?php
if ( post_password_required() ):
    ?>
    <p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view comments.', 'szia' ); ?></p>       
    <?php
    return;
endif;
?>

<?php if ( have_comments() ): ?>

    <ol class="comment_list">
        <?php wp_list_comments( array( 'callback' => 'szia_comment' ) ); ?>
    </ol>

    <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ): ?>

        <nav class="pagination comments-pagination">
            <?php paginate_comments_links(); ?>
        </nav>

    <?php endif; ?>

<?php endif; ?>

<?php if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ): ?>

    <p class="nocomments"><?php _e( 'Comments are closed.', 'szia' ); ?></p>
    
<?php 
return ;
endif;
?>

<div id="post_reply">
<?php 

$req = get_option( 'require_name_email' );
$aria_req = ( $req ? " aria-required='true'" : '' );
$formargs = array(
	
  'id_form'           => 'form-horizontal',
  'id_submit'         => 'submit',
  'title_reply'       => __( '<h4><span>Share your thoughts</span></h4>','szia' ),
  'title_reply_to'    => __( 'Leave a Comment to %s','szia' ),
  'cancel_reply_link' => __( 'Cancel Comment','szia' ),
  'label_submit'      => __( 'Submit Comment','szia' ),

  'comment_field' =>  '<textarea id="comment" name="comment" cols="45" placeholder="' . _x( 'Comment*', 'noun', 'szia' ) .'" rows="3" aria-required="true">' .
    '</textarea>',

  'must_log_in' => '<p class="must-log-in">' .
    sprintf(
      __( 'You must be <a href="%s">logged in</a> to post a comment.','szia' ),
      wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )
    ) . '</p>',

  'logged_in_as' => '<p class="logged-in-as">' .
    sprintf(
    __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>','szia' ),
      admin_url( 'profile.php' ),
      $user_identity,
      wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) )
    ) . '</p>',

  'comment_notes_before' => '<p class="comment-notes">' .
    __( 'Your email address will not be published.','szia' ) . ( $req ? '<span class="required">*</span>' : '' ) .
    '</p>',
	'comment_notes_after' => '',
  'fields' => apply_filters( 'comment_form_default_fields', array(

    'author' =>
      '<div class="one_fourth column alpha">'.
      '<input type="text" id="inputName" placeholder="'.__('Your Name','szia').(($req)?'*':'').'" name="author" value="' . esc_attr( $commenter['comment_author'] ) .
      '" size="30"' . $aria_req . ' />' .      
      '</div>',

    'email' =>
      '<div class="one_fourth column">'.
      '<input class="form-control" id="inputEmail1" placeholder="'.__('Your Email','szia').(($req)?'*':'').'" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
      '" ' . $aria_req . ' />' .      
      '</div>',

    'url' =>
      '<div class="one_fourth column omega">'.
      '<input class="form-control" id="url" placeholder="'.__('Website','szia').'" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
      '" size="30" />' .
      '</div>'
    )
  ),
);


comment_form($formargs); 

?>
</div><!--.comment_section_border -->




