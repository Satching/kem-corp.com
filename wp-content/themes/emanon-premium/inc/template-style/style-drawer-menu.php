<?php
/**
 * Template style drawer menu
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

function emanon_style_drawer_menu() {

	$hamburger_sp          = get_theme_mod( 'display_hamburger_menu_sp' );
	$hamburger_pc          = get_theme_mod( 'display_hamburger_menu_pc' );
	$floating_hamburger_sp = get_theme_mod( 'display_floating_hamburger_menu_sp' );
	if ( ! $hamburger_sp && is_mobile() || ! $floating_hamburger_sp && is_mobile() || ! $hamburger_pc && ! is_mobile() ) {
		return;
	}

	$menu_parent_list_design = get_theme_mod( 'drawer_menu_parent_list_design', 'disc' );

	if ( 'disc' === $menu_parent_list_design ) {
		$menu_parent_list_css = '
		.drawer-menu nav .menu-item {
			padding-left: 16px;
		}
		.drawer-menu .menu > .menu-item a::before {
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
	} elseif ( 'arrow' === $menu_parent_list_design  ) {
		$menu_parent_list_css = '
		.drawer-menu nav .menu-item {
			padding-left: 16px;
		}
		.drawer-menu .menu > .menu-item a::before {
			position: absolute;
			content: "\e941";
			left: -16px;
			line-height: 40px;
			font-family: "icomoon";
			font-size: 0.8rem;
			color: #b8bcc0;
			font-weight: bold;
		}
		';
	} elseif ( 'arrow-circle' === $menu_parent_list_design  ) {
		$menu_parent_list_css = '
		.drawer-menu nav .menu-item {
			padding-left: 22px;
		}
		.drawer-menu .menu > .menu-item a::before {
			position: absolute;
			content: "\e92b";
			left: -22px;
			line-height: 40px;
			font-family: "icomoon";
			font-size: 0.8rem;
			color: #b8bcc0;
		}
		';
	} elseif ( 'none' === $menu_parent_list_design  ) {
		$menu_parent_list_css = '';
	}

	$menu_children_list_design = get_theme_mod( 'drawer_menu_children_list_design', 'disc' );

	if ( 'disc' === $menu_children_list_design ) {
		$menu_children_list_css = '
		.drawer-menu nav .sub-menu > .menu-item {
			padding-left: 16px;
		}
		.drawer-menu nav .sub-menu > .menu-item a::before {
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
	} elseif ( 'arrow' === $menu_children_list_design ) {
		$menu_children_list_css = '
		.drawer-menu nav .sub-menu > .menu-item {
			padding-left: 12px;
		}
		.drawer-menu nav .sub-menu > .menu-item a::before {
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
	} elseif ( 'arrow-circle' === $menu_children_list_design ) {
		$menu_children_list_css = '
		.drawer-menu nav .sub-menu > .menu-item {
			padding-left: 20px;
		}
		.drawer-menu nav .sub-menu > .menu-item a::before {
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
	} elseif ( 'ruled-line' === $menu_children_list_design ) {
		$menu_children_list_css = '
		.drawer-menu nav .sub-menu > .menu-item {
			padding-left: 12px;
		}
		.drawer-menu nav .sub-menu > .menu-item a::before {
			position: absolute;
			content: "┗";
			top: 0;
			width: 0;
			height: 0;
			transform: translateY(0);
			left: -17px;
			line-height: 32px;
			font-size: 0.8rem;
			color: #b8bcc0;
		}
		';
	} elseif ( 'none' === $menu_children_list_design ) {
		$menu_children_list_css = '
		.drawer-menu nav .sub-menu > .menu-item {
			padding-left: 16px;
		}
		.drawer-menu nav .sub-menu > .menu-item a::before {
			content: "";
			top: 0;
			width: 0;
			height: 0;
			transform: translateY(0);
		}
		';
	}

	$theme_css = $menu_parent_list_css . $menu_children_list_css;

	return apply_filters( 'emanon_style_drawer_menu',  emanon_css_minify( $theme_css ) );
}