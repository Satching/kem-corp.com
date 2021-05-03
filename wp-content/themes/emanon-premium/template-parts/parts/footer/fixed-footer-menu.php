<?php
/**
 * Fixed Footer Menu［SP］
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

$hide_fixed_footer_menu = post_custom( 'emanon_hide_fixed_footer_menu' );
if ( $hide_fixed_footer_menu ) {
	return;
}
?>

<div id="js-fixed-footer-menu" class="fixed-footer-menu">
	<div class="fixed-footer-menu__inner">
		<?php
			wp_nav_menu( array (
			'theme_location' => 'fixed-footer-menu',
			'depth'          => 1,
			'fallback_cb'    => '',
			'container'      => 'nav',
			'menu_class'     => 'fixed-footer-menu__inner u-row u-row-wrap u-row-item-center u-row-cont-around',
		) ); ?>
	</div>
</div><!--/.fixed-footer-menu-->

<?php
	get_template_part( 'template-parts/parts/sns/fixed-footer-sns-follow' );
	get_template_part( 'template-parts/parts/sns/fixed-footer-sns-share' );
?>

<div class="js-fixed-item sp-searchform">
<?php
	get_template_part( 'searchform-custom' );
?>
</div><!--/.sp-searchform-->