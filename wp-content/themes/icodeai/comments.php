<?php
/**
 * The template for displaying comments.
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

<div class="section comments-area bg-light" id="comments">
	<div class="container">

		<div class="row">
			<div class="col-lg-8 mx-auto">


				<?php
				// You can start editing here -- including this comment!
				if ( have_comments() ) : ?>

					<ol class="comment-list">
						<?php
							wp_list_comments( array(
								'avatar_size' => 48,
								'style'       => 'ol',
								'reply_text'  => esc_html__( 'Reply', 'thesaasx' ),
							) );
						?>
					</ol>

					<?php the_comments_pagination( array(
						'prev_text' => '<span class="screen-reader-text">' . esc_html__( 'Previous', 'thesaasx' ) . '</span>',
						'next_text' => '<span class="screen-reader-text">' . esc_html__( 'Next', 'thesaasx' ) . '</span>',
					) );

					echo '<hr>';

				endif; // Check for have_comments().

				// If comments are closed and there are comments, let's leave a little note, shall we?
				if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

					<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'thesaasx' ); ?></p>
				<?php
				endif;

				$comments_args = array(
					'label_submit' => esc_html__( 'Submit Comment', 'thesaasx' ),
					'class_submit' => 'btn btn-primary btn-block',
					'fields' => apply_filters( 'comment_form_default_fields', array(

						'author' =>
							'<div class="form-group"><input id="author" name="author" class="form-control" type="text" placeholder="' . esc_html__( 'Name', 'thesaasx' ) . ' *"></div>',

						'email' =>
							'<div class="form-group"><input id="email" name="email" class="form-control" type="text" placeholder="' . esc_html__( 'Email', 'thesaasx' ) . ' *"></div>',

						'url' =>
							'<div class="form-group"><input id="url" name="url" class="form-control" type="text" placeholder="' . esc_html__( 'Website', 'thesaasx' ) . '"></div>',

						'cookie' => '<div class="form-group"><div class="custom-control custom-checkbox"><input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" class="custom-control-input" value="yes" checked><label class="custom-control-label">' . esc_html__( 'Save my name, email, and website in this browser for the next time I comment.', 'thesaasx' ) . '</label></div></div>'
						)
					),

					'comment_field' => '<div class="form-group"><textarea id="comment" name="comment" aria-required="true" class="form-control" placeholder="' . esc_html__( 'Comment', 'thesaasx' ) . ' *" rows="5"></textarea></div>',

				);

				comment_form( $comments_args );
				?>

			</div>
		</div>

	</div>
</div>
