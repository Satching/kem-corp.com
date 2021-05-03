<?php
/**
 * Theme customizer footer color panel
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

/**
 * Footerカラーの設定
 */
$wp_customize->add_section( 'emanon_footer_colors', array (
	'title'    => __( 'フッター設定', 'emanon-premium' ),
	'panel'    => 'emanon_colors_settings',
	'priority' => 8,
) );

	// Footer background color
	$wp_customize->add_setting( 'footer_background_color', array(
		'default'  => '#484848',
		'type'     => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_colorcode',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_background_color', array(
		'label'    => __( '背景色', 'emanon-premium' ),
		'section'  => 'emanon_footer_colors',
		'settings' => 'footer_background_color',
		'priority' => 1,
	) ) );

	// Background mask color opacity
	$wp_customize->add_setting( 'footer_background_opacity', array(
		'default' => 0,
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_range_slider'
	) );
	$wp_customize->add_control( new Emanon_WP_Customize_Range_slider_Control( $wp_customize, 'footer_background_opacity', array(
		'label' => __( '背景色［透過率］：オーバーレイ用', 'emanon-premium' ),
		'section'  => 'emanon_footer_colors',
		'settings' => 'footer_background_opacity',
		'min' => 0,
		'max' => 1,
		'step' => 0.1,
		'priority' => 2,
	) ) );

	// Heading text color
	$wp_customize->add_setting( 'footer_heading_text_color', array(
		'default'  => '#ffffff',
		'type'     => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_colorcode',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_heading_text_color', array(
		'label'    => __( '見出し', 'emanon-premium' ),
		'section'  => 'emanon_footer_colors',
		'settings' => 'footer_heading_text_color',
		'priority' => 3,
	) ) );

	// Heading background color
	$wp_customize->add_setting( 'footer_heading_background_color', array(
		'default'  => emanon_primary_color(),
		'type'     => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_colorcode',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_heading_background_color', array(
		'label'    => __( '見出し［背景色］', 'emanon-premium' ),
		'section'  => 'emanon_footer_colors',
		'settings' => 'footer_heading_background_color',
		'priority' => 4,
	) ) );

	// Footer text color
	$wp_customize->add_setting( 'footer_text_color', array(
		'default'  => '#ffffff',
		'type'     => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_colorcode',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_text_color', array(
		'label'    => __( '文字', 'emanon-premium' ),
		'section'  => 'emanon_footer_colors',
		'settings' => 'footer_text_color',
		'priority' => 5,
	) ) );

	// Active： Site copyright background color
	$wp_customize->add_setting( 'active_site_copyright_background_color', array(
		'default' => true,
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'active_site_copyright_background_color', array(
		'label' =>__( '背景色［コピーライト］を有効', 'emanon-premium' ),
		'section'  => 'emanon_footer_colors',
		'settings' => 'active_site_copyright_background_color',
		'type' => 'checkbox',
		'priority' => 6,
	) );

	// Site copyright background color
	$wp_customize->add_setting( 'site_copyright_background_color', array(
		'default'  => '#484848',
		'type'     => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_colorcode',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'site_copyright_background_color', array(
		'label'    => __( '背景色［コピーライト］', 'emanon-premium' ),
		'section'  => 'emanon_footer_colors',
		'settings' => 'site_copyright_background_color',
		'priority' => 7,
	) ) );

	// Site copyright text color
	$wp_customize->add_setting( 'site_copyright_text_color', array(
		'default'  => '#ffffff',
		'type'     => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_colorcode',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'site_copyright_text_color', array(
		'label'    => __( '文字［コピーライト］', 'emanon-premium' ),
		'section'  => 'emanon_footer_colors',
		'settings' => 'site_copyright_text_color',
		'priority' => 8,
	) ) );

	// Footer fixed menu sp background color
	$wp_customize->add_setting( 'footer_fixed_menu_sp_background_color', array(
		'default'  => emanon_primary_color(),
		'type'     => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_colorcode',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_fixed_menu_sp_background_color', array(
		'label'    => __( '背景色［フッター固定メニュー［SP］］', 'emanon-premium' ),
		'section'  => 'emanon_footer_colors',
		'settings' => 'footer_fixed_menu_sp_background_color',
		'priority' => 8,
	) ) );

	// Background mask color opacity
	$wp_customize->add_setting( 'footer_fixed_menu_sp_background_opacity', array(
		'default' => 1,
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_range_slider'
	) );
	$wp_customize->add_control( new Emanon_WP_Customize_Range_slider_Control( $wp_customize, 'footer_fixed_menu_sp_background_opacity', array(
		'label' => __( '背景色［透過率］：フッター固定メニュー［SP］', 'emanon-premium' ),
		'section'  => 'emanon_footer_colors',
		'settings' => 'footer_fixed_menu_sp_background_opacity',
		'min' => 0,
		'max' => 1,
		'step' => 0.1,
		'priority' => 9,
	) ) );

	// Footer fixed menu sp text color
	$wp_customize->add_setting( 'footer_fixed_menu_sp_text_color', array(
		'default'  => '#fff',
		'type'     => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_colorcode',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_fixed_menu_sp_text_color', array(
		'label'    => __( '文字［フッター固定メニュー［SP］］', 'emanon-premium' ),
		'section'  => 'emanon_footer_colors',
		'settings' => 'footer_fixed_menu_sp_text_color',
		'priority' => 10,
	) ) );
