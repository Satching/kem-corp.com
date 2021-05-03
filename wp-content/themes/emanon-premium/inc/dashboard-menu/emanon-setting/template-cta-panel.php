<?php
/**
 * Theme dashboard cta panel
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

// 設定情報を保存
$POST = stripslashes_deep($_POST);
if ( isset($POST['update_options']) ) {

	$names = array(
		'display_header_tel',
		'display_header_access',
		'header_access_label',
		'header_access_url',
		'header_tel_access_layout',
		'display_header_cta_pc',
		'display_header_cta_sp',
		'header_cta_icon',
		'header_cta_label',
		'display_header_cta_label_sp',
		'header_contact_style',
		'contact_logo_image',
		'contact_logo_url',
		'phone_title',
		'phone_number',
		'office_hours',
		'contact_btn_title_1',
		'contact_btn_url_1',
		'contact_btn_target_brank_1',
		'contact_btn_text_1',
		'contact_btn_microcopy_1',
		'contact_btn_title_2',
		'contact_btn_url_2',
		'contact_btn_target_brank_2',
		'contact_btn_text_2',
		'contact_btn_microcopy_2',
		'contact_btn_title_3',
		'contact_btn_url_3',
		'contact_btn_target_brank_3',
		'contact_btn_text_3',
		'contact_btn_microcopy_3',
	);

	foreach ( $names as $key ) {
		$value = 'emanon_' .$key;
		$name  = $key;

		if ( isset( $POST[$value] ) && ! empty( $POST[$value] ) ) {
			set_theme_mod( $name, $POST[$value] );
		} else {
			remove_theme_mod( $name );
		}

	}

}
?>

<div id="panel9" class="tab-panel">

	<div class="postbox metabox-holder">
		<h3 class="hndle"><?php _e( 'ヘッダーCTA設定', 'emanon-premium' ); ?></h3>
			<div class="inside">
				<table class="form-table">
					<tr valign="top">
						<th scope="row"><label for="emanon_display_header_tel"><?php _e( '電話番号［ヘッダー］の表示', 'emanon-premium' ); ?></label></th>
						<td>
							<label for="emanon_display_header_tel">
								<span class="switch-button">
									<input type="checkbox" name="emanon_display_header_tel" id="emanon_display_header_tel" value="1" <?php echo ( get_theme_mod( 'display_header_tel', '' ) ? ' checked' : '' ); ?>>
									<span class="switch-slider"></span>
									<span class="switch-button__label">
									<?php _e( '有効［PC］', 'emanon-premium' ); ?>
									</span>
								</span>
							</label>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="emanon_display_header_access"><?php _e( 'アクセス［ヘッダー］の表示', 'emanon-premium' ); ?></label></th>
						<td>
							<label for="emanon_display_header_access">
								<span class="switch-button">
									<input type="checkbox" name="emanon_display_header_access" id="emanon_display_header_access" value="1" <?php echo ( get_theme_mod( 'display_header_access', '' ) ? ' checked' : '' ); ?>>
									<span class="switch-slider"></span>
									<span class="switch-button__label">
									<?php _e( '有効［PC］', 'emanon-premium' ); ?>
									</span>
								</span>
							</label>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="emanon_header_access_label"><?php _e( 'アクセス［ラベル］', 'emanon-premium' ); ?></label></th>
						<td>
						<?php
							$emanon_header_access_label= get_theme_mod( 'header_access_label', '' );
							if ( ! empty( $emanon_header_access_label ) ) {
								$emanon_header_access_label = get_theme_mod( 'header_access_label', '' );
							} else {
								$emanon_header_access_label = __( 'アクセス', 'emanon-premium' );
							}
						?>
						<input type="text" name="emanon_header_access_label" id="emanon_header_access_label" value="<?php echo get_theme_mod( 'header_access_label', $emanon_header_access_label ); ?>" style="width:20%;">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="emanon_header_access_url"><?php _e( 'アクセス［ページURL］', 'emanon-premium' ); ?></label></th>
						<td>
						<input type="text" name="emanon_header_access_url" id="emanon_header_access_url" value="<?php echo get_theme_mod( 'header_access_url', '' ); ?>" style="width:50%;"><br>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="emanon_header_tel_access_layout"><?php _e( 'レイアウト', 'emanon-premium' ); ?></label></th>
						<td>
						<?php
							$emanon_header_tel_access_layout = get_theme_mod( 'header_tel_access_layout', '' );
							if ( ! empty( $emanon_header_tel_access_layout ) ) {
								$emanon_header_tel_access_layout = get_theme_mod( 'header_tel_access_layout', '' );
							} else {
								$emanon_header_tel_access_layout = 'right';
							}
						?>
						<label><input name="emanon_header_tel_access_layout" type="radio" value="right" <?php checked( 'right', $emanon_header_tel_access_layout ); ?>><?php _e( 'ヘッダー［右］', 'emanon-premium' ); ?></label><br/>
						<label><input name="emanon_header_tel_access_layout" type="radio" value="left" <?php checked( 'left', $emanon_header_tel_access_layout ); ?>><?php _e( 'ヘッダー［左］', 'emanon-premium' ); ?></label>
						</td>
					</tr>
				</table>
			</div>
	</div>

	<div class="postbox metabox-holder">
		<h3 class="hndle"><?php _e( 'コンタクト設定', 'emanon-premium' ); ?></h3>
			<div class="inside">
				<table class="form-table">
					<tr valign="top">
						<th scope="row"><label for="emanon_display_header_cta_pc"><?php _e( 'コンタクトボタン［ヘッダー］の表示', 'emanon-premium' ); ?></label></th>
						<td>
							<label for="emanon_display_header_cta_pc">
								<span class="switch-button">
									<input type="checkbox" name="emanon_display_header_cta_pc" id="emanon_display_header_cta_pc" value="1" <?php echo ( get_theme_mod( 'display_header_cta_pc', '') ? ' checked' : '' ); ?>>
									<span class="switch-slider"></span>
									<span class="switch-button__label">
									<?php _e( '有効［PC］', 'emanon-premium' ); ?>
									</span>
								</span>
							</label>
							<br>
							<label for="emanon_display_header_cta_sp">
								<span class="switch-button">
									<input type="checkbox" name="emanon_display_header_cta_sp" id="emanon_display_header_cta_sp" value="1" <?php echo ( get_theme_mod( 'display_header_cta_sp', '') ? ' checked' : '' ); ?>>
									<span class="switch-slider"></span>
									<span class="switch-button__label">
									<?php _e( '有効［SP］', 'emanon-premium' ); ?>
									</span>
								</span>
							</label>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="emanon_header_cta_icon"><?php _e( 'コンタクトボタン［アイコン］', 'emanon-premium' ); ?></label></th>
						<td>
						<?php
							$emanon_header_cta_icon = get_theme_mod( 'header_cta_icon' );
							if ( ! empty( $emanon_header_cta_icon ) ) {
								$emanon_header_cta_icon = get_theme_mod( 'header_cta_icon' );
							} else {
								$emanon_header_cta_icon = 'icon-mail';
							}
						?>
						<input type="text" name="emanon_header_cta_icon" id="emanon_header_cta_icon" value="<?php echo $emanon_header_cta_icon; ?>" placeholder="<?php echo _e( '例）icon-mail', 'emanon-premium' ); ?>" style="width:30%;">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="emanon_header_cta_label"><?php _e( 'コンタクトボタン［ラベル］', 'emanon-premium' ); ?></label></th>
						<td>
						<input type="text" name="emanon_header_cta_label" id="emanon_header_cta_label" value="<?php echo get_theme_mod( 'header_cta_label', '' ); ?>" placeholder="<?php echo _e( '例）CONTACT', 'emanon-premium' ); ?>" style="width:30%;"><br/>
							<label for="emanon_display_header_cta_label_sp">
								<span class="switch-button">
									<input type="checkbox" name="emanon_display_header_cta_label_sp" id="emanon_display_header_cta_label_sp" value="1" <?php echo ( get_theme_mod( 'display_header_cta_label_sp', '') ? ' checked' : '' ); ?>>
									<span class="switch-slider"></span>
									<span class="switch-button__label">
									<?php _e( '有効［SP］', 'emanon-premium' ); ?>
									</span>
								</span>
							</label>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><?php _e( 'コンタクトボタン［スタイル］', 'emanon-premium' ); ?></th>
						<td>
						<?php
							$emanon_header_contact_style = get_theme_mod( 'header_contact_style' );
							if ( ! empty( $emanon_header_contact_style ) ) {
								$emanon_header_contact_style = get_theme_mod( 'header_contact_style' );
							} else {
								$emanon_header_contact_style = '1';
							}
						?>
						<select name="emanon_header_contact_style">
							<option value="1" <?php selected( '1', $emanon_header_contact_style ); ?>><?php _e( 'ロゴ | TEL', 'emanon-premium' ); ?></option>
							<option value="2" <?php selected( '2', $emanon_header_contact_style ); ?>><?php _e( 'ロゴ | ボタン［1］', 'emanon-premium' ); ?></option>
							<option value="3" <?php selected( '3', $emanon_header_contact_style ); ?>><?php _e( 'ロゴ | TEL | ボタン［1］', 'emanon-premium' ); ?></option>
							<option value="4" <?php selected( '4', $emanon_header_contact_style ); ?>><?php _e( 'ロゴ | ボタン［1］ | ボタン［2］', 'emanon-premium' ); ?></option>
							<option value="5" <?php selected( '5', $emanon_header_contact_style ); ?>><?php _e( 'TEL', 'emanon-premium' ); ?></option>
							<option value="6" <?php selected( '6', $emanon_header_contact_style ); ?>><?php _e( 'TEL | ボタン［1］', 'emanon-premium' ); ?></option>
							<option value="7" <?php selected( '7', $emanon_header_contact_style ); ?>><?php _e( 'TEL | ボタン［1］ | ボタン［2］', 'emanon-premium' ); ?></option>
							<option value="8" <?php selected( '8', $emanon_header_contact_style ); ?>><?php _e( 'ボタン［1］', 'emanon-premium' ); ?></option>
							<option value="9" <?php selected( '9', $emanon_header_contact_style ); ?>><?php _e( 'ボタン［1］ | ボタン［2］', 'emanon-premium' ); ?></option>
							<option value="10" <?php selected( '10', $emanon_header_contact_style ); ?>><?php _e( 'ボタン［1］ | ボタン［2］ | ボタン［3］', 'emanon-premium' ); ?></option>
						</select>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="emanon_contact_logo_image"><?php _e( 'ロゴ画像', 'emanon-premium' ); ?></label></th>
						<td>
						<?php
							emanon_custom_media_uploader( 'emanon_contact_logo_image', get_theme_mod( 'contact_logo_image', ''), 'emanon_contact_logo_image' );
						?>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="emanon_contact_logo_url"><?php _e( 'ロゴ URL', 'emanon-premium' ); ?></label></th>
						<td>
						<input type="text" name="emanon_contact_logo_url" id="emanon_contact_logo_url" value="<?php echo get_theme_mod( 'contact_logo_url', '' ); ?>" style="width:50%;"><br>
						<small class="notes"><span class="red">※</span><?php _e( 'ロゴ画像のリンク用URLを指定できます。', 'emanon-premium'  ); ?></small>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="emanon_phone_title"><?php _e( '電話番号タイトル', 'emanon-premium' ); ?></label></th>
						<td>
						<input type="text" name="emanon_phone_title" id="emanon_phone_title" value="<?php echo get_theme_mod( 'phone_title', '' ); ?>" style="width:30%;">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="emanon_phone_number"><?php _e( '電話番号', 'emanon-premium' ); ?></label></th>
						<td>
						<input type="text" name="emanon_phone_number" id="emanon_phone_number" value="<?php echo get_theme_mod( 'phone_number', '' ); ?>" style="width:30%;">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="emanon_office_hours"><?php _e( '営業時間', 'emanon-premium' ); ?></label></th>
						<td>
						<input type="text" name="emanon_office_hours" id="emanon_office_hours" value="<?php echo get_theme_mod( 'office_hours', '' ); ?>" style="width:30%;">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="emanon_contact_btn_title_1"><?php _e( 'ボタン タイトル［1］', 'emanon-premium' ); ?></label></th>
						<td>
						<input type="text" name="emanon_contact_btn_title_1" id="emanon_contact_btn_title_1" value="<?php echo get_theme_mod( 'contact_btn_title_1', '' ); ?>" style="width:30%;">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="emanon_contact_btn_url_1"><?php _e( 'ボタン URL［1］', 'emanon-premium' ); ?></label></th>
						<td>
						<input type="text" name="emanon_contact_btn_url_1" id="emanon_contact_btn_url_1" value="<?php echo get_theme_mod( 'contact_btn_url_1', '' ); ?>" style="width:50%;"><br>
							<label for="emanon_contact_btn_target_brank_1">
								<span class="switch-button">
									<input type="checkbox" name="emanon_contact_btn_target_brank_1" id="emanon_contact_btn_target_brank_1" value="1" <?php echo ( get_theme_mod( 'contact_btn_target_brank_1', '') ? ' checked' : '' ); ?>>
									<span class="switch-slider"></span>
									<span class="switch-button__label">
									<?php _e( '新しいウィンドウで開く', 'emanon-premium' ); ?>
									</span>
								</span>
							</label>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="emanon_contact_btn_text_1"><?php _e( 'ボタン テキスト［1］', 'emanon-premium' ); ?></label></th>
						<td>
						<input type="text" name="emanon_contact_btn_text_1" id="emanon_contact_btn_text_1" value="<?php echo get_theme_mod( 'contact_btn_text_1', '' ); ?>" style="width:30%;">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="emanon_contact_btn_microcopy_1"><?php _e( 'マイクロコピー［1］', 'emanon-premium' ); ?></label></th>
						<td>
							<textarea name="emanon_contact_btn_microcopy_1" id="emanon_contact_btn_microcopy_1" rows="3" style="width:30%;"><?php echo get_theme_mod( 'contact_btn_microcopy_1', '' ); ?></textarea>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="emanon_contact_btn_title_2"><?php _e( 'ボタン タイトル［2］', 'emanon-premium' ); ?></label></th>
						<td>
						<input type="text" name="emanon_contact_btn_title_2" id="emanon_contact_btn_title_2" value="<?php echo get_theme_mod( 'contact_btn_title_2', '' ); ?>" style="width:30%;">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="emanon_contact_btn_url_2"><?php _e( 'ボタン URL［2］', 'emanon-premium' ); ?></label></th>
						<td>
						<input type="text" name="emanon_contact_btn_url_2" id="emanon_contact_btn_url_2" value="<?php echo get_theme_mod( 'contact_btn_url_2', '' ); ?>" style="width:50%;"><br>
							<label for="emanon_contact_btn_target_brank_2">
								<span class="switch-button">
									<input type="checkbox" name="emanon_contact_btn_target_brank_2" id="emanon_contact_btn_target_brank_2" value="1" <?php echo ( get_theme_mod( 'contact_btn_target_brank_2', '') ? ' checked' : '' ); ?>>
									<span class="switch-slider"></span>
									<span class="switch-button__label">
									<?php _e( '新しいウィンドウで開く', 'emanon-premium' ); ?>
									</span>
								</span>
							</label>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="emanon_contact_btn_text_2"><?php _e( 'ボタン テキスト［2］', 'emanon-premium' ); ?></label></th>
						<td>
						<input type="text" name="emanon_contact_btn_text_2" id="emanon_contact_btn_text_2" value="<?php echo get_theme_mod( 'contact_btn_text_2', '' ); ?>" style="width:30%;">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="emanon_contact_btn_microcopy_2"><?php _e( 'マイクロコピー［2］', 'emanon-premium' ); ?></label></th>
						<td>
							<textarea name="emanon_contact_btn_microcopy_2" id="emanon_contact_btn_microcopy_2" rows="3" style="width:30%;"><?php echo get_theme_mod( 'contact_btn_microcopy_2', '' ); ?></textarea>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="emanon_contact_btn_title_3"><?php _e( 'ボタン タイトル［3］', 'emanon-premium' ); ?></label></th>
						<td>
						<input type="text" name="emanon_contact_btn_title_3" id="emanon_contact_btn_title_3" value="<?php echo get_theme_mod( 'contact_btn_title_3', '' ); ?>" style="width:30%;">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="emanon_contact_btn_url_3"><?php _e( 'ボタン URL［3］', 'emanon-premium' ); ?></label></th>
						<td>
						<input type="text" name="emanon_contact_btn_url_3" id="emanon_contact_btn_url_3" value="<?php echo get_theme_mod( 'contact_btn_url_3', '' ); ?>" style="width:50%;"><br>
						<label for="emanon_contact_btn_target_brank_3">
							<span class="switch-button">
								<input type="checkbox" name="emanon_contact_btn_target_brank_3" id="emanon_contact_btn_target_brank_3" value="1" <?php echo ( get_theme_mod( 'contact_btn_target_brank_3', '') ? ' checked' : '' ); ?>>
								<span class="switch-slider"></span>
								<span class="switch-button__label">
								<?php _e( '新しいウィンドウで開く', 'emanon-premium' ); ?>
								</span>
							</span>
						</label>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="emanon_contact_btn_text_3"><?php _e( 'ボタン テキスト［3］', 'emanon-premium' ); ?></label></th>
						<td>
						<input type="text" name="emanon_contact_btn_text_3" id="emanon_contact_btn_text_3" value="<?php echo get_theme_mod( 'contact_btn_text_3', '' ); ?>" style="width:30%;">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="emanon_contact_btn_microcopy_3"><?php _e( 'マイクロコピー［3］', 'emanon-premium' ); ?></label></th>
						<td>
							<textarea name="emanon_contact_btn_microcopy_3" id="emanon_contact_btn_microcopy_3" rows="3" style="width:30%;"><?php echo get_theme_mod( 'contact_btn_microcopy_3', '' ); ?></textarea>
						</td>
					</tr>
				</table>
			</div>
	</div>

</div>
