<?php
/**
 * Separator wave
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

$layout = get_theme_mod( 'firstview_layout_type', 'display_none' );
if ( 'header_eyecatch'             === $layout ) {
	$separator_color = get_theme_mod( 'header_eyecatch_separator_color', '#eeeff0' );
} elseif ( 'header_image_slider'   === $layout ) {
	$separator_color = get_theme_mod( 'header_image_slider_separator_color', '#eeeff0' );
} elseif ( 'header_content_slider' === $layout ) {
	$separator_color = get_theme_mod( 'header_content_slider_separator_color', '#eeeff0' );
}
?>

<svg class="separator-section-wave" style="fill: <?php echo esc_attr( $separator_color ); ?>;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 990 100" preserveAspectRatio="none">
	<path d="M 0 58 s 188.29 32 508 32 c 290 0 494 -35 494 -35 v 45 h -1002 z"></path>
</svg><!--/.separator-section-wave-->