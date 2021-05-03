<?php
/**
 * Theme dashboard
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

/**
 * Emanon Settings
 */
add_action(
	'admin_menu',
	function () {
		add_menu_page( __( 'Emanon設定', 'emanon-premium' ), __( 'Emanon設定', 'emanon-premium' ), 'manage_options', 'emanon_setting_page', 'emanon_setting_options', '' , 60 );
		add_submenu_page( 'emanon_setting_page', __( 'Emanon設定', 'emanon-premium' ), __( 'Emanon設定', 'emanon-premium' ), 'manage_options', 'emanon_setting_options', 'emanon_setting_options' );
		add_submenu_page( 'emanon_setting_page', __( 'Google AdSense設定', 'emanon-premium' ), __( 'Google AdSense設定', 'emanon-premium' ), 'manage_options', 'emanon_setting_ad_option_page', 'emanon_ad_setting_options' );
		add_submenu_page( 'emanon_setting_page', __( '広告コード追加', 'emanon-premium' ), __( '広告コード追加', 'emanon-premium' ), 'manage_options', 'post-new.php?post_type=emanon-ad', '' );
		add_submenu_page( 'emanon_setting_page', __( 'CTA表示設定', 'emanon-premium' ), __( 'CTA表示設定', 'emanon-premium' ), 'manage_options', 'emanon_setting_cta_option_page', 'emanon_cta_setting_options' );
		add_submenu_page( 'emanon_setting_page', __( 'CTA［ページ］追加', 'emanon-premium' ), __( 'CTA［ページ］追加', 'emanon-premium' ), 'manage_options', 'post-new.php?post_type=emanon-cta', '' );
		add_submenu_page( 'emanon_setting_page', __( 'CTA［追従型］追加', 'emanon-premium' ), __( 'CTA［追従型］追加', 'emanon-premium' ), 'manage_options', 'post-new.php?post_type=emanon-floating', '' );
		add_submenu_page( 'emanon_setting_page', __( 'CTA［メルマガ］追加', 'emanon-premium' ), __( 'CTA［メルマガ］追加', 'emanon-premium' ), 'manage_options', 'post-new.php?post_type=emanon-news-letter', '' );
		add_submenu_page( 'emanon_setting_page', __( 'アイコン一覧', 'emanon-premium' ), __( 'アイコン一覧', 'emanon-premium' ), 'manage_options', 'emanon_icon_list_page', 'emanon_icon_list' );
		add_submenu_page( 'emanon_setting_page', __( 'リセット', 'emanon-premium' ), __( 'リセット', 'emanon-premium' ), 'manage_options', 'emanon_cash_clear_page', 'emanon_cash_clear' );
	}
);

/**
 * Add Emanon Setting Page
 */
function emanon_setting_options() {
	require_once ( T_DIRE . '/inc/dashboard-menu/emanon-setting.php' );
}

/**
 * Add AD Setting Page
 */
function emanon_ad_setting_options() {
	require_once ( T_DIRE . '/inc/dashboard-menu/ad-setting.php' );
}

/**
 * AD Custom Post
 *
 * List of AD Code | Add New AD Code Page
 */
require_once ( T_DIRE . '/inc/dashboard-menu/ad-setting/ad-custom-post.php' );

/**
 * CTA Setting Page
 */
function emanon_cta_setting_options() {
	require_once ( T_DIRE . '/inc/dashboard-menu/cta-setting.php' );
}

/**
 * CTA Custom Post
 *
 * List of CTA | Add CTA
 */
require_once ( T_DIRE . '/inc/dashboard-menu/cta-setting/cta-custom-post.php' );

/**
 * CTA  Custom Post [Floating]
 *
 * List of CTA [Floating] | Add CTA [Floating]
 */
require_once ( T_DIRE . '/inc/dashboard-menu/cta-setting/cta-custom-post-floating.php' );

/**
 * CTA  Custom Post [News Letter]
 *
 * List of CTA [News Letter] | Add CTA [News Letter]
 */
require_once ( T_DIRE . '/inc/dashboard-menu/cta-setting/cta-custom-post-newsletter.php' );

/**
 * Add Icon Setting Page
 */
function emanon_icon_list() {
	require_once ( T_DIRE . '/inc/dashboard-menu/icon-setting.php' );
}

function emanon_cash_clear() {
	require_once ( T_DIRE . '/inc/dashboard-menu/cash-clear-setting.php' );
}

/**
 * Submenu order
 *
 * 4 Emanon Settings
 * 5 Google AdSense Settings
 * 0 List of Affileate Code
 * 6 Add Affiliate Code
 * 7 CTA Settings
 * 1 List of CTA
 * 8 Add CTA
 * 2 List of CTA [Floating]
 * 9 Add CTA [Floating]
 * 3 List of CTA [News Letter]
 * 10 Add CTA [News Letter]
 */
add_filter(
	'custom_menu_order',
	function ( $menu_ord ) {
		global $submenu;

		if (isset($submenu['emanon_setting_page'])) {
				$menu_old = $submenu['emanon_setting_page'];
				$menu_new = array();
				$menu_new[] = $menu_old[4];
				$menu_new[] = $menu_old[5];
				$menu_new[] = $menu_old[0];
				$menu_new[] = $menu_old[6];
				$menu_new[] = $menu_old[7];
				$menu_new[] = $menu_old[1];
				$menu_new[] = $menu_old[8];
				$menu_new[] = $menu_old[2];
				$menu_new[] = $menu_old[9];
				$menu_new[] = $menu_old[3];
				$menu_new[] = $menu_old[10];
				$menu_new[] = $menu_old[11];
				$menu_new[] = $menu_old[12];
				$submenu['emanon_setting_page'] = $menu_new;
		}

		return $menu_ord;
	}
);
