<?php
/**
 * Theme customizer sidebar design
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

$wp_customize->add_section( 'emanon_sidebar_design', array(
	'title'      => __( 'サイドバー設定', 'emanon-premium' ),
	'panel'      => 'emanon_design_settings',
	'priority'   => 10,
) );

	// Sidebar design
	$wp_customize->add_setting( 'sidebar_design', array(
		'default'  => 'sidebar-no-padding-no-border',
		'type'     => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_radio_select',
	) );
	$wp_customize->add_control( 'sidebar_design', array(
		'label'    => __( 'サイドバーデザイン', 'emanon-premium' ),
		'section'  => 'emanon_sidebar_design',
		'settings' => 'sidebar_design',
		'type'     => 'select',
		'choices'  => array(
			'sidebar-no-padding-no-border'  => __( '余白なし + 枠線なし', 'emanon-premium' ),
			'sidebar-padding-border'        => __( '余白 + 枠線', 'emanon-premium' ),
			'sidebar-padding-border-radius' => __( '余白 + 枠線［角丸］', 'emanon-premium' ),
			'sidebar-padding'               => __( '余白', 'emanon-premium' ),
			'sidebar-padding-radius'        => __( '余白［角丸］', 'emanon-premium' ),
			),
		'priority' => 1,
	) );

	// Sidebar heading design
	$wp_customize->add_setting( 'sidebar_heading_design', array(
		'default'  => 'sidebar-none-style',
		'type'     => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_radio_select',
	) );
	$wp_customize->add_control( 'sidebar_heading_design', array(
		'label'    => __( '見出しデザイン', 'emanon-premium' ),
		'section'  => 'emanon_sidebar_design',
		'settings' => 'sidebar_heading_design',
		'type'     => 'select',
		'choices'  => array(
			'sidebar-none-style'           => __( 'なし', 'emanon-premium' ),
			'sidebar-border'               => __( 'ボーダー', 'emanon-premium' ),
			'sidebar-border-radius'        => __( 'ボーダー［角丸］', 'emanon-premium' ),
			'sidebar-border-left'          => __( 'ボーダー［左］', 'emanon-premium' ),
			'sidebar-bg-color'             => __( '背景色', 'emanon-premium' ),
			'sidebar-bg-color-radius'      => __( '背景色［角丸］', 'emanon-premium' ),
			'sidebar-speech-bubble'        => __( '吹き出し', 'emanon-premium' ),
			'sidebar-border-bottom'        => __( '下線', 'emanon-premium' ),
			'sidebar-stripe-border-bottom' => __( '下線［ストライプ］', 'emanon-premium' ),
			'sidebar-shortborder-bottom'   => __( '下線［ショート］', 'emanon-premium' ),
			'sidebar-lines-on-sides'       => __( '左右線', 'emanon-premium' ),
			'sidebar-lines-on-right'       => __( '右線', 'emanon-premium' ),
			),
		'priority' => 2,
	) );

	// Sidebar heading align
	$wp_customize->add_setting( 'sidebar_heading_align', array(
		'default'  => 'sidebar-left',
		'type'     => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_radio_select',
	) );
	$wp_customize->add_control( 'sidebar_heading_align', array(
		'label'    => __( '見出し配置', 'emanon-premium' ),
		'section'  => 'emanon_sidebar_design',
		'settings' => 'sidebar_heading_align',
		'type'     => 'radio',
		'choices'  => array(
			'sidebar-left'   => __( '左配置', 'emanon-premium' ),
			'sidebar-center' => __( '中央配置', 'emanon-premium' ),
			),
		'priority' => 3,
	) );