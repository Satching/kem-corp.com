<?php
/**
 * CTA coustom post [Floating] | List of CTA [Floating] | Add New CTA [Floating]
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

add_action(
	'init',
	function () {

		/* カスタム投稿タイプを追加 */
		$labels = array (
			'name'               => __( 'CTA［追従型］一覧', 'emanon-premium' ),
			'add_new_item'       => __( 'CTA［追従型］追加', 'emanon-premium' ),
			'edit_item'          => __( '編集', 'emanon-premium' ),
			'new_item'           => __( '新規', 'emanon-premium' ),
			'view_item'          => __( '表示', 'emanon-premium' ),
			'search_items'       => __( '検索', 'emanon-premium' ),
			'not_found'          => __( '見つかりませんでした。', 'emanon-premium' ),
			'not_found_in_trash' => __( 'ゴミ箱内に見つかりませんでした', 'emanon-premium' )
		);

		$rewrite = array (
			'slug' => 'emanon-floating'
		);

		$supports = array (
			'title'
		);

		register_post_type (
			'emanon-floating', //カスタム投稿タイプ名
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

// Add metabox for CTA [Floating]
add_action(
	'add_meta_boxes',
	function () {

		// CTA Floating設定
		add_meta_box( 'emanon_cta_floating_metabox', __( 'レイアウト設定', 'emanon-premium' ), 'emanon_cta_floating_metabox', 'emanon-floating', 'normal' );
		// CTA Floating［1］設定
		add_meta_box( 'emanon_cta_floating_1_metabox', __( 'CTA［追従型］設定［1］', 'emanon-premium' ), 'emanon_cta_floating_1_metabox', 'emanon-floating', 'normal' );
		// CTA Floating［2］設定
		add_meta_box( 'emanon_cta_floating_2_metabox', __( 'CTA［追従型］設定［2］', 'emanon-premium' ), 'emanon_cta_floating_2_metabox', 'emanon-floating', 'normal' );

	}
);

// CTA [Floating]設定
function emanon_cta_floating_metabox() {
	global $post;
	$id                 = $post->ID;
	$animation_value_pc = get_post_meta( $id, 'cta_floating_slide_in_pc', true );
	if( $animation_value_pc ) {
		$animation_checked_pc = "checked";
		} else { $animation_checked_pc = "/";
	}
	$cta_floating_layout = get_post_meta( $id, 'cta_floating_layout', true );
	if ( empty( $cta_floating_layout ) ) {
		$cta_floating_layout = 'cta-floating-rectangle';
	}
?>
	<p>
		<strong><?php _e( 'レイアウト', 'emanon-premium' ); ?></strong><br/>
			<input type="radio" name="emanon[cta_floating_layout]" value="cta-floating-rectangle"<?php echo ( 'cta-floating-rectangle' == $cta_floating_layout ) ? ' checked' : ''; ?> /><label><?php _e( '長方形レイアウト', 'emanon-premium' ); ?></label><br>
			<input type="radio" name="emanon[cta_floating_layout]" value="cta-floating-square"<?php echo ( 'cta-floating-square' == $cta_floating_layout ) ? ' checked' : ''; ?> /><label><?php _e( '四角形レイアウト', 'emanon-premium' ); ?></label><br>
			<small class="notes"><span class="red">※</span><?php _e( '四角形レイアウトはCTA［追従型］設定［1］を使用します。', 'emanon-premium' ); ?></small>
	</p>
	<p>
		<strong><?php _e( 'アニメーション', 'emanon-premium' ); ?></strong><br/>
		<label for="emanon[cta_floating_slide_in_pc]">
			<span class="switch-button">
				<input type="checkbox" name="emanon[cta_floating_slide_in_pc]" id="emanon[cta_floating_slide_in_pc]" value="1" <?php echo esc_attr( $animation_checked_pc ); ?>>
				<span class="switch-slider"></span>
				<span class="switch-button__label">
				<?php _e( '有効［PC］', 'emanon-premium' ); ?>
				</span>
			</span>
		</label><br>
		<small class="notes"><span class="red">※</span><?php _e( 'パソコンでWebサイトの表示時にフェードインのアニメーションを有効にします。', 'emanon-premium' ); ?></small>
	</p>
	<?php
}

function emanon_cta_floating_1_metabox() {
	global $post;
	$id                             = $post->ID;
	$cta_floating_icon_1            = get_post_meta( $id, 'cta_floating_icon_1', true );
	$cta_floating_icon_image_1      = get_post_meta( $id, 'cta_floating_icon_image_1', true );
	$cta_floating_url_1             = get_post_meta( $id, 'cta_floating_url_1', true );
	$cta_floating_title_1           = get_post_meta( $id, 'cta_floating_title_1', true );
	$cta_floating_title_bg_color    = get_post_meta( $id, 'cta_floating_title_bg_color', true );
	$cta_floating_lead              = get_post_meta( $id, 'cta_floating_lead', true );
	$cta_floating_icon_color_1      = get_post_meta( $id, 'cta_floating_icon_color_1', true );
	$cta_floating_title_color_1     = get_post_meta( $id, 'cta_floating_title_color_1', true );
	$cta_floating_lead_color        = get_post_meta( $id, 'cta_floating_lead_color', true );
	$cta_floating_bg_color_1        = get_post_meta( $id, 'cta_floating_background_color_1', true );
	$cta_floating_close_color       = get_post_meta( $id, 'cta_floating_close_color', true );
	$cta_floating_close_bg_color    = get_post_meta( $id, 'cta_floating_close_bg_color', true );
	if ( empty( $cta_floating_icon_color_1 ) ) { $cta_floating_icon_color_1 = '#ffffff'; }
	if ( empty( $cta_floating_title_color_1 ) ) { $cta_floating_title_color_1 = '#ffffff'; }
	if ( empty( $cta_floating_title_bg_color ) ) { $cta_floating_title_bg_color = emanon_primary_color(); }
	if ( empty( $cta_floating_lead_color ) ) { $cta_floating_lead_color = '#ffffff'; }	
	if ( empty( $cta_floating_bg_color_1 ) ) { $cta_floating_bg_color_1 = emanon_primary_color(); }
	if ( empty( $cta_floating_close_color ) ) { $cta_floating_close_color = '#ffffff'; }
	if ( empty( $cta_floating_close_bg_color ) ) { $cta_floating_close_bg_color = emanon_primary_color(); }
?>

<p>
<strong><?php _e( 'アイコン画像', 'emanon-premium' ); ?></strong><br>
<?php
	emanon_custom_media_uploader( 'emanon[cta_floating_icon_image_1]', $cta_floating_icon_image_1, 'cta_floating_icon_image_1' );
?>
</p>
<p>
	<strong><?php _e( 'アイコンタグ', 'emanon-premium' ); ?></strong><br>
	<input type="text" name="emanon[cta_floating_icon_1]" value="<?php echo esc_attr( $cta_floating_icon_1 ); ?>" style="width:20%;" /><br>
	<small class="notes"><span class="red">※</span><?php _e( '例) icon-bubbles', 'emanon-premium' ); ?></small>
</p>
<p>
	<strong><?php _e( 'タイトル', 'emanon-premium' ); ?></strong><br>
	<input type="text" name="emanon[cta_floating_title_1]" value="<?php echo esc_attr( $cta_floating_title_1 ); ?>" style="width:20%;" />
</p>
<p>
	<strong><?php _e( 'リード文', 'emanon-premium' ); ?></strong><br/>
	<textarea name="emanon[cta_floating_lead]" rows="5" style="width:40%;"><?php echo esc_attr( $cta_floating_lead ); ?></textarea><br/>
	<small class="notes"><span class="red">※</span><?php _e( '四角形レイアウトに適用されます。', 'emanon-premium' ); ?></small>
</p>
<p>
	<strong><?php _e( 'URL', 'emanon-premium' ); ?></strong><br>
	<input type="text" name="emanon[cta_floating_url_1]" value="<?php echo esc_attr( $cta_floating_url_1 ); ?>" style="width:50%;" />
	<small class="notes"><span class="red">※</span><?php _e( 'URLは、CTA追従［1］の表示に必要です。', 'emanon-premium' ); ?></small>
</p>
<p>
	<strong><?php _e( 'アイコン', 'emanon-premium' ); ?></strong><br>
	<input type="text" name="emanon[cta_floating_icon_color_1]" class="emanon_color_field" data-default-color="#fff" value="<?php echo esc_attr( $cta_floating_icon_color_1 ); ?>" >
</p>
<p>
	<strong><?php _e( 'タイトル', 'emanon-premium' ); ?></strong><br>
	<input type="text" name="emanon[cta_floating_title_color_1]" class="emanon_color_field" data-default-color="#fff" value="<?php echo esc_attr( $cta_floating_title_color_1 ); ?>" >
</p>
<p>
	<strong><?php _e( 'タイトル 背景色', 'emanon-premium' ); ?></strong><br>
	<input type="text" name="emanon[cta_floating_title_bg_color]" class="emanon_color_field" data-default-color="<?php echo esc_attr( emanon_primary_color() ); ?>" value="<?php echo esc_attr( $cta_floating_title_bg_color ); ?>" >
	<small class="notes"><span class="red">※</span><?php _e( '四角形レイアウトに適用されます。', 'emanon-premium' ); ?></small>
</p>
<p>
	<strong><?php _e( 'リード文', 'emanon-premium' ); ?></strong><br>
	<input type="text" name="emanon[cta_floating_lead_color]" class="emanon_color_field" data-default-color="#fff" value="<?php echo esc_attr( $cta_floating_lead_color ); ?>" ><br/>
	<small class="notes"><span class="red">※</span><?php _e( '四角形レイアウトに適用されます。', 'emanon-premium' ); ?></small>
</p>
<p>
	<strong><?php _e( '背景色', 'emanon-premium' ); ?></strong><br>
	<input type="text" name="emanon[cta_floating_background_color_1]" class="emanon_color_field" data-default-color="<?php echo esc_attr( emanon_primary_color() ); ?>" value="<?php echo esc_attr( $cta_floating_bg_color_1 ); ?>" >
</p>
<p>
	<strong><?php _e( 'アイコン「閉じる」', 'emanon-premium' ); ?></strong><br>
	<input type="text" name="emanon[cta_floating_close_color]" class="emanon_color_field" data-default-color="#fff" value="<?php echo esc_attr( $cta_floating_close_color ); ?>" ><br/>
</p>
<p>
	<strong><?php _e( 'アイコン「閉じる」背景色', 'emanon-premium' ); ?></strong><br>
	<input type="text" name="emanon[cta_floating_close_bg_color]" class="emanon_color_field" data-default-color="<?php echo esc_attr( emanon_primary_color() ); ?>" value="<?php echo esc_attr( $cta_floating_close_bg_color ); ?>" ><br/>
	<small class="notes"><span class="red">※</span><?php _e( '四角形レイアウトに適用されます。', 'emanon-premium' ); ?></small>
</p>
<?php
}

function emanon_cta_floating_2_metabox() {
	global $post;
	$id                             = $post->ID;
	$cta_floating_icon_2            = get_post_meta( $id, 'cta_floating_icon_2', true );
	$cta_floating_icon_image_2      = get_post_meta( $id, 'cta_floating_icon_image_2', true );
	$cta_floating_url_2             = get_post_meta( $id, 'cta_floating_url_2', true );
	$cta_floating_title_2           = get_post_meta( $id, 'cta_floating_title_2', true );
	$cta_floating_icon_color_2      = get_post_meta( $id, 'cta_floating_icon_color_2', true );
	$cta_floating_title_color_2     = get_post_meta( $id, 'cta_floating_title_color_2', true );
	$cta_floating_bg_color_2        = get_post_meta( $id, 'cta_floating_background_color_2', true );
	if ( empty( $cta_floating_icon_color_2 ) ) { $cta_floating_icon_color_2 = '#ffffff'; }
	if ( empty( $cta_floating_title_color_2 ) ) { $cta_floating_title_color_2 = '#ffffff'; }
	if ( empty( $cta_floating_bg_color_2 ) ) { $cta_floating_bg_color_2 = emanon_primary_color(); }
?>

<p>
<strong><?php _e( 'アイコン画像', 'emanon-premium' ); ?></strong><br>
	<?php
		emanon_custom_media_uploader( 'emanon[cta_floating_icon_image_2]', $cta_floating_icon_image_2, 'cta_floating_icon_image_2' );
	?>
</p>
<p>
	<strong><?php _e( 'アイコンタグ', 'emanon-premium' ); ?></strong><br>
	<small><?php _e( '例) icon-mail', 'emanon-premium' ); ?></small><br>
	<input type="text" name="emanon[cta_floating_icon_2]" value="<?php echo esc_attr( $cta_floating_icon_2 ); ?>" style="width:20%;" />
</p>
<hr>
<p>
	<strong><?php _e( 'タイトル', 'emanon-premium' ); ?></strong><br>
	<input type="text" name="emanon[cta_floating_title_2]" value="<?php echo esc_attr( $cta_floating_title_2 ); ?>" style="width:20%;" />
</p>
<p>
	<strong><?php _e( 'URL', 'emanon-premium' ); ?></strong><br>
	<input type="text" name="emanon[cta_floating_url_2]" value="<?php echo esc_attr( $cta_floating_url_2 ); ?>" style="width:50%;" />
</p>
<p>
	<strong><?php _e( 'アイコン', 'emanon-premium' ); ?></strong><br>
	<input type="text" name="emanon[cta_floating_icon_color_2]" class="emanon_color_field" data-default-color="#fff" value="<?php echo esc_attr( $cta_floating_icon_color_2 ); ?>" >
</p>
<p>
	<strong><?php _e( 'タイトル', 'emanon-premium' ); ?></strong><br>
	<input type="text" name="emanon[cta_floating_title_color_2]" class="emanon_color_field" data-default-color="#fff" value="<?php echo esc_attr( $cta_floating_title_color_2 ); ?>" ><br/>
</p>
<p>
	<strong><?php _e( '背景色', 'emanon-premium' ); ?></strong><br>
	<input type="text" name="emanon[cta_floating_background_color_2]" class="emanon_color_field" data-default-color="<?php echo esc_attr( emanon_primary_color() ); ?>" value="<?php echo esc_attr( $cta_floating_bg_color_2 ); ?>" ><br/>
</p>
<?php
}

/**
 * Save from metabox CTA [Floating]
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
			setting_cta_floating_save_data( $post_id, 'cta_floating_slide_in_pc' );
			setting_cta_floating_save_data( $post_id, 'cta_floating_layout' );
			setting_cta_floating_save_data( $post_id, 'cta_floating_icon_1' );
			setting_cta_floating_save_data( $post_id, 'cta_floating_icon_image_1' );
			setting_cta_floating_save_data( $post_id, 'cta_floating_url_1' );
			setting_cta_floating_save_data( $post_id, 'cta_floating_title_1' );
			setting_cta_floating_save_data( $post_id, 'cta_floating_lead' );
			setting_cta_floating_save_data( $post_id, 'cta_floating_icon_color_1' );
			setting_cta_floating_save_data( $post_id, 'cta_floating_title_color_1' );
			setting_cta_floating_save_data( $post_id, 'cta_floating_title_bg_color' );
			setting_cta_floating_save_data( $post_id, 'cta_floating_lead_color' );
			setting_cta_floating_save_data( $post_id, 'cta_floating_background_color_1' );
			setting_cta_floating_save_data( $post_id, 'cta_floating_close_color' );
			setting_cta_floating_save_data( $post_id, 'cta_floating_close_bg_color' );
			setting_cta_floating_save_data( $post_id, 'cta_floating_icon_2' );
			setting_cta_floating_save_data( $post_id, 'cta_floating_icon_image_2' );
			setting_cta_floating_save_data( $post_id, 'cta_floating_url_2' );
			setting_cta_floating_save_data( $post_id, 'cta_floating_title_2' );
			setting_cta_floating_save_data( $post_id, 'cta_floating_icon_color_2' );
			setting_cta_floating_save_data( $post_id, 'cta_floating_title_color_2' );
			setting_cta_floating_save_data( $post_id, 'cta_floating_background_color_2' );
		}

	}
);

function setting_cta_floating_save_data( $post_id, $key ) {
	$old_value = get_post_meta( $post_id, $key, true );
	$new_value = ( array_key_exists( $key, $_POST['emanon'] ) ? $_POST['emanon'][$key] : null );
	if ( $new_value && $new_value != $old_value ) {
		update_post_meta( $post_id, $key, $new_value );
	} elseif ( '' == $new_value && $old_value ) {
		delete_post_meta( $post_id, $key, $old_value );
	}
}

function get_setting_cta_floating_save_data( $key, $default = false ) {
	$data = post_custom( $key );
	if ( empty( $data)  && $data !== '0' ) {
			$data = $default;
	}

	$data = maybe_unserialize( $data );

	return $data;
}