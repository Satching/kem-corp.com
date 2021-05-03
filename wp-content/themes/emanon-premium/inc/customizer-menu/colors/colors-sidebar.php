<?php
/**
 * Theme customizer sidebar colors panel
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

/**
 * Sidebarカラーの設定
 */
$wp_customize->add_section( 'emanon_sidebar_colors', array (
	'title'    => __( 'サイドバー設定', 'emanon-premium' ),
	'panel'    => 'emanon_colors_settings',
	'priority' => 7,
) );

	// Sidebar background color
	$wp_customize->add_setting( 'sidebar_background_color', array(
		'default'  => '#ffffff',
		'type'     => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_colorcode',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sidebar_background_color', array(
		'label'    => __( '背景色', 'emanon-premium' ),
		'description' => __( 'サイドバーのデザインが「余白なし＋枠線なし」に設定されている場合は適用されません。', 'emanon-premium' ),
		'section'  => 'emanon_sidebar_colors',
		'settings' => 'sidebar_background_color',
		'priority' => 1,
	) ) );

	// Heading text color
	$wp_customize->add_setting( 'sidebar_heading_text_color', array(
		'default'  => '#333333',
		'type'     => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_colorcode',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sidebar_heading_text_color', array(
		'label'    => __( '見出し', 'emanon-premium' ),
		'section'  => 'emanon_sidebar_colors',
		'settings' => 'sidebar_heading_text_color',
		'priority' => 2,
	) ) );

	// Heading background color
	$wp_customize->add_setting( 'sidebar_heading_background_color', array(
		'default'  => emanon_primary_color(),
		'type'     => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_colorcode',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sidebar_heading_background_color', array(
		'label'    => __( '見出し［背景色］', 'emanon-premium' ),
		'section'  => 'emanon_sidebar_colors',
		'settings' => 'sidebar_heading_background_color',
		'priority' => 3,
	) ) );

	// Sidebar text color
	$wp_customize->add_setting( 'sidebar_text_color', array(
		'default'  => '#333333',
		'type'     => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_colorcode',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sidebar_text_color', array(
		'label'    => __( '文字', 'emanon-premium' ),
		'section'  => 'emanon_sidebar_colors',
		'settings' => 'sidebar_text_color',
		'priority' => 4,
	) ) );