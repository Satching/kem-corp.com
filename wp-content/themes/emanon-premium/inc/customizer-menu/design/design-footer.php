<?php
/**
 * Theme customizer footer design
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

$wp_customize->add_section( 'emanon_footer_design', array(
	'title'      => __( 'フッター設定', 'emanon-premium' ),
	'panel'      => 'emanon_design_settings',
	'priority'   => 11,
) );

	// Display floating page top sp
	$wp_customize->add_setting( 'display_floating_page_top_pc', array(
		'default' => false,
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'display_floating_page_top_pc', array(
		'label' =>__( 'トップへ戻るボタン［PC］', 'emanon-premium' ),
		'description' => __( 'パソコンでWebサイト表示時に反映', 'emanon-premium' ),
		'section'  => 'emanon_footer_design',
		'settings' => 'display_floating_page_top_pc',
		'type' => 'checkbox',
		'priority' => 1,
	) );

	// Footer heading design
	$wp_customize->add_setting( 'footer_heading_design', array(
		'default'  => 'footer-none-style',
		'type'     => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_radio_select',
	) );
	$wp_customize->add_control( 'footer_heading_design', array(
		'label'    => __( '見出しデザイン', 'emanon-premium' ),
		'section'  => 'emanon_footer_design',
		'settings' => 'footer_heading_design',
		'type'     => 'select',
		'choices'  => array(
			'footer-none-style'           => __( 'なし', 'emanon-premium' ),
			'footer-border'               => __( 'ボーダー', 'emanon-premium' ),
			'footer-border-radius'        => __( 'ボーダー［角丸］', 'emanon-premium' ),
			'footer-border-left'          => __( 'ボーダー［左］', 'emanon-premium' ),
			'footer-bg-color'             => __( '背景色', 'emanon-premium' ),
			'footer-bg-color-radius'      => __( '背景色［角丸］', 'emanon-premium' ),
			'footer-speech-bubble'        => __( '吹き出し', 'emanon-premium' ),
			'footer-border-bottom'        => __( '下線', 'emanon-premium' ),
			'footer-stripe-border-bottom' => __( '下線［ストライプ］', 'emanon-premium' ),
			'footer-shortborder-bottom'   => __( '下線［ショート］', 'emanon-premium' ),
			'footer-lines-on-sides'       => __( '左右線', 'emanon-premium' ),
			'footer-lines-on-right'       => __( '右線', 'emanon-premium' ),
			),
		'priority' => 2,
	) );

	// Footer heading align
	$wp_customize->add_setting( 'footer_heading_align', array(
		'default'  => 'footer-left',
		'type'     => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_radio_select',
	) );
	$wp_customize->add_control( 'footer_heading_align', array(
		'label'    => __( '見出し配置', 'emanon-premium' ),
		'section'  => 'emanon_footer_design',
		'settings' => 'footer_heading_align',
		'type'     => 'radio',
		'choices'  => array(
			'footer-left'   => __( '左配置', 'emanon-premium' ),
			'footer-center' => __( '中央配置', 'emanon-premium' ),
			),
		'priority' => 3,
	) );

	// header video type
	$wp_customize->add_setting( 'footer_background_type', array(
		'default' => 'none',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_radio_select',
	) );
	$wp_customize->add_control( 'footer_background_type', array(
		'label' => __( 'フッター背景', 'emanon-premium' ),
		'description' => __( 'フッターウィジェット使用時に反映', 'emanon-premium' ),
		'section'  => 'emanon_footer_design',
		'settings' => 'footer_background_type',
		'type' => 'radio',
		'choices' => array(
			'none'    => __( 'なし', 'emanon-premium' ),
			'mp4'     => __( 'MP4', 'emanon-premium' ),
			'youtube' => __( 'YouTube', 'emanon-premium' ),
			'image'   => __( '画像', 'emanon-premium' ),
			),
		'priority' => 4,
	) );

	// Video mp4
	$wp_customize->add_setting( 'footer_video_mp4', array(
		'default' => '',
		'type' => 'theme_mod',
		'sanitize_callback' => 'absint',
	) );
	$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'footer_video_mp4', array(
		'label' => __( 'MP4ファイル', 'emanon-premium' ),
		'section'  => 'emanon_footer_design',
		'settings' => 'footer_video_mp4',
		'mime_type' => 'video',
		'button_labels' => array(
			'select'       => __( '動画の選択', 'emanon-premium' ),
			'change'       => __( '動画の変更', 'emanon-premium' ),
			'placeholder'  => __( '動画は選択されていません', 'emanon-premium' ),
			'frame_title'  => __( '動画の選択', 'emanon-premium' ),
			'frame_button' => __( '動画の選択', 'emanon-premium' ),
			),
		'priority' => 5,
	) ) );

	// YouTube URL
	$wp_customize->add_setting( 'footer_video_youtube_url', array(
		'default' => '',
		'type' => 'theme_mod',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'footer_video_youtube_url', array(
		'label' => __( 'YouTube URL', 'emanon-premium' ),
		'section'  => 'emanon_footer_design',
		'settings' => 'footer_video_youtube_url',
		'type' => 'url',
		'priority' => 6,
	) );

	// Slider image PC
	$wp_customize->add_setting( 'footer_background_image_pc', array(
		'default' => '',
		'type' => 'theme_mod',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'footer_background_image_pc', array (
		'label' => __( '画像［PC］', 'emanon-premium' ),
		'section'  => 'emanon_footer_design',
		'settings' => 'footer_background_image_pc',
		'priority' => 7,
	) ) );

	// Slider image SP
	$wp_customize->add_setting( 'footer_background_image_sp', array(
		'default' => '',
		'type' => 'theme_mod',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'footer_background_image_sp', array (
		'label' => __( '画像［SP］', 'emanon-premium' ),
		'section'  => 'emanon_footer_design',
		'settings' => 'footer_background_image_sp',
		'priority' => 8,
	) ) );