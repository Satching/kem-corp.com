<?php
/**
 * Theme dashboard tag panel
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

// 設定情報を保存
$POST = stripslashes_deep($_POST);
if ( isset($POST['update_options']) ) {

	$names = array(
		'front_page_title',
		'post_title',
		'page_title',
		'archive_title',
		'search_page_title',
		'not_found_page_title',
		'title_separator',
		'dns_prefetch',
		'feed_links',
		'feed_links_extra',
		'emoji',
		'rsd_link',
		'wlwmanifest_link',
		'wp_generator',
		'shortlink',
		'hreflang_tag',
		'disable_seo_meta_tag',
		'top_description',
		'noindex_category',
		'noindex_tag',
		'noindex_date',
		'noindex_author',
		'noindex_attachment',
		'noindex_search',
		'noindex_404',
		'tracking_id',
		'tag_manager_id',
		'search_console_id',
		'stop_tracking_tag',
		'insert_head',
		'insert_body',
		'insert_footer',
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

<div id="panel1" class="tab-panel nav-tab-active">

	<div class="postbox metabox-holder">
		<h3 class="hndle"><?php _e( 'サイトタイトルタグ設定', 'emanon-premium' ); ?><span class="tab-panel_description"><?php _e( '< head >タグ内のtitleタグ設定', 'emanon-premium' ); ?></span></h3>
			<div class="inside">
				<table class="form-table">
					<tr valign="top">
						<th scope="row"><?php _e( 'フロントページ', 'emanon-premium' ); ?></th>
						<td>
						<?php
							$emanon_front_page_title = get_theme_mod( 'front_page_title', '' );
							if ( ! empty( $emanon_front_page_title ) ) {
								$emanon_front_page_title = get_theme_mod( 'front_page_title', '' );
							} else {
								$emanon_front_page_title = 'site_title_tagline';
							}
						?>
						<input name="emanon_front_page_title" type="radio" value="site_title_tagline" <?php checked( 'site_title_tagline', $emanon_front_page_title ); ?>><label><?php _e( 'サイトタイトル | キャッチコピー', 'emanon-premium' ); ?></label><br/>
						<input name="emanon_front_page_title" type="radio" value="site_title" <?php checked( 'site_title', $emanon_front_page_title ); ?>><label><?php _e( 'サイトタイトル', 'emanon-premium' ); ?></label>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><?php _e( '投稿ページ', 'emanon-premium' ); ?></th>
						<td>
						<?php
							$emanon_post_title = get_theme_mod( 'post_title', '' );
							if ( ! empty( $emanon_post_title ) ) {
								$emanon_post_title = get_theme_mod( 'post_title', '' );
							} else {
								$emanon_post_title = 'post_title_site_title';
							}
						?>
						<input name="emanon_post_title" type="radio" value="post_title_site_title" <?php checked( 'post_title_site_title', $emanon_post_title ); ?>><label><?php _e( '投稿ページタイトル | サイトタイトル', 'emanon-premium' ); ?></label><br/>
						<input name="emanon_post_title" type="radio" value="post_title" <?php checked( 'post_title', $emanon_post_title ); ?>><label><?php _e( '投稿ページ タイトル', 'emanon-premium' ); ?></label>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><?php _e( '固定ページ', 'emanon-premium' ); ?></th>
						<td>
						<?php
							$emanon_page_title = get_theme_mod( 'page_title', '' );
							if ( ! empty( $emanon_page_title ) ) {
								$emanon_page_title = get_theme_mod( 'page_title', '' );
							} else {
								$emanon_page_title = 'page_title_site_title';
							}
						?>
						<input name="emanon_page_title" type="radio" value="page_title_site_title" <?php checked( 'page_title_site_title', $emanon_page_title ); ?>><label><?php _e( '固定ページタイトル | サイトタイトル', 'emanon-premium' ); ?></label><br/>
						<input name="emanon_page_title" type="radio" value="page_title" <?php checked( 'page_title', $emanon_page_title ); ?>><label><?php _e( '固定ページ タイトル', 'emanon-premium' ); ?></label>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><?php _e( 'アーカイブページ', 'emanon-premium' ); ?></th>
						<td>
						<?php
							$emanon_archive_title = get_theme_mod( 'archive_title', '' );
							if ( ! empty( $emanon_archive_title ) ) {
								$emanon_archive_title = get_theme_mod( 'archive_title', '' );
							} else {
								$emanon_archive_title = 'archive_title_site_title';
							}
						?>
						<input name="emanon_archive_title" type="radio" value="archive_title_site_title" <?php checked( 'archive_title_site_title', $emanon_archive_title ); ?>><label><?php _e( 'アーカイブタイトル | サイトタイトル', 'emanon-premium' ); ?></label><br/>
						<input name="emanon_archive_title" type="radio" value="archive_title" <?php checked( 'archive_title', $emanon_archive_title ); ?>><label><?php _e( 'アーカイブタイトル', 'emanon-premium' ); ?></label>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><?php _e( '検索結果ページ', 'emanon-premium' ); ?></th>
						<td>
						<?php
							$emanon_search_page_title = get_theme_mod( 'search_page_title', '' );
							if ( ! empty( $emanon_search_page_title ) ) {
								$emanon_search_page_title = get_theme_mod( 'search_page_title', '' );
							} else {
								$emanon_search_page_title = 'search_page_title_site_title';
							}
						?>
						<input name="emanon_search_page_title" type="radio" value="search_page_title_site_title" <?php checked( 'search_page_title_site_title', $emanon_search_page_title ); ?>><label><?php _e( 'XXXXXの検索結果 | サイトタイトル', 'emanon-premium' ); ?></label><br/>
						<input name="emanon_search_page_title" type="radio" value="search_page_title" <?php checked( 'search_page_title', $emanon_search_page_title ); ?>><label><?php _e( 'XXXXXの検索結果', 'emanon-premium' ); ?></label>
						</td>
					</tr>

					<tr valign="top">
						<th scope="row"><?php _e( '404ページ', 'emanon-premium' ); ?></th>
						<td>
						<?php
							$emanon_not_found_page_title = get_theme_mod( 'not_found_page_title', '' );
							if ( ! empty( $emanon_not_found_page_title ) ) {
									$emanon_not_found_page_title = get_theme_mod( 'not_found_page_title', '' );
							} else {
									$emanon_not_found_page_title = 'not_found_page_title_site_title';
							}
						?>
						<input name="emanon_not_found_page_title" type="radio" value="not_found_page_title_site_title" <?php checked( 'not_found_page_title_site_title', $emanon_not_found_page_title ); ?>><label><?php _e( 'ページが見つかりませんでした | サイトタイトル', 'emanon-premium' ); ?></label><br/>
						<input name="emanon_not_found_page_title" type="radio" value="not_found_page_title" <?php checked( 'not_found_page_title', $emanon_not_found_page_title ); ?>><label><?php _e( 'ページが見つかりませんでした', 'emanon-premium' ); ?></label>
						</td>
					</tr>

					<tr valign="top">
						<th scope="row"><?php _e( 'タイトル区切り', 'emanon-premium' ); ?></th>
						<td>
						<?php
							$emanon_title_separator = get_theme_mod( 'title_separator', '' );
							if ( ! empty( $emanon_title_separator ) ) {
									$emanon_title_separator = get_theme_mod( 'title_separator', '' );
							} else {
									$emanon_title_separator = 'pipe';
							}
						?>
						<input name="emanon_title_separator" type="radio" value="pipe" <?php checked( 'pipe', $emanon_title_separator ); ?>><label><?php _e( ' | ', 'emanon-premium' ); ?></label><br/>
						<input name="emanon_title_separator" type="radio" value="hyphen" <?php checked( 'hyphen', $emanon_title_separator ); ?>><label><?php _e( ' - ', 'emanon-premium' ); ?></label>
						</td>
					</tr>
				</table>
			</div>
	</div>

	<div class="postbox metabox-holder">
		<h3 class="hndle"><?php _e( 'metaタグ設定', 'emanon-premium' ); ?><span class="tab-panel_description"><?php _e( '< head >タグ内のmetaタグ設定', 'emanon-premium' ); ?></span></h3>
			<div class="inside">
				<table class="form-table">
					<tr valign="top">
						<th scope="row"><label for="emanon_feed_links"><?php _e( 'Feed links', 'emanon-premium' ); ?></label></th>
						<td>
							<label for="emanon_feed_links">
								<span class="switch-button">
									<input type="checkbox" name="emanon_feed_links" id="emanon_feed_links" value="1" <?php echo ( get_theme_mod( 'feed_links', '' ) ? ' checked' : '' ); ?>>
									<span class="switch-slider"></span>
									<span class="switch-button__label">
									<?php _e( '有効', 'emanon-premium' ); ?>
									</span>
								</span>
							</label>
							<small class="notes"><span class="red">※</span><?php _e( '記事用RSSフィードリンクを出力します。', 'emanon-premium' ); ?></small>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="emanon_feed_links_extra"><?php _e( 'Feed links extra', 'emanon-premium' ); ?></label></th>
						<td>
							<label for="emanon_feed_links_extra">
								<span class="switch-button">
									<input type="checkbox" name="emanon_feed_links_extra" id="emanon_feed_links_extra" value="1" <?php echo ( get_theme_mod( 'feed_links_extra', '')  ? ' checked' : '' ); ?>>
									<span class="switch-slider"></span>
									<span class="switch-button__label">
									<?php _e( '有効', 'emanon-premium' ); ?>
									</span>
								</span>
							</label>
							<small class="notes"><span class="red">※</span><?php _e( 'アーカイブ用RSSフィードリンクを出力します。', 'emanon-premium' ); ?></small>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="emanon_emoji"><?php _e( 'Emoji', 'emanon-premium' ); ?></label></th>
						<td>
							<label for="emanon_emoji">
								<span class="switch-button">
									<input type="checkbox" name="emanon_emoji" id="emanon_emoji" value="1" <?php echo ( get_theme_mod(' emoji', '' ) ? ' checked' : '' ); ?>>
									<span class="switch-slider"></span>
									<span class="switch-button__label">
									<?php _e( '有効', 'emanon-premium' ); ?>
									</span>
								</span>
							</label>
							<small class="notes"><span class="red">※</span><?php _e( '絵文字用のコードを出力します。', 'emanon-premium' ); ?></small>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="emanon_dns_prefetch"><?php _e( 'DNSプリフェッチ', 'emanon-premium' ); ?></label></th>
						<td>
							<label for="emanon_dns_prefetch">
								<span class="switch-button">
									<input type="checkbox" name="emanon_dns_prefetch" id="emanon_dns_prefetch" value="1" <?php echo ( get_theme_mod( 'dns_prefetch', '' ) ? ' checked' : '' ); ?>>
									<span class="switch-slider"></span>
									<span class="switch-button__label">
									<?php _e( '有効', 'emanon-premium' ); ?>
									</span>
								</span>
							</label>
							<small class="notes"><span class="red">※</span><?php _e( '絵文字を使用する場合は有効にします。', 'emanon-premium' ); ?></small>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="emanon_rsd_link"><?php _e( 'EditURI', 'emanon-premium' ); ?></label></th>
						<td>
							<label for="emanon_rsd_link">
								<span class="switch-button">
									<input type="checkbox" name="emanon_rsd_link" id="emanon_rsd_link" value="1" <?php echo ( get_theme_mod( 'rsd_link', '' ) ? ' checked' : '' ); ?>>
									<span class="switch-slider"></span>
									<span class="switch-button__label">
									<?php _e( '有効', 'emanon-premium' ); ?>
									</span>
								</span>
							</label>
							<small class="notes"><span class="red">※</span><?php _e( '外部アプリケーションから投稿や編集する場合は有効にします。', 'emanon-premium' ); ?></small>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="emanon_wlwmanifest_link"><?php _e( 'Wlwmanifest link', 'emanon-premium' ); ?></label></th>
						<td>
							<label for="emanon_wlwmanifest_link">
								<span class="switch-button">
									<input type="checkbox" name="emanon_wlwmanifest_link" id="emanon_wlwmanifest_link" value="1" <?php echo ( get_theme_mod( 'wlwmanifest_link', '' ) ? ' checked' : '' ); ?>>
									<span class="switch-slider"></span>
									<span class="switch-button__label">
									<?php _e( '有効', 'emanon-premium' ); ?>
									</span>
								</span>
							</label>
							<small class="notes"><span class="red">※</span><?php _e( 'Windows Live Writeと連携する場合は有効にします。', 'emanon-premium' ); ?></small>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="emanon_wp_generator"><?php _e( 'WP generator', 'emanon-premium' ); ?></label></th>
						<td>
							<label for="emanon_wp_generator">
								<span class="switch-button">
									<input type="checkbox" name="emanon_wp_generator" id="emanon_wp_generator" value="1" <?php echo ( get_theme_mod( 'wp_generator', '' ) ? ' checked' : '' ); ?>>
									<span class="switch-slider"></span>
									<span class="switch-button__label">
									<?php _e( '有効', 'emanon-premium' ); ?>
									</span>
								</span>
							</label>
							<small class="notes"><span class="red">※</span><?php _e( 'WordPressバージョン情報を出力します。', 'emanon-premium' ); ?></small>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="emanon_shortlink"><?php _e( 'Shortlink', 'emanon-premium' ); ?></label></th>
						<td>
							<label for="emanon_shortlink">
								<span class="switch-button">
									<input type="checkbox" name="emanon_shortlink" id="emanon_shortlink" value="1" <?php echo ( get_theme_mod( 'shortlink', '' ) ? ' checked' : '' ); ?>>
									<span class="switch-slider"></span>
									<span class="switch-button__label">
									<?php _e( '有効', 'emanon-premium' ); ?>
									</span>
								</span>
							</label>
							<small class="notes"><span class="red">※</span><?php _e( '短縮URLを出力します。短縮URLを使用する場合、公式プラグイン「Jetpack by WordPress.com」が必要です。', 'emanon-premium' ); ?></small>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="emanon_hreflang_tag"><?php _e( 'Hreflang', 'emanon-premium' ); ?></label></th>
						<td>
							<label for="emanon_hreflang_tag">
								<span class="switch-button">
									<input type="checkbox" name="emanon_hreflang_tag" id="emanon_hreflang_tag" value="1" <?php echo ( get_theme_mod( 'hreflang_tag', '' ) ? ' checked' : '' ); ?>>
									<span class="switch-slider"></span>
									<span class="switch-button__label">
									<?php _e( '有効', 'emanon-premium' ); ?>
									</span>
								</span>
							</label>
							<small class="notes"><span class="red">※</span><?php _e( '多言語ボタンを設置する場合は有効にします。', 'emanon-premium' ); ?></small>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="emanon_disable_seo_meta_tag"><?php _e( 'meta robots | meta description ', 'emanon-premium' ); ?></label></th>
						<td>
							<label for="emanon_disable_seo_meta_tag">
								<span class="switch-button">
									<input type="checkbox" id="emanon_disable_seo_meta_tag" name="emanon_disable_seo_meta_tag" value="1" <?php echo ( get_theme_mod( 'disable_seo_meta_tag', '' ) ? ' checked' : '' ); ?>>
									<span class="switch-slider switch-slider__red"></span>
									<span class="switch-button__label">
									<?php _e( '無効', 'emanon-premium' ); ?>
									</span>
								</span>
							</label>
							<small class="notes"><span class="red"><?php _e( '［注意］', 'emanon-premium' ); ?></span><?php _e( 'meta robotsとmeta descriptionの出力を停止します。SEO系のプラグインを使用する場合は無効にします。', 'emanon-premium' ); ?></small>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="emanon_top_description"><?php _e( 'Meta description', 'emanon-premium' ); ?></label></th>
						<td>
							<textarea name="emanon_top_description" id="emanon_top_description" rows="5" style="width:60%;"><?php echo get_theme_mod( 'top_description', '' ); ?></textarea>
							<br/>
							<small class="notes"><span class="red">※</span><?php _e( 'フロントページ用meta descriptionに適用されます。', 'emanon-premium' ); ?></small>
						</td>
					</tr>
				</table>
			</div>
	</div>

	<div class="postbox metabox-holder">
		<h3 class="hndle"><?php _e( 'noindex設定', 'emanon-premium' ); ?><span class="tab-panel_description"><?php _e( '検索エンジンのインデックス除外設定', 'emanon-premium' ); ?></span></h3>
			<div class="inside">
				<table class="form-table">
					<tr valign="top">
						<th scope="row"><label for="emanon_noindex_category"><?php _e( 'カテゴリーページ', 'emanon-premium' ); ?></label></th>
						<td>
							<label for="emanon_noindex_category">
								<span class="switch-button">
									<input type="checkbox" name="emanon_noindex_category" id="emanon_noindex_category" value="1" <?php echo ( get_theme_mod( 'noindex_category', '' ) ? ' checked' : '' ); ?>>
									<span class="switch-slider"></span>
									<span class="switch-button__label">
									<?php _e( '有効', 'emanon-premium' ); ?>
									</span>
								</span>
							</label>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="emanon_noindex_tag"><?php _e( 'タグページ', 'emanon-premium' ); ?></label></th>
						<td>
							<label for="emanon_noindex_tag">
								<span class="switch-button">
									<input type="checkbox" id="emanon_noindex_tag" name="emanon_noindex_tag" value="1" <?php echo ( get_theme_mod( 'noindex_tag', '' ) ? ' checked' : '' ); ?>>
									<span class="switch-slider"></span>
									<span class="switch-button__label">
									<?php _e( '有効', 'emanon-premium' ); ?>
									</span>
								</span>
							</label>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="emanon_noindex_date"><?php _e( '年月日ページ', 'emanon-premium' ); ?></label></th>
						<td>
							<label for="emanon_noindex_date">
								<span class="switch-button">
									<input type="checkbox" id="emanon_noindex_date" name="emanon_noindex_date" value="1" <?php echo ( get_theme_mod( 'noindex_date', '' ) ? ' checked' : '' ); ?>>
									<span class="switch-slider"></span>
									<span class="switch-button__label">
									<?php _e( '有効', 'emanon-premium' ); ?>
									</span>
								</span>
							</label>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="emanon_noindex_author"><?php _e( '投稿者ページ', 'emanon-premium' ); ?></label></th>
						<td>
							<label for="emanon_noindex_author">
								<span class="switch-button">
									<input type="checkbox" id="emanon_noindex_author" name="emanon_noindex_author" value="1" <?php echo ( get_theme_mod( 'noindex_author', '' ) ? ' checked' : '' ); ?>>
									<span class="switch-slider"></span>
									<span class="switch-button__label">
									<?php _e( '有効', 'emanon-premium' ); ?>
									</span>
								</span>
							</label>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="emanon_noindex_attachment"><?php _e( 'メディアページ', 'emanon-premium' ); ?></label></th>
						<td>
							<label for="emanon_noindex_attachment">
								<span class="switch-button">
									<input type="checkbox" id="emanon_noindex_attachment" name="emanon_noindex_attachment" value="1" <?php echo ( get_theme_mod( 'noindex_attachment', '' ) ? ' checked' : '' ); ?>>
									<span class="switch-slider"></span>
									<span class="switch-button__label">
									<?php _e( '有効', 'emanon-premium' ); ?>
									</span>
								</span>
							</label>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="emanon_noindex_search"><?php _e( '検索結果ページ', 'emanon-premium' ); ?></label></th>
						<td>
							<label for="emanon_noindex_search">
								<span class="switch-button">
									<input type="checkbox" id="emanon_noindex_search" name="emanon_noindex_search" value="1" <?php echo ( get_theme_mod( 'noindex_search', '' ) ? ' checked' : '' ); ?>>
									<span class="switch-slider"></span>
									<span class="switch-button__label">
									<?php _e( '有効', 'emanon-premium' ); ?>
									</span>
								</span>
							</label>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="emanon_noindex_404"><?php _e( '404ページ', 'emanon-premium' ); ?></label></th>
						<td>
							<label for="emanon_noindex_404">
								<span class="switch-button">
									<input type="checkbox" id="emanon_noindex_404" name="emanon_noindex_404" value="1" <?php echo ( get_theme_mod( 'noindex_404', '' ) ? ' checked' : '' ); ?>>
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
		<h3 class="hndle"><?php _e( 'Googleトラッキングタグ設定', 'emanon-premium' ); ?><span class="tab-panel_description"><?php _e( 'Google各トラッキングコードの出力設定', 'emanon-premium' ); ?></span></h3>
			<div class="inside">
				<table class="form-table">
					<tr valign="top">
						<th scope="row"><label for="emanon_tracking_id"><?php _e( 'Google Analytics トラッキングID', 'emanon-premium' ); ?></label></th>
						<td>
							<input type="text" name="emanon_tracking_id" id="emanon_tracking_id" value="<?php echo get_theme_mod('tracking_id', '' ); ?>" style="width:30%;">
							<small class="notes"><span class="red">※</span><?php _e( 'トラッキングID 例 UA-XXXXXXXX-XX', 'emanon-premium' ); ?></small>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="emanon_tag_manager_id"><?php _e( 'Google Tag Manager コンテナID', 'emanon-premium' ); ?></label></th>
						<td>
							<input type="text" name="emanon_tag_manager_id" id="emanon_tag_manager_id" value="<?php echo get_theme_mod('tag_manager_id', '' ); ?>" style="width:30%;">
							<small class="notes"><span class="red">※</span><?php _e( 'コンテナID 例 GTM-XXXXXXX', 'emanon-premium' ); ?></small>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="emanon_search_console_id"><?php _e( 'Google Search Console ID', 'emanon-premium' ); ?></label></th>
						<td>
							<input type="text" name="emanon_search_console_id" id="emanon_search_console_id" value="<?php echo get_theme_mod('search_console_id', '' ); ?>" style="width:30%;">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="emanon_stop_tracking_tag"><?php _e( 'トラッキングタグの停止', 'emanon-premium' ); ?></label></th>
						<td>
							<label for="emanon_stop_tracking_tag">
								<span class="switch-button">
									<input type="checkbox" id="emanon_stop_tracking_tag" name="emanon_stop_tracking_tag" value="1" <?php echo ( get_theme_mod('stop_tracking_tag', '' ) ? ' checked' : '' ); ?>>
									<span class="switch-slider"></span>
									<span class="switch-button__label">
									<?php _e( '有効', 'emanon-premium' ); ?>
									</span>
								</span>
							</label><br/>
							<small class="notes"><span class="red">※</span><?php _e( 'WordPress管理画面ログイン中は、トラッキングタグを出力しないようにします。', 'emanon-premium' ); ?></small>
						</td>
					</tr>
				</table>
			</div>
	</div>

	<div class="postbox metabox-holder">
		<h3 class="hndle"><?php _e( 'タグの挿入設定', 'emanon-premium' ); ?><span class="tab-panel_description"><?php _e( '任意コードの出力設定', 'emanon-premium' ); ?></span></h3>

			<div class="inside">
				<table class="form-table">
					<tr valign="top">
						<th scope="row"><label for="emanon_insert_head"><?php echo __( '< / head >の直前に挿入', 'emanon-premium' ); ?></label></th>
						<td>
							<textarea name="emanon_insert_head" id="emanon_insert_head" rows="8" style="width:60%;"><?php echo get_theme_mod('insert_head', ''); ?></textarea>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="emanon_insert_body"><?php echo __( '< body >の直後に挿入', 'emanon-premium' ); ?></label></th>
						<td>
							<textarea name="emanon_insert_body" id="emanon_insert_body" rows="8" style="width:60%;"><?php echo get_theme_mod('insert_body', ''); ?></textarea>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="emanon_insert_footer"><?php echo __( '< / body >の直前に挿入', 'emanon-premium' ); ?></label></th>
						<td>
							<textarea name="emanon_insert_footer" id="emanon_insert_footer" rows="8" style="width:60%;"><?php echo get_theme_mod('insert_footer', ''); ?></textarea>
						</td>
					</tr>
				</table>
			</div>
	</div>

</div>