<?php
/**
 * Drawer menu
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

$hide_hamburger_menu = post_custom( 'emanon_hide_floating_hamburger_menu' );
if ( $hide_hamburger_menu ) {
	return;
}
$title        = get_theme_mod( 'drawer_menu_title' );
$class_align  = get_theme_mod( 'drawer_menu_heading_align', 'drawer-left' );
$class_design = get_theme_mod( 'drawer_menu_heading_design', 'drawer-none-style' );
?>

<div class="drawer-menu <?php echo esc_attr( $class_align ); ?> <?php echo esc_attr( $class_design ); ?>">
	<div class="hamburger-close-menu">
		<button class="hamburger-close-line">
			<span></span>
			<span></span>
			<span></span>
		</button><!--/.hamburger-close-line-->
	</div><!--/.hamburger-close-menu-->
	<div class="drawer-menu__inner">

		<?php if ( $title ): ?>
		<h3 class="drawer-widget__title drawer-title"><?php echo nl2br( wp_kses_post( $title ) ); ?></h3>
		<?php endif; ?>

		<?php
			if ( is_active_sidebar( 'drawer-widget-top' ) ) {
				dynamic_sidebar( 'drawer-widget-top' );
			}
	
			if ( is_mobile() && has_nav_menu( 'drawer-menu-sp' ) ) {
				wp_nav_menu( array ( 'theme_location' => 'drawer-menu-sp','fallback_cb' => '', 'container' => 'nav' ) );
			} elseif ( has_nav_menu( 'drawer-menu-pc' ) ) {
				wp_nav_menu( array ( 'theme_location' => 'drawer-menu-pc','fallback_cb' => '', 'container' => 'nav' ) );
			}
	
			if ( is_active_sidebar( 'drawer-widget-bottom' ) ) {
				dynamic_sidebar( 'drawer-widget-bottom' );
			}
		?>
	</div>
</div><!--/.drawer-menu-->
<div class="drawer-overlay"></div><!--/.drawer-overlay-->