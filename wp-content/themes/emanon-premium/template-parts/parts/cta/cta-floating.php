<?php
/**
 * CTA Floating
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

$cta_frontpage = get_theme_mod( 'hide_cta_floating_frontpage_' . DEVICE );
$cta_home      = get_theme_mod( 'hide_cta_floating_home_' . DEVICE );
$cta_post      = get_theme_mod( 'hide_cta_floating_post_' . DEVICE );
$cta_page      = get_theme_mod( 'hide_cta_floating_page_' . DEVICE );
$cta_archive   = get_theme_mod( 'hide_cta_floating_archive_' . DEVICE );
if ( is_front_page() && is_home() && $cta_frontpage ) {
	return;
} elseif ( is_front_page() && $cta_frontpage ) {
	return;
} elseif ( is_home() && ! is_front_page() && $cta_home ) {
	return;
} elseif ( is_singular( 'post' ) && $cta_post ) {
	return;
} elseif ( is_page()&& ! is_front_page() && $cta_page ) {
	return;
} elseif ( is_archive() && $cta_archive ) {
	return;
}
$cta_id = '';
$frontpage_cta_id   = get_theme_mod( 'display_cta_floating_frontpage' );
if ( false === $frontpage_cta_id ) {
	$frontpage_cta_id = '';
}
$home_cta_id        = get_theme_mod( 'display_cta_floating_home' );
if ( false === $home_cta_id ) {
	$home_cta_id      = '';
}
$archive_cta_id     = get_theme_mod( 'display_cta_floating_archive' );
if ( false === $archive_cta_id ) {
	$archive_cta_id   = '';
}
$post_cta_id        = post_custom( 'emanon_cta_floating_id' );
if ( false === $post_cta_id ) {
	$post_cta_id      = get_theme_mod( 'display_cta_floating_post' );
}
	$page_cta_id      = post_custom( 'emanon_cta_floating_id' );
if ( false === $page_cta_id ) {
	$page_cta_id      = get_theme_mod( 'display_cta_floating_page' );
}

if ( is_front_page() && $frontpage_cta_id || is_front_page() && is_home() && $frontpage_cta_id ) {
	$cta_id = $frontpage_cta_id;
} elseif ( is_front_page() && $frontpage_cta_id ) {
	$cta_id = $frontpage_cta_id;
} elseif ( is_home() && ! is_front_page() && $home_cta_id ) {
	$cta_id = $home_cta_id;
} elseif ( is_singular( 'post' ) && $post_cta_id ) {
	$cta_id = $post_cta_id;
} elseif ( is_page() && ! is_front_page() && $page_cta_id ) {
	$cta_id = $page_cta_id;
} elseif ( is_archive() && $archive_cta_id ) {
	$cta_id = $archive_cta_id;
}
$slide_in_pc       = get_post_meta( $cta_id, 'cta_floating_slide_in_pc', true );
$floating_layout   = get_post_meta( $cta_id, 'cta_floating_layout', true );
$icon_1            = get_post_meta( $cta_id, 'cta_floating_icon_1', true );
$icon_image_1      = get_post_meta( $cta_id, 'cta_floating_icon_image_1', true );
$url_1             = get_post_meta( $cta_id, 'cta_floating_url_1', true );
$title_1           = get_post_meta( $cta_id, 'cta_floating_title_1', true );
$lead              = get_post_meta( $cta_id, 'cta_floating_lead', true );
$icon_color_1      = get_post_meta( $cta_id, 'cta_floating_icon_color_1', true );
$title_color_1     = get_post_meta( $cta_id, 'cta_floating_title_color_1', true );
$lead_color        = get_post_meta( $cta_id, 'cta_floating_lead_color', true );
$bg_color_1        = get_post_meta( $cta_id, 'cta_floating_background_color_1', true );
$close_color       = get_post_meta( $cta_id, 'cta_floating_close_color', true );
$close_bg_color    = get_post_meta( $cta_id, 'cta_floating_close_bg_color', true );
$icon_2            = get_post_meta( $cta_id, 'cta_floating_icon_2', true );
$icon_image_2      = get_post_meta( $cta_id, 'cta_floating_icon_image_2', true );
$url_2             = get_post_meta( $cta_id, 'cta_floating_url_2', true );
$title_2           = get_post_meta( $cta_id, 'cta_floating_title_2', true );
$icon_color_2      = get_post_meta( $cta_id, 'cta_floating_icon_color_2', true );
$title_color_2     = get_post_meta( $cta_id, 'cta_floating_title_color_2', true );
$bg_color_2        = get_post_meta( $cta_id, 'cta_floating_background_color_2', true );
if ( is_mobile() ) {
	$id = 'cta-floating-sp';
} elseif ( ! is_mobile() && $slide_in_pc ) {
	$id = 'cta-floating-pc';
} elseif ( ! is_mobile() && ! $slide_in_pc ) {
	$id = 'cta-floating-show';
}
if ( 'cta-floating-rectangle' == $floating_layout ) {
	$class_cta = 'cta-rectangle';
	$title_bg  = get_post_meta( $cta_id, 'cta_floating_background_color_1', true );
} elseif ( 'cta-floating-square' == $floating_layout ) {
	$class_cta = 'cta-square';
	$title_bg  = get_post_meta( $cta_id, 'cta_floating_title_bg_color', true );
}
if ( is_mobile() && has_nav_menu( 'fixed-footer-menu' ) ) {
	$class_menu_sp = ' fixed-footer-menu__bottom';
} else {
	$class_menu_sp = '';
}
?>

<?php if ( $cta_id ): ?>
<div id="<?php echo $id; ?>" class="cta-floating <?php echo esc_attr( $class_cta ); ?><?php echo esc_attr( $class_menu_sp ); ?>">
	<?php if ( 'cta-floating-square' === $floating_layout ): ?>
		<div id="js-cta-floating-close" class="cta-floating__slide-icon">
			<i class="icon-close" style="background-color:<?php echo $close_bg_color; ?>; color:<?php echo $close_color; ?>;"></i>
		</div>
		<div id="js-cta-floating-open" class="cta-floating__slide-icon u-display-none">
			<i class="icon-chevron-left" style="background-color:<?php echo $close_bg_color; ?>; color:<?php echo $close_color; ?>;"></i>
		</div>
	<?php endif; ?>
	<?php if ( $url_1 ): ?>
	<a class="cta-floating__link" href="<?php echo esc_url( $url_1 ); ?>">
		<div class="cta-floating__body" style="background-color:<?php echo $bg_color_1; ?>;">
			<?php if ( $icon_1 ): ?>
			<span class="cta-floating__icon" style="color:<?php echo $icon_color_1; ?>;">
				<i class="<?php echo esc_html( $icon_1 ); ?>"></i>
			</span>
			<?php elseif ( $icon_image_1 ): ?>
			<div class="cta-floating__image">
				<img src="<?php echo esc_url( $icon_image_1 ); ?>" alt="<?php echo esc_html( $title_1 ); ?>">
			</div>
			<?php endif; ?>
			<?php if ( $title_1 ): ?>
			<span class="cta-floating__title" style="color:<?php echo $title_color_1; ?>; background-color:<?php echo $title_bg; ?>;"><?php echo wp_kses_post( $title_1 ); ?></span>
			<?php endif; ?>
			<?php if ( 'cta-floating-square' === $floating_layout && $lead ): ?>
				<p class="cta-floating__lead" style="color:<?php echo $lead_color; ?>;"><?php echo wp_kses_post( $lead ); ?></p>
			<?php endif; ?>
		</div>
	</a>
	<?php endif; ?>
	<?php if ( 'cta-floating-rectangle' === $floating_layout && $url_2 ): ?>
		<a class="cta-floating__link" href="<?php echo esc_url( $url_2 ); ?>">
			<div class="cta-floating__body" style="background-color:<?php echo $bg_color_2; ?>;">
				<?php if ( $icon_2 ): ?>
				<span class="cta-floating__icon" style="color:<?php echo $icon_color_2; ?>;">
					<i class="<?php echo esc_html( $icon_2 ); ?>"></i>
				</span>
				<?php elseif ( $icon_image_2 ): ?>
				<div class="cta-floating__image">
					<img src="<?php echo esc_url( $icon_image_2 ); ?>" alt="<?php echo esc_html( $title_2 ); ?>">
				</div>
				<?php endif; ?>
				<?php if ( $title_2 ): ?>
				<span class="cta-floating__title" style="color:<?php echo $title_color_2; ?>;"><?php echo wp_kses_post( $title_2 ); ?></span>
				<?php endif; ?>
			</div>
		</a>
	<?php endif; ?>
</div>
<?php endif; ?>
