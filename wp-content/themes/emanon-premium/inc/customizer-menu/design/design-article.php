<?php
/**
 * Theme customizer article design
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

$wp_customize->add_section( 'emanon_article_design', array(
	'title'      => __( 'ページ本文設定', 'emanon-premium' ),
	'panel'      => 'emanon_design_settings',
	'priority'   => 8,
) );

	// Article header width
	$wp_customize->add_setting( 'article_header_width', array(
		'default'  => 'header__normal',
		'type'     => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_radio_select',
	) );
	$wp_customize->add_control( 'article_header_width', array(
		'label'    => __( 'ヘッダー幅', 'emanon-premium' ),
		'section'  => 'emanon_article_design',
		'settings' => 'article_header_width',
		'type'     => 'radio',
		'choices'  => array(
			'header__normal'         => __( '通常', 'emanon-premium' ),
			'header__full-width'     => __( '全幅', 'emanon-premium' ),
			'header__narrow'         => __( '狭幅', 'emanon-premium' ),
			),
		'priority' => 1,
	) );

	// Article body width
	$wp_customize->add_setting( 'article_body_width', array(
		'default'  => 'paragraph__normal',
		'type'     => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_radio_select',
	) );
	$wp_customize->add_control( 'article_body_width', array(
		'label'    => __( 'コンテンツ幅', 'emanon-premium' ),
		'section'  => 'emanon_article_design',
		'settings' => 'article_body_width',
		'type'     => 'radio',
		'choices'  => array(
			'paragraph__normal'         => __( '通常', 'emanon-premium' ),
			'paragraph__full-width'     => __( '全幅', 'emanon-premium' ),
			'paragraph__narrow'         => __( '狭幅', 'emanon-premium' ),
			'paragraph__normal--border' => __( '通常［ボーダー］', 'emanon-premium' ),
			'paragraph__narrow--border' => __( '狭幅［ボーダー］', 'emanon-premium' ),
			),
		'priority' => 2,
	) );

	// Paragraph font size［PC］
	$wp_customize->add_setting( 'p_font_size_pc', array(
		'default'  => 'u-font-size-pc__m',
		'type'     => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_radio_select',
	) );
	$wp_customize->add_control( 'p_font_size_pc', array(
		'label'    => __( '段落 文字サイズ［PC］', 'emanon-premium' ),
		'description' => __( 'パソコンでサイト表示時に反映', 'emanon-premium' ),
		'section'  => 'emanon_article_design',
		'settings' => 'p_font_size_pc',
		'type'     => 'radio',
		'choices'  => array(
			'u-font-size-pc__m' => __( '文字サイズ［通常］', 'emanon-premium' ),
			'u-font-size-pc__l' => __( '文字サイズ［大］', 'emanon-premium' ),
			),
		'priority' => 3,
	) );

	// Paragraph font size［SP］
	$wp_customize->add_setting( 'p_font_size_sp', array(
		'default'  => 'u-font-size-sp__m',
		'type'     => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_radio_select',
	) );
	$wp_customize->add_control( 'p_font_size_sp', array(
		'label'    => __( '段落 文字サイズ［SP］', 'emanon-premium' ),
		'description' => __( 'スマホでサイト表示時に反映', 'emanon-premium' ),
		'section'  => 'emanon_article_design',
		'settings' => 'p_font_size_sp',
		'type'     => 'radio',
		'choices'  => array(
			'u-font-size-sp__m' => __( '文字サイズ［通常］', 'emanon-premium' ),
			'u-font-size-sp__l' => __( '文字サイズ［大］', 'emanon-premium' ),
			),
		'priority' => 4,
	) );

	// h2 design
	$wp_customize->add_setting( 'h2_design', array(
		'default'  => 'h2-none-style',
		'type'     => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_radio_select',
	) );
	$wp_customize->add_control( 'h2_design', array(
		'label'    => __( 'h2', 'emanon-premium' ),
		'section'  => 'emanon_article_design',
		'settings' => 'h2_design',
		'type'     => 'select',
		'choices'  => array(
			'h2-none-style'               => __( 'なし', 'emanon-premium' ),
			'h2-bg-color'                 => __( '背景色', 'emanon-premium' ),
			'h2-bg-color-radius'          => __( '背景色［角丸］', 'emanon-premium' ),
			'h2-bg-color-border-left'     => __( '背景色［左ボーダー］', 'emanon-premium' ),
			'h2-bg-color-broken-corner'   => __( '背景色［角折り］', 'emanon-premium' ),
			'h2-bg-color-ribbon'          => __( '背景色［リボン］', 'emanon-premium' ),
			'h2-speech-bubble'            => __( '吹き出し', 'emanon-premium' ),
			'h2-speech-bubble-border'     => __( '吹き出し［ボーダー］', 'emanon-premium' ),
			'h2-border'                   => __( 'ボーダー', 'emanon-premium' ),
			'h2-border-radius'            => __( 'ボーダー［角丸］', 'emanon-premium' ),
			'h2-border-bottom'            => __( '下線', 'emanon-premium' ),
			'h2-border-bottom-two-colors' => __( '下線［2色］', 'emanon-premium' ),
			'h2-border-top-bottom'        => __( 'ボーダー［上下］', 'emanon-premium' ),
			'h2-border-left'              => __( 'ボーダー［左］', 'emanon-premium' ),
			'h2-dashed-bottom'            => __( '波線［下］', 'emanon-premium' ),
			'h2-dashed-top-bottom'        => __( '波線［上下］', 'emanon-premium' ),
			),
		'priority' => 5,
	) );

	// h3 design
	$wp_customize->add_setting( 'h3_design', array(
		'default'  => 'h3-none-style',
		'type'     => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_radio_select',
	) );
	$wp_customize->add_control( 'h3_design', array(
		'label'    => __( 'h3', 'emanon-premium' ),
		'section'  => 'emanon_article_design',
		'settings' => 'h3_design',
		'type'     => 'select',
		'choices'  => array(
			'h3-none-style'               => __( 'なし', 'emanon-premium' ),
			'h3-bg-color'                 => __( '背景色', 'emanon-premium' ),
			'h3-bg-color-radius'          => __( '背景色［角丸］', 'emanon-premium' ),
			'h3-bg-color-border-left'     => __( '背景色［左ボーダー］', 'emanon-premium' ),
			'h3-bg-color-broken-corner'   => __( '背景色［角折り］', 'emanon-premium' ),
			'h3-bg-color-ribbon'          => __( '背景色［リボン］', 'emanon-premium' ),
			'h3-speech-bubble'            => __( '吹き出し', 'emanon-premium' ),
			'h3-speech-bubble-border'     => __( '吹き出し［ボーダー］', 'emanon-premium' ),
			'h3-border'                   => __( 'ボーダー', 'emanon-premium' ),
			'h3-border-radius'            => __( 'ボーダー［角丸］', 'emanon-premium' ),
			'h3-border-bottom'            => __( '下線', 'emanon-premium' ),
			'h3-border-bottom-two-colors' => __( '下線［2色］', 'emanon-premium' ),
			'h3-border-top-bottom'        => __( 'ボーダー［上下］', 'emanon-premium' ),
			'h3-border-left'              => __( 'ボーダー［左］', 'emanon-premium' ),
			'h3-dashed-bottom'            => __( '波線［下］', 'emanon-premium' ),
			'h3-dashed-top-bottom'        => __( '波線［上下］', 'emanon-premium' ),
			),
		'priority' => 6,
	) );

	// h4 design
	$wp_customize->add_setting( 'h4_design', array(
		'default'  => 'h4-none-style',
		'type'     => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_radio_select',
	) );
	$wp_customize->add_control( 'h4_design', array(
		'label'    => __( 'h4', 'emanon-premium' ),
		'section'  => 'emanon_article_design',
		'settings' => 'h4_design',
		'type'     => 'select',
		'choices'  => array(
			'h4-none-style'               => __( 'なし', 'emanon-premium' ),
			'h4-bg-color'                 => __( '背景色', 'emanon-premium' ),
			'h4-bg-color-radius'          => __( '背景色［角丸］', 'emanon-premium' ),
			'h4-bg-color-border-left'     => __( '背景色［左ボーダー］', 'emanon-premium' ),
			'h4-bg-color-broken-corner'   => __( '背景色［角折り］', 'emanon-premium' ),
			'h4-bg-color-ribbon'          => __( '背景色［リボン］', 'emanon-premium' ),
			'h4-speech-bubble'            => __( '吹き出し', 'emanon-premium' ),
			'h4-speech-bubble-border'     => __( '吹き出し［ボーダー］', 'emanon-premium' ),
			'h4-border'                   => __( 'ボーダー', 'emanon-premium' ),
			'h4-border-radius'            => __( 'ボーダー［角丸］', 'emanon-premium' ),
			'h4-border-bottom'            => __( '下線', 'emanon-premium' ),
			'h4-border-bottom-two-colors' => __( '下線［2色］', 'emanon-premium' ),
			'h4-border-top-bottom'        => __( 'ボーダー［上下］', 'emanon-premium' ),
			'h4-border-left'              => __( 'ボーダー［左］', 'emanon-premium' ),
			'h4-dashed-bottom'            => __( '波線［下］', 'emanon-premium' ),
			'h4-dashed-top-bottom'        => __( '波線［上下］', 'emanon-premium' ),
			),
		'priority' => 7,
	) );

	// SNS Follow page button
	$wp_customize->add_setting( 'sns_follow_page_button', array(
		'default'  => 'button__normal',
		'type'     => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_radio_select',
	) );
	$wp_customize->add_control( 'sns_follow_page_button', array(
		'label'    => __( 'SNSフォローボタン［ページ］のスタイル', 'emanon-premium' ),
		'section'  => 'emanon_article_design',
		'settings' => 'sns_follow_page_button',
		'type'     => 'radio',
		'choices'  => array(
			'button__normal' => __( '通常', 'emanon-premium' ),
			'button__icon'   => __( 'アイコンのみ', 'emanon-premium' ),
			),
		'priority' => 8,
	) );

	// Active：Article background color
	$wp_customize->add_setting( 'active_sns_follow_page_background_img', array(
		'default' => true,
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'active_sns_follow_page_background_img', array(
		'label' =>__( 'SNSフォローボタン［ページ］の背景画像を有効', 'emanon-premium' ),
		'description' => __( 'アイキャッチ画像が適用されます。', 'emanon-premium' ),
		'section'  => 'emanon_article_design',
		'settings' => 'active_sns_follow_page_background_img',
		'type' => 'checkbox',
		'priority' => 9,
	) );

	// Author profile body width
	$wp_customize->add_setting( 'author_profile_body_width', array(
		'default'  => 'author-card__normal',
		'type'     => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_radio_select',
	) );
	$wp_customize->add_control( 'author_profile_body_width', array(
		'label'    => __( '投稿者プロフィール コンテンツ幅', 'emanon-premium' ),
		'section'  => 'emanon_article_design',
		'settings' => 'author_profile_body_width',
		'type'     => 'radio',
		'choices'  => array(
			'author-card__normal'         => __( '通常', 'emanon-premium' ),
			'author-card__full-width'     => __( '全幅', 'emanon-premium' ),
			'author-card__normal--border' => __( '狭幅［ボーダー］', 'emanon-premium' ),
			),
		'priority' => 10,
	) );