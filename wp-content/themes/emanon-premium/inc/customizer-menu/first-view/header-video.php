<?php
/**
 * Theme customizer header video panel
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

$wp_customize->add_section( 'emanon_header_video', array (
	'title' => __( 'ヘッダー動画設定', 'emanon-premium' ),
	'description' => __( '［注意］表示設定でヘッダー動画を有効にしてください。', 'emanon-premium' ),
	'priority' => 7,
	'panel' => 'emanon_front_page_settings',
) );

	// header video type
	$wp_customize->add_setting( 'header_video_type', array(
		'default' => 'mp4',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_radio_select',
	) );
	$wp_customize->add_control( 'header_video_type', array(
		'label' => __( '動画タイプ', 'emanon-premium' ),
		'section' => 'emanon_header_video',
		'settings' => 'header_video_type',
		'type' => 'radio',
		'choices' => array(
			'mp4' => __( 'MP4', 'emanon-premium' ),
			'youtube' => __( 'YouTube', 'emanon-premium' ),
			),
		'priority' => 1,
	) );

	// Audio play icon
	$wp_customize->add_setting( 'header_video_display_audio_play_icon', array(
		'default' => '',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'header_video_display_audio_play_icon', array(
		'label' => __( 'SOUNDボタン［PC］', 'emanon-premium' ),
		'section' => 'emanon_header_video',
		'settings' => 'header_video_display_audio_play_icon',
		'type' => 'checkbox',
		'priority' => 2,
	) );

	// Video mp4
	$wp_customize->add_setting( 'header_video_mp4', array(
		'default' => '',
		'type' => 'theme_mod',
		'sanitize_callback' => 'absint',
	) );
	$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'header_video_mp4', array(
		'label' => __( 'MP4ファイル', 'emanon-premium' ),
		'section' => 'emanon_header_video',
		'settings' => 'header_video_mp4',
		'mime_type' => 'video',
		'button_labels' => array(
			'select'       => __( '動画の選択', 'emanon-premium' ),
			'change'       => __( '動画の変更', 'emanon-premium' ),
			'placeholder'  => __( '動画は選択されていません', 'emanon-premium' ),
			'frame_title'  => __( '動画の選択', 'emanon-premium' ),
			'frame_button' => __( '動画の選択', 'emanon-premium' ),
			),
		'priority' => 3,
	) ) );

	// YouTube URL
	$wp_customize->add_setting( 'header_video_youtube_url', array(
		'default' => '',
		'type' => 'theme_mod',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'header_video_youtube_url', array(
		'label' => __( 'YouTube URL', 'emanon-premium' ),
		'section' => 'emanon_header_video',
		'settings' => 'header_video_youtube_url',
		'type' => 'url',
		'priority' => 4,
	) );

	// YouTube blur filter
	$wp_customize->add_setting( 'header_video_blur_filter', array(
		'default' => 0,
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_number',
	) );
	$wp_customize->add_control( new Emanon_WP_Customize_Range_slider_Control( $wp_customize, 'header_video_blur_filter', array(
		'label' => __( 'YouTube ぼかしフィルター', 'emanon-premium' ),
		'description' => __( '機能利用により表示速度が遅くなる可能性があります。', 'emanon-premium' ),
		'section' => 'emanon_header_video',
		'settings' => 'header_video_blur_filter',
		'min' => 0,
		'max' => 100,
		'step' => 1,
		'priority' => 5,
	) ) );

	// YouTube grayscale filter
	$wp_customize->add_setting( 'header_video_grayscale_filter', array(
		'default' => 0,
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_number',
	) );
	$wp_customize->add_control( new Emanon_WP_Customize_Range_slider_Control( $wp_customize, 'header_video_grayscale_filter', array(
		'label' => __( 'YouTube グレイフィルター', 'emanon-premium' ),
		'description' => __( '機能利用により表示速度が遅くなる可能性があります。', 'emanon-premium' ),
		'section' => 'emanon_header_video',
		'settings' => 'header_video_grayscale_filter',
		'min' => 0,
		'max' => 100,
		'step' => 1,
		'priority' => 6,
	) ) );

	// YouTube sepia filter
	$wp_customize->add_setting( 'header_video_sepia_filter', array(
		'default' => 0,
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_number',
	) );
	$wp_customize->add_control( new Emanon_WP_Customize_Range_slider_Control( $wp_customize, 'header_video_sepia_filter', array(
		'label' => __( 'YouTube セピアフィルター', 'emanon-premium' ),
		'description' => __( '機能利用により表示速度が遅くなる可能性があります。', 'emanon-premium' ),
		'section' => 'emanon_header_video',
		'settings' => 'header_video_sepia_filter',
		'min' => 0,
		'max' => 100,
		'step' => 1,
		'priority' => 7,
	) ) );

	// Video title
	$wp_customize->add_setting( 'header_video_title', array(
		'default' => '',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_text',
	) );
	$wp_customize->add_control( new Emanon_WP_Customize_Textarea_Control( $wp_customize, 'header_video_title', array(
		'label' => __( 'タイトル', 'emanon-premium' ),
		'section' => 'emanon_header_video',
		'settings' => 'header_video_title',
		'type' => 'text',
		'priority' => 8,
	) ) );

	// Video message
	$wp_customize->add_setting( 'header_video_message', array(
		'default' => '',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_text',
	) );
	$wp_customize->add_control( new Emanon_WP_Customize_Textarea_Control( $wp_customize, 'header_video_message', array(
		'label' => __( 'メッセージ', 'emanon-premium' ),
		'section' => 'emanon_header_video',
		'settings' => 'header_video_message',
		'priority' => 9,
	) ) );

	// Btn text
	$wp_customize->add_setting( 'header_video_btn_text', array(
		'default' => '',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_text',
	) );
	$wp_customize->add_control( 'header_video_btn_text', array(
		'label' => __( 'ボタン テキスト', 'emanon-premium' ),
		'section' => 'emanon_header_video',
		'settings' => 'header_video_btn_text',
		'type' => 'text',
		'priority' => 10,
	) );

	// Button URL
	$wp_customize->add_setting( 'header_video_btn_url', array(
		'default' => '',
		'type' => 'theme_mod',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'header_video_btn_url', array(
		'label' => __( 'ボタン URL', 'emanon-premium' ),
		'section' => 'emanon_header_video',
		'settings' => 'header_video_btn_url',
		'type' => 'url',
		'priority' => 11,
	) );

	// Open in a new window
	$wp_customize->add_setting( 'header_video_target_brank', array(
		'default' => '',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'header_video_target_brank', array(
		'label' => __( '新しいウィンドウで表示', 'emanon-premium' ),
		'section' => 'emanon_header_video',
		'settings' => 'header_video_target_brank',
		'type' => 'checkbox',
		'priority' => 12,
	) );

	// Btn microcopy
	$wp_customize->add_setting( 'header_video_btn_microcopy', array(
		'default' => '',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_text',
	) );
	$wp_customize->add_control( 'header_video_btn_microcopy', array(
		'label' => __( 'マイクロコピー', 'emanon-premium' ),
		'section' => 'emanon_header_video',
		'settings' => 'header_video_btn_microcopy',
		'type' => 'text',
		'priority' => 13,
	) );

	// Title font size［PC］
	$wp_customize->add_setting( 'header_video_title_fontsize_pc', array(
		'default' => 32,
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_number',
	) );
	$wp_customize->add_control( 'header_video_title_fontsize_pc', array(
		'label' => __( 'タイトル 文字サイズ［PC］', 'emanon-premium' ),
		'description' => __( '初期値：32px', 'emanon-premium' ),
		'section' => 'emanon_header_video',
		'settings' => 'header_video_title_fontsize_pc',
		'type' => 'number',
		'input_attrs' => array(
			'min' => 1,
			'step' => 1,
		),
		'priority' => 14,
	) );

	// Title font size［SP］
	$wp_customize->add_setting( 'header_video_title_fontsize_sp', array(
		'default' => 24,
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_number',
	) );
	$wp_customize->add_control( 'header_video_title_fontsize_sp', array(
		'label' => __( 'タイトル 文字サイズ［SP］', 'emanon-premium' ),
		'description' => __( '初期値：24px', 'emanon-premium' ),
		'section' => 'emanon_header_video',
		'settings' => 'header_video_title_fontsize_sp',
		'type' => 'number',
		'input_attrs' => array(
			'min' => 1,
			'step' => 1,
		),
		'priority' => 15,
	) );

	// Display down icon
	$wp_customize->add_setting( 'header_video_display_down_icon', array(
		'default' => '',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'header_video_display_down_icon', array(
		'label' => __( 'ダウンアイコンの表示', 'emanon-premium' ),
		'section' => 'emanon_header_video',
		'settings' => 'header_video_display_down_icon',
		'type' => 'checkbox',
		'priority' => 16,
	) );

	// Down icon animation
	$wp_customize->add_setting( 'header_video_down_icon_animation', array(
		'default' => 'spin',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_radio_select',
	) );
	$wp_customize->add_control( 'header_video_down_icon_animation', array(
		'label' => __( 'ダウンアイコン［アニメーション］', 'emanon-premium' ),
		'section' => 'emanon_header_video',
		'settings' => 'header_video_down_icon_animation',
		'type' => 'radio',
		'choices' => array(
			'spin'     => __( 'スピン', 'emanon-premium' ),
			'fadedown' => __( 'フェードダウン', 'emanon-premium' ),
			),
		'priority' => 17,
	) );

	// Scroll down label
	$wp_customize->add_setting( 'header_video_scroll_down_label', array(
		'default' => 'Scroll Down',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_text',
	) );
	$wp_customize->add_control( 'header_video_scroll_down_label', array(
		'label' => __( 'ダウンアイコン［ラベル］', 'emanon-premium' ),
		'section' => 'emanon_header_video',
		'settings' => 'header_video_scroll_down_label',
		'type' => 'text',
		'priority' => 18,
	) );

	// Title color
	$wp_customize->add_setting( 'header_video_title_color', array(
		'default' => '#fff',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_colorcode',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_video_title_color', array(
		'label' => __( 'タイトル', 'emanon-premium' ),
		'section' => 'emanon_header_video',
		'settings' => 'header_video_title_color',
		'priority' => 19,
	) ) );

	// Message color
	$wp_customize->add_setting( 'header_video_message_color', array(
		'default' => '#fff',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_colorcode',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_video_message_color', array(
		'label' => __( 'メッセージ', 'emanon-premium' ),
		'section' => 'emanon_header_video',
		'settings' => 'header_video_message_color',
		'priority' => 20,
	) ) );

	// Btn border color
	$wp_customize->add_setting( 'header_video_btn_border_color', array(
		'default' => '#fff',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_colorcode',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_video_btn_border_color', array(
		'label' => __( 'ボタン 枠線', 'emanon-premium' ),
		'section' => 'emanon_header_video',
		'settings' => 'header_video_btn_border_color',
		'priority' => 21,
	) ) );

	// Btn border hover color
	$wp_customize->add_setting( 'header_video_btn_border_hover_color', array(
		'default' => emanon_primary_light_color(),
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_colorcode',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_video_btn_border_hover_color', array(
		'label' => __( 'ボタン 枠線［ホバー］', 'emanon-premium' ),
		'section' => 'emanon_header_video',
		'settings' => 'header_video_btn_border_hover_color',
		'priority' => 22,
	) ) );

	// Btn background color
	$wp_customize->add_setting( 'header_video_btn_background', array(
		'default' => '',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'header_video_btn_background', array(
		'label' =>__( 'ボタン 背景色', 'emanon-premium' ),
		'description' => __( 'ボタン枠線の色が背景色に反映されます。', 'emanon-premium' ),
		'section' => 'emanon_header_video',
		'settings' => 'header_video_btn_background',
		'type' => 'checkbox',
		'priority' => 23,
	) );

	// Btn text color
	$wp_customize->add_setting( 'header_video_btn_text_color', array(
		'default' => '#fff',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_colorcode',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_video_btn_text_color', array(
		'label' => __( 'ボタン テキスト', 'emanon-premium'  ),
		'section' => 'emanon_header_video',
		'settings' => 'header_video_btn_text_color',
		'priority' => 24,
	) ) );

	// Btn microcopy color
	$wp_customize->add_setting( 'header_video_btn_microcopy_color', array(
		'default' => '#fff',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_colorcode',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_video_btn__microcopy_color', array(
		'label' => __( 'マイクロコピー', 'emanon-premium'  ),
		'section' => 'emanon_header_video',
		'settings' => 'header_video_btn_microcopy_color',
		'priority' => 25,
	) ) );

	// Audio play icon color
	$wp_customize->add_setting( 'header_audio_play_icon_color', array(
		'default' => '#fff',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_colorcode',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_audio_play_icon_color', array(
		'label' => __( 'SOUNDボタン', 'emanon-premium' ),
		'section' => 'emanon_header_video',
		'settings' => 'header_audio_play_icon_color',
		'priority' => 26,
	) ) );

	// Down icon color
	$wp_customize->add_setting( 'header_video_down_icon_color', array(
		'default' => '#fff',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_colorcode',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_video_down_icon_color', array(
		'label' => __( 'ダウンアイコン', 'emanon-premium' ),
		'section' => 'emanon_header_video',
		'settings' => 'header_video_down_icon_color',
		'priority' => 27,
	) ) );

	// Background mask color start
	$wp_customize->add_setting( 'header_video_background_color_start', array(
		'default' => '#000',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_colorcode',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_video_background_color_start', array(
		'label' => __( '背景色［開始］', 'emanon-premium'  ),
		'section' => 'emanon_header_video',
		'settings' => 'header_video_background_color_start',
		'priority' => 28,
	) ) );

	// Background mask color end
	$wp_customize->add_setting( 'header_video_background_color_end', array(
		'default' => '#000',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_colorcode',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_video_background_color_end', array(
		'label' => __( '背景色［終了］', 'emanon-premium'  ),
		'section' => 'emanon_header_video',
		'settings' => 'header_video_background_color_end',
		'priority' => 29,
	) ) );

	// Background color degree
	$wp_customize->add_setting( 'header_video_background_color_degree', array(
		'default' => 135,
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_number',
	) );
	$wp_customize->add_control( 'header_video_background_color_degree', array(
		'label' => __( '角度', 'emanon-premium'  ),
		'section' => 'emanon_header_video',
		'settings' => 'header_video_background_color_degree',
		'type' => 'number',
		'priority' => 30,
	) );

	// Background mask color opacity
	$wp_customize->add_setting( 'header_video_opacity', array(
		'default' => 0,
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_range_slider'
	) );
	$wp_customize->add_control( new Emanon_WP_Customize_Range_slider_Control( $wp_customize, 'header_video_opacity', array(
		'label' => __( '背景色［透過率］', 'emanon-premium'  ),
		'section' => 'emanon_header_video',
		'settings' => 'header_video_opacity',
		'min' => 0,
		'max' => 1,
		'step' => 0.1,
		'priority' => 31,
	) ) );