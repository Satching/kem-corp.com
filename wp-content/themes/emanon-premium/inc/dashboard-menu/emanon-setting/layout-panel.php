<?php
/**
 * Theme dashboard layout panel
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

// 設定情報を保存
$POST = stripslashes_deep($_POST);
if ( isset($POST['update_options']) ) {

	$names = array(
		'loading_animation',
		'loading_animation_cookie',
		'loading_animation_icon_image',
		'header_layout',
		'header_content_inner_width',
		'frontpage_header_overlay',
		'front_page_layout',
		'home_page_layout',
		'post_layout',
		'post_news_layout',
		'post_seminar_layout',
		'post_request_layout',
		'page_layout',
		'archive_page_layout',
		'archive_news_layout',
		'archive_seminar_layout',
		'archive_request_layout',
		'search_page_layout',
		'not_found_page_layout',
		'front_page_list_layout_pc',
		'front_page_list_layout_sp',
		'display_content_show_on_front',
		'home_page_list_layout_pc',
		'home_page_list_layout_sp',
		'archive_page_list_layout_pc',
		'archive_page_list_layout_sp',
		'archive_news_list_layout_pc',
		'archive_news_list_layout_sp',
		'archive_seminar_list_layout_pc',
		'archive_seminar_list_layout_sp',
		'archive_request_list_layout_pc',
		'archive_request_list_layout_sp',
		'search_page_list_layout_pc',
		'search_page_list_layout_sp',
		'footer_widget_layout',
		'published_year',
		'footer_copyright',
		'footer_user_credit',
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

<div id="panel3" class="tab-panel">

	<div class="postbox metabox-holder">
		<h3 class="hndle"><?php _e( 'ローディングアニメーション設定', 'emanon-premium' ); ?><span class="tab-panel_description"><?php _e( 'フロントページ適用のアニメーション設定', 'emanon-premium' ); ?></span></h3>

			<div class="inside">
				<table class="form-table">
					<tr valign="top">
						<th scope="row"><?php _e( 'アニメーションの表示', 'emanon-premium' ); ?></th>
						<td>
						<?php
							$emanon_loading_animation = get_theme_mod( 'loading_animation', '' );
							if ( ! empty( $emanon_loading_animation ) ) {
								$emanon_loading_animation = get_theme_mod( 'loading_animation', '' );
							} else {
								$emanon_loading_animation = 'no_animation';
							}
						?>
						<input name="emanon_loading_animation" type="radio" value="no_animation" <?php checked( 'no_animation', $emanon_loading_animation ); ?>><label><?php _e( 'なし', 'emanon-premium' ); ?></label><br/>
						<input name="emanon_loading_animation" type="radio" value="animation_icon" <?php checked( 'animation_icon', $emanon_loading_animation ); ?>><label><?php _e( 'アイコン', 'emanon-premium' ); ?></label><br/>
						<input name="emanon_loading_animation" type="radio" value="animation_text" <?php checked( 'animation_text', $emanon_loading_animation ); ?>><label><?php _e( 'テキスト', 'emanon-premium' ); ?></label><br/>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="emanon_loading_animation_cookie"><?php _e( 'クッキー', 'emanon-premium' ); ?></label></th>
						<td>
						<label for="emanon_loading_animation_cookie">
							<span class="switch-button">
								<input type="checkbox" name="emanon_loading_animation_cookie" id="emanon_loading_animation_cookie" value="1" <?php echo ( get_theme_mod( 'loading_animation_cookie', '') ? ' checked' : '' ); ?>>
								<span class="switch-slider"></span>
								<span class="switch-button__label">
								<?php _e('有効', 'emanon-premium' ); ?>
								</span>
							</span>
						</label>
						<br/>
						<small class="notes"><span class="red">※</span><?php _e( 'ローディングアニメーションを2回目以降のアクセスで非表示にします。', 'emanon-premium' ); ?></small>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="emanon_loading_animation_icon_image"><?php _e( 'アイコン画像', 'emanon-premium' ); ?></label></th>
						<td>
						<?php
							emanon_custom_media_uploader( 'emanon_loading_animation_icon_image', get_theme_mod('loading_animation_icon_image', ''), 'emanon_loading_animation_icon_image' );
						?>
						</td>
					</tr>
				</table>
			</div>
	</div>

	<div class="postbox metabox-holder">
		<h3 class="hndle"><?php _e( 'ヘッダーレイアウト設定', 'emanon-premium' ); ?></h3>
			<div class="inside">
				<table class="form-table">
					<tr valign="top">
						<th scope="row"><?php _e( 'ヘッダーレイアウト', 'emanon-premium' ); ?></th>
							<td>
							<?php
								$emanon_header_layout = get_theme_mod( 'header_layout', '' );
								if ( ! empty( $emanon_header_layout ) ) {
									$emanon_header_layout = get_theme_mod( 'header_layout', '' );
								} else {
									$emanon_header_layout = 'header_default';
								}
							?>
							<label class="radio-col">
								<input name="emanon_header_layout" type="radio" value="header_default" <?php checked( 'header_default', $emanon_header_layout ); ?>>
								<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/logo-left.png' ; ?>" alt="<?php _e( '標準', 'emanon-premium' ); ?>" ><br>
								<span><?php _e('標準', 'emanon-premium' ); ?></span>
							</label>
							<label class="radio-col">
								<input name="emanon_header_layout" type="radio" value="header_center" <?php checked( 'header_center', $emanon_header_layout ); ?>>
								<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/logo-center.png' ; ?>" alt="<?php _e( '中央', 'emanon-premium' ); ?>" ><br>
								<span><?php _e( '中央', 'emanon-premium' ); ?></span>
							</label>
							<label class="radio-col">
								<input name="emanon_header_layout" type="radio" value="header_center_top_menu" <?php checked( 'header_center_top_menu', $emanon_header_layout ); ?>>
								<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/logo-center-top-menu.png' ; ?>" alt="<?php _e( '中央［上部メニュー］', 'emanon-premium' ); ?>" ><br>
								<span><?php _e( '中央［上部メニュー］', 'emanon-premium' ); ?></span>
							</label>
							<label class="radio-col">
								<input name="emanon_header_layout" type="radio" value="header_row" <?php checked( 'header_row', $emanon_header_layout ); ?>>
								<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/logo-navi-left.png' ; ?>" alt="<?php _e( '1行', 'emanon-premium' ); ?>" ><br>
								<span><?php _e( '1行', 'emanon-premium' ); ?></span>
							</label>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><?php _e( 'ヘッダー幅', 'emanon-premium' ); ?></th>
							<td>
							<?php
							$emanon_header_content_inner_width = get_theme_mod( 'header_content_inner_width', '' );
								if ( ! empty( $emanon_header_content_inner_width ) ) {
									$emanon_header_content_inner_width = get_theme_mod( 'header_content_inner_width', '' );
								} else {
									$emanon_header_content_inner_width = 'normal';
								}
							?>
							<input name="emanon_header_content_inner_width" type="radio" value="normal" <?php checked( 'normal', $emanon_header_content_inner_width ); ?>><label><?php _e( '通常', 'emanon-premium' ); ?></label><br/>
							<input name="emanon_header_content_inner_width" type="radio" value="full" <?php checked( 'full', $emanon_header_content_inner_width ); ?>><label><?php _e( '全幅', 'emanon-premium' ); ?></label>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><?php _e( 'オーバーレイ［フロントページ］', 'emanon-premium' ); ?></th>
						<td>
							<label for="emanon_frontpage_header_overlay">
								<span class="switch-button">
									<input type="checkbox" name="emanon_frontpage_header_overlay" id="emanon_frontpage_header_overlay" value="1" <?php echo ( get_theme_mod( 'frontpage_header_overlay', '') ? ' checked' : '' ); ?>>
									<span class="switch-slider"></span>
									<span class="switch-button__label">
									<?php _e('有効', 'emanon-premium' ); ?>
									</span>
								</span>
							</label>
							<small class="notes"><span class="red">※</span><?php _e( 'ピックアップスライダーには設定できません。ヘッダーエリア内のメニューや文字の配色は、#fffに固定されます。', 'emanon-premium' ); ?></small>
						</td>
					</tr>
				</table>
			</div>
	</div>

	<div class="postbox metabox-holder">
		<h3 class="hndle"><?php _e( 'カラムレイアウト設定', 'emanon-premium' ); ?><span class="tab-panel_description"><?php _e( 'サイドバーの表示設定', 'emanon-premium' ); ?></span></h3>
			<div class="inside">
				<table class="form-table">
					<tr valign="top">
						<th scope="row"><?php _e( 'フロントページ ', 'emanon-premium' ); ?></th>
						<td>
						<?php
							$emanon_front_page_layout = get_theme_mod( 'front_page_layout', '' );
							if ( ! empty( $emanon_front_page_layout ) ) {
								$emanon_front_page_layout = get_theme_mod( 'front_page_layout', '' );
							} else {
								$emanon_front_page_layout = 'two-r-col';
							}
						?>
						<label class="radio-col">
						<input name="emanon_front_page_layout" type="radio" value="two-l-col" <?php checked( 'two-l-col', $emanon_front_page_layout ); ?>>
						<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/two-l-col.png' ; ?>" alt="<?php _e( '2カラム［L］', 'emanon-premium' ); ?>"><br>
						<span><?php _e( '2カラム［L］', 'emanon-premium' ); ?></span></label>
						<label class="radio-col">
						<input name="emanon_front_page_layout" type="radio" value="one-col" <?php checked( 'one-col', $emanon_front_page_layout ); ?>>
						<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/one-col.png' ; ?>" alt="<?php _e( '1カラム', 'emanon-premium' ); ?>"><br>
						<span><?php _e( '1カラム', 'emanon-premium' ); ?></span></label>
						<label class="radio-col">
						<input name="emanon_front_page_layout" type="radio" value="two-r-col" <?php checked( 'two-r-col', $emanon_front_page_layout ); ?>>
						<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/two-r-col.png' ; ?>" alt="<?php _e( '2カラム［R］', 'emanon-premium' ); ?>"><br>
						<span><?php _e( '2カラム［R］', 'emanon-premium' ); ?></span></label><br>
						<small class="notes"><span class="red">※</span><?php _e( 'フロントページ：設定＞表示設定［ホームページの表示］で「ホームページ」に指定した固定ページのレイアウト設定です。', 'emanon-premium' ); ?></small>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><?php _e( '固定ページ［フロントページ用］本文の表示', 'emanon-premium' ); ?></th>
						<td>
							<label for="emanon_display_content_show_on_front">
								<span class="switch-button">
									<input type="checkbox" name="emanon_display_content_show_on_front" id="emanon_display_content_show_on_front" value="1" <?php echo ( get_theme_mod( 'display_content_show_on_front', '' ) ? ' checked' : '' ); ?>>
									<span class="switch-slider"></span>
									<span class="switch-button__label">
									<?php _e( '有効', 'emanon-premium' ); ?>
									</span>
								</span>
							</label><br>
							<small class="notes"><span class="red">※</span><?php _e( '設定＞表示設定［ホームページの表示］で「ホームページ」に指定した固定ページの「本文」を表示します。', 'emanon-premium' ); ?></small>
							<small class="notes"><span class="red">※</span><?php _e( 'ウィジェット＞フロントページコンテンツ［上部・下部］の使用を可能にします。', 'emanon-premium' ); ?></small>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><?php _e( 'ブログページ', 'emanon-premium' ); ?></th>
						<td>
						<?php
							$emanon_home_page_layout = get_theme_mod( 'home_page_layout', '' );
							if ( ! empty( $emanon_home_page_layout ) ) {
								$emanon_home_page_layout = get_theme_mod( 'home_page_layout', '' );
							} else {
								$emanon_home_page_layout = 'two-r-col';
							}
						?>
						<label class="radio-col">
						<input name="emanon_home_page_layout" type="radio" value="two-l-col" <?php checked( 'two-l-col', $emanon_home_page_layout ); ?>>
						<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/two-l-col.png' ; ?>" alt="<?php _e( '2カラム［L］', 'emanon-premium' ); ?>"><br>
						<span><?php _e( '2カラム［L］', 'emanon-premium' ); ?></span></label>
						<label class="radio-col">
						<input name="emanon_home_page_layout" type="radio" value="one-col" <?php checked( 'one-col', $emanon_home_page_layout ); ?>>
						<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/one-col.png' ; ?>" alt="<?php _e( '1カラム', 'emanon-premium' ); ?>"><br>
						<span><?php _e( '1カラム', 'emanon-premium' ); ?></span></label>
						<label class="radio-col">
						<input name="emanon_home_page_layout" type="radio" value="two-r-col" <?php checked( 'two-r-col', $emanon_home_page_layout ); ?>>
						<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/two-r-col.png' ; ?>" alt="<?php _e( '2カラム［R］', 'emanon-premium' ); ?>"><br>
						<span><?php _e( '2カラム［R］', 'emanon-premium' ); ?></span></label>
						<br>
						<small class="notes"><span class="red">※</span><?php _e( '設定＞表示設定［ホームページの表示］で「投稿ページ」に指定した固定ページのレイアウト設定です。', 'emanon-premium' ); ?></small>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><?php _e( '投稿ページ', 'emanon-premium' ); ?></th>
						<td>
						<?php
							$emanon_post_layout = get_theme_mod( 'post_layout', '' );
							if ( ! empty( $emanon_post_layout ) ) {
								$emanon_post_layout = get_theme_mod( 'post_layout', '' );
							} else {
								$emanon_post_layout = 'two-r-col';
							}
						?>
						<label class="radio-col">
						<input name="emanon_post_layout" type="radio" value="two-l-col" <?php checked( 'two-l-col', $emanon_post_layout ); ?>>
						<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/two-l-col.png' ; ?>" alt="<?php _e( '2カラム［L］', 'emanon-premium' ); ?>"><br>
						<span><?php _e( '2カラム［L］', 'emanon-premium' ); ?></span></label>
						<label class="radio-col">
						<input name="emanon_post_layout" type="radio" value="one-col" <?php checked( 'one-col', $emanon_post_layout ); ?>>
						<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/one-col.png' ; ?>" alt="<?php _e( '1カラム', 'emanon-premium' ); ?>"><br>
						<span><?php _e( '1カラム', 'emanon-premium' ); ?></span></label>
						<label class="radio-col">
						<input name="emanon_post_layout" type="radio" value="two-r-col" <?php checked( 'two-r-col', $emanon_post_layout ); ?>>
						<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/two-r-col.png' ; ?>" alt="<?php _e( '2カラム［R］', 'emanon-premium' ); ?>"><br>
						<span><?php _e( '2カラム［R］', 'emanon-premium' ); ?></span></label>
						</td>
					</tr>

					<?php if ( get_theme_mod( 'add_news' ) ) : ?>
					<tr valign="top">
						<th scope="row"><?php _e( 'ニュースページ', 'emanon-premium' ); ?></th>
						<td>
						<?php
							$emanon_post_news_layout = get_theme_mod( 'post_news_layout', '' );
							if ( ! empty( $emanon_post_news_layout ) ) {
								$emanon_post_news_layout = get_theme_mod( 'post_news_layout', '' );
							} else {
								$emanon_post_news_layout = 'two-r-col';
							}
						?>
						<label class="radio-col">
						<input name="emanon_post_news_layout" type="radio" value="two-l-col" <?php checked( 'two-l-col', $emanon_post_news_layout ); ?>>
						<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/two-l-col.png' ; ?>" alt="<?php _e( '2カラム［L］', 'emanon-premium' ); ?>"><br>
						<span><?php _e( '2カラム［L］', 'emanon-premium' ); ?></span></label>
						<label class="radio-col">
						<input name="emanon_post_news_layout" type="radio" value="one-col" <?php checked( 'one-col', $emanon_post_news_layout ); ?>>
						<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/one-col.png' ; ?>" alt="<?php _e( '1カラム', 'emanon-premium' ); ?>"><br>
						<span><?php _e( '1カラム', 'emanon-premium' ); ?></span></label>
						<label class="radio-col">
						<input name="emanon_post_news_layout" type="radio" value="two-r-col" <?php checked( 'two-r-col', $emanon_post_news_layout ); ?>>
						<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/two-r-col.png' ; ?>" alt="<?php _e( '2カラム［R］', 'emanon-premium' ); ?>"><br>
						<span><?php _e( '2カラム［R］', 'emanon-premium' ); ?></span></label>
						</td>
					</tr>
					<?php endif; ?>

					<?php if ( get_theme_mod( 'add_seminar' ) ) : ?>
					<tr valign="top">
						<th scope="row"><?php _e( 'セミナーページ', 'emanon-premium' ); ?></th>
						<td>
						<?php
								$emanon_post_seminar_layout = get_theme_mod( 'post_seminar_layout', '' );
								if ( ! empty( $emanon_post_seminar_layout ) ) {
										$emanon_post_seminar_layout = get_theme_mod( 'post_seminar_layout', '' );
								} else {
										$emanon_post_seminar_layout = 'two-r-col';
								}
						?>
						<label class="radio-col">
						<input name="emanon_post_seminar_layout" type="radio" value="two-l-col" <?php checked( 'two-l-col', $emanon_post_seminar_layout ); ?>>
						<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/two-l-col.png' ; ?>" alt="<?php _e( '2カラム［L］', 'emanon-premium' ); ?>"><br>
						<span><?php _e( '2カラム［L］', 'emanon-premium' ); ?></span></label>
						<label class="radio-col">
						<input name="emanon_post_seminar_layout" type="radio" value="one-col" <?php checked( 'one-col', $emanon_post_seminar_layout ); ?>>
						<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/one-col.png' ; ?>" alt="<?php _e( '1カラム', 'emanon-premium' ); ?>"><br>
						<span><?php _e( '1カラム', 'emanon-premium' ); ?></span></label>
						<label class="radio-col">
						<input name="emanon_post_seminar_layout" type="radio" value="two-r-col" <?php checked( 'two-r-col', $emanon_post_seminar_layout ); ?>>
						<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/two-r-col.png' ; ?>" alt="<?php _e( '2カラム［R］', 'emanon-premium' ); ?>"><br>
						<span><?php _e( '2カラム［R］', 'emanon-premium' ); ?></span></label>
						</td>
					</tr>
					<?php endif; ?>

					<?php if ( get_theme_mod( 'add_request' ) ) : ?>
					<tr valign="top">
						<th scope="row"><?php _e( '資料請求ページ', 'emanon-premium' ); ?></th>
						<td>
						<?php
							$emanon_post_request_layout = get_theme_mod( 'post_request_layout', '' );
							if ( ! empty( $emanon_post_request_layout ) ) {
									$emanon_post_request_layout = get_theme_mod( 'post_request_layout', '' );
							} else {
									$emanon_post_request_layout = 'two-r-col';
							}
						?>
						<label class="radio-col">
						<input name="emanon_post_request_layout" type="radio" value="two-l-col" <?php checked( 'two-l-col', $emanon_post_request_layout ); ?>>
						<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/two-l-col.png' ; ?>" alt="<?php _e( '2カラム［L］', 'emanon-premium' ); ?>"><br>
						<span><?php _e( '2カラム［L］', 'emanon-premium' ); ?></span></label>
						<label class="radio-col">
						<input name="emanon_post_request_layout" type="radio" value="two-r-col" <?php checked( 'two-r-col', $emanon_post_request_layout ); ?>>
						<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/two-r-col.png' ; ?>" alt="<?php _e( '2カラム［R］', 'emanon-premium' ); ?>"><br>
						<span><?php _e( '2カラム［R］', 'emanon-premium' ); ?></span></label>
						</td>
					</tr>
					<?php endif; ?>

						<tr valign="top">
						<th scope="row"><?php _e( '固定ページ', 'emanon-premium' ); ?></th>
						<td>
						<?php
							$emanon_page_layout = get_theme_mod( 'page_layout', '' );
							if ( ! empty( $emanon_page_layout ) ) {
									$emanon_page_layout = get_theme_mod( 'page_layout', '' );
							} else {
									$emanon_page_layout = 'two-r-col';
							}
						?>
						<label class="radio-col">
						<input name="emanon_page_layout" type="radio" value="two-l-col" <?php checked( 'two-l-col', $emanon_page_layout ); ?>>
						<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/two-l-col.png' ; ?>" alt="<?php _e( '2カラム［L］', 'emanon-premium' ); ?>"><br>
						<span><?php _e( '2カラム［L］', 'emanon-premium' ); ?></span></label>
						<label class="radio-col">
						<input name="emanon_page_layout" type="radio" value="one-col" <?php checked( 'one-col', $emanon_page_layout ); ?>>
						<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/one-col.png' ; ?>" alt="<?php _e( '1カラム', 'emanon-premium' ); ?>"><br>
						<span><?php _e( '1カラム', 'emanon-premium' ); ?></span></label>
						<label class="radio-col">
						<input name="emanon_page_layout" type="radio" value="two-r-col" <?php checked( 'two-r-col', $emanon_page_layout ); ?>>
						<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/two-r-col.png' ; ?>" alt="<?php _e( '2カラム［R］', 'emanon-premium' ); ?>"><br>
						<span><?php _e( '2カラム［R］', 'emanon-premium' ); ?></span></label>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><?php _e( 'アーカイブページ', 'emanon-premium' ); ?></th>
						<td>
						<?php
							$emanon_archive_page_layout = get_theme_mod( 'archive_page_layout', '' );
							if ( ! empty( $emanon_archive_page_layout ) ) {
									$emanon_archive_page_layout = get_theme_mod( 'archive_page_layout', '' );
							} else {
									$emanon_archive_page_layout = 'two-r-col';
							}
						?>
						<label class="radio-col">
						<input name="emanon_archive_page_layout" type="radio" value="two-l-col" <?php checked( 'two-l-col', $emanon_archive_page_layout ); ?>>
						<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/two-l-col.png' ; ?>" alt="<?php _e( '2カラム［L］', 'emanon-premium' ); ?>"><br>
						<span><?php _e( '2カラム［L］', 'emanon-premium' ); ?></span></label>
						<label class="radio-col">
						<input name="emanon_archive_page_layout" type="radio" value="one-col" <?php checked( 'one-col', $emanon_archive_page_layout ); ?>>
						<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/one-col.png' ; ?>" alt="<?php _e( '1カラム', 'emanon-premium' ); ?>"><br>
						<span><?php _e( '1カラム', 'emanon-premium' ); ?></span></label>
						<label class="radio-col">
						<input name="emanon_archive_page_layout" type="radio" value="two-r-col" <?php checked( 'two-r-col', $emanon_archive_page_layout ); ?>>
						<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/two-r-col.png' ; ?>" alt="<?php _e( '2カラム［R］', 'emanon-premium' ); ?>"><br>
						<span><?php _e( '2カラム［R］', 'emanon-premium' ); ?></span></label>
						</td>
					</tr>

					<?php if ( get_theme_mod( 'add_news' ) ) : ?>
					<tr valign="top">
						<th scope="row"><?php _e( 'アーカイブ［ニュース］ページ', 'emanon-premium' ); ?></th>
						<td>
						<?php
							$emanon_archive_news_layout = get_theme_mod( 'archive_news_layout', '' );
							if ( ! empty( $emanon_archive_news_layout ) ) {
								$emanon_archive_news_layout = get_theme_mod( 'archive_news_layout', '' );
							} else {
								$emanon_archive_news_layout = 'two-r-col';
							}
						?>
						<label class="radio-col">
						<input name="emanon_archive_news_layout" type="radio" value="two-l-col" <?php checked( 'two-l-col', $emanon_archive_news_layout ); ?>>
						<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/two-l-col.png' ; ?>" alt="<?php _e( '2カラム［L］', 'emanon-premium' ); ?>"><br>
						<span><?php _e( '2カラム［L］', 'emanon-premium' ); ?></span></label>
						<label class="radio-col">
						<input name="emanon_archive_news_layout" type="radio" value="one-col" <?php checked( 'one-col', $emanon_archive_news_layout ); ?>>
						<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/one-col.png' ; ?>" alt="<?php _e( '1カラム', 'emanon-premium' ); ?>"><br>
						<span><?php _e( '1カラム', 'emanon-premium' ); ?></span></label>
						<label class="radio-col">
						<input name="emanon_archive_news_layout" type="radio" value="two-r-col" <?php checked( 'two-r-col', $emanon_archive_news_layout ); ?>>
						<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/two-r-col.png' ; ?>" alt="<?php _e( '2カラム［R］', 'emanon-premium' ); ?>"><br>
						<span><?php _e( '2カラム［R］', 'emanon-premium' ); ?></span></label>
						</td>
					</tr>
					<?php endif; ?>

					<?php if ( get_theme_mod( 'add_seminar' ) ) : ?>
					<tr valign="top">
						<th scope="row"><?php _e( 'アーカイブ［セミナー］ページ', 'emanon-premium' ); ?></th>
						<td>
						<?php
							$emanon_archive_seminar_layout = get_theme_mod( 'archive_seminar_layout', '' );
							if ( ! empty( $emanon_archive_seminar_layout ) ) {
								$emanon_archive_seminar_layout = get_theme_mod( 'archive_seminar_layout', '' );
							} else {
								$emanon_archive_seminar_layout = 'two-r-col';
							}
						?>
						<label class="radio-col">
						<input name="emanon_archive_seminar_layout" type="radio" value="two-l-col" <?php checked( 'two-l-col', $emanon_archive_seminar_layout ); ?>>
						<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/two-l-col.png' ; ?>" alt="<?php _e( '2カラム［L］', 'emanon-premium' ); ?>"><br>
						<span><?php _e( '2カラム［L］', 'emanon-premium' ); ?></span></label>
						<label class="radio-col">
						<input name="emanon_archive_seminar_layout" type="radio" value="one-col" <?php checked( 'one-col', $emanon_archive_seminar_layout ); ?>>
						<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/one-col.png' ; ?>" alt="<?php _e( '1カラム', 'emanon-premium' ); ?>" ><br>
						<span><?php _e( '1カラム', 'emanon-premium' ); ?></span></label>
						<label class="radio-col">
						<input name="emanon_archive_seminar_layout" type="radio" value="two-r-col" <?php checked( 'two-r-col', $emanon_archive_seminar_layout ); ?>>
						<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/two-r-col.png' ; ?>" alt="<?php _e( '2カラム［R］', 'emanon-premium' ); ?>"><br>
						<span><?php _e( '2カラム［R］', 'emanon-premium' ); ?></span></label>
						</td>
					</tr>
					<?php endif; ?>

					<?php if ( get_theme_mod( 'add_request' ) ) : ?>
					<tr valign="top">
						<th scope="row"><?php _e( 'アーカイブ［資料請求］ページ', 'emanon-premium' ); ?></th>
						<td>
						<?php
							$emanon_archive_request_layout = get_theme_mod( 'archive_request_layout', '' );
							if ( ! empty( $emanon_archive_request_layout ) ) {
								$emanon_archive_request_layout = get_theme_mod( 'archive_request_layout', '' );
							} else {
								$emanon_archive_request_layout = 'two-r-col';
							}
						?>
						<label class="radio-col">
						<input name="emanon_archive_request_layout" type="radio" value="two-l-col" <?php checked( 'two-l-col', $emanon_archive_request_layout ); ?>>
						<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/two-l-col.png' ; ?>" alt="<?php _e( '2カラム［L］', 'emanon-premium' ); ?>"><br>
						<span><?php _e( '2カラム［L］', 'emanon-premium' ); ?></span></label>
						<label class="radio-col">
						<input name="emanon_archive_request_layout" type="radio" value="one-col" <?php checked( 'one-col', $emanon_archive_request_layout ); ?>>
						<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/one-col.png' ; ?>" alt="<?php _e( '1カラム', 'emanon-premium' ); ?>"><br>
						<span><?php _e( '1カラム', 'emanon-premium' ); ?></span></label>
						<label class="radio-col">
						<input name="emanon_archive_request_layout" type="radio" value="two-r-col" <?php checked( 'two-r-col', $emanon_archive_request_layout ); ?>>
						<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/two-r-col.png' ; ?>" alt="<?php _e( '2カラム［R］', 'emanon-premium' ); ?>"><br>
						<span><?php _e( '2カラム［R］', 'emanon-premium' ); ?></span></label>
						</td>
					</tr>
					<?php endif; ?>

					<tr valign="top">
						<th scope="row"><?php _e( '検索結果ページ', 'emanon-premium' ); ?></th>
						<td>
						<?php
							$emanon_search_page_layout = get_theme_mod( 'search_page_layout', '' );
							if ( ! empty( $emanon_search_page_layout ) ) {
								$emanon_search_page_layout = get_theme_mod( 'search_page_layout', '' );
							} else {
								$emanon_search_page_layout = 'two-r-col';
							}
						?>
						<label class="radio-col">
						<input name="emanon_search_page_layout" type="radio" value="two-l-col" <?php checked( 'two-l-col', $emanon_search_page_layout ); ?>>
						<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/two-l-col.png' ; ?>" alt="<?php _e( '2カラム［L］', 'emanon-premium' ); ?>"><br>
						<span><?php _e( '2カラム［L］', 'emanon-premium' ); ?></span></label>
						<label class="radio-col">
						<input name="emanon_search_page_layout" type="radio" value="one-col" <?php checked( 'one-col', $emanon_search_page_layout ); ?>>
						<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/one-col.png' ; ?>" alt="<?php _e( '1カラム', 'emanon-premium' ); ?>"><br>
						<span><?php _e( '1カラム', 'emanon-premium' ); ?></span></label>
						<label class="radio-col">
						<input name="emanon_search_page_layout" type="radio" value="two-r-col" <?php checked( 'two-r-col', $emanon_search_page_layout ); ?>>
						<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/two-r-col.png' ; ?>" alt="<?php _e( '2カラム［R］', 'emanon-premium' ); ?>"><br>
						<span><?php _e( '2カラム［R］', 'emanon-premium' ); ?></span></label>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><?php _e( '404ページ', 'emanon-premium' ); ?></th>
						<td>
						<?php
							$emanon_not_found_page_layout = get_theme_mod( 'not_found_page_layout', '' );
							if ( ! empty( $emanon_not_found_page_layout ) ) {
								$emanon_not_found_page_layout = get_theme_mod( 'not_found_page_layout', '' );
							} else {
								$emanon_not_found_page_layout = 'two-r-col';
							}
						?>
						<label class="radio-col">
						<input name="emanon_not_found_page_layout" type="radio" value="two-l-col" <?php checked( 'two-l-col', $emanon_not_found_page_layout ); ?>>
						<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/two-l-col.png' ; ?>" alt="<?php _e( '2カラム［L］', 'emanon-premium' ); ?>"><br>
						<span><?php _e( '2カラム［L］', 'emanon-premium' ); ?></span></label>
						<label class="radio-col">
						<input name="emanon_not_found_page_layout" type="radio" value="one-col" <?php checked( 'one-col', $emanon_not_found_page_layout ); ?>>
						<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/one-col.png' ; ?>" alt="<?php _e( '1カラム', 'emanon-premium' ); ?>"><br>
						<span><?php _e( '1カラム', 'emanon-premium' ); ?></span></label>
						<label class="radio-col">
						<input name="emanon_not_found_page_layout" type="radio" value="two-r-col" <?php checked( 'two-r-col', $emanon_not_found_page_layout ); ?>>
						<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/two-r-col.png' ; ?>" alt="<?php _e( '2カラム［R］', 'emanon-premium' ); ?>"><br>
						<span><?php _e( '2カラム［R］', 'emanon-premium' ); ?></span></label>
						</td>
					</tr>
				</table>
			</div>
	</div>

	<div class="postbox metabox-holder">
		<h3 class="hndle"><?php _e( '記事一覧レイアウト設定', 'emanon-premium' ); ?></h3>
			<div class="inside">
				<table class="form-table">
					<tr valign="top">
						<th scope="row"><?php _e( 'フロントページ［PC］', 'emanon-premium' ); ?></th>
						<td>
						<?php
							$emanon_front_page_list_layout_pc = get_theme_mod( 'front_page_list_layout_pc', '' );
							if ( ! empty( $emanon_front_page_list_layout_pc ) ) {
								$emanon_front_page_list_layout_pc = get_theme_mod( 'front_page_list_layout_pc', '' );
							} else {
								$emanon_front_page_list_layout_pc = 'pc-list';
							}
						?>
						<label class="radio-col">
						<input name="emanon_front_page_list_layout_pc" type="radio" value="pc-list" <?php checked( 'pc-list', $emanon_front_page_list_layout_pc ); ?>>
						<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/post-list-one-col.png' ; ?>" alt="<?php _e( '［リスト］1カラム', 'emanon-premium' ); ?>"><br>
						<span><?php _e( '［リスト］1カラム', 'emanon-premium' ); ?></span></label>
						<label class="radio-col">
						<input name="emanon_front_page_list_layout_pc" type="radio" value="pc-card-2" <?php checked( 'pc-card-2', $emanon_front_page_list_layout_pc ); ?>>
						<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/post-card-two-col.png' ; ?>" alt="<?php _e( '［カード］2カラム', 'emanon-premium' ); ?>"><br>
						<span><?php _e( '［カード］2カラム', 'emanon-premium' ); ?></span></label>
						<label class="radio-col">
						<input name="emanon_front_page_list_layout_pc" type="radio" value="pc-card-3" <?php checked( 'pc-card-3', $emanon_front_page_list_layout_pc ); ?>>
						<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/post-card-three-col.png' ; ?>" alt="<?php _e( '［カード］3カラム', 'emanon-premium' ); ?>"><br>
						<span><?php _e( '［カード］3カラム', 'emanon-premium' ); ?></span></label>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><?php _e( 'フロントページ［SP］', 'emanon-premium' ); ?></th>
						<td>
						<?php
							$emanon_front_page_list_layout_sp = get_theme_mod( 'front_page_list_layout_sp', '' );
							if ( ! empty( $emanon_front_page_list_layout_sp ) ) {
								$emanon_front_page_list_layout_sp = get_theme_mod( 'front_page_list_layout_sp', '' );
							} else {
								$emanon_front_page_list_layout_sp = 'sp-list';
							}
						?>
						<label class="radio-col">
						<input name="emanon_front_page_list_layout_sp" type="radio" value="sp-list" <?php checked( 'sp-list', $emanon_front_page_list_layout_sp ); ?>>
						<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/post-list-one-col.png' ; ?>" alt="<?php _e( '［リスト］1カラム', 'emanon-premium' ); ?>"><br>
						<span><?php _e( '［リスト］1カラム', 'emanon-premium' ); ?></span></label>
						<label class="radio-col">
						<input name="emanon_front_page_list_layout_sp" type="radio" value="sp-card-1" <?php checked( 'sp-card-1', $emanon_front_page_list_layout_sp ); ?>>
						<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/post-card-one-col.png' ; ?>" alt="<?php _e( '［カード］1カラム', 'emanon-premium' ); ?>"><br>
						<span><?php _e( '［カード］1カラム', 'emanon-premium' ); ?></span></label>
						<label class="radio-col">
						<input name="emanon_front_page_list_layout_sp" type="radio" value="sp-card-2" <?php checked( 'sp-card-2', $emanon_front_page_list_layout_sp ); ?>>
						<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/post-card-two-col.png' ; ?>" alt="<?php _e( '［カード］2カラム', 'emanon-premium' ); ?>"><br>
						<span><?php _e( '［カード］2カラム', 'emanon-premium' ); ?></span></label>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><?php _e( 'ブログページ［PC］', 'emanon-premium' ); ?></th>
						<td>
						<?php
							$emanon_home_page_list_layout_pc = get_theme_mod( 'home_page_list_layout_pc', '' );
							if ( ! empty( $emanon_home_page_list_layout_pc ) ) {
								$emanon_home_page_list_layout_pc = get_theme_mod( 'home_page_list_layout_pc', '' );
							} else {
								$emanon_home_page_list_layout_pc = 'pc-list';
							}
						?>
						<label class="radio-col">
						<input name="emanon_home_page_list_layout_pc" type="radio" value="pc-list" <?php checked( 'pc-list', $emanon_home_page_list_layout_pc ); ?>>
						<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/post-list-one-col.png' ; ?>" alt="<?php _e( '［リスト］1カラム', 'emanon-premium' ); ?>"><br>
						<span><?php _e( '［リスト］1カラム', 'emanon-premium' ); ?></span></label>
						<label class="radio-col">
						<input name="emanon_home_page_list_layout_pc" type="radio" value="pc-card-2" <?php checked( 'pc-card-2', $emanon_home_page_list_layout_pc ); ?>>
						<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/post-card-two-col.png' ; ?>" alt="<?php _e( '［カード］2カラム', 'emanon-premium' ); ?>"><br>
						<span><?php _e( '［カード］2カラム', 'emanon-premium' ); ?></span></label>
						<label class="radio-col">
						<input name="emanon_home_page_list_layout_pc" type="radio" value="pc-card-3" <?php checked( 'pc-card-3', $emanon_home_page_list_layout_pc ); ?>>
						<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/post-card-three-col.png' ; ?>" alt="<?php _e( '［カード］3カラム', 'emanon-premium' ); ?>"><br>
						<span><?php _e( '［カード］3カラム', 'emanon-premium' ); ?></span></label>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><?php _e( 'ブログページ［SP］', 'emanon-premium' ); ?></th>
						<td>
						<?php
							$emanon_home_page_list_layout_sp = get_theme_mod( 'home_page_list_layout_sp', '' );
							if ( ! empty( $emanon_home_page_list_layout_sp ) ) {
								$emanon_home_page_list_layout_sp = get_theme_mod( 'home_page_list_layout_sp', '' );
							} else {
								$emanon_home_page_list_layout_sp = 'sp-list';
							}
						?>
						<label class="radio-col">
						<input name="emanon_home_page_list_layout_sp" type="radio" value="sp-list" <?php checked( 'sp-list', $emanon_home_page_list_layout_sp ); ?>>
						<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/post-list-one-col.png' ; ?>" alt="<?php _e( '［リスト］1カラム', 'emanon-premium' ); ?>"><br>
						<span><?php _e( '［リスト］1カラム', 'emanon-premium' ); ?></span></label>
						<label class="radio-col">
						<input name="emanon_home_page_list_layout_sp" type="radio" value="sp-card-1" <?php checked( 'sp-card-1', $emanon_home_page_list_layout_sp ); ?>>
						<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/post-card-one-col.png' ; ?>" alt="<?php _e( '［カード］1カラム', 'emanon-premium' ); ?>"><br>
						<span><?php _e( '［カード］1カラム', 'emanon-premium' ); ?></span></label>
						<label class="radio-col">
						<input name="emanon_home_page_list_layout_sp" type="radio" value="sp-card-2" <?php checked( 'sp-card-2', $emanon_home_page_list_layout_sp ); ?>>
						<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/post-card-two-col.png' ; ?>" alt="<?php _e( '［カード］2カラム', 'emanon-premium' ); ?>"><br>
						<span><?php _e( '［カード］2カラム', 'emanon-premium' ); ?></span></label>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><?php _e( 'アーカイブページ［PC］', 'emanon-premium' ); ?></th>
						<td>
						<?php
							$emanon_archive_page_list_layout_pc = get_theme_mod( 'archive_page_list_layout_pc', '' );
							if ( ! empty( $emanon_archive_page_list_layout_pc ) ) {
								$emanon_archive_page_list_layout_pc = get_theme_mod( 'archive_page_list_layout_pc', '' );
							} else {
								$emanon_archive_page_list_layout_pc = 'pc-list';
							}
						?>
						<label class="radio-col">
						<input name="emanon_archive_page_list_layout_pc" type="radio" value="pc-list" <?php checked( 'pc-list', $emanon_archive_page_list_layout_pc ); ?>>
						<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/post-list-one-col.png' ; ?>" alt="<?php _e( '［リスト］1カラム', 'emanon-premium' ); ?>"><br>
						<span><?php _e( '［リスト］1カラム', 'emanon-premium' ); ?></span></label>
						<label class="radio-col">
						<input name="emanon_archive_page_list_layout_pc" type="radio" value="pc-card-2" <?php checked( 'pc-card-2', $emanon_archive_page_list_layout_pc ); ?>>
						<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/post-card-two-col.png' ; ?>" alt="<?php _e( '［カード］2カラム', 'emanon-premium' ); ?>"><br>
						<span><?php _e( '［カード］2カラム', 'emanon-premium' ); ?></span></label>
						<label class="radio-col">
						<input name="emanon_archive_page_list_layout_pc" type="radio" value="pc-card-3" <?php checked( 'pc-card-3', $emanon_archive_page_list_layout_pc ); ?>>
						<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/post-card-three-col.png' ; ?>" alt="<?php _e( '［カード］3カラム', 'emanon-premium' ); ?>"><br>
						<span><?php _e( '［カード］3カラム', 'emanon-premium' ); ?></span></label>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><?php _e( 'アーカイブページ［SP］', 'emanon-premium' ); ?></th>
						<td>
						<?php
							$emanon_archive_page_list_layout_sp = get_theme_mod( 'archive_page_list_layout_sp', '' );
							if ( ! empty( $emanon_archive_page_list_layout_sp ) ) {
								$emanon_archive_page_list_layout_sp = get_theme_mod( 'archive_page_list_layout_sp', '' );
							} else {
								$emanon_archive_page_list_layout_sp = 'sp-list';
							}
						?>
						<label class="radio-col">
						<input name="emanon_archive_page_list_layout_sp" type="radio" value="sp-list" <?php checked( 'sp-list', $emanon_archive_page_list_layout_sp ); ?>>
						<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/post-list-one-col.png' ; ?>" alt="<?php _e( '［リスト］1カラム', 'emanon-premium' ); ?>"><br>
						<span><?php _e( '［リスト］1カラム', 'emanon-premium' ); ?></span></label>
						<label class="radio-col">
						<input name="emanon_archive_page_list_layout_sp" type="radio" value="sp-card-1" <?php checked( 'sp-card-1', $emanon_archive_page_list_layout_sp ); ?>>
						<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/post-card-one-col.png' ; ?>" alt="<?php _e( '［カード］1カラム', 'emanon-premium' ); ?>"><br>
						<span><?php _e( '［カード］1カラム', 'emanon-premium' ); ?></span></label>
						<label class="radio-col">
						<input name="emanon_archive_page_list_layout_sp" type="radio" value="sp-card-2" <?php checked( 'sp-card-2', $emanon_archive_page_list_layout_sp ); ?>>
						<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/post-card-two-col.png' ; ?>" alt="<?php _e( '［カード］2カラム', 'emanon-premium' ); ?>"><br>
						<span><?php _e( '［カード］2カラム', 'emanon-premium' ); ?></span></label>
						</td>
					</tr>

					<?php if ( get_theme_mod( 'add_news' ) ) : ?>
					<tr valign="top">
						<th scope="row"><?php _e( 'アーカイブ［ニュース］ページ［PC］', 'emanon-premium' ); ?></th>
						<td>
						<?php
							$emanon_archive_news_list_layout_pc = get_theme_mod( 'archive_news_list_layout_pc', '' );
							if ( ! empty( $emanon_archive_news_list_layout_pc ) ) {
								$emanon_archive_news_list_layout_pc = get_theme_mod( 'archive_news_list_layout_pc', '' );
							} else {
								$emanon_archive_news_list_layout_pc = 'pc-list';
							}
						?>
						<label class="radio-col">
						<input name="emanon_archive_news_list_layout_pc" type="radio" value="pc-list" <?php checked( 'pc-list', $emanon_archive_news_list_layout_pc ); ?>>
						<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/post-list-one-col.png' ; ?>" alt="<?php _e( '［リスト］1カラム', 'emanon-premium' ); ?>"><br>
						<span><?php _e( '［リスト］1カラム', 'emanon-premium' ); ?></span></label>
						<label class="radio-col">
						<input name="emanon_archive_news_list_layout_pc" type="radio" value="pc-card-2" <?php checked( 'pc-card-2', $emanon_archive_news_list_layout_pc ); ?>>
						<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/post-card-two-col.png' ; ?>" alt="<?php _e( '［カード］2カラム', 'emanon-premium' ); ?>"><br>
						<span><?php _e( '［カード］2カラム', 'emanon-premium' ); ?></span></label>
						<label class="radio-col">
						<input name="emanon_archive_news_list_layout_pc" type="radio" value="pc-card-3" <?php checked( 'pc-card-3', $emanon_archive_news_list_layout_pc ); ?>>
						<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/post-card-three-col.png' ; ?>" alt="<?php _e( '［カード］3カラム', 'emanon-premium' ); ?>"><br>
						<span><?php _e( '［カード］3カラム', 'emanon-premium' ); ?></span></label>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><?php _e( 'アーカイブ［ニュース］ページ［SP］', 'emanon-premium' ); ?></th>
						<td>
						<?php
							$emanon_archive_news_list_layout_sp = get_theme_mod( 'archive_news_list_layout_sp', '' );
							if ( ! empty( $emanon_archive_news_list_layout_sp ) ) {
								$emanon_archive_news_list_layout_sp = get_theme_mod( 'archive_news_list_layout_sp', '' );
							} else {
								$emanon_archive_news_list_layout_sp = 'sp-list';
							}
						?>
						<label class="radio-col">
						<input name="emanon_archive_news_list_layout_sp" type="radio" value="sp-list" <?php checked( 'sp-list', $emanon_archive_news_list_layout_sp ); ?>>
						<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/post-list-one-col.png' ; ?>" alt="<?php _e( '［リスト］1カラム', 'emanon-premium' ); ?>"><br>
						<span><?php _e( '［リスト］1カラム', 'emanon-premium' ); ?></span></label>
						<label class="radio-col">
						<input name="emanon_archive_news_list_layout_sp" type="radio" value="sp-card-1" <?php checked( 'sp-card-1', $emanon_archive_news_list_layout_sp ); ?>>
						<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/post-card-one-col.png' ; ?>" alt="<?php _e( '［カード］1カラム', 'emanon-premium' ); ?>"><br>
						<span><?php _e( '［カード］1カラム', 'emanon-premium' ); ?></span></label>
						<label class="radio-col">
						<input name="emanon_archive_news_list_layout_sp" type="radio" value="sp-card-2" <?php checked( 'sp-card-2', $emanon_archive_news_list_layout_sp ); ?>>
						<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/post-card-two-col.png' ; ?>" alt="<?php _e( '［カード］2カラム', 'emanon-premium' ); ?>"><br>
						<span><?php _e( '［カード］2カラム', 'emanon-premium' ); ?></span></label>
						</td>
					</tr>
					<?php endif; ?>

					<?php if ( get_theme_mod( 'add_seminar' ) ) : ?>
					<tr valign="top">
						<th scope="row"><?php _e( 'アーカイブ［セミナー］ページ［PC］', 'emanon-premium' ); ?></th>
						<td>
						<?php
							$emanon_archive_seminar_list_layout_pc = get_theme_mod( 'archive_seminar_list_layout_pc', '' );
							if ( ! empty( $emanon_archive_seminar_list_layout_pc ) ) {
								$emanon_archive_seminar_list_layout_pc = get_theme_mod( 'archive_seminar_list_layout_pc', '' );
							} else {
								$emanon_archive_seminar_list_layout_pc = 'pc-list';
							}
						?>
						<label class="radio-col">
						<input name="emanon_archive_seminar_list_layout_pc" type="radio" value="pc-list" <?php checked( 'pc-list', $emanon_archive_seminar_list_layout_pc ); ?>>
						<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/post-list-one-col.png' ; ?>" alt="<?php _e( '［リスト］1カラム', 'emanon-premium' ); ?>"><br>
						<span><?php _e( '［リスト］1カラム', 'emanon-premium' ); ?></span></label>
						<label class="radio-col">
						<input name="emanon_archive_seminar_list_layout_pc" type="radio" value="pc-card-2" <?php checked( 'pc-card-2', $emanon_archive_seminar_list_layout_pc ); ?>>
						<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/post-card-two-col.png' ; ?>" alt="<?php _e( '［カード］2カラム', 'emanon-premium' ); ?>"><br>
						<span><?php _e( '［カード］2カラム', 'emanon-premium' ); ?></span></label>
						<label class="radio-col">
						<input name="emanon_archive_seminar_list_layout_pc" type="radio" value="pc-card-3" <?php checked( 'pc-card-3', $emanon_archive_seminar_list_layout_pc ); ?>>
						<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/post-card-three-col.png' ; ?>" alt="<?php _e( '［カード］3カラム', 'emanon-premium' ); ?>"><br>
						<span><?php _e( '［カード］3カラム', 'emanon-premium' ); ?></span></label>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><?php _e( 'アーカイブ［セミナー］ページ［SP］', 'emanon-premium' ); ?></th>
						<td>
						<?php
							$emanon_archive_seminar_list_layout_sp = get_theme_mod( 'archive_seminar_list_layout_sp', '' );
							if ( ! empty( $emanon_archive_seminar_list_layout_sp ) ) {
								$emanon_archive_seminar_list_layout_sp = get_theme_mod( 'archive_seminar_list_layout_sp', '' );
							} else {
								$emanon_archive_seminar_list_layout_sp = 'sp-list';
							}
						?>
						<label class="radio-col">
						<input name="emanon_archive_seminar_list_layout_sp" type="radio" value="sp-list" <?php checked( 'sp-list', $emanon_archive_seminar_list_layout_sp ); ?>>
						<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/post-list-one-col.png' ; ?>" alt="<?php _e( '［リスト］1カラム', 'emanon-premium' ); ?>"><br>
						<span><?php _e( '［リスト］1カラム', 'emanon-premium' ); ?></span></label>
						<label class="radio-col">
						<input name="emanon_archive_seminar_list_layout_sp" type="radio" value="sp-card-1" <?php checked( 'sp-card-1', $emanon_archive_seminar_list_layout_sp ); ?>>
						<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/post-card-one-col.png' ; ?>" alt="<?php _e( '［カード］1カラム', 'emanon-premium' ); ?>"><br>
						<span><?php _e( '［カード］1カラム', 'emanon-premium' ); ?></span></label>
						<label class="radio-col">
						<input name="emanon_archive_seminar_list_layout_sp" type="radio" value="sp-card-2" <?php checked( 'sp-card-2', $emanon_archive_seminar_list_layout_sp ); ?>>
						<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/post-card-two-col.png' ; ?>" alt="<?php _e( '［カード］2カラム', 'emanon-premium' ); ?>"><br>
						<span><?php _e( '［カード］2カラム', 'emanon-premium' ); ?></span></label>
						</td>
					</tr>
					<?php endif; ?>

					<?php if ( get_theme_mod( 'add_request' ) ) : ?>
					<tr valign="top">
						<th scope="row"><?php _e( 'アーカイブ［資料請求］ページ［PC］', 'emanon-premium' ); ?></th>
						<td>
						<?php
							$emanon_archive_request_list_layout_pc = get_theme_mod( 'archive_request_list_layout_pc', '' );
							if ( ! empty( $emanon_archive_request_list_layout_pc ) ) {
								$emanon_archive_request_list_layout_pc = get_theme_mod( 'archive_request_list_layout_pc', '' );
							} else {
								$emanon_archive_request_list_layout_pc = 'pc-list';
							}
						?>
						<label class="radio-col">
						<input name="emanon_archive_request_list_layout_pc" type="radio" value="pc-list" <?php checked( 'pc-list', $emanon_archive_request_list_layout_pc ); ?>>
						<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/post-list-one-col.png' ; ?>" alt="<?php _e( '［リスト］1カラム', 'emanon-premium' ); ?>"><br>
						<span><?php _e( '［リスト］1カラム', 'emanon-premium' ); ?></span></label>
						<label class="radio-col">
						<input name="emanon_archive_request_list_layout_pc" type="radio" value="pc-card-2" <?php checked( 'pc-card-2', $emanon_archive_request_list_layout_pc ); ?>>
						<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/post-card-two-col.png' ; ?>" alt="<?php _e( '［カード］2カラム', 'emanon-premium' ); ?>"><br>
						<span><?php _e( '［カード］2カラム', 'emanon-premium' ); ?></span></label>
						<label class="radio-col">
						<input name="emanon_archive_request_list_layout_pc" type="radio" value="pc-card-3" <?php checked( 'pc-card-3', $emanon_archive_request_list_layout_pc ); ?>>
						<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/post-card-three-col.png' ; ?>" alt="<?php _e( '［カード］3カラム', 'emanon-premium' ); ?>"><br>
						<span><?php _e( '［カード］3カラム', 'emanon-premium' ); ?></span></label>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><?php _e( 'アーカイブ［資料請求］ページ［SP］', 'emanon-premium' ); ?></th>
						<td>
						<?php
							$emanon_archive_request_list_layout_sp = get_theme_mod( 'archive_request_list_layout_sp', '' );
							if ( ! empty( $emanon_archive_request_list_layout_sp ) ) {
								$emanon_archive_request_list_layout_sp = get_theme_mod( 'archive_request_list_layout_sp', '' );
							} else {
								$emanon_archive_request_list_layout_sp = 'sp-list';
							}
						?>
						<label class="radio-col">
						<input name="emanon_archive_request_list_layout_sp" type="radio" value="sp-list" <?php checked( 'sp-list', $emanon_archive_request_list_layout_sp ); ?>>
						<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/post-list-one-col.png' ; ?>" alt="<?php _e( '［リスト］1カラム', 'emanon-premium' ); ?>"><br>
						<span><?php _e( '［リスト］1カラム', 'emanon-premium' ); ?></span></label>
						<label class="radio-col">
						<input name="emanon_archive_request_list_layout_sp" type="radio" value="sp-card-1" <?php checked( 'sp-card-1', $emanon_archive_request_list_layout_sp ); ?>>
						<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/post-card-one-col.png' ; ?>" alt="<?php _e( '［カード］1カラム', 'emanon-premium' ); ?>"><br>
						<span><?php _e( '［カード］1カラム', 'emanon-premium' ); ?></span></label>
						<label class="radio-col">
						<input name="emanon_archive_request_list_layout_sp" type="radio" value="sp-card-2" <?php checked( 'sp-card-2', $emanon_archive_request_list_layout_sp ); ?>>
						<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/post-card-two-col.png' ; ?>" alt="<?php _e( '［カード］2カラム', 'emanon-premium' ); ?>"><br>
						<span><?php _e( '［カード］2カラム', 'emanon-premium' ); ?></span></label>
						</td>
					</tr>
					<?php endif; ?>

					<tr valign="top">
						<th scope="row"><?php _e( '検索結果ページ［PC］', 'emanon-premium' ); ?></th>
						<td>
						<?php
							$emanon_search_page_list_layout_pc = get_theme_mod( 'search_page_list_layout_pc', '' );
							if ( ! empty( $emanon_search_page_list_layout_pc ) ) {
								$emanon_search_page_list_layout_pc = get_theme_mod( 'search_page_list_layout_pc', '' );
							} else {
								$emanon_search_page_list_layout_pc = 'pc-list';
							}
						?>
						<label class="radio-col">
						<input name="emanon_search_page_list_layout_pc" type="radio" value="pc-list" <?php checked( 'pc-list', $emanon_search_page_list_layout_pc ); ?>>
						<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/post-list-one-col.png' ; ?>" alt="<?php _e( '［リスト］1カラム', 'emanon-premium' ); ?>"><br>
						<span><?php _e( '［リスト］1カラム', 'emanon-premium' ); ?></span></label>
						<label class="radio-col">
						<input name="emanon_search_page_list_layout_pc" type="radio" value="pc-card-2" <?php checked( 'pc-card-2', $emanon_search_page_list_layout_pc ); ?>>
						<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/post-card-two-col.png' ; ?>" alt="<?php _e( '［カード］2カラム', 'emanon-premium' ); ?>"><br>
						<span><?php _e( '［カード］2カラム', 'emanon-premium' ); ?></span></label>
						<label class="radio-col">
						<input name="emanon_search_page_list_layout_pc" type="radio" value="pc-card-3" <?php checked( 'pc-card-3', $emanon_search_page_list_layout_pc ); ?>>
						<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/post-card-three-col.png' ; ?>" alt="<?php _e( '［カード］3カラム', 'emanon-premium' ); ?>"><br>
						<span><?php _e( '［カード］3カラム', 'emanon-premium' ); ?></span></label>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><?php _e( '検索結果ページ［SP］', 'emanon-premium' ); ?></th>
						<td>
						<?php
							$emanon_search_page_list_layout_sp = get_theme_mod( 'search_page_list_layout_sp', '' );
							if ( ! empty( $emanon_search_page_list_layout_sp ) ) {
								$emanon_search_page_list_layout_sp = get_theme_mod( 'search_page_list_layout_sp', '' );
							} else {
								$emanon_search_page_list_layout_sp = 'sp-list';
							}
						?>
						<label class="radio-col">
						<input name="emanon_search_page_list_layout_sp" type="radio" value="sp-list" <?php checked( 'sp-list', $emanon_search_page_list_layout_sp ); ?>>
						<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/post-list-one-col.png' ; ?>" alt="<?php _e( '［リスト］1カラム', 'emanon-premium' ); ?>"><br>
						<span><?php _e( '［リスト］1カラム', 'emanon-premium' ); ?></span></label>
						<label class="radio-col">
						<input name="emanon_search_page_list_layout_sp" type="radio" value="sp-card-1" <?php checked( 'sp-card-1', $emanon_search_page_list_layout_sp ); ?>>
						<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/post-card-one-col.png' ; ?>" alt="<?php _e( '［カード］1カラム', 'emanon-premium' ); ?>"><br>
						<span><?php _e( '［カード］1カラム', 'emanon-premium' ); ?></span></label>
						<label class="radio-col">
						<input name="emanon_search_page_list_layout_sp" type="radio" value="sp-card-2" <?php checked( 'sp-card-2', $emanon_search_page_list_layout_sp ); ?>>
						<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/post-card-two-col.png' ; ?>" alt="<?php _e( '［カード］2カラム', 'emanon-premium' ); ?>"><br>
						<span><?php _e( '［カード］2カラム', 'emanon-premium' ); ?></span></label>
						</td>
					</tr>
				</table>
			</div>
	</div>
	
	<div class="postbox metabox-holder">
		<h3 class="hndle"><?php _e( 'フッターレイアウト設定', 'emanon-premium' ); ?></h3>
			<div class="inside">
				<table class="form-table">
					<tr valign="top">
						<th scope="row"><?php _e( 'フッターウィジェット設定', 'emanon-premium' ); ?></th>
						<td>
						<?php
							$emanon_footer_widget_layout = get_theme_mod( 'footer_widget_layout', '' );
							if ( ! empty( $emanon_footer_widget_layout ) ) {
								$emanon_footer_widget_layout = get_theme_mod( 'footer_widget_layout', '' );
							} else {
								$emanon_footer_widget_layout = 'footer_three_col';
							}
						?>
						<label class="radio-col">
						<input name="emanon_footer_widget_layout" type="radio" value="footer_three_col" <?php checked( 'footer_three_col', $emanon_footer_widget_layout ); ?>>
						<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/footer-three-col.png' ; ?>" alt="<?php _e( '3カラム', 'emanon-premium' ); ?>"><br>
						<span><?php _e( '3カラム', 'emanon-premium' ); ?></span></label>
						<label class="radio-col">
						<input name="emanon_footer_widget_layout" type="radio" value="footer_four_col" <?php checked( 'footer_four_col', $emanon_footer_widget_layout ); ?>>
						<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/footer-four-col.png' ; ?>" alt="<?php _e( '4カラム', 'emanon-premium' ); ?>"><br>
						<span><?php _e( '4カラム', 'emanon-premium' ); ?></span></label>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><?php _e( 'クレジット表記', 'emanon-premium' ); ?></th>
						<td>
						<?php
							$emanon_footer_copyright = get_theme_mod( 'footer_copyright', '' );
							if ( ! empty( $emanon_footer_copyright ) ) {
								$emanon_footer_copyright = get_theme_mod( 'footer_copyright', '' );
							} else {
								$emanon_footer_copyright = 'current_year';
							}
						?>
						<label><?php _e( 'サイト公開年', 'emanon-premium' ); ?>: </label><input type="text" name="emanon_published_year" id="emanon_published_year" value="<?php echo get_theme_mod('published_year', '' ); ?>" style="width:38%;"><br/>
						<input name="emanon_footer_copyright" type="radio" value="current_year" <?php checked( 'current_year', $emanon_footer_copyright ); ?>><label><?php _e( '&copy 現在の年 サイト名', 'emanon-premium' ); ?></label><br/>
						<input name="emanon_footer_copyright" type="radio" value="published_year" <?php checked( 'published_year', $emanon_footer_copyright ); ?>><label><?php _e( '&copy 公開年 - 現在の年 サイト名' , 'emanon-premium' ); ?></label><br/>
						<input name="emanon_footer_copyright" type="radio" value="user_credit_notation" <?php checked( 'user_credit_notation', $emanon_footer_copyright ); ?>><label><?php _e( '自由設定', 'emanon-premium' ); ?></label><br/>
						<textarea name="emanon_footer_user_credit" id="emanon_footer_user_credit" rows="5" placeholder="<?php _e( 'HTMLタグの使用が可能です。', 'emanon-premium' ); ?>" style="width:50%;"><?php echo get_theme_mod('footer_user_credit', '' ); ?></textarea>
						</td>
					</tr>
				</table>
			</div>

	</div>

</div>
