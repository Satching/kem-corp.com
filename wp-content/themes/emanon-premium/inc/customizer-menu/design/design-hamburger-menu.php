<?php
/**
 * Theme customizer Hamburger menu design
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

$wp_customize->add_section( 'emanon_hamburger_menu_design', array(
	'title'      => __( 'ハンバーガーメニュー設定', 'emanon-premium' ),
	'panel'      => 'emanon_design_settings',
	'priority'   => 6,
) );

	// ハンバーガーメニュー[PC]表示の設定
	$wp_customize->add_setting( 'display_hamburger_menu_pc', array(
		'default' => false,
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'display_hamburger_menu_pc', array(
		'label' =>__( 'ハンバーガーメニュー［PC］の表示', 'emanon-premium' ),
		'description' => __( 'パソコンでサイト表示時に反映', 'emanon-premium' ),
		'section' => 'emanon_hamburger_menu_design',
		'settings' => 'display_hamburger_menu_pc',
		'type' => 'checkbox',
		'priority' => 1,
	) );

	// ハンバーガーメニュー[SP]表示の設定
	$wp_customize->add_setting( 'display_hamburger_menu_sp', array(
		'default' => false,
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'display_hamburger_menu_sp', array(
		'label' =>__( 'ハンバーガーメニュー［SP］の表示', 'emanon-premium' ),
		'description' => __( 'スマホでサイト表示時に有効', 'emanon-premium' ),
		'section' => 'emanon_hamburger_menu_design',
		'settings' => 'display_hamburger_menu_sp',
		'type' => 'checkbox',
		'priority' => 2,
	) );

	// ハンバーガーメニュー［追従型］［SP］の表示
	$wp_customize->add_setting( 'display_floating_hamburger_menu_sp', array(
		'default' => false,
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'display_floating_hamburger_menu_sp', array(
		'label' =>__( 'ハンバーガーメニュー［追従型］の表示', 'emanon-premium' ),
		'description' => __( 'スマホでサイト表示時に反映', 'emanon-premium' ),
		'section' => 'emanon_hamburger_menu_design',
		'settings' => 'display_floating_hamburger_menu_sp',
		'type' => 'checkbox',
		'priority' => 3,
	) );
	
	// ハンバーガーメニューラベルの設定
	$wp_customize->add_setting( 'hamburger_menu_label', array(
		'default' => '',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_text',
	) );
	$wp_customize->add_control( 'hamburger_menu_label', array(
		'label' => __( 'ラベル', 'emanon-premium' ),
		'section' => 'emanon_hamburger_menu_design',
		'settings' => 'hamburger_menu_label',
		'type' => 'text',
		'priority' => 4,
	) );

	// ハンバーガーメニューラベル[SP]表示の設定
	$wp_customize->add_setting( 'display_hamburger_menu_label_sp', array(
		'default' => false,
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'display_hamburger_menu_label_sp', array(
		'label' =>__( 'ラベル［SP］の表示', 'emanon-premium' ),
		'description' => __( 'スマホでサイト表示時に反映', 'emanon-premium' ),
		'section' => 'emanon_hamburger_menu_design',
		'settings' => 'display_hamburger_menu_label_sp',
		'type' => 'checkbox',
		'priority' => 5,
	) );