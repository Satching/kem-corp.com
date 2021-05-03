<?php
/**
 * Header full width overlay for post and page
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
	<div class="u-background-cover">
		<div class="article-header-full-width__thumbnail" style="background-image:url(<?php echo $thumbnail_src; ?>);"></div>
			<div class="article-header-full-width__inner">
				<?php while ( have_posts() ): the_post(); ?>
				<div class="l-content">
					<?php
						if( is_single() ) {
							emanon_header_cover_category();
						}
					?>
					<h1 class="article-title"><?php
							if ( post_password_required() ) {
									echo '<i class="icon-lock"></i>';
								}
								the_title();
								edit_post_link( __( '【編集】', 'emanon-premium' ), '<span class="edit-link">', '</span>' );
						?></h1>
					<?php emanon_subtitle();
						if( is_single() ) {
							emanon_post_meta();
						}
					?>
				</div><!--/.l-content-->
				<?php endwhile; ?>
			</div><!--/.article-header-full-width__inner-->
	</div><!--/.u-background-cover-->
</div><!--/.article-header-full-width-->
