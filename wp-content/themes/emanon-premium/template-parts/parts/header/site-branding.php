<?php
/**
 * Site branding
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

if ( is_front_page() ) {
	$tag = 'h1';
} else {
	$tag = 'div';
}
$hamburger        = get_theme_mod( 'display_hamburger_menu_'. DEVICE );
if ( $hamburger ) {
	$class_drawer   = ' have-drawer-menu';
} else {
	$class_drawer   = '';
}
$title_size       = get_theme_mod( 'header_site_title_size_'. DEVICE , 36 );
$class_justify    = ' ' . get_theme_mod( 'header_logo_layout_sp', 'is-center' );
$logo_height      = get_theme_mod( 'header_logo_height_'. DEVICE , 30 );
$icon_logo_height = get_theme_mod( 'header_icon_logo_height_'. DEVICE , 26 );
$display_tagline  = get_theme_mod( 'display_header_tagline_'. DEVICE );
$tagline_position = get_theme_mod( 'header_tagline_position', 'tagline_under_logo' );
$logo_id          = get_theme_mod( 'custom_logo' );
$logo_sp          = get_theme_mod( 'header_logo_sp' );
if ( is_mobile() && $logo_sp ) {
$logo_url = $logo_sp;
} else {
$logo_url = wp_get_attachment_image_url( $logo_id , 'full' );
}
$icon_logo        = get_theme_mod( 'header_icon_logo_sp' );
if ( is_mobile() && $icon_logo ) {
$icon_url = $icon_logo;
} else {
$icon_url = get_theme_mod( 'header_icon_logo_pc' );
}
if ( $logo_id ) {
	$logo_tag   = '<img style=height:' . $logo_height . 'px src="'.esc_url( $logo_url ).'" alt="' . get_bloginfo('name') . '">';
	$class_site = 'site-logo';
	$style      = '';
	$class_icon = 'icon-logo';
} else {
	$logo_tag   = get_bloginfo( 'name' );
	$class_site = 'site-title';
	$style      = 'style=font-size:' . $title_size . 'px';
	$class_icon = 'icon-logo-baseline';
}
if ( $icon_url ) {
	$logo       = '<img class="' . $class_icon . '" style=height:' . $icon_logo_height . 'px src="'.esc_url( $icon_url ).'" alt="' . get_bloginfo('name') . '">' . $logo_tag;
} else {
	$logo       = $logo_tag;
}
?>

<div class="header-site-branding<?php echo esc_attr( $class_drawer ); ?> u-row u-row-item-center<?php echo esc_attr( $class_justify ); ?>">
	<<?php echo esc_attr( $tag ); ?> <?php echo esc_attr( $style ); ?> class="<?php echo esc_attr( $class_site ); ?>">
	<?php if ( $display_tagline && 'tagline_on_logo' === $tagline_position ) : ?>
		<span class="site-description on-logo" itemprop="description"><?php echo get_bloginfo( 'description' ); ?></span>
	<?php endif; ?>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo ( $logo ); ?></a>
	<?php if ( $display_tagline && 'tagline_under_logo' === $tagline_position ) : ?>
		<span class="site-description under-logo" itemprop="description"><?php echo get_bloginfo( 'description' ); ?></span>
	<?php endif; ?>
	</<?php echo esc_attr( $tag ); ?>>
</div><!--/.header-site-branding-->