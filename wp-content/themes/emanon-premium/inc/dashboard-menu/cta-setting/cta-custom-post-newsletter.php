<?php
/**
 * CTA coustom post [News Letter] | List of CTA [News Letter] | Add New CTA [News Letter]
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

add_action(
	'init',
	function () {

		/* カスタム投稿タイプを追加 */
		$labels = array (
			'name'               => __( 'CTA［メルマガ］一覧', 'emanon-premium' ),
			'add_new_item'       => __( 'CTA［メルマガ］追加', 'emanon-premium' ),
			'edit_item'          => __( '編集', 'emanon-premium' ),
			'new_item'           => __( '新規', 'emanon-premium' ),
			'view_item'          => __( '表示', 'emanon-premium' ),
			'search_items'       => __( '検索', 'emanon-premium' ),
			'not_found'          => __( '見つかりませんでした。', 'emanon-premium' ),
			'not_found_in_trash' => __( 'ゴミ箱内に見つかりませんでした', 'emanon-premium' )
		);

		$rewrite = array (
			'slug' => 'emanon-news-letter'
		);

		$supports = array (
			'title'
		);

		register_post_type (
			'emanon-news-letter', //カスタム投稿タイプ名
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

// Add metabox for CTA[News Letter]
add_action (
	'add_meta_boxes',
	function () {

		// タイトル、テキスト、ショートコードタグ設定
		add_meta_box( 'emanon_cta_newsletter_metabox_text', __( 'フォーム設定', 'emanon-premium' ), 'emanon_cta_newsletter_metabox_text', 'emanon-news-letter', 'normal' );

		// 色設定
		add_meta_box( 'emanon_cta_newsletter_metabox_color', __( '配色設定', 'emanon-premium' ), 'emanon_cta_newsletter_metabox_color', 'emanon-news-letter', 'normal' );

	}
);

// CTA [News Letter]設定
function emanon_cta_newsletter_metabox_text() {
	global $post;
	$post_id             = $post->ID;
	$title               = get_post_meta( $post_id, 'cta_newsletter_title', true );
	$microcopy           = get_post_meta( $post_id, 'cta_newsletter_microcopy', true );
	$microcopy_layout    = get_post_meta( $post_id, 'cta_newsletter_microcopy_layout', true );
	if ( empty( $microcopy_layout ) ) { $microcopy_layout = 'under_button'; }
	$privacy_policy      = get_post_meta( $post_id, 'cta_privacy_policy', true );
	if ( empty( $privacy_policy ) ) { $privacy_policy = __( 'プライバシーポリシーについて', 'emanon-premium' ); }
	$privacy_policy_url  = get_post_meta( $post_id, 'cta_newsletter_privacy_policy_url', true );
	$form_action         = get_post_meta( $post_id, 'cta_newsletter_form_action', true );
	$input_hidden        = get_post_meta( $post_id, 'cta_newsletter_input_hidden', true );
	$input_from          = get_post_meta( $post_id, 'cta_newsletter_input_from', true );
	$input_submit        = get_post_meta( $post_id, 'cta_newsletter_input_submit', true );
	$shortcode           = get_post_meta( $post_id, 'cta_newsletter_shortcode', true );
	
?>
	<p>
		<strong><?php _e( 'タイトル', 'emanon-premium' ); ?></strong><br/>
		<input type="text" name="emanon[cta_newsletter_title]" value="<?php echo esc_attr( $title ); ?>" style="width:40%;" /><br/>
	</p>
	<p>
		<strong><?php _e( 'マイクロコピー', 'emanon-premium' ); ?></strong><br/>
		<input type="text" name="emanon[cta_newsletter_microcopy]" value="<?php echo esc_attr( $microcopy ); ?>" style="width:20%;" /><br/>
	</p>
	<p>
		<strong><?php _e( 'マイクロコピー レイアウト', 'emanon-premium' ); ?></strong><br/>
		<input type="radio" id="on_button" name="emanon[cta_newsletter_microcopy_layout]" value="on_button"<?php echo ( 'on_button' == $microcopy_layout ) ? ' checked' : ''; ?> /><label for="on_button"><?php _e( 'ボタン［上部］', 'emanon-premium' ); ?></label><br>
			<input type="radio" id="under_button" name="emanon[cta_newsletter_microcopy_layout]" value="under_button"<?php echo ( 'under_button' == $microcopy_layout  ) ? ' checked' : ''; ?> /><label for="under_button"><?php _e( 'ボタン［下部］', 'emanon-premium' ); ?></label>
	</p>
	<p>
		<strong><?php _e( 'プライバシーポリシー', 'emanon-premium' ); ?></strong><br/>
		<input type="text" name="emanon[cta_newsletter_privacy_policy]" value="<?php echo esc_attr( $privacy_policy ); ?>" style="width:30%;" /><br/>
	</p>
	<p>
		<strong><?php _e( 'プライバシーポリシー URL', 'emanon-premium' ); ?></strong><br>
		<input type="text" name="emanon[cta_newsletter_privacy_policy_url]" value="<?php echo esc_attr( $privacy_policy_url ); ?>" style="width:50%;" />
	</p>
	<p>
		<strong><?php _e( 'Form actionタグ', 'emanon-premium' ); ?></strong><br/>
		<textarea name="emanon[cta_newsletter_form_action]" rows="5" style="width:80%;"><?php echo esc_html( $form_action ); ?></textarea>
	</p>
	<p>
		<strong><?php _e( 'Input hiddenタグ', 'emanon-premium' ); ?></strong><br/>
		<textarea name="emanon[cta_newsletter_input_hidden]" rows="5" style="width:80%;"><?php echo esc_html( $input_hidden ); ?></textarea>
	</p>
	<p>
		<strong><?php _e( 'Input mail address fromタグ', 'emanon-premium' ); ?></strong><br/>
		<textarea name="emanon[cta_newsletter_input_from]" rows="5" style="width:80%;"><?php echo esc_html( $input_from ); ?></textarea>
	</p>
	<p>
		<strong><?php _e( 'Input submitタグ', 'emanon-premium' ); ?></strong><br/>
		<textarea name="emanon[cta_newsletter_input_submit]" rows="5" style="width:80%;"><?php echo esc_html( $input_submit ); ?></textarea>
	</p>
	<hr>
	<p>
		<strong><?php _e( 'ショートコード', 'emanon-premium' ); ?></strong><br/>
		<textarea name="emanon[cta_newsletter_shortcode]" rows="1" style="width:50%;"><?php echo esc_html( $shortcode ); ?></textarea>
	</p>
	<?php
}

// 色設定
function emanon_cta_newsletter_metabox_color() {
	global $post;
	$post_id              = $post->ID;
	$active_bg_color      = get_post_meta( $post_id, 'cta_newsletter_active_background_color', true );
	if( $active_bg_color ) {
		$active_bg_color = "checked";
		} else { $active_bg_color = "/";
	}
	$bg_color             = get_post_meta( $post_id, 'cta_newsletter_background_color', true );
	$title_color          = get_post_meta( $post_id, 'cta_newsletter_title_color', true );
	$lead_color           = get_post_meta( $post_id, 'cta_newsletter_lead_color', true );
	$microcopy_color      = get_post_meta( $post_id, 'cta_newsletter_microcopy_color', true );
	$privacy_policy_color = get_post_meta( $post_id, 'cta_newsletter_privacy_policy_color', true );
	if ( empty( $bg_color ) ) { $bg_color = '#eeeff0'; }
	if ( empty( $title_color ) ) { $title_color = '#333333'; }
	if ( empty( $microcopy_color ) ) { $microcopy_color = '#333333'; }
	if ( empty( $privacy_policy_color ) ) { $privacy_policy_color = emanon_link_color(); }
?>
	<p>
		<strong><?php _e( '背景色', 'emanon-premium' ); ?></strong><br/>
		<label for="emanon[cta_newsletter_active_background_color]">
			<span class="switch-button">
				<input type="checkbox" name="emanon[cta_newsletter_active_background_color]" id="emanon[cta_newsletter_active_background_color]" value="1" <?php echo esc_attr( $active_bg_color ); ?>>
				<span class="switch-slider"></span>
				<span class="switch-button__label">
				<?php _e( '有効', 'emanon-premium' ); ?>
				</span>
			</span>
		</label>
		<br>
		<input type="text" name="emanon[cta_newsletter_background_color]" class="emanon_color_field" data-default-color="#eeeff0" value="<?php echo esc_attr( $bg_color ); ?>" ><br/>
	</p>
	<p>
		<strong><?php _e( 'タイトル', 'emanon-premium' ); ?></strong><br/>
		<input type="text" name="emanon[cta_newsletter_title_color]" class="emanon_color_field" data-default-color="#333" value="<?php echo esc_attr( $title_color ); ?>" ><br/>
	</p>
	<p>
		<strong><?php _e( 'マイクロコピー', 'emanon-premium' ); ?></strong><br/>
		<input type="text" name="emanon[cta_newsletter_microcopy_color]" class="emanon_color_field" data-default-color="#333" value="<?php echo esc_attr( $microcopy_color ); ?>" ><br/>
	</p>
	<p>
		<strong><?php _e( 'プライバシーポリシー', 'emanon-premium' ); ?></strong><br/>
		<input type="text" name="emanon[cta_newsletter_privacy_policy_color]" class="emanon_color_field" data-default-color="<?php echo esc_attr( emanon_link_color() ); ?>" value="<?php echo esc_attr( $privacy_policy_color ); ?>" ><br/>
	</p>
	<?php
}

/**
 * Save from metabox [News Letter]
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
			setting_cta_newsletter_save_data( $post_id, 'cta_newsletter_title' );
			setting_cta_newsletter_save_data( $post_id, 'cta_newsletter_btn_url' );
			setting_cta_newsletter_save_data( $post_id, 'cta_newsletter_btn_text' );
			setting_cta_newsletter_save_data( $post_id, 'cta_newsletter_btn_layout' );
			setting_cta_newsletter_save_data( $post_id, 'cta_newsletter_microcopy' );
			setting_cta_newsletter_save_data( $post_id, 'cta_newsletter_microcopy_layout' );
			setting_cta_newsletter_save_data( $post_id, 'cta_newsletter_form_action' );
			setting_cta_newsletter_save_data( $post_id, 'cta_newsletter_input_hidden' );
			setting_cta_newsletter_save_data( $post_id, 'cta_newsletter_input_from' );
			setting_cta_newsletter_save_data( $post_id, 'cta_newsletter_input_submit' );
			setting_cta_newsletter_save_data( $post_id, 'cta_newsletter_shortcode' );
			setting_cta_newsletter_save_data( $post_id, 'cta_newsletter_privacy_policy' );
			setting_cta_newsletter_save_data( $post_id, 'cta_newsletter_privacy_policy_url' );
			setting_cta_newsletter_save_data( $post_id, 'cta_newsletter_active_background_color' );
			setting_cta_newsletter_save_data( $post_id, 'cta_newsletter_background_color' );
			setting_cta_newsletter_save_data( $post_id, 'cta_newsletter_title_color' );
			setting_cta_newsletter_save_data( $post_id, 'cta_newsletter_microcopy_color' );
			setting_cta_newsletter_save_data( $post_id, 'cta_newsletter_privacy_policy_color' );
		}

	}
);

function setting_cta_newsletter_save_data( $post_id, $key ) {
	$old_value = get_post_meta( $post_id, $key, true );
	$new_value = ( array_key_exists( $key, $_POST['emanon'] ) ? $_POST['emanon'][$key] : null );
	if ( $new_value && $new_value != $old_value ) {
		update_post_meta( $post_id, $key, $new_value );
	} elseif ( '' == $new_value && $old_value ) {
		delete_post_meta( $post_id, $key, $old_value );
	}
}

function get_setting_cta_newsletter_save_data( $key, $default = false ) {
	$data = post_custom( $key );
	if ( empty( $data)  && $data !== '0' ) {
			$data = $default;
	}

	$data = maybe_unserialize( $data );

	return $data;
}
