<?php
/**
 * Theme dashboard sns panel
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

// 設定情報を保存
$POST = stripslashes_deep($_POST);
if ( isset($POST['update_options']) ) {

	$names = array(
		'twitter_profile_url',
		'facebook_page_url',
		'instagram_profile_url',
		'line_url',
		'youtube_profile_url',
		'header_sns_layout',
		'display_follow_post', 
		'display_follow_page',
		'follow_twitter',
		'follow_facebook',
		'follow_instagram',
		'follow_line',
		'follow_youtube',
		'follow_rss',
		'follow_title',
		'follow_microcopy',
		'follow_microcopy_layout',
		'share_twitter',
		'share_facebook',
		'share_hatena',
		'share_pocket',
		'share_pinterest',
		'share_line',	
		'display_share_button_top_post',
		'display_share_button_bottom_post',
		'display_share_button_sticky_post',
		'display_share_button_top_page',
		'display_share_button_bottom_page',
		'display_share_button_sticky_page',
		'display_share_button_top_post_request',
		'display_share_button_bottom_post_request',
		'display_share_button_sticky_post_request',
		'display_share_home',
		'display_share_button_sticky_home',
		'display_share_category',
		'display_share_button_sticky_category',
		'display_share_tag',
		'display_share_button_sticky_tag',
		'display_share_request_archive',
		'display_share_button_sticky_request_archive',
		'display_share_author',
		'display_share_button_sticky_author',
		'sns_label',
		'sns_label_sticky',
		'twitter_add_mentions',
		'related_twitter_account',
		'display_clipboard',
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

<div id="panel6" class="tab-panel">

	<div class="postbox metabox-holder">
		<h3 class="hndle"><?php _e( 'SNSプロフィールURL設定', 'emanon-premium' ); ?><span class="tab-panel_description"><?php _e( 'SNSフォローボタンURLに適用', 'emanon-premium' ); ?></span></h3>

		<div class="inside">
			<table class="form-table">
				<tr valign="top">
					<th scope="row"><label for="emanon_twitter_profile_url"><?php _e( 'Twitter URL', 'emanon-premium' ); ?></label></th>
					<td>
						<input type="text" name="emanon_twitter_profile_url" id="emanon_twitter_profile_url" value="<?php echo get_theme_mod( 'twitter_profile_url', '' ); ?>" style="width:50%;">
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><label for="emanon_facebook_page_url"><?php _e( 'Facebook URL', 'emanon-premium' ); ?></label></th>
					<td>
						<input type="text" name="emanon_facebook_page_url" id="emanon_facebook_page_url" value="<?php echo get_theme_mod( 'facebook_page_url', '' ); ?>" style="width:50%;">
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><label for="emanon_instagram_profile_url"><?php _e( 'Instagram URL', 'emanon-premium' ); ?></label></th>
					<td>
						<input type="text" name="emanon_instagram_profile_url" id="emanon_instagram_profile_url" value="<?php echo get_theme_mod( 'instagram_profile_url', '' ); ?>" style="width:50%;">
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><label for="emanon_line_url"><?php _e( 'LINE URL', 'emanon-premium' ); ?></label></th>
					<td>
						<input type="text" name="emanon_line_url" id="emanon_line_url" value="<?php echo get_theme_mod( 'line_url', '' ); ?>" style="width:50%;">
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><label for="emanon_youtube_profile_url"><?php _e( 'YouTube URL', 'emanon-premium' ); ?></label></th>
					<td>
						<input type="text" name="emanon_youtube_profile_url" id="emanon_youtube_profile_url" value="<?php echo get_theme_mod( 'youtube_profile_url', '' ); ?>" style="width:50%;">
					</td>
				</tr>
			</table>
		</div>
	</div>

	<div class="postbox metabox-holder">
		<h3 class="hndle"><?php _e( 'SNSフォロー設定', 'emanon-premium' ); ?></h3>
			<div class="inside">
				<table class="form-table">
					<tr valign="top">
						<th scope="row"><?php _e( 'SNSフォローボタン', 'emanon-premium' ); ?></th>
						<td>
							<input type="checkbox" name="emanon_follow_twitter" id="emanon_follow_twitter" value="1" <?php echo ( get_theme_mod( 'follow_twitter', '') ? ' checked' : '' ); ?>>
							<label for="emanon_follow_twitter"><?php _e( 'Twitter', 'emanon-premium' ); ?></label><br/>
							<input type="checkbox" name="emanon_follow_facebook" id="emanon_follow_facebook" value="1" <?php echo ( get_theme_mod( 'follow_facebook', '') ? ' checked' : '' ); ?>>
							<label for="emanon_follow_facebook"><?php _e( 'Facebook', 'emanon-premium' ); ?></label><br/>
							<input type="checkbox" name="emanon_follow_instagram" id="emanon_follow_instagram" value="1" <?php echo ( get_theme_mod( 'follow_instagram', '') ? ' checked' : '' ); ?>>
							<label for="emanon_follow_instagram"><?php _e( 'Instagram', 'emanon-premium' ); ?></label><br/>
							<input type="checkbox" name="emanon_follow_line" id="emanon_follow_line" value="1" <?php echo ( get_theme_mod( 'follow_line', '') ? ' checked' : '' ); ?>>
							<label for="emanon_follow_line"><?php _e( 'LINE', 'emanon-premium' ); ?></label><br/>
							<input type="checkbox" name="emanon_follow_youtube" id="emanon_follow_youtube" value="1" <?php echo ( get_theme_mod( 'follow_youtube', '') ? ' checked' : '' ); ?>>
							<label for="emanon_follow_youtube"><?php _e( 'YouTube', 'emanon-premium' ); ?></label><br/>
							<input type="checkbox" name="emanon_follow_rss" id="emanon_follow_rss" value="1" <?php echo ( get_theme_mod( 'follow_rss', '') ? ' checked' : '' ); ?>>
							<label for="emanon_follow_rss"><?php _e( 'Feedly', 'emanon-premium' ); ?></label>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><?php _e( 'SNSフォローボタン［ヘッダー］の表示［PC］', 'emanon-premium' ); ?></th>
						<td>
						<?php
							$emanon_header_sns_layout = get_theme_mod( 'header_sns_layout', '' );
								if ( ! empty( $emanon_header_sns_layout ) ) {
										$emanon_header_sns_layout = get_theme_mod( 'header_sns_layout', '' );
								} else {
										$emanon_header_sns_layout = 'display_none';
								}
						?>
						<input name="emanon_header_sns_layout" type="radio" value="display_none" <?php checked( 'display_none', $emanon_header_sns_layout ); ?>><label><?php _e( '非表示', 'emanon-premium' ); ?></label><br/>
						<input name="emanon_header_sns_layout" type="radio" value="right" <?php checked( 'right', $emanon_header_sns_layout ); ?>><label><?php _e( 'ヘッダー［右］', 'emanon-premium' ); ?></label><br/>
						<input name="emanon_header_sns_layout" type="radio" value="left" <?php checked( 'left', $emanon_header_sns_layout ); ?>><label><?php _e( 'ヘッダー［左］', 'emanon-premium' ); ?></label>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><?php _e( 'SNSフォローボタン［ページ］の表示', 'emanon-premium' ); ?></th>
						<td>
							<label for="emanon_display_follow_post">
								<span class="switch-button">
									<input type="checkbox" name="emanon_display_follow_post" id="emanon_display_follow_post" value="1" <?php echo ( get_theme_mod( 'display_follow_post', '') ? ' checked' : '' ); ?>>
									<span class="switch-slider"></span>
									<span class="switch-button__label">
									<?php _e( '投稿ページ［下部］', 'emanon-premium' ); ?>
									</span>
								</span>
							</label>
							<br>
							<label for="emanon_display_follow_page">
								<span class="switch-button">
									<input type="checkbox" name="emanon_display_follow_page" id="emanon_display_follow_page" value="1" <?php echo ( get_theme_mod( 'display_follow_page', '') ? ' checked' : '' ); ?>>
									<span class="switch-slider"></span>
									<span class="switch-button__label">
									<?php _e( '固定ページ［下部］', 'emanon-premium' ); ?>
									</span>
								</span>
							</label>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="emanon_follow_title"><?php _e( 'タイトル', 'emanon-premium' ); ?></label></th>
						<td>
							<input type="text" name="emanon_follow_title" id="emanon_follow_title" value="<?php echo get_theme_mod('follow_title', '' ); ?>" style="width:50%;">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="emanon_follow_microcopy"><?php _e( 'マイクロコピー', 'emanon-premium' ); ?></label></th>
						<td>
							<input type="text" name="emanon_follow_microcopy" id="emanon_follow_microcopy" value="<?php echo get_theme_mod('follow_microcopy', '' ); ?>" style="width:30%;">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><?php _e( 'マイクロコピー［レイアウト］', 'emanon-premium' ); ?></th>
						<td>
						<?php
							$emanon_follow_microcopy_layout = get_theme_mod( 'follow_microcopy_layout', '' );
							if ( ! empty( $emanon_follow_microcopy_layout ) ) {
								$emanon_follow_microcopy_layout = get_theme_mod( 'follow_microcopy_layout', '' );
							} else {
								$emanon_follow_microcopy_layout = 'on_button';
							}
						?>
						<input name="emanon_follow_microcopy_layout" type="radio" value="on_button" <?php checked( 'on_button', $emanon_follow_microcopy_layout ); ?>><label><?php _e( 'ボタン［上部］', 'emanon-premium' ); ?></label><br/>
						<input name="emanon_follow_microcopy_layout" type="radio" value="under_button" <?php checked( 'under_button', $emanon_follow_microcopy_layout ); ?>><label><?php _e( 'ボタン［下部］', 'emanon-premium' ); ?></label>
						</td>
					</tr>
				</table>
			</div>
	</div>

	<div class="postbox metabox-holder">
		<h3 class="hndle"><?php _e( 'SNSシェア設定', 'emanon-premium' ); ?></h3>
		<div class="inside">
			<table class="form-table">
				<tr valign="top">
					<th scope="row"><?php _e( 'SNSシェアボタン', 'emanon-premium' ); ?></th>
					<td>
						<input type="checkbox" name="emanon_share_twitter" id="emanon_share_twitter" value="1" <?php echo ( get_theme_mod( 'share_twitter', '') ? ' checked' : '' ); ?>>
						<label for="emanon_share_twitter"><?php _e( 'Twitter', 'emanon-premium' ); ?></label><br/>
						<input type="checkbox" name="emanon_share_facebook" id="emanon_share_facebook" value="1" <?php echo ( get_theme_mod( 'share_facebook', '') ? ' checked' : '' ); ?>>
						<label for="emanon_share_facebook"><?php _e( 'Facebook', 'emanon-premium' ); ?></label><br/>
						<input type="checkbox" name="emanon_share_hatena" id="emanon_share_hatena" value="1" <?php echo ( get_theme_mod( 'share_hatena', '') ? ' checked' : '' ); ?>>
						<label for="emanon_share_hatena"><?php _e( 'はてブ', 'emanon-premium' ); ?></label><br/>
						<input type="checkbox" name="emanon_share_pocket" id="emanon_share_pocket" value="1" <?php echo ( get_theme_mod( 'share_pocket', '') ? ' checked' : '' ); ?>>
						<label for="emanon_share_pocket"><?php _e( 'Pocket', 'emanon-premium' ); ?></label><br/>
						<input type="checkbox" name="emanon_share_pinterest" id="emanon_share_pinterest" value="1" <?php echo ( get_theme_mod( 'share_pinterest', '') ? ' checked' : '' ); ?>>
						<label for="emanon_share_pinterest"><?php _e( 'Pinterest', 'emanon-premium' ); ?></label><br/>
						<input type="checkbox" name="emanon_share_line" id="emanon_share_line" value="1" <?php echo ( get_theme_mod( 'share_line', '') ? ' checked' : '' ); ?>>
						<label for="emanon_share_line"><?php _e( 'LINE', 'emanon-premium' ); ?></label>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><?php _e( '投稿ページ', 'emanon-premium' ); ?></th>
					<td>
						<label for="emanon_display_share_button_top_post">
							<span class="switch-button">
								<input type="checkbox" name="emanon_display_share_button_top_post" id="emanon_display_share_button_top_post" value="1" <?php echo ( get_theme_mod( 'display_share_button_top_post', '' ) ? ' checked' : '' ); ?>>
								<span class="switch-slider"></span>
								<span class="switch-button__label">
								<?php _e( 'SNSシェア［上部］', 'emanon-premium' ); ?>
								</span>
							</span>
						</label>
						<br/>
						<label for="emanon_display_share_button_bottom_post">
							<span class="switch-button">
								<input type="checkbox" name="emanon_display_share_button_bottom_post" id="emanon_display_share_button_bottom_post" value="1" <?php echo ( get_theme_mod( 'display_share_button_bottom_post', '' ) ? ' checked' : '' ); ?>>
								<span class="switch-slider"></span>
								<span class="switch-button__label">
								<?php _e( 'SNSシェア［下部］', 'emanon-premium' ); ?>
								</span>
							</span>
						</label>
						<br/>
						<label for="emanon_display_share_button_sticky_post">
							<span class="switch-button">
								<input type="checkbox" name="emanon_display_share_button_sticky_post" id="emanon_display_share_button_sticky_post" value="1" <?php echo ( get_theme_mod( 'display_share_button_sticky_post', '' ) ? ' checked' : '' ); ?>>
								<span class="switch-slider"></span>
								<span class="switch-button__label">
								<?php _e( 'SNSシェア［追従型：PC］', 'emanon-premium' ); ?>
								</span>
							</span>
						</label>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><?php _e( '固定ページ', 'emanon-premium' ); ?></th>
					<td>
						<label for="emanon_display_share_button_top_page">
							<span class="switch-button">
								<input type="checkbox" name="emanon_display_share_button_top_page" id="emanon_display_share_button_top_page" value="1" <?php echo ( get_theme_mod( 'display_share_button_top_page', '' ) ? ' checked' : '' ); ?>>
								<span class="switch-slider"></span>
								<span class="switch-button__label">
								<?php _e( 'SNSシェア［上部］', 'emanon-premium' ); ?>
								</span>
							</span>
						</label>
						<br/>
						<label for="emanon_display_share_button_bottom_page">
							<span class="switch-button">
								<input type="checkbox" name="emanon_display_share_button_bottom_page" id="emanon_display_share_button_bottom_page" value="1" <?php echo ( get_theme_mod( 'display_share_button_bottom_page', '' ) ? ' checked' : '' ); ?>>
								<span class="switch-slider"></span>
								<span class="switch-button__label">
								<?php _e( 'SNSシェア［下部］', 'emanon-premium' ); ?>
								</span>
							</span>
						</label>
						<br/>
						<label for="emanon_display_share_button_sticky_page">
							<span class="switch-button">
								<input type="checkbox" name="emanon_display_share_button_sticky_page" id="emanon_display_share_button_sticky_page" value="1" <?php echo ( get_theme_mod( 'display_share_button_sticky_page', '' ) ? ' checked' : '' ); ?>>
								<span class="switch-slider"></span>
								<span class="switch-button__label">
								<?php _e( 'SNSシェア［追従型：PC］', 'emanon-premium' ); ?>
								</span>
							</span>
						</label>
					</td>
				</tr>
			<tr valign="top">
					<th scope="row"><?php _e( '資料請求ページ', 'emanon-premium' ); ?></th>
					<td>
						<label for="emanon_display_share_button_top_post_request">
							<span class="switch-button">
								<input type="checkbox" name="emanon_display_share_button_top_post_request" id="emanon_display_share_button_top_post_request" value="1" <?php echo ( get_theme_mod( 'display_share_button_top_post_request', '' ) ? ' checked' : '' ); ?>>
								<span class="switch-slider"></span>
								<span class="switch-button__label">
								<?php _e( 'SNSシェア［上部］', 'emanon-premium' ); ?>
								</span>
							</span>
						</label>
						<br/>
						<label for="emanon_display_share_button_bottom_post_request">
							<span class="switch-button">
								<input type="checkbox" name="emanon_display_share_button_bottom_post_request" id="emanon_display_share_button_bottom_post_request" value="1" <?php echo ( get_theme_mod( 'display_share_button_bottom_post_request', '' ) ? ' checked' : '' ); ?>>
								<span class="switch-slider"></span>
								<span class="switch-button__label">
								<?php _e( 'SNSシェア［下部］', 'emanon-premium' ); ?>
								</span>
							</span>
						</label>
						<br/>
						<label for="emanon_display_share_button_sticky_post_request">
							<span class="switch-button">
								<input type="checkbox" name="emanon_display_share_button_sticky_post_request" id="emanon_display_share_button_sticky_post_request" value="1" <?php echo ( get_theme_mod( 'display_share_button_sticky_post_request', '' ) ? ' checked' : '' ); ?>>
								<span class="switch-slider"></span>
								<span class="switch-button__label">
								<?php _e( 'SNSシェア［追従型：PC］', 'emanon-premium' ); ?>
								</span>
							</span>
						</label>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><?php _e( 'ブログページ', 'emanon-premium' ); ?><small class="notes"><span class="red">※</span>設定＞表示設定［ホームページの表示］で「投稿ページ」に指定した固定ページ。</small></th>
					<td>
						<label for="emanon_display_share_home">
							<span class="switch-button">
								<input type="checkbox" name="emanon_display_share_home" id="emanon_display_share_home" value="1" <?php echo ( get_theme_mod( 'display_share_home', '' ) ? ' checked' : '' ); ?>>
								<span class="switch-slider"></span>
								<span class="switch-button__label">
								<?php _e( 'SNSシェア［上部］', 'emanon-premium' ); ?>
								</span>
							</span>
						</label>
						<br/>
						<label for="emanon_display_share_button_sticky_home">
							<span class="switch-button">
								<input type="checkbox" name="emanon_display_share_button_sticky_home" id="emanon_display_share_button_sticky_home" value="1" <?php echo ( get_theme_mod( 'display_share_button_sticky_home', '' ) ? ' checked' : '' ); ?>>
								<span class="switch-slider"></span>
								<span class="switch-button__label">
								<?php _e( 'SNSシェア［追従型：PC］', 'emanon-premium' ); ?>
								</span>
							</span>
						</label>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><?php _e( 'カテゴリーページ', 'emanon-premium' ); ?></th>
					<td>
						<label for="emanon_display_share_category">
							<span class="switch-button">
								<input type="checkbox" name="emanon_display_share_category" id="emanon_display_share_category" value="1" <?php echo ( get_theme_mod( 'display_share_category', '' ) ? ' checked' : '' ); ?>>
								<span class="switch-slider"></span>
								<span class="switch-button__label">
								<?php _e( 'SNSシェア［上部］', 'emanon-premium' ); ?>
								</span>
							</span>
						</label>
						<br/>
						<label for="emanon_display_share_button_sticky_category">
							<span class="switch-button">
								<input type="checkbox" name="emanon_display_share_button_sticky_category" id="emanon_display_share_button_sticky_category" value="1" <?php echo ( get_theme_mod( 'display_share_button_sticky_category', '' ) ? ' checked' : '' ); ?>>
								<span class="switch-slider"></span>
								<span class="switch-button__label">
								<?php _e( 'SNSシェア［追従型：PC］', 'emanon-premium' ); ?>
								</span>
							</span>
						</label>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><?php _e( 'タグページ', 'emanon-premium' ); ?></th>
					<td>
						<label for="emanon_display_share_tag">
							<span class="switch-button">
								<input type="checkbox" name="emanon_display_share_tag" id="emanon_display_share_tag" value="1" <?php echo ( get_theme_mod( 'display_share_tag', '' ) ? ' checked' : '' ); ?>>
								<span class="switch-slider"></span>
								<span class="switch-button__label">
								<?php _e( 'SNSシェア［上部］', 'emanon-premium' ); ?>
								</span>
							</span>
						</label>
						<br/>
						<label for="emanon_display_share_button_sticky_tag">
							<span class="switch-button">
								<input type="checkbox" name="emanon_display_share_button_sticky_tag" id="emanon_display_share_button_sticky_tag" value="1" <?php echo ( get_theme_mod( 'display_share_button_sticky_tag', '') ? ' checked' : '' ); ?>>
								<span class="switch-slider"></span>
								<span class="switch-button__label">
								<?php _e( 'SNSシェア［追従型：PC］', 'emanon-premium' ); ?>
								</span>
							</span>
						</label>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><?php _e( '資料請求一覧ページ', 'emanon-premium' ); ?></th>
					<td>
						<label for="emanon_display_share_request_archive">
							<span class="switch-button">
								<input type="checkbox" name="emanon_display_share_request_archive" id="emanon_display_share_request_archive" value="1" <?php echo ( get_theme_mod( 'display_share_request_archive', '' ) ? ' checked' : '' ); ?>>
								<span class="switch-slider"></span>
								<span class="switch-button__label">
								<?php _e( 'SNSシェア［上部］', 'emanon-premium' ); ?>
								</span>
							</span>
						</label>
						<br/>
						<label for="emanon_display_share_button_sticky_request_archive">
							<span class="switch-button">
								<input type="checkbox" name="emanon_display_share_button_sticky_request_archive" id="emanon_display_share_button_sticky_request_archive" value="1" <?php echo ( get_theme_mod( 'display_share_button_sticky_tag', '' ) ? ' checked' : '' ); ?>>
								<span class="switch-slider"></span>
								<span class="switch-button__label">
								<?php _e( 'SNSシェア［追従型：PC］', 'emanon-premium' ); ?>
								</span>
							</span>
						</label>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><?php _e( '投稿者一覧ページ', 'emanon-premium' ); ?></th>
					<td>
						<label for="emanon_display_share_author">
							<span class="switch-button">
								<input type="checkbox" name="emanon_display_share_author" id="emanon_display_share_author" value="1" <?php echo ( get_theme_mod( 'display_share_author', '' ) ? ' checked' : '' ); ?>>
								<span class="switch-slider"></span>
								<span class="switch-button__label">
								<?php _e( 'SNSシェア［上部］', 'emanon-premium' ); ?>
								</span>
							</span>
						</label>
						<br/>
						<label for="emanon_display_share_button_sticky_author">
							<span class="switch-button">
								<input type="checkbox" name="emanon_display_share_button_sticky_author" id="emanon_display_share_button_sticky_author" value="1" <?php echo ( get_theme_mod( 'display_share_button_sticky_author', '' ) ? ' checked' : '' ); ?>>
								<span class="switch-slider"></span>
								<span class="switch-button__label">
								<?php _e( 'SNSシェア［追従型：PC］', 'emanon-premium' ); ?>
								</span>
							</span>
						</label>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><?php _e( 'SNSシェア ラベル', 'emanon-premium' ); ?></th>
					<td>
						<input type="text" name="emanon_sns_label" id="emanon_sns_label" value="<?php echo get_theme_mod( 'sns_label', '' ); ?>" style="width:30%;">
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><?php _e( 'SNSシェア［追従型：PC］ ラベル', 'emanon-premium' ); ?></th>
					<td>
						<input type="text" name="emanon_sns_label_sticky" id="emanon_sns_label_sticky" value="<?php echo get_theme_mod( 'sns_label_sticky', '' ); ?>" style="width:15%;">
					</td>
				</tr>
			</table>
		</div>
	</div>

	<div class="postbox metabox-holder">
		<h3 class="hndle"><?php _e( 'Twitter設定', 'emanon-premium' ); ?></h3>
		<div class="inside">
			<table class="form-table">
				<tr valign="top">
					<th scope="row"><?php _e( 'メンションの表示', 'emanon-premium' ); ?></th>
					<td>
						<label for="emanon_twitter_add_mentions">
							<span class="switch-button">
								<input type="checkbox" name="emanon_twitter_add_mentions" id="emanon_twitter_add_mentions" value="1" <?php echo ( get_theme_mod( 'twitter_add_mentions', '' ) ? ' checked' : '' ); ?>>
								<span class="switch-slider"></span>
								<span class="switch-button__label">
								<?php _e( '有効', 'emanon-premium' ); ?>
								</span>
							</span>
						</label><br>
						<small class="notes"><span class="red">※</span><?php echo _e( 'SNSプロフィールURL設定のTwitter URLから@ユーザー名を抽出しシェア時に追加します。', 'emanon-premium' ); ?></small>
					</td>
				</tr>
			</table>
		</div>
	</div>

	<div class="postbox metabox-holder">
		<h3 class="hndle"><?php _e( 'クリップボード設定', 'emanon-premium' ); ?></h3>
		<div class="inside">
			<table class="form-table">
				<tr valign="top">
					<th scope="row"><?php _e( 'クリップボードの表示', 'emanon-premium' ); ?></th>
					<td>
						<label for="emanon_display_clipboard">
							<span class="switch-button">
								<input type="checkbox" name="emanon_display_clipboard" id="emanon_display_clipboard" value="1" <?php echo ( get_theme_mod( 'display_clipboard', '' ) ? ' checked' : '' ); ?>>
								<span class="switch-slider"></span>
								<span class="switch-button__label">
								<?php _e( '有効', 'emanon-premium' ); ?>
								</span>
							</span>
						</label><br>
						<small class="notes"><span class="red">※</span><?php echo _e( 'ページURLをコピーするボタンを表示', 'emanon-premium' ); ?></small>
					</td>
				</tr>
			</table>
		</div>
	</div>

</div>
