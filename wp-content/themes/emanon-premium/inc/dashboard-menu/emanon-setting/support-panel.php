<?php
/**
 * Theme dashboard Support panel
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

$site_name        = get_bloginfo('name');
$site_url         = site_url();
$theme_name       = wp_get_theme( get_template() );
$version          = $theme_name->get( 'Version' );
$author           = $theme_name->get( 'Author' );
$author_uri       = $theme_name->get( 'AuthorURI' );
$purchaser_id     = get_theme_mod( 'purchaser_id' );
$agent_id         = get_theme_mod( 'agent_id' );
$wp               = get_bloginfo( 'version' );
$php              = PHP_VERSION;

// 設定情報を保存
$POST = stripslashes_deep($_POST);
if ( isset($POST['update_options']) ) {

	$names = array(
		'purchaser_id',
		'agent_id',
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

<div id="panel15" class="tab-panel">

	<div class="postbox metabox-holder">
		<h3 class="hndle"><?php _e( 'ユーザー設定', 'emanon-premium' ); ?></h3>
			<div class="inside">
				<table class="form-table">
					<tr valign="top">
						<th scope="row"><label for="emanon_purchaser_id"><?php _e( '購入者ID', 'emanon-premium' ); ?></label></th>
						<td>
							<input type="text" name="emanon_purchaser_id" id="emanon_purchaser_id" value="<?php echo get_theme_mod('purchaser_id', '' ); ?>" style="width:20%;">
							<small class="notes"><span class="red">※</span><?php echo _e( 'テーマ購入者のIDです。購入者IDは、株式会社イノ・コードがユーザーごとに発行管理しています。', 'emanon-premium' ); ?></small>
						</td>
					</tr>
				</table>
				<table class="form-table">
					<tr valign="top">
						<th scope="row"><label for="emanon_agent_id"><?php _e( 'Emanon制作ライセンスID', 'emanon-premium' ); ?></label></th>
						<td>
							<input type="text" name="emanon_agent_id" id="emanon_agent_id" value="<?php echo get_theme_mod('agent_id', '' ); ?>" style="width:20%;">
							<small class="notes"><span class="red">※</span><?php echo _e( 'Webサイト制作代行者のライセンスIDです。Emanon制作ライセンスIDは、株式会社イノ・コードが発行管理しています。', 'emanon-premium' ); ?></small>
						</td>
					</tr>
				</table>
			</div>
	</div>

	<div class="postbox metabox-holder">
		<h3 class="hndle"><?php _e( '環境情報', 'emanon-premium' ); ?></h3>
			<div class="inside">
				<table class="form-table">
					<tr valign="top">
						<th scope="row"><?php _e( 'テーマ使用環境', 'emanon-premium' ); ?></th>
						<td>
						<pre class="emanon-theme-info"><?php
								$theme_info = '';
								$theme_info .= __( 'サイト名：', 'emanon-premium' ). ' ' .$site_name.PHP_EOL;
								$theme_info .= __( 'サイトURL：', 'emanon-premium' ). ' ' .$site_url.PHP_EOL;
								$theme_info .= __( 'テーマ名：', 'emanon-premium' ). ' ' .$theme_name. ' ' .$version.PHP_EOL;
								$theme_info .= __( 'テーマ開発・販売会社：', 'emanon-premium' ). ' ' .$author.PHP_EOL;
								$theme_info .= __( 'テーマ開発・販売会社URL：', 'emanon-premium' ). ' ' .$author_uri.PHP_EOL;
								$theme_info .= __( 'WordPress バージョン：', 'emanon-premium' ). ' ' .$wp.PHP_EOL;
								$theme_info .= __( 'PHP バージョン：', 'emanon-premium' ). ' ' .$php.PHP_EOL;
								if ( $purchaser_id ) {
									$theme_info .= __( '購入者ID：', 'emanon-premium' ). ' ' .$purchaser_id.PHP_EOL;
								}
								if ( $agent_id ) {
									$theme_info .= __( 'Emanon制作ライセンスID：', 'emanon-premium' ). ' ' .$agent_id.PHP_EOL;
								}
								echo $theme_info;
							?></pre>
						</td>
					</tr>
					<tr valign="top">
						<th scope="row"><?php _e( '有効化プラグイン', 'emanon-premium' ); ?></th>
						<td>
						<pre class="emanon-theme-info"><?php
								$plugin_list = '';
								//plugin.phpを読み込む
								include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
								$plugins = get_plugins();
								if ( ! empty( $plugins ) ) {
									foreach ( $plugins as $path => $plugin ) {
									if ( is_plugin_active( $path ) ) {
										$plugin_list .= $plugin['Name'];
										$plugin_list .= ' '.$plugin['Version'].PHP_EOL;
									}
								}
								echo $plugin_list;
								}
							?>
						</pre>
						</td>
					</tr>
				</table>
			</div>
	</div>

	<div class="postbox metabox-holder">
		<h3 class="hndle"><?php _e( 'サポート', 'emanon-premium' ); ?></h3>
			<div class="inside">
				<table class="form-table">
					<tr valign="top">
						<th scope="row"><label for="emanon_purchaser_id"><?php _e( '無料サポート', 'emanon-premium' ); ?></label></th>
						<td>
							<p><?php echo _e( 'Emanon Premium固有の設定機能に関する質問を受け付けております。', 'emanon-premium' ); ?></p>
							<p><?php echo _e( '無料サポートの利用は、購入者IDが必要です。トラブルの場合は、環境情報をお知らせください。', 'emanon-premium' ); ?></p>
							<div class="support-button">
								<a class="button button-primary" href="https://wp-emanon.jp/#wpcf7-f915-o1" target="_blank" rel="nofollow"><?php echo _e( 'お問合せ［サポート］', 'emanon-premium' ); ?></a>
							</div>
						</td>
					</tr>
				</table>
				<table class="form-table">
					<tr valign="top">
						<th scope="row"><label for="emanon_agent_id"><?php _e( '有料・前金サポート', 'emanon-premium' ); ?></label></th>
						<td>
							<p><?php echo _e( 'Emanon Premiumのカスタマイズや設定代行などのお見積もり依頼を受けております。', 'emanon-premium' ); ?></p>
							<p><?php echo _e( 'ご依頼に関する決済方法は、銀行振り込み・前金のみです。', 'emanon-premium' ); ?></p>
							<div class="support-button">
								<a class="button button-primary" href="https://wp-emanon.jp/#wpcf7-f915-o1" target="_blank" rel="nofollow"><?php echo _e( 'お問合せ［サポート］', 'emanon-premium' ); ?></a>
							</div>
						</td>
					</tr>
				</table>
			</div>
	</div>

</div>