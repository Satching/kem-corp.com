<?php
/**
 * Theme customizer first view panel
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

/**
 * First viewの設定
 */
$wp_customize->add_panel( 'emanon_front_page_settings', array(
	'capability'    => 'edit_theme_options',
	'title'         => __( 'ファートビュー設定', 'emanon-premium' ),
	'priority'      => 31,
) );

// First viewのレイアウト
	$wp_customize->add_section( 'emanon_firstview_layout', array (
		'title'       => __( '表示設定', 'emanon-premium' ),
		'priority'    => 1,
		'panel'       => 'emanon_front_page_settings',
	) );

		// First viewのレイアウト設定
		$wp_customize->add_setting( 'firstview_layout_type', array(
			'default'   => 'display_none',
			'type'      => 'theme_mod',
			'sanitize_callback' => 'emanon_sanitize_radio_select',
		) );
		$wp_customize->add_control( 'firstview_layout_type', array(
			'label'     => __( 'レイアウト', 'emanon-premium' ),
			'section'   => 'emanon_firstview_layout',
			'settings'  => 'firstview_layout_type',
			'type'      => 'radio',
			'choices'   => array(
				'header_eyecatch'       => __( 'ヘッダーアイキャッチ', 'emanon-premium' ),
				'header_image_slider'   => __( '画像スライダー', 'emanon-premium' ),
				'header_content_slider' => __( 'コンテンツスライダー', 'emanon-premium' ),
				'header_pickup_slider'  => __( 'ピックアップスライダー', 'emanon-premium' ),
				'header_pagebox_slider' => __( 'ページボックス', 'emanon-premium' ),
				'header_video'          => __( 'ヘッダー動画', 'emanon-premium' ),
				'display_none'          => __( '表示なし', 'emanon-premium' ),
				),
			'priority' => 1,
		) );