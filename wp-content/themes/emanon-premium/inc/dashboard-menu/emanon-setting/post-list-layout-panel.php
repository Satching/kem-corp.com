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
		'front_page_article_style',
		'home_title',
		'home_sub_title',
		'home_message',
		'home_header_style',
		'home_header_height_pc',
		'home_header_height_sp',
		'home_heade_image_pc',
		'home_heade_image_sp',
		'category_header_style',
		'category_header_height_pc',
		'category_header_height_sp',
		'display_featured_image',
		'featured_no_image_1200_675',
		'featured_no_image_800_450',
		'featured_no_image_600_338',
		'featured_no_image_320_200',
		'featured_no_image_160_160',
		'display_category_post_list_pc',
		'display_category_post_list_sp',
		'display_entry_date_post_list_pc',
		'display_entry_date_post_list_sp',
		'display_entry_date_post_list_style',
		'display_author_post_list_pc',
		'display_author_post_list_sp',
		'display_author_avatar_post_list_pc',
		'display_author_avatar_post_list_sp',
		'display_author_avatar_post_list_substitute_pc',
		'display_author_avatar_post_list_substitute_sp',
		'author_avatar_substitute_text',
		'reverse_placement_author_post_list',
		'exclude_author_user_id',
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

	for( $c = 1; $c < 7; $c++ ) {
		// Tabe title
		if (isset($POST['emanon_tab_title_'.$c])) {
			set_theme_mod('tab_title_'.$c, $POST['emanon_tab_title_'.$c]);
		} else {
			remove_theme_mod('tab_title_'.$c);
		}

		// Tabe style
		if (isset($POST['emanon_tab_style_'.$c]) && ! empty($POST['emanon_tab_style_'.$c])) {
			set_theme_mod('tab_style_'.$c, $POST['emanon_tab_style_'.$c]);
		} else {
			remove_theme_mod('tab_style_'.$c);
		}

		// Tabe category ID
		if (isset($POST['emanon_tab_cat_id_'.$c]) && ! empty($POST['emanon_tab_cat_id_'.$c])) {
			set_theme_mod('tab_cat_id_'.$c, $POST['emanon_tab_cat_id_'.$c]);
		} else {
			remove_theme_mod('tab_cat_id_'.$c);
		}

	}

}

?>

<div id="panel4" class="tab-panel">

	<div class="postbox metabox-holder">
		<h3 class="hndle"><?php _e( 'フロントページ設定', 'emanon-premium' ); ?><span class="tab-panel_description"><?php _e( '設定＞表示設定［ホームページの表示］で「ホームページ」に指定した固定ページの設定', 'emanon-premium' ); ?></span></h3>
			<div class="inside">
				<table class="form-table">
					<tr valign="top">
						<th scope="row"><?php _e( 'レイアウト', 'emanon-premium' ); ?></th>
						<td>
						<?php
							$emanon_front_page_article_style = get_theme_mod( 'front_page_article_style', '' );
							if ( ! empty( $emanon_front_page_article_style ) ) {
								$emanon_front_page_article_style = get_theme_mod( 'front_page_article_style', '' );
							} else {
								$emanon_front_page_article_style = 'latest_article';
							}
						?>
						<input type="radio" name="emanon_front_page_article_style" value="latest_article" <?php checked( 'latest_article', $emanon_front_page_article_style ); ?>><label><?php _e( '最新の記事一覧', 'emanon-premium' ); ?></label><br/>
						<input type="radio" name="emanon_front_page_article_style" value="tab" <?php checked( 'tab', $emanon_front_page_article_style ); ?>><label><?php _e( 'タブ', 'emanon-premium' ); ?></label>
						</td>
					</tr>
					</tr>
					<?php for( $c = 1; $c < 7; $c++ ) { ?>
					<tr valign="top">
						<th scope="row"><?php _e( 'タブ', 'emanon-premium' ); ?>【<?php echo ( $c ); ?>】</th>
						<td>
						<?php
							$emanon_tab_style = get_theme_mod( 'tab_style_'.$c, '' );
							if ( ! empty( $emanon_tab_style ) ) {
								$emanon_tab_style = get_theme_mod( 'tab_style_'.$c, '' );
							} else {
								$emanon_tab_style = 'category';
							}
						?>
						<label><?php _e( 'タブ名', 'emanon-premium' ); ?></label><input type="text" name="emanon_tab_title_<?php echo ( $c ); ?>" id="emanon_tab_title_<?php echo ( $c ); ?>" value="<?php echo get_theme_mod( 'tab_title_'.$c, '' ); ?>" style="width:15%;"><br/>
						<input type="radio" name="emanon_tab_style_<?php echo ( $c ); ?>" value="category" <?php checked( 'category', $emanon_tab_style ); ?>><label><?php _e( 'カテゴリー指定', 'emanon-premium' ); ?></label><br/>
						<label><?php _e( 'カテゴリーID', 'emanon-premium' ); ?></label><input type="text" name="emanon_tab_cat_id_<?php echo ( $c ); ?>" id="emanon_tab_cat_id_<?php echo ( $c ); ?>" value="<?php echo get_theme_mod( 'tab_cat_id_'.$c, '' ); ?>" style="width:10%;"><br/>
						<input type="radio" name="emanon_tab_style_<?php echo ( $c ); ?>" value="featured" <?php checked( 'featured', $emanon_tab_style ); ?>><label><?php _e( 'おすすめ記事', 'emanon-premium' ); ?></label><br/>
						</td>
					</tr>
					<?php } ?>
				</table>
			</div>
	</div>

<div class="postbox metabox-holder">
	<h3 class="hndle"><?php _e( 'ブログページ設定', 'emanon-premium' ); ?><span class="tab-panel_description"><?php _e( '設定＞表示設定［ホームページの表示］で「投稿ページ」に指定した固定ページの設定', 'emanon-premium' ); ?></span></h3>
		<div class="inside">
			<table class="form-table">
				<tr valign="top">
					<th scope="row"><label><?php _e( 'タイトル', 'emanon-premium' ); ?></label></th>
					<td>
					<input type="text" name="emanon_home_title" id="emanon_home_title" value="<?php echo get_theme_mod( 'home_title', '' ); ?>" style="width:30%;">
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><label><?php _e( 'サブタイトル', 'emanon-premium' ); ?></label></th>
					<td>
					<input type="text" name="emanon_home_sub_title" id="emanon_home_sub_title" value="<?php echo get_theme_mod( 'home_sub_title', '' ); ?>" style="width:30%;">
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><label><?php _e( 'リード文', 'emanon-premium' ); ?></label></th>
					<td>
					<textarea name="emanon_home_message" id="emanon_home_message" rows="5" style="width:45%;"><?php echo get_theme_mod( 'home_message', '' ); ?></textarea><br/>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><?php _e( 'ヘッダーレイアウト', 'emanon-premium' ); ?></th>
					<td>
					<?php
						$emanon_home_header_style = get_theme_mod( 'home_header_style', '' );
						if ( ! empty( $emanon_home_header_style ) ) {
							$emanon_home_header_style = get_theme_mod( 'home_header_style', '' );
						} else {
							$emanon_home_header_style = 'home_header_standard';
						}
					?>
						<label class="radio-col">
							<input type="radio" name="emanon_home_header_style" value="home_header_standard" <?php checked( 'home_header_standard', $emanon_home_header_style ); ?>>
							<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/standard-title.png' ; ?>" alt="<?php _e( '標準', 'emanon-premium' ); ?>" ><br>
							<span><?php _e( '標準', 'emanon-premium' ); ?></span>
						</label>
						<label class="radio-col">
							<input type="radio" name="emanon_home_header_style" value="home_header_center" <?php checked( 'home_header_center', $emanon_home_header_style ); ?>>
							<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/center-title.png' ; ?>" alt="<?php _e( '中央', 'emanon-premium' ); ?>" ><br>
							<span><?php _e( '中央', 'emanon-premium' ); ?></span>
						</label>
						<label class="radio-col">
							<input type="radio" name="emanon_home_header_style" value="home_header_full_width" <?php checked( 'home_header_full_width', $emanon_home_header_style ); ?>>
							<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/full-width-image.png' ; ?>" alt="<?php _e( '全幅', 'emanon-premium' ); ?>" ><br>
							<span><?php _e( '全幅', 'emanon-premium' ); ?></span>
						</label>
						<label class="radio-col">
							<input type="radio" name="emanon_home_header_style" value="home_header_full_width_overlay" <?php checked( 'home_header_full_width_overlay', $emanon_home_header_style ); ?>>
							<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/full-width-image-overlay.png' ; ?>" alt="<?php _e( '全幅［オーバーレイ］', 'emanon-premium' ); ?>" ><br>
							<span><?php _e( '全幅［オーバーレイ］', 'emanon-premium' ); ?></span>
						</label>
						<h4 class="radio-col-title"><?php _e( 'ヘッダー画像の高さ', 'emanon-premium' ); ?></h4>
						<small class="notes"><span class="red">※</span><?php echo _e( '全幅の高さ・全幅［オーバーレイ］の高さに適用されます。', 'emanon-premium' ); ?></small><br/>
					<label><?php _e( '高さ［PC］', 'emanon-premium' ); ?>: </label><input type="number" name="emanon_home_header_height_pc" id="emanon_home_header_height_pc" value="<?php echo get_theme_mod( 'home_header_height_pc', '500' ); ?>" style="width:15%;"><br>
					<label><?php _e( '高さ［SP］', 'emanon-premium' ); ?>: </label><input type="number" name="emanon_home_header_height_sp" id="emanon_home_header_height_sp" value="<?php echo get_theme_mod( 'home_header_height_sp', '500' ); ?>" style="width:15%;">
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><label><?php _e( 'ヘッダー画像［PC］', 'emanon-premium' ); ?></label></th>
					<td>
					<?php
						emanon_custom_media_uploader( 'emanon_home_heade_image_pc', get_theme_mod('home_heade_image_pc', ''), 'emanon_home_heade_image_pc' );
					?>
					<small class="notes"><span class="red">※</span><?php echo _e( '推奨画像サイズ：1200px * 675px', 'emanon-premium' ); ?></small>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><label><?php _e( 'ヘッダー画像［SP］', 'emanon-premium' ); ?></label></th>
					<td>
					<?php
						emanon_custom_media_uploader( 'emanon_home_heade_image_sp', get_theme_mod('home_heade_image_sp', ''), 'emanon_home_heade_image_sp' );
					?>
					<small class="notes"><span class="red">※</span><?php echo _e( '推奨画像サイズ：600px * 338px', 'emanon-premium' ); ?></small>
					</td>
				</tr>
			</table>
		</div>
</div>

<div class="postbox metabox-holder">
	<h3 class="hndle"><?php _e( 'カテゴリー一覧設定', 'emanon-premium' ); ?><span class="tab-panel_description"><?php _e( '投稿＞［カテゴリー］で作成したカテゴリーページの設定', 'emanon-premium' ); ?></span></h3>
		<div class="inside">
			<table class="form-table">
				<tr valign="top">
					<th scope="row"><?php _e( 'ヘッダーレイアウト', 'emanon-premium' ); ?></th>
					<td>
					<?php
						$emanon_category_header_style = get_theme_mod( 'category_header_style', '' );
						if ( ! empty( $emanon_category_header_style ) ) {
							$emanon_category_header_style = get_theme_mod( 'category_header_style', '' );
						} else {
							$emanon_category_header_style = 'archive_header_standard';
						}
					?>
						<label class="radio-col">
							<input type="radio" name="emanon_category_header_style" value="archive_header_standard" <?php checked( 'archive_header_standard', $emanon_category_header_style ); ?>>
							<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/standard-title.png' ; ?>" alt="<?php _e( '標準', 'emanon-premium' ); ?>" ><br>
							<span><?php _e( '標準', 'emanon-premium' ); ?></span>
						</label>
						<label class="radio-col">
							<input type="radio" name="emanon_category_header_style" value="archive_header_center" <?php checked( 'archive_header_center', $emanon_category_header_style ); ?>>
							<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/center-title.png' ; ?>" alt="<?php _e( '中央', 'emanon-premium' ); ?>" ><br>
							<span><?php _e( '中央', 'emanon-premium' ); ?></span>
						</label>
						<label class="radio-col">
							<input type="radio" name="emanon_category_header_style" value="archive_header_full_width" <?php checked( 'archive_header_full_width', $emanon_category_header_style ); ?>>
							<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/full-width-image.png' ; ?>" alt="<?php _e( '全幅', 'emanon-premium' ); ?>" ><br>
							<span><?php _e( '全幅', 'emanon-premium' ); ?></span>
						</label>
						<label class="radio-col">
							<input type="radio" name="emanon_category_header_style" value="archive_header_full_width_overlay" <?php checked( 'archive_header_full_width_overlay', $emanon_category_header_style ); ?>>
							<img src="<?php echo T_DIRE_URI . '/assets/images/dashboard-page/full-width-image-overlay.png' ; ?>" alt="<?php _e( '全幅［オーバーレイ］', 'emanon-premium' ); ?>" ><br>
							<span><?php _e( '全幅［オーバーレイ］', 'emanon-premium' ); ?></span>
						</label>
						<h4 class="radio-col-title"><?php _e( 'ヘッダー画像の高さ', 'emanon-premium' ); ?></h4>
						<small class="notes"><span class="red">※</span><?php echo _e( '全幅の高さ・全幅［オーバーレイ］の高さに適用されます。', 'emanon-premium' ); ?></small><br/>
					<label><?php _e( '高さ［PC］', 'emanon-premium' ); ?>: </label><input type="number" name="emanon_category_header_height_pc" id="emanon_category_header_height_pc" value="<?php echo get_theme_mod( 'category_header_height_pc', '500' ); ?>" style="width:15%;"><br>
					<label><?php _e( '高さ［SP］', 'emanon-premium' ); ?>: </label><input type="number" name="emanon_category_header_height_sp" id="emanon_category_header_height_sp" value="<?php echo get_theme_mod( 'category_header_height_sp', '500' ); ?>" style="width:15%;">
					</td>
				</tr>
			</table>
		</div>
</div>

<div class="postbox metabox-holder">
	<h3 class="hndle"><?php _e( '投稿一覧 アイキャッチ画像設定', 'emanon-premium' ); ?><span class="tab-panel_description"><?php _e( 'アイキャッチ画像の表示設定・No imageの代替画像設定', 'emanon-premium' ); ?></span></h3>
		<div class="inside">
			<table class="form-table">
					<tr valign="top">
						<th scope="row"><label for="emanon_display_featured_image"><?php _e( 'アイキャッチ画像の表示', 'emanon-premium' ); ?></label></th>
						<td>
							<label for="emanon_display_featured_image">
								<span class="switch-button">
									<input type="checkbox" name="emanon_display_featured_image" id="emanon_display_featured_image" value="1" <?php echo ( get_theme_mod( 'display_featured_image', '') ? ' checked' : '' ); ?>>
									<span class="switch-slider"></span>
									<span class="switch-button__label">
									<?php _e( '有効', 'emanon-premium' ); ?>
									</span>
								</span>
							</label>
							<small class="notes"><span class="red">※</span><?php echo _e( '投稿一覧のアイキャッチ画像を非表示にしたい場合、無効にします。', 'emanon-premium' ); ?></small>
						</td>
					</tr>
				<tr valign="top">
					<th scope="row"><label><?php _e( 'No image 1200px 675px', 'emanon-premium' ); ?></label></th>
					<td>
					<?php
						emanon_custom_media_uploader( 'emanon_featured_no_image_1200_675', get_theme_mod('featured_no_image_1200_675', ''), 'emanon_featured_no_image_1200_675' );
					?>
					<small class="notes"><span class="red">※</span><?php echo _e( '推奨画像サイズ：1200px * 675px', 'emanon-premium' ); ?></small>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><label><?php _e( 'No image 800px 450px', 'emanon-premium' ); ?></label></th>
					<td>
					<?php
						emanon_custom_media_uploader( 'emanon_featured_no_image_800_450', get_theme_mod('featured_no_image_800_450', ''), 'emanon_featured_no_image_800_450' );
					?>
					<small class="notes"><span class="red">※</span><?php echo _e( '推奨画像サイズ：800px * 450px', 'emanon-premium' ); ?></small>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><label><?php _e( 'No image 600px 338px', 'emanon-premium' ); ?></label></th>
					<td>
					<?php
						emanon_custom_media_uploader( 'emanon_featured_no_image_600_338', get_theme_mod('featured_no_image_600_338', ''), 'emanon_featured_no_image_600_338' );
					?>
					<small class="notes"><span class="red">※</span><?php echo _e( '推奨画像サイズ：600px * 338px', 'emanon-premium' ); ?></small>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><label><?php _e( 'No image 320px 180px', 'emanon-premium' ); ?></label></th>
					<td>
					<?php
						emanon_custom_media_uploader( 'emanon_featured_no_image_320_200', get_theme_mod('featured_no_image_320_200', ''), 'emanon_featured_no_image_320_200' );
					?>
					<small class="notes"><span class="red">※</span><?php echo _e( '推奨画像サイズ：320px * 200px', 'emanon-premium' ); ?></small>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><label><?php _e( 'No image 160px 160px', 'emanon-premium' ); ?></label></th>
					<td>
					<?php
						emanon_custom_media_uploader( 'emanon_featured_no_image_160_160', get_theme_mod('featured_no_image_160_160', ''), 'emanon_featured_no_image_160_160' );
					?>
					<small class="notes"><span class="red">※</span><?php echo _e( '推奨画像サイズ：160px * 160px', 'emanon-premium' ); ?></small>
					</td>
				</tr>
			</table>
		</div>
</div>

<div class="postbox metabox-holder">
	<h3 class="hndle"><?php _e( '投稿一覧 タグ設定', 'emanon-premium' ); ?></h3>
		<div class="inside">
			<table class="form-table">
				<tr valign="top">
					<th scope="row"><?php _e( 'カテゴリー名の表示', 'emanon-premium' ); ?></th>
					<td>
						<label for="emanon_display_category_post_list_pc">
							<span class="switch-button">
								<input type="checkbox" name="emanon_display_category_post_list_pc" id="emanon_display_category_post_list_pc" value="1" <?php echo ( get_theme_mod( 'display_category_post_list_pc', '' ) ? ' checked' : '' ); ?>>
								<span class="switch-slider"></span>
								<span class="switch-button__label">
								<?php _e( '有効［PC］', 'emanon-premium' ); ?>
								</span>
							</span>
						</label>
						<br>
						<label for="emanon_display_category_post_list_sp">
							<span class="switch-button">
								<input type="checkbox" name="emanon_display_category_post_list_sp" id="emanon_display_category_post_list_sp" value="1" <?php echo ( get_theme_mod( 'display_category_post_list_sp', '' ) ? ' checked' : '' ); ?>>
								<span class="switch-slider"></span>
								<span class="switch-button__label">
								<?php _e( '有効［SP］', 'emanon-premium' ); ?>
								</span>
							</span>
						</label>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><?php _e( '日付の表示', 'emanon-premium' ); ?></th>
					<td>
						<label for="emanon_display_entry_date_post_list_pc">
							<span class="switch-button">
								<input type="checkbox" name="emanon_display_entry_date_post_list_pc" id="emanon_display_entry_date_post_list_pc" value="1" <?php echo ( get_theme_mod( 'display_entry_date_post_list_pc', '') ? ' checked' : '' ); ?>>
								<span class="switch-slider"></span>
								<span class="switch-button__label">
								<?php _e( '有効［PC］', 'emanon-premium' ); ?>
								</span>
							</span>
						</label>
						<br>
						<label for="emanon_display_entry_date_post_list_sp">
							<span class="switch-button">
								<input type="checkbox" name="emanon_display_entry_date_post_list_sp" id="emanon_display_entry_date_post_list_sp" value="1" <?php echo ( get_theme_mod( 'display_entry_date_post_list_sp', '') ? ' checked' : '' ); ?>>
								<span class="switch-slider"></span>
								<span class="switch-button__label">
								<?php _e( '有効［SP］', 'emanon-premium' ); ?>
								</span>
							</span>
						</label>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><?php _e( '日付スタイル', 'emanon-premium' ); ?></th>
					<td>
					<?php
						$emanon_display_entry_date_post_list_style = get_theme_mod( 'display_entry_date_post_list_style', '' );
						if ( ! empty( $emanon_display_entry_date_post_list_style ) ) {
							$emanon_display_entry_date_post_list_style = get_theme_mod( 'display_entry_date_post_list_style', '' );
						} else {
							$emanon_display_entry_date_post_list_style = 'entry_date';
						}
					?>
					<input type="radio" name="emanon_display_entry_date_post_list_style" value="entry_date" <?php checked( 'entry_date', $emanon_display_entry_date_post_list_style ); ?>><label><?php _e( '公開日', 'emanon-premium' ); ?></label><br/>
					<input type="radio" name="emanon_display_entry_date_post_list_style" value="modified_date" <?php checked( 'modified_date', $emanon_display_entry_date_post_list_style ); ?>><label><?php _e( '更新日', 'emanon-premium' ); ?></label><br/>
					<small class="notes"><span class="red">※</span><?php echo _e( '記事が更新されていない場合は、公開日が適用されます。', 'emanon-premium' ); ?></small>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><?php _e( '投稿者名の表示', 'emanon-premium' ); ?></th>
					<td>
						<label for="emanon_display_author_post_list_pc">
							<span class="switch-button">
								<input type="checkbox" name="emanon_display_author_post_list_pc" id="emanon_display_author_post_list_pc" value="1" <?php echo ( get_theme_mod( 'display_author_post_list_pc', '') ? ' checked' : '' ); ?>>
								<span class="switch-slider"></span>
								<span class="switch-button__label">
								<?php _e( '有効［PC］', 'emanon-premium' ); ?>
								</span>
							</span>
						</label>
						<br>
						<label for="emanon_display_author_post_list_sp">
							<span class="switch-button">
								<input type="checkbox" name="emanon_display_author_post_list_sp" id="emanon_display_author_post_list_sp" value="1" <?php echo ( get_theme_mod( 'display_author_post_list_sp', '') ? ' checked' : '' ); ?>>
								<span class="switch-slider"></span>
								<span class="switch-button__label">
								<?php _e( '有効［SP］', 'emanon-premium' ); ?>
								</span>
							</span>
						</label>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><?php _e( '投稿者［顔写真］の表示', 'emanon-premium' ); ?></th>
					<td>
						<label for="emanon_display_author_avatar_post_list_pc">
							<span class="switch-button">
								<input type="checkbox" name="emanon_display_author_avatar_post_list_pc" id="emanon_display_author_avatar_post_list_pc" value="1" <?php echo ( get_theme_mod( 'display_author_avatar_post_list_pc', '') ? ' checked' : '' ); ?>>
								<span class="switch-slider"></span>
								<span class="switch-button__label">
								<?php _e( '有効［PC］', 'emanon-premium' ); ?>
								</span>
							</span>
						</label>
						<br>
						<label for="emanon_display_author_avatar_post_list_sp">
							<span class="switch-button">
							<input type="checkbox" name="emanon_display_author_avatar_post_list_sp" id="emanon_display_author_avatar_post_list_sp" value="1" <?php echo ( get_theme_mod( 'display_author_avatar_post_list_sp', '') ? ' checked' : '' ); ?>>
								<span class="switch-slider"></span>
								<span class="switch-button__label">
								<?php _e( '有効［SP］', 'emanon-premium' ); ?>
								</span>
							</span>
						</label>
						<small class="notes"><span class="red">※</span><?php echo _e( '投稿者名の表示が有効の場合に適用されます。', 'emanon-premium' ); ?></small>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><?php _e( '投稿者［顔写真］代用テキストの表示', 'emanon-premium' ); ?></th>
					<td>
						<label for="emanon_display_author_avatar_post_list_substitute_pc">
							<span class="switch-button">
								<input type="checkbox" name="emanon_display_author_avatar_post_list_substitute_pc" id="emanon_display_author_avatar_post_list_substitute_pc" value="1" <?php echo ( get_theme_mod( 'display_author_avatar_post_list_substitute_pc', '') ? ' checked' : '' ); ?>>
								<span class="switch-slider"></span>
								<span class="switch-button__label">
								<?php _e( '有効［PC］', 'emanon-premium' ); ?>
								</span>
							</span>
						</label>
						<br>
						<label for="emanon_display_author_avatar_post_list_substitute_sp">
							<span class="switch-button">
							<input type="checkbox" name="emanon_display_author_avatar_post_list_substitute_sp" id="emanon_display_author_avatar_post_list_substitute_sp" value="1" <?php echo ( get_theme_mod( 'display_author_avatar_post_list_substitute_sp', '') ? ' checked' : '' ); ?>>
								<span class="switch-slider"></span>
								<span class="switch-button__label">
								<?php _e( '有効［SP］', 'emanon-premium' ); ?>
								</span>
							</span>
						</label>
						<small class="notes"><span class="red">※</span><?php echo _e( '投稿者名の表示が有効・投稿者［顔写真］の表示が無効の場合に適用されます。', 'emanon-premium' ); ?></small>
					</td>
				</tr>

				<tr valign="top">
					<th scope="row"><?php _e( '投稿者［顔写真］代用のテキスト', 'emanon-premium' ); ?></th>
					<td>
					<input type="text" name="emanon_author_avatar_substitute_text" id="emanon_author_avatar_substitute_text" value="<?php echo get_theme_mod( 'author_avatar_substitute_text', 'by' ); ?>" tyle="width:15%;"><br>
					<small class="notes"><span class="red">※</span><?php echo _e( '投稿者［顔写真］代用テキストの表示が有効の場合に適用されます。', 'emanon-premium' ); ?></small>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><?php _e( '投稿者名の表示位置', 'emanon-premium' ); ?></th>
					<td>
						<label for="emanon_reverse_placement_author_post_list">
							<span class="switch-button">
							<input type="checkbox" name="emanon_reverse_placement_author_post_list" id="emanon_reverse_placement_author_post_list" value="1" <?php echo ( get_theme_mod( 'reverse_placement_author_post_list', '') ? ' checked' : '' ); ?>>
								<span class="switch-slider"></span>
								<span class="switch-button__label">
								<?php _e( '左配置', 'emanon-premium' ); ?>
								</span>
							</span>
						</label>
						<small class="notes"><span class="red">※</span><?php echo _e( '日付の表示位置が右配置になります。', 'emanon-premium' ); ?></small>
					</td>
				</tr>
			</table>
		</div>
</div>

<div class="postbox metabox-holder">
	<h3 class="hndle"><?php _e( '投稿者一覧設定', 'emanon-premium' ); ?><span class="tab-panel_description"><?php _e( '固定ページ編集画面のページ属性＞［テンプレート］で「投稿一覧 2列（3列）表示」を指定したページの設定', 'emanon-premium' ); ?></span></h3>
		<div class="inside">
			<table class="form-table">
				<tr valign="top">
					<th scope="row"><?php _e( '除外ユーザーID', 'emanon-premium' ); ?></th>
					<td>
					<input type="number" name="emanon_exclude_author_user_id" id="emanon_exclude_author_user_id" value="<?php echo get_theme_mod( 'exclude_author_user_id', '' ); ?>" style="width:15%;">
					<small class="notes"><span class="red">※</span><?php echo _e( '投稿者一覧から除外したいユーザーのIDを入力します。例）管理者を除外する場合、1 を入力', 'emanon-premium' ); ?></small>
					</td>
				</tr>
			</table>
		</div>
</div>

</div>