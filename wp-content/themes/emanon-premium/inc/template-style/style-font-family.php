<?php
/**
 * Template style font family
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

function emanon_style_font_family() {

	/*---font family--*/
	$site_title_font_family            = get_theme_mod( 'header_site_title_font_family', 'sans-serif' );
	$site_tagline_font_family          = get_theme_mod( 'header_site_tagline_font_family', 'sans-serif' );
	$main_visual_title_font_family     = get_theme_mod( 'main_visual_title_font_family', 'sans-serif' );
	$main_visual_sub_title_font_family = get_theme_mod( 'main_visual_sub_title_font_family', 'sans-serif' );
	$main_visual_message_font_family   = get_theme_mod( 'main_visual_message_font_family', 'sans-serif' );
	$h1_font_family                    = get_theme_mod( 'h1_font_family', 'sans-serif' );
	$h2_font_family                    = get_theme_mod( 'h2_font_family', 'sans-serif' );
	$h3_font_family                    = get_theme_mod( 'h3_font_family', 'sans-serif' );
	$h4_font_family                    = get_theme_mod( 'h4_font_family', 'sans-serif' );
	$h5_font_family                    = get_theme_mod( 'h5_font_family', 'sans-serif' );
	$h6_font_family                    = get_theme_mod( 'h6_font_family', 'sans-serif' );
	$site_body_font_family             = get_theme_mod( 'site_body_font_family', 'sans-serif' );
	$global_nav_font_family            = get_theme_mod( 'global_nav_font_family', 'sans-serif' );
	$footer_nav_font_family            = get_theme_mod( 'footer_nav_font_family', 'sans-serif' );
	$sans                              = '-apple-system, BlinkMacSystemFont, "Helvetica Neue", "Hiragino Kaku Gothic ProN", "ヒラギノ角ゴ Pro W3", "Segoe UI", "メイリオ", "Meiryo", sans-serif';
	$serif                             = '"Yu Mincho", "游明朝", "YuMincho", "Hiragino Mincho ProN" ,"ヒラギノ明朝 ProN W3", serif';
	$noto_sans                         = '"Noto Sans JP", sans-serif';
	$noto_serif                        = '"Noto Serif JP", serif';

	if ( 'sans-serif' === $site_title_font_family ) {
		$site_title_font = $sans;
	} elseif ( 'serif' === $site_title_font_family ) {
		$site_title_font = $serif;
	} elseif ( 'noto_sans_jp' === $site_title_font_family ) {
		$site_title_font = $noto_sans;
	} elseif ( 'noto_serif_jp' === $site_title_font_family ) {
		$site_title_font = $noto_serif;
	}

	if ( 'sans-serif' === $site_tagline_font_family ) {
		$site_tagline_font = $sans;
	} elseif ( 'serif' === $site_tagline_font_family ) {
		$site_tagline_font = $serif;
	} elseif ( 'noto_sans_jp' === $site_tagline_font_family ) {
		$site_tagline_font = $noto_sans;
	} elseif ( 'noto_serif_jp' === $site_tagline_font_family ) {
		$site_tagline_font = $noto_serif;
	}

	if ( 'sans-serif' === $global_nav_font_family ) {
		$global_nav_font = $sans;
	} elseif ( 'serif' === $global_nav_font_family ) {
		$global_nav_font = $serif;
	} elseif ( 'noto_sans_jp' === $global_nav_font_family ) {
		$global_nav_font = $noto_sans;
	} elseif ( 'noto_serif_jp' === $global_nav_font_family ) {
		$global_nav_font = $noto_serif;
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

	if ( 'sans-serif' === $main_visual_title_font_family ) {
		$main_visual_title_font = $sans;
	} elseif ( 'serif' === $main_visual_title_font_family ) {
		$main_visual_title_font = $serif;
	} elseif ( 'noto_sans_jp' === $main_visual_title_font_family ) {
		$main_visual_title_font = $noto_sans;
	} elseif ( 'noto_serif_jp' === $main_visual_title_font_family ) {
		$main_visual_title_font = $noto_serif;
	}

	if ( 'sans-serif' === $main_visual_sub_title_font_family ) {
		$main_visual_sub_title_font = $sans;
	} elseif ( 'serif' === $main_visual_sub_title_font_family ) {
		$main_visual_sub_title_font = $serif;
	} elseif ( 'noto_sans_jp' === $main_visual_sub_title_font_family ) {
		$main_visual_sub_title_font = $noto_sans;
	} elseif ( 'noto_serif_jp' === $main_visual_sub_title_font_family ) {
		$main_visual_sub_title_font = $noto_serif;
	}

	if ( 'sans-serif' === $main_visual_message_font_family ) {
		$main_visual_message_font = $sans;
	} elseif ( 'serif' === $main_visual_message_font_family ) {
		$main_visual_message_font = $serif;
	} elseif ( 'noto_sans_jp' === $main_visual_message_font_family ) {
		$main_visual_message_font = $noto_sans;
	} elseif ( 'noto_serif_jp' === $main_visual_message_font_family ) {
		$main_visual_message_font = $noto_serif;
	}

	if ( 'sans-serif' === $footer_nav_font_family) {
		$footer_nav_font = $sans;
	} elseif ( 'serif' === $footer_nav_font_family ) {
		$footer_nav_font = $serif;
	} elseif ( 'noto_sans_jp' === $footer_nav_font_family ) {
		$footer_nav_font = $noto_sans;
	} elseif ( 'noto_serif_jp' === $footer_nav_font_family ) {
		$footer_nav_font = $noto_serif;
	}

	/*---font weight--*/
	$site_title_weight            = get_theme_mod( 'header_site_title_font_weight', 'bold' );
	$site_tagline_weight          = get_theme_mod( 'header_site_tagline_font_weight', 'normal' );
	$main_visual_title_weight     = get_theme_mod( 'main_visual_title_font_weight', 'bold' );
	$main_visual_sub_title_weight = get_theme_mod( 'main_visual_sub_title_font_weight', 'normal' );
	$main_visual_message_weight   = get_theme_mod( 'main_visual_message_font_weight', 'normal' );
	$h1_weight                    = get_theme_mod( 'h1_font_weight', 'bold' );
	$h2_weight                    = get_theme_mod( 'h2_font_weight', 'bold' );
	$h3_weight                    = get_theme_mod( 'h3_font_weight', 'bold' );
	$h4_weight                    = get_theme_mod( 'h4_font_weight', 'bold' );
	$h5_weight                    = get_theme_mod( 'h5_font_weight', 'bold' );
	$h6_weight                    = get_theme_mod( 'h6_font_weight', 'bold' );
	$title_weight                 = get_theme_mod( 'title_font_weight ', 'bold' );
	$sub_title_weight             = get_theme_mod( 'sub_title_font_weight', 'normal' );

	$theme_css = '
		/* font-family */
		body {
			font-family: ' . $site_body_font . ';
		}
		.site-title a {
			font-family: ' . $site_title_font . ';
			font-weight: ' . $site_title_weight . ';
		}
		.site-description {
			font-family: ' . $site_tagline_font . ';
			font-weight: ' . $site_tagline_weight . ';
		}
		.main-visual__title {
			font-family: ' . $main_visual_title_font . ';
			font-weight: ' . $main_visual_title_weight . ';
		}
		.main-visual__sub-title {
			font-family: ' . $main_visual_sub_title_font . ';
			font-weight: ' . $main_visual_sub_title_weight . ';
		}
		.main-visual__message{
			font-family: ' . $main_visual_message_font . ';
			font-weight: ' . $main_visual_message_weight . ';
		}
		h1 {
			font-family: ' . $h1_font . ';
			font-weight: ' . $h1_weight . ';
		}
		.article-title__sub,
		.archive-title__sub {
			font-family: ' . $h1_font . ';
		}
		h2:not(.main-visual__title ) {
			font-family: ' . $h2_font . ';
			font-weight: ' . $h2_weight . ';
		}
		h3 {
			font-family: ' . $h3_font . ';
			font-weight: ' . $h3_weight . ';
		}
		h4 {
			font-family: ' . $h4_font . ';
			font-weight: ' . $h4_weight . ';
		}
		h5 {
			font-family: ' . $h5_font . ';
			font-weight: ' . $h5_weight . ';
		}
		h6 {
			font-family: ' . $h6_font . ';
			font-weight: ' . $h6_weight . ';
		}
		.header-menu {
			font-family: ' . $global_nav_font . ';
		}
		.footer-menu {
			font-family: ' . $footer_nav_font. ';
		}
';

	return apply_filters( 'emanon_style_font_family', emanon_css_minify( $theme_css ) );
}