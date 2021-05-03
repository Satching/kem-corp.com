<?php
/**
 * Theme taxonomy form
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

add_action( 'category_edit_form_fields', 'edit_term_fields' );
add_action( 'news-cat_edit_form_fields', 'edit_term_fields' );
add_action( 'seminar-cat_edit_form_fields', 'edit_term_fields' );
add_action( 'request-cat_edit_form_fields', 'edit_term_fields' );

function edit_term_fields( $tag ) {
	$primary_color        = emanon_primary_color() ;
	$cat_title            = get_term_meta( $tag->term_id, 'cat_title', true );
	$cat_subtitle         = get_term_meta( $tag->term_id, 'cat_subtitle', true );
	$cat_description      = get_term_meta( $tag->term_id, 'cat_description', true );
	$cat_meta_description = get_term_meta( $tag->term_id, 'cat_meta_description', true );
	$cat_text_color       = get_term_meta( $tag->term_id, 'cat_text_color', true );
	$cat_bg_color         = get_term_meta( $tag->term_id, 'cat_bg_color', true );
	$cat_image_pc         = get_term_meta( $tag->term_id, 'cat_image_pc', true );
	$cat_image_sp         = get_term_meta( $tag->term_id, 'cat_image_sp', true );
	$cat_page_id          = get_term_meta( $tag->term_id, 'cat_page_id', true );
?>

<tr class="form-field taxonomy-setting">
	<th scope="row"><label><?php _e( 'カテゴリーページ設定', 'emanon-premium' ) ?></label></th>
	<td>
		<p class="description"><?php _e( 'Emanon Premium専用の設定機能です。', 'emanon-premium' ) ?></p>
	</td>
</tr>

<tr class="form-field">
	<th scope="row"><label for="cat_title"><?php _e( 'タイトル', 'emanon-premium' ) ?></label></th>
	<td>
		<input type="text" name="emanon[cat_title]" id="cat_title" size="25" value="<?php if( isset( $cat_title ) ) echo esc_html( $cat_title ) ?>" />
	</td>
</tr>

<tr class="form-field">
	<th scope="row"><label for="subtitle"><?php _e( 'サブタイトル', 'emanon-premium' ) ?></label></th>
	<td>
		<input type="text" name="emanon[cat_subtitle]" id="cat_subtitle" size="25" value="<?php if( isset( $cat_subtitle ) ) echo esc_html( $cat_subtitle ) ?>" />
	</td>
</tr>

<tr class="form-field">
	<th scope="row"><label for="cat_description"><?php _e( '説明文', 'emanon-premium' ) ?></label></th>
	<td>
	<textarea name="emanon[cat_description]" id="cat_description" rows="5" cols="50" class="large-text"><?php if( isset( $cat_description ) ) echo esc_html( $cat_description ) ?></textarea>
	</td>
</tr>

<tr class="form-field">
	<th scope="row"><label for="cat_meta_description"><?php _e( 'meta description設定', 'emanon-premium' ) ?></label></th>
	<td>
	<textarea name="emanon[cat_meta_description]" id="cat_meta_description" rows="3" cols="50" class="large-text"><?php if( isset( $cat_meta_description ) ) echo esc_html( $cat_meta_description ) ?></textarea>
	</td>
</tr>

<tr class="form-field">
	<th><label for="cat_image"><?php _e( '画像［PC］', 'emanon-premium' ) ?></label></th>
	<td>
	<?php
		emanon_custom_media_uploader( 'emanon[cat_image_pc]', $cat_image_pc, 'cat_image_pc' );
	?>
	<br>
	<small><?php echo _e( '推奨画像サイズ： 1200px * 675px', 'emanon-premium' ); ?></small>
	</td>
</tr>

<tr class="form-field">
	<th><label for="cat_image"><?php _e( '画像［SP］', 'emanon-premium' ) ?></label></th>
	<td>
	<?php
		emanon_custom_media_uploader( 'emanon[cat_image_sp]', $cat_image_sp, 'cat_image_sp' );
	?>
	<br>
	<small><?php echo _e( '推奨画像サイズ： 600px * 338px', 'emanon-premium' ); ?></small>
	</td>
</tr>

<tr class="form-field">
	<th scope="row"><label for="cat_text_color"><?php _e( 'カテゴリー名', 'emanon-premium' ); ?></label></th>
	<td>
	<?php
		if ( ! empty( $cat_text_color ) ) {
			$cat_text_color_value = $cat_text_color;
		} else {
			$cat_text_color_value = '#ffffff';
		}
	?>
	<input type="text" name="emanon[cat_text_color]" class="emanon_color_field" data-default-color="#fff" value="<?php echo esc_attr( $cat_text_color_value ); ?>" >
	</td>
</tr>

<tr class="form-field">
	<th scope="row"><label for="cat_bg_color"><?php _e( 'カテゴリー［背景色］', 'emanon-premium' ); ?></label></th>
	<td>
	<?php
		if ( ! empty( $cat_bg_color ) ) {
			$cat_bg_color_value = $cat_bg_color;
		} else {
			$cat_bg_color_value = $primary_color;
		}
	?>
	<input type="text" name="emanon[cat_bg_color]" class="emanon_color_field" data-default-color="<?php echo esc_attr( $primary_color ); ?>" value="<?php echo esc_attr( $cat_bg_color_value ); ?>" >
	</td>
</tr>

<tr class="form-field">
	<th scope="row"><label for="cat_page_id"><?php _e( '固定ページを選択', 'emanon-premium' ); ?></label></th>
	<td>
		<?php
		$dropdown_args = array(
			'post_type'        => 'page',
			'selected'         => $cat_page_id,
			'name'             => 'emanon[cat_page_id]',
			'show_option_none' => __( '&mdash; 選択 &mdash;', 'emanon-premium' ),
			'sort_column'      => 'menu_order, post_title',
			'post_status'      => 'publish,private',
			'echo'             => 1,
		);
		wp_dropdown_pages( $dropdown_args );
		?><br>
		<small><?php echo _e( '選択した固定ページを非公開状態に設定してください。', 'emanon-premium' ); ?></small>
	</td>
</tr>

<?php
}

add_action (
'edit_terms',
	function ( $term_id ) {
		if ( isset( $_POST['emanon'] ) ) {
			$t_id = $term_id;
			$cat_keys = array_keys($_POST['emanon']);
			foreach ( $cat_keys as $key ) {
					update_term_meta($t_id, $key, $_POST['emanon'][$key]);
			}
		}
	}
);