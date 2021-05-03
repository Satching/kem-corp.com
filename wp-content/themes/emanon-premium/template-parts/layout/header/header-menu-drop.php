<?php
/**
 * header menu drop
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

$width      = get_theme_mod( 'header_content_inner_width', 'normal' );
?>

<div id="js-header-menu-drop" class="l-header-menu-drop u-display-pc">
	<div class="l-header-menu-drop__inner">
		<div class="l-content<?php if ( 'full' === $width ) { ?>__fluid<?php } ?> header-menu-inner">
		<?php wp_nav_menu( array ( 'theme_location' => 'header-menu-drop', 'fallback_cb' => '', 'container' => 'nav', 'items_wrap' => '<ul class="header-menu u-row u-row-item-center u-row-cont-center">%3$s</ul>' ) ); ?>
		</div><!--/.l-content-->
	</div><!--/.header-menu-center-->
</div><!--/#js-header-menu-drop-->