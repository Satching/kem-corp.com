<?php
/**
 * Theme dashboard header news panel
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

// 設定情報を保存
$POST = stripslashes_deep($_POST);
if ( isset($POST['update_options']) ) {

	$names = array(
		'display_header_news_pc',
		'display_header_news_sp',
		'display_header_news_front_page',
		'display_header_news_home',
		'display_header_news_post',
		'display_header_news_post_request',
		'display_header_news_page',
		'display_header_news_archive',
		'display_header_news_search',
		'display_header_news_404',
		'news_label',
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

	// Header news title
	for( $c = 1; $c < 7; $c++ ) {
		if (isset($POST['emanon_news_title_'.$c])) {
			set_theme_mod('news_title_'.$c, $POST['emanon_news_title_'.$c]);
		} else {
			remove_theme_mod('news_title_'.$c);
		}
	}

	// Header news URL
	for( $c = 1; $c < 7; $c++ ) {
		if (isset($POST['emanon_news_url_'.$c])) {
			set_theme_mod('news_url_'.$c, $POST['emanon_news_url_'.$c]);
		} else {
			remove_theme_mod('news_url_'.$c);
		}
	}

}
?>

<div id="panel10" class="tab-panel">

	<div class="postbox metabox-holder">
		<h3 class="hndle"><?php _e( 'ヘッダーニュース設定', 'emanon-premium' ); ?></h3>
			<div class="inside">
				<table class="form-table">
					<tr valign="top">
						<th scope="row"><?php _e( 'ヘッダーニュースの表示', 'emanon-premium' ); ?></th>
						<td>
							<label for="emanon_display_header_news_pc">
								<span class="switch-button">
									<input type="checkbox" name="emanon_display_header_news_pc" id="emanon_display_header_news_pc" value="1" <?php echo ( get_theme_mod( 'display_header_news_pc', '' ) ? ' checked' : '' ); ?>>
									<span class="switch-slider"></span>
									<span class="switch-button__label">
									<?php _e( '有効［PC］', 'emanon-premium' ); ?>
									</span>
								</span>
							</label>
							<br>
							<label for="emanon_display_header_news_sp">
								<span class="switch-button">
									<input type="checkbox" name="emanon_display_header_news_sp" id="emanon_display_header_news_sp" value="1" <?php echo ( get_theme_mod( 'display_header_news_sp', '' ) ? ' checked' : '' ); ?>>
									<span class="switch-slider"></span>
									<span class="switch-button__label">
									<?php _e( '有効［SP］', 'emanon-premium' ); ?>
									</span>
								</span>
							</label>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><?php _e( '表示位置', 'emanon-premium' ); ?></th>
						<td>
							<input type="checkbox" name="emanon_display_header_news_front_page" id="emanon_display_header_news_front_page" value="1" <?php echo ( get_theme_mod( 'display_header_news_front_page', '' ) ? ' checked' : '' ); ?>>
							<label for="emanon_display_header_news_front_page"><?php _e( 'フロントページ', 'emanon-premium' ); ?></label><br>
							<input type="checkbox" name="emanon_display_header_news_post" id="emanon_display_header_news_post" value="1" <?php echo ( get_theme_mod( 'display_header_news_post', '' ) ? ' checked' : '' ); ?>>
							<label for="emanon_display_header_news_post"><?php _e( '投稿ページ', 'emanon-premium' ); ?></label><br>
							<input type="checkbox" name="emanon_display_header_news_post_request" id="emanon_display_header_news_post_request" value="1" <?php echo ( get_theme_mod( 'display_header_news_post_request', '' ) ? ' checked' : '' ); ?>>
							<label for="emanon_display_header_news_post_request"><?php _e( '資料請求ページ', 'emanon-premium' ); ?></label><br>
							<input type="checkbox" name="emanon_display_header_news_page" id="emanon_display_header_news_page" value="1" <?php echo ( get_theme_mod( 'display_header_news_page', '' ) ? ' checked' : '' ); ?>>
							<label for="emanon_display_header_news_page"><?php _e( '固定ページ', 'emanon-premium' ); ?></label><br>
							<input type="checkbox" name="emanon_display_header_news_archive" id="emanon_display_header_news_archive" value="1" <?php echo ( get_theme_mod( 'display_header_news_archive', '' ) ? ' checked' : '' ); ?>>
							<label for="emanon_display_header_news_search"><?php _e( 'アーカイブページ', 'emanon-premium' ); ?></label><br>
							<input type="checkbox" name="emanon_display_header_news_search" id="emanon_display_header_news_search" value="1" <?php echo ( get_theme_mod( 'display_header_news_search', '' ) ? ' checked' : '' ); ?>>
							<label for="emanon_display_header_news_404"><?php _e( '検索結果ページ', 'emanon-premium' ); ?></label><br>
							<input type="checkbox" name="emanon_display_header_news_404" id="emanon_display_header_news_404" value="1" <?php echo ( get_theme_mod( 'display_header_news_404', '' ) ? ' checked' : '' ); ?>>
							<label for="emanon_display_header_news_404"><?php _e( '404ページ', 'emanon-premium' ); ?></label><br>
							<input type="checkbox" name="emanon_display_header_news_home" id="emanon_display_header_news_home" value="1" <?php echo ( get_theme_mod( 'display_header_news_home', '' ) ? ' checked' : '' ); ?>>
							<label for="emanon_display_header_news_home"><?php _e( 'ブログページ', 'emanon-premium' ); ?></label><br>
							<small class="notes"><span class="red">※</span><?php echo _e( 'ブログページ：設定＞表示設定［ホームページの表示］で「投稿ページ」に指定した固定ページ。', 'emanon-premium' ); ?></small>
						</td>
					</tr>

					<tr valign="top">
						<th scope="row"><label for="emanon_news_label"><?php _e( 'ニュースラベル', 'emanon-premium' ); ?></label></th>
						<td>
							<input type="text" name="emanon_news_label" id="emanon_news_label" value="<?php echo get_theme_mod('news_label', '' ); ?>" style="width:20%;">
						</td>
					</tr>
					<?php for( $c = 1; $c < 6; $c++ ) { ?>
					<tr valign="top">
						<th scope="row"><label for="emanon_news_title"><?php _e( 'タイトル', 'emanon-premium' ); ?>【<?php echo ( $c ); ?>】</label></th>
						<td>
							<input type="text" name="emanon_news_title_<?php echo ( $c ); ?>" id="emanon_news_title_<?php echo ( $c ); ?>" value="<?php echo get_theme_mod( 'news_title_'.$c, '' ); ?>" style="width:40%;">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="emanon_news_url"><?php _e( 'URL', 'emanon-premium' ); ?>【<?php echo ( $c ); ?>】</label></th>
						<td>
							<input type="text" name="emanon_news_url_<?php echo ( $c ); ?>" id="emanon_news_url_<?php echo ( $c ); ?>" value="<?php echo get_theme_mod( 'news_url_'.$c, '' ); ?>" style="width:40%;">
						</td>
					</tr>
					<?php } ?>
				</table>
			</div>
	</div>

</div>
