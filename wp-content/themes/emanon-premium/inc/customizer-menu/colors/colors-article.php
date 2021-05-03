<?php
/**
 * Theme customizer article colors panel
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

/**
 * Articleカラーの設定
 */
$wp_customize->add_section( 'emanon_article_colors', array (
	'title'    => __( 'ページ本文設定', 'emanon-premium' ),
	'panel'    => 'emanon_colors_settings',
	'priority' => 6,
) );

	// Active：Article background color
	$wp_customize->add_setting( 'active_article_background_color', array(
		'default' => true,
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'active_article_background_color', array(
		'label' =>__( '背景色を有効', 'emanon-premium' ),
		'section'  => 'emanon_article_colors',
		'settings' => 'active_article_background_color',
		'type' => 'checkbox',
		'priority' => 1,
	) );

	// Article background color
	$wp_customize->add_setting( 'article_background_color', array(
		'default' => '#ffffff',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_colorcode',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'article_background_color', array(
		'label'    => __( '背景色［ページ本文］', 'emanon-premium' ),
		'section'  => 'emanon_article_colors',
		'settings' => 'article_background_color',
		'priority' => 2,
	) ) );

	// Article sns follow background color
	$wp_customize->add_setting( 'article_sns_follow_background_color', array(
		'default' => emanon_primary_color(),
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_colorcode',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'article_sns_follow_background_color', array(
		'label'    => __( '背景色［SNSフォローボタン（ページ）］', 'emanon-premium' ),
		'section'  => 'emanon_article_colors',
		'settings' => 'article_sns_follow_background_color',
		'priority' => 3,
	) ) );

	// Article sns follow background color
	$wp_customize->add_setting( 'article_sns_follow_text_color', array(
		'default' => '#ffffff',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_colorcode',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'article_sns_follow_text_color', array(
		'label'    => __( '文字［SNSフォローボタン（ページ）］', 'emanon-premium' ),
		'section'  => 'emanon_article_colors',
		'settings' => 'article_sns_follow_text_color',
		'priority' => 4,
	) ) );

	// Active：Author profile background color
	$wp_customize->add_setting( 'active_author_profile_background_color', array(
		'default' => true,
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'active_author_profile_background_color', array(
		'label' =>__( '背景色［投稿者プロフィール］を有効', 'emanon-premium' ),
		'section'  => 'emanon_article_colors',
		'settings' => 'active_author_profile_background_color',
		'type' => 'checkbox',
		'priority' => 5,
	) );

	// Author profile background color
	$wp_customize->add_setting( 'author_profile_background_color', array(
		'default' => '#eeeff0',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_colorcode',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'author_profile_background_color', array(
		'label'    => __( '背景色［投稿者プロフィール］', 'emanon-premium' ),
		'section'  => 'emanon_article_colors',
		'settings' => 'author_profile_background_color',
		'priority' => 6,
	) ) );

	// Active：Author SNS brand color
	$wp_customize->add_setting( 'active_author_sns_brand_color', array(
		'default' => false,
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'active_author_sns_brand_color', array(
		'label' =>__( 'SNSブランドカラー', 'emanon-premium' ),
		'description' => __( '投稿者プロフィールのSNSボタンに適用されます。', 'emanon-premium' ),
		'section'  => 'emanon_article_colors',
		'settings' => 'active_author_sns_brand_color',
		'type' => 'checkbox',
		'priority' => 7,
	) );
