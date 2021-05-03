<?php
/**
 * Template style color
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

/**
 * カラーパレット
 */
if ( ! function_exists( 'emanon_custom_color_palettes' ) ) {
function emanon_custom_color_palettes() {
	$color_palettes_type   = get_theme_mod( 'color_palettes_type', 'default_palettes' );
	if ( 'default_palettes' == $color_palettes_type ) {
		$color_palettes = json_encode(
			array(
				'#3f5973',
				'#8ba0b6',
				'#d1e3f6',
				'#8c6e8c',
				'#bc9cbc',
				'#3e3a3a',
				'#333333',
				'#ffffff',
			)
		);
	} elseif ( 'blue_palettes' == $color_palettes_type ) {
		$color_palettes = json_encode(
			array(
				'#4f85ab',
				'#93b5cd',
				'#80b5dd',
				'#d8dbd9',
				'#f2f3f3',
				'#aed265',
				'#333333',
				'#ffffff',
			)
		);
	} elseif ( 'green_palettes' == $color_palettes_type ) {
		$color_palettes = json_encode(
			array(
				'#91c9a4',
				'#cae5d3',
				'#fdffff',
				'#c0c6d6',
				'#dfe2ea',
				'#9cc9e5',
				'#333333',
				'#ffffff',
			)
		);
	} elseif ( 'lime_palettes' == $color_palettes_type ) {
		$color_palettes = json_encode(
			array(
				'#bcd537',
				'#d4e47d',
				'#f1ff6b',
				'#d9eaec',
				'#f0f7f7',
				'#74a64c',
				'#333333',
				'#ffffff',
			)
		);
	} elseif ( 'purple_palettes' == $color_palettes_type ) {
		$color_palettes = json_encode(
			array(
				'#836fa9',
				'#b39ddb',
				'#e6ceff',
				'#8aacc8',
				'#bbdefb',
				'#3e3a3a',
				'#333333',
				'#ffffff',
			)
		);
	} elseif ( 'pink_palettes' == $color_palettes_type ) {
		$color_palettes = json_encode(
			array(
				'#dcadbb',
				'#f0dde3',
				'#fff8ff',
				'#9bc4cc',
				'#dfecee',
				'#af9dc0',
				'#333333',
				'#ffffff',
			)
		);
	} elseif ( 'brown_palettes' == $color_palettes_type ) {
		$color_palettes = json_encode(
			array(
				'#7c2e1e',
				'#b05a46',
				'#e58872',
				'#b19962',
				'#e4ca90',
				'#2a4743',
				'#333333',
				'#ffffff',
			)
		);
	} elseif ( 'gray_palettes' == $color_palettes_type ) {
		$color_palettes = json_encode(
			array(
				'#5e5e5e',
				'#a5a5a5',
				'#c4c4c4',
				'#ccc5c0',
				'#e3dfdc',
				'#1a0b08',
				'#333333',
				'#ffffff',
			)
		);
	}

	wp_add_inline_script( 'wp-color-picker', 'jQuery.wp.wpColorPicker.prototype.options.palettes = ' . $color_palettes . ';' );
}
add_action( 'customize_controls_enqueue_scripts', 'emanon_custom_color_palettes' );
add_action('admin_print_scripts', 'emanon_custom_color_palettes');
} // End if()

/**
 * デフォルト値［プライマリー］
 */
function emanon_primary_color() {
	$color_palettes_type   = get_theme_mod( 'color_palettes_type', 'default_palettes' );
	if ( 'default_palettes' == $color_palettes_type ) {
		$color_value = '#3f5973';
	} elseif ( 'blue_palettes'   == $color_palettes_type ) {
		$color_value = '#4f85ab';
	} elseif ( 'green_palettes'  == $color_palettes_type ) {
		$color_value = '#91c9a4';
	} elseif ( 'lime_palettes'   == $color_palettes_type ) {
		$color_value = '#bcd537';
	} elseif ( 'purple_palettes' == $color_palettes_type ) {
		$color_value = '#836fa9';
	} elseif ( 'pink_palettes'   == $color_palettes_type ) {
		$color_value = '#dcadbb';
	} elseif(  'brown_palettes'  == $color_palettes_type ) {
		$color_value = '#7c2e1e';
	} elseif ( 'gray_palettes'   == $color_palettes_type ) {
		$color_value = '#5e5e5e';
	}
	return $color_value;
}

/**
 * デフォルト値［プライマリー ライト］
 */
function emanon_primary_light_color() {
	$color_palettes_type   = get_theme_mod( 'color_palettes_type', 'default_palettes' );
	if ( 'default_palettes' == $color_palettes_type ) {
		$color_value = '#8ba0b6';
	} elseif ( 'blue_palettes'   == $color_palettes_type ) {
		$color_value = '#93b5cd';
	} elseif ( 'green_palettes'  == $color_palettes_type ) {
		$color_value = '#cae5d3';
	} elseif ( 'lime_palettes'   == $color_palettes_type ) {
		$color_value = '#d4e47d';
	} elseif ( 'purple_palettes' == $color_palettes_type ) {
		$color_value = '#b39ddb';
	} elseif ( 'pink_palettes'   == $color_palettes_type ) {
		$color_value = '#f0dde3';
	} elseif ( 'brown_palettes'  == $color_palettes_type ) {
		$color_value = '#b05a46';
	} elseif ( 'gray_palettes'   == $color_palettes_type ) {
		$color_value = '#a5a5a5';
	}
	return $color_value;
}

/**
 * デフォルト値［セカンダリ］
 */
function emanon_secondary_color() {
	$color_palettes_type   = get_theme_mod( 'color_palettes_type', 'default_palettes' );
	if ( 'default_palettes' == $color_palettes_type ) {
		$color_value = '#8c6e8c';
	} elseif ( 'blue_palettes'   == $color_palettes_type ) {
		$color_value = '#d8dbd9';
	} elseif ( 'green_palettes'  == $color_palettes_type ) {
		$color_value = '#c0c6d6';
	} elseif ( 'lime_palettes'   == $color_palettes_type ) {
		$color_value = '#d9eaec';
	} elseif ( 'purple_palettes' == $color_palettes_type ) {
		$color_value = '#8aacc8';
	} elseif ( 'pink_palettes'   == $color_palettes_type ) {
		$color_value = '#9bc4cc';
	} elseif ( 'brown_palettes'  == $color_palettes_type ) {
		$color_value = '#b19962';
	} elseif ( 'gray_palettes'   == $color_palettes_type ) {
		$color_value = '#ccc5c0';
	}
	return $color_value;
}

/**
 * デフォルト値［リンク］
 */
function emanon_link_color() {
	$color_value = '#004e8e';
	return $color_value;
}

/**
 * デフォルト値［リンク ホバー］
 */
function emanon_link_hover_color() {
	$color_value = '#828990';
	return $color_value;
}

/**
 * 配色
 */
function emanon_style_colors() {

	/**
	 * General colors
	 */
	$primary_color                          = get_theme_mod( 'primary_color', emanon_primary_color() );
	$primary_light_color                    = get_theme_mod( 'primary_light_color', emanon_primary_light_color() );
	$secondary_color                        = get_theme_mod( 'secondary_color', emanon_secondary_color() );
	$link_color                             = get_theme_mod( 'link_color', emanon_link_color() );
	$link_hover_color                       = get_theme_mod( 'link_hover_color', emanon_link_hover_color() );
	$link_hover_colorcode                   = str_replace( '#', '', $link_hover_color );
	$link_hover_color_red                   = hexdec( substr( $link_hover_colorcode, 0, 2) );
	$link_hover_color_green                 = hexdec( substr( $link_hover_colorcode, 2, 2 ) );
	$link_hover_color_blue                  = hexdec( substr( $link_hover_colorcode, 4, 2 ) );
	$background_color                       = '#' .get_theme_mod( 'background_color', 'ffffff' );
	/**
	 * Header colors
	 */
	$header_background_color                = get_theme_mod( 'header_background_color', '#ffffff' );
	$header_info_color                      = get_theme_mod( 'header_info_color', '#333333' );
	$site_title_color                       = get_theme_mod( 'site_title_color', '#333333' );
	$site_description_color                 = get_theme_mod( 'site_description_color', '#828990' );
	/**
	 * Header menu colors
	 */
	$menu_background_color                  = get_theme_mod( 'menu_background_color', '#ffffff' );
	$menu_items_color                       = get_theme_mod( 'menu_items_color', '#333333' );
	$menu_items_hover_color                 = get_theme_mod( 'menu_items_hover_color', emanon_primary_light_color() );
	$sub_menu_background_color              = get_theme_mod( 'sub_menu_background_color', emanon_primary_light_color() );
	$sub_menu_items_color                   = get_theme_mod( 'sub_menu_items_color', '#ffffff' );
	/**
	 * Header panel colors
	 */
	$header_cta_icon_color                  = get_theme_mod( 'header_cta_icon_color','#828990' );
	$header_cta_button_color                = get_theme_mod( 'header_cta_button_color', emanon_primary_color() );
	$header_cta_button_hover_color          = get_theme_mod( 'header_cta_button_hover_color', emanon_primary_light_color() );
	$header_panel_background_color          = get_theme_mod( 'header_panel_background_color','#484848' );
	$header_panel_background_colorcode      = str_replace( '#', '', $header_panel_background_color );
	$header_panel_color_red                 = hexdec( substr( $header_panel_background_colorcode, 0, 2) );
	$header_panel_color_green               = hexdec( substr( $header_panel_background_colorcode, 2, 2 ) );
	$header_panel_color_blue                = hexdec( substr( $header_panel_background_colorcode, 4, 2 ) );
	$header_panel_opacity                   = get_theme_mod( 'header_panel_background_color_opacity', 1 );
	$header_panel_text_color                = get_theme_mod( 'header_panel_text_color','#ffffff' );
	/**
	 * Header overlay colors
	 */
	$header_overlay                         = get_theme_mod( 'frontpage_header_overlay' );
	$layout                                 = get_theme_mod( 'firstview_layout_type', 'display_none' );

	if ( $header_overlay && 'header_eyecatch'  === $layout ||
	$header_overlay && 'header_image_slider'   === $layout ||
	$header_overlay && 'header_content_slider' === $layout ||
	$header_overlay && 'header_pagebox_slider' === $layout ||
	$header_overlay && 'header_video'          === $layout ) {
		$header_info_color_front_page         = '#ffffff';
		$site_title_color_front_page          = '#ffffff';
		$site_description_color_front_page    = '#ffffff';
		$menu_items_color_front_page          = '#ffffff';
		$header_cta_icon_color_front_page     = '#ffffff';
	} else {
		$header_info_color_front_page         = get_theme_mod( 'header_info_color', '#333333' );
		$site_title_color_front_page          = get_theme_mod( 'site_title_color', '#333333' );
		$site_description_color_front_page    = get_theme_mod( 'site_description_color', '#828990' );
		$menu_items_color_front_page          = get_theme_mod( 'menu_items_color', '#333333' );
		$header_cta_icon_color_front_page     = get_theme_mod( 'header_cta_icon_color', '#828990' );
	} // End if()

	/**
	 * Hamburger menu colors
	 */
	$hamburger_menu_color                     = get_theme_mod( 'hamburger_menu_color', emanon_primary_color() );
	$floating_hamburger_menu_background_color = get_theme_mod( 'floating_hamburger_menu_background_color', emanon_primary_color() );
	$floating_hamburger_menu_color            = get_theme_mod( 'floating_hamburger_menu_color', '#ffffff' );

	/**
	 * Article colors
	 */
	$active_article_background_color         = get_theme_mod( 'active_article_background_color', true );
	$disabled_background_color               = post_custom( 'emanon_disabled_background_color' );
	if ( $active_article_background_color && ! $disabled_background_color ) {
	$article_background_color                = get_theme_mod( 'article_background_color', '#ffffff' );
	$article_header_padding                  = 24;
	} else {
	$article_background_color                = 'inherit';
	$article_header_padding                  = 0;
	} // End if()
	if ( $active_article_background_color ) {
	$h_background_color                      = get_theme_mod( 'article_background_color', '#ffffff' );
	} else {
	$h_background_color                      = $background_color;
	} // End if()
	$article_sns_follow_background_color     = get_theme_mod( 'article_sns_follow_background_color', emanon_primary_color() );
	$article_sns_follow_text_color           = get_theme_mod( 'article_sns_follow_text_color', '#ffffff' );
	$active_author_profile_background_color  = get_theme_mod( 'active_author_profile_background_color', true );
	if ( $active_author_profile_background_color ) {
	$author_profile_background_color         = get_theme_mod( 'author_profile_background_color', '#eeeff0' );
	} else {
	$author_profile_background_color         = 'inherit';
	} // End if()
	/**
	 * Sidebar colors
	 */
	$sidebar_background_color                = get_theme_mod( 'sidebar_background_color', '#ffffff' );
	$sidebar_heading_text_color              = get_theme_mod( 'sidebar_heading_text_color', '#333333' );
	$sidebar_heading_background_color        = get_theme_mod( 'sidebar_heading_background_color', emanon_primary_color() );
	$sidebar_text_color                      = get_theme_mod( 'sidebar_text_color', '#333333' );
	/**
	 * Footer colors
	 */
	$footer_background_color                 = get_theme_mod( 'footer_background_color', '#484848' );
	$footer_heading_text_color               = get_theme_mod( 'footer_heading_text_color', '#ffffff' );
	$footer_heading_background_color         = get_theme_mod( 'footer_heading_background_color', emanon_primary_color() );
	$footer_text_color                       = get_theme_mod( 'footer_text_color', '#ffffff' );
	$active_site_copyright_background_color  = get_theme_mod( 'active_site_copyright_background_color', true );
	if ( $active_site_copyright_background_color ) {
	$site_copyright_background_color         = get_theme_mod( 'site_copyright_background_color', '#484848' );
	} else {
	$site_copyright_background_color         = 'initial';
	} // End if()
	$site_copyright_text_color               = get_theme_mod( 'site_copyright_text_color', '#ffffff' );
	$footer_fixed_menu_sp_background_color   = get_theme_mod( 'footer_fixed_menu_sp_background_color', emanon_primary_color() );
	$footer_fixed_menu_sp_text_color         = get_theme_mod( 'footer_fixed_menu_sp_text_color', '#ffffff' );
	$footer_fixed_menu_sp_background_opacity = get_theme_mod( 'footer_fixed_menu_sp_background_opacity', 1 );
	$theme_css = '

		/* 記事一覧 */
		.cat-name {
			background-color: ' . $primary_color . ';
			color: #fff;
		}
		.sticky-info .icon-star-full {
			color: ' . $secondary_color . ';
		}
		/* 記事一覧［お知らせ］ */
		.post-list-meta__cat {
			background-color: ' . $primary_color . ';
			color: #fff;
		}
		/* 人気記事ランキング */
		.widget_popular_post .popular-post-rank {
			background-color: ' . $primary_color . ';
		}
		.widget_popular_post .has_thumbnail .popular-post-rank {
			background-color: initial;
			border-color: ' . $primary_color . ' transparent transparent transparent;
		}
		/* 見出し */
		.h2-bg-color .article-body h2:not(.is-style-none),
		.h3-bg-color .article-body h3:not(.is-style-none),
		.h4-bg-color .article-body h4:not(.is-style-none) {
			padding-top: 8px;
			padding-bottom: 8px;
			padding-right: 12px;
			padding-left: 12px;
			background-color: ' . $primary_color . ';
			color: #ffffff;
		}
		.h2-bg-color-radius .article-body h2:not(.is-style-none),
		.h3-bg-color-radius .article-body h3:not(.is-style-none),
		.h4-bg-color-radius .article-body h4:not(.is-style-none) {
			padding-top: 8px;
			padding-bottom: 8px;
			padding-right: 12px;
			padding-left: 12px;
			border-radius: 3px;
			background-color: ' . $primary_color . ';
			color: #ffffff;
		}
		.h2-bg-color-border-left .article-body h2:not(.is-style-none),
		.h3-bg-color-border-left .article-body h3:not(.is-style-none),
		.h4-bg-color-border-left .article-body h4:not(.is-style-none) {
			padding-top: 8px;
			padding-bottom: 8px;
			padding-right: 8px;
			padding-left: 12px;
			background-color: ' . $primary_light_color . ';
			border-left: 6px solid ' . $primary_color . ';
			color: #ffffff;
		}
		.h2-bg-color-broken-corner .article-body h2:not(.is-style-none),
		.h3-bg-color-broken-corner .article-body h3:not(.is-style-none),
		.h4-bg-color-broken-corner .article-body h4:not(.is-style-none) {
			position: relative;
			padding-top: 8px;
			padding-bottom: 8px;
			padding-right: 12px;
			padding-left: 12px;
			background-color: ' . $primary_color . ';
			color: #ffffff;
		}
		.h2-bg-color-broken-corner .article-body h2:not(.is-style-none)::before,
		.h3-bg-color-broken-corner .article-body h3:not(.is-style-none)::before,
		.h4-bg-color-broken-corner .article-body h4:not(.is-style-none)::before {
			position: absolute;
			top: 0;
			right: 0;
			content: "";
			width: 0;
			border-width: 0 16px 16px 0;
			border-style: solid;
			box-shadow: -1px 1px 2px rgba(0, 0, 0, 0.1);
			border-color: ' . $h_background_color . ' ' . $h_background_color . ' #e5e7e8 #e5e7e8;
		}
		.h2-bg-color-ribbon .article-body h2:not(.is-style-none),
		.h3-bg-color-ribbon .article-body h3:not(.is-style-none),
		.h4-bg-color-ribbon .article-body h4:not(.is-style-none) {
			position: relative;
			padding-top: 8px;
			padding-bottom: 8px;
			padding-right: 12px;
			padding-left: 12px;
			background-color: ' . $primary_color . ';
			color: #ffffff;
		}
		.h2-bg-color-ribbon .article-body h2:not(.is-style-none)::before,
		.h3-bg-color-ribbon .article-body h3:not(.is-style-none)::before,
		.h4-bg-color-ribbon .article-body h4:not(.is-style-none)::before {
			position: absolute;
			content: "";
			top: 100%;
			left: 0;
			border-width: 0 20px 12px 0;
			border-style: solid;
			border-color: transparent;
			border-right-color: rgba(0, 0, 0, 0.1);
		}
		.h2-speech-bubble .article-body h2:not(.is-style-none),
		.h3-speech-bubble .article-body h3:not(.is-style-none),
		.h4-speech-bubble .article-body h4:not(.is-style-none) {
			position: relative;
			padding-top: 8px;
			padding-bottom: 8px;
			padding-right: 12px;
			padding-left: 12px;
			border-radius: 3px;
			background-color: ' . $primary_color . ';
			color: #ffffff;
		}
		.h2-speech-bubble .article-body h2:not(.is-style-none)::before,
		.h3-speech-bubble .article-body h3:not(.is-style-none)::before,
		.h4-speech-bubble .article-body h4:not(.is-style-none)::before {
			content: "";
			position: absolute;
			bottom: -8px;
			left: 24px;
			width: 16px;
			height: 16px;
			background: inherit;
			transform: rotate(45deg);
		}
		.h2-speech-bubble-border .article-body h2:not(.is-style-none),
		.h3-speech-bubble-border .article-body h3:not(.is-style-none),
		.h4-speech-bubble-border .article-body h4:not(.is-style-none) {
			position: relative;
			padding-top: 8px;
			padding-bottom: 8px;
			padding-right: 12px;
			padding-left: 12px;
			border-radius: 3px;
			border: 2px solid ' . $primary_color . ';
		}
		.h2-speech-bubble-border .article-body h2:not(.is-style-none)::before,
		.h3-speech-bubble-border .article-body h3:not(.is-style-none)::before,
		.h4-speech-bubble-border .article-body h4:not(.is-style-none)::before {
			content: "";
			position: absolute;
			bottom: -9px;
			left: 24px;
			width: 16px;
			height: 16px;
			background: inherit;
			transform: rotate(45deg);
		}
		.h2-speech-bubble-border .article-body h2:not(.is-style-none)::before,
		.h3-speech-bubble-border .article-body h3:not(.is-style-none)::before,
		.h4-speech-bubble-border .article-body h4:not(.is-style-none)::before {
			border-right: 2px solid  ' . $primary_color . ';
			border-bottom: 2px solid  ' . $primary_color . ';
			background-color: ' . $h_background_color . ';
		}
		.h2-border .article-body h2:not(.is-style-none),
		.h3-border .article-body h3:not(.is-style-none),
		.h4-border .article-body h4:not(.is-style-none) {
			padding-top: 8px;
			padding-bottom: 8px;
			padding-right: 12px;
			padding-left: 12px;
			border: 2px solid ' . $primary_color . ';
		}
		.h2-border-radius .article-body h2:not(.is-style-none),
		.h3-border-radius .article-body h3:not(.is-style-none),
		.h4-border-radius .article-body h4:not(.is-style-none) {
			padding-top: 8px;
			padding-bottom: 8px;
			padding-right: 12px;
			padding-left: 12px;
			border-radius: 3px;
			border: 2px solid ' . $primary_color . ';
		}
		.h2-border-bottom .article-body h2:not(.is-style-none),
		.h3-border-bottom .article-body h3:not(.is-style-none),
		.h4-border-bottom .article-body h4:not(.is-style-none) {
			padding-top: 12px;
			padding-bottom: 12px;
			border-bottom: 2px solid ' . $primary_color . ';
		}
		.h2-border-bottom-two-colors .article-body h2:not(.is-style-none),
		.h3-border-bottom-two-colors .article-body h3:not(.is-style-none),
		.h4-border-bottom-two-colors .article-body h4:not(.is-style-none) {
			position: relative;
			padding-top: 12px;
			padding-bottom: 12px;
			border-bottom: solid 3px ' . $primary_light_color . ';
		}
		.h2-border-bottom-two-colors .article-body h2:not(.is-style-none)::before,
		.h3-border-bottom-two-colors .article-body h3:not(.is-style-none)::before,
		.h4-border-bottom-two-colors .article-body h4:not(.is-style-none)::before {
			position: absolute;
			content: "";
			bottom: -3px;
			left: 0;
			width: 15%;
			height: 3px;
			z-index: 2;
		}
		.h2-border-bottom-two-colors .article-body h2:not(.is-style-none)::before,
		.h3-border-bottom-two-colors .article-body h3:not(.is-style-none)::before,
		.h4-border-bottom-two-colors .article-body h4:not(.is-style-none)::before {
			background-color: ' . $primary_color . ';
		}
		.h2-border-top-bottom .article-body h2:not(.is-style-none),
		.h3-border-top-bottom .article-body h3:not(.is-style-none),
		.h4-border-top-bottom .article-body h4:not(.is-style-none) {
			padding-top: 8px;
			padding-bottom: 8px;
			border-top: 2px solid ' . $primary_color . ';
			border-bottom: 2px solid ' . $primary_color . '
		}
		.h2-border-left .article-body h2:not(.is-style-none),
		.h3-border-left .article-body h3:not(.is-style-none),
		.h4-border-left .article-body h4:not(.is-style-none) {
			padding-left: 12px;
			border-left: 3px solid ' . $primary_color . ';
		}
		.h2-dashed-bottom .article-body h2:not(.is-style-none),
		.h3-dashed-bottom .article-body h3:not(.is-style-none),
		.h4-dashed-bottom .article-body h4:not(.is-style-none) {
			padding-top: 8px;
			padding-bottom: 8px;
			border-bottom: 2px dashed ' . $primary_color . ';
		}
		.h2-dashed-top-bottom .article-body h2:not(.is-style-none),
		.h3-dashed-top-bottom .article-body h3:not(.is-style-none),
		.h4-dashed-top-bottom .article-body h4:not(.is-style-none) {
			padding-top: 8px;
			padding-bottom: 8px;
			border-top: 2px dashed ' . $primary_color . ';
			border-bottom: 2px dashed ' . $primary_color . ';
		}
		/* ブロックグループ */
		.is-style-group-center__checkmark .wp-block-group__inner-container::before,
		.is-style-group-left__checkmark .wp-block-group__inner-container::before {
			background-color:  ' .$primary_light_color . ';
		}
		.is-style-group-center__circle .wp-block-group__inner-container::before,
		.is-style-group-left__circle .wp-block-group__inner-container::before {
			background-color:  ' .$primary_light_color . ';
		}
		.is-style-group-center__cross .wp-block-group__inner-container::before,
		.is-style-group-left__cross .wp-block-group__inner-container::before {
			background-color: #dc3545;
		}
		.is-style-group-center__alert .wp-block-group__inner-container::before,
		.is-style-group-left__alert .wp-block-group__inner-container::before {
			background-color: #dc3545;
		}
		.is-style-group-center__question .wp-block-group__inner-container::before,
		.is-style-group-left__question .wp-block-group__inner-container::before {
			background-color:  ' .$primary_light_color . ';
		}
		.is-style-group-center__notice .wp-block-group__inner-container:::before,
		.is-style-group-left__notice .wp-block-group__inner-container::before {
			background-color:  ' .$primary_light_color . ';
		}
		.is-style-group-center__point .wp-block-group__inner-container::before,
		.is-style-group-left__point .wp-block-group__inner-container::before {
			background-color:  ' .$primary_light_color . ';
		}
		.is-style-group-center__memo .wp-block-group__inner-container::before,
		.is-style-group-left__memo .wp-block-group__inner-container::before {
				background-color:  ' .$primary_light_color . ';
		}
		.is-style-group-center__bubble .wp-block-group__inner-container::before,
		.is-style-group-left__bubble .wp-block-group__inner-container::before {
			background-color:  ' .$primary_light_color . ';
		}
		.is-style-group-center__crown .wp-block-group__inner-container::before,
		.is-style-group-left__crown .wp-block-group__inner-container::before {
			background-color:  ' .$primary_light_color . ';
		}
		.is-style-group-center__star .wp-block-group__inner-container::before,
		.is-style-group-left__star .wp-block-group__inner-container::before {
			background-color:  ' .$primary_light_color . ';
		}
		.is-style-group-center__download .wp-block-group__inner-container::before,
		.is-style-group-left__download .wp-block-group__inner-container::before {
			background-color:  ' .$primary_light_color . ';
		}
		/* Link & hover colors */
		a {
			color: ' . $link_color . ';
		}
		a:hover,
		a:active {
			color: ' . $link_hover_color . ';
		}
		input[type="text"]:focus,
		input[type="email"]:focus,
		input[type="url"]:focus,
		input[type="password"]:focus,
		input[type="search"]:focus,
		input[type="number"]:focus,
		input[type="tel"]:focus,
		input[type="date"]:focus,
		input[type="month"]:focus,
		input[type="week"]:focus,
		input[type="time"]:focus,
		input[type="datetime"]:focus,
		input[type="datetime-local"]:focus,
		input[type="color"]:focus,
		textarea:focus,
		select:focus {
			border: 1px solid  ' . $link_hover_color . ';
		}
		.slick-prev,
		.slick-next {
			border-color: ' . $link_color . ';
		}
		.slick-prev:hover,
		.slick-next:hover {
			border-color: ' . $link_hover_color . ';
		}
		button,
		input[type="button"],
		input[type="submit"] {
			background-color: ' . $primary_color . ';
			border-color: ' . $primary_color . ';
			color: #ffffff;
		}
		.search-submit {
			border: 1px solid  ' . $primary_color . ';
		}
		.search-submit:hover {
			border: 1px solid  ' . $primary_light_color . ';
		}
		button:hover,
		input[type="button"]:hover,
		input[type="submit"]:hover {
			background-color: ' . $primary_light_color . ';
			border-color: ' . $primary_light_color . ';
		}
		input[type="search"]:focus + .search-submit {
			background-color: ' . $link_hover_color . ';
			border: 1px solid ' . $link_hover_color . ';
		}
		.c-btn__main {
			background-color: ' . $primary_color  . ';
			color: #ffffff;
		}
		.c-btn__main:hover {
			background-color: ' . $primary_light_color  . ';
		}
		.c-btn__outline {
			border: 1px solid ' . $primary_color  . ';
			color: ' . $primary_color . ';
		}
		.c-btn__outline:hover {
			border: 1px solid ' . $primary_light_color . ';
			color: ' . $primary_light_color . ';
		}
		.c-btn__arrow .c-btn__outline .icon-read-arrow-right {
			color: ' . $primary_color . ';
		}
		.c-btn__arrow .c-btn__outline:hover .icon-read-arrow-right {
			color: ' . $primary_light_color . ';
		}
		.js-btn__ripple {
			background-color: rgba( ' . $link_hover_color_red . ', ' . $link_hover_color_green . ', ' . $link_hover_color_blue . ', 0.4 );
		}
		.slick-dots button {
			background-color: ' . $link_color . ';
		}
		.slick-dots button:hover {
			background-color: ' . $link_hover_color . ';
		}
		.slick-dots .slick-active button {
			background-color: ' . $link_hover_color . ';
		}
		.page-numbers:hover {
			background-color: ' . $link_hover_color . ';
		}
		.page-numbers.current {
			background-color: ' . $link_color . ';
		}
		.prev.page-numbers:hover,
		.next.page-numbers:hover {
			color: ' . $link_hover_color . ';
		}
		.next.page-numbers:hover::before{
			color: ' . $link_hover_color . ';
		}
		.prev.page-numbers:hover::before {
			color: ' . $link_hover_color . ';
		}
		.next-page-link a:hover {
			color: ' . $link_hover_color . ';
		}
		.next-page-link a:hover .icon-chevron-right {
			color: ' . $link_hover_color . ';
		}
		.next-page .current > .page-numbers{
			background-color: ' . $link_hover_color . ';
		}
		.post-navigation .nav-links a:hover {
			border: 1px solid ' . $link_hover_color . ';
		}
		.meta-category a:hover {
			border: solid 1px ' . $link_hover_color . ';
			color: ' . $link_hover_color . ';
		}
		.breadcrumb__item a {
			color:' . $link_color . ';
		}
		.breadcrumb__item a:hover {
			color: ' . $link_hover_color . ';
		}
		.meta-post a:hover {
			color: ' . $link_hover_color . ';
		}
		.article-header-full-width__inner .slider-cat a:hover {
			color: ' . $link_hover_color . ';
		}
		.article-header-full-width__inner .edit-link a:hover {
			color: ' . $link_hover_color . ';
		}
		.article-header-full-width__inner .edit-link a:hover,
		.article-header-full-width__inner .meta-post a:hover {
			color: ' . $link_hover_color . ';
		}
		.article-header__cover .meta-category a:hover {
			border: solid 1px ' . $link_hover_color . ';
			color: ' . $link_hover_color . ';
		}
		.article-header__cover .edit-link a:hover,
		.article-header__cover .meta-post a:hover {
			color: ' . $link_hover_color . ';
		}
		.sns-follow {
			background-color: ' . $article_sns_follow_background_color . ';
			color: ' . $article_sns_follow_text_color . ';
		}
		.sns-follow__button:not(.sns-brand-color) .btn-main {
			background-color: ' . $link_color . ';
		}
		.sns-follow__button:not(.sns-brand-color) .btn-main:hover {
			background-color: ' . $link_color . ';
		}
		.tagcloud a:hover {
			border: 1px solid ' . $link_hover_color . ';
			color: ' . $link_hover_color . ';
		}
		.tagcloud a:hover::before {
			color: ' . $link_hover_color . ';
		}
		.comment-reply-link {
			background-color: ' . $link_color . ';
		}
		.comment-reply-link:hover {
			background-color: ' . $link_hover_color . ';
		}
		.sidebar .menu-item-has-children:hover > a::before {
			color: ' . $link_hover_color . ';
		}
		.user-url-color a {
			color: ' . $link_color . '!important;
		}
		/* ヘッダーインフォ */
		.home:not(.paged) .header-info,
		.home:not(.paged) .header-info a {
			color: ' . $header_info_color_front_page . ';
		}
		.header-info,
		.header-info a {
			color: ' . $header_info_color . ';
		}
		/* ヘッダー背景 */
		.l-header-default,
		.l-header-center,
		.l-header-row {
			background-color: ' . $header_background_color . ';
		}
		.home:not(.paged) .header-site-branding .site-title a {
			color: ' . $site_title_color_front_page . ';
		}
		.home:not(.paged) .header-site-branding .site-description {
			color: ' . $site_description_color_front_page . ';
		}
		.header-site-branding .site-title a {
			color: ' . $site_title_color . ';
		}
		.header-site-branding .site-description {
			color: ' . $site_description_color . ';
		}
		/* Header menu colors */
		.header-menu-default,
		.header-menu-center,
		.l-header-menu-drop__inner {
			background-color: ' . $menu_background_color . ';
		}
		.header-menu > .menu-item > a {
			color: ' . $menu_items_color . ';
		}
		.header-menu > .menu-item:hover > a,
		.header-menu .current-menu-item > a {
			color: ' . $menu_items_hover_color . ';
		}
		.header-menu > .menu-item > a::before {
			background-color: ' . $menu_items_hover_color . ';
		}
		.header-menu .sub-menu {
			background-color: ' . $sub_menu_background_color . ';
		}
		.header-menu > .menu-item-has-children >.sub-menu::before {
			border-color: transparent transparent ' . $sub_menu_background_color . ' transparent;
		}
		.header-menu .sub-menu .menu-item a {
			color: ' . $sub_menu_items_color . ' !important;
		}
		.home:not(.paged) .header-menu > .menu-item > a {
			color: ' . $menu_items_color_front_page . ';
		}
		.home:not(.paged) .header-menu > .menu-item:hover > a,
		.home:not(.paged) .header-menu .current-menu-item > a {
			color: ' . $menu_items_hover_color . ';
		}
		.home:not(.paged) .header-menu > .menu-item > a::before {
			background-color: ' . $menu_items_hover_color . ';
		}
		.home .l-header-menu-drop .header-menu > .menu-item > a {
			color: ' . $menu_items_color . ';
		}
		.home .l-header-menu-drop .header-menu > .menu-item:hover > a,
		.home .l-header-menu-drop .header-menu .current-menu-item > a {
			color: ' . $menu_items_hover_color . ';
		}
		.home .l-header-menu-drop .header-menu > .menu-item > a::before {
			background-color: ' . $menu_items_hover_color . ';
		}
		/* Hamburger menu colors */
		.home.is-overlay:not(.paged) .hamburger-menu-trigger span {
			background-color: #fff;
		}
		.home.is-overlay:not(.paged) .hamburger-menu-label {
			color: #fff;
		}
		.hamburger-menu-trigger span {
			background-color: ' . $hamburger_menu_color. ';
		}
		.hamburger-menu-label {
			color: ' . $hamburger_menu_color . ';
		}
		/* Header news */
		.header-news__slider,
		.header-news__item {
			background-color: #eeeff0;
		}
		.header-news__label {
			background-color:  ' . $secondary_color  . ';
			color: #ffffff;
		}
		.header-news__item,
		.header-news__link {
			color: #333333;
		}
		.header-news__link:hover .header-news__item {
			color: ' . $link_hover_color . ';
		}
		/* Drawer menu colors */
		.drawer-menu .hamburger-close-line span {
			background-color: ' . $hamburger_menu_color  . ';
		}
		.drawer-icon-menu.border-radius .icon-menu li a:hover {
			border: 1px solid ' . $link_hover_color . ';
		}
		/* Header panel colors */
		.header-cta__item [class*="switch-"] {
			color: ' . $header_cta_icon_color . ';
		}
		.home:not(.paged) .header-cta__item [class*="switch-"] {
			color: ' . $header_cta_icon_color_front_page . ';
		}
		.header-cta__item:last-child {
			background-color: ' . $header_cta_button_color . ';
		}
		.header-cta__item:last-child:hover,
		.header-cta__item:last-child.is-active {
			background-color: ' . $header_cta_button_hover_color . ';
		}
		.header-language,
		.header-searchform,
		.header-contact {
			background-color: rgba( ' . $header_panel_color_red . ', ' . $header_panel_color_green . ', ' . $header_panel_color_blue . ',' . $header_panel_opacity . ');
		}
		.language-panel__item a,
		.header-contact__inner {
			color: ' . $header_panel_text_color . ';
		}
		/* Article colors */
		.article-header,
		.article-body:not(.archive-article-body) {
			background-color: ' . $article_background_color . ';
		}
		.has-background-color .article-header__inner {
			padding-top: ' . $article_header_padding . 'px;
		}
		.single .author-card {
			background-color: ' . $author_profile_background_color . ';
		}
		/* Sidebar colors */
		.sidebar .widget,
		.sidebar .widget:not(.widget_author_profile):not(.widget_calendar) a:not(.c-btn),
		.sidebar .c-post-list__link {
			color: ' . $sidebar_text_color . ';
		}
		.widget_toc .contents-outline__item a::before {
			background-color: ' . $sidebar_text_color . ';
		}
		.sidebar .widget.widget_tag_cloud .tagcloud a:hover,
		.sidebar .widget.widget_icon_menu .icon-menu .menu-item a:hover,
		.sidebar .widget.widget_calendar .wp-calendar-table a:hover {
			color: ' . $link_hover_color . ';
		}
		.sidebar:not(.sidebar-no-padding-no-border) .widget_author_profile .author-profile__avatar img {
			border: solid 3px ' . $sidebar_background_color . ';
		}
		.sidebar:not(.sidebar-no-padding-no-border) .widget_profile .profile-img img,
		.sidebar:not(.sidebar-no-padding-no-border) .widget_author_profile .profile-img img {
			border: solid 3px ' . $sidebar_background_color . ';
		}
		.sidebar:not(.sidebar-no-padding-no-border) .widget {
			background-color: ' . $sidebar_background_color . ';
		}
		.sidebar-widget__title {
			color: ' . $sidebar_heading_text_color . ';
		}
		.sidebar-border .sidebar-widget__title,
		.sidebar-border-radius .sidebar-widget__title {
			border: 1px solid ' . $sidebar_heading_background_color . ';
		}
		.sidebar-bg-color .sidebar-widget__title,
		.sidebar-bg-color-radius .sidebar-widget__title,
		.sidebar-speech-bubble .sidebar-widget__title,
		.sidebar-center.sidebar-shortborder-bottom .sidebar-widget__title::before {
			background: ' . $sidebar_heading_background_color . ';
		}
		.sidebar-shortborder-bottom .sidebar-widget__title::after {
			background: ' . $sidebar_heading_background_color . ';
		}
		.sidebar-border-left .sidebar-widget__title {
			border-left: 3px solid ' . $sidebar_heading_background_color . ';
		}
		.sidebar-border-bottom .sidebar-widget__title {
			border-bottom: 2px solid  ' . $sidebar_heading_background_color . ';
		}
		.sidebar-stripe-border-bottom .sidebar-widget__title::before {
		background-color: ' . $background_color . ';
		background: linear-gradient( -45deg, ' . $background_color . ' 25%, ' . $sidebar_heading_background_color . ' 25%, ' . $sidebar_heading_background_color . ' 50%, ' . $background_color . ' 50%, ' . $background_color . ' 75%, ' . $sidebar_heading_background_color . ' 75%, ' . $sidebar_heading_background_color . ');
		background-size: 4px 4px;
		}
		.sidebar-lines-on-sides .sidebar-widget__title::before,
		.sidebar-lines-on-sides .sidebar-widget__title::after,
		.sidebar-lines-on-right .sidebar-widget__title::after {
			border-top: 1px solid ' . $sidebar_heading_background_color . ';
		}
		/* Drawer menu colors */
		.drawer-menu .drawer-icon-menu.border-radius .icon-menu li:hover{
			border: 1px solid ' . $link_hover_color   . ';
		}
		.drawer-border .drawer-widget__title,
		.drawer-border-radius .drawer-widget__title {
			border: 2px solid ' . $primary_color . ';
		}
		.drawer-menu.drawer-border-left .drawer-widget__title {
			border-left: 3px solid ' . $primary_color . ';
		}
		.drawer-bg-color .drawer-widget__title,
		.drawer-bg-color-radius .drawer-widget__title,
		.drawer-speech-bubble .drawer-widget__title {
			background: ' . $primary_color . ';
			color: #ffffff;
		}
		.drawer-shortborder-bottom .drawer-widget__title::after,
		.drawer-center.drawer-shortborder-bottom .drawer-widget__title::after {
			background: ' . $primary_color . ';
		}
		.drawer-speech-bubble .drawer-widget__title::before {
			border-top: 12px solid ' . $primary_color . ';
		}
		.drawer-border-bottom .drawer-widget__title {
			border-bottom: 2px solid  ' . $primary_color . ';
		}
		.drawer-stripe-border-bottom .drawer-widget__title::before {
		background-color: #ffffff;
		background: linear-gradient( -45deg, #ffffff 25%, ' . $primary_color . ' 25%, ' . $primary_color . ' 50%, #ffffff 50%, #ffffff 75%, ' . $primary_color . ' 75%, ' . $primary_color . ');
		background-size: 4px 4px;
		}
		.drawer-lines-on-sides .drawer-widget__title::before,
		.drawer-lines-on-sides .drawer-widget__title::after,
		.drawer-lines-on-right .drawer-widget__title::after {
			border-top: 1px solid ' . $primary_color . ';
		}
		/* Footer colors */
		.l-footer {
			background-color: ' . $footer_background_color . ';
		}
		.l-footer,
		.l-footer a,
		.l-footer .widget,
		.l-footer .widget:not(.widget_author_profile):not(.widget_calendar) a:not(.c-btn),
		.l-footer .c-post-list__link {
			color: ' . $footer_text_color . ';
		}
		.footer-menu li a::before {
			background-color: ' . $footer_text_color . ';
		}
		.footer-widget__title {
			color: ' . $footer_heading_text_color . ';
		}
		.l-footer .widget.widget_tag_cloud .tagcloud a:hover,
		.l-footer .widget.widget_icon_menu .icon-menu .menu-item a:hover,
		.l-footer .widget.widget_calendar .wp-calendar-table a:hover {
			color: ' . $link_hover_color . ';
		}
		.footer-bg-color .footer-widget__title,
		.footer-bg-color-radius .footer-widget__title  {
			background: ' . $footer_heading_background_color . ';
		}
		.l-footer .footer-border .footer-widget__title,
		.l-footer .footer-border-radius .footer-widget__title {
			border: 1px solid ' . $footer_heading_background_color . ';
		}
		.footer-shortborder-bottom .footer-widget__title::after {
			background: ' . $footer_heading_background_color . ';
		}
		.footer-border-left .footer-widget__title {
			border-left: 3px solid ' . $footer_heading_background_color . ';
		}
		.footer-speech-bubble .footer-widget__title {
			background-color: ' . $footer_heading_background_color . ';
		}
		.footer-border-bottom .footer-widget__title {
			border-bottom: 2px solid  ' . $footer_heading_background_color . ';
		}
		.footer-stripe-border-bottom .footer-widget__title::before {
		background-color: ' . $background_color . ';
		background: linear-gradient( -45deg, ' . $footer_background_color . ' 25%, ' . $footer_heading_background_color . ' 25%, ' . $footer_heading_background_color . ' 50%, ' . $footer_background_color . ' 50%, ' . $footer_background_color . ' 75%, ' . $footer_heading_background_color . ' 75%, ' . $footer_heading_background_color . ');
		background-size: 4px 4px;
		}
		.footer-lines-on-sides .footer-widget__title::before,
		.footer-lines-on-sides .footer-widget__title::after,
		.footer-lines-on-right .footer-widget__title::after {
			border-top: 1px solid ' . $footer_heading_background_color . ';
		}
		.l-footer .popular-post-views {
			color:   ' . $footer_text_color . ';
		}
		.site-copyright {
			background-color: ' .  $site_copyright_background_color . ';
		}
		.site-copyright,
		.site-copyright a,
		.site-copyright .widget,
		.site-copyright .widget a {
			color: ' .  $site_copyright_text_color . ';
		}
		.site-copyright a:hover {
			opacity: 0.8;
		}
		/* Page top floating */
		.page-top-floating {
			background-color: ' . $secondary_color . ';
		}
		.page-top-floating i {
			color: #ffffff;
		}
		/* Fixed footer menu［SP］ */
		.fixed-footer-menu {
			background-color: ' . $footer_fixed_menu_sp_background_color . ';
			color: ' . $footer_fixed_menu_sp_text_color . ';
			opacity: ' . $footer_fixed_menu_sp_background_opacity . ';
		}
		.fixed-footer-menu__inner a {
			color: ' . $footer_fixed_menu_sp_text_color . ';
		}
		.hamburger-menu-floating,
		.hamburger-menu-floating:hover {
			background-color: ' . $floating_hamburger_menu_background_color . ';
		}
		.hamburger-menu-floating .hamburger-menu-trigger span {
			background-color: ' . $floating_hamburger_menu_color . ';
		}
		.hamburger-menu-floating .hamburger-menu-label {
			color: ' . $floating_hamburger_menu_color . ';
		}
		/* Loading animation */
		.loading-icon {
			border-left: 4px solid  ' . $primary_color . ';
		}
		.loading-text {
			color: ' . $primary_color . ';
		}
	';
	return apply_filters( 'emanon_style_colors', emanon_css_minify( $theme_css ) );
}