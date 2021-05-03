<?php
/**
 * Template style widget
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

function emanon_style_widget() {

	$category_parent_list_design = get_theme_mod( 'category_parent_list_design', 'disc' );

	if ( 'disc' === $category_parent_list_design ) {
		$category_parent_list_css = '
		.widget_categories .cat-item {
			padding-left: 16px;
		}
		.widget_categories ul > .cat-item a::before {
			display: block;
			content: "";
			position: absolute;
			top: 50%;
			left: -12px;
			width: 4px;
			height: 4px;
			transform: translateY(-50%);
			background-color: #b8bcc0;
			border-radius: 100%;
			font-weight: bold;
		}
		';
	} elseif ( 'arrow' === $category_parent_list_design ) {
		$category_parent_list_css = '
		.widget_categories .cat-item {
			padding-left: 16px;
		}
		.widget_categories ul > .cat-item a::before {
			position: absolute;
			content: "\e941";
			left: -16px;
			line-height: 32px;
			font-family: "icomoon";
			font-size: 0.8rem;
			color: #b8bcc0;
			font-weight: bold;
		}
		';
	} elseif ( 'arrow-circle' === $category_parent_list_design ) {
		$category_parent_list_css = '
		.widget_categories .cat-item {
			padding-left: 22px;
		}
		.widget_categories ul > .cat-item a::before {
			position: absolute;
			content: "\e92b";
			left: -22px;
			line-height: 32px;
			font-family: "icomoon";
			font-size: 0.8rem;
			color: #b8bcc0;
		}
		';
	} elseif ( 'none' === $category_parent_list_design ) {
		$category_parent_list_css = '';
	}

	$category_children_list_design = get_theme_mod( 'category_children_list_design', 'disc' );

	if ( 'disc' === $category_children_list_design ) {
		$category_children_list_css = '
		.widget_categories .children > .cat-item {
			padding-left: 16px;
		}
		.widget_categories ul .children > .cat-item a::before {
			display: block;
			content: "";
			position: absolute;
			top: 50%;
			left: -16px;
			width: 4px;
			height: 4px;
			transform: translateY(-50%);
			background-color: #b8bcc0;
			border-radius: 100%;
			font-weight: bold;
		}
		';
	} elseif ( 'arrow' === $category_children_list_design ) {
		$category_children_list_css = '
		.widget_categories .children > .cat-item {
			padding-left: 16px;
		}
		.widget_categories ul .children > .cat-item a::before {
			position: absolute;
			content: "\e941";
			top: 0;
			left: -16px;
			line-height: 32px;
			width: 0;
			height: 0;
			transform: translateY(0);
			font-family: "icomoon";
			font-size: 0.8rem;
			color: #b8bcc0;
			font-weight: bold;
		}
		';
	} elseif ( 'arrow-circle' === $category_children_list_design ) {
		$category_children_list_css = '
		.widget_categories ul .children > .cat-item {
			padding-left: 20px;
		}
		.widget_categories ul .children > .cat-item a::before {
			position: absolute;
			content: "\e92b";
			top: 0;
			left: -20px;
			width: 0;
			height: 0;
			transform: translateY(0);
			line-height: 32px;
			font-family: "icomoon";
			font-size: 0.8rem;
			color: #b8bcc0;
		}
		';
	} elseif ( 'ruled-line' === $category_children_list_design ) {
		$category_children_list_css = '
		.widget_categories ul .children > .cat-item {
			padding-left: 8px;
		}
		.widget_categories ul .children > .cat-item a::before {
			position: absolute;
			content: "┗";
			top: 0;
			width: 0;
			height: 0;
			transform: translateY(0);
			left: -16px;
			line-height: 32px;
			font-size: 0.8rem;
			color: #b8bcc0;
		}
		';
	} elseif ( 'none' === $category_children_list_design ) {
		$category_children_list_css = '
		.widget_categories ul .children > .cat-item {
			padding-left: 16px;
		}
		.widget_categories ul .children > .cat-item a::before {
			content: "";
			top: 0;
			width: 0;
			height: 0;
			transform: translateY(0);
		}
		';
	}

	$category_post_counts_style = get_theme_mod( 'category_post_counts_style', 'square' );
	
if ( 'square' === $category_post_counts_style ) {
		$category_post_counts_style_css = '
		.widget_categories .cat-item a .count {
			border-radius: 3px;
		}
		';
	} elseif ( 'circle' === $category_post_counts_style ) {
		$category_post_counts_style_css = '
		.widget_categories .cat-item a .count {
			border-radius: 50%;
		}
		';
	}

	$archive_list_design = get_theme_mod( 'archive_list_design', 'disc' );

	if ( 'disc' === $archive_list_design ) {
		$archive_list_css = '
		.widget_archive li {
			padding-left: 16px;
		}
		.widget_archive ul > li a::before {
			display: block;
			content: "";
			position: absolute;
			top: 50%;
			left: -12px;
			width: 4px;
			height: 4px;
			transform: translateY(-50%);
			background-color: #b8bcc0;
			border-radius: 100%;
			font-weight: bold;
		}
		';
	} elseif ( 'arrow' === $archive_list_design ) {
		$archive_list_css = '
		.widget_archive li {
			padding-left: 16px;
		}
		.widget_archive ul > li a::before {
			position: absolute;
			content: "\e941";
			left: -16px;
			line-height: 32px;
			font-family: "icomoon";
			font-size: 0.8rem;
			color: #b8bcc0;
			font-weight: bold;
		}
		';
	} elseif ( 'arrow-circle' === $archive_list_design ) {
		$archive_list_css = '
		.widget_archive li {
			padding-left: 22px;
		}
		.widget_archive ul > li a::before {
			position: absolute;
			content: "\e92b";
			left: -22px;
			line-height: 32px;
			font-family: "icomoon";
			font-size: 0.8rem;
			color: #b8bcc0;
		}
		';
	} elseif ( 'none' === $archive_list_design ) {
		$archive_list_css = '';
	}

	$archive_post_counts_style = get_theme_mod( 'archive_post_counts_style', 'square' );
	
if ( 'square' === $archive_post_counts_style ) {
		$archive_post_counts_style_css = '
		.widget_archive li a .count {
			border-radius: 3px;
		}
		';
	} elseif ( 'circle' === $archive_post_counts_style ) {
		$archive_post_counts_style_css = '
		.widget_archive li a .count {
			border-radius: 50%;
		}
		';
	}

	$navigation_menu_parent_list_design = get_theme_mod( 'navigation_menu_parent_list_design', 'disc' );

	if ( 'disc' === $navigation_menu_parent_list_design ) {
		$navigation_menu_parent_list_css = '
		.widget_nav_menu .menu-item {
			padding-left: 16px;
		}
		.widget_nav_menu .menu > .menu-item a::before {
			display: block;
			content: "";
			position: absolute;
			top: 50%;
			left: -12px;
			width: 4px;
			height: 4px;
			transform: translateY(-50%);
			background-color: #b8bcc0;
			border-radius: 100%;
			font-weight: bold;
		}
		';
	} elseif ( 'arrow' === $navigation_menu_parent_list_design ) {
		$navigation_menu_parent_list_css = '
		.widget_nav_menu .menu-item {
			padding-left: 16px;
		}
		.widget_nav_menu .menu > .menu-item a::before {
			position: absolute;
			content: "\e941";
			left: -16px;
			line-height: 32px;
			font-family: "icomoon";
			font-size: 0.8rem;
			color: #b8bcc0;
			font-weight: bold;
		}
		';
	} elseif ( 'arrow-circle' === $navigation_menu_parent_list_design ) {
		$navigation_menu_parent_list_css = '
		.widget_nav_menu .menu-item {
			padding-left: 22px;
		}
		.widget_nav_menu .menu > .menu-item a::before {
			position: absolute;
			content: "\e92b";
			left: -22px;
			line-height: 32px;
			font-family: "icomoon";
			font-size: 0.8rem;
			color: #b8bcc0;
		}
		';
	} elseif ( 'none' === $navigation_menu_parent_list_design ) {
		$navigation_menu_parent_list_css = '';
	}

	$navigation_menu_children_list_design = get_theme_mod( 'navigation_menu_children_list_design', 'disc' );

	if ( 'disc' === $navigation_menu_children_list_design ) {
		$navigation_menu_children_list_css = '
		.widget_nav_menu .sub-menu > .menu-item {
			padding-left: 16px;
		}
		.widget_nav_menu .sub-menu > .menu-item a::before {
			display: block;
			content: "";
			position: absolute;
			top: 50%;
			left: -16px;
			width: 4px;
			height: 4px;
			transform: translateY(-50%);
			background-color: #b8bcc0;
			border-radius: 100%;
			font-weight: bold;
		}
		';
	} elseif ( 'arrow' === $navigation_menu_children_list_design ) {
		$navigation_menu_children_list_css = '
		.widget_nav_menu .sub-menu > .menu-item {
			padding-left: 12px;
		}
		.widget_nav_menu .sub-menu > .menu-item a::before {
			position: absolute;
			content: "\e941";
			top: 0;
			left: -16px;
			line-height: 32px;
			width: 0;
			height: 0;
			transform: translateY(0);
			font-family: "icomoon";
			font-size: 0.8rem;
			color: #b8bcc0;
			font-weight: bold;
		}
		';
	} elseif ( 'arrow-circle' === $navigation_menu_children_list_design ) {
		$navigation_menu_children_list_css = '
		.widget_nav_menu .sub-menu > .menu-item {
			padding-left: 20px;
		}
		.widget_nav_menu .sub-menu > .menu-item a::before {
			position: absolute;
			content: "\e92b";
			top: 0;
			left: -20px;
			width: 0;
			height: 0;
			transform: translateY(0);
			line-height: 32px;
			font-family: "icomoon";
			font-size: 0.8rem;
			color: #b8bcc0;
		}
		';
	} elseif ( 'ruled-line' === $navigation_menu_children_list_design ) {
		$navigation_menu_children_list_css = '
		.widget_nav_menu .sub-menu > .menu-item {
			padding-left: 8px;
		}
		.widget_nav_menu .sub-menu > .menu-item a::before {
			position: absolute;
			content: "┗";
			top: 0;
			width: 0;
			height: 0;
			transform: translateY(0);
			left: -16px;
			line-height: 32px;
			font-size: 0.8rem;
			color: #b8bcc0;
		}
		';
	} elseif ( 'none' === $navigation_menu_children_list_design ) {
		$navigation_menu_children_list_css = '
		.widget_nav_menu .sub-menu > .menu-item {
			padding-left: 16px;
		}
		.widget_nav_menu .sub-menu > .menu-item a::before {
			content: "";
			top: 0;
			width: 0;
			height: 0;
			transform: translateY(0);
		}
		';
	}

	$section_sub_title_design = get_theme_mod( 'section_sub_title_design', 'above-title' );
	if ( 'above-title' === $section_sub_title_design ) {
		$section_sub_title_design_css = '
		.c-section-widget__header .c-section-widget__sub-title {
			position: absolute;
			top: -6px;
			left: 0;
			right: 0;
		}
		@media screen and ( min-width: 768px ) {
		.c-section-widget__header .c-section-widget__sub-title {
			top: 0;
		}
		}
		.c-section-widget__title {
			padding-top: 32px;
		}
		';
	} else {
		$section_sub_title_design_css = '';
	}

	$theme_css = $category_parent_list_css . $category_children_list_css . $category_post_counts_style_css . $archive_list_css . $archive_post_counts_style_css . $navigation_menu_parent_list_css . $navigation_menu_children_list_css . $section_sub_title_design_css;

	return apply_filters( 'emanon_style_widget', emanon_css_minify( $theme_css ) );
}