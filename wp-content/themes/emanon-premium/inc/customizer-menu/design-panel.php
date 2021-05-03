<?php
/**
 * Theme customizer design panel
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

/**
 * 外観の設定
 */
$wp_customize->add_panel( 'emanon_design_settings', array(
	'capability' => 'edit_theme_options',
	'title'      => __( 'デザイン設定', 'emanon-premium' ),
	'priority'   => 32,
) );