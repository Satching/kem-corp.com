<?php
/**
 * Home header full width
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

$image_sp          = get_theme_mod( 'home_heade_image_sp' );
if ( is_mobile() && $image_sp ) {
	$image           = get_theme_mod( 'home_heade_image_sp' );
	$size            = '600_338';
} else {
	$image           = get_theme_mod( 'home_heade_image_pc' );
	$size            = '1200_675';
}
$height            = get_theme_mod( 'home_header_height_'. DEVICE, '500' );
$featured_no_image = get_theme_mod( 'featured_no_image_'. $size );
if ( ! $featured_no_image ) {
	$no_image = T_DIRE_URI . '/assets/images/no-img/'. $size .'.png';
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
</div><!--.archive-header-full-width-->