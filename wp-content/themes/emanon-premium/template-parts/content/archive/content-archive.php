<?php
/**
 * Template part for displaying archive
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

$sp_col              = get_theme_mod( 'archive_page_list_layout_sp', 'sp-list' );
if ( 'sp-card-2' === $sp_col ) {
	$class_sp_col = ' has-sp-card-2';
} else {
	$class_sp_col = '';
}
$h2_design           = get_theme_mod( 'h2_design', 'h2-none-style' );
$h3_design           = get_theme_mod( 'h3_design', 'h3-none-style' );
$h4_design           = get_theme_mod( 'h4_design', 'h4-none-style' );
$article_classes = array(
	$h2_design,
	$h3_design,
	$h4_design,
);
$term_id             = get_queried_object_id();
$page_id             = get_term_meta( $term_id, 'cat_page_id', true );
if( is_category() ) {
$header_style        = get_theme_mod( 'category_header_style', 'header_standard' );
$share               = get_theme_mod( 'display_share_category' );
} else {
$header_style        = get_theme_mod( 'tag_header_style', 'header_standard' );
$share               = get_theme_mod( 'display_share_tag' );
}
$ad_in_feed          = get_theme_mod( 'display_ad_in_feed_archive' );
$ad_in_feed_position = get_theme_mod( 'ad_in_feed_position' );
$ad_in_feed_num      = '0';
$ad_in_feed_count    = '1';
?>

<?php
	if ( ! is_author() && ! is_paged() && 'archive_header_standard' === $header_style || 
			! is_author() && ! is_paged() && 'archive_header_full_width' === $header_style || 
			is_tag() || 
			is_date() ) {
		get_template_part( 'template-parts/parts/featured-image/archive/archive-header-standard' );
	} elseif ( ! is_author() && ! is_paged() && 'archive_header_center' === $header_style ) {
		get_template_part( 'template-parts/parts/featured-image/archive/archive-header-center' );
	}
	if ( is_author() ) {
		get_template_part( 'template-parts/parts/author/author-profile-archive' );
	}
	if ( $share ) {
		get_template_part( 'template-parts/parts/sns/sns-share' );
	}
?>
<?php if ( $page_id && ! is_paged() ): ?>
<div <?php post_class( $article_classes ); ?>>
	<div class="article-body archive-article-body">
	<?php
		$page         = get_post( $page_id, 'OBJECT', 'raw' );
		$page_content = apply_filters( 'the_content', $page->post_content );
		echo $page_content;
	?>
	</div>
</div>
<?php endif; ?>
<div class="u-row u-row-wrap wrapper-col<?php echo esc_attr( $class_sp_col ); ?>">
	<?php
		if ( have_posts() ) :
			while ( have_posts() ) : the_post();
			if( $ad_in_feed && isset( $ad_in_feed_position[$ad_in_feed_num] ) && $ad_in_feed_position[$ad_in_feed_num] == $ad_in_feed_count ) {
				get_template_part( 'template-parts/parts/ad/ad-in-feed' );
				$ad_in_feed_num++; $ad_in_feed_count++;
			}
			get_template_part( 'template-parts/parts/archive-list/archive-list' );
			$ad_in_feed_count++;
			endwhile;
		endif;
	?>
</div>
<?php the_posts_pagination( array (
		'prev_text' => __( '前へ', 'emanon-premium' ),
		'next_text' => __( '次へ', 'emanon-premium' ), )
	);
?>