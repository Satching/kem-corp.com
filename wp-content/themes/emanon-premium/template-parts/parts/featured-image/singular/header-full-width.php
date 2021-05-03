<?php
/**
 * Header full width for post and page
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

if ( is_mobile() ) {
	$size            = '600_338';
} else {
	$size            = '1200_675';
}
if ( is_single() ) {
	$height          = get_theme_mod( 'post_header_height_'. DEVICE, '500' );
} elseif ( is_page() ) {
	$height          = get_theme_mod( 'page_header_height_'. DEVICE, '500' );
}
$featured_no_image = get_theme_mod( 'featured_no_image_'. $size );
$post_id           = get_queried_object_id();
$thumbnail_id      = get_post_thumbnail_id( $post_id );
$thumbnail_img     = wp_get_attachment_image_src( $thumbnail_id , $size );
if ( empty( $featured_no_image ) ) {
	$no_image = T_DIRE_URI . '/assets/images/no-img/' . $size . '.png';
} else {
	$no_image = esc_url( $featured_no_image );
}
if ( $thumbnail_img ) {
	$thumbnail_src = $thumbnail_img[0];
} else {
	$thumbnail_src = $no_image;
}
?>

<div class="article-header-full-width" style="height:<?php echo absint( $height ); ?>px">
	<div class="article-header-full-width__thumbnail" style="background-image:url(<?php echo $thumbnail_src ; ?>);"></div>
</div><!--.article-header-full-width-->