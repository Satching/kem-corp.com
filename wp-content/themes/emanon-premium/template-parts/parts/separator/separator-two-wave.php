<?php
/**
 * Separator two wave
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

<svg class="separator-section-two-wave" style="fill: <?php echo esc_attr( $separator_color ); ?>;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1700 125">
<path d="M411.508257,69.4430067 C620.022076,69.4430067 765.627462,123.195712 1018.94865,106.096466 C1272.26983,88.9972199 1261.00061,31.1844231 1543.63349,5.19177089 C1617.05737,-1.56073949 1667.98789,-0.587323324 1700.01983,8.9765625 L1700.01983,125 L0,125 C135.329626,87.9620045 272.499045,69.4430067 411.508257,69.4430067 Z"></path>
</svg><!--/.separator-section-two-wave-->
