<?php
/**
 * Hamburger menu
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

$menu          = get_theme_mod( 'hamburger_menu_label', __( 'Menu', 'emanon-premium' ) );
$menu_label_sp = get_theme_mod( 'display_hamburger_menu_label_sp' );
if ( $menu_label_sp ) {
	$class_menu_label = 'u-display-block ';
} else {
	$class_menu_label = '';
}
?>

<button class="js-hamburger-menu hamburger-menu" aria-label="ハンバーガーメニュー">
	<a class="hamburger-menu-trigger">
		<span></span>
		<span></span>
		<span></span>
	</a>
	<?php if ( $menu ): ?>
		<span class="<?php echo esc_attr( $class_menu_label ); ?>hamburger-menu-label"><?php echo esc_html( $menu ); ?></span>
	<?php endif; ?>
</button><!--/#js-hamburger-menu-->