<?php
/**
 * Theme customizer page box slidepanel
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

$wp_customize->add_section( 'emanon_header_pagebox_slider', array (
	'title' => __( 'ページボックス設定', 'emanon-premium' ),
	'description' => __( '［注意］表示設定でページボックスを有効にしてください。', 'emanon-premium' ),
	'priority' => 6,
	'panel' => 'emanon_front_page_settings',
) );

for( $c = 1; $c < 11; $c++ ) {
	// Pagebox setting
	$wp_customize->add_setting( 'header_pagebox_setting_'.$c, array(
		'default' => '',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_integer'
	) );

	$wp_customize->add_control( 'header_pagebox_setting_'.$c, array(
		'label' => __( '固定ページを選択','emanon-premium'). ' ['.$c.']',
		'section' => 'emanon_header_pagebox_slider',
		'settings' => 'header_pagebox_setting_'.$c,
		'type' => 'dropdown-pages',
		'priority' => $c,
	) );

	// Label
	$wp_customize->add_setting( 'header_pagebox_label_'.$c, array(
		'default' => '',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_text',
	) );
	$wp_customize->add_control( 'header_pagebox_label_'.$c, array(
		'label' => __( 'ラベル', 'emanon-premium' ). ' ['.$c.']',
		'section' => 'emanon_header_pagebox_slider',
		'settings' => 'header_pagebox_label_'.$c,
		'priority' => $c,
	) );

	// Title
	$wp_customize->add_setting( 'header_pagebox_title_'.$c, array(
		'default' => '',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_text',
	) );
	$wp_customize->add_control( new Emanon_WP_Customize_Textarea_Control( $wp_customize, 'header_pagebox_title_'.$c, array(
		'label' => __( 'タイトル', 'emanon-premium' ). ' ['.$c.']',
		'section' => 'emanon_header_pagebox_slider',
		'settings' => 'header_pagebox_title_'.$c,
		'type' => 'text',
		'priority' => $c,
	) ) );

	// Message
	$wp_customize->add_setting( 'header_pagebox_message_'.$c, array(
		'default' => '',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_text',
	) );
	$wp_customize->add_control( new Emanon_WP_Customize_Textarea_Control( $wp_customize, 'header_pagebox_message_'.$c, array(
		'label' => __( 'メッセージ', 'emanon-premium' ). ' ['.$c.']',
		'section' => 'emanon_header_pagebox_slider',
		'settings' => 'header_pagebox_message_'.$c,
		'priority' => $c,
	) ) );

}

	// Display read more
	$wp_customize->add_setting( 'display_header_pagebox_slider_read_more', array(
		'default' => true,
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'display_header_pagebox_slider_read_more', array(
		'label' => __( '「ボタン」を表示', 'emanon-premium' ),
		'section' => 'emanon_header_pagebox_slider',
		'settings' => 'display_header_pagebox_slider_read_more',
		'type' => 'checkbox',
		'priority' => 41,
	) );

	// Read more text
	$wp_customize->add_setting( 'header_pagebox_slider_read_more_text', array(
		'default' => __( '続きを読む', 'emanon-premium' ),
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_text',
	) );
	$wp_customize->add_control( 'header_pagebox_slider_read_more_text', array(
		'label' => __( 'ボタン テキスト', 'emanon-premium' ),
		'section' => 'emanon_header_pagebox_slider',
		'settings' => 'header_pagebox_slider_read_more_text',
		'type' => 'text',
		'priority' => 42,
		) );

	// Page box label
	$wp_customize->add_setting( 'display_header_pagebox_label', array(
		'default' => true,
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'display_header_pagebox_label', array(
		'label' => __( '「ボックス ラベル」を表示', 'emanon-premium' ),
		'section' => 'emanon_header_pagebox_slider',
		'settings' => 'display_header_pagebox_label',
		'type' => 'checkbox',
		'priority' => 43,
	) );

	// Page box title
	$wp_customize->add_setting( 'display_header_pagebox_title', array(
		'default' => true,
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'display_header_pagebox_title', array(
		'label' => __( '「ボックス タイトル」を表示', 'emanon-premium' ),
		'section' => 'emanon_header_pagebox_slider',
		'settings' => 'display_header_pagebox_title',
		'type' => 'checkbox',
		'priority' => 44,
	) );

	// Animation autoplay
	$wp_customize->add_setting( 'header_pagebox_autoplay_pc', array(
		'default' => true,
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'header_pagebox_autoplay_pc', array(
		'label' => __( '自動スライダー［PC］', 'emanon-premium' ),
		'section' => 'emanon_header_pagebox_slider',
		'settings' => 'header_pagebox_autoplay_pc',
		'type' => 'checkbox',
		'priority' => 45,
	) );

	// Animation autoplay
	$wp_customize->add_setting( 'header_pagebox_autoplay_sp', array(
		'default' => true,
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'header_pagebox_autoplay_sp', array(
		'label' => __( '自動スライダー［SP］', 'emanon-premium' ),
		'section' => 'emanon_header_pagebox_slider',
		'settings' => 'header_pagebox_autoplay_sp',
		'type' => 'checkbox',
		'priority' => 46,
	) );

	// Text animation
	$wp_customize->add_setting( 'header_pagebox_text_animation', array(
		'default' => 'none',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_radio_select',
	) );
	$wp_customize->add_control( 'header_pagebox_text_animation', array(
		'label' => __( 'アニメーション効果', 'emanon-premium' ),
		'section' => 'emanon_header_pagebox_slider',
		'settings' => 'header_pagebox_text_animation',
		'type' => 'radio',
		'choices' => array(
			'none' => __( 'なし', 'emanon-premium' ),
			'fadein' => __( 'フェードイン', 'emanon-premium' ),
			'slideup' => __( 'スライドアップ', 'emanon-premium' ),
			),
		'priority' => 47,
	) );

	// Autoplay speed
	$wp_customize->add_setting( 'header_pagebox_autoplay_speed', array(
		'default' => 3000,
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_number',
	) );
	$wp_customize->add_control( 'header_pagebox_autoplay_speed', array(
		'label' => __( 'スライダー［速度］', 'emanon-premium' ),
		'description' => __( '初期値：3000', 'emanon-premium' ),
		'section' => 'emanon_header_pagebox_slider',
		'settings' => 'header_pagebox_autoplay_speed',
		'type' => 'number',
		'input_attrs' => array(
			'min' => 0,
			'step' => 1,
		),
		'priority' => 48,
	) );

	// Slide change speed
	$wp_customize->add_setting( 'header_pagebox_slider_speed_pc', array(
		'default' => 1500,
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_number',
	) );
	$wp_customize->add_control( 'header_pagebox_slider_speed_pc', array(
		'label' => __( '切り替え速度［PC］', 'emanon-premium' ),
		'description' => __( '初期値：1500', 'emanon-premium' ),
		'section' => 'emanon_header_pagebox_slider',
		'settings' => 'header_pagebox_slider_speed_pc',
		'type' => 'number',
		'input_attrs' => array(
			'min' => 0,
			'step' => 1,
		),
		'priority' => 49,
	) );

	// Slide change speed
	$wp_customize->add_setting( 'header_pagebox_slider_speed_sp', array(
		'default' => 1500,
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_number',
	) );
	$wp_customize->add_control( 'header_pagebox_slider_speed_sp', array(
		'label' => __( '切り替え速度［SP］', 'emanon-premium' ),
		'description' => __( '初期値：1500', 'emanon-premium' ),
		'section' => 'emanon_header_pagebox_slider',
		'settings' => 'header_pagebox_slider_speed_sp',
		'type' => 'number',
		'input_attrs' => array(
			'min' => 0,
			'step' => 1,
		),
		'priority' => 50,
	) );

	// Slider height［PC］
	$wp_customize->add_setting( 'header_pagebox_slider_height_pc', array(
		'default' => 750,
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_number',
	) );
	$wp_customize->add_control( 'header_pagebox_slider_height_pc', array(
		'label' => __( '高さ［PC］', 'emanon-premium' ),
		'description' => __( '初期値：750px', 'emanon-premium' ),
		'section' => 'emanon_header_pagebox_slider',
		'settings' => 'header_pagebox_slider_height_pc',
		'type' => 'number',
		'input_attrs' => array(
			'min' => 0,
			'step' => 1,
		),
		'priority' => 51,
	) );

	// Slider height［SP］
	$wp_customize->add_setting( 'header_pagebox_slider_height_sp', array(
		'default' => 500,
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_number',
	) );
	$wp_customize->add_control( 'header_pagebox_slider_height_sp', array(
		'label' => __( '高さ［SP］', 'emanon-premium' ),
		'description' => __( '初期値：500px', 'emanon-premium' ),
		'section' => 'emanon_header_pagebox_slider',
		'settings' => 'header_pagebox_slider_height_sp',
		'type' => 'number',
		'input_attrs' => array(
			'min' => 0,
			'step' => 1,
		),
		'priority' => 52,
	) );

	// Title font size［PC］
	$wp_customize->add_setting( 'header_pagebox_slider_title_fontsize_pc', array(
		'default' => 32,
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_number',
	) );
	$wp_customize->add_control( 'header_pagebox_slider_title_fontsize_pc', array(
		'label' => __( 'タイトル 文字サイズ［PC］', 'emanon-premium' ),
		'description' => __( '初期値：32px', 'emanon-premium' ),
		'section' => 'emanon_header_pagebox_slider',
		'settings' => 'header_pagebox_slider_title_fontsize_pc',
		'type' => 'number',
		'input_attrs' => array(
			'min' => 1,
			'step' => 1,
		),
		'priority' => 53,
	) );

	// Title font size［SP］
	$wp_customize->add_setting( 'header_pagebox_slider_title_fontsize_sp', array(
		'default' => 24,
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_number',
	) );
	$wp_customize->add_control( 'header_pagebox_slider_title_fontsize_sp', array(
		'label' => __( 'タイトル 文字サイズ［SP］', 'emanon-premium' ),
		'description' => __( '初期値：24px', 'emanon-premium' ),
		'section' => 'emanon_header_pagebox_slider',
		'settings' => 'header_pagebox_slider_title_fontsize_sp',
		'type' => 'number',
		'input_attrs' => array(
			'min' => 1,
			'step' => 1,
		),
		'priority' => 54,
	) );

	// Label color
	$wp_customize->add_setting( 'header_pagebox_slider_label_color', array(
		'default' => '#fff',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_colorcode',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_pagebox_slider_label_color', array(
		'label' => __( 'ラベル', 'emanon-premium' ),
		'section' => 'emanon_header_pagebox_slider',
		'settings' => 'header_pagebox_slider_label_color',
		'priority' => 55,
	) ) );

	// Title color
	$wp_customize->add_setting( 'header_pagebox_slider_title_color', array(
		'default' => '#fff',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_colorcode',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_pagebox_slider_title_color', array(
		'label' => __( 'タイトル', 'emanon-premium' ),
		'section' => 'emanon_header_pagebox_slider',
		'settings' => 'header_pagebox_slider_title_color',
		'priority' => 56,
	) ) );

	// Message color
	$wp_customize->add_setting( 'header_pagebox_slider_message_color', array(
		'default' => '#fff',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_colorcode',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_pagebox_slider_message_color', array(
		'label' => __( 'メッセージ', 'emanon-premium' ),
		'section' => 'emanon_header_pagebox_slider',
		'settings' => 'header_pagebox_slider_message_color',
		'priority' => 57,
	) ) );

	// Btn border color
	$wp_customize->add_setting( 'header_pagebox_slider_btn_border_color', array(
		'default' => '#fff',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_colorcode',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_pagebox_slider_btn_border_color', array(
		'label' => __( 'ボタン 枠線', 'emanon-premium' ),
		'section' => 'emanon_header_pagebox_slider',
		'settings' => 'header_pagebox_slider_btn_border_color',
		'priority' => 58,
	) ) );

	// Btn border hover color
	$wp_customize->add_setting( 'header_pagebox_slider_btn_border_hover_color', array(
		'default' => emanon_primary_light_color(),
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_colorcode',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_pagebox_slider_btn_border_hover_color', array(
		'label' => __( 'ボタン 枠線［ホバー］', 'emanon-premium' ),
		'section' => 'emanon_header_pagebox_slider',
		'settings' => 'header_pagebox_slider_btn_border_hover_color',
		'priority' => 59,
	) ) );

	// Btn background color
	$wp_customize->add_setting( 'header_pagebox_slider_btn_background', array(
		'default' => '',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'header_pagebox_slider_btn_background', array(
		'label' =>__( 'ボタン 背景色', 'emanon-premium' ),
		'description' => __( 'ボタン枠線の色が背景色に反映されます。', 'emanon-premium'  ),
		'section' => 'emanon_header_pagebox_slider',
		'settings' => 'header_pagebox_slider_btn_background',
		'type' => 'checkbox',
		'priority' => 60,
	) );

	// Btn text color
	$wp_customize->add_setting( 'header_pagebox_slider_btn_text_color', array(
		'default' => '#fff',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_colorcode',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_pagebox_slider_btn_text_color', array(
		'label' => __( 'ボタン テキスト', 'emanon-premium'  ),
		'section' => 'emanon_header_pagebox_slider',
		'settings' => 'header_pagebox_slider_btn_text_color',
		'priority' => 61,
	) ) );

	// Slider item label color
	$wp_customize->add_setting( 'header_pagebox_slider_item_label_color', array(
		'default' => '#fff',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_colorcode',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_pagebox_slider_item_label_color', array(
		'label' => __( 'ボックス ラベル', 'emanon-premium' ),
		'section' => 'emanon_header_pagebox_slider',
		'settings' => 'header_pagebox_slider_item_label_color',
		'priority' => 62,
	) ) );

	// Slider item title color
	$wp_customize->add_setting( 'header_pagebox_slider_item_title_color', array(
		'default' => '#fff',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_colorcode',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_pagebox_slider_item_title_color', array(
		'label' => __( 'ボックス タイトル', 'emanon-premium' ),
		'section' => 'emanon_header_pagebox_slider',
		'settings' => 'header_pagebox_slider_item_title_color',
		'priority' => 63,
	) ) );

	// Background mask color start
	$wp_customize->add_setting( 'header_pagebox_slider_background_color_start', array(
		'default' => '#000',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_colorcode',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_pagebox_slider_background_color_start', array(
		'label' => __( '背景色［開始］', 'emanon-premium'  ),
		'section' => 'emanon_header_pagebox_slider',
		'settings' => 'header_pagebox_slider_background_color_start',
		'priority' => 64,
	) ) );

	// Background mask color end
	$wp_customize->add_setting( 'header_pagebox_slider_background_color_end', array(
		'default' => '#000',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_colorcode',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_pagebox_slider_background_color_end', array(
		'label' => __( '背景色［終了］', 'emanon-premium'  ),
		'section' => 'emanon_header_pagebox_slider',
		'settings' => 'header_pagebox_slider_background_color_end',
		'priority' => 65,
	) ) );

	// Background mask color degree
	$wp_customize->add_setting( 'header_pagebox_slider_background_color_degree', array(
		'default' => 135,
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_number',
	) );
	$wp_customize->add_control( 'header_pagebox_slider_background_color_degree', array(
		'label' => __( '角度', 'emanon-premium'  ),
		'section' => 'emanon_header_pagebox_slider',
		'settings' => 'header_pagebox_slider_background_color_degree',
		'type' => 'number',
		'priority' => 66,
	) );

	// Background mask color opacity
	$wp_customize->add_setting( 'header_pagebox_slider_opacity', array(
		'default' => 0.3,
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_range_slider'
	) );
	$wp_customize->add_control( new Emanon_WP_Customize_Range_slider_Control( $wp_customize, 'header_pagebox_slider_opacity', array(
		'label' => __( '背景色［透過率］', 'emanon-premium'  ),
		'section' => 'emanon_header_pagebox_slider',
		'settings' => 'header_pagebox_slider_opacity',
		'min' => 0,
		'max' => 1,
		'step' => 0.1,
		'priority' => 67,
	) ) );