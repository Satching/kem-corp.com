<?php
/**
 * Header cover for post and page
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

if ( is_mobile() ) {
	$size            = '600_338';
} else {
	$size            = '800_450';
}
$featured_no_image = get_theme_mod( 'featured_no_image_'. $size );
$thumbnail_id      = get_post_thumbnail_id();
$thumbnail_img     = wp_get_attachment_image_src( $thumbnail_id , $size );
if ( empty( $featured_no_image ) ) {
	$no_image = T_DIRE_URI . '/assets/images/no-img/'. $size .'.png';
} else {
	$no_image = esc_url( $featured_no_image );
}
if ( has_post_thumbnail() ) {
	$thumbnail_src = $thumbnail_img[0];
} else {
	$thumbnail_src = $no_image;
}
?>

<div class="article-header__thumbnail article-header-cover">
	<div class="u-background-cover">
		<img src="<?php echo $thumbnail_src ; ?>" alt="<?php echo get_the_title() ;?>">
		<div class="article-header-cover__innner">
			<?php
				if( is_single() ) {
					emanon_post_category();
				}
			?>
			<h1 class="article-title"><?php
					if ( post_password_required() ) {
							echo '<i class="icon-lock"></i>';
						}
						if( mb_strlen( $post-> post_title ) > 56) {
							$title = mb_substr( $post -> post_title, 0, 58 );
							echo $title. '...' ;
						} else {
							echo $post -> post_title;
						}
						edit_post_link( __( '【編集】', 'emanon-premium' ), '<span class="edit-link">', '</span>' );
				?></h1>
			<?php
				emanon_subtitle();
				if( is_single() ) {
					emanon_post_meta();
				}
			?>
		</div><!--/.article-header-cover__innner"-->
	</div><!--/.u-background-cover-->
</div><!--/.article-header__thumbnail-->
<?php emanon_featured_image_caption(); ?>