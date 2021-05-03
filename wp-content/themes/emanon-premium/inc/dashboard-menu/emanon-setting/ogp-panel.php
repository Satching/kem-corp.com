<?php
/**
 * Theme dashboard ogp panel
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

// 設定情報を保存
$POST = stripslashes_deep($_POST);
if ( isset($POST['update_options']) ) {

	$names = array(
		'enable_ogp',
		'default_ogp_image',
		'enable_facebook_ogp',
		'facebook_app_id',
		'enable_twitter_card',
		'twitter_card_type',
		'twitter_id',
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

<div id="panel2" class="tab-panel">

	<div class="postbox metabox-holder">
		<h3 class="hndle"><?php _e( 'OGP設定', 'emanon-premium' ); ?><span class="tab-panel_description"><?php _e( 'SNS上で表示するアイキャッチ画像の設定', 'emanon-premium' ); ?></span></h3>
			<div class="inside">
				<table class="form-table">
					<tr valign="top">
						<th scope="row"><label for="emanon_enable_ogp"><?php _e( 'OGPタグ', 'emanon-premium' ); ?></label></th>
						<td>
							<label for="emanon_enable_ogp">
								<span class="switch-button">
									<input type="checkbox" name="emanon_enable_ogp" id="emanon_enable_ogp" value="1" <?php echo ( get_theme_mod('enable_ogp', '' ) ? ' checked' : '' ); ?>>
									<span class="switch-slider"></span>
									<span class="switch-button__label">
									<?php _e('有効', 'emanon-premium' ); ?>
									</span>
								</span>
							</label>
							<small class="notes"><span class="red">※</span><?php _e( '< head >にOGPタグを出力します。', 'emanon-premium' ); ?></small>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="emanon_default_ogp_image"><?php _e( 'OGP画像［初期値］', 'emanon-premium' ); ?></label></th>
						<td>
						<?php
							emanon_custom_media_uploader( 'emanon_default_ogp_image', get_theme_mod('default_ogp_image', ''), 'emanon_default_ogp_image' );
						?>
						<small class="notes"><span class="red">※</span><?php _e( 'ページにアイキャッチ画像がない場合、OGP画像［初期値］が適用されます。', 'emanon-premium' ); ?></small>
						<small class="notes"><span class="red">※</span><?php _e( '推奨画像サイズ：1200px * 600px', 'emanon-premium' ); ?></small>
						</td>
					</tr>
				</table>
			</div>
	</div>

	<div class="postbox metabox-holder">
		<h3 class="hndle"><?php _e( 'Facebook OGP', 'emanon-premium' ); ?></h3>
			<div class="inside">
				<table class="form-table">
					<tr valign="top">
						<th scope="row"><label for="emanon_enable_facebook_ogp"><?php _e( 'Facebook用OGPタグ', 'emanon-premium' ); ?></label></th>
						<td>
							<label for="emanon_enable_facebook_ogp">
								<span class="switch-button">
									<input type="checkbox" name="emanon_enable_facebook_ogp" id="emanon_enable_facebook_ogp" value="1" <?php echo ( get_theme_mod('enable_facebook_ogp', '' ) ? ' checked' : '' ); ?>>
									<span class="switch-slider"></span>
									<span class="switch-button__label">
									<?php _e('有効', 'emanon-premium' ); ?>
									</span>
								</span>
							</label>
							<small class="notes"><span class="red">※</span><?php _e( '< head >にFacebook用OGPタグを出力します。', 'emanon-premium' ); ?></small>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="emanon_facebook_app_id"><?php _e( 'FacebookアプリID', 'emanon-premium' ); ?></label></th>
						<td>
							<input type="text" name="emanon_facebook_app_id" id="emanon_facebook_app_id" value="<?php echo get_theme_mod( 'facebook_app_id', '' ); ?>" style="width:40%;">
							<small class="notes"><span class="red">※</span><a href="https://developers.facebook.com/apps" rel="noopener nofollow" target="_blank">Facebook for developer</a><?php _e( 'からFacebookアプリIDを取得します。', 'emanon-premium' ); ?></small>
						</td>
					</tr>
				</table>
			</div>
	</div>
	
	<div class="postbox metabox-holder">
		<h3 class="hndle"><?php _e( 'Twitterカード', 'emanon-premium' ); ?></h3>
			<div class="inside">
				<table class="form-table">
					<tr valign="top">
						<th scope="row"><label for="emanon_enable_twitter_card"><?php _e( 'Twitterカード用OGPタグ', 'emanon-premium' ); ?></label></th>
						<td>
							<label for="emanon_enable_twitter_card">
								<span class="switch-button">
									<input type="checkbox" name="emanon_enable_twitter_card" id="emanon_enable_twitter_card" value="1" <?php echo ( get_theme_mod( 'enable_twitter_card', '' ) ? ' checked' : '' ); ?>>
									<span class="switch-slider"></span>
									<span class="switch-button__label">
									<?php _e('有効', 'emanon-premium' ); ?>
									</span>
								</span>
							</label>
							<small class="notes"><span class="red">※</span><?php _e( '< head >にTwitterカード用OGPタグを出力します', 'emanon-premium' ); ?></small>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="emanon_twitter_card_type"><?php _e( 'Twiiterカードのタイプ', 'emanon-premium' ); ?></label></th>
						<td>
						<?php
							$emanon_twitter_card_type = get_theme_mod( 'twitter_card_type', '' );
							if ( ! empty( $emanon_twitter_card_type ) ) {
								$emanon_twitter_card_type = get_theme_mod( 'twitter_card_type', '' );
							} else {
								$emanon_twitter_card_type = 'summary';
							}
						?>
						<input name="emanon_twitter_card_type" type="radio" value="summary" <?php checked( 'summary', $emanon_twitter_card_type ); ?>><label><?php _e( 'Summaryカード', 'emanon-premium' ); ?></label><br/>
						<input name="emanon_twitter_card_type" type="radio" value="summary_large_image" <?php checked( 'summary_large_image', $emanon_twitter_card_type ); ?>><label><?php _e( '大きな画像付きのSummaryカード', 'emanon-premium' ); ?></label>
						</td>
						</tr>
				</table>
			</div>
	</div>

</div>
