<?php
/**
 * Archive header full width
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

$term_id           = get_queried_object_id();
if ( is_mobile() ) {
	$size            = '600_338';
} else {
	$size            = '1200_675';
}
$image             = get_term_meta( $term_id, 'cat_image_'. DEVICE, true );
$height            = get_theme_mod( 'category_header_height_'. DEVICE, '500' );
$featured_no_image = get_theme_mod( 'featured_no_image_'. $size );
if ( ! $featured_no_image ) {
	$no_image = T_DIRE_URI . '/assets/images/no-img/' . $size . '.png';
} else {
	$no_image = esc_url( $featured_no_image );
}
if ( $image ) {
	$thumbnail_src = $image;
} else {
	$thumbnail_src = $no_image;
}
?>

<div class="archive-header-full-width" style="height:<?php echo absint( $height ); ?>px">
	<div class="archive-header-full-width__thumbnail" style="background-image:url(<?php echo $thumbnail_src; ?>);"></div>
</div><!--/.archive-header-full-width-->