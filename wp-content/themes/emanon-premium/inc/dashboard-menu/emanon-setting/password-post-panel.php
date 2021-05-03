<?php
/**
 * Theme dashboard page speed panel
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

// 設定情報を保存
$POST = stripslashes_deep($_POST);
if ( isset($POST['update_options']) ) {

	$names = array(
		'delete_protected_title',
		'protected_title',
		'protected_message',
		'protected_btn_url',
		'protected_btn_text',
		'protected_btn_microcopy',
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

<div id="panel11" class="tab-panel">

	<div class="postbox metabox-holder">
		<h3 class="hndle"><?php _e( 'パスワード保護設定', 'emanon-premium' ); ?><span class="tab-panel_description"><?php _e( 'パスワード保護状態のページ設定', 'emanon-premium' ); ?></span></h3>
			<div class="inside">
				<table class="form-table">
					<tr valign="top">
						<th scope="row"><?php _e( 'タイトル', 'emanon-premium' ); ?></th>
						<td>
							<label for="emanon_delete_protected_title">
								<span class="switch-button">
									<input type="checkbox" name="emanon_delete_protected_title" id="emanon_delete_protected_title" value="1" <?php echo ( get_theme_mod( 'delete_protected_title', '' ) ? ' checked' : '' ); ?>>
									<span class="switch-slider"></span>
									<span class="switch-button__label">
									<?php _e( '非表示', 'emanon-premium'  ); ?>
									</span>
								</span>
							</label>
							<br>
							<input type="text" name="emanon_protected_title" id="emanon_protected_title" value="<?php echo get_theme_mod( 'protected_title', '' ); ?>" placeholder="<?php echo _e( '例）保護中：', 'emanon-premium' ); ?>" style="width:20%;">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label><?php _e( 'メッセージ', 'emanon-premium' ); ?></label></th>
						<td>
						<?php
							$emanon_protected_message = get_theme_mod( 'protected_message', '' );
							if ( ! empty( $emanon_protected_message ) ) {
								$emanon_protected_message = get_theme_mod( 'protected_message', '' );
							} else {
								$emanon_protected_message = __( 'このコンテンツはパスワードで保護されています。閲覧するには以下にパスワードを入力してください。', 'emanon-premium' );
							}
						?>
						<textarea name="emanon_protected_message" id="emanon_protected_message" rows="5" style="width:60%;"><?php echo get_theme_mod( 'protected_message', $emanon_protected_message ); ?></textarea>
						<small class="notes"><span class="red">※</span><?php echo _e( '［必須入力］', 'emanon-premium' ); ?></small>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="emanon_protected_btn_url"><?php _e( 'ボタン URL', 'emanon-premium'  ); ?></label></th>
						<td>
						<input type="text" name="emanon_protected_btn_url" id="emanon_protected_btn_url" value="<?php echo get_theme_mod( 'protected_btn_url', '' ); ?>" style="width:60%;">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="emanon_protected_btn_text"><?php _e( 'ボタン テキスト', 'emanon-premium'  ); ?></label></th>
						<td>
						<input type="text" name="emanon_protected_btn_text" id="emanon_protected_btn_text" value="<?php echo get_theme_mod( 'protected_btn_text', '' ); ?>" style="width:30%;">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="emanon_protected_btn_microcopy"><?php _e( 'ボタン マイクロコピー', 'emanon-premium'  ); ?></label></th>
						<td>
							<textarea name="emanon_protected_btn_microcopy" id="emanon_protected_btn_microcopy" rows="2" style="width:30%;"><?php echo get_theme_mod( 'protected_btn_microcopy', '' ); ?></textarea>
						</td>
					</tr>
				</table>
			</div>
	</div>

</div>
