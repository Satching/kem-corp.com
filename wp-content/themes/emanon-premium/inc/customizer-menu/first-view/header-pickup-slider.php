<?php
/**
 * Theme customizer header pickup slider panel
 *
 * @since 1.0.0
 * @package Emanon Premium
 */

$wp_customize->add_section( 'emanon_header_pickup_slider', array (
	'title' => __( 'ピックアップスライダー設定', 'emanon-premium' ),
	'description' => __( '［注意］表示設定でピックアップスライダーを有効にしてください。', 'emanon-premium' ),
	'priority' => 5,
	'panel' => 'emanon_front_page_settings',
) );

	// Pickup slider style
	$wp_customize->add_setting( 'header_pickup_slider_style', array(
		'default' => 'new_arrivals',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_radio_select',
	) );
	$wp_customize->add_control( 'header_pickup_slider_style', array(
		'label' => __( 'スライダー［スタイル］', 'emanon-premium' ),
		'section' => 'emanon_header_pickup_slider',
		'settings' => 'header_pickup_slider_style',
		'type' => 'radio',
		'choices' => array(
			'new_arrivals' => __( '最新記事', 'emanon-premium' ),
			'pick_up'      => __( 'おすすめ記事', 'emanon-premium' ),
			'category'     => __( '指定カテゴリー', 'emanon-premium' ),
			),
		'priority' => 1,
	) );

	// Select category for pick up slider
	$wp_customize->add_setting( 'header_pickup_slider_category_id', array(
		'default' => 'Uncategorized',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_select_category',
	) );
	$wp_customize->add_control( new Emanon_WP_Customize_Category_Dropdown_Control( $wp_customize, 'header_pickup_slider_category_id', array(
		'label' => __( '指定カテゴリー', 'emanon-premium' ),
		'section' => 'emanon_header_pickup_slider',
		'settings' => 'header_pickup_slider_category_id',
		'priority' => 2,
	) ) );

	// Hide sticky posts
	$wp_customize->add_setting( 'header_pickup_slider_no_sticky', array(
		'default' => '',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'header_pickup_slider_no_sticky', array(
		'label' =>__( '先頭固定記事を除外', 'emanon-premium' ),
		'section' => 'emanon_header_pickup_slider',
		'settings' => 'header_pickup_slider_no_sticky',
		'type' => 'checkbox',
		'priority' => 3,
	) );

	// Number of scroll post
	$wp_customize->add_setting( 'header_pickup_slider_scrol_post', array(
		'default' => 4,
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_number',
	) );
	$wp_customize->add_control( 'header_pickup_slider_scrol_post', array(
		'label' => __( '記事の表示件数', 'emanon-premium' ),
		'description' => __( '最小値：3', 'emanon-premium' ),
		'description' => __( 'スクロールで表示したい記事の件数を指定します。', 'emanon-premium' ),
		'section' => 'emanon_header_pickup_slider',
		'settings' => 'header_pickup_slider_scrol_post',
		'type' => 'number',
		'input_attrs' => array(
			'min' => 3,
			'step' => 1,
		),
		'priority' => 4,
	) );

	// Display pick date
	$wp_customize->add_setting( 'display_header_pickup_slider_date', array(
		'default' => '',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'display_header_pickup_slider_date', array(
		'label' => __( '「公開日」を表示', 'emanon-premium' ),
		'section' => 'emanon_header_pickup_slider',
		'settings' => 'display_header_pickup_slider_date',
		'type' => 'checkbox',
		'priority' => 5,
	) );

	// Display pick up category
	$wp_customize->add_setting( 'display_header_pickup_slider_cat', array(
		'default' => '',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'display_header_pickup_slider_cat', array(
		'label' => __( '「カテゴリー名」を表示', 'emanon-premium' ),
		'section' => 'emanon_header_pickup_slider',
		'settings' => 'display_header_pickup_slider_cat',
		'type' => 'checkbox',
		'priority' => 6,
	) );

	// Animation autoplay
	$wp_customize->add_setting( 'header_pickup_slider_autoplay_pc', array(
		'default' => '',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'header_pickup_slider_autoplay_pc', array(
		'label' => __( '自動スライダー［PC］', 'emanon-premium' ),
		'section' => 'emanon_header_pickup_slider',
		'settings' => 'header_pickup_slider_autoplay_pc',
		'type' => 'checkbox',
		'priority' => 7,
	) );

	// Animation autoplay
	$wp_customize->add_setting( 'header_pickup_slider_autoplay_sp', array(
		'default' => '',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'header_pickup_slider_autoplay_sp', array(
		'label' => __( '自動スライダー［SP］', 'emanon-premium' ),
		'section' => 'emanon_header_pickup_slider',
		'settings' => 'header_pickup_slider_autoplay_sp',
		'type' => 'checkbox',
		'priority' => 8,
	) );

	// Slider arrows
	$wp_customize->add_setting( 'header_pickup_slider_arrows_pc', array(
		'default' => '',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'header_pickup_slider_arrows_pc', array(
		'label' => __( '矢印の表示［PC］', 'emanon-premium' ),
		'description' => __( 'スマホの場合、矢印は非表示です。', 'emanon-premium' ),
		'section' => 'emanon_header_pickup_slider',
		'settings' => 'header_pickup_slider_arrows_pc',
		'type' => 'checkbox',
		'priority' => 9,
	) );

	// Slider dots
	$wp_customize->add_setting( 'header_pickup_slider_dots_pc', array(
		'default' => true,
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'header_pickup_slider_dots_pc', array(
		'label' => __( 'ドットの表示［PC］', 'emanon-premium' ),
		'section' => 'emanon_header_pickup_slider',
		'settings' => 'header_pickup_slider_dots_pc',
		'type' => 'checkbox',
		'priority' => 10,
	) );

	// Slider dots
	$wp_customize->add_setting( 'header_pickup_slider_dots_sp', array(
		'default' => true,
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'header_pickup_slider_dots_sp', array(
		'label' => __( 'ドットの表示［SP］', 'emanon-premium' ),
		'section' => 'emanon_header_pickup_slider',
		'settings' => 'header_pickup_slider_dots_sp',
		'type' => 'checkbox',
		'priority' => 11,
	) );

	// Slider center mode
	$wp_customize->add_setting( 'header_pickup_slider_center_mode_pc', array(
		'default' => '',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'header_pickup_slider_center_mode_pc', array(
		'label' => __( 'センターモード［PC］', 'emanon-premium' ),
		'section' => 'emanon_header_pickup_slider',
		'settings' => 'header_pickup_slider_center_mode_pc',
		'type' => 'checkbox',
		'priority' => 12,
	) );

	// Slider center mode
	$wp_customize->add_setting( 'header_pickup_slider_center_mode_sp', array(
		'default' => '',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'header_pickup_slider_center_mode_sp', array(
		'label' => __( 'センターモード［SP］', 'emanon-premium' ),
		'section' => 'emanon_header_pickup_slider',
		'settings' => 'header_pickup_slider_center_mode_sp',
		'type' => 'checkbox',
		'priority' => 13,
	) );

	// Text animation
	$wp_customize->add_setting( 'header_pickup_slider_text_animation', array(
		'default' => 'none',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_radio_select',
	) );
	$wp_customize->add_control( 'header_pickup_slider_text_animation', array(
		'label' => __( 'アニメーション効果', 'emanon-premium' ),
		'section' => 'emanon_header_pickup_slider',
		'settings' => 'header_pickup_slider_text_animation',
		'type' => 'radio',
		'choices' => array(
			'none' => __( 'なし', 'emanon-premium' ),
			'fadein' => __( 'フェードイン', 'emanon-premium' ),
			'slideup' => __( 'スライドアップ', 'emanon-premium' ),
			),
		'priority' => 14,
	) );

	// Autoplay speed
	$wp_customize->add_setting( 'header_pickup_slider_autoplay_speed', array(
		'default' => 3000,
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_number',
	) );
	$wp_customize->add_control( 'header_pickup_slider_autoplay_speed', array(
		'label' => __( 'スライダー［速度］', 'emanon-premium' ),
		'description' => __( '初期値：3000', 'emanon-premium' ),
		'section' => 'emanon_header_pickup_slider',
		'settings' => 'header_pickup_slider_autoplay_speed',
		'type' => 'number',
		'input_attrs' => array(
			'min' => 0,
			'step' => 1,
		),
		'priority' => 15,
	) );

	// Slide change speed
	$wp_customize->add_setting( 'header_pickup_slider_speed_pc', array(
		'default' => 1500,
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_number',
	) );
	$wp_customize->add_control( 'header_pickup_slider_speed_pc', array(
		'label' => __( '切り替え速度［PC］', 'emanon-premium' ),
		'description' => __( '初期値：1500', 'emanon-premium' ),
		'section' => 'emanon_header_pickup_slider',
		'settings' => 'header_pickup_slider_speed_pc',
		'type' => 'number',
		'input_attrs' => array(
			'min' => 0,
			'step' => 1,
		),
		'priority' => 16,
	) );

	// Slide change speed
	$wp_customize->add_setting( 'header_pickup_slider_speed_sp', array(
		'default' => 1500,
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_number',
	) );
	$wp_customize->add_control( 'header_pickup_slider_speed_sp', array(
		'label' => __( '切り替え速度［SP］', 'emanon-premium' ),
		'description' => __( '初期値：1500', 'emanon-premium' ),
		'section' => 'emanon_header_pickup_slider',
		'settings' => 'header_pickup_slider_speed_sp',
		'type' => 'number',
		'input_attrs' => array(
			'min' => 0,
			'step' => 1,
		),
		'priority' => 17,
	) );

	// Slider height［PC］
	$wp_customize->add_setting( 'header_pickup_slider_height_pc', array(
		'default' => 500,
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_number',
	) );
	$wp_customize->add_control( 'header_pickup_slider_height_pc', array(
		'label' => __( '高さ［PC］', 'emanon-premium' ),
		'description' => __( '初期値：500px', 'emanon-premium' ),
		'section' => 'emanon_header_pickup_slider',
		'settings' => 'header_pickup_slider_height_pc',
		'type' => 'number',
		'input_attrs' => array(
			'min' => 0,
			'step' => 1,
		),
		'priority' => 18,
	) );

	// Slider height［SP］
	$wp_customize->add_setting( 'header_pickup_slider_height_sp', array(
		'default' => 500,
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_number',
	) );
	$wp_customize->add_control( 'header_pickup_slider_height_sp', array(
		'label' => __( '高さ［SP］', 'emanon-premium' ),
		'description' => __( '初期値：500px', 'emanon-premium' ),
		'section' => 'emanon_header_pickup_slider',
		'settings' => 'header_pickup_slider_height_sp',
		'type' => 'number',
		'input_attrs' => array(
			'min' => 0,
			'step' => 1,
		),
		'priority' => 19,
	) );

	// Background image［PC］
	$wp_customize->add_setting( 'header_pickup_background_image_pc', array(
		'default' => '',
		'type' => 'theme_mod',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'header_pickup_background_image_pc', array (
		'label' => __( '背景画像［PC］', 'emanon-premium' ),
		'section' => 'emanon_header_pickup_slider',
		'settings' => 'header_pickup_background_image_pc',
		'priority' => 20,
	) ) );

	// Background image［SP］
	$wp_customize->add_setting( 'header_pickup_background_image_sp', array(
		'default' => '',
		'type' => 'theme_mod',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'header_pickup_background_image_sp', array (
		'label' => __( '背景画像［SP］', 'emanon-premium' ),
		'section' => 'emanon_header_pickup_slider',
		'settings' => 'header_pickup_background_image_sp',
		'priority' => 21,
	) ) );

	// Enable background color
	$wp_customize->add_setting( 'header_pickup_slider_background_color_enable', array(
		'default' => true,
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'header_pickup_slider_background_color_enable', array(
		'label' =>__( '背景色を有効にする', 'emanon-premium' ),
		'section' => 'emanon_header_pickup_slider',
		'settings' => 'header_pickup_slider_background_color_enable',
		'type' => 'checkbox',
		'priority' => 22,
	) );

	// Background mask color start
	$wp_customize->add_setting( 'header_pickup_slider_background_color_start', array(
		'default' => '#eeeff0',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_colorcode',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_pickup_slider_background_color_start', array(
		'label' => __( '背景色［開始］', 'emanon-premium'  ),
		'section' => 'emanon_header_pickup_slider',
		'settings' => 'header_pickup_slider_background_color_start',
		'priority' => 23,
	) ) );

	// Background mask color end
	$wp_customize->add_setting( 'header_pickup_slider_background_color_end', array(
		'default' => '#eeeff0',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_colorcode',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_pickup_slider_background_color_end', array(
		'label' => __( '背景色［終了］', 'emanon-premium'  ),
		'section' => 'emanon_header_pickup_slider',
		'settings' => 'header_pickup_slider_background_color_end',
		'priority' => 24,
	) ) );

	// Background mask color degree
	$wp_customize->add_setting( 'header_pickup_slider_background_color_degree', array(
		'default' => 135,
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_number',
	) );
	$wp_customize->add_control( 'header_pickup_slider_background_color_degree', array(
		'label' => __( '角度', 'emanon-premium'  ),
		'section' => 'emanon_header_pickup_slider',
		'settings' => 'header_pickup_slider_background_color_degree',
		'type' => 'number',
		'priority' => 25,
	) );

	// Background mask color opacity
	$wp_customize->add_setting( 'header_pickup_slider_opacity', array(
		'default' => 0.5,
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_range_slider'
	) );
	$wp_customize->add_control( new Emanon_WP_Customize_Range_slider_Control( $wp_customize, 'header_pickup_slider_opacity', array(
		'label' => __( '背景色［透過率］', 'emanon-premium'  ),
		'section' => 'emanon_header_pickup_slider',
		'settings' => 'header_pickup_slider_opacity',
		'min' => 0,
		'max' => 1,
		'step' => 0.1,
		'priority' => 26,
	) ) );

	// Slider arrows color
	$wp_customize->add_setting( 'header_pickup_slider_arrows_color', array(
		'default' => emanon_primary_light_color(),
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_colorcode',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_pickup_slider_arrows_color', array(
		'label' => __( '矢印', 'emanon-premium'  ),
		'section' => 'emanon_header_pickup_slider',
		'settings' => 'header_pickup_slider_arrows_color',
		'priority' => 27,
	) ) );

	// Slider dots color
	$wp_customize->add_setting( 'header_pickup_slider_dots_color', array(
		'default' => '#e2e5e8',
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_colorcode',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_pickup_slider_dotsr_color', array(
		'label' => __( 'ドット', 'emanon-premium' ),
		'section' => 'emanon_header_pickup_slider',
		'settings' => 'header_pickup_slider_dots_color',
		'priority' => 28,
	) ) );

	// Slider dots active color
	$wp_customize->add_setting( 'header_pickup_slider_dots_active_color', array(
		'default' => emanon_primary_light_color(),
		'type' => 'theme_mod',
		'sanitize_callback' => 'emanon_sanitize_colorcode',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_pickup_slider_dots_active_color', array(
		'label' => __( 'ドット［アクティブ］', 'emanon-premium' ),
		'section' => 'emanon_header_pickup_slider',
		'settings' => 'header_pickup_slider_dots_active_color',
		'priority' => 29,
	) ) );