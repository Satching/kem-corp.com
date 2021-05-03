<?php
/**
 * Theme dashboard post and page panel
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

// 設定情報を保存
$POST = stripslashes_deep($_POST);
if ( isset($POST['update_options']) ) {

	$names = array(
		'breadcrumb_home_name',
		'post_breadcrumb_position',
		'post_request_breadcrumb_position',
		'page_breadcrumb_position',
		'home_breadcrumb_position',
		'archive_breadcrumb_position',
		'archive_request_breadcrumb_position',
		'display_category',
		'display_entry_date',
		'display_modified_date',
		'display_comments_number',
		'display_author',
		'display_author_avatar',
		'author_avatar_substitute',
		'reverse_placement_author',
		'display_tag',
		'entry_tag_title',
		'post_header_style',
		'post_header_height_pc',
		'post_header_height_sp',
		'display_post_thumbnail_caption',
		'page_header_style',
		'page_header_height_pc',
		'page_header_height_sp',
		'display_page_thumbnail_caption',
		'post_news_header_style',
		'display_post_news_thumbnail_caption',
		'post_news_header_height',
		'post_news_header_height_pc',
		'post_news_header_height_sp',
		'post_seminar_header_style',
		'display_post_seminar_thumbnail_caption',
		'post_seminar_header_height',
		'post_seminar_header_height_pc',
		'post_seminar_header_height_sp',
		'post_request_header_style',
		'display_post_request_thumbnail_caption',
		'post_request_header_height',
		'post_request_header_height_pc',
		'post_request_header_height_sp',
		'display_toc_post',
		'display_toc_page',
		'toc_heading_level',
		'toc_title',
		'display_toc_toggle_switch',
		'display_target_blank_icon_post',
		'display_target_blank_icon_page',
		'display_comment_form_post',
		'display_comment_form_page',
		'display_comment_form_rating',
		'display_author_profile',
		'author_profile_title',
		'author_sns_follow_label',
		'display_pre_nex',
		'display_featured_image_pre_nex',
		'display_related_post',
		'related_post_title',
		'display_featured_image_related_post',
		'display_related_post_date',
		'related_post_layout',
		'related_slider_sp',
		'related_post_max',
		'related_post_style',
		'related_post_order',
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

<div id="panel5" class="tab-panel">

	<div class="postbox metabox-holder">
		<h3 class="hndle"><?php _e( 'パンくずリスト設定', 'emanon-premium' ); ?></h3>
			<div class="inside">
				<table class="form-table">
					<tr valign="top">
						<th scope="row"><label for="emanon_breadcrumb_home_name"><?php _e( 'ホームラベル', 'emanon-premium' ); ?></label></th>
						<td>
							<input type="text" name="emanon_breadcrumb_home_name" id="emanon_breadcrumb_home_name" value="<?php echo get_theme_mod('breadcrumb_home_name', get_bloginfo('name') ); ?>" style="width:20%;">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><?php _e( '投稿ページ', 'emanon-premium' ); ?></th>
						<td>
						<?php
							$emanon_post_breadcrumb_position = get_theme_mod( 'post_breadcrumb_position' );
							if ( ! empty( $emanon_post_breadcrumb_position ) ) {
								$emanon_post_breadcrumb_position = get_theme_mod( 'post_breadcrumb_position' );
							} else {
								$emanon_post_breadcrumb_position = 'content_top';
							}
						?>
						<select name="emanon_post_breadcrumb_position">
							<option value="content_top" <?php selected( 'content_top', $emanon_post_breadcrumb_position ); ?>><?php _e( 'コンテンツ［上部］', 'emanon-premium' ); ?></option>
							<option value="content_bottom" <?php selected( 'content_bottom', $emanon_post_breadcrumb_position ); ?>><?php _e( 'コンテンツ［下部］', 'emanon-premium' ); ?></option>
							<option value="display_none" <?php selected( 'display_none', $emanon_post_breadcrumb_position ); ?>><?php _e( '非表示', 'emanon-premium' ); ?></option>
						</select>
						</td>
					</tr>
					<?php if ( get_theme_mod( 'add_request' ) ) : ?>
					<tr valign="top">
						<th scope="row"><?php _e( '資料請求', 'emanon-premium' ); ?></th>
						<td>
						<?php
							$emanon_post_request_breadcrumb_position = get_theme_mod( 'post_request_breadcrumb_position' );
							if ( ! empty( $emanon_post_request_breadcrumb_position ) ) {
								$emanon_post_request_breadcrumb_position = get_theme_mod( 'post_request_breadcrumb_position' );
							} else {
								$emanon_post_request_breadcrumb_position = 'content_top';
							}
						?>
						<select name="emanon_post_request_breadcrumb_position">
							<option value="content_top" <?php selected( 'content_top', $emanon_post_request_breadcrumb_position ); ?>><?php _e( 'コンテンツ［上部］', 'emanon-premium' ); ?></option>
							<option value="content_bottom" <?php selected( 'content_bottom', $emanon_post_request_breadcrumb_position ); ?>><?php _e( 'コンテンツ［下部］', 'emanon-premium' ); ?></option>
							<option value="display_none" <?php selected( 'display_none', $emanon_post_request_breadcrumb_position ); ?>><?php _e( '非表示', 'emanon-premium' ); ?></option>
						</select>
						</td>
					</tr>
					<?php endif; ?>
					<tr valign="top">
						<th scope="row"><?php _e( '固定ページ', 'emanon-premium' ); ?></th>
						<td>
						<?php
							$emanon_page_breadcrumb_position = get_theme_mod( 'page_breadcrumb_position' );
							if ( ! empty( $emanon_page_breadcrumb_position ) ) {
								$emanon_page_breadcrumb_positione = get_theme_mod( 'page_breadcrumb_position' );
							} else {
								$emanon_page_breadcrumb_position = 'content_top';
							}
						?>
						<select name="emanon_page_breadcrumb_position">
							<option value="content_top" <?php selected( 'content_top', $emanon_page_breadcrumb_position ); ?>><?php _e( 'コンテンツ［上部］', 'emanon-premium' ); ?></option>
							<option value="content_bottom" <?php selected( 'content_bottom', $emanon_page_breadcrumb_position ); ?>><?php _e( 'コンテンツ［下部］', 'emanon-premium' ); ?></option>
							<option value="display_none" <?php selected( 'display_none', $emanon_page_breadcrumb_position ); ?>><?php _e( '非表示', 'emanon-premium' ); ?></option>
						</select>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><?php _e( 'ホームページ', 'emanon-premium' ); ?></th>
						<td>
						<?php
							$emanon_home_breadcrumb_position = get_theme_mod( 'home_breadcrumb_position' );
							if ( ! empty( $emanon_home_breadcrumb_position ) ) {
								$emanon_home_breadcrumb_position = get_theme_mod( 'home_breadcrumb_position' );
							} else {
								$emanon_home_breadcrumb_position = 'content_top';
							}
						?>
						<select name="emanon_home_breadcrumb_position">
							<option value="content_top" <?php selected( 'content_top', $emanon_home_breadcrumb_position ); ?>><?php _e( 'コンテンツ［上部］', 'emanon-premium' ); ?></option>
							<option value="content_bottom" <?php selected( 'content_bottom', $emanon_home_breadcrumb_position ); ?>><?php _e( 'コンテンツ［下部］', 'emanon-premium' ); ?></option>
							<option value="display_none" <?php selected( 'display_none', $emanon_home_breadcrumb_position ); ?>><?php _e( '非表示', 'emanon-premium' ); ?></option>
						</select>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><?php _e( 'アーカイブページ', 'emanon-premium' ); ?></th>
						<td>
						<?php
							$emanon_archive_breadcrumb_position = get_theme_mod( 'archive_breadcrumb_position' );
							if ( ! empty( $emanon_archive_breadcrumb_position ) ) {
								$emanon_archive_breadcrumb_position = get_theme_mod( 'archive_breadcrumb_position' );
							} else {
								$emanon_archive_breadcrumb_position = 'content_top';
							}
						?>
						<select name="emanon_archive_breadcrumb_position">
							<option value="content_top" <?php selected( 'content_top', $emanon_archive_breadcrumb_position ); ?>><?php _e( 'コンテンツ［上部］', 'emanon-premium' ); ?></option>
							<option value="content_bottom" <?php selected( 'content_bottom', $emanon_archive_breadcrumb_position ); ?>><?php _e( 'コンテンツ［下部］', 'emanon-premium' ); ?></option>
							<option value="display_none" <?php selected( 'display_none', $emanon_archive_breadcrumb_position ); ?>><?php _e( '非表示', 'emanon-premium' ); ?></option>
						</select>
						</td>
					</tr>
					<?php if ( get_theme_mod( 'add_request' ) ) : ?>
					<tr valign="top">
						<th scope="row"><?php _e( '資料請求一覧ページ', 'emanon-premium' ); ?></th>
						<td>
						<?php
							$emanon_archive_request_breadcrumb_position = get_theme_mod( 'archive_request_breadcrumb_position' );
							if ( ! empty( $emanon_archive_request_breadcrumb_position ) ) {
								$emanon_archive_request_breadcrumb_position = get_theme_mod( 'archive_request_breadcrumb_position' );
							} else {
								$emanon_archive_request_breadcrumb_position = 'content_top';
							}
						?>
						<select name="emanon_archive_request_breadcrumb_position">
							<option value="content_top" <?php selected( 'content_top', $emanon_archive_request_breadcrumb_position ); ?>><?php _e( 'コンテンツ［上部］', 'emanon-premium' ); ?></option>
							<option value="content_bottom" <?php selected( 'content_bottom', $emanon_archive_request_breadcrumb_position ); ?>><?php _e( 'コンテンツ［下部］', 'emanon-premium' ); ?></option>
							<option value="display_none" <?php selected( 'display_none', $emanon_archive_request_breadcrumb_position ); ?>><?php _e( '非表示', 'emanon-premium' ); ?></option>
						</select>
						</td>
					</tr>
					<?php endif; ?>
				</table>
			</div>
	</div>

	<div class="postbox metabox-holder">
		<h3 class="hndle"><?php _e( '投稿ページタグ設定', 'emanon-premium' ); ?></h3>
			<div class="inside">
				<table class="form-table">
					<tr valign="top">
						<th scope="row"><label for="emanon_display_category"><?php _e( 'カテゴリー名の表示', 'emanon-premium' ); ?></label></th>
						<td>
							<label for="emanon_display_category">
								<span class="switch-button">
									<input type="checkbox" name="emanon_display_category" id="emanon_display_category" value="1" <?php echo ( get_theme_mod( 'display_category', '' ) ? ' checked' : '' ); ?>>
									<span class="switch-slider"></span>
									<span class="switch-button__label">
									<?php _e( '有効', 'emanon-premium' ); ?>
									</span>
								</span>
							</label>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="emanon_display_entry_date"><?php _e( '公開日の表示', 'emanon-premium' ); ?></label></th>
						<td>
							<label for="emanon_display_entry_date">
								<span class="switch-button">
									<input type="checkbox" name="emanon_display_entry_date" id="emanon_display_entry_date" value="1" <?php echo ( get_theme_mod( 'display_entry_date', '') ? ' checked' : '' ); ?>>
									<span class="switch-slider"></span>
									<span class="switch-button__label">
									<?php _e( '有効', 'emanon-premium' ); ?>
									</span>
								</span>
							</label>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="emanon_display_modified_date"><?php _e( '更新日の表示', 'emanon-premium' ); ?></label></th>
						<td>
							<label for="emanon_display_modified_date">
								<span class="switch-button">
									<input type="checkbox" name="emanon_display_modified_date" id="emanon_display_modified_date" value="1" <?php echo ( get_theme_mod( 'display_modified_date', '' ) ? ' checked' : '' ); ?>>
									<span class="switch-slider"></span>
									<span class="switch-button__label">
									<?php _e( '有効', 'emanon-premium' ); ?>
									</span>
								</span>
							</label>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><?php _e( 'コメント数の表示', 'emanon-premium' ); ?></th>
						<td>
							<label for="emanon_display_comments_number">
								<span class="switch-button">
									<input type="checkbox" name="emanon_display_comments_number" id="emanon_display_comments_number" value="1" <?php echo ( get_theme_mod( 'display_comments_number', '' ) ? ' checked' : '' ); ?>>
									<span class="switch-slider"></span>
									<span class="switch-button__label">
									<?php _e( '有効', 'emanon-premium' ); ?>
									</span>
								</span>
							</label>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><?php _e( '投稿者名の表示', 'emanon-premium' ); ?></th>
						<td>
							<label for="emanon_display_author">
								<span class="switch-button">
									<input type="checkbox" name="emanon_display_author" id="emanon_display_author" value="1" <?php echo ( get_theme_mod( 'display_author', '') ? ' checked' : '' ); ?>>
									<span class="switch-slider"></span>
									<span class="switch-button__label">
									<?php _e( '有効', 'emanon-premium' ); ?>
									</span>
								</span>
							</label>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><?php _e( '投稿者［顔写真］の表示', 'emanon-premium' ); ?></th>
						<td>
							<label for="emanon_display_author_avatar">
								<span class="switch-button">
									<input type="checkbox" name="emanon_display_author_avatar" id="emanon_display_author_avatar" value="1" <?php echo ( get_theme_mod( 'display_author_avatar', '' ) ? ' checked' : '' ); ?>>
									<span class="switch-slider"></span>
									<span class="switch-button__label">
									<?php _e( '有効', 'emanon-premium' ); ?>
									</span>
								</span>
							</label>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><?php _e( '投稿者［顔写真］代用のテキスト', 'emanon-premium' ); ?></th>
						<td>
							<label for="emanon_author_avatar_substitute">
								<span class="switch-button">
									<input type="checkbox" name="emanon_author_avatar_substitute" id="emanon_author_avatar_substitute" value="1" <?php echo ( get_theme_mod( 'author_avatar_substitute', '' ) ? ' checked' : '' ); ?>>
									<span class="switch-slider"></span>
									<span class="switch-button__label">
									<?php _e( '有効', 'emanon-premium' ); ?>
									</span>
								</span>
							</label><br>
							<input type="text" readonly="readonly" value="<?php echo get_theme_mod( 'author_avatar_substitute_text', 'by' ); ?>" >
							<small class="notes"><span class="red">※</span><?php echo _e( '投稿者［顔写真］代用のテキストは記事一覧タブで設定します。', 'emanon-premium' ); ?></small>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><?php _e( '投稿者名の表示位置', 'emanon-premium' ); ?></th>
						<td>
							<label for="emanon_reverse_placement_author">
								<span class="switch-button">
									<input type="checkbox" name="emanon_reverse_placement_author" id="emanon_reverse_placement_author" value="1" <?php echo ( get_theme_mod( 'reverse_placement_author', '' ) ? ' checked' : '' ); ?>>
									<span class="switch-slider"></span>
									<span class="switch-button__label">
									<?php _e( '有効', 'emanon-premium' ); ?>
									</span>
								</span>
							</label><br>
							<small class="notes"><span class="red">※</span><?php echo _e( '日付の表示位置が右に移動します。', 'emanon-premium' ); ?></small>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><?php _e( 'タグの表示', 'emanon-premium' ); ?></th>
						<td>
							<label for="emanon_display_tag">
								<span class="switch-button">
									<input type="checkbox" name="emanon_display_tag" id="emanon_display_tag" value="1" <?php echo ( get_theme_mod( 'display_tag', '') ? ' checked' : '' ); ?>>
									<span class="switch-slider"></span>
									<span class="switch-button__label">
									<?php _e( '有効', 'emanon-premium' ); ?>
									</span>
								</span>
							</label>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="entry_tag_title"><?php _e( 'タグタイトル', 'emanon-premium' ); ?></label></th>
						<td>
							<?php
							$emanon_entry_tag_title = get_theme_mod( 'entry_tag_title', '' );
							if ( ! empty( $emanon_entry_tag_title ) ) {
								$emanon_entry_tag_title = get_theme_mod( 'entry_tag_title', '' );
							} else {
								$emanon_entry_tag_title = __( '関連タグ', 'emanon-premium' );
							}
							?>
							<input type="text" name="emanon_entry_tag_title" id="entry_tag_title" value="<?php echo get_theme_mod( 'entry_tag_title', $emanon_entry_tag_title ); ?>" style="width:30%;">
							<small class="notes"><span class="red">※</span><?php echo _e( '［必須入力］', 'emanon-premium' ); ?></small>
						</td>
					</tr>
				</table>
			</div>
	</div>

	<div class="postbox metabox-holder">
		<h3 class="hndle"><?php _e( 'アイキャッチ画像設定', 'emanon-premium' ); ?></h3>
			<div class="inside">
				<table class="form-table">
					<tr valign="top">
						<th scope="row"><?php _e( '［投稿ページ］レイアウト', 'emanon-premium' ); ?></th>
						<td>
						<?php
							$emanon_post_header_style = get_theme_mod( 'post_header_style' );
							if ( ! empty( $emanon_post_header_style ) ) {
								$emanon_post_header_style = get_theme_mod( 'post_header_style' );
							} else {
								$emanon_post_header_style = 'featured_standard';
							}
						?>
						<label class="radio-col">
							<input name="emanon_post_header_style" type="radio" value="display_none" <?php checked( 'display_none', $emanon_post_header_style ); ?>>
							<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/display_none.png' ; ?>" alt="<?php _e( 'タイトルのみ', 'emanon-premium' ); ?>" ><br>
							<span><?php _e( 'タイトルのみ', 'emanon-premium' ); ?></span>
						</label>
						<label class="radio-col">
							<input type="radio" name="emanon_post_header_style" value="featured_standard" <?php checked( 'featured_standard', $emanon_post_header_style ); ?>>
							<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/standard.png' ; ?>" alt="<?php _e( '標準', 'emanon-premium' ); ?>" ><br>
							<span><?php _e( '標準', 'emanon-premium' ); ?></span>
						</label>
						<label class="radio-col">
							<input type="radio" name="emanon_post_header_style" value="featured_standard_bottom_title" <?php checked( 'featured_standard_bottom_title', $emanon_post_header_style ); ?>>
							<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/standard-bottom-title.png' ; ?>" alt="<?php _e( '標準［タイトル下］', 'emanon-premium' ); ?>" ><br>
							<span><?php _e( '標準［タイトル下］', 'emanon-premium' ); ?></span>
						</label>
						<label class="radio-col">
							<input type="radio" name="emanon_post_header_style" value="featured_cover" <?php checked( 'featured_cover', $emanon_post_header_style ); ?>>
							<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/cover.png' ; ?>" alt="<?php _e( 'カバー', 'emanon-premium' ); ?>" ><br>
							<span><?php _e( 'カバー', 'emanon-premium' ); ?></span>
						</label>
						<label class="radio-col">
							<input type="radio" name="emanon_post_header_style" value="featured_full_width" <?php checked( 'featured_full_width', $emanon_post_header_style ); ?>>
							<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/full-width-image.png' ; ?>" alt="<?php _e( '全幅', 'emanon-premium' ); ?>" ><br>
							<span><?php _e( '全幅', 'emanon-premium' ); ?></span>
						</label>
						<label class="radio-col">
							<input type="radio" name="emanon_post_header_style" value="featured_full_width_overlay" <?php checked( 'featured_full_width_overlay', $emanon_post_header_style ); ?>>
							<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/full-width-image-overlay.png' ; ?>" alt="<?php _e( '全幅［オーバーレイ］', 'emanon-premium' ); ?>" ><br>
							<span><?php _e( '全幅［オーバーレイ］', 'emanon-premium' ); ?></span>
						</label><br>
						<div class="tab-area-margin_top">
							<label for="emanon_display_post_thumbnail_caption">
								<span class="switch-button">
									<input type="checkbox" name="emanon_display_post_thumbnail_caption" id="emanon_display_post_thumbnail_caption" value="1" <?php echo ( get_theme_mod( 'display_post_thumbnail_caption', '') ? ' checked' : '' ); ?>>
									<span class="switch-slider"></span>
									<span class="switch-button__label">
									<?php _e( '画像キャプションの表示', 'emanon-premium' ); ?>
									</span>
								</span>
							</label>
						</div>
						<h4 class="radio-col-title"><?php _e( 'アイキャッチ画像の高さ', 'emanon-premium' ); ?></h4>
						<small class="notes"><span class="red">※</span><?php echo _e( '全幅の高さ・全幅［オーバーレイ］の高さに適用されます。', 'emanon-premium' ); ?></small><br/>
						<label><?php _e( '高さ［PC］', 'emanon-premium' ); ?>: </label><input type="number" name="emanon_post_header_height_pc" id="emanon_post_header_height_pc" value="<?php echo get_theme_mod( 'post_header_height_pc', '500' ); ?>" style="width:15%;"><br>
						<label><?php _e( '高さ［SP］', 'emanon-premium' ); ?>: </label><input type="number" name="emanon_post_header_height_sp" id="emanon_post_header_height_sp" value="<?php echo get_theme_mod( 'post_header_height_sp', '500' ); ?>" style="width:15%;">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><?php _e( '［固定ページ］レイアウト', 'emanon-premium' ); ?></th>
						<td>
						<?php
							$emanon_page_header_style = get_theme_mod( 'page_header_style' );
							if ( ! empty( $emanon_page_header_style ) ) {
								$emanon_page_header_style = get_theme_mod( 'page_header_style' );
							} else {
								$emanon_page_header_style = 'featured_standard';
							}
						?>
						<label class="radio-col">
							<input name="emanon_page_header_style" type="radio" value="display_none" <?php checked( 'display_none', $emanon_page_header_style ); ?>>
							<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/display_none.png' ; ?>" alt="<?php _e( 'タイトルのみ', 'emanon-premium' ); ?>" ><br>
							<span><?php _e( 'タイトルのみ', 'emanon-premium' ); ?></span>
						</label>
						<label class="radio-col">
							<input type="radio" name="emanon_page_header_style" value="featured_standard" <?php checked( 'featured_standard', $emanon_page_header_style ); ?>>
							<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/standard.png' ; ?>" alt="<?php _e( '標準', 'emanon-premium' ); ?>" ><br>
							<span><?php _e( '標準', 'emanon-premium' ); ?></span>
						</label>
						<label class="radio-col">
							<input type="radio" name="emanon_page_header_style" value="featured_standard_bottom_title" <?php checked( 'featured_standard_bottom_title', $emanon_page_header_style ); ?>>
							<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/standard-bottom-title.png' ; ?>" alt="<?php _e( '標準［タイトル下］', 'emanon-premium' ); ?>" ><br>
							<span><?php _e( '標準［タイトル下］', 'emanon-premium' ); ?></span>
						</label>
						<label class="radio-col">
							<input type="radio" name="emanon_page_header_style" value="featured_cover" <?php checked( 'featured_cover', $emanon_page_header_style ); ?>>
							<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/cover.png' ; ?>" alt="<?php _e( 'カバー', 'emanon-premium' ); ?>" ><br>
							<span><?php _e( 'カバー', 'emanon-premium' ); ?></span>
						</label>
						<label class="radio-col">
							<input type="radio" name="emanon_page_header_style" value="featured_full_width" <?php checked( 'featured_full_width', $emanon_page_header_style ); ?>>
							<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/full-width-image.png' ; ?>" alt="<?php _e( '全幅', 'emanon-premium' ); ?>" ><br>
							<span><?php _e( '全幅', 'emanon-premium' ); ?></span>
						</label>
						<label class="radio-col">
							<input type="radio" name="emanon_page_header_style" value="featured_full_width_overlay" <?php checked( 'featured_full_width_overlay', $emanon_page_header_style ); ?>>
							<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/full-width-image-overlay.png' ; ?>" alt="<?php _e( '全幅［オーバーレイ］', 'emanon-premium' ); ?>" ><br>
							<span><?php _e( '全幅［オーバーレイ］', 'emanon-premium' ); ?></span>
						</label><br>
						<div class="tab-area-margin_top">
						<label for="emanon_display_page_thumbnail_caption">
							<span class="switch-button">
								<input type="checkbox" name="emanon_display_page_thumbnail_caption" id="emanon_display_page_thumbnail_caption" value="1" <?php echo ( get_theme_mod( 'display_page_thumbnail_caption', '') ? ' checked' : '' ); ?>>
								<span class="switch-slider"></span>
								<span class="switch-button__label">
								<?php _e( '画像キャプションの表示', 'emanon-premium' ); ?>
								</span>
							</span>
						</label>
						</div>
						<h4 class="radio-col-title"><?php _e( 'アイキャッチ画像の高さ', 'emanon-premium' ); ?></h4>
						<small class="notes"><span class="red">※</span><?php echo _e( '全幅の高さ・全幅［オーバーレイ］の高さに適用されます。', 'emanon-premium' ); ?></small><br/>
						<label><?php _e( '高さ［PC］', 'emanon-premium' ); ?>: </label><input type="number" name="emanon_page_header_height_pc" id="emanon_page_header_height_pc" value="<?php echo get_theme_mod( 'page_header_height_pc', '500' ); ?>" style="width:15%;"><br>
						<label><?php _e( '高さ［SP］', 'emanon-premium' ); ?>: </label><input type="number" name="emanon_page_header_height_sp" id="emanon_page_header_height_sp" value="<?php echo get_theme_mod( 'page_header_height_sp', '500' ); ?>" style="width:15%;">
						</td>
					</tr>
					<?php if ( get_theme_mod( 'add_news' ) ) : ?>
					<tr valign="top">
						<th scope="row"><?php _e( '［ニュースページ］レイアウト', 'emanon-premium' ); ?></th>
						<td>
						<?php
							$emanon_post_news_header_style = get_theme_mod( 'post_news_header_style' );
							if ( ! empty( $emanon_post_news_header_style ) ) {
								$emanon_post_news_header_style = get_theme_mod( 'post_news_header_style' );
							} else {
								$emanon_post_news_header_style = 'featured_standard';
							}
						?>
						<label class="radio-col">
							<input name="emanon_post_news_header_style" type="radio" value="display_none" <?php checked( 'display_none', $emanon_post_news_header_style ); ?>>
							<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/display_none.png' ; ?>" alt="<?php _e( 'タイトルのみ', 'emanon-premium' ); ?>" ><br>
							<span><?php _e( 'タイトルのみ', 'emanon-premium' ); ?></span>
						</label>
						<label class="radio-col">
							<input type="radio" name="emanon_post_news_header_style" value="featured_standard" <?php checked( 'featured_standard', $emanon_post_news_header_style ); ?>>
							<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/standard.png' ; ?>" alt="<?php _e( '標準', 'emanon-premium' ); ?>" ><br>
							<span><?php _e( '標準', 'emanon-premium' ); ?></span>
						</label>
						<label class="radio-col">
							<input type="radio" name="emanon_post_news_header_style" value="featured_standard_bottom_title" <?php checked( 'featured_standard_bottom_title', $emanon_post_news_header_style ); ?>>
							<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/standard-bottom-title.png' ; ?>" alt="<?php _e( '標準［タイトル下］', 'emanon-premium' ); ?>" ><br>
							<span><?php _e( '標準［タイトル下］', 'emanon-premium' ); ?></span>
						</label>
						<label class="radio-col">
							<input type="radio" name="emanon_post_news_header_style" value="featured_cover" <?php checked( 'featured_cover', $emanon_post_news_header_style ); ?>>
							<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/cover.png' ; ?>" alt="<?php _e( 'カバー', 'emanon-premium' ); ?>" ><br>
							<span><?php _e( 'カバー', 'emanon-premium' ); ?></span>
						</label>
						<label class="radio-col">
							<input type="radio" name="emanon_post_news_header_style" value="featured_full_width" <?php checked( 'featured_full_width', $emanon_post_news_header_style ); ?>>
							<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/full-width-image.png' ; ?>" alt="<?php _e( '全幅', 'emanon-premium' ); ?>" ><br>
							<span><?php _e( '全幅', 'emanon-premium' ); ?></span>
						</label>
						<label class="radio-col">
							<input type="radio" name="emanon_post_news_header_style" value="featured_full_width_overlay" <?php checked( 'featured_full_width_overlay', $emanon_post_news_header_style ); ?>>
							<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/full-width-image-overlay.png' ; ?>" alt="<?php _e( '全幅［オーバーレイ］', 'emanon-premium' ); ?>" ><br>
							<span><?php _e( '全幅［オーバーレイ］', 'emanon-premium' ); ?></span>
						</label>
						<div class="tab-area-margin_top">
						<label for="emanon_display_post_news_thumbnail_caption">
							<span class="switch-button">
								<input type="checkbox" name="emanon_display_post_news_thumbnail_caption" id="emanon_display_post_news_thumbnail_caption" value="1" <?php echo ( get_theme_mod( 'display_post_news_thumbnail_caption', '') ? ' checked' : '' ); ?>>
								<span class="switch-slider"></span>
								<span class="switch-button__label">
								<?php _e( '画像キャプションの表示', 'emanon-premium' ); ?>
								</span>
							</span>
						</label>
						</div>
						<h4 class="radio-col-title"><?php _e( 'アイキャッチ画像の高さ', 'emanon-premium' ); ?></h4>
						<small class="notes"><span class="red">※</span><?php echo _e( '全幅の高さ・全幅［オーバーレイ］の高さに適用されます。', 'emanon-premium' ); ?></small><br/>
						<label><?php _e( '高さ［PC］', 'emanon-premium' ); ?>: </label><input type="number" name="emanon_post_news_header_height_pc" id="emanon_post_news_header_height_pc" value="<?php echo get_theme_mod( 'post_news_header_height_pc', '500' ); ?>" style="width:15%;"><br>
						<label><?php _e( '高さ［SP］', 'emanon-premium' ); ?>: </label><input type="number" name="emanon_post_news_header_height_sp" id="emanon_post_news_header_height_sp" value="<?php echo get_theme_mod( 'post_news_header_height_sp', '500' ); ?>" style="width:15%;">
						</td>
					</tr>
					<?php endif; ?>
					<?php if ( get_theme_mod( 'add_seminar' ) ) : ?>
					<tr valign="top">
						<th scope="row"><?php _e( '［セミナーページ］レイアウト', 'emanon-premium' ); ?></th>
						<td>
						<?php
								$emanon_post_seminar_header_style = get_theme_mod( 'post_seminar_header_style' );
								if ( ! empty( $emanon_post_seminar_header_style ) ) {
									$emanon_post_seminar_header_style = get_theme_mod( 'post_seminar_header_style' );
								} else {
									$emanon_post_seminar_header_style = 'featured_standard';
								}
						?>
						<label class="radio-col">
							<input name="emanon_post_seminar_header_style" type="radio" value="display_none" <?php checked( 'display_none', $emanon_post_seminar_header_style ); ?>>
							<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/display_none.png' ; ?>" alt="<?php _e( 'タイトルのみ', 'emanon-premium' ); ?>" ><br>
							<span><?php _e( 'タイトルのみ', 'emanon-premium' ); ?></span>
						</label>
						<label class="radio-col">
							<input type="radio" name="emanon_post_seminar_header_style" value="featured_standard" <?php checked( 'featured_standard', $emanon_post_seminar_header_style ); ?>>
							<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/standard.png' ; ?>" alt="<?php _e( '標準', 'emanon-premium' ); ?>" ><br>
							<span><?php _e( '標準', 'emanon-premium' ); ?></span>
						</label>
						<label class="radio-col">
							<input type="radio" name="emanon_post_seminar_header_style" value="featured_standard_bottom_title" <?php checked( 'featured_standard_bottom_title', $emanon_post_seminar_header_style ); ?>>
							<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/standard-bottom-title.png' ; ?>" alt="<?php _e( '標準［タイトル下］', 'emanon-premium' ); ?>" ><br>
							<span><?php _e( '標準［タイトル下］', 'emanon-premium' ); ?></span>
						</label>
						<label class="radio-col">
							<input type="radio" name="emanon_post_seminar_header_style" value="featured_cover" <?php checked( 'featured_cover', $emanon_post_seminar_header_style ); ?>>
							<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/cover.png' ; ?>" alt="<?php _e( 'カバー', 'emanon-premium' ); ?>" ><br>
							<span><?php _e( 'カバー', 'emanon-premium' ); ?></span>
						</label>
						<label class="radio-col">
							<input type="radio" name="emanon_post_seminar_header_style" value="featured_full_width" <?php checked( 'featured_full_width', $emanon_post_seminar_header_style ); ?>>
							<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/full-width-image.png' ; ?>" alt="<?php _e( '全幅', 'emanon-premium' ); ?>" ><br>
							<span><?php _e( '全幅', 'emanon-premium' ); ?></span>
						</label>
						<label class="radio-col">
							<input type="radio" name="emanon_post_seminar_header_style" value="featured_full_width_overlay" <?php checked( 'featured_full_width_overlay', $emanon_post_seminar_header_style ); ?>>
							<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/full-width-image-overlay.png' ; ?>" alt="<?php _e( '全幅［オーバーレイ］', 'emanon-premium' ); ?>" ><br>
							<span><?php _e( '全幅［オーバーレイ］', 'emanon-premium' ); ?></span>
						</label>
						<div class="tab-area-margin_top">
						<label for="emanon_display_post_seminar_thumbnail_caption">
							<span class="switch-button">
								<input type="checkbox" name="emanon_display_post_seminar_thumbnail_caption" id="emanon_display_post_seminar_thumbnail_caption" value="1" <?php echo ( get_theme_mod( 'display_post_seminar_thumbnail_caption', '') ? ' checked' : '' ); ?>>
								<span class="switch-slider"></span>
								<span class="switch-button__label">
								<?php _e( '画像キャプションの表示', 'emanon-premium' ); ?>
								</span>
							</span>
						</label>
						</div>
						<h4 class="radio-col-title"><?php _e( 'アイキャッチ画像の高さ', 'emanon-premium' ); ?></h4>
						<small class="notes"><span class="red">※</span><?php echo _e( '全幅の高さ・全幅［オーバーレイ］の高さに適用されます。', 'emanon-premium' ); ?></small><br/>
						<label><?php _e( '高さ［PC］', 'emanon-premium' ); ?>: </label><input type="number" name="emanon_post_seminar_header_height_pc" id="emanon_post_seminar_header_height_pc" value="<?php echo get_theme_mod( 'post_seminar_header_height_pc', '500' ); ?>" style="width:15%;"><br>
						<label><?php _e( '高さ［SP］', 'emanon-premium' ); ?>: </label><input type="number" name="emanon_post_seminar_header_height_sp" id="emanon_post_seminar_header_height_sp" value="<?php echo get_theme_mod( 'post_seminar_header_height_sp', '500' ); ?>" style="width:15%;">
						</td>
					</tr>
					<?php endif; ?>
					<?php if ( get_theme_mod( 'add_request' ) ) : ?>
					<tr valign="top">
						<th scope="row"><?php _e( '［資料請求ページ］レイアウト', 'emanon-premium' ); ?></th>
						<td>
						<?php
								$emanon_post_request_header_style = get_theme_mod( 'post_request_header_style' );
								if ( ! empty( $emanon_post_request_header_style ) ) {
									$emanon_post_request_header_style = get_theme_mod( 'post_request_header_style' );
								} else {
									$emanon_post_request_header_style = 'featured_standard';
								}
						?>
						<label class="radio-col">
							<input name="emanon_post_request_header_style" type="radio" value="display_none" <?php checked( 'display_none', $emanon_post_request_header_style ); ?>>
							<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/display_none.png' ; ?>" alt="<?php _e( 'タイトルのみ', 'emanon-premium' ); ?>" ><br>
							<span><?php _e( 'タイトルのみ', 'emanon-premium' ); ?></span>
						</label>
						<label class="radio-col">
							<input type="radio" name="emanon_post_request_header_style" value="featured_standard" <?php checked( 'featured_standard', $emanon_post_request_header_style ); ?>>
							<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/standard.png' ; ?>" alt="<?php _e( '標準', 'emanon-premium' ); ?>" ><br>
							<span><?php _e( '標準', 'emanon-premium' ); ?></span>
						</label>
						<label class="radio-col">
							<input type="radio" name="emanon_post_request_header_style" value="featured_standard_bottom_title" <?php checked( 'featured_standard_bottom_title', $emanon_post_request_header_style ); ?>>
							<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/standard-bottom-title.png' ; ?>" alt="<?php _e( '標準［タイトル下］', 'emanon-premium' ); ?>" ><br>
							<span><?php _e( '標準［タイトル下］', 'emanon-premium' ); ?></span>
						</label>
						<label class="radio-col">
							<input type="radio" name="emanon_post_request_header_style" value="featured_cover" <?php checked( 'featured_cover', $emanon_post_request_header_style ); ?>>
							<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/cover.png' ; ?>" alt="<?php _e( 'カバー', 'emanon-premium' ); ?>" ><br>
							<span><?php _e( 'カバー', 'emanon-premium' ); ?></span>
						</label>
						<label class="radio-col">
							<input type="radio" name="emanon_post_request_header_style" value="featured_full_width" <?php checked( 'featured_full_width', $emanon_post_request_header_style ); ?>>
							<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/full-width-image.png' ; ?>" alt="<?php _e( '全幅', 'emanon-premium' ); ?>" ><br>
							<span><?php _e( '全幅', 'emanon-premium' ); ?></span>
						</label>
						<label class="radio-col">
							<input type="radio" name="emanon_post_request_header_style" value="featured_full_width_overlay" <?php checked( 'featured_full_width_overlay', $emanon_post_request_header_style ); ?>>
							<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/full-width-image-overlay.png' ; ?>" alt="<?php _e( '全幅［オーバーレイ］', 'emanon-premium' ); ?>" ><br>
							<span><?php _e( '全幅［オーバーレイ］', 'emanon-premium' ); ?></span>
						</label>
						<div class="tab-area-margin_top">
						<label for="emanon_display_post_request_thumbnail_caption">
							<span class="switch-button">
								<input type="checkbox" name="emanon_display_post_request_thumbnail_caption" id="emanon_display_post_request_thumbnail_caption" value="1" <?php echo ( get_theme_mod( 'display_post_request_thumbnail_caption', '') ? ' checked' : '' ); ?>>
								<span class="switch-slider"></span>
								<span class="switch-button__label">
								<?php _e( '画像キャプションの表示', 'emanon-premium' ); ?>
								</span>
							</span>
						</label>
						</div>
						<h4 class="radio-col-title"><?php _e( 'アイキャッチ画像の高さ', 'emanon-premium' ); ?></h4>
						<small class="notes"><span class="red">※</span><?php echo _e( '全幅の高さ・全幅［オーバーレイ］の高さに適用されます。', 'emanon-premium' ); ?></small><br/>
						<label><?php _e( '高さ［PC］', 'emanon-premium' ); ?>: </label><input type="number" name="emanon_post_request_header_height_pc" id="emanon_post_request_header_height_pc" value="<?php echo get_theme_mod( 'post_request_header_height_pc', '500' ); ?>" style="width:15%;"><br>
						<label><?php _e( '高さ［SP］', 'emanon-premium' ); ?>: </label><input type="number" name="emanon_post_request_header_height_sp" id="emanon_post_request_header_height_sp" value="<?php echo get_theme_mod( 'post_request_header_height_sp', '500' ); ?>" style="width:15%;">
						</td>
					</tr>
					<?php endif; ?>
				</table>
			</div>
	</div>

	<div class="postbox metabox-holder">
		<h3 class="hndle"><?php _e( '目次設定', 'emanon-premium' ); ?></h3>
			<div class="inside">
				<table class="form-table">
					<tr valign="top">
						<th scope="row"><label for="emanon_display_toc_post"><?php _e( '目次の表示［投稿ページ］', 'emanon-premium' ); ?></label></th>
						<td>
							<label for="emanon_display_toc_post">
								<span class="switch-button">
									<input type="checkbox" name="emanon_display_toc_post" id="emanon_display_toc_post" value="1" <?php echo ( get_theme_mod( 'display_toc_post', '') ? ' checked' : '' ); ?>>
									<span class="switch-slider"></span>
									<span class="switch-button__label">
									<?php _e( '有効', 'emanon-premium' ); ?>
									</span>
								</span>
							</label><br/>
							<small class="notes"><span class="red">※</span><?php echo _e( '投稿ページ本文のhタグ上部に目次を表示します。', 'emanon-premium' ); ?></small>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="emanon_display_toc_page"><?php _e( '目次の表示［固定ページ］', 'emanon-premium' ); ?></label></th>
						<td>
							<label for="emanon_display_toc_page">
								<span class="switch-button">
									<input type="checkbox" name="emanon_display_toc_page" id="emanon_display_toc_page" value="1" <?php echo ( get_theme_mod( 'display_toc_page', '') ? ' checked' : '' ); ?>>
									<span class="switch-slider"></span>
									<span class="switch-button__label">
									<?php _e( '有効', 'emanon-premium' ); ?>
									</span>
								</span>
							</label><br/>
							<small class="notes"><span class="red">※</span><?php echo _e( '固定ページ本文のhタグ上部に目次を表示します。', 'emanon-premium' ); ?></small>
						</td>
					</tr>
						<th scope="row"><?php _e( '見出しレベル', 'emanon-premium' ); ?></th>
						<td>
						<?php
								$emanon_toc_heading_level = get_theme_mod( 'toc_heading_level' );
								if ( ! empty( $emanon_toc_heading_level ) ) {
									$emanon_toc_heading_level = get_theme_mod( 'toc_heading_level' );
								} else {
									$emanon_toc_heading_level = '2-4';
								}
						?>
						<select name="emanon_toc_heading_level">
							<option value="2" <?php selected( '2', $emanon_toc_heading_level ); ?>><?php _e( '見出しh2', 'emanon-premium' ); ?></option>
							<option value="2-3" <?php selected( '2-3', $emanon_toc_heading_level ); ?>><?php _e( '見出しh2-h3', 'emanon-premium' ); ?></option>
							<option value="2-4" <?php selected( '2-4', $emanon_toc_heading_level ); ?>><?php _e( '見出しh2-h4', 'emanon-premium' ); ?></option>
						</select>
						<small class="notes"><span class="red">※</span><?php echo _e( '目次に表示する見出しの範囲を指定します。', 'emanon-premium' ); ?></small>
						</td>
					<tr valign="top">
						<th scope="row"><label for="emanon_toc_title"><?php _e( 'タイトル', 'emanon-premium' ); ?></label></th>
						<td>
							<?php
								$emanon_toc_title = get_theme_mod( 'toc_title', '' );
								if ( ! empty( $emanon_atoc_title ) ) {
									$emanon_toc_title = get_theme_mod( 'toc_title', '' );
								} else {
									$emanon_toc_title = __( '目次', 'emanon-premium' );
								}
							?>
							<input type="text" name="emanon_toc_title" id="emanon_toc_title" value="<?php echo get_theme_mod( 'toc_title', $emanon_toc_title ); ?>" style="width:15%;">
							<small class="notes"><span class="red">※</span><?php echo _e( '［必須入力］', 'emanon-premium' ); ?></small>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="emanon_display_toc_toggle_switch"><?php _e( '開閉ボタンの表示', 'emanon-premium' ); ?></label></th>
						<td>
							<label for="emanon_display_toc_toggle_switch">
								<span class="switch-button">
									<input type="checkbox" name="emanon_display_toc_toggle_switch" id="emanon_display_toc_toggle_switch" value="1" <?php echo ( get_theme_mod( 'display_toc_toggle_switch', '' ) ? ' checked' : '' ); ?>>
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
		<h3 class="hndle"><?php _e( 'target=_blank アイコン設定', 'emanon-premium' ); ?><span class="tab-panel_description"><?php _e( '新しいウィンドウで表示するリンクにアイコンを設定。', 'emanon-premium' ); ?></span></h3>

			<div class="inside">
				<table class="form-table">
					<tr valign="top">
						<th scope="row"><label for="emanon_display_target_blank_icon_post"><i class="icon-external-link"></i><?php _e( 'アイコンの表示［投稿ページ］', 'emanon-premium' ); ?></label></th>
						<td>
							<label for="emanon_display_target_blank_icon_post">
								<span class="switch-button">
									<input type="checkbox" name="emanon_display_target_blank_icon_post" id="emanon_display_target_blank_icon_post" value="1" <?php echo ( get_theme_mod( 'display_target_blank_icon_post', '' ) ? ' checked' : '' ); ?>>
									<span class="switch-slider"></span>
									<span class="switch-button__label">
									<?php _e( '有効', 'emanon-premium' ); ?>
									</span>
								</span>
							</label>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="emanon_display_target_blank_icon_page"><i class="icon-external-link"></i><?php _e( 'アイコンの表示［固定ページ］', 'emanon-premium' ); ?></label></th>
						<td>
							<label for="emanon_display_target_blank_icon_page">
								<span class="switch-button">
									<input type="checkbox" name="emanon_display_target_blank_icon_page" id="emanon_display_target_blank_icon_page" value="1" <?php echo ( get_theme_mod( 'display_target_blank_icon_page', '' ) ? ' checked' : '' ); ?>>
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
		<h3 class="hndle"><?php _e( 'コメント欄設定', 'emanon-premium' ); ?></h3>
			<div class="inside">
				<table class="form-table">
					<tr valign="top">
						<th scope="row"><label for="emanon_display_comment_form_post"><?php _e( 'コメント欄の表示［投稿ページ］', 'emanon-premium' ); ?></label></th>
						<td>
							<label for="emanon_display_comment_form_post">
								<span class="switch-button">
									<input type="checkbox" name="emanon_display_comment_form_post" id="emanon_display_comment_form_post" value="1" <?php echo ( get_theme_mod( 'display_comment_form_post', '' ) ? ' checked' : '' ); ?>>
									<span class="switch-slider"></span>
									<span class="switch-button__label">
									<?php _e( '有効', 'emanon-premium' ); ?>
									</span>
								</span>
							</label>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="emanon_display_comment_form_page"><?php _e( 'コメント欄の表示［固定ページ］', 'emanon-premium' ); ?></label></th>
						<td>
							<label for="emanon_display_comment_form_page">
								<span class="switch-button">
									<input type="checkbox" name="emanon_display_comment_form_page" id="emanon_display_comment_form_page" value="1" <?php echo ( get_theme_mod( 'display_comment_form_page', '' ) ? ' checked' : '' ); ?>>
									<span class="switch-slider"></span>
									<span class="switch-button__label">
									<?php _e( '有効', 'emanon-premium' ); ?>
									</span>
								</span>
							</label>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="emanon_display_comment_form_rating"><?php _e( '評価スターの追加', 'emanon-premium' ); ?></label></th>
						<td>
							<label for="emanon_display_comment_form_rating">
								<span class="switch-button">
									<input type="checkbox" name="emanon_display_comment_form_rating" id="emanon_display_comment_form_rating" value="1" <?php echo ( get_theme_mod( 'display_comment_form_rating', '' ) ? ' checked' : '' ); ?>>
									<span class="switch-slider"></span>
									<span class="switch-button__label">
									<?php _e( '有効', 'emanon-premium' ); ?>
									</span>
								</span>
							</label><br/>
							<small class="notes"><span class="red">※</span><?php echo _e( '星1から星5の評価を表示します。', 'emanon-premium' ); ?></small>
						</td>
					</tr>
				</table>
			</div>
	</div>

	<div class="postbox metabox-holder">
		<h3 class="hndle"><?php _e( '投稿者プロフィール設定', 'emanon-premium' ); ?></h3>
			<div class="inside">
				<table class="form-table">
					<tr valign="top">
						<th scope="row"><label for="emanon_display_author_profile"><?php _e( '投稿者プロフィールの表示', 'emanon-premium' ); ?></label></th>
						<td>
							<label for="emanon_display_author_profile">
								<span class="switch-button">
									<input type="checkbox" name="emanon_display_author_profile" id="emanon_display_author_profile" value="1" <?php echo ( get_theme_mod( 'display_author_profile', '' ) ? ' checked' : '' ); ?>>
									<span class="switch-slider"></span>
									<span class="switch-button__label">
									<?php _e( '有効', 'emanon-premium' ); ?>
									</span>
								</span>
							</label>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="emanon_author_profile_title"><?php _e( 'タイトル', 'emanon-premium' ); ?></label></th>
						<td>
							<?php
								$emanon_author_profile_title = get_theme_mod( 'author_profile_title', '' );
								if ( ! empty( $emanon_author_profile_title ) ) {
									$emanon_author_profile_title = get_theme_mod( 'author_profile_title', '' );
								} else {
									$emanon_author_profile_title = __( 'この記事を書いた人', 'emanon-premium' );
								}
							?>
							<input type="text" name="emanon_author_profile_title" id="emanon_author_profile_title" value="<?php echo get_theme_mod( 'author_profile_title', $emanon_author_profile_title ); ?>" style="width:20%;">
							<small class="notes"><span class="red">※</span><?php echo _e( '［必須入力］', 'emanon-premium' ); ?></small>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><?php _e( 'SNSフォローラベル', 'emanon-premium' ); ?></th>
						<td>
							<input type="text" name="emanon_author_sns_follow_label" id="emanon_author_sns_follow_label" value="<?php echo get_theme_mod( 'author_sns_follow_label', '' ); ?>" placeholder="<?php echo _e( '例）＼ Follow me ／', 'emanon-premium' ); ?>" style="width:30%;">
						</td>
					</tr>
				</table>
			</div>
	</div>

	<div class="postbox metabox-holder">
		<h3 class="hndle"><?php _e( '関連記事設定', 'emanon-premium' ); ?></h3>
			<div class="inside">
				<table class="form-table">
					<tr valign="top">
						<th scope="row"><label for="emanon_display_pre_nex"><?php _e( 'ページナビの表示', 'emanon-premium' ); ?></label></th>
						<td>
							<label for="emanon_display_pre_nex">
								<span class="switch-button">
									<input type="checkbox" name="emanon_display_pre_nex" id="emanon_display_pre_nex" value="1" <?php echo ( get_theme_mod( 'display_pre_nex', '' ) ? ' checked' : '' ); ?>>
									<span class="switch-slider"></span>
									<span class="switch-button__label">
									<?php _e( '有効', 'emanon-premium' ); ?>
									</span>
								</span>
							</label>
							<small class="notes"><span class="red">※</span><?php echo _e( '次のページ・前のページへのリンクを表示します。', 'emanon-premium' ); ?></small>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="emanon_display_featured_image"><?php _e( 'ページナビのオプション', 'emanon-premium' ); ?></label></th>
						<td>
							<label for="emanon_display_featured_image_pre_nex">
								<span class="switch-button">
									<input type="checkbox" name="emanon_display_featured_image_pre_nex" id="emanon_display_featured_image_pre_nex" value="1" <?php echo ( get_theme_mod( 'display_featured_image_pre_nex', '') ? ' checked' : '' ); ?>>
									<span class="switch-slider"></span>
									<span class="switch-button__label">
									<?php _e( 'アイキャッチ画像を表示', 'emanon-premium' ); ?>
									</span>
								</span>
							</label>
							<small class="notes"><span class="red">※</span><?php echo _e( '次のページ・前のページへのリンクに［アイキャッチ画像］を表示します。', 'emanon-premium' ); ?></small>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="emanon_display_related_post"><?php _e( '関連記事を表示', 'emanon-premium' ); ?></label></th>
						<td>
							<label for="emanon_display_related_post">
								<span class="switch-button">
									<input type="checkbox" name="emanon_display_related_post" id="emanon_display_related_post" value="1" <?php echo ( get_theme_mod( 'display_related_post', '' ) ? ' checked' : '' ); ?>>
									<span class="switch-slider"></span>
									<span class="switch-button__label">
									<?php _e( '有効', 'emanon-premium' ); ?>
									</span>
								</span>
							</label>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="emanon_related_post_title"><?php _e( '関連記事タイトル', 'emanon-premium' ); ?></label></th>
						<td>
							<?php
								$emanon_related_post_title = get_theme_mod( 'related_post_title', '' );
								if ( ! empty( $emanon_related_post_title ) ) {
									$emanon_related_post_title = get_theme_mod( 'related_post_title', '' );
								} else {
									$emanon_related_post_title = __( '関連記事', 'emanon-premium' );
								}
							?>
							<input type="text" name="emanon_related_post_title" id="emanon_related_post_title" value="<?php echo get_theme_mod( 'related_post_title', $emanon_related_post_title ); ?>" style="width:20%;">
							<small class="notes"><span class="red">※</span><?php echo _e( '［必須入力］', 'emanon-premium' ); ?></small>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="emanon_display_featured_image"><?php _e( '関連記事のオプション', 'emanon-premium' ); ?></label></th>
						<td>
							<label for="emanon_display_featured_image_related_post">
								<span class="switch-button">
									<input type="checkbox" name="emanon_display_featured_image_related_post" id="emanon_display_featured_image_related_post" value="1" <?php echo ( get_theme_mod( 'display_featured_image_related_post', '' ) ? ' checked' : '' ); ?>>
									<span class="switch-slider"></span>
									<span class="switch-button__label">
									<?php _e( 'アイキャッチ画像を表示', 'emanon-premium' ); ?>
									</span>
								</span>
							</label>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="emanon_display_related_post_date"><?php _e( '関連記事の日付表示', 'emanon-premium' ); ?></label></th>
						<td>
							<label for="emanon_display_related_post_date">
								<span class="switch-button">
									<input type="checkbox" name="emanon_display_related_post_date" id="emanon_display_related_post_date" value="1" <?php echo ( get_theme_mod( 'display_related_post_date', '' ) ? ' checked' : '' ); ?>>
									<span class="switch-slider"></span>
									<span class="switch-button__label">
									<?php _e( '有効', 'emanon-premium' ); ?>
									</span>
								</span>
							</label>
						</td>
					</tr>
					<tr valign="top">
					<th scope="row"><label for="emanon_related_post_layout"><?php _e( '関連記事のレイアウト', 'emanon-premium' ); ?></label></th>
						<td>
						<?php
							$emanon_related_post_layout = get_theme_mod( 'related_post_layout' );
							if ( ! empty( $emanon_related_post_layout ) ) {
								$emanon_related_post_layout = get_theme_mod( 'related_post_layout' );
							} else {
								$emanon_related_post_layout = 'col-6';
							}
						?>
						<label><input type="radio" name="emanon_related_post_layout" value="col-6" <?php checked( 'col-6', $emanon_related_post_layout ); ?>><?php _e( '2列', 'emanon-premium' ); ?></label><br/>
						<label><input type="radio" name="emanon_related_post_layout" value="col-4" <?php checked( 'col-4', $emanon_related_post_layout ); ?>><?php _e( '3列', 'emanon-premium' ); ?></label>
						</td>
					</tr>
					<tr valign="top">
					<th scope="row"><label for="emanon_related_post_layout"><?php _e( '関連記事レイアウトのオプション', 'emanon-premium' ); ?></label></th>
						<td>
							<label for="emanon_related_slider_sp">
								<span class="switch-button">
									<input type="checkbox" name="emanon_related_slider_sp" id="emanon_related_slider_sp" value="1" <?php echo ( get_theme_mod( 'related_slider_sp', '' ) ? ' checked' : '' ); ?>>
									<span class="switch-slider"></span>
									<span class="switch-button__label">
									<?php _e( 'スライダー［SP］', 'emanon-premium' ); ?>
									</span>
								</span>
							</label>
							<small class="notes"><span class="red">※</span><?php echo _e( '関連記事の3列レイアウト・スマホ表示時に適用されます。', 'emanon-premium' ); ?></small>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="emanon_related_post_max"><?php _e( '関連記事の表示件数', 'emanon-premium' ); ?></label></th>
						<td>
							<input type="number" name="emanon_related_post_max" id="emanon_related_post_max" min="1" step="1" value="<?php echo get_theme_mod( 'related_post_max', 4 ); ?>" style="width:5%;">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><?php _e( '関連記事の表示範囲', 'emanon-premium' ); ?></th>
						<td>
						<?php
							$emanon_related_post_style = get_theme_mod( 'related_post_style' );
							if ( ! empty( $emanon_related_post_style ) ) {
								$emanon_related_post_style = get_theme_mod( 'related_post_style' );
							} else {
								$emanon_related_post_style = 'category';
							}
						?>
						<input type="radio" name="emanon_related_post_style" value="category" <?php checked( 'category', $emanon_related_post_style ); ?>><label><?php _e( '同一カテゴリーの記事を表示', 'emanon-premium' ); ?></label><br/>
						<input type="radio" name="emanon_related_post_style" value="author" <?php checked( 'author', $emanon_related_post_style ); ?>><label><?php _e( '同一投稿者の記事を表示', 'emanon-premium' ); ?></label>
						</td>
					</tr>
					<tr valign="top">
					<th scope="row"><label for="emanon_related_post_order"><?php _e( '関連記事の表示順番', 'emanon-premium' ); ?></label></th>
						<td>
						<?php
							$emanon_related_post_order = get_theme_mod( 'related_post_order' );
							if ( ! empty( $emanon_related_post_order ) ) {
								$emanon_related_post_order = get_theme_mod( 'related_post_order' );
							} else {
								$emanon_related_post_order = 'rand';
							}
						?>
						<input type="radio" name="emanon_related_post_order" value="rand" <?php checked( 'rand', $emanon_related_post_order ); ?>><label><?php _e( 'ランダム', 'emanon-premium' ); ?></label><br/>
						<input type="radio" name="emanon_related_post_order" value="date" <?php checked( 'date', $emanon_related_post_order ); ?>><label><?php _e( '日付降順', 'emanon-premium' ); ?></label>
						</td>
					</tr>
				</table>
			</div>
	</div>

</div>
