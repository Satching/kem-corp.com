<?php
/**
 * Theme dashboard search panel
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

// 設定情報を保存
$POST = stripslashes_deep($_POST);
if ( isset($POST['update_options']) ) {

	$names = array(
		'display_header_search_form_pc',
		'display_header_search_form_sp',
		'header_search_label',
		'display_header_search_label_sp',
		'custom_search_placeholder',
		'custom_search_btn_text',
		'custom_search_select_cat',
		'custom_search_select_tag',
		'search_placeholder',
		'search_object',
		'search_exclude_cat',
		'nothing_found_title',
		'nothing_found_message',
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

<div id="panel8" class="tab-panel">

	<div class="postbox metabox-holder">
		<h3 class="hndle"><?php _e( 'カスタム検索設定', 'emanon-premium'  ); ?></h3>
			<div class="inside">
				<table class="form-table">
					<tr valign="top">
						<th scope="row"><?php _e( '検索ボタン［ヘッダー］の表示', 'emanon-premium'  ); ?></th>
						<td>
							<label for="emanon_display_header_search_form_pc">
								<span class="switch-button">
									<input type="checkbox" name="emanon_display_header_search_form_pc" id="emanon_display_header_search_form_pc" value="1" <?php echo ( get_theme_mod( 'display_header_search_form_pc', '' ) ? ' checked' : '' ); ?>>
									<span class="switch-slider"></span>
									<span class="switch-button__label">
									<?php _e( '有効［PC］', 'emanon-premium' ); ?>
									</span>
								</span>
							</label>
							<br>
							<label for="emanon_display_header_search_form_sp">
								<span class="switch-button">
									<input type="checkbox" name="emanon_display_header_search_form_sp" id="emanon_display_header_search_form_sp" value="1" <?php echo ( get_theme_mod( 'display_header_search_form_sp', '' ) ? ' checked' : '' ); ?>>
									<span class="switch-slider"></span>
									<span class="switch-button__label">
									<?php _e( '有効［SP］', 'emanon-premium' ); ?>
									</span>
								</span>
							</label>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="emanon_header_search_label"><?php _e( '検索ボタン［ラベル］', 'emanon-premium'  ); ?></label></th>
						<td>
						<input type="text" name="emanon_header_search_label" id="emanon_header_search_label" value="<?php echo get_theme_mod( 'header_search_label', '' ); ?>" style="width:30%;"><br/>
							<label for="emanon_display_header_search_label_sp">
								<span class="switch-button">
									<input type="checkbox" name="emanon_display_header_search_label_sp" id="emanon_display_header_search_label_sp" value="1" <?php echo ( get_theme_mod( 'display_header_search_label_sp', '' ) ? ' checked' : '' ); ?>>
									<span class="switch-slider"></span>
									<span class="switch-button__label">
									<?php _e( '有効［SP］', 'emanon-premium' ); ?>
									</span>
								</span>
							</label>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><?php _e( 'プレースホルダ', 'emanon-premium'  ); ?></th>
						<td>
							<input type="text" name="emanon_custom_search_placeholder" id="emanon_custom_search_placeholder" value="<?php echo get_theme_mod( 'custom_search_placeholder', '' ); ?>" style="width:20%;"><br>
							<small class="notes"><span class="red">※</span><?php _e( '検索窓のプレースホルダに適用されます。', 'emanon-premium'  ); ?></small>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><?php _e( 'ボタン テキスト', 'emanon-premium'  ); ?></th>
						<td>
							<?php
								$emanon_custom_search_btn_text = get_theme_mod( 'custom_search_btn_text', '' );
								if ( ! empty( $emanon_custom_search_btn_text ) ) {
									$emanon_custom_search_btn_text = get_theme_mod( 'custom_search_btn_text', '' );
								} else {
									$emanon_custom_search_btn_text = __( '検索', 'emanon-premium' );
								}
							?>
							<input type="text" name="emanon_custom_search_btn_text" id="emanon_custom_search_btn_text" value="<?php echo get_theme_mod( 'custom_search_btn_text', $emanon_custom_search_btn_text ); ?>" style="width:20%;">
							<small class="notes"><span class="red">※</span><?php echo _e( '［必須入力］', 'emanon-premium' ); ?></small>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="emanon_custom_search_select_cat"><?php _e( 'カテゴリー選択の表示', 'emanon-premium'  ); ?></label></th>
						<td>
							<label for="emanon_custom_search_select_cat">
								<span class="switch-button">
									<input type="checkbox" name="emanon_custom_search_select_cat" id="emanon_custom_search_select_cat" value="1" <?php echo ( get_theme_mod( 'custom_search_select_cat', '' ) ? ' checked' : '' ); ?>>
									<span class="switch-slider"></span>
									<span class="switch-button__label">
									<?php _e( '有効', 'emanon-premium' ); ?>
									</span>
								</span>
							</label>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="emanon_custom_search_select_tag"><?php _e( 'タグ選択の表示', 'emanon-premium'  ); ?></label></th>
						<td>
							<label for="emanon_custom_search_select_tag">
								<span class="switch-button">
									<input type="checkbox" name="emanon_custom_search_select_tag" id="emanon_custom_search_select_tag" value="1" <?php echo ( get_theme_mod( 'custom_search_select_tag', '' ) ? ' checked' : '' ); ?>>
									<span class="switch-slider"></span>
									<span class="switch-button__label">
									<?php _e( '有効', 'emanon-premium' ); ?>
									</span>
								</span>
							</label>
						</td>
					</tr>
				</table>
			</div>
	</div>

	<div class="postbox metabox-holder">
		<h3 class="hndle"><?php _e( '検索ウィジェット設定・検索ページ設定', 'emanon-premium'  ); ?></h3>
			<div class="inside">
				<table class="form-table">
					<tr valign="top">
						<th scope="row"><?php _e( 'プレースホルダ', 'emanon-premium'  ); ?></th>
						<td>
							<input type="text" name="emanon_search_placeholder" id="emanon_search_placeholder" value="<?php echo get_theme_mod( 'search_placeholder', '' ); ?>" style="width:20%;"><br>
							<small class="notes"><span class="red">※</span><?php _e( '検索窓のプレースホルダに適用されます。', 'emanon-premium'  ); ?></small>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><?php _e( '検索対象', 'emanon-premium' ); ?></th>
						<td>
						<?php
							$emanon_search_object = get_theme_mod( 'search_object', '' );
								if ( ! empty( $emanon_search_object ) ) {
										$emanon_search_object = get_theme_mod( 'search_object', '' );
								} else {
										$emanon_search_object = 'post';
								}
						?>
						<input name="emanon_search_object" type="radio" value="post" <?php checked( 'post', $emanon_search_object ); ?>><label><?php _e( '投稿ページ', 'emanon-premium' ); ?></label><br/>
						<input name="emanon_search_object" type="radio" value="post_page" <?php checked( 'post_page', $emanon_search_object ); ?>><label><?php _e( '投稿ページと固定ページ', 'emanon-premium' ); ?></label>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><?php _e( '検索除外カテゴリー', 'emanon-premium' ); ?></th>
						<td>
							<input type="text" name="emanon_search_exclude_cat" id="emanon_search_exclude_cat" value="<?php echo get_theme_mod('search_exclude_cat', '' ); ?>" style="width:20%;"><br>
							<small class="notes"><span class="red">※</span><?php _e( '検索対象から除外したいカテゴリーIDを設定。複数設定する場合はカンマ区切りで入力します。例）1,2', 'emanon-premium' ); ?></small>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><?php _e( '検索結果タイトル', 'emanon-premium' ); ?></th>
						<td>
							<?php
								$emanon_nothing_found_title = get_theme_mod( 'nothing_found_title', '' );
								if ( ! empty( $emanon_nothing_found_title ) ) {
									$emanon_nothing_found_title = get_theme_mod( 'nothing_found_title', '' );
								} else {
									$emanon_nothing_found_title = __( '何も見つかりませんでした。', 'emanon-premium' );
								}
							?>
							<input type="text" name="emanon_nothing_found_title" id="emanon_nothing_found_title" value="<?php echo get_theme_mod( 'nothing_found_title', $emanon_nothing_found_title ); ?>" style="width:30%;"><br>
							<small class="notes"><span class="red">※</span><?php _e( '［必須入力］検索結果がなしの場合に適用されます。', 'emanon-premium' ); ?></small>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label><?php _e( 'メッセージ', 'emanon-premium' ); ?></label></th>
						<td>
						<?php
							$emanon_nothing_found_message = get_theme_mod( 'nothing_found_message', '' );
							if ( ! empty( $emanon_nothing_found_message ) ) {
								$emanon_nothing_found_message = get_theme_mod( 'nothing_found_message', '' );
							} else {
								$emanon_nothing_found_message = __( '検索条件と一致するコンテンツはありませんでした。別のキーワードで検索をこころみてください。', 'emanon-premium' );
							}
						?>
						<textarea name="emanon_nothing_found_message" id="emanon_nothing_found_message" rows="5" style="width:60%;"><?php echo get_theme_mod( 'nothing_found_message', $emanon_nothing_found_message ); ?></textarea><br>
						<small class="notes"><span class="red">※</span><?php _e( '［必須入力］検索結果がなしの場合に適用されます。', 'emanon-premium' ); ?></small>
						</td>
					</tr>
				</table>
			</div>
	</div>

</div>
