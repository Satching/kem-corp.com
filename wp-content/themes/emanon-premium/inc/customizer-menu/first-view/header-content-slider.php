<?php
/**
 * Theme customizer header content slider panel
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

$wp_customize->add_section( 'emanon_header_content_slider', array (
	'title' => __( ' コンテンツスライダー設定', 'emanon-premium' ),
	'description' => __( '［注意］表示設定でコンテンツスライダーを有効にしてください。', 'emanon-premium' ),
	'priority' => 4,
	'panel' => 'emanon_front_page_settings',
) );

	// Content slider style
	$wp_customize->add_setting( 'header_content_slider_style', array(
		'default' => 'new_arrivals',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_radio_select',
	) );
	$wp_customize->add_control( 'header_content_slider_style', array(
		'label' => __( 'スライダー［スタイル］', 'emanon-premium' ),
		'section' => 'emanon_header_content_slider',
		'settings' => 'header_content_slider_style',
		'type' => 'radio',
		'choices' => array(
			'new_arrivals' => __( '最新記事', 'emanon-premium' ),
			'pick_up'      => __( 'おすすめ記事', 'emanon-premium' ),
			'category'     => __( '指定カテゴリー', 'emanon-premium' ),
			),
		'priority' => 1,
	) );

	// Select category for content slider
	$wp_customize->add_setting( 'header_content_slider_category_id', array(
		'default' => 'Uncategorized',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_select_category',
	) );
	$wp_customize->add_control( new Emanon_WP_Customize_Category_Dropdown_Control( $wp_customize, 'header_content_slider_category_id', array(
		'label' => __( '指定カテゴリー', 'emanon-premium' ),
		'section' => 'emanon_header_content_slider',
		'settings' => 'header_content_slider_category_id',
		'priority' => 2,
	) ) );

	// Hide sticky posts
	$wp_customize->add_setting( 'header_content_slider_no_sticky', array(
		'default' => '',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'header_content_slider_no_sticky', array(
		'label' =>__( '先頭固定記事を除外', 'emanon-premium' ),
		'section' => 'emanon_header_content_slider',
		'settings' => 'header_content_slider_no_sticky',
		'type' => 'checkbox',
		'priority' => 3,
	) );

	// Number of scroll post
	$wp_customize->add_setting( 'header_content_slider_scrol_post', array(
		'default' => 5,
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_number',
	) );
	$wp_customize->add_control( 'header_content_slider_scrol_post', array(
		'label' => __( '記事の表示件数', 'emanon-premium' ),
		'section' => 'emanon_header_content_slider',
		'settings' => 'header_content_slider_scrol_post',
		'type' => 'number',
		'input_attrs' => array(
			'min' => 1,
			'step' => 1,
		),
		'priority' => 4,
	) );

	// Display date
	$wp_customize->add_setting( 'display_header_content_slider_date', array(
		'default' => true,
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'display_header_content_slider_date', array(
		'label' =>__( '「公開日」を表示', 'emanon-premium' ),
		'section' => 'emanon_header_content_slider',
		'settings' => 'display_header_content_slider_date',
		'type' => 'checkbox',
		'priority' => 5,
	) );

	// Display updade date
	$wp_customize->add_setting( 'display_header_content_slider_update_date', array(
		'default' => '',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'display_header_content_slider_update_date', array(
		'label' =>__( '「更新日」を表示', 'emanon-premium' ),
		'section' => 'emanon_header_content_slider',
		'settings' => 'display_header_content_slider_update_date',
		'type' => 'checkbox',
		'priority' => 6,
	) );

	// Display category
	$wp_customize->add_setting( 'display_header_content_slider_category', array(
		'default' => true,
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'display_header_content_slider_category', array(
		'label' => __( '「カテゴリー名」を表示', 'emanon-premium' ),
		'section' => 'emanon_header_content_slider',
		'settings' => 'display_header_content_slider_category',
		'type' => 'checkbox',
		'priority' => 7,
	) );

	// Display comments number
	$wp_customize->add_setting( 'display_content_comments_number', array(
		'default' => '',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'display_content_comments_number', array(
		'label' => __( '「コメント数」を表示', 'emanon-premium' ),
		'section' => 'emanon_header_content_slider',
		'settings' => 'display_content_comments_number',
		'type' => 'checkbox',
		'priority' => 8,
	) );

	// Display author
	$wp_customize->add_setting( 'display_header_content_slider_author', array(
		'default' => '',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'display_header_content_slider_author', array(
		'label' => __( '「投稿者名」を表示', 'emanon-premium' ),
		'section' => 'emanon_header_content_slider',
		'settings' => 'display_header_content_slider_author',
		'type' => 'checkbox',
		'priority' => 9,
	) );

	// Display read more
	$wp_customize->add_setting( 'display_header_content_slider_read_more', array(
		'default' => true,
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'display_header_content_slider_read_more', array(
		'label' => __( '「ボタン」を表示', 'emanon-premium' ),
		'section' => 'emanon_header_content_slider',
		'settings' => 'display_header_content_slider_read_more',
		'type' => 'checkbox',
		'priority' => 10,
	) );

	// Read more text
	$wp_customize->add_setting( 'header_content_slider_read_more_text', array(
		'default' => __( '続きを読む', 'emanon-premium' ),
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_text',
	) );
	$wp_customize->add_control( 'header_content_slider_read_more_text', array(
		'label' => __( 'ボタン テキスト', 'emanon-premium' ),
		'section' => 'emanon_header_content_slider',
		'settings' => 'header_content_slider_read_more_text',
		'type' => 'text',
		'priority' => 11,
		) );

	// Animation autoplay
	$wp_customize->add_setting( 'header_content_slider_autoplay_pc', array(
		'default' => true,
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'header_content_slider_autoplay_pc', array(
		'label' => __( '自動スライダー［PC］', 'emanon-premium' ),
		'section' => 'emanon_header_content_slider',
		'settings' => 'header_content_slider_autoplay_pc',
		'type' => 'checkbox',
		'priority' => 12,
	) );

	// Animation autoplay
	$wp_customize->add_setting( 'header_content_slider_autoplay_sp', array(
		'default' => true,
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'header_content_slider_autoplay_sp', array(
		'label' => __( '自動スライダー［SP］', 'emanon-premium' ),
		'section' => 'emanon_header_content_slider',
		'settings' => 'header_content_slider_autoplay_sp',
		'type' => 'checkbox',
		'priority' => 13,
	) );

	// Animation fade
	$wp_customize->add_setting( 'header_content_slider_fade_pc', array(
		'default' => true,
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'header_content_slider_fade_pc', array(
		'label' => __( 'フェード［PC］', 'emanon-premium' ),
		'description' => __( 'パソコン表示に適用。スマホ表示はフェードのみ', 'emanon-premium' ),
		'section' => 'emanon_header_content_slider',
		'settings' => 'header_content_slider_fade_pc',
		'type' => 'checkbox',
		'priority' => 14,
	) );

	// Slider arrows
	$wp_customize->add_setting( 'header_content_slider_arrows_pc', array(
		'default' => '',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'header_content_slider_arrows_pc', array(
		'label' => __( '矢印の表示［PC］', 'emanon-premium' ),
		'section' => 'emanon_header_content_slider',
		'settings' => 'header_content_slider_arrows_pc',
		'type' => 'checkbox',
		'priority' => 15,
	) );

	// Slider arrows
	$wp_customize->add_setting( 'header_content_slider_arrows_sp', array(
		'default' => '',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'header_content_slider_arrows_sp', array(
		'label' => __( '矢印の表示［SP］', 'emanon-premium' ),
		'section' => 'emanon_header_content_slider',
		'settings' => 'header_content_slider_arrows_sp',
		'type' => 'checkbox',
		'priority' => 16,
	) );

	// Slider dots
	$wp_customize->add_setting( 'header_content_slider_dots_pc', array(
		'default' => '',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'header_content_slider_dots_pc', array(
		'label' => __( 'ドットの表示［PC］', 'emanon-premium' ),
		'section' => 'emanon_header_content_slider',
		'settings' => 'header_content_slider_dots_pc',
		'type' => 'checkbox',
		'priority' => 17,
	) );

	// Slider dots
	$wp_customize->add_setting( 'header_content_slider_dots_sp', array(
		'default' => '',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'header_content_slider_dots_sp', array(
		'label' => __( 'ドットの表示［SP］', 'emanon-premium' ),
		'section' => 'emanon_header_content_slider',
		'settings' => 'header_content_slider_dots_sp',
		'type' => 'checkbox',
		'priority' => 18,
	) );

	// Slider animation in after effect
	$wp_customize->add_setting( 'header_content_slider_animation', array(
		'default' => 'none',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_radio_select',
	) );
	$wp_customize->add_control( 'header_content_slider_animation', array(
		'label' => __( 'アニメーション効果［スライダー］', 'emanon-premium' ),
		'section' => 'emanon_header_content_slider',
		'settings' => 'header_content_slider_animation',
		'type' => 'radio',
		'choices' => array(
			'none'            => __( 'なし', 'emanon-premium' ),
			'expansion_image' => __( '拡張', 'emanon-premium' ),
			'reduced_image'   => __( '縮小', 'emanon-premium' ),
			'slide_image'     => __( 'スライド', 'emanon-premium' ),
			),
		'priority' => 19,
	) );

	// Text animation
	$wp_customize->add_setting( 'header_content_slider_text_animation', array(
		'default' => 'none',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_radio_select',
	) );
	$wp_customize->add_control( 'header_content_slider_text_animation', array(
		'label' => __( 'アニメーション効果［テキスト］', 'emanon-premium' ),
		'section' => 'emanon_header_content_slider',
		'settings' => 'header_content_slider_text_animation',
		'type' => 'radio',
		'choices' => array(
			'none' => __( 'なし', 'emanon-premium' ),
			'fadein' => __( 'フェードイン', 'emanon-premium' ),
			'slideup' => __( 'スライドアップ', 'emanon-premium' ),
			),
		'priority' => 20,
	) );

	// Autoplay speed
	$wp_customize->add_setting( 'header_content_slider_autoplay_speed', array(
		'default' => 3000,
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_number',
	) );
	$wp_customize->add_control( 'header_content_slider_autoplay_speed', array(
		'label' => __( 'スライダー［速度］', 'emanon-premium' ),
		'description' => __( '初期値：3000', 'emanon-premium' ),
		'section' => 'emanon_header_content_slider',
		'settings' => 'header_content_slider_autoplay_speed',
		'type' => 'number',
		'input_attrs' => array(
			'min' => 0,
			'step' => 1,
		),
		'priority' => 21,
	) );

	// Slide change speed
	$wp_customize->add_setting( 'header_content_slider_speed_pc', array(
		'default' => 1500,
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_number',
	) );
	$wp_customize->add_control( 'header_content_slider_speed_pc', array(
		'label' => __( '切り替え速度［PC］', 'emanon-premium' ),
		'description' => __( '初期値：1500', 'emanon-premium' ),
		'section' => 'emanon_header_content_slider',
		'settings' => 'header_content_slider_speed_pc',
		'type' => 'number',
		'input_attrs' => array(
			'min' => 0,
			'step' => 1,
		),
		'priority' => 22,
	) );

	// Slide change speed
	$wp_customize->add_setting( 'header_content_slider_speed_sp', array(
		'default' => 1500,
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_number',
	) );
	$wp_customize->add_control( 'header_content_slider_speed_sp', array(
		'label' => __( '切り替え速度［SP］', 'emanon-premium' ),
		'description' => __( '初期値：1500', 'emanon-premium' ),
		'section' => 'emanon_header_content_slider',
		'settings' => 'header_content_slider_speed_sp',
		'type' => 'number',
		'input_attrs' => array(
			'min' => 0,
			'step' => 1,
		),
		'priority' => 23,
	) );

	// Slider height［PC］
	$wp_customize->add_setting( 'header_content_slider_height_pc', array(
		'default' => 600,
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_number',
	) );
	$wp_customize->add_control( 'header_content_slider_height_pc', array(
		'label' => __( '高さ［PC］', 'emanon-premium' ),
		'description' => __( '初期値：600px', 'emanon-premium' ),
		'section' => 'emanon_header_content_slider',
		'settings' => 'header_content_slider_height_pc',
		'type' => 'number',
		'input_attrs' => array(
			'min' => 0,
			'step' => 1,
		),
		'priority' => 24,
	) );

	// Slider height［SP］
	$wp_customize->add_setting( 'header_content_slider_height_sp', array(
		'default' => 600,
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_number',
	) );
	$wp_customize->add_control( 'header_content_slider_height_sp', array(
		'label' => __( '高さ［SP］', 'emanon-premium' ),
		'description' => __( '初期値：600px', 'emanon-premium' ),
		'section' => 'emanon_header_content_slider',
		'settings' => 'header_content_slider_height_sp',
		'type' => 'number',
		'input_attrs' => array(
			'min' => 0,
			'step' => 1,
		),
		'priority' => 25,
	) );

	// Title font size［PC］
	$wp_customize->add_setting( 'header_content_slider_title_fontsize_pc', array(
		'default' => 32,
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_number',
	) );
	$wp_customize->add_control( 'header_content_slider_title_fontsize_pc', array(
		'label' => __( 'タイトル 文字サイズ［PC］', 'emanon-premium' ),
		'description' => __( '初期値：32px', 'emanon-premium' ),
		'section' => 'emanon_header_content_slider',
		'settings' => 'header_content_slider_title_fontsize_pc',
		'type' => 'number',
		'input_attrs' => array(
			'min' => 1,
			'step' => 1,
		),
		'priority' => 26,
	) );

	// Title fontsize［SP］
	$wp_customize->add_setting( 'header_content_slider_title_fontsize_sp', array(
		'default' => 24,
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_number',
	) );
	$wp_customize->add_control( 'header_content_slider_title_fontsize_sp', array(
		'label' => __( 'タイトル 文字サイズ［SP］', 'emanon-premium' ),
		'description' => __( '初期値：24px', 'emanon-premium' ),
		'section' => 'emanon_header_content_slider',
		'settings' => 'header_content_slider_title_fontsize_sp',
		'type' => 'number',
		'input_attrs' => array(
			'min' => 1,
			'step' => 1,
		),
		'priority' => 27,
	) );

	// Separator style
	$wp_customize->add_setting( 'header_content_slider_separator', array(
		'default' => 'display_none',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_radio_select',
	) );
	$wp_customize->add_control( 'header_content_slider_separator', array(
		'label' => __( '区切りデサイン', 'emanon-premium' ),
		'section' => 'emanon_header_content_slider',
		'settings' => 'header_content_slider_separator',
		'type' => 'radio',
		'choices' => array(
			'display_none'    => __( '非表示', 'emanon-premium' ),
			'arch'            => __( 'アーチ', 'emanon-premium' ),
			'wave'            => __( 'ウェーブ', 'emanon-premium' ),
			'double_wave'     => __( '２重ウェーブ', 'emanon-premium' ),
			'two_wave'        => __( 'ダブルウェーブ', 'emanon-premium' ),
			'tilt_right'      => __( '右斜め', 'emanon-premium' ),
			'tilt_left'       => __( '左斜め', 'emanon-premium' ),
			'triangle'        => __( 'トライアングル', 'emanon-premium' ),
			'triangle_center' => __( 'トライアングル［中央］', 'emanon-premium' ),
			),
		'priority' => 28,
	) );

	// Title color
	$wp_customize->add_setting( 'header_content_slider_title_color', array(
		'default' => '#ffffff',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_colorcode',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_content_slider_title_color', array(
		'label' => __( 'タイトル', 'emanon-premium' ),
		'section' => 'emanon_header_content_slider',
		'settings' => 'header_content_slider_title_color',
		'priority' => 29,
	) ) );

	// Meta color
	$wp_customize->add_setting( 'header_content_slider_meta_color', array(
		'default' => '#eeeff0',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_colorcode',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_content_slider_meta_color', array(
		'label' => __( 'メタ', 'emanon-premium' ),
		'section' => 'emanon_header_content_slider',
		'settings' => 'header_content_slider_meta_color',
		'priority' => 30,
	) ) );

	// Btn border color
	$wp_customize->add_setting( 'header_content_slider_btn_border_color', array(
		'default' => '#fff',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_colorcode',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_content_slider_btn_border_color', array(
		'label' => __( 'ボタン 枠線', 'emanon-premium' ),
		'section' => 'emanon_header_content_slider',
		'settings' => 'header_content_slider_btn_border_color',
		'priority' => 31,
	) ) );

	// Btn border hover color
	$wp_customize->add_setting( 'header_content_slider_btn_border_hover_color', array(
		'default' => emanon_primary_light_color(),
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_colorcode',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_content_slider_btn_border_hover_color', array(
		'label' => __( 'ボタン 枠線［ホバー］', 'emanon-premium' ),
		'section' => 'emanon_header_content_slider',
		'settings' => 'header_content_slider_btn_border_hover_color',
		'priority' => 32,
	) ) );

	// Btn background color
	$wp_customize->add_setting( 'header_content_slider_btn_background', array(
		'default' => '',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'header_content_slider_btn_background', array(
		'label' =>__( 'ボタン 背景色', 'emanon-premium' ),
		'description' => __( 'ボタン枠線の色が背景色に反映されます。', 'emanon-premium' ),
		'section' => 'emanon_header_content_slider',
		'settings' => 'header_content_slider_btn_background',
		'type' => 'checkbox',
		'priority' => 33,
	) );

	// Btn text color
	$wp_customize->add_setting( 'header_content_slider_btn_text_color', array(
		'default' => '#fff',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_colorcode',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_content_slider_btn_text_color', array(
		'label' => __( 'ボタン テキスト', 'emanon-premium'  ),
		'section' => 'emanon_header_content_slider',
		'settings' => 'header_content_slider_btn_text_color',
		'priority' => 34,
	) ) );

	// Background mask color start
	$wp_customize->add_setting( 'header_content_slider_background_color_start', array(
		'default' => '#000',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_colorcode',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_content_slider_background_color_start', array(
		'label' => __( '背景色［開始］', 'emanon-premium'  ),
		'section' => 'emanon_header_content_slider',
		'settings' => 'header_content_slider_background_color_start',
		'priority' => 35,
	) ) );

	// Background mask color end
	$wp_customize->add_setting( 'header_content_slider_background_color_end', array(
		'default' => '#000',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_colorcode',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_content_slider_background_color_end', array(
		'label' => __( '背景色［終了］', 'emanon-premium'  ),
		'section' => 'emanon_header_content_slider',
		'settings' => 'header_content_slider_background_color_end',
		'priority' => 36,
	) ) );

	// Background mask color degree
	$wp_customize->add_setting( 'header_content_slider_background_color_degree', array(
		'default' => 135,
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_number',
	) );
	$wp_customize->add_control( 'header_content_slider_background_color_degree', array(
		'label' => __( '角度', 'emanon-premium'  ),
		'section' => 'emanon_header_content_slider',
		'settings' => 'header_content_slider_background_color_degree',
		'type' => 'number',
		'priority' => 37,
	) );

	// Background mask color opacity
	$wp_customize->add_setting( 'header_content_slider_opacity', array(
		'default' => 0,
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_range_slider'
	) );
	$wp_customize->add_control( new Emanon_WP_Customize_Range_slider_Control( $wp_customize, 'header_content_slider_opacity', array(
		'label' => __( '背景色［透過率］', 'emanon-premium'  ),
		'section' => 'emanon_header_content_slider',
		'settings' => 'header_content_slider_opacity',
		'min' => 0,
		'max' => 1,
		'step' => 0.1,
		'priority' => 38,
	) ) );

	// Slider arrows color
	$wp_customize->add_setting( 'header_content_slider_arrows_color', array(
		'default' => '#fff',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_colorcode',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_content_slider_arrows_color', array(
		'label' => __( '矢印', 'emanon-premium'  ),
		'section' => 'emanon_header_content_slider',
		'settings' => 'header_content_slider_arrows_color',
		'priority' => 39,
	) ) );

	// Slider dots color
	$wp_customize->add_setting( 'header_content_slider_dots_color', array(
		'default' => '#e2e5e8',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_colorcode',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_content_slider_dotsr_color', array(
		'label' => __( 'ドット', 'emanon-premium' ),
		'section' => 'emanon_header_content_slider',
		'settings' => 'header_content_slider_dots_color',
		'priority' => 40,
	) ) );

	// Slider dots active color
	$wp_customize->add_setting( 'header_content_slider_dots_active_color', array(
		'default' => emanon_primary_light_color(),
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_colorcode',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_content_slider_dots_active_color', array(
		'label' => __( 'ドット［アクティブ］', 'emanon-premium' ),
		'section' => 'emanon_header_content_slider',
		'settings' => 'header_content_slider_dots_active_color',
		'priority' => 41,
	) ) );

	// Separator color
	$wp_customize->add_setting( 'header_content_slider_separator_color', array(
		'default' => '#eeeff0',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_colorcode',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_content_slider_separator_color', array(
		'label' => __( '区切り線', 'emanon-premium'  ),
		'section' => 'emanon_header_content_slider',
		'settings' => 'header_content_slider_separator_color',
		'priority' => 42,
	) ) );