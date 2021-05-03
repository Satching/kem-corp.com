<?php
/**
 * Theme dashboard CTA singular panel
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

// 設定情報を保存
$POST = stripslashes_deep( $_POST );
if ( isset( $POST['update_options'] ) ) {

	$names = array(
		'display_cta_post',
		'display_cta_page',
		'display_cta_newsletter_post',
		'display_cta_newsletter_page',
		'display_cta_floating_frontpage',
		'hide_cta_floating_frontpage_pc',
		'hide_cta_floating_frontpage_sp',
		'display_cta_floating_home',
		'hide_cta_floating_home_pc',
		'hide_cta_floating_home_sp',
		'display_cta_floating_post',
		'hide_cta_floating_post_pc',
		'hide_cta_floating_post_sp',
		'display_cta_floating_page',
		'hide_cta_floating_page_pc',
		'hide_cta_floating_page_sp',
		'display_cta_floating_archive',
		'hide_cta_floating_archive_pc',
		'hide_cta_floating_archive_sp',
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

	// Get CTA list
	$list_cta  = array();
	$query_cta = new WP_Query(array(
		'post_type' => 'emanon-cta',
	));

	if ( $query_cta->have_posts()): while($query_cta->have_posts() ):
		$query_cta->next_post();
		$list_cta[] = $query_cta->post;
	endwhile; endif;

	// Get CTA[News Letter] list
	$list_cta_newsletter  = array();
	$query_cta_newsletter = new WP_Query(array(
		'post_type' => 'emanon-news-letter',
	));

	if ( $query_cta_newsletter->have_posts()): while($query_cta_newsletter->have_posts() ):
		$query_cta_newsletter->next_post();
		$list_cta_newsletter[] = $query_cta_newsletter->post;
	endwhile; endif;

	// Get CTA[Floating] list
	$list_cta_floating  = array();
	$query_cta_floating = new WP_Query(array(
		'post_type' => 'emanon-floating',
	));

	if ( $query_cta_floating->have_posts()): while( $query_cta_floating->have_posts() ):
		$query_cta_floating->next_post();
		$list_cta_floating[] = $query_cta_floating->post;
	endwhile; endif;

?>

<div class="postbox metabox-holder">
	<h3 class="hndle"><?php _e( 'CTA［ページ］・［メルマガ］表示設定', 'emanon-premium' ); ?></h3>
		<div class="inside">
			<table class="form-table">
				<tr valign="top">
					<th scope="row"><?php _e( '投稿ページ：CTA', 'emanon-premium' ); ?></th>
					<td>
						<?php $cta_id = get_theme_mod( 'display_cta_post', '' ); ?>
						<select name="emanon_display_cta_post">
						<option value=""<?php echo ( ! $cta_id || $cta_id === true ? ' selected' : '' ); ?>><?php _e( '未設定', 'emanon-premium' ); ?></option>
						<?php foreach ( (array)$list_cta as $cta ): ?>
						<option value="<?php echo $cta->ID; ?>"<?php echo ( $cta_id == $cta->ID && $cta_id !== true ? ' selected' : '' ); ?>><?php echo $cta->post_title; ?></option>
						<?php endforeach; ?>
						</select>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><?php _e( '固定ページ：CTA', 'emanon-premium' ); ?></th>
					<td>
						<?php $cta_id = get_theme_mod( 'display_cta_page', '' ); ?>
						<select name="emanon_display_cta_page">
						<option value=""<?php echo ( ! $cta_id || $cta_id === true ? ' selected' : '' ); ?>><?php _e( '未設定', 'emanon-premium' ); ?></option>
						<?php foreach ( (array)$list_cta as $cta ): ?>
						<option value="<?php echo $cta->ID; ?>"<?php echo ( $cta_id == $cta->ID && $cta_id !== true ? ' selected' : '' ); ?>><?php echo $cta->post_title; ?></option>
						<?php endforeach; ?>
						</select>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><?php _e( '投稿ページ：CTA［メルマガ］', 'emanon-premium' ); ?></th>
					<td>
						<?php $cta_id = get_theme_mod( 'display_cta_newsletter_post', '' ); ?>
						<select name="emanon_display_cta_newsletter_post">
						<option value=""<?php echo ( ! $cta_id || $cta_id === true ? ' selected' : '' ); ?>><?php _e( '未設定', 'emanon-premium' ); ?></option>
						<?php foreach ( (array)$list_cta_newsletter as $cta ): ?>
						<option value="<?php echo $cta->ID; ?>"<?php echo ( $cta_id == $cta->ID && $cta_id !== true ? ' selected' : '' ); ?>><?php echo $cta->post_title; ?></option>
						<?php endforeach; ?>
						</select>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><?php _e( '固定ページ：CTA［メルマガ］', 'emanon-premium' ); ?></th>
					<td>
						<?php $cta_id = get_theme_mod( 'display_cta_newsletter_page', '' ); ?>
						<select name="emanon_display_cta_newsletter_page">
						<option value=""<?php echo ( ! $cta_id || $cta_id === true ? ' selected' : '' ); ?>><?php _e( '未設定', 'emanon-premium' ); ?></option>
						<?php foreach ( (array)$list_cta_newsletter as $cta ): ?>
						<option value="<?php echo $cta->ID; ?>"<?php echo ( $cta_id == $cta->ID && $cta_id !== true ? ' selected' : '') ; ?>><?php echo $cta->post_title; ?></option>
						<?php endforeach; ?>
						</select>
					</td>
				</tr>
			</table>
		</div>
</div>

<div class="postbox metabox-holder">
	<h3 class="hndle"><?php _e( 'CTA［追従型］表示設定', 'emanon-premium' ); ?></h3>
		<div class="inside">
			<table class="form-table">
				<tr valign="top">
					<th scope="row"><?php _e( 'フロントページ', 'emanon-premium' ); ?></th>
					<td>
						<?php $cta_id = get_theme_mod( 'display_cta_floating_frontpage', '' ); ?>
						<select name="emanon_display_cta_floating_frontpage">
						<option value=""<?php echo ( ! $cta_id || $cta_id === true ? ' selected' : '' ); ?>><?php _e( '未設定', 'emanon-premium' ); ?></option>
						<?php foreach ( (array)$list_cta_floating as $cta ): ?>
						<option value="<?php echo $cta->ID; ?>"<?php echo ( $cta_id == $cta->ID && $cta_id !== true ? ' selected' : '' ); ?>><?php echo $cta->post_title; ?></option>
						<?php endforeach; ?>
						</select><br>
						<input type="checkbox" name="emanon_hide_cta_floating_frontpage_pc" id="emanon_hide_cta_floating_frontpage_pc" value="1" <?php echo ( get_theme_mod( 'hide_cta_floating_frontpage_pc', '' ) ? ' checked' : '' ); ?>>
						<label for="emanon_hide_cta_floating_frontpage_sp"><?php _e( '非表示［PC］', 'emanon-premium' ); ?></label><br>
						<input type="checkbox" name="emanon_hide_cta_floating_frontpage_sp" id="emanon_hide_cta_floating_frontpage_sp" value="1" <?php echo ( get_theme_mod( 'hide_cta_floating_frontpage_sp', '' ) ? ' checked' : '' ); ?>>
						<label for="emanon_hide_cta_floating_frontpage_sp"><?php _e( '非表示［SP］', 'emanon-premium' ); ?></label>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><?php _e( 'ブログページ', 'emanon-premium' ); ?></th>
					<td>
						<?php $cta_id = get_theme_mod( 'display_cta_floating_home', '' ); ?>
						<select name="emanon_display_cta_floating_home">
						<option value=""<?php echo ( ! $cta_id || $cta_id === true ? ' selected' : '' ); ?>><?php _e( '未設定', 'emanon-premium' ); ?></option>
						<?php foreach ( (array)$list_cta_floating as $cta ): ?>
						<option value="<?php echo $cta->ID; ?>"<?php echo ( $cta_id == $cta->ID && $cta_id !== true ? ' selected' : '' ); ?>><?php echo $cta->post_title; ?></option>
						<?php endforeach; ?>
						</select><br>
						<input type="checkbox" name="emanon_hide_cta_floating_home_pc" id="emanon_hide_cta_floating_home_pc" value="1" <?php echo ( get_theme_mod( 'hide_cta_floating_home_pc', '' ) ? ' checked' : '' ); ?>>
						<label for="emanon_hide_cta_floating_home_pc"><?php _e( '非表示［PC］', 'emanon-premium' ); ?></label><br>
						<input type="checkbox" name="emanon_hide_cta_floating_home_sp" id="emanon_hide_cta_floating_home_sp" value="1" <?php echo ( get_theme_mod( 'hide_cta_floating_home_sp', '' ) ? ' checked' : '' ); ?>>
						<label for="emanon_hide_cta_floating_home_sp"><?php _e( '非表示［SP］', 'emanon-premium' ); ?></label>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><?php _e( '投稿ページ', 'emanon-premium' ); ?></th>
					<td>
						<?php $cta_id = get_theme_mod( 'display_cta_floating_post', '' ); ?>
						<select name="emanon_display_cta_floating_post">
						<option value=""<?php echo ( ! $cta_id || $cta_id === true ? ' selected' : '' ); ?>><?php _e( '未設定', 'emanon-premium' ); ?></option>
						<?php foreach ( (array)$list_cta_floating as $cta ): ?>
						<option value="<?php echo $cta->ID; ?>"<?php echo ( $cta_id == $cta->ID && $cta_id !== true ? ' selected' : '' ); ?>><?php echo $cta->post_title; ?></option>
						<?php endforeach; ?>
						</select><br>
						<input type="checkbox" name="emanon_hide_cta_floating_post_pc" id="emanon_hide_cta_floating_post_pc" value="1" <?php echo ( get_theme_mod( 'hide_cta_floating_post_pc', '' ) ? ' checked' : '' ); ?>>
						<label for="emanon_hide_cta_floating_post_pc"><?php _e( '非表示［PC］', 'emanon-premium' ); ?></label><br>
						<input type="checkbox" name="emanon_hide_cta_floating_post_sp" id="emanon_hide_cta_floating_post_sp" value="1" <?php echo ( get_theme_mod( 'hide_cta_floating_post_sp', '' ) ? ' checked' : '' ); ?>>
						<label for="emanon_hide_cta_floating_post_sp"><?php _e( '非表示［SP］', 'emanon-premium' ); ?></label>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><?php _e( '固定ページ', 'emanon-premium' ); ?></th>
					<td>
						<?php $cta_id = get_theme_mod( 'display_cta_floating_page', '' ); ?>
						<select name="emanon_display_cta_floating_page">
						<option value=""<?php echo ( ! $cta_id || $cta_id === true ? ' selected' : '' ); ?>><?php _e( '未設定', 'emanon-premium' ); ?></option>
						<?php foreach ( (array)$list_cta_floating as $cta ): ?>
						<option value="<?php echo $cta->ID; ?>"<?php echo ( $cta_id == $cta->ID && $cta_id !== true ? ' selected' : '' ); ?>><?php echo $cta->post_title; ?></option>
						<?php endforeach; ?>
						</select><br>
						<input type="checkbox" name="emanon_hide_cta_floating_page_pc" id="emanon_hide_cta_floating_page_pc" value="1" <?php echo ( get_theme_mod( 'hide_cta_floating_page_pc', '' ) ? ' checked' : '' ); ?>>
						<label for="emanon_hide_cta_floating_page_pc"><?php _e( '非表示［PC］', 'emanon-premium' ); ?></label><br>
						<input type="checkbox" name="emanon_hide_cta_floating_page_sp" id="emanon_hide_cta_floating_page_sp" value="1" <?php echo ( get_theme_mod( 'hide_cta_floating_page_sp', '' ) ? ' checked' : '' ); ?>>
						<label for="emanon_hide_cta_floating_page_sp"><?php _e( '非表示［SP］', 'emanon-premium' ); ?></label>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><?php _e( 'アーカイブページ', 'emanon-premium' ); ?></th>
					<td>
						<?php $cta_id = get_theme_mod( 'display_cta_floating_archive', '' ); ?>
						<select name="emanon_display_cta_floating_archive">
						<option value=""<?php echo ( ! $cta_id || $cta_id === true ? ' selected' : '' ); ?>><?php _e( '未設定', 'emanon-premium' ); ?></option>
						<?php foreach ( (array)$list_cta_floating as $cta ): ?>
						<option value="<?php echo $cta->ID; ?>"<?php echo ( $cta_id == $cta->ID && $cta_id !== true ? ' selected' : '' ); ?>><?php echo $cta->post_title; ?></option>
						<?php endforeach; ?>
						</select><br>
						<input type="checkbox" name="emanon_hide_cta_floating_archive_pc" id="emanon_hide_cta_floating_archive_pc" value="1" <?php echo ( get_theme_mod( 'hide_cta_floating_archive_pc', '' ) ? ' checked' : '' ); ?>>
						<label for="emanon_hide_cta_floating_archive_pc"><?php _e( '非表示［PC］', 'emanon-premium' ); ?></label><br>
						<input type="checkbox" name="emanon_hide_cta_floating_archive_sp" id="emanon_hide_cta_floating_archive_sp" value="1" <?php echo ( get_theme_mod( 'hide_cta_floating_archive_sp', '' ) ? ' checked' : '' ); ?>>
						<label for="emanon_hide_cta_floating_archive_sp"><?php _e( '非表示［SP］', 'emanon-premium' ); ?></label>
					</td>
				</tr>
			</table>
		</div>
</div>