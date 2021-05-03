<?php
/**
 * Theme dashboard custom post panel
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

// 設定情報を保存
$POST = stripslashes_deep($_POST);
if ( isset($POST['update_options']) ) {

	$names = array(
		'add_news',
		'add_seminar',
		'add_request',
		'add_sales',
		'news_taxonomy_title',
		'news_taxonomy_sub_title',
		'news_taxonomy_message',
		'news_taxonomy_meta_description',
		'news_taxonomy_header_style',
		'news_taxonomy_header_height_pc',
		'news_taxonomy_header_height_sp',
		'news_taxonomy_header_image_pc',
		'news_taxonomy_header_image_sp',
		'seminar_taxonomy_title',
		'seminar_taxonomy_sub_title',
		'seminar_taxonomy_message',
		'seminar_taxonomy_meta_description',
		'seminar_taxonomy_header_style',
		'seminar_taxonomy_header_height_pc',
		'seminar_taxonomy_header_height_sp',
		'seminar_taxonomy_header_image_pc',
		'seminar_taxonomy_header_image_sp',
		'request_taxonomy_title',
		'request_taxonomy_sub_title',
		'request_taxonomy_message',
		'request_taxonomy_meta_description',
		'request_taxonomy_header_style',
		'request_taxonomy_header_height_pc',
		'request_taxonomy_header_height_sp',
		'request_taxonomy_header_image_pc',
		'request_taxonomy_header_image_sp',
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

<div id="panel13" class="tab-panel">

	<div class="postbox metabox-holder">
		<h3 class="hndle"><?php _e( 'カスタム投稿ページ設定', 'emanon-premium' ); ?></h3>
			<div class="inside">
				<table class="form-table">
					<tr valign="top">
						<th scope="row"><?php _e( 'カスタム投稿［ニュース］の追加', 'emanon-premium' ); ?></th>
						<td>
							<label for="emanon_add_news">
								<span class="switch-button">
									<input type="checkbox" name="emanon_add_news" id="emanon_add_news" value="1" <?php echo ( get_theme_mod( 'add_news', '' ) ? ' checked' : '' ); ?>>
									<span class="switch-slider"></span>
									<span class="switch-button__label">
									<?php _e( '有効', 'emanon-premium' ); ?>
									</span>
								</span>
							</label><br>
							<small class="notes"><span class="red">※</span><?php _e( 'パーマリンク設定の更新［保存］が必要です。', 'emanon-premium' ); ?></small>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><?php _e( 'カスタム投稿［セミナー］の追加', 'emanon-premium' ); ?></th>
						<td>
							<label for="emanon_add_seminar">
								<span class="switch-button">
									<input type="checkbox" name="emanon_add_seminar" id="emanon_add_seminar" value="1" <?php echo ( get_theme_mod( 'add_seminar', '' ) ? ' checked' : '' ); ?>>
									<span class="switch-slider"></span>
									<span class="switch-button__label">
									<?php _e( '有効', 'emanon-premium' ); ?>
									</span>
								</span>
							</label><br>
							<small class="notes"><span class="red">※</span><?php _e( 'パーマリンク設定の更新［保存］が必要です。', 'emanon-premium' ); ?></small>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><?php _e( 'カスタム投稿［資料請求］の追加', 'emanon-premium' ); ?></th>
						<td>
							<label for="emanon_add_request">
								<span class="switch-button">
									<input type="checkbox" name="emanon_add_request" id="emanon_add_request" value="1" <?php echo ( get_theme_mod( 'add_request', '' ) ? ' checked' : '' ); ?>>
									<span class="switch-slider"></span>
									<span class="switch-button__label">
									<?php _e( '有効', 'emanon-premium' ); ?>
									</span>
								</span>
							</label><br>
							<small class="notes"><span class="red">※</span><?php _e( 'パーマリンク設定の更新［保存］が必要です。', 'emanon-premium' ); ?></small>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><?php _e( 'カスタム投稿［セールス］の追加', 'emanon-premium' ); ?></th>
						<td>
							<label for="emanon_add_sales">
								<span class="switch-button">
									<input type="checkbox" name="emanon_add_sales" id="emanon_add_sales" value="1" <?php echo ( get_theme_mod( 'add_sales', '' ) ? ' checked' : '' ); ?>>
									<span class="switch-slider"></span>
									<span class="switch-button__label">
									<?php _e( '有効', 'emanon-premium' ); ?>
									</span>
								</span>
							</label><br>
							<small class="notes"><span class="red">※</span><?php _e( 'パーマリンク設定の更新［保存］が必要です。', 'emanon-premium' ); ?></small>
						</td>
					</tr>
				</table>
			</div>
	</div>

<div class="postbox metabox-holder">
	<h3 class="hndle"><?php _e( 'タクソノミー［ニュース］', 'emanon-premium' ); ?></h3>
		<div class="inside">
			<table class="form-table">
				<tr valign="top">
					<th scope="row"><label><?php _e( 'タイトル', 'emanon-premium' ); ?></label></th>
					<td>
					<input type="text" name="emanon_news_taxonomy_title" id="emanon_news_taxonomy_title" value="<?php echo get_theme_mod( 'news_taxonomy_title', '' ); ?>" style="width:24%;">
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><label><?php _e( 'サブタイトル', 'emanon-premium' ); ?></label></th>
					<td>
					<input type="text" name="emanon_news_taxonomy_sub_title" id="emanon_news_taxonomy_sub_title" value="<?php echo get_theme_mod( 'news_taxonomy_sub_title', '' ); ?>" style="width:24%;">
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><label><?php _e( 'メッセージ', 'emanon-premium' ); ?></label></th>
					<td>
					<textarea name="emanon_news_taxonomy_message" id="emanon_news_taxonomy_message" rows="5" style="width:60%;"><?php echo get_theme_mod( 'news_taxonomy_message', '' ); ?></textarea><br/>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><label><?php _e( 'meta description設定', 'emanon-premium' ); ?></label></th>
					<td>
					<textarea name="emanon_news_taxonomy_meta_description" id="emanon_news_taxonomy_meta_descriptione" rows="5" style="width:60%;"><?php echo get_theme_mod( 'news_taxonomy_meta_description', '' ); ?></textarea><br/>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><?php _e( 'ヘッダーレイアウト', 'emanon-premium' ); ?></th>
					<td>
					<?php
						$emanon_new_taxonomy_header_style = get_theme_mod( 'news_taxonomy_header_style', '' );
						if ( ! empty( $emanon_new_taxonomy_header_style ) ) {
							$emanon_news_taxonomy_header_style = get_theme_mod( 'news_taxonomy_header_style', '' );
						} else {
							$emanon_news_taxonomy_header_style = 'taxonomy_term_header_standard';
						}
					?>
						<label class="radio-col">
							<input type="radio" name="emanon_news_taxonomy_header_style" value="taxonomy_term_header_standard" <?php checked( 'taxonomy_term_header_standard', $emanon_news_taxonomy_header_style ); ?>>
							<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/standard-title.png' ; ?>" alt="<?php _e( '標準', 'emanon-premium' ); ?>" ><br>
							<span><?php _e( '標準', 'emanon-premium' ); ?></span>
						</label>
						<label class="radio-col">
							<input type="radio" name="emanon_news_taxonomy_header_style" value="taxonomy_term_header_center" <?php checked( 'taxonomy_term_header_center', $emanon_news_taxonomy_header_style ); ?>>
							<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/center-title.png' ; ?>" alt="<?php _e( '中央', 'emanon-premium' ); ?>" ><br>
							<span><?php _e( '中央', 'emanon-premium' ); ?></span>
						</label>
						<label class="radio-col">
							<input type="radio" name="emanon_news_taxonomy_header_style" value="taxonomy_term_header_full_width" <?php checked( 'taxonomy_term_header_full_width', $emanon_news_taxonomy_header_style ); ?>>
							<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/full-width-image.png' ; ?>" alt="<?php _e( '全幅', 'emanon-premium' ); ?>" ><br>
							<span><?php _e( '全幅', 'emanon-premium' ); ?></span>
						</label>
						<label class="radio-col">
							<input type="radio" name="emanon_news_taxonomy_header_style" value="taxonomy_term_header_full_width_overlay" <?php checked( 'taxonomy_term_header_full_width_overlay', $emanon_news_taxonomy_header_style ); ?>>
							<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/full-width-image-overlay.png' ; ?>" alt="<?php _e( '全幅［オーバーレイ］', 'emanon-premium' ); ?>" ><br>
							<span><?php _e( '全幅［オーバーレイ］', 'emanon-premium' ); ?></span>
						</label>
						<h4 class="radio-col-title"><?php _e( 'ヘッダー画像の高さ', 'emanon-premium' ); ?></h4>
						<small class="notes"><span class="red">※</span><?php echo _e( '全幅の高さ・全幅［オーバーレイ］の高さに適用されます。', 'emanon-premium' ); ?></small><br/>
						<label><?php _e( '高さ［PC］', 'emanon-premium' ); ?>: </label><input type="number" name="emanon_news_taxonomy_header_height_pc" id="emanon_news_taxonomy_header_height_pc" value="<?php echo get_theme_mod( 'news_header_height_pc', '500' ); ?>" style="width:15%;"><br>
						<label><?php _e( '高さ［SP］', 'emanon-premium' ); ?>: </label><input type="number" name="emanon_news_taxonomy_header_height_sp" id="emanon_news_taxonomy_header_height_sp" value="<?php echo get_theme_mod( 'news_header_height_sp', '500' ); ?>" style="width:15%;">
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><label><?php _e( 'ヘッダー画像［PC］', 'emanon-premium' ); ?></label></th>
					<td>
					<?php
						emanon_custom_media_uploader( 'emanon_news_taxonomy_header_image_pc', get_theme_mod('news_taxonomy_header_image_pc', '' ), 'emanon_news_taxonomy_header_image_pc' );
					?>
					<small class="notes"><span class="red">※</span><?php echo _e( '推奨画像サイズ：1200px * 675px', 'emanon-premium' ); ?></small>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><label><?php _e( 'ヘッダー画像［SP］', 'emanon-premium' ); ?></label></th>
					<td>
					<?php
						emanon_custom_media_uploader( 'emanon_news_taxonomy_header_image_sp', get_theme_mod('news_taxonomy_header_image_sp', '' ), 'emanon_news_taxonomy_header_image_sp' );
					?>
					<small class="notes"><span class="red">※</span><?php echo _e( '推奨画像サイズ：600px * 338px', 'emanon-premium' ); ?></small>
					</td>
				</tr>
			</table>
		</div>
</div>

<div class="postbox metabox-holder">
	<h3 class="hndle"><?php _e( 'タクソノミー［セミナー］', 'emanon-premium' ); ?></h3>
		<div class="inside">
			<table class="form-table">
				<tr valign="top">
					<th scope="row"><label><?php _e( 'タイトル', 'emanon-premium' ); ?></label></th>
					<td>
					<input type="text" name="emanon_seminar_taxonomy_title" id="emanon_seminar_taxonomy_title" value="<?php echo get_theme_mod( 'seminar_taxonomy_title', '' ); ?>" style="width:24%;">
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><label><?php _e( 'サブタイトル', 'emanon-premium' ); ?></label></th>
					<td>
					<input type="text" name="emanon_seminar_taxonomy_sub_title" id="emanon_seminar_taxonomy_sub_title" value="<?php echo get_theme_mod( 'seminar_taxonomy_sub_title', '' ); ?>" style="width:24%;">
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><label><?php _e( 'メッセージ', 'emanon-premium' ); ?></label></th>
					<td>
					<textarea name="emanon_seminar_taxonomy_message" id="emanon_seminar_taxonomy_message" rows="5" style="width:60%;"><?php echo get_theme_mod( 'seminar_taxonomy_message', '' ); ?></textarea><br/>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><label><?php _e( 'meta description設定', 'emanon-premium' ); ?></label></th>
					<td>
					<textarea name="emanon_seminar_taxonomy_meta_description" id="emanon_seminar_taxonomy_meta_descriptione" rows="5" style="width:60%;"><?php echo get_theme_mod( 'seminar_taxonomy_meta_description', '' ); ?></textarea><br/>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><?php _e( 'ヘッダーレイアウト', 'emanon-premium' ); ?></th>
					<td>
					<?php
						$emanon_seminar_taxonomy_header_style = get_theme_mod( 'seminar_taxonomy_header_style', '' );
						if ( ! empty( $emanon_seminar_taxonomy_header_style ) ) {
							$emanon_seminar_taxonomy_header_style = get_theme_mod( 'seminar_taxonomy_header_style', '' );
						} else {
							$emanon_seminar_taxonomy_header_style = 'taxonomy_term_header_standard';
						}
					?>
						<label class="radio-col">
							<input type="radio" name="emanon_seminar_taxonomy_header_style" value="taxonomy_term_header_standard" <?php checked( 'taxonomy_term_header_standard', $emanon_seminar_taxonomy_header_style ); ?>>
							<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/standard-title.png' ; ?>" alt="<?php _e( '標準', 'emanon-premium' ); ?>" ><br>
							<span><?php _e( '標準', 'emanon-premium' ); ?></span>
						</label>
						<label class="radio-col">
							<input type="radio" name="emanon_seminar_taxonomy_header_style" value="taxonomy_term_header_center" <?php checked( 'taxonomy_term_header_center', $emanon_seminar_taxonomy_header_style ); ?>>
							<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/center-title.png' ; ?>" alt="<?php _e( '中央', 'emanon-premium' ); ?>" ><br>
							<span><?php _e( '中央', 'emanon-premium' ); ?></span>
						</label>
						<label class="radio-col">
							<input type="radio" name="emanon_seminar_taxonomy_header_style" value="taxonomy_term_header_full_width" <?php checked( 'taxonomy_term_header_full_width', $emanon_seminar_taxonomy_header_style ); ?>>
							<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/full-width-image.png' ; ?>" alt="<?php _e( '全幅', 'emanon-premium' ); ?>" ><br>
							<span><?php _e( '全幅', 'emanon-premium' ); ?></span>
						</label>
						<label class="radio-col">
							<input type="radio" name="emanon_seminar_taxonomy_header_style" value="taxonomy_term_header_full_width_overlay" <?php checked( 'taxonomy_term_header_full_width_overlay', $emanon_seminar_taxonomy_header_style ); ?>>
							<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/full-width-image-overlay.png' ; ?>" alt="<?php _e( '全幅［オーバーレイ］', 'emanon-premium' ); ?>" ><br>
							<span><?php _e( '全幅［オーバーレイ］', 'emanon-premium' ); ?></span>
						</label>
						<h4 class="radio-col-title"><?php _e( 'ヘッダー画像の高さ', 'emanon-premium' ); ?></h4>
						<small class="notes"><span class="red">※</span><?php echo _e( '全幅の高さ・全幅［オーバーレイ］の高さに適用されます。', 'emanon-premium' ); ?></small><br/>
						<label><?php _e( '高さ［PC］', 'emanon-premium' ); ?>: </label><input type="number" name="emanon_seminar_taxonomy_header_height_pc" id="emanon_seminar_taxonomy_header_height_pc" value="<?php echo get_theme_mod( 'seminar_taxonomy_header_height_pc', '500' ); ?>" style="width:15%;"><br>
						<label><?php _e( '高さ［SP］', 'emanon-premium' ); ?>: </label><input type="number" name="emanon_seminar_taxonomy_header_height_sp" id="emanon_seminar_taxonomy_header_height_sp" value="<?php echo get_theme_mod( 'seminar_taxonomy_header_height_sp', '500' ); ?>" style="width:15%;">
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><label><?php _e( 'ヘッダー画像［PC］', 'emanon-premium' ); ?></label></th>
					<td>
					<?php
						emanon_custom_media_uploader( 'emanon_seminar_taxonomy_header_image_pc', get_theme_mod( 'seminar_taxonomy_header_image_pc', '' ), 'emanon_seminar_taxonomy_header_image_pc' );
					?>
					<small class="notes"><span class="red">※</span><?php echo _e( '推奨画像サイズ：1200px * 675px', 'emanon-premium' ); ?></small>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><label><?php _e( 'ヘッダー画像［SP］', 'emanon-premium' ); ?></label></th>
					<td>
					<?php
						emanon_custom_media_uploader( 'emanon_seminar_taxonomy_header_image_sp', get_theme_mod( 'seminar_taxonomy_header_image_sp', '' ), 'emanon_seminar_taxonomy_header_image_sp' );
					?>
					<small class="notes"><span class="red">※</span><?php echo _e( '推奨画像サイズ：600px * 338px', 'emanon-premium' ); ?></small>
					</td>
				</tr>
			</table>
		</div>
</div>

<div class="postbox metabox-holder">
	<h3 class="hndle"><?php _e( 'タクソノミー［資料請求］', 'emanon-premium' ); ?></h3>
		<div class="inside">
			<table class="form-table">
				<tr valign="top">
					<th scope="row"><label><?php _e( 'Title', 'emanon-premium' ); ?></label></th>
					<td>
					<input type="text" name="emanon_request_taxonomy_title" id="emanon_request_taxonomy_title" value="<?php echo get_theme_mod( 'request_taxonomy_title', '' ); ?>" style="width:24%;">
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><label><?php _e( 'サブタイトル', 'emanon-premium' ); ?></label></th>
					<td>
					<input type="text" name="emanon_request_taxonomy_sub_title" id="emanon_request_taxonomy_sub_title" value="<?php echo get_theme_mod( 'request_taxonomy_sub_title', '' ); ?>" style="width:24%;">
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><label><?php _e( 'メッセージ', 'emanon-premium' ); ?></label></th>
					<td>
					<textarea name="emanon_request_taxonomy_message" id="emanon_request_taxonomy_message" rows="5" style="width:60%;"><?php echo get_theme_mod( 'request_taxonomy_message', '' ); ?></textarea><br/>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><label><?php _e( 'meta description設定', 'emanon-premium' ); ?></label></th>
					<td>
					<textarea name="emanon_request_taxonomy_meta_description" id="emanon_request_taxonomy_meta_descriptione" rows="5" style="width:60%;"><?php echo get_theme_mod( 'request_taxonomy_meta_description', '' ); ?></textarea><br/>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><?php _e( 'ヘッダーレイアウト', 'emanon-premium' ); ?></th>
					<td>
					<?php
						$emanon_request_taxonomy_header_style = get_theme_mod( 'request_taxonomy_header_style', '' );
						if ( ! empty( $emanon_request_taxonomy_header_style ) ) {
							$emanon_request_taxonomy_header_style = get_theme_mod( 'request_taxonomy_header_style', '' );
						} else {
							$emanon_request_taxonomy_header_style = 'taxonomy_term_header_standard';
						}
					?>
						<label class="radio-col">
							<input type="radio" name="emanon_request_taxonomy_header_style" value="taxonomy_term_header_standard" <?php checked( 'taxonomy_term_header_standard', $emanon_request_taxonomy_header_style ); ?>>
							<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/standard-title.png' ; ?>" alt="<?php _e( '標準', 'emanon-premium' ); ?>" ><br>
							<span><?php _e( '標準', 'emanon-premium' ); ?></span>
						</label>
						<label class="radio-col">
							<input type="radio" name="emanon_request_taxonomy_header_style" value="taxonomy_term_header_center" <?php checked( 'taxonomy_term_header_center', $emanon_request_taxonomy_header_style ); ?>>
							<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/center-title.png' ; ?>" alt="<?php _e( '中央', 'emanon-premium' ); ?>" ><br>
							<span><?php _e( '中央', 'emanon-premium' ); ?></span>
						</label>
						<label class="radio-col">
							<input type="radio" name="emanon_request_taxonomy_header_style" value="taxonomy_term_header_full_width" <?php checked( 'taxonomy_term_header_full_width', $emanon_request_taxonomy_header_style ); ?>>
							<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/full-width-image.png' ; ?>" alt="<?php _e( '全幅', 'emanon-premium' ); ?>" ><br>
							<span><?php _e( '全幅', 'emanon-premium' ); ?></span>
						</label>
						<label class="radio-col">
							<input type="radio" name="emanon_request_taxonomy_header_style" value="taxonomy_term_header_full_width_overlay" <?php checked( 'taxonomy_term_header_full_width_overlay', $emanon_request_taxonomy_header_style ); ?>>
							<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/full-width-image-overlay.png' ; ?>" alt="<?php _e( '全幅［オーバーレイ］', 'emanon-premium' ); ?>" ><br>
							<span><?php _e( '全幅［オーバーレイ］', 'emanon-premium' ); ?></span>
						</label>
						<h4 class="radio-col-title"><?php _e( 'ヘッダー画像の高さ', 'emanon-premium' ); ?></h4>
						<small class="notes"><span class="red">※</span><?php echo _e( '全幅の高さ・全幅［オーバーレイ］の高さに適用されます。', 'emanon-premium' ); ?></small><br/>
						<label><?php _e( '高さ［PC］', 'emanon-premium' ); ?>: </label><input type="number" name="emanon_request_taxonomy_header_height_pc" id="emanon_request_taxonomy_header_height_pc" value="<?php echo get_theme_mod( 'request_taxonomy_header_height_pc', '500' ); ?>" style="width:15%;"><br>
						<label><?php _e( '高さ［SP］', 'emanon-premium' ); ?>: </label><input type="number" name="emanon_request_taxonomy_header_height_sp" id="emanon_request_taxonomy_header_height_sp" value="<?php echo get_theme_mod( 'request_taxonomy_header_height_sp', '500' ); ?>" style="width:15%;">
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><label><?php _e( 'ヘッダー画像［PC］', 'emanon-premium' ); ?></label></th>
					<td>
					<?php
						emanon_custom_media_uploader( 'emanon_request_taxonomy_header_image_pc', get_theme_mod( 'request_taxonomy_header_image_pc', '' ), 'emanon_request_taxonomy_header_image_pc' );
					?>
					<small class="notes"><span class="red">※</span><?php echo _e( '推奨画像サイズ：1200px * 675px', 'emanon-premium' ); ?></small>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><label><?php _e( 'ヘッダー画像［SP］', 'emanon-premium' ); ?></label></th>
					<td>
					<?php
						emanon_custom_media_uploader( 'emanon_request_taxonomy_header_image_sp', get_theme_mod( 'request_taxonomy_header_image_sp', '' ), 'emanon_request_taxonomy_header_image_sp' );
					?>
					<small class="notes"><span class="red">※</span><?php echo _e( '推奨画像サイズ：600px * 338px', 'emanon-premium' ); ?></small>
					</td>
				</tr>
			</table>
		</div>
</div>

</div>

