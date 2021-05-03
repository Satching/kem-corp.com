<?php
/**
 * Theme customizer header menu colors panel
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

/**
 * Header menuカラーの設定
 */
$wp_customize->add_section( 'emanon_header_menu_colors', array(
	'title'    => __( 'ヘッダーメニュー設定', 'emanon-premium' ),
	'panel'    => 'emanon_colors_settings',
	'priority' => 3,
) );

	// Menu background color
	$wp_customize->add_setting( 'menu_background_color', array(
		'default'  => '#ffffff',
		'type'     => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_colorcode',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'menu_background_color', array(
		'label'    => __( '背景色', 'emanon-premium' ),
		'section'  => 'emanon_header_menu_colors',
		'settings' => 'menu_background_color',
		'priority' => 1,
	) ) );

	// Menu items color
	$wp_customize->add_setting( 'menu_items_color', array(
		'default'  => '#333333',
		'type'     => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_colorcode',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'menu_items_color', array(
		'label'    => __( 'メニュー項目', 'emanon-premium' ),
		'section'  => 'emanon_header_menu_colors',
		'settings' => 'menu_items_color',
		'priority' => 2,
	) ) );

	// Menu items hover color
	$wp_customize->add_setting( 'menu_items_hover_color', array(
		'default'  => emanon_primary_color(),
		'type'     => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_colorcode',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'menu_items_hover_color', array(
		'label'    => __( 'メニュー項目［ホバー］', 'emanon-premium' ),
		'section'  => 'emanon_header_menu_colors',
		'settings' => 'menu_items_hover_color',
		'priority' => 3,
	) ) );

	// Sub menu background color
	$wp_customize->add_setting( 'sub_menu_background_color', array(
		'default'  => emanon_primary_color(),
		'type'     => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_colorcode',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sub_menu_background_color', array(
		'label'    => __( '背景色［サブメニュー］', 'emanon-premium' ),
		'section'  => 'emanon_header_menu_colors',
		'settings' => 'sub_menu_background_color',
		'priority' => 4,
	) ) );

	// Sub menu items color
	$wp_customize->add_setting( 'sub_menu_items_color', array(
		'default'  => '#ffffff',
		'type'     => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_colorcode',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sub_menu_items_color', array(
		'label'    => __( 'サブメニュー項目', 'emanon-premium' ),
		'section'  => 'emanon_header_menu_colors',
		'settings' => 'sub_menu_items_color',
		'priority' => 5,
	) ) );