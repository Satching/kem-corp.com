<?php
/**
 * AD Settings
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

?>

<div class="wrap">
	<h2><?php _e( 'Google AdSense設定', 'emanon-premium' ); ?></h2>
	<?php if ( isset( $_POST['update_options'] ) ):?>
		<div id="setting-error-settings_updated" class="updated settings-error notice is-dismissible">
			<p><strong><?php _e( '設定を保存しました。', 'emanon-premium' ); ?></strong></p>
		</div>
	<?php endif;?>
	<form method="post" id="emanon_save_options">
		<?php require_once ( T_DIRE . '/inc/dashboard-menu/ad-setting/ad-panel.php' );?>
		<input type="submit" name="update_options" id="emanon_save_option" class="button button-primary" value="<?php _e( '保存', 'emanon-premium' ); ?>" />
	</form>
</div>
