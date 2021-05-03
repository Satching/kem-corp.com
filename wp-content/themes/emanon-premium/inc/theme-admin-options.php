<?php
/**
 * Theme admin customize
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

/**
 * 管理画面用 外部JSファイルと外部CSSファイルの読み込み
 */
if ( ! function_exists( 'emanon_admin_scripts' ) ) {
add_action( 'admin_enqueue_scripts', 'emanon_admin_scripts' );
function emanon_admin_scripts() {

	// mediaの指定
	wp_enqueue_media();
	wp_enqueue_script( 'media-script', T_DIRE_URI . '/assets/js/media.js', array( 'jquery' ), '', true );

	// wp−color-pickerの指定
	wp_enqueue_style( 'wp-color-picker' );
	wp_enqueue_script( 'cookie-script', T_DIRE_URI . '/assets/js/cookie.min.js', array('jquery'), '', true );

	// JSファイルの指定
	wp_enqueue_script( 'jquery-ui-dialog' );
	wp_enqueue_script( 'emanon-dashboard-script', T_DIRE_URI . '/assets/js/theme-dashboard-page.js', array('jquery'), '', true );
	wp_enqueue_script( 'colorpicker-script', T_DIRE_URI . '/assets/js/colorpicker.js', array( 'wp-color-picker' ), '', true );

	// CSSファイルの指定
	wp_enqueue_style( 'wp-jquery-ui-dialog' );
	wp_enqueue_style( 'emanon-admin-style', T_DIRE_URI . '/assets/css/theme-admin-style.css', array(), true );

}
} // End if()

if ( ! function_exists( 'enqueue_block_editor_assets' ) ) {
/**
 * ブロックエディター用のJSを読み込み
 */
add_action( 'enqueue_block_editor_assets', 'emanon_editor_wp_block_scripts' );
function emanon_editor_wp_block_scripts() {
	wp_enqueue_script( 'editor-wp-block', T_DIRE_URI . '/assets/js/editor-wp-block.js', array( 'wp-blocks' ), THEME_VERSION , true );
}
} // End if()

if ( ! function_exists( 'emanon_editor_customizer_style' ) ) {
/**
 * ブロックエディタにテーマCSSを適用
 */
add_action( 'enqueue_block_editor_assets', 'emanon_editor_customizer_style' );
function emanon_editor_customizer_style() {
	wp_enqueue_style( 'emanon_customizer_style',  T_DIRE_URI . '/assets/css/editor-customizer.css', false, THEME_VERSION ,'all' );
	wp_add_inline_style( 'emanon_customizer_style', emanon_style_theme_block() );
}
} // End if()

/**
 * 画像アップロード
 */
function emanon_custom_media_uploader( $name, $value, $id ) {

	?>
	<input type="hidden" id="src_<?php echo $id ; ?>" name="<?php echo $name ; ?>" value="<?php echo $value ; ?>">
	<div id="preview_<?php echo $id ; ?>" class="media_preview">
	<?php if( $value ): ?>
	<img class="uploded-thumbnail" width="400" src="<?php echo $value; ?>" alt="<?php _e( '画像を選択', 'emanon-premium' ); ?>">
	<?php endif; ?>
	</div>
	<input class="button" type="button" name="media-select" data-id="<?php echo $id; ?>" value="<?php _e( '画像の追加', 'emanon-premium' ) ?>" />
	<input class="button" type="button" name="media-clear" data-id="<?php echo $id; ?>" value="<?php _e( '画像の削除', 'emanon-premium' ) ?>" />
	<?php
}

function emanon_custom_uploader( $name, $value, $id = null ) {
	$image_id = isset($id) ? $id : $name;
	?>
	<input type="text" name="<?php echo $name; ?>" value="<?php echo $value; ?>" />
	<input type="button" name="<?php echo $name; ?>_select" class="button" value="<?php _e( '画像の追加', 'emanon-premium' ) ?>" />
	<input type="button" name="<?php echo $name; ?>_clear" class="button" value="<?php _e( '画像の削除', 'emanon-premium' ) ?>" />
	<div id="<?php echo $image_id; ?>_thumbnail" class="uploded-thumbnail">
	<?php if ($value): ?>
	<img width="400" src="<?php echo $value; ?>" alt="<?php _e( '画像を選択', 'emanon-premium' ); ?>">
	<?php endif ?>
	</div>

	<script type="text/javascript">
	(function ($) {

		var custom_uploader;

		$("input:button[name='<?php echo $name; ?>_select']").click(function(e) {

				e.preventDefault();
				if (custom_uploader) {
					custom_uploader.open();
					return;
				}

				custom_uploader = wp.media({

					title: "<?php _e( '画像を選択', 'emanon-premium' ); ?>",
					library: {
						 type: "image"
					},
					button: {
						 text: "<?php _e( '画像を選択', 'emanon-premium' ); ?>"
					},
					multiple: false

				});

				custom_uploader.on("select", function() {

						var images = custom_uploader.state().get("selection");

						images.each(function(file) {
							$("input:text[name='<?php echo $name; ?>']").val("");
							$("#<?php echo $image_id ; ?>_thumbnail").empty();
							$("input:text[name='<?php echo $name; ?>']").val(file.attributes.sizes.full.url);
							$("#<?php echo $image_id ; ?>_thumbnail").append('<img width="400" src="'+file.attributes.sizes.full.url+'" />');
							$(".widget_img_check").prop('checked', false);

						});

				});

				custom_uploader.open();

			});

			$("input:button[name='<?php echo $name; ?>_clear']").click(function() {
			$("input:text[name='<?php echo $name; ?>']").val("");
			$("#<?php echo $image_id ; ?>_thumbnail").empty();
			$(".widget_img_check").prop('checked', false);

			});

	})(jQuery);
	</script>
	<?php
}

/**
 * カスタムフィールドの開閉
 */
add_action (
	'admin_footer-post-new.php',
	function () {
		global $post_type;
		$closed = get_theme_mod( 'postbox_closed');
		if( 'post' === $post_type && $closed || 'news' === $post_type && $closed || 'seminar' === $post_type && $closed || 'request' === $post_type && $closed || 'sales' === $post_type && $closed || 'page' === $post_type && $closed ) {
		?>
		<script>
		jQuery( function($) {
			$('.postbox').addClass('closed'); // カスタムフィールドを閉じる
		});
		</script>
<?php }
	}
);

add_action (
	'admin_footer-post.php',
	function () {
		global $post_type;
		$closed = get_theme_mod( 'postbox_closed');
		if( 'post' === $post_type && $closed || 'news' === $post_type && $closed || 'seminar' === $post_type && $closed || 'request' === $post_type && $closed || 'sales' === $post_type && $closed || 'page' === $post_type && $closed ) {
		?>
		<script>
		jQuery( function($) {
			$('.postbox').addClass('closed'); // カスタムフィールドを閉じる
		});
		</script>
<?php }
	}
);

/**
 * Sub Title設定
 */
add_action(
	'add_meta_boxes',
	function () {
		$post_subtitle = get_theme_mod( 'add_post_subtitle' );
		$page_subtitle = get_theme_mod( 'add_page_subtitle' );

		if( $post_subtitle ) {
			$screens = array( 'post', 'news', 'seminar', 'request', 'sales' );
			foreach ( $screens as $screen ) {
				add_meta_box( 'subtitle_setting', __( 'サブタイトル設定', 'emanon-premium' ), 'subtitle_setting_form', $screen, 'normal', 'low' );
			}
		}

		if( $page_subtitle ) {
			add_meta_box( 'subtitle_setting', __( 'サブタイトル設定', 'emanon-premium' ), 'subtitle_setting_form', 'page', 'normal', 'low' );
		}

	}
);

/**
 * フォーム表示
 */
function subtitle_setting_form() {
	global $post;
	wp_nonce_field( wp_create_nonce(__FILE__), 'emanon_nonce_subtitle_setting' );
?>

	<input type="text" name="emanon_subtitle" id="emanon_subtitle" value="<?php echo esc_attr( get_post_meta( $post->ID, 'emanon_subtitle', true ) ) ?>" size="20" style="width:80%" />

<?php
}

//入力内容の更新処理
add_action(
	'save_post',
	function ($post_id) {
	
		// nonceがセットされていない場合は終了
		if ( ! isset( $_POST['emanon_nonce_subtitle_setting'] ) ) {
			return;
		}
		
		// nonceが一致しない場合は終了
		if ( ! wp_verify_nonce( $_POST['emanon_nonce_subtitle_setting'], wp_create_nonce(__FILE__) ) ) {
			return;
		}

		// 自動保存の場合は終了
		if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE) {
			return;
		}

		// 投稿権限がない場合は終了
		if ( 'page' == $_POST['post_type'] ) {
				if ( ! current_user_can( 'edit_page', $post_id ) ) {
					return;
				}
		} else {
				if ( ! current_user_can( 'edit_post', $post_id ) ) {
					return;
				}
		}

			$key = 'emanon_subtitle';
			$meta_value = $_POST[$key];

			if( get_post_meta ( $post_id, $key ) == "" ) {
				add_post_meta ( $post_id, $key, $meta_value, true );
				} elseif ( $meta_value != get_post_meta( $post_id, $key, true ) ) {
				update_post_meta( $post_id, $key, $meta_value );
				} elseif ( $meta_value == "" ) {
				delete_post_meta( $post_id, $key, get_post_meta( $post_id, $key, true ) );
			}

	}
);

//入力内容の更新処理
add_action(
	'save_post',
	function ( $post_id ) {

		$my_nonce = isset( $_POST[ 'my_nonce' ] ) ? $_POST[ 'my_nonce' ] : null;

		if( ! wp_verify_nonce ( $my_nonce, wp_create_nonce (__FILE__ ) ) ) { return $post_id; }
		if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE) { return $post_id; }
		if ( 'page' == $_POST['post_type'] ) {
			if ( ! current_user_can( 'edit_page', $post_id ) )
				return $post_id;
			} else {
			if ( ! current_user_can( 'edit_post', $post_id ) )
				return $post_id;
		}

		$subtitle = isset( $_POST[ 'emanon_subtitle' ] ) ? $_POST[ 'emanon_subtitle' ] : null;

		if( get_post_meta ( $post_id, 'emanon_subtitle') == "" ) {
			add_post_meta ( $post_id, 'emanon_subtitle', $subtitle, true );
			} elseif ( $subtitle != get_post_meta( $post_id, 'emanon_subtitle', true ) ) {
			update_post_meta( $post_id, 'emanon_subtitle', $subtitle );
			} elseif ( $subtitle == "" ) {
			delete_post_meta( $post_id, 'emanon_subtitle', get_post_meta( $post_id, 'emanon_subtitle', true ) );
		}

	}
);

/**
 * meta description設定
 */
add_action(
	'add_meta_boxes',
	function () {

		$disable_seo_meta_tag = get_theme_mod( 'disable_seo_meta_tag' );
		if ( $disable_seo_meta_tag ) {
			return;
		}

		$post_meta_description = get_theme_mod( 'add_post_meta_description' );
		$page_meta_description = get_theme_mod( 'add_page_meta_description' );

		if( $post_meta_description ) {
			$screens = array( 'post', 'news', 'seminar', 'request', 'sales' );
			foreach ( $screens as $screen ) {
				add_meta_box( 'description_setting', __( 'meta description設定', 'emanon-premium' ), 'description_setting_form', $screen, 'normal', 'low' );
			}
		}

		if( $page_meta_description ) {
			add_meta_box( 'description_setting', __( 'meta description設定', 'emanon-premium' ), 'description_setting_form', 'page', 'normal', 'low' );
		}

	}
);

/**
 * フォーム表示
 */
function description_setting_form() {
	global $post;
	wp_nonce_field( wp_create_nonce(__FILE__), 'emanon_nonce_meta_description' );
?>

	<textarea name="emanon_meta_description" id="emanon_meta_description" cols="60" rows="4" style="width:80%"><?php echo esc_attr(	get_post_meta( $post->ID, 'emanon_meta_description', true) ); ?></textarea>

<?php
}

//入力内容の更新処理
add_action(
	'save_post',
	function ($post_id) {
	
		// nonceがセットされていない場合は終了
		if ( ! isset( $_POST['emanon_nonce_meta_description'] ) ) {
			return;
		}
		
		// nonceが一致しない場合は終了
		if ( ! wp_verify_nonce( $_POST['emanon_nonce_meta_description'], wp_create_nonce(__FILE__) ) ) {
			return;
		}

		// 自動保存の場合は終了
		if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE) {
			return;
		}

		// 投稿権限がない場合は終了
		if ( 'page' == $_POST['post_type'] ) {
				if ( ! current_user_can( 'edit_page', $post_id ) ) {
					return;
				}
		} else {
				if ( ! current_user_can( 'edit_post', $post_id ) ) {
					return;
				}
		}

			$key = 'emanon_meta_description';
			$meta_value = $_POST[$key];

			if( get_post_meta ( $post_id, $key ) == "" ) {
				add_post_meta ( $post_id, $key, $meta_value, true );
				} elseif ( $meta_value != get_post_meta( $post_id, $key, true ) ) {
				update_post_meta( $post_id, $key, $meta_value );
				} elseif ( $meta_value == "" ) {
				delete_post_meta( $post_id, $key, get_post_meta( $post_id, $key, true ) );
			}

	}
);

add_action( 'admin_head-post.php', 'meta_description_counter' );
add_action( 'admin_head-post-new.php', 'meta_description_counter' );
function meta_description_counter() {
	global $post_type;
	$post_meta_description = get_theme_mod( 'add_post_meta_description' );
	$page_meta_description = get_theme_mod( 'add_page_meta_description' );

	if ( 'post' === $post_type && ! $post_meta_description ) {
		return;
	}
	if ( 'page' === $post_type && ! $page_meta_description ) {
		return;
	}
?>
<script type="text/javascript">
	jQuery( document ).ready(function($) {
		if( 'post' == $('#post_type').val() || 'page' == $('#post_type').val() || 'news' == $('#post_type').val() || 'seminar' == $('#post_type').val() || 'request' == $('#post_type').val() || 'sales' == $('#post_type').val() ) {
		meta_description_count_field( "#emanon_meta_description" );
		}
	});

	function meta_description_count_field( target ) {
		jQuery( target ).after( "<span class=\"meta_description_word_counter\" style='display:block;'></span>" );
		jQuery( target ).bind({
		keyup: function() {
		meta_description_set_counter();
		},
		change: function() {
		meta_description_set_counter();
	}
	});

	meta_description_set_counter();
	function meta_description_set_counter(){
		jQuery( "span.meta_description_word_counter" ).text( "<?php _e( '文字数', 'emanon-premium' ); ?>"+jQuery( target ).val().length );
		};
	}
</script>
<?php
}

/**
 * カスタムCSS設定
 */
add_action(
	'add_meta_boxes',
	function () {
		$post_custom_css = get_theme_mod( 'add_post_custom_css' );
		$page_custom_css = get_theme_mod( 'add_page_custom_css' );

		if( $post_custom_css ) {
			$screens = array( 'post', 'news', 'seminar', 'request', 'sales' );
			foreach ( $screens as $screen ) {
				add_meta_box( 'custom_css', __( 'カスタムCSS設定', 'emanon-premium' ), 'custom_css_setting_form', $screen, 'normal', 'low' );
			}
		}

		if( $page_custom_css ) {
			add_meta_box( 'custom_css', __( 'カスタムCSS設定', 'emanon-premium' ), 'custom_css_setting_form', 'page', 'normal', 'low' );
		}

	}
);

/**
 * フォーム表示
 */
function custom_css_setting_form() {
	global $post;
	wp_nonce_field( wp_create_nonce(__FILE__), 'emanon_nonce_custom_css_setting' );
?>

	<textarea name="emanon_custom_css_setting" id="emanon_custom_css_setting" cols="60" rows="3" style="width:80%"><?php echo esc_attr(	get_post_meta( $post->ID, 'emanon_custom_css_setting', true) ); ?></textarea>

<?php
}

//入力内容の更新処理
add_action(
	'save_post',
	function ($post_id) {
	
		// nonceがセットされていない場合は終了
		if ( ! isset( $_POST['emanon_nonce_custom_css_setting'] ) ) {
			return;
		}
		
		// nonceが一致しない場合は終了
		if ( ! wp_verify_nonce( $_POST['emanon_nonce_custom_css_setting'], wp_create_nonce(__FILE__) ) ) {
			return;
		}

		// 自動保存の場合は終了
		if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE) {
			return;
		}

		// 投稿権限がない場合は終了
		if ( 'page' == $_POST['post_type'] ) {
				if ( ! current_user_can( 'edit_page', $post_id ) ) {
					return;
				}
		} else {
				if ( ! current_user_can( 'edit_post', $post_id ) ) {
					return;
				}
		}

			$key = 'emanon_custom_css_setting';
			$meta_value = $_POST[$key];

			if( get_post_meta ( $post_id, $key ) == "" ) {
				add_post_meta ( $post_id, $key, $meta_value, true );
				} elseif ( $meta_value != get_post_meta( $post_id, $key, true ) ) {
				update_post_meta( $post_id, $key, $meta_value );
				} elseif ( $meta_value == "" ) {
				delete_post_meta( $post_id, $key, get_post_meta( $post_id, $key, true ) );
			}

	}
);

/**
 * カスタムJavaScript設定
 */
add_action(
	'add_meta_boxes',
	function () {

		$post_custom_javaScript = get_theme_mod( 'add_post_custom_javaScript' );
		$page_custom_javaScript = get_theme_mod( 'add_page_custom_javaScript' );

		if( $post_custom_javaScript ) {
			$screens = array( 'post', 'news', 'seminar', 'request', 'sales' );
			foreach ( $screens as $screen ) {
				add_meta_box( 'custom_js', __( 'カスタムJavaScript設定', 'emanon-premium' ), 'custom_js_setting_form', $screen, 'normal', 'low' );
			}
		}

		if( $page_custom_javaScript ) {
			add_meta_box( 'custom_js', __( 'カスタムJavaScript設定', 'emanon-premium' ), 'custom_js_setting_form', 'page', 'normal', 'low' );
		}

	}
);

//フォーム表示
function custom_js_setting_form() {
	global $post;
wp_nonce_field( wp_create_nonce(__FILE__), 'emanon_nonce_custom_js_setting' );
?>

	<textarea name="emanon_custom_js_setting" id="emanon_custom_js_setting" cols="60" rows="3" style="width:80%"><?php echo esc_attr( get_post_meta( $post->ID, 'emanon_custom_js_setting', true) ); ?></textarea>

<?php
}

//入力内容の更新処理
add_action(
	'save_post',
	function ($post_id) {
	
		// nonceがセットされていない場合は終了
		if ( ! isset( $_POST['emanon_nonce_custom_js_setting'] ) ) {
			return;
		}
		
		// nonceが一致しない場合は終了
		if ( ! wp_verify_nonce( $_POST['emanon_nonce_custom_js_setting'], wp_create_nonce(__FILE__) ) ) {
			return;
		}

		// 自動保存の場合は終了
		if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE) {
			return;
		}

		// 投稿権限がない場合は終了
		if ( 'page' == $_POST['post_type'] ) {
				if ( ! current_user_can( 'edit_page', $post_id ) ) {
					return;
				}
		} else {
				if ( ! current_user_can( 'edit_post', $post_id ) ) {
					return;
				}
		}

			$key = 'emanon_custom_js_setting';
			$meta_value = $_POST[$key];

			if( get_post_meta ( $post_id, $key ) == "" ) {
				add_post_meta ( $post_id, $key, $meta_value, true );
				} elseif ( $meta_value != get_post_meta( $post_id, $key, true ) ) {
				update_post_meta( $post_id, $key, $meta_value );
				} elseif ( $meta_value == "" ) {
				delete_post_meta( $post_id, $key, get_post_meta( $post_id, $key, true ) );
			}

	}
);

add_action( 'wp_footer','insert_custom_js', 9998 );
function insert_custom_js() {
	if ( is_singular() ) {
			$custom_js = post_custom( 'emanon_custom_js_setting' );
			if ( $custom_js ) {
				echo '<!--custom js-->'. "\n";
				echo '<script type="text/javascript">' . $custom_js . '</script>'. "\n";
				echo '<!--/.custom js-->'. "\n";
			}
	}
}

/**
 * CTA表示の設定
 */
add_action(
	'admin_menu',
	function () {

		$screens = array( 'post', 'page', );
		foreach ( $screens as $screen ) {
			add_meta_box( 'cta_setting', __( 'CTA設置', 'emanon-premium' ), 'cta_setting_form', $screen, 'side', 'default' );
		}

	}
);

//フォーム表示
function cta_setting_form() {
	global $post;

	wp_nonce_field( wp_create_nonce(__FILE__), 'emanon_nonce_cta' );

	// get CTA List
	$list_cta = array();
	$query_cta = new WP_Query(array(
			'post_type' => 'emanon-cta',
	));
	if ($query_cta->have_posts()): while($query_cta->have_posts()):
			$query_cta->next_post();
			$list_cta[] = $query_cta->post;
	endwhile; endif;

	// get CTA[Floating] List
	$list_cta_floating = array();
	$query_cta_floating = new WP_Query(array(
			'post_type' => 'emanon-floating',
	));
	if ($query_cta_floating->have_posts()): while($query_cta_floating->have_posts()):
			$query_cta_floating->next_post();
			$list_cta_floating[] = $query_cta_floating->post;
	endwhile; endif;

	// get CTA[News Letter] List
	$list_cta_newsletter = array();
	$query_cta_newsletter = new WP_Query(array(
			'post_type' => 'emanon-news-letter',
	));
	if ($query_cta_newsletter->have_posts()): while($query_cta_newsletter->have_posts()):
			$query_cta_newsletter->next_post();
			$list_cta_newsletter[] = $query_cta_newsletter->post;
	endwhile; endif;

	$cta_id_value = get_post_meta( $post->ID,'emanon_cta_id', true );

	echo '<strong>'. __( 'CTA' , 'emanon-premium') .'</strong><br>';
	echo '<select name="emanon_cta_id" id="emanon_cta_id">';
	echo '<option value="0"';
	if( $cta_id_value === '0' ){ echo 'selected'; }
	echo '>'. __( '未設定' , 'emanon-premium') .'</option>';
	echo '<option value=""';
	if( empty($cta_id_value) && $cta_id_value !== '0' ){ echo ' selected'; }
	echo '>'. __( '初期値', 'emanon-premium' ) . '</option>';
		foreach ($list_cta as $cta) :
				echo '<option value="'.$cta->ID.'"';
				if( $cta_id_value == $cta->ID ){ echo 'selected'; }
				echo '>'. $cta->post_title .'</option>';
		endforeach;
	echo '</select><br><br>' . "\n";

	$cta_floating_id_value = get_post_meta( $post->ID,'emanon_cta_floating_id', true );

	echo '<strong>'. __( 'CTA［追従型］' , 'emanon-premium') .'</strong><br>';
	echo '<select name="emanon_cta_floating_id" id="emanon_cta_floating_id">';
	echo '<option value="0"';
	if( $cta_floating_id_value === '0' ){ echo 'selected'; }
	echo '>'. __( '未設定' , 'emanon-premium') .'</option>';
	echo '<option value=""';
	if( empty($cta_floating_id_value) && $cta_floating_id_value !== '0' ){ echo ' selected'; }
	echo '>'. __( '初期値', 'emanon-premium' ) . '</option>';
		foreach ($list_cta_floating as $cta) :
				echo '<option value="'.$cta->ID.'"';
				if( $cta_floating_id_value == $cta->ID ){ echo 'selected'; }
				echo '>'. $cta->post_title .'</option>';
		endforeach;
	echo '</select><br><br>' . "\n";

	$cta_newsletter_id_value = get_post_meta( $post->ID,'emanon_cta_newsletter_id', true );

	echo '<strong>'. __( 'CTA［メルマガ］' , 'emanon-premium') .'</strong><br>';
	echo '<select name="emanon_cta_newsletter_id" id="emanon_cta_newsletter_id">';
	echo '<option value="0"';
	if( $cta_newsletter_id_value === '0' ){ echo 'selected'; }
	echo '>'. __( '未設定' , 'emanon-premium') .'</option>';
	echo '<option value=""';
	if( empty( $cta_newsletter_id_value ) && $cta_newsletter_id_value !== '0' ){ echo ' selected'; }
	echo '>'. __( '初期値', 'emanon-premium' ) . '</option>';
		foreach ( $list_cta_newsletter as $cta ) :
				echo '<option value="'.$cta->ID.'"';
				if( $cta_newsletter_id_value == $cta->ID ){ echo 'selected'; }
				echo '>'. $cta->post_title .'</option>';
		endforeach;
	echo '</select><br><br>' . "\n";

}

//入力内容の更新処理
add_action(
	'save_post',
	function ($post_id) {
	
		// nonceがセットされていない場合は終了
		if ( ! isset( $_POST['emanon_nonce_cta'] ) ) {
			return;
		}
		
		// nonceが一致しない場合は終了
		if ( ! wp_verify_nonce( $_POST['emanon_nonce_cta'], wp_create_nonce(__FILE__) ) ) {
			return;
		}

		// 自動保存の場合は終了
		if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE) {
			return;
		}

		// 投稿権限がない場合は終了
		if ( 'page' == $_POST['post_type'] ) {
				if ( ! current_user_can( 'edit_page', $post_id ) ) {
					return;
				}
		} else {
				if ( ! current_user_can( 'edit_post', $post_id ) ) {
					return;
				}
		}

		$meta_values = array(
			'emanon_cta_id',
			'emanon_cta_floating_id',
			'emanon_cta_newsletter_id',
		);

		foreach ( $meta_values as $key ) {

			$meta_value = $_POST[$key];

			if( get_post_meta ( $post_id, $key ) == "" ) {
				add_post_meta ( $post_id, $key, $meta_value, true );
				} elseif ( $meta_value != get_post_meta( $post_id, $key, true ) ) {
				update_post_meta( $post_id, $key, $meta_value );
				} elseif ( $meta_value == "" ) {
				delete_post_meta( $post_id, $key, get_post_meta( $post_id, $key, true ) );
			}

		}

	}
);

/**
 * おすすめ記事の表示設定
 */
add_action(
	'admin_menu',
	function () {

		$screens = array( 'post', 'seminar' );
		foreach ( $screens as $screen ) {
			add_meta_box( 'featured_entry_setting', __( 'おすすめ記事設定', 'emanon-premium' ), 'featured_entry_setting_form', $screen, 'side', 'default' );
		}

	}
);

//フォーム表示
function featured_entry_setting_form() {
	global $post;

	wp_nonce_field( wp_create_nonce(__FILE__), 'emanon_nonce_featured_entry' );

	$meta_value = get_post_meta( $post->ID, 'emanon_featured_entry', true );

	if( $meta_value == 1 ) {
		$checked = "checked";
		} else { $checked = "/";
	}

?>

	<label for="emanon_featured_entry">
		<span class="switch-button">
			<input type="checkbox" name="emanon_featured_entry" id="emanon_featured_entry" value="1" <?php echo esc_attr( $checked ); ?>>
			<span class="switch-slider"></span>
			<span class="switch-button__label">
			<?php _e( 'おすすめ記事に指定', 'emanon-premium' ); ?>
			</span>
		</span>
	</label>

<?php
}

//入力内容の更新処理
add_action(
	'save_post',
	function ($post_id) {
	
		// nonceがセットされていない場合は終了
		if ( ! isset( $_POST['emanon_nonce_featured_entry'] ) ) {
			return;
		}
		
		// nonceが一致しない場合は終了
		if ( ! wp_verify_nonce( $_POST['emanon_nonce_featured_entry'], wp_create_nonce(__FILE__) ) ) {
			return;
		}

		// 自動保存の場合は終了
		if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE) {
			return;
		}

		// 投稿権限がない場合は終了
		if ( 'page' == $_POST['post_type'] ) {
				if ( ! current_user_can( 'edit_page', $post_id ) ) {
					return;
				}
		} else {
				if ( ! current_user_can( 'edit_post', $post_id ) ) {
					return;
				}
		}

			$key = 'emanon_featured_entry';
			$meta_value = $_POST[$key];

			if( get_post_meta ( $post_id, $key ) == "" ) {
				add_post_meta ( $post_id, $key, $meta_value, true );
				} elseif ( $meta_value != get_post_meta( $post_id, $key, true ) ) {
				update_post_meta( $post_id, $key, $meta_value );
				} elseif ( $meta_value == "" ) {
				delete_post_meta( $post_id, $key, get_post_meta( $post_id, $key, true ) );
			}

	}
);

/**
 * レイアウト設定
 */
add_action(
	'add_meta_boxes',
	function () {

		$screens = array( 'post', 'page' );
		foreach ( $screens as $screen ) {
			add_meta_box( 'layout_setting', __( 'レイアウト設定', 'emanon-premium' ), 'layout_setting_form', $screen, 'side', 'low' );
		}

	}
);

//フォーム表示
function layout_setting_form() {
	global $post;

	wp_nonce_field( wp_create_nonce(__FILE__), 'emanon_nonce_layout' );

	$meta_value = get_post_meta( $post->ID, 'emanon_hide_sidebar', true );

	if( $meta_value == 1 ) {
		$checked = "checked";
		} else { $checked = "/";
	}
?>

	<strong><?php _e( 'ページレイアウト', 'emanon-premium' ); ?></strong>
	<br>
	<label for="emanon_hide_sidebar">
		<span class="switch-button">
			<input type="checkbox" name="emanon_hide_sidebar" id="emanon_hide_sidebar" value="1" <?php echo esc_attr( $checked ); ?>>
			<span class="switch-slider"></span>
			<span class="switch-button__label">
			<?php _e( 'サイドバーなし', 'emanon-premium' ); ?>
			</span>
		</span>
	</label>
	<br>
	<strong><?php _e( 'ヘッダー幅', 'emanon-premium' ); ?></strong>
	<br>
	<?php
		$meta_key = 'emanon_article_header_width';
		$meta_value = get_post_meta( $post->ID, $meta_key, true ) ?: 'default';
		$array = [
			'default'            => __( '初期値', 'emanon-premium' ),
			'header__normal'     => __( '通常', 'emanon-premium' ),
			'header__full-width' => __( '全幅', 'emanon-premium' ),
			'header__narrow'     => __( '狭幅', 'emanon-premium' ),
		];
		foreach ( $array as $key => $val ) :
		$checked = ( $meta_value === $key ) ? ' checked' : '';
		$meta_id = $meta_key . '-' . $key;
	
		echo '<label for="' . $meta_id . '" class="u-display-block">
			<input
				type="radio"
				id="' . $meta_id .' "
				name="' . $meta_key . '"
				value="' . $key . '"
				' . $checked . '
			/>' . $val . '</label>';

		endforeach;

}

//入力内容の更新処理
add_action(
	'save_post',
	function ($post_id) {
	
		// nonceがセットされていない場合は終了
		if ( ! isset( $_POST['emanon_nonce_layout'] ) ) {
			return;
		}
		
		// nonceが一致しない場合は終了
		if ( ! wp_verify_nonce( $_POST['emanon_nonce_layout'], wp_create_nonce(__FILE__) ) ) {
			return;
		}

		// 自動保存の場合は終了
		if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE) {
			return;
		}

		// 投稿権限がない場合は終了
		if ( 'page' == $_POST['post_type'] ) {
				if ( ! current_user_can( 'edit_page', $post_id ) ) {
					return;
				}
		} else {
				if ( ! current_user_can( 'edit_post', $post_id ) ) {
					return;
				}
		}

		$meta_values = array(
			'emanon_hide_sidebar',
			'emanon_article_header_width',
		);

		foreach ( $meta_values as $key ) {

			$meta_value = $_POST[$key];

			if( get_post_meta ( $post_id, $key ) == "" ) {
				add_post_meta ( $post_id, $key, $meta_value, true );
				} elseif ( $meta_value != get_post_meta( $post_id, $key, true ) ) {
				update_post_meta( $post_id, $key, $meta_value );
				} elseif ( $meta_value == "" ) {
				delete_post_meta( $post_id, $key, get_post_meta( $post_id, $key, true ) );
			}

		}

	}
);

/**
 * 非表示設定
 */
add_action(
	'add_meta_boxes',
	function () {

		$screens = array( 'post', 'page' );
		foreach ( $screens as $screen ) {
			add_meta_box( 'hide_setting', __( '非表示設定', 'emanon-premium' ), 'hide_setting_form', $screen, 'side', 'low' );
		}

	}
);

//フォーム表示
function hide_setting_form() {
	global $post;

	wp_nonce_field( wp_create_nonce(__FILE__), 'emanon_nonce_hide' );

	$meta_value = get_post_meta( $post->ID, 'emanon_hide_featured_image', true );

	if( $meta_value == 1 ) {
		$checked = "checked";
		} else { $checked = "/";
	}
?>

	<label for="emanon_hide_featured_image">
		<span class="switch-button">
			<input type="checkbox" name="emanon_hide_featured_image" id="emanon_hide_featured_image" value="1" <?php echo esc_attr( $checked ); ?>>
			<span class="switch-slider"></span>
			<span class="switch-button__label">
			<?php _e( 'アイキャッチ画像', 'emanon-premium' ); ?>
			</span>
		</span>
	</label>
	<br>

	<?php
		$meta_value = get_post_meta( $post->ID, 'emanon_hide_toc', true );
	
		if( $meta_value == 1 ) {
			$checked = "checked";
			} else { $checked = "/";
		}
	?>

	<label for="emanon_hide_toc">
		<span class="switch-button">
			<input type="checkbox" name="emanon_hide_toc" id="emanon_hide_toc" value="1" <?php echo esc_attr( $checked ); ?>>
			<span class="switch-slider"></span>
			<span class="switch-button__label">
			<?php _e( '目次', 'emanon-premium' ); ?>
			</span>
		</span>
	</label>
	<br>

	<?php
		$meta_value = get_post_meta( $post->ID, 'emanon_hide_sns', true );
	
		if( $meta_value == 1 ) {
			$checked = "checked";
			} else { $checked = "/";
		}
	?>

	<label for="emanon_hide_sns">
		<span class="switch-button">
			<input type="checkbox" name="emanon_hide_sns" id="emanon_hide_sns" value="1" <?php echo esc_attr( $checked ); ?>>
			<span class="switch-slider"></span>
			<span class="switch-button__label">
			<?php _e( 'SNSシェアボタン', 'emanon-premium' ); ?>
			</span>
		</span>
	</label>
	<br>

	<?php
		$meta_value = get_post_meta( $post->ID, 'emanon_hide_ad', true );
	
		if( $meta_value == 1 ) {
			$checked = "checked";
			} else { $checked = "/";
		}
	?>

	<label for="emanon_hide_ad">
		<span class="switch-button">
			<input type="checkbox" name="emanon_hide_ad" id="emanon_hide_ad" value="1" <?php echo esc_attr( $checked ); ?>>
			<span class="switch-slider"></span>
			<span class="switch-button__label">
			<?php _e( '広告', 'emanon-premium' ); ?>
			</span>
		</span>
	</label>
	<br>

	<?php
		$meta_value = get_post_meta( $post->ID, 'emanon_disabled_background_color', true );
	
		if( $meta_value == 1 ) {
			$checked = "checked";
			} else { $checked = "/";
		}
	?>

	<label for="emanon_disabled_background_color">
		<span class="switch-button">
			<input type="checkbox" name="emanon_disabled_background_color" id="emanon_disabled_background_color" value="1" <?php echo esc_attr( $checked ); ?>>
			<span class="switch-slider"></span>
			<span class="switch-button__label">
			<?php _e( '背景色', 'emanon-premium' ); ?>
			</span>
		</span>
	</label>
	<br>

<?php
}

//入力内容の更新処理
add_action(
	'save_post',
	function ($post_id) {
	
		// nonceがセットされていない場合は終了
		if ( ! isset( $_POST['emanon_nonce_hide'] ) ) {
			return;
		}
		
		// nonceが一致しない場合は終了
		if ( ! wp_verify_nonce( $_POST['emanon_nonce_hide'], wp_create_nonce(__FILE__) ) ) {
			return;
		}

		// 自動保存の場合は終了
		if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE) {
			return;
		}

		// 投稿権限がない場合は終了
		if ( 'page' == $_POST['post_type'] ) {
				if ( ! current_user_can( 'edit_page', $post_id ) ) {
					return;
				}
		} else {
				if ( ! current_user_can( 'edit_post', $post_id ) ) {
					return;
				}
		}

		$meta_values = array(
			'emanon_hide_featured_image',
			'emanon_hide_toc',
			'emanon_hide_sns',
			'emanon_hide_ad',
			'emanon_disabled_background_color',
		);

		foreach ( $meta_values as $key ) {

			$meta_value = $_POST[$key];

			if( get_post_meta ( $post_id, $key ) == "" ) {
				add_post_meta ( $post_id, $key, $meta_value, true );
				} elseif ( $meta_value != get_post_meta( $post_id, $key, true ) ) {
				update_post_meta( $post_id, $key, $meta_value );
				} elseif ( $meta_value == "" ) {
				delete_post_meta( $post_id, $key, get_post_meta( $post_id, $key, true ) );
			}

		}

	}
);

/**
 * Index設定
 */
add_action(
	'add_meta_boxes',
	function () {

		$screens = array( 'post', 'page', 'news', 'seminar', 'request', 'sales' );
		foreach ( $screens as $screen ) {
			add_meta_box( 'index_setting', __( 'index・follow', 'emanon-premium' ), 'index_setting_form', $screen, 'side', 'low' );
		}

	}
);

//フォーム表示
function index_setting_form() {
	global $post;

	wp_nonce_field( wp_create_nonce(__FILE__), 'emanon_nonce_noindex_nofollow' );

	$meta_value = get_post_meta( $post->ID, 'emanon_noindex', true );

	if( $meta_value == 1 ) {
		$checked = "checked";
		} else { $checked = "/";
	}
?>

	<label for="emanon_noindex">
		<span class="switch-button">
			<input type="checkbox" name="emanon_noindex" id="emanon_noindex" value="1" <?php echo esc_attr( $checked ); ?>>
			<span class="switch-slider"></span>
			<span class="switch-button__label">
			<?php _e( 'no index', 'emanon-premium' ); ?>
			</span>
		</span>
	</label>
	<br>

<?php

	$meta_value = get_post_meta( $post->ID, 'emanon_nofollow', true );

	if( $meta_value == 1 ) {
		$checked = "checked";
		} else { $checked = "/";
	}
?>

	<label for="emanon_nofollow">
		<span class="switch-button">
			<input type="checkbox" name="emanon_nofollow" id="emanon_nofollow" value="1" <?php echo esc_attr( $checked ); ?>>
			<span class="switch-slider"></span>
			<span class="switch-button__label">
			<?php _e( 'no follow', 'emanon-premium' ); ?>
			</span>
		</span>
	</label>

<?php
}

//入力内容の更新処理
add_action(
	'save_post',
	function ($post_id) {
	
		// nonceがセットされていない場合は終了
		if ( ! isset( $_POST['emanon_nonce_noindex_nofollow'] ) ) {
			return;
		}
		
		// nonceが一致しない場合は終了
		if ( ! wp_verify_nonce( $_POST['emanon_nonce_noindex_nofollow'], wp_create_nonce(__FILE__) ) ) {
			return;
		}

		// 自動保存の場合は終了
		if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE) {
			return;
		}

		// 投稿権限がない場合は終了
		if ( 'page' == $_POST['post_type'] ) {
				if ( ! current_user_can( 'edit_page', $post_id ) ) {
					return;
				}
		} else {
				if ( ! current_user_can( 'edit_post', $post_id ) ) {
					return;
				}
		}

		$meta_values = array(
			'emanon_noindex',
			'emanon_nofollow',
		);

		foreach ( $meta_values as $key ) {

			$meta_value = $_POST[$key];

			if( get_post_meta ( $post_id, $key ) == "" ) {
				add_post_meta ( $post_id, $key, $meta_value, true );
				} elseif ( $meta_value != get_post_meta( $post_id, $key, true ) ) {
				update_post_meta( $post_id, $key, $meta_value );
				} elseif ( $meta_value == "" ) {
				delete_post_meta( $post_id, $key, get_post_meta( $post_id, $key, true ) );
			}

		}

	}
);

/**
 * 非表示設定：カスタムページ請求・セールス
 */
add_action(
	'add_meta_boxes',
	function () {

		$screens = array( 'request', 'sales' );
		foreach ( $screens as $screen ) {
			add_meta_box( 'header_footer_setting', __( '非表示設定', 'emanon-premium' ), 'header_footer_setting_form', $screen, 'side', 'low' );
		}

	}
);

//フォーム表示
function header_footer_setting_form() {
	global $post;

	wp_nonce_field( wp_create_nonce(__FILE__), 'emanon_nonce_header_footer' );

	$meta_value = get_post_meta( $post->ID, 'emanon_hide_header', true );

	if( $meta_value == 1 ) {
		$checked = "checked";
		} else { $checked = "/";
	}
?>
	<label for="emanon_hide_header">
		<span class="switch-button">
			<input type="checkbox" name="emanon_hide_header" id="emanon_hide_header" value="1" <?php echo esc_attr( $checked ); ?>>
			<span class="switch-slider"></span>
			<span class="switch-button__label">
			<?php _e( 'ヘッダー', 'emanon-premium' ); ?>
			</span>
		</span>
	</label>
	<br>

	<?php
	
		$meta_value = get_post_meta( $post->ID, 'emanon_hide_footer_section', true );
	
		if( $meta_value == 1 ) {
			$checked = "checked";
			} else { $checked = "/";
		}
	?>

	<label for="emanon_hide_footer_section">
		<span class="switch-button">
			<input type="checkbox" name="emanon_hide_footer_section" id="emanon_hide_footer_section" value="1" <?php echo esc_attr( $checked ); ?>>
			<span class="switch-slider"></span>
			<span class="switch-button__label">
			<?php _e( 'フッターセクション', 'emanon-premium' ); ?>
			</span>
		</span>
	</label>
	<br>

	<?php
	
		$meta_value = get_post_meta( $post->ID, 'emanon_hide_footer', true );
	
		if( $meta_value == 1 ) {
			$checked = "checked";
			} else { $checked = "/";
		}
	?>

	<label for="emanon_hide_footer">
		<span class="switch-button">
			<input type="checkbox" name="emanon_hide_footer" id="emanon_hide_footer" value="1" <?php echo esc_attr( $checked ); ?>>
			<span class="switch-slider"></span>
			<span class="switch-button__label">
			<?php _e( 'フッター', 'emanon-premium' ); ?>
			</span>
		</span>
	</label>
	<br>
	<small class="notes"><span class="red">※</span><?php _e( 'コピーライトは表示されます。', 'emanon-premium' ); ?></small>
	<br>

	<?php
		$meta_value = get_post_meta( $post->ID, 'emanon_hide_fixed_footer_menu', true );
	
		if( $meta_value == 1 ) {
			$checked = "checked";
			} else { $checked = "/";
		}
	
	?>

	<label for="emanon_hide_fixed_footer_menu">
		<span class="switch-button">
			<input type="checkbox" name="emanon_hide_fixed_footer_menu" id="emanon_hide_fixed_footer_menu" value="1" <?php echo esc_attr( $checked ); ?>>
			<span class="switch-slider"></span>
			<span class="switch-button__label">
			<?php _e( 'フッター固定メニュー［SP］', 'emanon-premium' ); ?>
			</span>
		</span>
	</label>
	<br>
	<?php
		$meta_value = get_post_meta( $post->ID, 'emanon_hide_floating_hamburger_menu', true );
	
		if( $meta_value == 1 ) {
			$checked = "checked";
			} else { $checked = "/";
		}
	
	?>

	<label for="emanon_hide_floating_hamburger_menu">
		<span class="switch-button">
			<input type="checkbox" name="emanon_hide_floating_hamburger_menu" id="emanon_hide_floating_hamburger_menu" value="1" <?php echo esc_attr( $checked ); ?>>
			<span class="switch-slider"></span>
			<span class="switch-button__label">
			<?php _e( '追従型メニュー［SP］', 'emanon-premium' ); ?>
			</span>
		</span>
	</label>

<?php
}

//入力内容の更新処理
add_action(
	'save_post',
	function ($post_id) {
	
		// nonceがセットされていない場合は終了
		if ( ! isset( $_POST['emanon_nonce_header_footer'] ) ) {
			return;
		}
		
		// nonceが一致しない場合は終了
		if ( ! wp_verify_nonce( $_POST['emanon_nonce_header_footer'], wp_create_nonce(__FILE__) ) ) {
			return;
		}

		// 自動保存の場合は終了
		if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE) {
			return;
		}

		// 投稿権限がない場合は終了
		if ( 'page' == $_POST['post_type'] ) {
				if ( ! current_user_can( 'edit_page', $post_id ) ) {
					return;
				}
		} else {
				if ( ! current_user_can( 'edit_post', $post_id ) ) {
					return;
				}
		}

		$meta_values = array(
			'emanon_hide_header',
			'emanon_hide_footer_section',
			'emanon_hide_footer',
			'emanon_hide_fixed_footer_menu',
			'emanon_hide_floating_hamburger_menu',
		);

		foreach ( $meta_values as $key ) {

			$meta_value = $_POST[$key];

			if( get_post_meta ( $post_id, $key ) == "" ) {
				add_post_meta ( $post_id, $key, $meta_value, true );
				} elseif ( $meta_value != get_post_meta( $post_id, $key, true ) ) {
				update_post_meta( $post_id, $key, $meta_value );
				} elseif ( $meta_value == "" ) {
				delete_post_meta( $post_id, $key, get_post_meta( $post_id, $key, true ) );
			}

		}

	}
);

/**
 * カスタム投稿ページ Seminar設定
 */
add_action(
	'add_meta_boxes',
	function () {

		add_meta_box( 'seminar_setting', __( 'セミナー設定', 'emanon-premium' ), 'seminar_setting_form', 'seminar', 'normal', 'default' );

	}
);

//フォーム表示
function seminar_setting_form() {
	global $post;

	wp_nonce_field( wp_create_nonce(__FILE__), 'emanon_nonce_seminar_setting' );
?>

	<label><?php _e( 'セミナー名' , 'emanon-premium' ); ?></label><br>
	<input type="text" name="emanon_seminar_title" id="emanon_seminar_title" value="<?php echo esc_attr( get_post_meta( $post->ID, 'emanon_seminar_title', true ) ); ?>" size="20" style="width:99%">
	<br>
	<label><?php _e( '会場名' , 'emanon-premium' ); ?></label><br>
	<input type="text" name="emanon_hall_name" id="emanon_hall_name" value="<?php echo esc_attr( get_post_meta( $post->ID, 'emanon_hall_name', true ) ); ?>" size="20" style="width:80%">
	<br>
	<label><?php _e( '会場住所' , 'emanon-premium' ); ?></label><br>
	<textarea name="emanon_hall_address" id="emanon_hall_address" cols="60" rows="2" style="width:80%"><?php echo esc_attr( get_post_meta( $post->ID, 'emanon_hall_address', true) ); ?></textarea>
	<br>
	<label><?php _e( '開催日' , 'emanon-premium' ); ?></label><br>
	<input type="text" name="emanon_seminar_date" id="emanon_seminar_date" value="<?php echo esc_attr( get_post_meta( $post->ID, 'emanon_seminar_date', true ) ); ?>" size="20" style="width:20%">
	<br>
	<label><?php _e( '開催時間' , 'emanon-premium' ); ?></label><br>
	<input type="text" name="emanon_seminar_time" id="emanon_seminar_time" value="<?php echo esc_attr( get_post_meta( $post->ID, 'emanon_seminar_time', true ) ); ?>" size="20" style="width:20%">
	<br>
	<label><?php _e( '定員' , 'emanon-premium' ); ?></label><br>
	<input type="text" name="emanon_seminar_capacity" id="emanon_seminar_capacity" value="<?php echo esc_attr( get_post_meta( $post->ID, 'emanon_seminar_capacity', true ) ); ?>" size="20" style="width:20%">
	<br>
	<label><?php _e( '残り席数' , 'emanon-premium' ); ?></label><br>
	<input type="text" name="emanon_seminar_seat_available" id="emanon_seminar_seat_available" value="<?php echo esc_attr( get_post_meta( $post->ID, 'emanon_seminar_seat_available', true ) ); ?>" size="20" style="width:20%">
<?php

	$meta_value = get_post_meta( $post->ID, 'emanon_seminar_seat_available_warning', true );

	if( $meta_value == 1 ) {
		$checked = "checked";
		} else { $checked = "/";
	}
?>
<input type="checkbox" name="emanon_seminar_seat_available_warning" id="emanon_seminar_seat_available_warning" value="1" <?php echo esc_attr( $checked ); ?>>
<label><?php _e( '［注意色］' , 'emanon-premium' ); ?></label>
<br>
<label><?php _e( '費用' , 'emanon-premium' ); ?></label><br>
<input type="text" name="emanon_seminar_fee" id="emanon_seminar_fee" value="<?php echo esc_attr( get_post_meta( $post->ID, 'emanon_seminar_fee', true ) ); ?>" size="20" style="width:20%">
<br>
<label><?php _e( 'リンク テキスト' , 'emanon-premium' ); ?></label><br>
<input type="text" name="emanon_seminar_link_text" id="emanon_seminar_link_text" value="<?php echo esc_attr(	get_post_meta( $post->ID, 'emanon_seminar_link_text', true ) ); ?>" size="20" style="width:20%">
<br>
<label><?php _e( 'リンク URL' , 'emanon-premium' ); ?></label><br>
<input type="text" name="emanon_seminar_link_url" id="emanon_seminar_link_url" value="<?php echo esc_attr(	get_post_meta( $post->ID, 'emanon_seminar_link_url', true ) ); ?>" size="20" style="width:80%">
<br>
<label><?php _e( 'マイクロコピー' , 'emanon-premium' ); ?></label><br>
<input type="text" name="emanon_seminar_microcopy" id="emanon_seminar_microcopy" value="<?php echo esc_attr(	get_post_meta( $post->ID, 'emanon_seminar_microcopy', true ) ); ?>" size="20" style="width:50%">
<br>
<label><?php _e( 'ショートコード' , 'emanon-premium'); ?></label><br>
<input type="text" name="emanon_seminar_form_short_code" id="emanon_seminar_form_short_code" value="<?php echo htmlspecialchars( get_post_meta( $post->ID, 'emanon_seminar_form_short_code', true ) ) ; ?>" placeholder="<?php echo _e( '［ショートコード］', 'emanon-premium' ) ; ?>" size="20" style="width:50%" />

<?php
}

//入力内容の更新処理
add_action(
	'save_post',
	function ( $post_id ) {

		// nonceがセットされていない場合は終了
		if ( ! isset( $_POST['emanon_nonce_seminar_setting'] ) ) {
			return;
		}
		
		// nonceが一致しない場合は終了
		if ( ! wp_verify_nonce( $_POST['emanon_nonce_seminar_setting'], wp_create_nonce(__FILE__) ) ) {
			return;
		}

		// 自動保存の場合は終了
		if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE) {
			return;
		}

		// 投稿権限がない場合は終了
		if ( 'page' == $_POST['post_type'] ) {
				if ( ! current_user_can( 'edit_page', $post_id ) ) {
					return;
				}
		} else {
				if ( ! current_user_can( 'edit_post', $post_id ) ) {
					return;
				}
		}

		$meta_values = array(
			'emanon_seminar_title',
			'emanon_hall_name',
			'emanon_hall_address',
			'emanon_seminar_date',
			'emanon_seminar_time',
			'emanon_seminar_capacity',
			'emanon_seminar_fee',
			'emanon_seminar_seat_available',
			'emanon_seminar_seat_available_warning',
			'emanon_seminar_link_text',
			'emanon_seminar_link_url',
			'emanon_seminar_microcopy',
			'emanon_seminar_form_short_code',
		);

		foreach ( $meta_values as $key ) {

			$meta_value = $_POST[$key];

			if( get_post_meta ( $post_id, $key ) == "" ) {
				add_post_meta ( $post_id, $key, $meta_value, true );
				} elseif ( $meta_value != get_post_meta( $post_id, $key, true ) ) {
				update_post_meta( $post_id, $key, $meta_value );
				} elseif ( $meta_value == "" ) {
				delete_post_meta( $post_id, $key, get_post_meta( $post_id, $key, true ) );
			}

		}

	}
);

/**
 * カスタム投稿ページ Request設定
 */
add_action (
	'add_meta_boxes',
	function () {

		add_meta_box( 'request_setting', __( '問い合わせフォーム設定', 'emanon-premium' ), 'request_setting_form', 'request', 'normal', 'default' );

	}
);

//フォーム表示
function request_setting_form() {
	global $post;

	wp_nonce_field( wp_create_nonce(__FILE__), 'emanon_nonce_request_setting' );

	?>
	<label for="emanon_form_title"><?php echo __( 'タイトル' , 'emanon-premium' ) ; ?></label><br>
	<input type="text" name="emanon_form_title" id="emanon_form_title" value="<?php echo esc_html( get_post_meta( $post->ID, 'emanon_form_title', true ) ); ?>" placeholder="<?php echo __( 'タイトル' , 'emanon-premium' ) ; ?>" size="20" style="width:50%" />
	<br>
	<label for="emanon_form_action"><?php echo __( 'Form actionタグ' , 'emanon-premium' ) ; ?></label><br>
	<textarea type="text" name="emanon_form_action" id="emanon_form_action" placeholder="<?php echo _e( 'Form actionタグ' , 'emanon-premium' ) ; ?>" cols="60" rows="5" style="width:99%" /><?php echo htmlspecialchars( get_post_meta( $post->ID, 'emanon_form_action', true) ) ; ?></textarea>
	<br>
	<label for="emanon_input_hidden"><?php echo __( 'Input hiddenタグ' , 'emanon-premium' ) ; ?></label><br>
	<textarea name="emanon_input_hidden" id="emanon_input_hidden" placeholder="<?php echo _e( 'Input hiddenタグ' , 'emanon-premium' ) ; ?>" cols="60" rows="10" style="width:99%"><?php echo htmlspecialchars( get_post_meta( $post->ID, 'emanon_input_hidden', true) ) ; ?></textarea>
	<br>
	<label for="emanon_input_submit"><?php echo __( 'Input submitタグ' , 'emanon-premium' ) ; ?></label><br>
	<textarea name="emanon_input_submit" id="emanon_input_submit" placeholder="<?php echo _e( 'Input submitタグ' , 'emanon-premium' ) ; ?>" cols="60" rows="2" style="width:99%"><?php echo htmlspecialchars( get_post_meta( $post->ID, 'emanon_input_submit', true ) ); ?></textarea>
	<br>
	<ol>
		<?php for( $c = 1; $c < 11; $c++ ) { ?>
		<?php
			$meta_value = get_post_meta( $post->ID, 'emanon_required_item_'.$c, true );
			if( $meta_value == 1 ) {
				$checked = "checked";
				} else { $checked = "/";
			}
		?>
		<li>
			<input type="text" name="emanon_form_label_<?php echo esc_attr( $c ); ?>" id="emanon_form_label__<?php echo esc_attr( $c ); ?>" value="<?php echo esc_html( get_post_meta( $post->ID, 'emanon_form_label_'.$c, true ) ) ; ?>" placeholder="<?php echo _e( 'ラベル', 'emanon-premium' ) ; ?>［<?php echo esc_attr( $c ); ?>］" size="10" style="width:30%" />
			<label>&emsp;<span class="red"><?php echo _e( '［必須］' , 'emanon-premium'); ?></span><input type="checkbox" name="emanon_required_item_<?php echo esc_attr( $c ); ?>" id="emanon_required_item__<?php echo esc_attr( $c ); ?>" value="1"<?php echo $checked	; ?>/></label>
			<br>
			<textarea type="text" name="emanon_form_tag_<?php echo esc_attr( $c ); ?>" id="emanon_form_tag__<?php echo esc_attr( $c ); ?>" placeholder="<?php echo _e( 'Formタグ', 'emanon-premium' ) ; ?>［<?php echo esc_attr( $c ); ?>］" cols="60" rows="4" style="width:99%" /><?php echo	htmlspecialchars( get_post_meta( $post->ID, 'emanon_form_tag_'.$c, true) ) ; ?></textarea>
		</li>
		<?php } ?>
	</ol>
	<input type="text" name="emanon_form_short_code" id="emanon_form_short_code" value="<?php echo htmlspecialchars( get_post_meta( $post->ID, 'emanon_form_short_code', true ) ) ; ?>" placeholder="<?php echo _e( '［ショートコード］', 'emanon-premium' ) ; ?>" size="20" style="width:60%" />
	<?php
}

//入力内容の更新処理
add_action(
	'save_post',
	function ( $post_id ) {

		// nonceがセットされていない場合は終了
		if ( ! isset( $_POST['emanon_nonce_request_setting'] ) ) {
			return;
		}
		
		// nonceが一致しない場合は終了
		if ( ! wp_verify_nonce( $_POST['emanon_nonce_request_setting'], wp_create_nonce(__FILE__) ) ) {
			return;
		}

		// 自動保存の場合は終了
		if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE) {
			return;
		}

		// 投稿権限がない場合は終了
		if ( 'page' == $_POST['post_type'] ) {
				if ( ! current_user_can( 'edit_page', $post_id ) ) {
					return;
				}
		} else {
				if ( ! current_user_can( 'edit_post', $post_id ) ) {
					return;
				}
		}

		$meta_values = array(
			'emanon_form_title',
			'emanon_short_code',
			'emanon_form_action',
			'emanon_input_hidden',
			'emanon_input_submit',
			'emanon_form_label_1',
			'emanon_form_tag_1',
			'emanon_required_item_1',
			'emanon_form_label_2',
			'emanon_form_tag_2',
			'emanon_required_item_2',
			'emanon_form_label_3',
			'emanon_form_tag_3',
			'emanon_required_item_3',
			'emanon_form_label_4',
			'emanon_form_tag_4',
			'emanon_required_item_4',
			'emanon_form_label_5',
			'emanon_form_tag_5',
			'emanon_required_item_5',
			'emanon_form_label_6',
			'emanon_form_tag_6',
			'emanon_required_item_6',
			'emanon_form_label_7',
			'emanon_form_tag_7',
			'emanon_required_item_7',
			'emanon_form_label_8',
			'emanon_form_tag_8',
			'emanon_required_item_8',
			'emanon_form_label_9',
			'emanon_form_tag_9',
			'emanon_required_item_9',
			'emanon_form_label_10',
			'emanon_form_tag_10',
			'emanon_required_item_10',
			'emanon_form_short_code',
		);

		foreach ( $meta_values as $key ) {

			$meta_value = $_POST[$key];

			if( get_post_meta ( $post_id, $key ) == "" ) {
				add_post_meta ( $post_id, $key, $meta_value, true );
				} elseif ( $meta_value != get_post_meta( $post_id, $key, true ) ) {
				update_post_meta( $post_id, $key, $meta_value );
				} elseif ( $meta_value == "" ) {
				delete_post_meta( $post_id, $key, get_post_meta( $post_id, $key, true ) );
			}

		}

	}
);

/**
 * 広告一覧 ショートコード表示
 */
add_filter(
	'manage_posts_columns',
	function ( $columns ) {
			global $post;
			if ( 'emanon-ad'	 === get_post_type( $post ) ) {
					$columns['ad-shortcode'] = __( '広告ショートコード', 'emanon-premium' );
			}
			return $columns;
	}
);

//ショートコード表示
add_action(
	'manage_posts_custom_column',
	function ( $column_name ) {
		global $post;
		$id = $post->ID;
		$title = $post->post_title;
			if( 'ad-shortcode' === $column_name ) {
					echo '<input type="text" name="" onfocus="this.select();" readonly="readonly" value="'. get_ad_shortcode( $id, $title ) .'" style="width:90%;">';
			}
	},
	10,
	2
);

/**
 * 投稿一覧の表示設定
 */

// 更新日を追加
$add_modified_date = get_theme_mod( 'add_modified_date' );
if( $add_modified_date ) {

	// [更新日]列を追加
	add_filter(
	'manage_posts_columns',
	function( $columns ) {
		global $post;
		if ( 'post' === get_post_type( $post ) ) {
			$columns['modified_date'] = __( '更新日','emanon-premium' );
		}
		return $columns;
		}
	);

	// 更新日を表示
	add_action(
	'manage_posts_custom_column',
	function( $column_name, $post_id ) {
		if ( 'modified_date' === $column_name ) {
			$modified_date = the_modified_date( 'Y年Md日' );
			echo $modified_date ;
			}
		},
		10,
		2
	);

	// ソート追加
	add_filter(
		'manage_edit-post_sortable_columns',
		function( $columns ) {
			$columns['modified_date'] = __( '更新日','emanon-premium' );
			return $columns;
		}
	);

}

// サムネイルの追加
$add_post_thumbnail = get_theme_mod( 'add_post_thumbnail' );
if( $add_post_thumbnail ) {
	// [サムネイル]列を追加
	add_filter(
	'manage_posts_columns',
	function ( $columns ) {
		global $post;
		if ( 'post' === get_post_type( $post ) ) {
			$columns['thumbnail'] = __( 'アイキャッチ','emanon-premium' );
		}
			return $columns;
	}
);

//サムネイル画像表示
	add_action(
	'manage_posts_custom_column',
	function( $column_name, $post_id ) {
		if ( 'thumbnail' === $column_name ) {
			$thumbnail = get_the_post_thumbnail( $post_id, '320_180', array( 'style'=>'width:100px;height:auto;' ) );
			if ( isset( $thumbnail ) && $thumbnail ) {
				echo $thumbnail;
			} else {
				echo __( 'No image','emanon-premium' );
			}
		}
	},
	10,
	2
);

}

// タイトル文字数を追加
$add_title_number = get_theme_mod( 'add_title_number' );
if( $add_title_number ) {

	// [タイトル文字数]列を追加
	add_filter(
	'manage_posts_columns',
	function( $columns ) {
		global $post;
		if ( 'post' === get_post_type( $post ) ) {
			$columns['title_number'] = __( 'タイトル文字数','emanon-premium' );
		}
		return $columns;
		}
	);

	// タイトル文字数を表示
	add_action(
	'manage_posts_custom_column',
	function( $column_name, $post_id ) {
		if ( 'title_number' === $column_name ) {
			$title = get_the_title( $post_id );
			echo mb_strlen( $title );
		}
	},
	10,
	2
	);

}

/**
 * CTA［ページ］一覧 使用投稿数の表示
 */
add_filter(
	'manage_posts_columns',
	function ( $columns ) {
		global $post;
		if ( 'emanon-cta' === get_post_type( $post ) ) {
				$columns['cta-count-post'] = __( 'カウント［投稿ページ］', 'emanon-premium' );
				$columns['cta-count-page'] = __( 'カウント［固定ページ］', 'emanon-premium' );
		}
		return $columns;
	}
);

add_action(
	'manage_posts_custom_column',
	function ( $column_name, $post_id ) {
		global $post;
		if ( 'emanon-cta' === get_post_type( $post ) ) {
			// default cta
			if ( ( 'cta-count-post' === $column_name && $post_id == get_theme_mod( 'display_cta_post', '' ) ) ||
					 ( 'cta-count-page' === $column_name && $post_id == get_theme_mod( 'display_cta_page', '' ) ) ) {
					$arg = array(
							'meta_query' => array(
									array(
											'key'     => 'emanon_cta_id',
											'value'   => $post_id,
											'compare' => '=',
									),
									array(
											'key'     => 'emanon_cta_id',
											'compare' => 'NOT EXISTS',
									),
									'relation' => 'OR'
							)
					);
			} else {
			// other
					$arg = array(
							'meta_query' => array(
									array(
											'key'     => 'emanon_cta_id',
											'value'   => $post_id,
											'compare' => '=',
									)
							)
					);
			}
			if ( 'cta-count-post'=== $column_name ) {
				$arg['post_type'] = 'post';
				$the_query = new WP_Query($arg);
				if ($the_query->found_posts > 0) {
					echo '<a href="edit.php?cta='.$post_id.'">'. $the_query->found_posts . '</a>';
				} else {
					echo '0';
				}
			} elseif ( 'cta-count-page' === $column_name ) {
				$arg['post_type'] = 'page';
				$the_query = new WP_Query($arg);
				if ($the_query->found_posts > 0) {
					echo '<a href="edit.php?post_type=page&cta='.$post_id.'">'. $the_query->found_posts . '</a>';
				} else {
					echo '0';
				}
			}
		}
	},
	10,
	2
);

/**
 * CTA［ページ］絞り込みフィルター
 */
add_action(
	'pre_get_posts',
	function ( $query ) {
		global $post;
	
		if ( is_admin() && ( $query->query['post_type'] === 'post' || $query->query['post_type'] === 'page') && $query->is_main_query() ) {
	
				$meta_query = $query->get('meta_query');
				if ( !is_array( $meta_query ) ) {
					$meta_query = array();
					}

				$meta_query['relation'] = 'OR';

				$meta_value = filter_input( INPUT_GET, 'cta' );
				if ( strlen( $meta_value ) ) {
					$meta_query[] = array(
						'key'     => 'emanon_cta_id',
						'value'   => $meta_value,
						'compare' => '=',
					);
					if ( ( $query->query['post_type'] === 'post' && $meta_value == get_theme_mod('display_cta_post', '') ) ||
						 ( $query->query['post_type'] === 'page' && $meta_value == get_theme_mod('display_cta_page', '') ) ) {
						$meta_query[] = array(
							'key'     => 'emanon_cta_id',
							'compare' => 'NOT EXISTS',
						);
					}
				}
				$query->set( 'meta_query', $meta_query );
		}
	}
);



/**
 * CTA［メルマガ］一覧 使用投稿数の表示
 */
add_filter(
	'manage_posts_columns',
	function ( $columns ) {
		global $post;
		if ( 'emanon-news-letter' === get_post_type( $post ) ) {
				$columns['cta-count-post'] = __( 'カウント［投稿ページ］', 'emanon-premium' );
				$columns['cta-count-page'] = __( 'カウント［固定ページ］', 'emanon-premium' );
		}
		return $columns;
	}
);

add_action(
	'manage_posts_custom_column',
	function ( $column_name, $post_id ) {
		global $post;
		if ( 'emanon-news-letter' === get_post_type( $post ) ) {
			// default cta
			if ( ( 'cta-count-post' === $column_name && $post_id == get_theme_mod( 'display_cta_newsletter_post', '' ) ) ||
					 ( 'cta-count-page' === $column_name && $post_id == get_theme_mod( 'display_cta_newsletter_page', '' ) ) ) {
					$arg = array(
							'meta_query' => array(
									array(
											'key'     => 'emanon_cta_newsletter_id',
											'value'   => $post_id,
											'compare' => '=',
									),
									array(
											'key'     => 'emanon_cta_newsletter_id',
											'compare' => 'NOT EXISTS',
									),
									'relation' => 'OR'
							)
					);
			} else {
			// other
					$arg = array(
							'meta_query' => array(
									array(
											'key'     => 'emanon_cta_newsletter_id',
											'value'   => $post_id,
											'compare' => '=',
									)
							)
					);
			}
			if ( 'cta-count-post'=== $column_name ) {
				$arg['post_type'] = 'post';
				$the_query = new WP_Query($arg);
				if ($the_query->found_posts > 0) {
					echo '<a href="edit.php?cta_newsletter='.$post_id.'">'. $the_query->found_posts . '</a>';
				} else {
					echo '0';
				}
			} elseif ( 'cta-count-page' === $column_name ) {
				$arg['post_type'] = 'page';
				$the_query = new WP_Query($arg);
				if ($the_query->found_posts > 0) {
					echo '<a href="edit.php?post_type=page&cta_newsletter='.$post_id.'">'. $the_query->found_posts . '</a>';
				} else {
					echo '0';
				}
			}
		}
	},
	10,
	2
);

/**
 * CTA［メルマガ］絞り込みフィルター
 */
add_action(
	'pre_get_posts',
	function ( $query ) {
		global $post;
	
		if ( is_admin() && ( $query->query['post_type'] === 'post' || $query->query['post_type'] === 'page') && $query->is_main_query() ) {
	
			$meta_query = $query->get('meta_query');
			if ( !is_array( $meta_query ) ) {
				$meta_query = array();
				}

			$meta_query['relation'] = 'OR';

			$meta_value = filter_input( INPUT_GET, 'cta_newsletter' );
			if ( strlen( $meta_value ) ) {
					$meta_query[] = array(
						'key'     => 'emanon_cta_newsletter_id',
						'value'   => $meta_value,
						'compare' => '=',
					);
					if ( ( $query->query['post_type'] === 'post' && $meta_value == get_theme_mod('display_cta_newsletter_post', '') ) ||
						 ( $query->query['post_type'] === 'page' && $meta_value == get_theme_mod('display_cta_newsletter_page', '') ) ) {
						$meta_query[] = array(
							'key'     => 'emanon_cta_newsletter_id',
							'compare' => 'NOT EXISTS',
						);
					}
			}
			$query->set( 'meta_query', $meta_query );
		}
	}
);


/**
 * カテゴリ一一覧の表示設定
 */
add_filter(
'manage_edit-category_columns',
function ( $columns ) {
	return array_merge(
		array_slice( $columns, 0, 1 ),
		array( 'id' => 'ID' ),
		array_slice( $columns, 1 )
		);
	}
);

// カテゴリ一IDを表示
	add_action(
	'manage_category_custom_column',
	function( $deprecated, $column_name, $term_id ) {
		if ( 'id' === $column_name ) {
			echo $term_id;
		}
	},
	10,
	3
);

/**
 * ユーザープロフィール項目の追加
 */
// 項目登録
add_filter(
	'user_contactmethods',
	function ( $item ) {
		$item[ 'user_twitter' ]		= __( 'Twitter URL', 'emanon-premium' );
		$item[ 'user_facebook' ]	= __( 'Facebook URL', 'emanon-premium' );
		$item[ 'user_instagram' ] = __( 'Instagram URL', 'emanon-premium' );
		$item[ 'user_line' ]			= __( 'LINE ID', 'emanon-premium' );
		$item[ 'user_youtube' ]		= __( 'YouTube URL', 'emanon-premium' );
		$item[ 'user_linkedin' ]	= __( 'Linkedin URL', 'emanon-premium' );
		$item[ 'user_position' ]	= __( '役職', 'emanon-premium' );

		return $item;
	},
	10,
	1
);

// ユーザー編集に項目を追加
add_action(
	'show_password_fields',
	function ( $bool ) {
	global $profileuser;

	?>
	<tr>
		<th><label for='profile_bg_img'><?php _e( '背景画像', 'emanon-premium' ); ?></label></th>
		<td>
		<?php
			emanon_custom_media_uploader( 'profile_bg_img_url', $profileuser->profile_bg_img_url, 'profile_bg_img_url' );
		?>
		</td>
	</tr>
	<?php

		return $bool;
	}
);

// データの更新処理
add_action(
'profile_update',
	function ( $user_id, $old_user_data ) {
		if ( isset( $_POST['profile_bg_img_url'] ) ) {
			update_user_meta( $user_id, 'profile_bg_img_url', $_POST['profile_bg_img_url'], $old_user_data->profile_bg_img_url );
		}
	},
	10,
	2
);

// 名姓の項目を姓名の順に変更
add_action( 'admin_footer-user-new.php', 'emanon_user_name' );
add_action( 'admin_footer-user-edit.php', 'emanon_user_name' );
add_action( 'admin_footer-profile.php', 'emanon_user_name' );
function emanon_user_name() {
	?><script>
	jQuery(function($){
	$('#last_name').closest('tr').after($('#first_name').closest('tr'));
	});
	</script><?php
}

add_action(
'admin_footer',
	function () {
	// ユーザー一覧以外ではjavascriptを出力しない
		global $pagenow;
		if( "users.php" !== $pagenow ) return;

		$html =<<<EOF
	<script type="text/javascript">
			jQuery(document).ready(function(){
					jQuery("td.column-name").each(function(){
							name = String(jQuery(this).text()).replace(/(^\s+)|(\s+$)/g,'');
							if( name ) {
									arr = name.split(" ");
									if( arr.length === 2 ) {
											jQuery(this).text(arr[1]+" "+arr[0]);
									}
							}
					});
			});
	</script>
EOF;
	echo $html;
	}
);