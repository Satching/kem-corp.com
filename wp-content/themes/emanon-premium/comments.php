<?php
/**
 * The template for displaying comments
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

if ( post_password_required() ) {
	return;
}
if ( false === have_comments() && false === comments_open() ) {
	return;
}

$title_reply   = get_theme_mod( 'title_reply', __( '返信する', 'emanon-premium' ) );
$label_submit  = get_theme_mod( 'label_submit', __( 'コメントを投稿', 'emanon-premium' ) );
$req           = get_option( 'require_name_email' );
$aria_req      = ( $req ? " aria-required='true'" : '' );
$rating_field  = '<div class="comment-rating"><label for="rating">' . __( '評価スター', 'emanon-premium' ) . '</label><select name="rating">
<option value="">' . __( 'なし', 'emanon-premium' ) . '</option>
<option value="1">' . __( '星1', 'emanon-premium' ) . '</option>
<option value="1.5">' . __( '星1.5', 'emanon-premium' ) . '</option>
<option value="2">' . __( '星2', 'emanon-premium' ) . '</option>
<option value="2.5">' . __( '星2.5', 'emanon-premium' ) . '</option>
<option value="3">' . __( '星3', 'emanon-premium' ) . '</option>
<option value="3.5">' . __( '星3.5', 'emanon-premium' ) . '</option>
<option value="4">' .  __( '星4', 'emanon-premium' ) . '</option>
<option value="4.5">' . __( '星4.5', 'emanon-premium' ) . '</option>
<option value="5"> ' . __( '星5', 'emanon-premium' ) . '</option>
</select></div>';
$textarea_field  = '<div class="comment-form-comment"><label for="comment"><textarea id="comment" name="comment" tabindex="4" rows="5"></textarea></label></div>';
$form_rating     = get_theme_mod( 'display_comment_form_rating' );
if ( $form_rating ) {
	$comment_field = $textarea_field . $rating_field;
} else {
	$comment_field = $textarea_field;
}
$comments_args = array(
'title_reply'          => $title_reply,
'label_submit'         => $label_submit,
'comment_notes_before' => '',
'comment_field'        => $comment_field,
'fields'               => apply_filters( 'comment_form_default_fields', array(
		'author' =>
		'<div class="u-row u-row-wrap wrapper-col"><div class="col-6 comment-form-author">' .
		( $req ? '<span class="required">' . __( '［必須］', 'emanon-premium' ) . '</span>' : '' ) .
		'<input id="author" name="author" placeholder=' . __( '氏名', 'emanon-premium' ) . ' type="text" value="' . esc_attr( $commenter['comment_author'] ) .
		'" size="30"' . $aria_req . ' /></div>',
		'email' =>
		'<div class="col-6 comment-form-email">' .
		( $req ? '<span class="required">'  . __( '［必須］', 'emanon-premium' ) . '</span>' : '' ) .
		'<input id="email" name="email"  placeholder=' . __( 'Email', 'emanon-premium' ) . '  type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></div></div>',
		'url' => '',
		)
	),
);
?>

<aside class="comment-area">
	<?php if ( have_comments() ) : ?>
		<h3 id="comments" class="comment-title"><i class="icon-bubbles"></i><?php _e( 'コメント', 'emanon-premium' ); ?></h3>
		<ol class="comment-list">
			<?php wp_list_comments( 'type=comment&callback=emanon_comment' ); ?>
		</ol>
		<?php if ( get_comment_pages_count() > 1 ): ?>
		<div class="comment-page-link">
			<?php paginate_comments_links( array( 'prev_text' => __( '前へ', 'emanon-premium' ), 'next_text' => __( '次へ', 'emanon-premium' ), ) ); ?>
		</div><!-- comment-page-lin-->
		<?php endif; ?>
	<?php endif; ?>
	<?php
	if ( comments_open() ) {
		comment_form( $comments_args );
	}
	?>
</aside><!--#comment-area-->