<?php
/**
 * Floating hamburger menu［SP］
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

$hide_hamburger_menu = post_custom( 'emanon_hide_floating_hamburger_menu' );
if ( $hide_hamburger_menu ) {
	return;
}
$menu                = get_theme_mod( 'hamburger_menu_label', __( 'Menu', 'emanon-premium' ) );
$menu_label_sp       = get_theme_mod( 'display_hamburger_menu_label_sp' );
if ( is_mobile() && $menu_label_sp ) {
	$class_menu_label = 'u-display-block';
} else {
	$class_menu_label = 'u-display-pc';
}
if ( $menu && 'u-display-block' === $class_menu_label ) {
	$class_menu = ' has-menu';
} else {
	$class_menu  = '';
}
?>

<button class="js-hamburger-menu hamburger-menu-floating<?php echo esc_attr( $class_menu ); ?>" aria-label="フローティングボタン形式のハンバーガーメニュー">
	<a class="hamburger-menu-trigger">
		<span></span>
		<span></span>
		<span></span>
	</a>
	<?php if ( $menu ): ?>
	<div class="hamburger-menu-label <?php echo esc_attr( $class_menu_label ); ?>"><?php echo esc_html( $menu ); ?></div>
	<?php endif; ?>
</button><!--/.floating-hamburger-menu-->
