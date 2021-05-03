<?php
/**
 * Header no image for post and page
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

if ( is_mobile() ) {
	$size = '600_338';
} else {
	$size = '800_450';
}
$article_header_width = post_custom( 'emanon_article_header_width' );
if ( 'default' === $article_header_width || empty( $article_header_width ) ) {
	$class_header_width = get_theme_mod( 'article_header_width', 'header__normal' );
} else {
	$class_header_width = post_custom( 'emanon_article_header_width' );
}
?>

<div class="article-header__inner <?php echo esc_attr( $class_header_width ); ?>">
	<?php
		if( is_single() ) {
			emanon_post_category();
		}
	?>
	<h1 class="article-title"><?php
			if ( post_password_required() ) {
					echo '<i class="icon-lock"></i>';
				}
				the_title();
				edit_post_link( __( '【編集】', 'emanon-premium' ), '<span class="edit-link">', '</span>' );
		?></h1>
	<?php
		emanon_subtitle();
		if( is_single() ) {
			emanon_post_meta();
		}
	?>
</div><!--/.article-header__inner-->