<?php
/**
 * Theme dashboard language panel
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

// 設定情報を保存
$POST = stripslashes_deep($_POST);
if ( isset($POST['update_options']) ) {

	$names = array(
		'display_header_language_pc',
		'display_header_language_sp',
		'header_language_label',
		'display_header_language_label_sp',
		'site_language',
		'language_locale_6',
		'site_directory_6',
		'language_name_6',
		'language_url_6',
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

	// Language locale［1］〜［5］
	for( $c = 1; $c < 6; $c++ ) {
		if (isset($POST['emanon_language_locale_'.$c]) && ! empty($POST['emanon_language_locale_'.$c])) {
			set_theme_mod('language_locale_'.$c, $POST['emanon_language_locale_'.$c]);
		} else {
			remove_theme_mod('language_locale_'.$c);
		}
	}

	// Language name［1］〜［5］
	for( $c = 1; $c < 6; $c++ ) {
		if (isset($POST['emanon_language_name_'.$c])) {
			set_theme_mod('language_name_'.$c, $POST['emanon_language_name_'.$c]);
		} else {
			remove_theme_mod('language_name_'.$c);
		}
	}

	// Language directory［1］〜［5］
	for( $c = 1; $c < 6; $c++ ) {
		if (isset($POST['emanon_site_directory_'.$c])) {
			set_theme_mod('site_directory_'.$c, $POST['emanon_site_directory_'.$c]);
		} else {
			remove_theme_mod('site_directory_'.$c);
		}
	}

	// Language url［1］〜［5］
	for( $c = 1; $c < 6; $c++ ) {
		if (isset($POST['emanon_language_url_'.$c])) {
			set_theme_mod('language_url_'.$c, $POST['emanon_language_url_'.$c]);
		} else {
			remove_theme_mod('language_url_'.$c);
		}
	}

}
?>

<div id="panel7" class="tab-panel">

	<div class="postbox metabox-holder">
		<h3 class="hndle"><?php _e( '多言語設定', 'emanon-premium' ); ?></h3>
			<div class="inside">
				<table class="form-table">
					<tr valign="top">
						<th scope="row"><?php _e( '切り替えボタン［ヘッダー］の表示', 'emanon-premium' ); ?></th>
						<td>
							<label for="emanon_display_header_language_pc">
								<span class="switch-button">
									<input type="checkbox" name="emanon_display_header_language_pc" id="emanon_display_header_language_pc" value="1" <?php echo ( get_theme_mod( 'display_header_language_pc', '') ? ' checked' : '' ); ?>>
									<span class="switch-slider"></span>
									<span class="switch-button__label">
									<?php _e( '有効［PC］', 'emanon-premium' ); ?>
									</span>
								</span>
							</label>
							<br>
							<label for="emanon_display_header_language_sp">
								<span class="switch-button">
									<input type="checkbox" name="emanon_display_header_language_sp" id="emanon_display_header_language_sp" value="1" <?php echo ( get_theme_mod( 'display_header_language_sp', '') ? ' checked' : '' ); ?>>
									<span class="switch-slider"></span>
									<span class="switch-button__label">
									<?php _e( '有効［SP］', 'emanon-premium' ); ?>
									</span>
								</span>
							</label>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="emanon_header_language_label"><?php _e( '切り替えボタン［ラベル］', 'emanon-premium' ); ?></label></th>
						<td>
						<input type="text" name="emanon_header_language_label" id="emanon_header_language_label" value="<?php echo get_theme_mod('header_language_label', '' ); ?>" style="width:15%;"><br/>
							<label for="emanon_display_header_language_label_sp">
								<span class="switch-button">
									<input type="checkbox" name="emanon_display_header_language_label_sp" id="emanon_display_header_language_label_sp" value="1" <?php echo ( get_theme_mod( 'display_header_language_label_sp', '') ? ' checked' : '' ); ?>>
									<span class="switch-slider"></span>
									<span class="switch-button__label">
									<?php _e( '有効［SP］', 'emanon-premium' ); ?>
									</span>
								</span>
							</label>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><?php _e( 'サイト言語を選択', 'emanon-premium' ); ?></th>
						<td>
							<?php
								$emanon_site_language = get_theme_mod( 'site_language' );
								if ( ! empty( $emanon_site_language ) ) {
									$emanon_site_language = get_theme_mod( 'site_language' );
								} else {
									$emanon_site_language = 'not_set';
								}
							?>
							<select name="emanon_site_language">
								<option value="not_set" <?php selected( 'not_set', $emanon_site_language ); ?>><?php _e( '未設定', 'emanon-premium' ); ?></option>
								<option value="ja" <?php selected( 'ja', $emanon_site_language ); ?>><?php _e( '日本語', 'emanon-premium' ); ?></option>
								<option value="en" <?php selected( 'en', $emanon_site_language ); ?>><?php _e( 'English', 'emanon-premium' ); ?></option>
								<option value="zh-CN" <?php selected( 'zh-CN', $emanon_site_language ); ?>><?php _e( '简体中文', 'emanon-premium' ); ?></option>
								<option value="zh_HK" <?php selected( 'zh_HK', $emanon_site_language ); ?>><?php _e( '香港中文版', 'emanon-premium' ); ?></option>
								<option value="zh_TW" <?php selected( 'zh_TW', $emanon_site_language ); ?>><?php _e( '繁體中文', 'emanon-premium' ); ?></option>
								<option value="ko" <?php selected( 'ko', $emanon_site_language ); ?>><?php _e( '한국어', 'emanon-premium' ); ?></option>
								<option value="th" <?php selected( 'th', $emanon_site_language ); ?>><?php _e( 'ไทย', 'emanon-premium' ); ?></option>
								<option value="fr" <?php selected( 'fr', $emanon_site_language ); ?>><?php _e( 'Français', 'emanon-premium' ); ?></option>
								<option value="de" <?php selected( 'de', $emanon_site_language ); ?>><?php _e( 'Deutsch', 'emanon-premium' ); ?></option>
								<option value="ru" <?php selected( 'ru', $emanon_site_language ); ?>><?php _e( 'русский', 'emanon-premium' ); ?></option>
								<option value="th" <?php selected( 'es', $emanon_site_language ); ?>><?php _e( 'Español', 'emanon-premium' ); ?></option>
								<option value="th" <?php selected( 'pt', $emanon_site_language ); ?>><?php _e( 'Português', 'emanon-premium' ); ?></option>
							</select>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="emanon_site_language_url"><?php _e( 'サイトURL', 'emanon-premium' ); ?></label></th>
						<td>
							<input type="text" name="emanon_site_language_url" readonly="readonly" id="emanon_language_url" value="<?php echo home_url('/'); ?>" style="width:50%;">
						</td>
					</tr>
					<?php for( $c = 1; $c < 6; $c++ ) { ?>
					<tr valign="top">
						<th scope="row"><?php _e( '言語を選択', 'emanon-premium' ); ?>【<?php echo ( $c ); ?>】</th>
						<td>
							<?php
								$emanon_language_locale = get_theme_mod( 'language_locale_'.$c , '' );
								if ( ! empty( $emanon_language_locale ) ) {
									$emanon_language_locale = get_theme_mod( 'language_locale_'.$c , '' );
								} else {
									$emanon_language_locale = 'not_set';
								}
							?>
							<select name="emanon_language_locale_<?php echo ( $c ); ?>">
								<option value="not_set" <?php selected( 'not_set', $emanon_language_locale ); ?>><?php _e( '未設定', 'emanon-premium' ); ?></option>
								<option value="ja" <?php selected( 'ja', $emanon_language_locale ); ?>><?php _e( '日本語', 'emanon-premium' ); ?></option>
								<option value="en" <?php selected( 'en', $emanon_language_locale ); ?>><?php _e( 'English', 'emanon-premium' ); ?></option>
								<option value="zh-CN" <?php selected( 'zh-CN', $emanon_language_locale ); ?>><?php _e( '简体中文', 'emanon-premium' ); ?></option>
								<option value="zh_HK" <?php selected( 'zh_HK', $emanon_language_locale ); ?>><?php _e( '香港中文版', 'emanon-premium' ); ?></option>
								<option value="zh_TW" <?php selected( 'zh_TW', $emanon_language_locale ); ?>><?php _e( '繁體中文', 'emanon-premium' ); ?></option>
								<option value="ko" <?php selected( 'ko', $emanon_language_locale ); ?>><?php _e( '한국어', 'emanon-premium' ); ?></option>
								<option value="th" <?php selected( 'th', $emanon_language_locale ); ?>><?php _e( 'ไทย', 'emanon-premium' ); ?></option>
								<option value="fr" <?php selected( 'fr', $emanon_language_locale ); ?>><?php _e( 'Français', 'emanon-premium' ); ?></option>
								<option value="de" <?php selected( 'de', $emanon_language_locale ); ?>><?php _e( 'Deutsch', 'emanon-premium' ); ?></option>
								<option value="ru" <?php selected( 'ru', $emanon_language_locale ); ?>><?php _e( 'русский', 'emanon-premium' ); ?></option>
								<option value="th" <?php selected( 'es', $emanon_language_locale ); ?>><?php _e( 'Español', 'emanon-premium' ); ?></option>
								<option value="th" <?php selected( 'pt', $emanon_language_locale ); ?>><?php _e( 'Português', 'emanon-premium' ); ?></option>
							</select>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="emanon_language_name"><?php _e( '言語名', 'emanon-premium' ); ?>【<?php echo ( $c ); ?>】</label></th>
						<td>
							<input type="text" name="emanon_language_name_<?php echo ( $c ); ?>" id="emanon_language_name_<?php echo ( $c ); ?>" value="<?php echo get_theme_mod( 'language_name_'.$c , '' ); ?>" style="width:15%;">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="emanon_language_name"><?php _e( 'サイト階層', 'emanon-premium' ); ?>【<?php echo ( $c ); ?>】</label></th>
						<td>
						<?php
							$emanon_site_directory = get_theme_mod( 'site_directory_'.$c , ''  );
							if ( ! empty( $emanon_site_directory ) ) {
								$emanon_site_directory = get_theme_mod( 'site_directory_'.$c , ''  );
							} else {
								$emanon_site_directory = 'sub_directory';
							}
						?>
						<input name="emanon_site_directory_<?php echo ( $c ); ?>" type="radio" value="sub_directory" <?php checked( 'sub_directory', $emanon_site_directory ); ?>><label><?php _e( 'サブディレクトリー：例 https://wp-emanon.jp/en/', 'emanon-premium' ); ?></label><br/>
						<input name="emanon_site_directory_<?php echo ( $c ); ?>" type="radio" value="directory" <?php checked( 'directory', $emanon_site_directory ); ?>><label><?php _e( 'ルート：例 https://wp-emanon.jp/', 'emanon-premium' ); ?></label>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="emanon_language_url"><?php _e( '切替サイトURL', 'emanon-premium' ); ?>【<?php echo ( $c ); ?>】</label></th>
						<td>
							<?php
								$sub_directory = strtolower( $emanon_language_locale ); // ISO 639-1コードを半角に変換
								if ( 'sub_directory' === $emanon_site_directory && 'not_set' != $emanon_language_locale ) {
									$url = home_url( "/$sub_directory/" );
								} else if ( 'directory' === $emanon_site_directory && 'not_set' != $emanon_language_locale ) {
									$url = home_url( "/" );
									} else if ( 'not_set' === $emanon_language_locale ) {
									$url = '';
								}
							?>
							<input type="text" name="emanon_language_url_<?php echo ( $c ); ?>" readonly="readonly" id="emanon_language_url_<?php echo ( $c ); ?>" value="<?php echo ( $url ) ; ?>" style="width:50%;">
						</td>
					</tr>
					<?php } ?>
					<tr valign="top">
						<th scope="row"><label for="emanon_language_locale_6"><?php _e( '言語コード【6】', 'emanon-premium' ); ?></label></th>
						<td>
							<input type="text" name="emanon_language_locale_6" id="emanon_language_locale_6" value="<?php echo get_theme_mod( 'language_locale_6' , '' ); ?>" style="width:20%;"><br>
							<span><a href="https://ja.wikipedia.org/wiki/ISO_639-1%E3%82%B3%E3%83%BC%E3%83%89%E4%B8%80%E8%A6%A7" target="_blank" rel="noopener"><?php _e( 'ISO 639-1 言語コード', 'emanon-premium' ); ?></a></span>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="emanon_language_name_6"><?php _e( '言語名【6】', 'emanon-premium' ); ?></label></th>
						<td>
							<input type="text" name="emanon_language_name_6" id="emanon_language_name_6" value="<?php echo get_theme_mod( 'language_name_6' , '' ); ?>" style="width:15%;">
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="emanon_language_name"><?php _e( 'サイト階層【6】', 'emanon-premium' ); ?></label></th>
						<td>
						<?php
							$emanon_site_directory_6 = get_theme_mod( 'site_directory_6' , ''  );
							if ( ! empty( $emanon_site_directory_6 ) ) {
								$emanon_site_directory_6 = get_theme_mod( 'site_directory_6' , ''  );
							} else {
								$emanon_site_directory_6 = 'sub_directory';
							}
						?>
						<input name="emanon_site_directory_6" type="radio" value="sub_directory" <?php checked( 'sub_directory', $emanon_site_directory_6 ); ?>><label><?php _e( 'サブディレクトリー：例 https://wp-emanon.jp/en/', 'emanon-premium' ); ?></label><br/>
						<input name="emanon_site_directory_6" type="radio" value="directory" <?php checked( 'directory', $emanon_site_directory_6 ); ?>><label><?php _e( 'ルート：例 https://wp-emanon.jp/', 'emanon-premium' ); ?></label>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="emanon_language_url_6"><?php _e( '切替サイトURL【6】', 'emanon-premium' ); ?></label></th>
						<td>
							<?php
								$sub_directory_6 = strtolower( get_theme_mod( 'language_locale_6' ) ); // ISO 639-1コードを半角に変換
								if ( 'sub_directory' === $emanon_site_directory_6 && $sub_directory_6 ) {
									$url = home_url( "/$sub_directory_6/" );
								} else if ( $sub_directory_6 ) {
									$url = home_url( "/" );
								} else {
									$url = '';
								}
							?>
							<input type="text" name="emanon_language_url_6" readonly="readonly" id="emanon_language_url_6" value="<?php echo ( $url ); ?>" style="width:50%;">
						</td>
					</tr>
				</table>
			</div>
	</div>
</div>