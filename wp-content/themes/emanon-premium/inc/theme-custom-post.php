<?php
/**
 * Coustom Post
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

$add_news    = get_theme_mod( 'add_news' );
$add_seminar = get_theme_mod( 'add_seminar' );
$add_request = get_theme_mod( 'add_request' );
$add_sales   = get_theme_mod( 'add_sales' );

/**
 * News Post
 *
 * @since 1.0.0
 */
if ( $add_news ) {
	add_action (
		'init',
		function () {

			/* カスタム投稿タイプを追加 */
			$labels = array (
				'name'      => __( 'ニュース', 'emanon-premium' ),
				'all_items' => __( '投稿一覧', 'emanon-premium' ),
			);

			$supports = array (
				'title',
				'editor',
				'author',
				'thumbnail',
				'custom-fields',
				'revisions',
				'excerpt'
			);

			$rewrite = array (
				'slug'     => 'news'
			);

			register_post_type (
				'news', //カスタム投稿タイプ名
					array (
						'labels'            => $labels,
						'public'            => true,
						'show_ui'           => true, // 管理画面で管理
						'show_in_nav_menus' => true, // ナビゲーションメニューで選択
						'rewrite'           => $rewrite,
						'has_archive'       => true, // アーカイブページを持つ
						'menu_position'     => 21, //管理画面のメニュー順位
						'menu_icon'         => 'dashicons-welcome-add-page',
						'supports'          => $supports,
						'show_in_rest'      => true // ブロックエディタ
					)
			);

			/* タクソノミーを追加 */
			$taxonomy_labels = array (
				'name'          => __( 'CAT［ニュース］', 'emanon-premium' ),
				'singular_name' => __( 'ニュース', 'emanon-premium' )
			);

			register_taxonomy (
					'news-cat', //タクソノミーの名前
					'news', //カスタム投稿タイプ名
					array (
						'labels'            => $taxonomy_labels,
						'public'            => true, // 管理画面に表示
						'show_admin_column' => true, // 一覧画面に「タクソノミー」を表示
						'show_in_rest'      => true, // 編集画面で「タクソノミー」の登録
						'hierarchical'      => true  // 階層構造を持つ
					)
			);

		}
	);
}

/**
 * Seminar Post
 *
 * @since 1.0.0
 */
if ( $add_seminar ) {
	add_action (
		'init',
		function () {

			/* カスタム投稿タイプを追加 */
			$labels = array (
				'name'      => __( 'セミナー', 'emanon-premium' ),
				'all_items' => __( '投稿一覧', 'emanon-premium' ),
			);

			$supports = array (
				'title',
				'editor',
				'author',
				'thumbnail',
				'custom-fields',
				'revisions',
				'excerpt'
			);

			$rewrite = array (
				'slug'     => 'seminar'
			);

			register_post_type (
				'seminar', //カスタム投稿タイプ名
					array (
						'labels'            => $labels,
						'public'            => true,
						'show_ui'           => true, // 管理画面で管理
						'show_in_nav_menus' => true, // ナビゲーションメニューで選択
						'rewrite'           => $rewrite,
						'has_archive'       => true, // アーカイブページを持つ
						'menu_position'     => 22, //管理画面のメニュー順位
						'menu_icon'         => 'dashicons-welcome-add-page',
						'supports'          => $supports,
						'show_in_rest'      => true // ブロックエディタ
					)
			);

			/* タクソノミーを追加 */
			$taxonomy_labels = array(
				'name'          => __( 'CAT［セミナー］', 'emanon-premium' ),
				'singular_name' => __( 'セミナー', 'emanon-premium' )
			);

			register_taxonomy (
					'seminar-cat', //タクソノミーの名前
					'seminar', //カスタム投稿タイプ名
					array(
						'labels'            => $taxonomy_labels,
						'public'            => true, // 管理画面に表示
						'show_admin_column' => true, // 一覧画面に「タクソノミー」を表示
						'show_in_rest'      => true, // 編集画面で「タクソノミー」の登録
						'hierarchical'      => true  // 階層構造を持つ
					)
			);

		}
	);
}

/**
 * Request Post
 *
 * @since 1.0.0
 */
if ( $add_request ) {
	add_action(
		'init',
		function () {

			/* カスタム投稿タイプを追加 */
			$labels = array (
				'name'      => __( '資料請求', 'emanon-premium' ),
				'all_items' => __( '投稿一覧', 'emanon-premium' ),
			);

			$supports = array (
				'title',
				'editor',
				'author',
				'thumbnail',
				'custom-fields',
				'revisions',
				'excerpt'
			);

			$rewrite = array (
				'slug'    => 'request'
			);

			register_post_type (
				'request', //カスタム投稿タイプ名
					array (
						'labels'            => $labels,
						'public'            => true,
						'show_ui'           => true, // 管理画面で管理
						'show_in_nav_menus' => true, // ナビゲーションメニューで選択
						'rewrite'           => $rewrite,
						'has_archive'       => true, // アーカイブページを持つ
						'menu_position'     => 23, //管理画面のメニュー順位
						'menu_icon'         => 'dashicons-welcome-add-page',
						'supports'          => $supports,
						'show_in_rest'      => true // ブロックエディタ
					)
			);

			/* タクソノミーを追加 */
			$taxonomy_labels = array (
				'name'          => __( 'CAT［資料請求］', 'emanon-premium' ),
				'singular_name' => __( '資料請求', 'emanon-premium' )
			);

			register_taxonomy (
					'request-cat', //タクソノミーの名前
					'request', //カスタム投稿タイプ名
					array (
						'labels'            => $taxonomy_labels,
						'public'            => true, // 管理画面に表示
						'show_admin_column' => true, // 一覧画面に「タクソノミー」を表示
						'show_in_rest'      => true, // 編集画面で「タクソノミー」の登録
						'hierarchical'      => true  // 階層構造を持つ
					)
			);

		}
	);
}

/**
 * Sales Post
 *
 * @since 1.0.0
 */
if ( $add_sales ) {
	add_action(
		'init',
		function () {

			/* カスタム投稿タイプを追加 */
			$labels = array (
				'name'      => __( 'セールス', 'emanon-premium' ),
				'all_items' => __( '投稿一覧', 'emanon-premium' ),
			);

			$supports = array (
				'title',
				'editor',
				'author',
				'custom-fields',
				'revisions',
			);

			$rewrite = array (
				'slug'     => 'sales'
			);

			register_post_type(
				'sales', //カスタム投稿タイプ名
					array (
						'labels'            => $labels,
						'public'            => true,
						'show_ui'           => true, // 管理画面で管理
						'show_in_nav_menus' => true, // ナビゲーションメニューで選択
						'rewrite'           => $rewrite,
						'has_archive'       => false, // アーカイブページを持つ
						'menu_position'     => 23, //管理画面のメニュー順位
						'menu_icon'         => 'dashicons-welcome-add-page',
						'supports'          => $supports,
						'show_in_rest'      => true // ブロックエディタ
					)
			);

		}
	);
}