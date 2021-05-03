<?php
/**
 * The template for footer widget upper
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

?>

<?php
	if ( is_mobile() && is_active_sidebar( 'footer-widget-upper-sp' ) ) {
		dynamic_sidebar( 'footer-widget-upper-sp' );
	} elseif ( is_active_sidebar( 'footer-widget-upper-pc' ) ) {
		dynamic_sidebar( 'footer-widget-upper-pc' );
	}
?>