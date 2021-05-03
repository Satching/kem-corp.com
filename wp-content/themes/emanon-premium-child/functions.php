<?php
/**
 * Emanon Premium child functions and definitions
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
	wp_enqueue_style( 'parent-style', T_DIRE_URI . '/style.css', array(), THEME_VERSION );
}

require_once ( ABSPATH . 'wp-admin/includes/file.php' );

function get_emanon_minify_style() {

	//オリジナルのcss
	$origin_file             = T_DIRE . '/style.css';
	//子テーマのcss
	$child_file              = S_DIRE . '/style.css';
	//block-libraryのcss
	$block_style_file        = ABSPATH . 'wp-includes/css/dist/block-library/style.min.css';

	//圧縮のcss
	$minify_file             = S_DIRE . '/style-min.css';

	//最終的にまとめたCSSの中身
	$css                     = '';

	//日付を入れる変数
	$origin_file_date        = '';
	$child_file_date         = '';
	$block_style_file_date   = '';
	$minify_file_date        = '';

	$file_update             = false;


if( WP_Filesystem() ) {
	global $wp_filesystem;

	if ( ! file_exists( $minify_file ) ) {
		$wp_filesystem->touch( $minify_file );
		$file_update = true;
	}

	//日付を取得
	$origin_file_update        = filemtime( $origin_file );
	$child_file_update         = filemtime( $child_file );
	$block_style_file_update   = filemtime( $block_style_file );
	$minify_file_update        = filemtime( $minify_file );

	//ファイル更新日によるminify fileの上書き
	if( $minify_file_update < $origin_file_update 
	|| $minify_file_update < $child_file_update 
	|| $minify_file_update < $block_style_file_update ) {
		$file_update = true;
	}

	if( $file_update ) {
		$theme_style_css       = $wp_filesystem->get_contents( $origin_file );
		$theme_child_style_css = $wp_filesystem->get_contents( $child_file );
		$css_block_style       = $wp_filesystem->get_contents( $block_style_file );
		$all_css               = $theme_style_css .$theme_child_style_css . $css_block_style;
		$css                   = emanon_css_minify( $all_css );
		$wp_filesystem->put_contents( $minify_file, $css );
	}

	$origin_file_uri = S_DIRE_URI . '/style.css';
	$minify_file_uri = S_DIRE_URI . '/style-min.css';

	if( file_exists( $minify_file ) ){
		$file = $minify_file_uri;
	} else {
		$file = $origin_file_uri;
	}
}

return $file;

}

/**
 * parent-styleを削除（CSS圧縮が有効の場合）
 *
 */
add_action(
	'wp_enqueue_scripts',
	function () {
		$minified_css = get_theme_mod( 'minified_css' );
		if ( $minified_css ) {
			wp_dequeue_style( 'parent-style' );
		}
	}
);
