<?php
/**
 * Editor WP block
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

/**
 * カラーパレット
 */
add_action( 'after_setup_theme', 'emanon_editor_color_palettes' );
function emanon_editor_color_palettes() {
	$color_palettes_type   = get_theme_mod( 'color_palettes_type', 'default_palettes' );
	$palette               = get_theme_support( 'editor-color-palette' );
	
	if( 'default_palettes' == $color_palettes_type ) {
		add_theme_support( 'editor-color-palette', array(
			array(
				'name' => __( 'プラマリー［ダーク］', 'emanon-premium' ),
				'slug' => 'primary-default-dark',
				'color' => '#3f5973',
			),
			array(
				'name' => __( 'プラマリー', 'emanon-premium' ),
				'slug' => 'primary-default',
				'color' => '#8ba0b6',
			),
			array(
				'name' => __( 'プラマリー［ライト］', 'emanon-premium' ),
				'slug' => 'primary-default-light',
				'color' => '#d1e3f6',
			),
			array(
				'name' => __( 'セカンダリ［ダーク］', 'emanon-premium' ),
				'slug' => 'secondary-default-dark',
				'color' => '#8c6e8c',
			),
			array(
				'name' => __( 'セカンダリ', 'emanon-premium' ),
				'slug' => 'secondary-default',
				'color' => '#bc9cbc',
			),
			array(
				'name' => __( 'アクセント', 'emanon-premium' ),
				'slug' => 'secondary-default-light',
				'color' => '#3e3a3a',
			),
			array(
				'name' => __( 'Info', 'emanon-premium' ),
				'slug' => 'info',
				'color' => '#007bff',
			),
			array(
				'name' => __( 'Success', 'emanon-premium' ),
				'slug' => 'success',
				'color' => '#00c851',
			),
			array(
				'name' => __( 'Warning', 'emanon-premium' ),
				'slug' => 'warning',
				'color' => '#dc3545',
			),
			array(
				'name' => __( 'グレー', 'emanon-premium' ),
				'slug' => 'gray',
				'color' => '#e5e7e8',
			),
			array(
				'name' => __( 'グレー［ダーク］', 'emanon-premium' ),
				'slug' => 'dark-gray',
				'color' => '#828990',
			),
			array(
				'name' => __( 'ブラック［ライト］', 'emanon-premium' ),
				'slug' => 'light-blacky',
				'color' => '#484848',
			),
			array(
				'name' => __( 'ブラック', 'emanon-premium' ),
				'slug' => 'black',
				'color' => '#333333',
			),
			array(
				'name' => __( 'ホワイト', 'emanon-premium' ),
				'slug' => 'white',
				'color' => '#ffffff',
			),
		) );
	} elseif ( 'blue_palettes' == $color_palettes_type ) {
		add_theme_support( 'editor-color-palette', array(
			array(
				'name' => __( 'プラマリー［ダーク］', 'emanon-premium' ),
				'slug' => 'primary-blue-dark',
				'color' => '#4f85ab',
			),
			array(
				'name' => __( 'プラマリー', 'emanon-premium' ),
				'slug' => 'primary-blue',
				'color' => '#93b5cd',
			),
			array(
				'name' => __( 'プラマリー［ライト］', 'emanon-premium' ),
				'slug' => 'primary-blue-light',
				'color' => '#80b5dd',
			),
			array(
				'name' => __( 'セカンダリ［ダーク］', 'emanon-premium' ),
				'slug' => 'secondary-blue-dark',
				'color' => '#d8dbd9',
			),
			array(
				'name' => __( 'セカンダリ', 'emanon-premium' ),
				'slug' => 'secondary-blue',
				'color' => '#f2f3f3',
			),
			array(
				'name' => __( 'アクセント', 'emanon-premium' ),
				'slug' => 'secondary-blue-light',
				'color' => '#aed265',
			),
			array(
				'name' => __( 'Info', 'emanon-premium' ),
				'slug' => 'info',
				'color' => '#007bff',
			),
			array(
				'name' => __( 'Success', 'emanon-premium' ),
				'slug' => 'success',
				'color' => '#00c851',
			),
			array(
				'name' => __( 'Warning', 'emanon-premium' ),
				'slug' => 'warning',
				'color' => '#dc3545',
			),
			array(
				'name' => __( 'グレー', 'emanon-premium' ),
				'slug' => 'gray',
				'color' => '#e5e7e8',
			),
			array(
				'name' => __( 'グレー［ダーク］', 'emanon-premium' ),
				'slug' => 'dark-gray',
				'color' => '#828990',
			),
			array(
				'name' => __( 'ブラック［ライト］', 'emanon-premium' ),
				'slug' => 'light-blacky',
				'color' => '#484848',
			),
			array(
				'name' => __( 'ブラック', 'emanon-premium' ),
				'slug' => 'black',
				'color' => '#333333',
			),
			array(
				'name' => __( 'ホワイト', 'emanon-premium' ),
				'slug' => 'white',
				'color' => '#ffffff',
			),
		) );
	} elseif ( 'green_palettes' == $color_palettes_type ) {
		add_theme_support( 'editor-color-palette', array(
			array(
				'name' => __( 'プラマリー［ダーク］', 'emanon-premium' ),
				'slug' => 'primary-green-dark',
				'color' => '#91c9a4',
			),
			array(
				'name' => __( 'プラマリー', 'emanon-premium' ),
				'slug' => 'primary-green',
				'color' => '#cae5d3',
			),
			array(
				'name' => __( 'プラマリー［ライト］', 'emanon-premium' ),
				'slug' => 'primary-green-light',
				'color' => '#fdffff',
			),
			array(
				'name' => __( 'セカンダリ［ダーク］', 'emanon-premium' ),
				'slug' => 'secondary-green-dark',
				'color' => '#c0c6d6',
			),
			array(
				'name' => __( 'セカンダリ', 'emanon-premium' ),
				'slug' => 'secondary-green',
				'color' => '#dfe2ea',
			),
			array(
				'name' => __( 'アクセント', 'emanon-premium' ),
				'slug' => 'secondary-green-light',
				'color' => '#9cc9e5',
			),
			array(
				'name' => __( 'Info', 'emanon-premium' ),
				'slug' => 'info',
				'color' => '#007bff',
			),
			array(
				'name' => __( 'Success', 'emanon-premium' ),
				'slug' => 'success',
				'color' => '#00c851',
			),
			array(
				'name' => __( 'Warning', 'emanon-premium' ),
				'slug' => 'warning',
				'color' => '#dc3545',
			),
			array(
				'name' => __( 'グレー', 'emanon-premium' ),
				'slug' => 'gray',
				'color' => '#e5e7e8',
			),
			array(
				'name' => __( 'グレー［ダーク］', 'emanon-premium' ),
				'slug' => 'dark-gray',
				'color' => '#828990',
			),
			array(
				'name' => __( 'ブラック［ライト］', 'emanon-premium' ),
				'slug' => 'light-blacky',
				'color' => '#484848',
			),
			array(
				'name' => __( 'ブラック', 'emanon-premium' ),
				'slug' => 'black',
				'color' => '#333333',
			),
			array(
				'name' => __( 'ホワイト', 'emanon-premium' ),
				'slug' => 'white',
				'color' => '#ffffff',
			),
		) );
	} elseif ( 'lime_palettes' == $color_palettes_type ) {
		add_theme_support( 'editor-color-palette', array(
			array(
				'name' => __( 'プラマリー［ダーク］', 'emanon-premium' ),
				'slug' => 'primary-lime-dark',
				'color' => '#bcd537',
			),
			array(
				'name' => __( 'プラマリー', 'emanon-premium' ),
				'slug' => 'primary-lime',
				'color' => '#d4e47d',
			),
			array(
				'name' => __( 'プラマリー［ライト］', 'emanon-premium' ),
				'slug' => 'primary-lime-light',
				'color' => '#f1ff6b',
			),
			array(
				'name' => __( 'セカンダリ［ダーク］', 'emanon-premium' ),
				'slug' => 'secondary-lime-dark',
				'color' => '#d9eaec',
			),
			array(
				'name' => __( 'セカンダリ', 'emanon-premium' ),
				'slug' => 'secondary-lime',
				'color' => '#f0f7f7',
			),
			array(
				'name' => __( 'アクセント', 'emanon-premium' ),
				'slug' => 'secondary-lime-light',
				'color' => '#74a64c',
			),
			array(
				'name' => __( 'Info', 'emanon-premium' ),
				'slug' => 'info',
				'color' => '#007bff',
			),
			array(
				'name' => __( 'Success', 'emanon-premium' ),
				'slug' => 'success',
				'color' => '#00c851',
			),
			array(
				'name' => __( 'Warning', 'emanon-premium' ),
				'slug' => 'warning',
				'color' => '#dc3545',
			),
			array(
				'name' => __( 'グレー', 'emanon-premium' ),
				'slug' => 'light-gray',
				'color' => '#e5e7e8',
			),
			array(
				'name' => __( 'グレー［ダーク］', 'emanon-premium' ),
				'slug' => 'dark-gray',
				'color' => '#828990',
			),
			array(
				'name' => __( 'ブラック［ライト］', 'emanon-premium' ),
				'slug' => 'light-blacky',
				'color' => '#484848',
			),
			array(
				'name' => __( 'ブラック', 'emanon-premium' ),
				'slug' => 'black',
				'color' => '#333333',
			),
			array(
				'name' => __( 'ホワイト', 'emanon-premium' ),
				'slug' => 'white',
				'color' => '#ffffff',
			),
		) );
	} elseif ( 'purple_palettes' == $color_palettes_type ) {
		add_theme_support( 'editor-color-palette', array(
			array(
				'name' => __( 'プラマリー［ダーク］', 'emanon-premium' ),
				'slug' => 'primary-purple-dark',
				'color' => '#836fa9',
			),
			array(
				'name' => __( 'プラマリー', 'emanon-premium' ),
				'slug' => 'primary-purple',
				'color' => '#b39ddb',
			),
			array(
				'name' => __( 'プラマリー［ライト］', 'emanon-premium' ),
				'slug' => 'primary-purple-light',
				'color' => '#e6ceff',
			),
			array(
				'name' => __( 'セカンダリ［ダーク］', 'emanon-premium' ),
				'slug' => 'secondary-purple-dark',
				'color' => '#8aacc8',
			),
			array(
				'name' => __( 'セカンダリ', 'emanon-premium' ),
				'slug' => 'secondary-purple',
				'color' => '#bbdefb',
			),
			array(
				'name' => __( 'アクセント', 'emanon-premium' ),
				'slug' => 'secondary-purple-light',
				'color' => '#3e3a3a',
			),
			array(
				'name' => __( 'Info', 'emanon-premium' ),
				'slug' => 'info',
				'color' => '#007bff',
			),
			array(
				'name' => __( 'Success', 'emanon-premium' ),
				'slug' => 'success',
				'color' => '#00c851',
			),
			array(
				'name' => __( 'Warning', 'emanon-premium' ),
				'slug' => 'warning',
				'color' => '#dc3545',
			),
			array(
				'name' => __( 'グレー', 'emanon-premium' ),
				'slug' => 'gray',
				'color' => '#e5e7e8',
			),
			array(
				'name' => __( 'グレー［ダーク］', 'emanon-premium' ),
				'slug' => 'dark-gray',
				'color' => '#828990',
			),
			array(
				'name' => __( 'ブラック［ライト］', 'emanon-premium' ),
				'slug' => 'light-blacky',
				'color' => '#484848',
			),
			array(
				'name' => __( 'ブラック', 'emanon-premium' ),
				'slug' => 'black',
				'color' => '#333333',
			),
			array(
				'name' => __( 'ホワイト', 'emanon-premium' ),
				'slug' => 'white',
				'color' => '#ffffff',
			),
		) );
	} elseif ( 'pink_palettes' == $color_palettes_type ) {
		add_theme_support( 'editor-color-palette', array(
			array(
				'name' => __( 'プラマリー［ダーク］', 'emanon-premium' ),
				'slug' => 'primary-pink-dark',
				'color' => '#dcadbb',
			),
			array(
				'name' => __( 'プラマリー', 'emanon-premium' ),
				'slug' => 'primary-pink',
				'color' => '#f0dde3',
			),
			array(
				'name' => __( 'プラマリー［ライト］', 'emanon-premium' ),
				'slug' => 'primary-pink-light',
				'color' => '#fff8ff',
			),
			array(
				'name' => __( 'セカンダリ［ダーク］', 'emanon-premium' ),
				'slug' => 'secondary-pink-dark',
				'color' => '#9bc4cc',
			),
			array(
				'name' => __( 'セカンダリ', 'emanon-premium' ),
				'slug' => 'secondary-pink',
				'color' => '#dfecee',
			),
			array(
				'name' => __( 'アクセント', 'emanon-premium' ),
				'slug' => 'secondary-pink-light',
				'color' => '#af9dc0',
			),
			array(
				'name' => __( 'Info', 'emanon-premium' ),
				'slug' => 'info',
				'color' => '#007bff',
			),
			array(
				'name' => __( 'Success', 'emanon-premium' ),
				'slug' => 'success',
				'color' => '#00c851',
			),
			array(
				'name' => __( 'Warning', 'emanon-premium' ),
				'slug' => 'warning',
				'color' => '#dc3545',
			),
			array(
				'name' => __( 'グレー', 'emanon-premium' ),
				'slug' => 'light-gray',
				'color' => '#e5e7e8',
			),
			array(
				'name' => __( 'グレー［ダーク］', 'emanon-premium' ),
				'slug' => 'dark-gray',
				'color' => '#828990',
			),
			array(
				'name' => __( 'ブラック［ライト］', 'emanon-premium' ),
				'slug' => 'light-blacky',
				'color' => '#484848',
			),
			array(
				'name' => __( 'ブラック', 'emanon-premium' ),
				'slug' => 'black',
				'color' => '#333333',
			),
			array(
				'name' => __( 'ホワイト', 'emanon-premium' ),
				'slug' => 'white',
				'color' => '#ffffff',
			),
		) );
	} elseif ( 'brown_palettes' == $color_palettes_type ) {
		add_theme_support( 'editor-color-palette', array(
			array(
				'name' => __( 'プラマリー［ダーク］', 'emanon-premium' ),
				'slug' => 'primary-brown-dark',
				'color' => '#7c2e1e',
			),
			array(
				'name' => __( 'プラマリー', 'emanon-premium' ),
				'slug' => 'primary-brown',
				'color' => '#b05a46',
			),
			array(
				'name' => __( 'プラマリー［ライト］', 'emanon-premium' ),
				'slug' => 'primary-brown-light',
				'color' => '#e58872',
			),
			array(
				'name' => __( 'セカンダリ［ダーク］', 'emanon-premium' ),
				'slug' => 'secondary-brown-dark',
				'color' => '#b19962',
			),
			array(
				'name' => __( 'セカンダリ', 'emanon-premium' ),
				'slug' => 'secondary-brown',
				'color' => '#e4ca90',
			),
			array(
				'name' => __( 'アクセント', 'emanon-premium' ),
				'slug' => 'secondary-brown-light',
				'color' => '#2a4743',
			),
			array(
				'name' => __( 'Info', 'emanon-premium' ),
				'slug' => 'info',
				'color' => '#007bff',
			),
			array(
				'name' => __( 'Success', 'emanon-premium' ),
				'slug' => 'success',
				'color' => '#00c851',
			),
			array(
				'name' => __( 'Warning', 'emanon-premium' ),
				'slug' => 'warning',
				'color' => '#dc3545',
			),
			array(
				'name' => __( 'グレー', 'emanon-premium' ),
				'slug' => 'gray',
				'color' => '#e5e7e8',
			),
			array(
				'name' => __( 'グレー［ダーク］', 'emanon-premium' ),
				'slug' => 'dark-gray',
				'color' => '#828990',
			),
			array(
				'name' => __( 'ブラック［ライト］', 'emanon-premium' ),
				'slug' => 'light-blacky',
				'color' => '#484848',
			),
			array(
				'name' => __( 'ブラック', 'emanon-premium' ),
				'slug' => 'black',
				'color' => '#333333',
			),
			array(
				'name' => __( 'ホワイト', 'emanon-premium' ),
				'slug' => 'white',
				'color' => '#ffffff',
			),
		) );
	} elseif ( 'gray_palettes' == $color_palettes_type ) {
		add_theme_support( 'editor-color-palette', array(
			array(
				'name' => __( 'プラマリー［ダーク］', 'emanon-premium' ),
				'slug' => 'primary-gray-dark',
				'color' => '#5e5e5e',
			),
			array(
				'name' => __( 'プラマリー', 'emanon-premium' ),
				'slug' => 'primary-gray',
				'color' => '#a5a5a5',
			),
			array(
				'name' => __( 'プラマリー［ライト］', 'emanon-premium' ),
				'slug' => 'primary-gray-light',
				'color' => '#c4c4c4',
			),
			array(
				'name' => __( 'セカンダリ［ダーク］', 'emanon-premium' ),
				'slug' => 'secondary-gray-dark',
				'color' => '#ccc5c0',
			),
			array(
				'name' => __( 'セカンダリ', 'emanon-premium' ),
				'slug' => 'secondary-gray',
				'color' => '#e3dfdc',
			),
			array(
				'name' => __( 'アクセント', 'emanon-premium' ),
				'slug' => 'secondary-gray-light',
				'color' => '#1a0b08',
			),
			array(
				'name' => __( 'Info', 'emanon-premium' ),
				'slug' => 'info',
				'color' => '#007bff',
			),
			array(
				'name' => __( 'Success', 'emanon-premium' ),
				'slug' => 'success',
				'color' => '#00c851',
			),
			array(
				'name' => __( 'Warning', 'emanon-premium' ),
				'slug' => 'warning',
				'color' => '#dc3545',
			),
			array(
				'name' => __( 'グレー', 'emanon-premium' ),
				'slug' => 'gray',
				'color' => '#e5e7e8',
			),
			array(
				'name' => __( 'グレー［ダーク］', 'emanon-premium' ),
				'slug' => 'dark-gray',
				'color' => '#828990',
			),
			array(
				'name' => __( 'ブラック［ライト］', 'emanon-premium' ),
				'slug' => 'light-blacky',
				'color' => '#484848',
			),
			array(
				'name' => __( 'ブラック', 'emanon-premium' ),
				'slug' => 'black',
				'color' => '#333333',
			),
			array(
				'name' => __( 'ホワイト', 'emanon-premium' ),
				'slug' => 'white',
				'color' => '#ffffff',
			),
		) );
	}
}

/**
 * ブロックのフォントサイズ
 */
add_action( 'after_setup_theme', 'emanon_editor_font_sizes' );
function emanon_editor_font_sizes() {
add_theme_support( 'editor-font-sizes', array(
			array(
					'name' => __( '小', 'emanon-premium' ),
					'shortName' => __( '小', 'emanon-premium' ),
					'size' => 12.8,
					'slug' => 'small'
			),
			array(
					'name' => __( '標準', 'emanon-premium' ),
					'shortName' => __( '標準', 'emanon-premium' ),
					'size' => 16,
					'slug' => 'normal'
			),
			array(
					'name' => __( '大', 'emanon-premium' ),
					'shortName' => __( '大', 'emanon-premium' ),
					'size' => 32,
					'slug' => 'large'
			),
			array(
					'name' => __( '特大', 'emanon-premium' ),
					'shortName' => __( '特大', 'emanon-premium' ),
					'size' => 42.7,
					'slug' => 'x-large'
			),
	) );
}

/**
 * ブロックエディタ用CSS
 */
function emanon_style_theme_block() {

	/*---font family--*/
	$h1_font_family           = get_theme_mod( 'h1_font_family', 'sans-serif' );
	$h2_font_family           = get_theme_mod( 'h2_font_family', 'sans-serif' );
	$h3_font_family           = get_theme_mod( 'h3_font_family', 'sans-serif' );
	$h4_font_family           = get_theme_mod( 'h4_font_family', 'sans-serif' );
	$h5_font_family           = get_theme_mod( 'h5_font_family', 'sans-serif' );
	$h6_font_family           = get_theme_mod( 'h6_font_family', 'sans-serif' );
	$site_body_font_family    = get_theme_mod( 'site_body_font_family', 'sans-serif' );
	$sans                     = '-apple-system,BlinkMacSystemFont,"YuGothic","Yu Gothic","Hiragino Kaku Gothic Pro","ヒラギノ角ゴ Pro W3","Segoe UI","メイリオ","Meiryo",sans-serif';
	$serif                    = '"Yu Mincho","游明朝","YuMincho","Hiragino Mincho ProN","ヒラギノ明朝 ProN W3",serif';
	$noto_sans                = '"Noto Sans JP",sans-serif';
	$noto_serif               = '"Noto Serif JP",serif';


	if ( 'sans-serif' === $h1_font_family ) {
		$h1_font = $sans;
	} elseif ( 'serif' === $h1_font_family ) {
		$h1_font = $serif;
	} elseif ( 'noto_sans_jp' === $h1_font_family ) {
		$h1_font = $noto_sans;
	} elseif ( 'noto_serif_jp' === $h1_font_family ) {
		$h1_font = $noto_serif;
	}

	if ( 'sans-serif' === $h2_font_family ) {
		$h2_font = $sans;
	} elseif ( 'serif' === $h2_font_family ) {
		$h2_font = $serif;
	} elseif ( 'noto_sans_jp' === $h2_font_family ) {
		$h2_font = $noto_sans;
	} elseif ( 'noto_serif_jp' === $h2_font_family ) {
		$h2_font = $noto_serif;
	}

	if ( 'sans-serif' === $h3_font_family ) {
		$h3_font = $sans;
	} elseif ( 'serif' === $h3_font_family ) {
		$h3_font = $serif;
	} elseif ( 'noto_sans_jp' === $h3_font_family ) {
		$h3_font = $noto_sans;
	} elseif ( 'noto_serif_jp' === $h3_font_family ) {
		$h3_font = $noto_serif;
	}

	if ( 'sans-serif' === $h4_font_family ) {
		$h4_font = $sans;
	} elseif ( 'serif' === $h4_font_family ) {
		$h4_font = $serif;
	} elseif ( 'noto_sans_jp' === $h4_font_family ) {
		$h4_font = $noto_sans;
	} elseif ( 'noto_serif_jp' === $h4_font_family ) {
		$h4_font = $noto_serif;
	}

	if ( 'sans-serif' === $h4_font_family ) {
		$h5_font = $sans;
	} elseif ( 'serif' === $h4_font_family ) {
		$h5_font = $serif;
	} elseif ( 'noto_sans_jp' === $h4_font_family ) {
		$h5_font = $noto_sans;
	} elseif ( 'noto_serif_jp' === $h4_font_family ) {
		$h5_font = $noto_serif;
	}

	if ( 'sans-serif' === $h4_font_family ) {
		$h6_font = $sans;
	} elseif ( 'serif' === $h4_font_family ) {
		$h6_font = $serif;
	} elseif ( 'noto_sans_jp' === $h4_font_family ) {
		$h6_font = $noto_sans;
	} elseif ( 'noto_serif_jp' === $h4_font_family ) {
		$h6_font = $noto_serif;
	}

	if ( 'sans-serif' === $site_body_font_family ) {
		$site_body_font = $sans;
	} elseif ( 'serif' === $site_body_font_family ) {
		$site_body_font = $serif;
	} elseif ( 'noto_sans_jp' === $site_body_font_family ) {
		$site_body_font = $noto_sans;
	} elseif ( 'noto_serif_jp' === $site_body_font_family ) {
		$site_body_font = $noto_serif;
	}

	/*---font weight--*/
	$h1_weight           = get_theme_mod( 'h1_font_weight', 'bold' );
	$h2_weight           = get_theme_mod( 'h2_font_weight', 'bold' );
	$h3_weight           = get_theme_mod( 'h3_font_weight', 'bold' );
	$h4_weight           = get_theme_mod( 'h4_font_weight', 'bold' );
	$h5_weight           = get_theme_mod( 'h5_font_weight', 'bold' );
	$h6_weight           = get_theme_mod( 'h6_font_weight', 'bold' );

	/*---color--*/
	$background_color                       = '#' .get_theme_mod( 'background_color' );
	$primary_color                          = get_theme_mod( 'primary_color', emanon_primary_color() );
	$primary_light_color                    = get_theme_mod( 'primary_light_color', emanon_primary_light_color() );
	$article_heading_main_color             = get_theme_mod( 'article_heading_main_color', '#007bbb' );
	$article_heading_accent_color           = get_theme_mod( 'article_heading_accent_color', '#009dee' );
	$article_heading2_text_color            = get_theme_mod( 'article_heading2_text_color', '#333333' );
	$article_heading3_text_color            = get_theme_mod( 'article_heading3_text_color', '#333333' );
	$article_heading4_text_color            = get_theme_mod( 'article_heading4_text_color', '#333333' );

	$font = '
		/* font-family */
		.block-editor-block-list__layout {
			font-family: ' . $site_body_font . ';
		}
		.editor-post-title__input,
		.block-editor-block-list__layout h1,
		#emanon_subtitle {
			font-family: ' . $h1_font . ' !important;
			font-weight: ' . $h1_weight . ' !important;
		}
		.block-editor-block-list__layout h2 {
			font-family: ' . $h2_font . ';
			font-weight: ' . $h2_weight . ';
		}
		.block-editor-block-list__layout h3 {
			font-family: ' . $h3_font . ';
			font-weight: ' . $h3_weight . ';
		}
		.block-editor-block-list__layout h4 {
			font-family: ' . $h4_font . ';
			font-weight: ' . $h4_weight . ';
		}
		.block-editor-block-list__layout h5 {
			font-family: ' . $h5_font . ';
			font-weight: ' . $h5_weight . ' !important;
		}
		.block-editor-block-list__layout h6 {
			font-family: ' . $h6_font . ';
			font-weight: ' . $h6_weight . ' !important;
		}
	';

	$h2_design = get_theme_mod( 'h2_design', 'h2-none-style' );
	$h3_design = get_theme_mod( 'h3_design', 'h3-none-style' );
	$h4_design = get_theme_mod( 'h4_design', 'h4-none-style' );

	if ( 'h2-none-style' === $h2_design ) {
		$h2 = '';
	} elseif ( 'h2-bg-color' === $h2_design ) {
		$h2 = '
		.block-editor-block-list__layout h2:not(.is-style-none) {
			padding-top: 8px;
			padding-bottom: 8px;
			padding-right: 12px;
			padding-left: 12px;
			background-color: ' . $primary_color . ';
			color: #ffffff;
		}
		';
	} elseif ( 'h2-bg-color-radius' === $h2_design ) {
		$h2 = '
		.block-editor-block-list__layout h2:not(.is-style-none) {
			padding-top: 8px;
			padding-bottom: 8px;
			padding-right: 12px;
			padding-left: 12px;
			border-radius: 3px;
			background-color: ' . $primary_color . ';
			color: #ffffff;
		}
		';
	} elseif ( 'h2-bg-color-border-left' === $h2_design ) {
		$h2 = '
		.block-editor-block-list__layout h2:not(.is-style-none) {
			padding-top: 8px;
			padding-bottom: 8px;
			padding-right: 8px;
			padding-left: 12px;
			background-color: ' . $primary_light_color . ';
			border-left: 6px solid ' . $primary_color . ';
			color: #ffffff;
		}
		';
	} elseif ( 'h2-bg-color-broken-corner' === $h2_design ) {
		$h2 = '
		.block-editor-block-list__layout h2:not(.is-style-none) {
			position: relative;
			padding-top: 8px;
			padding-bottom: 8px;
			padding-right: 12px;
			padding-left: 12px;
			background-color: ' . $primary_color . ';
			color: #ffffff;
		}
		.block-editor-block-list__layout h2:not(.is-style-none)::before {
			position: absolute;
			top: 0;
			right: 0;
			content: "";
			width: 0;
			border-color: #ffffff #ffffff  #e5e7e8 #e5e7e8;
			border-width: 0 16px 16px 0;
			border-style: solid;
			box-shadow: -1px 1px 2px rgba(0, 0, 0, 0.1);
		}
		';
	} elseif ( 'h2-bg-color-ribbon' === $h2_design ) {
		$h2 = '
		.block-editor-block-list__layout h2:not(.is-style-none) {
			position: relative;
			padding-top: 8px;
			padding-bottom: 8px;
			padding-right: 12px;
			padding-left: 12px;
			background-color: ' . $primary_color . ';
			color: #ffffff;
		}
		.block-editor-block-list__layout h2:not(.is-style-none)::before {
			position: absolute;
			content: "";
			top: 100%;
			left: 0;
			border-width: 0 20px 12px 0;
			border-style: solid;
			border-color: transparent;
			border-right-color: rgba(0, 0, 0, 0.1);
		}
		';
	} elseif ( 'h2-speech-bubble' === $h2_design ) {
		$h2 = '
		.block-editor-block-list__layout h2:not(.is-style-none) {
			position: relative;
			padding-top: 8px;
			padding-bottom: 8px;
			padding-right: 12px;
			padding-left: 12px;
			border-radius: 3px;
			background-color: ' . $primary_color . ';
			color: #ffffff;
		}
		.block-editor-block-list__layout h2:not(.is-style-none)::before {
			content: "";
			position: absolute;
			bottom: -8px;
			left: 24px;
			width: 16px;
			height: 16px;
			background: inherit;
			transform: rotate(45deg);
		}
		';
	} elseif ( 'h2-speech-bubble-border' === $h2_design ) {
		$h2 = '
		.block-editor-block-list__layout h2:not(.is-style-none) {
			position: relative;
			padding-top: 8px;
			padding-bottom: 8px;
			padding-right: 12px;
			padding-left: 12px;
			border-radius: 3px;
			border: 2px solid ' . $primary_color . ';
		}
		.block-editor-block-list__layout h2:not(.is-style-none)::before {
			content: "";
			position: absolute;
			bottom: -9px;
			left: 24px;
			width: 16px;
			height: 16px;
			background: inherit;
			transform: rotate(45deg);
			border-right: 2px solid  ' . $primary_color . ';
			border-bottom: 2px solid  ' . $primary_color . ';
			background: #ffffff;
		}
		';
	} elseif ( 'h2-border' === $h2_design ) {
		$h2 = '
		.block-editor-block-list__layout h2:not(.is-style-none) {
			padding-top: 8px;
			padding-bottom: 8px;
			padding-right: 12px;
			padding-left: 12px;
			border: 2px solid ' . $primary_color . ';
		}
		';
	} elseif ( 'h2-border-radius' === $h2_design ) {
		$h2 = '
		.block-editor-block-list__layout h2:not(.is-style-none) {
			padding-top: 8px;
			padding-bottom: 8px;
			padding-right: 12px;
			padding-left: 12px;
			border-radius: 3px;
			border: 2px solid ' . $primary_color . ';
		}
		';
	} elseif ( 'h2-border-bottom' === $h2_design ) {
		$h2 = '
		.block-editor-block-list__layout h2:not(.is-style-none) {
			padding-top: 12px;
			padding-bottom: 12px;
			border-bottom: 2px solid ' . $primary_color . ';
		}
		';
	} elseif ( 'h2-border-bottom-two-colors' === $h2_design ) {
		$h2 = '
		.block-editor-block-list__layout h2:not(.is-style-none) {
			position: relative;
			padding-top: 12px;
			padding-bottom: 12px;
			border-bottom: solid 3px ' . $primary_light_color . ';
		}
		.block-editor-block-list__layout h2:not(.is-style-none)::before {
			position: absolute;
			content: "";
			bottom: -3px;
			left: 0;
			width: 10%;
			background-color: ' . $primary_color . ';
			height: 3px;
			z-index: 2;
		}
		';
	} elseif ( 'h2-border-top-bottom' === $h2_design ) {
		$h2 = '
		.block-editor-block-list__layout h2:not(.is-style-none) {
			padding-top: 8px;
			padding-bottom: 8px;
			border-top: 2px solid ' . $primary_color . ';
			border-bottom: 2px solid ' . $primary_color . ';
		}
		';
	} elseif ( 'h2-border-left' === $h2_design ) {
		$h2 = '
		.block-editor-block-list__layout h2:not(.is-style-none) {
			padding-left: 12px;
			border-left: 3px solid ' . $primary_color . ';
		}
		';
	} elseif ( 'h2-dashed-bottom' === $h2_design ) {
		$h2 = '
		.block-editor-block-list__layout h2:not(.is-style-none) {
			padding-top: 8px;
			padding-bottom: 8px;
			border-bottom: 2px dashed ' . $primary_color . ';
		}
		';
	} elseif ( 'h2-dashed-top-bottom' === $h2_design ) {
		$h2 = '
		.block-editor-block-list__layout h2:not(.is-style-none) {
			padding-top: 8px;
			padding-bottom: 8px;
			border-top: 2px dashed ' . $primary_color . ';
			border-bottom: 2px dashed ' . $primary_color. ';
		}
		';
	}

	if ( 'h3-none-style' === $h3_design ) {
		$h3 = '';
	} elseif ( 'h3-bg-color' === $h3_design ) {
		$h3 = '
		.block-editor-block-list__layout h3:not(.is-style-none) {
			padding-top: 8px;
			padding-bottom: 8px;
			padding-right: 12px;
			padding-left: 12px;
			background-color: ' . $primary_color . ';
			color: #ffffff;
		}
		';
	} elseif ( 'h3-bg-color-radius' === $h3_design ) {
		$h3 = '
		.block-editor-block-list__layout h3:not(.is-style-none) {
			padding-top: 8px;
			padding-bottom: 8px;
			padding-right: 12px;
			padding-left: 12px;
			border-radius: 3px;
			background-color: ' . $primary_color . ';
			color: #ffffff;
		}
		';
	} elseif ( 'h3-bg-color-border-left' === $h3_design ) {
		$h3 = '
		.block-editor-block-list__layout h3:not(.is-style-none) {
			padding-top: 8px;
			padding-bottom: 8px;
			padding-right: 8px;
			padding-left: 12px;
			background-color: ' . $primary_light_color . ';
			border-left: 6px solid ' . $primary_color . ';
			color: #ffffff;
		}
		';
	} elseif ( 'h3-bg-color-broken-corner' === $h3_design ) {
		$h3 = '
		.block-editor-block-list__layout h3:not(.is-style-none) {
			position: relative;
			padding-top: 8px;
			padding-bottom: 8px;
			padding-right: 12px;
			padding-left: 12px;
			background-color: ' . $primary_color . ';
			color: #ffffff;
		}
		.block-editor-block-list__layout h3:not(.is-style-none)::before {
			position: absolute;
			top: 0;
			right: 0;
			content: "";
			width: 0;
			border-color: #ffffff #ffffff  #e5e7e8 #e5e7e8;
			border-width: 0 16px 16px 0;
			border-style: solid;
			box-shadow: -1px 1px 2px rgba(0, 0, 0, 0.1);
		}
		';
	} elseif ( 'h3-bg-color-ribbon' === $h3_design ) {
		$h3 = '
		.block-editor-block-list__layout h3:not(.is-style-none) {
			position: relative;
			padding-top: 8px;
			padding-bottom: 8px;
			padding-right: 12px;
			padding-left: 12px;
			background-color: ' . $primary_color . ';
			color: #ffffff;
		}
		.block-editor-block-list__layout h3:not(.is-style-none):before {
			position: absolute;
			content: "";
			top: 100%;
			left: 0;
			border-width: 0 20px 12px 0;
			border-style: solid;
			border-color: transparent;
			border-right-color: rgba(0, 0, 0, 0.1);
		}
		';
	} elseif ( 'h3-speech-bubble' === $h3_design ) {
		$h3 = '
		.block-editor-block-list__layout h3:not(.is-style-none) {
			position: relative;
			padding-top: 8px;
			padding-bottom: 8px;
			padding-right: 12px;
			padding-left: 12px;
			border-radius: 3px;
			background-color: ' . $primary_color . ';
			color: #ffffff;
		}
		.block-editor-block-list__layout h3:not(.is-style-none)::before {
			content: "";
			position: absolute;
			bottom: -8px;
			left: 24px;
			width: 16px;
			height: 16px;
			background: inherit;
			transform: rotate(45deg);
		}
		';
	} elseif ( 'h3-speech-bubble-border' === $h3_design ) {
		$h3 = '
		.block-editor-block-list__layout h3:not(.is-style-none) {
			position: relative;
			padding-top: 8px;
			padding-bottom: 8px;
			padding-right: 12px;
			padding-left: 12px;
			border-radius: 3px;
			border: 2px solid ' . $primary_color . ';
		}
		.block-editor-block-list__layout h3:not(.is-style-none)::before {
			content: "";
			position: absolute;
			bottom: -9px;
			left: 24px;
			width: 16px;
			height: 16px;
			background: inherit;
			transform: rotate(45deg);
			border-right: 2px solid  ' . $primary_color . ';
			border-bottom: 2px solid  ' . $primary_color . ';
			background: #ffffff;
		}
		';
	} elseif ( 'h3-border' === $h3_design ) {
		$h3 = '
		.block-editor-block-list__layout h3:not(.is-style-none) {
			padding-top: 8px;
			padding-bottom: 8px;
			padding-right: 12px;
			padding-left: 12px;
			border: 2px solid ' . $primary_color . ';
		}
		';
	} elseif ( 'h3-border-radius' === $h3_design ) {
		$h3 = '
		.block-editor-block-list__layout h3:not(.is-style-none) {
			padding-top: 8px;
			padding-bottom: 8px;
			padding-right: 12px;
			padding-left: 12px;
			border-radius: 3px;
			border: 2px solid ' . $primary_color . ';
		}
		';
	} elseif ( 'h3-border-bottom' === $h3_design ) {
		$h3 = '
		.block-editor-block-list__layout h3:not(.is-style-none) {
			padding-top: 12px;
			padding-bottom: 12px;
			border-bottom: 2px solid ' . $primary_color . ';
		}
		';
	} elseif ( 'h3-border-bottom-two-colors' === $h3_design ) {
		$h3 = '
		.block-editor-block-list__layout h3:not(.is-style-none) {
			position: relative;
			padding-top: 12px;
			padding-bottom: 12px;
			border-bottom: solid 3px ' . $primary_light_color . ';
		}
		.block-editor-block-list__layout h3:not(.is-style-none)::before {
			position: absolute;
			content: "";
			bottom: -3px;
			left: 0;
			width: 10%;
			background-color: ' . $primary_color . ';
			height: 3px;
			z-index: 2;
		}
		';
	} elseif ( 'h3-border-top-bottom' === $h3_design ) {
		$h3 = '
		.block-editor-block-list__layout h3:not(.is-style-none) {
			padding-top: 8px;
			padding-bottom: 8px;
			border-top: 2px solid ' . $primary_color . ';
			border-bottom: 2px solid ' . $primary_color . ';
		}
		';
	} elseif ( 'h3-border-left' === $h3_design ) {
		$h3 = '
		.block-editor-block-list__layout h3:not(.is-style-none) {
			padding-left: 12px;
			border-left: 3px solid ' . $primary_color . ';
		}
		';
	} elseif ( 'h3-dashed-bottom' === $h3_design ) {
		$h3 = '
		.block-editor-block-list__layout h3:not(.is-style-none) {
			padding-top: 8px;
			padding-bottom: 8px;
			border-bottom: 2px dashed ' . $primary_color . ';
		}
		';
	} elseif ( 'h3-dashed-top-bottom' === $h3_design ) {
		$h3 = '
		.block-editor-block-list__layout h3:not(.is-style-none) {
			padding-top: 8px;
			padding-bottom: 8px;
			border-top: 2px dashed ' . $primary_color . ';
			border-bottom: 2px dashed ' . $primary_color. ';
		}
		';
	}

	if ( 'h4-none-style' === $h4_design ) {
		$h4 = '';
	} elseif ( 'h4-bg-color' === $h4_design ) {
		$h4 = '
		.block-editor-block-list__layout h4:not(.is-style-none) {
			padding-top: 8px;
			padding-bottom: 8px;
			padding-right: 12px;
			padding-left: 12px;
			background-color: ' . $primary_color . ';
			color: #ffffff;
		}
		';
	} elseif ( 'h4-bg-color-radius' === $h4_design ) {
		$h4 = '
		.block-editor-block-list__layout h4:not(.is-style-none) {
			padding-top: 8px;
			padding-bottom: 8px;
			padding-right: 12px;
			padding-left: 12px;
			border-radius: 3px;
			background-color: ' . $primary_color . ';
			color: #ffffff;
		}
		';
	} elseif ( 'h4-bg-color-border-left' === $h4_design ) {
		$h4 = '
		.block-editor-block-list__layout h4:not(.is-style-none) {
			padding-top: 8px;
			padding-bottom: 8px;
			padding-right: 8px;
			padding-left: 12px;
			background-color: ' . $primary_light_color . ';
			border-left: 6px solid ' . $primary_color . ';
			color: #ffffff;
		}
		';
	} elseif ( 'h4-bg-color-broken-corner' === $h4_design ) {
		$h4 = '
		.block-editor-block-list__layout h4:not(.is-style-none) {
			position: relative;
			padding-top: 8px;
			padding-bottom: 8px;
			padding-right: 12px;
			padding-left: 12px;
			background-color: ' . $primary_color . ';
			color: #ffffff;
		}
		.block-editor-block-list__layout h4:not(.is-style-none)::before {
			position: absolute;
			top: 0;
			right: 0;
			content: "";
			width: 0;
			border-color: #ffffff #ffffff  #e5e7e8 #e5e7e8;
			border-width: 0 16px 16px 0;
			border-style: solid;
			box-shadow: -1px 1px 2px rgba(0, 0, 0, 0.1);
		}
		';
	} elseif ( 'h4-bg-color-ribbon' === $h4_design ) {
		$h4 = '
		.block-editor-block-list__layout h4:not(.is-style-none) {
			position: relative;
			padding-top: 8px;
			padding-bottom: 8px;
			padding-right: 12px;
			padding-left: 12px;
			background-color: ' . $primary_color . ';
			color: #ffffff;
		}
		.block-editor-block-list__layout h4:not(.is-style-none):before {
			position: absolute;
			content: "";
			top: 100%;
			left: 0;
			border-width: 0 20px 12px 0;
			border-style: solid;
			border-color: transparent;
			border-right-color: rgba(0, 0, 0, 0.1);
		}
		';
	} elseif ( 'h4-speech-bubble' === $h4_design ) {
		$h4 = '
		.block-editor-block-list__layout h4:not(.is-style-none) {
			position: relative;
			padding-top: 8px;
			padding-bottom: 8px;
			padding-right: 12px;
			padding-left: 12px;
			border-radius: 3px;
			background-color: ' . $primary_color . ';
			color: #ffffff;
		}
		.block-editor-block-list__layout h4:not(.is-style-none)::before {
			content: "";
			position: absolute;
			bottom: -8px;
			left: 24px;
			width: 16px;
			height: 16px;
			background: inherit;
			transform: rotate(45deg);
		}
		';
	} elseif ( 'h4-speech-bubble-border' === $h4_design ) {
		$h4 = '
		.block-editor-block-list__layout h4:not(.is-style-none) {
			position: relative;
			padding-top: 8px;
			padding-bottom: 8px;
			padding-right: 12px;
			padding-left: 12px;
			border-radius: 3px;
			border: 2px solid ' . $primary_color . ';
		}
		.block-editor-block-list__layout h4:not(.is-style-none)::before {
			content: "";
			position: absolute;
			bottom: -9px;
			left: 24px;
			width: 16px;
			height: 16px;
			background: inherit;
			transform: rotate(45deg);
			border-right: 2px solid  ' . $primary_color . ';
			border-bottom: 2px solid  ' . $primary_color . ';
			background: #ffffff;
		}
		';
	} elseif ( 'h4-border' === $h4_design ) {
		$h4 = '
		.block-editor-block-list__layout h4:not(.is-style-none) {
			padding-top: 8px;
			padding-bottom: 8px;
			padding-right: 12px;
			padding-left: 12px;
			border: 2px solid ' . $primary_color . ';
		}
		';
	} elseif ( 'h4-border-radius' === $h4_design ) {
		$h4 = '
		.block-editor-block-list__layout h4:not(.is-style-none) {
			padding-top: 8px;
			padding-bottom: 8px;
			padding-right: 12px;
			padding-left: 12px;
			border-radius: 3px;
			border: 2px solid ' . $primary_color . ';
		}
		';
	} elseif ( 'h4-border-bottom' === $h4_design ) {
		$h4 = '
		.block-editor-block-list__layout h4:not(.is-style-none) {
			padding-top: 12px;
			padding-bottom: 12px;
			border-bottom: 2px solid ' . $primary_color . ';
		}
		';
	} elseif ( 'h4-border-bottom-two-colors' === $h4_design ) {
		$h4 = '
		.block-editor-block-list__layout h4:not(.is-style-none) {
			position: relative;
			padding-top: 12px;
			padding-bottom: 12px;
			border-bottom: solid 3px ' . $primary_light_color . ';
		}
		.block-editor-block-list__layout h4:not(.is-style-none)::before {
			position: absolute;
			content: "";
			bottom: -3px;
			left: 0;
			width: 10%;
			background-color: ' . $primary_color . ';
			height: 3px;
			z-index: 2;
		}
		';
	} elseif ( 'h4-border-top-bottom' === $h4_design ) {
		$h4 = '
		.block-editor-block-list__layout h4:not(.is-style-none) {
			padding-top: 8px;
			padding-bottom: 8px;
			border-top: 2px solid ' . $primary_color . ';
			border-bottom: 2px solid ' . $primary_color . ';
		}
		';
	} elseif ( 'h4-border-left' === $h4_design ) {
		$h4 = '
		.block-editor-block-list__layout h4:not(.is-style-none) {
			padding-left: 12px;
			border-left: 3px solid ' . $primary_color . ';
		}
		';
	} elseif ( 'h4-dashed-bottom' === $h4_design ) {
		$h4 = '
		.block-editor-block-list__layout h4:not(.is-style-none) {
			padding-top: 8px;
			padding-bottom: 8px;
			border-bottom: 2px dashed ' . $primary_color . ';
		}
		';
	} elseif ( 'h4-dashed-top-bottom' === $h4_design ) {
		$h4 = '
		.block-editor-block-list__layout h4:not(.is-style-none) {
			padding-top: 8px;
			padding-bottom: 8px;
			border-top: 2px dashed ' . $primary_color . ';
			border-bottom: 2px dashed ' . $primary_color. ';
		}
		';
	}

	$col_post                 = get_theme_mod( 'post_layout', 'two-r-col' );
	$share_button_sticky_post = get_theme_mod( 'display_share_button_sticky_post' );
	if ( 'one-col' === $col_post ) {
		$width = '780px';
	} elseif ( $share_button_sticky_post && 'two-r-col' === $col_post || $share_button_sticky_post && 'two-l-col' === $col_post ) {
		$width = '704px';
	} else {
		$width = '768px';
	}

	$paragraph_width         = post_custom( 'emanon_paragraph_width' );
	if ( 'default' === $paragraph_width || empty( $paragraph_width ) ) {
		$paragraph = get_theme_mod( 'article_body_width', 'paragraph__normal' );
	} else {
		$paragraph = post_custom( 'emanon_paragraph_width' );
	}

	if ( 'paragraph__normal' === $paragraph ) {
		$padding = '48px';
		$margin  = '0px';
	} elseif ( 'paragraph__full-width' === $paragraph ) {
		$padding = '0px';
		$margin  = '0px';
	} elseif ( 'paragraph__narrow' === $paragraph ) {
		$padding = '90px';
		$margin  = '64px';
	} elseif ( 'paragraph__normal--border' === $paragraph ) {
		$padding = '50px';
		$margin  = '0px';
	} elseif ( 'paragraph__narrow--border' === $paragraph ) {
		$padding = '92px';
		$margin  = '64px';
	}

	$wp_block = '
		/*メインのカラム幅 */
		.wp-block {
			max-width: calc(' . $width . ' - ' . $padding . ') !important;
		}
		/*h2の幅 */
		.block-editor-block-list__layout h2 {
			max-width: calc(' . $width . ' - ' . $padding . ' + ' . $margin . ') !important;
		}
		/*「幅広」ブロック */
		.wp-block[data-align="wide"] {
			margin: auto !important;
			max-width: calc(' . $width . ' - ' . $padding . ') !important;
		}
		/*「全幅」ブロックの幅*/
		.wp-block[data-align="full"] {
			margin: auto !important;
			max-width: calc(' . $width . ' - ' . $padding . ') !important;
		}
		/*セールスページ「幅広」ブロックの幅*/
		.post-type-sales .wp-block[data-align="wide"] {
			max-width: 60vw !important;
		}
		/*セールスページ「全幅」ブロックの幅*/
		.post-type-sales .wp-block[data-align="full"] {
			max-width: none !important;
			margin-top: 0 !important;
			margin-bottom: 0 !important;
			margin-left: -58px !important;
			margin-right: -58px !important;
		}
	';

	$col_front_page           = get_theme_mod( 'front_page_layout', 'two-r-col' );
	$col_page                 = get_theme_mod( 'page_layout', 'two-r-col' );
	$share_button_sticky_page = get_theme_mod( 'display_share_button_sticky_page' );
	if ( 'one-col' === $col_page ) {
		$width_page = '780px';
	} elseif ( $share_button_sticky_page && 'two-r-col' === $col_page || $share_button_sticky_page && 'two-l-col' === $col_page ) {
		$width_page = '704px';
	} else {
		$width_page = '768px';
	}
	
	$wp_block_page = '
		/*メインのカラム幅 */
		.post-type-page .wp-block {
			max-width: calc(' . $width_page . ' - ' . $padding . ') !important;
		}
		/*h2の幅 */
		.post-type-page .block-editor-block-list__layout h2 {
			max-width: calc(' . $width_page . ' - ' . $padding . ' + ' . $margin . ') !important;
		}
	';

	if ( 'one-col' === $col_page || 'one-col' === $col_front_page ) {
		$wp_block_page_align = '
		/*固定ページ「幅広」ブロックの幅*/
		.post-type-page .wp-block[data-align="wide"] {
			max-width: 60vw !important;
		}
		/*固定ページ「全幅」ブロックの幅*/
		.post-type-page .wp-block[data-align="full"] {
			max-width: none !important;
			margin-top: 0 !important;
			margin-bottom: 0!important;
			margin-left: -58px !important;
			margin-right: -58px !important;
		}
		';
	} else {
		$wp_block_page_align = '';
	}

	$block_css = $font . $h2 . $h3 . $h4 . $wp_block . $wp_block_page . $wp_block_page_align;

	return apply_filters( 'emanon_style_theme_block', emanon_css_minify( $block_css ) );
}