<?php
/**
 * Template style header image slider
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

function emanon_style_header_image_slider() {
	$firstview_layout = get_theme_mod( 'firstview_layout_type', 'display_none' );

	if ( 'header_image_slider' != $firstview_layout
			|| 'header_image_slider' === $firstview_layout && ! is_front_page() && ! is_home() 
			|| 'header_image_slider' === $firstview_layout && ! is_front_page() 
			|| 'header_image_slider' === $firstview_layout && is_paged() ) {
		return;
	}

	$title_pc                   = get_theme_mod( 'header_image_slider_title_fontsize_pc', 32 );
	$title_sp                   = get_theme_mod( 'header_image_slider_title_fontsize_sp', 24 );
	$title_color                = get_theme_mod( 'header_image_slider_title_color', '#ffffff' );
	$message_color              = get_theme_mod( 'header_image_slider_message_color', '#ffffff' );
	$microcopy_color            = get_theme_mod( 'header_image_slider_btn_microcopy_color', '#ffffff' );
	$btn_bg                     = get_theme_mod( 'header_image_slider_btn_background' );
	if ( $btn_bg ) {
	$btn_border_color           = get_theme_mod( 'header_image_slider_btn_border_color', '#ffffff' );
	$btn_background_color       = get_theme_mod( 'header_image_slider_btn_border_color', '#ffffff' );
	$btn_text_color             = get_theme_mod( 'header_image_slider_btn_text_color', '#ffffff' );
	$btn_border_hover_color     = get_theme_mod( 'header_image_slider_btn_border_hover_color', emanon_primary_light_color() );
	$btn_background_hover_color = get_theme_mod( 'header_image_slider_btn_border_hover_color', emanon_primary_light_color() );
	$btn_text_hover_color       = get_theme_mod( 'header_image_slider_btn_text_color', '#ffffff' );
	} else {
	$btn_border_color           = get_theme_mod( 'header_image_slider_btn_border_color', '#ffffff' );
	$btn_background_color       = 'inherit';
	$btn_text_color             = get_theme_mod( 'header_image_slider_btn_text_color', '#ffffff' );
	$btn_border_hover_color     = get_theme_mod( 'header_image_slider_btn_border_hover_color', emanon_primary_light_color() );
	$btn_background_hover_color = 'inherit';
	$btn_text_hover_color       = get_theme_mod( 'header_image_slider_btn_border_hover_color', emanon_primary_light_color() );
	}

	$slick_slide_css = '
	.slider-item {
		position: relative;
	}
	.slick-slider {
		display: block;
		position: relative;
		box-sizing: border-box;
		-webkit-user-select: none;
		-moz-user-select: none;
		-ms-user-select: none;
		user-select: none;
		-webkit-touch-callout: none;
		-khtml-user-select: none;
		-ms-touch-action: pan-y;
		touch-action: pan-y;
		-webkit-tap-highlight-color: transparent;
		overflow: hidden;
		z-index: 1;
	}
	.slick-list {
		position: relative;
		display: block;
		margin: 0;
		padding: 0;
		overflow: hidden;
		z-index: 1;
	}
	.slick-list:focus {
		outline: none;
	}
	.slick-list.dragging {
		cursor: pointer;
		cursor: hand;
	}
	.slick-arrow {
		position: absolute;
		top: 50%;
		-webkit-transform: translateY(-50%);
		transform: translateY(-50%);
		padding: 0;
		z-index: 1000;
	}
	.slick-prev,
	.slick-next {
		width: 1.45pc;
		height: 1.45pc;
		border-color: #3f5973;
		border-style: solid;
		border-width: 3px 3px 0 0;
		background-color: transparent;
		transition: all 0.2s ease-in;
		cursor: pointer;
	}
	.slick-prev {
		transform: rotate(-135deg);
	}
	.slick-next {
		transform: rotate(45deg);
	}
	.slick-prev:hover,
	.slick-next:hover {
		background: initial;
		opacity: 0.8;
	}
	.slick-prev:focus,
	.slick-next:focus {
		outline: none;
	}
	.slick-dots {
		margin-top: 16px;
		text-align: center;
	}
	.slick-dots li {
		display: inline-block;
		margin: 0 4px;
	}
	.slick-dots button {
		position: relative;
		height: 3px ;
		width: 30px;
		line-height: 1;
		padding: 0;
		border: none;
		outline: none;
		border-radius: 3px;
		cursor: pointer;
		vertical-align: middle;
		box-shadow: none;
		text-indent: 100%;
		white-space: nowrap;
		overflow: hidden;
		background-color: #b8bcc0;
		-webkit-transition: all 0.3s ease;
		transition: all 0.3s ease;
	}
	';

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
	.main-visual-slider__inner {
		position:absolute;
		top: 50%;
		right: 0;
		left: 0;
		transform:translateY(-50%);
		text-align:center;
		z-index: 300;
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
	.main-visual__title .icon-lock {
		font-size: 1.33333rem;
	}
	@media screen and (min-width: 768px) {
	.main-visual__title .icon-lock {
		font-size: 1.6rem;
	}
	}
	@media screen and (min-width: 768px) {
	.main-visual__sub-title {
		font-size: 1.6rem;
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
	.main-visual .slick-next,
	.main-visual .slick-prev {
		display: none;
		width: 1.2pc;
		height: 1.2pc;
		transition: all 0.2s ease-in;
	}
	@media screen and (min-width: 768px) {
	.main-visual .slick-prev,
	.main-visual .slick-next {
		width: 1.45pc;
		height: 1.45pc;
	}
	}
	.main-visual:hover .slick-next,
	.main-visual:hover .slick-prev {
		display: block;
	}
	/* header image sliderl */
	.header-image-slider__item {
		position: absolute;
		top: 0;
		bottom: 0;
		right: 0;
		left: 0;
		background-size: cover;
		background-position: 50% 50%;
		background-repeat: no-repeat;
	}
	';

	$main_visual_btn = '
	/* main visual btn */
	.main-visual__btn .c-btn__outline {
		border: 2px solid ' . $btn_border_color  . ';
		background-color: ' . $btn_background_color  . ';
		color: ' . $btn_text_color  . ';
	}
	.main-visual__btn .c-btn__outline:hover {
		border: 2px solid ' . $btn_border_hover_color  . ';
		background-color: ' . $btn_background_hover_color  . ';
		color: ' . $btn_text_hover_color  . ';
	}
	';

	$slider_autoplay     = get_theme_mod( 'header_image_slider_autoplay_'. DEVICE, true );
	$slider_fade         = get_theme_mod( 'header_image_slider_fade_'. DEVICE, true );
	$slider_effect_speed = 6;
	$slider_animation    = get_theme_mod( 'header_image_slider_animation', 'none' );

	if( 'expansion_image' === $slider_animation && $slider_autoplay && $slider_fade ) {
		$slider_css = '
		.slick-slide.slick-current .header-image-slider__item,
		.slick-slide.is-active .header-image-slider__item {
			animation: expansion-image ' . $slider_effect_speed  . 's linear;
		}
		';
		} elseif ( 'reduced_image' === $slider_animation && $slider_autoplay && $slider_fade ) {
		$slider_css = '
		.slick-slide.slick-current .header-image-slider__item,
		.slick-slide.is-active .header-image-slider__item {
			animation: reduced-image ' . $slider_effect_speed  . 's linear;
		}
		';
		} elseif ( 'slide_image' === $slider_animation && $slider_autoplay && $slider_fade ) {
		$slider_css = '
		.header-image-slider__item {
			position: absolute;
			right: -48px;
			left: -48px;
		}
		.slick-slide.slick-current .header-image-slider__item,
		.slick-slide.is-active .header-image-slider__item {
			animation: slide-image ' . $slider_effect_speed  . 's linear;
		}
		';
	} else {
		$slider_css = '';
	}

	$text_animation             = get_theme_mod( 'header_image_slider_text_animation', 'none' );

	if( 'fadein' === $text_animation ) {
		$text_animation_css = '
		.main-visual-slider__inner {
			animation: 0.3s fade 0.6s linear forwards;
			opacity: 0;
		}
		.main-visual__btn,
		.main-visual__microcopy {
			animation: 0.5s fade 1.0s linear forwards;
			opacity: 0;
		}
		';
	} elseif ( 'slideup' === $text_animation ) {
		$text_animation_css = '
		.main-visual-slider__inner {
			animation: 0.3s slideUpText 0.3s linear forwards;
			opacity: 0;
		}
		.main-visual__btn,
		.main-visual__microcopy {
			animation: 0.2s fade 1.0s linear forwards;
			opacity: 0;
		}
		';
	} else {
		$text_animation_css = '';
	}

	$slider_arrows            = get_theme_mod( 'header_image_slider_arrows_'. DEVICE );
	$slider_arrows_color      = get_theme_mod( 'header_image_slider_arrows_color' ,'#ffffff' );

	if ( $slider_arrows ) {
		$arrows_css = '
			.main-visual .slick-prev,
			.main-visual .slick-next,
			.main-visual .slick-prev:hover,
			.main-visual .slick-next:hover {
				border-color: ' . $slider_arrows_color  . ';
			}
			.main-visual .slick-prev {
				left: 8px;
			}
			.main-visual .slick-next {
				right: 8px;
			}
			@media screen and (min-width: 768px) {
			.main-visual .slick-prev {
				left: -32px;
			}
			.main-visual .slick-next {
				right: -32px;
			}
			.main-visual:hover .slick-prev {
				left: 32px;
			}
			.main-visual:hover .slick-next {
				right: 32px;
			}
			}
		';
	} else {
		$arrows_css = '
			.main-visual .slick-next,
			.main-visual .slick-prev {
				display: none;
			}
		';
	}

	$theme_css = $slick_slide_css . $main_visual_css . $main_visual_btn . $slider_css . $text_animation_css . $arrows_css;

	return apply_filters( 'emanon_style_header_image_slider', emanon_css_minify( $theme_css ) );
}