<?php
/**
 * Theme dashboard Adamin panel
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

// 設定情報を保存
$POST = stripslashes_deep($_POST);
if ( isset($POST['update_options']) ) {

	$names = array(
		'add_post_thumbnail',
		'add_modified_date',
		'add_title_number',
		'add_post_subtitle',
		'add_page_subtitle',
		'add_post_meta_description',
		'add_page_meta_description',
		'add_post_custom_css',
		'add_page_custom_css',
		'add_post_custom_javaScript',
		'add_page_custom_javaScript',
		'postbox_closed',
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

<div id="panel14" class="tab-panel">

	<div class="postbox metabox-holder">
		<h3 class="hndle"><?php _e( '投稿一覧設定', 'emanon-premium' ); ?></h3>
			<div class="inside">
				<table class="form-table">
					<tr valign="top">
						<th scope="row"><?php _e( '項目追加［アイキャッチ画像］', 'emanon-premium' ); ?></th>
						<td>
							<label for="emanon_add_post_thumbnail">
								<span class="switch-button">
									<input type="checkbox" name="emanon_add_post_thumbnail" id="emanon_add_post_thumbnail" value="1" <?php echo ( get_theme_mod( 'add_post_thumbnail', '' ) ? ' checked' :  '' ); ?>>
									<span class="switch-slider"></span>
									<span class="switch-button__label">
									<?php _e( '有効', 'emanon-premium' ); ?>
									</span>
								</span>
							</label>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><?php _e( '項目追加［更新日］', 'emanon-premium' ); ?></th>
						<td>
							<label for="emanon_add_modified_date">
								<span class="switch-button">
									<input type="checkbox" name="emanon_add_modified_date" id="emanon_add_modified_date" value="1" <?php echo ( get_theme_mod( 'add_modified_date', '' ) ? ' checked' :  '' ); ?>>
									<span class="switch-slider"></span>
									<span class="switch-button__label">
									<?php _e( '有効', 'emanon-premium' ); ?>
									</span>
								</span>
							</label>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><?php _e( '項目追加［タイトル文字数］', 'emanon-premium' ); ?></th>
						<td>
							<label for="emanon_add_title_number">
								<span class="switch-button">
									<input type="checkbox" name="emanon_add_title_number" id="emanon_add_title_number" value="1" <?php echo ( get_theme_mod( 'add_title_number', '' ) ? ' checked' :  '' ); ?>>
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
		<h3 class="hndle"><?php _e( 'サブタイトル設定', 'emanon-premium' ); ?></h3>
			<div class="inside">
				<table class="form-table">
					<tr valign="top">
						<th scope="row"><label for="emanon_add_post_subtitle"><?php _e( 'サブタイトルの追加［投稿ページ］', 'emanon-premium' ); ?></label></th>
						<td>
							<label for="emanon_add_post_subtitle">
								<span class="switch-button">
									<input type="checkbox" name="emanon_add_post_subtitle" id="emanon_add_post_subtitle" value="1" <?php echo ( get_theme_mod( 'add_post_subtitle', '' ) ? ' checked' :  '' ); ?>>
									<span class="switch-slider"></span>
									<span class="switch-button__label">
									<?php _e( '有効', 'emanon-premium' ); ?>
									</span>
								</span>
							</label>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="emanon_add_page_subtitle"><?php _e( 'サブタイトルの追加［固定ページ］', 'emanon-premium' ); ?></label></th>
						<td>
							<label for="emanon_add_page_subtitle">
								<span class="switch-button">
									<input type="checkbox" name="emanon_add_page_subtitle" id="emanon_add_page_subtitle" value="1" <?php echo ( get_theme_mod( 'add_page_subtitle', '' ) ? ' checked' :  '' ); ?>>
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
		<h3 class="hndle"><?php _e( 'meta description設定', 'emanon-premium' ); ?></h3>
			<div class="inside">
				<table class="form-table">
					<tr valign="top">
						<th scope="row"><label for="emanon_add_post_meta_description"><?php _e( 'meta descriptionの追加［投稿ページ］', 'emanon-premium' ); ?></label></th>
						<td>
							<label for="emanon_add_post_meta_description">
								<span class="switch-button">
									<input type="checkbox" name="emanon_add_post_meta_description" id="emanon_add_post_meta_description" value="1" <?php echo ( get_theme_mod( 'add_post_meta_description', '' ) ? ' checked' :  '' ); ?>>
									<span class="switch-slider"></span>
									<span class="switch-button__label">
									<?php _e( '有効', 'emanon-premium' ); ?>
									</span>
								</span>
							</label>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="emanon_add_page_meta_description"><?php _e( 'meta descriptionの追加［固定ページ］', 'emanon-premium' ); ?></label></th>
						<td>
							<label for="emanon_add_page_meta_description">
								<span class="switch-button">
									<input type="checkbox" name="emanon_add_page_meta_description" id="emanon_add_page_meta_description" value="1" <?php echo ( get_theme_mod( 'add_page_meta_description', '' ) ? ' checked' :  '' ); ?>>
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
		<h3 class="hndle"><?php _e( 'カスタムCSS設定', 'emanon-premium' ); ?></h3>
			<div class="inside">
				<table class="form-table">
					<tr valign="top">
						<th scope="row"><label for="emanon_add_post_custom_css"><?php _e( 'カスタムCSSの追加［投稿ページ］', 'emanon-premium' ); ?></label></th>
						<td>
							<label for="emanon_add_post_custom_css">
								<span class="switch-button">
									<input type="checkbox" name="emanon_add_post_custom_css" id="emanon_add_post_custom_css" value="1" <?php echo ( get_theme_mod( 'add_post_custom_css', '') ? ' checked' :  '' ); ?>>
									<span class="switch-slider"></span>
									<span class="switch-button__label">
									<?php _e( '有効', 'emanon-premium' ); ?>
									</span>
								</span>
							</label>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="emanon_add_page_custom_css"><?php _e( 'カスタムCSSの追加［固定ページ］', 'emanon-premium' ); ?></label></th>
						<td>
							<label for="emanon_add_page_custom_css">
								<span class="switch-button">
									<input type="checkbox" name="emanon_add_page_custom_css" id="emanon_add_page_custom_css" value="1" <?php echo ( get_theme_mod( 'add_page_custom_css', '') ? ' checked' :  '' ); ?>>
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
		<h3 class="hndle"><?php _e( 'カスタムJavaScript設定', 'emanon-premium' ); ?></h3>
			<div class="inside">
				<table class="form-table">
					<tr valign="top">
						<th scope="row"><label for="emanon_add_post_custom_javaScript"><?php _e( 'カスタムJavaScriptの追加［投稿ページ］', 'emanon-premium' ); ?></label></th>
						<td>
							<label for="emanon_add_post_custom_javaScript">
								<span class="switch-button">
									<input type="checkbox" name="emanon_add_post_custom_javaScript" id="emanon_add_post_custom_javaScript" value="1" <?php echo ( get_theme_mod( 'add_post_custom_javaScript', '') ? ' checked' :  '' ); ?>>
									<span class="switch-slider"></span>
									<span class="switch-button__label">
									<?php _e( '有効', 'emanon-premium' ); ?>
									</span>
								</span>
							</label>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="emanon_add_page_custom_javaScript"><?php _e( 'カスタムCSSの追加［固定ページ］', 'emanon-premium' ); ?></label></th>
						<td>
							<label for="emanon_add_page_custom_javaScript">
								<span class="switch-button">
									<input type="checkbox" name="emanon_add_page_custom_javaScript" id="emanon_add_page_custom_javaScript" value="1" <?php echo ( get_theme_mod( 'add_page_custom_javaScript', '') ? ' checked' :  '' ); ?>>
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
		<h3 class="hndle"><?php _e( 'カスタムフィールド設定', 'emanon-premium' ); ?></h3>
			<div class="inside">
				<table class="form-table">
					<tr valign="top">
						<th scope="row"><?php _e( 'カスタムフィールドを閉じる［初期設定］', 'emanon-premium' ); ?></th>
						<td>
							<label for="emanon_postbox_closed">
								<span class="switch-button">
									<input type="checkbox" name="emanon_postbox_closed" id="emanon_postbox_closed" value="1" <?php echo ( get_theme_mod( 'postbox_closed', '') ? ' checked' :  '' ); ?>>
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

</div>