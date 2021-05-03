<?php
/**
 * The template for sidebar widget
 *
 * @since 1.0.0
 * @package Emanon Premium
 */
?>

<?php
	if ( is_mobile() && is_active_sidebar( 'sidebar-widget-sp' ) ) {
		dynamic_sidebar( 'sidebar-widget-sp' );
	} elseif ( is_active_sidebar( 'sidebar-widget' ) ) {
		dynamic_sidebar( 'sidebar-widget' );
	}
	if ( is_active_sidebar( 'sidebar-widget-sticky' ) ) {
	echo '<div id="js-sidebar-sticky" class="sidebar-sticky">';
	dynamic_sidebar( 'sidebar-widget-sticky' );
	echo '</div>';
	}
?>
