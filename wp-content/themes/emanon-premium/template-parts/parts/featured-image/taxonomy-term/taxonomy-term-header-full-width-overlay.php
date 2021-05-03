<?php
/**
 * Taxonomy term header full width overlay
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

$term_id           = get_queried_object_id();
$image_sp          = get_term_meta( $term_id, 'cat_image_sp', true );
if ( is_mobile() && $image_sp ) {
	$image           = get_term_meta( $term_id, 'cat_image_sp', true );
	$size            = '600_338';
} else {
	$image           = get_term_meta( $term_id, 'cat_image_pc', true );
	$size            = '1200_675';
}
$height            = get_theme_mod( 'news_header_height_'. DEVICE,  '500' );
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
	<div class="u-background-cover">
		<div class="archive-header-full-width__thumbnail" style="background-image:url(<?php echo $thumbnail_src; ?>);"></div>
			<div class="archive-header-full-width__inner">
				<div class="l-content">
				<?php
					the_archive_title( '<h1 class="archive-title">','</h1>' );
					emanon_category_subtitle();
					emanon_archive_description();
				?>
				</div><!--/.l-content-->
			</div><!--/.archive-header-full-width__inner-->
	</div><!--/.u-background-cover-->
</div><!--/.archive-header-full-width-->