<?php
/**
 * Theme customizer colors panel
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

/**
 * 外観の設定
 */
$wp_customize->add_panel( 'emanon_colors_settings', array(
	'capability' => 'edit_theme_options',
	'title'      => __( '配色設定', 'emanon-premium' ),
	'priority'   => 33,
) );