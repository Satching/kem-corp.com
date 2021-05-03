<?php
/**
 * The template for the custom search form part
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

$unique_id   = esc_attr( uniqid( 'search-form-' ) );
$placeholder = get_theme_mod( 'custom_search_placeholder' );
$select_cat  = get_theme_mod( 'custom_search_select_cat' );
$select_tag  = get_theme_mod( 'custom_search_select_tag' );
$btn_text    = get_theme_mod( 'custom_search_btn_text', __( '検索', 'emanon-premium' ) );
$tags = get_tags();
if ( $select_cat && $select_tag ) {
	$col = 'col-4';
	$col_cat = 'col-3';
	$col_tag = 'col-3';
	$col_submit = 'col-2';
} elseif ( $select_cat || $select_tag ) {
	$col = 'col-7';
	$col_cat = 'col-3';
	$col_tag = 'col-3';
	$col_submit = 'col-2';
} else {
	$col = 'col-10';
	$col_submit = 'col-2';
}
$search_filter_cat = get_theme_mod( 'search_exclude_cat' );
$args = array(
	'show_option_all' => __( '全てのカテゴリー', 'emanon-premium' ),
	'show_count' => true,
	'exclude' => array( $search_filter_cat ),
	);
?>

<div class="custom-search">
	<form role="search" method="get" class="u-row u-row-wrap wrapper-col" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<label for="<?php echo $unique_id; ?>">
			<span class="screen-reader-text"><?php echo _e( '検索：', 'emanon-premium' ); ?></span>
		</label>
		<div class="<?php echo esc_attr( $col ); ?> custom-search__field">
			<input type="search" id="<?php echo $unique_id; ?>" class="search-field" placeholder="<?php echo esc_html( $placeholder ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
		</div><!--/.custom-search-field-->
		<?php if ( $select_cat ) : ?>
		<div class="<?php echo esc_attr( $col_cat ); ?> custom-search__input">
			<?php wp_dropdown_categories( $args ); ?>
		</div><!--/.custom-search-input-->
		<?php endif; ?>
		<?php if ( $select_tag ) : ?>
		<div class="<?php echo esc_attr( $col_tag ); ?> custom-search__input">
			<select name='tag' id='tag'>
			<option value="" selected="selected"><?php echo _e( '全てのタグ', 'emanon-premium' ); ?></option>
			<?php foreach ( $tags as $tag ): ?>
			<option value="<?php echo esc_html( $tag->slug );  ?>"><?php echo esc_html( $tag->name ); ?></option>
			<?php endforeach; ?>
			</select>
		</div><!--/.custom-search-input-->
		<?php endif; ?>
		<div class="<?php echo esc_attr( $col_submit ); ?> custom-search__submit">
		<button type="submit" class="search-submit" aria-label="サイト内検索"><?php echo esc_html( $btn_text ); ?></button>
		</div><!--/.custom-search-submit-->
	</form><!--/.row-wrapper-->
</div><!--/.custom-search-->