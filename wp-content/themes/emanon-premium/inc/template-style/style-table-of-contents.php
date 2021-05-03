<?php
/**
 * Template style table of contents
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

function emanon_style_toc() {
	$toc_post = get_theme_mod( 'display_toc_post' );
	$toc_page = get_theme_mod( 'display_toc_page' );

	if ( ! $toc_post && is_singular( 'post' ) || ! $toc_page && is_singular( 'page' ) 
	|| is_front_page() 
	|| is_page_template('templates/page-author-two-row.php') 
	|| is_page_template('templates/page-author-three-row.php') 
	|| is_home() 
	|| is_archive() 
	|| is_404() ) {
		return;
	}

	$primary_color    = get_theme_mod( 'primary_color', emanon_primary_color() );
	$secondary_color  = get_theme_mod( 'secondary_color', emanon_secondary_color() );
	$link_color       = get_theme_mod( 'link_color', emanon_link_color() );
	$link_hover_color = get_theme_mod( 'link_hover_color', emanon_link_hover_color() );

	$toc_css = '
	.article-body .contents-outline__item a:hover {
		color: ' . $link_hover_color . ';
	}
	.article-body .contents-outline__item a::after {
		background-color: ' . $link_hover_color . ';
	}
	';

	$parent_list_design   = get_theme_mod( 'toc_parent_list_design', 'decimal' );

	if ( 'decimal' === $parent_list_design ) {
		$parent_list_css = '
		.indent_2.contents-outline__ol {
			list-style-type: decimal;
		}
		.widget_toc .contents-outline__ol {
			padding-left: 16px;
		}
		';
	} elseif ( 'decimal-zero' === $parent_list_design ) {
		$parent_list_css = '
		.indent_2.contents-outline__ol {
			list-style-type: decimal-leading-zero;
		}
		.widget_toc .contents-outline__ol {
			padding-left: 26px;
		}
		';
	} elseif ( 'disc' === $parent_list_design ) {
		$parent_list_css = '
		.indent_2.contents-outline__ol {
			list-style-type: disc;
		}
		.widget_toc .contents-outline__ol {
			padding-left: 16px;
		}
		';
	} elseif ( 'circle' === $parent_list_design ) {
		$parent_list_css = '
		.indent_2.contents-outline__ol {
			list-style-type: circle;
		}
		.widget_toc .contents-outline__ol {
			padding-left: 16px;
		}
		';
	} elseif ( 'checkmark' === $parent_list_design ) {
		$parent_list_css = '
		.indent_2.contents-outline__ol > .contents-outline__item {
			position: relative;
			list-style-type: none;
		}
		.indent_2.contents-outline__ol > .contents-outline__item::before {
			position: absolute;
			content: "\ea10";
			top: 3px;
			left: -18px;
			font-family: "icomoon";
			font-size: 0.8rem;
		}
		.widget_toc .contents-outline__ol {
			padding-left: 16px;
		}
		';
	} elseif ( 'arrow' === $parent_list_design ) {
		$parent_list_css = '
		.indent_2.contents-outline__ol > .contents-outline__item {
			position: relative;
			list-style-type: none;
		}
		.indent_2.contents-outline__ol > .contents-outline__item::before {
			position: absolute;
			content: "\e941";
			top: 3px;
			left: -16px;
			font-family: "icomoon";
			font-size: 0.88889rem;
			font-weight: bold;
		}
		.widget_toc .contents-outline__ol {
			padding-left: 12px;
		}
		';
	} elseif ( 'arrow-circle' === $parent_list_design ) {
		$parent_list_css = '
		.indent_2.contents-outline__ol > .contents-outline__item {
			position: relative;
			list-style-type: none;
		}
		.indent_2.contents-outline__ol > .contents-outline__item::before {
			position: absolute;
			content: "\e92b";
			top: 3px;
			left: -18px;
			font-family: "icomoon";
			font-size: 0.88889rem;
			font-weight: bold;
		}
		.widget_toc .contents-outline__ol {
			padding-left: 16px;
		}
		';
	} elseif ( 'none' === $parent_list_design ) {
		$parent_list_css = '
		.indent_2.contents-outline__ol {
			padding-left: 0;
			list-style-type: none;
		}
		';
	}

	$children_list_design = get_theme_mod( 'toc_children_list_design', 'decimal' );

	if ( 'decimal' === $children_list_design ) {
		$children_list_css = '
		.indent_3.contents-outline__ol > .contents-outline__item {
			list-style-type: decimal;
		}
		';
	} elseif ( 'decimal-zero' === $children_list_design ) {
		$children_list_css = '
		.indent_3.contents-outline__ol > .contents-outline__item {
			list-style-type: decimal-leading-zero;
		}
		';
	} elseif ( 'disc' === $children_list_design ) {
		$children_list_css = '
		.indent_3.contents-outline__ol > .contents-outline__item {
			list-style-type: disc;
		}
		';
	} elseif ( 'circle' === $children_list_design ) {
		$children_list_css = '
		.indent_3.contents-outline__ol > .contents-outline__item {
			list-style-type: circle;
		}
		';
	} elseif ( 'checkmark' === $children_list_design ) {
		$children_list_css = '
		.indent_3.contents-outline__ol > .contents-outline__item::before {
			position: absolute;
			content: "\ea10";
			left: -18px;
			font-family: "icomoon";
			line-height: 28px;
			font-size: 0.8rem;
		}
		';
	} elseif ( 'arrow' === $children_list_design ) {
		$children_list_css = '
		.indent_3.contents-outline__ol > .contents-outline__item::before {
			position: absolute;
			content: "\e941";
			left: -20px;
			line-height: 28px;
			font-family: "icomoon";
			font-size: 0.88889rem;
			font-weight: bold;
		}
		';
		} elseif ( 'arrow-circle' === $children_list_design ) {
		$children_list_css = '
		.indent_3.contents-outline__ol > .contents-outline__item::before {
			position: absolute;
			content: "\e92b";
			left: -18px;
			line-height: 28px;
			font-family: "icomoon";
			font-size: 0.8rem;
			font-weight: bold;
		}
		';
	} elseif ( 'none' === $children_list_design ) {
		$children_list_css = '
		.indent_3.contents-outline__ol {
			list-style: none
		}
		';
	}

	$list_item_color = get_theme_mod( 'toc_list_item_color', 'primary-color' );
	if ( 'primary-color' === $list_item_color ) {
		$list_item_color_css = '
		.article-body .contents-outline__item {
			color: ' . $primary_color . ';
		}
		';
	} elseif ( 'secondary-color' === $list_item_color ) {
		$list_item_color_css = '
		.article-body .contents-outline__item {
			color: ' . $secondary_color . ';
		}
		';
	} elseif ( 'text-color' === $list_item_color) {
		$list_item_color_css = '
		.article-body .contents-outline__item {
			color: #333333;
		}
		';
	}

	$list_item_link_color = get_theme_mod( 'toc_list_item_link_color', 'link-color' );
	if ( 'link-color' === $list_item_link_color ) {
		$list_item_link_color_css = '
		.article-body .contents-outline__item a {
			color: ' . $link_color . ';
		}
		';
	} elseif ( 'primary-color' === $list_item_link_color ) {
		$list_item_link_color_css = '
		.article-body .contents-outline__item a {
			color: ' . $primary_color . ';
		}
		';
	} elseif ( 'secondary-color' === $list_item_link_color ) {
		$list_item_link_color_css = '
		.article-body .contents-outline__item a {
			color: ' . $secondary_color . ';
		}
		';
	} elseif ( 'text-color' === $list_item_link_color ) {
		$list_item_link_color_css = '
		.article-body .contents-outline__item a {
			color: #333333;
		}
		';
	}

	$border_style_design = get_theme_mod( 'toc_border_style_design', 'border' );
	if ( 'border' === $border_style_design ) {
		$border_style_css = '
		.toc-box {
			border: 2px solid #eeeff0;
			border-radius: 3px;
		}
		';
	} elseif ( 'border-primary-color' === $border_style_design ) {
		$border_style_css = '
		.toc-box {
			border: 2px solid  ' . $primary_color . ';
			border-radius: 3px;
		}
		';
	} elseif ( 'border-secondary-color' === $border_style_design ) {
		$border_style_css = '
		.toc-box {
			border: 2px solid  ' . $secondary_color . ';
			border-radius: 3px;
		}
		';
	} elseif ( 'border-top-primary-color' === $border_style_design ) {
		$border_style_css = '
		.toc-box {
			border: 2px solid #eeeff0;
			border-top: 4px solid  ' . $primary_color . ';
			border-radius: 3px;
		}
		';
	} elseif ( 'border-top-secondary-color' === $border_style_design ) {
		$border_style_css = '
		.toc-box {
			border: 2px solid #eeeff0;
			border-top: 4px solid  ' . $secondary_color . ';
			border-radius: 3px;
		}
		';
	} elseif ( 'none' === $border_style_design ) {
		$border_style_css = '
		.toc-box {
			border: none;
		}
		';
	}

	$background_style_design = get_theme_mod( 'toc_background_style_design', 'none' );
	if ( 'none' === $background_style_design ) {
		$background_style_css = '';
	} elseif ( 'background-white-color' === $background_style_design ) {
		$background_style_css = '
		.toc-box {
			background-color: #ffffff;
			border-radius: 3px;
		}
		';
	} elseif ( 'background-gray-color' === $background_style_design ) {
		$background_style_css = '
		.toc-box {
			background-color: #eeeff0;
			border-radius: 3px;
		}
		';
	}

	$toggle_switch_color = get_theme_mod( 'toc_toggle_switch_color', 'primary-color' );
	if ( 'primary-color' === $toggle_switch_color ) {
		$toggle_switch_color_css = '
		.toc-btn__switch.selected label {
			border-color: ' . $primary_color . ';
		}
		.toc-btn__switch.selected {
			background-color: ' . $primary_color . ';
		}
		';
	} elseif ( 'secondary-color' === $toggle_switch_color ) {
		$toggle_switch_color_css = '
		.toc-btn__switch.selected label {
			border-color: ' . $secondary_color . ';
		}
		.toc-btn__switch.selected {
			background-color: ' . $secondary_color . ';
		}
		';
	}

	$theme_css = $toc_css . $parent_list_css . $children_list_css . $list_item_color_css . $list_item_link_color_css . $border_style_css . $background_style_css . $toggle_switch_color_css;

	return apply_filters( 'emanon_style_toc', emanon_css_minify( $theme_css ) );
}