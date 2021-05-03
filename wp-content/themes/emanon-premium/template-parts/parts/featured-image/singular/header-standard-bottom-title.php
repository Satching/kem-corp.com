<?php
/**
 * Header standard bottom title for post and page
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

if ( is_mobile() ) {
	$size = '600_338';
} else {
	$size = '800_450';
}
if ( 'post' == get_post_type() ) {
	$post_type = 'post';
} elseif ( 'page' == get_post_type() ) {
	$post_type = 'page';
}
$header_style  = get_theme_mod( $post_type . '_header_style', 'featured_standard' );
$thumbnail_id  = get_post_thumbnail_id();
$thumbnail_img = wp_get_attachment_image_src( $thumbnail_id , $size );
$article_header_width = post_custom( 'emanon_article_header_width' );
if ( 'default' === $article_header_width || empty( $article_header_width ) ) {
	$class_header_width = get_theme_mod( 'article_header_width', 'header__normal' );
} else {
	$class_header_width = post_custom( 'emanon_article_header_width' );
}
?>

<?php if( 'display_none' != $header_style && has_post_thumbnail() ): ?>
<div class="article-header__thumbnail article-header__bottom-title">
	<img src="<?php echo $thumbnail_img[0] ; ?>" alt="<?php echo get_the_title() ;?>">
	<?php emanon_featured_image_caption(); ?>
</div><!--.article-header__thumbnail-->
<?php endif; ?>
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
		?>
	</h1><?php
		emanon_subtitle();
		if( is_single() ) {
			emanon_post_meta();
		}
	?>
</div><!--.article-header__inner-->