<?php
/**
 * CTA coustom post | List of CTA | Add New CTA
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

add_action(
	'init',
	function () {

		/* カスタム投稿タイプを追加 */
		$labels = array (
			'name'               => __( 'CTA［ページ］一覧', 'emanon-premium' ),
			'add_new_item'       => __( 'CTA［ページ］追加', 'emanon-premium' ),
			'edit_item'          => __( '編集', 'emanon-premium' ),
			'new_item'           => __( '新規', 'emanon-premium' ),
			'view_item'          => __( '表示', 'emanon-premium' ),
			'search_items'       => __( '検索', 'emanon-premium' ),
			'not_found'          => __( '見つかりませんでした。', 'emanon-premium' ),
			'not_found_in_trash' => __( 'ゴミ箱内に見つかりませんでした', 'emanon-premium' )
		);

		$rewrite = array (
			'slug' => 'emanon-cta'
		);

		$supports = array (
			'title'
		);

		register_post_type (
			'emanon-cta', //カスタム投稿タイプ名
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
 * Add metabox for CTA
 */
add_action (
	'add_meta_boxes',
	function () {

		// 画像設定
		add_meta_box( 'emanon_cta_metabox_image', __( '画像設定', 'emanon-premium' ), 'emanon_cta_metabox_image', 'emanon-cta', 'normal' );

		// タイトル、テキスト、ショートコードタグ設定
		add_meta_box( 'emanon_cta_metabox_text', __( 'テキスト設定', 'emanon-premium' ), 'emanon_cta_metabox_text', 'emanon-cta', 'normal' );

		// 色設定
		add_meta_box( 'emanon_cta_metabox_color', __( '配色設定', 'emanon-premium' ), 'emanon_cta_metabox_color', 'emanon-cta', 'normal' );

	}
);

// 画像設定
function emanon_cta_metabox_image() {
	global $post;
	$post_id = $post->ID;
	$layout = get_post_meta( $post_id, 'cta_layout', true );
	if ( empty( $layout ) ) { $layout = 'cta-left'; }
	$image = get_post_meta( $post_id, 'cta_image', true );
?>
	<p>
		<strong><?php _e( 'レイアウト', 'emanon-premium' ); ?></strong><br/>
			<input type="radio" name="emanon[cta_layout]" value="cta-left"<?php echo ( 'cta-left' == $layout ) ? ' checked' : ''; ?> /><label><?php _e( '左配置', 'emanon-premium' ); ?></label><br>
			<input type="radio" name="emanon[cta_layout]" value="cta-center"<?php echo ( 'cta-center' == $layout ) ? ' checked' : ''; ?> /><label><?php _e( '中央配置', 'emanon-premium' ); ?></label><br>
			<input type="radio" name="emanon[cta_layout]" value="cta-right"<?php echo ( 'cta-right' == $layout ) ? ' checked' : ''; ?> /><label><?php _e( '右配置', 'emanon-premium' ); ?></label>
	</p>
	<?php
		emanon_custom_media_uploader( 'emanon[cta_image]', $image, 'cta_image' );
	?>
	<?php
}

// タイトル、テキスト、ショートコードタグ設定
function emanon_cta_metabox_text() {
	global $post;
	$post_id          = $post->ID;
	$title            = get_post_meta( $post_id, 'cta_title', true );
	$lead             = get_post_meta( $post_id, 'cta_lead', true );
	$btn_url          = get_post_meta( $post_id, 'cta_btn_url', true );
	$btn_text         = get_post_meta( $post_id, 'cta_btn_text', true );
	$btn_layout       = get_post_meta( $post_id, 'cta_btn_layout', true );
	if ( empty( $btn_layout ) ) { $btn_layout = 'center_bottom'; }
	$microcopy        = get_post_meta( $post_id, 'cta_microcopy', true );
	$microcopy_layout = get_post_meta( $post_id, 'cta_microcopy_layout', true );
	if ( empty( $microcopy_layout ) ) { $microcopy_layout = 'under_button'; }
?>
	<p>
		<strong><?php _e( 'タイトル', 'emanon-premium' ); ?></strong><br/>
		<input type="text" name="emanon[cta_title]" value="<?php echo esc_attr( $title ); ?>" style="width:40%;" /><br/>
	</p>
	<p>
		<strong><?php _e( 'リード文', 'emanon-premium' ); ?></strong><br/>
			<textarea name="emanon[cta_lead]" rows="8" style="width:40%;"><?php echo esc_attr( $lead ); ?></textarea><br/>
	</p>
	<p>
		<strong><?php _e( 'ボタン テキスト', 'emanon-premium' ); ?></strong><br/>
		<input type="text" name="emanon[cta_btn_text]" value="<?php echo esc_attr( $btn_text ); ?>" style="width:20%;" /><br/>
	</p>
	<p>
		<strong><?php _e( 'ボタン URL', 'emanon-premium' ); ?></strong><br/>
		<input type="text" name="emanon[cta_btn_url]" value="<?php echo esc_attr( $btn_url ); ?>" style="width:80%;" /><br/>
	</p>
	<p>
		<strong><?php _e( 'ボタン レイアウト', 'emanon-premium' ); ?></strong><br/>
			<input type="radio" id="center_bottom" name="emanon[cta_btn_layout]" value="center_bottom"<?php echo ( 'center_bottom' == $btn_layout ) ? ' checked' : ''; ?> /><label for="center_bottom"><?php _e( 'コンテンツ［下部］', 'emanon-premium' ); ?></label><br>
			<input type="radio" id="text_bottom" name="emanon[cta_btn_layout]" value="text_bottom"<?php echo ( 'text_bottom' == $btn_layout ) ? ' checked' : ''; ?> /><label for="text_bottom"><?php _e( 'リード文［下部］', 'emanon-premium' ); ?></label>
	</p>
	<p>
		<strong><?php _e( 'マイクロコピー', 'emanon-premium' ); ?></strong><br/>
		<input type="text" name="emanon[cta_microcopy]" value="<?php echo esc_attr( $microcopy ); ?>" style="width:40%;" /><br/>
	</p>
	<p>
		<strong><?php _e( 'マイクロコピー レイアウト', 'emanon-premium' ); ?></strong><br/>
			<input type="radio" id="on_button" name="emanon[cta_microcopy_layout]" value="on_button"<?php echo ( 'on_button' == $microcopy_layout ) ? ' checked' : ''; ?> /><label for="on_button"><?php _e( 'ボタン［上部］', 'emanon-premium' ); ?></label><br>
			<input type="radio" id="under_button" name="emanon[cta_microcopy_layout]" value="under_button"<?php echo ( 'under_button' == $microcopy_layout  ) ? ' checked' : ''; ?> /><label for="under_button"><?php _e( 'ボタン［下部］', 'emanon-premium' ); ?></label>
	</p>
	<?php
}

// 色設定
function emanon_cta_metabox_color() {
	global $post;
	$post_id          = $post->ID;
	$border           = get_post_meta( $post_id, 'cta_border', true );
	if( $border ) {
		$border = "checked";
		} else { $border = "/";
	}
	$active_bg_color  = get_post_meta( $post_id, 'cta_active_background_color', true );
	if( $active_bg_color ) {
		$active_bg_color = "checked";
		} else { $active_bg_color = "/";
	}
	$bg_color         = get_post_meta( $post_id, 'cta_background_color', true );
	$title_color      = get_post_meta( $post_id, 'cta_title_color', true );
	$lead_color       = get_post_meta( $post_id, 'cta_lead_color', true );
	$btn_border_color = get_post_meta( $post_id, 'cta_btn_border_color', true);
	$btn_bg_color     = get_post_meta( $post_id, 'cta_btn_background_color', true );
	$btn_text_color   = get_post_meta( $post_id, 'cta_btn_text_color', true );
	$microcopy_color  = get_post_meta( $post_id, 'cta_microcopy_color', true );
	if ( empty( $bg_color ) ) { $bg_color = '#eeeff0'; }
	if ( empty( $title_color ) ) { $title_color = '#333333'; }
	if ( empty( $lead_color ) ) { $lead_color = '#333333'; }
	if ( empty( $btn_border_color ) ) { $btn_border_color = emanon_primary_color(); }
	if ( empty( $btn_text_color ) ) { $btn_text_color = emanon_primary_color(); }
	if ( empty( $microcopy_color ) ) { $microcopy_color = '#333333'; }
	if( $btn_bg_color ) {
			$btn_bg_color = "checked";
		} else { $btn_bg_color = "/";
	}
?>
	<p>
		<label for="emanon[cta_border]">
			<strong><?php _e( '枠線', 'emanon-premium' ); ?></strong><br/>
			<span class="switch-button">
				<input type="checkbox" name="emanon[cta_border]" id="emanon[cta_border]" value="1" <?php echo esc_attr( $border ); ?>>
				<span class="switch-slider"></span>
				<span class="switch-button__label">
				<?php _e( '有効', 'emanon-premium' ); ?>
				</span>
			</span>
		</label>
	</p>
	<p>
		<strong><?php _e( '背景色', 'emanon-premium' ); ?></strong><br/>
		<label for="emanon[cta_active_background_color]">
			<span class="switch-button">
				<input type="checkbox" name="emanon[cta_active_background_color]" id="emanon[cta_active_background_color]" value="1" <?php echo esc_attr( $active_bg_color ); ?>>
				<span class="switch-slider"></span>
				<span class="switch-button__label">
				<?php _e( '有効', 'emanon-premium' ); ?>
				</span>
			</span>
		</label>
		<br>
		<input type="text" name="emanon[cta_background_color]" class="emanon_color_field" data-default-color="#eeeff0" value="<?php echo esc_attr( $bg_color ); ?>" ><br/>
	</p>
	<p>
		<strong><?php _e( 'タイトル', 'emanon-premium' ); ?></strong><br/>
		<input type="text" name="emanon[cta_title_color]" class="emanon_color_field" data-default-color="#333333" value="<?php echo esc_attr( $title_color ); ?>" ><br/>
	</p>
	<p>
		<strong><?php _e( 'リード文', 'emanon-premium' ); ?></strong><br/>
		<input type="text" name="emanon[cta_lead_color]" class="emanon_color_field" data-default-color="#333333" value="<?php echo esc_attr( $lead_color ); ?>" ><br/>
	</p>
	<p>
		<strong><?php _e( 'ボタン 枠線', 'emanon-premium' ); ?></strong><br/>
		<input type="text" name="emanon[cta_btn_border_color]" class="emanon_color_field" data-default-color="<?php echo esc_attr( emanon_primary_color() ); ?>" value="<?php echo esc_attr( $btn_border_color ); ?>" ><br/>
	</p>
	<p>
		<label for="emanon[cta_btn_background_color]">
			<strong><?php _e( 'ボタン 背景色', 'emanon-premium' ); ?></strong><br/>
				<span class="switch-button">
					<input type="checkbox" name="emanon[cta_btn_background_color]" id="emanon[cta_btn_background_color]" value="1" <?php echo esc_attr( $btn_bg_color ); ?>>
				<span class="switch-slider"></span>
				<span class="switch-button__label">
				<?php _e( '有効', 'emanon-premium' ); ?>
				</span>
			</span>
			<br/>
			<?php _e( 'ボタン枠線の色が背景色に反映されます。', 'emanon-premium' ); ?>
		</label>
	</p>
	<p>
		<strong><?php _e( 'ボタン テキスト', 'emanon-premium' ); ?></strong><br/>
		<input type="text" name="emanon[cta_btn_text_color]" class="emanon_color_field" data-default-color="<?php echo esc_attr( emanon_primary_color() ); ?>" value="<?php echo esc_attr( $btn_text_color ); ?>" ><br/>
	</p>
	<p>
		<strong><?php _e( 'マイクロコピー', 'emanon-premium' ); ?></strong><br/>
		<input type="text" name="emanon[cta_microcopy_color]" class="emanon_color_field" data-default-color="#333333" value="<?php echo esc_attr( $microcopy_color ); ?>" ><br/>
	</p>

	<?php
}

/**
 * Save from metabox CTA
 */
add_action(
	'save_post',
	function ( $post_id ) {

		if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {
				if ( ! current_user_can( 'edit_page', $post_id )) {
					return $post_id;
				}
		} elseif ( ! current_user_can( 'edit_post', $post_id ) ) {
				return $post_id;
		}

		if ( array_key_exists( 'emanon', $_POST ) ) {
			setting_cta_save_data( $post_id, 'cta_layout' );
			setting_cta_save_data( $post_id, 'cta_image' );
			setting_cta_save_data( $post_id, 'cta_title' );
			setting_cta_save_data( $post_id, 'cta_lead' );
			setting_cta_save_data( $post_id, 'cta_btn_url' );
			setting_cta_save_data( $post_id, 'cta_btn_text' );
			setting_cta_save_data( $post_id, 'cta_btn_layout' );
			setting_cta_save_data( $post_id, 'cta_microcopy' );
			setting_cta_save_data( $post_id, 'cta_microcopy_layout' );
			setting_cta_save_data( $post_id, 'cta_border' );
			setting_cta_save_data( $post_id, 'cta_active_background_color' );
			setting_cta_save_data( $post_id, 'cta_background_color' );
			setting_cta_save_data( $post_id, 'cta_title_header_color' );
			setting_cta_save_data( $post_id, 'cta_title_color' );
			setting_cta_save_data( $post_id, 'cta_lead_color' );
			setting_cta_save_data( $post_id, 'cta_btn_border_color' );
			setting_cta_save_data( $post_id, 'cta_btn_background_color' );
			setting_cta_save_data( $post_id, 'cta_btn_text_color' );
			setting_cta_save_data( $post_id, 'cta_microcopy_color' );
		}

	}
);

function setting_cta_save_data( $post_id, $key ) {
	$old_value = get_post_meta( $post_id, $key, true );
	$new_value = ( array_key_exists( $key, $_POST['emanon'] ) ? $_POST['emanon'][$key] : null );
	if ( $new_value && $new_value != $old_value ) {
		update_post_meta( $post_id, $key, $new_value );
	} elseif ( '' == $new_value && $old_value ) {
		delete_post_meta( $post_id, $key, $old_value );
	}
}

function get_setting_cta_save_data( $key, $default = false ) {
	$data = post_custom( $key );
	if ( empty( $data)  && $data !== '0' ) {
			$data = $default;
	}

	$data = maybe_unserialize( $data );

	return $data;
}
