<?php
/**
 * Template part for centert layout in header.php
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

$width       = get_theme_mod( 'header_content_inner_width', 'normal' );
$display_tel = get_theme_mod( 'display_header_tel' );
$sns_layout  = get_theme_mod( 'header_sns_layout', 'display_none' );
$hamburger   = get_theme_mod( 'display_hamburger_menu_' . DEVICE );
$language    = get_theme_mod( 'display_header_language_' . DEVICE );
$search      = get_theme_mod( 'display_header_search_form_' . DEVICE );
$cta         = get_theme_mod( 'display_header_cta_' . DEVICE );
?>

<header class="l-header">
	<div class="l-header-center">
		<div class="l-content<?php if ( 'full' === $width ) { ?>__fluid<?php } ?>">
			<?php
				if ( $display_tel || 'display_none' !== $sns_layout ) {
					get_template_part( 'template-parts/parts/header/header-info' );
				}
			?>
			<div class="l-header__inner">
			<?php
				if ( is_mobile() && has_nav_menu( 'drawer-menu-sp' ) && $hamburger || has_nav_menu( 'drawer-menu-pc' ) && $hamburger ) {
					get_template_part( 'template-parts/parts/header/hamburger-menu' );
				}
					get_template_part( 'template-parts/parts/header/site-branding' );
				if ( $language || $search || $cta ) {
					get_template_part( 'template-parts/parts/header/header-cta' );
				}
			?>
			</div><!--/.l-header__inner-->
		</div><!--/.l-content-->
		<?php
		if ( $language || $search || $cta ) {
			get_template_part( 'template-parts/parts/header/header-panel' );
		}
		?>
	</div><!--/.l-header-center-->
	<?php if ( has_nav_menu( 'header-menu' ) ): ?>
	<div class="header-menu-center u-display-pc">
		<div class="l-content<?php if ( 'full' === $width ) { ?>__fluid<?php } ?>">
			<?php wp_nav_menu( array ( 'theme_location' => 'header-menu', 'fallback_cb' => '', 'container' => 'nav', 'items_wrap' => '<ul class="header-menu u-row u-row-item-center u-row-cont-center">%3$s</ul>' ) ); ?>
		</div><!--/.l-content-->
	</div><!--/.header-menu-center-->
	<?php
		if ( has_nav_menu( 'header-menu-drop' ) ) {
			get_template_part( 'template-parts/layout/header/header-menu-drop' );
		}
	?>
	<?php endif; ?>
</header>