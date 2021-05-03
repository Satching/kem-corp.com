<?php
/**
 * Theme customizer general design
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

$wp_customize->add_section( 'emanon_general_design', array(
	'title'      => __( '全般設定', 'emanon-premium' ),
	'panel'      => 'emanon_design_settings',
	'priority'   => 4,
) );

	// Button border radius
	$wp_customize->add_setting( 'button_border_radius_design', array(
		'default'  => 'standard-corner',
		'type'     => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_radio_select',
	) );
	$wp_customize->add_control( 'button_border_radius_design', array(
		'label'    => __( 'ボタン スタイル', 'emanon-premium' ),
		'description' => __( 'buttonタグ・submitタグは非対応です。', 'emanon-premium' ),
		'section'  => 'emanon_general_design',
		'settings' => 'button_border_radius_design',
		'type'     => 'radio',
		'choices'  => array(
			'standard-corner' => __( '標準', 'emanon-premium' ),
			'large-corner'    => __( '角丸', 'emanon-premium' ),
			'none-corner'     => __( '角丸なし', 'emanon-premium' ),
			),
		'priority' => 1,
	) );

	// Button hover animation
	$wp_customize->add_setting( 'button_hover_animation_design', array(
		'default'  => 'transparen',
		'type'     => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_radio_select',
	) );
	$wp_customize->add_control( 'button_hover_animation_design', array(
		'label'    => __( 'ボタン ホバーアニメーション', 'emanon-premium' ),
		'description' => __( 'buttonタグ・submitタグは非対応です。', 'emanon-premium' ),
		'section'  => 'emanon_general_design',
		'settings' => 'button_hover_animation_design',
		'type'     => 'radio',
		'choices'  => array(
			'transparen' => __( '透過', 'emanon-premium' ),
			'corner'     => __( '角丸', 'emanon-premium' ),
			'shadow'     => __( 'シャドウ', 'emanon-premium' ),
			'floating'   => __( 'フローティング', 'emanon-premium' ),
			'falldown'   => __( 'フォールダウン', 'emanon-premium' ),
			'lustre'     => __( '光沢', 'emanon-premium' ),
			'none'       => __( 'アニメーションなし', 'emanon-premium' ),
			),
		'priority' => 2,
	) );