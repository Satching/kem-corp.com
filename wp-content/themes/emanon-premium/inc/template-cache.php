<?php
/**
 * テンプレート用キャッシュ削除
 *
 * @since 1.0.0
 * @package Emanon Premium
 */
 
/**
 * キャッシュ削除［All］テーマ変更時
 *
 * @since 1.0.0
 * @package Emanon Premium
 */
if ( ! function_exists( 'emanon_delete_transients_all' ) ) {
function emanon_delete_transients_all() {
		delete_transient( 'firstview_pc' );
		delete_transient( 'firstview_sp' );
		delete_transient( 'header_pc' );
		delete_transient( 'header_sp' );
		delete_transient( 'footer_widget_upper_pc' );
		delete_transient( 'footer_widget_upper_sp' );
		delete_transient( 'footer_widget_pc' );
		delete_transient( 'footer_widget_sp' );
		delete_transient( 'footer_menu' );
		delete_transient( 'footer_copyright' );
	}
	add_action( 'after_setup_theme', 'emanon_delete_transients_all' );
}

/**
 * キャッシュ削除［ファーストビュー］
 *
 * @since 1.0.0
 * @package Emanon Premium
 */
if ( ! function_exists( 'emanon_delete_transients_first_view' ) ) {
function emanon_delete_transients_first_view() {
		delete_transient( 'firstview_pc' );
		delete_transient( 'firstview_sp' );
		// 管理画面 Emanon設定 キャッシュ削除に移動
		exit( wp_redirect( admin_url( 'admin.php?page=emanon_cash_clear_page' ) ) );
	}
	add_action( 'admin_post_emanon_delete_transients_first_view', 'emanon_delete_transients_first_view' );
}

/**
 * キャッシュ削除［レイアウト］
 *
 * @since 1.0.0
 * @package Emanon Premium
 */
if ( ! function_exists( 'emanon_delete_transients_layout' ) ) {
function emanon_delete_transients_layout() {
		delete_transient( 'header_pc' );
		delete_transient( 'header_sp' );
		delete_transient( 'footer_widget_upper_pc' );
		delete_transient( 'footer_widget_upper_sp' );
		delete_transient( 'footer_widget_pc' );
		delete_transient( 'footer_widget_sp' );
		delete_transient( 'footer_menu' );
		delete_transient( 'footer_copyright' );
		// 管理画面 Emanon設定 キャッシュ削除に移動
		exit( wp_redirect( admin_url( 'admin.php?page=emanon_cash_clear_page' ) ) );
	}
	add_action( 'admin_post_emanon_delete_transients_layout', 'emanon_delete_transients_layout' );
}

/**
 * 人気記事 閲覧数の削除
 *
 * @since 1.0.0
 * @package Emanon Premium
 */
if( ! function_exists( 'emanon_delete_post_views' ) ) {
	function emanon_delete_post_views() {
		$number_key = 'post_views_number';
		delete_post_meta_by_key( $number_key );
		// 管理画面 Emanon設定 キャッシュ削除に移動
		exit( wp_redirect( admin_url( 'admin.php?page=emanon_cash_clear_page' ) ) );
	}
	add_action( 'admin_post_emanon_delete_post_views', 'emanon_delete_post_views' );
}


/**
 * キャッシュ削除［テーマカスタマイザー保存・更新］
 *
 * @since 1.0.0
 * @package Emanon Premium
 */
if ( ! function_exists( 'emanon_delete_transients_customize_save' ) ) {
function emanon_delete_transients_customize_save() {
		delete_transient( 'firstview_pc' );
		delete_transient( 'firstview_sp' );
		delete_transient( 'header_pc' );
		delete_transient( 'header_sp' );
		delete_transient( 'footer_widget_upper_pc' );
		delete_transient( 'footer_widget_upper_sp' );
		delete_transient( 'footer_widget_pc' );
		delete_transient( 'footer_widget_sp' );
		delete_transient( 'footer_menu' );
		delete_transient( 'footer_copyright' );
	}
	add_action( 'customize_save_after', 'emanon_delete_transients_customize_save' ); 
}

/**
 * キャッシュ削除［メニュー保存・更新］
 *
 * @since 1.0.0
 * @package Emanon Premium
 */
if ( ! function_exists( 'emanon_delete_transients_menu_save' ) ) {
	function emanon_delete_transients_menu_save( $menu_id ) {
		$theme_locations = get_nav_menu_locations();
		foreach ( $theme_locations as $location => $id ) {
			if ( $menu_id === $id ) {
				if ( $location === 'header-menu' || 'header-menu-drop' ) {
					delete_transient( 'header_pc' );
					delete_transient( 'header_sp' );
				}
				if ( $location === 'footer-menu-pc' || 'footer-menu-sp' ) {
					delete_transient( 'footer_pc' );
					delete_transient( 'footer_sp' );
				}
				if ( $location === 'drawer-menu-pc' || 'drawer-menu-sp' ) {
					delete_transient( 'drawer_menu' );
				}
			}
		}
	}
	add_action( 'wp_update_nav_menu', 'emanon_delete_transients_menu_save' );
}

/**
 * キャッシュ削除［サイト名・キャッチフレーズ保存・更新］
 *
 * @since 1.0.0
 * @package Emanon Premium
 */
if ( ! function_exists( 'emanon_delete_transients_option_save' ) ) {
	function emanon_delete_transients_option_save( $option_name ) {
		if ( $option_name === 'blogname' || $option_name === 'blogdescription' ) {
			delete_transient( 'header_pc' );
			delete_transient( 'header_sp' );
		}
	}
	add_action( 'update_option', 'emanon_delete_transients_option_save' );
}

/**
 * キャッシュ削除［ウィジェット保存・更新］
 *
 * @since 1.0.0
 * @package Emanon Premium
 */
if ( ! function_exists( 'emanon_delete_transients_widget_save' ) ) {
	add_filter( 'widget_update_callback', 'emanon_delete_transients_widget_save', 10, 4 );
	function emanon_delete_transients_widget_save( $instance, $new_instance, $old_instance, $current ) {

		// ウィジェットの一覧を取得
		$widget_data = wp_get_sidebars_widgets();

		// 指定ウィジェットに絞り込み
		$footer_widget_upper_pc = $widget_data[ 'footer-widget-upper-pc' ];
		// 指定ウィジェットエリア内のウィジェットをチェック
		foreach ( $footer_widget_upper_pc as $widget_id ) {
			if ( $current->id === $widget_id ) {
				delete_transient( 'footer_widget_upper_pc' );
			}
		}

		$footer_widget_upper_sp = $widget_data[ 'footer-widget-upper-sp' ];
		foreach ( $footer_widget_upper_sp as $widget_id ) {
			if ( $current->id === $widget_id ) {
				delete_transient( 'footer_widget_upper_sp' );
			}
		}

		$footer_widget_left = $widget_data[ 'footer-widget-left' ];
		foreach ( $footer_widget_left as $widget_id ) {
			if ( $current->id === $widget_id ) {
				delete_transient( 'footer_widget_pc' );
				delete_transient( 'footer_widget_sp' );
			}
		}

		$footer_widget_center = $widget_data[ 'footer-widget-center' ];
		foreach ( $footer_widget_center as $widget_id ) {
			if ( $current->id === $widget_id ) {
				delete_transient( 'footer_widget_pc' );
				delete_transient( 'footer_widget_sp' );
			}
		}

		$footer_widget_center_2 = $widget_data[ 'footer-widget-center-2' ];
		foreach ( $footer_widget_center_2 as $widget_id ) {
			if ( $current->id === $widget_id ) {
				delete_transient( 'footer_widget_pc' );
				delete_transient( 'footer_widget_sp' );
			}
		}

		$footer_widget_right = $widget_data[ 'footer-widget-right' ];
		foreach ( $footer_widget_right as $widget_id ) {
			if ( $current->id === $widget_id ) {
				delete_transient( 'footer_widget_pc' );
				delete_transient( 'footer_widget_sp' );
			}
		}

		$footer_widget_sp = $widget_data[ 'footer-widget-sp' ];
		foreach ( $footer_widget_sp as $widget_id ) {
			if ( $current->id === $widget_id ) {
				delete_transient( 'footer_widget_sp' );
			}
		}

		$footer_widget_copyright = $widget_data[ 'footer_widget_copyright' ];
		foreach ( $footer_widget_copyright as $widget_id ) {
			if ( $current->id === $widget_id ) {
				delete_transient( 'footer_copyright' );
			}
		}

		$footer_widget_top = $widget_data[ 'drawer-widget-top' ];
		foreach ( $footer_widget_top as $widget_id ) {
			if ( $current->id === $widget_id ) {
				delete_transient( 'drawer_menu' );
			}
		}

		$footer_widget_bottom = $widget_data[ 'drawer-widget-bottom' ];
		foreach ( $footer_widget_bottom as $widget_id ) {
			if ( $current->id === $widget_id ) {
				delete_transient( 'drawer_menu' );
			}
		}

	return $instance;
	}
}

/**
 * キャッシュ削除［ウィジェット新規追加］
 *
 * @since 1.0.0
 * @package Emanon Premium
 */
add_action( 'widgets_init', function() {

	$cache_data  = get_transient( 'emanon_widgets' );
	$widget_data = wp_get_sidebars_widgets();

	if ( $cache_data !== $widget_data ) {
		delete_transient( 'footer_widget_upper_pc' );
		delete_transient( 'footer_widget_upper_sp' );
		delete_transient( 'footer_widget_pc' );
		delete_transient( 'footer_widget_sp' );
		delete_transient( 'footer_copyright' );
		delete_transient( 'drawer_menu' );
	} else {

	// ウィジェット登録状況をキャッシュ
	set_transient( 'emanon_widgets', $widget_data  );
	}
}, 99 );