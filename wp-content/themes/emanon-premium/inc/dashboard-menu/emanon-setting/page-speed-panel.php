<?php
/**
 * Theme dashboard page speed panel
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

// 設定情報を保存
$POST = stripslashes_deep($_POST);
if ( isset($POST['update_options']) ) {

	$names = array(
		'use_jquery_cdn',
		'enable_jquery_defer',
		'minified_js',
		'minified_css',
		'minified_html',
		'rel_prefetch',
		'cache_first_view',
		'cache_layout',
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

<div id="panel12" class="tab-panel">
	<div class="postbox metabox-holder">
		<h3 class="hndle"><?php _e( 'ページ表示速度設定', 'emanon-premium'  ); ?></h3>
			<div class="inside">
				<table class="form-table">
					<tr valign="top">
						<th scope="row"><?php _e( 'jQueryの最適化', 'emanon-premium'  ); ?></th>
						<td>
							<label for="emanon_use_jquery_cdn">
								<span class="switch-button">
									<input type="checkbox" name="emanon_use_jquery_cdn" id="emanon_use_jquery_cdn" value="1" <?php echo ( get_theme_mod( 'use_jquery_cdn', '' ) ? ' checked' : '' ); ?>>
									<span class="switch-slider"></span>
									<span class="switch-button__label">
									<?php _e( 'jQuery CDN［Google Api］', 'emanon-premium' ); ?>
									</span>
								</span>
							</label><br>
							<small class="notes"><span class="red">※</span><?php _e( 'WordPress本体のjQueryを停止し、Google CDNに切り替えます。', 'emanon-premium'  ); ?></small>
							<br>
							<label for="emanon_enable_jquery_defer">
								<span class="switch-button">
									<input type="checkbox" name="emanon_enable_jquery_defer" id="emanon_enable_jquery_defer" value="1" <?php echo ( get_theme_mod( 'enable_jquery_defer', '' ) ? ' checked' : '' ); ?>>
									<span class="switch-slider"></span>
									<span class="switch-button__label">
									<?php _e( 'jQuery 非同期読み込み', 'emanon-premium' ); ?>
									</span>
								</span>
							</label><br>
							<small class="notes"><span class="red">※</span><?php _e( 'defer属性を追加', 'emanon-premium'  ); ?></small><br>
							<label for="emanon_minified_js">
								<span class="switch-button">
									<input type="checkbox" name="emanon_minified_js" id="emanon_minified_js" value="1" <?php echo ( get_theme_mod( 'minified_js', '' ) ? ' checked' : '' ); ?>>
									<span class="switch-slider"></span>
									<span class="switch-button__label">
									<?php _e( 'jQuery(JavaScript)の圧縮', 'emanon-premium' ); ?>
									</span>
								</span>
							</label><br>
							<small class="notes"><span class="red">※</span><?php _e( 'テーマ指定のjQuery(JavaScript)を圧縮しファイルを統合します。', 'emanon-premium'  ); ?></small>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><?php _e( 'CSSの圧縮', 'emanon-premium'  ); ?></th>
						<td>
							<label for="emanon_minified_css">
								<span class="switch-button">
									<input type="checkbox" name="emanon_minified_css" id="emanon_minified_css" value="1" <?php echo ( get_theme_mod( 'minified_css', '' ) ? ' checked' : '' ); ?>>
									<span class="switch-slider"></span>
									<span class="switch-button__label">
									<?php _e( '有効', 'emanon-premium' ); ?>
									</span>
								</span>
							</label><br>
							<small class="notes"><span class="red">※</span><?php _e( 'テーマ指定のCSSを圧縮しファイルを統合', 'emanon-premium'  ); ?></small>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><?php _e( 'HTMLの圧縮', 'emanon-premium'  ); ?></th>
						<td>
							<label for="emanon_minified_html">
								<span class="switch-button">
									<input type="checkbox" name="emanon_minified_html" id="emanon_minified_html" value="1" <?php echo ( get_theme_mod( 'minified_html', '' ) ? ' checked' : '' ); ?>>
									<span class="switch-slider"></span>
									<span class="switch-button__label">
									<?php _e( '有効', 'emanon-premium'  ); ?>
									</span>
								</span>
							</label>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><?php _e( 'プリフェッチ', 'emanon-premium'  ); ?></th>
						<td>
							<label for="emanon_rel_prefetch">
								<span class="switch-button">
									<input type="checkbox" name="emanon_rel_prefetch" id="emanon_rel_prefetch" value="1" <?php echo ( get_theme_mod( 'rel_prefetch', '' ) ? ' checked' : '' ); ?>>
									<span class="switch-slider"></span>
									<span class="switch-button__label">
									<?php _e( '有効', 'emanon-premium' ); ?>
									</span>
								</span>
							</label><br>
							<small class="notes"><span class="red">※</span><?php _e( 'クリック・タップの直前にページを先読みする設定です。', 'emanon-premium'  ); ?></small>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><?php _e( 'キャッシュ［ファーストビュー］', 'emanon-premium'  ); ?></th>
						<td>
							<label for="emanon_cache_first_view">
								<span class="switch-button">
									<input type="checkbox" name="emanon_cache_first_view" id="emanon_cache_first_view" value="1" <?php echo ( get_theme_mod( 'cache_first_view', '' ) ? ' checked' : '' ); ?>>
									<span class="switch-slider"></span>
									<span class="switch-button__label">
									<?php _e( '有効', 'emanon-premium' ); ?>
									</span>
								</span>
							</label>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><?php _e( 'キャッシュ［レイアウト］', 'emanon-premium'  ); ?></th>
						<td>
							<label for="emanon_cache_layout">
								<span class="switch-button">
									<input type="checkbox" name="emanon_cache_layout" id="emanon_cache_layout" value="1" <?php echo ( get_theme_mod( 'cache_layout', '' ) ? ' checked' : '' ); ?>>
									<span class="switch-slider"></span>
									<span class="switch-button__label">
									<?php _e( '有効', 'emanon-premium' ); ?>
									</span>
								</span>
							</label><br>
							<small class="notes"><span class="red">※</span><?php _e( 'ヘッダー・フッターをキャッシュします。', 'emanon-premium'  ); ?></small>
						</td>
					</tr>
				</table>
			</div>
	</div>
</div>
