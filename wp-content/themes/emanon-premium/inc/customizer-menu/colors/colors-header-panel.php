<?php
/**
 * Theme customizer header panel
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

/**
 * header panelカラーの設定
 */
$wp_customize->add_section( 'emanon_header_panel_colors', array(
	'title'    => __( 'ヘッダーパネル設定', 'emanon-premium' ),
	'panel'    => 'emanon_colors_settings',
	'priority' => 5,
) );

	// Icon color
	$wp_customize->add_setting( 'header_cta_icon_color', array(
		'default'  => '#828990',
		'type'     => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_colorcode',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_cta_icon_color', array(
		'label'    => __( 'アイコン', 'emanon-premium' ),
		'section'  => 'emanon_header_panel_colors',
		'settings' => 'header_cta_icon_color',
		'priority' => 1,
	) ) );

	// Button color
	$wp_customize->add_setting( 'header_cta_button_color', array(
		'default'  => emanon_primary_color(),
		'type'     => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_colorcode',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_cta_button_color', array(
		'label'    => __( 'ボタン', 'emanon-premium' ),
		'section'  => 'emanon_header_panel_colors',
		'settings' => 'header_cta_button_color',
		'priority' => 2,
	) ) );

	// Button hover color
	$wp_customize->add_setting( 'header_cta_button_hover_color', array(
		'default'  => emanon_primary_light_color(),
		'type'     => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_colorcode',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_cta_button_hover_color', array(
		'label'    => __( 'ボタン［ホバー］', 'emanon-premium' ),
		'section'  => 'emanon_header_panel_colors',
		'settings' => 'header_cta_button_hover_color',
		'priority' => 3,
	) ) );

	// Panel background color
	$wp_customize->add_setting( 'header_panel_background_color', array(
		'default'  => '#484848',
		'type'     => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_colorcode',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_panel_background_color', array(
		'label'    => __( 'パネル［背景色］', 'emanon-premium' ),
		'section'  => 'emanon_header_panel_colors',
		'settings' => 'header_panel_background_color',
		'priority' => 7,
	) ) );

	// Panel background color opacity
	$wp_customize->add_setting( 'header_panel_background_color_opacity', array(
		'default' => 1,
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_range_slider'
	) );
	$wp_customize->add_control( new Emanon_WP_Customize_Range_slider_Control( $wp_customize, 'header_panel_background_color_opacity', array(
		'label' => __( 'パネル［透過率］', 'emanon-premium' ),
		'section'  => 'emanon_header_panel_colors',
		'settings' => 'header_panel_background_color_opacity',
		'min' => 0,
		'max' => 1,
		'step' => 0.1,
		'priority' => 8,
	) ) );

	// Panel text color
	$wp_customize->add_setting( 'header_panel_text_color', array(
		'default'  => '#ffffff',
		'type'     => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_colorcode',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_panel_text_color', array(
		'label'    => __( 'パネル［文字］', 'emanon-premium' ),
		'section'  => 'emanon_header_panel_colors',
		'settings' => 'header_panel_text_color',
		'priority' => 9,
	) ) );