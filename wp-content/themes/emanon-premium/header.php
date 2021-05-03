<?php
/**
 * The template for displaying header
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

$cache_layout = get_theme_mod( 'cache_layout' );
$cache_key    = $cache_layout ? 'header_'. DEVICE : '';
?>
<?php emanon_ob_start(); ?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head<?php emanon_ogp_prefix(); ?>>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width,initial-scale=1.0" />
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="wrapper">
<?php
	$hide_header = post_custom( 'emanon_hide_header' );
	if ( $hide_header ) {
		return;
	}
	$header_layout = get_theme_mod( 'header_layout', 'header_default' );
	if ( 'header_default' === $header_layout ) :
		get_emanon_cached_template_part( 'template-parts/layout/header/header-layout-default', $cache_key );
	elseif ( 'header_center' === $header_layout ):
		get_emanon_cached_template_part( 'template-parts/layout/header/header-layout-center', $cache_key );
	elseif ( 'header_center_top_menu' === $header_layout ):
		get_emanon_cached_template_part( 'template-parts/layout/header/header-layout-center-top-menu', $cache_key );
	elseif ( 'header_row' === $header_layout ):
		get_emanon_cached_template_part( 'template-parts/layout/header/header-layout-row', $cache_key );
	endif;
?>