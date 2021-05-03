<?php
/**
 * Theme customizer drawer menu design
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

$wp_customize->add_section( 'emanon_drawer_design', array(
	'title'      => __( 'ドロワーメニュー設定', 'emanon-premium' ),
	'panel'      => 'emanon_design_settings',
	'priority'   => 7,
) );

	// Drawer menu title
	$wp_customize->add_setting( 'drawer_menu_title', array(
		'default' => '',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_text',
	) );
	$wp_customize->add_control( 'drawer_menu_title', array(
		'label' => __( 'タイトル', 'emanon-premium' ),
		'section'  => 'emanon_drawer_design',
		'settings' => 'drawer_menu_title',
		'type' => 'text',
		'priority' => 1,
	) );

	// Drawer menu parent list style
	$wp_customize->add_setting( 'drawer_menu_parent_list_design', array(
		'default'  => 'disc',
		'type'     => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_radio_select',
	) );
	$wp_customize->add_control( 'drawer_menu_parent_list_design', array(
		'label'    => __( 'メニュー：親リスト要素', 'emanon-premium' ),
		'section'  => 'emanon_drawer_design',
		'settings' => 'drawer_menu_parent_list_design',
		'type'     => 'radio',
		'choices'  => array(
			'disc'         => __( '丸', 'emanon-premium' ),
			'arrow'        => __( '矢印', 'emanon-premium' ),
			'arrow-circle' => __( '矢印［円］', 'emanon-premium' ),
			'none'         => __( 'なし', 'emanon-premium' ),
			),
		'priority' => 2,
	) );

	// Drawer menu children list style
	$wp_customize->add_setting( 'drawer_menu_children_list_design', array(
		'default'  => 'disc',
		'type'     => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_radio_select',
	) );
	$wp_customize->add_control( 'drawer_menu_children_list_design', array(
		'label'    => __( 'メニュー：子リスト要素', 'emanon-premium' ),
		'section'  => 'emanon_drawer_design',
		'settings' => 'drawer_menu_children_list_design',
		'type'     => 'radio',
		'choices'  => array(
			'disc'         => __( '丸', 'emanon-premium' ),
			'arrow'        => __( '矢印', 'emanon-premium' ),
			'arrow-circle' => __( '矢印［円］', 'emanon-premium' ),
			'ruled-line'   => __( 'L', 'emanon-premium' ),
			'none'         => __( 'なし', 'emanon-premium' ),
			),
		'priority' => 3,
	) );

	// Drawer menu heading design
	$wp_customize->add_setting( 'drawer_menu_heading_design', array(
		'default'  => 'drawer-none-style',
		'type'     => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_radio_select',
	) );
	$wp_customize->add_control( 'drawer_menu_heading_design', array(
		'label'    => __( '見出しデザイン', 'emanon-premium' ),
		'section'  => 'emanon_drawer_design',
		'settings' => 'drawer_menu_heading_design',
		'type'     => 'select',
		'choices'  => array(
			'drawer-none-style'           => __( 'なし', 'emanon-premium' ),
			'drawer-border'               => __( 'ボーダー', 'emanon-premium' ),
			'drawer-border-radius'        => __( 'ボーダー［角丸］', 'emanon-premium' ),
			'drawer-border-left'          => __( 'ボーダー［左］', 'emanon-premium' ),
			'drawer-bg-color'             => __( '背景色', 'emanon-premium' ),
			'drawer-bg-color-radius'      => __( '背景色［角丸］', 'emanon-premium' ),
			'drawer-speech-bubble'        => __( '吹き出し', 'emanon-premium' ),
			'drawer-border-bottom'        => __( '下線', 'emanon-premium' ),
			'drawer-stripe-border-bottom' => __( '下線［ストライプ］', 'emanon-premium' ),
			'drawer-shortborder-bottom'   => __( '下線［ショート］', 'emanon-premium' ),
			'drawer-lines-on-sides'       => __( '左右線', 'emanon-premium' ),
			'drawer-lines-on-right'       => __( '右線', 'emanon-premium' ),
			),
		'priority' => 4,
	) );

	// Drawer menu heading align
	$wp_customize->add_setting( 'drawer_menu_heading_align', array(
		'default'  => 'drawer-left',
		'type'     => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_radio_select',
	) );
	$wp_customize->add_control( 'drawer_menu_heading_align', array(
		'label'    => __( '見出し配置', 'emanon-premium' ),
		'section'  => 'emanon_drawer_design',
		'settings' => 'drawer_menu_heading_align',
		'type'     => 'radio',
		'choices'  => array(
			'drawer-left'   => __( '左配置', 'emanon-premium' ),
			'drawer-center' => __( '中央配置', 'emanon-premium' ),
			),
		'priority' => 5,
	) );
