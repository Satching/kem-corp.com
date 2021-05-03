<?php
/**
 * Emanon Premium functions and definitions
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

/**
 * 定数定義
 */
define( 'T_DIRE', get_template_directory() );
define( 'S_DIRE', get_stylesheet_directory() );
define( 'T_DIRE_URI', get_template_directory_uri() );
define( 'S_DIRE_URI', get_stylesheet_directory_uri() );
define( 'T_FILE_URI', get_theme_file_uri() );
define( 'THEME_VERSION', wp_get_theme()->get( 'Version' ) );

/**
 * Critical path
 */
require_once ( T_DIRE . '/inc/template-style/style-critical-path.php' );

/**
 * Header eyecatch
 */
require_once ( T_DIRE . '/inc/template-style/style-header-eyecatch.php' );

/**
 * Header image slider
 */
require_once ( T_DIRE . '/inc/template-style/style-header-image-slider.php' );

/**
 * Header content slider
 */
require_once ( T_DIRE . '/inc/template-style/style-header-content-slider.php' );

/**
 * Header pickup slider
 */
require_once ( T_DIRE . '/inc/template-style/style-header-pickup-slider.php' );

/**
 * Header pagebox slider
 */
require_once ( T_DIRE . '/inc/template-style/style-header-pagebox-slider.php' );

/**
 * Header video slider
 */
require_once ( T_DIRE . '/inc/template-style/style-header-video.php' );

/**
 * サイト全般のスタイル
 */
require_once ( T_DIRE . '/inc/template-style/style-general.php' );

/**
 * Colors
 */
require_once ( T_DIRE . '/inc/template-style/style-colors.php' );

/**
 * Drawer menu
 */
require_once ( T_DIRE . '/inc/template-style/style-drawer-menu.php' );

/**
 * Font family
 */
require_once ( T_DIRE . '/inc/template-style/style-font-family.php' );

/**
 * Widget 
 */
require_once ( T_DIRE . '/inc/template-style/style-widget.php' );

/**
 * Table of contents
 */
require_once ( T_DIRE . '/inc/template-style/style-table-of-contents.php' );

/**
 * CTA floating
 */
require_once ( T_DIRE . '/inc/template-style/style-cta-floating.php' );

/**
 * テンプレート用フック
 */
require_once ( T_DIRE . '/inc/template-functions.php' );

/**
 * テンプレート用タグ
 */
require_once ( T_DIRE . '/inc/template-tags.php' );

/**
 * テンプレート用キャッシュ削除
 */
require_once ( T_DIRE . '/inc/template-cache.php' );

/**
 * HTML CSSの圧縮
 */
require_once ( T_DIRE . '/inc/template-php-html-css-js-minifier.php');

/**
 * ショーコード
 */
require_once ( T_DIRE . '/inc/template-shortcodes.php' );

/**
 * ウィジェットの追加
 */
require_once ( T_DIRE . '/inc/template-widget.php' );

/**
 * 管理画面のカスタマイズ
 */
require_once ( T_DIRE . '/inc/theme-admin-options.php' );

/**
 * タクソノミーフォームのカスタマイズ
 */
require_once ( T_DIRE . '/inc/theme-taxonomy-form.php' );

/**
 * カスタム投稿タイプ
 */
require_once(  T_DIRE. '/inc/theme-custom-post.php' );

/**
 * カスタマイザーの追加
 */
require_once ( T_DIRE . '/inc/theme-customizer.php' );

/**
 * テーマ用ダッシュボード
 */
require_once ( T_DIRE . '/inc/theme-dashboard.php' );

/**
 * Editor WP block
 */
require_once ( T_DIRE . '/assets/css/editor-style-wp-block.php' );

/**
 * WordPressのサポート機能を登録
 */
if ( ! function_exists( 'emanon_setup' ) ) {
	add_action( 'after_setup_theme', 'emanon_setup' );
	function emanon_setup() {

		// 翻訳ファイルの読み込み
		load_theme_textdomain( 'emanon-premium', T_DIRE . '/languages' );

		// カスタマイザー編集ショートカットの追加
		add_theme_support( 'customize-selective-refresh-widgets' );

		// 画像ブロック「幅広」「全幅」ボタンの追加
		add_theme_support( 'align-wide' );

		// カバーブロックの高さ設定の追加
		add_theme_support( 'custom-units', 'px', 'rem', 'vh', 'vw' );

		// 見出しと段落の高さ設定の追加
		add_theme_support( 'custom-line-height' );

		// エディター用スタイルの追加
		add_theme_support( 'editor-styles' );
		add_editor_style( 'assets/css/editor-style.css' );

		// 埋め込みコンテンツをレスポンシブ対応にする
		// add_theme_support( 'responsive-embeds' );

		// カスタム ロゴの追加
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 80,
				'width'       => 600,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

		// HTML5のフォーマットに変換
		add_theme_support(
			'html5',
			array(
				'navigation-widgets',
				'comment-list',
				'comment-form',
				'search-form',
				'gallery',
				'caption',
				'style',
				'script'
			)
		);

		// headタグの追加
		add_emanon_head_tag();

		// Emanon テーマ用サポートの追加
		add_emanon_theme_support();

	}
} // End if()

if ( ! function_exists( 'add_emanon_head_tag' ) ) {
	/**
	 * head tagの表示
	 */
	function add_emanon_head_tag() {

		$dns_prefetch = get_theme_mod( 'dns_prefetch' );
		if ( empty( $dns_prefetch ) ) {
			remove_action( 'wp_head', 'wp_resource_hints', 2 ); //dns-prefetchを削除
		}

		$feed_links = get_theme_mod( 'feed_links' );
		if ( empty( $feed_links ) ) {
			remove_action( 'wp_head', 'feed_links', 2 ); //記事フィードリンクを削除
		}

		$feed_links_extra = get_theme_mod( 'feed_links_extra' );
		if ( empty( $feed_links_extra ) ) {
			remove_action( 'wp_head', 'feed_links_extra', 3 ); //カテゴリ・コメントフィードリンクを削除
		}

		$emoji = get_theme_mod( 'emoji' );
		if ( empty( $emoji ) ) {
			remove_action( 'wp_head', 'print_emoji_detection_script', 7 ); //絵文字のjsを削除
			remove_action( 'wp_print_styles', 'print_emoji_styles' ); //絵文字のcssを削除
		}

		$rsd_link = get_theme_mod( 'rsd_link' );
		if ( empty( $rsd_link ) ) {
			remove_action( 'wp_head', 'rsd_link' ); //ブログ編集ツール連携を停止
		}

		$wlwmanifest_link = get_theme_mod( 'wlwmanifest_link' );
		if ( empty( $wlwmanifest_link ) ) {
			remove_action( 'wp_head', 'wlwmanifest_link' ); //Windows Live Write連携を停止
		}

		$wp_generator = get_theme_mod( 'wp_generator' );
		if ( empty( $wp_generator ) ) {
			remove_action( 'wp_head', 'wp_generator' ); //WPバージョン表記を削除
		}

		$shortlink = get_theme_mod( 'shortlink' );
		if ( empty( $shortlink ) ) {
			remove_action( 'wp_head', 'wp_shortlink_wp_head' ); //短縮URL表記を削除
		}

	}
} // End if()


if ( ! function_exists( 'add_emanon_theme_support' ) ) {

	/**
	 * テーマ設定
	 */
	function add_emanon_theme_support() {

		// メインコンテンツの表示領域
		global $content_width;
		if ( ! isset( $content_width ) ) {
			$content_width = 780;
		}

		// タイトルタグの追加
		add_theme_support( 'title-tag' );

		// head タグ内のフィードリンクの追加
		add_theme_support( 'automatic-feed-links' );

		// カスタムバックグラウンドの追加
		add_theme_support( 'custom-background',
			array(
			'default-color' => '#fff'
			)
		);

		// サムネイル画像の追加
		add_theme_support( 'post-thumbnails' );

		// サムネイルサイズの設定
		add_image_size( '1200_675', 1200, 675, true );
		add_image_size( '800_450',   800, 450, true );
		add_image_size( '600_338',   600, 338, true );
		add_image_size( '320_180',   320, 180, true );
		add_image_size( '160_160',   160, 160, true );

		// メニューの設定
		register_nav_menus(
			array(
				'header-menu'       => __( 'ヘッダーメニュー', 'emanon-premium' ),
				'header-menu-drop'  => __( 'ヘッダーメニュー［ドロップ］', 'emanon-premium' ),
				'drawer-menu-pc'    => __( 'ドロワーメニュー［PC］', 'emanon-premium' ),
				'drawer-menu-sp'    => __( 'ドロワーメニュー［SP］', 'emanon-premium' ),
				'footer-menu-pc'    => __( 'フッターメニュー［PC］', 'emanon-premium' ),
				'footer-menu-sp'    => __( 'フッターメニュー［SP］', 'emanon-premium' ),
				'fixed-footer-menu' => __( 'フッター固定メニュー［SP］', 'emanon-premium' ),
			)
		);

	}
} // End if()

/**
 * scriptを追加
 */
add_action(
	'wp_enqueue_scripts',
	function () {

		// Theme stylesheet
		wp_enqueue_style( 'emanon-style', emanon_style(), array(), THEME_VERSION );

		// WordPress標準のjQueryからCDNへ切り替え・jQuery migrateの使用 /inc/theme-tags.php
		emanon_enqueue_script();

		// scriptの読み込み
		$minified_js               = get_theme_mod( 'minified_js' );
		$firstview_layout_type     = get_theme_mod( 'firstview_layout_type', 'display_none' );
		$header_eyecatch_particles = get_theme_mod( 'header_eyecatch_particles_background' );
		$header_video_type         = get_theme_mod( 'header_video_type', 'mp4' );
		$footer_background_type    = get_theme_mod( 'footer_background_type', 'none' );
		$footer_youtube_url        = get_theme_mod( 'footer_video_youtube_url' );

		wp_enqueue_script( 'emanon-master', T_DIRE_URI . '/assets/js/master.js', array('jquery'), THEME_VERSION , true );
		wp_enqueue_script( 'emanon-utility', emanon_js(), array('jquery'), THEME_VERSION , true );

		if ( ! $minified_js && is_front_page() && 'header_eyecatch' === $firstview_layout_type && $header_eyecatch_particles ) {
			wp_enqueue_script( 'emanon-particles', T_DIRE_URI . '/assets/js/particles.min.js', array('jquery'), THEME_VERSION , true );
			wp_enqueue_script( 'emanon-particles-set', T_DIRE_URI . '/assets/js/particles-set.min.js', array('jquery'), THEME_VERSION , true );
		}

		if ( ! $minified_js && is_front_page() && 'header_video' === $firstview_layout_type && 'youtube' === $header_video_type 
		|| ! $minified_js &&  'youtube' === $footer_background_type && $footer_youtube_url ) {
			wp_enqueue_script( 'emanon-ytplayer', T_DIRE_URI . '/assets/js/YTPlayer.min.js', array('jquery'), THEME_VERSION , true );
		}

		$icon_post = get_theme_mod( 'display_target_blank_icon_post' );
		$icon_page = get_theme_mod( 'display_target_blank_icon_page' );
		if ( is_single() && $icon_post || is_page() && ! is_front_page() && $icon_page ) {
			wp_enqueue_script( 'emanon-external-link-set', T_DIRE_URI . '/assets/js/external-link-set.js', array('jquery'), THEME_VERSION , true );
		}

		$rel_prefetch = get_theme_mod( 'rel_prefetch' );
		if ( $rel_prefetch ) {
			wp_enqueue_script( 'emanon-rel-prefetch-set', T_DIRE_URI . '/assets/js/instantpage.js', array(), THEME_VERSION , true );
		}

		// コメント返信用scriptの読み込み
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

	}
);


/**
 * index followを</head>の前に挿入
 */
add_action(
	'wp_head',
	function () {

		$disable_seo_meta_tag = get_theme_mod( 'disable_seo_meta_tag' );
		if ( $disable_seo_meta_tag ) {
			return;
		}

		$noindex            = post_custom( 'emanon_noindex' );
		$nofollow           = post_custom( 'emanon_nofollow' );
		$noindex_category   = get_theme_mod( 'noindex_category' );
		$noindex_tag        = get_theme_mod( 'noindex_tag' );
		$noindex_date       = get_theme_mod( 'noindex_date' );
		$noindex_author     = get_theme_mod( 'noindex_author' );
		$noindex_attachment = get_theme_mod( 'noindex_attachment' );
		$noindex_search     = get_theme_mod( 'noindex_search' );
		$noindex_404        = get_theme_mod( 'noindex_404' );

		$robots = '';

		if ( is_single() || is_page() ) {
			if ( true == $noindex && true == $nofollow ) {
				$robots = '<meta name="robots" content="noindex, nofollow" />' . "\n";
			} elseif ( true == $noindex && false == $nofollow ) {
				$robots = '<meta name="robots" content="noindex" />' . "\n";
			} elseif ( false == $noindex && true == $nofollow ) {
				$robots = '<meta name="robots" content="nofollow" />' . "\n";
			}
		} elseif ( is_category() && $noindex_category
				|| is_tag() && $noindex_tag
				|| is_date() && $noindex_date
				|| is_author() && $noindex_author
				|| is_attachment() && $noindex_attachment
				|| is_search() && $noindex_search
				|| is_404() && $noindex_404 ) {
			$robots = '<meta name="robots" content="noindex, follow" />' . "\n";
		}

		echo $robots;
	},
	1
);

/**
 * SEO metaタグを</head>の前に挿入
 */
add_action(
	'wp_head',
	function () {
		$disable_seo_meta_tag = get_theme_mod( 'disable_seo_meta_tag' );
		if ( $disable_seo_meta_tag ) {
			return;
		}
	?>
<meta name="description" content="<?php emanon_description(); ?>" />
<?php
	},
	1
);

/**
 * 言語アノテーションタグを</head>の前に挿入
 */
add_action(
	'wp_head',
	function () {
		$hreflang_tag = get_theme_mod( 'hreflang_tag' );
		$locale       = '';
		$url          = '';
		$slug         = get_emanon_current_slug();
		if ( $hreflang_tag ) {
			$locale     = get_theme_mod( 'site_language' );
			$url        = home_url('/') . $slug;
		}
	?>
<?php if ( 'not_set' != $locale && $url ): ?>
<link rel="alternate" hreflang="<?php echo esc_attr( $locale ); ?>" href="<?php echo esc_url( $url ); ?>" />
<?php endif; ?>
<?php
	},
	10
);

add_action(
	'wp_head',
	function () {
		$hreflang_tag  = get_theme_mod( 'hreflang_tag' );
		$locale        = '';
		$url           = '';
		$slug          = get_emanon_current_slug();
		if ( $hreflang_tag ) {
			for( $c = 1; $c < 6; $c++ ) {
				$locale    = get_theme_mod( 'language_locale_'.$c );
				$directory = get_theme_mod( 'site_directory_'.$c , 'sub_directory' );
				$url       = home_url('/'. $locale .'/') . $slug;
	?>
<?php if ( 'not_set' != $locale && 'sub_directory' === $directory && $url ): ?>
<link rel="alternate" hreflang="<?php echo esc_attr( $locale ); ?>" href="<?php echo esc_url( $url ); ?>" />
<?php elseif ( 'not_set' != $locale && 'directory' === $directory && $url ): ?>
<link rel="alternate" hreflang="<?php echo esc_attr( $locale ); ?>" href="<?php echo home_url( '/' ); ?>" />
<?php endif; ?>
<?php
			}
		}
	},
	10
);

add_action(
	'wp_head',
	function () {
		$hreflang_tag  = get_theme_mod( 'hreflang_tag' );
		$locale        = '';
		$url           = '';
		$slug          = get_emanon_current_slug();
		if ( $hreflang_tag ) {
				$locale    = get_theme_mod( 'language_locale_6' );
				$directory = get_theme_mod( 'site_directory_6' , 'sub_directory' );
				$url       = home_url('/'. $locale .'/') . $slug;
	?>
<?php if ( $locale && 'sub_directory' === $directory && $url ): ?>
<link rel="alternate" hreflang="<?php echo esc_attr( $locale ); ?>" href="<?php echo esc_url( $url ); ?>" />
<?php elseif ( $locale && 'directory' === $directory && $url ): ?>
<link rel="alternate" hreflang="<?php echo esc_attr( $locale ); ?>" href="<?php echo home_url( '/' ); ?>" />
<?php endif; ?>
<?php
		}
	},
	10
);

/**
 * OGPを</head>の前に挿入
 */
add_action(
	'wp_head',
	function () {
		if ( ! get_theme_mod( 'enable_ogp' ) ) {
		return;
	}
?>
<!--ogp-->
<meta property="og:locale" content="ja_JP" />
<meta property="og:type" content="<?php emanon_ogp_type(); ?>" />
<meta property="og:url" content="<?php emanon_ogp_url(); ?>" />
<meta property="og:title" content="<?php emanon_ogp_title(); ?>" />
<?php if ( empty( $post->post_password ) ) : ?>
<meta property="og:description" content="<?php emanon_description(); ?>" />
<?php endif; ?>
<meta property="og:image" content="<?php emanon_ogp_image(); ?>">
<meta property="og:site_name" content="<?php bloginfo( 'name' ); ?>" />
<!--/ogp-->
<?php
	},
	11
);

/**
 * Facebook OGPを</head>の前に挿入
 */
add_action(
	'wp_head',
	function () {
		if ( ! get_theme_mod( 'enable_facebook_ogp' ) ) {
		return;
	}
?>
<!--facebook ogp-->
<?php if ( get_emanon_facebook_app_id() ): ?>
<meta property="fb:app_id" content="<?php emanon_facebook_app_id(); ?>" />
<?php endif; ?>
<!--/facebook ogp-->
<?php
	},
	12
);

/**
 * Twitterカードを</head>の前に挿入
 */
add_action(
	'wp_head',
	function () {
		if ( ! get_theme_mod( 'enable_twitter_card' ) ) {
		return;
	}
?>
<!--twitter card-->
<meta name="twitter:card" content="<?php emanon_twitter_card_type(); ?>" />
<?php if ( get_emanon_twitter_id() ): ?>
<meta name="twitter:site" content="@<?php emanon_twitter_id(); ?>" />
<?php endif; ?>
<!--/twitter card-->
<?php
	},
	13
);

/**
 * Google analyticsを</head>の前に挿入
 */
add_action(
	'wp_head',
	function () {
		$tracking_id = get_theme_mod( 'tracking_id' );
		$stop_tracking_tag = get_theme_mod( 'stop_tracking_tag' );
		if ( is_user_logged_in() && $stop_tracking_tag ) {
			return;
		} elseif ( $tracking_id ) {
	?>
<!-- global site tag (gtag.js) - google analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo esc_js( $tracking_id ) ;?>"></script>
<script>window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());
gtag('config', '<?php echo esc_js( $tracking_id ) ;?>');</script>
<!-- / global site tag (gtag.js) - google analytics -->
<?php
		}
	},
	14
);

/**
 * Google Tag Managerを</head>の前に挿入
 */
add_action(
	'wp_head',
	function () {
		$tag_manager_id = get_theme_mod( 'tag_manager_id' );
		$stop_tracking_tag = get_theme_mod( 'stop_tracking_tag' );
		if ( is_user_logged_in() && $stop_tracking_tag ) {
			return;
		} elseif ( $tag_manager_id ) {
	?>
<!--google tag nanager-->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','<?php echo esc_js( $tag_manager_id ) ;?>');</script>
<!--/google tag manager-->
<?php
		}
	},
	15
);

/**
 * Google search consoleを</head>の前に挿入
 */
add_action(
	'wp_head',
	function () {
		$search_console_id = get_theme_mod( 'search_console_id' );
		if ( ! $search_console_id ) {
			return;
		}

	?>
<meta name="google-site-verification" content="<?php echo esc_js( $search_console_id) ?>" />
<?php
	},
	16
);

/**
 * JSON-LDを用いたschema.orgの記述を</head>の前に挿入
 */
add_action(
	'wp_head',
	function () {
		if ( is_single() ) {
			if ( have_posts() ) : while (have_posts() ) : the_post();
					$context          = 'http://schema.org';
					$type             = 'Article';
					$headline         = get_the_title();
					$dataPublished    = get_the_date('Y-n-j');
					$dateModified     = get_the_modified_date('Y-n-j');
					$mainEntityOfPage = get_permalink();
					$image_type       = 'ImageObject';
					$image_id         = get_post_thumbnail_id ();
					$image            = wp_get_attachment_image_src ( $image_id, false );
					if( $image ) {
					$image_url        = $image[0];
					$image_width      = $image[1];
					$image_height     = $image[2];
					} else {
					$no_image_large   = T_DIRE_URI . '/assets/images/no-img/1200-675.png';
					$image_url        = $no_image_large;
					$image_width      = '1200';
					$image_height     = '675';
					}
					$author_type      = 'Person';
					$author_name      = get_the_author();
					$publisher_type   = 'Organization';
					$publisher_name   = get_bloginfo('name');
					$logo_id          = get_theme_mod( 'custom_logo' );
					if ( $logo_id ) {
					$logo_url = wp_get_attachment_image_url( $logo_id , 'full' );
					} else {
					$logo_url = T_DIRE_URI . '/assets/images/emanon-logo.png';
					}

					$json= '
					"@context": "'. $context .'",
					"@type": "'. $type .'",
					"headline": "'. $headline .'",
					"datePublished": "'. $dataPublished .'",
					"dateModified": "'. $dateModified .'",
					"mainEntityOfPage": "'.  $mainEntityOfPage .'",
					"author" : {
							 "@type": "'.  $author_type .'",
							 "name": "'. $author_name .'"
							 },
					"image" : {
							 "@type": "'. $image_type .'",
							 "url": "'.  $image_url .'",
							 "width": "'. $image_width .'",
							 "height": "'. $image_height .'"
							 },
					"publisher" : {
							 "@type": "'. $publisher_type .'",
							 "name": "'. $publisher_name .'",
							 "logo" : {
										"@type": "'. $image_type .'",
										"url": "'. $logo_url .'"
										}
							 }
					';
				echo '<script type="application/ld+json">{'.$json.'}</script>' . "\n";
			endwhile; endif;
		}
	},
	17
);

/**
 * JSON-LDを用いたschema.orgのパンくずリスト記述を</head>の前に挿入
 */
add_action(
	'wp_head',
	function () {

	$breadcrumb_post            = get_theme_mod( 'post_breadcrumb_position', 'content_top' );
	$breadcrumb_post_request    = get_theme_mod( 'post_request_breadcrumb_position', 'content_top' );
	$breadcrumb_page            = get_theme_mod( 'post_breadcrumb_position', 'content_top' );
	$breadcrumb_page_home       = get_theme_mod( 'home_breadcrumb_position', 'content_top' );
	$breadcrumb_archive         = get_theme_mod( 'archive_breadcrumb_position', 'content_top' );
	$breadcrumb_archive_request = get_theme_mod( 'archive_request_breadcrumb_position', 'content_top' );

	if ( is_front_page() || 
	'display_none' === $breadcrumb_post && is_singular( 'post' ) || 
	'display_none' === $breadcrumb_post_request && is_singular( 'request' ) || 
	'display_none' === $breadcrumb_page && is_page() || 
	'display_none' === $breadcrumb_page_home && is_home() || 
	'display_none' === $breadcrumb_archive && is_archive() || 
	'display_none' === $breadcrumb_archive_request && is_post_type_archive( 'request' ) || 
	'display_none' === $breadcrumb_archive_request && is_tax( 'request-cat' ) ||
	is_attachment() ||
	is_singular( 'sales' ) ||
	is_post_type_archive( 'sales' ) ) {
		return;
	}

	if ( 'page' == get_option( 'show_on_front' ) ) { // 管理画面「設定」-「表示設定」post | page
		$page_for_posts       = get_option( 'page_for_posts' ); // フロントページの表示 > 投稿ページ
		$page_for_posts_link  = get_permalink( $page_for_posts );
		$page_for_posts_title = get_the_title( $page_for_posts );
	} else {
		$page_for_posts = '';
	}

	$wp_object  = get_queried_object();
	$json_array = array();

	// パンくず先頭文字の設定
	$home = get_theme_mod( 'breadcrumb_home_name', get_bloginfo('name') );
	if( $home ) {
		$home_name = $home;
		} else {
		$home_name = 'Home';
	}

	//JSON-LDデータ
	$json_array[] = array(
		'name' => $home,
		'item' => home_url( '/' )
	);

	// 投稿ページ
	if ( is_single() ) {
		$post_type         = $wp_object->post_type;
		$post_type_name    = esc_html( get_post_type_object( $post_type )->label );
		$post_archive_link = esc_url( get_post_type_archive_link( $post_type ) );

		// デフォルトの投稿タイプ
		if ( is_singular( 'post' ) ) {
			if ( $page_for_posts ) {
				// JSON-LDデータ
				$json_array[] = array(
					'name' => $page_for_posts_title,
					'item' => $page_for_posts_link
				);
			}
		// カスタム投稿タイプ
		} elseif ( $post_type !== 'post' ) {
			// JSON-LDデータ
			$json_array[] = array(
				'name' => $post_type_name,
				'item' => $post_archive_link
			);
		}

		// タームを取得
		$post_id = $wp_object->ID;
		$taxonomy = 'category';
		$terms   = get_the_terms( $post_id, $taxonomy );

		if ( $terms && ! is_wp_error( $terms ) ) {

			// ターム親IDを取得
			$parents_list = array();
			foreach ( $terms as $term ) {
				if ( 0 != $term->parent ) {
					$parents_list[] = $term->parent;
				}
			}

			// タームのみ取得
			$child_list = array();
			foreach ( $terms as $term ) {
				if ( ! in_array( $term->term_id, $parents_list ) ) {
					$child_list[] = $term;
				}
			}
			$term = $child_list[0];

			if ( 0 != $term->parent ) {
			// 親タームを表示
			$parents = array_reverse( get_ancestors( $term->term_id, $taxonomy ) );
				foreach ( $parents as $parent_id ) {
					$parent_term = get_term( $parent_id, $taxonomy );
					$parent_link = esc_url( get_term_link( $parent_id, $taxonomy ) );
					$parent_name = esc_html( $parent_term->name );
					//JSON-LDデータ
					$json_array[] = array(
						'name' => $parent_name,
						'item' => $parent_link
					);
				}
			}
	
			// 最下層のタームを表示
			$term_link = esc_url( get_term_link( $term->term_id, $taxonomy ) );
			$term_name = esc_html( $term->name );
			// JSON-LDデータ
			$json_array[] = array(
				'name' => $term_name,
				'item' => $term_link
			);
	
		} // End if( $terms && ! is_wp_error( $terms ) )

	// 固定ページ
	} elseif ( is_page() ) {

		// 固定ページの親ページを表示
		if ( 0 != $wp_object->post_parent ) {
			$page_id = $wp_object->ID;
			$parents = array_reverse( get_post_ancestors( $page_id ) );
			foreach( $parents as $parent_id ) {
				$parent_link = esc_url( get_permalink( $parent_id ) );
				$parent_title = esc_html( get_the_title( $parent_id ) );
				// JSON-LDデータ
				$json_array[] = array(
					'name' => $parent_title,
					'item' => $parent_link
				);
			}
		}

	// 日付に関連するアーカイブページ
	} elseif ( is_date() ) {
		$year  = get_query_var('year');
		$month = get_query_var('monthnum');

		// 日別アーカイブ
		if ( is_day() && $year && $month ) {
			// JSON-LDデータ
			$json_array[] = array(
				'name' => $year,
				'item' => get_year_link( $year )
			);
			$json_array[] = array(
				'name' => $month,
				'item' => get_month_link( $year, $month )
			);
		// 月別アーカイブ
		} elseif ( is_month() && $year && $month ) {
			// JSON-LDデータ
			$json_array[] = array(
				'name' => $year,
				'item' => get_year_link( $year )
			);
		}
	// その他アーカイブ
	} elseif ( is_archive() && ! is_post_type_archive() ) {
		$taxonomy  = $wp_object->taxonomy;
		$term_id   = $wp_object->term_id;
		$term_name = $wp_object->name;

		if ( is_tax() ) {
			$post_type        = get_taxonomy( $taxonomy )->object_type[0];
			$post_type_object = get_post_type_object( $post_type );
			$taxonomy_name    = esc_html( $post_type_object->labels->name );
			$taxonomy_link    = esc_url( get_post_type_archive_link( $post_type ) );
			// JSON-LDデータ
			$json_array[] = array(
				'name' => $taxonomy_name,
				'item' => $taxonomy_link
			);
		} elseif ( $page_for_posts ) {
			// JSON-LDデータ
			$json_array[] = array(
				'name' => $page_for_posts_title,
				'item' => $page_for_posts_link
			);
		}

		if ( 0 != $wp_object->parent ) {
			$parents = array_reverse( get_ancestors( $term_id, $taxonomy ) );
			foreach( $parents as $parent_id ) {
				$parent_term = get_term( $parent_id, $taxonomy );
				$parent_link = esc_url( get_term_link( $parent_id, $taxonomy ) );
				$parent_name = esc_html( $parent_term->name );
				// JSON-LDデータ
				$json_array[] = array(
					'name' => $parent_name,
					'item' => $parent_link
				);
			}
		}

	}

	// JSON-LDの出力
	if ( ! empty( $json_array ) ) {

		$json = '';
		$c    = 1;
		foreach ( $json_array as $data ) {
			$json .= '{
				"@type": "ListItem",
				"position": '. $c++ .',
				"name": "'. $data['name'] .'",
				"item": "'. $data['item'] .'"
			},';
		}

		echo '<script type="application/ld+json">{
			"@context": "http://schema.org",
			"@type": "BreadcrumbList",
			"itemListElement": ['. rtrim( $json, ',' ) .']
		}</script>' . "\n";

		}
	},
	18
);

/**
 * カスタムCSSの圧縮
 */
function emanon_style_custom() {
	$custom_css = post_custom( 'emanon_custom_css_setting' );
	return apply_filters( 'emanon_style_custom', emanon_css_minify( $custom_css ) );
}

/**
 * テーマCSSを</head>の前に挿入
 */
add_action(
	'wp_head',
	function () {
			echo '<style type="text/css">';
			echo emanon_style_critical_path();
			echo emanon_style_header_eyecatch();
			echo emanon_style_header_image_slider();
			echo emanon_style_header_content_slider();
			echo emanon_style_header_pickup_slider();
			echo emanon_style_header_pagebox_slider();
			echo emanon_style_header_video();
			echo emanon_style_general();
			echo emanon_style_font_family();
			echo emanon_style_colors();
			echo emanon_style_drawer_menu();
			echo emanon_style_toc();
			echo emanon_style_widget();
			echo emanon_style_cta_floating();
			echo emanon_style_custom();
			echo '</style>' . "\n";
	},
	1
);

/**
 * IntersectionObserveを</head>の前に挿入
 */
 add_filter(
	'wp_head',
	function () {
	$off_screen = get_theme_mod( 'off_screen_image' );
	if ( $off_screen ) {
	$script = <<<EOT
<!-- lazyload -->
<script>
	document.addEventListener("DOMContentLoaded", function() {
		let lazyImages = [].slice.call(document.querySelectorAll("img.lazy"));
		if ("IntersectionObserver" in window) {
			let lazyImageObserver = new IntersectionObserver(function(entries, observer) {
				entries.forEach(function(entry) {
					if (entry.isIntersecting) {
					let lazyImage = entry.target;
						if (lazyImage.dataset.hasOwnProperty('src')) {
							lazyImage.src = lazyImage.dataset.src;
							lazyImage.dataset.src = '';
							delete lazyImage.dataset.src;
						}
						if (lazyImage.dataset.hasOwnProperty('srcset')) {
							lazyImage.srcset = lazyImage.dataset.srcset;
							lazyImage.dataset.srcset = '';
							delete lazyImage.dataset.srcset;
						}
						lazyImage.classList.remove("lazy");
						lazyImageObserver.unobserve(lazyImage);
					}
				});
			});
			lazyImages.forEach(function(lazyImage) {
				lazyImageObserver.observe(lazyImage);
			});
		}
	});
</script>
<!-- / lazyload --> \n
EOT;
		echo $script;
		}
	},
	20
);

/**
 * </head>の直前に挿入
 */
add_action(
	'wp_head',
	function () {
		$insert_head = get_theme_mod( 'insert_head' );
		if ( $insert_head ) {
		echo '<!--custom insert head-->' . "\n";
		echo $insert_head . "\n";
		echo '<!--/custom insert head-->' . "\n";
		}
	},
	99
);

/**
 * loading Animationを<body>の後に挿入
 */
add_action(
	'wp_body_open',
	function () {
		$animation  = get_theme_mod( 'loading_animation', 'no_animation' );
		$icon_image = get_theme_mod( 'loading_animation_icon_image' );
		$cookie     = get_theme_mod( 'loading_animation_cookie' );
		if ( $cookie ) {
			$class = 'class="loading-animation-cookie"';
		} else {
			$class = '';
		}
		if ( is_front_page() && 'no_animation' != $animation && ! is_paged() ) {
				echo '<div id="js-loading-overlay"' . $class . '>' . "\n";
						if ( 'animation_icon' == $animation && ! $icon_image ) {
							echo '<div id="js-loading-animation" class="loading-icon"></div>' . "\n";
						} elseif ( 'animation_icon' == $animation && $icon_image ) {
							echo '<div id="js-loading-animation"><img src="' . esc_url( $icon_image ) . '" alt="' . get_bloginfo('name') . '"></div>' . "\n";
						} elseif ( 'animation_text' == $animation ) {
						echo '<div class="loading-text"><span>L</span><span>O</span><span>A</span><span>D</span><span>I</span><span>N</span><span>G</span></div>' . "\n";
						}
				echo '</div>' . "\n";
		}
	},
	11
);

/**
 * Google Tag Manager (noscript)を<body>の後に挿入
 */
add_action(
	'wp_body_open',
	function () {
		$tag_manager_id = get_theme_mod( 'tag_manager_id' );
		$stop_tracking_tag = get_theme_mod( 'stop_tracking_tag' );
		if ( is_user_logged_in() && $stop_tracking_tag ) {
			return;
		} elseif ( $tag_manager_id ) {
			echo '<!--google tag manager (noscript)-->' . "\n" .'<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=' . esc_js( $tag_manager_id ) . '" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>' . "\n".'<!--/google tag manager (noscript)-->' . "\n";
		}
	},
	12
);

/**
 * JavaScript用Facebook SDKを<body>の後に挿入
 */
add_action(
	'wp_body_open',
	function () {
	$facebook_app_id = esc_js( get_emanon_facebook_app_id() );
	if ( $facebook_app_id ) {
		echo '<!-- Load Facebook SDK for JavaScript -->' . "\n";
		echo '<div id="fb-root"></div>' . "\n";
		$fb_root = <<<fb_root
<script>(function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) return;
js = d.createElement(s); js.id = id;
js.src = "//connect.facebook.net/ja_JP/sdk.js#xfbml=1&version=v2.6&appId=$facebook_app_id";
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
fb_root;
		echo $fb_root . "\n";
		echo '<!-- /Load Facebook SDK for JavaScript -->' . "\n";
		}
	},
	13
);

/**
 * <body>の直後に挿入
 */
add_action(
	'wp_body_open',
	function () {
		$insert_body = get_theme_mod( 'insert_body' );
		if ( $insert_body ) {
		echo '<!--custom insert body-->' . "\n";
		echo $insert_body . "\n";
		echo '<!--/custom insert body-->' . "\n";
		}
	},
	99
);

/**
 * </footer>の直前に挿入
 */
add_action(
	'wp_footer',
	function () {
		$insert_footer = get_theme_mod( 'insert_footer' );
		if ( $insert_footer ) {
		echo '<!--custom insert footer-->' . "\n";
		echo $insert_footer . "\n";
		echo '<!--/custom insert footer-->' . "\n";
		}
	},
	99
);

/**
 * ピンバック用 XML-RPC ファイルのURLの追加
 *
 * @since 1.0.0
 **/
add_action(
	'wp_head',
	function () {
		if ( is_singular() && pings_open() ) {
			printf( '<link rel="pingback" href="%s">' . "\n", get_bloginfo( 'pingback_url' ) );
		}
	}
);

// recent commentsのstyleを消去
add_action(
	'widgets_init',
	function () {
		global $wp_widget_factory;
		remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ));
	}
);

/**
 * Bot判定
 *
 */
if( ! function_exists( 'is_bot' ) ) {
	function is_bot() {
		$bots = array(
			'Googlebot',
			'Mediapartners-Google',
			'Google Web Preview',
			'Yahoo! Slurp',
			'YahooCacheSystem',
			'msnbot',
			'bingbot',
			'MJ12bot',
			'Ezooms',
			'pirst; MSIE 8.0;',
			'ia_archiver',
			'Sogou web spider',
			'AhrefsBot',
			'YandexBot',
			'Purebot',
			'Baiduspider',
			'UnwindFetchor',
			'TweetmemeBot',
			'MetaURI',
			'PaperLiBot',
			'Showyoubot',
			'JS-Kit',
			'PostRank',
			'Crowsnest',
			'PycURL',
			'bitlybot',
			'Hatena',
			'facebookexternalhit',
			'NINJA bot',
			'alexa',
			'archive.org_bot',
			);
		foreach( $bots as $bot ){
			if (stripos( $_SERVER['HTTP_USER_AGENT'], $bot ) !== false ) {
				return true;
			}
		}
		return false;
	}
} // End if()

/**
 * Mobile判定
 *
 */
if( ! function_exists( 'is_mobile' ) ) {
	function is_mobile() {
		$useragents = array(
		'iPhone', // iPhone
		'iPod', // iPod touch
		'Android.*Mobile', // 1.5+ Android *** Only mobile
		'Windows.*Phone', // *** Windows Phone
		'dream', // Pre 1.5 Android
		'CUPCAKE', // 1.5+ Android
		'blackberry9500', // Storm
		'blackberry9530', // Storm
		'blackberry9520', // Storm v2
		'blackberry9550', // Storm v2
		'blackberry9800', // Torch
		'webOS', // Palm Pre Experimental
		'incognito', // Other iPhone browser
		'webmate', // Other iPhone browser
		'Mobile.*Firefox', // Firefox OS
		'Opera Mini', // Opera Mini Browser
		'BB10', // BlackBerry 10
		);
		$pattern = '/'.implode( '|', $useragents ).'/i';
		if ( isset( $_SERVER['HTTP_USER_AGENT'] ) ) {
		$mobile = preg_match( $pattern, $_SERVER['HTTP_USER_AGENT'] );
	} else {
		$mobile = false;
	}
	return apply_filters( 'is_mobile', $mobile );
	}
} // End if()

/**
 * モバイル定義
 */
if ( is_mobile() ) {
	define( 'DEVICE', 'sp' );
} else {
	define( 'DEVICE', 'pc' );
}

/**
 * アップデートチェック
 */
require_once( T_DIRE . '/inc//theme-update/plugin-update-checker.php' );
Puc_v4_Factory::buildUpdateChecker(
	'https://wp-emanon.jp/theme-update/emanon-premium/update.json',
	T_DIRE . '/functions.php', //Full path to the main plugin file or functions.php.
	'emanon-premium'
);
