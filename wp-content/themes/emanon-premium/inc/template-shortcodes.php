<?php
/**
 * Template shortcodes
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

/**
 * Google アドセンス display Ad
 */
function function_display_ad_shortcode( ) {
	$ad_code = get_theme_mod( 'display_ad_code' );
	return $ad_code;
}
add_shortcode( 'display_ad', 'function_display_ad_shortcode' );

/**
 * Google アドセンス link Ad
 */
function function_link_ad_shortcode() {
	$ad_code = get_theme_mod( 'link_ad_code' );
	return $ad_code;
}
add_shortcode( 'link_ad', 'function_link_ad_shortcode' );

/**
 * アフェリエイト広告
 */
define( 'AD_SHORTCODE', 'ad' );

function get_ad_shortcode_record( $id ) {
	$ad_title              = get_post_meta( $id, 'ad_title', true );
	$ad_code               = get_post_meta( $id, 'ad_code', true );
	$ad_price              = get_post_meta( $id, 'ad_price', true );
	$ad_star               = get_post_meta( $id, 'ad_star', true );
	$rating_args      = array(
		'rating' => $ad_star,
		'max'    => 5,
	);
	$rating                = get_emanon_star_rating( $rating_args );
	$ad_ranking            = get_post_meta( $id, 'ad_ranking', true );
	$ad_description        = get_post_meta( $id, 'ad_description', true );
	$ad_btn_layout         = get_post_meta( $id, 'ad_btn_layout', true );
	$ad_btn_text_1         = get_post_meta( $id, 'ad_btn_text_1', true );
	$ad_btn_url_1          = get_post_meta( $id, 'ad_btn_url_1', true );
	$ad_btn_img_1         = get_post_meta( $id, 'ad_btn_img_1', true );
	$ad_btn_text_2         = get_post_meta( $id, 'ad_btn_text_2', true );
	$ad_btn_url_2          = get_post_meta( $id, 'ad_btn_url_2', true );
	$ad_btn_img_2         = get_post_meta( $id, 'ad_btn_img_2', true );
	$ad_btn_text_3         = get_post_meta( $id, 'ad_btn_text_3', true );
	$ad_btn_url_3          = get_post_meta( $id, 'ad_btn_url_3', true );
	$ad_btn_img_3         = get_post_meta( $id, 'ad_btn_img_3', true );
	$ad_border             = get_post_meta( $id, 'ad_border', true );
	$ad_btn_border_color_1 = get_post_meta( $id, 'ad_btn_border_color_1', true );
	$ad_btn_bg_color_1     = get_post_meta( $id, 'ad_btn_background_color_1', true );
	$ad_btn_text_color_1   = get_post_meta( $id, 'ad_btn_text_color_1', true );
	$ad_btn_border_color_2 = get_post_meta( $id, 'ad_btn_border_color_2', true );
	$ad_btn_bg_color_2     = get_post_meta( $id, 'ad_btn_background_color_2', true );
	$ad_btn_text_color_2   = get_post_meta( $id, 'ad_btn_text_color_2', true );
	$ad_btn_border_color_3 = get_post_meta( $id, 'ad_btn_border_color_3', true );
	$ad_btn_bg_color_3     = get_post_meta( $id, 'ad_btn_background_color_3', true );
	$ad_btn_text_color_3   = get_post_meta( $id, 'ad_btn_text_color_3', true );

	if ( 'ad_btn_1' === $ad_btn_layout ) {
		$class_btn_layout = ' affiliate-btn-layout__1';
	} elseif ( 'ad_btn_2' === $ad_btn_layout ) {
		$class_btn_layout = ' affiliate-btn-layout__2';
	} elseif ( 'ad_btn_3' === $ad_btn_layout ) {
		$class_btn_layout = ' affiliate-btn-layout__3';
	}

	if ( $ad_border ) {
		$class_border = ' u-border-solid';
	} else {
		$class_border = '';
	}

	if ( '1' == $ad_ranking ) {
		$ranking = '<span class="affiliate-item__ranking-1"><i class="icon-crown"></i></span>';
	} elseif ( '2' == $ad_ranking ) {
		$ranking = '<span class="affiliate-item__ranking-2"><i class="icon-crown"></i></span>';
	} elseif ( '3' == $ad_ranking ) {
		$ranking = '<span class="affiliate-item__ranking-3"><i class="icon-crown"></i></span>';
	} else {
		$ranking = '';
	}

	if ( $ad_price && '1' <= $ad_star ) {
		$ad_price = '<div class="affiliate-item__price">' . $ad_price . $rating . '</div>';
	} elseif ( $ad_price && ! $ad_star ) {
		$ad_price = '<div class="affiliate-item__price">' . $ad_price . '</div>';
	} elseif ( '1' <= $ad_star ) {
		$ad_price = '<div class="affiliate-item__price">' . $rating . '</div>';
	} else {
		$ad_price = '';
	}

	$ad_header = '<div class="affiliate-item__header"><div class="affiliate-item__title">' . $ranking . $ad_title . '</div>' . $ad_price . '</div>';

	if ( $ad_btn_bg_color_1 ) {
		$btn_1 = 'background-color:' . $ad_btn_border_color_1 . ';border: 1px solid ' . $ad_btn_border_color_1 . ';color:' . $ad_btn_text_color_1;
	} else {
		$btn_1 = 'border: 1px solid ' . $ad_btn_border_color_1 . ';color:' . $ad_btn_text_color_1;
	}

	if ( 'ad_btn_1'=== $ad_btn_layout || 'ad_btn_2'=== $ad_btn_layout || 'ad_btn_3'=== $ad_btn_layout ) {
		if ( $ad_btn_url_1 ) {
			$ad_btn_1 = '<div class="affiliate-item__btn'. $class_btn_layout .'"><a href="' . $ad_btn_url_1 . '" class="c-btn c-btn__outline"   style="' . $btn_1 . '"  target="_blank" rel="noopener nofollow">' . $ad_btn_text_1 . '</a>'. $ad_btn_img_1 . '</div>';
		} else {
			$ad_btn_1 = '';
		}
	}

	if ( $ad_btn_bg_color_2 ) {
		$btn_2 = 'background-color:' . $ad_btn_border_color_2 . ';border: 1px solid ' . $ad_btn_border_color_2 . ';color:' . $ad_btn_text_color_2;
	} else {
		$btn_2 = 'border: 1px solid ' . $ad_btn_border_color_2 . ';color:' . $ad_btn_text_color_2;
	}

	if ( $ad_btn_url_2 && $ad_btn_text_2 && 'ad_btn_2'=== $ad_btn_layout || $ad_btn_url_2 && $ad_btn_text_2 && 'ad_btn_3'=== $ad_btn_layout ) {
		$ad_btn_2 = '<div class="affiliate-item__btn' . $class_btn_layout . '"><a href="' . $ad_btn_url_2 . '" class="c-btn c-btn__outline"   style="' . $btn_2 . '"  target="_blank" rel="noopener nofollow">' . $ad_btn_text_2 . '</a>'. $ad_btn_img_2 . '</div>';
	} else {
		$ad_btn_2 = '';
	}

	if ( $ad_btn_bg_color_3 ) {
		$btn_3 = 'background-color:' . $ad_btn_border_color_3 . ';border: 1px solid ' . $ad_btn_border_color_3 . ';color:' . $ad_btn_text_color_3;
	} else {
		$btn_3 = 'border: 1px solid ' . $ad_btn_border_color_3 . ';color:' . $ad_btn_text_color_3;
	}

	if ( $ad_btn_url_3 && $ad_btn_text_3 && 'ad_btn_3'=== $ad_btn_layout ) {
		$ad_btn_3 = '<div class="affiliate-item__btn'. $class_btn_layout .'"><a href="'. $ad_btn_url_3 .'" class="c-btn c-btn__outline"   style="'. $btn_3 .'"  target="_blank" rel="noopener nofollow">' . $ad_btn_text_3 . '</a>'. $ad_btn_img_3 . '</div>';
	} else {
		$ad_btn_3 = '';
	}

	return '<aside class="affiliate-item' . $class_border . '">' . $ad_header . '<div class="u-row u-row-wrap wrapper-col affiliate-item__content"><div class="col-4 affiliate-item__image">' . $ad_code . '</div><div class="col-8 affiliate-item__description">' . nl2br( $ad_description ) . '</div></div><div class="u-row u-row-wrap u-row-cont-around affiliate-item__cta">' . $ad_btn_1 . $ad_btn_2 . $ad_btn_3 . '</div></aside>';

}

function function_ad_shortcode( $atts ) {
	extract( shortcode_atts( array(
		'id' => 0,
	), $atts) );
	if ( $id ) {
		if ( $recode = get_ad_shortcode_record( $id ) ) {
			$ad_code = preg_replace( '{\[' . AD_SHORTCODE . '[^\]]*?id=[\'"]?'.$id.'[\'"]?[^\]]*?\]}i', '', $recode );
			return do_shortcode( $ad_code );
		}
	}
}
add_shortcode( AD_SHORTCODE, 'function_ad_shortcode' );

/**
 * ショートコードの生成
 */
function get_ad_shortcode( $id, $title ) {
	return "[" . AD_SHORTCODE . " id={$id} title={$title} ]";
}