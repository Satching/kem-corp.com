<?php
/**
 * First view template
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

$layout = get_theme_mod( 'firstview_layout_type', 'display_none' );
?>

<?php
	if ( 'header_eyecatch'             === $layout ) {
		get_template_part( 'template-parts/parts/first-view/header-eyecatch' );
	} elseif ( 'header_image_slider'   === $layout ) {
		get_template_part( 'template-parts/parts/first-view/header-image-slider' );
	} elseif ( 'header_content_slider' === $layout ) {
		get_template_part( 'template-parts/parts/first-view/header-content-slider' );
	} elseif ('header_pickup_slider'   === $layout ) {
		get_template_part( 'template-parts/parts/first-view/header-pickup-slider');
	} elseif ( 'header_pagebox_slider' === $layout ) {
		get_template_part( 'template-parts/parts/first-view/header-pagebox-slider' );
	} elseif ( 'header_video'          === $layout ) {
		get_template_part( 'template-parts/parts/first-view/header-video' );
	}
?>