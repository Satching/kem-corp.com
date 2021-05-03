<?php
/**
 * Theme customizer widget design
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

$wp_customize->add_section( 'emanon_widget_design', array(
	'title'      => __( 'ウィジェット設定', 'emanon-premium' ),
	'panel'      => 'emanon_design_settings',
	'priority'   => 12,
) );

	// Widget categories parent list style
	$wp_customize->add_setting( 'category_parent_list_design', array(
		'default'  => 'disc',
		'type'     => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_radio_select',
	) );
	$wp_customize->add_control( 'category_parent_list_design', array(
		'label'    => __( '［カテゴリー］ 親リストスタイル', 'emanon-premium' ),
		'section'  => 'emanon_widget_design',
		'settings' => 'category_parent_list_design',
		'type'     => 'radio',
		'choices'  => array(
			'disc'         => __( '丸', 'emanon-premium' ),
			'arrow'        => __( '矢印', 'emanon-premium' ),
			'arrow-circle' => __( '矢印［円］', 'emanon-premium' ),
			'none'         => __( 'なし', 'emanon-premium' ),
			),
		'priority' => 1,
	) );

	// Widget categories children list style
	$wp_customize->add_setting( 'category_children_list_design', array(
		'default'  => 'disc',
		'type'     => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_radio_select',
	) );
	$wp_customize->add_control( 'category_children_list_design', array(
		'label'    => __( '［カテゴリー］ 子リストスタイル', 'emanon-premium' ),
		'section'  => 'emanon_widget_design',
		'settings' => 'category_children_list_design',
		'type'     => 'radio',
		'choices'  => array(
			'disc'         => __( '丸', 'emanon-premium' ),
			'arrow'        => __( '矢印', 'emanon-premium' ),
			'arrow-circle' => __( '矢印［円］', 'emanon-premium' ),
			'ruled-line'   => __( 'L', 'emanon-premium' ),
			'none'         => __( 'なし', 'emanon-premium' ),
			),
		'priority' => 2,
	) );

	// Widget categories post counts style
	$wp_customize->add_setting( 'category_post_counts_style', array(
		'default'  => 'square',
		'type'     => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_radio_select',
	) );
	$wp_customize->add_control( 'category_post_counts_style', array(
		'label'    => __( '［カテゴリー］投稿数スタイル', 'emanon-premium' ),
		'section'  => 'emanon_widget_design',
		'settings' => 'category_post_counts_style',
		'type'     => 'radio',
		'choices'  => array(
			'square' => __( '四角形', 'emanon-premium' ),
			'circle' => __( '円形', 'emanon-premium' ),
			),
		'priority' => 3,
	) );

	// Widget archive list style
	$wp_customize->add_setting( 'archive_list_design', array(
		'default'  => 'disc',
		'type'     => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_radio_select',
	) );
	$wp_customize->add_control( 'archive_list_design', array(
		'label'    => __( '［アーカイブ］ リストスタイル', 'emanon-premium' ),
		'section'  => 'emanon_widget_design',
		'settings' => 'archive_list_design',
		'type'     => 'radio',
		'choices'  => array(
			'disc'         => __( '丸', 'emanon-premium' ),
			'arrow'        => __( '矢印', 'emanon-premium' ),
			'arrow-circle' => __( '矢印［円］', 'emanon-premium' ),
			'none'         => __( 'なし', 'emanon-premium' ),
			),
		'priority' => 4,
	) );

	// Widget archive post counts style
	$wp_customize->add_setting( 'archive_post_counts_style', array(
		'default'  => 'square',
		'type'     => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_radio_select',
	) );
	$wp_customize->add_control( 'archive_post_counts_style', array(
		'label'    => __( '［アーカイブ］投稿数スタイル', 'emanon-premium' ),
		'section'  => 'emanon_widget_design',
		'settings' => 'archive_post_counts_style',
		'type'     => 'radio',
		'choices'  => array(
			'square' => __( '四角形', 'emanon-premium' ),
			'circle' => __( '円形', 'emanon-premium' ),
			),
		'priority' => 5,
	) );

	// Widget navigation menu parent list style
	$wp_customize->add_setting( 'navigation_menu_parent_list_design', array(
		'default'  => 'disc',
		'type'     => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_radio_select',
	) );
	$wp_customize->add_control( 'navigation_menu_parent_list_design', array(
		'label'    => __( '［メニュー］ 親リスト要素', 'emanon-premium' ),
		'section'  => 'emanon_widget_design',
		'settings' => 'navigation_menu_parent_list_design',
		'type'     => 'radio',
		'choices'  => array(
			'disc'         => __( '丸', 'emanon-premium' ),
			'arrow'        => __( '矢印', 'emanon-premium' ),
			'arrow-circle' => __( '矢印［円］', 'emanon-premium' ),
			'none'         => __( 'なし', 'emanon-premium' ),
			),
		'priority' => 6,
	) );

	// Widget navigation menu children list style
	$wp_customize->add_setting( 'navigation_menu_children_list_design', array(
		'default'  => 'disc',
		'type'     => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_radio_select',
	) );
	$wp_customize->add_control( 'navigation_menu_children_list_design', array(
		'label'    => __( '［メニュー］子リスト要素', 'emanon-premium' ),
		'section'  => 'emanon_widget_design',
		'settings' => 'navigation_menu_children_list_design',
		'type'     => 'radio',
		'choices'  => array(
			'disc'         => __( '丸', 'emanon-premium' ),
			'arrow'        => __( '矢印', 'emanon-premium' ),
			'arrow-circle' => __( '矢印［円］', 'emanon-premium' ),
			'ruled-line'   => __( 'L', 'emanon-premium' ),
			'none'         => __( 'なし', 'emanon-premium' ),
			),
		'priority' => 7,
	) );

	// Widget section sub title style
	$wp_customize->add_setting( 'section_sub_title_design', array(
		'default'  => 'normal',
		'type'     => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_radio_select',
	) );
	$wp_customize->add_control( 'section_sub_title_design', array(
		'label'    => __( '［セクション］サブタイトル', 'emanon-premium' ),
		'section'  => 'emanon_widget_design',
		'settings' => 'section_sub_title_design',
		'type'     => 'radio',
		'choices'  => array(
			'normal'      => __( '通常', 'emanon-premium' ),
			'above-title' => __( 'タイトルの上', 'emanon-premium' ),
			),
		'priority' => 8,
	) );
