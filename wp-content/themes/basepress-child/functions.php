<?php
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}
// 自動整形を無効にする
function disable_page_wpautop() {
	//TOPページ
	if ( is_front_page() )remove_filter( 'the_content', 'wpautop' );
	if ( is_front_page() )remove_filter( 'the_excerpt', 'wpautop' );
	//固定ページ
	if ( is_page() )remove_filter( 'the_content', 'wpautop' );
	if ( is_page() )remove_filter( 'the_excerpt', 'wpautop' );
}
add_action( 'wp', 'disable_page_wpautop' );
//スパムメール対策（日本語を含まないメールをはじく）
function wpcf7_validate_spam_message( $result, $tag ) {
  $value = str_replace(array(PHP_EOL,' '), '', esc_attr($_POST['your-subject']));
  if (!empty($value)) {
    if (preg_match('/^[!-~]+$/', $value)) {
      $result['valid'] = false;
      $result['reason'] = array('your-subject' => '日本語で入力してください');
    }
  }
  return $result;
}

// 条件分岐で子ページの判断ができるように
function is_subpage() {
  global $post;
  if (is_page() && $post->post_parent){
    $parentID = $post->post_parent;
    return $parentID;
  } else {
    return false;
  };
};
// head内にカスタム用のコードを追加する
function meta_headcustomtags() {
	$url = $_SERVER['REQUEST_URI'];
	$my_css_dir = get_stylesheet_directory_uri() . "/myfiles/css/";
	 $parent_slug = get_post($parent_id)->post_name; 
	//全サイト共通
	echo "<link rel='stylesheet' type='text/css' media='all' href='" . $my_css_dir . "style-plus.css?" . time() . "' />\n";
	if(is_subpage){
		echo "<link rel='stylesheet' type='text/css' media='all' href='" . $my_css_dir . $parent_slug .".css?" . time() . "' />\n";
	}
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
//投稿画面カテゴリをラジオボタンに
function change_category_to_radio() {
	?>
<script>
	jQuery(function($) {
		// カテゴリーをラジオボタンに変更
		$('#categorychecklist input[type=checkbox]').each(function() {
			$(this).replaceWith($(this).clone().attr('type', 'radio'));
		});
		// 「新規カテゴリーを追加」を非表示
		$('#category-adder').hide();
		// 「よく使うもの」を非表示
		$('#category-tabs').hide();
	});
	</script>
<?php
}
add_action( 'admin_head-post-new.php', 'change_category_to_radio' );
add_action( 'admin_head-post.php', 'change_category_to_radio' );

// メニューの並び替え
function custom_menu_order($menu_ord) {
    if (!$menu_ord) return true;
    return array(
        'index.php', // ダッシュボード
        'separator1', // 仕切り
        'edit.php?post_type=product', // 製品情報
        'edit.php?post_type=shop_g', // ガソリンケア店
        'edit.php?post_type=shop_d', // ディーゼルケア店
        'edit.php?post_type=shop_i', // 製品販売店
        'edit.php?post_type=page', // 固定ページ
        'edit.php', // 登校
        'separator-last', // 仕切り
        'upload.php', // メディア
    );
}
add_filter('custom_menu_order', 'custom_menu_order');
add_filter('menu_order', 'custom_menu_order');

/*-------------------------------------------*/
/*  head内にカスタム用のコードを追加する
/*-------------------------------------------*/
function meta_headcustomtags() {
	$url = $_SERVER[ 'REQUEST_URI' ];

	function readStyle( $name ) {
		$the_test = STYLESHEETPATH . '/mytest/css/' . $name . '.css';
		if ( is_user_logged_in() && file_exists( $the_test ) ) { //テストモード対応
			$myfiles = get_stylesheet_directory_uri() . "/mytest/css/";
		} else {
			$myfiles = get_stylesheet_directory_uri() . "/myfiles/css/";
		}
		echo "<link rel='stylesheet' type='text/css' media='all' href='" . $myfiles . $name . ".css?" . time() . "' />\n";
	}
	//全ページ
	readStyle( 'default' );
	readStyle( 'style-plus' );
	//urlに特定の文字列を含む場合
	if ( strstr( $url, '条件となる文字列' ) == true ) {
		readStyle( '' );
	}
	if ( is_page() ) {
		//TOPページ
		if ( is_front_page() ) {
			readStyle( 'top' );
		} else {
			//固定のページ場合
			readStyle( 'page' );
			//次ページ専用css
			readStyle( basename( get_permalink() ) );
		}
	}
	//投稿記事場合
	if ( is_single() ) {
			readStyle( 'post' );
	}
	//FontAwesome
	echo "<script src='https://kit.fontawesome.com/a807d391a6.js' crossorigin='anonymous'></script>\n";
	//AdobeFont
	echo "<link rel='stylesheet' href='https://use.typekit.net/ivb6hsz.css'>";
	//最新jquery
	echo "<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>\n";
}
add_action( 'wp_head', 'meta_headcustomtags', 99 );

/*-------------------------------------------*/
/*  the_content()の内容操作
/*-------------------------------------------*/
function content_change( $the_content ) {
	$content = wpautop( get_the_content() );
	//$myDir
	$myDir = 'myfiles';
	//$myPosttype
	$myPosttype = get_post_type( $post );
	//$myParentdir
	$myParentdir = null;
	global $post;
	$parent = $post->post_parent;
	if ( $parent ) {
		$myParentdir = get_post( $parent )->post_name . '/';
	}
	//$myFilnename
	if ( is_singular( 'post' ) ) {
		$filename = get_the_ID();
	}
	elseif(is_front_page()){
		$filename = 'top';
	}
	else {
		$filename = basename( get_permalink() );
	}
	$myFilename = $filename;

	$myfile = STYLESHEETPATH  . '/'. $myDir . '/content/' . $myPosttype . '/' . $myParentdir . $myFilename . '.php';
	$mytest = STYLESHEETPATH  . '/mytest/content/' . $myPosttype . '/' . $myParentdir . $myFilename . '.php';
	if ( is_page() || is_singular() ) {
		if( file_exists( $myfile ) ) {
			$content = file_get_contents( $myfile );
		}
		if(is_user_logged_in() && file_exists( $mytest ) ){
			echo '<p class="testText">テストファイル反映中</p>';
			$content = file_get_contents( $mytest );
		}
	}
	return $content;
}
add_filter( 'the_content', 'content_change' );

/*-------------------------------------------*/
/*  page-content内でスラッグ名の画像ディレクトリを呼び出す
/*-------------------------------------------*/
function print_image( $atts ) {
	//$myDir
	$myDir = 'myfiles';
	//$myPosttype
	$myPosttype = get_post_type( $post );
	//$myParentdir
	$myParentdir = null;
	global $post;
	$parent = $post->post_parent;
	if ( $parent ) {
		$myParentdir = get_post( $parent )->post_name . '/';
	}
	//$myFilnename
	if ( is_singular( 'post' ) ) {
		$filename = get_the_ID();
	} elseif(is_front_page()){
		$filename = 'top';
	}else {
		$filename = basename( get_permalink() );
	}
	$myFilename = $filename;

	$imgdir = get_stylesheet_directory_uri()   . '/'. $myDir . '/img/' . $myPosttype . '/' . $myParentdir . $myFilename . '/';
	return '<figure class="'. $atts[ 'fig_class' ] .'"><img src="' . $imgdir . $atts[ 'src' ] . '?'. time().'" alt="' . $atts[ 'alt' ] . '" class="' . $atts[ 'class' ] . '"></figure>';
}
add_shortcode( 'img', 'print_image' );


/*-------------------------------------------*/
/*  ショートコードで任意の画像フォルダ名を呼び出す
/* page-content内限定
/*-------------------------------------------*/
function myfiles_image( $atts ) {
	$imgdir = get_stylesheet_directory_uri() . "/myfiles/img/";
	return '<figure><img src="' . $imgdir . $atts[ 'src' ] . '" alt="' . $atts[ 'alt' ] . '"></figure>';
}
add_shortcode( 'imgdir', 'myfiles_image' );