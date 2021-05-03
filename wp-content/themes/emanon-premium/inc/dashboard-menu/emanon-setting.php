<?php
/**
 * Emanon Options
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

?>

<div class="wrap">
	<h2><?php _e( 'Emanon設定', 'emanon-premium' ); ?></h2>
	<div class="about-text"><?php echo _e( 'Emanon Premium［エマノン プレミアム］は、ビジネスサイト専用のテーマです。Emanon設定と外観＞カスタマイズからレイアウト設定や配色設定、集客用CTAの設置、ランディングページ設置が可能です。', 'emanon-premium' ); ?></div><br>

	<?php if ( isset($_POST['update_options']) ):?>
		<div id="setting-error-settings_updated" class="updated settings-error notice is-dismissible">
			<p><strong><?php _e( '設定を保存しました。', 'emanon-premium' ); ?></strong></p>
		</div>
		<?php
			//キャッシュ削除［Emanon設定 保存・更新］
			delete_transient( 'header_pc' );
			delete_transient( 'header_sp' );
			delete_transient( 'footer_widget_pc' );
			delete_transient( 'footer_widget_sp' );
			delete_transient( 'footer_copyright' );
		?>
	<?php endif;?>

	<form method="post" id="emanon_save_options">

	<input type="submit" name="update_options" id="emanon_save_option" class="button button-primary" value="<?php _e( '保存', 'emanon-premium' ); ?>">
	<input type="hidden" name="action" value="delete_transients_emanon_setting">

		<div class="nav-tab-wrapper">

		<div class="tab-area">
			<label class="nav-tab nav-tab-active" for="tab1"><?php _e( 'タグ', 'emanon-premium' ); ?></label>
			<label class="nav-tab" for="tab2"><?php _e( 'OGP', 'emanon-premium' ); ?></label>
			<label class="nav-tab" for="tab3"><?php _e( 'レイアウト', 'emanon-premium' ); ?></label>
			<label class="nav-tab" for="tab4"><?php _e( '記事一覧', 'emanon-premium' ); ?></label>
			<label class="nav-tab" for="tab5"><?php _e( '投稿ページ・固定ページ', 'emanon-premium' ); ?></label>
			<label class="nav-tab" for="tab6"><?php _e( 'SNS', 'emanon-premium' ); ?></label>
			<label class="nav-tab" for="tab7"><?php _e( '多言語', 'emanon-premium' ); ?></label>
			<label class="nav-tab" for="tab8"><?php _e( '検索', 'emanon-premium' ); ?></label>
			<label class="nav-tab" for="tab9"><?php _e( 'CTA', 'emanon-premium' ); ?></label>
			<label class="nav-tab" for="tab10"><?php _e( 'ヘッダーニュース', 'emanon-premium' ); ?></label>
			<label class="nav-tab" for="tab11"><?php _e( 'パスワード保護', 'emanon-premium' ); ?></label>
			<label class="nav-tab" for="tab12"><?php _e( '表示速度', 'emanon-premium' ); ?></label>
			<label class="nav-tab" for="tab13"><?php _e( 'カスタム投稿', 'emanon-premium' ); ?></label>
			<label class="nav-tab" for="tab14"><?php _e( '管理画面', 'emanon-premium' ); ?></label>
			<label class="nav-tab" for="tab15"><?php _e( 'サポート', 'emanon-premium' ); ?></label>
		</div>

		<div class="panel-area">

			<!--tag setting-->
			<?php require_once ( T_DIRE . '/inc/dashboard-menu/emanon-setting/tag-panel.php' );?>

			<!--OGP setting-->
			<?php require_once ( T_DIRE . '/inc/dashboard-menu/emanon-setting/ogp-panel.php' );?>

			<!--Layout setting-->
			<?php require_once ( T_DIRE . '/inc/dashboard-menu/emanon-setting/layout-panel.php' );?>

			<!--Post list layout setting-->
			<?php require_once ( T_DIRE . '/inc/dashboard-menu/emanon-setting/post-list-layout-panel.php' );?>

			<!--Post and page setting-->
			<?php require_once ( T_DIRE . '/inc/dashboard-menu/emanon-setting/post-page-panel.php' );?>

			<!--SNS setting-->
			<?php require_once ( T_DIRE . '/inc/dashboard-menu/emanon-setting/sns-panel.php' );?>

			<!--Language setting-->
			<?php require_once ( T_DIRE . '/inc/dashboard-menu/emanon-setting/language-panel.php' );?>

			<!--Search setting-->
			<?php require_once ( T_DIRE . '/inc/dashboard-menu/emanon-setting/search-panel.php' );?>

			<!--Template CTA setting-->
			<?php require_once ( T_DIRE . '/inc/dashboard-menu/emanon-setting/template-cta-panel.php' );?>

			<!--Header news setting-->
			<?php require_once ( T_DIRE . '/inc/dashboard-menu/emanon-setting/header-news-panel.php' );?>

			<!--Password post setting-->
			<?php require_once ( T_DIRE . '/inc/dashboard-menu/emanon-setting/password-post-panel.php' );?>

			<!--Page speed setting-->
			<?php require_once ( T_DIRE . '/inc/dashboard-menu/emanon-setting/page-speed-panel.php' );?>

			<!--Custom post setting-->
			<?php require_once ( T_DIRE . '/inc/dashboard-menu/emanon-setting/custom-post-panel.php' );?>

			<!--Adamin setting-->
			<?php require_once ( T_DIRE . '/inc/dashboard-menu/emanon-setting/adamin-panel.php' );?>

			<!--Support setting-->
			<?php require_once ( T_DIRE . '/inc/dashboard-menu/emanon-setting/support-panel.php' );?>

		</div>

	</div>
	<div class="emanon-thankyou"><a href="https://wp-emanon.jp/" target="_blank" rel="nofollow">Emanon</a> is Produced by innocord,Inc</div>

	<input type="submit" name="update_options" id="emanon_save_option" class="button button-primary" value="<?php _e( '保存', 'emanon-premium' ); ?>">
	</form>

</div>
