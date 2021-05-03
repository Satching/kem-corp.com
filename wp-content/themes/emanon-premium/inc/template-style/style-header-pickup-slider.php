<?php
/**
 * Template style header pickup slider
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

function emanon_style_header_pickup_slider() {
	$firstview_layout = get_theme_mod( 'firstview_layout_type', 'display_none' );

	if ( 'header_pickup_slider' != $firstview_layout
			|| 'header_pickup_slider' === $firstview_layout && ! is_front_page() && ! is_home() 
			|| 'header_pickup_slider' === $firstview_layout && ! is_front_page() 
			|| 'header_pickup_slider' === $firstview_layout && is_paged() ) {
		return;
	}

	$slick_slide_css = '
	#js-header-pickup-slider {
		display: none;
	}
	#js-header-pickup-slider.slick-initialized {
		display: block;
	}
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
	.header-pickup-slider {
		background-repeat: no-repeat;
		background-position: center;
		background-size: cover;
		background-attachment: fixed;
		z-index: 300;
	}
	.header-pickup-slider__content {
		position: absolute;
		top: 50%;
		right: 0;
		left: 0;
		padding-top: 32px;
		padding-bottom: 32px;
		padding-right: 8px;
		padding-left: 8px;
		transform:translateY(-50%);
	}
	@media screen and (max-width: 544px) {
	.l-content.header-pickup-slider__content {
		width: calc(100% - 8px);
	}
	}
	.header-pickup-slider__item {
		position: relative;
		margin: 8px;
		border-radius: 3px;
		background-color: #fff;
		overflow: hidden;
	}
	@media screen and (min-width: 768px) {
	.header-pickup-slider__item {
		margin-right: 16px;
		margin-left: 16px;
	}
	}
	.header-pickup-slider__inner {
		position: relative;
		margin-right: 12px;
		margin-left: 12px;
		padding-top: 12px;
		padding-bottom: 12px;
		height: 120px;
		background-color: #fff;
	}
	.header-pickup-slider__title {
		position: relative;
		line-height: 1.5;
		font-size: 1rem;
		color: #333;
	}
	.header-pickup-slider__title .icon-lock {
		margin-right: 4px;
		font-size: 1rem;
		color: #828990;
	}
	.header-pickup-slider__meta {
		font-size: 0.72727rem;
		color: #484848;
	}
	.header-pickup-slider__meta .date {
		position: absolute;
		right: 16px;
		bottom: 16px;
	}
	.header-pickup-slider__meta .slider-cat {
		display: inline-block;
		overflow: hidden;
		position: absolute;
		bottom: 16px;
		left: 16px;
	}
	';

	$center_mode         = get_theme_mod( 'header_pickup_slider_center_mode_'. DEVICE );
	$slider_arrows       = get_theme_mod( 'header_pickup_slider_arrows_pc' );
	$slider_arrows_color = get_theme_mod( 'header_pickup_slider_arrows_color', emanon_primary_light_color() );

	if ( $slider_arrows && $center_mode ) {
		$arrows_css = '
			.main-visual .slick-prev,
			.main-visual .slick-next,
			.main-visual .slick-prev:hover,
			.main-visual .slick-next:hover {
				border-color: ' . $slider_arrows_color  . ';
			}
			@media screen and (min-width: 768px) {
			.main-visual .slick-prev {
				left: -32px;
			}
			.main-visual .slick-next {
				right: -32px;
			}
			.main-visual:hover .slick-prev {
				left: 12px;
			}
			.main-visual:hover .slick-next {
				right: 12px;
			}
			}
		';
	} elseif ( $slider_arrows ) {
		$arrows_css = '
			.main-visual .slick-prev,
			.main-visual .slick-next,
			.main-visual .slick-prev:hover,
			.main-visual .slick-next:hover {
				border-color: ' . $slider_arrows_color  . ';
			}
			@media screen and (min-width: 768px) {
			.main-visual .slick-prev {
				left: -32px;
			}
			.main-visual .slick-next {
				right: -32px;
			}
			.main-visual:hover .slick-prev {
				left: 6px;
			}
			.main-visual:hover .slick-next {
				right: 6px;
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

	$slider_dots              = get_theme_mod( 'header_pickup_slider_dots_'. DEVICE, true );
	$slider_dots_color        = get_theme_mod( 'header_pickup_slider_dots_color', '#e2e5e8' );
	$slider_dots_active_color = get_theme_mod( 'header_pickup_slider_dots_active_color', emanon_primary_light_color() );

	if ( $slider_arrows ) {
		$dots_css = '
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
			.header-pickup-slider .slick-dots {
				position: absolute;
				bottom: -8px;
				right: 0;
				left: 0;
			}
			.main-visual .slick-dots button {
				border: solid 2px ' . $slider_dots_color  . ';
				background-color: ' . $slider_dots_color  . ';
			}
			.main-visual .slick-dots button:hover,
			.main-visual .slick-dots .slick-active button {
				border: solid 2px ' . $slider_dots_active_color . ';
				background-color: ' . $slider_dots_active_color . ';
			}
		';
	} else {
		$dots_css = '';
	}

	$animation             = get_theme_mod( 'header_pickup_slider_text_animation', 'none' );

	if( 'fadein' === $animation ) {
		$animation_css = '
		.header-pickup-slider__content {
			animation: 0.3s fadeIn 0.6s linear forwards;
			opacity: 0;
		}
		.header-pickup-slider .slick-dots {
			animation: 0.5s fadeIn 1.0s linear forwards;
			opacity: 0;
		}
		';
	} elseif ( 'slideup' === $animation ) {
		$animation_css = '
		.header-pickup-slider__content {
			animation: 0.3s slideUpText 0.3s linear forwards;
			opacity: 0;
		}
		.header-pickup-slider .slick-dots {
			animation: 0.2s fadeIn 1.0s linear forwards;
			opacity: 0;
		}
		';
	} else {
		$animation_css = '';
	}

	$theme_css = $slick_slide_css . $main_visual_css . $arrows_css . $dots_css . $animation_css;

	return apply_filters( 'emanon_style_header_pickup_slider', emanon_css_minify( $theme_css ) );
}