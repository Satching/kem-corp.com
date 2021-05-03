<?php
/**
 * Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @author   ThemeCountry
 * @package  basepress
 */

/**
 * Assign the basepress version to a var
 */

$theme              = wp_get_theme( 'basepress' );
$basepress_version = $theme['Version'];


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */

function basepress_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'basepress_content_width', 640 );
}
add_action( 'after_setup_theme', 'basepress_content_width', 0 );

$basepress = (object) array(
	'version' => $basepress_version,

	/**
	 * Initialize all the things.
	 */
	'main'       => require 'inc/class-base.php',
	'customizer' => require 'inc/customizer/class-basepress-customizer.php',
);

require 'inc/base-functions.php';
require 'inc/base-template-hooks.php';
require 'inc/base-template-functions.php';


/**************************************************
 * 「編集(Edit)」リンクの非表示
**************************************************/
add_filter( 'edit_post_link', '__return_false');
add_filter( 'edit_comment_link', '__return_false');

/**************************************************
 * 管理画面一覧にスラッグを表示させる
*************************************************
function add_page_columns($columns) {
    $columns['slug'] = "スラッグ";
    echo '<style>
     .fixed .column-slug {width: 8%;}
    </style>';
    return $columns;
}
function add_page_column_row($column_name, $post_id) {
    if( $column_name == 'slug' ) {
        $post = get_post($post_id);
        $slug = $post->post_name;
        echo esc_attr($slug);
    }
}
//投稿
add_filter( 'manage_pages_columns', 'add_page_columns');
add_action( 'manage_pages_custom_column', 'add_page_column_row', 10, 2);

//固定ページ
add_filter( 'manage_posts_columns', 'add_page_columns');
add_action( 'manage_posts_custom_column', 'add_page_column_row', 10, 2);

//カスタム投稿
add_filter( 'manage_{$post_type}_posts_columns', 'add_page_columns');
add_action( 'manage_{$post_type}_posts_custom_column', 'add_page_column_row', 10, 2);*/

/**************************************************
 * 販売店の管理画面一覧にカスタムフィールドを表示させる
**************************************************/

function add_posts_columns( $columns ) {
  $columns['name'] = '店舗名';
  $columns['tiku'] = '都道府県';
  return $columns;
}
function custom_posts_column( $column_name, $post_id ) {
  if ( $column_name == 'name' ) {
    $shop_name = get_post_meta( $post_id , 'shop_name' , true );
    echo ( $shop_name ) ? $shop_name : '－';
  }
  if ( $column_name == 'tiku' ) {
    $area = get_post_meta( $post_id , 'area' , true );
    echo ( $area ) ? $area : '－';
  }
}
// カスタム投稿（「shop」というカスタム投稿の場合）
add_filter( 'manage_shop_posts_columns', 'add_posts_columns' );
add_action( 'manage_shop_posts_custom_column', 'custom_posts_column', 10, 2 );

/**************************************************
 * 子ページかどうか判断する
**************************************************/
function is_child_of( $pagename ) {
  if ( is_page() ) { //固定ページである。
    global $post;
    if ( $post->ancestors ) { //誰かのサブページである。
      $root = $post->ancestors[count($post->ancestors) - 1]; //配列の一番後ろが一番上の親。
      $root_post = get_post( $root );
      $name = esc_attr( $root_post->post_name );
      if ( $pagename == $name ) return true;
    }
  }
  return false;
}

/**************************************************
 * ショートコードを使ったphpファイルの呼び出し方法
**************************************************/
function Include_my_php($params = array()) {
    extract(shortcode_atts(array(
        'file' => 'default'
    ), $params));
    ob_start();
    include(get_theme_root() . '/' . get_template() . "/myphpfiles/$file.php");
    return ob_get_clean();
}
add_shortcode('myphp', 'Include_my_php');

/**************************************************
 * 改行の時に自動的にPタグが挿入されるのを防ぐ
**************************************************/
remove_filter('the_content', 'wpautop');
remove_filter( 'the_excerpt', 'wpautop' );

//ウイジェット追加
register_sidebar(array(
    'name'=>'ヘッダー下ウイジェット（タイトルなし）',
    'id'=>'header_widget_no_title',
    'description' => 'タイトルは反映されません。',
    'before_widget' => '<div class="header-widget clearfix">',
    'after_widget' => '</div>',
    'before_title' => '<p style="display:none">',
    'after_title' => '</p>',
    ));
register_sidebar(array(
    'name'=>'ヘッダー下ウイジェット（タイトルあり）',
    'id'=>'header_widget',
    'before_widget' => '<div class="header-widget clearfix">',
    'after_widget' => '</div>',
    'before_title' => '<p class="header-widget-title">',
    'after_title' => '</p>',
    ));

/**************************************************
 * カスタムメニューの「タイトル属性」を
 * アンカーテキストとして出力する
**************************************************/
function attribute_add_nav_menu($item_output, $item){
  return preg_replace('/(<a.*?>[^<]*?)</', '$1' . "<br><span>{$item->attr_title}</span><", $item_output);
}
add_filter('walker_nav_menu_start_el', 'attribute_add_nav_menu', 10, 4);

/**************************************************
 * 画像に自動設定されるsrcset属性を無効化する
**************************************************/
add_filter( 'wp_calculate_image_srcset_meta', '__return_null' );

/**************************************************
 * 管理画面での元来の項目位置を整理
**************************************************/
function customize_menus(){
global $menu;
$menu[14] = $menu[2];  //ダッシュボードの移動
unset($menu[2]);
$menu[18] = $menu[5];  //投稿の移動
unset($menu[5]);
$menu[19] = $menu[10];  //メディアの移動
unset($menu[10]);
unset($menu[25]); // コメントの削除
}
add_action( 'admin_menu', 'customize_menus' );

/**************************************************
 * ページタイトルの余計な文字を削除 
**************************************************/
add_filter( 'get_the_archive_title', function ($title) {
    if (is_category()) {
        $title = single_cat_title('',false);
    } elseif (is_tag()) {
        $title = single_tag_title('',false);
	} elseif (is_tax()) {
	    $title = single_term_title('',false);
	} elseif (is_post_type_archive() ){
		$title = post_type_archive_title('',false);
	} elseif (is_date()) {
	    $title = get_the_time('Y年n月');
	} elseif (is_search()) {
	    $title = '検索結果：'.esc_html( get_search_query(false) );
	} elseif (is_404()) {
	    $title = '「404」ページが見つかりません';
	} else {

	}
    return $title;
});

// head内にカスタム用のコードを追加する
function meta_headcustomtags() {
	$url = $_SERVER['REQUEST_URI'];
	$my_css_dir = get_stylesheet_directory_uri() . "/myfiles/css/";
	//全サイト共通
	echo "<link rel='stylesheet' type='text/css' media='all' href='" . $my_css_dir . "reset.css?" . time() . "' />\n";
	echo "<link rel='stylesheet' type='text/css' media='all' href='" . $my_css_dir . "common.css?" . time() . "' />\n";
	//TOPページ
	if(is_front_page()){
		echo "<link rel='stylesheet' type='text/css' media='all' href='" . $my_css_dir . "top.css?" . time() . "' />\n";
	}
	//TOPでない場合
	else {
		echo "<link rel='stylesheet' type='text/css' media='all' href='" . $my_css_dir . "" . basename(get_permalink()) . ".css?" . time() . "' />\n";
	}
	//FontAwesome
	echo "<script src='https://kit.fontawesome.com/a807d391a6.js' crossorigin='anonymous'></script>\n";
	
}
add_action( 'wp_head', 'meta_headcustomtags', 99);