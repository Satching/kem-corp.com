<?php
/**
 * AD coustom post | List of AD Code | Add New AD Code Page
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

add_action(
	'init',
	function () {

		/* カスタム投稿タイプを追加 */
		$labels = array (
			'name'               => __( '広告コード一覧', 'emanon-premium' ),
			'add_new_item'       => __( '広告コード追加', 'emanon-premium' ),
			'edit_item'          => __( '編集', 'emanon-premium' ),
			'new_item'           => __( '新規', 'emanon-premium' ),
			'view_item'          => __( '表示', 'emanon-premium' ),
			'search_items'       => __( '検索', 'emanon-premium' ),
			'not_found'          => __( '見つかりませんでした。', 'emanon-premium' ),
			'not_found_in_trash' => __( 'ゴミ箱内に見つかりませんでした', 'emanon-premium' )
		);

		$supports = array (
			'title'
		);

		$rewrite = array (
			'slug' => 'emanon-ad'
		);

		register_post_type (
			'emanon-ad', //カスタム投稿タイプ名
				array (
					'labels'          => $labels,
					'capability_type' => 'page',
					'public'          => '',
					'show_ui'         => true,
					'show_in_menu'    => 'emanon_setting_page',
					'menu_position'   => '',
					'rewrite'         => $rewrite,
					'has_archive'     => '', // アーカイブページを持つ
					'supports'        => $supports,
					'show_in_rest'    => '' // ブロックエディタ
				)
		);

	}
);

/**
 * Add metabox for Ad code Page
 */
add_action(
	'add_meta_boxes',
	function () {

	// タイトル、コード、ショートコードタグ設定
	add_meta_box( 'emanon_ad_metabox_code', __( '広告設定', 'emanon-premium' ), 'emanon_ad_metabox_code', 'emanon-ad', 'normal' );

	// 色設定
	add_meta_box( 'emanon_ad_metabox_color_1', __( 'ボタン［1］配色設定', 'emanon-premium' ), 'emanon_ad_metabox_color_1', 'emanon-ad', 'normal' );
	add_meta_box( 'emanon_ad_metabox_color_2', __( 'ボタン［2］配色設定', 'emanon-premium' ), 'emanon_ad_metabox_color_2', 'emanon-ad', 'normal' );
	add_meta_box( 'emanon_ad_metabox_color_3', __( 'ボタン［3］配色設定', 'emanon-premium' ), 'emanon_ad_metabox_color_3', 'emanon-ad', 'normal' );
	}
);

// Add metaboxの表示
function emanon_ad_metabox_code() {
	global $post;
	$id               = $post->ID;
	$title            = $post->post_title;
	$ad_title         = get_post_meta( $id, 'ad_title', true );
	$ad_code          = get_post_meta( $id, 'ad_code', true );
	$ad_price         = get_post_meta( $id, 'ad_price', true );
	$ad_star          = get_post_meta( $id, 'ad_star', true );
	$ad_ranking       = get_post_meta( $id, 'ad_ranking', true );
	$ad_description   = get_post_meta( $id, 'ad_description', true );
	$ad_btn_layout    = get_post_meta( $id, 'ad_btn_layout', true );
	if ( empty( $ad_btn_layout ) ) {
		$ad_btn_layout  = 'ad_btn_1';
	}
	$ad_btn_text_1    = get_post_meta( $id, 'ad_btn_text_1', true );
	$ad_btn_url_1     = get_post_meta( $id, 'ad_btn_url_1', true );
	$ad_btn_img_1    = get_post_meta( $id, 'ad_btn_img_1', true );
	$ad_btn_text_2    = get_post_meta( $id, 'ad_btn_text_2', true );
	$ad_btn_url_2     = get_post_meta( $id, 'ad_btn_url_2', true );
	$ad_btn_img_2    = get_post_meta( $id, 'ad_btn_img_2', true );
	$ad_btn_text_3    = get_post_meta( $id, 'ad_btn_text_3', true );
	$ad_btn_url_3     = get_post_meta( $id, 'ad_btn_url_3', true );
	$ad_btn_img_3    = get_post_meta( $id, 'ad_btn_img_3', true );
	$ad_border        = get_post_meta( $id, 'ad_border', true );
	if( $ad_border ) {
		$ad_border = "checked";
		} else { $ad_border = "/";
	}
?>

	<?php if ( $ad_code ): ?>
	<p>
		<strong><?php _e( 'ショートコード', 'emanon-premium' ); ?></strong><br/>
		<input type="text" id="emanon[ad_shortcode]" name="emanon[ad_shortcode]" onfocus="this.select();" readonly="readonly" value="<?php echo get_ad_shortcode( $id, $title ) ; ?>" style="width:50%;">
	</p>
	<?php endif;?>

	<p>
		<strong><?php _e( 'タイトル', 'emanon-premium' ); ?></strong><br/>
		<input type="text" id="emanon[ad_title]" name="emanon[ad_title]" value="<?php echo esc_attr( $ad_title ); ?>" style="width:50%;">
	</p>

	<p>
		<strong><?php _e( '広告コード：バナー', 'emanon-premium' ); ?></strong><br/>
		<textarea id="emanon[ad_code]" name="emanon[ad_code]" rows="12" style="width:50%;"><?php echo $ad_code; ?></textarea><br/>
	</p>
	<p>
		<strong><?php _e( 'ランキング', 'emanon-premium' ); ?></strong><br/>
		<select name="emanon[ad_ranking]">
		<?php
		$array = array(
			'' => __( '未設定', 'emanon-premium' ),
			'1' => __( 'No 1', 'emanon-premium' ),
			'2' => __( 'No 2', 'emanon-premium' ),
			'3' => __( 'No 3', 'emanon-premium' ),
		);
		foreach ( $array as $key => $val ) :
		$selected = '';
		if ( $ad_ranking == $key ) {
		$selected = ' selected';
		}
		echo '<option value="'. $key .'"'. $selected .'>'. $val .'</option>';
		endforeach;
		?>
		</select>
	</p>

	<p>
		<strong><?php _e( '価格', 'emanon-premium' ); ?></strong><br/>
		<input type="text" id="emanon[ad_price]" name="emanon[ad_price]" size="20" value="<?php echo esc_attr( $ad_price ); ?>">
	</p>

	<p>
		<strong><?php _e( '評価スター', 'emanon-premium' ); ?></strong><br/>
		<select name="emanon[ad_star]" id="emanon[ad_star]">
		<?php
		$array = array(
			''   => __( '未設定', 'emanon-premium' ),
			'1'   => __( '星1', 'emanon-premium' ),
			'1.5' => __( '星1.5', 'emanon-premium' ),
			'2'   => __( '星2', 'emanon-premium' ),
			'2.5' => __( '星2.5', 'emanon-premium' ),
			'3'   => __( '星3', 'emanon-premium' ),
			'3.5' => __( '星3.5', 'emanon-premium' ),
			'4'   => __( '星4', 'emanon-premium' ),
			'4.5' => __( '星4.5', 'emanon-premium' ),
			'5'   => __( '星5', 'emanon-premium' ),
		);
		foreach ( $array as $key => $val ) :
		$selected = '';
		if ( $ad_star == $key ) {
		$selected = ' selected';
		}
		echo '<option value="'. $key .'"'. $selected .'>'. $val .'</option>';
		endforeach;
		?>
		</select>
	</p>

	<p>
		<strong><?php _e( '説明', 'emanon-premium' ); ?></strong><br/>
		<textarea id="emanon[ad_description]" name="emanon[ad_description]" rows="6" style="width:50%;"><?php echo wp_kses_post( $ad_description ); ?></textarea><br/>
	</p>

	<p>
		<strong><?php _e( 'ボタンレイアウト', 'emanon-premium' ); ?></strong><br/>
		<input type="radio" name="emanon[ad_btn_layout]" value="ad_btn_1"<?php echo ( 'ad_btn_1' == $ad_btn_layout ) ? ' checked' : ''; ?> /><label><?php _e( 'ボタン［1］', 'emanon-premium' ); ?></label><br>
		<input type="radio" name="emanon[ad_btn_layout]" value="ad_btn_2"<?php echo ( 'ad_btn_2' == $ad_btn_layout ) ? ' checked' : ''; ?> /><label><?php _e( 'ボタン［1］・ボタン［2］', 'emanon-premium' ); ?></label><br>
		<input type="radio" name="emanon[ad_btn_layout]" value="ad_btn_3"<?php echo ( 'ad_btn_3' == $ad_btn_layout ) ? ' checked' : ''; ?> /><label><?php _e( 'ボタン［1］・ボタン［2］・ボタン［3］', 'emanon-premium' ); ?></label>
	</p>

	<p>
		<strong><?php _e( 'ボタン［1］テキスト', 'emanon-premium' ); ?></strong><br/>
		<input type="text" id="emanon[ad_btn_text_1]" name="emanon[ad_btn_text_1]" size="40" value="<?php echo esc_attr( $ad_btn_text_1 ); ?>">
	</p>

	<p>
		<strong><?php _e( 'ボタン［1］URL', 'emanon-premium' ); ?></strong><br/>
		<textarea type="text" id="emanon[ad_btn_url_1]" name="emanon[ad_btn_url_1]" rows="1" style="width:70%;"><?php echo ( $ad_btn_url_1 ); ?></textarea>
	</p>

	<p>
		<strong><?php _e( 'ボタン［1］広告コード：計測用imgタグ', 'emanon-premium' ); ?></strong><br/>
		<textarea type="text" id="emanon[ad_btn_img_1]" name="emanon[ad_btn_img_1]" rows="3" style="width:70%;"><?php echo ( $ad_btn_img_1 ); ?></textarea>
	</p>

	<p>
		<strong><?php _e( 'ボタン［2］テキスト', 'emanon-premium' ); ?></strong><br/>
		<input type="text" id="emanon[ad_btn_text_2]" name="emanon[ad_btn_text_2]" size="40" value="<?php echo esc_attr( $ad_btn_text_2 ); ?>">
	</p>

	<p>
		<strong><?php _e( 'ボタン［2］URL', 'emanon-premium' ); ?></strong><br/>
		<textarea id="emanon[ad_btn_url_2]" name="emanon[ad_btn_url_2]" rows="1" style="width:70%;"><?php echo ( $ad_btn_url_2 ); ?></textarea>
	</p>

	<p>
		<strong><?php _e( 'ボタン［2］広告コード：計測用imgタグ', 'emanon-premium' ); ?></strong><br/>
		<textarea type="text" id="emanon[ad_btn_img_2]" name="emanon[ad_btn_img_2]" rows="3" style="width:70%;"><?php echo ( $ad_btn_img_2 ); ?></textarea>
	</p>

	<p>
		<strong><?php _e( 'ボタン［3］テキスト', 'emanon-premium' ); ?></strong><br/>
		<input type="text" id="emanon[ad_btn_text_3]" name="emanon[ad_btn_text_3]" size="40" value="<?php echo esc_attr( $ad_btn_text_3 ); ?>">
	</p>

	<p>
		<strong><?php _e( 'ボタン［3］URL', 'emanon-premium' ); ?></strong><br/>
		<textarea id="emanon[ad_btn_url_3]" name="emanon[ad_btn_url_3]" rows="1" style="width:70%;"><?php echo ( $ad_btn_url_3 ); ?></textarea>
	</p>

	<p>
		<strong><?php _e( 'ボタン［3］広告コード：計測用imgタグ', 'emanon-premium' ); ?></strong><br/>
		<textarea type="text" id="emanon[ad_btn_img_3]" name="emanon[ad_btn_img_3]" rows="3" style="width:70%;"><?php echo ( $ad_btn_img_3 ); ?></textarea>
	</p>

	<p>
		<label for="emanon[ad_border]">
			<strong><?php _e( 'ボーダー', 'emanon-premium' ); ?></strong><br/>
			<span class="switch-button">
				<input type="checkbox" name="emanon[ad_border]" id="emanon[ad_border]" value="1" <?php echo esc_attr( $ad_border ); ?>>
				<span class="switch-slider"></span>
				<span class="switch-button__label">
				<?php _e( '有効', 'emanon-premium' ); ?>
				</span>
			</span>
		</label>
	</p>
<?php
}

// Button［1］色設定
function emanon_ad_metabox_color_1() {
	global $post;
	$id                  = $post->ID;
	$ad_btn_border_color = get_post_meta( $id, 'ad_btn_border_color_1', true );
	$ad_btn_bg_color     = get_post_meta( $id, 'ad_btn_background_color_1', true );
	$ad_btn_text_color   = get_post_meta( $id, 'ad_btn_text_color_1', true );
	if ( empty( $ad_btn_border_color ) ) { $ad_btn_border_color = emanon_primary_color(); }
	if ( empty( $ad_btn_text_color ) ) { $ad_btn_text_color = emanon_primary_color(); }
	if( $ad_btn_bg_color ) {
		$ad_btn_bg_color = "checked";
		} else { $ad_btn_bg_color = "/";
	}
	?>
	<p>
		<strong><?php _e( 'ボタンボーダー', 'emanon-premium' ); ?></strong><br/>
		<input type="text" name="emanon[ad_btn_border_color_1]" class="emanon_color_field" data-default-color="<?php echo esc_attr( emanon_primary_color() ); ?>" value="<?php echo esc_attr( $ad_btn_border_color ); ?>" ><br/>
	</p>

	<p>
		<label for="emanon[ad_btn_background_color_1]">
			<strong><?php _e( 'ボタン背景色', 'emanon-premium' ); ?></strong><br/>
				<span class="switch-button">
					<input type="checkbox" name="emanon[ad_btn_background_color_1]" id="emanon[ad_btn_background_color_1]" value="1" <?php echo esc_attr( $ad_btn_bg_color ); ?>>
				<span class="switch-slider"></span>
				<span class="switch-button__label">
				<?php _e( '有効', 'emanon-premium' ); ?>
				</span>
			</span>
			<br/>
			<?php _e( 'ボタンボーダーの色が背景色に反映されます。', 'emanon-premium' ); ?>
		</label>
	</p>

	<p>
		<strong><?php _e( 'ボタンテキスト', 'emanon-premium' ); ?></strong><br/>
		<input type="text" name="emanon[ad_btn_text_color_1]" class="emanon_color_field" data-default-color="<?php echo esc_attr( emanon_primary_color() ); ?>" value="<?php echo esc_attr( $ad_btn_text_color ); ?>" ><br/>
	</p>

	<?php
}

// Button［2］色設定
function emanon_ad_metabox_color_2() {
	global $post;
	$id                  = $post->ID;
	$ad_btn_border_color = get_post_meta( $id, 'ad_btn_border_color_2', true );
	$ad_btn_bg_color     = get_post_meta( $id, 'ad_btn_background_color_2', true );
	$ad_btn_text_color   = get_post_meta( $id, 'ad_btn_text_color_2', true );
	if ( empty( $ad_btn_border_color ) ) { $ad_btn_border_color = '#ff9900'; }
	if ( empty( $ad_btn_text_color ) ) { $ad_btn_text_color = '#ff9900'; }
	if( $ad_btn_bg_color ) {
		$ad_btn_bg_color = "checked";
		} else { $ad_btn_bg_color = "/";
	}
	?>
	<p>
		<strong><?php _e( 'ボタンボーダー', 'emanon-premium' ); ?></strong><br/>
		<input type="text" name="emanon[ad_btn_border_color_2]" class="emanon_color_field" data-default-color="#ff9900" value="<?php echo esc_attr( $ad_btn_border_color ); ?>" ><br/>
	</p>

	<p>
		<label for="emanon[ad_btn_background_color_2]">
			<strong><?php _e( 'ボタン背景色', 'emanon-premium' ); ?></strong><br/>
				<span class="switch-button">
					<input type="checkbox" name="emanon[ad_btn_background_color_2]" id="emanon[ad_btn_background_color_2]" value="1" <?php echo esc_attr( $ad_btn_bg_color ); ?>>
				<span class="switch-slider"></span>
				<span class="switch-button__label">
				<?php _e( '有効', 'emanon-premium' ); ?>
				</span>
			</span>
			<br/>
			<?php _e( 'ボタンボーダーの色が背景色に反映されます。', 'emanon-premium' ); ?>
		</label>
	</p>

	<p>
		<strong><?php _e( 'ボタンテキスト', 'emanon-premium' ); ?></strong><br/>
		<input type="text" name="emanon[ad_btn_text_color_2]" class="emanon_color_field" data-default-color="#ff9900" value="<?php echo esc_attr( $ad_btn_text_color ); ?>" ><br/>
	</p>

	<?php
}

// Button［3］色設定
function emanon_ad_metabox_color_3() {
	global $post;
	$id                  = $post->ID;
	$ad_btn_border_color = get_post_meta( $id, 'ad_btn_border_color_3', true );
	$ad_btn_bg_color     = get_post_meta( $id, 'ad_btn_background_color_3', true );
	$ad_btn_text_color   = get_post_meta( $id, 'ad_btn_text_color_3', true );
	if ( empty( $ad_btn_border_color ) ) { $ad_btn_border_color = '#bf0001'; }
	if ( empty( $ad_btn_text_color ) ) { $ad_btn_text_color = '#bf0001'; }
	if( $ad_btn_bg_color ) {
		$ad_btn_bg_color = "checked";
		} else { $ad_btn_bg_color = "/";
	}
	?>
	<p>
		<strong><?php _e( 'ボタンボーダー', 'emanon-premium' ); ?></strong><br/>
		<input type="text" name="emanon[ad_btn_border_color_3]" class="emanon_color_field" data-default-color="#bf0001" value="<?php echo esc_attr( $ad_btn_border_color ); ?>" ><br/>
	</p>

	<p>
		<label for="emanon[ad_btn_background_color_3]">
			<strong><?php _e( 'ボタン背景色', 'emanon-premium' ); ?></strong><br/>
				<span class="switch-button">
					<input type="checkbox" name="emanon[ad_btn_background_color_3]" id="emanon[ad_btn_background_color_3]" value="1" <?php echo esc_attr( $ad_btn_bg_color ); ?>>
				<span class="switch-slider"></span>
				<span class="switch-button__label">
				<?php _e( '有効', 'emanon-premium' ); ?>
				</span>
			</span>
			<br/>
			<?php _e( 'ボタンボーダーの色が背景色に反映されます。', 'emanon-premium' ); ?>
		</label>
	</p>

	<p>
		<strong><?php _e( 'ボタンテキスト', 'emanon-premium' ); ?></strong><br/>
		<input type="text" name="emanon[ad_btn_text_color_3]" class="emanon_color_field" data-default-color="#bf0001" value="<?php echo esc_attr( $ad_btn_text_color ); ?>" ><br/>
	</p>

	<?php
}
/**
 * Save from metabox for Ad code Page
 */
add_action(
	'save_post',
	function ( $post_id ) {

		if (isset( $_POST['post_type']) && 'page' == $_POST['post_type'] ) {
				if (!current_user_can( 'edit_page', $post_id )) {
					return $post_id;
				}
			} elseif (!current_user_can( 'edit_post', $post_id )) {
					return $post_id;
			}

		if ( array_key_exists('emanon', $_POST) ) {
			setting_ad_save_data( $post_id, 'ad_shortcode' );
			setting_ad_save_data( $post_id, 'ad_title' );
			setting_ad_save_data( $post_id, 'ad_code' );
			setting_ad_save_data( $post_id, 'ad_price' );
			setting_ad_save_data( $post_id, 'ad_star' );
			setting_ad_save_data( $post_id, 'ad_ranking' );
			setting_ad_save_data( $post_id, 'ad_description' );
			setting_ad_save_data( $post_id, 'ad_btn_layout' );
			setting_ad_save_data( $post_id, 'ad_btn_text_1' );
			setting_ad_save_data( $post_id, 'ad_btn_url_1' );
			setting_ad_save_data( $post_id, 'ad_btn_img_1' );
			setting_ad_save_data( $post_id, 'ad_btn_text_2' );
			setting_ad_save_data( $post_id, 'ad_btn_url_2' );
			setting_ad_save_data( $post_id, 'ad_btn_img_2' );
			setting_ad_save_data( $post_id, 'ad_btn_text_3' );
			setting_ad_save_data( $post_id, 'ad_btn_url_3' );
			setting_ad_save_data( $post_id, 'ad_btn_img_3' );
			setting_ad_save_data( $post_id, 'ad_border' );
			setting_ad_save_data( $post_id, 'ad_btn_border_color_1' );
			setting_ad_save_data( $post_id, 'ad_btn_background_color_1' );
			setting_ad_save_data( $post_id, 'ad_btn_text_color_1' );
			setting_ad_save_data( $post_id, 'ad_btn_border_color_2' );
			setting_ad_save_data( $post_id, 'ad_btn_background_color_2' );
			setting_ad_save_data( $post_id, 'ad_btn_text_color_2' );
			setting_ad_save_data( $post_id, 'ad_btn_border_color_3' );
			setting_ad_save_data( $post_id, 'ad_btn_background_color_3' );
			setting_ad_save_data( $post_id, 'ad_btn_text_color_3' );
		}
	}
);

function setting_ad_save_data( $post_id, $key ) {
		$old_value = get_post_meta( $post_id, $key, true );
		$new_value = (array_key_exists($key, $_POST['emanon']) ? $_POST['emanon'][$key] : null);
		if ( $new_value && $new_value != $old_value ) {
				update_post_meta( $post_id, $key, $new_value );
		} elseif ( '' == $new_value && $old_value ) {
				delete_post_meta( $post_id, $key, $old_value ) ;
		}
}