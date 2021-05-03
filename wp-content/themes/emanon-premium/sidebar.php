<?php
/**
 * The template for displaying sidebar
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

$display_ad_top    = get_theme_mod( 'display_ad_sidebar_top_' . DEVICE );
if ( ! is_active_sidebar( 'sidebar-widget-sp' )
		&& ! is_active_sidebar( 'sidebar-widget' )
		&& ! is_active_sidebar( 'sidebar-widget-sticky' )
		&& ! $display_ad_top
	) {
	return;
}
$hide_ad           = post_custom( 'emanon_hide_ad' );
$ad_top            = get_theme_mod( 'display_ad_sidebar_top' );
$display_ad_code   = '<div class="sidebar-ad">' . get_theme_mod( 'display_ad_code' ) . '</div>';
$link_ad_code      = '<div class="sidebar-ad">' . get_theme_mod( 'link_ad_code' ) . '</div>';
if ( 'display_ad' == $ad_top ) {
	$ad_code_top     = $display_ad_code;
} elseif ( 'link_ad' === $ad_top ) {
	$ad_code_top     = $link_ad_code;
} else {
	$ad_code_top     = '';
} 
$sidebar_design    = get_theme_mod( 'sidebar_design', 'sidebar-no-padding-no-border' );
$heading_design    = get_theme_mod( 'sidebar_heading_design', 'sidebar-none-style' );
$heading_align     = get_theme_mod( 'sidebar_heading_align', 'sidebar-left' );
?>

<aside class="sidebar <?php echo( $sidebar_design ); ?> <?php echo( $heading_align ); ?> <?php echo( $heading_design ); ?>">
<?php
	if ( $display_ad_top && ! $hide_ad ) {
		echo( $ad_code_top );
	}
	get_template_part( 'template-parts/parts/sidebar/sidebar-widget' );
?>
</aside><!--.sidebar-->