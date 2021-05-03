<?php
/**
 * Template style header video
 *
 * @since 1.0.0
 * @package Emanon Premium
 */


function emanon_style_header_video() {
	$firstview_layout = get_theme_mod( 'firstview_layout_type', 'display_none' );

	if ( 'header_video' != $firstview_layout
			|| 'header_video' === $firstview_layout && ! is_front_page() && ! is_home() 
			|| 'header_video' === $firstview_layout && ! is_front_page() 
			|| 'header_video' === $firstview_layout && is_paged() ) {
		return;
	}

	$title_pc                   = get_theme_mod( 'header_video_title_fontsize_pc', 32 );
	$title_sp                   = get_theme_mod( 'header_video_title_fontsize_sp', 24 );
	$title_color                = get_theme_mod( 'header_video_title_color', '#ffffff' );
	$message_color              = get_theme_mod( 'header_video_message_color', '#ffffff' );
	$microcopy_color            = get_theme_mod( 'header_video_btn_microcopy_color', '#ffffff' );
	$btn_bg                     = get_theme_mod( 'header_video_btn_background' );
	if ( $btn_bg ) {
	$btn_border_color           = get_theme_mod( 'header_video_btn_border_color', '#ffffff' );
	$btn_background_color       = get_theme_mod( 'header_video_btn_border_color', '#ffffff' );
	$btn_text_color             = get_theme_mod( 'header_video_btn_text_color', '#ffffff' );
	$btn_border_hover_color     = get_theme_mod( 'header_video_btn_border_hover_color', emanon_primary_light_color() );
	$btn_background_hover_color = get_theme_mod( 'header_video_btn_border_hover_color', emanon_primary_light_color() );
	$btn_text_hover_color       = get_theme_mod( 'header_video_btn_text_color', '#ffffff' );
	} else {
	$btn_border_color           = get_theme_mod( 'header_video_btn_border_color', '#ffffff' );
	$btn_background_color       = 'inherit';
	$btn_text_color             = get_theme_mod( 'header_video_btn_text_color', '#ffffff' );
	$btn_border_hover_color     = get_theme_mod( 'header_video_btn_border_hover_color', emanon_primary_light_color() );
	$btn_background_hover_color = 'inherit';
	$btn_text_hover_color       = get_theme_mod( 'header_video_btn_border_hover_color', emanon_primary_light_color() );
	}
	$header_video_mp4_id        = get_theme_mod( 'header_video_mp4' );
	$header_video_movie_url     = get_theme_mod( 'header_video_movie_url' );

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
		font-size: 1.6rem;
		color: ' . $title_color  . ';
		font-size: ' . $title_sp  . 'px;
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
	.main-visual__sub-title {
		margin-top: 32px;
		line-height: 1.2;
		letter-spacing: 0.1em;
		font-size: 1.33333rem;
		font-weight: bold;
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
	/* header-video */
	.header-video {
		position: relative;
		margin-top: -60px;
		overflow: hidden;
	}
	.is-overlay .header-video {
		margin-top: 0;
	}
	@media screen and ( min-width: 768px ) {
	.header-video {
		margin-top: 0;
	}
	}
	.header-video__image {
		position: absolute;
		top: 0;
		right: 0;
		bottom: 0;
		left: 0;
		background-size: cover;
		background-position: 50% 50%;
		background-repeat: no-repeat;
	}
	.header-video__mp4 {
		position: absolute;
		z-index: -1;
	}
	.header-video__inner {
		position: absolute;
		top: 50%;
		width: 100%;
		transform: translateY(-50%);
		text-align: center;
		z-index: 100;
	}
	.sound-btn {
		display: block;
		margin: auto;
		padding-top: 2rem;
		width: 100px;
		cursor: pointer;
	}
	.sound-btn .icon-chevron-right {
		position: relative;
		width: 16px;
		height: 16px;
		border-radius: 50%;
		font-size: 1rem;
	}
	.sound-btn.active .icon-chevron-right {
		display: none;
	}
	.sound-visualizer {
		display: none;
		margin-right: 1px;
		width: 1px;
		height: 16px;
		-webkit-transform-origin: left bottom;
		transform-origin: left bottom;
		-webkit-transform: scaleY(0);
		transform: scaleY(0);
	}
	.sound-btn.active .sound-visualizer {
		display: inline-block;
	}
	.sound-visualizer:nth-child(2) {
		animation: sound-visualize 0.9s ease-out 0.2s infinite alternate;
	}
	.sound-visualizer:nth-child(3) {
		animation: sound-visualize 1.0s ease-out 0.3s infinite alternate;
	}
	.sound-visualizer:nth-child(4) {
		animation: sound-visualize 1.0s ease-out 0.2s infinite alternate;
	}
	.sound-visualizer:nth-child(5) {
		animation: sound-visualize 0.8s ease-out 0.4s infinite alternate;
	}
	.sound-visualizer:nth-child(6) {
		margin-right: 0;
		animation: sound-visualize 0.8s ease-out 0.1s infinite alternate;
	}
	.sound-text {
		display: block;
		line-height: 1;
		letter-spacing: 0.1em;
		font-size: 0.66667rem;
	}
	.header-video .scroll-down {
		bottom: 5%;
	}
	@media screen and (min-width: 768px) {
	.header-video .scroll-down {
		bottom: 3%;
	}
	}
	.scroll-down {
		position: absolute;
		right: 0;
		left: 0;
		bottom: 8%;
		text-align: center;
		font-size: 0.88889rem;
		z-index: 100;
	}
	.scroll-down__label {
		letter-spacing: 0.1em;
	}
	@media screen and (min-width: 768px) {
	.scroll-down {
		bottom: 12%;
		font-size: 1rem;
	}
	}
	.scroll-down__icon .icon-chevron-down {
		font-size: 2rem;
	}
	.scroll-down__text {
		display: block;
		letter-spacing: 0.05em;
		font-size: 0.72727rem;
		font-weight: 300;
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

	$display_audio_play_icon = get_theme_mod( 'header_video_display_audio_play_icon' );
	$play_icon_color = get_theme_mod( 'header_audio_play_icon_color', '#ffffff' );

	if ( ! is_mobile() && $display_audio_play_icon ) {
		$sound_btn_css = '
		.sound-btn .icon-chevron-right {
			border: 1px solid ' . $play_icon_color . ';
			color: ' . $play_icon_color . ';
		}
		.sound-visualizer {
			background-color: ' . $play_icon_color . ';
		}
		.sound-text {
			color: ' . $play_icon_color . ';
		}
		';
	} else {
		$sound_btn_css = '';
	}

	$down_icon_animation = get_theme_mod( 'header_video_down_icon_animation', 'spin' );
	$down_icon_color     = get_theme_mod( 'header_video_down_icon_color', '#ffffff' );

	if ( 'spin' === $down_icon_animation ) {
		$scroll_down_css = '
		/* scroll down icon */
		.scroll-down {
			color: ' . $down_icon_color . ';
		}
		.scroll-down__icon {
			animation: spinY 1.5s linear infinite;
		}
		';
	} elseif ( 'fadedown' === $down_icon_animation ) {
		$scroll_down_css = '
		/* header video scroll down icon */
		.scroll-down {
			color: ' . $down_icon_color . ';
		}
		.scroll-down__icon {
			animation: slideDown 1.5s linear infinite;
		}
		';
	} else {
		$scroll_down_css = '';
	}

	$theme_css = $main_visual_css . $main_visual_btn . $sound_btn_css . $scroll_down_css;

	return apply_filters( 'emanon_style_header_video', emanon_css_minify( $theme_css ) );
}