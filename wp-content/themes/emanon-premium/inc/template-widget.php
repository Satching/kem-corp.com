<?php
/**
 * Template widet
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

// Widget author profile
require_once ( T_DIRE . '/template-parts/parts/widget/author-profile-widget.php' );

// Widget contact
require_once ( T_DIRE . '/template-parts/parts/widget/contact-widget.php' );

// Widget popular posts
require_once ( T_DIRE . '/template-parts/parts/widget/popular-post-widget.php' );

// Widget site profile
require_once ( T_DIRE . '/template-parts/parts/widget/site-profile-widget.php' );

// Widget TOC
require_once ( T_DIRE . '/template-parts/parts/widget/toc-widget.php' );

// Widget icon menu
require_once ( T_DIRE . '/template-parts/parts/widget/icon-menu-widget.php' );

// Widget banner section
require_once ( T_DIRE . '/template-parts/parts/widget/section-banner-widget.php' );

// Widget category lists section
require_once ( T_DIRE . '/template-parts/parts/widget/section-category-list-widget.php' );

// Widget contact section
require_once ( T_DIRE . '/template-parts/parts/widget/section-contact-widget.php' );

// Widget content box section
require_once ( T_DIRE . '/template-parts/parts/widget/section-content-box-widget.php' );

// Widget customer fb section
require_once ( T_DIRE . '/template-parts/parts/widget/section-customer-fb-widget.php' );

// Widget pickup category list section
require_once ( T_DIRE . '/template-parts/parts/widget/section-pickup-category-list-widget.php' );

// Widget post lists section
require_once ( T_DIRE . '/template-parts/parts/widget/section-post-list-widget.php' );

// Widget post slider section
require_once ( T_DIRE . '/template-parts/parts/widget/section-post-slider-widget.php' );

// Widget link box section
require_once ( T_DIRE . '/template-parts/parts/widget/section-link-box-widget.php' );

// Widget price section
require_once ( T_DIRE . '/template-parts/parts/widget/section-price-widget.php' );

// Widget search section
require_once ( T_DIRE . '/template-parts/parts/widget/section-search-widget.php' );

// Widget sns follow
require_once ( T_DIRE . '/template-parts/parts/widget/sns-follow-widget.php' );

if ( get_theme_mod( 'add_request' ) ) {

// Widget request section
require_once ( T_DIRE . '/template-parts/parts/widget/section-request-widget.php' );

} // endif

if ( get_theme_mod( 'add_seminar' ) ) {

// Widget seminar section
require_once ( T_DIRE . '/template-parts/parts/widget/section-seminar-widget.php' );

} // endif

// Widget separator section
require_once ( T_DIRE . '/template-parts/parts/widget/section-separator-widget.php' );

// Widget faq section
require_once ( T_DIRE . '/template-parts/parts/widget/section-faq-widget.php' );

// Widget icon menu section
require_once ( T_DIRE . '/template-parts/parts/widget/section-icon-menu-widget.php' );

// Widget recent posts section
require_once ( T_DIRE . '/template-parts/parts/widget/section-recent-posts-widget.php' );

if ( ! function_exists( 'emanon_widgets_init' ) ):
function emanon_widgets_init() {
	$footer_widget_layout = get_theme_mod( 'footer_widget_layout', 'footer_three_col' );

	register_sidebar( array(
		'name'          => __( 'サイドバー','emanon-premium' ),
		'id'            => 'sidebar-widget',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="sidebar-widget__title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'サイドバー［追従型］','emanon-premium' ),
		'id'            => 'sidebar-widget-sticky',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="sidebar-widget__title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'サイドバー［SP］','emanon-premium' ),
		'id'            => 'sidebar-widget-sp',
		'description'   => __( 'スマホ表示時にウィジェットを配置します。未設定の場合、サイドバーがスマホ表示時に適用されます。','emanon-premium' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="sidebar-widget__title">',
		'after_title'   => '</h3>',
	) );

if ( 'page' == get_option( 'show_on_front' ) ) {

	register_sidebar( array(
		'name'          => __( 'フロントページ セクション［上部］','emanon-premium' ),
		'id'            => 'front-top-section-widget',
		'before_widget' => '<div id="%1$s" class="c-section-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="c-section-widget__header">',
		'after_title'   => '</h2>',
	) );

	if ( get_theme_mod( 'display_content_show_on_front' ) ) {

		register_sidebar( array(
			'name'          => __( 'フロントページ コンテンツ［上部］','emanon-premium' ),
			'id'            => 'front-top-content-widget',
			'description'   => __( '固定ページ［フロントページ用］の本文［上部］にウィジェットを配置します。','emanon-premium' ),
			'before_widget' => '<div id="%1$s" class="c-section-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="c-section-widget__header">',
			'after_title'   => '</h2>',
		) );
	
		register_sidebar( array(
			'name'          => __( 'フロントページ コンテンツ［下部］','emanon-premium' ),
			'id'            => 'front-bottom-content-widget',
			'description'   => __( '固定ページ［フロントページ用］の本文［下部］にウィジェットを配置できます。','emanon-premium' ),
			'before_widget' => '<div id="%1$s" class="c-section-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="c-section-widget__header">',
			'after_title'   => '</h2>',
		) );

	} // endif

	register_sidebar( array(
		'name'          => __( 'フロントページ セクション［下部］','emanon-premium' ),
		'id'            => 'front-bottom-section-widget',
		'before_widget' => '<div id="%1$s" class="c-section-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="c-section-widget__header">',
		'after_title'   => '</h2>',
	) );

} // endif

	register_sidebar( array(
		'name'          => __( 'フッター セクション','emanon-premium' ),
		'id'            => 'footer-widget-upper-pc',
		'before_widget' => '<div id="%1$s" class="c-section-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="c-section-widget__header">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'フッター セクション［SP］','emanon-premium' ),
		'id'            => 'footer-widget-upper-sp',
		'description'   => __( 'スマホ表示時にウィジェットを配置します。未設定の場合、フッター セクションがスマホ表示時に適用されます。','emanon-premium' ),
		'before_widget' => '<div id="%1$s" class="c-section-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="c-section-widget__header">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'フッター［左］','emanon-premium' ),
		'id'            => 'footer-widget-left',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="footer-widget__title">',
		'after_title'   => '</h3>',
	) );

if ( 'footer_three_col' === $footer_widget_layout ) {
	register_sidebar( array(
		'name'          => __( 'フッター［中央］','emanon-premium' ),
		'id'            => 'footer-widget-center',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="footer-widget__title">',
		'after_title'   => '</h3>',
	) );

} elseif ( 'footer_four_col' === $footer_widget_layout ) {
	register_sidebar( array(
		'name'          => __( 'フッター［中央 1］','emanon-premium' ),
		'id'            => 'footer-widget-center',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="footer-widget__title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'フッター［中央 2］','emanon-premium' ),
		'id'            => 'footer-widget-center-2',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="footer-widget__title">',
		'after_title'   => '</h3>',
	) );

} // endif

	register_sidebar( array(
		'name'          => __( 'フッター［右］','emanon-premium' ),
		'id'            => 'footer-widget-right',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="footer-widget__title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'フッター［SP］','emanon-premium' ),
		'id'            => 'footer-widget-sp',
		'description'   => __( 'スマホ表示時にウィジェットを配置します。未設定の場合、フッターがスマホ表示時に適用されます。','emanon-premium' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="footer-widget__title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'コピーライト セクション','emanon-premium' ),
		'id'            => 'footer_widget_copyright',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="copyright-widget__title">',
		'after_title'   => '</h3>',
	) );

if ( has_nav_menu( 'drawer-menu-pc' ) || has_nav_menu( 'drawer-menu-sp' ) ) {

	register_sidebar( array(
		'name'          => __( 'ドロワーメニュー［上部］','emanon-premium' ),
		'id'            => 'drawer-widget-top',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="drawer-widget__title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'ドロワーメニュー［下部］','emanon-premium' ),
		'id'            => 'drawer-widget-bottom',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="drawer-widget__title">',
		'after_title'   => '</h3>',
	) );

} // endif

}
add_action( 'widgets_init', 'emanon_widgets_init' );
endif;
