<?php
/**
 * Theme dashboard google AdSense settings
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

// 設定情報を保存
$POST = stripslashes_deep($_POST);
if (isset($POST['update_options'])) {

	$names = array(
		'ad_label',
		'display_ad_h2_post',
		'display_ad_h2_dr_post_pc',
		'display_ad_h2_dr_post_sp',
		'display_ad_content_post',
		'display_ad_content_dr_post_pc',
		'display_ad_content_dr_post_sp',
		'display_ad_h2_page',
		'display_ad_h2_dr_page_pc',
		'display_ad_h2_dr_page_sp',
		'display_ad_content_page',
		'display_ad_content_dr_page_pc',
		'display_ad_content_dr_page_sp',
		'display_ad_matched_content',
		'display_ad_related_article',
		'display_ad_related_article_dr_pc',
		'display_ad_related_article_dr_sp',
		'ad_page_under_dr',
		'display_ad_sidebar_top',
		'display_ad_sidebar_top_pc',
		'display_ad_sidebar_top_sp',
		'display_ad_in_feed_front_page',
		'display_ad_in_feed_home',
		'display_ad_in_feed_archive',
		'ad_in_feed_position',
		'display_ad_code',
		'link_ad_code',
		'matched_content_ad_code',
		'ad_in_feed_code_pc',
		'ad_in_feed_code_sp',
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

//1ページに表示する最大投稿数
$max_post = get_option('posts_per_page');

?>

<div class="postbox metabox-holder">
	<h3 class="hndle"><?php _e( '広告ラベル設定', 'emanon-premium' ); ?></h3>
		<div class="inside">
			<table class="form-table">
				<tr valign="top">
					<th scope="row"><label for="emanon_ad_label"><?php _e( '広告ラベル', 'emanon-premium' ); ?></label></th>
					<td>
						<input type="text" name="emanon_ad_label" id="emanon_ad_label" value="<?php echo get_theme_mod( 'ad_label', __( 'スポンサーリンク', 'emanon-premium' )); ?>" style="width:30%;">
					</td>
				</tr>
			</table>
		</div>
</div>
<div class="postbox metabox-holder">
	<h3 class="hndle"><?php _e( '表示設定', 'emanon-premium' ); ?></h3>
		<div class="inside">
			<table class="form-table">
				<tr valign="top">
					<th scope="row"><?php _e( '投稿ページ［h2上］', 'emanon-premium' ); ?></th>
					<td>
							<?php
								$emanon_display_ad_h2_post = get_theme_mod( 'display_ad_h2_post' );
								if ( ! empty( $emanon_display_ad_h2_post ) ) {
									$emanon_display_ad_h2_post = get_theme_mod( 'display_ad_h2_post' );
								} else {
									$emanon_display_ad_h2_post = 'not_set';
								}
							?>
							<select name="emanon_display_ad_h2_post">
								<option value="not_set" <?php selected( 'not_set', $emanon_display_ad_h2_post ); ?>><?php _e( '未設定', 'emanon-premium' ); ?></option>
								<option value="display_ad" <?php selected( 'display_ad', $emanon_display_ad_h2_post ); ?>><?php _e( 'ディスプレイ広告', 'emanon-premium' ); ?></option>
								<option value="link_ad" <?php selected( 'link_ad', $emanon_display_ad_h2_post ); ?>><?php _e( 'リンク広告', 'emanon-premium' ); ?></option>
							</select><br>
							<input type="checkbox" name="emanon_display_ad_h2_dr_post_pc" id="emanon_display_ad_h2_dr_post_pc" value="1" <?php echo (get_theme_mod('display_ad_h2_dr_post_pc', '') ? ' checked' : ''); ?>>
							<label for="emanon_display_ad_h2_dr_post_pc"><?php _e( 'ダブルレクタングル［PC］', 'emanon-premium' ); ?></label><br>
							<input type="checkbox" name="emanon_display_ad_h2_dr_post_sp" id="emanon_display_ad_h2_dr_post_sp" value="1" <?php echo (get_theme_mod('display_ad_h2_dr_post_sp', '') ? ' checked' : ''); ?>>
							<label for="emanon_display_ad_h2_dr_post_sp"><?php _e( 'ダブルレクタングル［SP］', 'emanon-premium' ); ?></label>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><?php _e( '投稿ページ［本文下部］', 'emanon-premium' ); ?></th>
					<td>
							<?php
								$emanon_display_ad_content_post = get_theme_mod( 'display_ad_content_post' );
								if ( ! empty( $emanon_display_ad_content_post ) ) {
									$emanon_display_ad_content_post = get_theme_mod( 'display_ad_content_post' );
								} else {
									$emanon_display_ad_content_post = 'not_set';
								}
							?>
							<select name="emanon_display_ad_content_post">
								<option value="not_set" <?php selected( 'not_set', $emanon_display_ad_content_post ); ?>><?php _e( '未設定', 'emanon-premium' ); ?></option>
								<option value="display_ad" <?php selected( 'display_ad', $emanon_display_ad_content_post ); ?>><?php _e( 'ディスプレイ広告', 'emanon-premium' ); ?></option>
								<option value="link_ad" <?php selected( 'link_ad', $emanon_display_ad_content_post ); ?>><?php _e( 'リンク広告', 'emanon-premium' ); ?></option>
							</select><br>
							<input type="checkbox" name="emanon_display_ad_content_dr_post_pc" id="emanon_display_ad_content_dr_post_pc" value="1" <?php echo (get_theme_mod('display_ad_content_dr_post_pc', '') ? ' checked' : ''); ?>>
							<label for="emanon_display_ad_content_dr_post_pc"><?php _e( 'ダブルレクタングル［PC］', 'emanon-premium' ); ?></label><br>
							<input type="checkbox" name="emanon_display_ad_content_dr_post_sp" id="emanon_display_ad_content_dr_post_sp" value="1" <?php echo (get_theme_mod('display_ad_content_dr_post_sp', '') ? ' checked' : ''); ?>>
							<label for="emanon_display_ad_content_dr_post_sp"><?php _e( 'ダブルレクタングル［SP］', 'emanon-premium' ); ?></label>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><?php _e( '固定ページ［h2上］', 'emanon-premium' ); ?></th>
					<td>
							<?php
								$emanon_display_ad_h2_page = get_theme_mod( 'display_ad_h2_page' );
								if ( ! empty( $emanon_display_ad_h2_post ) ) {
									$emanon_display_ad_h2_page = get_theme_mod( 'display_ad_h2_page' );
								} else {
									$emanon_display_ad_h2_page = 'not_set';
								}

								$emanon_display_ad_h2_dr_page_pc = get_theme_mod( 'display_ad_h2_dr_page_pc' );
							?>
							<select name="emanon_display_ad_h2_page">
								<option value="not_set" <?php selected( 'not_set', $emanon_display_ad_h2_page ); ?>><?php _e( '未設定', 'emanon-premium' ); ?></option>
								<option value="display_ad" <?php selected( 'display_ad', $emanon_display_ad_h2_page ); ?>><?php _e( 'ディスプレイ広告', 'emanon-premium' ); ?></option>
								<option value="link_ad" <?php selected( 'link_ad', $emanon_display_ad_h2_page ); ?>><?php _e( 'リンク広告', 'emanon-premium' ); ?></option>
							</select><br>
							<input type="checkbox" name="emanon_display_ad_h2_dr_page_pc" id="emanon_display_ad_h2_dr_page_pc" value="1" <?php echo (get_theme_mod('display_ad_h2_dr_page_pc', '') ? ' checked' : ''); ?>>
							<label for="emanon_display_ad_h2_dr_page_pc"><?php _e( 'ダブルレクタングル［PC］', 'emanon-premium' ); ?></label><br>
							<input type="checkbox" name="emanon_display_ad_h2_dr_page_sp" id="emanon_display_ad_h2_dr_page_sp" value="1" <?php echo (get_theme_mod('display_ad_h2_dr_page_sp', '') ? ' checked' : ''); ?>>
							<label for="emanon_display_ad_h2_dr_page_sp"><?php _e( 'ダブルレクタングル［SP］', 'emanon-premium' ); ?></label>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><?php _e( '固定ページ［本文下部］', 'emanon-premium' ); ?></th>
					<td>
							<?php
								$emanon_display_ad_content_page = get_theme_mod( 'display_ad_content_page' );
								if ( ! empty( $emanon_display_ad_content_page ) ) {
									$emanon_display_ad_content_page = get_theme_mod( 'display_ad_content_page' );
								} else {
									$emanon_display_ad_content_page = 'not_set';
								}
							?>
							<select name="emanon_display_ad_content_page">
								<option value="not_set" <?php selected( 'not_set', $emanon_display_ad_content_page ); ?>><?php _e( '未設定', 'emanon-premium' ); ?></option>
								<option value="display_ad" <?php selected( 'display_ad', $emanon_display_ad_content_page ); ?>><?php _e( 'ディスプレイ広告', 'emanon-premium' ); ?></option>
								<option value="link_ad" <?php selected( 'link_ad', $emanon_display_ad_content_page ); ?>><?php _e( 'リンク広告', 'emanon-premium' ); ?></option>
							</select><br>
							<input type="checkbox" name="emanon_display_ad_content_dr_page_pc" id="emanon_display_ad_content_dr_page_pc" value="1" <?php echo (get_theme_mod('display_ad_content_dr_page_pc', '') ? ' checked' : ''); ?>>
							<label for="emanon_display_ad_content_dr_page_pc"><?php _e( 'ダブルレクタングル［PC］', 'emanon-premium' ); ?></label><br>
							<input type="checkbox" name="emanon_display_ad_content_dr_page_sp" id="emanon_display_ad_content_dr_page_sp" value="1" <?php echo (get_theme_mod('display_ad_content_dr_page_sp', '') ? ' checked' : ''); ?>>
							<label for="emanon_display_ad_content_dr_page_sp"><?php _e( 'ダブルレクタングル［SP］', 'emanon-premium' ); ?></label>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><?php _e( '関連コンテンツ広告', 'emanon-premium' ); ?></th>
					<td>
							<input type="checkbox" name="emanon_display_ad_matched_content" id="emanon_display_ad_matched_content" value="1" <?php echo (get_theme_mod('display_ad_matched_content', '') ? ' checked' : ''); ?>>
							<label for="emanon_display_ad_matched_content"><?php _e( '有効', 'emanon-premium' ); ?></label>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><?php _e( '関連記事［下部］', 'emanon-premium' ); ?></th>
					<td>
							<?php
								$emanon_display_ad_related_article = get_theme_mod( 'display_ad_related_article' );
								if ( ! empty( $emanon_display_ad_related_article ) ) {
									$emanon_display_ad_related_article = get_theme_mod( 'display_ad_related_article' );
								} else {
									$emanon_display_ad_related_article = 'not_set';
								}
							?>
							<select name="emanon_display_ad_related_article">
								<option value="not_set" <?php selected( 'not_set', $emanon_display_ad_related_article ); ?>><?php _e( '未設定', 'emanon-premium' ); ?></option>
								<option value="display_ad" <?php selected( 'display_ad', $emanon_display_ad_related_article ); ?>><?php _e( 'ディスプレイ広告', 'emanon-premium' ); ?></option>
								<option value="link_ad" <?php selected( 'link_ad', $emanon_display_ad_related_article ); ?>><?php _e( 'リンク広告', 'emanon-premium' ); ?></option>
							</select><br>
							<input type="checkbox" name="emanon_display_ad_related_article_dr_pc" id="emanon_display_ad_related_article_dr_pc" value="1" <?php echo (get_theme_mod('display_ad_related_article_dr_pc', '') ? ' checked' : ''); ?>>
							<label for="emanon_display_ad_related_article_dr_pc"><?php _e( 'ダブルレクタングル［PC］', 'emanon-premium' ); ?></label><br>
							<input type="checkbox" name="emanon_display_ad_related_article_dr_sp" id="emanon_display_ad_related_article_dr_sp" value="1" <?php echo (get_theme_mod('display_ad_related_article_dr_sp', '') ? ' checked' : ''); ?>>
							<label for="emanon_display_ad_related_article_dr_sp"><?php _e( 'ダブルレクタングル［SP］', 'emanon-premium' ); ?></label>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><?php _e( 'サイドバー［上部］', 'emanon-premium' ); ?></th>
					<td>
						<?php
							$emanon_display_ad_sidebar_top = get_theme_mod( 'display_ad_sidebar_top' );
							if ( ! empty( $emanon_display_ad_sidebar_top ) ) {
								$emanon_display_ad_sidebar_top = get_theme_mod( 'display_ad_sidebar_top' );
							} else {
								$emanon_display_ad_sidebar_top = 'not_set';
							}
						?>
						<select name="emanon_display_ad_sidebar_top">
							<option value="not_set" <?php selected( 'not_set', $emanon_display_ad_sidebar_top ); ?>><?php _e( '未設定', 'emanon-premium' ); ?></option>
							<option value="display_ad" <?php selected( 'display_ad', $emanon_display_ad_sidebar_top ); ?>><?php _e( 'ディスプレイ広告', 'emanon-premium' ); ?></option>
							<option value="link_ad" <?php selected( 'link_ad', $emanon_display_ad_sidebar_top ); ?>><?php _e( 'リンク広告', 'emanon-premium' ); ?></option>
						</select><br>
							<input type="checkbox" name="emanon_display_ad_sidebar_top_pc" id="emanon_display_ad_sidebar_top_pc" value="1" <?php echo (get_theme_mod('display_ad_sidebar_top_pc', '') ? ' checked' : ''); ?>>
							<label for="emanon_display_ad_sidebar_top_pc"><?php _e( '有効［PC］', 'emanon-premium' ); ?></label><br>
							<input type="checkbox" name="emanon_display_ad_sidebar_top_sp" id="emanon_display_ad_sidebar_top_sp" value="1" <?php echo (get_theme_mod('display_ad_sidebar_top_sp', '') ? ' checked' : ''); ?>>
							<label for="emanon_display_ad_sidebar_top_sp"><?php _e( '有効［SP］', 'emanon-premium' ); ?></label>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><?php _e( 'インフィード広告［フロントページ］', 'emanon-premium' ); ?></th>
					<td>
							<input type="checkbox" name="emanon_display_ad_in_feed_front_page" id="emanon_display_ad_in_feed_front_page" value="1" <?php echo (get_theme_mod('display_ad_in_feed_front_page', '') ? ' checked' : ''); ?>>
							<label for="emanon_display_ad_in_feed_front_page"><?php _e( '有効', 'emanon-premium' ); ?></label>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><?php _e( 'インフィード広告［ブログページ］', 'emanon-premium' ); ?></th>
					<td>
							<input type="checkbox" name="emanon_display_ad_in_feed_home" id="emanon_display_ad_in_feed_home" value="1" <?php echo (get_theme_mod('display_ad_in_feed_home', '') ? ' checked' : ''); ?>>
							<label for="emanon_display_ad_in_feed_home"><?php _e( '有効', 'emanon-premium' ); ?></label>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><?php _e( 'インフィード広告［アーカイブページ］', 'emanon-premium' ); ?></th>
					<td>
							<input type="checkbox" name="emanon_display_ad_in_feed_archive" id="emanon_display_ad_in_feed_archive" value="1" <?php echo (get_theme_mod('display_ad_in_feed_archive', '') ? ' checked' : ''); ?>>
							<label for="emanon_display_ad_in_feed_archive"><?php _e( '有効', 'emanon-premium' ); ?></label>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><label for="emanon_ad_in_feed_position"><?php _e( 'インフィード広告の表示位置', 'emanon-premium' ); ?></label></th>
					<td>
						<input type="number" min="1" max="<?php echo $max_post; ?>" name="emanon_ad_in_feed_position" id="emanon_ad_in_feed_position" value="<?php echo get_theme_mod( 'ad_in_feed_position', '3' ); ?>" style="width:15%;"><br><small><?php _e( '最大値', 'emanon-premium' ); ?> <?php echo $max_post; ?></small>
					</td>
				</tr>
			</table>
		</div>
</div>

<div class="postbox metabox-holder">
	<h3 class="hndle"><?php _e( '広告ユニットコード', 'emanon-premium' ); ?></h3>
		<div class="inside">
			<table class="form-table">
				<tr valign="top">
					<th scope="row"><label for="emanon_display_ad_code"><?php echo __( 'ディスプレイ広告コード', 'emanon-premium' ); ?></label><br>
					<?php echo __( 'ショートコード', 'emanon-premium' ); ?> <input type="text" onfocus="this.select();" readonly="readonly" value="[display_ad]" style="width:35%;"></th>
					<td>
						<textarea name="emanon_display_ad_code" id="emanon_display_ad_code" rows="12" style="width:60%;"><?php echo get_theme_mod('display_ad_code', ''); ?></textarea>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><label for="emanon_link_ad_code"><?php echo __( 'リンク広告コード', 'emanon-premium' ); ?></label><br>
					<?php echo __( 'ショートコード', 'emanon-premium' ); ?> <input type="text" onfocus="this.select();" readonly="readonly" value="[link_ad]" style="width:35%;"></th>
					<td>
						<textarea name="emanon_link_ad_code" id="emanon_link_ad_code" rows="12" style="width:60%;"><?php echo get_theme_mod('link_ad_code', ''); ?></textarea>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><label for="emanon_matched_content_ad_code"><?php echo __( '関連コンテンツ広告コード', 'emanon-premium' ); ?></label></th>
					<td>
						<textarea name="emanon_matched_content_ad_code" id="emanon_matched_content_ad_code" rows="12" style="width:60%;"><?php echo get_theme_mod('matched_content_ad_code', ''); ?></textarea>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><label for="emanon_ad_in_feed_code_pc"><?php echo __( 'インフィード広告コード［PC］', 'emanon-premium' ); ?></label></th>
					<td>
						<textarea name="emanon_ad_in_feed_code_pc" id="emanon_ad_in_feed_code_pc" rows="12" style="width:60%;"><?php echo get_theme_mod('ad_in_feed_code_pc', ''); ?></textarea>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><label for="emanon_ad_in_feed_code_sp"><?php echo __( 'インフィード広告コード［SP］', 'emanon-premium' ); ?></label></th>
					<td>
						<textarea name="emanon_ad_in_feed_code_sp" id="emanon_ad_in_feed_code_sp" rows="12" style="width:60%;"><?php echo get_theme_mod('ad_in_feed_code_sp', ''); ?></textarea>
					</td>
				</tr>
			</table>
		</div>
</div>