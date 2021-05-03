<?php
/**
 * Cash Clear Settings
 *
 * @since 1.0.0
 * @package Emanon Premium
*/

?>

<div class="wrap">
<h2><?php _e( 'リセット', 'emanon-premium' ); ?></h2>

<div class="postbox metabox-holder">
	<h3 class="hndle"><?php _e( 'キャッシュ削除', 'emanon-premium' ); ?></h3>
		<div class="inside">
			<table class="form-table">
				<tr valign="top">
					<th scope="row"><?php _e( 'ファーストビュー', 'emanon-premium' ); ?></th>
					<td>
						<form action="<?php echo admin_url('admin-post.php'); ?>" method="post">
						<input type="hidden" name="action" value="emanon_delete_transients_first_view">
						<input type="submit" class="button delete" value="キャッシュを削除する" onclick="msgdsp_cash()">
						</form><br>
						<small class="notes"><?php echo _e( 'ファーストビューのキャッシュデータを削除します。', 'emanon-premium' ); ?><br><span class="red">※</span><?php echo _e( '外観＞カスタマイズで設定したデータは削除されません。', 'emanon-premium' ); ?></small>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><?php _e( 'レイアウト', 'emanon-premium' ); ?></th>
					<td>
						<form action="<?php echo admin_url('admin-post.php'); ?>" method="post">
						<input type="hidden" name="action" value="emanon_delete_transients_layout">
						<input type="submit" class="button delete" value="キャッシュを削除する" onclick="msgdsp_cash()">
						</form><br>
						<small class="notes"><?php echo _e( 'ヘッダー・フッターのキャッシュデータを削除します。', 'emanon-premium' ); ?></small>
					</td>
				</tr>
			</table>
		</div>
</div>

<div class="postbox metabox-holder">
	<h3 class="hndle"><?php _e( '初期化', 'emanon-premium' ); ?></h3>
		<div class="inside">
			<table class="form-table">
				<tr valign="top">
					<th scope="row"><?php _e( '［E］人気記事', 'emanon-premium' ); ?></th>
					<td>
						<form action="<?php echo admin_url('admin-post.php'); ?>" method="post">
						<input type="hidden" name="action" value="emanon_delete_post_views">
						<input type="submit" class="button delete" value="リセットする" onclick="msgdsp_reset()">
						</form><br>
						<small class="notes"><?php echo _e( '閲覧数をリセットし初期化します。', 'emanon-premium' ); ?><br><span class="red">※</span><?php echo _e( 'リセット後の復元はできません。', 'emanon-premium' ); ?></small>
					</td>
				</tr>
			</table>
		</div>
</div>

<script >
function msgdsp_cash() {
alert("キャッシュを削除しました。");
}
function msgdsp_reset() {
alert("リセットしました。");
}
</script>