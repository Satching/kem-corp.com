<?php
/**
 * Theme customizer typography design
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

$wp_customize->add_section( 'emanon_typography_design', array(
	'title'      => __( 'フォントスタイル設定', 'emanon-premium' ),
	'panel'      => 'emanon_design_settings',
	'priority'   => 5,
) );

	// Site title font family
	$wp_customize->add_setting( 'header_site_title_font_family', array(
		'default'  => 'sans-serif',
		'type'     => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_radio_select',
	) );
	$wp_customize->add_control( 'header_site_title_font_family', array(
		'label'    => __( 'サイトタイトル', 'emanon-premium' ),
		'section'  => 'emanon_typography_design',
		'settings' => 'header_site_title_font_family',
		'type'     => 'select',
		'choices'  => array(
			'sans-serif'    => __( 'ゴシック・サンセリフ', 'emanon-premium' ),
			'serif'         => __( '明朝・セリフ', 'emanon-premium' ),
			'noto_sans_jp'  => __( 'Noto Sans JP - Google Fonts', 'emanon-premium' ),
			'noto_serif_jp' => __( 'Noto Serif JP - Google Fonts', 'emanon-premium' ),
			),
		'priority' => 1,
	) );

	// Site title font weight
	$wp_customize->add_setting( 'header_site_title_font_weight', array(
		'default'  => 'bold',
		'type'     => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_radio_select',
	) );
	$wp_customize->add_control( 'header_site_title_font_weight', array(
		'label'    => __( 'フォントウェイト', 'emanon-premium' ),
		'section'  => 'emanon_typography_design',
		'settings' => 'header_site_title_font_weight',
		'type'     => 'radio',
		'choices'  => array(
			'bold'   => __( '太文字', 'emanon-premium' ),
			'normal' => __( '標準', 'emanon-premium' ),
			),
		'priority' => 2,
	) );


	// Site tagline font family
	$wp_customize->add_setting( 'header_site_tagline_font_family', array(
		'default'  => 'sans-serif',
		'type'     => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_radio_select',
	) );
	$wp_customize->add_control( 'header_site_tagline_font_family', array(
		'label'    => __( 'キャッチフレーズ', 'emanon-premium' ),
		'section'  => 'emanon_typography_design',
		'settings' => 'header_site_tagline_font_family',
		'type'     => 'select',
		'choices'  => array(
			'sans-serif'    => __( 'ゴシック・サンセリフ', 'emanon-premium' ),
			'serif'         => __( '明朝・セリフ', 'emanon-premium' ),
			'noto_sans_jp'  => __( 'Noto Sans JP - Google Fonts', 'emanon-premium' ),
			'noto_serif_jp' => __( 'Noto Serif JP - Google Fonts', 'emanon-premium' ),
			),
		'priority' => 3,
	) );

	// Site title font weight
	$wp_customize->add_setting( 'header_site_tagline_font_weight', array(
		'default'  => 'normal',
		'type'     => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_radio_select',
	) );
	$wp_customize->add_control( 'header_site_tagline_font_weight', array(
		'label'    => __( 'フォントウェイト', 'emanon-premium' ),
		'section'  => 'emanon_typography_design',
		'settings' => 'header_site_tagline_font_weight',
		'type'     => 'radio',
		'choices'  => array(
			'bold'   => __( '太文字', 'emanon-premium' ),
			'normal' => __( '標準', 'emanon-premium' ),
			),
		'priority' => 4,
	) );

	// First view title font family
	$wp_customize->add_setting( 'main_visual_title_font_family', array(
		'default'  => 'sans-serif',
		'type'     => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_radio_select',
	) );
	$wp_customize->add_control( 'main_visual_title_font_family', array(
		'label'    => __( 'ファーストビュー タイトル', 'emanon-premium' ),
		'section'  => 'emanon_typography_design',
		'settings' => 'main_visual_title_font_family',
		'type'     => 'select',
		'choices'  => array(
			'sans-serif'    => __( 'ゴシック・サンセリフ', 'emanon-premium' ),
			'serif'         => __( '明朝・セリフ', 'emanon-premium' ),
			'noto_sans_jp'  => __( 'Noto Sans JP - Google Fonts', 'emanon-premium' ),
			'noto_serif_jp' => __( 'Noto Serif JP - Google Fonts', 'emanon-premium' ),
			),
		'priority' => 5,
	) );

	// First view title font weight
	$wp_customize->add_setting( 'main_visual_title_font_weight', array(
		'default'  => 'bold',
		'type'     => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_radio_select',
	) );
	$wp_customize->add_control( 'main_visual_title_font_weight', array(
		'label'    => __( 'フォントウェイト', 'emanon-premium' ),
		'section'  => 'emanon_typography_design',
		'settings' => 'main_visual_title_font_weight',
		'type'     => 'radio',
		'choices'  => array(
			'bold'   => __( '太文字', 'emanon-premium' ),
			'normal' => __( '標準', 'emanon-premium' ),
			),
		'priority' => 6,
	) );

	// First view sub title font family
	$wp_customize->add_setting( 'main_visual_sub_title_font_family', array(
		'default'  => 'sans-serif',
		'type'     => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_radio_select',
	) );
	$wp_customize->add_control( 'main_visual_sub_title_font_family', array(
		'label'    => __( 'ファーストビュー サブタイトル', 'emanon-premium' ),
		'section'  => 'emanon_typography_design',
		'settings' => 'main_visual_sub_title_font_family',
		'type'     => 'select',
		'choices'  => array(
			'sans-serif'    => __( 'ゴシック・サンセリフ', 'emanon-premium' ),
			'serif'         => __( '明朝・セリフ', 'emanon-premium' ),
			'noto_sans_jp'  => __( 'Noto Sans JP - Google Fonts', 'emanon-premium' ),
			'noto_serif_jp' => __( 'Noto Serif JP - Google Fonts', 'emanon-premium' ),
			),
		'priority' => 7,
	) );

	// First view sub title font weight
	$wp_customize->add_setting( 'main_visual_sub_title_font_weight', array(
		'default'  => 'normal',
		'type'     => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_radio_select',
	) );
	$wp_customize->add_control( 'main_visual_sub_title_font_weight', array(
		'label'    => __( 'フォントウェイト', 'emanon-premium' ),
		'section'  => 'emanon_typography_design',
		'settings' => 'main_visual_sub_title_font_weight',
		'type'     => 'radio',
		'choices'  => array(
			'bold'   => __( '太文字', 'emanon-premium' ),
			'normal' => __( '標準', 'emanon-premium' ),
			),
		'priority' => 8,
	) );

	// First view message font family
	$wp_customize->add_setting( 'main_visual_message_font_family', array(
		'default'  => 'sans-serif',
		'type'     => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_radio_select',
	) );
	$wp_customize->add_control( 'main_visual_message_font_family', array(
		'label'    => __( 'ファーストビュー メッセージ', 'emanon-premium' ),
		'section'  => 'emanon_typography_design',
		'settings' => 'main_visual_message_font_family',
		'type'     => 'select',
		'choices'  => array(
			'sans-serif'    => __( 'ゴシック・サンセリフ', 'emanon-premium' ),
			'serif'         => __( '明朝・セリフ', 'emanon-premium' ),
			'noto_sans_jp'  => __( 'Noto Sans JP - Google Fonts', 'emanon-premium' ),
			'noto_serif_jp' => __( 'Noto Serif JP - Google Fonts', 'emanon-premium' ),
			),
		'priority' => 9,
	) );

	// First view message font weight
	$wp_customize->add_setting( 'main_visual_message_font_weight', array(
		'default'  => 'normal',
		'type'     => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_radio_select',
	) );
	$wp_customize->add_control( 'main_visual_message_font_weight', array(
		'label'    => __( 'フォントウェイト', 'emanon-premium' ),
		'section'  => 'emanon_typography_design',
		'settings' => 'main_visual_message_font_weight',
		'type'     => 'radio',
		'choices'  => array(
			'bold'   => __( '太文字', 'emanon-premium' ),
			'normal' => __( '標準', 'emanon-premium' ),
			),
		'priority' => 10,
	) );

	// h1 font family
	$wp_customize->add_setting( 'h1_font_family', array(
		'default'  => 'sans-serif',
		'type'     => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_radio_select',
	) );
	$wp_customize->add_control( 'h1_font_family', array(
		'label'    => __( 'h1 | ページタイトル', 'emanon-premium' ),
		'section'  => 'emanon_typography_design',
		'settings' => 'h1_font_family',
		'type'     => 'select',
		'choices'  => array(
			'sans-serif'    => __( 'ゴシック・サンセリフ', 'emanon-premium' ),
			'serif'         => __( '明朝・セリフ', 'emanon-premium' ),
			'noto_sans_jp'  => __( 'Noto Sans JP - Google Fonts', 'emanon-premium' ),
			'noto_serif_jp' => __( 'Noto Serif JP - Google Fonts', 'emanon-premium' ),
			),
		'priority' => 11,
	) );

	// h1 font weight
	$wp_customize->add_setting( 'h1_font_weight', array(
		'default'  => 'bold',
		'type'     => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_radio_select',
	) );
	$wp_customize->add_control( 'h1_font_weight', array(
		'label'    => __( 'フォントウェイト', 'emanon-premium' ),
		'section'  => 'emanon_typography_design',
		'settings' => 'h1_font_weight',
		'type'     => 'radio',
		'choices'  => array(
			'bold'   => __( '太文字', 'emanon-premium' ),
			'normal' => __( '標準', 'emanon-premium' ),
			),
		'priority' => 12,
	) );

	// h2 font family
	$wp_customize->add_setting( 'h2_font_family', array(
		'default'  => 'sans-serif',
		'type'     => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_radio_select',
	) );
	$wp_customize->add_control( 'h2_font_family', array(
		'label'    => __( 'h2', 'emanon-premium' ),
		'section'  => 'emanon_typography_design',
		'settings' => 'h2_font_family',
		'type'     => 'select',
		'choices'  => array(
			'sans-serif'    => __( 'ゴシック・サンセリフ', 'emanon-premium' ),
			'serif'         => __( '明朝・セリフ', 'emanon-premium' ),
			'noto_sans_jp'  => __( 'Noto Sans JP - Google Fonts', 'emanon-premium' ),
			'noto_serif_jp' => __( 'Noto Serif JP - Google Fonts', 'emanon-premium' ),
			),
		'priority' => 13,
	) );

	// h2 font weight
	$wp_customize->add_setting( 'h2_font_weight', array(
		'default'  => 'bold',
		'type'     => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_radio_select',
	) );
	$wp_customize->add_control( 'h2_font_weight', array(
		'label'    => __( 'フォントウェイト', 'emanon-premium' ),
		'section'  => 'emanon_typography_design',
		'settings' => 'h2_font_weight',
		'type'     => 'radio',
		'choices'  => array(
			'bold'   => __( '太文字', 'emanon-premium' ),
			'normal' => __( '標準', 'emanon-premium' ),
			),
		'priority' => 14,
	) );

	// h3 font family
	$wp_customize->add_setting( 'h3_font_family', array(
		'default'  => 'sans-serif',
		'type'     => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_radio_select',
	) );
	$wp_customize->add_control( 'h3_font_family', array(
		'label'    => __( 'h3', 'emanon-premium' ),
		'section'  => 'emanon_typography_design',
		'settings' => 'h3_font_family',
		'type'     => 'select',
		'choices'  => array(
			'sans-serif'    => __( 'ゴシック・サンセリフ', 'emanon-premium' ),
			'serif'         => __( '明朝・セリフ', 'emanon-premium' ),
			'noto_sans_jp'  => __( 'Noto Sans JP - Google Fonts', 'emanon-premium' ),
			'noto_serif_jp' => __( 'Noto Serif JP - Google Fonts', 'emanon-premium' ),
			),
		'priority' => 15,
	) );

	// h3 font weight
	$wp_customize->add_setting( 'h3_font_weight', array(
		'default'  => 'bold',
		'type'     => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_radio_select',
	) );
	$wp_customize->add_control( 'h3_font_weight', array(
		'label'    => __( 'フォントウェイト', 'emanon-premium' ),
		'section'  => 'emanon_typography_design',
		'settings' => 'h3_font_weight',
		'type'     => 'radio',
		'choices'  => array(
			'bold'   => __( '太文字', 'emanon-premium' ),
			'normal' => __( '標準', 'emanon-premium' ),
			),
		'priority' => 16,
	) );
	
	// h4 font family
	$wp_customize->add_setting( 'h4_font_family', array(
		'default'  => 'sans-serif',
		'type'     => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_radio_select',
	) );
	$wp_customize->add_control( 'h4_font_family', array(
		'label'    => __( 'h4', 'emanon-premium' ),
		'section'  => 'emanon_typography_design',
		'settings' => 'h4_font_family',
		'type'     => 'select',
		'choices'  => array(
			'sans-serif'    => __( 'ゴシック・サンセリフ', 'emanon-premium' ),
			'serif'         => __( '明朝・セリフ', 'emanon-premium' ),
			'noto_sans_jp'  => __( 'Noto Sans JP - Google Fonts', 'emanon-premium' ),
			'noto_serif_jp' => __( 'Noto Serif JP - Google Fonts', 'emanon-premium' ),
			),
		'priority' => 17,
	) );

	// h4 font weight
	$wp_customize->add_setting( 'h4_font_weight', array(
		'default'  => 'bold',
		'type'     => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_radio_select',
	) );
	$wp_customize->add_control( 'h4_font_weight', array(
		'label'    => __( 'フォントウェイト', 'emanon-premium' ),
		'section'  => 'emanon_typography_design',
		'settings' => 'h4_font_weight',
		'type'     => 'radio',
		'choices'  => array(
			'bold'   => __( '太文字', 'emanon-premium' ),
			'normal' => __( '標準', 'emanon-premium' ),
			),
		'priority' => 18,
	) );

	// h5 font family
	$wp_customize->add_setting( 'h5_font_family', array(
		'default'  => 'sans-serif',
		'type'     => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_radio_select',
	) );
	$wp_customize->add_control( 'h5_font_family', array(
		'label'    => __( 'h5', 'emanon-premium' ),
		'section'  => 'emanon_typography_design',
		'settings' => 'h5_font_family',
		'type'     => 'select',
		'choices'  => array(
			'sans-serif'    => __( 'ゴシック・サンセリフ', 'emanon-premium' ),
			'serif'         => __( '明朝・セリフ', 'emanon-premium' ),
			'noto_sans_jp'  => __( 'Noto Sans JP - Google Fonts', 'emanon-premium' ),
			'noto_serif_jp' => __( 'Noto Serif JP - Google Fonts', 'emanon-premium' ),
			),
		'priority' => 19,
	) );

	// h5 font weight
	$wp_customize->add_setting( 'h5_font_weight', array(
		'default'  => 'bold',
		'type'     => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_radio_select',
	) );
	$wp_customize->add_control( 'h5_font_weight', array(
		'label'    => __( 'フォントウェイト', 'emanon-premium' ),
		'section'  => 'emanon_typography_design',
		'settings' => 'h5_font_weight',
		'type'     => 'radio',
		'choices'  => array(
			'bold'   => __( '太文字', 'emanon-premium' ),
			'normal' => __( '標準', 'emanon-premium' ),
			),
		'priority' => 20,
	) );

	// h6 font family
	$wp_customize->add_setting( 'h6_font_family', array(
		'default'  => 'sans-serif',
		'type'     => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_radio_select',
	) );
	$wp_customize->add_control( 'h6_font_family', array(
		'label'    => __( 'h6', 'emanon-premium' ),
		'section'  => 'emanon_typography_design',
		'settings' => 'h6_font_family',
		'type'     => 'select',
		'choices'  => array(
			'sans-serif'    => __( 'ゴシック・サンセリフ', 'emanon-premium' ),
			'serif'         => __( '明朝・セリフ', 'emanon-premium' ),
			'noto_sans_jp'  => __( 'Noto Sans JP - Google Fonts', 'emanon-premium' ),
			'noto_serif_jp' => __( 'Noto Serif JP - Google Fonts', 'emanon-premium' ),
			),
		'priority' => 21,
	) );

	// h6 font weight
	$wp_customize->add_setting( 'h6_font_weight', array(
		'default'  => 'bold',
		'type'     => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_radio_select',
	) );
	$wp_customize->add_control( 'h6_font_weight', array(
		'label'    => __( 'フォントウェイト', 'emanon-premium' ),
		'section'  => 'emanon_typography_design',
		'settings' => 'h6_font_weight',
		'type'     => 'radio',
		'choices'  => array(
			'bold'   => __( '太文字', 'emanon-premium' ),
			'normal' => __( '標準', 'emanon-premium' ),
			),
		'priority' => 22,
	) );

	// Site body font family
	$wp_customize->add_setting( 'site_body_font_family', array(
		'default'  => 'sans-serif',
		'type'     => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_radio_select',
	) );
	$wp_customize->add_control( 'site_body_font_family', array(
		'label'    => __( 'サイト全体', 'emanon-premium' ),
		'section'  => 'emanon_typography_design',
		'settings' => 'site_body_font_family',
		'type'     => 'select',
		'choices'  => array(
			'sans-serif'    => __( 'ゴシック・サンセリフ', 'emanon-premium' ),
			'serif'         => __( '明朝・セリフ', 'emanon-premium' ),
			'noto_sans_jp'  => __( 'Noto Sans JP - Google Fonts', 'emanon-premium' ),
			'noto_serif_jp' => __( 'Noto Serif JP - Google Fonts', 'emanon-premium' ),
			),
		'priority' => 23,
	) );

	// Global navigation font family
	$wp_customize->add_setting( 'global_nav_font_family', array(
		'default'  => 'sans-serif',
		'type'     => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_radio_select',
	) );
	$wp_customize->add_control( 'global_nav_font_family', array(
		'label'    => __( 'ヘッダーメニュー', 'emanon-premium' ),
		'section'  => 'emanon_typography_design',
		'settings' => 'global_nav_font_family',
		'type'     => 'select',
		'choices'  => array(
			'sans-serif'    => __( 'ゴシック・サンセリフ', 'emanon-premium' ),
			'serif'         => __( '明朝・セリフ', 'emanon-premium' ),
			'noto_sans_jp'  => __( 'Noto Sans JP - Google Fonts', 'emanon-premium' ),
			'noto_serif_jp' => __( 'Noto Serif JP - Google Fonts', 'emanon-premium' ),
			),
		'priority' => 24,
	) );

	// Footer navigation font family
	$wp_customize->add_setting( 'footer_nav_font_family', array(
		'default'  => 'sans-serif',
		'type'     => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_radio_select',
	) );
	$wp_customize->add_control( 'footer_nav_font_family', array(
		'label'    => __( 'フッターメニュー', 'emanon-premium' ),
		'section'  => 'emanon_typography_design',
		'settings' => 'footer_nav_font_family',
		'type'     => 'select',
		'choices'  => array(
			'sans-serif'    => __( 'ゴシック・サンセリフ', 'emanon-premium' ),
			'serif'         => __( '明朝・セリフ', 'emanon-premium' ),
			'noto_sans_jp'  => __( 'Noto Sans JP - Google Fonts', 'emanon-premium' ),
			'noto_serif_jp' => __( 'Noto Serif JP - Google Fonts', 'emanon-premium' ),
			),
		'priority' => 25,
	) );