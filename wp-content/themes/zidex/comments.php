<?php
/**
 * The template for displaying comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php /* You can start editing here -- including this comment!*/ ?>

	<?php if ( have_comments() ) : ?>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : /* are there comments to navigate through*/ ?>
		<nav id="comment-nav-above" class="comment-navigation" role="navigation">
			<h1 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'zidex' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'zidex' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'zidex' ) ); ?></div>
		</nav>
		<?php endif; /* check for comment navigation */ ?>

		<div class="comment-list comments-area theme_comments comments">
			<h2 class="heading-bottom">
				<?php
					$comments_number = get_comments_number();
					if ( '1' === $comments_number ) {
					  /* translators: %s: post title */
					  printf( _x( 'One Reply to &ldquo;%s&rdquo;', 'comments title', 'zidex' ), get_the_title() );
					} else {
					  printf(
					    /* translators: 1: number of comments, 2: post title */
					    _nx(
					      '%1$s Reply to &ldquo;%2$s&rdquo;',
					      '%1$s Replies to &ldquo;%2$s&rdquo;',
					      $comments_number,
					      'comments title',
					      'zidex'
					    ),
					    number_format_i18n( $comments_number ),
					    get_the_title()
					  );
					}
				?>
			</h2>
			<?php wp_list_comments( 
				array(
					'type' => 'comment',
					'callback' => 'zidex_custom_comments'
				)
			); ?>

			<!-- PINGBACKS and TRACEBACKS -->
			<div class="comments-pingbacks-tracebacks">
				<?php wp_list_comments( 
					array(
						'type' => 'pingback'
					)
				); ?>
			</div>
		</div><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : /* are there comments to navigate through*/ ?>
		<nav id="comment-nav-below" class="comment-navigation" role="navigation">
			<h1 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'zidex' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'zidex' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'zidex' ) ); ?></div>
		</nav><!-- #comment-nav-below -->
		<?php endif; /* check for comment navigation*/ ?>

	<?php endif; /* have_comments()*/ ?>

	<?php
		/* If comments are closed and there are comments, let's leave a little note, shall we?*/
		if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'zidex' ); ?></p>
	<?php endif; ?>

	<?php 
		$args = array(
			'id_form'           => 'commentform',
			'id_submit'         => 'submit',
			'title_reply'       => esc_html__( 'Leave a comment', 'zidex' ),
			'title_reply_to'    => esc_html__( 'Leave a reply to %s', 'zidex' ),
			'cancel_reply_link' => esc_html__( 'Cancel reply', 'zidex' ),
			'label_submit'      => esc_html__( 'Add comment', 'zidex' ),

			'comment_field' =>  '<p class="comment-form-comment"><label for="comment">' . esc_html__( 'Comment', 'zidex' ) .
				'</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true">' .
				'</textarea></p>',

			'must_log_in' => '<p class="must-log-in">' .
				sprintf(
					esc_html__( 'You must be ','zidex') . '<a href="%s">'.esc_html__('logged in','zidex').'</a>' . esc_html__('to post a comment.', 'zidex' ),
					wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )
				) . '</p>',

			'logged_in_as' => '<p class="logged-in-as">' .
				sprintf(
				esc_html__( 'Logged in as ','zidex') . '<a href="%1$s">%2$s</a>. <a href="%3$s" title="'.esc_attr__( 'Log out of this account','zidex').'">'.esc_html__( 'Log out?','zidex').'</a>',
					admin_url( 'profile.php' ),
					$user_identity,
					wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) )
				) . '</p>',

			'comment_notes_before' => 
			'<p class="comment-notes"></p>',

		    'comment_field' =>
		    	'<div class=" form-comment">' .
		    	'<p class="comment-form-author relative ">' .
		    	'<textarea cols="45" rows="5" aria-required="true" placeholder="' . esc_attr__( 'Your comment', 'zidex' ) . '" name="comment" id="comment"></textarea></div>',

			'fields' => apply_filters( 'comment_form_default_fields', array(
			    'author' =>
			    	'<div class="row form-fields">' .
			    	'<p class="comment-form-author relative col-md-4">' .
			    	'<input class="focus-me" placeholder="' . esc_attr__( 'Your name', 'zidex' ) . '" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
			    	'" size="30" /><i class="icon-user absolute"></i></p>',
			    'email' =>
			    	'<p class="comment-form-author relative col-md-4">' .
			    	'<input class="focus-me" placeholder="' . esc_attr__( 'Your email', 'zidex' ) . '" id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
			    	'" size="30" /><i class="icon-envelope absolute"></i></p>',
			    'url' =>
			    	'<p class="comment-form-author relative col-md-4">' .
			    	'<input class="focus-me" placeholder="' . esc_attr__( 'Your website', 'zidex' ) . '" id="url" name="url" type="text" value="' . esc_attr(  $commenter['comment_author_url'] ) .
			    	'" size="30" /><i class="icon-globe absolute"></i></p></div>'
			)
		  ),
		);
		 
		comment_form($args);
	?>
</div>