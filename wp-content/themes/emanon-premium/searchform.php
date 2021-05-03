<?php
/**
 * The template for the search form part
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

$unique_id   = esc_attr( uniqid( 'search-form-' ) );
$placeholder = get_theme_mod( 'search_placeholder' );
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label for="<?php echo $unique_id; ?>">
		<span class="screen-reader-text"><?php echo _e( '検索：', 'emanon-premium' ); ?></span>
	</label>
	<input type="search" id="<?php echo $unique_id; ?>" class="search-field" placeholder="<?php echo esc_html( $placeholder ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	<button type="submit" class="search-submit"><i class="icon-search"></i></button>
</form>
