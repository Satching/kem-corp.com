<?php
/**
 * Theme customizer table of contents design
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

$wp_customize->add_section( 'emanon_toc_design', array(
	'title'      => __( '目次設定', 'emanon-premium' ),
	'panel'      => 'emanon_design_settings',
	'priority'   => 9,
) );

	// Parent list style
	$wp_customize->add_setting( 'toc_parent_list_design', array(
		'default'  => 'decimal',
		'type'     => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_radio_select',
	) );
	$wp_customize->add_control( 'toc_parent_list_design', array(
		'label'    => __( '親リストスタイル', 'emanon-premium' ),
		'section'  => 'emanon_toc_design',
		'settings' => 'toc_parent_list_design',
		'type'     => 'radio',
		'choices'  => array(
			'decimal'      => __( '連番', 'emanon-premium' ),
			'decimal-zero' => __( '0付き連番', 'emanon-premium' ),
			'disc'         => __( '丸', 'emanon-premium' ),
			'circle'       => __( '円', 'emanon-premium' ),
			'checkmark'    => __( 'チェック', 'emanon-premium' ),
			'arrow'        => __( '矢印', 'emanon-premium' ),
			'arrow-circle' => __( '矢印［円］', 'emanon-premium' ),
			'none'         => __( 'なし', 'emanon-premium' ),
			),
		'priority' => 1,
	) );

	// Children list style
	$wp_customize->add_setting( 'toc_children_list_design', array(
		'default'  => 'decimal',
		'type'     => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_radio_select',
	) );
	$wp_customize->add_control( 'toc_children_list_design', array(
		'label'    => __( '子リストスタイル', 'emanon-premium' ),
		'section'  => 'emanon_toc_design',
		'settings' => 'toc_children_list_design',
		'type'     => 'radio',
		'choices'  => array(
			'decimal'      => __( '連番', 'emanon-premium' ),
			'decimal-zero' => __( '0付き連番', 'emanon-premium' ),
			'disc'         => __( '丸', 'emanon-premium' ),
			'circle'       => __( '円', 'emanon-premium' ),
			'checkmark'    => __( 'チェック', 'emanon-premium' ),
			'arrow'        => __( '矢印', 'emanon-premium' ),
			'arrow-circle' => __( '矢印［円］', 'emanon-premium' ),
			'none'         => __( 'なし', 'emanon-premium' ),
			),
		'priority' => 2,
	) );

	// List item color
	$wp_customize->add_setting( 'toc_list_item_color', array(
		'default'  => 'primary-color',
		'type'     => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_radio_select',
	) );
	$wp_customize->add_control( 'toc_list_item_color', array(
		'label'    => __( 'リストアイテム色', 'emanon-premium' ),
		'section'  => 'emanon_toc_design',
		'settings' => 'toc_list_item_color',
		'type'     => 'radio',
		'choices'  => array(
			'primary-color'   => __( 'プライマリー', 'emanon-premium' ),
			'secondary-color' => __( 'セカンダリ', 'emanon-premium' ),
			'text-color'      => __( '文字色', 'emanon-premium' ),
			),
		'priority' => 3,
	) );

	// List item link color
	$wp_customize->add_setting( 'toc_list_item_link_color', array(
		'default'  => 'link-color',
		'type'     => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_radio_select',
	) );
	$wp_customize->add_control( 'toc_list_item_link_color', array(
		'label'    => __( 'リストリンク色', 'emanon-premium' ),
		'section'  => 'emanon_toc_design',
		'settings' => 'toc_list_item_link_color',
		'type'     => 'radio',
		'choices'  => array(
			'link-color'      => __( 'リンク', 'emanon-premium' ),
			'primary-color'   => __( 'プライマリー', 'emanon-premium' ),
			'secondary-color' => __( 'セカンダリ', 'emanon-premium' ),
			'text-color'      => __( '文字色', 'emanon-premium' ),
			),
		'priority' => 4,
	) );

	// Border style design
	$wp_customize->add_setting( 'toc_border_style_design', array(
		'default'  => 'border',
		'type'     => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_radio_select',
	) );
	$wp_customize->add_control( 'toc_border_style_design', array(
		'label'    => __( '枠線色', 'emanon-premium' ),
		'section'  => 'emanon_toc_design',
		'settings' => 'toc_border_style_design',
		'type'     => 'radio',
		'choices'  => array(
			'border'                     => __( 'ボーダー', 'emanon-premium' ),
			'border-primary-color'       => __( 'プライマリー', 'emanon-premium' ),
			'border-secondary-color'     => __( 'セカンダリ', 'emanon-premium' ),
			'border-top-primary-color'   => __( 'ボーダートップ［プライマリー］', 'emanon-premium' ),
			'border-top-secondary-color' => __( 'ボーダートップ［セカンダリ］', 'emanon-premium' ),
			'none'                       => __( 'なし', 'emanon-premium' ),
			),
		'priority' => 5,
	) );

	// Border style design
	$wp_customize->add_setting( 'toc_background_style_design', array(
		'default'  => 'none',
		'type'     => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_radio_select',
	) );
	$wp_customize->add_control( 'toc_background_style_design', array(
		'label'    => __( '背景色', 'emanon-premium' ),
		'section'  => 'emanon_toc_design',
		'settings' => 'toc_background_style_design',
		'type'     => 'radio',
		'choices'  => array(
			'none'   => __( 'なし', 'emanon-premium' ),
			'background-white-color' => __( '白', 'emanon-premium' ),
			'background-gray-color'  => __( 'グレー', 'emanon-premium' ),
			),
		'priority' => 6,
	) );

	// Toggle switch color
	$wp_customize->add_setting( 'toc_toggle_switch_color', array(
		'default'  => 'primary-color',
		'type'     => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_radio_select',
	) );
	$wp_customize->add_control( 'toc_toggle_switch_color', array(
		'label'    => __( '開閉ボタン色', 'emanon-premium' ),
		'section'  => 'emanon_toc_design',
		'settings' => 'toc_toggle_switch_color',
		'type'     => 'radio',
		'choices'  => array(
			'primary-color'   => __( 'プライマリー', 'emanon-premium' ),
			'secondary-color' => __( 'セカンダリ', 'emanon-premium' ),
			),
		'priority' => 7,
	) );