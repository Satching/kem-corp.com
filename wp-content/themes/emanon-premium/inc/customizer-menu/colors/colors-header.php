<?php
/**
 * Theme customizer header colors panel
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

/**
 * Headerカラーの設定
 */
$wp_customize->add_section( 'emanon_header_colors', array(
	'title'    => __( 'ヘッダー設定', 'emanon-premium' ),
	'panel'    => 'emanon_colors_settings',
	'priority' => 2,
) );

	// header background color
	$wp_customize->add_setting( 'header_background_color', array(
		'default'  => '#ffffff',
		'type'     => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_colorcode',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_background_color', array(
		'label'    => __( '背景色', 'emanon-premium' ),
		'section'  => 'emanon_header_colors',
		'settings' => 'header_background_color',
		'priority' => 1,
	) ) );

	// Header info color
	$wp_customize->add_setting( 'header_info_color', array(
		'default'  => '#333333',
		'type'     => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_colorcode',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_info_color', array(
		'label'    => __( 'ヘッダーCTA', 'emanon-premium' ),
		'section'  => 'emanon_header_colors',
		'settings' => 'header_info_color',
		'priority' => 2,
	) ) );
	
	// SNS brand color
	$wp_customize->add_setting( 'header_sns_brand_color', array(
		'default' => false,
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'header_sns_brand_color', array(
		'label' =>__( 'SNSブランドカラー', 'emanon-premium' ),
		'description' => __( 'SNSフォローボタン［ヘッダー］に適用されます。', 'emanon-premium' ),
		'section'  => 'emanon_header_colors',
		'settings' => 'header_sns_brand_color',
		'type' => 'checkbox',
		'priority' => 3,
	) );

	// Site title color
	$wp_customize->add_setting( 'site_title_color', array(
		'default'  => '#333333',
		'type'     => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_colorcode',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'site_title_color', array(
		'label'    => __( 'サイトタイトル', 'emanon-premium' ),
		'section'  => 'emanon_header_colors',
		'settings' => 'site_title_color',
		'priority' => 4,
	) ) );

	// Site description color
	$wp_customize->add_setting( 'site_description_color', array(
		'default'  => '#484848',
		'type'     => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_colorcode',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'site_description_color', array(
		'label'    => __( 'キャッチコピー', 'emanon-premium' ),
		'section'  => 'emanon_header_colors',
		'settings' => 'site_description_color',
		'priority' => 5,
	) ) );