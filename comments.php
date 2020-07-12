<?php

/**
 * Comments
 * @package voila
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if (post_password_required()) {
	return;
}

// comments
if (have_comments()) :
	?>
	<h2 class="comments-title comment-reply-title">
		<?php
			if (get_comments_number()) {
				echo get_comments_number() . esc_html__(' Comments', 'voila');
			} else {
				echo esc_html__('No Comments.', 'voila');
			}
			?>
	</h2><!-- .comments-title -->
	<ul class="comment-list">
		<?php
			wp_list_comments(array(
				'style'      => 'ul',
				'short_ping' => true,
				'callback' => 'voila_comments_callback'
			));
			?>
	</ul><!-- .comment-list -->

	<?php the_comments_navigation(); ?>

<?php
	// If comments are closed and there are comments, let's leave a little note, shall we?
	if (!comments_open()) {
		echo wp_sprintf(
			'<p class="no-comments">%s</p>',
			esc_html__('Comments are closed.', 'voila')
		);
	}

endif; // Check for have_comments().

$commenter = wp_get_current_commenter();
$req = get_option('require_name_email');
$aria_req = ($req ? " aria-required='true'" : '');
$fields =  array(
	'author' => '<div class="row-form row"><div class="col-form col-md-6"><div class="form-group">
		<input id="author" class="form-control" placeholder="' . esc_html__('Name', 'voila') . '" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '" size="30"' . $aria_req . ' />
		</div></div>',
	'email' => '<div class="col-form col-md-6">
		<div class="form-group">
		<input id="email" class="form-control" placeholder="' . esc_html__('Email', 'voila') . '" name="email" type="text" value="' . esc_attr($commenter['comment_author_email']) . '" size="30"' . $aria_req . ' />
		</div></div></div>'
);

$comments_args = array(
	'fields' =>  $fields,
	'title_reply' => esc_html__('Leave a comment', 'voila'),
	'label_submit' => esc_html__('Submit Comment', 'voila'),
	'id_form' => 'form-comments',
	'class_form' => 'comment-form',
	'class_submit' => 'btn btn-color-green ',
	'id_submit' => 'submit-btn',
	'label_submit' => esc_html__('Submit', 'voila'),
	'comment_field' =>  '<div class="form-group">
			<textarea placeholder="' . esc_html__('Enter Your Comment', 'voila') . '" name="comment" id="comment-field" class="form-control" placeholder="Comment" rows="5" aria-required="true"></textarea>
		</div>'
);
comment_form($comments_args);
