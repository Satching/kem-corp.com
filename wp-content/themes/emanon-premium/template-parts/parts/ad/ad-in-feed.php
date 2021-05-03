<?php
/**
 * Ad in feed for archive
 *
 * @since 1.0.0
 * @package Emanon Premium
 */
if ( is_front_page() ) {
	$pc_layout     = get_theme_mod( 'front_page_layout', 'two-r-col' );
	$sp_col        = get_theme_mod( 'front_page_list_layout_sp', 'sp-lis' );
	$pc_col        = get_theme_mod( 'front_page_list_layout_pc', 'pc-list' );
} elseif ( is_home() ) {
	$pc_layout     = get_theme_mod( 'home_page_layout', 'two-r-col' );
	$sp_col        = get_theme_mod( 'home_page_list_layout_sp', 'sp-list' );
	$pc_col        = get_theme_mod( 'home_page_list_layout_pc', 'pc-list' );
} elseif ( is_archive() ) {
	$pc_layout     = get_theme_mod( 'archive_page_layout', 'two-r-col' );
	$sp_col        = get_theme_mod( 'archive_page_list_layout_sp', 'sp-list' );
	$pc_col        = get_theme_mod( 'archive_page_list_layout_pc', 'pc-list' );
}
$ad_in_feed_code = get_theme_mod( 'ad_in_feed_code_'. DEVICE );
?>
<!--in feed ad-->
<article class="<?php echo esc_attr( $sp_col ); ?> <?php echo esc_attr( $pc_col ); ?> u-shadow-hover ad-in-feed-list archive-list">
	<?php echo ( $ad_in_feed_code ); ?>
</article>
<!--end in feed ad-->