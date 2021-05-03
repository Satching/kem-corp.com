<?php
/**
 * Theme customizer hamburger menu colors panel
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

/**
 * hamburger menuカラーの設定
 */
$wp_customize->add_section( 'emanon_hamburger_menu_colors', array(
	'title'    => __( 'ハンバーガーメニュー設定', 'emanon-premium' ),
	'panel'    => 'emanon_colors_settings',
	'priority' => 4,
) );

	// Hamburger menu color
	$wp_customize->add_setting( 'hamburger_menu_color', array(
		'default'  => emanon_primary_color(),
		'type'     => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_colorcode',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hamburger_menu_color', array(
		'label'    => __( 'ハンバーガーメニュー', 'emanon-premium' ),
		'section'  => 'emanon_hamburger_menu_colors',
		'settings' => 'hamburger_menu_color',
		'priority' => 1,
	) ) );

	// Floating hamburger menu background_color
	$wp_customize->add_setting( 'floating_hamburger_menu_background_color', array(
		'default'  => emanon_primary_color(),
		'type'     => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_colorcode',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'floating_hamburger_menu_background_color', array(
		'label'    => __( 'ハンバーガーメニュー［追従型］：背景色', 'emanon-premium' ),
		'section'  => 'emanon_hamburger_menu_colors',
		'settings' => 'floating_hamburger_menu_background_color',
		'priority' => 2,
	) ) );

	// Floating hamburger menu _color
	$wp_customize->add_setting( 'floating_hamburger_menu_color', array(
		'default'  => '#ffffff',
		'type'     => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_colorcode',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'floating_hamburger_menu_color', array(
		'label'    => __( 'ハンバーガーメニュー［追従型］', 'emanon-premium' ),
		'section'  => 'emanon_hamburger_menu_colors',
		'settings' => 'floating_hamburger_menu_color',
		'priority' => 3,
	) ) );
