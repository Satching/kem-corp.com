<?php
/**
 * Footer menu
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

$has_privac_policy = get_the_privacy_policy_link();
?>

<?php if ( has_nav_menu( 'footer-menu-sp' ) || has_nav_menu( 'footer-menu-pc' ) || $has_privac_policy ): ?>
	<div class="l-content">
		<div class="footer-menu__inner">
			<ul id="menu-footer-nav" class="footer-menu">
			<?php if ( is_mobile() && has_nav_menu( 'footer-menu-sp' ) ): ?>
				<?php wp_nav_menu( array ( 'theme_location' => 'footer-menu-sp', 'container' => false, 'fallback_cb' => '', 'depth' => '1', 'items_wrap' => '%3$s' ) ); ?>
			<?php elseif ( has_nav_menu( 'footer-menu-pc' ) ): ?>
				<?php wp_nav_menu( array ( 'theme_location' => 'footer-menu-pc', 'container' => false, 'fallback_cb' => '', 'depth' => '1', 'items_wrap' => '%3$s' ) ); ?>
			<?php endif; ?>
			<?php
				if ( $has_privac_policy ) {
				the_privacy_policy_link( '<li>', '</li>' );
				}
			?>
			</ul>
		</div><!--/.footer-menu__inne-->
	</div><!--/.l-content-->
<?php endif; ?>