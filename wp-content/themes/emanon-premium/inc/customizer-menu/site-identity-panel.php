<?php
/**
 * Theme customizer site identity panel
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

	// ロゴ [SP]の設定
	$wp_customize->add_setting( 'header_logo_sp', array(
		'default' => '',
		'type' => 'theme_mod',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'header_logo_sp', array (
		'label' => __( 'ロゴ [SP]', 'emanon-premium' ),
		'section' => 'title_tagline',
		'settings' => 'header_logo_sp',
		'priority' => 8,
	) ) );

	// ロゴ[SP]の位置設定
	$wp_customize->add_setting( 'header_logo_layout_sp', array(
		'default' => 'is-center',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_radio_select',
	) );
	$wp_customize->add_control( 'header_logo_layout_sp', array(
		'label' => __( 'ロゴ(サイトタイトル) レイアウト［SP］', 'emanon-premium' ),
		'section' => 'title_tagline',
		'settings' => 'header_logo_layout_sp',
		'type' => 'radio',
		'choices' => array(
			'is-center' => __( '中央配置', 'emanon-premium' ),
			'is-left'   => __( '左配置', 'emanon-premium' ),
			),
		'priority' => 8,
	) );

	// アイコンロゴ[PC]の設定
	$wp_customize->add_setting( 'header_icon_logo_pc', array(
		'default' => '',
		'type' => 'theme_mod',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'header_icon_logo_pc', array (
		'label' => __( 'アイコンロゴ [PC]', 'emanon-premium' ),
		'section' => 'title_tagline',
		'settings' => 'header_icon_logo_pc',
		'priority' => 8,
	) ) );

	// アイコンロゴ[SP]の設定
	$wp_customize->add_setting( 'header_icon_logo_sp', array(
		'default' => '',
		'type' => 'theme_mod',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'header_icon_logo_sp', array (
		'label' => __( 'アイコンロゴ [SP]', 'emanon-premium' ),
		'section' => 'title_tagline',
		'settings' => 'header_icon_logo_sp',
		'priority' => 9,
	) ) );

	// キャッチフレーズ[PC]の設定
	$wp_customize->add_setting( 'display_header_tagline_pc', array(
		'default' => false,
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'display_header_tagline_pc', array(
		'label' =>__( 'キャッチフレーズ[PC]の表示', 'emanon-premium' ),
		'section' => 'title_tagline',
		'settings' => 'display_header_tagline_pc',
		'type' => 'checkbox',
		'priority' => 10,
	) );

	// キャッチフレーズ[SP]の設定
	$wp_customize->add_setting( 'display_header_tagline_sp', array(
		'default' => false,
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'display_header_tagline_sp', array(
		'label' =>__( 'キャッチフレーズ[SP]の表示', 'emanon-premium' ),
		'section' => 'title_tagline',
		'settings' => 'display_header_tagline_sp',
		'type' => 'checkbox',
		'priority' => 10,
	) );

	// キャッチフレーズの位置設定
	$wp_customize->add_setting( 'header_tagline_position', array(
		'default' => 'tagline_under_logo',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_radio_select',
	) );
	$wp_customize->add_control( 'header_tagline_position', array(
		'label' => __( 'キャッチフレーズの位置', 'emanon-premium' ),
		'section' => 'title_tagline',
		'settings' => 'header_tagline_position',
		'type' => 'radio',
		'choices' => array(
			'tagline_on_logo'    => __( 'ロゴ(サイトタイトル)の上部', 'emanon-premium' ),
			'tagline_under_logo' => __( 'ロゴ(サイトタイトル)の下部', 'emanon-premium' ),
			),
		'priority' => 10,
	) );

	// ロゴの高さ[PC]設定
	$wp_customize->add_setting( 'header_logo_height_pc', array(
		'default' => 30,
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_number',
	) );
	$wp_customize->add_control( 'header_logo_height_pc', array(
		'label' => __( 'ロゴの高さ [PC]', 'emanon-premium' ),
		'description' => __( '最大：60', 'emanon-premium' ),
		'section' => 'title_tagline',
		'settings' => 'header_logo_height_pc',
		'type' => 'number',
		'input_attrs' => array(
			'min' => 1,
			'max' => 60,
			'step' => 1,
		),
		'priority' => 10,
	) );

	// ロゴの高さ[SP]設定
	$wp_customize->add_setting( 'header_logo_height_sp', array(
		'default' => 30,
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_number',
	) );
	$wp_customize->add_control( 'header_logo_height_sp', array(
		'label' => __( 'ロゴの高さ [SP]', 'emanon-premium' ),
		'description' => __( '最大：40', 'emanon-premium' ),
		'section' => 'title_tagline',
		'settings' => 'header_logo_height_sp',
		'type' => 'number',
		'input_attrs' => array(
			'min' => 1,
			'max' => 40,
			'step' => 1,
		),
		'priority' => 11,
	) );

	// アイコンロゴの高さ[PC]設定
	$wp_customize->add_setting( 'header_icon_logo_height_pc', array(
		'default' => 26,
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_number',
	) );
	$wp_customize->add_control( 'header_icon_logo_height_pc', array(
		'label' => __( 'アイコンロゴの高さ[PC]', 'emanon-premium' ),
		'description' => __( '最大：60', 'emanon-premium' ),
		'section' => 'title_tagline',
		'settings' => 'header_icon_logo_height_pc',
		'type' => 'number',
		'input_attrs' => array(
			'min' => 1,
			'max' => 60,
			'step' => 1,
		),
		'priority' => 12,
	) );

	// アイコンロゴの高さ[SP]設定
	$wp_customize->add_setting( 'header_icon_logo_height_sp', array(
		'default' => 26,
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_number',
	) );
	$wp_customize->add_control( 'header_icon_logo_height_sp', array(
		'label' => __( 'アイコンロゴの高さ [SP]', 'emanon-premium' ),
		'description' => __( '最大：40', 'emanon-premium' ),
		'section' => 'title_tagline',
		'settings' => 'header_icon_logo_height_sp',
		'type' => 'number',
		'input_attrs' => array(
			'min' => 1,
			'max' => 40,
			'step' => 1,
		),
		'priority' => 13,
	) );

	// サイトタイトルのフォントサイズ[PC]
	$wp_customize->add_setting( 'header_site_title_size_pc', array(
		'default' => 36,
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_number',
	) );
	$wp_customize->add_control( 'header_site_title_size_pc', array(
		'label' => __( 'サイトタイトル フォントサイズ [PC]', 'emanon-premium' ),
		'section' => 'title_tagline',
		'settings' => 'header_site_title_size_pc',
		'type' => 'number',
		'input_attrs' => array(
			'min' => 1,
			'step' => 1,
		),
		'priority' => 14,
	) );

	// サイトタイトルのフォントサイズ［SP］
	$wp_customize->add_setting( 'header_site_title_size_sp', array(
		'default' => 36,
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_number',
	) );
	$wp_customize->add_control( 'header_site_title_size_sp', array(
		'label' => __( 'サイトタイトル フォントサイズ [SP]', 'emanon-premium' ),
		'description' => __( '最大：60', 'emanon-premium' ),
		'section' => 'title_tagline',
		'settings' => 'header_site_title_size_sp',
		'type' => 'number',
		'input_attrs' => array(
			'min' => 1,
			'max' => 60,
			'step' => 1,
		),
		'priority' => 15,
	) );