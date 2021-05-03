<?php
/**
 * Template style header eyecatch
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

function emanon_style_header_eyecatch() {
	$firstview_layout = get_theme_mod( 'firstview_layout_type', 'display_none' );

	if ( 'header_eyecatch' != $firstview_layout 
			|| 'header_eyecatch' === $firstview_layout && ! is_front_page() && ! is_home() 
			|| 'header_eyecatch' === $firstview_layout && ! is_front_page() 
			|| 'header_eyecatch' === $firstview_layout && is_paged() ) {
		return;
	}

	$title_pc                   = get_theme_mod( 'header_eyecatch_title_fontsize_pc', 32 );
	$title_sp                   = get_theme_mod( 'header_eyecatch_title_fontsize_sp', 24 );
	$title_color                = get_theme_mod( 'header_eyecatch_title_color', '#ffffff' );
	$message_color              = get_theme_mod( 'header_eyecatch_message_color', '#ffffff' );
	$microcopy_color            = get_theme_mod( 'header_eyecatch_btn_microcopy_color', '#ffffff' );
	$btn_bg                     = get_theme_mod( 'header_eyecatch_btn_background' );
	if ( $btn_bg ) {
	$btn_border_color           = get_theme_mod( 'header_eyecatch_btn_border_color', '#ffffff' );
	$btn_background_color       = get_theme_mod( 'header_eyecatch_btn_border_color', '#ffffff' );
	$btn_text_color             = get_theme_mod( 'header_eyecatch_btn_text_color', '#ffffff' );
	$btn_border_hover_color     = get_theme_mod( 'header_eyecatch_btn_border_hover_color', emanon_primary_light_color() );
	$btn_background_hover_color = get_theme_mod( 'header_eyecatch_btn_border_hover_color', emanon_primary_light_color() );
	$btn_text_hover_color       = get_theme_mod( 'header_eyecatch_btn_text_color', '#ffffff' );
	} else {
	$btn_border_color           = get_theme_mod( 'header_eyecatch_btn_border_color', '#ffffff' );
	$btn_background_color       = 'inherit';
	$btn_text_color             = get_theme_mod( 'header_eyecatch_btn_text_color', '#ffffff' );
	$btn_border_hover_color     = get_theme_mod( 'header_eyecatch_btn_border_hover_color', emanon_primary_light_color() );
	$btn_background_hover_color = 'inherit';
	$btn_text_hover_color       = get_theme_mod( 'header_eyecatch_btn_border_hover_color', emanon_primary_light_color() );
	}
	$background_image_sp      = get_theme_mod( 'header_eyecatch_background_image_sp' );
	$background_image_pc      = get_theme_mod( 'header_eyecatch_background_image_pc', get_theme_file_uri('/assets/images/emanon-premium.jpg') );
	if ( is_mobile() && $background_image_sp ) {
		$background_image       = get_theme_mod( 'header_eyecatch_background_image_sp' );
	} elseif ( $background_image_pc ) {
		$background_image       = get_theme_mod( 'header_eyecatch_background_image_pc', get_theme_file_uri('/assets/images/emanon-premium.jpg') );
	} else {
		$background_image       = '';
	}
	$height                   = get_theme_mod( 'header_eyecatch_height_'. DEVICE, 500 );

	$main_visual_css = '
	/* main visual */
	.main-visual {
		position: relative;
		width: 100%;
		overflow: hidden;
	}
	.main-visual__overlay {
		position: absolute;
		top: 0;
		left: 0;
		right: 0;
		bottom: 0;
	}
	.main-visual__title {
		line-height: 1.2;
		letter-spacing: 0.1em;
		font-size: ' . $title_sp  . 'px;
		color: ' . $title_color  . ';
	}
	@media screen and (min-width: 768px) {
	.main-visual__title {
		font-size: ' . $title_pc  . 'px;
	}
	}
	.main-visual__message {
		margin-top: 8px;
		margin-bottom: 8px;
		letter-spacing: 0.08em;
		width: 100%;
		color: ' . $message_color  . ';
	}
	@media screen and (min-width: 768px) {
	.main-visual__message {
		margin: auto;
		margin-top: 24px;
		margin-bottom: 24px;
		font-size: 1.33333rem;
		width: 80%;
	}
	}
	.main-visual__btn {
		margin-top: 32px;
	}
	@media screen and (min-width: 768px) {
	.main-visual__btn {
		margin-top: 48px;
	}
	}
	.main-visual__microcopy {
		display: block;
		letter-spacing: 0.1em;
		font-size: 0.72727rem;
		font-weight: bold;
		color: ' . $microcopy_color  . ';
	}
	/* header-eyecatch */
	.header-eyecatch {
		position: relative;
		background-repeat: no-repeat;
		background-position: center;
		background-size: cover;
	}
	.header-eyecatch__item {
		position: absolute;
		top: 50%;
		right: 0;
		left: 0;
		transform: translateY(-50%);
		text-align: center;
		z-index: 100;
	}
	.header-eyecatch__item .col-6 {
		margin-bottom: 16px;
	}
	.header-eyecatch__search .custom-search {
		width: 100%;
		margin: auto;
	}
	
	@media screen and (min-width: 768px) {
	.header-eyecatch__search .custom-search {
		width: 80%;
	}
	}
	.header-eyecatch__form {
		padding: 16px 32px;
		border-radius: 3px;
		background-color: rgba(255,255,255,0.3);
		color: #fff;
	}
	.header-eyecatch__form label {
		display: block;
		margin-top: 8px;
		text-align: left;
		font-size: 0.88889rem;
	}
	.header-eyecatch__form input {
		margin-top: 8px;
		margin-bottom: 8px;
	}
	.header-eyecatch__form button,
	.header-eyecatch__form input[type="button"],
	.header-eyecatch__form input[type="submit"]{
		min-width: 30%;
	}
	.header-eyecatch__form .ajax-loader {
		display: none !important;
	}
	.header-eyecatch__movie {
		height: 195px;
	}
	@media screen and (min-width: 768px) {
	.header-eyecatch__movie {
		height: 326px;
		max-width: 580px;
	}
	}
	.header-eyecatch__movie video {
		margin: auto;
		height: 100%;
	}
	.particles-js-canvas-el {
		position: absolute;
		top: 0;
		right: 0;
		bottom: 0;
		left: 0;
		z-index: 50;
	}
	';

	$main_visual_btn = '
	/* main visual btn */
	.main-visual__btn .c-btn__outline,
	.header-eyecatch button,
	.header-eyecatch input[type="button"],
	.header-eyecatch input[type="submit"] {
		border: 2px solid ' . $btn_border_color  . ';
		background-color: ' . $btn_background_color  . ';
		color: ' . $btn_text_color  . ';
	}
	.main-visual__btn .c-btn__outline:hover,
	.header-eyecatch button:hover,
	.header-eyecatch input[type="button"]:hover,
	.header-eyecatch input[type="submit"]:hover {
		border: 2px solid ' . $btn_border_hover_color  . ';
		background-color: ' . $btn_background_hover_color  . ';
		color: ' . $btn_text_hover_color  . ';
	}
	';

	$text_animation             = get_theme_mod( 'header_eyecatch_text_animation', 'none' );

	if( 'fadein' === $text_animation ) {
		$text_animation_css = '
		.header-eyecatch__item {
			animation: 0.3s fade 0.6s linear forwards;
			opacity: 0;
		}
		.main-visual__btn,
		.main-visual__microcopy,
		.header-eyecatch__item .custom-search {
			animation: 0.5s fade 1.0s linear forwards;
			opacity: 0;
		}
		';
	} elseif ( 'slideup' === $text_animation ) {
		$text_animation_css = '
		.header-eyecatch__item {
			animation: 0.3s slideUpText 0.3s linear forwards;
			opacity: 0;
		}
		.main-visual__btn,
		.main-visual__microcopy,
		.header-eyecatch__item .custom-search {
			animation: 0.5s fade 1.0s linear forwards;
			opacity: 0;
		}
		';
	} else {
		$text_animation_css = '';
	}

	$theme_css = $main_visual_css . $main_visual_btn . $text_animation_css;

	return apply_filters( 'emanon_style_header_eyecatch', emanon_css_minify( $theme_css ) );
}