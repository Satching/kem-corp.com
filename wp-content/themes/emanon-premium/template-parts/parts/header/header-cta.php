<?php
/**
 * Header CTA
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

$language         = get_theme_mod( 'display_header_language_' . DEVICE );
$search           = get_theme_mod( 'display_header_search_form_' . DEVICE );
$cta              = get_theme_mod( 'display_header_cta_' . DEVICE );
$class_icon       = get_theme_mod( 'header_cta_icon', 'icon-mail' );
$search_label     = get_theme_mod( 'header_search_label' );
$search_label_sp  = get_theme_mod( 'display_header_search_label_sp' );
$language_label   = get_theme_mod( 'header_language_label' );
$language_labe_sp = get_theme_mod( 'display_header_language_label_sp' );
$cta_label        = get_theme_mod( 'header_cta_label' );
$cta_label_sp     = get_theme_mod( 'display_header_cta_label_sp' );
if ( is_mobile() && $search_label_sp ) {
	$class_search_label   = 'u-display-block';
} else {
	$class_search_label   = 'u-display-pc';
}
if ( is_mobile() && $cta_label_sp ) {
	$class_cta_label      = 'u-display-block';
} else {
	$class_cta_label      = 'u-display-pc';
}
if ( is_mobile() && $language_labe_sp ) {
	$class_language_label = 'u-display-block';
} else {
	$class_language_label = 'u-display-pc';
}
?>

<div class="header-cta">
	<ul class="u-row u-row-item-center u-row-cont-between">

	<?php if ( $language ): ?>
		<li id="js-header-language" class="header-cta__item header-cta__language">
			<a href="#" class="switch-off" aria-label="スイッチ オフ">
				<div class="header-cta__inner">
					<i class="icon-sphere" aria-hidden="true"></i><span class="<?php echo esc_attr( $class_language_label ); ?> header-cta__label"><?php echo esc_html( $language_label ); ?></span>
				</div>
			</a>
			<a href="#" class="switch-on" aria-label="スイッチ オン">
				<div class="header-cta__inner">
					<i class="icon-x-circle" aria-hidden="true"></i><span class="<?php echo esc_attr( $class_language_label ); ?> header-cta__label"><?php echo esc_html( $language_label ); ?></span>
				</div>
			</a>
			<div id="js-header-language-panel" class="header-language">
				<?php 
					get_template_part( 'template-parts/parts/header/header-language' );
				?>
			</div>
		</li>
	<?php endif; ?>

	<?php if ( $search ): ?>
		<li id="js-header-search" class="header-cta__item header-cta__search">
			<a href="#" class="switch-off" aria-label="スイッチ オフ">
				<div class="header-cta__inner">
					<i class="icon-search" aria-hidden="true"></i><span class="<?php echo esc_attr( $class_search_label ); ?> header-cta__label"><?php echo esc_html( $search_label ); ?></span>
				</div>
			</a>
			<a href="#" class="switch-on" aria-label="スイッチ オン">
				<div class="header-cta__inner">
					<i class="icon-x-circle" aria-hidden="true"></i><span class="<?php echo esc_attr( $class_search_label ); ?> header-cta__label"><?php echo esc_html( $search_label ); ?></span>
				</div>
			</a>
		</li>
	<?php endif; ?>

	<?php if ( $cta ): ?>
		<li id="js-header-contact" class="header-cta__item header-cta__contact">
			<a href="#" class="switch-off" aria-label="スイッチ オフ">
				<div class="header-cta__inner">
					<i class="<?php echo esc_attr( $class_icon ); ?>"></i><span class="<?php echo esc_attr( $class_cta_label ); ?> header-cta__label"><?php echo esc_html( $cta_label ); ?></span>
				</div>
			</a>
			<a href="#" class="switch-on" aria-label="スイッチ オン">
				<div class="header-cta__inner">
					<i class="icon-x-circle" aria-hidden="true"></i><span class="<?php echo esc_attr( $class_cta_label ); ?> header-cta__label"><?php echo esc_html( $cta_label ); ?></span>
				</div>
			</a>
		</li>
	<?php endif; ?>

	</ul><!--/.u-row-->
</div><!--/.header-cta-->