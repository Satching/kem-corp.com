<?php
/**
 * Template style cta floating
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

function emanon_style_cta_floating() {

	$cta_square = '
	.cta-floating {
		position: fixed;
		transition: 0.3s cubic-bezier(0.13,0.61,0.26,0.94);
		z-index: 201;
	}
	.cta-square {
		left: 16px;
		right: 16px;
		bottom: 16px;
		width: calc(100% - 32px);
		transform: translateX(calc(100% + 32px));
	}
	';

	if ( has_nav_menu( 'fixed-footer-menu' ) ) {
		$cta_rectangle = '
		@media screen and ( max-width: 767px ) {
		#cta-floating-show.cta-rectangle,
		.cta-rectangle.is-show {
			padding-bottom: calc(env(safe-area-inset-bottom) * 0.5);
		}
		}
		';
	} else {
		$cta_rectangle = '
		@media screen and ( max-width: 767px ) {
		#cta-floating-show.cta-rectangle,
		.cta-rectangle.is-show .cta-floating__body {
			padding-bottom: calc(env(safe-area-inset-bottom) * 1.2);
		}
		}
		';
	}

	$theme_css = $cta_square . $cta_rectangle;

	return apply_filters( 'emanon_style_cta_floating', emanon_css_minify( $theme_css ) );
}